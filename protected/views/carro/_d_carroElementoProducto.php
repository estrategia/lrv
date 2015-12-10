<?php if ($position->objProducto->fraccionado == 1): ?>
    <tr>
        <td rowspan="2"  align="center">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>">
                <img class="img-responsive img-table" src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen() ?>" title="<?php echo $position->objProducto->descripcionProducto ?>"> 
            </a>
            <div style="color:#ED1C24;"><?php echo $position->objProducto->descripcionProducto ?></div>
            <div><?php echo $position->objProducto->presentacionProducto ?></div>
            <div>Código: <?php echo $position->objProducto->codigoProducto ?></div>
        </td>
        <td class="btn-pagar" align="center">
            <?php if ($lectura): ?>
                <div style="text-align:center;vertical-align:top;">
                    <?php echo $position->getQuantityUnit() ?>
                </div>
            <?php else: ?>
                <div class="group-botones-cantidad">
                    <button class="btn-addless-cantidad" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="-"><span class="glyphicon glyphicon-minus"></span></button>
                    <div class="ressete">
                        <input class="increment" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantityUnit() ?>" id="cantidad-producto-unidad-<?php echo $position->getId() ?>" placeholder="0"/>
                    </div>
                    <button class="btn-addless-cantidad" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="+"><span class="glyphicon glyphicon-plus"></span></button>
                </div>
            <?php endif; ?>

            <?php if (!$lectura): ?>
                <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 1, 'data-position' => $position->getId(), 'class' => 'btn btn-danger')); ?>
            <?php endif; ?>
        </td>
        <td class="text-right">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php endif; ?>

            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
                <br>
                Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
            <?php endif; ?>
        </td>
        <td class="text-right">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                NA
            <?php endif; ?>
        </td>
        <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td class="text-right" rowspan="2"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    </tr>
    <tr>
        <td  class="btn-pagar" align="center"> 
            <span style="font-size: 10px; "> U.M.V</span>
            <?php if ($position->objProducto->objMedidaFraccion !== null): ?>
                <br>
                <span style="font-size: 10px; "><?php echo $position->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $position->objProducto->unidadFraccionamiento ?></span>
            <?php endif; ?>
            <br>

            <?php if ($lectura): ?>
                <div style="text-align:center;vertical-align:top;">
                    <?php echo $position->getQuantity(true) ?>
                </div>
            <?php else: ?>
                <div class="group-botones-cantidad">
                    <button class="btn-addless-cantidad" data-role="modificarcarro" data-modificar="1" data-fraction="1" data-position="<?php echo $position->getId(); ?>" data-operation="-"><span class="glyphicon glyphicon-minus"></span></button>
                    <div class="ressete">
                        <input class="increment" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantity(true) ?>" id="cantidad-producto-fraccion-<?php echo $position->getId() ?>" data-nfracciones="<?php echo $position->objProducto->numeroFracciones ?>" data-ufraccionamiento="<?php echo $position->objProducto->unidadFraccionamiento ?>" placeholder="0"/>
                    </div>
                    <button class="btn-addless-cantidad" data-role="modificarcarro" data-modificar="1" data-fraction="1" data-position="<?php echo $position->getId(); ?>" data-operation="+"><span class="glyphicon glyphicon-plus"></span></button>
                </div>
            <?php endif; ?>

            <?php if (!$lectura): ?>
                <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 2, 'data-position' => $position->getId(), 'class' => 'btn btn-danger')); ?>
            <?php endif; ?>
        </td>
        <td class="text-right">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true, false), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php endif; ?>

            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
                <br>
                Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
            <?php endif; ?>
        </td>
        <td class="text-right">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                NA
            <?php endif; ?>
        </td>
        <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(true), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    </tr>
<?php else: ?>
    <tr>
        <td align="center">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => $position->objProducto->getCadenaUrl())) ?>">
                <img class="img-responsive img-table" src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen() ?>" title="<?php echo $position->objProducto->descripcionProducto ?>"> 
            </a>
            <div style="color:#ED1C24;"><?php echo $position->objProducto->descripcionProducto ?></div>
            <div><?php echo $position->objProducto->presentacionProducto ?></div>
            <div>Código: <?php echo $position->objProducto->codigoProducto ?></div>

            <?php if ($position->getShipping() > 0): ?>
                <div>Flete: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</div>
            <?php endif; ?>

            <?php if ($position->getDelivery() > 0): ?>
                <div>Tiempo de entrega: <?php echo $position->getDelivery() ?> hora(s)</div>
            <?php endif; ?>
        </td>
        <td  class="btn-pagar" align="center">
            <?php if ($lectura): ?>
                <div style="text-align:center;vertical-align:top;">
                    <?php echo $position->getQuantityUnit() ?>
                </div>
            <?php else: ?>
                <div class="group-botones-cantidad">
                    <button class="btn-addless-cantidad" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="-"><span class="glyphicon glyphicon-minus"></span></button>
                    <div class="ressete">
                        <input class="increment" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantityUnit() ?>" id="cantidad-producto-unidad-<?php echo $position->getId() ?>" placeholder="0"/>
                    </div>
                    <button class="btn-addless-cantidad"  data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="+"><span class="glyphicon glyphicon-plus"></span></button>
                </div>
            <?php endif; ?>

            <?php if (!$lectura): ?>
                <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 1, 'data-position' => $position->getId(), 'class' => 'btn btn-danger')); ?>
            <?php endif; ?>
        </td>
        <td class="text-right">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php endif; ?>

            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
                <br>
                Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
            <?php endif; ?>
        </td>
        <td class="text-right">
            <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
                <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>
            <?php else: ?>
                NA
            <?php endif; ?>
        </td>
        <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
        <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    </tr>
<?php endif; ?>
