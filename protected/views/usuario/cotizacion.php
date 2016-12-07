<div class="ui-content finalCompra">

    <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "cotizaciondetalle", "data-cotizacion" => $objCotizacion->idCotizacion, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax' => "false")); ?>
    <?php echo CHtml::link('Exportar cotizaci&oacute;n', $this->createUrl("/usuario/cotizacionpdf", array('cotizacion' => $objCotizacion->idCotizacion)), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax' => "false")); ?>

    <div class="blockPago">
        <h3>Datos de Cotizaci&oacute;n</h3>
        <table  class="infoCompra">
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
        </table> 
    </div>
    <div class="space-2"></div>

    <div class="listProductPedidos">
        <h2>Productos de la cotizaci&oacute;n</h2>

        <?php $listCombos = array(); ?>
        <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
            <?php foreach ($objCotizacion->listCotizacionItems as $objItem): ?>
                <?php if ($objItem->idCombo === null): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <div class="clst_cont_top">
                                <div class="clst_pro_img">
                                    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objItem->codigoProducto, 'descripcion' => $objItem->objProducto->getCadenaUrl())) ?>" data-ajax="false">
                                        <img src="<?php echo Yii::app()->request->baseUrl . $objItem->objProducto->rutaImagen() ?>" class="ui-li-thumb">
                                    </a>
                                </div>

                                <div class="clst_cont_pr_prod">
                                    <h2><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objItem->codigoProducto, 'descripcion' => $objItem->objProducto->getCadenaUrl())) ?>" data-ajax="false"><?php echo $objItem->descripcion ?></a></h2>
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

                                    <?php if ($objCotizacion->objCiudad->excentoImpuestos == 0 && $objItem->objImpuesto->porcentaje > 0): ?>
                                        <div class="clst_pre_act"><span>Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->porcentajeImpuesto) ?> de impuestos </span></div>
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
                                <p style="font-size:medium;">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($listCombos[$idCombo][1] * $listCombos[$idCombo][0]->unidades), Yii::app()->params->formatoMoneda['moneda']); ?></p>
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
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->subtotalCompra, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                </tr>
                <tr>
                    <td>Servicio</td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->domicilio, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td>Depende de tipo de entrega al momento de la compra</td>
                </tr>
                <?php if ($objCotizacion->flete > 0): ?>
                    <tr>
                        <td>Flete adicional</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->flete, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>Depende de tipo de entrega al momento de la compra</td>
                    </tr>
                <?php endif; ?>
                <?php if ($objCotizacion->objCiudad->excentoImpuestos == 0 && $objCotizacion->impuestosCompra > 0): ?>
                    <tr>
                        <td>Impuestos incluidos</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->impuestosCompra, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                <?php endif; ?>
                    <?php if ($objCotizacion->ahorroCompra > 0): ?>
                    <tr>
                        <td>Ahorro</td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->ahorroCompra, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <p class="center TotalPagarCompra">Total <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCotizacion->totalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></p>
    </div>

    <?php echo CHtml::link('Agregar al carro', "#", array("data-role" => "cotizaciondetalle", "data-cotizacion" => $objCotizacion->idCotizacion, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax' => "false")); ?>
    <?php echo CHtml::link('Exportar cotizaci&oacute;n', $this->createUrl("/usuario/cotizacionpdf", array('cotizacion' => $objCotizacion->idCotizacion)), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r', 'data-ajax' => "false")); ?>
</div>