<div class="row">
    <div class="col-md-12">
        <?php $listCombos = array(); ?>
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th colspan="6" class="text-center"><?php echo $tituloTabla; ?></th>
                </tr>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Estado</th>
                    <th>Fecha de Entrega</th>
                    <th>Antes</th>
                    <th>Ahorro</th>
                    <th>Ahora</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $subtotal = 0; ?>
                <?php foreach ($items as $objItem): ?>

                    <?php if ($objItem->idCombo === null): ?>
                        <?php $ahorro = ($objItem->objProducto->mostrarAhorroVirtual == 1 && $objItem->descuentoUnidad > 0) ? $objItem->descuentoUnidad : 0 ?>
                        <tr>
                            <td class="text-center">
                                <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objItem->codigoProducto, 'descripcion' => $objItem->objProducto->getCadenaUrl())) ?>" data-ajax="false">
                                    <img src="<?php echo Yii::app()->request->baseUrl . $objItem->objProducto->rutaImagen() ?>" class="ui-li-thumb img-responsive img-table">
                                </a>
                                <h4><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objItem->codigoProducto)) ?>" data-ajax="false"><?php echo $objItem->descripcion ?></a></h4>
                                <p><?php echo $objItem->presentacion ?></p>
                            </td>
                            <td  class="text-center">
                                <?php if ($objItem->unidades > 0): ?>
                                    <?php echo $objItem->unidades ?>
                                <?php endif; ?>
                                <?php if ($objItem->fracciones > 0): ?>
                                    <p>U.M.V: <?php echo $objItem->fracciones ?></p>
                                <?php endif; ?>
                                <?php if ($objItem->unidadesCedi > 0): ?>
                                    <p>Bodega: <?php echo $objItem->unidadesCedi ?></p>
                                <?php endif; ?>
                            </td>
                            <td class="text-center">
                                <?php if ($objItem->idEstadoItemTercero != null): ?>
                                    <?php echo $objItem->estadoTercero->nombre; ?>
                                    (<a href="" data-role="mostrar-traza-item" data-id-compra-item="<?php echo $objItem->idCompraItem?>">Historial</a>)
                                <?php else: ?>
                                    <?php echo $objItem->objCompra->objEstadoCompra->compraEstado; ?>
                                <?php endif ?>
                            </td>
                            <td class="text-center">
                                <?php if ($objItem->terceros == 1): ?>
                                    Entre
                                    <?php echo date('Y-m-d', strtotime($objItem->fechaEntregaFinal)); ?>
                                    y
                                    <?php echo date('Y-m-d', strtotime($objItem->fechaEntregaFinal)); ?>
                                <?php else: ?>
                                    <?php echo $objItem->objCompra->fechaEntrega; ?>
                                <?php endif ?>
                            </td>
                            <td class="text-right">
                                <strike><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']); ?></strike>
                            </td>
                            <td class="text-right">
                                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $ahorro, Yii::app()->params->formatoMoneda['moneda']); ?>
                            </td>
                            <td class="text-right">
                                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']); ?>
                            </td>
                            <td class="text-right">
                                <?php $subtotal += ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion) ?>
                                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $subtotal, Yii::app()->params->formatoMoneda['moneda']); ?>
                            </td>
                    </tr>
                <?php else: ?>
                    <?php $listCombos[$objItem->idCombo][0] = $objItem; ?>
                    <?php $listCombos[$objItem->idCombo][1] = isset($listCombos[$objItem->idCombo][1]) ? ($listCombos[$objItem->idCombo][1] + $objItem->precioBaseUnidad) : $objItem->precioBaseUnidad; ?>
                <?php endif; ?>
            <?php endforeach; ?>
            <?php foreach ($listCombos as $idCombo => $arrItem): ?>
                <tr>
                    <td>
                        <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $idCombo)) ?>" data-ajax="false">
                            <img src="<?php echo Yii::app()->request->baseUrl . $listCombos[$idCombo][0]->objCombo->rutaImagen() ?>" class="ui-li-thumb">
                        </a>
                        <h4><a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $idCombo)) ?>" data-ajax="false"><?php echo $listCombos[$idCombo][0]->descripcionCombo ?></a></h4>
                    </td>
                    <td>
                        <?php echo $listCombos[$idCombo][0]->unidades ?>
                    </td>
                    <td>
                <strike><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], 0, Yii::app()->params->formatoMoneda['moneda']); ?></strike>
                </td>
                <td>
                    <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], 0, Yii::app()->params->formatoMoneda['moneda']); ?>
                </td>
                <td>
                    <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $listCombos[$idCombo][1], Yii::app()->params->formatoMoneda['moneda']); ?>
                </td>
                <td>
                    <?php $subtotal += ($listCombos[$idCombo][1] * $listCombos[$idCombo][0]->unidades); ?>
                    <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $subtotal, Yii::app()->params->formatoMoneda['moneda']); ?>
                </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <th>Subtotal</th>
                <th  class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $subtotal, Yii::app()->params->formatoMoneda['moneda']); ?></th>
            </tr>
            </tbody>
        </table>
    </div>
</div>
<?php if ($mostrarPago): ?>
    <div class="row">
        <div class="col-md-4 col-md-offset-8">
            <table class="table table-bordered table-hover">
                <tr>
                    <th>Domicilio</th>
                    <th class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objeto->domicilio, Yii::app()->params->formatoMoneda['moneda']); ?></th>
                </tr>
                <?php if (isset($objeto->donacionFundacion)): ?>
                    <tr>
                        <?php $donacion = $objeto->donacionFundacion > 0 ? $objeto->donacionFundacion : 0; ?>
                        <th>Donaci&oacute;n a la fundaci&oacute;n</th>
                        <th class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $donacion, Yii::app()->params->formatoMoneda['moneda']); ?></th>
                    </tr>
                <?php endif; ?>
                <tr>
                    <?php $impuestos = ($objeto->objCiudad->excentoImpuestos == 0 && $objeto->impuestosCompra > 0) ? $objeto->impuestosCompra : 0 ?>
                    <th>Impuestos incluidos</th>
                    <th class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $impuestos, Yii::app()->params->formatoMoneda['moneda']); ?></th>
                </tr>
                <?php if ($objeto->flete > 0): ?>
                    <tr>
                        <th>Flete adicional</th>
                        <th class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objeto->flete, Yii::app()->params->formatoMoneda['moneda']); ?></th>
                    </tr>
                <?php endif; ?>
                <?php if (isset($objeto->objFormaPagoCompra) && $objeto->objFormaPagoCompra->valorBono > 0): ?>
                    <tr>
                        <th>Bono</th>
                        <th class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objeto->objFormaPagoCompra->valorBono, Yii::app()->params->formatoMoneda['moneda']); ?></th>
                    </tr>
                <?php endif; ?>
                <tr>
                    <th>Total</th>
                    <th class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objeto->totalCompra, Yii::app()->params->formatoMoneda['moneda']); ?></th>
                </tr>
            </table>
        </div>
    </div>
<?php endif; ?>

<div class="modal fade" id="traza-item" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Historial de estados</h4>
      </div>
      <div class="modal-body" id="traza-item-body">
        <p>Traza</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->