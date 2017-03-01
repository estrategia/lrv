<div data-role='main'>
    <div class='ui-content' data-role='content' role='main'>
    	<?php if($tipo == 1):?>
        Lo sentimos, contamos con <?php echo $saldoUnidad ?> unidad(es) disponible(s) para entrega en condiciones normales.
        Las unidades restantes estaran disponibles en un tiempo de entrega de  <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> horas y con forma de pago en L&iacute;nea.
        <?php elseif ($tipo == 2):?>
        Lo sentimos, No contamos con unidades para entrega en condiciones normales.
        Las unidades estaran disponibles en un tiempo de entrega de  <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> horas y con forma de pago en L&iacute;nea.
        <?php endif;?>
        <a class='ui-btn ui-btn-r ui-corner-all ui-shadow cprod_add_car_spcl' href="<?php echo CController::createUrl('/catalogo/bodega', array('producto' => $objProducto->codigoProducto,'ubicacion' => $cantidadUbicacion, 'bodega'=> $cantidadBodega)) ?>" data-ajax='false'>Solicitar producto</a>
        <a class='ui-btn ui-corner-all ui-shadow' data-rel='back' href='#'>Cancelar</a> 
    </div> 
</div>