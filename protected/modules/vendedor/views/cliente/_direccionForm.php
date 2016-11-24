<?php if(isset($modal)): ?>
    <div class="c_form_rgs ui-body-c">
<?php endif;?>
    
<?php if ($model->isNewRecord): ?>
<h2>Esta dirección de despacho estará asociada a la ubicación <span style="text-transform: capitalize;"><?php echo strtolower($this->sectorName) ?></span></h2>
<?php endif;?>

<?php
$form = $this->beginWidget('CActiveForm', array(
    'enableClientValidation' => true,
    'action' => ($model->isNewRecord ? Yii::app()->createUrl('/cliente/direccionCrear') : Yii::app()->createUrl('/usuario/direccionActualizar', array('id' => $model->idDireccionDespacho))),
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

    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'descripcion', array('class' => '')); ?>
        <?php echo $form->textField($model, 'descripcion', array('maxlength'=>50, 'placeholder' => $model->getAttributeLabel('descripcion'), 'disabled' => !$model->isNewRecord ? true:false)); ?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'nombre', array('class' => '')); ?>
        <?php echo $form->textField($model, 'nombre', array('maxlength'=>50,'placeholder' => $model->getAttributeLabel('nombre'), 'disabled' => !$model->isNewRecord ? true:false)); ?>
        <?php echo $form->error($model, 'nombre'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'direccion', array('class' => '')); ?>
        <?php echo $form->textField($model, 'direccion', array('maxlength'=>100,'placeholder' => $model->getAttributeLabel('direccion'), 'disabled' => !$model->isNewRecord ? true:false)); ?>
        <?php echo $form->error($model, 'direccion'); ?>
    </div>

    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'barrio', array('class' => '')); ?>
        <?php echo $form->textField($model, 'barrio', array('maxlength'=>50,'placeholder' => $model->getAttributeLabel('barrio'), 'disabled' => !$model->isNewRecord ? true:false)); ?>
        <?php echo $form->error($model, 'barrio'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'telefono', array('class' => '')); ?>
        <?php echo $form->numberField($model, 'telefono', array('maxlength'=>11,'placeholder' => $model->getAttributeLabel('telefono'), 'disabled' => !$model->isNewRecord ? true:false)); ?>
        <?php echo $form->error($model, 'telefono'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'extension', array('class' => '')); ?>
        <?php echo $form->numberField($model, 'extension', array('maxlength'=>5, 'placeholder' => $model->getAttributeLabel('extension'), 'disabled' => !$model->isNewRecord ? true:false)); ?>
        <?php echo $form->error($model, 'extension'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'celular', array('class' => '')); ?>
        <?php echo $form->numberField($model, 'celular', array('maxlength'=>20,'placeholder' => $model->getAttributeLabel('celular'), 'disabled' => !$model->isNewRecord ? true:false)); ?>
        <?php echo $form->error($model, 'celular'); ?>
    </div>
    <?php if (!$model->isNewRecord): ?>
        <div class="ui-field-container">
            <label class="">Ubicación</label>
            <input type="text" disabled="disabled" value="<?php echo $model->objCiudad->nombreCiudad . (($model->codigoSector !=0) ? (" - " . $model->objSector->nombreSector) : "") ?>">
        </div>
    <?php endif; ?>
</fieldset>
<div class="btnsDirecciones">
<?php if ($model->isNewRecord): ?>
    
    <?php if(isset($modal)): ?>
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Guardar
            <input type="button" data-enhanced="true" value="Guardar" data-role="direccion-adicionar" data-modal=1>
        </div>
    <?php else: ?>
        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
            Guardar
            <input type="button" data-enhanced="true" value="Guardar" data-role="direccion-adicionar" data-modal=0>
        </div>
    <?php endif;?>
<?php endif; ?>

</div>
<?php $this->endWidget(); ?>

<?php if(isset($modal)): ?>
    </div>
<?php endif;?>