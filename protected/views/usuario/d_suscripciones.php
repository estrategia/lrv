<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'pager' => array(
        'header' => '',
        'firstPageLabel' => '&lt;&lt;',
        'prevPageLabel' => 'Anterior',
        'nextPageLabel' => 'Siguiente',
        'lastPageLabel' => '&gt;&gt;',
        'maxButtonCount' => 8
    ),
    //'template'=>'{pager}\n{items}\n{pager}',
    'id' => 'grid-cuenta-listapedidos',
    'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide();}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { Loading.hide(); alert('Error, intente de nuevo');}"),
    'dataProvider' => $model->searchMisSuscripciones(array('order' => "t.fechaSuscripcion DESC", 'pageSize' => 5)),
    //'columnToggle' => true,
    //'toggleText' => 'Columnas..',
    //'itemsCssClass' => 'items ui-responsive',
    'columns' => array(
        array(
            'header' => '#',
            //'name' => 'idCompra',
            'value' => '$data->idSuscripcion',
        ),
    	array(
    		'header' => 'Producto',
    		'type' => 'raw',
    		'value' => function($model){
    		return 
    			
    			"<a href=".CController::createUrl('/catalogo/producto', array('producto' => $model->objProducto->codigoProducto, 'descripcion' => $model->objProducto->getCadenaUrl())).">
    				<img src=".Yii::app()->request->baseUrl . $model->objProducto->rutaImagen()." class='img-responsive noimagenProduct product-prom'>
    			</a>".$model->idProducto ." - " .$model->objProducto->descripcionProducto;
    		},
    	),
    	array(
    		'header' => 'Cantidad Periodos',
    		'value' => '$data->cantidadPeriodos',
    	),
        array(
            'header' => 'Cantidad',
            'value' => '$data->cantidadDisponiblePeriodoActual',
        ),
    	array(
    		'header' => 'Descuento',
    		'value' => '$data->descuentoProducto',
    	),
    	array(
    		'header' => 'Fecha Fin',
    		'value' => '$data->fechaFin',
    	),
    	array(
    			'header' => 'Editar',
    			'type' => 'raw',
    			//'value' => ' \'<a href="#" class="ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon" data-role="pedidogridestado" data-estado="\' . $data->objEstadoCompra->compraEstadoCliente  . \'">Ver</a>\''
    			'value' => function ($data){
    				return '<a href="'.CController::createURL("/suscripciones/editar", array('codigoProducto' => $data->idProducto)).'" class="" ">Editar</a>';
    			}
    	) 
    	
        /*array(
            'name' => 'idEstadoCompra',
            'type' => 'raw',
            //'value' => ' \'<a href="#" class="ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon" data-role="pedidogridestado" data-estado="\' . $data->objEstadoCompra->compraEstadoCliente  . \'">Ver</a>\''
            'value' => ' \'<a href="#" class="" data-role="pedidogridestado" data-estado="\' . $data->objEstadoCompra->compraEstadoCliente  . \'">Ver</a>\''
        ),*/
//         array(
//             'header' => 'Detalle',
//             'type' => 'raw',
//             'value' => array($this, 'gridDetallePedido'),
//         ),
//         array(
//             'header' => 'Agregar al carro',
//             'type' => 'raw',
//             'value' => ' \'<a href="#" class="center" title="Agregar al carro" data-role="pedidodetalle" data-compra="\' . $data->idCompra  . \'"><span class="glyphicon glyphicon-shopping-cart center-div" aria-hidden="true"></a>\''
//         ),
//         array(
//             'header' => 'Ocultar',
//             'type' => 'raw',
//             'value' => ' \'<a href="#" class="center" title="Ocultar" data-role="pedidolistaocultar" data-compra="\' . $data->idCompra  . \'"><span class="glyphicon glyphicon-remove center-div" aria-hidden="true"></a>\''
//         ),
    ),
));
?>
<div class="space-1"></div>
