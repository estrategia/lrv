
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
		<h4><b>A continuaci&oacute;n, completa este formulario con tus datos y verifica que la informaci&oacute;n est&eacute; actualizada.
		</b></h4>
</div>
<div class="form">
	
	<div class="form-section">
		<div class="form-input">
		    <?php echo $form->textField($model, 'cedula', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('cedula'))); ?>
		    <?php echo $form->error($model, 'cedula', array("class" => "text-danger")); ?>
		</div>

		<div class="form-input">
		    <?php echo $form->textField($model, 'nombre', array('placeholder' => $model->getAttributeLabel('nombre'))); ?>
		    <?php echo $form->error($model, 'nombre', array("class" => "text-danger")); ?>
		</div>

		<div class="form-input">
		    <?php echo $form->textField($model, 'apellido', array('placeholder' => $model->getAttributeLabel('apellido'))); ?>
		    <?php echo $form->error($model, 'apellido', array("class" => "text-danger")); ?>
		</div>

		<div class="form-input">
		    <?php echo $form->textField($model, 'telefonoFijo', array('placeholder' => $model->getAttributeLabel('telefonoFijo'))); ?>
		    <?php echo $form->error($model, 'telefonoFijo', array("class" => "text-danger")); ?>
		</div>

		<div class="form-input">
		    <?php echo $form->textField($model, 'telefonoCelular', array('placeholder' => $model->getAttributeLabel('telefonoCelular'))); ?>
		    <?php echo $form->error($model, 'telefonoCelular', array("class" => "text-danger")); ?>
		</div>

		<div class="form-input">
		    <?php echo $form->emailField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'), 'maxlength' => 50)); ?>
		    <?php echo $form->error($model, 'correoElectronico', array("class" => "text-danger")); ?>
		</div>

		<div class="form-input">
		 	<?php echo $form->dropDownList($model,'genero',Yii::app()->params->generos, ['empty' => 'Genero']) ?>
	        <?php echo $form->error($model, 'genero',  array("class" => "text-danger")); ?>
		</div>
		        
	</div>

	<div class="form-section">

		<div class="form-input">
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
						'size' => '10',
						'maxlength' => '10',
						'placeholder' => 'Fecha de Nacimiento' 
					)
				));
			?>
		    <?php echo $form->error($model, 'fechaNacimiento',  array("class" => "text-danger")); ?>
		</div>

		<div class="form-input">
	        <?php echo Select2::activeDropDownList($model, 'ciudad', $listCiudad, array('prompt' => 'Seleccione ciudad ...', 'style' => 'width: 100%;')) ?>
	        <?php echo $form->error($model, 'ciudad', array("class" => "text-danger")); ?>
	    </div>
	    
		<div class="form-input">
	        <?php echo Select2::activeDropDownList($model, 'profesion', $listProfesion, array('prompt' => 'Seleccione profesi&oacute;n ...', 'style' => 'width: 100%;')) ?>
	        <?php echo $form->error($model, 'profesion', array("class" => "text-danger")); ?>
	    </div>
	    
	    <div class="form-input">
	        <?php echo Select2::activeDropDownList($model, 'ocupacion', $listOcupacion, array('prompt' => 'Seleccione ocupac&oacute;n ...', 'style' => 'width: 100%;')) ?>
	        <?php echo $form->error($model, 'ocupacion', array("class" => "text-danger")); ?>
	    </div>

	    <div class="form-input">
		        <?php echo $form->dropDownList($model,'tieneHijos', ['1'=>'Si', '0'=>'No'], ['empty' => 'Tiene Hijos']); ?>
		        <?php echo $form->error($model,'tieneHijos',  array("class" => "text-danger")); ?>
		    </div>
		    
	    <div class="form-input">
	    	<?php echo $form->dropDownList($model,'tieneMascotas', ['1'=>'Si', '0'=>'No'], ['empty' => 'Tiene Mascotas']); ?>
	        <?php echo $form->error($model,'tieneMascotas',  array("class" => "text-danger")); ?>
	    </div>
	</div>
</div>
<?php if(isset($modelUsuario)):?>
	<div class="form">
		<div class="form-section">
			<h4>Escribe una contrase&ntilde;a de m&iacute;nimo 5 caracteres y &uacute;sala para ingresar a 
nuestro programa Cliente fiel y  realizar las compras que desees desde nuestra tienda virtual.	</h4>
		</div>
	</div>
	<div class="form">
		<div class="form-section">
			<div class="form-input">
	            <?php echo $form->passwordField($modelUsuario, 'clave', array('placeholder' => $modelUsuario->getAttributeLabel('clave'))); ?>
	            <?php echo $form->error($modelUsuario, 'clave', array("class" => "text-danger")); ?>
		   </div>
		</div>		
		<div class="form-section">
		   <div class="form-input">
	            <?php echo $form->passwordField($modelUsuario, 'claveConfirmar', array('placeholder' => $modelUsuario->getAttributeLabel('claveConfirmar'))); ?>
	            <?php echo $form->error($modelUsuario, 'claveConfirmar', array("class" => "text-danger")); ?>
		   </div>
		</div>		
	</div>
	
<?php endif;?>

	<?php if($model->solicitarVerificacion):?>
		
		<div class="form">
				<div class="form-section">
					<div class="form-input">
			            <?php echo $form->textField($model, 'codigoVerificacion', array('placeholder' => $model->getAttributeLabel('codigoVerificacion'))); ?>
			            <?php echo $form->error($model, 'codigoVerificacion', array("class" => "text-danger")); ?>
				   </div>
				</div>
		</div>
		<div class="form">
				<div class="form-section">
					<div class="form-input">
						 <a class='button-form' data-role='enviar-mensaje-verificacion' data-tipo='1'  type="button" data-enhanced="true" href="#">Enviar C&oacute;digo de verificaci&oacute;n</a>
					</div>
				</div>
		</div>
	<?php endif;?>
</div>

<div class="terms-conditions">
	<h4> <b>Acepto los términos y condiciones</b></h4>
	<?php if ($model->getScenario()) : ?>
	    <?php echo $form->checkBox($model, 'condiciones'); ?>
	    <?php echo $form->error($model, 'condiciones', array("class" => "text-danger")); ?>
		<div class="form-input">
	        <?php CHtml::link('Ver condiciones', "#dialog-condiciones", array('class' => 'c_olv_pass', 'data-transition' => 'flip', 'data-toggle' => "modal", 'data-target' => "#modalTerminos")); ?>
	    </div>
	<?php endif; ?>
</div>


<div class="form-action">
	<?php if ($model->getScenario()): ?>
	    <input class='button-form' type="submit" data-enhanced="true" value="Guardar">
	<?php else: ?>
	    <input class='button-form' type="submit" data-enhanced="true" value="Guardar">
	<?php endif;?>
</div>

<?php $this->endWidget(); ?>