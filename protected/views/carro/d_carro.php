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

    <?php if (Yii::app()->shoppingCart->isEmpty()): ?>
        <?php $this->renderPartial('carroVacio'); ?>
    <?php else: ?>
        <div>
            <p class="center">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('class' => '')); ?>
            <?php echo CHtml::link('Vaciar carrito', '#', array('data-role' => 'carrovaciar', 'class' => '')); ?>
            <?php echo CHtml::link('Guardar en la lista personal', '#', array('data-role' => 'lstpersonalguardar', 'data-tipo' => 3, 'data-codigo' => 0, 'class' => ' ')); ?>
        </div>

        <?php $listPositionBodega = array(); ?>
        <?php $listPositionDelivery = array(); ?>

        <table class="table table-bordered table-hover table-striped">
            <tbody>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Antes</th>
                    <th>Ahorro</th>
                    <th>Ahora</th>
                    <th>Subtotal</th>
                </tr>
                <?php foreach (Yii::app()->shoppingCart->getPositions() as $position): ?>
                    <?php if ($position->getDelivery() == 0 && $position->getShipping() == 0): ?>
                        <?php
                        if ($position->isProduct()):
                            if ($position->getQuantityStored() > 0)
                                $listPositionBodega[] = $position;
                            $this->renderPartial('/carro/_d_carroElementoProducto', array(
                                'position' => $position,
                            ));
                        elseif ($position->isCombo()):
                            $this->renderPartial('/carro/_d_carroElementoCombo', array(
                                'position' => $position,
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
                <tbody>
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th>Antes</th>
                        <th>Ahorro</th>
                        <th>Ahora</th>
                        <th>Subtotal</th>
                    </tr>
                    <?php foreach ($listPositionBodega as $position): ?>
                        <?php
                            $this->renderPartial('/carro/_d_carroElementoBodega', array(
                                'position' => $position,
                            ));
                        ?>
                    <?php endforeach; ?>
                    <?php foreach ($listPositionDelivery as $position): ?>
                        <?php
                        if ($position->isProduct()):
                            $this->renderPartial('/carro/_d_carroElementoProducto', array(
                                'position' => $position,
                            ));
                        elseif ($position->isCombo()):
                            $this->renderPartial('/carro/_d_carroElementoCombo', array(
                                'position' => $position,
                            ));
                        endif;
                        ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>

        <div class="subtotalCanasta">
            <p class="center">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('class' => '')); ?>
            <?php echo CHtml::link('Vaciar carrito', '#', array('data-role' => 'carrovaciar', 'class' => '')); ?>
            <?php echo CHtml::link('Guardar en la lista personal', '#', array('data-role' => 'lstpersonalguardar', 'data-tipo' => 3, 'data-codigo' => 0, 'class' => ' ')); ?>
        </div>

    <?php endif; ?>
</div>