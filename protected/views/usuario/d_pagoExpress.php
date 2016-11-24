<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-dismissable alert-<?php echo $idx; ?>"><?php echo $mensaje; ?></div>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (!empty($listDirecciones)): ?>
    <?php echo CHtml::link('Crear dirección de despacho', "#", array('data-role' => 'direccion-adicionar-modal', 'data-vista' => 'pagoexpress', 'class' => 'btn btn-primary')); ?>
<?php endif; ?>
        
<div class="row">
    <div class="col-md-12">
        <h4>Configure un pago rápido con un solo clic. Esta opción saldrá para los pedidos realizados en la dirección seleccionada.</h4>
    </div>
</div>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'id' => 'form-pagoexpess',
    'enableClientValidation' => true,
    'htmlOptions' => array(
        'class' => ""
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

<div class="row">
    <div class="col-md-12">
        <h3>Hora de entrega</h3>
        <p>La hora de entrega se programará con la hora mas próxima disponible en tu ubicación</p>
    </div>
</div>    

<div class="row">
    <div class="col-md-8">
        <h4>Dirección de despacho</h4>
    </div>
    <div class="col-md-4">
        <h4>Forma de pago</h4>
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <div id="div-direcciones-lista">
            <?php if (empty($listDirecciones)): ?>
                <?php echo CHtml::link('Crear dirección de despacho', "#", array('data-role' => 'direccion-adicionar-modal', 'data-vista' => 'pagoexpress', 'class' => 'btn btn-primary')); ?>
            <?php else: ?>
                <?php $this->renderPartial('/usuario/_d_direccionListaAcordeon', array('objPagoExpress' => $objPagoExpress, 'listDirecciones' => $listDirecciones)); ?>
            <?php endif; ?>
        </div>
        <?php echo $form->error($objPagoExpress, 'idDireccionDespacho', array('class' => 'text-danger')); ?>
    </div>
    <div class="col-md-5">
        <?php $this->renderPartial('/usuario/_d_formaPago', array('form' => $form, 'model' => $objPagoExpress, 'listFormaPago' => $listFormaPago)) ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <input type="submit" class="btn btn-primary" data-enhanced="true" value="Modificar" name="Submit">

        <?php if (!$objPagoExpress->isNewRecord): ?>
            <input type="submit" class="btn btn-default" data-enhanced="true" value="Desactivar" name="Submit">
        <?php endif; ?>
    </div>
</div>

<?php $this->endWidget(); ?>

