<?php
    $form = $this->beginWidget('CActiveForm', array(
         'enableClientValidation' => true,
         'htmlOptions' => array(
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
      <?php echo $form->labelEx($model, 'idCategoriaTienda'); ?>
      <?php echo $form->dropDownList($model, 'idCategoriaTienda',  CHtml::listData($categorias, 'idCategoria', 'nombreCategoria'),  array('prompt' => 'Seleccione..','class' => 'tipo form-control')); ?>
      <?php echo $form->error($model, 'idCategoriaTienda'); ?>
</div>

<?php $this->endWidget()?>