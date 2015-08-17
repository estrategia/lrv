<div data-role='main'>
    <div class='ui-content' data-role='content' role='main'>
        Contamos con <?php echo $objSaldo->saldoUnidad ?> unidad(es) disponible(s) para entrega inmediata.
        Si necesitas mas unidades, estarán disponibles en <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> hrs y debes "configurar tu pedido", 
        de lo contrario solo debes dar clic en "Cancelar" y adicionar al carro la cantidad disponible.
        <a class='ui-btn ui-btn-r ui-corner-all ui-shadow cprod_add_car_spcl' href="<?php echo CController::createUrl('/catalogo/bodega', array('producto' => $objProducto->codigoProducto,'ubicacion' => $cantidadUbicacion, 'bodega'=> $cantidadBodega)) ?>" data-ajax='false'>Configurar pedido</a>
        <a class='ui-btn ui-corner-all ui-shadow' data-rel='back' href='#'>Cancelar</a> 
    </div> 
</div>