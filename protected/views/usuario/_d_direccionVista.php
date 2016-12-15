<?php $radio = isset($radio) ? $radio : false; ?>
<?php $idDireccionSeleccionada = isset($idDireccionSeleccionada) ? $idDireccionSeleccionada : 0; ?>

<table class="table table-striped">
    <tr>
        <td <?php echo ( $radio ? "" : 'colspan="2"') ?> class="text-truncate" title="<?php echo $model->descripcion ?>">
            <?php echo $model->descripcion ?>
        </td>
        <?php if ($radio): ?>
            <td>
                <button type="button" class="btn btn-primary btn-xs" data-role="ubicacion-seleccion-direccion" data-direccion="<?php echo $model->idDireccionDespacho ?>">Usar esta direcci&oacute;n</button>
            </td>
        <?php endif; ?>
    </tr>
    <tr>
        <td>Destinatario</td>
        <td class="text-truncate" title="<?php echo $model->nombre ?>"><?php echo $model->nombre ?></td>
    </tr>
    <tr>
        <td>Dirección</td>
        <td class="text-truncate" title="<?php echo $model->direccion ?>"><?php echo $model->direccion ?></td>
    </tr>
    <tr>
        <td>Barrio</td>
        <td class="text-truncate" title="<?php echo $model->barrio ?>"><?php echo $model->barrio ?></td>
    </tr>
    <tr>
        <td>Tel&eacute;fono</td>
        <td><?php echo $model->telefono ?></td>
    </tr>
    <tr>
        <td>Extensi&oacute;n</td>
        <td><?php echo $model->extension ?></td>
    </tr>
    <tr>
        <td>Celular</td>
        <td><?php echo $model->celular ?></td>
    </tr>

    <?php if ($editar): ?>
        <tr>
            <td><button class="btn btn-primary" data-role="direccion-editar" data-direccion="<?php echo $model->idDireccionDespacho ?>" data-radio="<?php echo ($radio ? 1 : 0) ?>">Editar</button></td>
            <td><button class="btn btn-default" data-role="direccion-eliminar" data-direccion="<?php echo $model->idDireccionDespacho ?>">Eliminar</button></td>
        </tr>
    <?php endif; ?>
</table>

