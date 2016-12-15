<?php

class AdminController extends ControllerSubasta {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            //'access',
            'login + index, pedidos, detallepedido',
                //'loginajax + direccionActualizar',
        );
    }

    /*
      public function filters() {
      return array(
      array('tienda.filters.AccessControlFilter'),
      array('tienda.filters.LanzamientoControlFilter'),
      );
      } */

    public function filterAccess($filter) {
        if (!Yii::app()->controller->module->user->isGuest) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $filter->run();
    }

    public function filterLogin($filter) {
        if (Yii::app()->controller->module->user->isGuest) {
            $this->redirect(Yii::app()->controller->module->user->loginUrl);
        }
        $filter->run();
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionRecordarclave() {
        $model = new RegistroForm('');
        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];
            $model->validate();
        }
        $this->render('recordarClave', array('model' => $model));
    }

    public function actionPedidos() {
        $this->layout = "simple";
        $objCiudadSector = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['objCiudadSector']];
        $idComercial = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']];
        // if (is_numeric($parametro)) {
        $model = new Compras('search');
        $model->unsetAttributes();
        if (isset($_GET['Compras']))
            $model->attributes = $_GET['Compras'];

        $model->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['subasta'];

        //$model->tipoEntrega = Yii::app()->params->entrega["tipo"]['domicilio'];
        $model->seguimiento = null;
        //    $fecha = Compras::calcularFechaVisualizar();
        //    $model->fechaCompra = $fecha;

        $model->codigoSector = $objCiudadSector->codigoSector;
        $model->codigoCiudad = $objCiudadSector->codigoCiudad;
        $sort = "t.fechaCompra DESC";
        $this->render('pedidos', array(
            'model' => $model,
            'dataProvider' => $model->search(array('order' => $sort, 'operadorPedido' => true)),
                // 'arrCantidadPedidos' => Compras::cantidadComprasPDVPorEstado($fecha, null, $idComercial, $objCiudadSector->codigoSector, $objCiudadSector->codigoCiudad)
        ));
//        } else {
//            if ($parametro == 'busqueda') {
//                if (!isset(Yii::app()->session[Yii::app()->params->callcenter['sesion']['formPedidoBusqueda']])) {
//                    Yii::app()->session[Yii::app()->params->callcenter['sesion']['formPedidoBusqueda']] = null;
//                }
//
//                $this->busquedas();
//                Yii::app()->end();
//            } else if ($parametro == 'seguimiento') {
//                $model = new Compras('search');
//                $model->unsetAttributes();
//                if (isset($_GET['Compras']))
//                    $model->attributes = $_GET['Compras'];
//
//                //$model->tipoEntrega = Yii::app()->params->entrega["tipo"]['domicilio'];
//                $model->seguimiento = 1;
//                $fecha = Compras::calcularFechaVisualizar();
//                $model->fechaCompra = null;
//
//                $this->render('pedidos', array(
//                    'model' => $model,
//                    'dataProvider' => $model->search(array('order' => 't.fechaCompra DESC', 'operadorPedido' => true)),
//                    'arrCantidadPedidos' => Compras::cantidadComprasPorEstado($fecha)
//                ));
//            } else if ($parametro == 'enlinea') {
//                $model = new Compras('search');
//                $model->unsetAttributes();
//                if (isset($_GET['Compras']))
//                    $model->attributes = $_GET['Compras'];
//
//                $fecha = Compras::calcularFechaVisualizar();
//                $model->fechaCompra = $fecha;
//
//                $this->render('pedidos', array(
//                    'model' => $model,
//                    'dataProvider' => $model->search(array('order' => 't.fechaCompra DESC', 'formaPago' => Yii::app()->params->formaPago['pasarela']['idPasarela'], 'operadorPedido' => true)),
//                    'arrCantidadPedidos' => Compras::cantidadComprasPorEstado($fecha)
//                ));
//            }else {
//                echo "NOT IMPLEMENTED YET";
//            }
//        }
    }

    private function busquedas() {
        $form = null;
        $model = null;
        $post = false;

        if (isset($_POST['FormBusqueda'])) {
            $post = true;
            Yii::app()->session[Yii::app()->params->callcenter['sesion']['formPedidoBusqueda']] = $_POST['FormBusqueda'];
        }

        $form = Yii::app()->session[Yii::app()->params->callcenter['sesion']['formPedidoBusqueda']];

        if (isset($_GET['ajax']) && $_GET['ajax'] = "pedidos-grid") {
            $post = true;
            $model = new Compras('search');
            $model->unsetAttributes();
        }

        if ($post && $model === null)
            $model = new Compras('search');

        $this->render('busqueda', array(
            'model' => $model,
            'form' => $form,
            'arrCantidadPedidos' => Compras::cantidadComprasPorEstado(null)
        ));
    }

//    public function actionRemisionborrar() {
//        $model = new RemisionForm;
//
//        if (isset($_POST['RemisionForm'])) {
//            $model->attributes = $_POST['RemisionForm'];
//
//            $model->attributes['idCompra'];
//            $model->attributes['idComercial'];
//
//            $objCompra = Compras::model()->findByPk($model->attributes['idCompra'], array("with" => "objPuntoVenta"));
//            $objPuntoVenta = PuntoVenta::model()->find("idComercial=:idcomercial", array("idcomercial" => $model->attributes['idComercial']
//            ));
//
//            if ($objCompra === null) {
//                // echo CJSON::encode(array('result' => 0, 'response' => 'Este pedido no existe o no existe el punto de venta registrado.'));
//                Yii::app()->end();
//            }
//
//            try {
//                $client = new SoapClient(null, array(
//                    'location' => Yii::app()->params->webServiceUrl['remisionPosECommerce'],
//                    'uri' => "",
//                    'trace' => 1
//                ));
//
//                $result = $client->__soapCall("BorrarCongelada", array('idPedido' => $model->attributes['idCompra'], 'destino' => $model->attributes['idComercial']));
//
//                if (!$result[0] == 1) {
//
//                    Yii::app()->user->setFlash('alert alert-success', "La remisión ha sido borrada con éxito del punto de venta " . $model->attributes['idComercial']);
//                    /*
//                      $transaction = Yii::app()->db->beginTransaction();
//                      try {
//
//                      /*$objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['remisionBorrada'];
//                      $objCompra->generarDocumentoCruce(Yii::app()->controller->module->user->id);
//
//                      // Guardar el cambio de estado de la remisión
//                      if (!$objCompra->save()) {
//                      throw new Exception('Error de asignación: ' . $objCompra->validateErrorsResponse());
//                      }
//
//                      $objEstadoCompra = new ComprasEstados;
//                      $objEstadoCompra->idCompra = $objCompra->idCompra;
//                      $objEstadoCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['remisionBorrada'];
//                      $objEstadoCompra->idOperador = Yii::app()->controller->module->user->id;
//
//                      // guardar en ComprasEstados
//                      if (!$objEstadoCompra->save()) {
//                      throw new Exception("Error al guardar traza de estado: " . $objEstadoCompra->validateErrorsResponse());
//                      }
//
//
//                      $objObservacion = new ComprasObservaciones;
//                      $objObservacion->idCompra = $objCompra->idCompra;
//                      $objObservacion->observacion = "Cambio de Estado: Remisión borrada del POS del PDV. " . $objPuntoVenta->nombrePuntoDeVenta;
//                      $objObservacion->idOperador = Yii::app()->controller->module->user->id;
//                      $objObservacion->notificarCliente = 0;
//
//                      // Guardar las observaciones
//                      if (!$objObservacion->save()) {
//                      throw new Exception("Error al guardar observación" . $objObservacion->validateErrorsResponse());
//                      }
//
//                      $transaction->commit();
//
//                      } catch (Exception $exc) {
//                      Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
//
//                      try {
//                      $transaction->rollBack();
//                      } catch (Exception $txexc) {
//                      Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
//                      }
//
//                      echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
//                      Yii::app()->end();
//                      }
//                     *  */
//                } else {
//                    Yii::app()->user->setFlash('alert alert-danger', "La remisión no ha sido borrada con éxito del punto de venta " . $model->attributes['idComercial'] . "<br/>"
//                            . $result[1]);
//                }
//
//                //if ($model->save())
//                //    $this->redirect(array('admin', 'usuario' => $model->usuario));
//            } catch (Exception $e) {
//                Yii::app()->user->setFlash('alert alert-danger', "Error  al borrar la remisión por problemas de conexión con el punto de venta " . $model->attributes['idComercial']);
//            }
//        }
//        Yii::import('ext.select2.Select2');
//        $listPdv = PuntoVenta::model()->findAll(array('order' => 'idComercial'));
//        $this->render('remisionBorrar', array(
//            'model' => $model,
//            'listPdv' => $listPdv,
//        ));
//    }
//    public function actionObservacionpedido() {
//        if (isset($_POST['ObservacionForm'])) {
//            $model = new ObservacionForm;
//            $model->attributes = $_POST['ObservacionForm'];
//
//            if ($model->validate()) {
//                $objCompra = Compras::model()->findByPk($model->idCompra);
//                if ($objCompra === null) {
//                    echo CJSON::encode(array('result' => 'error', 'response' => 'Compra no existente'));
//                    Yii::app()->end();
//                }
//
//                $objObservacion = new ComprasObservaciones;
//                $objObservacion->idCompra = $model->idCompra;
//                $objObservacion->observacion = $model->observacion;
//                $objObservacion->idOperador = Yii::app()->controller->module->user->id;
//                $objObservacion->notificarCliente = 0;
//                $objObservacion->idTipoObservacion = $model->tipoObservacion;
//
//                if ($model->estado != null) {
//                    $transaction = Yii::app()->db->beginTransaction();
//                    try {
//                        $estadoCompra = EstadoCompra::model()->findByPk($model->estado);
//
//                        if ($estadoCompra == null) {
//                            throw new Exception('Estado inválido');
//                        }
//
//                        $objObservacion->observacion = "<b>Cambio de estado: " . $estadoCompra->compraEstado . ".</b> " . $objObservacion->observacion;
//
//                        if (!$objObservacion->save()) {
//                            throw new Exception('Error al actualizar estado: ' . $objObservacion->validateErrorsResponse());
//                        }
//
//                        $objCompra->idEstadoCompra = $model->estado;
//
//                        if ($model->estado == Yii::app()->params->callcenter['estadoCompra']['estado']['devolucion']) {
//                            $objCompra->generarDocumentoCruce(Yii::app()->controller->module->user->id);
//                        }
//
//                        if (!$objCompra->save()) {
//                            throw new Exception('Error al actualizar estado: ' . $objCompra->validateErrorsResponse());
//                        }
//                        //$objCompraEstado
//                        $objCompraEstado = new ComprasEstados;
//                        $objCompraEstado->idCompra = $objCompra->idCompra;
//                        $objCompraEstado->idEstadoCompra = $model->estado;
//                        $objCompraEstado->idOperador = Yii::app()->controller->module->user->id;
//                        if (!$objCompraEstado->save()) {
//                            throw new Exception("Error al guardar traza de estado: " . $objCompraEstado->validateErrorsResponse());
//                        }
//
//                        $transaction->commit();
//                        echo CJSON::encode(array('result' => 'ok',
//                            'response' => array(
//                                'msg' => 'Observación registrada.',
//                                'htmlObservaciones' => $this->renderPartial('_observaciones', array('objCompra' => $objCompra), true, false),
//                                'htmlEncabezado' => $this->renderPartial('_encabezadoPedido', array('objCompra' => $objCompra), true, false)
//                        )));
//                        Yii::app()->end();
//                    } catch (Exception $exc) {
//                        Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
//
//                        try {
//                            $transaction->rollBack();
//                        } catch (Exception $txexc) {
//                            Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
//                        }
//
//                        echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
//                        Yii::app()->end();
//                    }
//                } else {
//                    if (!$objObservacion->save()) {
//                        echo CJSON::encode(array('result' => 'error', 'response' => 'Error al actualizar estado: ' . $objObservacion->validateErrorsResponse()));
//                        Yii::app()->end();
//                    }
//
//                    echo CJSON::encode(array('result' => 'ok',
//                        'response' => array(
//                            'msg' => 'Observación registrada.',
//                            'htmlObservaciones' => $this->renderPartial('_observaciones', array('objCompra' => $objCompra), true, false),
//                    )));
//                    Yii::app()->end();
//                }
//            } else {
//                echo CActiveForm::validate($model);
//            }
//        } else if (isset($_POST['NotificacionForm'])) {
//            $model = new NotificacionForm;
//            $model->attributes = $_POST['NotificacionForm'];
//
//            if ($model->validate()) {
//                $objCompra = Compras::model()->findByPk($model->idCompra);
//                if ($objCompra === null) {
//                    echo CJSON::encode(array('result' => 'error', 'response' => 'Compra no existente'));
//                    Yii::app()->end();
//                }
//
//                $objObservacion = new ComprasObservaciones;
//                $objObservacion->idCompra = $model->idCompra;
//                $objObservacion->observacion = $model->observacion;
//                $objObservacion->idOperador = Yii::app()->controller->module->user->id;
//                $objObservacion->notificarCliente = 1;
//
//                if (!$objObservacion->save()) {
//                    echo CJSON::encode(array('result' => 'error', 'response' => 'Error al actualizar estado: ' . $objObservacion->validateErrorsResponse()));
//                    Yii::app()->end();
//                }
//
//                try {
//                    $contenido = $this->renderPartial('//common/mensajeHtml', array('mensaje' => $objObservacion->observacion), true, true);
//                    $htmlCorreo = $this->renderPartial('//common/correo', array('contenido' => $contenido), true, true);
//                    sendHtmlEmail($objCompra->identificacionUsuario == null ? $objCompra->objCompraDireccion->correoElectronico : $objCompra->objUsuario->correoElectronico, Yii::app()->params->callcenter['observacion']['asuntoMensaje'], $htmlCorreo);
//                } catch (Exception $exc) {
//                    
//                }
//
//                echo CJSON::encode(array('result' => 'ok',
//                    'response' => array(
//                        'msg' => 'Observación registrada.',
//                        'htmlObservaciones' => $this->renderPartial('_observaciones', array('objCompra' => $objCompra), true, false),
//                )));
//                Yii::app()->end();
//            } else {
//                echo CActiveForm::validate($model);
//            }
//        } else {
//            throw new CHttpException(404, 'Solicitud invalida.');
//        }
//    }
//    public function actionObservacionmensaje() {
//        if (!Yii::app()->request->isPostRequest) {
//            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
//            Yii::app()->end();
//        }
//
//        $tipo = Yii::app()->getRequest()->getPost('tipo');
//        $compra = Yii::app()->getRequest()->getPost('compra');
//
//        if ($tipo === null || $compra === null) {
//            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
//            Yii::app()->end();
//        }
//
//        $objCompra = Compras::model()->findByPk($compra, array("with" => "objPuntoVenta"));
//
//        if ($objCompra === null) {
//            echo CJSON::encode(array('result' => 'error', 'response' => 'Compra no existente.'));
//            Yii::app()->end();
//        }
//
//        $plantilla = Yii::app()->params->callcenter['notificacion']['plantilla'][$tipo];
//
//        $hora = date('G');
//        $saludo = "";
//        if ($hora >= 6 && $hora <= 11)
//            $saludo = "Buenos días";
//        else if ($hora >= 12 && $hora <= 17)
//            $saludo = "Buenas tardes";
//        else if ($hora >= 18 && $hora <= 23)
//            $saludo = "Buenas noches";
//
//        $nombreUsuario = ($objCompra->identificacionUsuario == null ? $objCompra->objCompraDireccion->nombre : $objCompra->objUsuario->nombre . " " . $objCompra->objUsuario->apellido );
//        $nombrePdv = $objCompra->objPuntoVenta == null ? "<pdv>" : $objCompra->objPuntoVenta->nombrePuntoDeVenta;
//        $direccionUsuario = $objCompra->objCompraDireccion == null ? "<direccion>" : $objCompra->objCompraDireccion->direccion . " " . $objCompra->objCompraDireccion->barrio;
//        $nombreOperador = $objCompra->objOperador == null ? "<operador>" : $objCompra->objOperador->nombre;
//
//        $search = array("{saludo}", "{nombreUsuario}", "{codigoCompra}", "{nombrePdv}", "{direccionUsuario}", "{nombreOperador}");
//        $replace = array($saludo, $nombreUsuario, $objCompra->idCompra, $nombrePdv, $direccionUsuario, $nombreOperador);
//        $plantilla = str_replace($search, $replace, $plantilla);
//
//        echo CJSON::encode(array('result' => 'ok', 'response' => $plantilla));
//        Yii::app()->end();
//    }
//    public function actionGeoDireccion() {
//        if (!Yii::app()->request->isPostRequest) {
//            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
//            Yii::app()->end();
//        }
//
//        $direccion = Yii::app()->getRequest()->getPost('direccion');
//        $ciudad = Yii::app()->getRequest()->getPost('ciudad');
//
//        if ($direccion === null || $ciudad === null) {
//            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
//            Yii::app()->end();
//        }
//        $direccion = trim($direccion);
//        $ciudad = trim($ciudad);
//        $llave = md5($direccion . $ciudad . "javela");
//
//        $client = new SoapClient(null, array(
//            'location' => Yii::app()->params->webServiceUrl['serverGeo'],
//            'uri' => "",
//            'trace' => 1
//        ));
//        $params = array(
//            "direccion" => $direccion,
//            "idCiudad" => $ciudad,
//            "key" => $llave
//        );
//        $result = $client->__soapCall("ConsultarClienteLRV", $params);
//
//        if (empty($result)) {
//            echo CJSON::encode(array('result' => 'ok', 'response' => "Error: no se obtuvo respuesta"));
//        } else {
//            $result = $result[0];
//            if ($result->RESPUESTA == 1) {
//                echo CJSON::encode(array('result' => 'ok', 'response' => "<strong> RESULTADO: </strong>" . $result->PDV . "-" . $result->PDV_NOMBRE));
//            } else {
//                echo CJSON::encode(array('result' => 'ok', 'response' => $result->DESCRIPCION));
//            }
//        }
//    }

    public function actionGeoBarrio() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $barrio = Yii::app()->getRequest()->getPost('barrio');
        $ciudad = Yii::app()->getRequest()->getPost('ciudad');

        if ($barrio === null || $ciudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['serverLRV'],
            'uri' => "",
            'trace' => 1
        ));
        $params = array(
            'idCiudad' => trim($ciudad),
            'barrio' => trim($barrio)
        );
        $result = $client->__soapCall("LRVConsultarBarrio", $params);

        if (empty($result)) {
            echo CJSON::encode(array('result' => 'ok', 'response' => "Error: no se obtuvo respuesta"));
        } else {
            $result = $result[0];
            if ($result->RESPUESTA == 1) {
                $infopdv = $result->PDV[0];
                echo CJSON::encode(array('result' => 'ok', 'response' => "<strong> RESULTADO: </strong>" . $infopdv['PVTCODIG'] . "-" . $infopdv['PVTNOMBR']));
            } else {
                echo CJSON::encode(array('result' => 'ok', 'response' => $result->DESCRIPCION));
            }
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Ope
      rador the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Compras::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La página solicitada no existe.');
        return $model;
    }

    protected function gridDetallePedido($data, $row) {
        $params = array('pedido' => $data->idCompra);

        if ($data->idOperador == null && $data->idEstadoCompra == Yii::app()->params->callcenter ['estadoCompra']['estado']['pendiente']) {
            $params['asignar'] = true;
        }

        $result = "<i class='glyphicon glyphicon-zoom-in glyphicon-white'></i> $data->idCompra";
        return $result;
    }

    protected function gridPuntoventaPedido($data, $row) {
        if ($data->objPuntoVenta === null)
            return "NA";
        return $data->objPuntoVenta->nombrePuntoDeVenta . "<br/>" . $data->objPuntoVenta->direccionPuntoDeVenta;
    }

    protected function gridOrigenPedido($data, $row) {
    	
        if ($data->identificacionUsuario == null) {
            return $data->objCompraDireccion->nombre . "<br/>" . $data->objCompraDireccion->correoElectronico;
        } else {
        	
        	return "$data->identificacionUsuario<br/>" . 
        			(isset($data->objUsuario)?$data->objUsuario->getNombreCompleto():"" ) . "<br/>" . 
        			(isset($data->objUsuario)?$data->objUsuario->correoElectronico:"");
        	
        }
    }

    protected function gridValorPedido($data, $row) {
        return Yii::app()->numberFormatter->format(Yii::app
                        ()->params->formatoMoneda['patron'], $data->totalCompra, Yii::app()->params->formatoMoneda['moneda']);
    }

    protected function gridDestinoPedido($data, $row) {

        if ($data->objCompraDireccion == null)
            return "NA";
        return $data->
                objCompraDireccion->nombre . "<br/>" . $data->objCompraDireccion->direccion . "<br/>" . $data->objCompraDireccion->barrio;
    }

    protected function gridPagoPedido($data, $row) {
        if ($data->objFormaPagoCompra === null)
            return "NA";

        $result = $data->objFormaPagoCompra->objFormaPago->formaPago;
        if ($data->objFormaPagoCompra->numeroTarjeta != null && !empty($data->objFormaPagoCompra->numeroTarjeta))
            $result .= "<strong>No. tarjeta:</strong> " . $data->objFormaPagoCompra->numeroTarjeta . "<br/><strong>No. cuotas:</strong> " . $data->objFormaPagoCompra->cuotasTarjeta;

        return $result;
    }

    protected function gridEstadoPedido($data, $row) {
        return "<a href='#' data-role='completitud-pdv' data-compra='$data->idCompra'><span class='label label-" . Yii::app()->params->callcenter['estadoCompra']['colorClass'][$data->idEstadoCompra] . "'>Ver completitud pedido</span></a>";
    }

    protected function rowCssClassFunction($row, $data) {
        $classes = array();
        $rowCssClass = array('odd', 'even');
        $classes [] = $rowCssClass[$row % count($rowCssClass)];
        if ($data->seguimiento == 1)
            $classes[] = "seguimiento";
        else if ($data->tipoEntrega == 1) {
            $classes[] = "presencial";
        }
        return empty($classes) ? false : implode(' ', $classes);
    }

    public function actionCompletitudPdv() {
        if (isset($_POST['compra'])) {
            $objCiudadSector = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['objCiudadSector']];
            $idComercial = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']];

            $productosCompra = ComprasItems::model()->findAll(array(
                'condition' => 'idCompra =:idCompra AND disponible =:disponible',
                'params' => array(
                    ':idCompra' => $_POST['compra'],
                    ':disponible' => 1
                )
            ));
            $productos = array();
            foreach ($productosCompra as $position) {

                $productos[] = array(
                    "CODIGO_PRODUCTO" => $position->codigoProducto,
                    "ID_PRODUCTO" => $position->codigoProducto,
                    "CANTIDAD" => $position->unidades,
                    "DESCRIPCION" => $position->objProducto->descripcionProducto,
                );
            }

            try {
                $client = new SoapClient(null, array(
                    'location' => Yii::app()->params->webServiceUrl['serverLRV'],
                    'uri' => "",
                    'trace' => 1
                ));
                $puntosVenta = $client->__soapCall("LRVConsultarSaldoMovil", array(
                    'productos' => $productos,
                    'ciudad' => $objCiudadSector->codigoCiudad,
                    'sector' => $objCiudadSector->codigoSector
                ));


                $puntoVenta = null;
                if (!empty($puntosVenta)) {
                    foreach ($puntosVenta[1] as $pdv) {
                        if ($pdv[1] == $idComercial) {
                            $puntoVenta = $pdv;
                            break;
                        }
                    }
                }
                
                echo CJSON::encode(
                        array(
                            'result' => 'ok',
                            'response' => $this->renderPartial('_modalTotalidadPedido', array(
                                'puntoVenta' => $puntoVenta,
                                'idCompra' => $_POST['compra']
                                    ), true, false)
                ));
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                //  $this->listPuntosVenta = array(0 => 0, 1 => 'Error al consultar disponibilidad de productos');
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'No se puede consultar la totalidad del pedido'
                ));
            }
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'No hay compra'
            ));
        }
    }

    public function actionAsignarPdv() {
        $idCompra = $_POST['dataPedido'];
        $idPuntoVenta = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']];

        $objCompra = Compras::model()->findByPk($idCompra);

        if ($objCompra === null) {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Compra no existe'
            ));
            Yii::app()->end();
        }

        if ($objCompra->idComercial != null) {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'El pedido ya tiene asignado punto de venta'
            ));
            Yii::app()->end();
        }

        $transaction = Yii::app()->db->beginTransaction();

        $objCompra->idComercial = $idPuntoVenta;

        if (!$objCompra->save()) {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => $objCompra->validateErrorsResponse()
            ));
            Yii::app()->end();
        }

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPosECommerce'],
            'uri' => "",
            'trace' => 1
        ));
    //    $result = $client->__soapCall("CongelarCompraManual", array('idPedido' => $idCompra));
        $result = $client->__soapCall("CongelarCompraAutomatica", array('idPedido' => $idCompra, 'pdvSubasta' => $idPuntoVenta));
        //$result = array(0=>0,1=>'congelar prueba error');
        //$result = array(0=>1,1=>'congelar prueba ok', 2 =>'miguel.sanchez@eiso.com.co');
        if ($result[0] != 1) {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => $result[1]
            ));
            Yii::app()->end();
        }

        $objCompra = Compras::model()->find(array(
            'with' => 'objPuntoVenta',
            'condition' => "idCompra =:idCompra",
            'params' => array(
                ':idCompra' => $idCompra
        )));

        try {
            $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['remitido'];
            $objCompra->generarDocumentoCruce(Yii::app()->controller->module->user->id);

            // Guardar el cambio de estado de la remisión
            if (!$objCompra->save()) {
                throw new Exception('Error de asignación: ' . $objCompra->validateErrorsResponse());
            }

            $objEstadoCompra = new ComprasEstados;
            $objEstadoCompra->idCompra = $objCompra->idCompra;
            $objEstadoCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['remitido'];
            $objEstadoCompra->idOperador = Yii::app()->controller->module->user->id;

            // guardar en ComprasEstados
            if (!$objEstadoCompra->save()) {
                throw new Exception("Error al guardar traza de estado: " . $objEstadoCompra->validateErrorsResponse());
            }

            $objObservacion = new ComprasObservaciones;
            $objObservacion->idCompra = $objCompra->idCompra;
            $objObservacion->observacion = "Cambio de Estado: Remitido por subasta al POS PDV. " . $objCompra->objPuntoVenta->nombrePuntoDeVenta;
            $objObservacion->idOperador = Yii::app()->controller->module->user->id;
            $objObservacion->notificarCliente = 0;

            // Guardar las observaciones
            if (!$objObservacion->save()) {
                throw new Exception("Error al guardar observación" . $objObservacion->validateErrorsResponse());
            }

            // Enviar Correo electronico al punto de venta
            try {
                $this->enviarEmail($objCompra);
            } catch (Exception $exc) {
                
            }
            $transaction->commit();

            echo CJSON::encode(
                    array(
                        'result' => 'ok',
                        'response' => "Se ha remitido la compra al punto de venta $idPuntoVenta"
            ));
            Yii::app()->end();
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }

            echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
            Yii::app()->end();
        }
    }

}
