<div class="btn-group minicar">
    <a href="#" data-toggle="dropdown" data-placeholder="false" class="dropdown-toggle">
        <span><img class="ico-carrito" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-carrito.png" alt=""></span>
        <span id="cantidad-productos" class="cantidad-productos"><?php echo Yii::app()->shoppingCart->getCount(); ?></span>
        <p style="color: #A3A3A3;">Productos</p>
    </a>

    <ul class="dropdown-menu noclose pull-right">
        <li class="top">Hay <?php echo Yii::app()->shoppingCart->getCount(); ?> producto(s) en el carro</li>
        <?php if (!Yii::app()->shoppingCart->isEmpty()): ?>
            <div class="scroll">
                <?php foreach (Yii::app()->shoppingCart->getPositions() as $position): ?>
                    <li class="c_list_prod">
                        <div class="ui-field-contain clst_prod_cont">
                            <?php
                            $this->renderPartial('/carro/_d_canastaElemento', array(
                                'position' => $position,
                            ));
                            ?>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                <?php endforeach; ?>
            </div>
            <li class="vermasc">
                <?php echo CHtml::link('Editar carro', CController::createUrl('/carro'), array('class' => '')); ?>
            </li>
            <li class="subtotal">Subtotal: <strong><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></strong></li>
            <li>
                <div class="row btn-pagar">
                    <div class="col-sm-12">
                        <div class="row">
                            <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('class' => 'btn btn-danger')); ?>
                        </div>
                        <?php if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['domicilio'] && Yii::app()->shoppingCart->getObjExpress() != null): ?>
                            <div class="row">
                                <?php echo CHtml::link('Pago Express', CController::createUrl('/carro/pagoexpress'), array('class' => 'btn btn-danger')); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!Yii::app()->user->isGuest): ?>
                            <div class="row">
                                <?php echo CHtml::link('Cotizar', "#", array('data-role' => 'crearcotizacion', 'class' => 'btn btn-danger')); ?>
                            </div>
                        <?php endif; ?>
                    </div>
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
