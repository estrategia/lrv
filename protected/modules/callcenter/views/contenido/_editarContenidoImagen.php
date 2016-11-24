<div class="modal fade" id="modal-editar-imagen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog"  style='width:50%' role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Editar Contenido Imagen</h4>
          </div> 
          <div class="modal-body" id='pre-contenido-modal'>  
              <?php
               $form = $this->beginWidget('CActiveForm', array(
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array(
                            'id' => "form-editar-imagen",
                            'role' => 'form',
                            'enctype' => 'multipart/form-data'
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
            
              <div class="form-group">
                <?php echo $form->labelEx($modelImagen, 'orden'); ?>
                <?php echo $form->textField($modelImagen, 'orden', array('class' => 'orden form-control')); ?>
                <?php echo $form->error($modelImagen, 'orden'); ?>
            </div>

           <div class="form-group">
                <?php echo $form->labelEx($modelImagen, 'tipoContenido'); ?>
                <?php echo $form->dropDownList($modelImagen, 'tipoContenido', Yii::app()->params->callcenter['modulosConfigurados']['tiposContenidos'],  
                                                array('prompt' => 'Seleccione...', 'class' => 'tipoContenido form-control', 'data-role' => 'validar-editar-contenido')); ?>
                <?php echo $form->error($modelImagen, 'tipoContenido'); ?>
            </div>
            <div id='div-contenido-imagen-editar' style="display: <?php echo ($modelImagen->tipoContenido == ImagenBanner::CONTENIDO_HTML || $modelImagen->tipoContenido == ImagenBanner::CONTENIDO_LINK)? 'block': 'none'?>">
                    <div class="form-group">
                        <?php echo $form->labelEx($modelImagen, 'contenido'); ?>
                        <?php echo $form->textArea($modelImagen, 'contenido', array('class' => 'contenido form-control')); ?>
                        <?php echo $form->error($modelImagen, 'contenido'); ?>
                    </div>
                
                    <div class="form-group">
                        <?php echo $form->labelEx($modelImagen, 'contenidoMovil'); ?>
                        <?php echo $form->textArea($modelImagen, 'contenidoMovil', array('class' => 'contenidoMovil form-control')); ?>
                        <?php echo $form->error($modelImagen, 'contenidoMovil'); ?>
                    </div>
            </div>

              <?php  $this->endWidget();?>  
          </div>
          <div class="modal-footer">
                <?php echo CHtml::link('Guardar Cambios','#', array('data-role' => 'guardar-editar-imagen','data-banner' => $modelImagen->idBanner,'class' => "btn btn-success")); ?>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          </div>
          <!--  </form> -->
              
        </div>
      </div>
    </div>