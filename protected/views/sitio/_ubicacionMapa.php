<div data-role='page' id='page-ubicacion-map' class="map">
    <div data-role='main' class='ui-content'>
        <div class="page-header center">
            <h1 class="page-title center">Ubica en el mapa el lugar donde deseas que entreguemos el pedido</h1>
            <button onclick="tour.start()" class="ui-btn ui-btn-inline ui-corner-all ui-shadow ui-mini float-right">?</button>
            <div id="select-ubicacion-content" style="width: 80%;" class="center-div">
                <div id="select-ubicacion-psubsector" style="width: 48%;" class="center-div ui-mini">
                    <select data-role="ciudad-despacho-map" style="width: 100%" onchange="change()">
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
            <a id="confirma-ubicacion" style="width: 35%;" href="#" class='ui-btn ui-btn-n ui-corner-all ui-shadow ui-mini float-right' data-role="ubicacion-seleccion-mapa">Confirmar</a>
        </div>
    </div>
</div>
