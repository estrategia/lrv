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
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'header' => '#',
            'value' => '$data->idModulo',
            'filter' => CHtml::activeTextField($model, 'idModulo', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Tipo',
            'type' => 'raw',
            'value' => 'Yii::app()->params->callcenter["modulosConfigurados"]["tiposModulos"][$data->tipo]',
            'filter' => CHtml::dropDownList('ModulosConfigurados[tipo]','', Yii::app()->params->callcenter["modulosConfigurados"]["tiposModulos"], array("class" => "form-control", 'prompt'=>'Seleccione'))
        ),
        array(
            'header' => 'Inicio',
            'value' => '$data->inicio',
            'filter' => CHtml::activeTextField($model, 'inicio', array('class' => 'form-control')),
            /*'filter' => $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                        'model' => $model,
                        'attribute' => 'inicio',
                        'language' => 'es',
                        'options' => array(
                            'showAnim' => 'slide',
                            'dateFormat' => 'yy-mm-dd',
                            'timeFormat' => 'hh:mm',
                            "changeYear" => true,
                            "changeMonth" => true,
                            "changeHour" => true,
                            'hourMin' => 0,
                            'hourMax' => 24,
                            'minuteMin' => 0,
                            'minuteMax' => 60,
                            'timeFormat' => 'hh:mm',
                            "yearRange" => Date("Y").":".(Date("Y")+1)
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => '10',
                            'maxlength' => '10',
                            'placeholder' => 'yyyy-mm-dd hh:mm',
                        ),
                    ))*/
        ),
        array(
            'header' => 'Fin',
            'value' => '$data->fin',
            'filter' => CHtml::activeTextField($model, 'fin', array('class' => 'form-control')),
            /*'filter' => $this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
                        'model' => $model,
                        'attribute' => 'inicio',
                        'language' => 'es',
                        'options' => array(
                            'showAnim' => 'slide',
                            'dateFormat' => 'yy-mm-dd',
                            'timeFormat' => 'hh:mm',
                            "changeYear" => true,
                            "changeMonth" => true,
                            "changeHour" => true,
                            'hourMin' => 0,
                            'hourMax' => 24,
                            'minuteMin' => 0,
                            'minuteMax' => 60,
                            'timeFormat' => 'hh:mm',
                            "yearRange" => Date("Y").":".(Date("Y")+1)
                        ),
                        'htmlOptions' => array(
                            'class' => 'form-control',
                            'size' => '10',
                            'maxlength' => '10',
                            'placeholder' => 'yyyy-mm-dd hh:mm',
                        ),
                    ))*/
        ),
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
        array(
            'header' => 'descripcion',
            'type' => 'raw',
            'value' => '$data->descripcion',
            'filter' => CHtml::activeTextField($model, 'descripcion', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Editar',
            'type' => 'raw',
            'value' => 'CHtml::link("Editar", Yii::app()->createAbsoluteUrl("/callcenter/contenido/editar", array("idModulo" => $data->idModulo, "opcion" => "editar")), array("data-ajax"=>"false"))'
        ),
        array(
            'header' => 'Inactivar',
            'type' => 'raw',
            'value' => function($data){
                return '<a href="#" data-role="modulo-inactivar" data-modulo="'.$data->idModulo.'" >'.($data->estado == "1" ? "inactivar": "activar").'</a>';
            }
        )
    ),
));
?>