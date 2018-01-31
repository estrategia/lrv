
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


Hemos enviado un c&oacute;digo a tu celular <?php echo $celular?> y correo electr&oacutenico <?php echo $email?>, dig&iacute;talo aqu&iacute;

<div class="<?php echo $model->getContentClass() ?> c_form_rgs ui-body-c">
<fieldset>
	<div class="ui-field-container">
	      <?php echo $form->labelEx($model, 'codigoVerificacion'); ?>
	      <?php echo $form->textField($model, 'codigoVerificacion', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('codigoVerificacion'), 'class' => 'form-control')); ?>
	      <?php echo $form->error($model, 'codigoVerificacion', array("class" => "text-danger")); ?>
	</div>
</fieldset>
</div>


	
	
<?php $this->endWidget(); ?>