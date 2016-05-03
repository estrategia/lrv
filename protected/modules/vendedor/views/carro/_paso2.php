<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-pago-entrega',
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
        <?php echo $form->labelEx($modelPago, 'fechaEntrega', array()); ?>
        <?php echo $form->dropDownList($modelPago, 'fechaEntrega', CHtml::listData($listHorarios, 'fecha', 'etiqueta'), array('encode' => false, 'prompt' => $modelPago->getAttributeLabel('fechaEntrega'), 'data-native-menu' => "true", 'placeholder' => $modelPago->getAttributeLabel('fechaEntrega'))); ?>
        <?php echo $form->error($modelPago, 'fechaEntrega'); ?>
    </div>

    <div class="space-2"></div>    
    <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">

        <?php if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['presencial']): ?>

            <?php echo $form->labelEx($modelPago, 'telefonoContacto', array()); ?>
            <?php echo $form->numberField($modelPago, 'telefonoContacto', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('telefonoContacto'))); ?>
            <?php echo $form->error($modelPago, 'telefonoContacto'); ?>

            <?php if ($modelPago->pagoInvitado): ?>
                <?php echo $form->labelEx($modelPago, 'correoElectronicoContacto', array('class' => '')); ?>
                <?php echo $form->emailField($modelPago, 'correoElectronicoContacto', array('maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoElectronicoContacto'))); ?>
                <?php echo $form->error($modelPago, 'correoElectronicoContacto'); ?>
            <?php endif; ?>

        <?php endif; ?>

        <?php echo $form->labelEx($modelPago, 'comentario', array()); ?>
        <?php echo $form->textArea($modelPago, 'comentario', array('data-countchar' => 'div-comentario-contador', 'maxlength' => 250, 'placeholder' => $modelPago->getAttributeLabel('comentario'))); ?>
        <div class="maxCaract">[Máximo 250 caracteres] <span id="div-comentario-contador"></span></div>
            <?php echo $form->error($modelPago, 'comentario'); ?>

    </div>
</fieldset>

<?php $this->endWidget(); ?>
