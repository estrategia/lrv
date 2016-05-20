<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ClienteController extends ControllerVendedor {

    public function filters() {
        return array(
            'cliente + infopersonal, direcciones, listapersonal, listapedidos, pedido, bonos',
            'ubicacion + direcciones'
                //'login + index, infoPersonal, direcciones, direccionCrear, pagoexpress, listapedidos, pedido, listapersonal, listadetalle',
                //'loginajax + direccionActualizar',
        );
    }

    public function filterCliente($filter) {
        if (!Yii::app()->controller->module->user->getClienteLogueado()) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionCliente']] = Yii::app()->request->url;
            $this->redirect(CController::createUrl('cliente/cliente'));
            Yii::app()->end();
        }
        $filter->run();
    }
    
    public function filterUbicacion($filter){
        if (!Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionUbicacion']] = Yii::app()->request->url;
            $this->redirect(CController::createUrl('sitio/ubicacion'));
            Yii::app()->end();
        }
        $filter->run();
    }

    public function actionCliente() {
        if (!Yii::app()->controller->module->user->getIsClienteInvitado() && !Yii::app()->controller->module->user->getClienteLogueado()) {
            $this->showHeaderIcons = false;
        }
        $this->showSeeker = false;
        $this->logoLinkMenu = false;
        $this->render('autenticarCliente', array(
            'model' => new Usuario()
                )
        );
    }

    public function actionInfopersonal() {
        $this->showSeeker = false;

        $model = new RegistroForm('actualizar');
        //$usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
        $usuario = Usuario::model()->find(array(
            'with' => array('objUsuarioExtendida', 'objPerfil'),
            'condition' => 't.identificacionUsuario=:cedula',
            'params' => array(
                ':cedula' => Yii::app()->controller->module->user->getCedulaCliente()
            )
        ));
        $usuarioExt = $usuario->objUsuarioExtendida;
        $model->cedula = $usuario->identificacionUsuario;

        $model->cedula = $usuario->identificacionUsuario;
        $model->nombre = $usuario->nombre;
        $model->apellido = $usuario->apellido;
        $model->correoElectronico = $usuario->correoElectronico;
        $model->genero = $usuarioExt->genero;
        $model->fechaNacimiento = $usuarioExt->fechaNacimiento;
        $model->profesion = $usuarioExt->codigoProfesion;

        $this->render('registro', array('model' => $model));
    }

    public function actionInvitado() {
        if (!Yii::app()->request->isPostRequest) {
            $this->redirect(Yii::app()->homeUrl);
            Yii::app()->end();
        }

        Yii::app()->session[Yii::app()->params->vendedor['sesion']['compraInvitado']] = true;

        unset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']]);

        Yii::app()->shoppingCartSalesman->clear();

        $redirect = Yii::app()->request->baseUrl . Yii::app()->controller->module->homeUrl[0];
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionCliente']])) {
            $redirect = Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionCliente']];
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionCliente']] = null; // variable de sesión en el módulo
        }
        echo CJSON::encode(array(
            'result' => 'ok',
            'urlRefer' => $redirect
        ));
    }

    public function actionBuscarCliente() {
        if (!Yii::app()->request->isPostRequest) {
            $this->redirect(Yii::app()->homeUrl);
            Yii::app()->end();
        }
        $identificacionusuario = $_REQUEST['Usuario']['identificacionUsuario'];
        $usuario = Usuario::model()->find(array(
            'condition' => 'identificacionusuario =:identificacionUsuario ',
            'params' => array(
                'identificacionUsuario' => $identificacionusuario,
            )
        ));
        if ($usuario) {
            if ($usuario->activo != 1) {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'Cliente inactivo'
                ));
            } else {
                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'identificacion' => $usuario->identificacionUsuario,
                        'nombre' => $usuario->nombre,
                        'apellido' => $usuario->apellido,
                    )
                ));
            }
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Cliente no está registrado en la tienda'
            ));
        }
    }

    public function actionDireccionesUbicacion() {
        $contenido = "NA";

        if (!Yii::app()->controller->module->user->getClienteLogueado()) {
            $contenido = "No hay usuario autenticado";
        } else {
            $listDirecciones = DireccionesDespacho::consultarDireccionesUsuario(Yii::app()->controller->module->user->getCedulaCliente(), true, true);
            if (empty($listDirecciones)) {
                $contenido = "No hay direcciones de despacho registradas";
            } else {
                $contenido = $this->renderPartial('direcciones', array('listDirecciones' => $listDirecciones, 'editar' => false), true);
            }
        }

        $this->renderPartial('direccionesUbicacion', array(
            'contenido' => $contenido
        ));
    }

    public function actionAutenticarCliente() {
        if (!Yii::app()->request->isPostRequest) {
            $this->redirect(Yii::app()->homeUrl);
            Yii::app()->end();
        }
        $identificacionusuario = $_REQUEST['identificacion'];

        $usuario = Usuario::model()->find(array(
            'condition' => 'identificacionusuario =:identificacionUsuario ',
            'params' => array(
                'identificacionUsuario' => $identificacionusuario,
            )
        ));

        if ($usuario) {
            unset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['compraInvitado']]);
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']] = $usuario;
            Yii::app()->shoppingCartSalesman->clear();
            
            $redirect = Yii::app()->request->baseUrl . Yii::app()->controller->module->homeUrl[0];
            if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionCliente']])) {
                $redirect = Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionCliente']];
                Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionCliente']] = null; // variable de sesión en el módulo
            }
            echo CJSON::encode(array(
                'result' => 'ok',
                'urlRefer' => $redirect
            ));
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Cliente no está registrado en la tienda'
            ));
        }
    }

    public function actionDirecciones() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

        
        $this->showSeeker = false;
        $this->fixedFooter = true;

        $listDirecciones = DireccionesDespacho::consultarDireccionesUsuario(Yii::app()->controller->module->user->getCedulaCliente(), true);

        $params = array('listDirecciones' => $listDirecciones);
        $this->render('direcciones', $params);
    }

    public function actionListapedidos() {

        $model = new Compras('search');
        $model->unsetAttributes();
        if (isset($_GET['Compras']))
            $model->attributes = $_GET['Compras'];
        $model->activa = 1;
        $model->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();

        $params = array('model' => $model);
        $this->render('pedidos', $params);
    }

    public function actionPedido($compra) {
        $objCompra = Compras::model()->find(array(
            'with' => 'objPuntoVenta',
            'condition' => 'idCompra=:compra AND identificacionUsuario=:usuario',
            'params' => array(
                ':compra' => $compra,
                ':usuario' => Yii::app()->controller->module->user->getCedulaCliente()
            )
        ));

        if ($objCompra === null) {
            $this->redirect($this->createUrl('listapedidos'));
        }

        $params = array(
            'objCompra' => $objCompra,
        );

        $this->render('pedido', $params);
    }

    public function actionDireccionCrear() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Seleccionar ubicación'));
            Yii::app()->end();
        }

        $render = Yii::app()->getRequest()->getPost('render', false);

        $direccionForm = "_direccionForm";
        $direcciones = "_direcciones";

        if ($render == true) {
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'dialogoHTML' => $this->renderPartial($direccionForm, array('model' => new DireccionesDespacho, 'modal' => true), true)
            )));
            Yii::app()->end();
        } else if (isset($_POST['DireccionesDespacho'])) {
            $model = new DireccionesDespacho;
            $model->attributes = $_POST['DireccionesDespacho'];

            $model->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
            $model->activo = 1;
            $model->codigoCiudad = $objSectorCiudad->codigoCiudad;
            $model->codigoSector = $objSectorCiudad->codigoSector;

            if ($model->validate()) {
                if (!$model->save()) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'Error al guardar dirección, por favor intente de nuevo'));
                    Yii::app()->end();
                }
                $modal = Yii::app()->getRequest()->getPost('modal', 0);

                if ($modal == 1) {
                    $listDirecciones = DireccionesDespacho::consultarDireccionesUsuario(Yii::app()->user->name, true);
                    echo CJSON::encode(array('result' => 'ok', 'response' => array(
                            'mensaje' => 'Direcci&oacute;n adicionada',
                            'direccionesHTML' => $this->renderPartial('_direcciones', array('listDirecciones' => $listDirecciones), true)
                    )));
                    Yii::app()->end();
                } else {
                    $modelPago = null;
                    if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]))
                        $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];

                    if ($modelPago != null) {
                        $modelPago->idDireccionDespacho = $model->idDireccionDespacho;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                    }

                    echo CJSON::encode(array('result' => 'ok', 'response' => 'Informaci&oacute;n guardada'));
                    Yii::app()->end();
                }
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
    }

    public function actionListapersonal($lista = null) {
        if ($lista === null) {
            $this->listapersonal();
            Yii::app()->end();
        } else if ($lista == 'post') {
            $this->listapersonalAdmin();
            Yii::app()->end();
        } /* else if ($lista == 'guardar') {
          $this->listapersonalGuardar();
          Yii::app()->end();
          } */ else {
            $this->listapersonaldetalle($lista);
            Yii::app()->end();
        }
    }

    private function listapersonalAdmin() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $render = Yii::app()->getRequest()->getPost('render', false);

        if ($render) {
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'form' => $this->renderPartial('_form', array('model' => new ListasPersonales), true)
            )));
            Yii::app()->end();
        } else if (isset($_POST['ListasPersonales'])) {
            $lista = Yii::app()->getRequest()->getPost('lista', null);
            $model = null;

            if ($lista !== null) {
                $model = ListasPersonales::model()->find(array(
                    'with' => 'listDetalle',
                    'condition' => 't.idLista=:lista AND t.identificacionUsuario=:usuario',
                    'params' => array(
                        ':lista' => $lista,
                        ':usuario' => Yii::app()->controller->module->user->getCedulaCliente()
                    )
                ));
            }

            if ($model == null) {
                $model = new ListasPersonales;
            }

            $mensaje = "Lista " . ($model->isNewRecord ? "creada" : "actualizada");

            $model->attributes = $_POST['ListasPersonales'];
            $model->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();

            if ($model->diasAnticipacion == null) {
                $model->diasAnticipacion = 0;
            }

            if ($model->save()) {
                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'mensajeHtml' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => $mensaje), true),
                        'optionHtml' => "<option value='$model->idLista'>$model->nombreLista</option>"
                    )
                ));
                Yii::app()->end();
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }
    }

    private function listapersonal() {

        if (!Yii::app()->controller->module->user->getClienteLogueado()) {
            $this->redirect(CController::createUrl('cliente/cliente'));
            Yii::app()->end();
        }

        $model = new ListasPersonales('search');
        $model->unsetAttributes();
        if (isset($_GET['ListasPersonales']))
            $model->attributes = $_GET['ListasPersonales'];

        $model->activa = 1;
        $model->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();

        $params = array('model' => $model);
        $this->render('listaPersonal', $params);
    }

    private function listapersonaldetalle($lista) {

        if (!Yii::app()->controller->module->user->getClienteLogueado()) {
            $this->redirect(CController::createUrl('cliente/cliente'));
            Yii::app()->end();
        }

        $model = ListasPersonales::model()->find(array(
            'with' => array('listDetalle' => array("with" => array("objProducto" => array("with" => array("listImagenes", "objCodigoEspecial", "listCalificaciones")),
                        "objCombo" => array("with" => array("listProductosCombo", "listImagenesCombo"))))),
            'condition' => 't.idLista=:lista AND t.identificacionUsuario=:usuario',
            'params' => array(
                ':lista' => $lista,
                ':usuario' => Yii::app()->controller->module->user->getCedulaCliente()
            )
        ));

        if ($model === null) {
            $this->redirect($this->createUrl('listapersonal'));
        }

        $params = array('model' => $model);
        $this->render('listaDetalle', $params);
    }

    protected function gridFechaPedido($data, $row) {
        $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fechaCompra);
        return $fecha->format('y-m-d');
    }

    protected function gridDetallePedido($data, $row) {
        $clase = 'ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon';
        $texto = 'Ver';
        if (!$this->isMobile) {
            $clase = 'center';
            $texto = '<span class="glyphicon glyphicon-eye-open center-div" aria-hidden="true">';
        }

        return CHtml::link($texto, $this->createUrl('cliente/pedido', array('compra' => $data->idCompra)), array('class' => $clase, 'data-ajax' => 'false'));
    }

    protected function gridDetalleLista($data, $row) {
        $clase = 'ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon';
        $texto = 'Ver';
        if (!$this->isMobile) {
            $clase = 'center';
            $texto = '<span class="glyphicon glyphicon-eye-open center-div" aria-hidden="true">';
        }


        return CHtml::link($texto, $this->createUrl('cliente/listapersonal', array('lista' => $data->idLista)), array('class' => $clase, 'data-ajax' => 'false'));
    }

    protected function gridDetalleCotizacion($data, $row) {
        $clase = 'ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon';
        $texto = 'Ver';
        if (!$this->isMobile) {
            $clase = 'center';
            $texto = '<span class="glyphicon glyphicon-eye-open center-div" aria-hidden="true">';
        }

        return CHtml::link($texto, $this->createUrl('cliente/cotizacion', array('cotizacion' => $data->idCotizacion)), array('class' => $clase, 'data-ajax' => 'false'));
    }

    protected function gridFechaCotizacion($data, $row) {
        $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fechaCotizacion);
        return $fecha->format('y-m-d');
    }

    public function actionBonos() {
        $bonos = array();

        $fecha = date('Y-m-d');

        //-- bonos propios de la tienda
        $condicionBonos = "identificacionUsuario=:usuario AND vigenciaInicio<=:fecha AND vigenciaFin>=:fecha AND estado=:estado";
        $paramsBonos = array(
            ':usuario' => Yii::app()->controller->module->user->getCedulaCliente(),
            ':fecha' => $fecha,
            ':estado' => 1,
        );

        /* if ($total !== null) {
          $condicionBonos .= " AND minimoCompra<=:total";
          $paramsBonos[':total'] = $total;
          } */

        $listBonosTienda = BonosTienda::model()->findAll(array(
            'condition' => $condicionBonos,
            'params' => $paramsBonos
        ));

        foreach ($listBonosTienda as $objBono) {
            $bonos["$objBono->idBonoTienda"] = array(
                'valor' => $objBono->valor,
                'vigenciaInicio' => "$objBono->vigenciaInicio",
                'vigenciaFin' => "$objBono->vigenciaFin",
                'minimoCompra' => $objBono->minimoCompra,
                'concepto' => $objBono->concepto,
            );
        }
        //-- bonos propios de la tienda
        //-- bono crm
        ini_set('default_socket_timeout', 5);
        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['crmLrv'],
            'uri' => "",
            'trace' => 1,
            'connection_timeout' => 5,
        ));

        try {
            $result = $client->__soapCall("ConsultarBono", array('identificacion' => Yii::app()->controller->module->user->getCedulaCliente()));

            if (!empty($result) && $result[0]->ESTADO == 1 && $result[0]->VALOR_BONO > 0) {
                $fechaDate = new DateTime;
                $vigInicio = DateTime::createFromFormat('Y-m-d', $result[0]->VIGENCIA_INICIO);
                $vigFin = DateTime::createFromFormat('Y-m-d', $result[0]->VIGENCIA_FINA);
                $diff1 = $fechaDate->diff($vigFin);
                $diff2 = $vigInicio->diff($fechaDate);

                if ($diff1->invert == 0 && $diff2->invert == 0) {
                    $bonos['crm'] = array(
                        'valor' => $result[0]->VALOR_BONO,
                        'vigenciaInicio' => $result[0]->VIGENCIA_INICIO,
                        'vigenciaFin' => $result[0]->VIGENCIA_FINA,
                        'minimoCompra' => $result[0]->VALOR_BONO,
                        'concepto' => 'Cliente Fiel',
                    );
                }
            }
        } catch (SoapFault $exc) {
            Yii::log("SoapFault WebService ConsultarBono [$this->identificacionUsuario]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n" . $client->__getLastResponse(), CLogger::LEVEL_INFO, 'application');
        } catch (Exception $exc) {
            Yii::log("Exception WebService ConsultarBono [$this->identificacionUsuario]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
        }

        $this->render('bono', array(
            'bonos' => $bonos
        ));
    }

    public function actionSalirCliente() {
        Yii::app()->controller->module->user->logoutCliente();
        $this->redirect(Yii::app()->controller->module->homeUrl);
    }

}
