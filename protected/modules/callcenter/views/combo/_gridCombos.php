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
            'filter' => CHtml::activeTextField($model, 'descripcionCombo', array('class' => 'form-control'))
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
            'header' => 'Beneficio',
            'type' => 'raw',
            'value' => function($data) {
        if ($data->idBeneficio != null) {
            return $data->idBeneficio;
        } else {
            return "Combo creado manualmente";
        }
    },
            'filter' => CHtml::activeTextField($model, 'idBeneficio', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Tipo Beneficio',
            'type' => 'raw',
            'value' => function($data) {
        if ($data->idBeneficio != null && $data->tipoBeneficio != 0) {
            return Yii::app()->params->beneficios['recambioslabel'][$data->tipoBeneficio];
        } else {
            return "No aplica";
        }
    },
            'filter' => CHtml::dropDownList('Combo[tipoBeneficio]','', Yii::app()->params->beneficios["recambioslabel"], array("class" => "form-control", 'prompt'=>'Seleccione'))
        ),
        array(
            'header' => 'Editar',
            'type' => 'raw',
            'value' => function($data) {
        return CHtml::link("Editar", CController::createUrl("/callcenter/combo/combo", array("idCombo" => $data->idCombo, "opcion" => 'editar')), array("data-ajax" => "false"));
    },
        ),
    ),
));
