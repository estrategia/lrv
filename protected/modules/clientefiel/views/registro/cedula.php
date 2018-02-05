
<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'enableClientValidation' => true,
		'htmlOptions' => array (
				'id' => "form-registro-clientefiel",
				'class' => "",
				'data-ajax' => "false"

		),
		'errorMessageCssClass' => 'has-error',
		'clientOptions' => array (
				'validateOnSubmit' => true,
				'validateOnChange' => true,
				'errorCssClass' => 'has-error',
				'successCssClass' => 'has-success' ,
				'data-ajax' => false,
		) 
) );
?>

<h4 class="page-title">
	Bienvenido a nuestro programa Cliente Fiel, por favor digita tu n&uacute;mero de c&eacute;dula
</h4>

<div class="<?php echo $model->getContentClass() ?> c_form_rgs ui-body-c">
<fieldset>
		  <div class="ui-field-container">
	                    <?php echo $form->labelEx($model, 'cedula'); ?>
	                    <?php echo $form->textField($model, 'cedula', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('cedula'), 'class' => 'form-control')); ?>
	                    <?php echo $form->error($model, 'cedula', array("class" => "text-danger")); ?>
	                </div>
	                
	                <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r submit">
		    			Continuar
		        		<input class='' type="submit" data-enhanced="true" value="Continuar" data-ajax='false'/>
		        	</div>
		   
	</div>
</fieldset>
</div>


	
	
<?php $this->endWidget(); ?>