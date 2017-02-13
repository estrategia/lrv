<?php
    $columns = array(
        array(
            'header' => 'Perfil',
            'value' => '$data->objPerfil->nombrePerfil',
          //  'filter' => CHtml::activeTextField($model, 'identificacionUsuario', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Dias Bloqueo',
            'value' => '$data->diasBloqueo',
     //       'filter' => CHtml::activeTextField($model, 'nombre', array('class' => 'form-control')),
        ),
        array(
            'header' => 'Cantidad Compras',
            'value' => '$data->cantidadCompras',
     //       'filter' => CHtml::activeTextField($model, 'apellido', array('id' => 'apellido','class' => 'form-control')),
        ),
        array(
            'header' => 'Acumulado Compras',
            'value' => '$data->acumuladoCompras',
      //      'filter' => CHtml::activeTextField($model, 'correoElectronico', array('id' => 'correoElectronico','class' => 'form-control')),
        ),
    	
        array(
            'header' => '',
            'type' => 'raw',
            'value' => function($data){ 
            	return	CHtml::link("Actualizar", CController::createUrl("/callcenter/cuentasInactivas/actualizarPerfil",array('id' =>$data->idBloqueo )), array());
            }
        ),
    	array(
    		'header' => '',
    		'type' => 'raw',
    		'value' => function ($data){
    			return CHtml::link("Eliminar", CController::createUrl("/callcenter/cuentasInactivas/eliminarPerfil",array('id' =>$data->idBloqueo )), array());
    		}
    	),
    );
    ?>
    <div class="row">
    <div class="pull-right">
    <div class="form-group">
    <a href="<?php echo CController::createUrl('/callcenter/cuentasInactivas/actualizarPerfil')?>" class="btn btn-default" >Crear Asociaci&oacute;n</a>
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
	    'id' => 'grid-bloqueos-usuarios',
	    'beforeAjaxUpdate' => new CJavaScriptExpression("function() { }"),
	    'afterAjaxUpdate' => new CJavaScriptExpression("function() { }"),
	    'ajaxUpdateError' => new CJavaScriptExpression("function() { bootbox.alert('Error, intente de nuevo');}"),
	    'dataProvider' => $model->search(),
	    'filter' => $model,
	    'columns' => $columns,
	));
?>