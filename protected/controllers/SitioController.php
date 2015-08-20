<?php

class SitioController extends Controller {

    public function actionIndex() {
        $this->showSeeker = false;
        $this->logoLinkMenu = false;
        
        $objSectorCiudad = null;
        $tipoEntrega = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']])){
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];
        }
        
        if (isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != null ) {
            $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];
        }
        
        if($objSectorCiudad==null || $tipoEntrega==null){
            $this->showHeaderIcons = false;
        }
        
        $this->render('index');
        Yii::app()->end();
    }

    public function actionEntrega($tipo) {
        if ($tipo != Yii::app()->params->entrega['tipo']['presencial'] && $tipo != Yii::app()->params->entrega['tipo']['domicilio']) {
            $this->actionIndex();
        }

        Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] = $tipo;
        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        $this->redirect($this->createUrl('/sitio/ubicacion/'));
    }
    
    public function actionUbicacion() {
        $this->showSeeker = false;
        $this->logoLinkMenu = false;
        $this->fixedFooter = true;

        if (!isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) || Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == null ) {
            $this->actionIndex();
            //$this->render('index');
            //Yii::app()->end();
        }
        
        $tipo = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];
        
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']])){
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];
        }
        
        if($objSectorCiudad==null){
            $this->showHeaderIcons = false;
        }

        $listCiudadesSectores = Ciudad::model()->findAll(array(
            'with' => array('listSectores'),
            'order' => 't.orden',
            'condition' => 'estadoCiudadSector=:estadoCiudadSector AND estadoSector=:estadoSector AND estadoCiudad=:estadoCiudad',
            'params' => array(
                ':estadoCiudadSector' => 1,
                ':estadoSector' => 1,
                ':estadoCiudad' => 1,
            )
        ));
        
        $listCiudadesSubsectores = Ciudad::model()->findAll(array(
            'with' => array(
                'listSubSectores' => array(
                    'condition' => 'estadoSubSector=1',
                    'with' => array(
                        'listSectorReferencias' => array(
                            'condition' => 'listSectorReferencias.estadoSectorReferencia=1',
                            'with' => array(
                                'objSectorCiudad' => array(
                                    'condition' => 'objSectorCiudad.estadoCiudadSector=1',
                                    'with' => array(
                                        'objSector' => array(
                                            'condition' => 'objSector.estadoSector=1',
                                            'order' => 'objSector.nombreSector',
                                        ))),
                                'listPuntoReferencias' => array('condition' => 'listPuntoReferencias.estadoReferencia=1', 'order' => 'listPuntoReferencias.nombreReferencia')
                            ))))),
            'order' => 't.nombreCiudad'
        ));

        $idxCiudadesSubSectores = array();
        foreach ($listCiudadesSubsectores as $indice => $ciudad) {
            $idxCiudadesSubSectores[$ciudad->codigoCiudad] = $indice;
        }

        /* Yii::app()->session[Yii::app()->params->sesion['pdvEntrega']] = null;
          Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = null;
          Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = null; */

        $this->render('ubicacion', array(
            'listCiudadesSectores' => $listCiudadesSectores,
            'listCiudadesSubsectores' => $listCiudadesSubsectores,
            'idxCiudadesSubSectores' => $idxCiudadesSubSectores,
            'tipoEntrega' => $tipo,
            'objSectorCiudad' => $objSectorCiudad,
        ));
    }
    
    public function actionUbicacionSeleccion($ciudad, $sector, $subsector = null) {
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
            $this->actionIndex();
        }

        $objSectorCiudadOld = null;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudadOld = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        //$objSubSector = $subsector != null ? SubSector::model()->findByPk(array('codigoCiudad' => $ciudad, 'codigoSubSector' => $sector)) : null;
        $objSubSector = null;

        $objSectorCiudad->objCiudad->getDomicilio();
        Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = $objSectorCiudad;
        Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = $objSubSector;
        
        if ($objSectorCiudadOld != null && ($objSectorCiudadOld->codigoCiudad != $objSectorCiudad->codigoCiudad || $objSectorCiudadOld->codigoSector != $objSectorCiudad->codigoSector)){
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
        
        if($objHorarioSecCiud!=null && $objHorarioSecCiud->sadCiudadSector==0){
            Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] = Yii::app()->params->entrega['tipo']['presencial'];
        }
        
        $this->redirect($this->createUrl('/sitio/inicio'));
    }
    
    public function actionUbicacionVerificacion() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => "Solicitud inválida"));
            Yii::app()->end();
        }
         
        $ciudad = Yii::app()->getRequest()->getPost('ciudad');
        $sector = Yii::app()->getRequest()->getPost('sector');
        
        if($ciudad==null || $sector==null){
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

            if($objHorarioSecCiud!=null && $objHorarioSecCiud->sadCiudadSector==0){
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

            try {
                $puntosv = PuntoVenta::model()->findAll();
                $pdvCerca = array('pdv' => null, 'dist' => -1);

                foreach ($puntosv as $pdv) {
                    $dist = distanciaCoordenadas($lat, $lon, $pdv->latitudGoogle, $pdv->longitudGoogle);

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
                
                $mensajeUbicacion = "<strong>" . $objCiudadSector->objCiudad->nombreCiudad . " - " . $objCiudadSector->objSector->nombreSector . "</strong>";
                
                if (!isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) || Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != Yii::app()->params->entrega['tipo']['presencial']) {
                    $objHorarioSecCiud = HorariosCiudadSector::model()->find(array(
                        'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector',
                        'params' => array(
                            ':ciudad' => $objCiudadSector->codigoCiudad,
                            ':sector' => $objCiudadSector->codigoSector,
                        )
                    ));

                    if($objHorarioSecCiud!=null && $objHorarioSecCiud->sadCiudadSector==0){
                        $mensajeUbicacion .= "<br/>No contamos con servicio de entrega a domicilio para esta ubicación, los pedidos deben ser recogidos en el Punto de Venta seleccionado por usted al momento de finalizar la compra.";
                    }
                }

                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'ubicacion' => $mensajeUbicacion,
                        'url' => CController::createUrl('/sitio/ubicacionSeleccion', array('ciudad' => $pdvCerca['pdv']->codigoCiudad, 'sector' => $pdvCerca['pdv']->idSectorLRV)))
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
        /* $sectorCiudad = SectorCiudad::model()->find(array(
          'with' => array('objCiudad', 'objSector'),
          'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
          'params' => array(
          ':ciudad' => $ciudad,
          ':sector' => $sector,
          ':estado' => 1,
          )
          ));

          if ($sectorCiudad == null) {
          $this->render('index');
          Yii::app()->end();
          }

          $objSubSector = $subsector != null ? SubSector::model()->findByPk(array('codigoCiudad' => $ciudad, 'codigoSubSector' => $sector)) : null;
         */

        //Yii::app()->session[Yii::app()->params->sesion['pdvEntrega']] = null;
        /* Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = $sectorCiudad;
          Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = $objSubSector; */

        $this->render('inicio');
    }

    public function actionCategorias() {
        $this->render('categorias');
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }

}
