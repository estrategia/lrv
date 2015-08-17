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
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('pedido' => $params['objCompra']->idCompra, 'opcion'=>'cliente')) ?>" class="btn btn-primary <?php echo ($opcion=="cliente" ? "active" : "") ?>">Información del cliente</a>
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('pedido' => $params['objCompra']->idCompra, 'opcion'=>'observacion')) ?>" class="btn btn-primary <?php echo ($opcion=="observacion" ? "active" : "") ?>">Observaciones</a>
            </div>
        </div>

        <div id="div-detalle-pedido" style="padding-top: 20px">
            <?php $this->renderPartial($vista, $params); ?>
        </div>

    </div>
</div>