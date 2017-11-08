<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <ul class="messages">
        <?php foreach ($mensajes as $idx => $mensaje): ?>
            <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    //'action' => $model->getScenario() == 'invitado' ? Yii::app()->createUrl('/usuario/invitado') : null,
    'htmlOptions' => array(
        'id' => "form-registro", 'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax' => "false"
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

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'clave', array()); ?>
            <?php echo $form->passwordField($model, 'clave', array('class' => 'form-control', 'maxlength' => 15, 'placeholder' => $model->getAttributeLabel('clave'), 'autocomplete' => 'off', 'ismxfilled' => 0)); ?>
            <?php echo $form->error($model, 'clave', array('class' => 'text-danger')); ?>

        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <?php echo $form->labelEx($model, 'claveConfirmar', array('class' => '')); ?>
            <?php echo $form->passwordField($model, 'claveConfirmar', array('class' => 'form-control', 'maxlength' => 15, 'placeholder' => $model->getAttributeLabel('claveConfirmar'), 'autocomplete' => 'off')); ?>
            <?php echo $form->error($model, 'claveConfirmar', array('class' => 'text-danger')); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input type="submit" data-enhanced="true" value="Actualizar" class="btn btn-success">
        </div>
    </div>
</div><?php $this->endWidget(); ?>