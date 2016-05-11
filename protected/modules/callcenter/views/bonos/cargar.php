<?php
$this->breadcrumbs = array(
    'Inicio' => array('/callcenter'),
    'Bonos' => array('/callcenter/bonos'),
    'Cargar'
);
?>

<?php foreach (Yii::app()->user->getFlashes() as $key => $message): ?>
    <div class="alert alert-dismissable alert-<?php echo $key ?>">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <?php echo $message ?>
    </div>
<?php endforeach; ?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'enableAjaxValidation' => false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
        'id' => 'bonos-cargar-form',
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

<div class="alert alert-info">
    <p>El archivo debe ser en formato .csv</p>
    <p>Descargar plantilla de cargue de ejemplo <?php echo CHtml::link('Aquí', Yii::app()->baseUrl . "/files/upload_bonos.csv"); ?></p>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'archivo', array('class' => 'col-lg-2 control-label text-primary')); ?>
    <?php echo CHtml::activeFileField($model, 'archivo'); ?>
    <div class="col-lg-10">
        <?php echo $form->error($model, 'archivo', array('class' => 'text-left text-danger')); ?>
    </div>
</div>

<div class="form-group">
    <?php echo CHtml::submitButton('Cargar bonos', array('class' => 'btn btn-primary btn-large')); ?>
</div>

<?php $this->endWidget(); ?>



