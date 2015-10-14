<?php if ($position->objProducto->fraccionado == 1): ?>
    <tr>
        <td rowspan="2">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => Producto::cadenaUrl($position->objProducto->descripcionProducto))) ?>">
                <img src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen() ?>" title="<?php echo $position->objProducto->descripcionProducto ?>"> 
            </a>
            <div><?php echo $position->objProducto->descripcionProducto ?></div>
            <div><?php echo $position->objProducto->presentacionProducto ?></div>
            <div>Código: <?php echo $position->objProducto->codigoProducto ?></div>
        </td>
        <td>
            <div class="form-inline">
                <input type="text" class="col-xs-3" value="<?php echo $position->getQuantityUnit() ?>" id="cantidad-producto-unidad-<?php echo $position->getId() ?>" placeholder="0" >
                <button class="btn btn-default btn-sm" data-modificar="1" data-position="<?php echo $position->getId(); ?>" data-role="modificarcarro" type="button"><i class="glyphicon glyphicon-refresh"></i></button>
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
        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td rowspan="2"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    </tr>
    <tr>
        <td> 
            <span style="font-size: 10px; "> U.M.V</span>
            <?php if ($position->objProducto->objMedidaFraccion !== null): ?>
                <br>
                <span style="font-size: 10px; "><?php echo $position->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $position->objProducto->unidadFraccionamiento ?></span>
            <?php endif; ?>
            <br>
            <div class="form-inline">
                <input type="text" class="col-xs-3" value="<?php echo $position->getQuantity(true) ?>" id="cantidad-producto-fraccion-<?php echo $position->getId() ?>" placeholder="0" >
                <button class="btn btn-default btn-sm" data-modificar="1" data-position="<?php echo $position->getId(); ?>" data-nfracciones="<?php echo $position->objProducto->numeroFracciones ?>" data-ufraccionamiento="<?php echo $position->objProducto->unidadFraccionamiento ?>" data-role="modificarcarro" type="button"><i class="glyphicon glyphicon-refresh"></i></button>
            </div>
        </td>
        <td>
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true, false), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php endif; ?>

            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
                <br>
                Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> de impuestos [<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>] IVA
            <?php endif; ?>
        </td>
        <td>
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                NA
            <?php endif; ?>
        </td>
        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    </tr>
<?php else: ?>
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

            <?php if ($position->getDelivery() > 0): ?>
                <div>Tiempo de entrega: <?php echo $position->getDelivery() ?> hora(s)</div>
            <?php endif; ?>
        </td>
        <td>
            <div class="form-inline">
                <input type="text" class="col-xs-3" value="<?php echo $position->getQuantityUnit() ?>" id="cantidad-producto-unidad-<?php echo $position->getId() ?>" placeholder="0" >
                <button type="button" class="btn btn-default btn-sm" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>"><i class="glyphicon glyphicon-refresh"></i></button>
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
        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    </tr>
<?php endif; ?>