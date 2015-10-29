<div class="box-header well">
    <div class="col-lg-11">
        <h2><i class="glyphicon glyphicon-file"></i> Modulos</h2>
    </div>
    <!-- <div class="box-icon"> -->
    <div class="col-lg-1">
        <?php $this->renderPartial('_opciones') ?>
    </div>
</div>

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
    'columns' => array(
        array(
            'header' => '#',
            'value' => '$data->idModulo',
        ),
        'tipo',
        'inicio',
        'fin',
        array(
            'header' => 'D&iacute;as',
            'value' => function($data){
                $numDias = explode(",", $data->dias);
                $cadenaDias = "";

                foreach ($numDias as $indice => $fila) 
                {
                    if ($indice > 0) 
                    {
                        $cadenaDias .= ",";
                    }
                    $cadenaDias .= Yii::app()->params->callcenter['modulosConfigurados']['diasSemana'][$fila];
                }

                return $cadenaDias;
            },
        ),
        'descripcion',
        array(
            'header' => 'Editar',
            'type' => 'raw',
            'value' => 'CHtml::link("Editar", Yii::app()->createAbsoluteUrl("/callcenter/contenido/editar", array("modulo" => $data->idModulo)), array("data-ajax"=>"false"))'
        ),
        array(
            'header' => 'Inactivar',
            'type' => 'raw',
            'value' => '\'<a href="#" data-role="modulo-inactivar" data-modulo="\'.$data->idModulo.\'" >Inactivar</a>\''
        )
    ),
));


?>