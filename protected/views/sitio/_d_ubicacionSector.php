<?php if (!empty($sectores)): ?>
    <div id="select-ubicacion-preferencia" style="width: 49%;" class="float-right">
        <select data-role="sector-despacho-map" class='form-control ciudades' style="width: 100%">
            <option value="">Seleccione ...</option>
            <?php foreach ($sectores as $sector): ?>
                <optgroup label="<?php echo $sector->getNombreSector() ?>">
                    <?php foreach ($sector->listPuntoReferencias as $puntoReferencia): ?>
                        <option value="<?php echo $sector->idSectorPuntoReferencia ?>" data-latitud="<?php echo $sector->objSectorCiudad->latitudGoogle ?>" data-longitud="<?php echo $sector->objSectorCiudad->longitudGoogle ?>"> <?php echo $puntoReferencia->nombreReferencia ?></option>
                    <?php endforeach; ?>            
                </optgroup>
            <?php endforeach; ?>
        </select>
    </div>
<?php endif; ?>