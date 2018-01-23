<?php

class RestConveniosController extends CController{
	
	public function actionCrearPerfilConvenio(){
		$codigoPerfil = $_GET['codigoPerfil'];
		$nombreConvenio = $_GET['nombreConvenio'];
		
		$objConvenio = Perfil::model()->findByPk($codigoPerfil);
		
		if($objConvenio){
			echo CJSON::encode(array(
					'result' => 'creado',
					'response' => 'Perfil ya esta creado',
			));
			Yii::app()->end();
		}
		
		$objConvenio = new Perfil();
		
		$objConvenio->codigoPerfil = $codigoPerfil;
		$objConvenio->nombrePerfil = $nombreConvenio;
		$objConvenio->mensajeBienvenida = "";
		
		if($objConvenio->save()){
			echo CJSON::encode(array(
					'result' => 'ok',
					'response' => 'Perfil creado',	
			));
		}else{
			
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => 'Error al crear el perfil',
			));
		}
	}
	
	public function actionActualizarPerfil(){
		$codigoPerfil = $_GET['codigoPerfil'];
		$nombreConvenio = $_GET['nombreConvenio'];
		
		$objConvenio = Perfil::model()->findByPk($codigoPerfil);
		
		$objConvenio->codigoPerfil = $codigoPerfil;
		$objConvenio->nombrePerfil = $nombreConvenio;
		
		if($objConvenio->save()){
			echo CJSON::encode(array(
					'result' => 'ok',
					'response' => 'Perfil actualizado',
			));
		}else{
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => 'Error al actualizar el perfil',
			));
		}
	}
	
	
	public function actionRegistrarTarea(){
		$tipoTarea = $_GET['tipoTarea'];
		$ubicacionArchivo = $_GET['ubicacionArchivo'];
		
		$objTarea = new TareasPerfiles();
		$objTarea->rutaArchivo = $ubicacionArchivo;
		$objTarea->estado = 1;
		$objTarea->tipoTarea = $tipoTarea;
		
		if($objTarea->save()){
			
			echo CJSON::encode(array(
					'result' => 'ok',
					'response' => 'Se ha registrado la tarea',
			));
		}else{
			print_r($objTarea->getErrors());
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => 'Error al registrar la tarea',
			));
		}
	}
	
	
}