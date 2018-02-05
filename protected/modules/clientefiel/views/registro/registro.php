<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'enableClientValidation' => true,
		'htmlOptions' => array (
				'id' => "form-registro",
				'class' => "",
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
	                    <?php echo $form->error($model, 'cedula', array("class" => "text-danger")); ?>
	                </div>
	
		  <div class="ui-field-container">
	                <?php echo $form->labelEx($model, 'nombre'); ?>
	                <?php echo $form->textField($model, 'nombre', array('placeholder' => $model->getAttributeLabel('nombre'), 'class' => 'form-control')); ?>
	                <?php echo $form->error($model, 'nombre', array("class" => "text-danger")); ?>
	    </div>
		  <div class="ui-field-container">
	                <?php echo $form->labelEx($model, 'apellido'); ?>
	                <?php echo $form->textField($model, 'apellido', array('placeholder' => $model->getAttributeLabel('apellido'), 'class' => 'form-control')); ?>
	                <?php echo $form->error($model, 'apellido', array("class" => "text-danger")); ?>
	   </div>
	     <div class="ui-field-container">
	                <?php echo $form->labelEx($model, 'telefonoFijo'); ?>
	                <?php echo $form->textField($model, 'telefonoFijo', array('placeholder' => $model->getAttributeLabel('telefonoFijo'), 'class' => 'form-control')); ?>
	                <?php echo $form->error($model, 'telefonoFijo', array("class" => "text-danger")); ?>
	   </div>
	     <div class="ui-field-container">
	                <?php echo $form->labelEx($model, 'telefonoCelular'); ?>
	                <?php echo $form->textField($model, 'telefonoCelular', array('placeholder' => $model->getAttributeLabel('telefonoCelular'), 'class' => 'form-control')); ?>
	                <?php echo $form->error($model, 'telefonoCelular', array("class" => "text-danger")); ?>
	   </div>
	     <div class="ui-field-container">
	                <?php echo $form->labelEx($model, 'correoElectronico'); ?>
	                <?php echo $form->emailField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'), 'class' => 'form-control', 'maxlength' => 50)); ?>
	                <?php echo $form->error($model, 'correoElectronico', array("class" => "text-danger")); ?>
	    </div>
	            
		  <div class="ui-field-container">
	            		<?php echo $form->labelEx($model, 'genero'); ?>	
	            	 	<?php echo $form->dropDownList($model,'genero',Yii::app()->params->generos); ?>
	                    <?php echo $form->error($model, 'genero',  array("class" => "text-danger")); ?>
	            </div>
	
	  	 <div class="ui-field-container">
            <?php echo $form->labelEx($model, 'fechaNacimiento'); ?>
            <?php //echo $form->textField($model, 'fechaNacimiento',array('class'=>'form-control')); ?>
            <?php
				$this->widget ( 'zii.widgets.jui.CJuiDatePicker', array (
								'model' => $model,
								'attribute' => 'fechaNacimiento',
								'language' => 'es',
								'options' => array (
								'showAnim' => 'slide',
								'dateFormat' => 'yy-mm-dd',
								"changeYear" => true,
								"changeMonth" => true,
								"yearRange" => "1900:2015" 
								),
							'htmlOptions' => array (
							'class' => 'form-control',
							'size' => '10',
							'maxlength' => '10',
							'placeholder' => 'yyyy-mm-dd' 
				)) );
																		?>

            <?php echo $form->error($model, 'fechaNacimiento',  array("class" => "text-danger")); ?>

        </div>
        
        <div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'ciudad', array('style' => 'display:block;')); ?>
	        <?php echo $form->dropDownList($model, 'ciudad', $listCiudad, array('class'=>'form-control', 'prompt' => $model->getAttributeLabel('ciudad'), 'encode' => false)); ?>
	        <?php echo $form->error($model, 'ciudad', array("class" => "text-danger")); ?>
	    </div>
	
		<div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'profesion', array('style' => 'display:block;')); ?>
	        <?php echo $form->dropDownList($model, 'profesion', $listProfesion, array('class'=>'form-control', 'prompt' => $model->getAttributeLabel('profesion'), 'encode' => false)); ?>
	        <?php echo $form->error($model, 'profesion', array("class" => "text-danger")); ?>

	    </div>
	    
	    <div class="ui-field-container">
	        <?php echo $form->labelEx($model, 'ocupacion', array('style' => 'display:block;')); ?>
	        <?php echo $form->dropDownList($model, 'ocupacion', $listOcupacion, array('class'=>'form-control', 'prompt' => $model->getAttributeLabel('ocupacion'), 'encode' => false)); ?>
	        <?php echo $form->error($model, 'ocupacion', array("class" => "text-danger")); ?>
	    </div>
	
		<div class="ui-field-container">
	        <?php echo $form->labelEx($model,'tieneHijos'); ?>
	        <?php echo $form->dropDownList($model,'tieneHijos',array('1'=>'Si', '0'=>'No')); ?>
	        <?php echo $form->error($model,'tieneHijos',  array("class" => "text-danger")); ?>
	    </div>
			    
	    <div class="ui-field-container">
	        <?php echo $form->labelEx($model,'tieneMascotas'); ?>
	        <?php echo $form->dropDownList($model,'tieneMascotas',array('1'=>'Si', '0'=>'No')); ?>
	        <?php echo $form->error($model,'tieneMascotas',  array("class" => "text-danger")); ?>
	    </div>
			    
	    <?php if(isset($modelUsuario)):?>
		    Escribe una contrase&ntilde;a de m&iacute;nimo 5 caracteres y &uacute;sala para ingresar a 
			nuestro programa Cliente fiel y  realizar las compras que desees desde nuestra tienda virtual.

			<div class="ui-field-container">
                <?php echo $form->labelEx($modelUsuario, 'clave'); ?>
                <?php echo $form->passwordField($modelUsuario, 'clave', array('placeholder' => $modelUsuario->getAttributeLabel('clave'), 'class' => 'form-control')); ?>
                <?php echo $form->error($modelUsuario, 'clave', array("class" => "text-danger")); ?>
   			</div>
		    
		    <div class="ui-field-container">
                <?php echo $form->labelEx($modelUsuario, 'claveConfirmar'); ?>
                <?php echo $form->passwordField($modelUsuario, 'claveConfirmar', array('placeholder' => $modelUsuario->getAttributeLabel('claveConfirmar'), 'class' => 'form-control')); ?>
                <?php echo $form->error($modelUsuario, 'claveConfirmar', array("class" => "text-danger")); ?>
   			</div>
	    <?php endif;?>
			    


		<?php if ($model->getScenario()) : ?>
			
			<div class="input-condiciones">
                <?php echo $form->checkBox($model, 'condiciones', array('style' => 'display: none;')); ?>
                <?php echo $form->labelEx($model, 'condiciones'); ?>
                <?php echo $form->error($model, 'condiciones', array("class" => "text-danger")); ?>
                <?php echo CHtml::link('Ver condiciones', "#dialog-condiciones", array('class' => 'c_olv_pass', 'data-transition' => 'flip')); ?>
            </div>
        <?php endif; ?>


		<div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r submit">
		    <?php if ($model->getScenario()): ?>
		    	Guardar
		        <input class='' type="submit" data-enhanced="true" value="Registrar">
		    <?php else: ?>
		    	Guardar
		        <input class='' type="submit" data-enhanced="true" value="Registrar">
			<?php endif;?>
	</div>
</fieldset>
</div>
<?php $this->endWidget(); ?>