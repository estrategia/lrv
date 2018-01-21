<div class="row">
    <div id="div-encabezado-pedido">
        <?php $this->renderPartial('_encabezadoPedido', array('objCompra' => $params['objCompra'])); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

        <div class="center">
            <div class="btn-group">
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('pedido' => $params['objCompra']->idCompra, 'opcion'=>'pdv')) ?>" class="btn btn-primary <?php echo ($opcion=="pdv" ? "active" : "") ?>">Ubicar PDV</a>
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('pedido' => $params['objCompra']->idCompra, 'opcion'=>'pedido')) ?>" class="btn btn-primary <?php echo ($opcion=="pedido" ? "active" : "") ?>">Pedido</a>
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('pedido' => $params['objCompra']->idCompra, 'opcion'=>'envio')) ?>" class="btn btn-primary <?php echo ($opcion=="envio" ? "active" : "") ?>">Informaci&oacute;n de env&iacute;o</a>
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('pedido' => $params['objCompra']->idCompra, 'opcion'=>'cliente')) ?>" class="btn btn-primary <?php echo ($opcion=="cliente" ? "active" : "") ?>">Información del cliente</a>
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('pedido' => $params['objCompra']->idCompra, 'opcion'=>'observacion')) ?>" class="btn btn-primary <?php echo ($opcion=="observacion" ? "active" : "") ?>">Observaciones</a>
            </div>
        </div>

        <div id="div-detalle-pedido" style="padding-top: 20px">
            <?php $this->renderPartial($vista, $params); ?>
        </div>

    </div>
</div>

<div class="modal fade" id="modal-modificar-ahorro" tabindex="-1" role="dialog" aria-labelledby="modal-modificar-ahorro-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="modal-modificar-ahorro-label">
                    Modificar ahorro <span></span>
                    <div class="text-center"></div>
                </h4>
            </div>
            <div class="modal-body">
                <?php echo $this->renderPartial('_formModificarAhorro', array('model' => new ModificarAhorroForm)) ?>
            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" data-role="modificar-ahorro-guardar">Modificar</button>
            </div>
        </div>
    </div>
</div>