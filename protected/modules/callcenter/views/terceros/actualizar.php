<?php
/* @var $this UsuarioTerceroController */
/* @var $model UsuarioTercero */

$this->breadcrumbs=array(
    'Terceros'=>array('admin'),
    $model->nombreOperador,
    'Actualizar',
);

$this->menu=array(
    array('label'=>'Crear Tercero', 'url'=>array('crear')),
    array('label'=>'Administrar Terceros', 'url'=>array('admin')),
);
?>

<h1>Actualizar Tercero <?php echo $model->nombreOperador; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'proveedores' => $proveedores)); ?>