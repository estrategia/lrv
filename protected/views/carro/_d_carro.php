<?php $listPositionBodega = array(); ?>
<?php $listPositionDelivery = array(); ?>
<!-- Vista Carro -->
<section>
    <div class="row">
        <div class="col-md-9 border-right">
            <?php if (!$lectura) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <div class="space-1"></div>
                            <?php echo CHtml::link('Vaciar carrito', '#', array('data-role' => 'carrovaciar', 'class' => 'btn btn-default', 'role' => "button")); ?>
                            <?php if (!isset($opcion) || !$opcion == 1): ?>
                                <?php echo CHtml::link('Guardar en la lista personal', '#', array('data-role' => 'lstpersonalguardar', 'data-tipo' => 3, 'data-codigo' => 0, 'class' => 'btn btn-default', 'role' => "button")); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="space-1"></div>
            <?php endif; ?>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-hover table-striped tabla-carro">
                        <thead class="cabecera-tabla">
                            <tr>
                                <th  style="width: 27%;">Producto</th>
                                <th  style="width: 25%;">Cantidad</th>
                                <th  style="width: 15%;">Antes</th>
                                <th>Ahorro</th>
                                <th>Ahora</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach (Yii::app()->shoppingCart->getPositions() as $position): ?>
                                <?php if ($position->getDelivery() == 0 && $position->getShipping() == 0): ?>
                                    <?php
                                    if ($position->isProduct()):
                                        if ($position->getQuantityStored() > 0)
                                            $listPositionBodega[] = $position;
                                        $this->renderPartial('/carro/_d_carroElementoProducto', array(
                                            'position' => $position,
                                            'lectura' => $lectura
                                        ));
                                    elseif ($position->isCombo()):
                                        $this->renderPartial('/carro/_d_carroElementoCombo', array(
                                            'position' => $position,
                                            'lectura' => $lectura
                                        ));
                                    endif;
                                    ?>
                                <?php else: $listPositionDelivery[] = $position ?>

                                <?php endif; ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <?php if (!empty($listPositionBodega) || !empty($listPositionDelivery)): ?>
                        <h3>Productos con otras condiciones de entrega</h3>
                        <table class="table table-bordered table-hover table-striped">
                            <thead class="cabecera-tabla">
                                <tr>
                                    <th style="width: 27%;">Producto</th>
                                    <th style="width: 25%;">Cantidad</th>
                                    <th style="width: 15%;">Antes</th>
                                    <th>Ahorro</th>
                                    <th>Ahora</th>
                                    <th>Subtotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($listPositionBodega as $position): ?>
                                    <?php
                                    $this->renderPartial('/carro/_d_carroElementoBodega', array(
                                        'position' => $position,
                                        'lectura' => $lectura
                                    ));
                                    ?>
                                <?php endforeach; ?>
                                <?php foreach ($listPositionDelivery as $position): ?>
                                    <?php
                                    if ($position->isProduct()):
                                        $this->renderPartial('/carro/_d_carroElementoProducto', array(
                                            'position' => $position,
                                            'lectura' => $lectura
                                        ));
                                    elseif ($position->isCombo()):
                                        $this->renderPartial('/carro/_d_carroElementoCombo', array(
                                            'position' => $position,
                                            'lectura' => $lectura
                                        ));
                                    endif;
                                    ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php endif; ?>
                </div>
            </div>
            <?php if (!$lectura) : ?>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <div class="space-1"></div>
                            <?php echo CHtml::link('Vaciar carrito', '#', array('data-role' => 'carrovaciar', 'class' => 'btn btn-default', 'role' => "button")); ?>
                            <?php if (!isset($opcion) || !$opcion == 1): ?>
                                <?php echo CHtml::link('Guardar en la lista personal', '#', array('data-role' => 'lstpersonalguardar', 'data-tipo' => 3, 'data-codigo' => 0, 'class' => 'btn btn-default', 'role' => "button")); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>

        <div class="col-md-3 detalles">
            <h3>Detalles de la compra</h3>
            <span>Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></span><br>
            <span>Servicio <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></span><br>
            <?php if (Yii::app()->shoppingCart->getExtraShipping() > 0): ?>
                <span>Flete adicional <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></span>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getBono() > 0): ?>
                <span>Bono <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getBono(), Yii::app()->params->formatoMoneda['moneda']); ?></span>
            <?php endif; ?>
            <h3>Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></h3>
            <?php if (Yii::app()->shoppingCart->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->shoppingCart->getTaxPrice() > 0): ?>
                <span>Impuestos incluidos <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></span><br/>
            <?php endif; ?>
            <?php if (Yii::app()->shoppingCart->getDiscountPrice(true) > 0): ?>
                <span style="color:#EA0001;">Su ahorro  <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></span>
            <?php endif; ?>

            <?php if (!$lectura) : ?>
                <div class="center">
                    <div class="space-1"></div>
                    <?php echo CHtml::link('Comprar', $this->createUrl('/carro/pagar'), array('class' => 'btn btn-primary', 'role' => "button")); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>
