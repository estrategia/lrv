<?php
/* @var $this ComprasController */
/* @var $model Compras */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCompra'); ?>
		<?php echo $form->textField($model,'idCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'identificacionUsuario'); ?>
		<?php echo $form->textField($model,'identificacionUsuario',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'documentoCruce'); ?>
		<?php echo $form->textField($model,'documentoCruce',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaCompra'); ?>
		<?php echo $form->textField($model,'fechaCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fechaEntrega'); ?>
		<?php echo $form->textField($model,'fechaEntrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipoEntrega'); ?>
		<?php echo $form->textField($model,'tipoEntrega'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'donacionFundacion'); ?>
		<?php echo $form->textField($model,'donacionFundacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idComercial'); ?>
		<?php echo $form->textField($model,'idComercial',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subtotalCompra'); ?>
		<?php echo $form->textField($model,'subtotalCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'impuestosCompra'); ?>
		<?php echo $form->textField($model,'impuestosCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'baseImpuestosCompra'); ?>
		<?php echo $form->textField($model,'baseImpuestosCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'totalCompra'); ?>
		<?php echo $form->textField($model,'totalCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idEstadoCompra'); ?>
		<?php echo $form->textField($model,'idEstadoCompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idOperador'); ?>
		<?php echo $form->textField($model,'idOperador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observacion'); ?>
		<?php echo $form->textField($model,'observacion',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idTipoVenta'); ?>
		<?php echo $form->textField($model,'idTipoVenta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activa'); ?>
		<?php echo $form->textField($model,'activa'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'domicilio'); ?>
		<?php echo $form->textField($model,'domicilio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'flete'); ?>
		<?php echo $form->textField($model,'flete'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'invitado'); ?>
		<?php echo $form->textField($model,'invitado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoPerfil'); ?>
		<?php echo $form->textField($model,'codigoPerfil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'saldosPdv'); ?>
		<?php echo $form->textArea($model,'saldosPdv',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seguimiento'); ?>
		<?php echo $form->textField($model,'seguimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoCiudad'); ?>
		<?php echo $form->textField($model,'codigoCiudad',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoSector'); ?>
		<?php echo $form->textField($model,'codigoSector',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tiempoDomicilioCedi'); ?>
		<?php echo $form->textField($model,'tiempoDomicilioCedi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'valorDomicilioCedi'); ?>
		<?php echo $form->textField($model,'valorDomicilioCedi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoCedi'); ?>
		<?php echo $form->textField($model,'codigoCedi'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idVendedor'); ?>
		<?php echo $form->textField($model,'idVendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigoVendedor'); ?>
		<?php echo $form->textField($model,'codigoVendedor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estadoSubasta'); ?>
		<?php echo $form->textField($model,'estadoSubasta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->