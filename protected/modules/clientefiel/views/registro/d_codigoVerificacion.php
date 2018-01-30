
<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'enableClientValidation' => true,
		'htmlOptions' => array (
				'id' => "form-registro",
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
	                    <?php echo $form->labelEx($model, 'codigoVerificacion'); ?>
	                    <?php echo $form->textField($model, 'codigoVerificacion', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('cedula'), 'class' => 'form-control')); ?>
	                    <?php echo $form->error($model, 'codigoVerificacion', array("class" => "text-danger")); ?>
	                </div>
	</div>
</div>

<div class="row">
	<div class="col-md-4">
        <input class='btn btn-primary' type="submit" data-enhanced="true" value="Continuar">
	</div>
</div>


<?php $this->endWidget(); ?>