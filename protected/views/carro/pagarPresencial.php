<div class="ui-content contentPagarPresnecial">
    <h1>Selecciona el Punto de Venta donde deseas pasar por tu pedido</h1>

    <?php $mensajes = Yii::app()->user->getFlashes(); ?>
    <?php if ($mensajes): ?>
        <ul class="messages">
            <?php foreach ($mensajes as $idx => $mensaje): ?>
                <li><div class="<?php echo $idx ?>-msg"><?php echo $mensaje ?></div></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <?php if ($listPuntosVenta[0] == 0): ?>
        <p class="center"><?php echo $listPuntosVenta[1] ?></p>
        <div class="space-2"></div>
        <div class="blockPago sinDir">
            <img class="c_ndx_img" alt="Domicilio" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_domicilio.png">
            <h3 class="center">Lo sentimos, no tenemos disponible el 100% de tu pedido en un sólo punto de venta.</h3>
            <p class="center">Te ofrecemos el total del pedido entrega a domicilio en 1 hora</p>
            <?php echo CHtml::link('Entrega a domicilio', $this->createUrl('/carro/pagar', array('paso' => 0, 'post' => 0, 'cambio' => true)), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n', 'data-ajax' => 'false')); ?>
        </div>
        <div class="space-2"></div>
    <?php else: ?>
        <?php foreach ($listPuntosVenta[1] as $idx => $pdv): ?>
            <div class="blockPago">
                <div>
                    <div>
                        <h2><?php echo $pdv[2] ?></h2>
                        <p><?php echo $pdv[3] ?></p>
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'id' => 'form-presencial-' . uniqid(),
                            'action' => Yii::app()->createUrl('/carro/pagar', array('paso' => 'pago')),
                            'htmlOptions' => array(
                                'class' => "", 'data-ajax' => "false"
                            ))
                        );
                        ?>

                        <input type="hidden" name="pdv" value="<?php echo $pdv[1] ?>">
                        <input type="hidden" name="pos" value="<?php echo $idx ?>">

                        <div class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r">
                            Pasar por mi pedido aquí
                            <input type="submit" data-enhanced="true" value="<?php echo $pdv[1] ?>">
                        </div>
                        <?php $this->endWidget(); ?>
                        <div class="porcen"><?php echo $pdv[5] ?>%</div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="blockListProducts">
                <table>
                    <?php foreach ($pdv[4] as $producto): ?>
                        <tr>
                            <td><?php echo $producto->CODIGO_PRODUCTO ?></td>
                            <td><?php echo $producto->DESCRIPCION ?></td>
                            <td><?php echo $producto->SALDO_UNIDAD ?></td>
                            <td><?php echo ($producto->CANTIDAD_FRACCION > 0 ? $producto->SALDO_FRACCION : "NA") ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>
            <div class="space-2"></div>
        <?php endforeach; ?>

        <?php if ($listPuntosVenta[3] == 0): ?>
            <div class="blockPago sinDir">
                <img class="c_ndx_img" alt="Domicilio" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_domicilio.png">
                <h3 class="center">Lo sentimos, no tenemos disponible el 100% de tu pedido en un sólo punto de venta.</h3>
                <p class="center">Te ofrecemos el total del pedido entrega a domicilio en 1 hora</p>
                <?php echo CHtml::link('Entrega a domicilio', $this->createUrl('/carro/pagar', array('paso' => 0, 'post' => 0, 'cambio' => true)), array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n', 'data-ajax' => 'false')); ?>
            </div>
            <div class="space-2"></div>
        <?php endif; ?>
    <?php endif; ?>
</div>