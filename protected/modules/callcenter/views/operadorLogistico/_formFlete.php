<?php
/* @var $this OperadorController */
/* @var $model Operador */
/* @var $form CActiveForm */
?>

<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'id' => "operador-form",
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
    <?php echo $form->labelEx($model, 'codigoCiudad'); ?>
    <?php //echo $form->textField($model, 'activo', array('class'=>'form-control')); ?>
    <?php echo $form->dropDownList($model, 'codigoCiudad', CHtml::listData($ciudades, 'codigoCiudad', 'nombreCiudad'), array('prompt' => 'Seleccionar', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'codigoCiudad'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'estado'); ?>
    <?php //echo $form->textField($model, 'activo', array('class'=>'form-control')); ?>
    <?php echo $form->dropDownList($model, 'bodegaVirtual', CHtml::listData($bodegas, 'idBodega', 'nombreBodega'), array('prompt' => 'Seleccionar', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'estado'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'rango1'); ?>
    <?php echo $form->textField($model, 'rango1', array('class' => 'form-control', 'size' => 20, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'rango1'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'rango2'); ?>
    <?php echo $form->textField($model, 'rango2', array('class' => 'form-control', 'size' => 20, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'rango2'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'tiempoEntregaInicial'); ?>
    <?php echo $form->textField($model, 'tiempoEntregaInicial', array('class' => 'form-control', 'size' => 20, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'tiempoEntregaInicial'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'tiempoEntregaFinal'); ?>
    <?php echo $form->textField($model, 'tiempoEntregaFinal', array('class' => 'form-control', 'size' => 20, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'tiempoEntregaFinal'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'valorKiloAdicional'); ?>
    <?php echo $form->textField($model, 'valorKiloAdicional', array('class' => 'form-control', 'size' => 20, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'valorKiloAdicional'); ?>
</div>
<?php echo CHtml::submitButton($model->scenario == 'create' ? 'Crear' : 'Actualizar', array('class' => "btn btn-default")); ?>


<?php $this->endWidget(); ?>