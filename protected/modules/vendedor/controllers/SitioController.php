<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SitioController extends ControllerVendedor {

    public function filters() {
        return array(
            'cliente + ubicacion',
            'ubicacion + categorias'
                //'login + index, infoPersonal, direcciones, direccionCrear, pagoexpress, listapedidos, pedido, listapersonal, listadetalle',
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

    public function filterCliente($filter) {
        if (Yii::app()->controller->module->user->isGuest) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionVendedor']] = Yii::app()->request->url;
            $this->redirect(CController::createUrl('usuario/autenticar'));
            Yii::app()->end();
        }

        if (!Yii::app()->controller->module->user->getClienteLogueado() && !Yii::app()->controller->module->user->getIsClienteInvitado()) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionCliente']] = Yii::app()->request->url;
            $this->redirect(CController::createUrl('cliente/cliente'));
            Yii::app()->end();
        }
        $filter->run();
    }

    public function filterUbicacion($filter) {
        if (!Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionUbicacion']] = Yii::app()->request->url;
            $this->redirect(CController::createUrl('sitio/ubicacion'));
            Yii::app()->end();
        }
        $filter->run();
    }

    public function actionIndex() {
        if (Yii::app()->controller->module->user->isGuest) {
            $this->showSeeker = false;
            $this->render("index");
        } else {
            $this->redirect(CController::createUrl('sitio/inicio'));
            Yii::app()->end();
        }
    }

    public function actionInicio() {
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
            'listModulos' => ModulosConfigurados::getModulosBanner($this->objSectorCiudad, Yii::app()->params->perfil['defecto'], UbicacionModulos::UBICACION_MOVIL_INICIO)
        ));
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

    public function actionUbicacion() {

        $this->showSeeker = false;
        $this->logoLinkMenu = false;
        $this->fixedFooter = true;
        
        if (!isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionUbicacion']]) || Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionUbicacion']] == null) {
                Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionUbicacion']] = (Yii::app()->request->urlReferrer == null ? Yii::app()->homeUrl . Yii::app()->controller->module->homeUrl[0] : Yii::app()->request->urlReferrer);
        }
        if ($this->objSectorCiudad == null) {
            $this->showHeaderIcons = false;
        }

        $this->render('ubicacion', array(
            'objSectorCiudad' => $this->objSectorCiudad,
        ));
    }

    public function actionUbicacionSeleccion() {
        $ciudad = null;
        $sector = null;
        $direccion = null;

        if (isset($_REQUEST['ciudad'])) {
            $ciudad = trim($_REQUEST['ciudad']);
        }

        if (!empty_lrv($ciudad)) {
            $arrayCiudad = explode("-", $ciudad);
            if (count($arrayCiudad) > 1) {
                $listSectorCiudad = SectorCiudad::model()->findAll(array(
                    'with' => array('objSector', 'objCiudad'),
                    'condition' => 't.codigoSector<>0 AND t.codigoCiudad=:ciudad AND t.estadoCiudadSector=:estado AND objSector.estadoSector=:estado AND objCiudad.estadoCiudad=:estado',
                    'params' => array(
                        ':ciudad' => $arrayCiudad[0],
                        ':estado' => 1
                    )
                ));

                Yii::app()->end();
            }
        }

        if (isset($_REQUEST['sector'])) {
            $sector = trim($_REQUEST['sector']);
        }

        if (isset($_REQUEST['direccion'])) {
            $direccion = trim($_REQUEST['direccion']);
        }

        if (!empty_lrv($direccion)) {
            $objDireccion = DireccionesDespacho::model()->find(array(
                'condition' => 'idDireccionDespacho=:direccion AND identificacionUsuario=:usuario AND activo=:activo',
                'params' => array(
                    ':direccion' => $direccion,
                    ':usuario' => Yii::app()->controller->module->user->getCedulaCliente(),
                    ':activo' => 1,
                )
            ));

            if ($objDireccion === null) {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'Direcci&oacute;n no existe'
                ));
                Yii::app()->end();
            }

            $objSectorCiudadDireccion = SectorCiudad::model()->find(array(
                'condition' => 'codigoSector=:sector AND codigoCiudad=:ciudad AND estadoCiudadSector=:estado',
                'params' => array(
                    ':sector' => $objDireccion->codigoSector,
                    ':ciudad' => $objDireccion->codigoCiudad,
                    ':estado' => 1,
                )
            ));

            if ($objSectorCiudadDireccion === null) {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'Direcci&oacute;n no configurada en ubicaci&oacute;n v&aacute;lida'
                ));
                Yii::app()->end();
            }

            $ciudad = $objDireccion->codigoCiudad;
            $sector = $objDireccion->codigoSector;
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
                'response' => 'Ubicaci&oacute;n no existente ' . ' -- ciudad: ' . CVarDumper::dumpAsString($ciudad) . ' --' . ' -- sector: ' . CVarDumper::dumpAsString($sector) . ' --'
            ));
            Yii::app()->end();
        }

        $objSectorCiudadOld = null;

        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudadOld = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

        $objSectorCiudad->objCiudad->getDomicilio();
        Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']] = $objSectorCiudad;
        _setCookie(Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega'], "$objSectorCiudad->codigoCiudad-$objSectorCiudad->codigoSector");

        if ($objSectorCiudadOld != null && ($objSectorCiudadOld->codigoCiudad != $objSectorCiudad->codigoCiudad || $objSectorCiudadOld->codigoSector != $objSectorCiudad->codigoSector)) {
            Yii::app()->shoppingCartSalesman->clear();
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = null;
        }
        Yii::app()->shoppingCartSalesman->CalculateShipping();

        $objHorarioSecCiud = HorariosCiudadSector::model()->find(array(
            'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector',
            'params' => array(
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            )
        ));

        if (isset($objDireccion) && $objDireccion !== null) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['direccionEntrega']] = $objDireccion->idDireccionDespacho;
            // _setCookie(Yii::app()->params->sesion['direccionEntrega'], $objDireccion->idDireccionDespacho);
        } else {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['direccionEntrega']] = null;
            //  _deleteCookie(Yii::app()->params->sesion['direccionEntrega']);
        }

        $redirect = null;

        //se debe de eliminar url de sesion
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionUbicacion']])) {
            $redirect = Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionUbicacion']];
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionUbicacion']] = null; // variable de sesión en el módulo
        }
        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => 'Se ha cambiado la ciudad de entrega por: ' . $objSectorCiudad->objCiudad->nombreCiudad,
            'urlAnterior' => $redirect));
        Yii::app()->end();
    }

    public function actionCategorias() {
        $this->render('categorias');
    }

    public function actionMapa() {
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

        $this->renderPartial('_ubicacionMapa', array('listCiudadesSectores' => $listCiudadesSectores));
    }

    public function actionGps() {
        if (Yii::app()->request->isPostRequest) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['pdvEntrega']] = null;
            /* Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = null;
              Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = null; */

            $lat = Yii::app()->getRequest()->getPost('lat');
            $lon = Yii::app()->getRequest()->getPost('lon');
            /* $tipoEntrega = null;

              if ($this->isMobile) {
              if (isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != null) {
              $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];
              }
              } else {
              $tipoEntrega = Yii::app()->getRequest()->getPost('entrega');
              } */

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
                    echo CJSON::encode(array('result' => 'error', 'response' => 'No tenemos cobertura para el sector seleccionado, por favor verifica tu ubicaci&oacute;n'));
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

                $nombreUbicacion = $objCiudadSector->objCiudad->nombreCiudad;
                if ($objCiudadSector->objSector->codigoSector != 0) {
                    $nombreUbicacion .= " - " . $objCiudadSector->objSector->nombreSector;
                }

                Yii::app()->session[Yii::app()->params->vendedor['sesion']['pdvEntrega']] = $pdvCerca['pdv'];
                //Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = $sectorCiudad;
                /* Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = null; */


                $objHorarioSecCiud = HorariosCiudadSector::model()->find(array(
                    'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector',
                    'params' => array(
                        ':ciudad' => $objCiudadSector->codigoCiudad,
                        ':sector' => $objCiudadSector->codigoSector,
                    )
                ));

                if ($objHorarioSecCiud == null || ($objHorarioSecCiud != null && $objHorarioSecCiud->sadCiudadSector == 0)) {
                    echo CJSON::encode(array(
                        'result' => 'error',
                        'response' => "No contamos con servicio de entrega a domicilio para <strong>$nombreUbicacion</strong>. Los pedidos deben ser recogidos en el Punto de Venta seleccionado por usted al momento de finalizar la compra. Para proceder con esta ubicaci&oacute;n, por favor seleccionar tipo de entrega \"Quiero pasar por el pedido\""
                    ));
                    Yii::app()->end();
                }

                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'mensaje' => $nombreUbicacion,
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

}
