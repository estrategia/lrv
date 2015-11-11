<div class="modal fade" id="modal-lista-guardar" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4>Seleccione la lista</h4>
            </div>
            <div class="modal-body body-scroll">
                <div class="panel-body">
                    <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'enableClientValidation' => true,
                            'enableAjaxValidation' => false,
                            'htmlOptions' => array(
                                'id' => "form-listaguardar",
                                'class' => "ui-bar ui-bar-a ui-corner-all",
                                'data-ajax' => "false"
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
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <?php echo $form->labelEx($model, 'idLista', array('class' => 'ui-hidden-accessible')); ?>
                            <?php echo $form->dropDownList($model, 'idLista', CHtml::listData($model->listData(), 'idLista', 'nombreLista'), array('encode' => false, 'prompt' => 'Seleccione lista', 'placeholder' => $model->getAttributeLabel('idLista'), 'class' => 'form-control') ); ?>
                            <?php echo $form->error($model, 'idLista'); ?>
                        </div>
                        <div class="col-md-4">
                            <input type="button" class="btn btn-default" data-enhanced="true" data-role="lstpersonalguardar" value="Guardar">
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-md-4 col-md-offset-4">
                            <?php echo $form->hiddenField($model, 'tipo'); ?>
                            <?php echo $form->hiddenField($model, 'codigo'); ?>
                            <?php echo $form->hiddenField($model, 'unidades'); ?>
                        </div>
                    </div>
                    <?php $this->endWidget(); ?>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="panel-group" id="accordion-nueva-lista" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
                                <div class="panel panel-default">
                                    <div class="panel-heading head-desplegable" role="tab" id="heading-nueva-lista">
                                        <h4 class="panel-title">
                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion-nueva-lista" href="#collapse-nueva-lista" aria-expanded="false" aria-controls="collapse-nueva-lista">
                                                Nueva lista personal
                                            </a>
                                        </h4>
                                    </div>
                                    <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
                                    <div id="collapse-nueva-lista" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-nueva-lista">
                                        <div class="panel-body" id="body-nueva-lista">
                                            <?php $this->renderPartial('d_listaForm', array('model' => new ListasPersonales, 'modal' => false)); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>