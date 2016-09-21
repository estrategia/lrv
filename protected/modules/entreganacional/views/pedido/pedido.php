<div class="row">
    <div id="div-encabezado-pedido">
        <?php $this->renderPartial('_encabezadoPedido', array( )); ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">

     <!--   <div class="center">
            <div class="btn-group">
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('opcion'=>'pdv')) ?>" class="btn btn-primary ">Ubicar PDV</a>
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('opcion'=>'pedido')) ?>" class="btn btn-primary ">Pedido</a>
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('opcion'=>'cliente')) ?>" class="btn btn-primary ">Información del cliente</a>
                <a href="<?php echo $this->createUrl('/callcenter/admin/detallepedido', array('opcion'=>'observacion')) ?>" class="btn btn-primary ">Observaciones</a>
            </div>
        </div> -->

        <div id="div-detalle-pedido" style="padding-top: 20px">
            <?php $this->renderPartial('_buscar'); ?>
        </div>

    </div>
</div>

