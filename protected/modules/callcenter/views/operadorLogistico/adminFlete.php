<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs = array(
    'Inicio' => array('/callcenter'),
    'Operadores Logisticos',
);
?>

<h1>Administrar Operadores</h1>

<a href="<?php echo $this->createUrl('createFlete', array('idOperadorLogistico' => $idOperadorLogistico)) ?>" class="btn btn-primary btn-lg">
    <i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Crear Flete
</a>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
    'pager' => array(
        'header' => '',
        'firstPageLabel' => '&lt;&lt;',
        'prevPageLabel' => 'Anterior',
        'nextPageLabel' => 'Siguiente',
        'lastPageLabel' => '&gt;&gt;',
        'maxButtonCount' => 10
    ),
    'id' => 'operador-grid',
    //'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    //'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide(); $options}"),
    //'ajaxUpdateError' => new CJavaScriptExpression("function() {Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function(xhr, textStatus, errorThrown, errorMessage) {alert(errorMessage);}"),
    'ajaxUrl' => $this->createUrl('adminFlete'),
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'value' => '$data->objOperadorLogistico->nombreOperadorLogistico',
            'header' => CHtml::encode("Operador Logistico"),
        //    'filter' => CHtml::activeTextField($model, 'nombreOperadorLogistico', array('class' => 'form-control input-sm')),
        ),
    	array(
    		'value' => '$data->objBodegaVirtual->nombreBodega',
    		'header' => CHtml::encode("Bodega Virtual"),
    	//	'filter' => CHtml::activeTextField($model, 'nombreOperadorLogistico', array('class' => 'form-control input-sm')),
    	),
    	array(
    		'name' => 'codigoCiudad',
    		'value' => '$data->objCiudad->nombreCiudad',
    		'header' => CHtml::encode("Ciudad"),
    	//	'filter' => CHtml::activeTextField($model, 'nombreOperadorLogistico', array('class' => 'form-control input-sm')),
    	),
    	array(
    		'name' => 'rango1',
    		'value' => '$data->rango1',
    		'header' => CHtml::encode("Rango 1"),
    		//	'filter' => CHtml::activeTextField($model, 'nombreOperadorLogistico', array('class' => 'form-control input-sm')),
    	),
    	array(
    		'name' => 'rango2',
    		'value' => '$data->rango2',
    		'header' => CHtml::encode("Rango 2"),
    		//	'filter' => CHtml::activeTextField($model, 'nombreOperadorLogistico', array('class' => 'form-control input-sm')),
    	),
    		
    		array(
    				'name' => 'tiempoEntregaInicial',
    				'value' => '$data->tiempoEntregaInicial',
    				'header' => CHtml::encode("Tiempo entrega inicio"),
    				//	'filter' => CHtml::activeTextField($model, 'nombreOperadorLogistico', array('class' => 'form-control input-sm')),
    		),
    		array(
    				'name' => 'tiempoEntregaFinal',
    				'value' => '$data->tiempoEntregaFinal',
    				'header' => CHtml::encode("Tiempo entrega fin"),
    				//	'filter' => CHtml::activeTextField($model, 'nombreOperadorLogistico', array('class' => 'form-control input-sm')),
    		),
    		array(
    				'name' => 'valorKiloAdicional',
    				'value' => '$data->valorKiloAdicional',
    				'header' => CHtml::encode("Valor kilo adicional"),
    				//	'filter' => CHtml::activeTextField($model, 'nombreOperadorLogistico', array('class' => 'form-control input-sm')),
    		),
        array(
            'class' => 'CButtonColumn',
            'template' => '{update}',
        /* 'buttons' => array(
          'update' => array(
          'label' => 'Update',
          'options' => array(
          'class' => 'btn btn-small update'
          )
          ),
          'delete' => array(
          'label' => 'Delete',
          'options' => array(
          'class' => 'btn btn-small delete'
          )
          )
          ), */
        // 'htmlOptions' => array('style' => 'width: 80px'),
        )
    ),
));
?>
