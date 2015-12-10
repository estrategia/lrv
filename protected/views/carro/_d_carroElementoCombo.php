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
    <td>
        <?php if ($lectura): ?>
            <div style="text-align:center;vertical-align:top;">
                <?php echo $position->getQuantity() ?>
            </div>
        <?php else: ?>
            <div class="group-botones-cantidad">
                <button class="btn-addless-cantidad" data-role="modificarcarro" data-modificar="2" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="-"><span class="glyphicon glyphicon-minus"></span></button>
                <div class="ressete">
                    <input class="increment" data-role="modificarcarro" data-modificar="2" data-position="<?php echo $position->getId(); ?>" type="text" value="<?php echo $position->getQuantity() ?>" id="cantidad-producto-<?php echo $position->getId() ?>" placeholder="0"/>
                </div>
                <button class="btn-addless-cantidad" data-role="modificarcarro" data-modificar="2" data-fraction="0" data-position="<?php echo $position->getId(); ?>" data-operation="+"><span class="glyphicon glyphicon-plus"></span></button>
            </div>
        <?php endif; ?>

        <?php if (!$lectura): ?>
            <?php echo CHtml::link('Eliminar', '#', array('data-eliminar' => 1, 'data-position' => $position->getId(), 'class' => 'btn btn-default')); ?>
        <?php endif; ?>
    </td>
    <td class="text-right">
        <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?>
        <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && $position->getTax() > 0): ?>
            <br>
            Incluye <?php echo Yii::app()->numberFormatter->formatPercentage($position->getTax()) ?> IVA
        <?php endif; ?>
    </td>
    <td class="text-right">NA</td>
    <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
    <td class="text-right"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $position->getSumPrice(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
</tr>