<?php
/* @var $this OperadorController */
/* @var $model Operador */
/* @var $form CActiveForm */
?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'id' => "remision-form",
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

<?php foreach(Yii::app()->user->getFlashes() as $key => $message):?>
          <div class="<?php echo $key?>"><?php echo $message ?></div>
<?php endforeach?>               

<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'numeroDocumento'); ?>
    <?php echo $form->textField($model, 'numeroDocumento', array('class' => 'form-control', 'size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'numeroDocumento'); ?>
</div>

<?php echo CHtml::submitButton('Buscar Bono', array('class' => "btn btn-default")); ?>

<?php if($bono): ?>
<div id='result_bono'>
    <?php $this->renderPartial('_bono', array ( 'bono' => $bono)); ?>
</div>
<?php endif;?>
<?php $this->endWidget(); ?>

