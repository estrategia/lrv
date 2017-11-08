<?php if (empty($listDirecciones)): ?>
    <h4>No se encuentran direcciones activas</h4>
<?php else: ?>
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <th>Lugar de despacho</th>
                <th>Nombre</th>
                <th>Dirección </th>
                <th>Teléfono </th>
                <th>Celular </th>
                <th>Ciudad </th>
            </tr>
            <?php foreach ($listDirecciones as $objDireccion): ?>
                <tr>
                    <td><?php echo $objDireccion->descripcion ?></td>
                    <td><?php echo $objDireccion->nombre ?></td>
                    <td><?php echo $objDireccion->direccion ?></td>
                    <td><?php echo $objDireccion->telefono ?></td>
                    <td><?php echo $objDireccion->celular ?></td>
                    <td><?php echo $objDireccion->objCiudad->nombreCiudad ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>