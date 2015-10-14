<tr>
    <td>
        <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo, 'description' => Combo::cadenaUrl($position->objCombo->descripcionCombo))) ?>" >
            <img src="<?php echo Yii::app()->request->baseUrl . $position->objCombo->rutaImagen() ?>" title="<?php echo $position->objCombo->descripcionCombo ?>">
        </a>
        <div><?php echo $position->objCombo->descripcionCombo ?></div>
        <div>Código: <?php echo $position->objCombo->idCombo ?></div>

        <?php if ($position->getShipping() > 0): ?>
            <div>Flete: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</div>
        <?php endif; ?>

        <?php if ($position->getDelivery() > 0): ?>
            <div>Tiempo de entrega: <?php echo $position->getDelivery() ?> hora(s)</div>
        <?php endif; ?>
    </td>
    <td>
        <div class="form-inline">
            <input type="text" class="col-xs-3" value="<?php echo $position->getQuantity() ?>" id="cantidad-producto-<?php echo $position->getId() ?>" placeholder="0" >
            <button type="button" class="btn btn-default btn-sm" data-role="modificarcarro" data-modificar="2" data-position="<?php echo $position->getId(); ?>"><i class="glyphicon glyphicon-refresh"></i></button>
        </div>
    </td>
    <td>
        <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
            <br>
            Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> de impuestos [<?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>] IVA
        <?php endif; ?>
    </td>
    <td>NA</td>
    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
</tr>