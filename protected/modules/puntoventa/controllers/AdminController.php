<?php

class AdminController extends ControllerPuntoVenta {

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
        $objCiudadSector = Yii::app()->session[Yii::app()->params->subasta['sesion']['objCiudadSector']];
        $idComercial = Yii::app()->session[Yii::app()->params->subasta['sesion']['pdv']];
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
            $objCiudadSector = Yii::app()->session[Yii::app()->params->subasta['sesion']['objCiudadSector']];
            $idComercial = Yii::app()->session[Yii::app()->params->subasta['sesion']['pdv']];

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
        $idPuntoVenta = Yii::app()->session[Yii::app()->params->subasta['sesion']['pdv']];

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
        $result = $client->__soapCall("CongelarCompraManual", array('idPedido' => $idCompra));
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
