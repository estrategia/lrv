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
    'id' => 'grid-modulos',
    'beforeAjaxUpdate' => new CJavaScriptExpression("function() { }"),
    'afterAjaxUpdate' => new CJavaScriptExpression("function() { }"),
    'ajaxUpdateError' => new CJavaScriptExpression("function() { bootbox.alert('Error, intente de nuevo');}"),
    'dataProvider' => $modelModulos->searchModulos($idModulo),
    'columns' => array(
        array(
            'header' => '#',
            'value' => '$data->idModulo',
        ),
        array(
            'header' => 'Tipo',
            'type' => 'raw',
            'value' => 'Yii::app()->params->callcenter["modulosConfigurados"]["tiposModulos"][$data->tipo]',
        ),
        'inicio',
        'fin',
        array(
            'header' => 'D&iacute;as',
            'value' => function($data) {
                if (empty($data->dias)) {
                    return "NA";
                } else {
                    $numDias = explode(",", $data->dias);
                    $cadenaDias = "";

                    foreach ($numDias as $indice => $fila) {
                        if ($indice > 0) {
                            $cadenaDias .= ",";
                        }
                        $cadenaDias .= Yii::app()->params->callcenter['modulosConfigurados']['diasSemana'][$fila];
                    }

                    return $cadenaDias;
                }
            },
        ),
        'descripcion',
        array(
            'header' => 'Opción',
            'type' => 'raw',
            'value' => function($data) {
                if(count($data->objModuloGrupo)>0){
                    return "Adicionado";
                }else{
                    return CHtml::link("Adicionar", '#', array("data-role" => "agregar-modulo-grupo","data-idModulo" => $data->idModulo, 'data-accion' => '1'));
                }
            }
        ),
        array(
            'header' => 'Visualizar',
            'type' => 'raw',
            'value' => '\'<a href="#" data-role="modulo-inactivar" data-modulo="\'.$data->idModulo.\'" >Visualizar</a>\''
        )
    ),
));
?>