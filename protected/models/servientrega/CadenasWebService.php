<?php

class CadenasWebService {

    public function obtenerCadenaLogin() {
        /*return "<Login>
                    <Username>" . Yii::$app->params["iSoat"]["isoatUser"] . "</Username>
                    <Password>" . Yii::$app->params["iSoat"]["isoatPassword"] . "</Password>
                    <CompanyCode>" . Yii::$app->params["iSoat"]["isoatCompanyCode"] . "</CompanyCode>
                    <CountryCode>" . Yii::$app->params["iSoat"]["isoatCountry"] . "</CountryCode> 
                </Login>";*/
                return "";
    }

    public function generarGuia() {
        $cadena = "<tem:CargueMasivoExterno>
				      <!--Optional:-->
				         <tem:envios>
				        <!--Zero or more repetitions:-->
				            <tem:CargueMasivoExternoDTO>
				          <!--Optional:-->
				               <tem:objEnvios>
				            <!--Zero or more repetitions:-->
				                  <tem:EnviosExterno id_zonificacion='?' des_codigopostal='?'>
				                     <!--PRODUCTO DOCUMENTO VALORES DESDE 1 K Y HASTA 50 K:-->
				                     <!--CARACTETISTICAS DEL ENVIO:-->
				                     <tem:Num_Guia>0</tem:Num_Guia>
				                     <tem:Num_Sobreporte>0</tem:Num_Sobreporte>
				                     <tem:Num_SobreCajaPorte>0</tem:Num_SobreCajaPorte>
				                     <tem:Fec_TiempoEntrega>1</tem:Fec_TiempoEntrega>
				                     <tem:Des_TipoTrayecto>1</tem:Des_TipoTrayecto>
				                     <tem:Ide_CodFacturacion>SER408</tem:Ide_CodFacturacion>
				                     <tem:Num_Piezas>1</tem:Num_Piezas> <!--CUANDO SEA MERCANCIA INDUSTRIAL (Producto 6) COLOCAR LA CANTIDAD DE PIEZAS FISICAS DEL ENVIO:-->
				                     <tem:Des_FormaPago>2</tem:Des_FormaPago>
				                     <tem:Des_MedioTransporte>1</tem:Des_MedioTransporte> 
				                     <tem:Des_TipoDuracionTrayecto>1</tem:Des_TipoDuracionTrayecto>                   
				                     <tem:Nom_TipoTrayecto>1</tem:Nom_TipoTrayecto>
				                     <tem:Num_Alto>5</tem:Num_Alto>
				                     <tem:Num_Ancho>5</tem:Num_Ancho>
				                     <tem:Num_Largo>5</tem:Num_Largo>
				                     <tem:Num_PesoTotal>4</tem:Num_PesoTotal>
				                     <tem:Des_UnidadLongitud>cm</tem:Des_UnidadLongitud>
				                     <tem:Des_UnidadPeso>kg</tem:Des_UnidadPeso>
				                     <tem:Nom_UnidadEmpaque>GENERICO</tem:Nom_UnidadEmpaque> <!--ingresar el nombre de la unidad de empaque que se encuentre registrada en sisclinet:-->
				                     <tem:Gen_Cajaporte>false</tem:Gen_Cajaporte>
				                     <tem:Gen_Sobreporte>false</tem:Gen_Sobreporte>
				                     <tem:Des_DiceContenerSobre>?</tem:Des_DiceContenerSobre> <!--dice contener solon para producto sobreporte:-->
				                     
				                     <!--CAMPOS OPCIONALES CON CAIDA IMPRESA EN LA GUIA:-->
				                     <tem:Doc_Relacionado>Valor10</tem:Doc_Relacionado> <!--campo remision en la guia:-->
				                     <tem:Des_VlrCampoPersonalizado1>Novedades 3166913218</tem:Des_VlrCampoPersonalizado1><!--observaciones para la entrega hasta 60 caracteres:-->
				                     <tem:Ide_Num_Referencia_Dest>Valor12</tem:Ide_Num_Referencia_Dest> <!--campo Ref2 en formato de guia sticker:-->
				                     <tem:Num_Factura>valor13</tem:Num_Factura>
				                    
				                     <!--TIPO DE PRODUCTO A UTILIZAR DE SERVIENTREGA:-->
				                     <tem:Ide_Producto>2</tem:Ide_Producto> <!--codigos del tipo de producto negociado con Servientrega:-->
				                     <tem:Num_Recaudo>0</tem:Num_Recaudo> <!--valor a recaudar, solo aplica para logistica para cobro:-->
				
				                     <!--OTRA INFORMACION, DEJAR SIEMPRE FIJA:-->
				                     <tem:Ide_Destinatarios>00000000-0000-0000-0000-000000000000</tem:Ide_Destinatarios>
				                     <tem:Ide_Manifiesto>00000000-0000-0000-0000-000000000000</tem:Ide_Manifiesto>
				                     <tem:Num_BolsaSeguridad>0</tem:Num_BolsaSeguridad>
				                     <tem:Num_Precinto>0</tem:Num_Precinto>
				                     <tem:Num_VolumenTotal>0</tem:Num_VolumenTotal>                     
				                     <tem:Des_DireccionRecogida>0</tem:Des_DireccionRecogida> <!--no aplica, enviar 0:-->
				                     <tem:Des_TelefonoRecogida>0</tem:Des_TelefonoRecogida> <!--no aplica, enviar 0:-->
				                     <tem:Des_CiudadRecogida/> <!--no aplica, enviar 0:-->
				                     <tem:Num_PesoFacturado>0</tem:Num_PesoFacturado>
				                     <tem:Des_TipoGuia>2</tem:Des_TipoGuia>
				                     <tem:Id_ArchivoCargar></tem:Id_ArchivoCargar>
				                     <tem:Des_CiudadOrigen>0</tem:Des_CiudadOrigen> <!--dejar en 0:-->
				
				                     <!--VALORES:-->
				                     <tem:Num_ValorDeclaradoTotal>24150</tem:Num_ValorDeclaradoTotal> <!--valor declarado del envio total:-->
				                     <tem:Num_ValorLiquidado>0</tem:Num_ValorLiquidado>
				                     <tem:Num_VlrSobreflete>0</tem:Num_VlrSobreflete>
				                     <tem:Num_VlrFlete>0</tem:Num_VlrFlete>
				                     <tem:Num_Descuento>0</tem:Num_Descuento>
				                     <tem:Num_ValorDeclaradoSobreTotal>0</tem:Num_ValorDeclaradoSobreTotal>
				                    
				                     <!--INFORMACION DEL DESTINATARIO:-->
				                     <tem:Des_Telefono>3134079955</tem:Des_Telefono> <!--Telefono Destinatario-->
				                     <tem:Des_Ciudad>73449000</tem:Des_Ciudad> <!--Ciudad de Destino:-->
				                     <tem:Des_DepartamentoDestino>47268000</tem:Des_DepartamentoDestino> <!--nombre o codigo DANE de departamento de destino:-->
				                     <tem:Des_Direccion>calle 6 #24-39-local 1 centro</tem:Des_Direccion> <!--Direccion de Destino:-->
				                     <tem:Nom_Contacto>david franco</tem:Nom_Contacto> <!--Nombre de Destinatario:-->
				                     <tem:Des_DiceContener>Productos de inventario copservir</tem:Des_DiceContener> <!--conteneido del envio hasta 20 caracteres:-->
				                     <tem:Ide_Num_Identific_Dest>1000100530100</tem:Ide_Num_Identific_Dest> <!--identificacion de destinario :-->
				                     <tem:Num_Celular></tem:Num_Celular> <!--numero de celular de destinatario:-->
				                     <tem:Des_CorreoElectronico>juan.franco@servientrega.com</tem:Des_CorreoElectronico>
				
				                    <!--INFORMACION DEL REMITENTE:-->
				                    <tem:Des_CiudadRemitente></tem:Des_CiudadRemitente> <!--ciudad de remitente:--> 
				                    <tem:Des_DireccionRemitente></tem:Des_DireccionRemitente> <!--direccion del remitente:--> 
				                    <tem:Des_DepartamentoOrigen></tem:Des_DepartamentoOrigen> <!--nombre o codigo DANE de departamento de Origen:-->
				                    <tem:Num_TelefonoRemitente></tem:Num_TelefonoRemitente> <!--telefono del remitente:-->
				                    <tem:Num_IdentiRemitente></tem:Num_IdentiRemitente> <!--identificacion del remitente:-->
				                    <tem:Nom_Remitente></tem:Nom_Remitente> <!--no aplica, dejar vacio:-->
				                    
				                    <!--MAYORISTA , NO APICA PARA CLIENTES:-->
				                     <tem:Est_CanalMayorista>false</tem:Est_CanalMayorista>
				                     <tem:Nom_RemitenteCanal/>            
				                     
				                    <!--UTILIZADO PARA ASOCIAAR LAS PIEZAS AL ENVIO EN MERCANCIA INDUSTRIAL:-->
				                     <tem:Des_IdArchivoOrigen>1000100530100</tem:Des_IdArchivoOrigen> 
				         
				                      <!--NODO DE MERCANCIA INDUSTRIAL, PIEZAS DEL ENVIO, CUANDO SEA MAS DE 1 PIEZA CON DIFERENTES DIMENSIONES REPETIR NODO:-->
				                     <tem:objEnviosUnidadEmpaqueCargue>
				                		<!--Zero or more repetitions:-->
				                        <tem:EnviosUnidadEmpaqueCargue>
				                           <tem:Num_Alto>5</tem:Num_Alto>
				                           <tem:Num_Distribuidor>0</tem:Num_Distribuidor>
				                           <tem:Num_Ancho>5</tem:Num_Ancho>
				                           <tem:Num_Cantidad>1</tem:Num_Cantidad>
				                           <!--Optional:-->
				                           <tem:Des_DiceContener>?</tem:Des_DiceContener>
				                           <!--Optional:-->
				                           <tem:Des_IdArchivoOrigen>1000100530100</tem:Des_IdArchivoOrigen>
				                           <tem:Num_Largo>5</tem:Num_Largo>
				                           <!--Optional:-->
				                           <tem:Nom_UnidadEmpaque>VARIOS</tem:Nom_UnidadEmpaque>
				                           <tem:Num_Peso>1</tem:Num_Peso>
				                           <!--Optional:-->
				                           <tem:Des_UnidadLongitud>?</tem:Des_UnidadLongitud>
				                           <!--Optional:-->
				                           <tem:Des_UnidadPeso>?</tem:Des_UnidadPeso>
				                           <tem:Ide_UnidadEmpaque>00000000-0000-0000-0000-000000000000</tem:Ide_UnidadEmpaque>
				                           <tem:Ide_Envio>00000000-0000-0000-0000-000000000000</tem:Ide_Envio>
				                           <!--Optional:-->
				                           <tem:Num_Volumen>?</tem:Num_Volumen>
				                          
				                           <tem:Num_Consecutivo>0</tem:Num_Consecutivo>
				                           <!--Optional:-->
				                           <tem:Cod_Facturacion>?</tem:Cod_Facturacion>
				                           <!--Optional:-->
				                           <tem:Num_ValorDeclarado>1</tem:Num_ValorDeclarado>
				                           <!--Optional:-->
				                           <tem:Indicador>1</tem:Indicador>
				                           <!--Optional:-->
				                           <tem:NumeroDeCaja>?</tem:NumeroDeCaja>
				                           <!--Optional:-->
				                           <tem:Id_archivo>?</tem:Id_archivo>
				                        </tem:EnviosUnidadEmpaqueCargue>
				                     </tem:objEnviosUnidadEmpaqueCargue>
				                  </tem:EnviosExterno>
				               </tem:objEnvios>
				            </tem:CargueMasivoExternoDTO>
				         </tem:envios>
				         <!--Optional:-->
				         <tem:arrayGuias>
				            <!--Zero or more repetitions:-->
				            <tem:string>?</tem:string>
				         </tem:arrayGuias>
				      </tem:CargueMasivoExterno> ";

        		return $cadena;
    }

    public function obtenerCotizacion($modelo) {
        $Fecha1 = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y"));
        $FechaIni = date("Y-m-d", $Fecha1);
        $Fecha2 = strtotime('+1 year', $Fecha1);
        $Fecha2 = strtotime('-1 day', $Fecha2);
//        $Fecha2 = mktime(0, 0, 0, date("m"), date("d") + 1, date("Y") + 1);
//        echo date("Y-m-d", $Fecha2)."--";
//        $Fecha2 = strtotime ( '-1 day' , $Fecha2 ) ;
        $FechaFin = date("Y-m-d", $Fecha2);
//        echo $FechaFin."--";
        //echo $FechaIni." -- ".$FechaFin;
        //exit();


        $cadena = "<CalculateInsurancePolicyReq>" . $this->obtenerCadenaLogin() . "
                        <Data>
                            <LiquidationTypeId>" . Yii::$app->params['tipoLiquidacion'] . "</LiquidationTypeId>
                            <FromValidateDate>" . $FechaIni . "T00:00:00</FromValidateDate>
                            <DueValidateDate>" . $FechaFin . "T23:59:00</DueValidateDate>
                            <Vehicle>
                                <ServiceTypeId>$modelo->IdTipoServicio</ServiceTypeId>
                                <VehicleClassId>$modelo->IdClaseVehiculo</VehicleClassId>
                                <VehicleYear>$modelo->ModeloVehiculo</VehicleYear>
                                <CylinderCapacity>$modelo->Cilindraje</CylinderCapacity>
                                <PassengerCapacity>$modelo->CantidadPasajeros</PassengerCapacity>
                            </Vehicle>
                        </Data>
                    </CalculateInsurancePolicyReq>";

        return $cadena;
    }

    public function obtenerDatosTomador($IdTipoDocumento, $NumeroDocumento) {
        $cadena = "<GetContactReq>" . $this->obtenerCadenaLogin() . "
                    <Data>
                        <DocumentType>$IdTipoDocumento</DocumentType>
                        <DocumentNumber>$NumeroDocumento</DocumentNumber>
                    </Data>
                </GetContactReq>";

        return $cadena;
    }

    public function obtenerEmisionPresupuesto($modelo) {
        $cadena = "<NewInsurancePolicyReq>" . $this->obtenerCadenaLogin() . "
                    <Data>
                        <Operation>" . Yii::$app->params['operacion']['registroPresupuesto'] . "</Operation>
                        <LiquidationTypeId>" . Yii::$app->params['tipoLiquidacion'] . "</LiquidationTypeId>
                        <FromValidateDate>" . $modelo->FechaInicioSoat . "T00:00:00</FromValidateDate>
                        <DueValidateDate>" . $modelo->FechaFinSoat . "T23:59:00</DueValidateDate>
                        <TypeActiveStatusId>" . Yii::$app->params['tipoMovimiento'] . "</TypeActiveStatusId>
                        <Observations>" . Yii::$app->params["observacion"] . "</Observations>

                        <Holder>
                            <DocumentTypeIdHolder>$modelo->TipoDocumentoTomador</DocumentTypeIdHolder>
                            <DocumentNumberHolder>$modelo->NumeroDocumentoTomador</DocumentNumberHolder>
                            <LastNameHolder>$modelo->PrimerApellidoTomador</LastNameHolder>
                            <LastName1Holder>$modelo->SegundoApellidoTomador</LastName1Holder>
                            <FirstNameHolder>$modelo->PrimerNombreTomador</FirstNameHolder>
                            <FirstName1Holder>$modelo->SegundoNombreTomador</FirstName1Holder>
                            <TelephoneHolder>$modelo->TelefonoTomador</TelephoneHolder>
                            <EmailHolder>$modelo->EmailTomador</EmailHolder>
                            <AddressHolder>$modelo->DireccionTomador</AddressHolder>
                            <CityIdHolder>$modelo->CiudadTomador</CityIdHolder>
                            <StateIdHolder>" . $modelo->ciudadTomador->IdDepartamento . "</StateIdHolder>
                            <EconomicActivityId>" . Yii::$app->params["actividadEconomicaTomador"] . "</EconomicActivityId>
                        </Holder>";
        if ($modelo->TomadorPropietario == 0) {
            $cadena .= "<Buyer>
                            <DocumentTypeIdBuyer>$modelo->TipoDocumentoPropietario</DocumentTypeIdBuyer>
                            <DocumentNumberBuyer>$modelo->NumeroDocumentoPropietario</DocumentNumberBuyer>
                            <LastNameBuyer>$modelo->PrimerApellidoPropietario</LastNameBuyer>
                            <LastName1Buyer>$modelo->SegundoApellidoPropietario</LastName1Buyer>
                            <FirstNameBuyer>$modelo->PrimerNombrePropietario</FirstNameBuyer>
                            <FirstName1Buyer>$modelo->SegundoNombrePropietario</FirstName1Buyer>
                            <TelephoneBuyer>$modelo->TelefonoPropietario</TelephoneBuyer>
                            <EmailBuyer>$modelo->EmailPropietario</EmailBuyer>
                            <AddressBuyer>$modelo->DireccionPropietario</AddressBuyer>
                            <CityIdBuyer>$modelo->CiudadPropietario</CityIdBuyer>
                            <StateIdBuyer>" . $modelo->ciudadPropietario->IdDepartamento . "</StateIdBuyer>
                    </Buyer>";
        } else {
            //$cadena .= "<Buyer d3p1:nil='true'/>";
        }

        $cadena .= "<Vehicle>
                        <NumberPlate>$modelo->Placa</NumberPlate>
                        <VehicleTypeId>$modelo->IdTipoVehiculo</VehicleTypeId>
                        <ServiceTypeId>$modelo->IdTipoServicio</ServiceTypeId>
                        <VehicleClassId>$modelo->IdClaseVehiculo</VehicleClassId>
                        <VehicleClassMinistryId>$modelo->IdClaseMinisterio</VehicleClassMinistryId>
                        <BrandId>$modelo->IdMarcaVehiculo</BrandId>
                        <BrandLineId>$modelo->IdLineaVehiculo</BrandLineId>
                        <VehicleLineDescription>" . $modelo->idMarcaVehiculo->idLineaVehiculo->NombreLinea . "</VehicleLineDescription>
                        <VehicleYear>$modelo->ModeloVehiculo</VehicleYear>
                        <CylinderCapacity>$modelo->Cilindraje</CylinderCapacity>
                        <PassengerCapacity>$modelo->CantidadPasajeros</PassengerCapacity>
                        <MotorNumber>$modelo->NumeroMotor</MotorNumber>
                        <ChasisNumber>$modelo->NumeroChasis</ChasisNumber>
                        <Vin>$modelo->VIN</Vin>
                        <CountryId>" . Yii::$app->params["iSoat"]["isoatCountry"] . "</CountryId>
                    </Vehicle>";

        /* <Payments>
          <Payment>
          <MethodOfPaymentId>".Yii::$app->params["metodoPago"]."</MethodOfPaymentId>
          <PaymentAmount>$modelo->ValorCompra</PaymentAmount>
          </Payment>
          </Payments>"; */

        $cadena .= "</Data>
            </NewInsurancePolicyReq>";

        return $cadena;
    }

    public function obtenerCobroPresupuesto($modelo) {
        $cadena = "<NewInsurancePolicyFromBudgetReq>" . $this->obtenerCadenaLogin() . "
                        <Data>
                            <InsurancePolicyNumber>$modelo->NumeroPoliza</InsurancePolicyNumber>
                            <Operation>" . Yii::$app->params['operacion']['cobroPresupuesto'] . "</Operation>
                            <Payments>
                                <Payment>
                                    <MethodOfPaymentId>" . Yii::$app->params["metodoPago"] . "</MethodOfPaymentId>
                                    <PaymentAmount>$modelo->SubtotalCompra</PaymentAmount>
                                </Payment>
                            </Payments>
                        </Data>
                   </NewInsurancePolicyFromBudgetReq>";

        return $cadena;
    }

}
