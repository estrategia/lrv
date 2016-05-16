<div class="modal fade" id="modalBodegas" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                <div class='row'>
                    <div class='col-md-12 text-justify' >
                        Contamos con <?php echo $objSaldo->saldoUnidad ?> unidad(es) disponible(s) para entrega inmediata.
                        Si necesitas mas unidades, estarán disponibles solo para entrega a domicilio en <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> hrs y debes "configurar tu pedido", 
                        de lo contrario solo debes dar clic en "Cancelar" y adicionar al carro la cantidad disponible.<br />        
                    </div>
                </div> 

            </div>
            <div class="modal-footer">
                <a class='btn btn-primary' href="<?php echo CController::createUrl('/catalogo/bodega', array('producto' => $objProducto->codigoProducto, 'ubicacion' => $cantidadUbicacion, 'bodega' => $cantidadBodega)) ?>" data-ajax='false'>Configurar pedido</a>
                <a class='btn btn-default' data-dismiss="modal" href='#'>Cancelar</a> 
            </div>
        </div>
    </div>
</div>