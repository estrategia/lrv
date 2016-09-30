<div class="btn-group minicar">
    <a href="#" data-toggle="dropdown" data-placeholder="false" class="dropdown-toggle">
        <span><img class="ico-carrito" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-carrito.png" alt=""></span>
        <span id="cantidad-productos" class="cantidad-productos"><?php echo Yii::app()->shoppingCartVitalCall->getCount(); ?></span>
        <p style="color: #A3A3A3;">Productos</p>
    </a>

    <ul class="dropdown-menu noclose pull-right">
        <li class="top">Hay <?php echo Yii::app()->shoppingCartVitalCall->getCount(); ?> producto(s) en el carro</li>
        <?php if (!Yii::app()->shoppingCartVitalCall->isEmpty()): ?>
            <div class="scroll">
                <?php foreach (Yii::app()->shoppingCartVitalCall->getPositions() as $position): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <?php
                            $this->renderPartial('vitalcall.views.carro._canastaElemento', array(
                                'position' => $position,
                            ));
                            ?>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                <?php endforeach; ?>
            </div>
            <li class="vermasc">
                <?php echo CHtml::link(' ', '#', array('class' => '')); ?>
            </li>
            <li class="subtotal">Subtotal: <strong><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCartVitalCall->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></strong></li>
            <li>
                <div class="row btn-pagar">
                    <?php echo CHtml::link('Comprar', CController::createUrl('/callcenter/vitalcall/carro'), array('class' => 'btn btn-primary')); ?>
                </div>
            </li>
        <?php else: ?>
            <li>
                <div class="row">
                    <div class="col-sm-12 carro-descripcion sin-productos">
                        No hay productos en el carrito
                    </div>
                </div>
            </li>
        <?php endif; ?>
    </ul>
</div>