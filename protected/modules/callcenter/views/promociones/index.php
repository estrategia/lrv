<a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][1] ?>" href="<?php echo $this->createUrl('/callcenter/promociones/crearPromocion', array('parametro' => 1)) ?>">Crear Promoción  </a>
<?php

$columns = array(
        array(
            'header' => '#',
            'value' => '$data->idPromocion',
            'filter' => CHtml::activeTextField($model, 'idPromocion', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Inicio',
            'value' => '$data->fechaInicio',
        
        ),
        array(
            'header' => 'Fin',
            'value' => '$data->fechaFin',
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
        		'header' => 'nombre',
        		'type' => 'raw',
        		'value' => '$data->nombre',
        		'filter' => CHtml::activeTextField($model, 'nombre', array('class' => 'form-control')),
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
        		'value' => 'CHtml::link("Editar", Yii::app()->createAbsoluteUrl("/callcenter/promociones/editar", array("idPromocion" => $data->idPromocion, "opcion" => "editar")), array("data-ajax"=>"false"))'
        ),
        array(
        		'header' => 'Eliminar',
        		'type' => 'raw',
        		'value' => function($data){
        		return '<a href="#" data-role="promocion-eliminar" data-promocion="'.$data->idPromocion.'" >Eliminar</a>';
        		}
        ),
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
    'columns' => $columns
        
    ,
));
?>