
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

<?php if($paso == 1):?>
	Hemos enviado un c&oacute;digo a tu celular <?php echo $celular?> y correo electr&oacutenico <?php echo $email?>, dig&iacute;talo aqu&iacute;
<?php else:?>
	Hemos enviado un c&oacute;digo a tu correo electr&oacutenico, dig&iacute;talo aqu&iacute; para terminar el registro
<?php endif;?>

<div class="<?php echo $model->getContentClass() ?> c_form_rgs ui-body-c">
<fieldset>
	<div class="ui-field-container">
	      <?php echo $form->labelEx($model, 'codigoVerificacion'); ?>
	      <?php echo $form->textField($model, 'codigoVerificacion', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('codigoVerificacion'), 'class' => 'form-control')); ?>
	      <?php echo $form->error($model, 'codigoVerificacion', array("class" => "text-danger")); ?>
	</div>
</fieldset>
</div>
<?php if($paso == 1):?>
&#191; A&uacute;n no recibes tu c&oacute;digo?, <a class='button-form' data-role='enviar-mensaje-verificacion' data-tipo='2' 
data-cedula='<?php echo $model->cedula?>' type="button" data-enhanced="true" href="#">Enviar de nuevo</a>
o comun&iacute;cate con nuestra l&iacute;nea de atenci&oacute;n o escr&iacute;benos a nuestro chat.
<?php endif;?>
	
<?php if($paso == 2):?>
  	<a class='btn btn-primary' href='<?php echo CController::createUrl('realizarRegistro')?>'> Regresar </a>
<?php endif;?>
	
<?php $this->endWidget(); ?>