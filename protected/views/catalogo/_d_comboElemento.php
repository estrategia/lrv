<div class="">
    <div class="">
        <p>Combo <span></span></p>
    </div>
</div>

<div class="">
    <div class="">
        <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $objCombo->idCombo)) ?>" data-ajax="false">
            <img src="<?php echo Yii::app()->request->baseUrl . $objCombo->rutaImagen(); ?>" class="ui-li-thumb">
        </a>
    </div>
    <?php if (Yii::app()->shoppingCart->contains($objCombo->getCodigo())): ?>
        <a href="" class="">
            <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_seleccionado.png">
        </a>
    <?php endif; ?>

    <div class="">
        <strong>
            <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $objCombo->idCombo)) ?>" data-ajax="false"><?php echo strtoupper($objCombo->descripcionCombo) ?></a> COMBO
            <div class="clst_pre_act" style="padding-bottom:1em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        </strong>
    </div>
</div>
<br/>
<!--
<table class="ui-responsive ctable_list_prod">
    <tbody>
        <tr>
            <td class="ctd_01">
                <input type="number" placeholder="0" id="cantidad-combo-<?php echo $objCombo->idCombo ?>" class="cbtn_cant" onchange="subtotalCombo(<?php echo $objCombo->idCombo ?>);" data-mini="true" value="1">
            </td>
            <td class="ctd_02">
                <p>Subtotal</p>
                <p id="subtotal-combo-<?php echo $objCombo->idCombo ?>" style="font-size:medium;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            </td>
            <td class="ctd_03">
<?php echo CHtml::link('Añadir al carro', '#', array('data-combo' => $objCombo->idCombo, 'data-cargar' => 2, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r', 'data-mini' => 'true')); ?>
            </td>
        </tr>
    </tbody>
</table>
-->