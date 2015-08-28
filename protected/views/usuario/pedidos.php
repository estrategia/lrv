<?php

$this->widget('zii.widgets.grid.CGridView', array(
    'pager' => array(
        'header' => '',
        'firstPageLabel' => '&lt;&lt;',
        'prevPageLabel' => 'Anterior',
        'nextPageLabel' => 'Siguiente',
        'lastPageLabel' => '&gt;&gt;',
        'maxButtonCount' => 3
    ),
    //'template'=>'{pager}\n{items}\n{pager}',
    'id' => 'grid-cuenta-listapedidos',
    'beforeAjaxUpdate' => new CJavaScriptExpression("function() { $.mobile.loading('show'); }"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() { $.mobile.loading('hide'); }"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { $.mobile.loading('hide'); alert('Error, intente de nuevo');}"),
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
        /*array(
            'headerHtmlOptions' => array('data-priority' => 1),
            'header' => 'Ciudad',
            'value' => '$data->objCiudad->nombreCiudad',
        ),*/
        array(
            'header' => 'Total',
            'value' => 'Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda["patron"], $data->totalCompra, Yii::app()->params->formatoMoneda["moneda"])',
        ),
        array(
            'name' => 'idEstadoCompra',
            'type' => 'raw',
            //'value' => ' \'<a href="#" class="ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon" data-role="pedidogridestado" data-estado="\' . $data->objEstadoCompra->compraEstadoCliente  . \'">Ver</a>\''
            'value' => ' \'<a href="#" class="ui-btn ui-btn-inline ui-icon-status ui-btn-icon-notext ui-icon-center ui-nodisc-icon" data-role="pedidogridestado" data-estado="\' . $data->objEstadoCompra->compraEstadoCliente  . \'">Ver</a>\''
        ),
        array(
            'header' => 'Detalle',
            'type' => 'raw',
            'value' => array($this, 'gridDetallePedido'),
        ),
        array(
            'header' => 'Ocultar',
            'type' => 'raw',
            'value' => ' \'<a href="#" class="ui-btn ui-btn-inline ui-icon-cancel ui-btn-icon-notext ui-corner-all ui-icon-center ui-nodisc-icon" data-role="pedidolistaocultar" data-compra="\' . $data->idCompra  . \'"></a>\''
        ),
    ),
));
?>
<div class="space-1"></div>