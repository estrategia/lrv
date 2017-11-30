<?php
/* @var $this UsuarioTerceroController */
/* @var $model UsuarioTercero */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'usuario-tercero-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>false,
)); ?>

    <?php echo $form->errorSummary($model); ?>

    <div class="form-group">
        <?php echo $form->labelEx($model,'nombreOperador'); ?>
        <?php echo $form->textField($model,'nombreOperador',array('size'=>60,'maxlength'=>255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model,'nombreOperador'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'nombreContacto'); ?>
        <?php echo $form->textField($model,'nombreContacto',array('size'=>60,'maxlength'=>255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model,'nombreContacto'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'telefonoContacto'); ?>
        <?php echo $form->textField($model,'telefonoContacto',array('size'=>45,'maxlength'=>45, 'class' => 'form-control')); ?>
        <?php echo $form->error($model,'telefonoContacto'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'correoContacto'); ?>
        <?php echo $form->textField($model,'correoContacto',array('size'=>60,'maxlength'=>255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model,'correoContacto'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'correoNotificaciones'); ?>
        <?php echo $form->textField($model,'correoNotificaciones',array('size'=>60,'maxlength'=>255, 'class' => 'form-control')); ?>
        <?php echo $form->error($model,'correoNotificaciones'); ?>
    </div>
    
    <div class="form-group">
        <?php echo $form->labelEx($model,'estado'); ?>
        <?php echo $form->dropDownList($model,'estado', array('1' => 'Activo', '0' => 'Inactivo'), array('class' => 'form-control')); ?>
        <?php echo $form->error($model,'estado'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model,'codigoProveedor'); ?>
        <br>
        <?php $form->widget('ext.select2.Select2',array(
          'model'=>$model,
          'attribute'=>'codigoProveedor',
          'data'=> $proveedores,
        ));?>
        <?php echo $form->error($model,'codigoProveedor'); ?>
    </div>

    <div class="form-group">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar', array('class' => 'btn btn-default')); ?>
    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->