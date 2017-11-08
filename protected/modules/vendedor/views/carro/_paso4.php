
<div class="ui-btn ui-corner-all ui-shadow ui-btn-n totalPagarbtn btn-y">
    Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getTotalCostClient(), Yii::app()->params->formatoMoneda['moneda']) ?>
</div>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-pago-pago',
    'enableClientValidation' => true,
    'action' => Yii::app()->createUrl('/carro/pagar', array('paso' => $modelPago->getScenario(), 'post' => 'true')),
    'htmlOptions' => array(
        'class' => "", 'data-ajax' => "false"
    ),
    'errorMessageCssClass' => 'has-error',
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'errorCssClass' => 'has-error',
        'successCssClass' => 'has-success',
    ))
);
?>
<fieldset>
    <div class="ui-field-container ui-bar ui-bar-a contentPaso3 ui-corner-all">
        <h2>Forma de pago</h2>
        <?php $this->renderPartial('/carro/_formaPago', array('form' => $form, 'model' => $modelPago, 'listFormaPago' => $listFormaPago)) ?>
    </div>
    <div class="space-2"></div>
	<?php if(Yii::app ()->controller->module->user->getClienteLogueado ()):?>
	 <div class="ui-field-container contentPaso3 ui-bar ui-bar-a ui-corner-all">
		 <div data-role="collapsible" data-collapsed="true" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-content-theme="a">
		    <legend>C&oacute;digo promocional</legend>
		        <label >Ingresa tu c&oacute;digo</label>
		        <input type="text" id="codigoPromocional" name="codigoPromocional" />
		        <input type="hidden" id='FormaPagoForm-usoBonoPromocional' disabled name="FormaPagoVendedorForm[usoBono][promocional]" value="0">
		        
		        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        					Usar c&oacute;digo
		        		<input type="button" data-enhanced="true" value="Usar c&oacute;digo" data-role="codigo-promocional"/>
		        </div>
		</div>
		<div class="utilBono" id='usoCodigo'></div>
	 </div>
	 <div class="space-2"></div>
	 <?php endif;?>
    <?php if (!empty($modelPago->bono)): ?>
        <div class="ui-field-container contentPaso3 ui-bar ui-bar-a ui-corner-all">
            <?php echo $form->labelEx($modelPago, 'usoBono', array()); ?>

            <?php foreach ($modelPago->bono as $idx => $bono): ?>
                <div>
                    <div>Tipo de bono: <span class="result_bono"><?php echo $bono['concepto'] ?></span></div>
                    <div>Valor de bono: <span class="result_bono"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
                    <div>Vigencia inicial del bono: <span class="result_bono"><?php echo $bono['vigenciaInicio'] ?></span></div>
                    <div>Vigencia final del bono: <span class="result_bono"><?php echo $bono['vigenciaFin'] ?></span></div>
                    <?php if ($bono['disponibleCompra'] && $bono['modoUso']== 1): ?>
                        <div class="utilBono">¿Desea utilizar este bono?</div>
                        <input type="radio" data-role="none" id="FormaPagoVendedorForm_usoBono_<?= $idx ?>_1" name="FormaPagoVendedorForm[usoBono][<?= $idx ?>]" value="1" <?php echo ($modelPago->usoBono[$idx] == 1 ? "checked" : "") ?>> <span class="utilBono">Si</span>
                        <input type="radio" data-role="none" id="FormaPagoVendedorForm_usoBono_<?= $idx ?>_0" name="FormaPagoVendedorForm[usoBono][<?= $idx ?>]" value="0" <?php echo ($modelPago->usoBono[$idx] != 1 ? "checked" : "") ?>> <span class="utilBono">No</span>
                    <?php elseif ($bono['disponibleCompra'] && $bono['modoUso'] == 2): ?>
                         <div class="utilBono">¿Desea utilizar este bono?</div>
                        <input type="radio" disabled checked data-role="none" id="FormaPagoVendedorForm_usoBono_<?= $idx ?>_1" name="FormaPagoVendedorForm[usoBono][<?= $idx ?>]" value="1" > <span class="utilBono">Si</span>
                        <input type="radio" disabled data-role="none" id="FormaPagoVendedorForm_usoBono_<?= $idx ?>_0" name="FormaPagoVendedorForm[usoBono][<?= $idx ?>]" value="0" > <span class="utilBono">No</span>
                        <input type="hidden" name="FormaPagoVendedorForm[usoBono][<?= $idx ?>]" value="1">
                    <?php elseif ($bono['modoUso'] == 1): ?>
                        <div class="utilBono">Disponible por compra superior a <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $bono['minimoCompra'], Yii::app()->params->formatoMoneda['moneda']); ?></div>
                        <input type="hidden" name="FormaPagoVendedorForm[usoBono][<?= $idx ?>]" value="0">
                    <?php else: ?>
                        <input type="hidden" name="FormaPagoVendedorForm[usoBono][<?= $idx ?>]" value="0">
                    <?php endif;?>
                </div>
                <div class="space-2"></div>
            <?php endforeach; ?>

            <?php echo $form->error($modelPago, 'usoBono'); ?>

        </div>
    <?php endif; ?>

</fieldset>

<?php if (isset($submit) && $submit): ?>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Continuar
        <input type="button" data-enhanced="true" value="Continuar" id="btn-carropagar-siguiente" data-origin="pago" data-redirect="confirmacion">
    </div>
<?php endif; ?>
<?php $this->endWidget(); ?>
