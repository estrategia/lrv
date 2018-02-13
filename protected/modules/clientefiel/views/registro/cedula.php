<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'id' => "form-registro-clientefiel",
        'class' => "ui-bar ui-bar-a ui-corner-all",
        'data-ajax' => "false"
    ),
    'errorMessageCssClass' => 'has-error',
    'clientOptions' => array(
        'validateOnSubmit' => true,
        'validateOnChange' => true,
        'errorCssClass' => 'has-error',
        'successCssClass' => 'has-success'
    )
));
?>

<h4 class="page-title">Bienvenido a nuestro programa Cliente Fiel, por
	favor digita tu n&uacute;mero de c&eacute;dula</h4>

<fieldset>
	<div class="ui-field-container">
		<?php echo $form->labelEx($model, 'cedula'); ?>
		<?php echo $form->textField($model, 'cedula', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('cedula'), 'class' => 'form-control')); ?>
		<?php echo $form->error($model, 'cedula'); ?>
	</div>
</fieldset>

<div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-a">
	Continuar
	<input type="submit" data-enhanced="true" value="Continuar">
</div>


<?php $this->endWidget(); ?>