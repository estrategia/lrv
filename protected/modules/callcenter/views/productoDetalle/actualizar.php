<?php
/* @var $this BonosController */
/* @var $model BonosTienda */

$this->breadcrumbs=array(
    'Inicio' => array('/callcenter'),
    'Productos'=>array('/callcenter/productos'),
    'Detalle'=>array('/callcenter/productoDetalle/admin', 'codigoProducto' => $model->codigoProducto),
    'Editar contenido',
);
?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <div class="col-lg-6">
                    <h2>Editar Contenido</h2>
                </div>
                <!-- <div class="box-icon"> -->
                <div class="col-lg-6">
                    <?php $this->renderPartial('_opcionesDetalle', array('idProductoDetalle' => $model->idProductoDetalle, 'opcion'=>'contenido'));?>
                </div>
            </div>
            <div class="box-content">
                <?php  $this->renderPartial('_form', array('model' => $model)); ?>
            </div>
        </div>
    </div>
</div>