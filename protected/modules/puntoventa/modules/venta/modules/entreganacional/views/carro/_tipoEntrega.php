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
    Datos del remitente:
    <div class="form-group form-group-sm">
    				    <?php echo $form->labelEx($modelPago, 'identificacionUsuario', array('class' => 'col-md-5 control-label')); ?>
			            <div class="col-md-7">
				            <?php echo $form->textField($modelPago, 'identificacionUsuario', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('cedulaRemitente'))); ?>
				            <?php echo $form->error($modelPago, 'identificacionUsuario', array('class' => 'text-danger')); ?>
			            </div>
		            
			            <?php echo $form->labelEx($modelPago, 'nombreRemitente', array('class' => 'col-md-5 control-label')); ?>
			            <div class="col-md-7">
			            	<?php echo $form->textField($modelPago, 'nombreRemitente', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('nombreRemitente'))); ?>
			            	<?php echo $form->error($modelPago, 'nombreRemitente', array('class' => 'text-danger')); ?>
			            </div>
			            
			            <?php echo $form->labelEx($modelPago, 'telefonoRemitente', array('class' => 'col-md-5 control-label')); ?>
				    	<div class="col-md-7">
				 		    <?php echo $form->textField($modelPago, 'telefonoRemitente', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('telefonoRemitente'))); ?>
						    <?php echo $form->error($modelPago, 'telefonoRemitente', array('class' => 'text-danger')); ?>
				        </div>
				          
			            <?php echo $form->labelEx($modelPago, 'correoRemitente', array('class' => 'col-md-5 control-label')); ?>
					    <div class="col-md-7">
						    <?php echo $form->textField($modelPago, 'correoRemitente', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoRemitente'))); ?>
						    <?php echo $form->error($modelPago, 'correoRemitente', array('class' => 'text-danger')); ?>
						</div>
						
		         <div class="col-md-5">   
		     	Recogida:
		     	</div>
		     	<div class="col-md-7">
			     	 <input type='radio' id='FormaPagoEntregaNacionalForm_recogida' value='1' name='FormaPagoEntregaNacionalForm[recogida]' <?php echo ($modelPago->recogida == 1)?"checked":""?>/> Si
				     <input type='radio' id='FormaPagoEntregaNacionalForm_recogida' value='0' name='FormaPagoEntregaNacionalForm[recogida]' <?php echo ($modelPago->recogida == 0)?"checked":""?>/> No
				     <?php echo $form->error($modelPago, 'recogida', array('class' => 'text-danger')); ?>
			    </div>
			     <div id='recogida' class='<?php echo ($modelPago->recogida == 0)?"display-none":""?>'>
				    		          
				                <?php echo $form->labelEx($modelPago, 'direccionRemitente', array('class' => 'col-md-5 control-label')); ?>
				                <div class="col-md-7">
						            <?php echo $form->textField($modelPago, 'direccionRemitente', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('direccionRemitente'))); ?>
						            <?php echo $form->error($modelPago, 'direccionRemitente', array('class' => 'text-danger')); ?>
				            	</div>
				    		    <?php echo $form->labelEx($modelPago, 'barrioRemitente', array('class' => 'col-md-5 control-label')); ?>
					            <div class="col-md-7">
					            	<?php echo $form->textField($modelPago, 'barrioRemitente', array('class' => 'col-md-5 form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('barrioRemitente'))); ?>
					            	<?php echo $form->error($modelPago, 'barrioRemitente', array('class' => 'text-danger')); ?>
				                </div>
				                
				</div>
	  </div>
</div>


<?php $this->endWidget(); ?>