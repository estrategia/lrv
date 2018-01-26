<?php

class RegistroController extends Controller{
	
	
	public function actionIndex(){
		
		$model = new RegistroClienteFielForm('registro');
		
		if($_POST){
			$model->attributes = $_POST['RegistroClienteFielForm'];

			// si guarda
			
			$usuario = Usuario::model()->find(array(
				'condition' => 'identificacionUsuario =:usuario',
				'params' => array(
						'usuario' => $model->cedula
				)
			));
			
			if ($usuario) {
				$thiss->redirect( CController::createUrl('contrasena'),  array(
						'identificacionUsuario' => $usuario->identificacionUsuario
						
				));
			} else {
				
			}
			
		}
		
		if($this->isMobile){
			$this->render('registro', array(
					'model' => $model
			));
		}else{
			$this->render('d_registro', array(
					'model' => $model
			));
		}
	}
}