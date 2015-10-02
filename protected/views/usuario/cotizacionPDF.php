
<img style="display: block; width: 100%; height: 10%" src="<?php echo CController::createAbsoluteUrl('/')?>/images/mailing_header.png"> 

<p style="text-align:right;font-size:14px">
    <b>N&uacute;mero cotizaci&oacute;n: </b>
    <span style="color:#ff0000"><?php echo $objCotizacion->idCotizacion ?></span>
</p>
<p style="text-align:right;font-size:14px">
    <b>Fecha cotizaci&oacute;n</b>
    <?php echo $objCotizacion->fechaCotizacion ?>
</p>

<table cellpadding="10" style="font-size:14px;border-collapse:collapse;border-spacing:0px;width:100%;border-bottom:1px solid #dddddd;margin-bottom:24px">
    <tbody>
        <tr>
            <td style="padding:0" colspan="2">
                <h4 style="color:#444444"> Datos de cotizaci&oacute;n</h4>
            </td>
        </tr>
        <tr>
            <td valign="top" style="width:100%; border:1px solid #dddddd;color:#444444">
                <p>
                    <b>Ciudad:</b>
                    <?php echo $objCotizacion->objCiudad->nombreCiudad . " - " . $objCotizacion->objSector->nombreSector ?>
                </p>
            </td>
        </tr>
    </tbody>
</table>



<h4 style="color:#666666">
    Productos del
    <span class="il">pedido</span>
</h4>
<table style="width:100%;margin-bottom:5px;border-spacing:0;font-size:14px;border:1px solid #dddddd ;color:#666666">
    <tbody>
        <tr>
            <th style="background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center">Producto</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Cantidad</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Antes</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Ahora</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Ahorro</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Subtotal</th>
        </tr>
        <?php $listCombos = array(); ?>
        <?php $indice=0; ?>
        <?php foreach ($objCotizacion->listCotizacionItems as $objItem): ?>
            <?php if ($objItem->idCombo === null): ?>
                <?php if ($objItem->fracciones > 0): ?>
                    <tr style="vertical-align: middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "") ?>">
                        <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px" rowspan='2'>
                            <p>
                                <img width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . $objItem->objProducto->rutaImagen(); ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                            </p>
                            <p style="margin:0">
                                <?php echo $objItem->descripcion ?>
                            </p>
                            <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">
                                Codigo: <?php echo $objItem->codigoProducto ?>
                            </p>
                        </td>
                        <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px">
                            <?php echo $objItem->unidades ?>
                        </td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px">
                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                            <?php if ($objItem->porcentajeImpuesto > 0): ?>
                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->porcentajeImpuesto) ?> IVA</div>
                            <?php endif; ?>
                        </td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                    <tr style="vertical-align:middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "") ?>">
                        <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px">
                            <?php if ($objItem->objProducto->objMedidaFraccion !== null): ?>
                                <?php echo $objItem->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $objItem->objProducto->unidadFraccionamiento ?>: 
                            <?php endif; ?>
                            <?php echo $objItem->fracciones ?>
                        </td> 
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px">
                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseFraccion, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                            <?php if ($objItem->porcentajeImpuesto > 0): ?>
                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->porcentajeImpuesto) ?> IVA</div>
                            <?php endif; ?>
                        </td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseFraccion - $objItem->descuentoFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoFraccion, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                <?php else: ?>
                    <?php if ($objItem->unidadesCedi > 0): ?>
                        <tr style="vertical-align: middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "") ?>">
                            <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px" rowspan='2'>
                                <p>
                                    <img width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . $objItem->objProducto->rutaImagen(); ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                                </p>
                                <p style="margin:0">
                                    <?php echo $objItem->descripcion ?>
                                </p>
                                <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">
                                    Codigo: <?php echo $objItem->codigoProducto ?>
                                </p>
                            </td>
                            <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px">
                                <?php echo $objItem->unidades ?>
                            </td>
                            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan='2'>
                                <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                <?php if ($objItem->porcentajeImpuesto > 0): ?>
                                    <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->porcentajeImpuesto) ?> IVA</div>
                                <?php endif; ?>
                            </td>
                            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        </tr>
                        <tr style="vertical-align:middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "") ?>">
                            <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px">
                                Unidades bodega: <?php echo $objItem->unidadesCedi ?>
                            </td> 
                        </tr>
                    <?php else: ?>
                        <tr style="vertical-align: middle">
                            <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px">
                                <p>
                                    <img width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . $objItem->objProducto->rutaImagen(); ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                                </p>
                                <p style="margin:0">
                                    <?php echo $objItem->descripcion ?>
                                </p>
                                <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">
                                    Codigo: <?php echo $objItem->codigoProducto ?>
                                </p>
                            </td>
                            <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px">
                                <?php echo $objItem->unidades ?>
                            </td>
                            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px">
                                <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                <?php if ($objItem->porcentajeImpuesto > 0): ?>
                                    <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->porcentajeImpuesto) ?> IVA</div>
                                <?php endif; ?>
                            </td>
                            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endif; ?>
            <?php else: ?>
                <?php $listCombos[$objItem->idCombo]['items'][] = $objItem; ?>
                <?php $listCombos[$objItem->idCombo]['valor'] = isset($listCombos[$objItem->idCombo]['valor']) ? ($listCombos[$objItem->idCombo]['valor'] + $objItem->precioBaseUnidad) : $objItem->precioBaseUnidad; ?>
            <?php endif; ?>
        <?php $indice++; endforeach; ?>
        <?php foreach ($listCombos as $idCombo => $arrItem): ?>
            <?php $objItem = $arrItem['items'][0] ?>
                <tr style="vertical-align: middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "") ?>">
                    <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px">
                        <p>
                            <img width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . $objItem->objCombo->rutaImagen(); ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                        </p>
                        <p style="margin:0">
                            <?php echo $objItem->objCombo->descripcionCombo ?>
                        </p>
                        <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">
                            Codigo: <?php echo $objItem->idCombo ?>
                        </p>
                    </td>

                        <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px">
                            <?php echo $objItem->unidades ?>
                        </td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px">NA</td>
                        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($arrItem['valor'] * $objItem->unidades), Yii::app()->params->formatoMoneda['moneda']) ?><br></td>
                 </tr>
        <?php $indice++; endforeach; ?>
    </tbody>
</table>

<div style="border-top:1px solid #999999">
    <table width="100%" border="0">
        <tbody>
            <tr>
                <td>
                </td>
                <td width="250" valign="top">
                    <div>
                        <table cellpadding="0" border="0" style="border:1px solid #cccccc;color:#666666;margin-top:20px;width:100%">
                            <tbody>
                                <tr>
                                    <td style="padding-left:21px;width:70%">Servicio</td>
                                    <td style="text-align:right">
                                        <b><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->domicilio, Yii::app()->params->formatoMoneda['moneda']); ?></b>
                                    </td>
                                </tr>

                                <?php if ($objCotizacion->flete > 0): ?>
                                    <tr>
                                        <td style="padding-left:21px;width:70%">Flete</td>
                                        <td style="text-align:right">
                                            <b><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->flete, Yii::app()->params->formatoMoneda['moneda']); ?></b>
                                        </td>
                                    </tr>
                                <?php endif; ?>

                                <tr>
                                    <td style="padding-left:21px">Subtotal</td>
                                    <td style="text-align:right">
                                        <b><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->subtotalCompra, Yii::app()->params->formatoMoneda['moneda']); ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left:21px">Impuestos incluidos</td>
                                    <td style="text-align:right">
                                        <b><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->impuestosCompra, Yii::app()->params->formatoMoneda['moneda']) ?></b>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-left:21px">Su Ahorro</td>
                                    <td style="text-align:right">
                                        <b><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->ahorroCompra, Yii::app()->params->formatoMoneda['moneda']) ?></b>
                                    </td>
                                </tr>
                                <tr style="background:#f9f9f9;">
                                    <td style="color:#FFFFFF;background-color: #FF0000;font-weight:bold;width:70%;font-size:16px; border-right-width: 0px;margin-top:0px;">TOTAL</td>
                                    <td style="font-size:16px;color:#FFFFFF;background-color: #FF0000;font-weight:bold;text-align:center;border-left-width: 0px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->totalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<img style="display: block; width: 100%; height: 6%" src="<?php echo CController::createAbsoluteUrl('/')?>/images/mailing_footer.png"> 