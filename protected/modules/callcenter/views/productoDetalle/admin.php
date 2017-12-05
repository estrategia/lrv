<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
    'Inicio' => array('/callcenter/'),
    'Productos'=>array('/callcenter/productos/'),
    'Detalle',
);

?>

<a href="<?php echo $this->createUrl('/callcenter/productoDetalle/crear', array('codigoProducto' => $model->codigoProducto)) ?>" class="btn btn-primary btn-sm">
<i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Crear contenido
</a>

<?php 
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'productodetalle-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
	    'titulo',
		'fechaCreacion',
	    'fechaActualizacion',
		array(
			'class'=>'CButtonColumn',
		    'template'=>'{update}{delete}',
		    'buttons' => array(
		        'update' => array
		        (
		            'label'=>'Contenido',     //Text label of the button.
		            'url'=> 'Yii::app()->createUrl("callcenter/productoDetalle/editar", array("idProductoDetalle"=>$data->idProductoDetalle))',
		            //'imageUrl'=>'...',  //Image URL of the button.
		            //'options'=>array(), //HTML options for the button tag.
		            //'click'=>'...',     //A JS function to be invoked when the button is clicked.
		            //'visible'=>'...',   //A PHP expression for determining whether the button is visible.
		        ),
		        'delete' => array
		        (
		            'label'=>'Eliminar',     //Text label of the button.
		            'url'=> 'Yii::app()->createUrl("callcenter/productoDetalle/eliminar", array("idProductoDetalle"=>$data->idProductoDetalle))',
		            //'imageUrl'=>'...',  //Image URL of the button.
		            //'options'=>array(), //HTML options for the button tag.
		            //'click'=>'...',     //A JS function to be invoked when the button is clicked.
		            //'visible'=>'...',   //A PHP expression for determining whether the button is visible.
		        )
		    ),
		),
	),
)); ?>
