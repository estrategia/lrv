<div class="modal animated bounceIn map" id="modal-ubicacion-map">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <div class="map-content" id="map"></div>
            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrarTour()">Cancelar</button>
                <button id="confirma-ubicacion" type="button" class="btn btn-primary" data-role="ubicacion-seleccion-mapa">Confirmar ubicaci&oacute;n</button>
                <button onclick="iniciarTour()" class="btn btn-primary float-right">?</button>
            </div>
        </div>
    </div>
</div>
<div id="tour-origen"></div>