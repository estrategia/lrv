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
    'id' => 'grid-cuenta-listacotizaciones',
    'beforeAjaxUpdate' => new CJavaScriptExpression("function() { $.mobile.loading('show'); }"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() { $.mobile.loading('hide'); }"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { $.mobile.loading('hide'); alert('Error, intente de nuevo');}"),
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
    ),
));
?>
<div class="space-1"></div>