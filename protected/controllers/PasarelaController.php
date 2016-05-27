<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PasarelaController
 *
 * @author miguel.sanchez
 */
class PasarelaController extends Controller {

    //put your code here

    public function actionRespuesta() {
        $model = new PasarelaRespuestas;
        $model->tipoRespuesta = PasarelaRespuestas::TIPO_RESPUESTA;
        
        $model->estadoPol = isset($_REQUEST['estado_pol']) ? $_REQUEST['estado_pol'] : 0;
        $model->codigoRespuestaPol = isset($_REQUEST['codigo_respuesta_pol']) ? $_REQUEST['codigo_respuesta_pol'] : 0;
        $model->idCompra = isset($_REQUEST['ref_venta']) ? $_REQUEST['ref_venta'] : null;
        $model->refPol = isset($_REQUEST['ref_pol']) ? $_REQUEST['ref_pol'] : 0;
        $model->mensaje = isset($_REQUEST['mensaje']) ? $_REQUEST['mensaje'] : null;
        $model->medioPago = isset($_REQUEST['medio_pago']) ? $_REQUEST['medio_pago'] : 0;
        $model->tipoMedioPago = isset($_REQUEST['tipo_medio_pago']) ? $_REQUEST['tipo_medio_pago'] : 0;
        $model->cuotas = isset($_REQUEST['cuotas']) ? $_REQUEST['cuotas'] : 0;
        $model->valor = isset($_REQUEST['valor']) ? $_REQUEST['valor'] : 0;
        $model->valorPesos = 0;
        $model->iva = isset($_REQUEST['iva']) ? $_REQUEST['iva'] : 0;
        $model->valorAdicional = isset($_REQUEST['valorAdicional']) ? $_REQUEST['valorAdicional'] : 0;
        $model->moneda = isset($_REQUEST['moneda']) ? $_REQUEST['moneda'] : "";
        $model->cus = isset($_REQUEST['cus']) ? $_REQUEST['cus'] : 0;
        $model->bancoPse = isset($_REQUEST['banco_pse']) ? $_REQUEST['banco_pse'] : "";
        $model->fechaTransaccion = isset($_REQUEST['fecha_procesamiento']) ? $_REQUEST['fecha_procesamiento'] : "";
        
        if($model->idCompra == null){
            $this->log(0, 500, "NUMERO DE COMPRA NO DETECTADO");
        }else{
            try {
                if (!$model->save()) {
                    $this->log($model->idCompra, 504, "ERROR RESPUESTA: INSERTANDO LA TABLA t_PasarelaRespuestas. " . $model->validateErrorsResponse());
                }
            } catch (Exception $exc) {
                $this->log($model->idCompra, 600, "ERROR AL REGISTRAR PASARELA: " . $exc->getMessage());
            }
        }

        $this->render("respuesta", array('model' => $model));
    }

    public function actionConfirmacion() {
        //SE DEFINEN CONTROLES PARA EVIATR ATAQUES
        //if ($_SERVER["REMOTE_ADDR"] == "127.0.0.1") //se debe validar que sea solo por la VPN de PSE
        if (false) { //se debe validar que sea solo por la VPN de PSE
            $this->log(-1, 900, "SERVIDOR NO AUTORIZADO. " . $_SERVER["REMOTE_ADDR"]);
            Yii::app()->end();
        }
        
        if (empty($_POST)) {
            $this->log(-1, 800, "MEDOTO DE INVOCACION NO AUTORIZADO. " . $_SERVER["REMOTE_ADDR"]);
            Yii::app()->end();
        }

        $llavesArreglo = array_keys($_POST);
        $cadenaLog = "";

        for ($i = 0; $i < sizeof($llavesArreglo); $i++) {
            $cadenaLog .= $llavesArreglo[$i] . " -> " . $_POST[$llavesArreglo[$i]];
            if (isset($llavesArreglo[$i + 1])) {
                $cadenaLog .= " | ";
            }
        }
		
	//$this->log(0, 100, $cadenaLog); //Guardar los datos GET de invocacion.
        //$this->log(0, 100, $_SERVER["REMOTE_ADDR"]); //Guardar los datos GET de invocacion.

        //SETEO DE VARIABLES
        $objRespuesta = new PasarelaRespuestas;
        $objRespuesta->tipoRespuesta = PasarelaRespuestas::TIPO_CONFIRMACION;
        $firma = isset($_POST["firma"]) ? $_POST["firma"] : "";

        $objRespuesta->estadoPol = isset($_POST["estado_pol"]) ? trim($_POST["estado_pol"]) : 0;
        $objRespuesta->codigoRespuestaPol = isset($_POST["codigo_respuesta_pol"]) ? trim($_POST["codigo_respuesta_pol"]) : 0;
        $objRespuesta->idCompra = isset($_POST["ref_venta"]) ? trim($_POST["ref_venta"]) : null;
        $objRespuesta->refPol = isset($_POST["ref_pol"]) ? trim($_POST["ref_pol"]) : 0;
        $objRespuesta->medioPago = isset($_POST["medio_pago"]) ? trim($_POST["medio_pago"]) : 0;
        $objRespuesta->tipoMedioPago = isset($_POST["tipo_medio_pago"]) ? trim($_POST["tipo_medio_pago"]) : 0;
        $objRespuesta->cuotas = isset($_POST["cuotas"]) ? trim($_POST["cuotas"]) : 0;
        $objRespuesta->valor = isset($_POST["valor"]) ? trim($_POST["valor"]) :0;
        $objRespuesta->valorPesos = 0;
        $objRespuesta->iva = isset($_POST["iva"]) ? trim($_POST["iva"]) : 0;
        $objRespuesta->valorAdicional = isset($_POST["valorAdicional"]) ? trim($_POST["valorAdicional"]) : 0;
        $objRespuesta->moneda = isset($_POST["moneda"]) ? trim($_POST["moneda"]) : "";
        $objRespuesta->cus = isset($_POST["cus"]) ? trim($_POST["cus"]) : 0;
        $objRespuesta->bancoPse = isset($_POST["banco_pse"]) ? trim($_POST["banco_pse"]) : "";
        $objRespuesta->fechaTransaccion = isset($_POST["fecha_transaccion"]) ? trim($_POST["fecha_transaccion"]) : "";
        $objRespuesta->correoElectronico = isset($_POST["email_comprador"]) ? trim($_POST["email_comprador"]) : null;
        $objRespuesta->numeroVisible = isset($_POST["numero_visible"]) ? trim($_POST["numero_visible"]) : null;
        $objRespuesta->codigoAutorizacion = isset($_POST["codigo_autorizacion"]) ? trim($_POST["codigo_autorizacion"]) : null;
        
        $this->log($objRespuesta->idCompra, 101, $cadenaLog); //Guardar los datos GET de invocacion.
        $this->log($objRespuesta->idCompra, 101, $_SERVER["REMOTE_ADDR"]); //Guardar los datos GET de invocacion.
        
        if (!isset($_POST["ref_venta"]) || !isset($_POST["estado_pol"]) || !isset($_POST["usuario_id"])) {
            $this->log(-1, 700, "VERIFICACION DE VARIBLES PRIMARIAS FALLIDA. " . $_SERVER["REMOTE_ADDR"]);
            Yii::app()->end();
        }

        //PARA OBTENER LOS GET DE PSE DE VERIFICACION DE PAGO
        $this->log($objRespuesta->idCompra, 100, "INICIO TRANSACCION POST."); // Se Guarda el Inicio de la Transaccion

        $firma_cadena = Yii::app()->params->formaPago['pasarela']['llaveEncripcion'] . "~" . Yii::app()->params->formaPago['pasarela']['usuarioId'] . "~" . $objRespuesta->idCompra . "~" . $objRespuesta->valor . "~" . $objRespuesta->moneda . "~" . $objRespuesta->estadoPol;
        $firmacreada = md5($firma_cadena);

        if (strtoupper($firmacreada) != strtoupper($firma)) {
            $this->log($objRespuesta->idCompra, 110, "FIRMAS NO COINCIDEN. " . $firmacreada . " - " . $firma); // Se Guarda el Inicio de la Transaccion
            $mensaje = "El pedido No. " . $objRespuesta->idCompra . " ha sido pagado por la Pasarela de Pagos, pero se ha generado un ERROR DE FIRMAS
                por lo que la transaccion debe ser verificada en el módulo de administracion.";
            $this->correo(4, "", 0, 0, "", $mensaje);
            Yii::app()->end();
        }

        $this->log($objRespuesta->idCompra, 102, "FIRMAS CONINCIDEN. " . $firmacreada . " - " . $firma); // Se Guarda el Inicio de la Transaccion

        try {
            $objCompra = Compras::model()->find(array(
                'with' => "objPasarelaEnvio",
                'condition' => 't.idCompra=:idCompra',
                'params' => array(
                    ':idCompra' => $objRespuesta->idCompra
                )
            ));

            if ($objCompra == null || $objCompra->objPasarelaEnvio == null) {
                //NO EXISTE EL PEDIDO, SE DBE ENVIAR UN CORREO A CALL CENTER PARA VERIFICAR.
                $this->log($objRespuesta->idCompra, 500, "NO EXISTE LA COMPRA. " . $objRespuesta->idCompra);
                $mensaje = "El pedido No. " . $objRespuesta->idCompra . " ha sido pagado por la Pasarela de Pagos, pero se ha generado un NO EXISTE LA COMPRA
                por lo que la transaccion debe ser verificada en el módulo de administracion. CUS " . $objRespuesta->cus;
                $this->correo(4, "", 0, 0, "", $mensaje);
                Yii::app()->end();
            }

            //SE INICIA LA TRANSACION
            $transaction = Yii::app()->db->beginTransaction();

            if ($objRespuesta->estadoPol == 4) {// TRANSACCION APROBADA.
                //ACTUALIZAR t_compras LA COLUMNA documento_cruce, id_punto_venta, id_estado_compra, codigo_operador, saldospdv
                $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['aprobadoPasarela'];
                $objCompra->idOperador = 50;

                if (!$objCompra->save()) {
                    $this->log($objRespuesta->idCompra, 501, "ERROR ACTUALIZANDO LA TABLA t_Compra. " . $objCompra->validateErrorsResponse());
                    $this->correo(3, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico, "APROBADA");

                    try {
                        $transaction->rollBack();
                    } catch (Exception $erbk) {
                        Yii::log($erbk->getMessage() . "\n" . $erbk->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }
                    Yii::app()->end();
                }

                $objEstados = new ComprasEstados;
                $objEstados->idCompra = $objCompra->idCompra;
                $objEstados->idEstadoCompra = $objCompra->idEstadoCompra;
                $objEstados->idOperador = $objCompra->idOperador;

                if (!$objEstados->save()) {
                    $this->log($objRespuesta->idCompra, 502, "ERROR ACTUALIZANDO LA TABLA t_ComprasEstados. " . $objEstados->validateErrorsResponse());
                    $this->correo(3, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico, "APROBADA");

                    try {
                        $transaction->rollBack();
                    } catch (Exception $erbk) {
                        Yii::log($erbk->getMessage() . "\n" . $erbk->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }
                    Yii::app()->end();
                }

                $objObservacion = new ComprasObservaciones;
                $objObservacion->idCompra = $objCompra->idCompra;
                $objObservacion->observacion = 'Cambio de Estado Aprobado Pasarela';
                $objObservacion->idOperador = $objCompra->idOperador;
                $objObservacion->notificarCliente = 0;

                if (!$objObservacion->save()) {
                    $this->log($objRespuesta->idCompra, 503, "ERROR ACTUALIZANDO LA TABLA t_ComprasObservaciones. " . $objObservacion->validateErrorsResponse());
                    $this->correo(3, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico, "APROBADA");

                    try {
                        $transaction->rollBack();
                    } catch (Exception $erbk) {
                        Yii::log($erbk->getMessage() . "\n" . $erbk->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }
                    Yii::app()->end();
                }

                //AQUI VUELVE Y SE COLOCA EN ESTADO 1 PENDIENTE PARA QUE SEA TRAMITADO POR EL CALL CENTER
                $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['subasta'];

                if (!$objCompra->save()) {
                    $this->log($objRespuesta->idCompra, 501, "ERROR ACTUALIZANDO LA TABLA t_Compras. " . $objCompra->validateErrorsResponse());
                    $this->correo(3, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico, "APROBADA");

                    try {
                        $transaction->rollBack();
                    } catch (Exception $erbk) {
                        Yii::log($erbk->getMessage() . "\n" . $erbk->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }
                    Yii::app()->end();
                }

                //REGISTRAR RESPUESTA
                if (!$objRespuesta->save()) {
                    $this->log($objRespuesta->idCompra, 504, "ERROR INSERTANDO LA TABLA t_PasarelaRespuestas. " . $objRespuesta->validateErrorsResponse());
                    $this->correo(3, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico, "APROBADA");

                    try {
                        $transaction->rollBack();
                    } catch (Exception $erbk) {
                        Yii::log($erbk->getMessage() . "\n" . $erbk->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }
                    Yii::app()->end();
                }

                $this->log($objRespuesta->idCompra, 1000, "PROCESO EXITOSO TRANSACCION APROBADA.");
                $this->correo(1, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico);
            } else {
                //ACTUALIZAR t_compras LA COLUMNA documento_cruce, id_punto_venta, id_estado_compra, codigo_operador, saldospdv
                if($objRespuesta->estadoPol == 7){
                    $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['validacionManualPasarela'];
                }else{
                    $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['negadoPasarela'];
                }
                
                $objCompra->idOperador = 50;

                if (!$objCompra->save()) {
                    $this->log($objRespuesta->idCompra, 501, "ERROR ACTUALIZANDO LA TABLA t_Compras. " . $objCompra->validateErrorsResponse());
                    $this->correo(3, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico, ($objRespuesta->estadoPol == 7 ? "VALIDACION PASARELA" : "RECHAZADA"));

                    try {
                        $transaction->rollBack();
                    } catch (Exception $erbk) {
                        Yii::log($erbk->getMessage() . "\n" . $erbk->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }
                    Yii::app()->end();
                }

                //INSERTARR en t_ComprasEstados
                $objEstados = new ComprasEstados;
                $objEstados->idCompra = $objCompra->idCompra;
                $objEstados->idEstadoCompra = $objCompra->idEstadoCompra;
                $objEstados->idOperador = $objCompra->idOperador;

                if (!$objEstados->save()) {
                    $this->log($objRespuesta->idCompra, 502, "ERROR ACTUALIZANDO LA TABLA t_ComprasEstados. " . $objEstados->validateErrorsResponse());
                    $this->correo(3, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico, ($objRespuesta->estadoPol == 7 ? "VALIDACION PASARELA" : "RECHAZADA"));

                    try {
                        $transaction->rollBack();
                    } catch (Exception $erbk) {
                        Yii::log($erbk->getMessage() . "\n" . $erbk->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }
                    Yii::app()->end();
                }

                //INSERTAR EN t_ComprasObservaciones
                $objObservacion = new ComprasObservaciones;
                $objObservacion->idCompra = $objCompra->idCompra;
                $objObservacion->idOperador = $objCompra->idOperador;
                $objObservacion->notificarCliente = 0;
                
                if($objRespuesta->estadoPol == 7)
                    $objObservacion->observacion = 'Cambio de Estado Validacion Manual Pasarela';
                else
                    $objObservacion->observacion = 'Cambio de Estado Rechazada Pasarela';

                if (!$objObservacion->save()) {
                    $this->log($objRespuesta->idCompra, 503, "ERROR ACTUALIZANDO LA TABLA t_ComprasObservaciones. " . $objObservacion->validateErrorsResponse());
                    $this->correo(3, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico, ($objRespuesta->estadoPol == 7 ? "VALIDACION PASARELA" : "RECHAZADA"));

                    try {
                        $transaction->rollBack();
                    } catch (Exception $erbk) {
                        Yii::log($erbk->getMessage() . "\n" . $erbk->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }
                    Yii::app()->end();
                }

                //REGISTRAR RESPUESTA
                if (!$objRespuesta->save()) {
                    $this->log($objRespuesta->idCompra, 504, "ERROR INSERTANDO LA TABLA t_PasarelaRespuestas. " . $objRespuesta->validateErrorsResponse());
                    $this->correo(3, $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico, ($objRespuesta->estadoPol == 7 ? "VALIDACION PASARELA" : "RECHAZADA"));

                    try {
                        $transaction->rollBack();
                    } catch (Exception $erbk) {
                        Yii::log($erbk->getMessage() . "\n" . $erbk->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }
                    Yii::app()->end();
                }
                
                $this->log($objRespuesta->idCompra, 1000, "PROCESO EXITOSO TRANSACCION RECHAZADA.");
                $this->correo(($objRespuesta->estadoPol == 7 ? 5 : 2), $objCompra->objPasarelaEnvio->nombre, $objCompra->idCompra, $objCompra->objPasarelaEnvio->valor, $objCompra->objPasarelaEnvio->correoElectronico);
            }

            $transaction->commit();
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

            $this->log($objRespuesta->idCompra, 600, "ERROR DE CONEXION CON LA BD DE LA REBAJA VIRTUAL. " . $exc->getMessage());

            if ($objRespuesta->estadoPol == 4) {
                //ENVIAR CORREO A CALL CENTER PARA TRAMITAR LA VENTA
                $mensaje = "El pedido No. " . $objRespuesta->idCompra . " ha sido pagado por la Pasarela de Pagos, pero se ha generado un ERROR DE CONEXION CON LA BD DE LA REBAJA VIRTUAL
            por lo que la transaccion debe ser verificada en el módulo de administracion. IMPORTANTE: La Transaccion ha sido APROBADA. CUS " . $objRespuesta->cus;
                //mail(PARA_CALLCENTER, "Revision Transaccion Pasarela", $mensaje, $cabeceras, "-f alexander_javela@copservir.com");
                $this->correo(4, "", 0, 0, "", $mensaje);
            } else {
                //ENVIAR CORREO A CALL CENTER PARA TRAMITAR LA VENTA
                $mensaje = "El pedido No. " . $objRespuesta->idCompra . " ha sido pagado por la Pasarela de Pagos, pero se ha generado un ERROR DE CONEXION CON LA BD DE LA REBAJA VIRTUAL
            por lo que la transaccion debe ser verificada en el módulo de administracion. IMPORTANTE: La Transaccion ha sido RECHAZADA. CUS " . $objRespuesta->cus;
                $this->correo(4, "", 0, 0, "", $mensaje);
            }
        }
    }

    protected function log($pedido = 0, $tipo = 0, $cadena = "") {
        $archivo = fopen(Yii::app()->basePath . DS . 'runtime' . DS . '/pse.log', 'a+');
        fwrite($archivo, $pedido . " | " . $tipo . " | " . $cadena . " | ");
        fwrite($archivo, date("Y-m-d H:i:s") . "\r\n");
        fclose($archivo);
    }

    public function actionLog(){
        try {
            $this->log(589655225, 1000, "PRUEBA LOG.");
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
        }
    }

    protected function correo($tipo_correo = 1, $nombre = "", $numeroPedido = 0, $valorCompra = 0, $correoCliente = "", $menEstado = "") {
        switch ($tipo_correo) {
            case 1: // TRANSACCION APROBADA.
                $contenido = $this->renderPartial('correoAprobada', array('nombre'=>$nombre,'numeroPedido'=>$numeroPedido,'valorCompra'=>$valorCompra), true);
                try{
                    sendHtmlEmail($correoCliente, "La Rebaja Virtual: Informacion Transaccion", $contenido);
                }  catch (Exception $exc){}
                break;
            case 2: // TRANSACCION RECHAZADA.
                $contenido = $this->renderPartial('correoRechazada', array('nombre'=>$nombre,'numeroPedido'=>$numeroPedido,'valorCompra'=>$valorCompra), true);
                try{
                    sendHtmlEmail($correoCliente, "La Rebaja Virtual: Informacion Transaccion", $contenido);
                }  catch (Exception $exc){}
                break;
            case 3: //VERIFICACION CALL CENTER.
                $contenido = $this->renderPartial('correoCentroContacto', array('estado'=>$menEstado,'numeroPedido'=>$numeroPedido,'valorCompra'=>$valorCompra), true);
                try{
                    sendHtmlEmail(Yii::app()->params->callcenter['correo'], "La Rebaja Virtual: Verificacion Transaccion", $contenido);
                }  catch (Exception $exc){}
                break;
            case 4: //CORREO PARA REVISION DEL CALL CENETR
                try{
                    sendHtmlEmail(Yii::app()->params->callcenter['correo'], "La Rebaja Virtual: Informacion Transaccion", $menEstado);
                }  catch (Exception $exc){}
                break;
            case 5:
                $contenido = $this->renderPartial('correoVerificacion', array('nombre'=>$nombre,'numeroPedido'=>$numeroPedido,'valorCompra'=>$valorCompra), true);
                try{
                    sendHtmlEmail($correoCliente, "La Rebaja Virtual: Informacion Transaccion", $contenido);
                }  catch (Exception $exc){}
                break;
        }
    }

}
