<?php
/* @var $this ComprasController */
/* @var $model Compras */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'compras-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'identificacionUsuario'); ?>
		<?php echo $form->textField($model,'identificacionUsuario',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'identificacionUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'documentoCruce'); ?>
		<?php echo $form->textField($model,'documentoCruce',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'documentoCruce'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaCompra'); ?>
		<?php echo $form->textField($model,'fechaCompra'); ?>
		<?php echo $form->error($model,'fechaCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaEntrega'); ?>
		<?php echo $form->textField($model,'fechaEntrega'); ?>
		<?php echo $form->error($model,'fechaEntrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipoEntrega'); ?>
		<?php echo $form->textField($model,'tipoEntrega'); ?>
		<?php echo $form->error($model,'tipoEntrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'donacionFundacion'); ?>
		<?php echo $form->textField($model,'donacionFundacion'); ?>
		<?php echo $form->error($model,'donacionFundacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idComercial'); ?>
		<?php echo $form->textField($model,'idComercial',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'idComercial'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subtotalCompra'); ?>
		<?php echo $form->textField($model,'subtotalCompra'); ?>
		<?php echo $form->error($model,'subtotalCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'impuestosCompra'); ?>
		<?php echo $form->textField($model,'impuestosCompra'); ?>
		<?php echo $form->error($model,'impuestosCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'baseImpuestosCompra'); ?>
		<?php echo $form->textField($model,'baseImpuestosCompra'); ?>
		<?php echo $form->error($model,'baseImpuestosCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'totalCompra'); ?>
		<?php echo $form->textField($model,'totalCompra'); ?>
		<?php echo $form->error($model,'totalCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idEstadoCompra'); ?>
		<?php echo $form->textField($model,'idEstadoCompra'); ?>
		<?php echo $form->error($model,'idEstadoCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idOperador'); ?>
		<?php echo $form->textField($model,'idOperador'); ?>
		<?php echo $form->error($model,'idOperador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observacion'); ?>
		<?php echo $form->textField($model,'observacion',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'observacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idTipoVenta'); ?>
		<?php echo $form->textField($model,'idTipoVenta'); ?>
		<?php echo $form->error($model,'idTipoVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activa'); ?>
		<?php echo $form->textField($model,'activa'); ?>
		<?php echo $form->error($model,'activa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio'); ?>
		<?php echo $form->error($model,'domicilio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'flete'); ?>
		<?php echo $form->textField($model,'flete'); ?>
		<?php echo $form->error($model,'flete'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'invitado'); ?>
		<?php echo $form->textField($model,'invitado'); ?>
		<?php echo $form->error($model,'invitado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoPerfil'); ?>
		<?php echo $form->textField($model,'codigoPerfil'); ?>
		<?php echo $form->error($model,'codigoPerfil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'saldosPdv'); ?>
		<?php echo $form->textArea($model,'saldosPdv',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'saldosPdv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seguimiento'); ?>
		<?php echo $form->textField($model,'seguimiento'); ?>
		<?php echo $form->error($model,'seguimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoCiudad'); ?>
		<?php echo $form->textField($model,'codigoCiudad',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codigoCiudad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoSector'); ?>
		<?php echo $form->textField($model,'codigoSector',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'codigoSector'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tiempoDomicilioCedi'); ?>
		<?php echo $form->textField($model,'tiempoDomicilioCedi'); ?>
		<?php echo $form->error($model,'tiempoDomicilioCedi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'valorDomicilioCedi'); ?>
		<?php echo $form->textField($model,'valorDomicilioCedi'); ?>
		<?php echo $form->error($model,'valorDomicilioCedi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoCedi'); ?>
		<?php echo $form->textField($model,'codigoCedi'); ?>
		<?php echo $form->error($model,'codigoCedi'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idVendedor'); ?>
		<?php echo $form->textField($model,'idVendedor'); ?>
		<?php echo $form->error($model,'idVendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigoVendedor'); ?>
		<?php echo $form->textField($model,'codigoVendedor'); ?>
		<?php echo $form->error($model,'codigoVendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'estadoSubasta'); ?>
		<?php echo $form->textField($model,'estadoSubasta'); ?>
		<?php echo $form->error($model,'estadoSubasta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->