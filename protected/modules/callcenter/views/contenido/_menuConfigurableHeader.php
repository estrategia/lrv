<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'htmlOptions' => array(
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

<div class='form-group'>   
    <?php echo $form->labelEx($modelMenuPublicidad, 'imagenDesktop', array()); ?>
    <?php echo CHtml::activeFileField($modelMenuPublicidad, 'imagenDesktop', array('value' => $modelMenuPublicidad->imagenDesktop)); ?>
    <?php echo $form->error($modelMenuPublicidad, 'imagenDesktop', array()); ?>
</div>

<div class='form-group'>   
    <?php echo $form->labelEx($modelMenuPublicidad, 'imagenMovil', array()); ?>
    <?php echo CHtml::activeFileField($modelMenuPublicidad, 'imagenMovil', array('value' => $modelMenuPublicidad->imagenMovil)); ?>
    <?php echo $form->error($modelMenuPublicidad, 'imagenMovil', array()); ?>
</div>

<div class='form-group'>
    <?php echo CHtml::submitButton('Guardar', array('id' => 'btnCargar', 'class' => 'btn btn-primary btn-large'), array('id' => 'btnCargar', 'class' => 'btn btn-primary btn-large')); ?>
</div>

<?php $this->endWidget(); ?>
