<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs=array(
	'Operadors'=>array('index'),
	'Create',
);
?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-plus-sign"></i>Crear Operador</h2>
            </div>
            <div class="box-content">
                <?php $this->renderPartial('_form', array('model' => $model)); ?>
            </div>
        </div>
    </div>

</div>
