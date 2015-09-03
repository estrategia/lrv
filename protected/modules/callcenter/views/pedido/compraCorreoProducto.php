<?php if($objItem->objProducto->fraccionado == 1):?>

    <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px" rowspan="2">
        <p>
            <?php $imagen = $objItem->objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>
            <?php if ($imagen == null): ?>
                <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $objItem->objProducto->codigoProducto)) ?>">
                    <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->producto['noImagen']['mini']; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                </a>
            <?php else: ?>
                <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $objItem->objProducto->codigoProducto)) ?>">
                    <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                </a>
            <?php endif; ?>
        </p>
        <p style="margin:0">
            <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $objItem->objProducto->codigoProducto)) ?>" style="color:#0088cc;text-decoration:none">
                <b><?php echo $objItem->objProducto->descripcionProducto ?></b>
            </a>
        </p>
        <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $objItem->objProducto->codigoProducto ?></p>
        <p style="color:#666666;font-size:12px;line-height:16px"></p>
    </td>
    <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px"><?php echo $objItem->unidades?></td>
    <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px">
        <span style="text-decoration:line-through;color:#a40014"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']); ?></span>
        <br>
        <span style="font-size:10px;color:#000"> Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> de impuestos </span>
    </td>
    <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']); ?></td>
    <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan="2"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']); ?></td>

</tr>
<tr style="vertical-align:middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "")?>">
    <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px"><?php echo $objItem->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $objItem->objProducto->unidadFraccionamiento .": ".$objItem->fracciones?></td>
    <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px">
        <span style="text-decoration:line-through;color:#a40014"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseFraccion), Yii::app()->params->formatoMoneda['moneda']); ?></span>
        <br>
        <span style="font-size:10px;color:#000"> Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> de impuestos </span>
    </td>
    <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseFraccion - $objItem->descuentoFraccion), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ( $objItem->descuentoFraccion), Yii::app()->params->formatoMoneda['moneda']); ?></td>

    
<?php elseif($objItem->unidadesCedi > 0):?>

            <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px" rowspan="2">
                <p>
                    <?php $imagen = $objItem->objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>
                    <?php if ($imagen == null): ?>
                        <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $objItem->objProducto->codigoProducto)) ?>">
                            <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->producto['noImagen']['mini']; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                        </a>
                    <?php else: ?>
                        <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $objItem->objProducto->codigoProducto)) ?>">
                            <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                        </a>
                    <?php endif; ?>
                </p>
                <p style="margin:0">
                    <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $objItem->objProducto->codigoProducto)) ?>" style="color:#0088cc;text-decoration:none">
                        <b><?php echo $objItem->objProducto->descripcionProducto ?></b>
                    </a>
                </p>
                <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $objItem->objProducto->codigoProducto ?></p>
                <p style="color:#666666;font-size:12px;line-height:16px"></p>
            </td>
            <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px" ><?php echo $objItem->unidades?></td>
            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan="2">
                <span style="text-decoration:line-through;color:#a40014"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']); ?></span>
                <br>
                <span style="font-size:10px;color:#000"> Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> de impuestos </span>
            </td>
            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan="2"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']); ?></td>
            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan="2"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'],$objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']); ?></td>
            <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px" rowspan="2"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    </tr>
    <tr style="vertical-align:middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "")?>">
            <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px">Unidades bodega: <?php echo $objItem->unidadesCedi?></td>
<?php  else: ?>
<td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px">
    <p>
        <?php $imagen = $objItem->objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>
        <?php if ($imagen == null): ?>
            <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $objItem->objProducto->codigoProducto)) ?>">
                <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->producto['noImagen']['mini']; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
            </a>
        <?php else: ?>
            <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $objItem->objProducto->codigoProducto)) ?>">
                <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
            </a>
        <?php endif; ?>
    </p>
    <p style="margin:0">
        <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $objItem->objProducto->codigoProducto)) ?>" style="color:#0088cc;text-decoration:none">
            <b><?php echo $objItem->objProducto->descripcionProducto ?></b>
        </a>
    </p>
    <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $objItem->objProducto->codigoProducto ?></p>
    <p style="color:#666666;font-size:12px;line-height:16px"></p>
</td>
<td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px"><?php echo $objItem->unidades?></td>
<td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px">
    <span style="text-decoration:line-through;color:#a40014"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']); ?></span>
    <br>
    <span style="font-size:10px;color:#000"> Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> de impuestos </span>
</td>
<td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php  echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']); ?></td>
<td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']); ?></td>
<td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']); ?></td>

<?php endif;?>