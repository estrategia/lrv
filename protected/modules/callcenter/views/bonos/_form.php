<?php
/* @var $this BonosController */
/* @var $model BonosTienda */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'id' => 'bonos-tienda-form',
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

<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model, null, null, array('class' => 'text-danger')); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'identificacionUsuario'); ?>
    <?php echo $form->textField($model, 'identificacionUsuario', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'identificacionUsuario', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'concepto'); ?>
    <?php echo $form->textField($model, 'concepto', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'concepto', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'valor'); ?>
    <?php echo $form->textField($model, 'valor', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'valor', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'vigenciaInicio', array('class' => 'control-label')); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'vigenciaInicio',
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
    <?php echo $form->error($model, 'vigenciaInicio', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'vigenciaFin', array('class' => 'control-label')); ?>
    <?php
    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
        'model' => $model,
        'attribute' => 'vigenciaFin',
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

    <?php echo $form->error($model, 'vigenciaFin', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'minimoCompra'); ?>
    <?php echo $form->textField($model, 'minimoCompra', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'minimoCompra', array('class' => 'text-danger')); ?>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', array('class' => "btn btn-default")); ?>

<?php $this->endWidget(); ?>
