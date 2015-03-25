<h2>Hay <?php echo Yii::app()->shoppingCart->getCount(); ?> producto(s) en el carro</h2>

<ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
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

<?php echo CHtml::link('Editar carro', CController::createUrl('/carro'), array('data-ajax'=>'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n')); ?>

<div>
    <p class="center">Subtotal pedido <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
    <?php echo CHtml::link('Pagar', CController::createUrl('/carro/pagar'), array('data-ajax'=>'false', 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r')); ?>
</div>