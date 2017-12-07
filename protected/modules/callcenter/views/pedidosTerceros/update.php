<?php
/* @var $this ComprasController */
/* @var $model Compras */

$this->breadcrumbs=array(
	'Comprases'=>array('index'),
	$model->idCompra=>array('view','id'=>$model->idCompra),
	'Update',
);

$this->menu=array(
	array('label'=>'List Compras', 'url'=>array('index')),
	array('label'=>'Create Compras', 'url'=>array('create')),
	array('label'=>'View Compras', 'url'=>array('view', 'id'=>$model->idCompra)),
	array('label'=>'Manage Compras', 'url'=>array('admin')),
);
?>

<h1>Update Compras <?php echo $model->idCompra; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>