<?php
$form = $this->beginWidget ( 'CActiveForm', array (
    'enableClientValidation' => true,
    'htmlOptions' => array (
        'id' => "form-registro-clientefiel",
        'class' => "ui-bar ui-bar-a ui-corner-all",
        'data-ajax' => "false"
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

<h4 class="page-tile">
	A continuaci&oacute;n, completa este formulario con tus datos y verifica que la informaci&oacute;n est&eacute; actualizada.
</h4>


<div class="<?php echo $model->getContentClass() ?> c_form_rgs ui-body-c">
    	<fieldset class="form">
	    <div class="ui-field-container">
		    <?php echo $form->labelEx($model, 'cedula'); ?>
	        <?php echo $form->textField($model, 'cedula', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('cedula'), 'class' => 'form-control')); ?>
	        <?php echo $form->error($model, 'cedula'); ?>
	    </div>
	
		<div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'nombre'); ?>
	        <?php echo $form->textField($model, 'nombre', array('placeholder' => $model->getAttributeLabel('nombre'), 'class' => 'form-control')); ?>
	        <?php echo $form->error($model, 'nombre'); ?>
	    </div>
		  <div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'apellido'); ?>
	        <?php echo $form->textField($model, 'apellido', array('placeholder' => $model->getAttributeLabel('apellido'), 'class' => 'form-control')); ?>
	        <?php echo $form->error($model, 'apellido'); ?>
	   </div>
	     <div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'telefonoFijo'); ?>
	        <?php echo $form->textField($model, 'telefonoFijo', array('placeholder' => $model->getAttributeLabel('telefonoFijo'), 'class' => 'form-control')); ?>
	        <?php echo $form->error($model, 'telefonoFijo'); ?>
	   </div>
	     <div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'telefonoCelular'); ?>
	        <?php echo $form->textField($model, 'telefonoCelular', array('placeholder' => $model->getAttributeLabel('telefonoCelular'), 'class' => 'form-control')); ?>
	        <?php echo $form->error($model, 'telefonoCelular'); ?>
	   </div>
	     <div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'correoElectronico'); ?>
	        <?php echo $form->emailField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'), 'class' => 'form-control', 'maxlength' => 50)); ?>
	        <?php echo $form->error($model, 'correoElectronico'); ?>
	    </div>
	            
		<div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'genero'); ?>	
	        <?php echo $form->dropDownList($model,'genero',Yii::app()->params->generos); ?>
	        <?php echo $form->error($model, 'genero'); ?>
	    </div>
	
	  	<div class="ui-field-container">
            <?php echo $form->labelEx($model, 'fechaNacimiento'); ?>
            <?php echo $form->dateField($model, 'fechaNacimiento', array('placeholder' => 'yyyy-mm-dd')); ?>
            <?php echo $form->error($model, 'fechaNacimiento'); ?>
        </div>
        
        <div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'ciudad', array('style' => 'display:block;')); ?>
	        <?php echo $form->dropDownList($model, 'ciudad', $listCiudad, array('class'=>'form-control', 'prompt' => $model->getAttributeLabel('ciudad'), 'encode' => false)); ?>
	        <?php echo $form->error($model, 'ciudad'); ?>
	    </div>
	
		<div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'profesion', array('style' => 'display:block;')); ?>
	        <?php echo $form->dropDownList($model, 'profesion', $listProfesion, array('class'=>'form-control', 'prompt' => $model->getAttributeLabel('profesion'), 'encode' => false)); ?>
	        <?php echo $form->error($model, 'profesion'); ?>

	    </div>
	    
	    <div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'ocupacion', array('style' => 'display:block;')); ?>
	        <?php echo $form->dropDownList($model, 'ocupacion', $listOcupacion, array('class'=>'form-control', 'prompt' => $model->getAttributeLabel('ocupacion'), 'encode' => false)); ?>
	        <?php echo $form->error($model, 'ocupacion'); ?>
	    </div>
	
		<div class="ui-field-container">
	        <?php echo $form->labelEx($model,'tieneHijos'); ?>
	        <?php echo $form->dropDownList($model,'tieneHijos',array('1'=>'Si', '0'=>'No')); ?>
	        <?php echo $form->error($model,'tieneHijos'); ?>
	    </div>
			    
	    <div class="ui-field-container">
	        <?php echo $form->labelEx($model,'tieneMascotas'); ?>
	        <?php echo $form->dropDownList($model,'tieneMascotas',array('1'=>'Si', '0'=>'No')); ?>
	        <?php echo $form->error($model,'tieneMascotas'); ?>
	    </div>
			    
	    <?php if(isset($modelUsuario)):?>
		    Escribe una contrase&ntilde;a de m&iacute;nimo 5 caracteres y &uacute;sala para ingresar a 
			nuestro programa Cliente fiel y  realizar las compras que desees desde nuestra tienda virtual.

			<div class="ui-field-container">
                <?php echo $form->labelEx($modelUsuario, 'clave'); ?>
                <?php echo $form->passwordField($modelUsuario, 'clave', array('placeholder' => $modelUsuario->getAttributeLabel('clave'), 'class' => 'form-control')); ?>
                <?php echo $form->error($modelUsuario, 'clave'); ?>
   			</div>
		    
		    <div class="ui-field-container">
                <?php echo $form->labelEx($modelUsuario, 'claveConfirmar'); ?>
                <?php echo $form->passwordField($modelUsuario, 'claveConfirmar', array('placeholder' => $modelUsuario->getAttributeLabel('claveConfirmar'), 'class' => 'form-control')); ?>
                <?php echo $form->error($modelUsuario, 'claveConfirmar'); ?>
   			</div>
	    <?php endif;?>

		<?php if ($model->getScenario()) : ?>
			<div class="ui-field-container">
				<?php echo $form->labelEx($model, 'condiciones', array('class' => '')); ?>
				<?php echo $form->checkBox($model, 'condiciones', array('data-mini' => 'true')); ?>
				<?php echo $form->error($model, 'condiciones'); ?>
			</div>
        <?php endif; ?>
        
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-a">
        		Guardar
        		<input type="submit" data-enhanced="true" value="Guardar">
        </div>

</fieldset>
</div>
<?php $this->endWidget(); ?>