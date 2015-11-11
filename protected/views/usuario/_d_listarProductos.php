<div class="row">
	<div class="col-md-12">
		<?php $listCombos = array(); ?>
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th colspan="6"><?php echo $tituloTabla; ?></th>
				</tr>
				<tr>
					<th>Producto</th>
					<th>Cantidad</th>
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
						<td>
							<a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objItem->codigoProducto,'descripcion'=> $objItem->objProducto->getCadenaUrl())) ?>" data-ajax="false">
		                        <img src="<?php echo Yii::app()->request->baseUrl . $objItem->objProducto->rutaImagen() ?>" class="ui-li-thumb">
		                    </a>
		                    <h4><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objItem->codigoProducto)) ?>" data-ajax="false"><?php echo $objItem->descripcion ?></a></h4>
		                    <p><?php echo $objItem->presentacion ?></p>
						</td>
						<td>
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
						<td>
							<strike><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objItem->precioBaseUnidad, Yii::app()->params->formatoMoneda['moneda']); ?></strike>
						</td>
						<td>
							<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $ahorro, Yii::app()->params->formatoMoneda['moneda']); ?>
						</td>
						<td>
							<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objItem->precioBaseUnidad - $objItem->descuentoUnidad), Yii::app()->params->formatoMoneda['moneda']); ?>
						</td>
						<td>
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
							<?php $subtotal += ($listCombos[$idCombo][1]*$listCombos[$idCombo][0]->unidades); ?>
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
					<th><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $subtotal, Yii::app()->params->formatoMoneda['moneda']); ?></th>
				</tr>
			</tbody>
		</table>
	</div>
</div>
<?php if($mostrarPago): ?>
<div class="row">
	<div class="col-md-4 col-md-offset-8">
		<table class="table table-bordered table-hover">
			<tr>
				<th>Domicilio</th>
				<th><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objeto->domicilio, Yii::app()->params->formatoMoneda['moneda']); ?></th>
			</tr>
			<?php if(isset($objeto->donacionFundacion)): ?>
			<tr>
				<?php $donacion = $objeto->donacionFundacion > 0 ? $objeto->donacionFundacion : 0; ?>
				<th>Donaci&oacute;n a la fundaci&oacute;n</th>
				<th><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $donacion, Yii::app()->params->formatoMoneda['moneda']); ?></th>
			</tr>
			<?php endif; ?>
			<tr>
				<?php $impuestos  = ($objeto->objCiudad->excentoImpuestos == 0 && $objeto->impuestosCompra > 0) ? $objeto->impuestosCompra : 0 ?>
				<th>Impuestos incluidos</th>
				<th><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $impuestos, Yii::app()->params->formatoMoneda['moneda']); ?></th>
			</tr>
			<?php if ($objeto->flete > 0): ?>
                <tr>
                    <th>Flete adicional</th>
                    <th><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objeto->flete, Yii::app()->params->formatoMoneda['moneda']); ?></th>
                </tr>
            <?php endif; ?>
            <?php if (isset($objeto->objFormaPagoCompra) && $objeto->objFormaPagoCompra->valorBono > 0): ?>
                <tr>
                    <th>Bono</th>
                    <th><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objeto->objFormaPagoCompra->valorBono, Yii::app()->params->formatoMoneda['moneda']); ?></th>
                </tr>
            <?php endif; ?>
            <tr>
				<th>Total</th>
				<th><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objeto->totalCompra, Yii::app()->params->formatoMoneda['moneda']); ?></th>
			</tr>
		</table>
	</div>
</div>
<?php endif; ?>