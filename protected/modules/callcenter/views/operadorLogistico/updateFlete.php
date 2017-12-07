<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs = array(
    'Inicio' => array('/callcenter'),
    'Operadores' => array('/callcenter/operadorLogistico'),
    'Actualizar #'.$model->idOperadorLogistico,
);
?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i>Actualizar Operador</h2>
            </div>
            <div class="box-content">
                <?php $this->renderPartial('_formFlete', array('model' => $model,
                		'idOperadorLogistico' => $idOperadorLogistico,
                		'ciudades' => $ciudades,
                		'bodegas' => $bodegas
                )); ?>
            </div>
        </div>
    </div>
</div>


