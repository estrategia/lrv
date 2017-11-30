<?php
/* @var $this UsuarioTerceroController */
/* @var $model UsuarioTercero */

$this->breadcrumbs=array(
    'Terceros'=>array('admin'),
    'Crear',
);

$this->menu=array(
    array('label'=>'Administrar Terceros', 'url'=>array('admin')),
);
?>

<h1>Crear Usuario</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'proveedores' => $proveedores)); ?>