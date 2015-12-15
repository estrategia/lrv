<div class="row">
    <div class="col-md-12">

        <div class="row">
            <div class="col-md-12">
                <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "pedidodetalle", "data-compra" => $objCompra->idCompra, 'class' => 'btn btn-primary')); ?>
            </div>
        </div>
        
        <div class="space-1"></div>

        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <thead>
                    <th colspan="2" class="text-center">
                        <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
                            Datos Compra
                        <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
                            Datos Pedido
                        <?php endif; ?>
                    </th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Fecha de la compra</td>
                            <td><?= $objCompra->fechaCompra ?></td>
                        </tr>
                        <tr>
                            <td>Fecha de la entrega</td>
                            <td><?= $objCompra->fechaEntrega ?></td>
                        </tr>
                        <tr>
                            <td>Forma de Pago</td>
                            <td><?= $objCompra->objFormaPagoCompra->objFormaPago->formaPago; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered table-striped">
                    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
                        <thead>
                        <th colspan="2"  class="text-center">Direcci&oacute;n de despacho</th>
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


