<div class="clst_cont_top">
    <?php $imagen = $position->objCombo->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>

    <?php if ($imagen == null): ?>
        <div class="clst_pro_img">
            <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo)) ?>" data-ajax="false">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['mini']; ?>" class="ui-li-thumb">
            </a>
        </div>
    <?php else: ?>
        <div class="clst_pro_img">
            <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo)) ?>" data-ajax="false">
                <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" class="ui-li-thumb">
            </a>
        </div>
    <?php endif; ?>

    <div class="clst_cont_pr_prod">
        <h2><a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo)) ?>" data-ajax="false"><?php echo $position->objCombo->descripcionCombo ?></a></h2>
        <div class="clst_pre_act"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        <div class="clst_pre_act"><span>[Flete <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
        <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
            <div class="clst_pre_act"><span>Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> de impuestos [<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>]</span></div>
        <?php endif; ?>
    </div>
</div>

<table class="ui-responsive ctable_list_prod">
    <tbody>
        <tr>
            <td class="ctd_01">
                <input type="number" placeholder="0" id="cantidad-producto-<?php echo $position->getId() ?>" data-modificar="2" data-position="<?php echo $position->getId(); ?>" data-mini="true" value="<?php echo $position->getQuantity() ?>" class="cbtn_cant" >
            </td>
            <td class="ctd_02">
                <p>Subtotal</p>
                <p id="subtotal-producto-<?php echo $position->getId(); ?>" style="font-size:medium;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            </td>
            <td class="ctd_03">
                <?php echo CHtml::link('Guardar en lista personal', '#', array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-n', 'data-mini' => 'true')); ?>
                <?php echo CHtml::link('Eliminar', '#', array('onclick' => "eliminarProductoCarro('" . $position->getId() . "');", 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-a', 'data-mini' => 'true')); ?>
            </td>
        </tr>
    </tbody>
</table>