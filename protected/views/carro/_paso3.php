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
    <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
        <?php foreach ($listFormaPago as $idx => $objFormaPago): ?>
            <label for="FormaPagoForm_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>"><?php echo $objFormaPago->formaPago ?></label>
            <input type="radio" data-credirebaja="<?php echo $objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja'] ? "1" : "0" ?>" name="FormaPagoForm[idFormaPago]" id="FormaPagoForm_idFormaPago_<?php echo $objFormaPago->idFormaPago ?>" value="<?php echo $objFormaPago->idFormaPago ?>" <?php echo ((($modelPago->idFormaPago == null && $idx == 0) || ($modelPago->idFormaPago !== null && $modelPago->idFormaPago == $objFormaPago->idFormaPago)) ? "checked" : "") ?>>
            <?php if ($objFormaPago->idFormaPago == Yii::app()->params->formaPago['idCredirebaja']): ?>
                <div id="div-credirebaja">
                    <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
                        <?php echo $form->labelEx($modelPago, 'tarjetaNumero'); ?>
                        <?php echo $form->numberField($modelPago, 'tarjetaNumero', array('placeholder' => '000000000000', 'maxlength' => 12)); ?>
                        <?php echo $form->error($modelPago, 'tarjetaNumero'); ?>
                        <?php echo $form->labelEx($modelPago, 'numeroCuotas'); ?>
                        <?php echo $form->dropDownList($modelPago, 'numeroCuotas', FormaPagoForm::listDataCuotas(), array('placeholder' => '0')); ?>
                        <?php echo $form->error($modelPago, 'numeroCuotas'); ?>
                    </div>
                </div>

                <div class="space-2"></div>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php echo $form->error($modelPago, 'idFormaPago'); ?>
    </div>
    <div class="space-2"></div>

    <?php if ($modelPago->bono !== null): ?>
        <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
            <?php echo $form->labelEx($modelPago, 'usoBono', array()); ?>

            <div>
                <div>Nombre o tipo de bono: Bono Cliente Fiel</div>
                <div>Valor del bono: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $modelPago->bono['valor'], Yii::app()->params->formatoMoneda['moneda']);?></div>
                <div>Vigendia del bono: <?php echo $modelPago->bono['vigencia']->format('Y-m-d') ?></div>
                <div>¿Desea utilizar este bono?</div>
                <?php //echo $form->radioButton($modelPago, 'usoBono', array('value' => '1', 'data-role' => 'none')) . 'Si'; ?>
                <?php //echo $form->radioButton($modelPago, 'usoBono', array('value' => '0', 'data-role' => 'none')) . 'No'; ?>
                <input type="radio" data-role="none" id="FormaPagoForm_usoBono_1" name="FormaPagoForm[usoBono]" value="1" <?php echo ($modelPago->usoBono==1 ? "checked" : "") ?>> Si
                <input type="radio" data-role="none" id="FormaPagoForm_usoBono_0" name="FormaPagoForm[usoBono]" value="0" <?php echo ($modelPago->usoBono!=1 ? "checked" : "") ?>> No

                <?php echo $form->error($modelPago, 'usoBono'); ?>
            </div>

        </div>
    <?php endif; ?>

</fieldset>

<?php $this->endWidget(); ?>
