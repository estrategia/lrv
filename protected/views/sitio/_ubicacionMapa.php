<div data-role='page' id='page-ubicacion-map' class="map">
    <div data-role='main' class='ui-content'>
        <div id="map" style="height:100%"></div>
        <div class="page-footer center map-footer">
            <div class="ui-grid-b">
                <div class="ui-block-a">
                    <a style="" href='#' class='ui-btn ui-btn-r ui-corner-all ui-shadow ui-mini ' onclick=" $.mobile.changePage('#main-page'); ">Cancelar</a>
                </div>
                <div class="ui-block-b">
                    <a id="confirma-ubicacion" style="" href="#" class='ui-btn ui-btn-n ui-corner-all ui-shadow ui-mini ' data-role="ubicacion-seleccion-mapa">Confirmar</a>
                </div>
                <div class="ui-block-c">
                    <button id="ayuda" onclick="tour.start()" class="ui-btn ui-btn-b ui-btn-inline ui-corner-all ui-shadow ui-mini ">?</button>
                </div>
            </div>
        </div>
    </div>
</div>
