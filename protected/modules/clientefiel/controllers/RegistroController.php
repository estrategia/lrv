<?php

class RegistroController extends Controller{
	
	
	public function actionIndex(){
		
		if(!Yii::app()->user->isGuest){
			$cedula = Yii::app()->user->name;
			$this->verificarUsuario($cedula);
			
		} else {
			
			$modelCedula = new CedulaForm();
			
			if($_POST){
				$modelCedula->attributes = $_POST['CedulaForm'];
				$this->verificarUsuario($modelCedula->cedula);
			}
			
			if($this->isMobile){ 
				$this->render('cedula', array(
						'model' => $modelCedula
				));
			}else{
				$this->render('d_cedula', array(
						'model' => $modelCedula
				));
			}
		}
	}
	
	private function verificarUsuario($cedula){
		
		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesion']])){
			$model = Yii::app()->session[Yii::app()->params->clienteFiel['sesion']];
		}else{
			$model = new RegistroClienteFielForm();
		}
		
		try {
			
			$usuario = Usuario::model()->findByPK($cedula);
				
			if($usuario == null){
				$model->cedula = $cedula;
				$model->scenario = "registro";
				Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;
				// Se debe redireccionar para continuar el registro
				$this->redirect(CController::createUrl('realizarRegistro', array()));
				Yii::app()->end();
			} else if($usuario->esClienteFiel){
				$model->cedula = $cedula;
				$model->scenario = "actualizar";
				Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;
				// Se debe redireccionar para continuar el registro
				$this->redirect(CController::createUrl('realizarRegistro', array()));
				Yii::app()->end();
			}else{
				$model->scenario = "registro";
				
				$clientSugar = new SoapClient(null, array(
						'location' => Yii::app()->params->webServiceUrl['crmLrv'],
						'uri' => "",
						'trace' => 1,
						'connection_timeout' => 5,
				));
				
				$codigoSeguridad = Yii::app()->params->codigoSeguridadCRM;
				$llave = md5($cedula.$codigoSeguridad);
				
				$result = $clientSugar->__soapCall("ConsultarCliente",
						array( 'identificacion' => $cedula,
								'key' => $llave
						));
				
				if (!empty($result) && isset($result[0])) {
					// El cliente existe y por tanto tiene que enviar codigo de verificacion
				
					// Invocar servicio para envio de mensaje de texto
					$model->cedula = $cedula;
					$model->nombre = $result[0]->NAME;
					$model->apellido = $result[0]->C_APELLIDO;
					$model->telefonoCelular = $result[0]->C_CELULAR;
					$model->telefonoFijo = $result[0]->C_TEL_CASA;
					$model->correoElectronico = $result[0]->C_CORREO_MAIN;
					$model->tieneMascotas = $result[0]->TIENEMASCOTA;
					$model->tieneHijos = $result[0]->TIENEHIJOSMENORES;
					$model->fechaNacimiento = $result[0]->C_FECHA_NACIMIENTO;
					$model->ciudad = $result[0]->C_CIUDAD;
					$model->genero = $result[0]->C_SEXO == 'M'?Yii::app()->params->genero['valor']['masculino']:Yii::app()->params->genero['valor']['femenino'];
				
					Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;
				
					try{
						
						// inactivar los demas codigos de verificaion del usuario para evitar fraudes
						
						$sql = "update t_CodigoVerificacion set estado = 0 WHERE numeroDocumento = $cedula";
						Yii::app()->db->createCommand($sql)->execute();
						
						$codigoVerificacion = new CodigoVerificacion();
						$codigoVerificacion->numeroTelefono = $model->telefonoCelular;
						$codigoVerificacion->numeroDocumento = $cedula;
						
						$elibom = new ElibomClient(Yii::app()->params['elibom']['url'], Yii::app()->params['elibom']['usuario'], Yii::app()->params['elibom']['password']);
				
						if($codigoVerificacion->save()){
							$telefono = $codigoVerificacion->numeroTelefono;
							$mensaje = "El codigo de verificacion es ".$codigoVerificacion->idCodigo;
							$mensaje = str_replace(" ", "%20", $mensaje);
							$response = $elibom->sendMessage($telefono, $mensaje);
								
							if($response['action'] == 'sendmessage') {
								
								$modelCedula = new VerificacionForm();
								$modelCedula->cedula = $cedula;
								
								Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']] = $modelCedula;
								$this->redirect(CController::createUrl('codigoVerificacion'));
							}
						}
				
					}catch(Exception $e){
						echo $e->getMessage();
						exit();
					}
				
				}
				
			}
			
		} catch (Exception $e){
			// not implemented yet
		}
		
	}
	
	
	public function actionCodigoVerificacion(){
		
		
		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']])){
			$modelCedula = Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']];
		}else{
			$this->redirect(CController::createUrl('index'));
			Yii::app()->end();
		}
		
		if($_POST){
			$modelCedula->attributes = $_POST['VerificacionForm'];
			
			$codigoVerificacion = CodigoVerificacion::model()->find(array(
				'condition' => 'numeroDocumento =:documento AND idCodigo=:codigo AND estado =:estado',
				'params' => array(
						'documento' => $modelCedula->cedula,
						'codigo' => $modelCedula->codigoVerificacion,
						'estado' => 1
				)	
			));
			
			if($codigoVerificacion){
				// codigo verificado satisfactoriamente
				$codigoVerificacion->estado = 0;
				$codigoVerificacion->save();
				$this->redirect(CController::createUrl('realizarRegistro'));
				Yii::app()->end();
			}else{
				$modelCedula->addError('codigoVerificacion', "El c&oacute;digo no es correcto");
			}
		}
		
		if($this->isMobile){
			$this->render('codigoVerificacion', array(
					'model' => $modelCedula
			));
		}else{
			$this->render('d_codigoVerificacion', array(
					'model' => $modelCedula
			));
		}
	}
	
	
	public function actionRealizarRegistro(){
		
		Yii::import('ext.select2.Select2');
		
		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesion']])){
			$model = Yii::app()->session[Yii::app()->params->clienteFiel['sesion']];
		}else{
			$this->redirect(CController::createUrl('index'));
			Yii::app()->end();
		}
		
		$params[] = array();
		$username = Yii::app()->params->clienteFiel['usuario'];
		$password = Yii::app()->params->clienteFiel['password'];
		$token = "$username:$password";
		$token = base64_encode( $token );
		$restURL = Yii::app()->params->clienteFiel['url'];
		
		
		$usuario = Usuario::model()->findByPk($model->cedula);
		
		// cliente SII
		$restClientSII = new RESTClient ();
		$restClientSII->initialize ( array (
				'server' => $restURL,
		) );
		
		// Buscar para ver si existe el cliente
		if($model->scenario != 'registro'){
			
			// consultar y copiar la informacion de SII en el modelo
			
		}else{
			
			if(!$usuario){
				$params['modelUsuario'] = new UsuarioForm();
			}
		}
		
		
		if($_POST){
			$model->attributes = $_POST['RegistroClienteFielForm'];
			
			if(isset($_POST['RegistroClienteFielForm'])){
				$params['modelUsuario']->attributes = $_POST['UsuarioForm'];
				
				$params['modelUsuario']->cedula = $model->cedula;
				
				if($params['modelUsuario']->validate()){
					
				}
			}
			
			// si guarda
		
			if($model->scenario == 'registro'){
// 				$response = $restClientSII->post('crear', array(
// 						'ClienteFiel[numeroDocumento]' => $model->cedula,
// 						'ClienteFiel[apellidos]' => $model->apellido,
// 						'ClienteFiel[nombres]' => $model->nombre,
// 						'ClienteFiel[apellidosNombres]' =>$model->apellido." ". $model->nombre,
// 						'ClienteFiel[telefono]' => $model->telefonoFijo,
// 						'ClienteFiel[celular]' => $model->telefonoCelular,
// 						'ClienteFiel[IdCiudad]' => $model->ciudad,
// 						'ClienteFiel[numeroDocumento]' => $model->correoElectronico,
// 						'ClienteFiel[idSexo]' => $model->genero,
// 						'ClienteFiel[fechaNacimiento]' => $model->fechaNacimiento,
// 						'ClienteFiel[IdProfesion]' => $model->profesion,
// 						'ClienteFiel[idOcupacion]' => $model->ocupacion,
// 						'ClienteFiel[tieneHijosMenores]' => $model->tieneHijos,
// 						'ClienteFiel[tieneMascotas]' => $model->tieneMascotas,
						
// 				));
				
				if(true) { // guardo con exito
					
					
					// verificar si es usuario de la rebaja virtual
					
					
					
					if($usuario){
						// actualizar usuario con el perfil de cliente fiel
						$usuario->codigoPerfil = Yii::app()->params->clienteFiel['codigoPerfilActivo'];
						$usuario->esClienteFiel = 1;
						
						
						if($usuario->save()){
							
						}
						
						// enviar correo electronico de bienvenida al club
						
					}else{
						
						$usuario = new Usuario();
						$usuario->apellido = $model->apellido;
						$usuario->codigoPerfil = Yii::app()->params->clienteFiel['codigoPerfilActivo'];
						$usuario->correoElectronico;
						$usuario->esClienteFiel = 1;
						$usuario->identificacionUsuario = $model->cedula;
						$usuario->nombre = $model->nombre;
						
						Yii::app()->session[Yii::app()->params->clienteFiel['sesionUsuario']] = $usuario;
						$this->redirect(CController::createUrl('clave'));
						Yii::app()->end();
					}
					
				} else {
					// error al guardar
				}
			}
				
		}else{
				
		}
		
		
		$params['model'] = $model;
		if($this->isMobile){
			$this->render('registro', $params);
		}else{
			$this->render('d_registro', $params);
		}
	}
	

	public function actionAjaxCompleteCiudad($term = null, $id = null){
		$username = Yii::app()->params->clienteFiel['usuario'];
		$password = Yii::app()->params->clienteFiel['password'];
		$token = "$username:$password";
		$token = base64_encode( $token );
		$restURL = Yii::app()->params->clienteFiel['url'];
		
		// cliente SII
		$restClientSII = new RESTClient ();
		$restClientSII->initialize ( array (
				'server' => $restURL,
		) );
		
		$params = array();
		$params['select2'] = '1';
		if($term != null){
			$params['term'] = $term;
		}else if($id != null){
			$params['id'] = $id;
		}
		
		$response = $restClientSII->get('ciudad/index', $params);
		echo CJSON::encode($response);
		Yii::app()->end();
	}
	
	
	public function actionAjaxCompleteProfesiones($term = null, $id = null){
	
		$username = Yii::app()->params->clienteFiel['usuario'];
		$password = Yii::app()->params->clienteFiel['password'];
		$token = "$username:$password";
		$token = base64_encode( $token );
		$restURL = Yii::app()->params->clienteFiel['url'];
		
		// cliente SII
		$restClientSII = new RESTClient ();
		$restClientSII->initialize ( array (
				'server' => $restURL,
		) );
		
		$params = array();
		$params['select2'] = 1;
		
		if($term != null){
			$params['term'] = $term;
		}else if($id != null){
			$params['id'] = $id;
		}
		
		$response = $restClientSII->get('ciudad/index', $params);
		echo CJSON::encode($response);
		Yii::app()->end();
	}
}