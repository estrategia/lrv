<div class="ui-content c_form_rgs ui-body-c">
    <h2>Configurar lista</h2>
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'enableClientValidation' => true,
        'enableAjaxValidation' => false,
        'htmlOptions' => array(
            'id' => "form-listapersonal",
            'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax' => "false"
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

    <fieldset>
        <?php if ($model->isNewRecord) : ?>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'nombreLista'); ?>
                <?php echo $form->textField($model, 'nombreLista', array('placeholder' => $model->getAttributeLabel('nombreLista'))); ?>
                <?php echo $form->error($model, 'nombreLista'); ?>
            </div>
        <?php else: ?>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'nombreLista'); ?>
                <?php echo $form->textField($model, 'nombreLista', array('disabled' => 'disabled', 'placeholder' => $model->getAttributeLabel('nombreLista'))); ?>
                <?php echo $form->error($model, 'nombreLista'); ?>
            </div>
        <?php endif; ?>

        <div class="ui-field-container">
            <?php echo $form->labelEx($model, 'estadoLista', array('class' => 'c_cond_rg')); ?>
            <?php echo $form->checkBox($model, 'estadoLista', array('data-mini' => 'true')); ?>
            <?php echo $form->error($model, 'estadoLista'); ?>
        </div>
        <div id="div-lista-config-recordacion" class="<?php echo ($model->estadoLista == 1 ? "" : "hide") ?>">
            <div class="ui-field-container">
                <?php echo CHtml::label($model->getAttributeLabel("diasRecordar") . "<a data-role='tooltip' data-msg='Cada cuantos d&iacute;as desea que se realice recordaci&oacute;n' class='ui-btn ui-btn-inline ui-icon-info ui-btn-icon-notext ui-corner-all ui-shadow'>?</a>", 'ListasPersonales_diasRecordar'); ?>
                <?php echo $form->numberField($model, 'diasRecordar', array('placeholder' => $model->getAttributeLabel('diasRecordar'))); ?>
                <?php echo $form->error($model, 'diasRecordar'); ?>
            </div>
            <div class="ui-field-container">
                <?php //echo $form->labelEx($model, 'diaRecordar'); ?>
                <?php echo CHtml::label($model->getAttributeLabel("diaRecordar") . "<a data-role='tooltip' data-msg='D&iacute;a del mes en que desea que se realice recordaci&oacute;n' class='ui-btn ui-btn-inline ui-icon-info ui-btn-icon-notext ui-corner-all ui-shadow'>?</a>", 'ListasPersonales_diaRecordar'); ?>
                <?php echo $form->numberField($model, 'diaRecordar', array('placeholder' => $model->getAttributeLabel('diaRecordar'))); ?>
                <?php echo $form->error($model, 'diaRecordar'); ?>
            </div>
            <div class="ui-field-container">
                <?php //echo $form->labelEx($model, 'fechaRecordar'); ?>
                <?php echo CHtml::label($model->getAttributeLabel("fechaRecordar") . "<a data-role='tooltip' data-msg='Fecha del mes en que desea que se realice recordaci&oacute;n' class='ui-btn ui-btn-inline ui-icon-info ui-btn-icon-notext ui-corner-all ui-shadow'>?</a>", 'ListasPersonales_fechaRecordar'); ?>
                <?php echo $form->dateField($model, 'fechaRecordar', array('placeholder'=>'yyyy-mm-dd')); ?>
                <?php echo $form->error($model, 'fechaRecordar'); ?>
            </div>
            <div class="ui-field-container">
                <?php //echo $form->labelEx($model, 'diasAnticipacion'); ?>
                <?php echo CHtml::label($model->getAttributeLabel("diasAnticipacion") . "<a data-role='tooltip' data-msg='D&iacute;as de anticipaci&oacute;n para realizar recordaci&oacute;n' class='ui-btn ui-btn-inline ui-icon-info ui-btn-icon-notext ui-corner-all ui-shadow'>?</a>", 'ListasPersonales_diasAnticipacion'); ?>
                <?php echo $form->numberField($model, 'diasAnticipacion', array('placeholder' => $model->getAttributeLabel('diasAnticipacion'))); ?>
                <?php echo $form->error($model, 'diasAnticipacion'); ?>
            </div>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'recordarCorreo', array('class' => 'c_cond_rg')); ?>
                <?php echo $form->checkBox($model, 'recordarCorreo', array('data-mini' => 'true')); ?>
                <?php echo $form->error($model, 'recordarCorreo'); ?>
            </div>
            <div class="ui-field-container">
                <?php echo $form->labelEx($model, 'recordarNotificacion', array('class' => 'c_cond_rg')); ?>
                <?php echo $form->checkBox($model, 'recordarNotificacion', array('data-mini' => 'true')); ?>
                <?php echo $form->error($model, 'recordarNotificacion'); ?>
            </div>
        </div>
    </fieldset>

    <?php if ($model->isNewRecord): ?>
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Crear
            <input type="button" data-enhanced="true" data-role="lstpersonalform" value="Crear">
        </div>
    <?php else: ?>
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Actualizar
            <input type="button" data-enhanced="true" data-role="lstpersonalform" value="Actualizar" data-lista="<?php echo $model->idLista ?>">
        </div>
    <?php endif; ?>
    <?php $this->endWidget(); ?>
</div>