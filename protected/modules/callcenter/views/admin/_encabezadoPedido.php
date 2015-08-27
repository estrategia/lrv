<div class="col-md-8">
    <?php if ($objCompra->idOperador !== null && $objCompra->idOperador !== Yii::app()->controller->module->user->id): ?>
        <div class="alert alert-danger">
            <strong>ESTE PEDIDO YA ESTA SIENDO TRAMITADO POR: <?php echo strtoupper($objCompra->objOperador->nombre) ?></strong>
        </div>
    <?php endif; ?>

    <?php 
    $diferencia= "-:-";
    if($objCompra->tipoEntrega==Yii::app()->params->entrega["tipo"]['domicilio']){
        $direferencia = date_diff($objCompra->fechaCompraDate, $objCompra->fechaEntregaDate);
        $diferencia = $direferencia->format('%h') . ":" . $direferencia->format('%i');
    }
    ?>

    <table class="table table-striped table-bordered table-condensed">
        <tbody>
            <tr>
                <td colspan="3">
                    <strong><span>Venta virtual</span> <span>#<?php echo $objCompra->idCompra ?></span> | </strong><?php echo $objCompra->fechaCompra ?> 
                    <span style="float: right;font-weight: bold; color: #E10019; margin-left: 20px; font-size: 16px;"><?php echo $diferencia ?></span>
                    <span style="float: right;font-weight: bold">FECHA DE ENTREGA: <?php echo $objCompra->fechaEntrega ?></span>
                </td>
            </tr>
            <tr>
                <td> 
                    <div class="col-md-6">
                        <strong>Datos del Remitente</strong> <br>
                        <strong>Cédula: </strong><?php echo $objCompra->identificacionUsuario ?><br>
                        <strong>Nombre: </strong><?php echo $objCompra->objUsuario->nombre . " " . $objCompra->objUsuario->apellido ?><br>
                        <strong>Correo: </strong><?php echo $objCompra->objUsuario->correoElectronico ?> <br/>
                        <strong>TipoEntrega: </strong><?php echo Yii::app()->params->entrega["tipo"][$objCompra->tipoEntrega] ?> 
                        
                    </div>
                    <?php if ($objCompra->objCompraDireccion !== null): ?>
                        <div class="col-md-6">
                            <strong>Datos del Destinatario</strong> <br>
                            <strong>Nombre: </strong><?php echo $objCompra->objCompraDireccion->nombre ?> <br>
                            <strong>Dirección: </strong><?php echo $objCompra->objCompraDireccion->direccion . " - " . $objCompra->objCompraDireccion->barrio ?><br>
                            <strong>Teléfono: </strong> <?php echo $objCompra->objCompraDireccion->telefono ?> - <strong>Celular: </strong> <?php echo $objCompra->objCompraDireccion->celular ?><br>
                            <?php if($objCompra->objCompraDireccion->objCiudad !=null): ?>
                                <strong>Ciudad: </strong><?php echo $objCompra->objCompraDireccion->objCiudad->nombreCiudad . " - " . $objCompra->objCompraDireccion->objSector->nombreSector ?>
                            <?php else: ?>
                                <strong>Ciudad: </strong> NA
                            <?php endif;?>
                        </div>
                    <?php else: ?>
                        <div class="col-md-6">
                            <strong>Datos del Destinatario</strong> <br>
                            <strong>Ciudad: </strong><?php echo $objCompra->objCiudad->nombreCiudad . " - " . $objCompra->objSector->nombreSector ?>
                        </div>
                    <?php endif; ?>
                </td>
                <td> 
                    <strong> 
                        <span style="color: #E10019; font-size: 16px;"> Pago <?php echo $objCompra->objFormaPagoCompra->objFormaPago->formaPago ?></span>
                        <?php if ($objCompra->objFormaPagoCompra->numeroTarjeta != null && !empty($objCompra->objFormaPagoCompra->numeroTarjeta)): ?>
                            <br>
                            <span font-size: 16px;"> <strong>No. tarjeta:</strong> <?php echo $objCompra->objFormaPagoCompra->numeroTarjeta?></span>
                            <br>
                            <span font-size: 16px;"> <strong>No. cuotas:</strong> <?php echo $objCompra->objFormaPagoCompra->cuotasTarjeta?></span>
                        <?php endif; ?>
                        <h3><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->totalCompra, Yii::app()->params->formatoMoneda['moneda']); ?></h3>
                    </strong>
                    <br>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <strong>Observación del cliente:</strong>  
                    <?php echo $objCompra->observacion ?> 
                </td>
            </tr>
        </tbody>
    </table>
</div>

<div class="col-md-4">
    <strong> Datos de Asignación </strong><br><br>
    <table border="0" class="table-condensed">
        <tbody>
            <tr>
                <td style="text-align: right"> <strong>Estado </strong></td>
                <td>
                    <div style="display:block" id="estado">
                        <span class="title"><?php echo $objCompra->objEstadoCompra->compraEstado ?></span> 
                    </div>
                </td>
            </tr>
            <tr>
                <td style="text-align: right"><strong>PDV Asignado </strong></td>
                <td><?php echo $objCompra->idComercial ?></td>
            </tr>

            <tr>
                <td style="text-align: right"><strong>DC</strong></td>
                <td><?php echo $objCompra->documentoCruce ?> </td>
            </tr>
            <tr>
                <td style="text-align: right"> <strong>Asignado por</strong></td>
                <td><?php echo $objCompra->objOperador == null ? "SIN ASIGNACIÒN" : strtoupper($objCompra->objOperador->nombre) ?></td>
            </tr>

            <tr>
                <td style="text-align: right"><strong>Remitir POS</strong></td>
                <td>
                    <button class="btn btn-inverse btn-default btn-sm" data-action="remitir" data-compra="<?php echo $objCompra->idCompra ?>">Remitir</button>
                    <button class="btn btn-inverse btn-default btn-sm" data-action="remitirborrar" data-compra="<?php echo $objCompra->idCompra ?>">Borrar remisión</button>
                </td>
            </tr>
            <tr>
                <td colspan="2"> 
                    <form role="form" id="form-pedido-seguimiento">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" id="check-pedido-seguimiento" data-compra="<?php echo $objCompra->idCompra ?>" <?php echo ($objCompra->seguimiento == 1 ? "checked='checked'" : "") ?>> <strong>REALIZAR SEGUIMIENTO</strong>
                            </label>
                        </div>
                    </form>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div id="loadMensaje">
                        <div class="load">

                        </div>

                        <div id="mensajepos"> </div>
                    </div>

                    <span style="font-weight: bold; color: #dd4814; font-size: 14px;"></span> 
                </td>
            </tr>
        </tbody>
    </table>
</div>