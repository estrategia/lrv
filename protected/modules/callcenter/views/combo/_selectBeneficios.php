Beneficio: <select class="form-control" data-role="info-beneficio">
<?php foreach($beneficios as $beneficio):?>
    <option value="<?php echo $beneficio->idBeneficio ?>"><?php echo $beneficio->mensaje ?>  No. <?php echo $beneficio->idBeneficioSincronizado ?></option>
<?php endforeach; ?>
            </select>

