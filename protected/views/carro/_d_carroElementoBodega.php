<tr>
    <td>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => Producto::cadenaUrl($position->objProducto->descripcionProducto))) ?>">
            <img src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen() ?>" title="<?php echo $position->objProducto->descripcionProducto ?>"> 
        </a>
        <div><?php echo $position->objProducto->descripcionProducto ?></div>
        <div><?php echo $position->objProducto->presentacionProducto ?></div>
        <div>Código: <?php echo $position->objProducto->codigoProducto ?></div>

        <?php if ($position->getShipping() > 0): ?>
            <div>Flete: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</div>
        <?php endif; ?>

        <div><span>Tiempo de entrega: <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> hora(s)</span></div>
    </td>
    <td>
        <div class="form-inline">
            <input type="text" class="col-xs-3" value="<?php echo $position->getQuantityStored() ?>" id="cantidad-producto-bodega-<?php echo $position->getId() ?>" placeholder="0" >
            <button type="button" class="btn btn-default btn-sm" data-role="modificarcarro" data-modificar="3" data-position="<?php echo $position->getId(); ?>"><i class="glyphicon glyphicon-refresh"></i></button>
        </div>
    </td>
    <td>
        <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php else: ?>
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php endif; ?>

        <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
            <br>
            Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> de impuestos [<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>] IVA
        <?php endif; ?>
    </td>
    <td>
        <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php else: ?>
            NA
        <?php endif; ?>
    </td>
    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPriceStored(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
</tr>