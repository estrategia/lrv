
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
	                    <?php echo $form->labelEx($model, 'cedula'); ?>
	                    <?php echo $form->textField($model, 'cedula', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('cedula'), 'class' => 'form-control')); ?>
	                    <?php echo $form->error($model, 'cedula', array("class" => "text-danger")); ?>
	                </div>
	
		<div class="form-group">
	                <?php echo $form->labelEx($model, 'nombre'); ?>
	                <?php echo $form->textField($model, 'nombre', array('placeholder' => $model->getAttributeLabel('nombre'), 'class' => 'form-control')); ?>
	                <?php echo $form->error($model, 'nombre', array("class" => "text-danger")); ?>
	    </div>
		<div class="form-group">
	                <?php echo $form->labelEx($model, 'apellido'); ?>
	                <?php echo $form->textField($model, 'apellido', array('placeholder' => $model->getAttributeLabel('apellido'), 'class' => 'form-control')); ?>
	                <?php echo $form->error($model, 'apellido', array("class" => "text-danger")); ?>
	   </div>
	   <div class="form-group">
	                <?php echo $form->labelEx($model, 'telefonoFijo'); ?>
	                <?php echo $form->textField($model, 'telefonoFijo', array('placeholder' => $model->getAttributeLabel('telefonoFijo'), 'class' => 'form-control')); ?>
	                <?php echo $form->error($model, 'telefonoFijo', array("class" => "text-danger")); ?>
	   </div>
	   <div class="form-group">
	                <?php echo $form->labelEx($model, 'telefonoCelular'); ?>
	                <?php echo $form->textField($model, 'telefonoCelular', array('placeholder' => $model->getAttributeLabel('telefonoCelular'), 'class' => 'form-control')); ?>
	                <?php echo $form->error($model, 'telefonoCelular', array("class" => "text-danger")); ?>
	   </div>
	   <div class="form-group">
	                <?php if ($model->getScenario() == 'actualizar') : ?>
	                    <?php echo $form->labelEx($model, 'correoElectronico'); ?>
	                    <?php echo $form->emailField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'), 'class' => 'form-control', 'disabled' => 'disabled')); ?>
	                    <?php echo $form->error($model, 'correoElectronico', array("class" => "text-danger")); ?>
	                <?php else: ?>
	                    <?php echo $form->labelEx($model, 'correoElectronico'); ?>
	                    <?php echo $form->emailField($model, 'correoElectronico', array('placeholder' => $model->getAttributeLabel('correoElectronico'), 'class' => 'form-control', 'maxlength' => 50)); ?>
	                    <?php echo $form->error($model, 'correoElectronico', array("class" => "text-danger")); ?>
	                <?php endif; ?>
	    </div>
	            
	
				<div class="form-group">
	            	<div class="space-1"></div>
	            		<?php echo $form->labelEx($model, 'genero'); ?>	
	            	 	<?php echo $form->radioButtonList($model,'genero',Yii::app()->params->generos, 
			        		array('labelOptions'=>array('style'=>'display:inline'), // add this code
   							 'separator'=>' ',)); ?>
	                    <?php echo $form->error($model, 'genero',  array("class" => "text-danger")); ?>
	            </div>
	
				<div class="form-group">
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
	
					<div class="form-group">
	                    <?php echo $form->labelEx($model, 'profesion', array('style' => 'display:block;')); ?>
	                    <?php echo $form->dropDownList($model, 'profesion', CHtml::listData(ProfesionCliente::listData(), 'codigoProfesion', 'nombreProfesion'), array('class'=>'form-control', 'prompt' => $model->getAttributeLabel('profesion'), 'encode' => false)); ?>
	                    <?php echo $form->error($model, 'profesion', array("class" => "text-danger")); ?>
	                </div>
	
				<div class="row">
			        <?php echo $form->labelEx($model,'tieneHijos'); ?>
			        <?php echo $form->radioButtonList($model,'tieneHijos',array('1'=>'Si', '0'=>'No',), 
			        		array('labelOptions'=>array('style'=>'display:inline'), // add this code
   								 'separator'=>'  ',)); ?>
			        <?php echo $form->error($model,'tieneHijos',  array("class" => "text-danger")); ?>
			    </div>
			    
			    <div class="row">
			        <?php echo $form->labelEx($model,'tieneMascotas'); ?>
			        <?php echo $form->radioButtonList($model,'tieneMascotas',array('1'=>'Si', '0'=>'No',), 
			        		array('labelOptions'=>array('style'=>'display:inline'), // add this code
   							 'separator'=>'  ',)); ?>
			        <?php echo $form->error($model,'tieneMascotas',  array("class" => "text-danger")); ?>
			    </div>
	
				<?php if ($model->isNewRecord) : ?>
	
	                <?php echo $form->checkBox($model, 'condiciones', array("style" => "display:block;float:left;")); ?>
	                <?php echo $form->labelEx($model, 'condiciones'); ?>
	                <?php echo $form->error($model, 'condiciones', array("class" => "text-danger")); ?>
					<div class="form-group">
	                    <?php echo CHtml::link('Ver condiciones', "#dialog-condiciones", array('class' => 'c_olv_pass', 'data-transition' => 'flip', 'data-toggle' => "modal", 'data-target' => "#modalTerminos")); ?>
	                </div>
	            <?php endif; ?>

	            
	</div>
</div>

<div class="row">
	<div class="col-md-4">
        <?php if ($model-isNewRecord): ?>
            <input class='btn btn-primary' type="submit" data-enhanced="true" value="Registrar">
        <?php else: ?>
            <input class='btn btn-primary' type="submit" data-enhanced="true" value="Guardar">
		<?php endif;?>
	</div>
</div>

<?php $this->endWidget(); ?>