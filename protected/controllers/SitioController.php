<?php

class SitioController extends Controller {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            array(
                'application.filters.SessionControlFilter + inicio, categorias',
                'isMobile' => $this->isMobile,
            	'objSectorCiudad' => $this->objSectorCiudad,
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
        	$this->contenidosInicioMovil();
            $this->actionInicio();
        } else {
        	// verificar los contenidos de bienvenida
        	$this->contenidosInicioDesktop();
        	 $this->render('d_index', array(
	                'listModulos' => ModulosConfigurados::getModulos($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_ESCRITORIO_HOME)
	              // 'listModulos' => array()
	         ));
        }
        Yii::app()->end();
    }

    public function actionIndexCopia() {
    	if ($this->isMobile) {
    		$this->contenidosInicioMovil();
    		$this->actionInicio();
    	} else {
    		// verificar los contenidos de bienvenida
    		$this->contenidosInicioDesktop();
    		$this->render('d_index', array(
    				'listModulos' => ModulosConfigurados::getModulos($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_ESCRITORIO_HOME)
    				// 'listModulos' => array()
    		));
    	}
    	Yii::app()->end();
    }
    private function contenidosInicioMovil(){
    	if(Yii::app()->user->isGuest){
    		$objContenido = ContenidoInicio::getContenidoNoAutenticado();

    		if($objContenido){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenido->contenidoMovil
    			));
    			Yii::app()->end();
    		}
    	}else{

    		// Cumpleanos

    		$objContenido = ContenidoInicio::getContenidoCumpleanhos(Yii::app()->session[Yii::app()->params->usuario['sesion']]);

    		if($objContenido){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenido->contenidoMovil
    			));
    			Yii::app()->end();
    		}

    		// No vuelve a ingresar

    		$objContenido = ContenidoInicio::getContenidoUsuarioNoIngresa(Yii::app()->session[Yii::app()->params->usuario['sesion']]);

    		if($objContenido){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenido->contenidoMovil
    			));
    			Yii::app()->end();
    		}

    		// No compra

    		$objContenido = ContenidoInicio::getContenidoSinCompras(Yii::app()->session[Yii::app()->params->usuario['sesion']]);

    		if($objContenido){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenido->contenidoMovil
    			));
    			Yii::app()->end();
    		}

    		// No tiene listas

    		$objContenido = ContenidoInicio::getContenidoSinListas(Yii::app()->session[Yii::app()->params->usuario['sesion']]);

    		if($objContenido){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenido->contenidoMovil
    			));
    			Yii::app()->end();
    		}
    	}
    }

    private function contenidosInicioDesktop(){
    	if (Yii::app()->user->isGuest){
    		$objContenido = ContenidoInicio::getContenidoNoAutenticado();

    		if($objContenido){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenido->contenido
    			));
    			Yii::app()->end();
    		}
    	} else {

    		// Cumpleanos
    		$objContenido = ContenidoInicio::getContenidoCumpleanhos(Yii::app()->session[Yii::app()->params->usuario['sesion']]);

    		if($objContenido){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenido->contenido
    			));
    			Yii::app()->end();
    		}

    		// No vuelve a ingresar

    		$objContenidoNoIngresa = ContenidoInicio::getContenidoUsuarioNoIngresa(Yii::app()->session[Yii::app()->params->usuario['sesion']]);

    		if($objContenidoNoIngresa){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenidoNoIngresa->contenido
    			));
    			Yii::app()->end();
    		}

    		// No compra

    		$objContenido = ContenidoInicio::getContenidoSinCompras(Yii::app()->session[Yii::app()->params->usuario['sesion']]);

    		if($objContenido){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenido->contenido
    			));
    			Yii::app()->end();
    		}

    		// No tiene listas

    		$objContenido = ContenidoInicio::getContenidoSinListas(Yii::app()->session[Yii::app()->params->usuario['sesion']]);

    		if($objContenido){
    			$this->render('d_indexContenidos', array(
    					'contenido' => $objContenido->contenido
    			));
    			Yii::app()->end();
    		}

    	}
    }

    public function actionCiudades()
    {
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

        $this->renderPartial($this->isMobile ? '_seleccionCiudad' : '_d_seleccionCiudad', array('listCiudadesSectores' => $listCiudadesSectores));
    }

    public function actionMapa() {
        // $listCiudadesSectores = Ciudad::model()->findAll(array(
        //     'with' => array('listSectorCiudad' => array('with' => 'objSector')),
        //     'order' => 't.orden, t.nombreCiudad',
        //     'condition' => 'estadoCiudadSector=:estadoCiudadSector AND estadoSector=:estadoSector AND estadoCiudad=:estadoCiudad',
        //     'params' => array(
        //         ':estadoCiudadSector' => 1,
        //         ':estadoSector' => 1,
        //         ':estadoCiudad' => 1,
        //     )
        // ));

        // $this->renderPartial($this->isMobile ? '_ubicacionMapa' : '_d_ubicacionMapa', array('listCiudadesSectores' => $listCiudadesSectores));
        $this->renderPartial($this->isMobile ? '_ubicacionMapa' : '_d_ubicacionMapa');
    }

    public function actionUbicacion() {
        $objDireccion = null;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['direccionEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['direccionEntrega']] != null) {
            $objDireccion = DireccionesDespacho::model()->find(array(
                'with' => array('objCiudad', 'objSector'),
                'condition' => 'idDireccionDespacho=:direccion AND identificacionUsuario=:usuario AND activo=:activo',
                'params' => array(
                    ':direccion' => Yii::app()->session[Yii::app()->params->sesion['direccionEntrega']],
                    ':usuario' => Yii::app()->user->name,
                    ':activo' => 1,
                )
            ));
        }

        //CVarDumper::dump(Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]);
        //si no fue redireccionado por sessionfilter, se redirecciona a la pagina anterior
        if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]) || Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] == null) {
            Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = (Yii::app()->request->urlReferrer == null ? $this->createUrl('/') : Yii::app()->request->urlReferrer);
        }

        //echo "<br><br>";
        //CVarDumper::dump(Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]);

        if ($this->isMobile) {
            $this->showSeeker = false;
            $this->logoLinkMenu = false;
            $this->fixedFooter = true;

            if ($this->objSectorCiudad == null) {
                $this->showHeaderIcons = false;
            }

            $this->render('ubicacion', array(
                'objSectorCiudad' => $this->objSectorCiudad,
                'objDireccion' => $objDireccion,
                'urlRedirect' => Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]
            ));
        } else {
            $this->render('d_ubicacion', array(
                'objSectorCiudad' => $this->objSectorCiudad,
                'objDireccion' => $objDireccion,
                'urlRedirect' => Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]
            ));
        }
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

                // $this->renderPartial('_d_ubicacionSector', array('listSectorCiudad' => $listSectorCiudad));
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
                    ':usuario' => Yii::app()->user->name,
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

        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudadOld = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        $objSectorCiudad->objCiudad->getDomicilio();
        Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = $objSectorCiudad;
        _setCookie(Yii::app()->params->sesion['sectorCiudadEntrega'], "$objSectorCiudad->codigoCiudad-$objSectorCiudad->codigoSector");

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

        if (isset($objDireccion) && $objDireccion !== null) {
            Yii::app()->session[Yii::app()->params->sesion['direccionEntrega']] = $objDireccion->idDireccionDespacho;
            _setCookie(Yii::app()->params->sesion['direccionEntrega'], $objDireccion->idDireccionDespacho);
        } else {
            Yii::app()->session[Yii::app()->params->sesion['direccionEntrega']] = null;
            _deleteCookie(Yii::app()->params->sesion['direccionEntrega']);
        }

        $redirect = null;

        $redirect = $this->createUrl('/');
        if (isset(Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]) && Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] != null) {
            $redirect = Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']];
        }
        //se debe de eliminar url de sesion
        Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = null;
        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => 'Se ha cambiado la ciudad de entrega por: ' . $objSectorCiudad->objCiudad->nombreCiudad,
            'urlAnterior' => $redirect));
        Yii::app()->end();
    }

    public function actionGps() {
        if (Yii::app()->request->isPostRequest) {
            Yii::app()->session[Yii::app()->params->sesion['pdvEntrega']] = null;
            /* Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = null;
              Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = null; */

            $lat = Yii::app()->getRequest()->getPost('lat');
            $lon = Yii::app()->getRequest()->getPost('lon');

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

                Yii::app()->session[Yii::app()->params->sesion['pdvEntrega']] = $pdvCerca['pdv'];
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
                        'responseModal' => $this->renderPartial($this->isMobile ? "_noServicioDomicilio" : "_d_noServicioDomicilio", array('nombreUbicacion' => $nombreUbicacion, 'objCiudadSector' => $objCiudadSector), true)
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

    public function actionSeleccionBarrio()
    {
        $ciudades = Ciudad::model()->findAll(array(
            'order' => 't.orden, t.nombreCiudad',
            'condition' => 'estadoCiudad=:estadoCiudad',
            'params' => array(
                ':estadoCiudad' => 1,
            )
        ));
        $this->renderPartial($this->isMobile ? '_seleccionarBarrio' : '_d_seleccionarBarrio', array('ciudades' => $ciudades));
    }

    public function actionUbicacionBarrio()
    {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $barrio = Yii::app()->getRequest()->getPost('barrio');
        $ciudad = Yii::app()->getRequest()->getPost('ciudad');

        if ($barrio === null || $ciudad == null) {
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
        //Yii::log(CVarDumper::dumpAsString($result), CLogger::LEVEL_INFO, 'error');

        if($result[0]->RESPUESTA==0){
        	echo CJSON::encode(array('result' => 'error', 'response' => $result[0]->DESCRIPCION));
        	Yii::app()->end();
        }

        $nPdv = count($result[0]->PDV);

        if($nPdv<=0){
        	echo CJSON::encode(array('result' => 'error', 'response' => "No se detecta ubicaci&oacute;n para el barrio \"$barrio\" "));
        	Yii::app()->end();
        }

        // if($nPdv==1){
        // 	$idComercial = $result[0]->PDV[0]->IDCOMERCIAL;
        // 	// $pdv = PuntoVenta::model()->find("idComercial=:idComercial", array(':idComercial'=>$idComercial));
        // 	$objSectorCiudad = SectorCiudad::model()->find(array(
        // 		'join' => 'INNER JOIN m_PuntoVenta on m_PuntoVenta.codigoCiudad = t.codigoCiudad AND m_PuntoVenta.idSectorLRV = t.codigoSector',
        // 		'condition' => 'm_PuntoVenta.idComercial=:idComercial',
        // 		'params' => array(
        // 			'idComercial' => $idComercial
        // 		)
        // 	));
        // 	if (is_null($objSectorCiudad)) {
        // 		echo CJSON::encode(array('result' => 'error', 'response' => 'No se pudo determinar la ubicacion para este barrio.'));
        // 		Yii::app()->end();
        // 	}
        // 	echo CJSON::encode(array(
        // 		'result' => 'ok',
        // 		'response' => array(
        // 			'ciudad' => $objSectorCiudad->codigoCiudad,
        // 			'sector' => $objSectorCiudad->codigoSector
        // 		)
        // 	));

        // 	Yii::app()->end();
        // }

        $listBarrios = array();
        foreach($result[0]->PDV as $pdv){
        	$listBarrios[$pdv->NOMBREBARRIO] = array("ciudad"=> $pdv->CODIGOCIUDAD , "sector"=>$pdv->IDSECTORLRV);
        }

        if(empty($listBarrios)){
        	echo CJSON::encode(array('result' => 'error', 'response' => "No se detectan barrios"));
        	Yii::app()->end();
        }

        echo CJSON::encode(array(
        	'result' => 'ok',
        	'responseHTML' => $this->renderPartial($this->isMobile ? "_ubicacionBarrios" : "_d_ubicacionBarrios", array('listBarrios' => $listBarrios), true)
        ));
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

        $listModulos = ModulosConfigurados::getModulosBanner($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_MOVIL_INICIO);

        $this->render('inicio', array(
            'listaPromociones' => $listaPromociones,
            'listModulos' => $listModulos
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
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            } else {
              if ($this->isMobile) {
                $this->layout = "m_error";
                $this->render('error');
              } else {
                $this->layout = "desktop";
                $this->render('d_error');
              }
            }
        }
    }

}
