<div class="row">
    <div class="col-md-9">
        <?php if ($objCompra->idOperador !== null && $objCompra->idOperador !== Yii::app()->controller->module->user->id): ?>
            <div class="alert alert-danger">
                <strong>ESTE PEDIDO YA ESTA SIENDO TRAMITADO POR: <?php echo strtoupper($objCompra->objOperador->nombre) ?></strong>
            </div>
        <?php endif; ?>

        <?php
        $diferencia = "-:-";
        if ($objCompra->tipoEntrega == Yii::app()->params->entrega["tipo"]['domicilio']) {
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
                            <?php if ($objCompra->identificacionUsuario == null): ?>
                                <strong>Datos del Remitente</strong> <br>
                                <strong>C&eacute;dula: </strong>Invitado<br>
                                <strong>Nombre: </strong><?php echo $objCompra->objCompraDireccion->nombre ?><br>
                                <strong>Correo: </strong><?php echo $objCompra->objCompraDireccion->correoElectronico ?> <br/>
                            <?php else: ?>
                                <strong>Datos del Remitente</strong> <br>
                                <strong>C&eacute;dula: </strong><?php echo $objCompra->identificacionUsuario ?><br>
                                <?php if(isset($objCompra->objUsuario)):?>
                                <strong>Nombre: </strong><?php echo $objCompra->objUsuario->nombre . " " . $objCompra->objUsuario->apellido ?><br>
                                <strong>Correo: </strong><?php echo $objCompra->objUsuario->correoElectronico ?> <br/>
                                <?php endif;?>
                             <?php if(isset($objCompra->objComprasRemitente)):?>
                             		<strong>Recogida: </strong> <?php echo $objCompra->objComprasRemitente->recogida == 1 ? "Si":"No"?><br>
                             		<?php if($objCompra->objComprasRemitente->recogida == 1):?>
                             				<strong>Direcci&oacute;n: </strong><?php echo $objCompra->objComprasRemitente->direccionRemitente ?><br>
                             				<strong>Barrio: </strong><?php echo $objCompra->objComprasRemitente->barrioRemitente ?><br>
                             		<?php endif;?>
                             	<strong>Tel&eacute;fono: </strong><?php echo $objCompra->objComprasRemitente->telefonoRemitente ?><br>
                             <?php endif;?>   
                            <?php endif; ?>
                            <strong>TipoEntrega: </strong><?php echo Yii::app()->params->entrega["tipo"][$objCompra->tipoEntrega] ?> 

                        </div>
                        <?php if ($objCompra->objCompraDireccion !== null): ?>
                            <div class="col-md-6">
                                <strong>Datos del Destinatario</strong> <br>
                                <strong>Nombre: </strong><?php echo $objCompra->objCompraDireccion->nombre ?> <br>
                                <strong>Direcci&oacute;n: </strong><?php echo $objCompra->objCompraDireccion->direccion . " - " . $objCompra->objCompraDireccion->barrio ?><br>
                                <strong>Tel&eacute;fono: </strong> <?php echo $objCompra->objCompraDireccion->telefono ?> - <strong>Celular: </strong> <?php echo $objCompra->objCompraDireccion->celular ?><br>
                                <?php if ($objCompra->objCompraDireccion->objCiudad != null): ?>
                                    <strong>Ciudad: </strong><?php echo $objCompra->objCompraDireccion->objCiudad->nombreCiudad . " - " . $objCompra->objCompraDireccion->objSector->nombreSector ?><br/>
                                <?php else: ?>
                                    <strong>Ciudad: </strong> NA <br/>
                                <?php endif; ?>
                                <?php if(isset($objCompra->objComprasRemitente) && isset($objCompra->objComprasRemitente->puntoVentaDestino)):?>
                                <?php $puntoVenta = PuntoVenta::model()->find('idComercial ="'.$objCompra->objComprasRemitente->puntoVentaDestino.'"')?>
                                	<strong>Destino: </strong> <?php echo $objCompra->objComprasRemitente->puntoVentaDestino ?> - <?php echo $puntoVenta->nombrePuntoDeVenta?>
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
				          <strong>Formas de pago</strong> <br>
				           <table>
				           		 <?php foreach($objCompra->listFormaPagoCompra as $formaPago):?>
					                     <tr>
					                          <td > 
					                             <?= (isset( $formaPago->objFormaPago->formaPago )?$formaPago->objFormaPago->formaPago:"").": ".
					                                 (isset( $formaPago->numeroTarjeta )?"<br/>Numero de tarjeta: ".$formaPago->numeroTarjeta:"")." ".
					                                 (isset( $formaPago->numeroTarjeta )?" Cuotas: ".$formaPago->cuotasTarjeta:"")." ".
					                                 (isset( $formaPago->numeroValidacion )?" No. Validaci&oacute;n: ".$formaPago->numeroValidacion:"")." ".
					                                 (isset( $formaPago->objConcepto->concepto )?"<br/><strong>Concepto:</strong> ".$formaPago->objConcepto->concepto:"");
				            					?> </td>
					                           <td> <?= Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $formaPago->valor, Yii::app()->params->formatoMoneda['moneda']); ?> </td>
					                     </tr>
					             <?php endforeach;?>
				          	</table>  
				     </td>
                 <!--    <td> 
                    	<strong> 
                            <span style="color: #E10019; font-size: 16px;"> Pago <?php echo $objCompra->objFormaPagoCompra->objFormaPago->formaPago ?></span>
                            <?php if ($objCompra->objFormaPagoCompra->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']): ?>
                                <button type="button" class="btn btn-info btn-sm" data-role="trazapasarela" data-pedido="<?php echo $objCompra->idCompra ?>"><i class="glyphicon glyphicon-list-alt"></i> Traza</button>
                                <p>N&uacute;mero de validaci&oacute;n: <?php echo $objCompra->objFormaPagoCompra->numeroValidacion ?></p>
                            <?php endif; ?>
                            <?php if ($objCompra->objFormaPagoCompra->numeroTarjeta != null && !empty($objCompra->objFormaPagoCompra->numeroTarjeta)): ?>
                                <br>
                                <span style="font-size: 16px;"> <strong>No. tarjeta:</strong> <?php echo $objCompra->objFormaPagoCompra->numeroTarjeta ?></span>
                                <br>
                                <span style="font-size: 16px;"> <strong>No. cuotas:</strong> <?php echo $objCompra->objFormaPagoCompra->cuotasTarjeta ?></span>
                            <?php endif; ?>
                            <h3><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCompra->objFormaPagoCompra->valor, Yii::app()->params->formatoMoneda['moneda']); ?></h3>
                        </strong>
                       <button id="btn-formas-pago" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalFormasPago">Ver formas de pago</button>  
                    	<tr>                       
                    	</tr>
                        <br>
                    </td> -->
                    
                </tr>
                <tr>
                    <td colspan="3">
                        <strong>Observación del cliente:</strong>  
                        <?php echo $objCompra->observacion ?> 
                    </td>
                </tr>
                <?php if (count($objCompra->listFormulas) > 0): ?>
                	 <tr>
                        <td colspan="3">
                            <button id="btn-formula-buscar" class="btn btn-danger btn-sm" data-pedido="61" data-toggle="modal" data-target="#myModal">Ver formula médica</button>
                        </td>
                    </tr> 
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if (count($objCompra->listFormulas) > 0): ?>
        <div id="myModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Formulas médicas</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-input table-bordered table-hover table-striped">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre médico</th>
                                    <th>Institución</th>
                                    <th>Registro médico</th>
                                    <th>Teléfono</th>
                                    <th>Correo Electrónico</th>									
                                    <th>Formula médica</th>

                                </tr>
                                <?php $i = 1 ?>
                            <?php foreach($objCompra->listFormulas as $formula):?>
                                <tr>
                                    <td> <?= $i++ ?> </td>
                                    <td><?= $formula->nombreMedico?></td>
                                    <td><?= $formula->institucion?></td>
                                    <td><?= $formula->registroMedico?></td>
                                    <td><?= $formula->telefono?></td>
                                    <td><?= $formula->correoElectronico?></td>									
                                    <td><?php if(!empty($formula->formulaMedica)): ?>
                                        <a href="<?php echo Yii::app()->request->baseUrl."/".$formula->formulaMedica?>" target="_blank" >Ver formula</a>
                                    <?php endif;?></td>  
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
    <?php endif; ?>
	<div id="modalFormasPago" class="modal fade" role="dialog">
            <div class="modal-dialog" style="width:60%">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Formas de pago</h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-input table-bordered table-hover table-striped">
                            <tbody>
                                <tr>
                                    <th>#</th>
                                    <th>Forma pago</th>
                                    <th>Valor</th>
                                    <th>N&uacute;mero de tarjeta</th>
                                    <th>Cuotas</th>
                                    <th>numero de Validaci&oacute;n</th>									
                                    <th>Cuenta</th>
                                    <th>Forma pago POS</th>
                                    <th>Tipo de bono</th>

                                </tr>
                                <?php $i = 1 ?>
                            <?php foreach($objCompra->listFormaPagoCompra as $formaPago):?>
                                <tr>
                                    <td> <?= $i++ ?> </td>
                                    <td> <?= $formaPago->objFormaPago->formaPago ?> </td>
                                    <td> <?= $formaPago->valor ?> </td>
                                    <td> <?= $formaPago->numeroTarjeta ?> </td>
                                    <td> <?= $formaPago->cuotasTarjeta ?> </td>
                                    <td> <?= $formaPago->numeroValidacion ?> </td>
                                    <td> <?= $formaPago->cuenta ?> </td>
                                    <td> <?= $formaPago->formaPago ?> </td>
                                    <td> <?= isset($formaPago->objConcepto->concepto)?$formaPago->objConcepto->concepto:"" ?> </td>
                                </tr>
                            <?php endforeach;?>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>
        
    <div class="col-md-3">
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
                        <button class="btn btn-inverse <?php echo $objCompra->isVentaCentralizada()?"btn-primary":"btn-default"?> btn-sm" data-action="remitir" data-compra="<?php echo $objCompra->idCompra ?>">Remitir</button>
                        <button class="btn btn-inverse <?php echo $objCompra->isVentaCentralizada()?"btn-primary":"btn-default"?> btn-sm" data-action="remitirborrar" data-compra="<?php echo $objCompra->idCompra ?>">Borrar remisión</button>
                    </td>
                </tr>
                <?php if($objCompra->isVentaCentralizada()):?>
                <tr>
                	<td></td>
                	<td>
                        <button class="btn btn-inverse btn-primary btn-large" data-action="remitirDestino" data-compra="<?php echo $objCompra->idCompra ?>">Remitir Destino</button>
                    </td> 
                </tr>
                <?php endif;?>
                <?php if($objCompra->idTipoVenta == Yii::app()->params->tipoVenta['nacional']):?>
                <tr>
                    <td style="text-align: right"><strong>Remitir Nacional</strong></td>
                    <td>
                        <button class="btn btn-inverse btn-default btn-sm" data-action="remitirNacional" data-compra="<?php echo $objCompra->idCompra ?>">Remitir</button>
                        <button class="btn btn-inverse btn-default btn-sm" data-action="remitirborrarNacional" data-compra="<?php echo $objCompra->idCompra ?>">Borrar remisión</button>
                    </td>
                </tr>
                <?php endif;?>
                <tr>
                    <td colspan="2"> 
                        <form role="form" id="form-pedido-seguimiento">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" style="display:block" id="check-pedido-seguimiento" data-compra="<?php echo $objCompra->idCompra ?>" <?php echo ($objCompra->seguimiento == 1 ? "checked='checked'" : "") ?>> <strong>REALIZAR SEGUIMIENTO</strong>
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
  
</div>
<?php if ($objCompra->totalCompra < $objCompra->sumaFormasPago()): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <strong>ADVERTENCIA: EL VALOR TOTAL DE LA COMPRA ES INFERIOR A LA FORMA DE PAGO. RECUERDE QUE EL TOTAL DE LA COMPRA DEBE SER IGUAL A LA FORMA DE PAGO. POR FAVOR REVISE EL PEDIDO</strong>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php if ($objCompra->totalCompra > $objCompra->sumaFormasPago()): ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-danger">
                <strong>ADVERTENCIA: EL VALOR TOTAL DE LA COMPRA ES SUPERIOR A LA FORMA DE PAGO, POR FAVOR ADICIONE UNA FORMA DE PAGO PARA CUBRIR EL EXCEDENTE DE <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], ($objCompra->totalCompra - $objCompra->sumaFormasPago()), Yii::app()->params->formatoMoneda['moneda']) ?></strong>
            </div>
        </div>
    </div>
<?php endif; ?>
