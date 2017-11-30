<div class="modal" id="modal-detalleproductoimagen">
    <div class="modal-dialog">
        <div class="modal-content">
        	<?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                'enableAjaxValidation' => false,
                'htmlOptions' => array(
                    'class' => 'form-horizontal',
                    'role' => 'form',
                    'id' => 'productodetalle-imagen-form',
                    'enctype' => 'multipart/form-data'
                ),
                'errorMessageCssClass' => 'has-error',
                'clientOptions' => array(
                    'validateOnSubmit' => true,
                    'errorCssClass' => 'has-error',
                    'successCssClass' => 'has-success',
                    'inputContainer' => '.form-group',
                    'validateOnChange' => true
                ))
            );
            ?>
        	
       		<div class="modal-header">
              	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
               	<h4 class="modal-title"></h4><br>
            </div>
        
        
            <div class="modal-body">
            	<?php if (!$model->isNewRecord): ?>
                    <?php echo $form->hiddenField($model, 'idProductoDetalleImagen'); ?>
                <?php endif; ?>
                <?php echo $form->hiddenField($model, 'idProductoDetalle'); ?>
                <?php echo $form->hiddenField($model, 'codigoProducto'); ?>
                
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'tituloImagen', array('class' => 'col-lg-4 control-label text-primary')); ?>
                    <div class="col-lg-7">
                        <?php echo $form->textField($model, 'tituloImagen', array('class' => 'form-control input-sm', 'maxlength' => 45)); ?>
                        <?php echo $form->error($model, 'tituloImagen', array('class' => 'text-left text-danger')); ?>
                    </div>
                </div>
        
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'rutaImagenEscritorio', array('class' => 'col-lg-4 control-label text-primary')); ?>
                    <div class="col-lg-7">
                        <?php echo $form->fileField($model, 'rutaImagenEscritorio'); ?>
                        <?php echo $form->error($model, 'rutaImagenEscritorio', array('class' => 'text-left text-danger')); ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <?php echo $form->labelEx($model, 'rutaImagenMovil', array('class' => 'col-lg-4 control-label text-primary')); ?>
                    <div class="col-lg-7">
                        <?php echo $form->fileField($model, 'rutaImagenMovil'); ?>
                        <?php echo $form->error($model, 'rutaImagenMovil', array('class' => 'text-left text-danger')); ?>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer center">
            	<?php
                    echo CHtml::ajaxButton($model->isNewRecord ? 'Crear' : 'Editar', $model->isNewRecord ? Yii::app()->createUrl('/callcenter/productoDetalleImagenes/crear') : Yii::app()->createUrl('/callcenter/productoDetalleImagenes/editar'), array(
                        'beforeSend' => new CJavaScriptExpression("function(){Loading.show();}"),
                        'type' => 'POST',
                        'dataType' => 'json',
                        'processData' => false,
                        'contentType' => false,
                        'data' => 'js: new FormData( document.getElementById(\'productodetalle-imagen-form\') )',
                        'success' => new CJavaScriptExpression("function(data){
                            if(data.result=='ok'){
                                $.fn.yiiGridView.update('productodetalleimagen-grid');
                                $('#modal-detalleproductoimagen').modal('hide');
                            }else if(data.result=='error'){
                                bootbox.alert(obj.response);
                            }else{
                                $.each(data,function(element,error){
                                    $('#'+element+'_em_').html(error);
                                    $('#'+element+'_em_').css('display','block');
                                });
                            }
                            Loading.hide();
                        }"),
                        'error' => new CJavaScriptExpression("function(data){
                            Loading.hide();
                            $('#modal-detalleproductoimagen').modal('hide');
                            $('#modal-detalleproductoimagen').remove();
                            bootbox.alert('Error, intente de nuevo');
                        }")),
                        array('id' => uniqid(), 'class' => 'btn btn-primary')
                    );
                ?>
            
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
            <?php $this->endWidget(); ?>
		</div>
    </div>
</div>