<?php
/* @var $this FleteProductoTerceroController */
/* @var $model FleteProductoTercero */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'flete-producto-tercero-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'valorFlete'); ?>
        <?php echo $form->textField($model,'valorFlete', array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'valorFlete'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'tiempoEntregaInicial'); ?>
        <?php echo $form->textField($model,'tiempoEntregaInicial',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'tiempoEntregaInicial'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'tiempoEntregaFinal'); ?>
        <?php echo $form->textField($model,'tiempoEntregaFinal',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'tiempoEntregaFinal'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'unidadesMismoValor'); ?>
        <?php echo $form->textField($model,'unidadesMismoValor',array('size'=>10,'maxlength'=>10,'class'=>'form-control')); ?>
        <?php echo $form->error($model,'unidadesMismoValor'); ?>
    </div>

    <div class="form-group">
         <?php echo $form->labelEx($model,'codigoCiudad'); ?>
        <br>
        <?php $form->widget('ext.select2.Select2',array(
          'model'=>$model,
          'attribute'=>'codigoCiudad',
          'data'=> $ciudades,
        ));?>
        <?php echo $form->error($model,'codigoCiudad'); ?>
    </div>

    <div class="form-group buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class' => 'btn btn-default')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->