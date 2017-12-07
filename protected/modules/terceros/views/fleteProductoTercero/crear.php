<?php
/* @var $this FleteProductoTerceroController */
/* @var $model FleteProductoTercero */

$this->breadcrumbs=array(
    'Productos'=>array('productoTercero/index'),
    $codigoProducto => array('productoTercero/detalle', 'id' => $codigoProducto),
    'Fletes'=>array('fletesProducto', 'id' => $codigoProducto),
    'Crear',
);

?>

<h1>Crear Flete</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'ciudades' => $ciudades)); ?>