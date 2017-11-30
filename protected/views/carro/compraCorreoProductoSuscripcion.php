        <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px">
            <p>
                <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>">
                    <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . $position->objProducto->rutaImagen(); ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                </a>
            </p>
            <p style="margin:0">
                <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>" style="color:#0088cc;text-decoration:none">
                    <b><?php echo $position->objProducto->descripcionProducto ?></b>
                </a>
            </p>
            <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $position->objProducto->codigoProducto ?></p>
            <p style="color:#666666;font-size:12px;line-height:16px"></p>
        </td>
        <td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px"><?php echo $position->getQuantitySuscription() ?></td>
        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px">
            <span style="text-decoration:line-through;color:#a40014"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']); ?></span>
            <br>
            <span style="font-size:10px;color:#000"> Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> de impuestos </span>
        </td>
        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPriceSuscription(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPriceSuscription(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPriceUnitSuscription(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
