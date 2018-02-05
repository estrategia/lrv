
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
<div class="form">
	<div class="form-section">
			<h4> <b>Bienvenido a nuestro programa Cliente Fiel, por favor digita tu n&uacute;mero de c&eacute;dula</b></h4>
		
	</div>
</div>


<div class="form">
	
	<div class="form-section">
		<div class="form-input">
	                    <?php echo $form->labelEx($model, 'cedula'); ?>
	                    <?php echo $form->textField($model, 'cedula', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('cedula'), 'class' => 'form-control')); ?>
	                    <?php echo $form->error($model, 'cedula', array("class" => "text-danger")); ?>
	    </div>
	</div>
</div>
<br/><br/>
<div class="form-action">
        <input class='btn btn-primary' type="submit" data-enhanced="true" value="Continuar">
</div>


<?php $this->endWidget(); ?>