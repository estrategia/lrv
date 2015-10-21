<div>
    <div align="center">
        <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
            <h1> <span style="font-size:13.5pt;font-family:'Arial','sans-serif'">TIENE UNA VENTA VIRTUAL CONGELADA. POR FAVOR TRAMITELA</span></h1>
        <?php else: ?>
            <h1> <span style="font-size:13.5pt;font-family:'Arial','sans-serif';color:#ff0000">EL CLIENTE PASARÁ A RECOGER EL PEDIDO A SU PUNTO DE VENTA.<br/>
                    FACTURE ESTE PEDIDO DE MANERA INMEDIATA</span></h1>
        <?php endif; ?>    
        <?php if ($objCompra->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']): ?>
            <p align="center" style="text-align:center">
                <strong>
                    <span style="font-size:13.5pt">Hora de entrega: </span>
                </strong><span style="font-size:13.5pt;color:#c20000">
                    <?php echo $objCompra->fechaEntrega ?></span>
                <span style="font-size:13.5pt">
                </span></p>
        <?php endif; ?>      
    </div>
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
    <br/>
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
                        <p><b>Nombre destinatario: </b><?php echo $objCompra->objCompraDireccion->nombre ?></p>
                        <p><b>Ciudad: </b><?php echo $objCompra->objCompraDireccion->objCiudad->nombreCiudad . " - " . $objCompra->objCompraDireccion->objSector->nombreSector ?></p>
                        <p><b>Direcci&oacute;n: </b><?php echo $objCompra->objCompraDireccion->direccion ?></p>
                    </td>
                    <td width="50%" valign="top" style="border-right:1px solid #dddddd;color:#555555;background:#f9f9f9">
                        <p><b>Barrio: </b><?php echo $objCompra->objCompraDireccion->barrio ?></p>
                        <p><b>Tel&eacute;fono: </b><?php echo $objCompra->objCompraDireccion->telefono ?></p>
                        <p><b>Forma de pago: </b><?php echo $objCompra->objFormaPagoCompra->objFormaPago->formaPago ?></p>
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
                <tr>
                    <td valign="top"  width="50%" style="border-left:1px solid #dddddd;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;color:#444444">
                        <p><b>Punto de venta entrega: </b><?php echo $objCompra->objPuntoVenta->nombrePuntoDeVenta ?></p>
                        <p><b>Punto de venta direcci&oacute;n: </b><?php echo $objCompra->objPuntoVenta->direccionPuntoDeVenta ?></p>
                    </td>
                    <td width="50%"  valign="top" style="border-left:1px solid #dddddd;border-right:1px solid #dddddd;border-bottom:1px solid #dddddd;color:#444444">
                        <?php if ($objCompra->identificacionUsuario == null): ?>
                            <p><b>C&eacute;dula cliente: </b>Invitado</p>
                            <p><b>Nombre cliente: </b><?php echo $objCompra->objCompraDireccion->nombre ?></p>
                            <p><b>Correo electr&oacute;nico: </b><?php echo $objCompra->objCompraDireccion->correoElectronico ?></p>
                        <?php else: ?>
                            <p><b>C&eacute;dula cliente: </b><?php echo $objCompra->objUsuario->identificacionUsuario ?></p>
                            <p><b>Nombre cliente: </b><?php echo $objCompra->objUsuario->nombre . " " . $objCompra->objUsuario->apellido ?></p>
                            <p><b>Correo electr&oacute;nico: </b><?php echo $objCompra->objUsuario->correoElectronico ?></p>
                        <?php endif; ?>
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
            <tr>
                <th style="background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center">Producto</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Cantidad</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Antes</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Ahora</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Ahorro</th>
                <th style="border-left:1px solid #dddddd;background-color:#f9f9f9;line-height:20px;padding:8px;color:#ff0000;text-align:center;width:12%">Subtotal</th>
            </tr>
            <?php $listCombos = array();
            $ahorro = 0; ?>
            <?php foreach ($objCompra->listItems as $indice => $position): ?>
                <tr style="vertical-align:middle; <?php echo ($indice % 2 != 0 ? "background-color:#f9f9f9;" : "") ?>">
                    <?php
                    if ($position->idCombo == null):
                        $this->renderPartial('compraCorreoProducto', array(
                            'objItem' => $position,
                            'indice' => $indice
                        ));
                    else:
                        $listCombos[$position->idCombo]['items'][] = $position;
                        $listCombos[$position->idCombo]['valor'] = isset($listCombos[$position->idCombo]['valor']) ? ($listCombos[$position->idCombo]['valor'] + $position->precioBaseUnidad) : $position->precioBaseUnidad;
                    endif;
                    $ahorro+=$position->descuentoUnidad * $position->unidades + $position->descuentoFraccion * $position->fracciones;
                    ?>
                </tr>
            <?php endforeach; ?>
            <?php foreach ($listCombos as $idCombo => $arrItem):
                $this->renderPartial('compraCorreoCombo', array(
                    'arrItem' => $arrItem,
                ));
            endforeach; ?>
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
                                            <b><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->domicilio, Yii::app()->params->formatoMoneda['moneda']); ?></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-left:21px">Subtotal</td>
                                        <td style="text-align:center">
                                            <b><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->subtotalCompra, Yii::app()->params->formatoMoneda['moneda']); ?></b>
                                        </td>
                                    </tr>

                                    <?php if ($objCompra->flete > 0): ?>
                                        <tr>
                                            <td>Flete adicional</td>
                                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->flete, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                                        </tr>
                                    <?php endif; ?>

                                    <?php if ($objCompra->objFormaPagoCompra->valorBono > 0): ?>
                                        <tr>
                                            <td>Bono</td>
                                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->objFormaPagoCompra->valorBono, Yii::app()->params->formatoMoneda['moneda']); ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($objCompra->impuestosCompra > 0): ?>
                                        <tr>
                                            <td>Impuestos incluidos</td>
                                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->impuestosCompra, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php if ($ahorro > 0): ?>
                                        <tr class="rowRed">
                                            <td>Su Ahorro</td>
                                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $ahorro, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                        </tr>
                                    <?php endif; ?>  
                                    <?php if ($objCompra->getPuntosCompra() > 0): ?>
                                        <tr class="rowRed">
                                            <td>Puntos por Compra</td>
                                            <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->getPuntosCompra(), "") ?></td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table> 
                            <table cellpadding="7" border="0" style="border:1px solid #ccc;color:#666666;margin-top:0px;width:100%">
                                <tbody>
                                    <tr style="background:#f9f9f9">
                                        <td style="color:#FFFFFF;background-color: #FF0000;font-weight:bold;width:70%;font-size:16px; border-right-width: 0px">TOTAL</td>
                                        <td style="font-size:16px;color:#FFFFFF;background-color: #FF0000;font-weight:bold;text-align:center;border-left-width: 0px"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->totalCompra, Yii::app()->params->formatoMoneda['moneda']) ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <p style="color:#666666;padding:5px 0;text-align:center;margin:0">- Impuestos inclu&iacute;dos: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->impuestosCompra, Yii::app()->params->formatoMoneda['moneda']) ?> -</p>
                            <p style="color:#ff0000;font-size:18px;text-align:center">Su ahorro: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $ahorro, Yii::app()->params->formatoMoneda['moneda']) ?></p>
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>

        <div class="yj6qo"></div>
        <div class="adL"> </div>
        <h3 style="color:#666666">
            Saldos de <span class="il">productos</span>
        </h3>
        <?php $this->renderPartial("_saldosCorreo", array("respuesta" => $objCompra->getSaldosPDV())); ?>
    </div>
    <br/>
    <div class="adL"> </div>
    <div class="adL" style="margin:20px"></div>
    <div class="adL"> </div>
</div>