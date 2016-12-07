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
				<th>C&oacute;digo del producto</th>
				<th>Producto</th>
				<th>C&oacute;digo del proveedor</th>
				<th>Proveedor</th>
				<th>Cantidad unidades</th>
				<th>Cantidad fracciones</th>
			</tr>
		</thead>
		<tbody>
		<?php foreach($formulasMedico as $formulaMedica):?>
			<tr class="odd">
				<td colspan="6"> <?= $formulaMedica->nombreMedico?> -  <?= $formulaMedica->institucion?></td>
			</tr>
			<?php foreach($formulaMedica->listProductosVC as $productoVC):?>
				<tr class="even">
					<td><?= $productoVC->codigoProducto ?></td>
					<td><?= $productoVC->objProducto->descripcionProducto ?></td>
					<td><?= $productoVC->objProducto->codigoProveedor ?></td>
					<td><?= $productoVC->objProducto->objProveedor->nombreProveedor ?></td>
					<?php $unidades = $fraccionados = 0;?>
					<?php foreach ($productoVC->listComprasItems as $item):?>
						<?php $unidades += $item->unidades;
							  $fraccionados+= $item->fracciones;
						?>
					<?php endforeach;?>
					
					<td class="align-right"><?= $unidades ?></td>
					<td class="align-right"><?= $fraccionados ?></td>
				</tr>
			<?php endforeach;?>
			
		<?php endforeach;?>	
		</tbody>
	
	</table>
</div>
<?php endif;?>