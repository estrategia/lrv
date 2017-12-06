<?php
/* @var $this OperadorController */
/* @var $model Operador */
/* @var $form CActiveForm */
?>

<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'id' => "operador-form",
        'role' => 'form',
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

<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model, null, null, array('class' => 'text-danger')); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'codigoCiudad'); ?>
    <?php //echo $form->textField($model, 'activo', array('class'=>'form-control')); ?>
    <?php echo $form->dropDownList($model, 'codigoCiudad', CHtml::listData($ciudades,'codigoCiudad', 'nombreCiudad'), array('prompt' => 'Seleccionar', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'codigoCiudad'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'prioridad'); ?>
    <?php echo $form->textField($model, 'prioridad', array('class' => 'form-control', 'size' => 20, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'prioridad'); ?>
</div>

<?php echo CHtml::submitButton($model->scenario == 'create' ? 'Crear' : 'Actualizar', array('class' => "btn btn-default")); ?>


<?php $this->endWidget(); ?>