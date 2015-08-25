<div class="clst_cont_top">
    <?php $imagen = $position->objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>

    <?php if ($imagen == null): ?>
        <div class="clst_pro_img">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto,'descripcion'=>  Producto::cadenaUrl($position->objProducto->descripcionProducto))) ?>" data-ajax="false">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['mini']; ?>" class="ui-li-thumb">
            </a>
        </div>
    <?php else: ?>
        <div class="clst_pro_img">
            <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto,'descripcion'=>  Producto::cadenaUrl($position->objProducto->descripcionProducto))) ?>" data-ajax="false">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" class="ui-li-thumb">
            </a>
        </div>
    <?php endif; ?>

    <div class="clst_cont_pr_prod">
        <h2><a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $position->objProducto->codigoProducto,'descripcion'=>  Producto::cadenaUrl($position->objProducto->descripcionProducto))) ?>" data-ajax="false"><?php echo $position->objProducto->descripcionProducto ?></a></h2>
        <p><?php echo $position->objProducto->presentacionProducto ?></p>
        <?php if ($position->objProducto->mostrarAhorroVirtual == 1 && $position->getDiscountPrice() > 0): ?>
            <div class="clst_pre_ant"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(false, false), Yii::app()->params->formatoMoneda['moneda']); ?></div>
            <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>  <span>[Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getDiscountPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
        <?php else: ?>
            <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        <?php endif; ?>

        <?php if ($position->getShipping() > 0): ?>
            <div class="clst_pre_act"><span>[Flete <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
        <?php endif; ?>

        <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
            <div class="clst_pre_act"><span>Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> de impuestos [<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
        <?php endif; ?>

        <?php if ($position->getDelivery() > 0): ?>
            <div class="clst_pre_act"><span>Tiempo de entrega: <?php echo $position->getDelivery() ?> hora(s)</span></div>
        <?php endif; ?>
    </div>
	<div class="clear"></div>
</div>

<table class="ui-responsive ctable_list_prod" cellspacing="0">
    <tbody>

        <?php if ($position->objProducto->fraccionado == 1): ?>
            <tr class="detalleFraccionado">
                <td colspan="3">
                    <?php echo $position->objProducto->presentacionProducto ?>
                </td>
            </tr>
        <?php endif; ?>

        <tr>
            <td class="ctd_01">
                <input type="number" id="cantidad-producto-unidad-<?php echo $position->getId(); ?>" placeholder="0" data-modificar="1" data-position="<?php echo $position->getId(); ?>" data-mini="true" value="<?php echo $position->getQuantity() - $position->getQuantityStored() ?>" class="cbtn_cant">
            </td>
            <td class="ctd_02">
                <p>Subtotal</p>
                <p id="subtotal-producto-<?php echo $position->getId(); ?>" style="font-size:medium;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPriceUnit(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            </td>
            <td class="ctd_03">
                <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 1, 'data-position'=>$position->getId(), 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a', 'data-mini' => 'true')); ?>
            </td>
        </tr>

        <?php if ($position->objProducto->fraccionado == 1): ?>
            <tr  class="detalleFraccionado">
                <td colspan="3">
                    <?php echo $position->objProducto->objMedidaFraccion->descripcionMedidaFraccion ?> X <?php echo $position->objProducto->unidadFraccionamiento ?>
                </td>
            </tr>
            <tr>
                <td class="ctd_01">
                    <input type="number" id="cantidad-producto-fraccion-<?php echo $position->getId(); ?>" placeholder="0" data-modificar="1" data-position="<?php echo $position->getId(); ?>" data-nfracciones="<?php echo $position->objProducto->numeroFracciones ?>" data-ufraccionamiento="<?php echo $position->objProducto->unidadFraccionamiento ?>" data-mini="true" value="<?php echo $position->getQuantity(true) ?>" class="cbtn_cant">
                </td>
                <td class="ctd_02">
                    <p>Subtotal</p>
                    <p id="subtotal-producto-<?php echo $position->getId(); ?>" style="font-size:medium;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPriceFraction(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                </td>
                <td class="ctd_03">
                    <?php echo CHtml::link('Eliminar', '#', array('data-eliminar'=> 2, 'data-position'=>$position->getId(), 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a', 'data-mini' => 'true')); ?>
                </td>
            </tr>
        <?php endif; ?>

    </tbody>
</table>