
<div data-role="page" id="page-pasoporel">
    <div data-role="header"> </div>
    <div role="main" class="ui-content contentPagarPresnecial">
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
                <p class="center">Te ofrecemos el total del pedido entrega a domicilio</p>
                <?php echo CHtml::link('Cancelar', "#", array('class' => 'ui-btn ui-btn-n ui-corner-all ui-shadow', 'data-rel' => 'back')); ?>
            </div>
            <div class="space-2"></div>
        <?php else: ?>
            <?php foreach ($listPuntosVenta[1] as $idx => $pdv): ?>
                <div class="blockPago">
                    <div>
                        <div>
                            <h2><?php echo $pdv[2] ?></h2>
                            <?php if ($pdv['HORA_INICIO'] != null && $pdv['HORA_FIN'] != null): ?>
                                <p><strong>Horario:</strong> <?php echo $pdv['HORA_INICIO']->format('h:i:s a') . " - " . $pdv['HORA_FIN']->format('h:i:s a') ?></p>
                            <?php endif; ?>
                            <p><strong>Direcci&oacute;n:</strong> <?php echo $pdv[3] ?></p>
                            <?php if (!empty($pdv[4])): ?>
                                <div class="space-1"></div>
                                <button data-role="pasoporel-seleccion-pdv" data-nombre="<?php echo $pdv[2] ?>" data-direccion="<?php echo $pdv[3] ?>" data-pdv="<?php echo $pdv[1] ?>" data-idx="<?php echo $idx ?>" type="button" class="ui-input-btn ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-r">Pasar por mi pedido aqu&iacute;</button>
                                <div class="porcen">Porcentaje del pedido: <?php echo $pdv[5] ?>%</div>
                            <?php endif; ?>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="blockListProducts">
                    <table width=100%>
                        <?php foreach ($pdv[4] as $producto): ?>
                            <tr>
                                <td><?php echo $producto->CODIGO_PRODUCTO ?></td>
                                <td><?php echo $producto->DESCRIPCION ?></td>
                                <td><?php echo $producto->CANTIDAD_UNIDAD . "/" . $producto->SALDO_UNIDAD ?></td>
                                <td><?php echo ($producto->COMPLETITUD_UNIDAD) ? "<img src='" . Yii::app()->request->baseUrl . "/images/iconos/checkmark.png'/>" : "<img src='" . Yii::app()->request->baseUrl . "/images/iconos/mistake.png'/>" ?></td>
                               <!-- <td><?php echo ($producto->CANTIDAD_FRACCION > 0 ? $producto->SALDO_FRACCION : "NA") ?></td> -->
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <div class="space-2"></div>
            <?php endforeach; ?>

            <?php /* if ($listPuntosVenta[3] == 0): */ ?>
            <div class="blockPago sinDir">
                <img class="c_ndx_img" alt="Domicilio" src="<?php echo Yii::app()->request->baseUrl; ?>/images/entrega/icon_domicilio.png">
                <?php if ($listPuntosVenta[3] == 0): ?>
                    <h3 class="center">Lo sentimos, no tenemos disponible el 100% de tu pedido en un sólo punto de venta.</h3>
                    <p class="center">Te ofrecemos el total del pedido entrega a domicilio</p>
                <?php else: ?>
                    <h3 class="center">Si deseas, te ofrecemos el servicio de entrega a domicilio</h3>
                <?php endif; ?>

                <?php echo CHtml::link('Cancelar', "#", array('class' => 'ui-btn ui-btn-n ui-corner-all ui-shadow', 'data-rel' => 'back')); ?>
            </div>
            <div class="space-2"></div>
            <?php /* endif; */ ?>
        <?php endif; ?>
    </div>
    <div data-role="footer"> </div>
</div>