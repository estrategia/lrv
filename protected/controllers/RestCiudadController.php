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
      $ciudades = Ciudad::model()->findAll();
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
                    )
                ));
      // print_r($sectores);
      $response = ['ciudad' => $ciudad, 'sectores' => $sectores];
      echo CJSON::encode($response);
    }
  }
?>