<div data-role='main'>
    <div class='ui-content' data-role='content' role='main'>
        En <strong><?php echo $nombreUbicacion ?></strong> No contamos con servicio de entrega a domicilio. Los pedidos deben ser recogidos por el cliente en uno de nuestros Puntos de Venta.
        <a class='ui-btn ui-corner-all ui-shadow' data-rel='back' href='#'>Cambiar ubicaci&oacute;n</a> 
        <a class='ui-btn ui-btn-r ui-corner-all ui-shadow cprod_add_car_spcl' href="#" data-ajax='false' data-role="ubicacion-seleccion-nodomicilio" data-ciudad="<?php echo $objCiudadSector->codigoCiudad ?>" data-sector="<?php echo $objCiudadSector->codigoSector ?>">Acepto pasar por el pedido</a>
    </div> 
</div>
