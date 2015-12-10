<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-9">
                <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
                    <h3>Datos Compra</h3>
                <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
                    <h3>Datos Pedido</h3>
                <?php endif; ?>

            </div>
            <div class="col-md-3">
                <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "pedidodetalle", "data-compra" => $objCompra->idCompra, 'class' => 'btn btn-default', 'data-ajax' => "false")); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Fecha de la compra <?= $objCompra->fechaCompra ?></h4>
            </div>
        </div>
        <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
            <div class="row">
                <div class="col-md-12">
                    <h4>Fecha de la entrega <?= $objCompra->fechaEntrega ?></h4>
                </div>
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>

                        <thead>
                        <th colspan="2">Direcci&oacute;n de despacho</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Nombre Destinatario</td>
                                <td><?php echo $objCompra->objCompraDireccion->nombre ?></td>
                            </tr>
                            <tr>
                                <td>Ciudad</td>
                                <td><?php echo $objCompra->objCiudad->nombreCiudad . " - " . $objCompra->objSector->nombreSector ?></td>
                            </tr>
                            <tr>
                                <td>Direcci&oacute;n</td>
                                <td><?php echo $objCompra->objCompraDireccion->direccion ?></td>
                            </tr>
                            <tr>
                                <td>Barrio</td>
                                <td><?php echo $objCompra->objCompraDireccion->barrio ?></td>
                            </tr>
                            <tr>
                                <td>Telefono</td>
                                <td><?php echo $objCompra->objCompraDireccion->telefono ?></td>
                            </tr>
                        </tbody>
                    <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
                        <thead>
                        <th>Punto de venta entrega</th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $objCompra->objPuntoVenta->nombrePuntoDeVenta ?></td>
                            </tr>
                            <tr>
                                <td><?php echo $objCompra->objPuntoVenta->direccionPuntoDeVenta ?></td>
                            </tr>
                        </tbody>
                    <?php endif; ?>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h4>Forma de Pago: </h4> <?php echo $objCompra->objFormaPagoCompra->objFormaPago->formaPago; ?>
            </div>
        </div>

        <?php
        $this->renderPartial("_d_listarProductos", array(
            "tituloTabla" => "Productos del pedido",
            "items" => $objCompra->listItems,
            "mostrarPago" => true,
            "objeto" => $objCompra
        ));
        ?>
    </div>
</div>


