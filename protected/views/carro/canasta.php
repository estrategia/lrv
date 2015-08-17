<div class="ui-panel-inner">
    <h2>Hay <?php echo Yii::app()->shoppingCart->getCount(); ?> producto(s) en el carro</h2>
    <?php if (!Yii::app()->shoppingCart->isEmpty()): ?>
        <?php if (Yii::app()->shoppingCart->getCount() > 1): ?>
            <?php echo CHtml::link('Editar carro', CController::createUrl('/carro'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n')); ?>
            <div class="subtotalCanasta">
                <p class="center">Subtotal pedido <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>

                <?php if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['domicilio'] && Yii::app()->shoppingCart->getObjExpress() != null): ?>
                    <?php echo CHtml::link('Pago Express', CController::createUrl('/carro/pagoexpress'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont canastaList">
            <?php foreach (Yii::app()->shoppingCart->getPositions() as $position): ?>
                <li class="c_list_prod">
                    <div class="ui-field-contain clst_prod_cont">
                        <?php
                        $this->renderPartial('/carro/_canastaElemento', array(
                            'position' => $position,
                        ));
                        ?>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>

        <?php echo CHtml::link('Editar carro', CController::createUrl('/carro'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n')); ?>

        <div class="subtotalCanasta">
            <p class="center">Subtotal pedido <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
            <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>

            <?php if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['domicilio'] && Yii::app()->shoppingCart->getObjExpress() != null): ?>
                <?php echo CHtml::link('Pago Express', CController::createUrl('/carro/pagoexpress'), array('data-ajax' => 'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
            <?php endif; ?>

        </div>
    <?php endif; ?>
</div>