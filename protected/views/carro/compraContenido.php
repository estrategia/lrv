<div class="ui-content finalCompra">
    <h2>¡Gracias por su compra!</h2>

    <div class="blockPago">
        <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
            <h3>Datos Compra</h3>
        <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
            Datos Pedido
        <?php endif; ?>
        <table  class="infoCompra">
            <tr>
                <td>Número compra</td>
                <td><?php echo $objCompra->idCompra ?></td>
            </tr>
            <tr>
                <td>Fecha/Hora compra</td>
                <td><?php echo $objCompra->fechaCompra ?></td>
            </tr>

            <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
                <tr class="rowRed">
                    <td>Fecha/Hora entrega</td>
                    <td><?php echo $objCompra->fechaEntrega ?></td>
                </tr>
            <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
                <tr class="rowRed">
                    <td>Punto de venta entrega</td>
                    <td>
                        <?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][2] ?>
                        <br>
                        <?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][3] ?>
                    </td>
                </tr>
            <?php endif; ?>

        </table> 
    </div>
    <div class="space-2"></div>

    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
        <div class="blockPago">
            <h3>Datos de despacho</h3>
            <table class="infoCompra">
                <tr>
                    <td>Nombre destinatario</td>
                    <td><?php echo $objCompraDireccion->nombre ?></td>
                </tr>
                <tr>
                    <td>Ciudad</td>
                    <td><?php echo $this->sectorName ?></td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td><?php echo $objCompraDireccion->direccion ?></td>
                </tr>
                <tr>
                    <td>Barrio</td>
                    <td><?php echo $objCompraDireccion->barrio ?></td>
                </tr>
                <tr>
                    <td>Teléfono</td>
                    <td><?php echo $objCompraDireccion->telefono ?></td>
                </tr>
            </table>
        </div>
    <?php endif; ?>
    <div class="space-2"></div>

    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
        <div class="blockPago recuerdaPresencial">
            <p class="justify">RECUERDA:</p>
            <p class="justify">debes pasar por tu pedido al punto de venta dentro de las siguientes 2 horas.</p>
        </div>
    <?php endif; ?>
    <div class="listProductPedidos">
        <h2>Productos del pedido</h2>

        <?php $listPositionBodega = array(); ?>
        <?php $listPositionDelivery = array(); ?>
        <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
            <?php foreach (Yii::app()->shoppingCart->getPositions() as $position): ?>
                <?php if ($position->getDelivery() == 0): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <?php
                            if ($position->isProduct()):
                                if ($position->getQuantityStored() > 0)
                                    $listPositionBodega[] = $position;
                                $this->renderPartial('_compraElementoProducto', array(
                                    'position' => $position,
                                ));
                            elseif ($position->isCombo()):
                                $this->renderPartial('_compraElementoCombo', array(
                                    'position' => $position,
                                ));
                            endif;
                            ?>
                        </div>
                    </li>
                <?php else: $listPositionDelivery[] = $position ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <?php if (!empty($listPositionBodega) || !empty($listPositionDelivery)): ?>
            <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
                <h3>Productos con otras condiciones de entrega</h3>
                <?php foreach ($listPositionBodega as $position): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <?php
                            if ($position->isProduct()):
                                if ($position->getQuantityStored() > 0)
                                    $listPositionBodega[] = $position;
                                $this->renderPartial('_compraElementoBodega', array(
                                    'position' => $position,
                                ));
                            else:
                                echo "NA";
                            endif;
                            ?>
                        </div>
                    </li>
                <?php endforeach; ?>
                <?php foreach ($listPositionDelivery as $position): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <?php
                            if ($position->isProduct()):
                                $this->renderPartial('_compraElementoProducto', array(
                                    'position' => $position,
                                ));
                            elseif ($position->isCombo()):
                                $this->renderPartial('_compraElementoCombo', array(
                                    'position' => $position,
                                ));
                            endif;
                            ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <div class="blockPago">
        <table align="center">
            <tbody><tr>
                    <td>Subtotal</td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                </tr>
                <tr>
                    <td>Servicio</td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                </tr>
                <?php if (Yii::app()->shoppingCart->getExtraShipping() > 0): ?>
                    <tr>
                        <td>Flete adicional</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                    </tr>
                <?php endif; ?>
                <?php if (Yii::app()->shoppingCart->getBono() > 0): ?>
                    <tr>
                        <td>Bono</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getBono(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                    </tr>
                <?php endif; ?>
                <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->shoppingCart->getTaxPrice() > 0): ?>
                    <tr>
                        <td>Impuestos incluidos</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                <?php endif; ?>
                <?php if (Yii::app()->shoppingCart->getDiscountPrice(true) > 0): ?>
                    <tr class="rowRed">
                        <td>Su Ahorro</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <p class="center TotalPagarCompra">Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
    </div>
</div>