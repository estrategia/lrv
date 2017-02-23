<div class="modal fade" id="modalBodegas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class='row'>
                    <div class='col-md-12 text-justify' >
                       <?php if($tipo == 1):?>
                        Lo sentimos, en este momento contamos con <?php echo $saldoUnidad ?> unidad(es) disponible(s) para entrega en condiciones normales.
                        Las unidades restantes estaran disponibles en un tiempo de entrega de <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> horas y con forma de pago en L&iacute;nea
                       <?php elseif ($tipo == 2): ?>
                       Lo sentimos, No contamos con unidades para entrega en condiciones normales.
        			   Las unidades estaran disponibles en un tiempo de entrega de  <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> horas y con forma de pago en L&iacute;nea
                       <?php endif;?>   
                    </div>
                </div> 

            </div>
            <div class="modal-footer">
                <a class='btn btn-primary' href="<?php echo CController::createUrl('/callcenter/telefarma/catalogo/bodega', array('producto' => $objProducto->codigoProducto, 'ubicacion' => $cantidadUbicacion, 'bodega' => $cantidadBodega)) ?>" data-ajax='false'>Solicitar producto</a>
                <a class='btn btn-danger' data-dismiss="modal" href='#'>Cancelar</a> 
            </div>
        </div>
    </div>
</div>
