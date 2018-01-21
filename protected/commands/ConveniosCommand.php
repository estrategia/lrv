<?php

class ConveniosCommand extends CConsoleCommand{
	
	
	public function actionConveniosCrear(){
		
		// Buscar convenios en el SII
		
		// Insertar los convenios en base de datos
		foreach($tareas as $tarea){
			$arrPersonas = explode("\n", $stringArchivo);
			
			$queryUpdate = "";
			$insertPerfilAntiguo = $insertPerfilEspecial = array();
			foreach($arrPersonas as $persona){
				$datos = explode(";", $persona);
				
				$sqlVerificar = "SELECT * FROM m_Usuario WHERE numeroDocumento = ".$datos[1];
				
				$result =  Yii::app()->db->createCommand($sql)->queryOne(); // ?
				if($result){
					$queryUpdate = "UPDATE m_Usuario SET codigoPerfil = ".$datos[6].
					" WHERE numeroDocumento = ".$datos[1].";";
					$insertPerfilAntiguo = "('".$datos[1]."','".$result['codigoPerfil']."', now())";
				}else{
					$insertPerfilEspecial = "('".$datos[1]."','".$result['6']."')";
				}
			}
			
			
			if($insertPerfilEspecial){
				$sql = "INSERT INTO t_PerfilesEspeciales (identificacionUsuario,codigoPerfil) VALUES ".implode(",",$insertPerfilEspecial);
				$result =  Yii::app()->db->createCommand($sql)->execute(); // ?
			}
			
			if($insertPerfilAntiguo){
				$sql = "INSERT INTO t_PerfilAntiguo (identificacionUsuario,codigoPerfil, fechaRegistro) VALUES ".implode(",",$insertPerfilAntiguo);
				$result =  Yii::app()->db->createCommand($sql)->execute(); // ?
			}
			
			if($queryUpdate){
				$result =  Yii::app()->db->createCommand($queryUpdate)->execute(); // ?
			}
		}
	}
	
	
	public function actionConveniosEliminar(){
	
		foreach($tareas as $tarea){
			$arrPersonas = explode("\n", $stringArchivo);
			
			$queryUpdate = $queryDelete = "";
			$insertPerfilAntiguo = $insertPerfilEspecial = array();
			foreach($arrPersonas as $persona){
				$datos = explode(";", $persona);
				
				$sqlVerificar = "SELECT * FROM m_Usuario WHERE numeroDocumento = ".$datos[1];
				
				$result =  Yii::app()->db->createCommand($sql)->queryOne(); // ?
				if($result){
					
					// verificar que perfil tenia
					
					$sqlVerificar = "SELECT * FROM t_PerfilAntiguo WHERE numeroDocumento = ".$datos[1];
					
					$resultAntiguo =  Yii::app()->db->createCommand($sql)->queryOne(); // ?
					
					$queryUpdate = "UPDATE m_Usuario SET codigoPerfil = ".$resultAntiguo['codigoPerfil'].
					" WHERE numeroDocumento = ".$datos[1].";";
					
					$queryDelete = "DELETE t_PerfilAntiguo WHERE numeroDocumento = ".$datos[1]." AND codigoPerfil = ".$resultAntiguo['codigoPerfil'].";";
								
					
				}else{
					$queryDelete = "DELETE t_PerfilesEspeciales WHERE numeroDocumento = ".$datos[1].";";
				}
			}
			
			if($queryDelete){
				$result =  Yii::app()->db->createCommand($queryDelete)->execute(); 
			}
			
			if($queryUpdate){
				$result =  Yii::app()->db->createCommand($queryUpdate)->execute(); 
			}
			
		}
	}
}