<h2>¡Gracias por su compra!</h2>

<div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
        Datos Compra
    <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
        Datos Pedido
    <?php endif; ?>
    <table>
        <tr>
            <td>Número compra</td>
            <td><?php echo $objCompra->idCompra ?></td>
        </tr>
        <tr>
            <td>Fecha/Hora compra</td>
            <td><?php echo $objCompra->fechaCompra ?></td>
        </tr>

        <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
            <tr>
                <td>Fecha/Hora entrega</td>
                <td><?php echo $objCompra->fechaEntrega ?></td>
            </tr>
        <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
            <tr>
                <td>Punto de venta entrega</td>
                <td>
                    <?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][2] ?>
                    <br>
                    <?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][3] ?>
                </td>
            </tr>
        <?php endif; ?>

    </table> 
</div>
<div class="space-2"></div>

<?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
    <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
        <table>
            <tr>
                <td>Nombre destinatario</td>
                <td><?php echo $objCompraDireccion->nombre ?></td>
            </tr>
            <tr>
                <td>Ciudad</td>
                <td><?php echo $this->sectorName ?></td>
            </tr>
            <tr>
                <td>Dirección</td>
                <td><?php echo $objCompraDireccion->direccion ?></td>
            </tr>
            <tr>
                <td>Barrio</td>
                <td><?php echo $objCompraDireccion->barrio ?></td>
            </tr>
            <tr>
                <td>Teléfono</td>
                <td><?php echo $objCompraDireccion->telefono ?></td>
            </tr>
        </table>
    </div>
<?php endif; ?>
<div class="space-2"></div>

<?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
    <div class="ui-field-container ui-bar ui-bar-a ui-corner-all">
        <p class="justify">RECUERDA:</p>
        <p class="justify">debes pasar por tu pedido al punto de venta</p>
        <p class="justify">dentro de las siguientes 2 horas</p>
    </div>
<?php endif; ?>

<h2>Productos del pedido</h2>

<?php $listPositionExtra = array(); ?>
<ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
    <?php foreach (Yii::app()->shoppingCart->getPositions() as $position): ?>
        <li class="c_list_prod">
            <div class="ui-field-contain clst_prod_cont">
                <?php
                if ($position->isProduct()):
                    if ($position->getQuantityStored() > 0)
                        $listPositionExtra[] = $position;
                    $this->renderPartial('_compraElementoProducto', array(
                        'position' => $position,
                    ));
                elseif ($position->isCombo()):
                    $this->renderPartial('_compraElementoCombo', array(
                        'position' => $position,
                    ));
                endif;
                ?>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<?php if (!empty($listPositionExtra)): ?>
    <ul data-role="listview" data-inset="true" data-icon="false" class="c_list_prod_cont">
        <h3>Productos con otras condiciones de entrega</h3>
        <?php foreach ($listPositionExtra as $position): ?>
            <li class="c_list_prod">
                <div class="ui-field-contain clst_prod_cont">
                    <?php
                    if ($position->isProduct()):
                        if ($position->getQuantityStored() > 0)
                            $listPositionExtra[] = $position;
                        $this->renderPartial('/carro/_compraElementoBodega', array(
                            'position' => $position,
                        ));
                    else:
                        echo "NA";
                    endif;
                    ?>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>

<div>
    <p class="center">Subtotal <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
    <p class="center">Servicio <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
    <p class="center">Flete adicional <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></p>
    <p class="center">Impuestos incluidos <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
    <p class="center">Ahorro <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></p>
    <p class="center">Total a pagar <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->shoppingCart->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></p>
</div>


<?php Yii::app()->shoppingCart->clear();?>