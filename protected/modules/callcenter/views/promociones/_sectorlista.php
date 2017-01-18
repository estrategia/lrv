<select id='sector-promocion' class="form-control">
    <option value="<?php echo Yii::app()->params->sector['*']?>">Todos los sectores</option>
    <?php foreach($sectores as $sector):?>
                <option value="<?php echo $sector->objSector->codigoSector?>"><?php echo $sector->objSector->nombreSector?></option>  
    <?php endforeach; ?>
</select>
