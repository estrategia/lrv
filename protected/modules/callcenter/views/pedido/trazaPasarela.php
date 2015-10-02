<div class="modal fade" id="modal-trazapasarela" tabindex="-1" role="dialog" aria-labelledby="modal-trazapasarela-label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="modal-trazapasarela-label">Trazabilidad de la pasarela</h4>
            </div>
            <div class="modal-body body-scroll">
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <th>#Transacci&oacute;n</th>
                            <th>Fecha</th>
                            <th>Tipo respuesta</th>
                            <th>Estado transacci&oacute;n</th>
                            <th>Medio pago</th>
                            <th>C&oacute;d autorizaci&oacute;n</th>
                            <th>#Visible</th>
                            <th>Banco PSE</th>
                            <th>CUS PSE</th>
                        </tr>
                        <?php foreach ($objCompra->listPasarelaRespuestas as $objRespuesta): ?>
                            <tr>
                                <td><?php echo $objRespuesta->refPol ?></td>
                                <td><?php echo $objRespuesta->fechaTransaccion ?></td>
                                <td><?php echo $objRespuesta->getTipoRespuesta() ?></td>
                                <td><?php echo $objRespuesta->getEstadoTransaccion() ?></td>
                                <td><?php echo $objRespuesta->getMedioPago() ?></td>
                                <td><?php echo $objRespuesta->codigoAutorizacion ?></td>
                                <td><?php echo $objRespuesta->numeroVisible ?></td>
                                <td><?php echo $objRespuesta->bancoPse ?></td>
                                <td><?php echo $objRespuesta->cus ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>