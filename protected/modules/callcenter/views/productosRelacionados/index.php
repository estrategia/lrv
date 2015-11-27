<?php
    $columns = array(
        array(
            'header' => '#',
            'value' => '$data->codigoProducto',
            'filter' => CHtml::activeTextField($model, 'codigoProducto', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Imagen',
            'type' => 'raw',
            'value' => function($data){

                return '<a href="'.CController::createUrl("/callcenter/productosRelacionados/crearrelacion", array("codigo" => $data->codigoProducto)).'" data-ajax="false"><img src="'.Yii::app()->request->baseUrl . $data->rutaImagen().'" title="'.$data->descripcionProducto.'"></a>';
            },
        ),
        array(
            'header' => 'Descripci&oacute;n',
            'value' => '$data->descripcionProducto',
            'filter' => CHtml::activeTextField($model, 'descripcionProducto', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Presentaci&oacute;n',
            'value' => '$data->presentacionProducto',
            'filter' => CHtml::activeTextField($model, 'presentacionProducto', array('class' => 'form-control')),
           
        ),
        array(
            'header' => '',
            'type' => 'raw',
            'value' => function($data) {
               return  CHtml::link("Crear relaci&oacute;n", CController::createUrl("/callcenter/productosRelacionados/crearrelacion", array("codigo" => $data->codigoProducto)), array("data-ajax"=>"false"));
            }
        )
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
    'id' => 'grid-modulos',
    'beforeAjaxUpdate' => new CJavaScriptExpression("function() { }"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() { }"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { bootbox.alert('Error, intente de nuevo');}"),
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => $columns,
));
?>