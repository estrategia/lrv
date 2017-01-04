<?php $mensajes = Yii::app()->user->getFlashes(); ?>
<?php if ($mensajes): ?>
    <?php foreach ($mensajes as $idx => $mensaje): ?>
        <div class="alert alert-<?php echo $idx ?> alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?php echo $mensaje ?>
        </div>
    <?php endforeach; ?>
<?php endif; ?>

<a class="btn btn-xs btn-<?php echo Yii::app()->params->callcenter['estadoCompra']['colorClass'][1] ?>" href="<?php echo $this->createUrl('/callcenter/inicio/crear', array('parametro' => 1)) ?>">Crear Inicio  </a>

<?php
$columns = array(
        array(
            'header' => '#',
            'value' => '$data->idContenidoInicio',
            'filter' => CHtml::activeTextField($model, 'idContenidoInicio', array('class' => 'form-control')),
        ),
        array(
            'header' => 'G&eacute;nero',
            'type' => 'raw',
            'value' => 'Yii::app()->params->contenidoInicio["generos"][$data->genero]',
            'filter' => CHtml::dropDownList('ContenidosInicio[genero]','', Yii::app()->params->contenidoInicio["generos"], array("class" => "form-control", 'prompt'=>'Seleccione'))
        ),
		array(
				'header' => 'Tipo',
				'type' => 'raw', 
				'value' => 'Yii::app()->params->contenidoInicio["tipos"][$data->tipo]',
				'filter' => CHtml::dropDownList('ContenidosInicio[genero]','', Yii::app()->params->contenidoInicio["tipos"], array("class" => "form-control", 'prompt'=>'Seleccione'))
		),
        array(
            'header' => 'fechaInicio',
            'value' => '$data->fechaInicio',
            'filter' => CHtml::activeTextField($model, 'fechaInicio', array('class' => 'form-control')),
        ),
        array(
            'header' => 'fechaFin',
            'value' => '$data->fechaFin',
            'filter' => CHtml::activeTextField($model, 'fechaFin', array('class' => 'form-control')),
        ),
        
        array(
            'header' => 'descripci&oacute;n',
            'type' => 'raw',
            'value' => '$data->descripcion',
            'filter' => CHtml::activeTextField($model, 'descripcion', array('class' => 'form-control')),
         ),
      );
        
        $columns[] = array(
                'header' => 'Visualizar versi&oacute;n completa',
                'type' => 'raw',
                'value' => function($data) {
                         return '<a href="#" data-role="contenido-inicio-visualizar" data-vista = "1" data-contenido="'.$data->idContenidoInicio.'" >Visualizar</a>';
                }
            );
        
        $columns[] = array(
        		'header' => 'Visualizar versi&oacute;n m&oacute;vil',
        		'type' => 'raw',
        		'value' => function($data) {
        				return '<a href="#" data-role="contenido-inicio-visualizar" data-vista = "2" data-contenido="'.$data->idContenidoInicio.'" >Visualizar</a>';
        			}
        		);
        
        $columns[] = array(
        		'header' => 'Editar',
        		'type' => 'raw',
        		'value' => 'CHtml::link("Editar", Yii::app()->createAbsoluteUrl("/callcenter/inicio/editar", array("idContenidoInicio" => $data->idContenidoInicio, "opcion" => "editar")), array("data-ajax"=>"false"))'
        );
     
        $columns[] = array(
        		'header' => 'Eliminar',
        		'type' => 'raw',
        		'value' => 'CHtml::link("Eliminar", Yii::app()->createAbsoluteUrl("/callcenter/inicio/eliminar", array("idContenidoInicio" => $data->idContenidoInicio, "opcion" => "eliminar")), array("data-ajax"=>"false"))'
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