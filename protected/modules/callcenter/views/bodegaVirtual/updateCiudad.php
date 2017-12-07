<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs = array(
    'Inicio' => array('/callcenter'),
    'Operadores' => array('/callcenter/bodegaVirtual'),
    'Actualizar #'.$model->idBodega,
);
?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Actualizar Bodega</h2>
            </div>
            <div class="box-content">
                <?php $this->renderPartial('_formCiudad', array('model' => $model, 'ciudades' => $ciudades)); ?>
            </div>
        </div>
    </div>
</div>


