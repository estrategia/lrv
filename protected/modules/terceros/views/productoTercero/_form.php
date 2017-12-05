<?php
/* @var $this ProductoTerceroController */
/* @var $model Producto */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoProducto'); ?>
		<?php echo $form->textField($model,'codigoProducto',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codigoProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoBarras'); ?>
		<?php echo $form->textField($model,'codigoBarras',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'codigoBarras'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcionProducto'); ?>
		<?php echo $form->textField($model,'descripcionProducto',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'descripcionProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'presentacionProducto'); ?>
		<?php echo $form->textField($model,'presentacionProducto',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'presentacionProducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idMarca'); ?>
		<?php echo $form->textField($model,'idMarca'); ?>
		<?php echo $form->error($model,'idMarca'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoProveedor'); ?>
		<?php echo $form->textField($model,'codigoProveedor',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'codigoProveedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoImpuesto'); ?>
		<?php echo $form->textField($model,'codigoImpuesto'); ?>
		<?php echo $form->error($model,'codigoImpuesto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idUnidadNegocioBI'); ?>
		<?php echo $form->textField($model,'idUnidadNegocioBI'); ?>
		<?php echo $form->error($model,'idUnidadNegocioBI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idCategoriaBI'); ?>
		<?php echo $form->textField($model,'idCategoriaBI'); ?>
		<?php echo $form->error($model,'idCategoriaBI'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activo'); ?>
		<?php echo $form->textField($model,'activo'); ?>
		<?php echo $form->error($model,'activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoEspecial'); ?>
		<?php echo $form->textField($model,'codigoEspecial'); ?>
		<?php echo $form->error($model,'codigoEspecial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoUnidadMedida'); ?>
		<?php echo $form->textField($model,'codigoUnidadMedida',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'codigoUnidadMedida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidadUnidadMedida'); ?>
		<?php echo $form->textField($model,'cantidadUnidadMedida',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'cantidadUnidadMedida'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaCreacion'); ?>
		<?php echo $form->textField($model,'fechaCreacion'); ?>
		<?php echo $form->error($model,'fechaCreacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ventaVirtual'); ?>
		<?php echo $form->textField($model,'ventaVirtual'); ?>
		<?php echo $form->error($model,'ventaVirtual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mostrarAhorroVirtual'); ?>
		<?php echo $form->textField($model,'mostrarAhorroVirtual'); ?>
		<?php echo $form->error($model,'mostrarAhorroVirtual'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orden'); ?>
		<?php echo $form->textField($model,'orden',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'orden'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->