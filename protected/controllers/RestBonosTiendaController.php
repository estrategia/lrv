<?php 
  /**
  * 
  */
  class RestBonosTiendaController extends CController
  {
  	public function actionBonoPQRS($idPQRS,$cedula,$valor,$minimoCompra,$fechaInicio,$fechaFin,$email, $token, $tipoBono){
  		
  		$key = Yii::app()->params->callcenter['bonos']['keyBonos'];
  		
  		$token_1 = sha1($cedula.$key.$valor.$idPQRS);
  		
  		if($token_1 != $token){
  			$response = ['result' => 'error', 'response' => 'Codigo no corresponde'];
  			echo CJSON::encode($response);
  			Yii::app()->end();
  		}
  		
  		$bonoTienda = new BonosTienda();
  		 
  		$bonoTienda->identificacionUsuario = $cedula;
  		$bonoTienda->valor = $valor;
  		$bonoTienda->minimoCompra = $minimoCompra;
  		$bonoTienda->vigenciaInicio = $fechaInicio;
  		$bonoTienda->vigenciaFin = $fechaFin;
  		$bonoTienda->idPQRS = $idPQRS;
  		$bonoTienda->concepto = "Bono compensatorio PQRS No. $idPQRS";
  		$bonoTienda->correoElectronico = $email;
  		$bonoTienda->estado = Yii::app()->params->callcenter['bonos']['estado']['activo'];
  		$bonoTienda->fechaCreacion = Date("Y-m-d h:i:s");
  		$bonoTienda->tipo = Yii::app()->params->callcenter['bonos']['tipoBonoPQRS'];
  		//$bonoTienda->idBonoTienda = Yii::app()->params->callcenter['bonos']['tipo']['cargue'];
  		if($tipoBono == 1)
  			$bonoTienda->idBonoTiendaTipo = Yii::app()->params->callcenter['bonos']['tipoBonoTiendaPQRS'];
  		else
  			$bonoTienda->idBonoTiendaTipo = Yii::app()->params->callcenter['bonos']['tipoBonoTiendaPQRSReintegro'];
  		
  		if($bonoTienda->save()){
  			 $response = ['result' => 'ok', 'response' => 'Bono Creado'];
      		 echo CJSON::encode($response);
  		}else{
  			$response = ['result' => 'error', 'response' => 'Fallo al crear el bono'];
  			echo CJSON::encode($response);
  		} 
  	}
  	
  	
  	public function actionBonoFORCO($token,$cedula,$valor,$email,$numeroBonos, $idInvocacion){
  		
  		//$decode = Yii::app()->JWT->decode($token);
  	/*	$cedula = $decode->cedula;
  		$valor = $decode->valor;;
  		$email = $decode->email;;
  		$numeroBonos = $decode->numeroBonos;*/
  		$key = Yii::app()->params->callcenter['bonos']['keyBonos'];
  		
  		$token_1 = sha1($cedula.$key.$valor.$numeroBonos.$idInvocacion);
  		
  		if($token_1 != $token){
  			$response = ['result' => 'error', 'response' => 'Codigo no corresponde'];
  			echo CJSON::encode($response);
  			Yii::app()->end();
  		}
  		
  		$fechaInicio = date('Y-m-d');
  		$vigencia = Yii::app()->params->callcenter['bonos']['vigenciaForco'];
  		$fechaFin = strtotime ( "+$vigencia month" , strtotime ( $fechaInicio ) ) ;
  		$fechaFin = date ( 'Y-m-d' , $fechaFin );
  		
  		$bonoTipoTienda = BonoTienda::model()->find(array(
  				'condition' => 'codigoUso =:codigo',
  				'params' => array(
  						':codigo' => Yii::app()->params->callcenter['bonos']['codigoFORCO']
  				)
  		));
  		
  		if($bonoTipoTienda == null){
  			$response = ['result' => 'error', 'response' => 'No existe codigo de Bonos en el sistema'];
  			echo CJSON::encode($response);
  			Yii::app()->end();
  		}
  		
  		$transaction = Yii::app()->db->beginTransaction();
  		for($i = 0;$i < $numeroBonos; $i++){
  			$bonoTienda = new BonosTienda();
  				
	  		$bonoTienda->identificacionUsuario = $cedula;
	  		$bonoTienda->valor = $valor;
	  		$bonoTienda->minimoCompra = $valor;
	  		$bonoTienda->vigenciaInicio = $fechaInicio;
	  		$bonoTienda->vigenciaFin = $fechaFin;
	  		$bonoTienda->concepto = "Bono Obtenido por FORCO";
	  		$bonoTienda->correoElectronico = $email;
	  		$bonoTienda->estado = Yii::app()->params->callcenter['bonos']['estado']['activo'];
	  		$bonoTienda->fechaCreacion = Date("Y-m-d h:i:s");
	  		$bonoTienda->tipo = Yii::app()->params->callcenter['bonos']['tipoBonoFORCO'];
	  		//$bonoTienda->idBonoTienda = Yii::app()->params->callcenter['bonos']['tipo']['cargue'];
	  		$bonoTienda->idBonoTiendaTipo = $bonoTipoTienda->idBonoTiendaTipo;
	  		if(!$bonoTienda->save()){
	  			$transaction->rollBack();
	  			$response = ['result' => 'error', 'response' => 'Fallo al crear el bono'];
	  			echo CJSON::encode($response);
	  			Yii::app()->end();
	  		}
  		}
  		
  		$transaction->commit();
  		$response = ['result' => 'ok', 'response' => 'Bono Creado'];
  		echo CJSON::encode($response);
  	}
  	
  	public function actionReporteBonos(){
  		$bonos = BonosTienda::model()->findAll('idPQRS is NOT NULL AND sincronizado = 0 AND idCompra IS NOT NULL');
  		if($bonos != null){
  			$response = ['result' => 'ok', 'response' => $bonos];
  			echo CJSON::encode($response);
  		}
  	}
  	
  	public function actionActualizarSincronizacion($bonos){
  		try{
  			$sql = "UPDATE t_BonosTienda SET sincronizado = 1 WHERE idBonoTienda IN ($bonos)  ";
  			$result =  Yii::app()->db->createCommand($sql)->execute();
  			$response = ['result' => 'ok', 'response' => 'Actualizado Correctamente'];
  			echo CJSON::encode($response);
  		}catch(Exception $e){
  			$response = ['result' => 'error', 'response' => 'Error al actualizar'];
  			echo CJSON::encode($response);
  		}
  	}
  	
  }