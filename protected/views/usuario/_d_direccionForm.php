<?php $radio = (isset($radio) ? $radio : 0) ?>

<div class="modal fade" id="modal-nueva-direccion" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                <?php if ($model->isNewRecord): ?>
                    <h4 class="text-center">Esta dirección de despacho estará asociada a la ubicación <span class="text-capitalize"><?php echo strtolower($this->sectorName) ?></span></h4>
                <?php endif; ?>
            </div>

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                'action' => ($model->isNewRecord ? Yii::app()->createUrl('/usuario/direccionCrear') : Yii::app()->createUrl('/usuario/direccionActualizar', array('id' => $model->idDireccionDespacho))),
                'id' => ($model->isNewRecord ? "form-direccion" : "form-direccion-$model->idDireccionDespacho"),
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

            <div class="modal-body body-scroll">
                <?php if (!$model->isNewRecord): ?>
                    <?php echo $form->hiddenField($model, 'idDireccionDespacho'); ?>
                <?php endif; ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'descripcion', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-8">
                                <?php if (!$model->isNewRecord && $radio == 'pasoscompra') : ?>
                                    <div class="form-control input-sm" disabled> <?php echo $model->descripcion ?> </div>
                                <?php else: ?>
                                    <?php echo $form->textField($model, 'descripcion', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('descripcion'), "class" => "form-control input-sm")); ?>
                                    <?php echo $form->error($model, 'descripcion', array('class' => 'text-danger')); ?>
                                <?php endif; ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'nombre', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-8">                           
                                <?php echo $form->textField($model, 'nombre', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('nombre'), "class" => "form-control input-sm")); ?>
                                <?php echo $form->error($model, 'nombre', array('class' => 'text-danger')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'direccion', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-8">
                                <?php echo $form->textField($model, 'direccion', array('maxlength' => 100, 'placeholder' => $model->getAttributeLabel('direccion'), "class" => "form-control input-sm")); ?>
                                <?php echo $form->error($model, 'direccion', array('class' => 'text-danger')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'barrio', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-8">
                                <?php echo $form->textField($model, 'barrio', array('maxlength' => 50, 'placeholder' => $model->getAttributeLabel('barrio'), "class" => "form-control input-sm")); ?>
                                <?php echo $form->error($model, 'barrio', array('class' => 'text-danger')); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'telefono', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-8">
                                <?php echo $form->textField($model, 'telefono', array('maxlength' => 11, 'placeholder' => $model->getAttributeLabel('telefono'), "class" => "form-control input-sm")); ?>
                                <?php echo $form->error($model, 'telefono', array('class' => 'text-danger')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'extension', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-8">
                                <?php echo $form->textField($model, 'extension', array('maxlength' => 5, 'placeholder' => $model->getAttributeLabel('extension'), "class" => "form-control input-sm")); ?>
                                <?php echo $form->error($model, 'extension', array('class' => 'text-danger')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'celular', array('class' => 'col-md-4 control-label')); ?>
                            <div class="col-md-8">
                                <?php echo $form->textField($model, 'celular', array('maxlength' => 20, 'placeholder' => $model->getAttributeLabel('celular'), "class" => "form-control input-sm")); ?>
                                <?php echo $form->error($model, 'celular', array('class' => 'text-danger')); ?>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label">Ubicación</label>
                            <div class="col-md-8">
                                <?php if ($model->isNewRecord): ?>
                                    <input type="text" disabled="disabled" class="form-control " value="<?php echo $this->sectorName ?>">
                                <?php else: ?>
                                    <input type="text" disabled="disabled" class="form-control input-sm" value="<?php echo $model->objCiudad->nombreCiudad . (($model->codigoSector != 0) ? (" - " . $model->objSector->nombreSector) : "") ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer center">
                <?php if ($model->isNewRecord): ?>
                    <input type="button" class="btn btn-primary" data-role="direccion-adicionar" value="Guardar">
                <?php else: ?>
                    <input type="button" class="btn btn-primary" value="Actualizar" data-role="direccion-actualizar" data-radio="<?php echo $radio ?>">
                <?php endif; ?>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

