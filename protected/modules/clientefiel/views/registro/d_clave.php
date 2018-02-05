
<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'enableClientValidation' => true,
		'htmlOptions' => array (
				'id' => "form-registro-clientefiel",
				'class' => "" 
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


<div class=" container row">
	<div class='col-md-12'>
		<div class="form-group">
	                    <?php echo $form->labelEx($model, 'clave'); ?>
	                    <?php echo $form->passwordFiel($model, 'clave', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('clave'), 'class' => 'form-control')); ?>
	                    <?php echo $form->error($model, 'clave', array("class" => "text-danger")); ?>
	                </div>
	</div>
	<div class='col-md-12'>
		<div class="form-group">
	                    <?php echo $form->labelEx($model, 'claveConfirmar'); ?>
	                    <?php echo $form->passwordFiel($model, 'claveConfirmar', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('claveConfirmar'), 'class' => 'form-control')); ?>
	                    <?php echo $form->error($model, 'claveConfirmar', array("class" => "text-danger")); ?>
	                </div>
	</div>
</div>


<?php $this->endWidget(); ?>