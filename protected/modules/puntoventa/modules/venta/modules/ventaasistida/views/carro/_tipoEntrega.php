<?php
        $form = $this->beginWidget('CActiveForm', array(
            'enableClientValidation' => true,
            'id' => "form-remitente",
            'htmlOptions' => array(
                'class' => 'form-horizontal'
            ),
            'errorMessageCssClass' => 'has-error',
            'clientOptions' => array(
                'validateOnSubmit' => true,
                'validateOnChange' => true,
                'errorCssClass' => 'has-error',
                'successCssClass' => 'has-success',
            ))
        );
        ?>
        
<div id="div-ubicacion-tipoentrega" class="center" style="padding:5px; ">
					<div class='row'>
						<?php echo $form->labelEx($modelPago, 'identificacionUsuario', array('class' => 'col-md-5 control-label')); ?>
			            <div class="col-md-7">
				            <?php echo $form->textField($modelPago, 'identificacionUsuario', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('cedulaRemitente'))); ?>
				            <?php echo $form->error($modelPago, 'identificacionUsuario', array('class' => 'text-danger')); ?>
			            </div>
		            </div>
		            <div class='row'>
			            <?php echo $form->labelEx($modelPago, 'nombreRemitente', array('class' => 'col-md-5 control-label')); ?>
			            <div class="col-md-7">
			            	<?php echo $form->textField($modelPago, 'nombreRemitente', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('nombreRemitente'))); ?>
			            	<?php echo $form->error($modelPago, 'nombreRemitente', array('class' => 'text-danger')); ?>
			            </div>
			        </div>
		            <div class='row'>
			            <?php echo $form->labelEx($modelPago, 'telefonoRemitente', array('class' => 'col-md-5 control-label')); ?>
				    	<div class="col-md-7">
				 		    <?php echo $form->textField($modelPago, 'telefonoRemitente', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('telefonoRemitente'))); ?>
						    <?php echo $form->error($modelPago, 'telefonoRemitente', array('class' => 'text-danger')); ?>
				        </div>
				    </div>
		            <div class='row'>      
			            <?php echo $form->labelEx($modelPago, 'correoRemitente', array('class' => 'col-md-5 control-label')); ?>
					    <div class="col-md-7">
						    <?php echo $form->textField($modelPago, 'correoRemitente', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoRemitente'))); ?>
						    <?php echo $form->error($modelPago, 'correoRemitente', array('class' => 'text-danger')); ?>
						</div>  
					</div>  
  </div>     



<?php $this->endWidget(); ?>