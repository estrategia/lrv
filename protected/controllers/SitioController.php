<?php

class SitioController extends Controller {

    public function actionIndex() {
        $this->showSeeker = false;
        $this->showHeaderIcons = false;
        $this->logoLinkMenu = false;

        //echo "--URL: " . Yii::app()->request->urlReferrer;

        if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']])) {
            Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']] = 'null';
        }
        
        $redireccionNormal = false;
        
        if (Yii::app()->request->urlReferrer == ($this->createAbsoluteUrl('/') . "/") || Yii::app()->request->urlReferrer == $this->createAbsoluteUrl('/sitio') || Yii::app()->request->urlReferrer == $this->createAbsoluteUrl('/sitio/index')) {
            $redireccionNormal = true;
        }
        
        if (Yii::app()->request->urlReferrer == ($this->createAbsoluteUrl('/') . "/") || Yii::app()->request->urlReferrer == $this->createAbsoluteUrl('/sitio') || Yii::app()->request->urlReferrer == $this->createAbsoluteUrl('/sitio/index')) {
            $redireccionNormal = true;
        }
        
        if (Yii::app()->request->urlReferrer == $this->createAbsoluteUrl('/usuario/autenticar') || Yii::app()->request->urlReferrer == $this->createAbsoluteUrl('/usuario/registro')) {
            $redireccionNormal = true;
        }

        if (Yii::app()->request->urlReferrer == null || $redireccionNormal) {
            Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']] = 'null';
        } else {
            Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']] = Yii::app()->request->urlReferrer;
        }

        //echo "--redireccionEntrega: " . Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']];

        $this->render('index');
        Yii::app()->end();
    }

    public function actionEntrega($tipo) {
        if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']])) {
            $this->actionIndex();
        }

        if ($tipo != Yii::app()->params->entrega['tipo']['presencial'] && $tipo != Yii::app()->params->entrega['tipo']['domicilio']) {
            $this->actionIndex();
        }

        Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] = $tipo;
        //echo "--redireccionEntrega: " . Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']];

        if (Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']] == 'null') {
            $this->redirect($this->createUrl('/sitio/ubicacion/'));
        } else {
            $this->redirect(Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']]);
        }
    }

    public function actionUbicacion() {
        $this->showSeeker = false;
        $this->showHeaderIcons = false;
        $this->logoLinkMenu = false;
        $this->fixedFooter = true;

        if (!isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']])) {
            $this->actionIndex();
        }

        $tipo = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];

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
                    'condition' => 'listSubSectores.estadoSubSector=1',
                    'order' => 'listSubSectores.nombreSubSector',
                    'with' => array(
                        'listReferencias' => array(
                            'condition' => 'listReferencias.estadoReferencia=1',
                            'order' => 'listReferencias.nombreReferencia',
                            'with' => array(
                                'listSectores' => array(
                                    'order' => 'listSectores.nombreSector'
                                )
                            )
                        )
                    )
                )
            ),
        ));

        $idxCiudadesSubSectores = array();
        foreach ($listCiudadesSubsectores as $indice => $ciudad) {
            $idxCiudadesSubSectores[$ciudad->codigoCiudad] = $indice;
        }

        /* Yii::app()->session[Yii::app()->params->sesion['pdvEntrega']] = null;
          Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = null;
          Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = null; */

        if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']])) {
            Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = 'null';
        }

        if (Yii::app()->request->urlReferrer == null || Yii::app()->request->urlReferrer == ($this->createAbsoluteUrl('/') . "/") || Yii::app()->request->urlReferrer == $this->createAbsoluteUrl('/sitio') || Yii::app()->request->urlReferrer == $this->createAbsoluteUrl('/sitio/index')) {
            Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = 'null';
            //echo "<p>1</p>";
        } else {
            Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = Yii::app()->request->urlReferrer;
            //echo "<p>2</p>";
        }

        /* echo "--URL1: " . $this->createAbsoluteUrl('/') . "/";
          echo "--URL2: " . $this->createAbsoluteUrl('/sitio');
          echo "--URL3: " . $this->createAbsoluteUrl('/sitio/index');
          echo "--urlReferrer: " . Yii::app()->request->urlReferrer;
          echo "--redireccionUbicacion: " . Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]; */

        $this->render('ubicacion', array(
            'listCiudadesSectores' => $listCiudadesSectores,
            'listCiudadesSubsectores' => $listCiudadesSubsectores,
            'idxCiudadesSubSectores' => $idxCiudadesSubSectores,
            'tipoEntrega' => $tipo,
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

        $objSubSector = $subsector != null ? SubSector::model()->findByPk(array('codigoCiudad' => $ciudad, 'codigoSubSector' => $sector)) : null;

        $objSectorCiudad->objCiudad->getDomicilio();
        Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = $objSectorCiudad;
        Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']] = $objSubSector;
        
        
        if($objSectorCiudadOld !=null && $objSectorCiudadOld->codigoCiudad != $objSectorCiudad->codigoCiudad && $objSectorCiudadOld->codigoSector != $objSectorCiudad->codigoSector)
            Yii::app()->shoppingCart->clear();
        
        Yii::app()->shoppingCart->CalculateShipping();

        if (Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] == 'null') {
            $this->redirect($this->createUrl('/sitio/inicio'));
        } else {
            $this->redirect(Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']]);
        }
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


                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'ubicacion' => $objCiudadSector->objCiudad->nombreCiudad . " - " . $objCiudadSector->objSector->nombreSector,
                        'url' => CController::createUrl('/sitio/inicio', array('ciudad' => $pdvCerca['pdv']->codigoCiudad, 'sector' => $pdvCerca['pdv']->idSectorLRV)))
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
