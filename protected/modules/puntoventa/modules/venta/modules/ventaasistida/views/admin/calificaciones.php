<?php
$columns = array(
        array(
            'header' => 'Código producto',
            'value' => '$data->codigoProducto',
            'filter' => CHtml::activeTextField($model, 'codigoProducto', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Nombre producto',
            'value' => '$data->objProducto->descripcionProducto',
        ),
    
        array(
            'header' => 'Identificación usuario',
            'value' => '$data->identificacionUsuario',
            'filter' => CHtml::activeTextField($model, 'identificacionUsuario', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Nombre usuario',
            'value' => function ($data){ 
                        if($data->objUsuario):
                            return $data->objUsuario->nombre." ".$data->objUsuario->apellido;
                        else:
                            return '';
                        endif;
            }
        ),
        array(
            'header' => 'Calificacion',
            'value' => '$data->calificacion',
            'filter' => CHtml::activeTextField($model, 'calificacion', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Titulo',
            'value' => '$data->titulo',
        ),
        array(
            'header' => 'Comentario',
            'value' => '$data->comentario',
        ),
        array(
            'header' => 'fecha',
            'value' => '$data->fecha',
        ),
        array(
            'header' => 'Aprobado',
            'type' => 'raw',
            'value' => function ($data){return ($data->aprobado == 1) ? 'Aprobado': 'Sin Aprobar';},
            'filter' => CHtml::dropDownList('ProductosCalificaciones[aprobado]','', Yii::app()->params->calificaciones["estados"], array("class" => "form-control", 'prompt'=>'Seleccione'))
        ),
        array(
                'header' => 'Aprobar',
                'type' => 'raw',
                'value' => function ($data){
                                 if($data->aprobado != 1){
                                    return CHtml::link("Aprobar", "#", array("data-ajax" => "false", "data-calificacion" => $data->idCalificacion, 'data-role' => 'aprobar-calificacion'));    
                                 }else return '';
                }
       ),
    ) ;
      

$this->widget('zii.widgets.grid.CGridView', array(
    'pager' => array(
        'header' => '',
        'firstPageLabel' => '&lt;&lt;',
        'prevPageLabel' => 'Anterior',
        'nextPageLabel' => 'Siguiente',
        'lastPageLabel' => '&gt;&gt;',
        'maxButtonCount' => 8
    ),
    'id' => 'grid-calificaciones',
    'beforeAjaxUpdate' => new CJavaScriptExpression("function() { }"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() { }"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { bootbox.alert('Error, intente de nuevo');}"),
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => $columns
    ,
));
?>