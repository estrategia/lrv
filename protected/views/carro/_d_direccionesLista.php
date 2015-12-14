<?php $idDireccionSeleccionada = isset($idDireccionSeleccionada) ? $idDireccionSeleccionada : 0; ?>

<?php foreach ($listDirecciones as $idx => $model): ?>
<div class="radio">
    <label>
        <input type="radio" name="FormaPagoForm[idDireccionDespacho]" id="direccion-<?php echo $model->idDireccionDespacho ?>" value="<?php echo $model->idDireccionDespacho ?>" <?php echo ($idDireccionSeleccionada == $model->idDireccionDespacho ? "checked" : "") ?>>
        <div class="" data-direccion="<?php echo $model->idDireccionDespacho ?>" data-role="direccion-editar" data-vista="pasoscompra">
            <?php echo $model->descripcion ?>
        </div>
    </label>
</div>
<?php endforeach; ?>