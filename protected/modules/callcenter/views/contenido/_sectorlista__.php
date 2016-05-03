<select id='sector-modulo' class="form-control">
    <option value="<?php echo Yii::app()->params->sector['*']?>">Todos los sectores</option>
    <?php foreach($sectores->listSubSectores as $subsector):?>
            <optgroup label="<?php echo $subsector->nombreSubSector?>">
                <?php foreach($subsector->listSectorReferencias as $sectorReferencia):?>
                <option value="<?php echo $sectorReferencia->objSector->codigoSector?>"><?php echo $sectorReferencia->objSector->nombreSector?></option>  
                <?php endforeach?>
            </optgroup>
    <?php endforeach; ?>
</select>
