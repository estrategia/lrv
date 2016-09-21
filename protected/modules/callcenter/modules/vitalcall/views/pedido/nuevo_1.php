<?php
// CVarDumper::dump($objUsuario,10, true);
?>

<div class="panel-group" id="accordion-formulas" role="tablist" aria-multiselectable="true">
	<?php foreach($objUsuario->listFormulasVC as $objFormulaVC):?>
  	<div class="panel panel-default">
		<div class="panel-heading" role="tab" id="heading-<?= $objFormulaVC->idFormula?>">
			<h4 class="panel-title">
				<a role="button" data-toggle="collapse" data-parent="#accordion-formulas" href="#collapse-<?= $objFormulaVC->idFormula?>" aria-expanded="false" aria-controls="collapse-<?= $objFormulaVC->idFormula?>"> <?= $objFormulaVC->nombreMedico?> - <?= $objFormulaVC->institucion?> </a>
			</h4>
		</div>
		<div id="collapse-<?= $objFormulaVC->idFormula?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading-<?= $objFormulaVC->idFormula?>">
			<div class="panel-body">
				
				<table class="table table-input table-bordered table-hover table-striped">
				    <tbody>
				        <tr>
				            <th>Código</th>
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
				        <?php foreach ($objFormulaVC->listProductosVC as $objProductoVC): ?>
				                <?php if ($objProductoVC->objProducto->fraccionado == 1): ?>
				                    <tr style="vertical-align: middle">
				                        <td rowspan='2'><?php echo $objFormulaVC->codigoProducto ?><br></td>
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
				                                <input id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" type="text" style="width:100px" value="<?php echo $objItem->unidades ?>" >
				                                <button type="button" data-role="modificarpedido" data-action="11" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
				                            </div>
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
				                            <td style="min-width:180px">
				                                <div class="form-inline text-center">
				                                    <input type="text" id="cantidad-item-unidad-<?php echo $objItem->idCompraItem ?>" style="width:100px" value="<?php echo $objItem->unidades ?>" >
				                                    <button type="button" data-role="modificarpedido" data-action="11" data-item="<?php echo $objItem->idCompraItem ?>" class="btn btn-default btn-sm"><i class="glyphicon glyphicon-refresh"></i></button>
				                                </div>
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
				                            <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioTotalUnidad + $objItem->precioTotalFraccion), Yii::app()->params->formatoMoneda['moneda']) ?></td>
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
				        <?php endforeach; ?>
				    </tbody>
				</table>
				
				
			</div>
		</div>
	</div>
	<?php endforeach;?>
</div>