<div class="modal fade" id="modal-categoria" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog"  style='width:50%' role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Categoria</h4>
          </div>
           <!-- <form id="form-categoria" method="post" name="cargarproducto" enctype="multipart/form-data"> -->
                
          <div class="modal-body" id='pre-contenido-modal'>  
               
              <?php
               $form = $this->beginWidget('CActiveForm', array(
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array(
                            'id' => "form-categoria",
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
                <?php echo $form->labelEx($model, 'nombreCategoriaTienda'); ?>
                <?php echo $form->textField($model, 'nombreCategoriaTienda', array('class' => 'nombreCategoriaTienda form-control')); ?>
                <?php echo $form->error($model, 'nombreCategoriaTienda'); ?>
              </div>
      
              <div class="form-group">
                <?php echo $form->labelEx($model, 'orden'); ?>
                <?php echo $form->textField($model, 'orden', array('class' => 'orden form-control')); ?>
                <?php echo $form->error($model, 'orden'); ?>
              </div>
              
              <div class="form-group">
                <?php echo $form->labelEx($model, 'visible'); ?>
                <?php echo $form->dropDownList($model, 'visible', Yii::app()->params->callcenter['categorias']['visible'] , array('class' => 'visible form-control')); ?>
                <?php echo $form->error($model, 'visible'); ?>
              </div>
              <?php if($nivel == 1):?>
                <div class="form-group">
                  <?php echo $form->labelEx($model, 'rutaImagen'); ?>
                  <?php echo CHtml::activeFileField($model, 'rutaImagen' , array('class' => 'rutaImagen')); ?>
                  <?php echo $form->error($model, 'rutaImagen'); ?>
                </div>
                <div class="form-group">
                  <?php echo $form->labelEx($model, 'rutaImagenMenu'); ?>
                  <?php echo CHtml::activeFileField($model, 'rutaImagenMenu' , array('class' => 'rutaImagenMenu')); ?>
                  <?php echo $form->error($model, 'rutaImagenMenu'); ?>
                </div>
              <?php endif;?>
              <?php  $this->endWidget();?>  
          </div>
          <div class="modal-footer">
              <?php if($scenario == 'crear'):?>
                <?php echo CHtml::link('Guardar Categoría','#', array('data-role' => 'guardar-categoria','data-categoria-raiz' => $idCategoriaRaiz, 'data-categoria-padre' => $idCategoriaPadre, 'data-dispositivo' => $dispositivo,'class' => "btn btn-success")); ?>
              <?php else:?>
               <?php echo CHtml::link('Actualizar Categoría','#', array('data-role' => 'actualizar-categoria','data-categoria-raiz' => $idCategoriaRaiz, 'data-categoria-padre' => $idCategoriaPadre, 'data-categoria' => $model->idCategoriaTienda , 'data-dispositivo' => $dispositivo,'class' => "btn btn-success")); ?>
              <?php endif;?>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        
          
          </div>
          <!--  </form> -->
              
        </div>
      </div>
    </div>