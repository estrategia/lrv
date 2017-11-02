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
		            
			            <?php echo $form->labelEx($modelPago, 'nombre', array('class' => 'col-md-5 control-label')); ?>
			            <div class="col-md-7">
			            	<?php echo $form->textField($modelPago, 'nombre', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('nombre'))); ?>
			            	<?php echo $form->error($modelPago, 'nombre', array('class' => 'text-danger')); ?>
			            </div>
			             <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'telefono', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'telefono', array('class' => 'form-control', 'maxlength' => 11, 'placeholder' => $modelPago->getAttributeLabel('telefono'))); ?>
                <?php echo $form->error($modelPago, 'telefono', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'extension', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'extension', array('class' => 'form-control', 'maxlength' => 5, 'placeholder' => $modelPago->getAttributeLabel('extension'))); ?>
                <?php echo $form->error($modelPago, 'extension', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'celular', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'celular', array('class' => 'form-control', 'maxlength' => 20, 'placeholder' => $modelPago->getAttributeLabel('celular'))); ?>
                <?php echo $form->error($modelPago, 'celular', array('class' => 'text-danger')); ?>
            </div>
        </div>
			            
			        
			            <?php echo $form->labelEx($modelPago, 'correoRemitente', array('class' => 'col-md-5 control-label')); ?>
					    <div class="col-md-7">
						    <?php echo $form->textField($modelPago, 'correoRemitente', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('correoRemitente'))); ?>
						    <?php echo $form->error($modelPago, 'correoRemitente', array('class' => 'text-danger')); ?>
						</div>
						<div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'direccion', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'direccion', array('class' => 'form-control', 'maxlength' => 100, 'placeholder' => $modelPago->getAttributeLabel('direccion'))); ?>
                <?php echo $form->error($modelPago, 'direccion', array('class' => 'text-danger')); ?>
            </div>
        </div>

        <div class="form-group form-group-sm">
            <?php echo $form->labelEx($modelPago, 'barrio', array('class' => 'col-md-5 control-label')); ?>
            <div class="col-md-7">
                <?php echo $form->textField($modelPago, 'barrio', array('class' => 'form-control', 'maxlength' => 50, 'placeholder' => $modelPago->getAttributeLabel('barrio'))); ?>
                <?php echo $form->error($modelPago, 'barrio', array('class' => 'text-danger')); ?>
            </div>
        </div>

       
	  </div>
</div>


<?php $this->endWidget(); ?>