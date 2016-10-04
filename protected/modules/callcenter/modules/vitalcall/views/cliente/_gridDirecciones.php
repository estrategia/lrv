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
    'id' => 'direcciones-grid',
    //'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    //'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide(); $options}"),
    //'ajaxUpdateError' => new CJavaScriptExpression("function() {Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function(xhr, textStatus, errorThrown, errorMessage) {alert(errorMessage);}"),
    //'ajaxUrl' => $this->createUrl('gridanteriores', array('usuarios' => $model->identificacionUsuario)),
    'dataProvider' => $model->search(),
    'columns' => array(
	        array(
	            'header' => 'Direcci&oacute;n',
	            'value' => '$data->direccion',
	        ),
	        array(
	            'header' => 'Barrio',
	            'value' => '$data->barrio',
	        ),
	        array(
	            'header' => 'Ciudad',
	            'value' => '$data->objCiudad->nombreCiudad',
	        ),
	        array(
	            'header' => "Sector",
	            'value' => '$data->objSector->nombreSector',
	        ),
	    	array(
	    		'header' => "",
	    		'type' => 'raw',	
	    		'value' => function ($data) use ($comprar){
	    			$html = CHtml::link('<i class="glyphicon glyphicon-edit"></i> ','#',array('title'=>'Actualizar', 'data-role' => 'editar-direccion',"data-direccion" => $data->idDireccionesDespachoVitalCall));
	    			$html .= CHtml::link('<i class="glyphicon glyphicon-remove"></i> ','#', array('title'=>'Eliminar', 'data-role' => 'eliminar-direccion' ,"data-direccion" => $data->idDireccionesDespachoVitalCall));
	    			$html .= CHtml::link('<i class="glyphicon glyphicon-shopping-cart'. ($comprar? "" : " display-none") .'"></i> ',CController::createUrl('pedido/nuevo/', array("direccion" => $data->idDireccionesDespachoVitalCall)), array('title'=>'Comprar aqu&iacute;'));
	    			
		    		return $html;		
	    		},
	    	),
    	),
    )
);
?>