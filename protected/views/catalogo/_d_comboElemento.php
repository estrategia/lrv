
<div class="col-md-3 border-left">
    <div class="">
        <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $objCombo->idCombo)) ?>" data-ajax="false">
            <img src="<?php echo Yii::app()->request->baseUrl . $objCombo->rutaImagen(); ?>" class="ui-li-thumb">
        </a>
    </div>

    <!-- combo agregado -->
    <a href="" class="clst_slct_prod<?php echo (Yii::app()->shoppingCart->contains($objCombo->getCodigo()) ? " active" : "") ?>">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_seleccionado.png">
    </a>
    <!-- combo agregado -->

    <div class="">
        <strong>
            <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $objCombo->idCombo)) ?>" data-ajax="false"><?php echo strtoupper($objCombo->descripcionCombo) ?></a> COMBO
            <div class="clst_pre_act" style="padding-bottom:1em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        </strong>
    </div>

    <br/>
</div>