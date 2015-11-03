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
    'id' => 'grid-cuenta-listacotizaciones',
    'beforeAjaxUpdate' => new CJavaScriptExpression("function() {Loading.show();}"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() {Loading.hide();}"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { Loading.hide(); bootbox.alert('Error, intente de nuevo');}"),
    'dataProvider' => $model->search(array('order' => "t.fechaCotizacion DESC", 'pageSize' => 5, 'with'=>array('objCiudad'))),
    'columns' => array(
        array(
            'header' => '#',
            //'name' => 'idCotizacion',
            'value' => '$data->idCotizacion',
        ),
        array(
            'header' => 'Fecha',
            'value' => array($this, 'gridFechaCotizacion'),
        ),
        array(
            'header' => 'Ciudad',
            'value' => '$data->objCiudad->nombreCiudad',
        ),
        array(
            'header' => 'Total',
            'value' => 'Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda["patron"], $data->totalCompra, Yii::app()->params->formatoMoneda["moneda"])',
        ),
        array(
            'header' => 'Detalle',
            'type' => 'raw',
            'value' => array($this, 'gridDetalleCotizacion'),
        ),
        array(
            'header' => 'Agregar Al Carro',
            'type' => 'raw',
            'value' => ' \'<a href="#" title="Agregar al carro" data-role="cotizaciondetalle" data-cotizacion="\' . $data->idCotizacion  . \'">Agregar al carro</a>\''
        ),
    ),
));
?>
<div class="space-1"></div>