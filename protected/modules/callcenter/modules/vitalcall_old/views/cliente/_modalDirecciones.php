

<div class="modal fade" id="modal-direccion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
 <?php
		$form = $this->beginWidget ( 'CActiveForm', array (
				'enableClientValidation' => true,
				'enableAjaxValidation' => false,
				'htmlOptions' => array (
						'id' => 'direcciones-form',
						'role' => 'form' 
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
      <div class="modal-dialog"  style='width:50%' role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Direcciones de despacho</h4>
          </div>
          <div class="modal-body" id='pre-contenido-modal' style='overflow-y: auto;max-height: 60%' >
   

					<?php echo $form->errorSummary($model, null, null, array('class' => 'text-danger')); ?>
					<?php echo $form->hiddenField($model, 'identificacionUsuario'); ?>
					<div class="form-group">
					    <?php echo $form->labelEx($model, 'direccion'); ?>
					    <?php  echo $form->textField($model, 'direccion', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
					    <?php echo $form->error ( $model, 'direccion', array ( 'class' => 'text-danger')); ?>
					    
					    
					</div>
					
					<div class="form-group">
					    <?php echo $form->labelEx($model, 'barrio'); ?>
					    <?php echo $form->textField($model, 'barrio', array('class' => 'form-control')); ?>
					    <?php echo $form->error($model, 'barrio', array('class' => 'text-danger')); ?>
					    
					</div>
					
					<div class="form-group">
					    <?php echo $form->labelEx($model, 'codigoCiudad'); ?>
					    <?php echo $form->dropDownList($model, 'codigoCiudad', CHtml::listData(Ciudad::model()->findAll(), 'codigoCiudad', 'nombreCiudad'),
					    				array('class' => 'form-control')); ?>
					    <?php echo $form->error($model, 'codigoCiudad', array('class' => 'text-danger')); ?>
					</div>
					
					<?php echo CHtml::button('Georeferenciaci&oacute;n', array('class' => "btn btn-primary", 'data-role' => 'buscar-direccion')); ?>
					<?php echo CHtml::button('Busqueda por barrio', array('class' => "btn btn-primary", 'data-role' => 'buscar-barrio' )); ?>
					<div id='georeferencia'></div>
						<div class="form-group">
						    <?php echo $form->labelEx($model, 'codigoSector'); ?>
						    <div id="div-sector">
						    <?php echo $form->dropDownList($model, 'codigoSector', $model->listaSectores,array('class' => 'form-control')); ?>
						    </div>
						    <?php echo $form->error($model, 'codigoSector', array('class' => 'text-danger')); ?>
						</div>
					
          </div>
          <div class="modal-footer"> 
          	<?php echo CHtml::button($model->isNewRecord ? 'Guardar' : 'Actualizar', array('class' => "btn btn-primary", 'data-role' => $model->isNewRecord ? 'guardar-direccion': 'actualizar-direccion', 'data-direccion' => $model->idDireccionesDespachoVitalCall)); ?>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
      	<?php $this->endWidget(); ?>
</div>

