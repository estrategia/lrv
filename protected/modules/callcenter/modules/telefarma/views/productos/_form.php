
<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'enableClientValidation' => true,
		'enableAjaxValidation' => false,
		'htmlOptions' => array (
				'id' => 'bonos-tienda-form',
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

<p class="note">
	Campos con <span class="required">*</span> son obligatorios.
</p>

<?php echo $form->errorSummary($model, null, null, array('class' => 'text-danger')); ?>

<div class="form-group">
    <?php echo $form->labelEx($model, 'codigoProducto'); ?>
    <?php // echo $form->textField($model, 'codigoProducto', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
   <?php
			$this->widget ( 'zii.widgets.jui.CJuiAutoComplete', array (
					'model' => $model,
					 'id' => 'ProductosVitalCall_codigoProducto',
					'name' => 'ProductosVitalCall[codigoProducto]',
					'source' => $this->createUrl('productos/autocompleteProducto'),
					'value' => $model->codigoProducto,
					// additional javascript options for the autocomplete plugin
					'options' => array (
							'minLength' => '3' 
					),
					'htmlOptions' => array (
							'class' => 'form-control',
					) 
			)) ;
			echo $form->error ( $model, 'codigoProducto', array (
					'class' => 'text-danger' 
			) );
			?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'descripcion'); ?>
    <?php echo $form->textField($model, 'descripcion', array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'descripcion', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'fechaInicio', array('class' => 'control-label')); ?>
    <?php
				$this->widget ( 'zii.widgets.jui.CJuiDatePicker', array (
						'model' => $model,
						'attribute' => 'fechaInicio',
						'language' => 'es',
						'options' => array (
								'showAnim' => 'slide',
								'dateFormat' => 'yy-mm-dd' 
						),
						'htmlOptions' => array (
								'class' => 'form-control',
								'size' => '10',
								'maxlength' => '10',
								'placeholder' => 'yyyy-mm-dd' 
						) 
				) );
				?>
    <?php echo $form->error($model, 'fechaInicio', array('class' => 'text-danger')); ?>
</div>

<div class="form-group">
    <?php echo $form->labelEx($model, 'fechaFin', array('class' => 'control-label')); ?>
    <?php
				$this->widget ( 'zii.widgets.jui.CJuiDatePicker', array (
						'model' => $model,
						'attribute' => 'fechaFin',
						'language' => 'es',
						'options' => array (
								'showAnim' => 'slide',
								'dateFormat' => 'yy-mm-dd' 
						),
						'htmlOptions' => array (
								'class' => 'form-control',
								'size' => '10',
								'maxlength' => '10',
								'placeholder' => 'yyyy-mm-dd' 
						) 
				) );
				?>
    <?php echo $form->error($model, 'fechaFin', array('class' => 'text-danger')); ?>
</div>


<div class="form-group">
    <?php echo $form->labelEx($model, 'estado'); ?>
    <?php echo $form->dropDownList($model, 'estado', Yii::app()->params->callcenter['bonos']['estadoNombre'],array('class' => 'form-control')); ?>
    <?php echo $form->error($model, 'estado', array('class' => 'text-danger')); ?>
</div>

<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', array('class' => "btn btn-default")); ?>

<?php $this->endWidget(); ?>