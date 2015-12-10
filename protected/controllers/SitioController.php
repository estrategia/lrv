<?php

class SitioController extends Controller {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            array(
                'application.filters.SessionControlFilter + inicio, categorias',
                'isMobile' => $this->isMobile
            ),
            array(
                'application.filters.SessionControlFilter + index',
                'isMobile' => $this->isMobile,
                'redirect' => false
            ),
        );
    }

    public function actionIndex() {
        if ($this->isMobile) {
            $this->showSeeker = false;
            $this->logoLinkMenu = false;

            $tipoEntrega = null;

            if (isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != null) {
                $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];
            }

            if ($this->objSectorCiudad == null || $tipoEntrega == null) {
                $this->showHeaderIcons = false;
            }

            $this->render('index', array(
                'listModulos' => ModulosConfigurados::getModulosBanner($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_MOVIL_HOME)
            ));
        } else {
            $this->render('d_index', array(
                'listModulos' => ModulosConfigurados::getModulos($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_ESCRITORIO_HOME)
            ));
        }
        Yii::app()->end();
    }

    public function actionEntrega($tipo) {
        if ($tipo != Yii::app()->params->entrega['tipo']['presencial'] && $tipo != Yii::app()->params->entrega['tipo']['domicilio']) {
            if ($this->isMobile) {
                $this->actionIndex();
            } else {
                return array(
                    'result' => 'error',
                    'response' => 'Tipo de entrega inv&aacute;lido'
                );
            }
        }

        Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] = $tipo;
        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;

        if ($this->isMobile) {
            $this->redirect($this->createUrl('/sitio/ubicacion/'));
        } else {
            return array(
                'result' => 'ok',
                'response' => 'Tipo de entrega ' . Yii::app()->params->entrega['tipo'][$tipo] . ' seleccionado'
            );
        }
    }

    public function actionUbicacion() {
        if ((!isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) || Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == null) && $this->isMobile) {
            $this->actionIndex();
        }

        $tipoEntrega = null;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != null) {
            $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];
        }

        Yii::app()->getClientScript()->registerScriptFile("https://maps.googleapis.com/maps/api/js", CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/ubicacion.js", CClientScript::POS_END);

        $listCiudadesSectores = Ciudad::model()->findAll(array(
            'with' => array('listSectorCiudad' => array('with' => 'objSector')),
            'order' => 't.orden, t.nombreCiudad',
            'condition' => 'estadoCiudadSector=:estadoCiudadSector AND estadoSector=:estadoSector AND estadoCiudad=:estadoCiudad',
            'params' => array(
                ':estadoCiudadSector' => 1,
                ':estadoSector' => 1,
                ':estadoCiudad' => 1,
            )
        ));

        if ($this->isMobile) {
            $this->showSeeker = false;
            $this->logoLinkMenu = false;
            $this->fixedFooter = true;

            if ($this->objSectorCiudad == null) {
                $this->showHeaderIcons = false;
            }

            $this->render('ubicacion', array(
                'listCiudadesSectores' => $listCiudadesSectores,
                'objSectorCiudad' => $this->objSectorCiudad,
                'tipoEntrega' => $tipoEntrega,
            ));
        } else {
            //si no fue redireccionado por sessionfilter, se redirecciona a la pagina anterior
            if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]) || Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] == null) {
                Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = (Yii::app()->request->urlReferrer == null ? $this->createUrl('/') : Yii::app()->request->urlReferrer);
            }

            $this->render('d_ubicacion', array(
                'listCiudadesSectores' => $listCiudadesSectores,
                'objSectorCiudad' => $this->objSectorCiudad,
                'tipoEntrega' => $tipoEntrega,
                'urlRedirect' => Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]
            ));
        }
    }

    public function actionUbicacionSeleccion() {
        $ciudad = null;
        $sector = null;
        $tipoEntrega = null;
        $direccion = null;

        if (isset($_REQUEST['ciudad'])) {
            $ciudad = trim($_REQUEST['ciudad']);
        }

        if (!empty_lrv($ciudad)) {
            $arrayCiudad = explode("-", $ciudad);
            if (count($arrayCiudad) > 1) {
                $sectores = SectorPuntoReferencia::model()->findAll(array(
                    'with' => array('objSectorCiudad' => array('with' => 'objSector')),
                    'condition' => 't.codigoCiudad=:ciudad AND t.estadoSectorReferencia=:estado',
                    'params' => array(
                        ':ciudad' => $arrayCiudad[0],
                        ':estado' => 1
                    )
                ));

                $this->renderPartial('_d_ubicacionSector', array('sectores' => $sectores));
                Yii::app()->end();
            }
        }

        if (isset($_REQUEST['sector'])) {
            $sector = trim($_REQUEST['sector']);
        }

        if (!$this->isMobile) {
            if (isset($_REQUEST['entrega'])) {
                $tipoEntrega = trim($_REQUEST['entrega']);
            }

            if (empty($tipoEntrega)) {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'Seleccionar tipo de entrega'
                ));
                Yii::app()->end();
            }

            if (empty($tipoEntrega)) {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'Seleccionar tipo de entrega'
                ));
                Yii::app()->end();
            }

            $rsTipoEntrega = $this->actionEntrega($tipoEntrega);

            if ($rsTipoEntrega['result'] == "error") {
                echo CJSON::encode($rsTipoEntrega);
                Yii::app()->end();
            }
        }

        if (isset($_REQUEST['direccion'])) {
            $direccion = trim($_REQUEST['direccion']);
        }

        if (!empty($direccion)) {
            $objDireccion = DireccionesDespacho::model()->find(array(
                'condition' => 'idDireccionDespacho=:direccion AND identificacionUsuario=:usuario AND activo=:activo',
                'params' => array(
                    ':direccion' => $direccion,
                    ':usuario' => Yii::app()->user->name,
                    ':activo' => 1,
                )
            ));

            if ($objDireccion !== null) {
                $ciudad = $objDireccion->codigoCiudad;
                $sector = $objDireccion->codigoSector;
            }
        }

        if (empty_lrv($ciudad) || empty_lrv($sector)) {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Seleccionar ubicaci&oacute;n'
            ));
            Yii::app()->end();
        }

        $objSectorCiudad = SectorCiudad::model()->find(array(
            'with' => array('objCiudad', 'objSector'),
            'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
            'params' => array(
                ':ciudad' => $ciudad,
                ':sector' => $sector,
                ':estado' => 1,
            )
        ));

        if ($objSectorCiudad == null) {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Ubicaci&oacute;n no existente'
            ));
            Yii::app()->end();
        }

        $objSectorCiudadOld = null;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudadOld = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        $objSectorCiudad->objCiudad->getDomicilio();
        Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = $objSectorCiudad;

        if ($objSectorCiudadOld != null && ($objSectorCiudadOld->codigoCiudad != $objSectorCiudad->codigoCiudad || $objSectorCiudadOld->codigoSector != $objSectorCiudad->codigoSector)) {
            Yii::app()->shoppingCart->clear();
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        }

        Yii::app()->shoppingCart->CalculateShipping();

        $objHorarioSecCiud = HorariosCiudadSector::model()->find(array(
            'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector',
            'params' => array(
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            )
        ));

        if ($objHorarioSecCiud != null && $objHorarioSecCiud->sadCiudadSector == 0) {
            Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] = Yii::app()->params->entrega['tipo']['presencial'];
        }

        if (isset($objDireccion) && $objDireccion !== null) {
            Yii::app()->session[Yii::app()->params->sesion['direccionEntrega']] = $objDireccion->idDireccionDespacho;
        } else {
            Yii::app()->session[Yii::app()->params->sesion['direccionEntrega']] = null;
        }

        $redirect = null;

        if (!$this->isMobile) {
            $redirect = $this->createUrl('/');
            if (isset(Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]) && Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] != null) {
                $redirect = Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']];
            }
        }
        //se debe de eliminar url de sesion
        Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = null;
        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => 'Se ha cambiado la ciudad de entrega por: ' . $objSectorCiudad->objCiudad->nombreCiudad,
            'urlAnterior' => $redirect));
        Yii::app()->end();
    }

    public function actionUbicacionVerificacion() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => "Solicitud inválida"));
            Yii::app()->end();
        }

        $ciudad = Yii::app()->getRequest()->getPost('ciudad');
        $sector = Yii::app()->getRequest()->getPost('sector');

        if ($ciudad == null || $sector == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => "Solicitud inválida"));
            Yii::app()->end();
        }

        $objSectorCiudad = SectorCiudad::model()->find(array(
            'with' => array('objCiudad', 'objSector'),
            'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
            'params' => array(
                ':ciudad' => $ciudad,
                ':sector' => $sector,
                ':estado' => 1,
            )
        ));

        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Ubicación no existente'));
            Yii::app()->end();
        }

        $mensajeUbicacion = "<strong>" . $objSectorCiudad->objCiudad->nombreCiudad . " - " . $objSectorCiudad->objSector->nombreSector . "</strong>";

        if (!isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) || Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != Yii::app()->params->entrega['tipo']['presencial']) {
            $objHorarioSecCiud = HorariosCiudadSector::model()->find(array(
                'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector',
                'params' => array(
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            ));

            if ($objHorarioSecCiud != null && $objHorarioSecCiud->sadCiudadSector == 0) {
                $mensajeUbicacion .= "<br/>No contamos con servicio de entrega a domicilio para esta ubicación, los pedidos deben ser recogidos en el Punto de Venta seleccionado por usted al momento de finalizar la compra.";
                echo CJSON::encode(array('result' => 'ok', 'response' => array(
                        'mensaje' => $mensajeUbicacion,
                        'domicilio' => false,
                        'url' => CController::createUrl('/sitio/ubicacionSeleccion', array('ciudad' => $objSectorCiudad->codigoCiudad, 'sector' => $objSectorCiudad->codigoSector))
                )));
                Yii::app()->end();
            }
        }

        echo CJSON::encode(array('result' => 'ok', 'response' => array(
                'mensaje' => $mensajeUbicacion,
                'domicilio' => true,
                'url' => CController::createUrl('/sitio/ubicacionSeleccion', array('ciudad' => $objSectorCiudad->codigoCiudad, 'sector' => $objSectorCiudad->codigoSector))
        )));
        Yii::app()->end();
    }

    public function actionGps() {
        if (Yii::app()->request->isPostRequest) {
            Yii::app()->session[Yii::app()->params->sesion['pdvEntrega']] = null;
            /* Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = null;
              Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = null; */

            $lat = Yii::app()->getRequest()->getPost('lat');
            $lon = Yii::app()->getRequest()->getPost('lon');
            $tipoEntrega = Yii::app()->getRequest()->getPost('entrega');

            try {
                $puntosv = PuntoVenta::model()->findAll();
                $pdvCerca = array('pdv' => null, 'dist' => -1);

                foreach ($puntosv as $pdv) {
                    $dist = distanciaCoordenadas($lat, $lon, $pdv->latitudGoogle, $pdv->longitudGoogle);

                    if ($dist > Yii::app()->params->gps['distanciaMaxima']) {
                        continue;
                    }

                    if ($pdvCerca['pdv'] == null) {
                        $pdvCerca['pdv'] = $pdv;
                        $pdvCerca['dist'] = $dist;
                    } else {
                        if ($dist < $pdvCerca['dist']) {
                            $pdvCerca['pdv'] = $pdv;
                            $pdvCerca['dist'] = $dist;
                        }
                    }
                }

                if ($pdvCerca['pdv'] == null) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'No se encuentra punto de venta cercano'));
                    Yii::app()->end();
                }

                $objCiudadSector = SectorCiudad::model()->find(array(
                    'with' => array('objCiudad', 'objSector'),
                    'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
                    'params' => array(
                        'ciudad' => $pdvCerca['pdv']->codigoCiudad,
                        'sector' => $pdvCerca['pdv']->idSectorLRV,
                        'estado' => 1
                    )
                ));

                if ($objCiudadSector == null) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'No se encuentra sector cercano'));
                    Yii::app()->end();
                }

                Yii::app()->session[Yii::app()->params->sesion['pdvEntrega']] = $pdvCerca['pdv'];
                //Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = $sectorCiudad;
                /* Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = null; */

                if (empty($tipoEntrega) || $tipoEntrega != Yii::app()->params->entrega['tipo']['presencial']) {
                    $objHorarioSecCiud = HorariosCiudadSector::model()->find(array(
                        'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector',
                        'params' => array(
                            ':ciudad' => $objCiudadSector->codigoCiudad,
                            ':sector' => $objCiudadSector->codigoSector,
                        )
                    ));

                    if ($objHorarioSecCiud != null && $objHorarioSecCiud->sadCiudadSector == 0) {
                        echo CJSON::encode(array(
                            'result' => 'error',
                            'response' => "No contamos con servicio de entrega a domicilio para <strong>".$objCiudadSector->objCiudad->nombreCiudad . " - " . $objCiudadSector->objSector->nombreSector."</strong>. Los pedidos deben ser recogidos en el Punto de Venta seleccionado por usted al momento de finalizar la compra. Para proceder con esta ubicaci&oacute;n, por favor seleccionar tipo de entrega \"Quiero pasar por el pedido\""
                        ));
                        Yii::app()->end();
                    }
                }

                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'mensaje' => "<strong>" . $objCiudadSector->objCiudad->nombreCiudad . " - " . $objCiudadSector->objSector->nombreSector . "</strong>",
                        'ciudad' => $objCiudadSector->codigoCiudad,
                        'sector' => $objCiudadSector->codigoSector
                    )
                ));
                Yii::app()->end();
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                echo CJSON::encode(array('result' => 'error', 'response' => 'Error: ' . $exc->getMessage()));
                Yii::app()->end();
            }
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }
    }

    public function actionInicio() {
        if (!$this->isMobile) {
            $this->actionIndex();
        }

        $listaPromociones = array();

        if (isset(Yii::app()->params->promociones)) {
            foreach (Yii::app()->params->promociones as $idx => $promocion) {
                $fActual = new DateTime;
                $fInicio = DateTime::createFromFormat('Y-m-d H:i:s', $promocion['fechaInicio']);
                $fFin = DateTime::createFromFormat('Y-m-d H:i:s', $promocion['fechaFin']);

                $diffInicio = $fInicio->diff($fActual);
                $diffFin = $fActual->diff($fFin);

                if ($diffInicio->invert == 0 && $diffFin->invert == 0) {
                    $listaPromociones[$idx] = $promocion;
                }
            }
        }

        $this->render('inicio', array(
            'listaPromociones' => $listaPromociones,
            'listModulos' => ModulosConfigurados::getModulosBanner($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_MOVIL_INICIO)
        ));
    }

    public function actionCategorias() {
        if ($this->isMobile) {
            $this->render('categorias');
        } else {
            $this->actionIndex();
        }
    }

    public function actionPromocion($nombre) {
        if (!$this->isMobile) {
            $this->actionIndex();
        }

        $promocion = $nombre;
        if (!isset(Yii::app()->params->promociones[$promocion])) {
            throw new CHttpException(404, 'Promoci&oacute;n no existe.');
        }

        $fActual = new DateTime;
        $fInicio = DateTime::createFromFormat('Y-m-d H:i:s', Yii::app()->params->promociones[$promocion]['fechaInicio']);
        $fFin = DateTime::createFromFormat('Y-m-d H:i:s', Yii::app()->params->promociones[$promocion]['fechaFin']);

        $diffInicio = $fInicio->diff($fActual);
        $diffFin = $fActual->diff($fFin);

        if ($diffInicio->invert == 1 || $diffFin->invert == 1) {
            throw new CHttpException(404, 'Promoci&oacute;n no existe.');
        }

        $listaItems = array();
        $listaAgregados = array();
        $nElementos = count(Yii::app()->params->promociones[$promocion]['elementos']);

        for (;;) {
            if (count($listaItems) == $nElementos)
                break;

            $random = mt_rand(0, $nElementos - 1);
            if (!isset($listaAgregados[$random])) {
                $listaAgregados[$random] = $random;
                $listaItems[$random] = Yii::app()->params->promociones[$promocion]['elementos'][$random];
            }
        }

        $this->render('promocion', array('promocion' => $promocion, 'listaItems' => $listaItems));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $this->layout = "m_error";
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error');
        }
    }

}
