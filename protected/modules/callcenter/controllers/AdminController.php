<?php

class AdminController extends ControllerOperator {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            //'access',
            'login + index, pedidos, detallepedido, bonos',
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
        $model = new ClaveForm;
        if (isset($_POST['ClaveForm'])) {
            $model->attributes = $_POST['ClaveForm'];
            $model->validate();
        }

        $this->render('recordarClave', array('model' => $model));
    }

    public function actionPedidos($parametro = 1) {
        $this->layout = "simple";

        if (is_numeric($parametro)) {
            $model = new Compras('search');
            $model->unsetAttributes();
            if (isset($_GET['Compras']))
                $model->attributes = $_GET['Compras'];

            $model->idEstadoCompra = $parametro;
            //$model->tipoEntrega = Yii::app()->params->entrega["tipo"]['domicilio'];
            $model->seguimiento = null;
            $fecha = Compras::calcularFechaVisualizar();
            $model->fechaCompra = $fecha;

            $sort = "";
            switch ($parametro) {
                case 1: $sort = "t.seguimiento DESC, t.fechaCompra DESC";
                    $model->fechaCompra = null;
                    break;
                case 2: $sort = "t.fechaEntrega DESC";
                    break;
                case 3: $sort = "t.fechaEntrega DESC";
                    break;
                case 4: $sort = "t.fechaCompra ASC";
                    break;
                case 5: $sort = "t.fechaEntrega DESC";
                    break;
                case 6: $sort = "t.fechaCompra DESC";
                    break;
                case 7: $sort = "t.fechaCompra DESC";
                    break;
                case 10: $sort = "t.fechaCompra DESC";
                    break;
                case 15: $sort = "t.fechaCompra ASC";
                    break;
                default: $sort = "t.fechaCompra DESC";
                    break;
            }

            $this->render('pedidos', array(
                'model' => $model,
                'dataProvider' => $model->search(array('order' => $sort, 'operadorPedido' => true)),
                'arrCantidadPedidos' => Compras::cantidadComprasPorEstado($fecha)
            ));
        } else {
            if ($parametro == 'busqueda') {
                if (!isset(Yii::app()->session[Yii::app()->params->callcenter['sesion']['formPedidoBusqueda']])) {
                    Yii::app()->session[Yii::app()->params->callcenter['sesion']['formPedidoBusqueda']] = null;
                }

                $this->busquedas();
                Yii::app()->end();
            } else if ($parametro == 'seguimiento') {
                $model = new Compras('search');
                $model->unsetAttributes();
                if (isset($_GET['Compras']))
                    $model->attributes = $_GET['Compras'];
                
                //$model->tipoEntrega = Yii::app()->params->entrega["tipo"]['domicilio'];
                $model->seguimiento = 1;
                $fecha = Compras::calcularFechaVisualizar();
                $model->fechaCompra = null;
                
                $this->render('pedidos', array(
                    'model' => $model,
                    'dataProvider' => $model->search(array('order' => 't.fechaCompra DESC', 'operadorPedido' => true)),
                    'arrCantidadPedidos' => Compras::cantidadComprasPorEstado($fecha)
                ));
            } else if ($parametro == 'enlinea') {
                $model = new Compras('search');
                $model->unsetAttributes();
                if (isset($_GET['Compras']))
                    $model->attributes = $_GET['Compras'];

                $fecha = Compras::calcularFechaVisualizar();
                $model->fechaCompra = $fecha;

                $this->render('pedidos', array(
                    'model' => $model,
                    'dataProvider' => $model->search(array('order' => 't.fechaCompra DESC', 'formaPago' => Yii::app()->params->formaPago['pasarela']['idPasarela'], 'operadorPedido' => true)),
                    'arrCantidadPedidos' => Compras::cantidadComprasPorEstado($fecha)
                ));
            } else if ($parametro == 'entregaNacional') {
                $model = new Compras('search');
                $model->unsetAttributes();
                if (isset($_GET['Compras']))
                    $model->attributes = $_GET['Compras'];

                $fecha = Compras::calcularFechaVisualizar();
                $model->fechaCompra = $fecha;

                $this->render('pedidos', array(
                    'model' => $model,
                    'dataProvider' => $model->search(array('order' => 't.fechaCompra DESC', 'idTipoVenta' => Yii::app()->params->tipoVenta['nacional'], 'operadorPedido' => true)),
                    'arrCantidadPedidos' => Compras::cantidadComprasPorEstado($fecha)
                ));
            }else {
                echo "NOT IMPLEMENTED YET";
            }
        }
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

        if (isset($_GET['ajax']) && $_GET['ajax']="pedidos-grid") {
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

    public function actionRemisionborrar() {
        $model = new RemisionForm;

        if (isset($_POST['RemisionForm'])) {
            $model->attributes = $_POST['RemisionForm'];

            $model->attributes['idCompra'];
            $model->attributes['idComercial'];

            $objCompra = Compras::model()->findByPk($model->attributes['idCompra'], array("with" => "objPuntoVenta"));
            $objPuntoVenta = PuntoVenta::model()->find("idComercial=:idcomercial", array("idcomercial" => $model->attributes['idComercial']
            ));

            if ($objCompra === null) {
                // echo CJSON::encode(array('result' => 0, 'response' => 'Este pedido no existe o no existe el punto de venta registrado.'));
                Yii::app()->end();
            }

            try {
                $client = new SoapClient(null, array(
                    'location' => Yii::app()->params->webServiceUrl['remisionPosECommerce'],
                    'uri' => "",
                    'trace' => 1
                ));

                $result = $client->__soapCall("BorrarCongelada", array('idPedido' => $model->attributes['idCompra'], 'destino' => $model->attributes['idComercial']));

                if (!$result[0] == 1) {

                    Yii::app()->user->setFlash('alert alert-success', "La remisión ha sido borrada con éxito del punto de venta " . $model->attributes['idComercial']);
                    /*
                      $transaction = Yii::app()->db->beginTransaction();
                      try {

                      /*$objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['remisionBorrada'];
                      $objCompra->generarDocumentoCruce(Yii::app()->controller->module->user->id);

                      // Guardar el cambio de estado de la remisión
                      if (!$objCompra->save()) {
                      throw new Exception('Error de asignación: ' . $objCompra->validateErrorsResponse());
                      }

                      $objEstadoCompra = new ComprasEstados;
                      $objEstadoCompra->idCompra = $objCompra->idCompra;
                      $objEstadoCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['remisionBorrada'];
                      $objEstadoCompra->idOperador = Yii::app()->controller->module->user->id;

                      // guardar en ComprasEstados
                      if (!$objEstadoCompra->save()) {
                      throw new Exception("Error al guardar traza de estado: " . $objEstadoCompra->validateErrorsResponse());
                      }


                      $objObservacion = new ComprasObservaciones;
                      $objObservacion->idCompra = $objCompra->idCompra;
                      $objObservacion->observacion = "Cambio de Estado: Remisión borrada del POS del PDV. " . $objPuntoVenta->nombrePuntoDeVenta;
                      $objObservacion->idOperador = Yii::app()->controller->module->user->id;
                      $objObservacion->notificarCliente = 0;

                      // Guardar las observaciones
                      if (!$objObservacion->save()) {
                      throw new Exception("Error al guardar observación" . $objObservacion->validateErrorsResponse());
                      }

                      $transaction->commit();

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
                     *  */
                } else {
                    Yii::app()->user->setFlash('alert alert-danger', "La remisión no ha sido borrada con éxito del punto de venta " . $model->attributes['idComercial'] . "<br/>"
                            . $result[1]);
                }

                //if ($model->save())
                //    $this->redirect(array('admin', 'usuario' => $model->usuario));
            } catch (Exception $e) {
                Yii::app()->user->setFlash('alert alert-danger', "Error  al borrar la remisión por problemas de conexión con el punto de venta " . $model->attributes['idComercial']);
            }
        }
        Yii::import('ext.select2.Select2');
        $listPdv = PuntoVenta::model()->findAll(array('order' => 'idComercial'));
        $this->render('remisionBorrar', array(
            'model' => $model,
            'listPdv' => $listPdv,
        ));
    }

    public function actionBonos() {
        $model = new BonosForm;
        $resultBono = null;
        if (isset($_POST['BonosForm'])) {
            $model->attributes = $_POST['BonosForm'];

            try {
                $clientBono = new SoapClient(null, array(
                    'location' => Yii::app()->params->webServiceUrl['crmLrv'],
                    'uri' => "",
                    'trace' => 1
                ));
                //  $resultBono = $clientBono->__soapCall("ActualizarBono", array('identificacion' => $model->numeroDocumento));
                $resultBono = $clientBono->__soapCall('ConsultarBono', array('identificacion' => $model->numeroDocumento, 'tipo' => '1'));
            } catch (SoapFault $soapExc) {
                // throw new Exception("Error al actualizar bono");
            }
        }

        $this->render('bonos', array(
            'model' => $model,
            'bono' => $resultBono
        ));
    }

    public function actionActualizarBono() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $identificacion = Yii::app()->getRequest()->getPost('identificacion');
        $comentario = Yii::app()->getRequest()->getPost('comentario');
        $valor = Yii::app()->getRequest()->getPost('valor');

        try {
            $modelLog = new LogBonos;
            $modelLog->idOperador = Yii::app()->controller->module->user->id;
            $modelLog->valorBono = $valor;
            $modelLog->comentario = $comentario;
            $modelLog->concepto = 'Cliente Fiel';
            $modelLog->identificacionUsuario = $identificacion;
            $modelLog->idBonoTiendaTipo = Yii::app()->params->callcenter['bonos']['tipoBonoCRM'];
            
            $clientBono = new SoapClient(null, array(
                'location' => Yii::app()->params->webServiceUrl['crmLrv'],
                'uri' => "",
                'trace' => 1
            ));

            if (!$modelLog->validate()) {
                echo CActiveForm::validate($modelLog);
                Yii::app()->end();
            }

            $resultBono = $clientBono->__soapCall('ActualizarBono', array('identificacion' => $identificacion, 'tipo' => '1'));
           
            if ($resultBono[0]->ESTADO == 1) {
                if ($modelLog->save()) {
                    $clientBono = new SoapClient(null, array(
                        'location' => Yii::app()->params->webServiceUrl['crmLrv'],
                        'uri' => "",
                        'trace' => 1
                    ));

                    $bono = $clientBono->__soapCall('ConsultarBono', array('identificacion' => $identificacion, 'tipo' => '1'));

                    try {
                        $contenido = $this->renderPartial('_mensajeCorreoReactivacion', array('modelLog' => $modelLog, 'bono' => $bono), true, true);
                        $htmlCorreo = $this->renderPartial('//common/correo', array('contenido' => $contenido), true, true);
                        $correosDestinatario = implode(",", Yii::app()->params->callcenter['reactivacionBono']['destinatarios']);
                        sendHtmlEmail($correosDestinatario, Yii::app()->params->callcenter['reactivacionBono']['asuntoMensaje'], $htmlCorreo);
                    } catch (Exception $exc) {
                        
                    }

                    echo CJSON::encode(array(
                        'result' => 'ok',
                        'response' => $this->renderPartial('_bono', array('bono' => $bono), true, false)
                    ));
                } else {
                    echo CJSON::encode(array(
                        'result' => 'error',
                        'response' => 'Error al crear el log del registro '
                    ));
                }
            } else {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'Error al Cambiar el estado '
                ));
            }
        } catch (SoapFault $soapExc) {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Error al llamar el webservice '
            ));
        }
    }

    public function actionDetallepedido($pedido) {
        $this->layout = "simple";
        $objCompra = Compras::model()->find(array(
            'with' => array("objUsuario", "objCompraDireccion" => array("with" => array("objCiudad", "objSector")),
                "objFormaPagoCompra" => array("with" => "objFormaPago"),
                "objFormaPagoCompra", "objEstadoCompra",
                "objOperador", "listItems" => array("with" => array("objProducto", "listBeneficios", "objImpuesto", "objEstadoItem"),
                    "listObservaciones" => array("with" => array("objTipoObservacion")))),
            'condition' => 't.idCompra=:id',
            'params' => array(
                ':id' => $pedido,
            )
        ));

        if ($objCompra === null)
            throw new CHttpException(404, 'Pedido solicitado no existe.');

        $asignar = Yii::app()->request->getParam('asignar', false);
        $opcion = Yii::app()->request->getParam('opcion', 'pdv');

        if ($asignar && $objCompra->idOperador == null && $objCompra->idEstadoCompra == Yii::app()->params->callcenter['estadoCompra']['estado']['pendiente']) {
            $transaction = Yii::app()->db->beginTransaction();
            try {
                $objCompra->idOperador = Yii::app()->controller->module->user->id;
                $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['tramite'];

                $objCompraEstado = new ComprasEstados;
                $objCompraEstado->idCompra = $objCompra->idCompra;
                $objCompraEstado->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['tramite'];
                $objCompraEstado->idOperador = Yii::app()->controller->module->user->id;

                $objObservacion = new ComprasObservaciones;
                $objObservacion->idCompra = $objCompra->idCompra;
                $objObservacion->observacion = "Cambio de Estado: En Trámite";
                $objObservacion->idOperador = Yii::app()->controller->module->user->id;
                $objObservacion->notificarCliente = 0;

                if (!$objObservacion->save())
                    throw new Exception("Error al guardar observación" . $objObservacion->validateErrorsResponse());
                if (!$objCompraEstado->save())
                    throw new Exception("Error al guardar estado" . $objCompraEstado->validateErrorsResponse());
                if (!$objCompra->save())
                    throw new Exception("Error al actualizar estado" . $objCompra->validateErrorsResponse());
                $transaction->commit();
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

                try {
                    $transaction->rollBack();
                } catch (Exception $txexc) {
                    Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                }

                Yii::app()->user->setFlash('danger', "Error al asignar pedido: " . $exc->getMessage());
                $this->redirect(Yii::app()->request->urlReferrer);
                //$this->redirect(Yii::app()->user->returnUrl);
                Yii::app()->end();
            }
        }

        $params = array();
        $params['params']['objCompra'] = $objCompra;
        $params['opcion'] = $opcion;

        if ($opcion == "pedido") {
            $params['vista'] = "_adminPedido";
        } else if ($opcion == "cliente") {
            $params['vista'] = "_clienteDespacho";
            $listDirecciones = DireccionesDespacho::model()->findAll(array(
                'with' => 'objCiudad',
                'condition' => 'identificacionUsuario=:usuario AND activo=:activo',
                'params' => array(
                    ':usuario' => $objCompra->identificacionUsuario,
                    ':activo' => 1
                )
            ));
            $params['params']['listDirecciones'] = $listDirecciones;
        } else if ($opcion == "observacion") {
            $params['vista'] = "_observacionesPedido";
        } else {
            Yii::import('ext.select2.Select2');
            $params['vista'] = "_ubicarPDV";
            $params['opcion'] = "pdv";

            $modelCompraAnteriores = new Compras('search');
            $modelCompraAnteriores->unsetAttributes();
            if (isset($_GET['Compras']))
                $modelCompraAnteriores->attributes = $_GET['Compras'];

            $modelCompraAnteriores->identificacionUsuario = $objCompra->identificacionUsuario;
            $modelCompraAnteriores->tipoEntrega = Yii::app()->params->entrega["tipo"]['domicilio'];

            $params['params']['modelCompra'] = $modelCompraAnteriores;
        }

        $this->render('pedido', $params);
    }

    public function actionCalificaciones() {

        $model = new ProductosCalificaciones('search');

        $model->unsetAttributes();
        if (isset($_GET['ProductosCalificaciones']))
            $model->attributes = $_GET['ProductosCalificaciones'];

        $this->render('calificaciones', array('model' => $model));
    }

    public function actionAprobarCalificacion() {

        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $calificacion = $_POST['calificacion'];

        $model = ProductosCalificaciones::model()->findByPk($calificacion);

        if (!$model) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Esta calificación no existe'));
            Yii::app()->end();
        }

        $model->aprobado = 1;

        $model->save();

        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos Actualizados'));
    }

    public function actionObservacionpedido() {
        if (isset($_POST['ObservacionForm'])) {
            $model = new ObservacionForm;
            $model->attributes = $_POST['ObservacionForm'];

            if ($model->validate()) {
                $objCompra = Compras::model()->findByPk($model->idCompra);
                if ($objCompra === null) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'Compra no existente'));
                    Yii::app()->end();
                }

                $objObservacion = new ComprasObservaciones;
                $objObservacion->idCompra = $model->idCompra;
                $objObservacion->observacion = $model->observacion;
                $objObservacion->idOperador = Yii::app()->controller->module->user->id;
                $objObservacion->notificarCliente = 0;
                $objObservacion->idTipoObservacion = $model->tipoObservacion;

                if ($model->estado != null) {
                    $transaction = Yii::app()->db->beginTransaction();
                    try {
                        $estadoCompra = EstadoCompra::model()->findByPk($model->estado);

                        if ($estadoCompra == null) {
                            throw new Exception('Estado inválido');
                        }

                        $objObservacion->observacion = "<b>Cambio de estado: " . $estadoCompra->compraEstado . ".</b> " . $objObservacion->observacion;

                        if (!$objObservacion->save()) {
                            throw new Exception('Error al actualizar estado: ' . $objObservacion->validateErrorsResponse());
                        }

                        $objCompra->idEstadoCompra = $model->estado;

                        if ($model->estado == Yii::app()->params->callcenter['estadoCompra']['estado']['devolucion']) {
                            $objCompra->generarDocumentoCruce(Yii::app()->controller->module->user->id);
                        }

                        if (!$objCompra->save()) {
                            throw new Exception('Error al actualizar estado: ' . $objCompra->validateErrorsResponse());
                        }
                        //$objCompraEstado
                        $objCompraEstado = new ComprasEstados;
                        $objCompraEstado->idCompra = $objCompra->idCompra;
                        $objCompraEstado->idEstadoCompra = $model->estado;
                        $objCompraEstado->idOperador = Yii::app()->controller->module->user->id;
                        if (!$objCompraEstado->save()) {
                            throw new Exception("Error al guardar traza de estado: " . $objCompraEstado->validateErrorsResponse());
                        }

                        $transaction->commit();
                        echo CJSON::encode(array('result' => 'ok',
                            'response' => array(
                                'msg' => 'Observación registrada.',
                                'htmlObservaciones' => $this->renderPartial('_observaciones', array('objCompra' => $objCompra), true, false),
                                'htmlEncabezado' => $this->renderPartial('_encabezadoPedido', array('objCompra' => $objCompra), true, false)
                        )));
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
                } else {
                    if (!$objObservacion->save()) {
                        echo CJSON::encode(array('result' => 'error', 'response' => 'Error al actualizar estado: ' . $objObservacion->validateErrorsResponse()));
                        Yii::app()->end();
                    }

                    echo CJSON::encode(array('result' => 'ok',
                        'response' => array(
                            'msg' => 'Observación registrada.',
                            'htmlObservaciones' => $this->renderPartial('_observaciones', array('objCompra' => $objCompra), true, false),
                    )));
                    Yii::app()->end();
                }
            } else {
                echo CActiveForm::validate($model);
            }
        } else if (isset($_POST['NotificacionForm'])) {
            $model = new NotificacionForm;
            $model->attributes = $_POST['NotificacionForm'];

            if ($model->validate()) {
                $objCompra = Compras::model()->findByPk($model->idCompra);
                if ($objCompra === null) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'Compra no existente'));
                    Yii::app()->end();
                }

                $objObservacion = new ComprasObservaciones;
                $objObservacion->idCompra = $model->idCompra;
                $objObservacion->observacion = $model->observacion;
                $objObservacion->idOperador = Yii::app()->controller->module->user->id;
                $objObservacion->notificarCliente = 1;

                if (!$objObservacion->save()) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'Error al actualizar estado: ' . $objObservacion->validateErrorsResponse()));
                    Yii::app()->end();
                }

                try {
                    $contenido = $this->renderPartial('//common/mensajeHtml', array('mensaje' => $objObservacion->observacion), true, true);
                    $htmlCorreo = $this->renderPartial('//common/correo', array('contenido' => $contenido), true, true);
                    sendHtmlEmail($objCompra->identificacionUsuario == null ? $objCompra->objCompraDireccion->correoElectronico : $objCompra->objUsuario->correoElectronico, Yii::app()->params->callcenter['observacion']['asuntoMensaje'], $htmlCorreo);
                } catch (Exception $exc) {
                    
                }

                echo CJSON::encode(array('result' => 'ok',
                    'response' => array(
                        'msg' => 'Observación registrada.',
                        'htmlObservaciones' => $this->renderPartial('_observaciones', array('objCompra' => $objCompra), true, false),
                )));
                Yii::app()->end();
            } else {
                echo CActiveForm::validate($model);
            }
        } else {
            throw new CHttpException(404, 'Solicitud invalida.');
        }
    }

    public function actionObservacionmensaje() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $tipo = Yii::app()->getRequest()->getPost('tipo');
        $compra = Yii::app()->getRequest()->getPost('compra');

        if ($tipo === null || $compra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $objCompra = Compras::model()->findByPk($compra, array("with" => "objPuntoVenta"));

        if ($objCompra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Compra no existente.'));
            Yii::app()->end();
        }

        $plantilla = Yii::app()->params->callcenter['notificacion']['plantilla'][$tipo];

        $hora = date('G');
        $saludo = "";
        if ($hora >= 6 && $hora <= 11)
            $saludo = "Buenos días";
        else if ($hora >= 12 && $hora <= 17)
            $saludo = "Buenas tardes";
        else if ($hora >= 18 && $hora <= 23)
            $saludo = "Buenas noches";

        $nombreUsuario = ($objCompra->identificacionUsuario == null ? $objCompra->objCompraDireccion->nombre : $objCompra->objUsuario->nombre . " " . $objCompra->objUsuario->apellido );
        $nombrePdv = $objCompra->objPuntoVenta == null ? "<pdv>" : $objCompra->objPuntoVenta->nombrePuntoDeVenta;
        $direccionUsuario = $objCompra->objCompraDireccion == null ? "<direccion>" : $objCompra->objCompraDireccion->direccion . " " . $objCompra->objCompraDireccion->barrio;
        $nombreOperador = $objCompra->objOperador == null ? "<operador>" : $objCompra->objOperador->nombre;

        $search = array("{saludo}", "{nombreUsuario}", "{codigoCompra}", "{nombrePdv}", "{direccionUsuario}", "{nombreOperador}");
        $replace = array($saludo, $nombreUsuario, $objCompra->idCompra, $nombrePdv, $direccionUsuario, $nombreOperador);
        $plantilla = str_replace($search, $replace, $plantilla);

        echo CJSON::encode(array('result' => 'ok', 'response' => $plantilla));
        Yii::app()->end();
    }

    public function actionGeoDireccion() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $direccion = Yii::app()->getRequest()->getPost('direccion');
        $ciudad = Yii::app()->getRequest()->getPost('ciudad');

        if ($direccion === null || $ciudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }
        $direccion = trim($direccion);
        $ciudad = trim($ciudad);
        $llave = md5($direccion . $ciudad . "javela");

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['serverGeo'],
            'uri' => "",
            'trace' => 1
        ));
        $params = array(
            "direccion" => $direccion,
            "idCiudad" => $ciudad,
            "key" => $llave
        );
        $result = $client->__soapCall("ConsultarClienteLRV", $params);

        if (empty($result)) {
            echo CJSON::encode(array('result' => 'ok', 'response' => "Error: no se obtuvo respuesta"));
        } else {
            $result = $result[0];
            if ($result->RESPUESTA == 1) {
                echo CJSON::encode(array('result' => 'ok', 'response' => "<strong> RESULTADO: </strong>" . $result->PDV . "-" . $result->PDV_NOMBRE, 'ciudad'=>76001, 'sector'=>22));
            } else {
                echo CJSON::encode(array('result' => 'ok', 'response' => $result->DESCRIPCION));
            }
        }
    }

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

            var_dump($result);
            $result = $result[0];
            if ($result->RESPUESTA == 1) {
            	
            	$infoLabel ="<strong> RESULTADO: </strong><br/>";
            
            	foreach($result->PDV as $infopdv){
            		$infoLabel.=$infopdv->NOMBREBARRIO." : ".$infopdv->IDCOMERCIAL . "-" . $infopdv->NOMBREPUNTODEVENTA." <br/>";
            	}
                
                echo CJSON::encode(array('result' => 'ok', 'response' => $infoLabel, 'ciudad'=> 76001, 'sector'=> 22 ));
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

    /*protected function gridDetallePedido($data, $row) {
        $params = array('pedido' => $data->idCompra);

        if ($data->idOperador == null && $data->idEstadoCompra == Yii::app()->params->callcenter ['estadoCompra']['estado']['pendiente']) {
            $params['asignar'] = true;
        }

        $result = "<a class='btn btn-success  btn-xs' href='" . $this->createUrl('/callcenter/admin/detallepedido', $params) . "' target='_blank'><i
                     class='glyphicon glyphicon-zoom-in glyphicon-white'></i> $data->idCompra</a>";
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
            return "$data->identificacionUsuario<br/>" . $data->objUsuario->getNombreCompleto() . "<br/>" . $data->objUsuario->correoElectronico;
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
        return "<span class='label label-" . Yii::app()->params->callcenter['estadoCompra']['colorClass'][$data->idEstadoCompra] . "'>" . $data->objEstadoCompra->compraEstado . "</span>";
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
    }*/

}
