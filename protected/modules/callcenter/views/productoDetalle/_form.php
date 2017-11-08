<?php
/* @var $this BonosController */
/* @var $model BonosTienda */
/* @var $form CActiveForm */
?>

<div class="row">
  <div class="col-lg-12">
    <?php foreach (Yii::app()->user->getFlashes() as $tipo => $mensaje): ?>
      <div class="alert alert-<?= $tipo ?>">
        <button data-dismiss="alert" class="close" type="button">x</button>
        <?= $mensaje ?>
      </div>
    <?php endforeach; ?>
  </div>
</div>


<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'id' => 'producto-contenido-form',
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

<div class="form-group">
    <?php echo $form->labelEx($model, 'titulo'); ?>
    <?php echo $form->textField($model, 'titulo', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'titulo', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
	<?php echo $form->labelEx($model, 'contenidoEscritorio'); ?>
	<?php echo $form->textArea($model, 'contenidoEscritorio', array('class' => 'form-control', 'size' => 50)); ?>
	<?php echo $form->error($model, 'contenidoEscritorio', array('class' => 'text-danger')); ?>
</div>


<div class="form-group">
	<?php echo $form->labelEx($model, 'contenidoMovil'); ?>
	<?php echo $form->textArea($model, 'contenidoMovil', array('class' => 'form-control', 'size' => 50)); ?>
	<?php echo $form->error($model, 'contenidoMovil', array('class' => 'text-danger')); ?>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', array('class' => "btn btn-default")); ?>

<?php $this->endWidget(); ?>
