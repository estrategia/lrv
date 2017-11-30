<?php
/* @var $this FleteProductoTerceroController */
/* @var $model FleteProductoTercero */

$this->breadcrumbs=array(
    'Productos'=>array('productoTercero/index'),
    $model->codigoProducto => array('productoTercero/detalle', 'id' => $model->codigoProducto),
    'Fletes'=>array('fletesProducto', 'id' => $model->codigoProducto),
    $model->idFleteProducto,
    'Actualizar',
);

?>

<h1>Actualizar Flete</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'ciudades' => $ciudades)); ?>