<form id="addproducto" method="post" name="addproducto">
    <div class="row">
        <div class="col-md-3">
            <input type="text" placeholder="Descripción" class="form-control input-sm" maxlength="50" id="busqueda-buscar"> 
        </div>
        <div class="col-md-1">
            <button id="btn-pedido-buscar" type="button" class="btn btn-danger btn-sm" data-role="busquedapedido" data-pedido="<?php echo $objCompra->idCompra ?>"><i class="glyphicon glyphicon-search"></i>Buscar</button>
        </div>
    </div>
</form>

<h4> Productos del pedido</h4>
<table class="table table-bordered table-hover table-striped">
    <tbody>
        <tr>
            <th>Código</th>
            <th>Beneficios</th>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Antes</th>
            <th>Ahorro</th>
            <th>Ahora</th>
            <th>Subtotal</th>
            <th>Cambió</th>
            <th>Disponible</th>
        </tr>
        <?php $listCombos = array(); ?>
        <?php foreach ($objCompra->listItems as $objItem): ?>
            <?php if ($objItem->idCombo === null): ?>
                <?php if ($objItem->objProducto->fraccionado == 1): ?>
                    <tr style="vertical-align: middle">
                        <td rowspan='2'><?php echo $objItem->codigoProducto ?><br></td>
                        <td rowspan='2' class="center vertical-center">
                            <?php if (empty($objItem->listBeneficios)): ?>
                                NA
                            <?php else: ?>
                                <a href="#" class="btn btn-sm btn-info" data-item="<?php echo $objItem->idCompraItem ?>" data-role="beneficiositem"><i class="icon-white glyphicon glyphicon-eye-open"></i></a>
                            <?php endif; ?>
                            <br>
                        </td>
                        <td rowspan='2'><?php echo $objItem->descripcion ?><br></td>
                        <td>
                            <div class="form-inline">
                                <input id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" type="text" class="col-xs-3" value="<?php echo $objItem->unidades ?>" >
                                <button type="button" data-role="modificarpedido" data-action="11" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </td>
                        <td>
                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                            <?php if ($objItem->objImpuesto->porcentaje > 0): ?>
                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> IVA</div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td rowspan='2'>
                            <strong><?php echo $objItem->objEstadoItem->estadoItem ?></strong>
                            <?php if ($objItem->objOperador !== null): ?>
                                <br/>
                                <?php echo $objItem->objOperador->nombre ?>
                            <?php endif; ?>
                        </td>
                        <td class="center vertical-center" rowspan='2'>
                            <button type="button" class="btn btn-sm btn-<?php echo ($objItem->disponible == 1 ? "success" : "danger") ?>" data-item="<?php echo $objItem->idCompraItem ?>" data-role="disponibilidaditem"><i class="icon-white glyphicon glyphicon-<?php echo ($objItem->disponible == 1 ? "ok" : "remove") ?>"></i></button>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            U.M.V
                            <?php if ($objItem->objProducto->objMedidaFraccion !== null): ?>
                                <br/>
                                <?php echo $objItem->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $objItem->objProducto->unidadFraccionamiento ?>
                            <?php endif; ?>
                            <div class="form-inline">
                                <input id="cantidad-item-fraccion-<?php echo $objItem->idCompraItem ?>" type="text" class="col-xs-3" value="<?php echo $objItem->fracciones ?>" >
                                <button type="button" data-role="modificarpedido" data-action="12" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </td> 
                        <td>
                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseFraccion, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                            <?php if ($objItem->objImpuesto->porcentaje > 0): ?>
                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> IVA</div>
                            <?php endif; ?>
                        </td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoFraccion, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseFraccion - $objItem->descuentoFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                    </tr>
                <?php else: ?>
                    <?php if ($objItem->unidadesCedi > 0): ?>
                        <tr style="vertical-align: middle">
                            <td rowspan='2'><?php echo $objItem->codigoProducto ?><br></td>
                            <td rowspan='2' class="center vertical-center">
                                <?php if (empty($objItem->listBeneficios)): ?>
                                    NA
                                <?php else: ?>
                                    <a href="#" class="btn btn-sm btn-info" data-item="<?php echo $objItem->idCompraItem ?>" data-role="beneficiositem"><i class="icon-white glyphicon glyphicon-eye-open"></i></a>
                                <?php endif; ?>
                                <br>
                            </td>
                            <td rowspan='2'><?php echo $objItem->descripcion ?><br></td>
                            <td>
                                <div class="form-inline">
                                    <input id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" type="text" class="col-xs-3" value="<?php echo $objItem->unidades ?>" >
                                    <button type="button" data-role="modificarpedido" data-action="11" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                </div>
                            </td>
                            <td rowspan='2'>
                                <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                <?php if ($objItem->objImpuesto->porcentaje > 0): ?>
                                    <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> IVA</div>
                                <?php endif; ?>
                            </td>
                            <td rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td rowspan='2'><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td rowspan='2'>
                                <strong><?php echo $objItem->objEstadoItem->estadoItem ?></strong>
                                <?php if ($objItem->objOperador !== null): ?>
                                    <br/>
                                    <?php echo $objItem->objOperador->nombre ?>
                                <?php endif; ?>
                            </td>
                            <td class="center vertical-center" rowspan='2'>
                                <button type="button" class="btn btn-sm btn-<?php echo ($objItem->disponible == 1 ? "success" : "danger") ?>" data-item="<?php echo $objItem->idCompraItem ?>" data-role="disponibilidaditem"><i class="icon-white glyphicon glyphicon-<?php echo ($objItem->disponible == 1 ? "ok" : "remove") ?>"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Unidades bodega
                                <div class="form-inline">
                                    <input type="text" id="cantidad-item-bodega-<?php echo $objItem->idCompraItem ?>" class="col-xs-3" value="<?php echo $objItem->unidadesCedi ?>" >
                                    <button type="button" data-role="modificarpedido" data-action="13" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                </div>
                            </td> 
                        </tr>
                    <?php else: ?>
                        <tr style="vertical-align: middle">
                            <td><?php echo $objItem->codigoProducto ?><br></td>
                            <td class="center vertical-center">
                                <?php if (empty($objItem->listBeneficios)): ?>
                                    NA
                                <?php else: ?>
                                    <a href="#" class="btn btn-sm btn-info" data-item="<?php echo $objItem->idCompraItem ?>" data-role="beneficiositem"><i class="icon-white glyphicon glyphicon-eye-open"></i></a>
                                <?php endif; ?>
                                <br>
                            </td>
                            <td><?php echo $objItem->descripcion ?><br></td>
                            <td>
                                <div class="form-inline">
                                    <input type="text" id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" class="col-xs-3" value="<?php echo $objItem->unidades ?>" >
                                    <button type="button" data-role="modificarpedido" data-action="11" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                </div>
                            </td>
                            <td>
                                <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                <?php if ($objItem->objImpuesto->porcentaje > 0): ?>
                                    <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> IVA</div>
                                <?php endif; ?>
                            </td>
                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td>
                                <strong><?php echo $objItem->objEstadoItem->estadoItem ?></strong>
                                <?php if ($objItem->objOperador !== null): ?>
                                    <br/>
                                    <?php echo $objItem->objOperador->nombre ?>
                                <?php endif; ?>
                            </td>
                            <td class="center vertical-center">
                                <button type="button" class="btn btn-sm btn-<?php echo ($objItem->disponible == 1 ? "success" : "danger") ?>" data-item="<?php echo $objItem->idCompraItem ?>" data-role="disponibilidaditem"><i class="icon-white glyphicon glyphicon-<?php echo ($objItem->disponible == 1 ? "ok" : "remove") ?>"></i></button>
                            </td>
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
            <?php endforeach; ?>
        <?php endforeach; ?>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><strong>Subtotal</strong></th>
            <th><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->subtotalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
            <th></th>
            <th></th>
        </tr> 
    </tbody>
</table>

<table class="table table-bordered table-hover table-striped">
    <tbody>
        <tr>
            <th colspan="4"></th>
            <th width="20%"><strong>Servicio</strong></th>
            <th width="20%"><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->domicilio, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
        </tr>
        <tr>
            <th colspan="4"></th>
            <th><strong>Flete</strong></th>
            <th><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->flete, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
        </tr> 
        <tr>
            <th colspan="4"></th>
            <th><strong>Bono</strong></th>
            <th><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->objFormaPago->valorBono, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
        </tr>
        <tr>
            <th colspan="4"></th>
            <th><strong>Total a pagar</strong></th>
            <th><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->totalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
        </tr>
        <tr>
            <th colspan="4"></th>
            <th><strong>Impuestos incluidos</strong></th>
            <th><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->impuestosCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
        </tr>  
    </tbody>
</table>
