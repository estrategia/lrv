<div>
    <div align="center"></div>
    <p style="text-align:right;font-size:14px">
        <b>Numero de compra: </b>
        <span style="color:#ff0000"><?php echo $objCompra->idCompra ?></span>
    </p>
    <p style="text-align:right;font-size:14px">
        <b>
            Fecha de
            <span class="il">la</span>
            compra:
        </b>
        <?php echo $objCompra->fechaCompra ?>
    </p>
    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
        <p style="text-align:right;font-size:14px">
            <b>Hora de entrega: </b>
            <span style="color:#ff0000"><?php echo $objCompra->fechaEntrega ?></span>
        </p>
    <?php endif; ?>
        <h1 style="text-align:left;color:#666666;font-family:Arial;font-size:22px">¡Hola! </h1> 
        <h1 style="text-align:left;color:#666666;font-family:Arial;font-size:25px"><?php echo utf8_decode($nombreUsuario)?></h1><br/>
    <h1 style="text-align:left;color:#ff0000;font-family:Arial;font-size:20px">Gracias por su compra</h1>
    <br/>
    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
        <table cellpadding="10" style="font-size:14px;border-collapse:collapse;border-spacing:0px;width:99.9%;border-bottom:1px solid #dddddd;margin-bottom:24px">
            <tbody>
                <tr>
                    <td width="50%" style="border-bottom:1px solid #dddddd;padding:0" colspan="2">
                        <h4 style="color:#666666"> Datos de despacho</h4>
                    </td>
                </tr>
              <!--  <tr>
                    <td height="3" style="background-color:#a40014;font-size:3px;line-height:3px;padding:0;height:3px;width:100%" colspan="2">
                        <p style="margin:0"> </p>
                    </td>
                </tr> -->
                <tr>
                    <td valign="top" style="border-left:1px solid #dddddd;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;color:#444444;background:#f9f9f9">
                        <p>
                            <b>Nombre destinatario:</b>
                            <?php echo $objCompraDireccion->nombre ?>
                        </p>
                        <p>
                            <b>Ciudad:</b>
                            <?php echo $this->sectorName ?>
                        </p>
                        <p>
                            <b>Dirección:</b>
                            <?php echo $objCompraDireccion->direccion ?>
                        </p>
                    </td>
                    <td width="50%" valign="top" style="border-right:1px solid #dddddd;color:#555555;background:#f9f9f9">
                        <p>
                            <b>Barrio:</b>
                            <?php echo $objCompraDireccion->barrio ?>
                        </p>
                        <p>
                            <b>Teléfono:</b>
                            <?php echo $objCompraDireccion->telefono ?>
                        </p>
                        <p>
                            <b>Forma de pago:</b>
                            <?php echo $objFormaPago->formaPago ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']): ?>
        <table cellpadding="10" style="font-size:14px;border-collapse:collapse;border-spacing:0px;width:99.9%;border-bottom:1px solid #dddddd;margin-bottom:24px">
            <tbody>
                <tr>
                    <td width="50%" style="border-bottom:1px solid #dddddd;padding:0" colspan="2">
                        <h4 style="color:#444444"> Datos de pedido</h4>
                    </td>
                </tr>
              <!--  <tr>
                    <td height="3" style="background-color:#a40014;font-size:3px;line-height:3px;padding:0;height:3px;width:100%" colspan="2">
                        <p style="margin:0"> </p>
                    </td>
                </tr> -->
                <tr>
                    <td valign="top" style="border-left:1px solid #dddddd;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;color:#444444">
                        <p>
                            <b>Punto de venta entrega:</b>
                            <?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][2] ?>
                        </p>
                        <p>
                            <b>Punto de venta dirección:</b>
                            <?php echo $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta][3] ?>
                        </p>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    <?php if ($objCompra->observacion != null && !empty($objCompra->observacion)): ?>
        <h4 style="color:#666666"> Comentario cliente</h4>
        <table cellpadding="10" style="width:100%;border-collapse:separate; border-color:#dddddd #dddddd #dddddd -moz-use-text-color;border-radius:4px 4px 4px 4px;border-style:solid solid solid none;border-width:1px 1px 1px 0;margin-bottom:20px;border-spacing:0">
            <tbody>
                <tr>
                    <td style="border-left:1px solid #dddddd;line-height:20px;padding:8px;/* border-top:4px solid #a40014!important;*/text-align:left;background:#f9f9f9;color:#666666">
                        <?php echo $objCompra->observacion; ?>
                    </td>
                </tr>
            </tbody>
        </table>
    <?php endif; ?>

    <h4 style="color:#666666">
        Productos del
        <span class="il">pedido</span>
    </h4>
    <table style="width:100%;border-radius:4px 4px 4px 4px;margin-bottom:20px;border-spacing:0;font-size:14px;border:1px #dddddd solid;color:#666666">
        <tbody>
         <!--   <tr>
                <td height="3" style="background-color:#a40014;font-size:3px;line-height:3px;padding:0;height:3px;width:100%" colspan="6">
                    <p style="margin:0"> </p>
                </td>
            </tr> -->
            <tr>
                <th style="background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center">Producto</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Cantidad</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Antes</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Ahora</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Ahorro</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Subtotal</th>
            </tr>
            <?php foreach (Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getPositions() as $indice => $position): ?>
               <tr style="vertical-align:middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "") ?>">
                    <?php
                    if ($position->isProduct()):
                        $this->renderPartial('_compraCorreoProducto', array(
                            'position' => $position,
                            'indice' =>$indice
                        ));
                    endif;
                    ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div style="border-top:1px solid #999999">
        <table width="100%" border="0">
            <tbody>
                <tr>
                    <td>
                    </td>
                    <td width="250" valign="top">
                        <div>
                            <table cellpadding="7" border="0" style="border-left:1px solid #cccccc;border-right:1px solid #cccccc;border-top:1px solid #cccccc;color:#666666;margin-top:20px;width:100%">
                                <tbody>
                                    <tr>
                                        <td style="padding-left:21px;width:70%">Servicio</td>
                                        <td style="text-align:center">
                                            <b><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left:21px">Subtotal</td>
                                        <td style="text-align:center">
                                            <b><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getCost(), Yii::app()->params->formatoMoneda['moneda']); ?></b>
                                        </td>
                                    </tr>
               
                                <?php if (Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getExtraShipping() > 0): ?>
                                    <tr>
                                        <td>Flete adicional</td>
                                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getExtraShipping(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if (Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getBono() > 0): ?>
                                    <tr>
                                        <td>Bono</td>
                                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getBono(), Yii::app()->params->formatoMoneda['moneda']); ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if (Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getObjCiudad()->excentoImpuestos == 0 && Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getTaxPrice() > 0): ?>
                                    <tr>
                                        <td>Impuestos incluidos</td>
                                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                    </tr>
                                <?php endif; ?>
                                <?php if (Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getDiscountPrice(true) > 0): ?>
                                    <tr class="rowRed">
                                        <td>Su Ahorro</td>
                                        <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                    </tr>
                               <?php endif; ?>     
                                </tbody>
                            </table>
                            <table cellpadding="7" border="0" style="border:1px solid #ccc;color:#666666;margin-top:0px;width:100%">
                                <tbody>
                                    <tr style="background:#f9f9f9">
                                        <td style="color:#FFFFFF;background-color: #FF0000;font-weight:bold;width:70%;font-size:16px; border-right-width: 0px">TOTAL</td>
                                        <td style="font-size:16px;color:#FFFFFF;background-color: #FF0000;font-weight:bold;text-align:center;border-left-width: 0px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getTotalCost(), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                    </tr>
                                    <?php foreach($objCompra->listFormaPagoCompra as $formaPago):?>
                                    	<tr>
                                        	<td style="font-weight:bold;width:70%;font-size:16px; border-right-width: 0px"><?php echo (isset( $formaPago->objFormaPago->formaPago )?$formaPago->objFormaPago->formaPago:"").": "?></td>
                                        	<td style="font-size:16px;font-weight:bold;text-align:center;border-left-width: 0px">
                                        		<?= Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $formaPago->valor, Yii::app()->params->formatoMoneda['moneda']); ?>
                                        	</td>
                                    	</tr>
                                    <?php endforeach;?>
                                    
                                    <tr style="background:#f9f9f9">
                                        <td style="color:#FFFFFF;background-color: #FF0000;font-weight:bold;width:70%;font-size:16px; border-right-width: 0px">TOTAL A PAGAR</td>
                                        <td style="font-size:16px;color:#FFFFFF;background-color: #FF0000;font-weight:bold;text-align:center;border-left-width: 0px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getTotalCostClient(), Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p style="color:#666666;padding:5px 0;text-align:center;margin:0">- Impuestos incluídos: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getTaxPrice(), Yii::app()->params->formatoMoneda['moneda']) ?> -</p>
                            <p style="color:#ff0000;font-size:18px;text-align:center">Su ahorro: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->getModule('telefarma')->shoppingCartVitalCall->getDiscountPrice(true), Yii::app()->params->formatoMoneda['moneda']) ?></p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="yj6qo"></div>
        <div class="adL"> </div>
    </div>
    <br/>
    <div class="adL"> </div>
    <div class="adL" style="margin:20px"></div>
    <div class="adL"> </div>
</div>