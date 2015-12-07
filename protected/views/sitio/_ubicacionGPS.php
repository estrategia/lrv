<div data-role='main'>
    <div class='ui-content' data-role='content' role='main'>
        <strong><?php echo $objCiudadSector->objCiudad->nombreCiudad . " - " . $objCiudadSector->objSector->nombreSector ?></strong>
        <a class='ui-btn ui-btn-n ui-corner-all ui-shadow' href='#' data-role="ubicacion-gps-seleccion" data-ciudad="<?php echo $objCiudadSector->codigoCiudad ?>" data-sector="<?php echo $objCiudadSector->codigoSector ?>">Aceptar</a>
        <a class='ui-btn ui-btn-r ui-corner-all ui-shadow' data-rel='back' href='#'>Cerrar</a>
    </div>
</div>