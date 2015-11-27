<div class="modal fade" id="modal-tarifas-domicilio" tabindex="-1" role="dialog" aria-labelledby="modal-productos-busqueda-label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center"><?php echo $model->isNewRecord ? 'Crear ' : 'Actualizar ' ?> tarifa</h4>
            </div>
            <div class="modal-body body-scroll">
                <div class="row">
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'enableClientValidation' => true,
                    'enableAjaxValidation' => false,
                    'htmlOptions' => array(
                        'id' => "tarifa-domicilio-form",
                        'role' => 'form',
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
                <?php if(!$model->isNewRecord): ?>
                    <?php echo CHtml::activeHiddenField($model, 'idDomicilio', array('class' => 'form-control'))?>
                <?php endif; ?>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'valorDomicilio'); ?><div class="space-1"></div>
                            <?php echo $form->textField($model, 'valorDomicilio', array('class' => 'form-control'))?>
                            <?php echo $form->error($model, 'valorDomicilio'); ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'fechaInicio'); ?>
                            <?php 
                                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                                    'model' => $model,
                                    'attribute' => 'fechaInicio',
                                    'language' => 'es',
                                    'options' => array(
                                        'showAnim' => 'slide',
                                        'dateFormat' => 'yy-mm-dd',
                                        'timeFormat' => 'hh:mm',
                                        "changeYear" => true,
                                        "changeMonth" => true,
                                        "changeHour" => true,
                                        'hourMin' => 0,
                                        'hourMax' => 24,
                                        'minuteMin' => 0,
                                        'minuteMax' => 60,
                                        'timeFormat' => 'hh:mm',
                                        "yearRange" => Date("Y").":".(Date("Y")+1)
                                    ),
                                    'htmlOptions' => array(
                                        'class' => 'form-control',
                                        'size' => '15',
                                        'maxlength' => '15',
                                        'placeholder' => 'yyyy-mm-dd hh:mm',
                                    ),
                                ));
                            ?>
                            <?php echo $form->error($model, 'fechaInicio'); ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'fechaFin'); ?>
                            <?php 
                                $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                                    'model' => $model,
                                    'attribute' => 'fechaFin',
                                    'language' => 'es',
                                    'options' => array(
                                        'showAnim' => 'slide',
                                        'dateFormat' => 'yy-mm-dd',
                                        'timeFormat' => 'hh:mm',
                                        "changeYear" => true,
                                        "changeMonth" => true,
                                        "changeHour" => true,
                                        'hourMin' => 0,
                                        'hourMax' => 24,
                                        'minuteMin' => 0,
                                        'minuteMax' => 60,
                                        'timeFormat' => 'hh:mm',
                                        "yearRange" => Date("Y").":".(Date("Y")+1)
                                    ),
                                    'htmlOptions' => array(
                                        'class' => 'form-control',
                                        'size' => '10',
                                        'maxlength' => '10',
                                        'placeholder' => 'yyyy-mm-dd hh:mm',
                                    ),
                                ));
                            ?>
                            <?php echo $form->error($model, 'fechaFin'); ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'codigoCiudad'); ?><div class="space-1"></div>
                            <?php echo $form->dropDownList($model, 'codigoCiudad', CHtml::listData(Ciudad::listData(), 'codigoCiudad', 'nombreCiudad'), array('class' => 'estado', 'class' => 'form-control', 'empty' => array(Yii::app()->params->ciudad['*'] => 'Todas las ciudades'), 'data-role' => 'select-ciudades-domicilio'))?>
                            <?php echo $form->error($model, 'codigoCiudad'); ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group" id="listaSectoresTarifas">
                            <?php $this->renderPartial('_sectorLista', array('model' => $model)); ?>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-offset-4">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'codigoPerfil'); ?><div class="space-1"></div>
                            <?php echo $form->dropDownList($model, 'codigoPerfil', CHtml::listData(Perfil::listData(), 'codigoPerfil', 'nombrePerfil'), array('class' => 'estado', 'class' => 'form-control', 'prompt' => 'Seleccione un perfil'))?>
                            <?php echo $form->error($model, 'codigoPerfil'); ?>
                        </div>
                    </div>
                
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-role="guardar-tarifa-domicilio"><?php echo $model->isNewRecord ? 'Guardar' : 'Actualizar' ?></button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>