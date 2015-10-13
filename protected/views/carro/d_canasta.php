<div class="btn-group">
    <button type="button" class="btn btn-danger">Action</button>
    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <span class="caret"></span>
        <span class="sr-only">Carro de compras</span>
    </button>
    <ul class="dropdown-menu">
        <li>Hay <?php echo Yii::app()->shoppingCart->getCount(); ?> producto(s) en el carro</li>
        <?php if (!Yii::app()->shoppingCart->isEmpty()): ?>
            <?php if (Yii::app()->shoppingCart->getCount() > 1): ?>
                <li>
                    <?php echo CHtml::link('Editar carro', CController::createUrl('/carro'), array('class' => '')); ?>
                    <div class="subtotalCanasta">
                        <p class="center">Subtotal pedido <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                        <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('class' => '')); ?>

                        <?php if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['domicilio'] && Yii::app()->shoppingCart->getObjExpress() != null): ?>
                            <?php echo CHtml::link('Pago Express', CController::createUrl('/carro/pagoexpress'), array('class' => '')); ?>
                        <?php endif; ?>
                        <?php if (!Yii::app()->user->isGuest): ?>
                            <?php echo CHtml::link('Cotizar', "#", array('data-role' => 'crearcotizacion', 'class' => '')); ?>
                        <?php endif; ?>
                    </div>
                </li>
                <li role="separator" class="divider"></li>
            <?php endif; ?>

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



            <li role="separator" class="divider"></li>

            <li>
                <?php echo CHtml::link('Editar carro', CController::createUrl('/carro'), array('class' => '')); ?>
                <div class="subtotalCanasta">
                    <p class="center">Subtotal pedido <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
                    <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('class' => '')); ?>

                    <?php if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['domicilio'] && Yii::app()->shoppingCart->getObjExpress() != null): ?>
                        <?php echo CHtml::link('Pago Express', CController::createUrl('/carro/pagoexpress'), array('class' => '')); ?>
                    <?php endif; ?>
                    <?php if (!Yii::app()->user->isGuest): ?>
                        <?php echo CHtml::link('Cotizar', "#", array('data-role' => 'crearcotizacion', 'class' => '')); ?>
                    <?php endif; ?>
                </div>
            </li>

        <?php endif; ?>


    </ul>
</div>