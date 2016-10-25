<tr>
    <td>
        <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $position->objCombo->idCombo, 'descripcion' => $position->objCombo->getCadenaUrl())) ?>" >
            <img class="img-responsive img-table" src="<?php echo Yii::app()->request->baseUrl . $position->objCombo->rutaImagen() ?>" title="<?php echo $position->objCombo->descripcionCombo ?>">
        </a>
        <div style="color:#ED1C24;"><?php echo $position->objCombo->descripcionCombo ?></div>
        <div>Código: <?php echo $position->objCombo->idCombo ?></div>

        <?php if ($position->getShipping() > 0): ?>
            <div>Flete: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?>]</div>
        <?php endif; ?>

        <?php if ($position->getDelivery() > 0): ?>
            <div>Tiempo de entrega: <?php echo $position->getDelivery() ?> hora(s)</div>
        <?php endif; ?>
    </td>
    <td class="btn-pagar" align="center">
              <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 1, 'data-position' => $position->getId(), 'class' => 'btn btn-primary btn-xs')); ?>
    </td>
    <td class="text-right">
        <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php if (Yii::app()->shoppingCartNationalSale->getObjCiudadOrigen()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
            <br>
            Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
        <?php endif; ?>
    </td>
    <td class="text-right">NA</td>
    <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
</tr>
