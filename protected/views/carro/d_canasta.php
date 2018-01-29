<div class="btn-group minicar">
    <a href="#" data-toggle="dropdown" data-placeholder="false" class="dropdown-toggle">
        <img class="ico-carrito" src="<?php echo Yii::app()->request->baseUrl; ?>/images/desktop/ico-carrito.png">
        <span style="margin-left: 10px;">Productos</span>
        <span id="cantidad-productos" class="cantidad-productos"><?php echo Yii::app()->shoppingCart->getCount(); ?></span>
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
            <!-- <li class="vermasc">
                <?php //echo CHtml::link(' ', '#', array('class' => '')); ?>
                <?php //echo CHtml::link('Editar carro', CController::createUrl('/carro'), array('class' => '')); ?>
            </li> -->
            <li class="subtotal">Subtotal: <strong><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></strong></li>
            <li>
                <div class="row btn-pagar">
                    <?php echo CHtml::link('Comprar', CController::createUrl('/carro'), array('class' => 'btn btn-primary')); ?>

                    <?php if (Yii::app()->shoppingCart->getObjExpress() != null): ?>
                        <?php echo CHtml::link('Pago Express', "#", array('class' => 'btn btn-primary', 'data-toggle' => "modal", 'data-target' => "#modal-pagoexpress")); ?>
                    <?php endif; ?>

                    <?php if (!Yii::app()->user->isGuest): ?>
                        <?php //echo CHtml::link('Cotizar', "#", array('data-role' => 'crearcotizacion', 'class' => 'btn btn-primary')); ?>
                    <?php endif; ?>
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

<!-- modal pago express -->
<div class="modal fade" id="modal-pagoexpress" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title text-center" id="myModalLabel">Pago Express</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-12">
                        El pago express solo está disponible para los pedidos con tipo de entrega a Domicilio, si desea usar el pago express con tipo de entrega a Domicilio de clic en Aceptar
                    </div>
                </div>
            </div>
            <div class="modal-footer center">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="<?php echo CController::createUrl('/carro/pagoexpress') ?>" class="btn btn-primary">Aceptar</a>
            </div>
        </div>
    </div>
</div>
