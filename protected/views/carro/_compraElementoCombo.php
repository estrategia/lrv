<div class="clst_cont_top">
    <div class="clst_pro_img">
        <img src="<?php echo Yii::app()->request->baseUrl . $position->objCombo->rutaImagen(); ?>" class="ui-li-thumb">
    </div>
    
    <div class="clst_cont_pr_prod">
        <h2><?php echo $position->objCombo->descripcionCombo ?></h2>
        <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>

        <div class="clst_pre_cantidad">Cantidad: <span><?php echo $position->getQuantity() ?></span></div>

        <p style="font-size:medium;">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
    </div>
</div>