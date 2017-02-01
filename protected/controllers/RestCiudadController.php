<?php 
  /**
  * 
  */
  class RestCiudadController extends CController
  {

    private $format = 'json';
    
    public function filters()
    {
      return array();
    }

    public function actionList()
    {
      $ciudades = Ciudad::model()->findAll(array('order' => 't.orden'));
      echo CJSON::encode($ciudades);
    }

    public function actionView()
    {
      $ciudad = Ciudad::model()->find('codigoCiudad='. $_GET['id']);
      // $sectores = SectorCiudad::model()->find('codigoCiudad='. $ciudad->codigoCiudad);
      $sectores = SectorCiudad::model()->findAll(array(
                    'with' => array('objSector', 'objCiudad'),
                    'condition' => 't.codigoSector<>0 AND t.codigoCiudad=:ciudad AND t.estadoCiudadSector=:estado AND objSector.estadoSector=:estado AND objCiudad.estadoCiudad=:estado',
                    'params' => array(
                        ':ciudad' => $ciudad->codigoCiudad,
                        ':estado' => 1
                    ),
      				'order' => 't.orden'
                ));
      // print_r($sectores);
      $response = ['ciudad' => $ciudad, 'sectores' => $sectores];
      echo CJSON::encode($response);
    }

    public function actionSectores()
    {
      // $ciudad = SectorCiudad::model()->find('codigoCiudad='. $<_GET['id']);
      $codigoCiudad = $_GET['id'];
      $response = [];
      $sql = "SELECT t.codigoCiudad, t.codigoSector, t.estadoCiudadSector, t.latitudGoogle, t.longitudGoogle, nombreSector, estadoSector, estadoCiudadSector, nombreCiudad, estadoCiudad, excentoImpuestos, orden, codigoSucursal FROM `m_SectorCiudad` `t`  LEFT OUTER JOIN `m_Sector` `objSector` ON (`t`.`codigoSector`=`objSector`.`codigoSector`) LEFT OUTER JOIN `m_Ciudad` `objCiudad` ON (`t`.`codigoCiudad`=`objCiudad`.`codigoCiudad`) WHERE (t.codigoSector<>0 AND t.codigoCiudad={$codigoCiudad} AND t.estadoCiudadSector=1 AND objSector.estadoSector=1 AND objCiudad.estadoCiudad=1)";
      $connection = Yii::app()->db;
      $command = $connection->createCommand($sql);
      $sectores = $command->queryAll();
      
      // print_r($sectores);
     //CVarDumper::dump($sectores, 10, true);
      if (empty($sectores)) {
        $response = ['result' => 'ok', 'response' => 'Sin sectores'];
      } else {
        $response = ['result' => 'ok', 'sectores' => $sectores];
      }
      echo CJSON::encode($response);
    }
  }
?>