<table border="1">
    <tbody>
        <tr>
            <td>N&uacute;mero cotizaci&oacute;n</td>
            <td><?php echo $objCotizacion->idCotizacion ?></td>
        </tr>
        <tr>
            <td>Fecha cotizaci&oacute;n</td>
            <td><?php echo $objCotizacion->fechaCotizacion ?></td>
        </tr>
        <tr>
            <td>Ubicaci&oacute;n</td>
            <td><?php echo $objCotizacion->objCiudad->nombreCiudad . " - " . $objCotizacion->objSector->nombreSector ?></td>
        </tr>
    </tbody>
</table>


<h4> Productos del pedido</h4>
<table border="1">
    <tbody>
        <tr>
            <th>Código</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Antes</th>
            <th>Ahorro</th>
            <th>Ahora</th>
            <th>Subtotal</th>
        </tr>
        <?php $listCombos = array(); ?>
        <?php foreach ($objCotizacion->listCotizacionItems as $objItem): ?>
            <?php if ($objItem->idCombo === null): ?>
                <?php if ($objItem->fracciones > 0): ?>
                    <tr style="vertical-align: middle">
                        <td rowspan='2'><?php echo $objItem->codigoProducto ?><br></td>
                        <td rowspan='2'><?php echo $objItem->descripcion ?><br></td>
                        <td>
                            <?php echo $objItem->unidades ?>
                        </td>
                        <td>
                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                            <?php if ($objItem->porcentajeImpuesto > 0): ?>
                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->porcentajeImpuesto) ?> IVA</div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                    <tr>
                        <td>
                            U.M.V
                            <?php if ($objItem->objProducto->objMedidaFraccion !== null): ?>
                                <br/>
                                <?php echo $objItem->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $objItem->objProducto->unidadFraccionamiento ?>
                            <?php endif; ?>
                            <br/>
                            <?php echo $objItem->fracciones ?>
                        </td> 
                        <td>
                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseFraccion, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                            <?php if ($objItem->porcentajeImpuesto > 0): ?>
                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->porcentajeImpuesto) ?> IVA</div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoFraccion, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseFraccion - $objItem->descuentoFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                <?php else: ?>
                    <?php if ($objItem->unidadesCedi > 0): ?>
                        <tr style="vertical-align: middle">
                            <td rowspan='2'><?php echo $objItem->codigoProducto ?><br></td>
                            <td rowspan='2'><?php echo $objItem->descripcion ?><br></td>
                            <td>
                                <?php echo $objItem->unidades ?>
                            </td>
                            <td rowspan='2'>
                                <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                <?php if ($objItem->porcentajeImpuesto > 0): ?>
                                    <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->porcentajeImpuesto) ?> IVA</div>
                                <?php endif; ?>
                            </td>
                            <td rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        </tr>
                        <tr>
                            <td>
                                Unidades bodega
                                <div>
                                    <?php echo $objItem->unidadesCedi ?>
                                </div>
                            </td> 
                        </tr>
                    <?php else: ?>
                        <tr style="vertical-align: middle">
                            <td><?php echo $objItem->codigoProducto ?><br></td>
                            <td><?php echo $objItem->descripcion ?><br></td>
                            <td>
                                <?php echo $objItem->unidades ?>
                            </td>
                            <td>
                                <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                <?php if ($objItem->porcentajeImpuesto > 0): ?>
                                    <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->porcentajeImpuesto) ?> IVA</div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php $listCombos[$objItem->idCombo]['items'][] = $objItem; ?>
                <?php $listCombos[$objItem->idCombo]['valor'] = isset($listCombos[$objItem->idCombo]['valor']) ? ($listCombos[$objItem->idCombo]['valor'] + $objItem->precioBaseUnidad) : $objItem->precioBaseUnidad; ?>
            <?php endif; ?>
        <?php endforeach; ?>
        <?php foreach ($listCombos as $idCombo => $arrItem): ?>
            <?php foreach ($arrItem['items'] as $indice => $objItem): ?>
                <tr style="vertical-align: middle">
                    <td><?php echo $objItem->codigoProducto ?><br></td>
                    <td><?php echo $objItem->descripcion ?><br></td>
                    <?php if ($indice == 0): ?>
                        <td rowspan="<?php echo count($arrItem['items']) ?>">
                            Combo<br/>
                            <?php echo $objItem->unidades ?>
                        </td>
                        <td rowspan="<?php echo count($arrItem['items']) ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td rowspan="<?php echo count($arrItem['items']) ?>">NA</td>
                        <td rowspan="<?php echo count($arrItem['items']) ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td rowspan="<?php echo count($arrItem['items']) ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($arrItem['valor'] * $objItem->unidades), Yii::app()->params->formatoMoneda['moneda']) ?><br></td>
                    <?php endif; ?>
                </tr>
            <?php endforeach; ?>
        <?php endforeach; ?>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><strong>Subtotal</strong></th>
            <th><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->subtotalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
        </tr> 
    </tbody>
</table>
<br/>
<table border="1" width="60%">
    <tbody>
        <tr>
            <th width="20%" align="left"><strong>Servicio</strong></th>
            <th width="20%" align="right">
                <span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->domicilio, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                <div style="font-weight: normal; font-size: small;"><i>Depende de tipo de entrega al momento de la compra</i></div>
            </th>
        </tr>
        <tr>
            <th align="left"><strong>Flete</strong></th>
            <th align="right">
                <span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->flete, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                <div style="font-weight: normal; font-size: small;"><i>Depende de tipo de entrega al momento de la compra</i></div>
            </th>
        </tr>
        <tr>
            <th align="left"><strong>Total a pagar</strong></th>
            <th align="right"><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->totalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
        </tr>
        <tr>
            <th align="left"><strong>Impuestos incluidos</strong></th>
            <th align="right"><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->impuestosCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
        </tr>  
    </tbody>
</table>
