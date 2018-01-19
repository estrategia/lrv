<!--Optional:-->
<ns1:envios>
        <ns1:CargueMasivoExternoDTO>
          <ns1:objEnvios>
            <ns1:EnviosExterno>


              <ns1:Num_Guia>0</ns1:Num_Guia>
              <ns1:Num_Sobreporte>0</ns1:Num_Sobreporte>
              <ns1:Doc_Relacionado/>
              <ns1:Num_Piezas>1</ns1:Num_Piezas>
              <ns1:Des_TipoTrayecto>1</ns1:Des_TipoTrayecto>
              <ns1:Ide_Producto>2</ns1:Ide_Producto>
              <ns1:Ide_Destinatarios>00000000-0000-0000-0000-000000000000</ns1:Ide_Destinatarios>
              <ns1:Ide_Manifiesto>00000000-0000-0000-0000-000000000000</ns1:Ide_Manifiesto>
              <ns1:Des_FormaPago>2</ns1:Des_FormaPago>
              <ns1:Des_MedioTransporte>1</ns1:Des_MedioTransporte>
              
              <ns1:Num_BolsaSeguridad>0</ns1:Num_BolsaSeguridad>
              <ns1:Num_Precinto>0</ns1:Num_Precinto>
              <ns1:Des_TipoDuracionTrayecto>1</ns1:Des_TipoDuracionTrayecto>
              
              <ns1:Num_PesoTotal><?= $objCompraDespacho->valorVolumetrico < 3 ? 3 :  $objCompraDespacho->valorVolumetrico ?></ns1:Num_PesoTotal> <!--  EL webservice lo redondea -->
              <ns1:Num_ValorDeclaradoTotal><?= $objCompraDespacho->valorDeclaradoTotal ?></ns1:Num_ValorDeclaradoTotal>
              <ns1:Num_VolumenTotal>0</ns1:Num_VolumenTotal>
              
              
              <ns1:Des_Telefono><?= $objCompra->objCompraDireccion->telefono?></ns1:Des_Telefono>
              <ns1:Des_Ciudad><?php echo  $objCompra->objCompraDireccion->objCiudad->codigoDane?></ns1:Des_Ciudad>
              <ns1:Des_Direccion><?= $objCompra->objCompraDireccion->direccion?></ns1:Des_Direccion>
              <ns1:Nom_Contacto><?= $objCompra->objCompraDireccion->nombre?></ns1:Nom_Contacto>
              <ns1:Ide_Num_Identific_Dest><?= $objCompra->identificacionUsuario?></ns1:Ide_Num_Identific_Dest>
              <ns1:Des_CorreoElectronico>juan.aragon@eiso.com.co</ns1:Des_CorreoElectronico>
              <ns1:Num_Celular><?= $objCompra->objCompraDireccion->celular?></ns1:Num_Celular>
              <ns1:Des_VlrCampoPersonalizado1/>
              
              <ns1:Num_ValorLiquidado>0</ns1:Num_ValorLiquidado>
              <ns1:Des_DiceContener>PRODUCTOS</ns1:Des_DiceContener>
              
              <ns1:Des_TipoGuia>0</ns1:Des_TipoGuia>
              <ns1:Num_VlrSobreflete>0</ns1:Num_VlrSobreflete>
              <ns1:Num_VlrFlete><?= $objCompraDespacho->valorFlete ?></ns1:Num_VlrFlete>
              <ns1:Num_Descuento>0</ns1:Num_Descuento>
              
              <ns1:idePaisOrigen>1</ns1:idePaisOrigen>
              <ns1:idePaisDestino>1</ns1:idePaisDestino>
              
              <ns1:Des_IdArchivoOrigen>1</ns1:Des_IdArchivoOrigen>
              <ns1:Des_DireccionRemitente><?= $objBodega->direccion ?></ns1:Des_DireccionRemitente>
              <ns1:Des_CiudadRemitente><?php echo  $objBodega->objCiudad->codigoDane ?></ns1:Des_CiudadRemitente>
			  <ns1:Num_TelefonoRemitente><?= $objBodega->telefono ?></ns1:Num_TelefonoRemitente>
			  
			  
              <ns1:Num_PesoFacturado>0</ns1:Num_PesoFacturado>
              <ns1:Est_CanalMayorista>false</ns1:Est_CanalMayorista>
              <ns1:Num_IdentiRemitente/>
              
              
              <ns1:Num_Alto>1</ns1:Num_Alto>
              <ns1:Num_Ancho>1</ns1:Num_Ancho>
              <ns1:Num_Largo>1</ns1:Num_Largo>
              
              <ns1:Des_DepartamentoDestino></ns1:Des_DepartamentoDestino>
              <ns1:Des_DepartamentoOrigen></ns1:Des_DepartamentoOrigen>
              <ns1:Gen_Cajaporte>false</ns1:Gen_Cajaporte>
              <ns1:Gen_Sobreporte>false</ns1:Gen_Sobreporte>
              <ns1:Nom_UnidadEmpaque>GENERICO</ns1:Nom_UnidadEmpaque>
              <ns1:Nom_RemitenteCanal/>
              
              <ns1:Des_UnidadLongitud>cm</ns1:Des_UnidadLongitud>
              <ns1:Des_UnidadPeso>kg</ns1:Des_UnidadPeso>
              <ns1:Num_ValorDeclaradoSobreTotal>0</ns1:Num_ValorDeclaradoSobreTotal>
              <ns1:Num_Factura>FACT-001</ns1:Num_Factura>
              
              <ns1:Num_Recaudo>0</ns1:Num_Recaudo>
              
              <ns1:objEnviosUnidadEmpaqueCargue>
              <?php foreach($objCompra->listItems as $position):?>
				
					<?php if($position->unidadesCedi > 0 ):?>
					
						<?php foreach($position->listBodegas as $positionBodega):?>
							<?php if($positionBodega->idBodega == $objBodega->idBodega ):?>
				                <ns1:EnviosUnidadEmpaqueCargue>
				                  
				                  <ns1:Num_Alto><?= $position->objProducto->Profundo ?></ns1:Num_Alto>
				                  <ns1:Num_Largo><?= $position->objProducto->Largo ?></ns1:Num_Largo>
				                  <ns1:Num_Ancho><?= $position->objProducto->Ancho ?></ns1:Num_Ancho>
				                  <ns1:Num_Peso><?= $position->objProducto->PesoUnidad ?></ns1:Num_Peso>
				                  <ns1:Num_Cantidad><?= $positionBodega->cantidad ?></ns1:Num_Cantidad>
				                  <ns1:Des_UnidadLongitud>cm</ns1:Des_UnidadLongitud>
				                  <ns1:Des_UnidadPeso>kg</ns1:Des_UnidadPeso>
				                  <ns1:Des_DiceContener>PRODUCTO DE DESPACHO</ns1:Des_DiceContener>
				                  <ns1:Nom_UnidadEmpaque>GENERICA</ns1:Nom_UnidadEmpaque>
				                  
				                  <!-- 
				                  <ns1:Num_Distribuidor>0</ns1:Num_Distribuidor>
				                  <ns1:Des_IdArchivoOrigen>1</ns1:Des_IdArchivoOrigen>
				                  <ns1:Ide_UnidadEmpaque>00000000-0000-0000-0000-000000000000</ns1:Ide_UnidadEmpaque>
				                  <ns1:Ide_Envio>00000000-0000-0000-0000-000000000000</ns1:Ide_Envio>
				                  <ns1:Num_Volumen>3</ns1:Num_Volumen>
				                  <ns1:Num_Consecutivo>0</ns1:Num_Consecutivo>
				                  <ns1:Num_ValorDeclarado></ns1:Num_ValorDeclarado>
				                   -->
				                </ns1:EnviosUnidadEmpaqueCargue>
                		<?php endif;?>
                	<?php endforeach;?>
                <?php endif;?>
            <?php endforeach;?>
              </ns1:objEnviosUnidadEmpaqueCargue>
              <ns1:Est_EnviarCorreo>false</ns1:Est_EnviarCorreo>
            </ns1:EnviosExterno>
          </ns1:objEnvios>
        </ns1:CargueMasivoExternoDTO>
</ns1:envios>
<!--Optional:-->