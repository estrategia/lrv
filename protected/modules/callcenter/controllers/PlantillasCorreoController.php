<?php 
/**
* 
*/
class PlantillasCorreoController extends ControllerOperator
{

  public $defaultAction = 'listar';

  public function filters() {
        return array(
            //'access',
            'login + listar',
            'login + actualizar',
        );
    }

  public function filterLogin($filter) {
    if (Yii::app()->controller->module->user->isGuest) {
        $this->redirect(Yii::app()->user->loginUrl);
    }
    $filter->run();
  }

  public function actionListar()
  {
    $plantillas = PlantillaCorreo::model()->findAll();
    $dataProvider= new CActiveDataProvider('PlantillaCorreo');
    $this->render('index', array('plantillas' => $plantillas, 'dataProvider' => $dataProvider));
  }

  public function actionActualizar($id)
  {
    $modelo = PlantillaCorreo::model()->find("id={$id}");
    // $modelo = new PlantillaCorreo();
    if(isset($_POST['PlantillaCorreo']))
    {
        // collects user input data
        $modelo->attributes=$_POST['PlantillaCorreo'];
        // validates user input and redirect to previous page if validated
        if($modelo->validate() && $modelo->save()) {
          $this->redirect('listar');
        }
    }
    // var_dump($modelo);
    $this->render('update', array('modelo' => $modelo));
  }
}

?>