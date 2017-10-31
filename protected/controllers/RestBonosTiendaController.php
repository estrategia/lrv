<?php 
  /**
  * 
  */
  class RestBonosTiendaController extends CController
  {
  	public function actionBonoPQRS($idPQRS,$cedula,$valor,$minimoCompra,$fechaInicio,$fechaFin,$email){
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
  		$bonoTienda->idBonoTiendaTipo = Yii::app()->params->callcenter['bonos']['tipoBonoTiendaPQRS'];
  		if($bonoTienda->save()){
  			 $response = ['result' => 'ok', 'response' => 'Bono Creado'];
      		 echo CJSON::encode($response);
  		}else{
  			$response = ['result' => 'error', 'response' => 'Falló al crear el bono'];
  			echo CJSON::encode($response);
  		} 
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