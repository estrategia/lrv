<td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px">
    <p>
        <?php $imagen = $position->objCombo->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>
        <?php if ($imagen == null): ?>
            <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo)) ?>">
                <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->producto['noImagen']['mini']; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
            </a>
        <?php else: ?>
            <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo)) ?>">
                <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->carpetaImagen['combos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
            </a>
        <?php endif; ?>


    </p>
    <p style="margin:0">
        <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo)) ?>" style="color:#0088cc;text-decoration:none">
            <b><?php echo $position->objCombo->descripcionCombo ?></b>
        </a>
    </p>
    <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $position->objCombo->idCombo ?></p>
    <p style="color:#666666;font-size:12px;line-height:16px"></p>
</td>
<td style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;line-height:20px;padding:8px"><?php echo $position->getQuantity()?></td>
<td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px">
    <span style="text-decoration:line-through;color:#a40014"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']); ?></span>
    <br>
    <span style="font-size:10px;color:#000"> Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> de impuestos </span>
</td>
<td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
<td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
<td style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:top;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
