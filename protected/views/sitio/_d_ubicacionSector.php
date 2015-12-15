<?php if (!empty($listSectorCiudad)): ?>
    <?php if ($this->isMobile): ?>
        <div id="select-ubicacion-preferencia" style="width: 48%;" class="float-right ui-mini">
            <select data-role="sector-despacho-map" style="width: 100%">
                <option value="">sector ...</option>
                <?php foreach ($listSectorCiudad as $objSectorCiudad): ?>
                    <option value="<?php echo "$objSectorCiudad->codigoCiudad-$objSectorCiudad->codigoSector"  ?>" data-latitud="<?php echo $objSectorCiudad->latitudGoogle ?>" data-longitud="<?php echo $objSectorCiudad->longitudGoogle ?>"> <?php echo $objSectorCiudad->objSector->nombreSector ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php else: ?>
        <div id="select-ubicacion-preferencia" style="width: 49%;" class="float-right">
            <select data-role="sector-despacho-map" class='form-control ciudades' style="width: 100%">
                <option value="">Seleccione sector ...</option>
                <?php foreach ($listSectorCiudad as $objSectorCiudad): ?>
                    <option value="<?php echo "$objSectorCiudad->codigoCiudad-$objSectorCiudad->codigoSector"  ?>" data-latitud="<?php echo $objSectorCiudad->latitudGoogle ?>" data-longitud="<?php echo $objSectorCiudad->longitudGoogle ?>"> <?php echo $objSectorCiudad->objSector->nombreSector ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    <?php endif; ?>
<?php endif; ?>