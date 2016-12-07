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
    <?php echo $form->labelEx($model, 'nombre'); ?>
    <?php echo $form->textField($model, 'nombre', array('class' => 'form-control', 'size' => 20, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'nombre'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'usuario'); ?>
    <?php if ($model->scenario == 'create'): ?>
        <?php echo $form->textField($model, 'usuario', array('class' => 'form-control', 'size' => 15, 'maxlength' => 15)); ?>
    <?php else: ?>
        <?php echo $form->textField($model, 'usuario', array('disabled' => 'disabled', 'class' => 'form-control', 'size' => 15, 'maxlength' => 15)); ?>
    <?php endif; ?>
    <?php echo $form->error($model, 'usuario'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'clave'); ?>
    <?php echo $form->textField($model, 'clave', array('class' => 'form-control', 'size' => 15, 'maxlength' => 15)); ?>
    <?php echo $form->error($model, 'clave'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'perfil'); ?>
    <?php //echo $form->textField($model, 'perfil', array('class'=>'form-control')); ?>
    <?php echo $form->dropDownList($model, 'perfil', Yii::app()->params->callcenter['perfil'], array('prompt' => 'Seleccionar', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'perfil'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'email'); ?>
    <?php echo $form->textField($model, 'email', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
    <?php echo $form->error($model, 'email'); ?>
</div>

<div class="form-group" id='form-pdv-vendedor' style="<?= ($model->perfil == Yii::app()->params->callcenter['perfilesOperador']['vendedorPDV'] || $model->perfil == Yii::app()->params->entreganacional['perfil']) ? 'display:block' : 'display: none' ?>">
    <?php echo $form->labelEx($model, 'idComercial'); ?>
    <?php //echo $form->textField($model, 'activo', array('class'=>'form-control')); ?>
    <?php
    echo Select2::dropDownList('select-pdv-asignar', $model->idComercial, CHtml::listData(PuntoVenta::model()->findAll(array('order' => 'idComercial')), 'idComercial', function($modelo) {
                return "$modelo->idComercial - $modelo->nombrePuntoDeVenta";
            }), array('prompt' => 'Seleccione punto de venta', 'id' => 'select-pdv-asignar', 'style' => 'width: 100%;'))
    ?>
    <?php echo $form->error($model, 'idComercial'); ?>
</div>

<div class="form-group" id='form-pdv-mensajero' style="<?= ($model->perfil == Yii::app()->params->callcenter['perfilesOperador']['mensajeroVendedor']) ? 'display:block' : 'display: none' ?>">
    <?php echo $form->labelEx($model, 'codigoVendedor'); ?>
    <?php echo $form->textField($model, 'codigoVendedor', array('class' => 'form-control', 'size' => 4, 'maxlength' => 4)); ?>
    <?php echo $form->error($model, 'codigoVendedor'); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'activo'); ?>
    <?php //echo $form->textField($model, 'activo', array('class'=>'form-control')); ?>
    <?php echo $form->dropDownList($model, 'activo', Yii::app()->params->callcenter['usuario']['estadoNombre'], array('prompt' => 'Seleccionar', 'class' => 'form-control')); ?>
    <?php echo $form->error($model, 'activo'); ?>
</div>


<?php echo CHtml::submitButton($model->scenario == 'create' ? 'Crear' : 'Actualizar', array('class' => "btn btn-default")); ?>


<?php $this->endWidget(); ?>