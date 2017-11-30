<?php
/* @var $this ComprasController */
/* @var $model Compras */

$this->breadcrumbs=array(
	'Pedidos'=>array('index'),
	'Administrar',
);

?>

<h1>Administrar Compras</h1>

<div class="search-form" style="display:none">

</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'compras-grid',
	'dataProvider'=>$model->searchTerceros(Yii::app()->controller->module->user->codigoProveedor),
	'filter'=>$model,
	'columns'=>array(
		'idCompra',
		'identificacionUsuario',
		// 'documentoCruce',
		'fechaCompra',
		'fechaEntrega',
		'tipoEntrega',
		
		'idEstadoCompra',
		'activa',
		'domicilio',
		'seguimiento',
		[
			'header' => 'Ciudad',
			'value' => function($model) {
				return $model->objCiudad->nombreCiudad;
			},
			'filter' => CHtml::activeDropDownList($model, 'codigoCiudad', $ciudades, array('empty' => 'Ciudad')),

		],
		array(
            'class' => 'CButtonColumn',
            'template' => '{view}',
            'buttons' => array(
            	'view' => [
                    'label' => 'Detalle',
                    'url' => function($data) {
                        return Yii::app()->controller->createUrl('detalle', ['id' => $data->idCompra]);
                    }
                ],
            )
        ),
	),
)); ?>
