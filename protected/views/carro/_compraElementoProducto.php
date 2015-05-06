<div class="clst_cont_top">
    <?php $imagen = $position->objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>

    <?php if ($imagen == null): ?>
        <div class="clst_pro_img">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['mini']; ?>" class="ui-li-thumb">
        </div>
    <?php else: ?>
        <div class="clst_pro_img">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" class="ui-li-thumb">
        </div>
    <?php endif; ?>

    <div class="clst_cont_pr_prod">
        <h2><?php echo $position->objProducto->descripcionProducto ?></h2>
        <p><?php echo $position->objProducto->presentacionProducto ?></p>
        <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>

        <?php if ($position->objProducto->fraccionado == 1 && $position->getQuantity(true)>0): ?>
            <div>
                <input type="number" data-mini="true" value="<?php echo $position->getQuantity(true) ?>" readonly="readonly" class="cbtn_cant">
            </div>
        <?php endif; ?>
        <div>
            <input type="number" data-mini="true" value="<?php echo $position->getQuantity() - $position->getQuantityStored() ?>" readonly="readonly" class="cbtn_cant">
        </div>

        <p style="font-size:medium;">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(false, true), Yii::app()->params->formatoMoneda['moneda']); ?></p>
    </div>
</div>
