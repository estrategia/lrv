<?php

class RegistroController extends Controller{
	
	
	public function actionIndex(){
		
		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesion']])){
			$model = Yii::app()->session[Yii::app()->params->clienteFiel['sesion']];
		}else{
			$model = new RegistroClienteFielForm();
		}
		
		$clientSugar = new SoapClient(null, array(
				'location' => Yii::app()->params->webServiceUrl['crmLrv'],
				'uri' => "",
				'trace' => 1,
				'connection_timeout' => 5,
		));
		
		if(!Yii::app()->user->isGuest){
			
			$cedula = Yii::app()->user->name;
			$codigoSeguridad = Yii::app()->params->codigoSeguridadCRM;
			$llave = md5($cedula.$codigoSeguridad);
				
		
			try {
				$result = $clientSugar->__soapCall("ConsultarCliente",
						array( 'identificacion' => $cedula,
								'key' => $llave
						));
				
				if (!empty($result) && isset($result[0])) {
					$model->cedula = Yii::app()->user->name	;
					$model->nombre = $result[0]->NAME;
					$model->apellido = $result[0]->C_APELLIDO;
					$model->telefonoCelular = $result[0]->C_CELULAR;
					$model->telefonoFijo = $result[0]->C_TEL_CASA;
					$model->correoElectronico = $result[0]->C_CORREO_MAIN;
					$model->tieneMascotas = $result[0]->TIENEMASCOTA;
					$model->tieneHijos = $result[0]->TIENEHIJOSMENORES;
					$model->fechaNacimiento = $result[0]->C_FECHA_NACIMIENTO;
					$model->ciudad = $result[0]->C_CIUDAD;
					$model->genero = $result[0]->C_SEXO;
					$this->render('codigoVerificacion', array(
					
					));
				}
			}catch(Exception $e){}
			
			Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;
			
			$this->redirect(CController::createUrl('realizarRegistro', array()));
		}else{
			
			$modelCedula = new CedulaForm();
			if($_POST){
				$modelCedula->attributes = $_POST['CedulaForm'];
				try {
					$cedula = $modelCedula->cedula;
					$codigoSeguridad = Yii::app()->params->codigoSeguridadCRM;
					$llave = md5($cedula.$codigoSeguridad);
					
					$result = $clientSugar->__soapCall("ConsultarCliente",
							array( 'identificacion' => $cedula,
									'key' => $llave
							));
					
					
					if (!empty($result) && isset($result[0])) {
						// El cliente existe y por tanto tiene que enviar codigo de verificacion
						
						// Invocar servicio para envio de mensaje de texto
						
						$model->nombre = $result[0]->NAME;
						$model->apellido = $result[0]->C_APELLIDO;
						$model->telefonoCelular = $result[0]->C_CELULAR;
						$model->telefonoFijo = $result[0]->C_TEL_CASA;
						$model->correoElectronico = $result[0]->C_CORREO_MAIN;
						$model->tieneMascotas = $result[0]->TIENEMASCOTA;
						$model->tieneHijos = $result[0]->TIENEHIJOSMENORES;
						$model->fechaNacimiento = $result[0]->C_FECHA_NACIMIENTO;
						$model->ciudad = $result[0]->C_CIUDAD;
						$model->genero = $result[0]->C_SEXO;
						$this->render('codigoVerificacion', array(
								
						));
						
						Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;
						
						// redireccionar vista de sms
						
						$this->redirect(CController::createUrl('codigoVerificacion'));
					}
					
				} catch (Exception $e){
					// not implemented yet
					
				}
				
				// Se debe redireccionar para continuar el registro
				$this->redirect(CController::createUrl('realizarRegistro', array(
						'numeroDocumento' => $_POST['numeroDocumento']
				)));
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
	
	
	public function actionRealizarRegistro(){
		
		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesion']])){
			$model = Yii::app()->session[Yii::app()->params->clienteFiel['sesion']];
		}else{
			$this->redirect(CController::createUrl('index'));
			Yii::app()->end();
		}
				
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
		
		
		// Buscar para ver si existe el cliente
			
		if($restClientSII->status()==200) {
			$model->scenario = "actualizar";
		} else {
			$model->scenario = "registro";
			
		}
		
		if($_POST){
			$model->attributes = $_POST['RegistroClienteFielForm'];
		
			// si guarda
		
			if($model->scenario == 'registro'){
				$response = $restClient->post('crear', array(
						'ClienteFiel[numeroDocumento]' => $model->cedula,
						'ClienteFiel[apellidos]' => $model->apellido,
						'ClienteFiel[nombres]' => $model->nombre,
						'ClienteFiel[apellidosNombres]' =>$model->apellido." ". $model->nombre,
						'ClienteFiel[telefono]' => $model->telefonoFijo,
						'ClienteFiel[celular]' => $model->telefonoCelular,
						'ClienteFiel[IdCiudad]' => $model->ciudad,
						'ClienteFiel[numeroDocumento]' => $model->correoElectronico,
						'ClienteFiel[idSexo]' => $model->genero,
						'ClienteFiel[fechaNacimiento]' => $model->fechaNacimiento,
						'ClienteFiel[IdProfesion]' => $model->profesion,
						'ClienteFiel[idOcupacion]' => $model->ocupacion,
						'ClienteFiel[tieneHijosMenores]' => $model->tieneHijos,
						'ClienteFiel[tieneMascotas]' => $model->tieneMascotas,
						
				));
				
				if($restClient->status()==200) {
					// guardo con exito
					
					
					// verificar si es usuario de la rebaja virtual
					
					$usuario = Usuario::model()->findByPk($model->cedula);
					
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
	
	public function actionClave(){
		
		$model = new UsuarioForm();
		
		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesionUsuario']])){
			$usuario = Yii::app()->session[Yii::app()->params->clienteFiel['sesionUsuario']];
		}else{
			$this->redirect(CController::createUrl('index'));
			Yii::app()->end();
		}
		
		if($_POST){
			$model->attributes = $_POST['UsuarioForm'];
			$model->cedula = $usuario->cedula;
			if($model->validate()){
				$usuario->clave = md5($model->clave);
				if($usuario->save()){
					// usuario actualizado exitosamente
				}
			}
		}
		
		if($this->isMobile){
			$this->render('clave', array(
					'model' => $model
			));
			
		}else{
			$this->render('d_clave', array(
					'model' => $model
			));
				
		}
		
	}
}