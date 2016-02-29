<div class="modal fade" id="modal-reactivar-bono" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>

            <?php
            $form = $this->beginWidget('CActiveForm', array(
                'enableClientValidation' => true,
                'action' => Yii::app()->createUrl('/callcenter/bono/reactivar', array('id' => $model->idBonoTienda)),
                'id' => "form-reactivar-bono",
                'htmlOptions' => array(
                //'class' => 'form-horizontal'
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
            
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <?php echo $form->labelEx($model, 'comentario'); ?>
                            <?php echo $form->textArea($model, 'comentario', array('class' => 'form-control', 'rows' => 5, 'maxlength' => 255)); ?>
                            <?php echo $form->error($model, 'comentario', array('class' => 'text-danger')); ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="modal-footer center">
                <input type="button" class="btn btn-primary" data-role="bonotienda-reactivar" data-bono=<?=$model->idBonoTienda?> value="Activar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            <?php $this->endWidget(); ?>
        </div>
    </div>
</div>

