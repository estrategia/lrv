<div class="ui-content">
    <h2>Carro de compras</h2>
    <?php if (Yii::app()->shoppingCart->isEmpty()): ?>
        <p>Carro vacío</p>
    <?php else: ?>
        <div>
            <p class="center">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <!--
            <p class="center">Servicio <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <p class="center">Flete adicional <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <p class="center">Impuestos incluidos <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="center">Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="center">Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            -->
            <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
            <?php echo CHtml::link('Guardar en la lista personal', '#', array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn_add_lst_pr')); ?>
        </div>

        <?php $listPositionBodega = array(); ?>
        <?php $listPositionDelivery = array(); ?>
        <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
            <?php foreach (Yii::app()->shoppingCart->getPositions() as $position): ?>
                <?php if ($position->getDelivery() == 0): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <?php
                            if ($position->isProduct()):
                                if ($position->getQuantityStored() > 0)
                                    $listPositionBodega[] = $position;
                                $this->renderPartial('/carro/_carroElementoProducto', array(
                                    'position' => $position,
                                ));
                            elseif ($position->isCombo()):
                                $this->renderPartial('/carro/_carroElementoCombo', array(
                                    'position' => $position,
                                ));
                            endif;
                            ?>
                        </div>
                    </li>
                <?php else: $listPositionDelivery[] = $position ?>

                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
        <?php if (!empty($listPositionBodega) || !empty($listPositionDelivery)): ?>
            <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
                <h3>Productos con otras condiciones de entrega</h3>
                <?php foreach ($listPositionBodega as $position): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <?php
                            if ($position->isProduct()):
                                if ($position->getQuantityStored() > 0)
                                    $listPositionBodega[] = $position;
                                $this->renderPartial('/carro/_carroElementoBodega', array(
                                    'position' => $position,
                                ));
                            else:
                                echo "NA";
                            endif;
                            ?>
                        </div>
                    </li>
                <?php endforeach; ?>
                <?php foreach ($listPositionDelivery as $position): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <?php
                            if ($position->isProduct()):
                                $this->renderPartial('/carro/_carroElementoProducto', array(
                                    'position' => $position,
                                ));
                            elseif ($position->isCombo()):
                                $this->renderPartial('/carro/_carroElementoCombo', array(
                                    'position' => $position,
                                ));
                            endif;
                            ?>
                        </div>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>


        <div class="subtotalCanasta">
            <p class="center">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <!--
            <p class="center">Servicio <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <p class="center">Flete adicional <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <p class="center">Impuestos incluidos <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="center">Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="center">Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            -->
            <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
            <?php echo CHtml::link('Guardar en la lista personal', '#', array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn_add_lst_pr')); ?>
        </div>

    <?php endif; ?>
</div>