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
    <?php echo $form->labelEx($model, 'idCompra'); ?>
    <?php echo $form->textField($model, 'idCompra', array('class' => 'form-control', 'size' => 20, 'maxlength' => 20)); ?>
    <?php echo $form->error($model, 'idCompra'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'idComercial'); ?>
    <?php echo Select2::activeDropDownList($model, "idComercial", CHtml::listData($listPdv, 'idComercial', function($model){return "$model->idComercial - $model->nombrePuntoDeVenta";}), array('prompt' => 'Seleccione punto de venta', 'style'=>'width=100%;display:block;'));  ?>
    <?php echo $form->error($model, 'idComercial'); ?>
</div>
<?php echo CHtml::submitButton('Borrar Remision', array('class' => "btn btn-default")); ?>


<?php $this->endWidget(); ?>

