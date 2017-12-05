<?php
/* @var $this ProductoTerceroController */
/* @var $model Producto */

$this->breadcrumbs=array(
	'Productos'=>array('index'),
	$model->codigoProducto=>array('detalle','id'=>$model->codigoProducto),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Productos', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('crear')),
	array('label'=>'Detalle Producto', 'url'=>array('detalle', 'id'=>$model->codigoProducto)),
);
?>

<h1>Actualizar Producto <?php echo $model->codigoProducto; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>