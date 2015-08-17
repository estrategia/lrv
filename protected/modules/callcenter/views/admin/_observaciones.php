<table class="table table-bordered table-hover table-striped">
    <tbody>
        <tr>
            <th>Observación </th>
            <th>Operador</th>                                             
            <th>Notificación </th>
            <th>Parametros </th>
            <th>Fecha</th>
        </tr>
        <?php if ($objCompra->observacion != null && !empty($objCompra->observacion)):  ?>
        <tr>
            <td><?php echo $objCompra->observacion?></td>
            <td></td>
            <td></td>
            <td></td>
            <td><?php echo $objCompra->fechaCompra?></td>
        </tr>
        <?php endif; ?>
        <?php foreach ($objCompra->listObservaciones as $objObservacion): ?>
            <tr>
                <td><?php echo $objObservacion->observacion?></td>
                <td><?php echo strtoupper($objObservacion->objOperador->nombre)?></td>
                <td><?php echo $objObservacion->notificarCliente == 1 ? "SI" : "NO" ?></td>
                <td><?php echo $objObservacion->objTipoObservacion !=null ? $objObservacion->objTipoObservacion->observacion:"" ?></td>
                <td><?php echo $objObservacion->fecha?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>