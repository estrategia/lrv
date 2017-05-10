<div class="ui-content grid-view">
    <table class="items" style="width: 100%">
        <thead>
            <tr>
                <th colspan="2">Resultado de operaci&oacute;n</th>
            </tr>
        </thead>
        <tbody>
            <tr class="odd">
                <td>Fecha</td>
                <td><?php echo $model->fechaTransaccion ?></td>
            </tr>
            <tr class="even">
                <td>Estado</td>
                <td><?php echo $model->mensaje ?></td>
            </tr>
            <tr class="odd">
                <td>Referencia del pedido</td>
                <td><?php echo $model->idCompra ?></td>
            </tr>
            <tr class="even">
                <td>Referencia de la transacci&oacute;n</td>
                <td><?php echo $model->refPol ?></td>
            </tr>
            <tr class="odd">
                <td>Nro Trasacci&oacute;n/CUS</td>
                <td><?php echo $model->cus ?></td>
            </tr>
            <tr class="even">
                <td>Banco</td>
                <td><?php echo $model->bancoPse ?></td>
            </tr>
            <tr class="odd">
                <td>Valor</td>
                <td><?php echo $model->valor ?></td>
            </tr>
            <tr class="even">
                <td>Moneda</td>
                <td><?php echo $model->moneda ?></td>
            </tr>
        </tbody>
    </table>
</div>




