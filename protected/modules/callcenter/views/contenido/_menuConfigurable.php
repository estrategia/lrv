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
<div class="form-group">
    <?php echo $form->labelEx($modelMenuItemPublicidad, 'titulo'); ?>
    <?php echo $form->textField($modelMenuItemPublicidad, 'titulo', array('class' => 'titulo form-control')); ?>
    <?php echo $form->error($modelMenuItemPublicidad, 'titulo'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($modelMenuItemPublicidad, 'enlace'); ?>
    <?php echo $form->textField($modelMenuItemPublicidad, 'enlace', array('class' => 'enlace form-control')); ?>
    <?php echo $form->error($modelMenuItemPublicidad, 'enlace'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($modelMenuItemPublicidad, 'enlaceMovil'); ?>
    <?php echo $form->textField($modelMenuItemPublicidad, 'enlaceMovil', array('class' => 'enlaceMovil form-control')); ?>
    <?php echo $form->error($modelMenuItemPublicidad, 'enlaceMovil'); ?>
</div>

<div class='form-group'>   
    <?php echo $form->labelEx($modelMenuItemPublicidad, 'iconoDesktop', array()); ?>
    <?php echo CHtml::activeFileField($modelMenuItemPublicidad, 'iconoDesktop', array('value' => $modelMenuItemPublicidad->iconoDesktop)); ?>
    <?php echo $form->error($modelMenuItemPublicidad, 'iconoDesktop', array()); ?>
</div>

<div class='form-group'>   
    <?php echo $form->labelEx($modelMenuItemPublicidad, 'iconoMovil', array()); ?>
    <?php echo CHtml::activeFileField($modelMenuItemPublicidad, 'iconoMovil', array('value' => $modelMenuItemPublicidad->iconoMovil)); ?>
    <?php echo $form->error($modelMenuItemPublicidad, 'iconoMovil', array()); ?>
</div>

<div class='form-group'>
    <?php echo CHtml::submitButton('Guardar', array('id' => 'btnCargar', 'class' => 'btn btn-primary btn-large'), array('id' => 'btnCargar', 'class' => 'btn btn-primary btn-large')); ?>
</div>

<?php $this->endWidget(); ?>
<div id="lista-imagenes">
    <?php
    $this->renderPartial('_listaItemsMenu', array(
        'listaItems' => $listaItems
    ));
    ?>
</div>