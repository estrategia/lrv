<?php $idDireccionSeleccionada = isset($idDireccionSeleccionada) ? $idDireccionSeleccionada : 0; ?>

<?php foreach ($listDirecciones as $idx => $model): ?>
    <div class="col-sm-12">
        <div class="row" style="border: 1px solid #D2CECE; margin-bottom: 5px;">
            <div class="col-sm-1">
                <input type="radio" name="FormaPagoForm[idDireccionDespacho]" id="direccion-<?php echo $model->idDireccionDespacho ?>" value="<?php echo $model->idDireccionDespacho ?>" <?php echo ($idDireccionSeleccionada == $model->idDireccionDespacho ? "checked" : "") ?>>
            </div>
            <div class="col-sm-11" data-direccion="<?php echo $model->idDireccionDespacho ?>" data-role="direccion-editar" data-vista="pasoscompra">
                <?php echo $model->descripcion ?>
            </div>
        </div>
    </div>
<?php endforeach; ?>