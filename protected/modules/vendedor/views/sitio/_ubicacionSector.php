<?php if (!empty($listSectorCiudad)): ?>
    <div id="select-ubicacion-preferencia" style="width: 48%;" class="float-right ui-mini">
        <select data-role="sector-despacho-map" style="width: 100%">
            <option value="">sector ...</option>
            <?php foreach ($listSectorCiudad as $objSectorCiudad): ?>
                <option value="<?php echo "$objSectorCiudad->codigoCiudad-$objSectorCiudad->codigoSector" ?>" data-latitud="<?php echo $objSectorCiudad->latitudGoogle ?>" data-longitud="<?php echo $objSectorCiudad->longitudGoogle ?>"> <?php echo $objSectorCiudad->objSector->nombreSector ?></option>
            <?php endforeach; ?>
        </select>
    </div>
<?php endif; ?>