<?php
/* @var $this OperadorController */
/* @var $model Operador */

$this->breadcrumbs = array(
    'Inicio' => array('/callcenter'),
    'Operadores Logisticos',
);
?>

<h1>Asociar Ciudad</h1>

<a href="<?php echo $this->createUrl('createCiudad', array('idBodega' => $idBodega)) ?>" class="btn btn-primary btn-lg">
    <i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Asociar ciudad
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
    'ajaxUrl' => $this->createUrl('admin'),
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'idBodega',
            'value' => function($data){
    			return $data->objBodega->nombreBodega;
    		},
            'header' => 'Nombre Bodega',
            'filter' => false
        ),
        array(
        	'name' => 'codigoCiudad',
        	'value' => function($data){
        		return $data->codigoCiudad ."-". $data->objBodega->nombreBodega;
        	},
        	'header' => 'Codigo Ciudad',
        ),
        array(
            'name' => 'prioridad',
            'value' => '$data->prioridad',
            'header' => 'Prioridad',
        //'filter' => CHtml::activeTextField($model, 'activo', array('class'=>'form-control input-sm')),
        ),
    	
        array(
        	'header' => 'Actualizar',
        	'type' => 'raw',
        	'value' => function ($data){
			   	return CHtml::link("Actualizar", CController::createUrl('updateCiudad', array('codigoCiudad' => $data->codigoCiudad,
			       			'idBodega' => $data->idBodega
			   	)) );
        }
        		
        )
    ),
));
?>
