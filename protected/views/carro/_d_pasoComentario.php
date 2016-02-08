<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-pago-comentario',
    'enableClientValidation' => true,
    //'action' => Yii::app()->createUrl('/carro/pagar', array('paso' => $modelPago->getScenario(), 'post' => 'true')),
    'htmlOptions' => array(
    //'class' => "", 'data-ajax' => "false"
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

<div data-role="tipoentrega-habilitar" data-habilitar="<?php echo Yii::app()->params->entrega['tipo']['presencial'] ?>" class="<?php echo ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] ? "" : "display-none") ?>">
    <div class="form-group">
        <?php echo $form->labelEx($modelPago, 'telefonoContacto', array('class' => 'control-label')); ?>
        <?php echo $form->textField($modelPago, 'telefonoContacto', array('class' => 'form-control input-sm', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('telefonoContacto'))); ?>
        <?php echo $form->error($modelPago, 'telefonoContacto', array('class' => 'text-danger')); ?>
    </div>

    <?php if ($modelPago->pagoInvitado): ?>
        <div class="form-group">
            <?php echo $form->labelEx($modelPago, 'correoElectronicoContacto', array('class' => 'control-label')); ?>
            <?php echo $form->emailField($modelPago, 'correoElectronicoContacto', array('class' => 'form-control input-sm', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoElectronicoContacto'))); ?>
            <?php echo $form->error($modelPago, 'correoElectronicoContacto', array('class' => 'text-danger')); ?>
        </div>
    <?php endif; ?>
</div>


<div class="form-group">
    <?php echo $form->labelEx($modelPago, 'comentario', array('class' => 'control-label')); ?>
    <?php echo $form->textArea($modelPago, 'comentario', array('class' => 'form-control', 'rows' => 8, 'data-countchar' => 'div-comentario-contador', 'maxlength' => 250, /* 'placeholder' => $modelPago->getAttributeLabel('comentario') */)); ?>
    <p>[Máximo 250 caracteres] <span id="div-comentario-contador"></span></p>
        <?php echo $form->error($modelPago, 'comentario', array('class' => 'text-danger')); ?>
</div>

<div class="bot-button">
    <button data-redirect="confirmacion" data-origin="informacion" id="btn-carropagar-siguiente" class="btn btn-primary">Continuar</button>
</div>
<?php $this->endWidget(); ?>