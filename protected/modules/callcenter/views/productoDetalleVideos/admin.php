<?php
/* @var $this ProductoController */
/* @var $model Producto */

$this->breadcrumbs=array(
    'Inicio' => array('/callcenter'),
    'Productos'=>array('/callcenter/productos'),
    'Detalle'=>array('/callcenter/productoDetalle/admin', 'codigoProducto' => $model->codigoProducto),
    'Administrar videos',
);
?>

<?php
Yii::app()->clientScript->registerScript('videos-admin', "
    $('#videos-add-button').click(function(){
      var idProductoDetalle = $(this).attr('data-id');
    $.ajax({
        type: 'POST',
        async: true,
        url: requestUrl + '/callcenter/productoDetalleVideos/crear',
        data: {render: true, idProductoDetalle: idProductoDetalle },
        dataType: 'json',
        beforeSend: function() {
        	$('#modal-detalleproductovideo').remove();
            Loading.show();
        },
        complete: function(data) {
            Loading.hide();
        },
        success: function(data) {
            if (data.result == 'ok') {
            	$('body').append(data.response);
                $('#modal-detalleproductovideo').modal({backdrop: 'static', show: true});
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
                    <?php $this->renderPartial('application.modules.callcenter.views.productoDetalle._opcionesDetalle', array('idProductoDetalle' => $model->idProductoDetalle, 'opcion'=>'videos'));?>
                </div>
            </div>
            <div class="box-content">
            	<a id="videos-add-button" href="#" class="btn btn-primary btn-sm" data-role="productodetalle-crear" data-id="<?= $model->idProductoDetalle ?>">
                	<i class="glyphicon glyphicon-plus-sign glyphicon-white"></i> Crear video
                </a>
				
                <?php 
                $this->widget('zii.widgets.grid.CGridView', array(
                	'id'=>'productodetallevideo-grid',
                	'dataProvider'=>$model->search(),
                	'filter'=>$model,
                	'columns'=>array(
                	    'tituloVideo',
                	    'urlVideo',
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
                                            url: '" . Yii::app()->createUrl('/callcenter/productoDetalleVideos/editar') . "',
                                            data: {render: true, idVideo: $(this).attr('href')},
                                            beforeSend: function(){ $('#modal-detalleproductovideo').remove(); Loading.show();},
                                            success: function(data){
                                                Loading.hide();
                                                if(data.result=='ok'){
                                                    $('body').append(data.response);
                                                    $('#modal-detalleproductovideo').modal({backdrop: 'static', show: true});
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
                                	'url' => '$data->idProductoDetalleVideo',
                		        ),
                		        'delete' => array
                		        (
                		            'label'=>'Eliminar',
                		            'url'=> 'Yii::app()->createUrl("callcenter/productoDetalleVideos/eliminar", array("id"=>$data->idProductoDetalleVideo))',
                		        )
                		    ),
                		),
                	),
                )); ?>
            </div>
        </div>
    </div>
</div>