<tr>
    <td>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto, 'descripcion' => Producto::cadenaUrl($position->objProducto->descripcionProducto))) ?>">
            <img class="img-responsive img-table" src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen() ?>" title="<?php echo $position->objProducto->descripcionProducto ?>"> 
        </a>
        <div style="color:#ED1C24;"><?php echo $position->objProducto->descripcionProducto ?></div>
        <div><?php echo $position->objProducto->presentacionProducto ?></div>
        <div>Código: <?php echo $position->objProducto->codigoProducto ?></div>

        <?php if ($position->getShipping() > 0): ?>
            <div>Flete: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</div>
        <?php endif; ?>

        <div><span>Tiempo de entrega: <?php echo Yii::app()->shoppingCart->getDeliveryStored() ?> hora(s)</span></div>
    </td>
    <td>
        <?php if ($lectura): ?>
            <div style="text-align:center;vertical-align:top;">
                <?php echo $position->getQuantityStored() ?>
            </div>
        <?php else: ?>
            <div class="input-group" style="width: 75%;margin:0 auto; margin-top: 15px;">
                <span class="input-group-btn">
                    <button class="btn glyphicon glyphicon-minus" style="color:#EA0001;" data-role="modificarcarro" data-modificar="3" data-position="<?php echo $position->getId(); ?>" data-operation="-"></button>
                </span>
                <input data-role="modificarcarro" data-modificar="3" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantityStored() ?>" id="cantidad-producto-bodega-<?php echo $position->getId() ?>" placeholder="0" class="form-control" style="margin:2px 0px;box-shadow:none;border: 1px solid #F0F0F0;"/>
                <span class="input-group-btn">
                    <button class="btn glyphicon glyphicon-plus" style="color:#EA0001;" data-role="modificarcarro" data-modificar="3" data-position="<?php echo $position->getId(); ?>" data-operation="+"></button>
                </span>
            </div>
        <?php endif; ?>

        <?php if (!$lectura): ?>
            <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 3, 'data-position' => $position->getId(), 'class' => 'btn btn-default')); ?>
        <?php endif; ?>
    </td>
    <td>
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