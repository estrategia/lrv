<!--Optional:-->
<ns1:envios>
	<!--Zero or more repetitions:-->
	<ns1:CargueMasivoExternoDTO>
		<!--Optional:-->
		<ns1:objEnvios>
			<!--Zero or more repetitions:-->
			<ns1:EnviosExterno>
				<!--PRODUCTO DOCUMENTO VALORES DESDE 1 K Y HASTA 50 K:-->
				<!--CARACTETISTICAS DEL ENVIO:-->
				<ns1:Num_Guia>0</ns1:Num_Guia>
				<ns1:Num_Sobreporte>0</ns1:Num_Sobreporte>
				<ns1:Num_SobreCajaPorte>0</ns1:Num_SobreCajaPorte>
				<ns1:Fec_TiempoEntrega>1</ns1:Fec_TiempoEntrega>
				<ns1:Des_TipoTrayecto>1</ns1:Des_TipoTrayecto>
				<ns1:Ide_CodFacturacion>SER408</ns1:Ide_CodFacturacion>
				<ns1:Num_Piezas>1</ns1:Num_Piezas>
				<!--CUANDO SEA MERCANCIA INDUSTRIAL (Producto 6) COLOCAR LA CANTIDAD DE PIEZAS FISICAS DEL ENVIO:-->
				<ns1:Des_FormaPago>2</ns1:Des_FormaPago>
				<ns1:Des_MedioTransporte>1</ns1:Des_MedioTransporte>
				<ns1:Des_TipoDuracionTrayecto>1</ns1:Des_TipoDuracionTrayecto>
				<ns1:Nom_TipoTrayecto>1</ns1:Nom_TipoTrayecto>
				<ns1:Num_Alto>5</ns1:Num_Alto>
				<ns1:Num_Ancho>5</ns1:Num_Ancho>
				<ns1:Num_Largo>5</ns1:Num_Largo>
				<ns1:Num_PesoTotal><?= $objCompraDespacho->valorVolumetrico < 3 ? 3 :  $objCompraDespacho->valorVolumetrico ?></ns1:Num_PesoTotal>
				<ns1:Des_UnidadLongitud>cm</ns1:Des_UnidadLongitud>
				<ns1:Des_UnidadPeso>kg</ns1:Des_UnidadPeso>
				<ns1:Nom_UnidadEmpaque>GENERICO</ns1:Nom_UnidadEmpaque>
				
				<!--ingresar el nombre de la unidad de empaque que se encuentre registrada en sisclinet:-->
				<ns1:Gen_Cajaporte>false</ns1:Gen_Cajaporte>
				<ns1:Gen_Sobreporte>false</ns1:Gen_Sobreporte>
				<ns1:Des_DiceContenerSobre>?</ns1:Des_DiceContenerSobre>
				<!--dice contener solon para producto sobreporte:-->

				<!--CAMPOS OPCIONALES CON CAIDA IMPRESA EN LA GUIA:-->
				<ns1:Doc_Relacionado>Valor10</ns1:Doc_Relacionado>
				<!--campo remision en la guia:-->
				<ns1:Des_VlrCampoPersonalizado1>Novedades</ns1:Des_VlrCampoPersonalizado1>
				<!--observaciones para la entrega hasta 60 caracteres:-->
				<ns1:Ide_Num_Referencia_Dest>Valor12</ns1:Ide_Num_Referencia_Dest>
				<!--campo Ref2 en formato de guia sticker:-->
				<ns1:Num_Factura>valor13</ns1:Num_Factura>

				<!--TIPO DE PRODUCTO A UTILIZAR DE SERVIENTREGA:-->
				<ns1:Ide_Producto>2</ns1:Ide_Producto>
				<!--codigos del tipo de producto negociado con Servientrega:-->
				<ns1:Num_Recaudo>0</ns1:Num_Recaudo>
				<!--valor a recaudar, solo aplica para logistica para cobro:-->

				<!--OTRA INFORMACION, DEJAR SIEMPRE FIJA:-->
				<ns1:Ide_Destinatarios>00000000-0000-0000-0000-000000000000</ns1:Ide_Destinatarios>
				<ns1:Ide_Manifiesto>00000000-0000-0000-0000-000000000000</ns1:Ide_Manifiesto>
				<ns1:Num_BolsaSeguridad>0</ns1:Num_BolsaSeguridad>
				<ns1:Num_Precinto>0</ns1:Num_Precinto>
				<ns1:Num_VolumenTotal>0</ns1:Num_VolumenTotal>
				<ns1:Des_DireccionRecogida></ns1:Des_DireccionRecogida>
				<!--no aplica, enviar 0:-->
				<ns1:Des_TelefonoRecogida></ns1:Des_TelefonoRecogida>
				<!--no aplica, enviar 0:-->
				<ns1:Des_CiudadRecogida />
				<!--no aplica, enviar 0:-->
				<ns1:Num_PesoFacturado>0</ns1:Num_PesoFacturado>
				<ns1:Des_TipoGuia>2</ns1:Des_TipoGuia>
				<ns1:Id_ArchivoCargar></ns1:Id_ArchivoCargar>
				<ns1:Des_CiudadOrigen>0</ns1:Des_CiudadOrigen>
				<!--dejar en 0:-->

				<!--VALORES:-->
				<ns1:Num_ValorDeclaradoTotal><?= $objCompraDespacho->valorDeclaradoTotal ?></ns1:Num_ValorDeclaradoTotal> 
				<!--valor declarado del envio total:-->
				<ns1:Num_ValorLiquidado>0</ns1:Num_ValorLiquidado>
				<ns1:Num_VlrSobreflete>0</ns1:Num_VlrSobreflete>
				<ns1:Num_VlrFlete> <?= $objCompraDespacho->valorFlete ?> </ns1:Num_VlrFlete>
				<ns1:Num_Descuento>0</ns1:Num_Descuento>
				<ns1:Num_ValorDeclaradoSobreTotal>0</ns1:Num_ValorDeclaradoSobreTotal>

				<!--INFORMACION DEL DESTINATARIO:-->
				<ns1:Des_Telefono><?= $objCompra->objCompraDireccion->telefono?></ns1:Des_Telefono>
				<!--Telefono Destinatario-->
				<ns1:Des_Ciudad> <?php echo  $objCompra->objCompraDireccion->objCiudad->codigoDane?></ns1:Des_Ciudad>
				<!--Ciudad de Destino:-->
				<ns1:Des_DepartamentoDestino><?php //echo  $objCompra->objCompraDireccion->objCiudad->nombreCiudad?></ns1:Des_DepartamentoDestino>
				<!--nombre o codigo DANE de departamento de destino:-->
				<ns1:Des_Direccion><?= $objCompra->objCompraDireccion->direccion?></ns1:Des_Direccion>
				<!--Direccion de Destino:-->
				<ns1:Nom_Contacto><?= $objCompra->objCompraDireccion->nombre?></ns1:Nom_Contacto>
				<!--Nombre de Destinatario:-->
				<ns1:Des_DiceContener>PRODUCTO</ns1:Des_DiceContener>
				<!--conteneido del envio hasta 20 caracteres:-->
				<ns1:Ide_Num_Identific_Dest><?= $objCompra->identificacionUsuario?></ns1:Ide_Num_Identific_Dest>
				<!--identificacion de destinario :-->
				<ns1:Num_Celular><?= $objCompra->objCompraDireccion->celular?></ns1:Num_Celular>
				<!--numero de celular de destinatario:-->
				<ns1:Des_CorreoElectronico><?= $objCompra->objCompraDireccion->correoElectronico?></ns1:Des_CorreoElectronico>

				<!--INFORMACION DEL REMITENTE:-->
				<ns1:Des_CiudadRemitente><?php echo  $objBodega->objCiudad->codigoDane ?></ns1:Des_CiudadRemitente>
				<!--ciudad de remitente:-->
				<ns1:Des_DireccionRemitente><?= $objBodega->direccion ?></ns1:Des_DireccionRemitente>
				<!--direccion del remitente:-->
				<ns1:Des_DepartamentoOrigen><?php //echo  $objBodega->departamento ?></ns1:Des_DepartamentoOrigen>
				<!--nombre o codigo DANE de departamento de Origen:-->
				<ns1:Num_TelefonoRemitente><?= $objBodega->telefono ?></ns1:Num_TelefonoRemitente>
				<!--telefono del remitente:-->
				<ns1:Num_IdentiRemitente>12331244</ns1:Num_IdentiRemitente>
				<!--identificacion del remitente:-->
				<ns1:Nom_Remitente>COPSERVIR LTDA</ns1:Nom_Remitente>
				<!--no aplica, dejar vacio:-->

				<!--MAYORISTA , NO APICA PARA CLIENTES:-->
				<ns1:Est_CanalMayorista>false</ns1:Est_CanalMayorista>
				<ns1:Nom_RemitenteCanal />

				<!--UTILIZADO PARA ASOCIAAR LAS PIEZAS AL ENVIO EN MERCANCIA INDUSTRIAL:-->
				<ns1:Des_IdArchivoOrigen>1000100530100</ns1:Des_IdArchivoOrigen>

				<!--NODO DE MERCANCIA INDUSTRIAL, PIEZAS DEL ENVIO, CUANDO SEA MAS DE 1 PIEZA CON DIFERENTES DIMENSIONES REPETIR NODO:-->
				
				<?php foreach($objCompra->listItems as $position):?>
				
					<?php if($position->unidadesCedi > 0 ):?>
					
						<?php foreach($position->listBodegas as $positionBodega):?>
							<?php if($positionBodega->idBodega == $objBodega->idBodega ):?>
							<ns1:objEnviosUnidadEmpaqueCargue>
								<!--Zero or more repetitions:-->
								<ns1:EnviosUnidadEmpaqueCargue>
									<ns1:Num_Alto><?= $position->objProducto->Profundo ?></ns1:Num_Alto>
									<ns1:Num_Distribuidor>0</ns1:Num_Distribuidor>
									<ns1:Num_Ancho><?= $position->objProducto->Ancho ?></ns1:Num_Ancho>
									<ns1:Num_Largo><?= $position->objProducto->Largo ?></ns1:Num_Largo>
									<ns1:Num_Peso><?= $position->objProducto->PesoUnidad ?></ns1:Num_Peso>
									
									<ns1:Num_Cantidad><?= $positionBodega->cantidad ?></ns1:Num_Cantidad>
									<!--Optional:-->
									<ns1:Des_DiceContener>PRODUCTO</ns1:Des_DiceContener>
									<!--Optional:-->
									<ns1:Des_IdArchivoOrigen>1000100530100</ns1:Des_IdArchivoOrigen>
									
									<!--Optional:-->
									<ns1:Nom_UnidadEmpaque>VARIOS</ns1:Nom_UnidadEmpaque>
									
									<!--Optional:-->
									<ns1:Des_UnidadLongitud>cms</ns1:Des_UnidadLongitud>
									<!--Optional:-->
									<ns1:Des_UnidadPeso>kgs</ns1:Des_UnidadPeso>
									<ns1:Ide_UnidadEmpaque>00000000-0000-0000-0000-000000000000</ns1:Ide_UnidadEmpaque>
									<ns1:Ide_Envio>00000000-0000-0000-0000-000000000000</ns1:Ide_Envio>
									<!--Optional:-->
									<ns1:Num_Volumen>?</ns1:Num_Volumen>
			
									<ns1:Num_Consecutivo>0</ns1:Num_Consecutivo>
									<!--Optional:-->
									<ns1:Cod_Facturacion>?</ns1:Cod_Facturacion>
									<!--Optional:-->
									<ns1:Num_ValorDeclarado>1</ns1:Num_ValorDeclarado>
									<!--Optional:-->
									<ns1:Indicador>1</ns1:Indicador>
									<!--Optional:-->
									<ns1:NumeroDeCaja>?</ns1:NumeroDeCaja>
									<!--Optional:-->
									<ns1:Id_archivo>?</ns1:Id_archivo>
								</ns1:EnviosUnidadEmpaqueCargue>
							</ns1:objEnviosUnidadEmpaqueCargue>
							<?php endif;?>
						<?php endforeach?>
					<?php endif;?>
				<?php endforeach?>
			</ns1:EnviosExterno>
		</ns1:objEnvios>
	</ns1:CargueMasivoExternoDTO>
</ns1:envios>
<!--Optional:-->