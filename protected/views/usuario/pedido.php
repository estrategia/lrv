<div class="ui-content finalCompra">

    <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "pedidodetalle", "data-compra" => $objCompra->idCompra, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax' => "false")); ?>

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
                        <?php echo $objCompra->objPuntoVenta->nombrePuntoDeVenta ?>
                        <br>
                        <?php echo $objCompra->objPuntoVenta->direccionPuntoDeVenta ?>
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
                    <td><?php echo $objCompra->objCompraDireccion->nombre ?></td>
                </tr>
                <tr>
                    <td>Ciudad</td>
                    <td><?php echo $objCompra->objCiudad->nombreCiudad . " - " . $objCompra->objSector->nombreSector ?></td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td><?php echo $objCompra->objCompraDireccion->direccion ?></td>
                </tr>
                <tr>
                    <td>Barrio</td>
                    <td><?php echo $objCompra->objCompraDireccion->barrio ?></td>
                </tr>
                <tr>
                    <td>Teléfono</td>
                    <td><?php echo $objCompra->objCompraDireccion->telefono ?></td>
                </tr>
            </table>
        </div>
    <?php endif; ?>
    <div class="space-2"></div>

    <div class="listProductPedidos">
        <h2>Productos del pedido</h2>

        <?php $listCombos = array(); ?>
        <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
            <?php foreach ($objCompra->listItems as $objItem): ?>
                <?php if ($objItem->idCombo === null): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <div class="clst_cont_top">
                                <div class="clst_pro_img">
                                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objItem->codigoProducto,'descripcion'=>  $objItem->objProducto->getCadenaUrl())) ?>" data-ajax="false">
                                        <img src="<?php echo Yii::app()->request->baseUrl . $objItem->objProducto->rutaImagen() ?>" class="ui-li-thumb">
                                    </a>
                                </div>

                                <div class="clst_cont_pr_prod">
                                    <h2><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objItem->codigoProducto,'descripcion'=>  $objItem->objProducto->getCadenaUrl())) ?>" data-ajax="false"><?php echo $objItem->descripcion ?></a></h2>
                                    <p><?php echo $objItem->presentacion ?></p>
                                    <?php if ($objItem->objProducto->mostrarAhorroVirtual == 1 && $objItem->descuentoUnidad > 0): ?>
                                        <div class="clst_pre_ant"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']); ?></div>
                                        <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']); ?>  <span>[Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
                                    <?php else: ?>
                                        <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
                                    <?php endif; ?>

                                    <?php if ($objItem->flete > 0): ?>
                                        <div class="clst_pre_act"><span>[Flete <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->flete, Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
                                    <?php endif; ?>

                                    <?php if ($objCompra->objCiudad->excentoImpuestos == 0 && $objItem->objImpuesto->porcentaje > 0): ?>
                                        <div class="clst_pre_act"><span>Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> de impuestos </span></div>
                                    <?php endif; ?>

                                    <?php if ($objItem->unidades > 0): ?>
                                        <div class="clst_pre_cantidad">Cantidad: <?php echo $objItem->unidades ?></div>
                                    <?php endif; ?>
                                    <?php if ($objItem->fracciones > 0): ?>
                                        <div class="clst_pre_cantidad">U.M.V: <?php echo $objItem->fracciones ?></div>
                                    <?php endif; ?>
                                    <?php if ($objItem->unidadesCedi > 0): ?>
                                        <div class="clst_pre_cantidad">Bodega: <?php echo $objItem->unidadesCedi ?></div>
                                    <?php endif; ?>

                                    <p style="font-size:medium;">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </li>
                <?php else: ?>
                    <?php $listCombos[$objItem->idCombo][0] = $objItem; ?>
                    <?php $listCombos[$objItem->idCombo][1] = isset($listCombos[$objItem->idCombo][1]) ? ($listCombos[$objItem->idCombo][1] + $objItem->precioBaseUnidad) : $objItem->precioBaseUnidad; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($listCombos as $idCombo => $arrItem): ?>
                <li class="c_list_prod">
                    <div class="ui-field-contain clst_prod_cont">
                        <div class="clst_cont_top">
                            <div class="clst_pro_img">
                                <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $idCombo, 'descripcion' => $listCombos[$idCombo][0]->objCombo->getCadenaUrl())) ?>" data-ajax="false">
                                    <img src="<?php echo Yii::app()->request->baseUrl . $listCombos[$idCombo][0]->objCombo->rutaImagen() ?>" class="ui-li-thumb">
                                </a>
                            </div>

                            <div class="clst_cont_pr_prod">
                                <h2><a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $idCombo, 'descripcion' => $listCombos[$idCombo][0]->objCombo->getCadenaUrl())) ?>" data-ajax="false"><?php echo $listCombos[$idCombo][0]->descripcionCombo ?></a></h2>
                                <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $listCombos[$idCombo][1], Yii::app()->params->formatoMoneda['moneda']); ?> </div>
                                <div class="clst_pre_cantidad">Cantidad: <?php echo $listCombos[$idCombo][0]->unidades ?></div>
                                <p style="font-size:medium;">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($listCombos[$idCombo][1]*$listCombos[$idCombo][0]->unidades), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="blockPago">
        <table align="center">
            <tbody><tr>
                    <td>Subtotal</td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->subtotalCompra, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                </tr>
                <tr>
                    <td>Servicio</td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->domicilio, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                </tr>
                <?php if ($objCompra->flete > 0): ?>
                    <tr>
                        <td>Flete adicional</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->flete, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($objCompra->objFormaPagoCompra->valorBono > 0): ?>
                    <tr>
                        <td>Bono</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->objFormaPagoCompra->valorBono, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($objCompra->objCiudad->excentoImpuestos == 0 && $objCompra->impuestosCompra > 0): ?>
                    <tr>
                        <td>Impuestos incluidos</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->impuestosCompra, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                <?php endif; ?>
                <?php if ($objCompra->donacionFundacion > 0): ?>
                    <tr class="rowRed">
                        <td>Donación a la fundación</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->donacionFundacion, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <p class="center TotalPagarCompra">Total <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->totalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></p>
    </div>

    <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "pedidodetalle", "data-compra" => $objCompra->idCompra, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax' => "false")); ?>
</div>