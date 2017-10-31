<div class="ui-content">
    <h2>Carro de compras</h2>

    <?php $mensajes = Yii::app()->user->getFlashes(); ?>
    <?php if ($mensajes): ?>
        <ul class="messages">
            <?php foreach ($mensajes as $idx => $mensaje): ?>
                <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if (Yii::app()->getModule('vendedor')->shoppingCartSalesman->isEmpty()): ?>
        <?php $this->renderPartial('carroVacio'); ?>
    <?php else: ?>
        <div class="subtotalCanasta">
            <p class="center">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <!--
            <p class="center">Servicio <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <p class="center">Flete adicional <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <p class="center">Impuestos incluidos <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="center">Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="center">Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            -->
            <?php echo CHtml::link('Pagar', CController::createUrl('carro/pagar'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
            <?php echo CHtml::link('Vaciar carrito', '#', array('data-role' => 'carrovaciar', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r btn-y')); ?>
            <?php if (!isset($opcion) || $opcion != 1): ?>
                <?php // echo CHtml::link('Guardar en la lista personal', '#', array('data-role' => 'lstpersonalguardar', 'data-tipo' => 3, 'data-codigo' => 0, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn_add_lst_pr')); ?>
            <?php endif;?>
        </div>

        <?php $listPositionBodega = array(); ?>
        <?php $listPositionDelivery = array(); ?>
        <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
            <?php foreach (Yii::app()->getModule('vendedor')->shoppingCartSalesman->getPositions() as $position): ?>
                <?php if ($position->getDelivery() == 0): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <?php
                            if ($position->isProduct()):
                                if ($position->getQuantityStored() > 0)
                                    $listPositionBodega[] = $position;
                                    if($position->getQuantityUnit()> 0 || $position->getQuantity(true)>0):
			                                $this->renderPartial('/carro/_carroElementoProducto', array(
			                                    'position' => $position,
			                                ));
                                    endif;
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
            <p class="center">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <!--
            <p class="center">Servicio <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <p class="center">Flete adicional <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <p class="center">Impuestos incluidos <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="center">Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getTotalCostClient(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            <p class="center">Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></p>
            -->
            <?php echo CHtml::link('Pagar', CController::createUrl('carro/pagar'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
            <?php echo CHtml::link('Vaciar carrito', '#', array('data-role' => 'carrovaciar', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn-y')); ?>
            <?php if (!isset($opcion) || !$opcion == 1): ?>
                <?php // echo CHtml::link('Guardar en la lista personal', '#', array('data-role' => 'lstpersonalguardar', 'data-tipo' => 3, 'data-codigo' => 0, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn_add_lst_pr')); ?>
            <?php endif;?>
        </div>
        <?php if (isset($opcion) && $opcion == 1): ?>
            <?php if (isset(Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']]) && count(Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']]) > 0): ?> 
                <div class="productosRelacionados ui-content">
                    <h3>Estos productos no se agregaron porque se encuentran agotados</h3>
                    <div id="slide-relacionados" class="owl-carousel owl-theme">
                        <?php foreach (Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']] as $position): ?>
                            <div class="item"><?php
                                $this->renderPartial('_productoAgotado', array(
                                    'objProducto' => $position,
                                    'objPrecio' => new PrecioProducto($position, Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']], Yii::app()->getModule('vendedor')->shoppingCartSalesman->getCodigoPerfil()),
                                ));
                                ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endif; ?>
</div>