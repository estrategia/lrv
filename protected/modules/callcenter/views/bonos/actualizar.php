<?php
/* @var $this BonosController */
/* @var $model BonosTienda */
$this->breadcrumbs = array(
    'Inicio' => array('/callcenter'),
    'Bonos' => array('/callcenter/bonos'),
    'Actualizar',
);

?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-plus-sign"></i>Actualizar Bono</h2>
            </div>
            <div class="box-content">
                <?php $this->renderPartial('_form', array('model' => $model)); ?>
            </div>
        </div>
    </div>
</div>
