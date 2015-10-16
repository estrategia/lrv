<div class="">
    <h2 class="text-center title-desp">¡Gracias por su compra!</h2>

    <div class="blockPago">
        <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
            <h3>Datos Compra</h3>
        <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
            Datos Pedido
        <?php endif; ?>
        <table  class="infoCompra">
            <tr>
                <td>Número compra</td>
                <td><?php echo $objCompra->idCompra ?></td>
            </tr>
            <tr>
                <td>Fecha/Hora compra</td>
                <td><?php echo $objCompra->fechaCompra ?></td>
            </tr>

            <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
                <tr class="rowRed">
                    <td>Fecha/Hora entrega</td>
                    <td><?php echo $objCompra->fechaEntrega ?></td>
                </tr>
            <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
                <tr class="rowRed">
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

    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
        <div class="blockPago">
            <h3>Datos de despacho</h3>
            <table class="infoCompra">
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
        <div class="blockPago recuerdaPresencial">
            <p class="justify">RECUERDA:</p>
            <p class="justify">debes pasar por tu pedido al punto de venta dentro de las siguientes 2 horas.</p>
        </div>
    <?php endif; ?>



    <div id="div-carro">
        <?php $this->renderPartial('_d_carro', array('lectura' => true)); ?>
    </div>


</div>