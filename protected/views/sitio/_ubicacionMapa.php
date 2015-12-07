<div data-role='page' id='page-ubicacion-map' class="map">
    <div data-role='main' class='ui-content'>
        <div class="page-header center">
            <h1 class="page-title center">Ubicaci&oacute;n de entrega del pedido</h1>
            <h2 class="center">Arrastra el mapa hasta tu ubicaci&oacute;n o utiliza la lista de ciudades y sectores</h2>
            <div id="select-ubicacion-content" style="width: 80%;" class="center-div">
                <div id="select-ubicacion-psubsector" style="width: 48%;" class="center-div ui-mini">
                    <select data-role="ciudad-despacho-map" style="width: 100%">
                        <option value="">ciudad ...</option>
                        <?php foreach ($listCiudadesSectores as $ciudad): ?>
                            <option data-latitud="<?php echo $ciudad->latitudGoogle ?>" data-longitud="<?php echo $ciudad->longitudGoogle ?>" value="<?php echo $ciudad->codigoCiudad ?>-0"><?php echo $ciudad->nombreCiudad ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

            </div>
        </div>
        <div id="map" style="height:100%"></div>
        <div class="page-footer center">
            <a style="width: 35%;" href='#' class='ui-btn ui-btn-r ui-corner-all ui-shadow ui-mini float-left' data-rel='back'>Cancelar</a>
            <a  style="width: 35%;" href="#" class='ui-btn ui-btn-n ui-corner-all ui-shadow ui-mini float-right' data-role="ubicacion-seleccion-mapa">Confirmar</a>
        </div>
    </div>
</div>
