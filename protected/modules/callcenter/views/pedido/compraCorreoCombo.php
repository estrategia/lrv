
  <?php foreach ($arrItem['items'] as $indice => $objItem): ?>
    <tr style="vertical-align:middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "") ?>">
        <td style="text-align:left;line-height:20px;border-top:1px solid #dddddd;vertical-align:top;padding:8px">
            <p>
                <?php $imagen = $objItem->objCombo->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>
                <?php if ($imagen == null): ?>
                    <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/combo', array('combo' => $objItem->objCombo->idCombo, 'descripcion' => $objItem->objCombo->getCadenaUrl())) ?>">
                        <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->producto['noImagen']['mini']; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                    </a>
                <?php else: ?>
                    <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/combo', array('combo' => $objItem->objCombo->idCombo, 'descripcion' => $objItem->objCombo->getCadenaUrl())) ?>">
                        <img class="CToWUd" width="70" height="70" align="left" src="<?php echo CController::createAbsoluteUrl('/') . Yii::app()->params->carpetaImagen['combos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" title="" style="margin-right:7px;margin-bottom:13px;float:left">
                    </a>
                <?php  endif; ?>
        <?php    ?>

            </p>

            <p style="margin:0">
                <a target="_blank" href="<?php echo CController::createAbsoluteUrl('/catalogo/combo', array('combo' => $objItem->idCombo, 'descripcion' => $objItem->objCombo->getCadenaUrl())) ?>" style="color:#0088cc;text-decoration:none">
                    <b><?php echo $objItem->descripcion ?></b>
                </a>
            </p>
            <p style="color:#666666;font-size:12px;margin-top:0;font-weight:bold">Codigo: <?php echo $objItem->codigoProducto?></p>
            <p style="color:#666666;font-size:12px;line-height:16px">Combo: <?php echo $objItem->descripcionCombo ?> &nbsp; </p>
        </td>
        <?php if ($indice == 0): ?>
        <td rowspan="<?php echo count($arrItem['items']) ?>" style="text-align:center;border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:center;line-height:20px;padding:8px"><?php echo $objItem->unidades?></td>
        <td rowspan="<?php echo count($arrItem['items']) ?>" style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:center;text-align:center;line-height:20px;padding:8px">
            <span style="text-decoration:line-through;color:#a40014"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></span>
            <br>
           <!-- <span style="font-size:10px;color:#000"> Incluye <?php /*echo Yii::app()->numberFormatter->formatPercentage($position->getTax())*/ ?> de impuestos </span> -->
        </td>
        <td rowspan="<?php echo count($arrItem['items']) ?>" style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:center;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td rowspan="<?php echo count($arrItem['items']) ?>" style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:center;text-align:center;line-height:20px;padding:8px"><?php echo "NA" ?></td>
        <td rowspan="<?php echo count($arrItem['items']) ?>" style="border-left:1px solid #dddddd;border-top:1px solid #dddddd;vertical-align:center;text-align:center;line-height:20px;padding:8px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'] * $objItem->unidades, Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <?php endif;?>
    </tr>
<?php endforeach;?>

<!-- 
<tr style="vertical-align: middle">
                            <td><?php echo $objItem->codigoProducto ?><br></td>
                            <?php if ($indice == 0): ?>
                                <td rowspan="<?php echo count($arrItem['items']) ?>" class="center vertical-center" >Combo<br></td>
                            <?php endif; ?>
                            <td><?php echo $objItem->descripcion ?><br></td>
                            <?php if ($indice == 0): ?>
                                <td rowspan="<?php echo count($arrItem['items']) ?>">
                                    <div class="form-inline">
                                        <input type="text" id="cantidad-item-unidad-<?php echo $objItem->idCompra ?>" class="col-xs-3" value="<?php echo $objItem->unidades ?>" >
                                        <button type="button" data-role="modificarpedido" data-action="2" data-compra="<?php echo $objItem->idCompra ?>" data-combo="<?php echo $objItem->idCombo ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                    </div>
                                </td>
                                <td rowspan="<?php echo count($arrItem['items']) ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                <td rowspan="<?php echo count($arrItem['items']) ?>">NA</td>
                                <td rowspan="<?php echo count($arrItem['items']) ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                <td rowspan="<?php echo count($arrItem['items']) ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($arrItem['valor'] * $objItem->unidades), Yii::app()->params->formatoMoneda['moneda']) ?><br></td>
                                <td rowspan="<?php echo count($arrItem['items']) ?>">
                                    <strong><?php echo $objItem->objEstadoItem->estadoItem ?></strong>
                                    <?php if ($objItem->objOperador !== null): ?>
                                        <br/>
                                        <?php echo $objItem->objOperador->nombre ?>
                                    <?php endif; ?>
                                </td>
                                <td rowspan="<?php echo count($arrItem['items']) ?>" class="center vertical-center">
                                    <button type="button" class="btn btn-sm btn-<?php echo ($objItem->disponible == 1 ? "success" : "danger") ?>" data-item="<?php echo $objItem->idCompraItem ?>" data-compra="<?php echo $objItem->idCompra ?>" data-combo="<?php echo $objItem->idCombo ?>" data-role="disponibilidaditem"><i class="icon-white glyphicon glyphicon-<?php echo ($objItem->disponible == 1 ? "ok" : "remove") ?>"></i></button>
                                </td>
                            <?php endif; ?>
                        </tr>

-->