<select id='DireccionesDespachoVitalCall_codigoSector' class="form-control" name="DireccionesDespachoVitalCall[codigoSector]">
<?php if (count($listSectorCiudad) > 0):?>
    <option value="">Seleccione...</option>
    <?php foreach($listSectorCiudad as $sector):?>
                <option value="<?php echo $sector->objSector->codigoSector?>"><?php echo $sector->objSector->nombreSector?></option>  
    <?php endforeach; ?>
<?php else:?>    
    <option value="0">Sin sectores...</option>
<?php endif;?>    
</select>
