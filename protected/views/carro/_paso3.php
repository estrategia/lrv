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
                        <?php echo $form->numberField($modelPago, 'tarjetaNumero', array('placeholder' => '000000000000', 'maxlength'=>12)); ?>
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
    <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
        <?php echo $form->labelEx($modelPago, 'codigoCliente', array()); ?>
        <?php echo $form->textField($modelPago, 'codigoCliente', array('placeholder' => $modelPago->getAttributeLabel('codigoCliente'))); ?>
        <?php echo $form->error($modelPago, 'codigoCliente'); ?>
    </div>
    <div class="space-2"></div>
    <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
        <?php echo $form->labelEx($modelPago, 'codigoPromocion', array()); ?>
        <?php echo $form->textField($modelPago, 'codigoPromocion', array('placeholder' => $modelPago->getAttributeLabel('codigoPromocion'))); ?>
        <?php echo $form->error($modelPago, 'codigoPromocion'); ?>
    </div>
</fieldset>

<?php $this->endWidget(); ?>
