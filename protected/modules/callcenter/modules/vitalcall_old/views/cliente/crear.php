<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'enableClientValidation' => true,
		'enableAjaxValidation' => false,
		'htmlOptions' => array (
				'id' => 'bonos-tienda-form',
				'role' => 'form' 
		),
		'errorMessageCssClass' => 'has-error',
		'clientOptions' => array (
				'validateOnSubmit' => true,
				'validateOnChange' => true,
				'errorCssClass' => 'has-error',
				'successCssClass' => 'has-success' 
		) 
) );
?>

<p class="note">
	Campos con <span class="required">*</span> son obligatorios.
</p>

<?php echo $form->errorSummary($model, null, null, array('class' => 'text-danger')); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'identificacionUsuario'); ?>
    <?php  echo $form->textField($model, 'identificacionUsuario', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error ( $model, 'identificacionUsuario', array ( 'class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'nombre'); ?>
    <?php  echo $form->textField($model, 'nombre', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error ( $model, 'nombre', array ( 'class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'apellido'); ?>
    <?php echo $form->textField($model, 'apellido', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'apellido', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'correoElectronico'); ?>
    <?php echo $form->textField($model, 'correoElectronico', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'correoElectronico', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'celular'); ?>
    <?php echo $form->textField($model, 'celular', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'celular', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'telefono'); ?>
    <?php echo $form->textField($model, 'telefono', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'telefono', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'extension'); ?>
    <?php echo $form->textField($model, 'extension', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'extension', array('class' => 'text-danger')); ?>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', array('class' => "btn btn-default")); ?>

<?php $this->endWidget(); ?>