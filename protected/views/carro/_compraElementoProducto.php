<div class="clst_cont_top">
    <div class="clst_pro_img">
        <img src="<?php echo Yii::app()->request->baseUrl . $position->objProducto->rutaImagen(); ?>" class="ui-li-thumb">
    </div>

    <div class="clst_cont_pr_prod">
        <h2><?php echo $position->objProducto->descripcionProducto ?></h2>
        <p><?php echo $position->objProducto->presentacionProducto ?></p>
        <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        <?php if ($position->getShipping() > 0): ?>
            <div class="clst_pre_act"><span>[Flete <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
        <?php endif; ?>
        <?php if ($position->getDelivery() > 0): ?>
            <div class="clst_pre_act"><span>Tiempo de entrega: <?php echo $position->getDelivery() ?> hora(s)</span></div>
        <?php endif; ?>

        <div class="clst_pre_cantidad">Cantidad: <span><?php echo $position->getQuantity() - $position->getQuantityStored() ?></span></div>
        <?php if ($position->getQuantity(true) > 0): ?>
            <div class="clst_pre_cantidad">U.M.V: <?php echo $position->getQuantity(true) ?></div>
        <?php endif; ?>

        <p style="font-size:medium;">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></p>
    </div>
</div>
