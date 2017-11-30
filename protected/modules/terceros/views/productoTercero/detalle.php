<?php
/* @var $this ProductoTerceroController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->codigoProducto,
);

$this->menu=array(
	array('label'=>'Manage Producto', 'url'=>array('admin')),
);
?>

<a class="btn btn-default" href="<?php echo $this->createUrl('fleteProductoTercero/fletesProducto', ['id' => $model->codigoProducto]) ?>">Administrar Fletes</a>

<h1>Producto <?php echo $model->codigoProducto; ?></h1>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'codigoProducto',
		'codigoBarras',
		'descripcionProducto',
		'presentacionProducto',
		// 'idMarca',
		// 'codigoProveedor',
		// 'codigoImpuesto',
		// 'idUnidadNegocioBI',
		// 'idCategoriaBI',
		// 'activo',
		// 'codigoEspecial',
		'fechaCreacion',
		'ventaVirtual',
	),
)); ?>
<br>
<div class="form form-inline">
	<div class="form-group">
		<label for="">Actualizar Inventario</label>
		<input type="number" min="0" class="form-control" data-role="cantidad-producto" value="<?php echo $model->saldoTercero == null ? 0 : $model->saldoTercero->saldo ?>">
	</div>
	<button data-role="actualizar-inventario" data-codigo-producto="<?php echo $model->codigoProducto ?>" class="btn btn-primary">Actualizar</button>
</div>
