<?php
    $form = $this->beginWidget('CActiveForm', array(
         'enableClientValidation' => true,
         'enableAjaxValidation' => false,
         'htmlOptions' => array(
              'id' => "menu-form",
              'enctype' => 'multipart/form-data',
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



<div class="form-group">
    <?php echo $form->labelEx($modelMenu, 'contenido'); ?>
    <?php echo $form->textField($modelMenu, 'contenido', array('class' => 'orden form-control', 'size' => 20, 'maxlength' => 20, )); ?>
    <?php echo $form->error($modelMenu, 'contenido'); ?>
</div>
<div class="form-group">
    <?php echo $form->labelEx($modelMenu, 'rutaImagen'); ?>
    <?php echo CHtml::activeFileField($modelMenu, 'rutaImagen', array('value' => $modelMenu->rutaImagen)); ?>
    <?php echo $form->error($modelMenu, 'rutaImagen'); ?>
</div>
<?php echo $form->labelEx($modelMenu, 'color'); ?>
<?php  $this->widget('application.extensions.SMiniColors.SActiveColorPicker', array(
    'model' => $modelMenu,
    'attribute' => 'color',
    'hidden'=>false, // defaults to false - can be set to hide the textarea with the hex
    'options' => array(), // jQuery plugin options
    'htmlOptions' => array('class' => 'color'), // html attributes
)); ?>
<?php echo $form->error($modelMenu, 'color'); ?>

<?php echo CHtml::submitButton( 'Guardar' , array('class' => "btn btn-default")); ?>

<?php $this->endWidget(); ?>