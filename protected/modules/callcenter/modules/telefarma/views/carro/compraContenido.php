
<h2 class="text-center title-desp">¡Gracias por su compra!</h2>
<div class='container'>
    <div class="blockPago">
        <!-- <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
             <h3>Datos Compra</h3>
        <?php elseif ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
                         Datos Pedido
        <?php endif; ?> -->

        <p style="text-align:right;font-size:14px" >
            <strong>
                <span style="font-size:12pt">Número compra: </span>
            </strong><span style="font-size:12pt;color:#c20000">
                <?php echo $objCompra->idCompra ?></span>
        </p>
        <p style="text-align:right;font-size:14px" >
            <strong>
                <span style="font-size:12pt">Fecha/Hora compra: </span>
            </strong><span style="font-size:12pt;color:#c20000">
                <?php echo $objCompra->fechaCompra ?></span>
        </p>
        <p style="text-align:right;font-size:14px" >
            <strong>
                <span style="font-size:12pt">
                    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
                        Fecha/Hora entrega
                    <?php else: ?>
                        Punto de venta entrega
                    <?php endif; ?>       
                </span>
            </strong>
            <span style="font-size:12pt;color:#c20000">
                <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
                    <?php echo $objCompra->fechaEntrega ?>
                <?php else: ?>
                    <?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][2] ?>
                    <br>
                    <?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][3] ?>
                <?php endif; ?> 
            </span>
        </p>

    </div> 

    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
        <table cellpadding="10" style="font-size:14px;border-collapse:collapse;border-spacing:0px;width:99.9%;border-bottom:1px solid #dddddd;margin-bottom:24px">
            <tbody>
                <tr>
                    <td width="50%" style="border-bottom:1px solid #dddddd;padding:0" colspan="2">
                        <h4 style="color:#666666"> Datos de despacho</h4>
                    </td>
                </tr>
                <tr>
                    <td valign="top" width="50%" style="border-left:1px solid #dddddd;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;color:#444444;background:#f9f9f9">
                        <p><b>Nombre destinatario: </b><?php echo $objCompraDireccion->nombre ?></p>
                        <p><b>Ciudad: </b><?php echo $modelPago->objSectorCiudad->objCiudad->nombreCiudad ?></p>
                        <p><b>Direcci&oacute;n: </b><?php echo $objCompraDireccion->direccion ?></p>
                    </td>
                    <td width="50%" valign="top" style="border-right:1px solid #dddddd;color:#555555;background:#f9f9f9">
                        <p><b>Barrio: </b><?php echo $objCompraDireccion->barrio ?></p>
                        <p><b>Tel&eacute;fono: </b><?php echo $objCompraDireccion->telefono ?></p>
                        <p><b>Forma de pago: </b><?php echo $objCompra->objFormaPagoCompra->objFormaPago->formaPago ?></p>
                    </td>
                </tr>
            </tbody>
        </table>    

    <?php endif; ?>
    <div class="space-2"></div>

    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
        <div class="blockPago recuerdaPresencial">
            <p class="justify">RECUERDA:</p>
            <p class="justify">debes pasar por tu pedido al punto de venta.</p>
        </div>
    <?php endif; ?>

    <div id="div-carro">
        <?php $this->renderPartial('_carro', array('lectura' => true, 'objCompra' => $objCompra)); ?>
    </div>
</div>
