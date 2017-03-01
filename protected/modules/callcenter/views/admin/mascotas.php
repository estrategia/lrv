<?php echo CHtml::button('Exportar excel', array('class' => 'btn btn-primary btn-sm', 'submit' => CController::createUrl('exportarMascotas', array('excel' => true)))); ?>

<?php
$columns = array(
        array(
            'header' => '#',
            'value' => '$data->idMascota',
            'filter' => CHtml::activeTextField($model, 'idMascota', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Cedula',
            'value' => '$data->cedulaCliente',
            'filter' => CHtml::activeTextField($model, 'cedulaCliente', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Nombre cliente',
            'value' => '$data->nombreCliente',
            'filter' => CHtml::activeTextField($model, 'nombreCliente', array('class' => 'form-control')), 
        ),
        array(
            'header' => 'Fecha Nacimiento',
            'value' => '$data->fechaNacimientoCliente',
            'filter' => CHtml::activeTextField($model, 'fechaNacimientoCliente', array('class' => 'form-control')),
        ),
		array(
				'header' => 'Ciudad',
				'type' => 'raw',
				'value' => '$data->objCiudad->nombreCiudad',
				'filter' => CHtml::dropDownList('Mascotas[codigoCiudad]','', CHtml::listData(Ciudad::model()->findAll(),'codigoCiudad','nombreCiudad'), array("class" => "form-control", 'prompt'=>'Seleccione'))
		),
        array(
            'header' => 'Direcci&oacute;n',
            'type' => 'raw',
            'value' => '$data->direccion',
            'filter' => CHtml::activeTextField($model, 'direccion', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Tel&eacute;fono',
            'type' => 'raw',
            'value' => '$data->telefono',
            'filter' => CHtml::activeTextField($model, 'telefono', array('class' => 'form-control')),
        ),
		array(
				'header' => 'Tipo Mascota',
				'type' => 'raw',
				'value' => 'Yii::app()->params->mascotas["tipo"][$data->tipoMascota]',
				'filter' => CHtml::dropDownList('Mascotas[tipoMascota]','', Yii::app()->params->mascotas["tipo"], array("class" => "form-control", 'prompt'=>'Seleccione'))
			
		),
		array(
				'header' => 'Nombre mascota',
				'type' => 'raw',
				'value' => '$data->nombreMascota',
				'filter' => CHtml::activeTextField($model, 'nombreMascota', array('class' => 'form-control')),
		),
		array(
				'header' => 'Edad mascota',
				'type' => 'raw',
				'value' => '$data->edadMascota',
				'filter' => CHtml::activeTextField($model, 'edadMascota', array('class' => 'form-control')),
		),
		array(
				'header' => 'Fecha Registro',
				'type' => 'raw',
				'value' => '$data->fechaRegistro',
				'filter' => CHtml::activeTextField($model, 'fechaRegistro', array('class' => 'form-control')),
		),
   ) ;
        

        
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