<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
    'Inicio' => array('/callcenter/'),
	'Productos'=>array('/callcenter/productos/'),
	'Admnistrar',
);

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	    'codigoBarras',
		'codigoProducto',
		'descripcionProducto',
		'presentacionProducto',
		//'idMarca',
		//'codigoProveedor',
		//'activo',
		'fraccionado',
		//'ventaVirtual',
		//'mostrarAhorroVirtual',
		//'tercero',
		array(
			'class'=>'CButtonColumn',
		    'template'=>'{view}',
		    'buttons' => array(
		        'view' => array
		        (
		            'label'=>'Detalle',     //Text label of the button.
		            'url'=> 'Yii::app()->createUrl("callcenter/productoDetalle/admin", array("codigoProducto"=>$data->codigoProducto))',
		            //'imageUrl'=>'...',  //Image URL of the button.
		            //'options'=>array(), //HTML options for the button tag.
		            //'click'=>'...',     //A JS function to be invoked when the button is clicked.
		            //'visible'=>'...',   //A PHP expression for determining whether the button is visible.
		        )
		    ),
		),
	),
)); ?>
