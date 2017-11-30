<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
    'Inicio' => array('/callcenter'),
    'Productos'=>array('/callcenter/productos'),
    'Detalle'=>array('/callcenter/productoDetalle/admin', 'codigoProducto' => $model->codigoProducto),
    'Administrar imagenes',
);
?>

<?php
Yii::app()->clientScript->registerScript('imagenes-admin', "
    $('#imagenes-add-button').click(function(){
      var idProductoDetalle = $(this).attr('data-id');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/productoDetalleImagenes/crear',
        data: {render: true, idProductoDetalle: idProductoDetalle },
        dataType: 'json',
        beforeSend: function() {
        	$('#modal-detalleproductoimagen').remove();
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
            	$('body').append(data.response);
                $('#modal-detalleproductoimagen').modal({backdrop: 'static', show: true});
            } else if (data.result == 'error') {
                bootbox.alert(data.response);
            }
        },
        error: function(jqXHR, textStatus, errorThrown) {

        }
    });
    return false;
});");
?>

<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <div class="col-lg-6">
                    <h2>Editar Contenido</h2>
                </div>
                <!-- <div class="box-icon"> -->
                <div class="col-lg-6">
                    <?php $this->renderPartial('application.modules.callcenter.views.productoDetalle._opcionesDetalle', array('idProductoDetalle' => $model->idProductoDetalle, 'opcion'=>'imagenes'));?>
                </div>
            </div>
            <div class="box-content">
            	<a id="imagenes-add-button" href="#" class="btn btn-primary btn-sm" data-role="productodetalle-crear" data-id="<?= $model->idProductoDetalle ?>">
                	<i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Crear imagen
                </a>
				
                <?php 
                $this->widget('zii.widgets.grid.CGridView', array(
                	'id'=>'productodetalleimagen-grid',
                	'dataProvider'=>$model->search(),
                	'filter'=>$model,
                	'columns'=>array(
                	    'tituloImagen',
                	    'rutaImagenEscritorio',
                	    'rutaImagenMovil',
                		//'fechaCreacion',
                	    //'fechaActualizacion',
                		array(
                			'class'=>'CButtonColumn',
                		    'template'=>'{update}{delete}',
                		    'buttons' => array(
                		        'update' => array
                		        (
                		            'label'=>'Editar',
                		            'click' => "function(){
                                        $.ajax({
                                            type: 'POST',
                                            dataType : 'json',
                                            async: true,
                                            url: '" . Yii::app()->createUrl('/callcenter/productoDetalleImagenes/editar') . "',
                                            data: {render: true, idImagen: $(this).attr('href')},
                                            beforeSend: function(){ $('#modal-detalleproductoimagen').remove(); Loading.show();},
                                            success: function(data){
                                                Loading.hide();
                                                if(data.result=='ok'){
                                                    $('body').append(data.response);
                                                    $('#modal-detalleproductoimagen').modal({backdrop: 'static', show: true});
                                                }else
                                                    bootbox.alert(data.response);
                                            },
                                            error: function(data){
                                                Loading.hide();
                                                bootbox.alert('Error, intente de nuevo');
                                            }
                                        });
                                		            
                                        return false;
                                    }",
                                	'url' => '$data->idProductoDetalleImagen',
                                	//'url'=> 'Yii::app()->createUrl("callcenter/productoDetalleImagenes/editar", array("id"=>$data->idProductoDetalleImagen))',
                		            //'imageUrl'=>'...',  //Image URL of the button.
                		            //'options'=>array(), //HTML options for the button tag.
                		            //'click'=>'...',     //A JS function to be invoked when the button is clicked.
                		            //'visible'=>'...',   //A PHP expression for determining whether the button is visible.
                		        ),
                		        
                		        'delete' => array
                		        (
                		            'label'=>'Eliminar',     //Text label of the button.
                		            'url'=> 'Yii::app()->createUrl("callcenter/productoDetalleImagenes/eliminar", array("id"=>$data->idProductoDetalleImagen))',
                		            //'imageUrl'=>'...',  //Image URL of the button.
                		            //'options'=>array(), //HTML options for the button tag.
                		            //'click'=>'...',     //A JS function to be invoked when the button is clicked.
                		            //'visible'=>'...',   //A PHP expression for determining whether the button is visible.
                		        )
                		    ),
                		),
                	),
                )); ?>
            </div>
        </div>
    </div>
</div>