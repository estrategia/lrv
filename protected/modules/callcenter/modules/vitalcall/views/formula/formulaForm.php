<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'enableClientValidation' => true,
		'enableAjaxValidation' => false,
		'htmlOptions' => array (
				'id' => 'formula-form',
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

<?php echo $form->errorSummary($modelFormulaMedica, null, null, array('class' => 'text-danger')); ?>
<?php echo $form->hiddenField($modelFormulaMedica, 'identificacionUsuario'); ?>
<div class="form-group">
    <?php echo $form->labelEx($modelFormulaMedica, 'registroMedico'); ?>
    <?php  echo $form->textField($modelFormulaMedica, 'registroMedico', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error ( $modelFormulaMedica, 'registroMedico', array ( 'class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($modelFormulaMedica, 'nombreMedico'); ?>
    <?php echo $form->textField($modelFormulaMedica, 'nombreMedico', array('class' => 'form-control')); ?>
    <?php echo $form->error($modelFormulaMedica, 'nombreMedico', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($modelFormulaMedica, 'institucion'); ?>
    <?php echo $form->textField($modelFormulaMedica, 'institucion', array('class' => 'form-control')); ?>
    <?php echo $form->error($modelFormulaMedica, 'institucion', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($modelFormulaMedica, 'telefono'); ?>
    <?php echo $form->textField($modelFormulaMedica, 'telefono', array('class' => 'form-control')); ?>
    <?php echo $form->error($modelFormulaMedica, 'telefono', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($modelFormulaMedica, 'correoElectronico'); ?>
    <?php echo $form->textField($modelFormulaMedica, 'correoElectronico', array('class' => 'form-control')); ?>
    <?php echo $form->error($modelFormulaMedica, 'correoElectronico', array('class' => 'text-danger')); ?>
</div>

<?php echo CHtml::submitButton($modelFormulaMedica->isNewRecord ? 'Crear' : 'Actualizar', array('class' => "btn btn-default")); ?>

<?php $this->endWidget(); ?>