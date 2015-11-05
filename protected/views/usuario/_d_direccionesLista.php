<?php $radio = isset($radio) ? $radio : false; ?>
<?php $idDireccionSeleccionada = isset($idDireccionSeleccionada) ? $idDireccionSeleccionada : 0; ?>

<?php foreach ($listDirecciones as $idx => $model): ?>
    <div class="col-xs-12 col-sm-6 col-md-4 elemento-exterior" id="div-direccion-exterior-<?php echo $model->idDireccionDespacho ?>">
        <div id="div-direccion-interior-<?php echo $model->idDireccionDespacho ?>" class="elemento-interior">
            <?php $this->renderPartial('/usuario/_d_direccionVista', array('model' => $model, 'editar' => true, 'radio' => $radio, 'idDireccionSeleccionada' => $idDireccionSeleccionada)); ?>
        </div>
    </div>
<?php endforeach; ?>