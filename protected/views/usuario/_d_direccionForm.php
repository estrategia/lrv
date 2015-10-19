<?php if(isset($modal)): ?>
    <div class="modal fade" id="modal-nueva-direccion" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<?php endif;?>
    
<?php if ($model->isNewRecord): ?>
<h2>Esta dirección de despacho estará asociada a la ubicación <span style="text-transform: capitalize;"><?php echo strtolower($this->sectorName) ?></span></h2>
<?php endif;?>

<?php if(isset($modal)): ?>
                </div>
                <div class="modal-body body-scroll">
<?php endif;?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'action' => ($model->isNewRecord ? Yii::app()->createUrl('/usuario/direccionCrear') : Yii::app()->createUrl('/usuario/direccionActualizar', array('id' => $model->idDireccionDespacho))),
    'id' => ($model->isNewRecord ? "form-direccion" : "form-direccion-$model->idDireccionDespacho"),
    'htmlOptions' => array(
        'class' => "ui-bar ui-bar-c ui-corner-all", 'data-ajax' => "false"
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
<fieldset>
    <?php if (!$model->isNewRecord): ?>
        <?php echo $form->hiddenField($model, 'idDireccionDespacho'); ?>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'descripcion', array('class' => '')); ?>
            <?php echo $form->textField($model, 'descripcion', array('maxlength'=>50, 'placeholder' => $model->getAttributeLabel('descripcion'), "class" => "form-control")); ?>
            <?php echo $form->error($model, 'descripcion'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'nombre', array('class' => '')); ?>
            <?php echo $form->textField($model, 'nombre', array('maxlength'=>50,'placeholder' => $model->getAttributeLabel('nombre'), "class" => "form-control")); ?>
            <?php echo $form->error($model, 'nombre'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'direccion', array('class' => '')); ?>
            <?php echo $form->textField($model, 'direccion', array('maxlength'=>100,'placeholder' => $model->getAttributeLabel('direccion'), "class" => "form-control")); ?>
            <?php echo $form->error($model, 'direccion'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'barrio', array('class' => '')); ?>
            <?php echo $form->textField($model, 'barrio', array('maxlength'=>50,'placeholder' => $model->getAttributeLabel('barrio'), "class" => "form-control")); ?>
            <?php echo $form->error($model, 'barrio'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'telefono', array('class' => '')); ?>
            <?php echo $form->textField($model, 'telefono', array('maxlength'=>11,'placeholder' => $model->getAttributeLabel('telefono'), "class" => "form-control")); ?>
            <?php echo $form->error($model, 'telefono'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'extension', array('class' => '')); ?>
            <?php echo $form->textField($model, 'extension', array('maxlength'=>5, 'placeholder' => $model->getAttributeLabel('extension'), "class" => "form-control")); ?>
            <?php echo $form->error($model, 'extension'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?php echo $form->labelEx($model, 'celular', array('class' => '')); ?>
            <?php echo $form->textField($model, 'celular', array('maxlength'=>20,'placeholder' => $model->getAttributeLabel('celular'), "class" => "form-control")); ?>
            <?php echo $form->error($model, 'celular'); ?>
        </div>
    </div>

    <?php if (!$model->isNewRecord): ?>
        <div class="ui-field-container">
            <label class="">Ubicación</label>
            <input type="text" disabled="disabled" class="form-control" value="<?php echo $model->objCiudad->nombreCiudad . (($model->codigoSector !=0) ? (" - " . $model->objSector->nombreSector) : "") ?>">
        </div>
    <?php endif; ?>
</fieldset>

<?php if ($model->isNewRecord): ?>
    
    <?php if(isset($modal)): ?>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default" data-role="direccion-adicionar" data-modal=1 value="Guardar">
    <?php else: ?>
        <input type="button" class="btn btn-default" data-role="direccion-adicionar" data-modal=0 value="Guardar">
    <?php endif;?>
<?php else: ?>
    <!--<button type="button" data-enhanced="true" id="btn-direccion-actualizar-<?php //echo uniqid() ?>" class="btn btn-default">Actualizar</button>-->
    
        <input type="button" class="btn btn-default" value="Actualizar" id="btn-direccion-actualizar-<?php echo uniqid() ?>">
<?php endif; ?>


<?php if (!$model->isNewRecord): ?>
    <input type="button" class="btn btn-default" value="Eliminar" data-direccion="<?php echo $model->idDireccionDespacho ?>" id="btn-direccion-eliminar-<?php echo uniqid() ?>">
<?php endif; ?>

<?php $this->endWidget(); ?>

<?php if(isset($modal)): ?>
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
    </div>
    </div>
    </div>
<?php endif;?>