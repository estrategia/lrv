<?php 
  /**
  * 
  */
  class RestProfesionController extends CController
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

    public function actionVer()
    {
      $profesion = ProfesionCliente::model()->find('idProfesion='. $_GET['id']);
      $response = [];
      if (empty($profesion)) {
        $response = ['result' => 'error', 'response' => 'No se encontro la profesion'];
      } else {
        $response = ['result' => 'ok', 'response' => $profesion];
      }
      echo CJSON::encode($response);
    }

    public function actionListar()
    {
      $profesiones = ProfesionCliente::model()->listData();
      $response = [];
      if (empty($profesiones)) {
        $response = ['result' => 'error', 'response' => 'Error al consultar las profesiones'];
      } else {
        $response = ['result' => 'ok', 'response' => $profesiones];
      }
      echo CJSON::encode($response);
    }
  }
?>