<?php
    $columns = array(
        array(
            'header' => '#',
            'value' => '$data->idDomicilio',
            'filter' => CHtml::activeTextField($model, 'idDomicilio', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Valor Domicilio',
            'value' => '$data->valorDomicilio',
            'filter' => CHtml::activeTextField($model, 'valorDomicilio', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Fecha Inicio',
            'value' => '$data->fechaInicio',
            'filter' => CHtml::activeTextField($model, 'fechaInicio', array('id' => 'fechaInicioFiltro','class' => 'form-control')),
        ),
        array(
            'header' => 'Fecha Fin',
            'value' => '$data->fechaFin',
            'filter' => CHtml::activeTextField($model, 'fechaFin', array('id' => 'fechaFinFiltro','class' => 'form-control')),
        ),
        array(
            'header' => 'Ciudad',
            'value' => '$data->objCiudad->nombreCiudad',
            'filter' => CHtml::activeDropDownList($model, 'codigoCiudad', CHtml::listData(Ciudad::listData(), 'codigoCiudad', 'nombreCiudad'), array('class' => 'estado', 'class' => 'form-control', 'prompt' => 'Todos las ciudades')),
        ),
        array(
            'header' => 'Sector',
            'value' => '$data->objSector->nombreSector',
            'filter' => CHtml::activeDropDownList($model, 'codigoSector', CHtml::listData(SectorCiudad::listDataSectorCiudad(), 'codigoSector', 'nombreSector'), array('class' => 'estado', 'class' => 'form-control', 'prompt' => 'Todos los sectores')),
           
        ),
        array(
            'header' => 'Perfil',
            'value' => '$data->objPerfil->nombrePerfil',
            'filter' => CHtml::activeDropDownList($model, 'codigoPerfil', CHtml::listData(Perfil::listData(), 'codigoPerfil', 'nombrePerfil'), array('class' => 'estado', 'class' => 'form-control', 'prompt' => 'Todos los perfiles')),
           
        ),
        array(
            'header' => '',
            'type' => 'raw',
            'value' => 'CHtml::link("Actualizar", "#", array("data-ajax"=>"true", "data-tarifa" => $data->idDomicilio, "data-role" => "tarifa-domicilio"))'
        ),
        array(
            'header' => '',
            'type' => 'raw',
            'value' => 'CHtml::link("Eliminar", "#", array("data-ajax"=>"true", "data-tarifa" => $data->idDomicilio, "data-role" => "eliminar-tarifa-domicilio"))'
        )
    );
    
?>
<div class="row">
	<div class="pull-right">
		<div class="form-group">
			<a class="btn btn-default" id="nueva-tarifa-domicilio" data-role="tarifa-domicilio">Crear tarifa</a>
		</div>
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
	    'id' => 'grid-tarifas-domicilios',
	    'beforeAjaxUpdate' => new CJavaScriptExpression("function() { }"),
	    'afterAjaxUpdate' => new CJavaScriptExpression("function() { }"),
	    'ajaxUpdateError' => new CJavaScriptExpression("function() { bootbox.alert('Error, intente de nuevo');}"),
	    'dataProvider' => $model->search(),
	    'filter' => $model,
	    'columns' => $columns,
	));
?>