<?php if($modal): ?>

    <div class="modal fade" id="modal-lista-personal" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Configurar lista</h4>
<?php endif; ?>

    

<?php if($modal): ?>
        </div>
        <div class="modal-body body-scroll">
<?php endif; ?>

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'id' => "form-listapersonal",
            'class' => "", 
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

    <?php if ($model->isNewRecord) : ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php echo $form->labelEx($model, 'nombreLista'); ?>
                <?php echo $form->textField($model, 'nombreLista', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('nombreLista'))); ?>
                <?php echo $form->error($model, 'nombreLista', array('class' => 'text-danger')); ?>
            </div>
        </div>
    <?php else: ?>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php echo $form->labelEx($model, 'nombreLista'); ?>
                <?php echo $form->textField($model, 'nombreLista', array('class' => 'form-control', 'disabled' => 'disabled', 'placeholder' => $model->getAttributeLabel('nombreLista'))); ?>
                <?php echo $form->error($model, 'nombreLista', array('class' => 'text-danger')); ?>
            </div>
        </div>
    <?php endif; ?>


        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <?php //echo $form->labelEx($model, 'estadoLista', array('class' => '')); ?>
                <?php echo $form->checkBox($model, 'estadoLista', array('class' => 'form-control')); ?>
                <label class="clst_check" for="ListasPersonales_estadoLista"><span></span> <?php echo $model->getAttributeLabel('estadoLista')?></label>
                <?php echo $form->error($model, 'estadoLista', array('class' => 'text-danger')); ?>
            </div>
        </div>

        
        <div id="div-lista-config-recordacion" class="<?php echo ($model->estadoLista == 1 ? "" : "hide") ?>">

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php echo CHtml::label($model->getAttributeLabel("diasRecordar") . "<a data-toggle='tooltip' data-placement='top' title='Cada cuantos d&iacute;as desea que se realice recordaci&oacute;n' class='glyphicon glyphicon-info-sign'></a>", 'ListasPersonales_diasRecordar'); ?>
                    <?php echo $form->textField($model, 'diasRecordar', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('diasRecordar'))); ?>
                    <?php echo $form->error($model, 'diasRecordar', array('class' => 'text-danger')); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php //echo $form->labelEx($model, 'diaRecordar'); ?>
                    <?php echo CHtml::label($model->getAttributeLabel("diaRecordar") . "<a data-toggle='tooltip' title='D&iacute;a del mes en que desea que se realice recordaci&oacute;n' data-placement='top' class='glyphicon glyphicon-info-sign'></a>", 'ListasPersonales_diaRecordar'); ?>
                    <?php echo $form->textField($model, 'diaRecordar', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('diaRecordar'))); ?>
                    <?php echo $form->error($model, 'diaRecordar', array('class' => 'text-danger')); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php //echo $form->labelEx($model, 'fechaRecordar'); ?>
                    <?php echo CHtml::label($model->getAttributeLabel("fechaRecordar") . "<a data-toggle='tooltip' title='Fecha del mes en que desea que se realice recordaci&oacute;n' data-placement='top' class='glyphicon glyphicon-info-sign'></a>", 'ListasPersonales_fechaRecordar'); ?>
                    <?php //echo $form->dateField($model, 'fechaRecordar', array('class' => 'form-control', 'placeholder'=>'yyyy-mm-dd')); ?>
                    <?php 
                        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                            'model' => $model,
                            'attribute' => 'fechaRecordar',
                            'language' => 'es',
                            'options' => array(
                                'showAnim' => 'slide',
                                'dateFormat' => 'yy-mm-dd',
                            ),
                            'htmlOptions' => array(
                                'class' => 'form-control',
                                'size' => '10',
                                'maxlength' => '10',
                                'placeholder' => 'yyyy-mm-dd',
                            ),
                        ));
                    ?>
                    <?php echo $form->error($model, 'fechaRecordar', array('class' => 'text-danger')); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php //echo $form->labelEx($model, 'diasAnticipacion'); ?>
                    <?php echo CHtml::label($model->getAttributeLabel("diasAnticipacion") . "<a data-toggle='tooltip' title='D&iacute;as de anticipaci&oacute;n para realizar recordaci&oacute;n' data-placement='top' class='glyphicon glyphicon-info-sign'></a>", 'ListasPersonales_diasAnticipacion'); ?>
                    <?php echo $form->textField($model, 'diasAnticipacion', array('class' => 'form-control', 'placeholder' => $model->getAttributeLabel('diasAnticipacion'))); ?>
                    <?php echo $form->error($model, 'diasAnticipacion', array('class' => 'text-danger')); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php //echo $form->labelEx($model, 'recordarCorreo', array('class' => '')); ?>
                    <?php echo $form->checkBox($model, 'recordarCorreo', array('class' => 'form-control')); ?>
                    <label class="clst_check" for="ListasPersonales_recordarCorreo"><span></span> <?php echo $model->getAttributeLabel('recordarCorreo')?></label>
                    <?php echo $form->error($model, 'recordarCorreo', array('class' => 'text-danger')); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <?php //echo $form->labelEx($model, 'recordarNotificacion', array('class' => '')); ?>
                    <?php echo $form->checkBox($model, 'recordarNotificacion', array('class' => 'form-control')); ?>
                    <label class="clst_check" for="ListasPersonales_recordarNotificacion"><span></span> <?php echo $model->getAttributeLabel('recordarNotificacion')?></label>
                    <?php echo $form->error($model, 'recordarNotificacion', array('class' => 'text-danger')); ?>
                </div>
            </div>
        </div>

<?php if($modal): ?>
                </div>
                <div class="modal-footer">
<?php endif; ?>

             <?php if(!$modal): ?>
                    <div class="text-center">
                    <?php endif;?>
    <?php if ($model->isNewRecord): ?>
        <input type="button" class="btn btn-primary" data-enhanced="true" data-role="lstpersonalform" value="Crear">
    <?php else: ?>
        <input type="button" class="btn btn-primary" data-enhanced="true" data-role="lstpersonalform" value="Actualizar" data-lista="<?php echo $model->idLista ?>">
    <?php endif; ?>
        
        <?php if(!$modal): ?>
                    <div class="text-center">
                    <?php endif;?>

        
    <?php $this->endWidget(); ?>




<?php if($modal): ?>
            
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


    