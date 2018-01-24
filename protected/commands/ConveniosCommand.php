<?php

class ConveniosCommand extends CConsoleCommand{
	
	
	public function actionConveniosCrear(){
		
		// Buscar convenios en el SII
		Yii::import('application.models.TareasPerfiles');
		
		$tareas = TareasPerfiles::model()->findAll(array(
				'condition' => 'estado =:estado AND tipoTarea =:tarea',
				'params' => array(
						':estado' => 1,
						':tarea' => 2
				)
		));
		// Insertar los convenios en base de datos
		foreach($tareas as $tarea){
			
			$stringArchivo = $this->actionCopiarArchivo($tarea->rutaArchivo);
		//	print_r($stringArchivo);exit();
			$arrPersonas = explode("\n", $stringArchivo);
			
			$queryUpdate = "";
			$insertPerfilAntiguo = $insertPerfilEspecial = array();
			foreach($arrPersonas as $persona){
				$datos = explode(";", $persona);
				if(isset($datos[1])){
					$sqlVerificar = "SELECT * FROM m_Usuario WHERE identificacionUsuario = ".$datos[1];
					
					$result =  Yii::app()->db->createCommand($sqlVerificar)->queryRow(); 
					if($result){
						$queryUpdate .= "UPDATE m_Usuario SET codigoPerfil = ".$datos[6].
						" WHERE identificacionUsuario = ".$datos[1].";";
						$insertPerfilAntiguo[] = "('".$datos[1]."','".$result['codigoPerfil']."', now())";
					}else{
						$insertPerfilEspecial[] = "('".$datos[1]."','".$datos[6]."')";
					}
				}
			}
			
			
			if($insertPerfilEspecial){
				$sql = "INSERT INTO t_PerfilesEspeciales (identificacionUsuario,codigoPerfil) VALUES ".implode(",",$insertPerfilEspecial);
				$result =  Yii::app()->db->createCommand($sql)->execute(); 
			}
			
			if($insertPerfilAntiguo){
				$sql = "INSERT INTO t_PerfilAntiguo (identificacionUsuario,codigoPerfil, fechaRegistro) VALUES ".implode(",",$insertPerfilAntiguo);
				$result =  Yii::app()->db->createCommand($sql)->execute(); 
			}
			
			if($queryUpdate){
				$result =  Yii::app()->db->createCommand($queryUpdate)->execute(); 
			}
		}
	}
	
	public function actionCopiarArchivo($path = null){
		
	//	$url  = "http://localhost/siicop/archivos/modules/convenios/uploads/convenios_create_1_20180122215653.csv"; //"http://localhost/dump/convenios.csv";
		$url = "http://localhost/siicop/archivos/".$path;
		
//	echo $url;exit();
// 		//El nombre del archivo donde se almacenara los datos descargados.
		$date = Date("Ymdhis");
		$fileout =  Yii::getPathOfAlias("webroot.files.convenios.uploads")."/convenios$date.csv";
		
		$fp = fopen ($fileout , 'w+');
		$ch = curl_init();
		
		curl_setopt($ch, CURLOPT_URL, $url);
		//curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");
		//curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		//curl_setopt($ch, CURLOPT_SSLVERSION,3);
		//curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch, CURLOPT_TIMEOUT, 0);//sin tiempo
		// write curl response to file
		curl_setopt($ch, CURLOPT_FILE, $fp);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		$result = curl_exec($ch);
		//$size = curl_getinfo($ch, CURLINFO_CONTENT_LENGTH_DOWNLOAD);
		
		//echo "Tamaño archivo: $size <br>";
		
		curl_close($ch);
		fclose($fp);
		
		return file_get_contents($fileout);
		
	}
	
	
	public function actionConveniosEliminar(){

		Yii::import('application.models.TareasPerfiles');
		
		
		$tareas = TareasPerfiles::model()->findAll(array(
				'condition' => 'estado =:estado AND tipoTarea =:tarea',
				'params' => array(
						':estado' => 1,
						':tarea' => 3
				)
		));
		
		foreach($tareas as $tarea){
			$stringArchivo = $this->actionCopiarArchivo($tarea->rutaArchivo);
			$arrPersonas = explode("\n", $stringArchivo);
			
			$queryUpdate = $queryDelete = "";
			$insertPerfilAntiguo = $insertPerfilEspecial = array();
			foreach($arrPersonas as $persona){
				$datos = explode(";", $persona);
				if(isset($datos[1])){
					$sqlVerificar = "SELECT * FROM m_Usuario WHERE identificacionUsuario = ".$datos[1];
					
					$result =  Yii::app()->db->createCommand($sqlVerificar)->queryRow(); // ?
					if($result){
						
						// verificar que perfil tenia
						
						$sqlVerificar = "SELECT * FROM t_PerfilAntiguo WHERE numeroDocumento = ".$datos[1];
						
						
						$resultAntiguo =  Yii::app()->db->createCommand($sqlVerificar)->queryRow(); // ?
						if($resultAntiguo){
							$queryUpdate .= "UPDATE m_Usuario SET codigoPerfil = ".$resultAntiguo['codigoPerfil'].
							" WHERE identificacionUsuario = ".$datos[1].";";
							
							$queryDelete .= "DELETE FROM t_PerfilAntiguo WHERE numeroDocumento = ".$datos[1]." AND codigoPerfil = ".$resultAntiguo['codigoPerfil'].";";
						}else{
							// colocar el perfil por defecto
							$queryUpdate .= "UPDATE m_Usuario SET codigoPerfil = 1 WHERE identificacionUsuario = ".$datos[1].";";
						}
						
					}else{
						$queryDelete .= "DELETE FROM t_PerfilesEspeciales WHERE identificacionUsuario = ".$datos[1]." AND codigoPerfil = ".$datos[2]. ";";
					}
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