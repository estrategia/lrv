<select id='sector-modulo' class="form-control">
    <?php foreach($sectores->listSubSectores as $subsector):?>
            <option value="<?php echo Yii::app()->params->sector['*']?>">Todos los sectores</option>
            <optgroup label="<?php echo $subsector->nombreSubSector?>">
                <?php foreach($subsector->listSectorReferencias as $sectorReferencia):?>
                <option value="<?php echo $sectorReferencia->objSector->codigoSector?>"><?php echo $sectorReferencia->objSector->nombreSector?></option>  
                <?php endforeach?>
            </optgroup>
    <?php endforeach; ?>
</select>
