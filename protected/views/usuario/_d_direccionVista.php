<?php $radio = isset($radio) ? $radio : false; ?>
<?php $idDireccionSeleccionada = isset($idDireccionSeleccionada) ? $idDireccionSeleccionada : 0; ?>

<table class="table table-striped">
    <tr>
        <td colspan="2">
            <?php if ($radio): ?>
                <input type="radio" data-descripcion="<?php echo $model->descripcion?>" data-ubicacion="<?php echo $model->objCiudad->nombreCiudad . (($model->codigoSector != 0) ? (" - " . $model->objSector->nombreSector) : "") ?>" name="FormaPagoForm[idDireccionDespacho]" id="direccion-<?php echo $model->idDireccionDespacho ?>" value="<?php echo $model->idDireccionDespacho ?>" <?php echo ($idDireccionSeleccionada == $model->idDireccionDespacho ? "checked" : "") ?>>
            <?php endif; ?>
            <?php echo $model->descripcion ?>
        </td>
    </tr>
    <tr>
        <td>Destinatario</td>
        <td><?php echo $model->nombre ?></td>
    </tr>
    <tr>
        <td>Ciudad</td>
        <td><?php echo $model->objCiudad->nombreCiudad . (($model->codigoSector != 0) ? (" - " . $model->objSector->nombreSector) : "") ?></td>
    </tr>
    <tr>
        <td>Dirección</td>
        <td><?php echo $model->direccion ?></td>
    </tr>
    <tr>
        <td>Barrio</td>
        <td><?php echo $model->barrio ?></td>
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
            <td><button class="editar" data-role="direccion-editar" data-direccion="<?php echo $model->idDireccionDespacho ?>" data-radio="<?php echo ($radio ? 1 : 0) ?>">Editar</button></td>
            <td><button class="editar" data-role="direccion-eliminar" data-direccion="<?php echo $model->idDireccionDespacho ?>">Eliminar</button></td>
        </tr>
    <?php endif; ?>
</table>

