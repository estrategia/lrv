<?php

class InicioController extends ControllerOperator{
	
	public function actionIndex(){
		$model = new ContenidoInicio('search');
		
		$model->unsetAttributes();
		if (isset($_GET['ContenidoInicio']))
			$model->attributes = $_GET['ContenidoInicio'];
		
		
			Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/main-desktop.css");
		
		$this->render('index', array(
				'model' => $model,
		));
	}
	
	public function actionCrear(){
		
		$model = new ContenidoInicio();
		
		if($_POST){
			$model->attributes = $_POST['ContenidoInicio'];
			if($model->save()){
				Yii::app()->user->setFlash('alert alert-success', "El contenido ha sido guardado con éxito");
				
				$this->redirect(CController::createUrl('index'));
			}
			//CVarDumper::dump($_POST,10,true);
		}
		$this->render('crear', array(
				'model' => $model
		));
	}
	
	public function actionEditar($idContenidoInicio){
		$model = ContenidoInicio::model()->findByPk($idContenidoInicio);
		
		if($_POST){
			$model->attributes = $_POST['ContenidoInicio'];
				
			if($model->save()){
				Yii::app()->user->setFlash('alert alert-success', "El contenido ha sido guardado con éxito");
				$this->redirect(CController::createUrl('index'));
			}
			//CVarDumper::dump($_POST,10,true);
		}
		$this->render('crear', array(
				'model' => $model
		));
	}
	
	public function actionEliminar($idContenidoInicio){
		$model = ContenidoInicio::model()->findByPk($idContenidoInicio);
		
		if($model){
			if($model->delete()){
				Yii::app()->user->setFlash('alert alert-success', "El contenido ha sido eliminado con éxito");
				$this->redirect(CController::createUrl('index'));
			}
		}
	}
	
	public function actionVisualizarContenido($idContenido, $vista = 1) {
		$objContenido = ContenidoInicio::model()->findByPk($idContenido);
	
		if ($objContenido != null) {
				echo CJSON::encode(array(
						'result' => 'ok',
						'response' => $this->renderPartial('_visualizarModulo', array(
								'contenido' => $vista == 1 ?$objContenido->contenido:$objContenido->contenidoMovil), true, false
				   ))
				);
			
		} else {
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => 'El contenido no existe'
			));
		}
	}
}