
<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'enableClientValidation' => true,
		'enableAjaxValidation' => false,
		'htmlOptions' => array (
				'id' => "buscar-form",
				'role' => 'form' 
		),
		'errorMessageCssClass' => 'has-error',
		'clientOptions' => array (
				'validateOnSubmit' => true,
				'validateOnChange' => true,
				'errorCssClass' => 'has-error',
				'successCssClass' => 'has-success' 
		) 
) );
?>

	<div class="form-group">
	       <?php // echo CHtml::labelEx('busqueda-buscar'); ?>
           <?php echo CHtml::textField('busqueda',null, array('id' => 'busqueda', 'class' => 'cantidadUso form-control')); ?>
    </div>


	<div class="col-md-12">
		<div class="form-group">
	       <?php echo CHtml::submitButton('Buscar', array('class' => "btn btn-default")); ?>
	    </div>
	</div>
<?php $this->endWidget(); ?>