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
    'ajaxUpdateError' => new CJavaScriptExpression("function() { Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
    'dataProvider' => $model->search(array('order' => "t.fechaCompra DESC", 'pageSize' => 5)),
    //'columnToggle' => true,
    //'toggleText' => 'Columnas..',
    //'itemsCssClass' => 'items ui-responsive',
    'columns' => array(
        array(
            'header' => '#',
            //'name' => 'idCompra',
            'value' => '$data->idCompra',
        ),
        array(
            'header' => 'Fecha',
            'value' => array($this, 'gridFechaPedido'),
        ),
        array(
            'headerHtmlOptions' => array('data-priority' => 1),
            'header' => 'Ciudad',
            'value' => '$data->objCiudad->nombreCiudad',
        ),
        array(
            'header' => 'Total',
            'value' => 'Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda["patron"], $data->totalCompra, Yii::app()->params->formatoMoneda["moneda"])',
        ),
        array(
            'name' => 'idEstadoCompra',
            'type' => 'raw',
            //'value' => ' \'<a href="#" class="ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon" data-role="pedidogridestado" data-estado="\' . $data->objEstadoCompra->compraEstadoCliente  . \'">Ver</a>\''
            'value' => ' \'<a href="#" class="" data-role="pedidogridestado" data-estado="\' . $data->objEstadoCompra->compraEstadoCliente  . \'">Ver</a>\''
        ),
        array(
            'header' => 'Detalle',
            'type' => 'raw',
            'value' => array($this, 'gridDetallePedido'),
        ),
        array(
            'header' => 'Agregar Al Carro',
            'type' => 'raw',
            'value' => ' \'<a href="#" title="Agregar al carro" data-role="pedidodetalle" data-compra="\' . $data->idCompra  . \'">Agregar al carro</a>\''
        ),
        array(
            'header' => 'Ocultar',
            'type' => 'raw',
            'value' => ' \'<a href="#" title="Ocultar" data-role="pedidolistaocultar" data-compra="\' . $data->idCompra  . \'">Ocultar</a>\''
        ),
    ),
));
?>
<div class="space-1"></div>