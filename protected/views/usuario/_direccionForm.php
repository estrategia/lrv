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

    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'descripcion', array('class' => 'ui-hidden-accessible')); ?>
        <?php echo $form->textField($model, 'descripcion', array('placeholder' => $model->getAttributeLabel('descripcion'))); ?>
        <?php echo $form->error($model, 'descripcion'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'nombre', array('class' => 'ui-hidden-accessible')); ?>
        <?php echo $form->textField($model, 'nombre', array('placeholder' => $model->getAttributeLabel('nombre'))); ?>
        <?php echo $form->error($model, 'nombre'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'direccion', array('class' => 'ui-hidden-accessible')); ?>
        <?php echo $form->textField($model, 'direccion', array('placeholder' => $model->getAttributeLabel('direccion'))); ?>
        <?php echo $form->error($model, 'direccion'); ?>
    </div>

    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'barrio', array('class' => 'ui-hidden-accessible')); ?>
        <?php echo $form->textField($model, 'barrio', array('placeholder' => $model->getAttributeLabel('barrio'))); ?>
        <?php echo $form->error($model, 'barrio'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'telefono', array('class' => 'ui-hidden-accessible')); ?>
        <?php echo $form->textField($model, 'telefono', array('placeholder' => $model->getAttributeLabel('telefono'))); ?>
        <?php echo $form->error($model, 'telefono'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'extension', array('class' => 'ui-hidden-accessible')); ?>
        <?php echo $form->textField($model, 'extension', array('placeholder' => $model->getAttributeLabel('extension'))); ?>
        <?php echo $form->error($model, 'extension'); ?>
    </div>
    <div class="ui-field-container">
        <?php echo $form->labelEx($model, 'celular', array('class' => 'ui-hidden-accessible')); ?>
        <?php echo $form->textField($model, 'celular', array('placeholder' => $model->getAttributeLabel('celular'))); ?>
        <?php echo $form->error($model, 'celular'); ?>
    </div>
    <?php if (!$model->isNewRecord && $modelPago!=null): ?>
        <div class="ui-field-container">
            <?php /* echo $form->labelEx($model, 'codigoCiudad', array('class' => 'ui-hidden-accessible')); */ ?>
            <?php echo $form->dropDownList($model, 'codigoCiudad', CHtml::listData($listUbicacion, 'value', 'label', 'group'), array('prompt' => 'Seleccione ubicación', 'data-native-menu' => "false", 'placeholder' => $model->getAttributeLabel('codigoCiudad'))); ?>
            <?php echo $form->error($model, 'codigoCiudad'); ?>
        </div>
    <?php endif; ?>
</fieldset>

<?php if ($model->isNewRecord): ?>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Guardar
        <input type="button" data-enhanced="true" value="Guardar" id="btn-direccion-crear">
    </div>
<?php else: ?>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-r">
        Actulizar
        <input type="button" data-enhanced="true" value="Actulizar" id="btn-direccion-actualizar-<?php echo uniqid() ?>">
    </div>
<?php endif; ?>


<?php if (!$model->isNewRecord): ?>
    <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-n">
        Eliminar
        <input type="button" data-enhanced="true" value="Eliminar" data-direccion="<?php echo $model->idDireccionDespacho ?>" id="btn-direccion-eliminar-<?php echo uniqid() ?>">
    </div>
<?php endif; ?>
<?php $this->endWidget(); ?>