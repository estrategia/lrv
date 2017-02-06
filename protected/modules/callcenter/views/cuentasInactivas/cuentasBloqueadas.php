<?php
    $columns = array(
        array(
            'header' => 'Identificacion',
            'value' => '$data->identificacionUsuario',
            'filter' => CHtml::activeTextField($model, 'identificacionUsuario', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Nombre',
            'value' => '$data->objUsuario->nombre',
     //       'filter' => CHtml::activeTextField($model, 'nombre', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Apellido',
            'value' => '$data->objUsuario->apellido',
     //       'filter' => CHtml::activeTextField($model, 'apellido', array('id' => 'apellido','class' => 'form-control')),
        ),
        array(
            'header' => 'Correo Electronico',
            'value' => '$data->objUsuario->correoElectronico',
      //      'filter' => CHtml::activeTextField($model, 'correoElectronico', array('id' => 'correoElectronico','class' => 'form-control')),
        ),
    	array(
    		'header' => 'Mes',
    		'value' => '$data->mes',
    	//	'filter' => CHtml::activeTextField($model, 'correoElectronico', array('id' => 'correoElectronico','class' => 'form-control')),
    	),
    	array(
    		'header' => 'A&ntilde;o',
    		'value' => '$data->anho',
    	//	'filter' => CHtml::activeTextField($model, 'correoElectronico', array('id' => 'correoElectronico','class' => 'form-control')),
    	),
    	array(
    		'header' => 'N&uacute;mero de compras',
    		'value' => '$data->numeroCompras',
    	//	'filter' => CHtml::activeTextField($model, 'correoElectronico', array('id' => 'correoElectronico','class' => 'form-control')),
    	),
    	array(
    		'header' => 'Acumulado Compras',
    		'value' => '$data->acumuladoCompras',
    	//	'filter' => CHtml::activeTextField($model, 'correoElectronico', array('id' => 'correoElectronico','class' => 'form-control')),
    	),
    	array(
    		'header' => 'Fecha Registro',
    		'value' => '$data->fechaRegistro',
    		//	'filter' => CHtml::activeTextField($model, 'correoElectronico', array('id' => 'correoElectronico','class' => 'form-control')),
    	),
        array(
            'header' => '',
            'type' => 'raw',
            'value' => 'CHtml::link("Activar", "#", array("data-ajax"=>"true", "data-identificacion" => $data->identificacionUsuario, "data-id"=> $data->idBloqueoUsuario, "data-role" => "activar-usuario"))'
        ),
    );
    
        
	$this->widget('zii.widgets.grid.CGridView', array(
	    'pager' => array(
	        'header' => '',
	        'firstPageLabel' => '&lt;&lt;',
	        'prevPageLabel' => 'Anterior',
	        'nextPageLabel' => 'Siguiente',
	        'lastPageLabel' => '&gt;&gt;',
	        'maxButtonCount' => 3
	    ),
	    'id' => 'grid-bloqueos-usuarios',
	    'beforeAjaxUpdate' => new CJavaScriptExpression("function() { }"),
	    'afterAjaxUpdate' => new CJavaScriptExpression("function() { }"),
	    'ajaxUpdateError' => new CJavaScriptExpression("function() { bootbox.alert('Error, intente de nuevo');}"),
	    'dataProvider' => $model->search(),
	    'filter' => $model,
	    'columns' => $columns,
	));
?>