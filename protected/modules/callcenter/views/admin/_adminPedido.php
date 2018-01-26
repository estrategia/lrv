<form id="addproducto" method="post" name="addproducto">
    <div class="row">
        <div class="col-md-3">
            <input type="text" placeholder="Descripción" class="form-control input-sm"  data-pedido="<?php echo $objCompra->idCompra ?>" maxlength="50" id="busqueda-buscar"> 
        </div>
        <div class="col-md-1">
            <button id="btn-pedido-buscar" type="button" class="btn btn-danger btn-sm" data-role="busquedapedido" data-pedido="<?php echo $objCompra->idCompra ?>"><i class="glyphicon glyphicon-search"></i>Buscar</button>
        </div>
    </div>
</form>

<h4> Productos del pedido</h4>
<table class="table table-input table-bordered table-hover table-striped">
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
                        <td style="min-width:180px;">
                            <div class="form-inline text-center">
                                <?php if ($objItem->terceros == 1): ?>
                                    <input id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" type="text" style="width:100px" readonly value="<?php echo $objItem->unidades ?>" >
                                <?php else: ?>
                                    <input id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" type="text" style="width:100px" value="<?php echo $objItem->unidades ?>" >
                                    
                                    <?php if($objCompra->idTipoVenta == 5):?>
                                    	<button type="button" data-role="ver-cantidad-vap" data-compra="<?php echo $objCompra->idCompra?>" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                    <?php else:?>
                                    	<button type="button" data-role="modificarpedido" data-action="11" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                	<?php endif ?>
                                <?php endif ?>
                            </div>
                            <div class='space-2'></div>
                            <?php if($objItem->unidadesCedi > 0):?>
                            	<div class="form-inline text-center">
	                            Unidades CEDI
	                            </div>
	                            <div class="form-inline text-center">
	                            		
	                                    <input type="text" id="cantidad-item-bodega-<?php echo $objItem->idCompraItem ?>" style="width:100px" value="<?php echo $objItem->unidadesCedi ?>" >
	                                  <!--  <button type="button" data-role="modificarpedido" data-action="13" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button> -->
	                            </div>
                            <?php endif;?>
                        </td>
                        <td class="text-right">
                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                            <?php if ($objItem->objImpuesto->porcentaje > 0): ?>
                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> IVA</div>
                            <?php endif; ?>
                        </td>
                        <td class="text-right">
                            <?php if ($objCompra->objFormaPagoCompra->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']): ?>
                                <button style="float: left;" type="button" data-role="modificar-ahorro" data-ahorro="<?php echo $objItem->descuentoUnidad ?>" data-opcion="1" data-item="<?php echo $objItem->idCompraItem ?>" data-descripcion="<?php echo $objItem->descripcion?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                            <?php endif; ?>
                            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?>
                        </td>
                        <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td rowspan='2' class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
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
                        <td style="min-width:180px;"  class="text-center">
                            U.M.V
                            <?php if ($objItem->objProducto->objMedidaFraccion !== null): ?>
                                <br/>
                                <?php echo $objItem->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $objItem->objProducto->unidadFraccionamiento ?>
                            <?php endif; ?>
                            <div class="form-inline text-center">
                                <input id="cantidad-item-fraccion-<?php echo $objItem->idCompraItem ?>" type="text" style="width:100px" value="<?php echo $objItem->fracciones ?>" >
                                <button type="button" data-role="modificarpedido" data-action="12" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </td> 
                        <td class="text-right">
                            <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseFraccion, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                            <?php if ($objItem->objImpuesto->porcentaje > 0): ?>
                                <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> IVA</div>
                            <?php endif; ?>
                        </td>
                        <td class="text-right">
                            <?php if ($objCompra->objFormaPagoCompra->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']): ?>
                                <button style="float: left;" type="button" data-role="modificar-ahorro" data-ahorro="<?php echo $objItem->descuentoFraccion ?>" data-opcion="2" data-item="<?php echo $objItem->idCompraItem ?>" data-descripcion="<?php echo $objItem->descripcion?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                            <?php endif; ?>
                            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoFraccion, Yii::app()->params->formatoMoneda['moneda']) ?>
                        </td>
                        <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseFraccion - $objItem->descuentoFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
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
                            <td style="min-width:180px">
                                <div class="form-inline text-center">
                                    <?php if ($objItem->terceros == 1): ?>
                                        <input id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" type="text" style="width:100px" readonly value="<?php echo $objItem->unidades ?>" >
                                    <?php else: ?>
                                        <input id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" type="text" style="width:100px" value="<?php echo $objItem->unidades ?>" >
                                        <button type="button" data-role="modificarpedido" data-action="11" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button> 
                                    <?php endif ?>
                                </div>
                            </td>
                            <td rowspan='2' class="text-right">
                                <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                <?php if ($objItem->objImpuesto->porcentaje > 0): ?>
                                    <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> IVA</div>
                                <?php endif; ?>
                            </td>
                            <td rowspan='2' class="text-right">
                                <?php if ($objCompra->objFormaPagoCompra->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']): ?>
                                    <button style="float: left;" type="button" data-role="modificar-ahorro" data-ahorro="<?php echo $objItem->descuentoUnidad ?>" data-opcion="1" data-item="<?php echo $objItem->idCompraItem ?>" data-descripcion="<?php echo $objItem->descripcion?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                <?php endif; ?>
                                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?>
                            </td>
                            <td rowspan='2' class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td rowspan='2' class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
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
                            <td style="min-width:180px">
                                Unidades bodega
                                <div class="form-inline text-center">
                                    <input type="text" id="cantidad-item-bodega-<?php echo $objItem->idCompraItem ?>" style="width:100px" value="<?php echo $objItem->unidadesCedi ?>" >
                                  <!--  <button type="button" data-role="modificarpedido" data-action="13" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button> -->
                                </div>
                            </td> 
                        </tr>
                    <?php else: ?>
                        <tr style="vertical-align: middle">
                            <?php if ($objItem->unidadesSuscripcion > 0): ?>
                                <td rowspan="2"><?php echo $objItem->codigoProducto ?><br></td>
                                <td rowspan="2" class="center vertical-center">
                                    <?php if (empty($objItem->listBeneficios)): ?>
                                        NA
                                    <?php else: ?>
                                        <a href="#" class="btn btn-sm btn-info" data-item="<?php echo $objItem->idCompraItem ?>" data-role="beneficiositem"><i class="icon-white glyphicon glyphicon-eye-open"></i></a>
                                    <?php endif; ?>
                                    <br>
                                </td>
                                <td rowspan="2"><?php echo $objItem->descripcion ?><br></td>
                            <?php else: ?>
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
                            <?php endif; ?>
                            
                            <td style="min-width:180px">
                                <div class="form-inline text-center">
                                    <?php if ($objItem->terceros == 1): ?>
                                        <input type="text" id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" readonly style="width:100px" value="<?php echo $objItem->unidades ?>" >
                                    <?php else: ?>
                                        <input type="text" id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" style="width:100px" value="<?php echo $objItem->unidades ?>" >
                                         <?php if($objCompra->idTipoVenta == 5):?>
                                    		<button type="button" data-role="ver-cantidad-vap" data-compra="<?php echo $objCompra->idCompra?>" data-producto="<?php echo $objItem->codigoProducto ?>" class="btn btn-default btn-sm">Ver puntos de venta</button>
                                    	<?php else:?>
                                        	<button type="button" data-role="modificarpedido" data-action="11" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                    	<?php endif ?>
                                    <?php endif ?>
                                </div>
                            </td>
                            
                            <?php if ($objItem->unidadesSuscripcion > 0): ?>
                                <td rowspan="2" class="text-right">
                                    <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                    <?php if ($objItem->objImpuesto->porcentaje > 0): ?>
                                        <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> IVA</div>
                                        <?php endif; ?>
                                </td>
                            <?php else: ?>
                                <td class="text-right">
                                    <span style="text-decoration: line-through;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']) ?></span>
                                    <?php if ($objItem->objImpuesto->porcentaje > 0): ?>
                                        <div style="font-size: 10px;color: #000">Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($objItem->objImpuesto->porcentaje) ?> IVA</div>
                                    <?php endif; ?>
                                </td>
                            <?php endif; ?>
                            
                            <td class="text-right">
                                <?php if ($objCompra->objFormaPagoCompra->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']): ?>
                                    <button style="float: left;" type="button" data-role="modificar-ahorro" data-ahorro="<?php echo $objItem->descuentoUnidad ?>" data-opcion="1" data-item="<?php echo $objItem->idCompraItem ?>" data-descripcion="<?php echo $objItem->descripcion?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                <?php endif; ?>
                                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoUnidad, Yii::app()->params->formatoMoneda['moneda']) ?>
                            </td>
                            <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            <?php if ($objItem->terceros != 1): ?>
                                <?php if ($objItem->unidadesSuscripcion > 0): ?>
                                    <td rowspan="2">
                                        <strong><?php echo $objItem->objEstadoItem->estadoItem ?></strong>
                                        <?php if ($objItem->objOperador !== null): ?>
                                            <br/>
                                            <?php echo $objItem->objOperador->nombre ?>
                                        <?php endif; ?>
                                    </td>
                                    <td rowspan="2" class="center vertical-center">
                                        <button type="button" class="btn btn-sm btn-<?php echo ($objItem->disponible == 1 ? "success" : "danger") ?>" data-item="<?php echo $objItem->idCompraItem ?>" data-role="disponibilidaditem"><i class="icon-white glyphicon glyphicon-<?php echo ($objItem->disponible == 1 ? "ok" : "remove") ?>"></i></button>
                                    </td>
                                <?php else: ?>
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
                                <?php endif; ?>
                            <?php endif ?>
                        </tr>
                        <?php if ($objItem->unidadesSuscripcion > 0): ?>
                            <tr>
                                <td style="min-width:180px">
                                    Productos con suscripción
                                    <div class="form-inline text-center">
                                        <input type="text" id="cantidad-item-unidad-suscripcion-<?php echo $objItem->idCompraItem ?>" style="width:100px" value="<?php echo $objItem->unidadesSuscripcion ?>" >
                                        <button type="button" data-role="modificarpedido" data-action="11" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                    </div>
                                </td>
                            
                                <td class="text-right">
                                    <?php if ($objCompra->objFormaPagoCompra->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']): ?>
                                        <button style="float: left;" type="button" data-role="modificar-ahorro" data-ahorro="<?php echo $objItem->descuentoUnidad ?>" data-opcion="1" data-item="<?php echo $objItem->idCompraItem ?>" data-descripcion="<?php echo $objItem->descripcion?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                                    <?php endif; ?>
                                    <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->descuentoSuscripcion, Yii::app()->params->formatoMoneda['moneda']) ?>
                                </td>
                                <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoSuscripcion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalSuscripcion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                            </tr>
                        <?php endif; ?>
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
                        <td rowspan="<?php echo count($arrItem['items']) ?>" style="min-width:180px">
                            <div class="form-inline text-center">
                                <input type="text" id="cantidad-item-unidad-<?php echo $objItem->idCompra ?>" style="width:100px" value="<?php echo $objItem->unidades ?>" >
                                <button type="button" data-role="modificarpedido" data-action="2" data-compra="<?php echo $objItem->idCompra ?>" data-combo="<?php echo $objItem->idCombo ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
                            </div>
                        </td>
                        <td rowspan="<?php echo count($arrItem['items']) ?>" class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td rowspan="<?php echo count($arrItem['items']) ?>">NA</td>
                        <td rowspan="<?php echo count($arrItem['items']) ?>" class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $arrItem['valor'], Yii::app()->params->formatoMoneda['moneda']) ?></td>
                        <td rowspan="<?php echo count($arrItem['items']) ?>" class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($arrItem['valor'] * $objItem->unidades), Yii::app()->params->formatoMoneda['moneda']) ?><br></td>
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
            <th style="text-align: right;"><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->subtotalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></th>
            <th></th>
            <th></th>
        </tr> 
    </tbody>
</table>
        <?php 
        $sumaBonos = 0;

        foreach($objCompra->listFormaPagoCompra as $formaPago):
            if($formaPago->idFormaPago == Yii::app()->params->callcenter['bonos']['formaPagoBonos']):
                $sumaBonos += $formaPago->valor;
            endif;
        endforeach;?>
<table class="table table-bold table-bordered table-hover table-striped">
    <tbody>
        <tr>
            <td colspan="4"></td>
            <td width="20%"><strong>Servicio</strong></td>
            <td width="20%" class="text-right"><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->domicilio, Yii::app()->params->formatoMoneda['moneda']) ?></span></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td><strong>Flete</strong></td>
            <td class="text-right"><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->flete, Yii::app()->params->formatoMoneda['moneda']) ?></span></td>
        </tr> 
        <tr>
            <td colspan="4"></td>
            <td><strong>Bono</strong></td>
            <td class="text-right"><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $sumaBonos, Yii::app()->params->formatoMoneda['moneda']) ?></span></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td><strong>Valor venta</strong></td>
            <td class="text-right"><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->totalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></td>
        </tr>
        <tr>
            <td colspan="4"></td>
            <td><strong>Impuestos incluidos</strong></td>
            <td class="text-right"><span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->impuestosCompra, Yii::app()->params->formatoMoneda['moneda']) ?></span></td>
        </tr>  
    </tbody>
</table>