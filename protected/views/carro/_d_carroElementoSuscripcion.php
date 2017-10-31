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
                <?php echo $position->getQuantitySuscription() ?>
            </div>
        <?php else: ?>
            <div class="group-botones-cantidad">
                <button class="btn btn-default btn-xs" data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="-"><span class="glyphicon glyphicon-minus"></span></button>
                <div class="ressete">
                    <input class="increment btn-xs" data-role="modificarcarro" data-modificar="1" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantitySuscription() ?>" id="cantidad-producto-unidad-suscripcion-<?php echo $position->getId() ?>" placeholder="0"/>
                </div>
                <button class="btn btn-default btn-xs"  data-role="modificarcarro" data-modificar="1" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="+"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
        <?php endif; ?>

        <?php if (!$lectura): ?>
            <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 1, 'data-position' => $position->getId(), 'class' => 'btn btn-primary btn-xs')); ?>
        <?php endif; ?>
    </td>
    <td class="text-right">
        <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPriceSuscription() > 0): ?>
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php else: ?>
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPriceSuscription(), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php endif; ?>

        <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
            <br>
            Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
        <?php endif; ?>
    </td>
    <td class="text-right">
        <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPriceSuscription() > 0): ?>
            <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPriceSuscription(), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php else: ?>
            NA
        <?php endif; ?>
    </td>
    <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPriceSuscription(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPriceUnitSuscription(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
</tr>

