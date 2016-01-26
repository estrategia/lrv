<div class="modal fade" id="modal-no-serviciodomicilio" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                En <strong><?php echo $nombreUbicacion ?></strong> No contamos con servicio de entrega a domicilio para. Los pedidos deben ser recogidos por el cliente en uno de nuestros Puntos de Venta"
                <div class="modal-footer center">
                    <a class='btn btn-default' data-dismiss="modal" href='#'>Cambiar ubicaci&oacute;n</a>
                    <a class='btn btn-primary' data-role="ubicacion-seleccion-nodomicilio" data-ciudad="<?php echo $objCiudadSector->codigoCiudad ?>" data-sector="<?php echo $objCiudadSector->codigoSector ?>" href='#'>Acepto pasar por el pedido</a> 
                </div>
            </div>
        </div>
    </div>
</div>