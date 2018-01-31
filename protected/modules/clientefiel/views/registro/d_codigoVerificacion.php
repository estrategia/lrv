
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
<div class=" container row">
	<div class='col-md-12'>
		<div class="form-group">
	                    <?php echo $form->labelEx($model, 'codigoVerificacion'); ?>
	                    <?php echo $form->textField($model, 'codigoVerificacion', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('Codigo'), 'class' => 'form-control')); ?>
	                    <?php echo $form->error($model, 'codigoVerificacion', array("class" => "text-danger")); ?>
	                </div>
	</div>
</div>
&#191; A&uacute;n no recibes tu c&oacute;digo?, <a class='button-form' data-role='enviar-mensaje-verificacion' data-tipo='2' 
data-cedula='<?php echo $model->cedula?>' type="button" data-enhanced="true" href="#">Enviar de nuevo</a>
o comun&iacute;cate con nuestra l&iacute;nea de atenci&oacute;n o escr&iacute;benos a nuestro chat.
<div class="row">
	<div class="col-md-4">
        <input class='btn btn-primary' type="submit" data-enhanced="true" value="Continuar">
	</div>
</div>


<?php $this->endWidget(); ?>