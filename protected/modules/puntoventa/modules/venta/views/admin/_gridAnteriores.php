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
    //'id' => 'pedidos-grid',
    //'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    //'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide(); $options}"),
    //'ajaxUpdateError' => new CJavaScriptExpression("function() {Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function(xhr, textStatus, errorThrown, errorMessage) {alert(errorMessage);}"),
    //'ajaxUrl' => $this->createUrl('gridanteriores', array('usuarios' => $model->identificacionUsuario)),
    'dataProvider' => $model->searchAnteriores(),
    'columns' => array(
        array(
            'header' => "Pedido #",
            'type' => 'raw',
            'value' => array($this, 'gridDetallePedido'),
        ),
        array(
            'header' => 'PDV',
            'value' => '$data->idComercial == null ? "Sin Asignar" : $data->idComercial',
        ),
        array(
            'header' => 'Fecha Compra',
            'value' => '$data->fechaCompra',
        ),
        array(
            'header' => "Valor",
            'type' => 'raw',
            'value' => array($this, 'gridValorPedido'),
        ),
        array(
            'header' => "Dirección Despacho",
            'type' => 'raw',
            'value' => array($this, 'gridDestinoPedido'),
        ),
        array(
            'header' => "Punto de Venta",
            'type' => 'raw',
            'value' => array($this, 'gridPuntoventaPedido'),
        ),
        array(
            'header' => 'Ciudad',
            'value' => '$data->objCiudad->nombreCiudad',
        ),
        array(
            'header' => 'Sector',
            'value' => '$data->objSector->nombreSector',
        ),
    ),
));
?>