<?php if (!empty($sectores)): ?>
    <?php if ($this->isMobile): ?>
        <div id="select-ubicacion-preferencia" style="width: 48%;" class="float-right ui-mini">
            <select data-role="sector-despacho-map" style="width: 100%">
                <option value="">sector ...</option>
                <?php foreach ($sectores as $sector): ?>
                    <option value="<?php echo $sector->idSectorPuntoReferencia ?>" data-latitud="<?php echo $sector->objSectorCiudad->latitudGoogle ?>" data-longitud="<?php echo $sector->objSectorCiudad->longitudGoogle ?>"> <?php echo $sector->getNombreSector() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php else: ?>
        <div id="select-ubicacion-preferencia" style="width: 49%;" class="float-right">
            <select data-role="sector-despacho-map" class='form-control ciudades' style="width: 100%">
                <option value="">Seleccione sector ...</option>
                <?php foreach ($sectores as $sector): ?>
                    <option value="<?php echo $sector->idSectorPuntoReferencia ?>" data-latitud="<?php echo $sector->objSectorCiudad->latitudGoogle ?>" data-longitud="<?php echo $sector->objSectorCiudad->longitudGoogle ?>"> <?php echo $sector->getNombreSector() ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endif; ?>
<?php endif; ?>