
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
    'id' => 'gridview-listapersonal',
    'beforeAjaxUpdate' => new CJavaScriptExpression("function() { $.mobile.loading('show'); }"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() { $.mobile.loading('hide'); }"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { $.mobile.loading('hide'); alert('Error, intente de nuevo');}"),
    'dataProvider' => $model->search(array('order'=> "t.fechaCreacion DESC", 'pageSize' => 5)),
    'columns' => array(
        array(
            'header' => '#',
            'value' => '$data->idLista',
        ),
        array(
            'header' => 'Nombre de lista',
            'value' => '$data->nombreLista',
        ),
        /*array(
            'header' => 'Ver',
            'labelExpression' => '"Ver"',
            'urlExpression' => 'array("listapersonal","lista"=>$data->idLista)',
            'class' => 'CLinkColumn'
        ),*/
        array(
            'header' => 'Detalle',
            'type' => 'raw',
            'value' => array($this, 'gridDetalleLista'),
        ),
        
        array(
            'header' => 'Agregar',
            'type' => 'raw',
            'value' => ' \'<a href="#" class="ui-btn ui-btn-inline ui-icon-cart ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon center" data-role="listapersonal" data-lista="\' . $data->idLista  . \'">Agregar</a>\''
        ),
    ),
));