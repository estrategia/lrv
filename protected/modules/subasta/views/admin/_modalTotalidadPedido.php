<div class="modal fade" id="modalSubasta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class='row'>
                    <div class='col-md-12 text-justify' >
                        Punto de Venta: <strong><?= $puntoVenta[1] ?> - <?= $puntoVenta[2] ?> </strong><br/>
                        Dirección: <strong><?= $puntoVenta[3] ?> </strong><br/>
                        Completitud del pedido: <strong><?= $puntoVenta[5] ?>% </strong><br/>
                    </div>
                </div> 
            </div>
            <div class="modal-footer">
                <a class='btn btn-primary' href="#" data-role='asignar-pedido-pdv' data-pedido='<?= $idCompra?>' data-pdv='<?= $puntoVenta[1] ?>' data-ajax='false'>Asignar pedido</a>
                <a class='btn btn-default' data-dismiss="modal" href='#'>Cancelar</a> 
            </div>
        </div>
    </div>
</div>