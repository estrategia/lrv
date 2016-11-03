<div class='well'>
<?php
$form = $this->beginWidget ( 'CActiveForm', array (
		'enableClientValidation' => true,
		'enableAjaxValidation' => false,
		'htmlOptions' => array (
				'id' => 'formula-form',
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

<div class='row'>
	<div class='col-md-3'>
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
	</div>
	<div class='col-md-3'>
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
	</div>
	<div class='col-md-1'>

<?php echo CHtml::submitButton( 'Buscar', array('class' => "btn btn-default")); ?>
	</div>
	<div class='col-md-1'>
		<?php if($formulasMedico):?>
		<?php echo CHtml::link( 'Descargar', 'descargarReporteMedico', array('class' => "btn btn-default")); ?>
		<?php endif;?>
	</div>
</div>
<?php $this->endWidget(); ?>
</div>
<div class="space-3"></div>

<?php if($formulasMedico):?>

<div id="bonos-tienda-grid" class="grid-view">
	<table class="items">
		<thead>
			<tr>
				<th>Registro M&eacute;dico</th>
				<th>Nombre M&eacute;dico</th>
				<th>Instituci&oacute;n</th>
				<th>C&oacute;digo del producto</th>
				<th>Producto</th>
				<th>C&oacute;digo del proveedor</th>
				<th>Proveedor</th>
				<th>N&uacute;mero de compras</th>
				<th>Cantidad unidades</th>
				<th>Cantidad fracciones</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($formulasMedico as $formulaMedica):?>
				<tr class="even">
					<td><?= $formulaMedica['registroMedico'] ?></td>
					<td><?= $formulaMedica['nombre'] ?></td>
					<td><?= $formulaMedica['institucion']?></td>
					<td><?= $formulaMedica['codigoProducto'] ?></td>
					<td><?= $formulaMedica['descripcion'] ?></td>
					<td><?= $formulaMedica['codigoProveedor'] ?></td>
					<td><?= $formulaMedica['nombreProveedor'] ?></td>
					<td class="align-right"><?= $formulaMedica['numeroCompras'] ?></td>
					<td class="align-right"><?= $formulaMedica['unidades'] ?></td>
					<td class="align-right"><?= $formulaMedica['fracciones'] ?></td>
				</tr>
		<?php endforeach;?>	
		</tbody>
	
	</table>
</div>
<?php endif;?>