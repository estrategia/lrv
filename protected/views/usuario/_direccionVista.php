<table>
    <tr>
        <td><strong>Destinatario</strong></td>
        <td><?php echo $model->nombre ?></td>
    </tr>
    <tr>
        <td><strong>Ubicaci&oacute;n</strong></td>
        <td><?php echo ($model->codigoSector == 0 ? $model->objCiudad->nombreCiudad : $model->objSector->nombreSector) ?></td>
    </tr>
    <tr>
        <td><strong>Direcci&oacute;n</strong></td>
        <td><?php echo $model->direccion ?></td>
    </tr>
    <tr>
        <td><strong>Barrio</strong></td>
        <td><?php echo $model->barrio ?></td>
    </tr>
    <tr>
        <td><strong>Tel&eacute;fono</strong></td>
        <td><?php echo $model->telefono ?></td>
    </tr>
    <tr>
        <td><strong>Extensi&oacute;n</strong></td>
        <td><?php echo $model->extension ?></td>
    </tr>
    <tr>
        <td><strong>Celular</strong></td>
        <td><?php echo $model->celular ?></td>
    </tr>
</table>

