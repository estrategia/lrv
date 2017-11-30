<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-modificar-ahorro',
    'enableClientValidation' => true,
    'htmlOptions' => array(
    //'class' => "", 'data-ajax' => "false"
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
    <?php echo $form->labelEx($model, 'descuento', array('class' => 'control-label')); ?>
    <?php echo $form->textField($model, 'descuento', array('class' => 'form-control input-sm', 'placeholder' => $model->getAttributeLabel('descuento'))); ?>
    <?php echo $form->error($model, 'descuento', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->hiddenField($model, 'idCompraItem'); ?>
    <?php echo $form->error($model, 'idCompraItem', array('class' => 'text-danger')); ?>
</div>
<div class="form-group">
    <?php echo $form->hiddenField($model, 'opcion'); ?>
    <?php echo $form->error($model, 'opcion', array('class' => 'text-danger')); ?>
</div>



<?php $this->endWidget(); ?>