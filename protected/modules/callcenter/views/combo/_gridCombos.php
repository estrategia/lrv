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
            'value' => '$data->idCombo',
            'filter' => CHtml::activeTextField($model, 'idCombo', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Tipo',
            'type' => 'raw',
            'value' => '$data->descripcionCombo',
            'filter' =>  CHtml::activeTextField($model, 'descripcionCombo', array('class' => 'form-control'))
        ),
        array(
            'header' => 'Inicio',
            'value' => '$data->fechaInicio',
            'filter' => CHtml::activeTextField($model, 'fechaInicio', array('class' => 'form-control')), 
        ),
        array(
            'header' => 'Fin',
            'value' => '$data->fechaFin',
            'filter' => CHtml::activeTextField($model, 'fechaFin', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Editar',
            'type' => 'raw',
            'value' => function($data){
                 return  CHtml::link("Editar", CController::createUrl("/callcenter/combo/combo", array("idCombo" => $data->idCombo, "opcion" => 'editar')), array("data-ajax"=>"false"));

            },
          
        ),
    ),
));