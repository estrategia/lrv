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

<?php if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['presencial']): ?>
    <div class="col-md-12">
        <div class="form-group">
            <?php echo $form->labelEx($modelPago, 'telefonoContacto', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'telefonoContacto', array('class' => 'form-control input-sm', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('telefonoContacto'))); ?>
                <?php echo $form->error($modelPago, 'telefonoContacto', array('class' => 'text-danger')); ?>
            </div>
        </div>
    </div>

    <?php if ($modelPago->pagoInvitado): ?>
        <div class="col-md-12">
            <div class="form-group">
                <?php echo $form->labelEx($modelPago, 'correoElectronico', array('class' => 'col-md-5 control-label')); ?>
                <div class="col-md-7">
                    <?php echo $form->emailField($modelPago, 'correoElectronico', array('class' => 'form-control input-sm', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoElectronico'))); ?>
                    <?php echo $form->error($modelPago, 'correoElectronico', array('class' => 'text-danger')); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

<?php endif; ?>

<div class="col-md-12">
    <div class="form-group">
        <?php echo $form->labelEx($modelPago, 'comentario', array('class' => 'col-md-12 control-label')); ?>
        <?php echo $form->textArea($modelPago, 'comentario', array('class' => 'form-control', 'rows' => 8, 'data-countchar' => 'div-comentario-contador', 'maxlength' => 250, /* 'placeholder' => $modelPago->getAttributeLabel('comentario') */)); ?>
        <p>[Máximo 250 caracteres] <span id="div-comentario-contador"></span></p>
            <?php echo $form->error($modelPago, 'comentario', array('class' => 'text-danger')); ?>
    </div>
</div>


<?php $this->endWidget(); ?>