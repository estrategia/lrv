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
        <?php if ($position->hasDelivery()): ?>
            <div class="clst_pre_act"><span>Entrega: Entre <?php echo $position->getDelivery('start', 'number') ?> y <?php echo $position->getDelivery('end', 'number ') ?> d&iacute;as</span></div>
        <?php endif; ?>

        <div class="clst_pre_cantidad">Cantidad: <span><?php echo $position->getQuantityStored() ?></span></div>

        <p style="font-size:medium;">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPriceStored(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
    </div>
</div>
