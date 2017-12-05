<?php
/* @var $this ProductoTerceroController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	'Administrar',
);

?>

<h1>Administrar Productos</h1>
<button class="btn btn-primary">Cargar fletes</button>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->searchTerceros(Yii::app()->controller->module->user->codigoProveedor),
	'filter'=>$model,
	'columns'=>array(
		'codigoProducto',
		'codigoBarras',
		'descripcionProducto',
		'presentacionProducto',
		// 'idMarca',
		// 'codigoProveedor',
		/*
		'codigoImpuesto',
		'idUnidadNegocioBI',
		'idCategoriaBI',
		'activo',
		'codigoEspecial',
		'fraccionado',
		'numeroFracciones',
		'codigoMedidaFraccion',
		'unidadFraccionamiento',
		'codigoUnidadMedida',
		'cantidadUnidadMedida',
		'fechaCreacion',
		'ventaVirtual',
		'mostrarAhorroVirtual',
		'tercero',
		'orden',
		*/
		array(
            'class' => 'CButtonColumn',
            'template' => '{view}',
            'buttons' => array(
            	'view' => [
                    'label' => 'Detalle',
                    'url' => function($data) {
                        return Yii::app()->controller->createUrl('detalle', ['id' => $data->codigoProducto]);
                    }
                ],
            )
        ),
	),
)); ?>
