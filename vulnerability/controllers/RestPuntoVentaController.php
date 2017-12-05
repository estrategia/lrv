<?php 
  /**
  * 
  */
  class RestPuntoVentaController extends CController
  {

    private $format = 'json';
    
    public function filters()
    {
      return array();
    }

    public function actionList()
    {
      $puntosVenta = PuntoVenta::model()->findAll();
      echo CJSON::encode($puntosVenta);
    }

    public function actionPuntoVentaCercano()
    {
      $lat = $_GET['lat'];
      $lon = $_GET['lon'];

      try{
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

                // var_dump($pdvCerca);
                if ($pdvCerca['pdv'] == null) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'No tenemos cobertura para el sector seleccionado, por favor verifica tu ubicaci&oacute;n'));
                    Yii::app()->end();
                } else {
                    $codigoCiudad = $pdvCerca['pdv']->codigoCiudad;
                    $ciudad = $ciudad = Ciudad::model()->find('codigoCiudad='. $codigoCiudad)->nombreCiudad;
                    $codigoSector = $pdvCerca['pdv']->idSectorLRV;
                    $sector = Sector::model()->find('codigoSector='. $codigoSector);
                    $nombreSector = "";
                    if ($sector !== null) {
                      $nombreSector = $sector->nombreSector;
                    }

                    echo CJSON::encode(array('result' => 'ok',
                                             'response' => array('codigoCiudad' => $codigoCiudad,
                                                                 'codigoSector' => $codigoSector,
                                                                 'nombreCiudad' => $ciudad,
                                                                 'nombreSector' => $nombreSector
                                                                 )));
                    Yii::app()->end();
                }
          }catch (Exception $exc) {
              Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
              echo CJSON::encode(array('result' => 'error', 'response' => 'Error: ' . $exc->getMessage()));
              Yii::app()->end();
          }
    }

    // public function actionView()
    // {
    //   $ciudad = Ciudad::model()->find('codigoCiudad='. $_GET['id']);
    //   // $sectores = SectorCiudad::model()->find('codigoCiudad='. $ciudad->codigoCiudad);
    //   $sectores = SectorCiudad::model()->findAll(array(
    //                 'with' => array('objSector', 'objCiudad'),
    //                 'condition' => 't.codigoSector<>0 AND t.codigoCiudad=:ciudad AND t.estadoCiudadSector=:estado AND objSector.estadoSector=:estado AND objCiudad.estadoCiudad=:estado',
    //                 'params' => array(
    //                     ':ciudad' => $ciudad->codigoCiudad,
    //                     ':estado' => 1
    //                 )
    //             ));
    //   // print_r($sectores);
    //   $response = ['ciudad' => $ciudad, 'sectores' => $sectores];
    //   echo CJSON::encode($response);
    // }
  }
?>