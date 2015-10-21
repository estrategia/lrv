<div class="col-md-4 info-oficina">
    <p>Nombre del destinatario:</p>
    <p>Ciudad:</p>
    <p>Dirección:</p>
    <p>Barrio:</p>
    <p>Teléfono:</p>
    <p>Extensión:</p>
    <p>Celular:</p>
    <?php if ($editar): ?>
        <p>
            <button class="editar" data-role="direccion-editar" data-direccion="<?php echo $model->idDireccionDespacho ?>">Editar</button>
            <button class="editar" data-role="direccion-eliminar" data-direccion="<?php echo $model->idDireccionDespacho ?>">Eliminar</button>
        </p>
    <?php endif; ?>
</div>
<div class="col-md-8 info-oficina">
    <p><?php echo $model->nombre ?></p>
    <p><?php echo $model->objCiudad->nombreCiudad . (($model->codigoSector != 0) ? (" - " . $model->objSector->nombreSector) : "") ?></p>
    <p><?php echo $model->direccion ?></p>
    <p><?php echo $model->barrio ?></p>
    <p><?php echo $model->telefono ?></p>
    <p><?php echo $model->extension ?></p>
    <p><?php echo $model->celular ?></p>
</div>
