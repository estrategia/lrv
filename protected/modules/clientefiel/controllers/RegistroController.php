<?php

class RegistroController extends ControllerCliente{


	public function actionIndex(){

		if(!Yii::app()->user->isGuest){
			$cedula = Yii::app()->user->name;
			$this->verificarUsuario($cedula);

		} else {

			$modelCedula = new CedulaForm();

			if($_POST){
				$modelCedula->attributes = $_POST['CedulaForm'];
				$this->verificarUsuario($modelCedula->cedula);
			}else{
				$modelCliente = new RegistroClienteFielForm();
				Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $modelCliente;
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

		$restURL = Yii::app()->params->clienteFiel['url'];

		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesion']])){
			$model = Yii::app()->session[Yii::app()->params->clienteFiel['sesion']];
		}else{
			$model = new RegistroClienteFielForm();
		}

		try {

			$usuario = Usuario::model()->findByPK($cedula);
			$model->clienteInterno = false;
			// consultar si es asociado

			$asociado = self::callWSUsuarioInterno($cedula);

			if($asociado){
				$model->clienteInterno = true;
			}
			if($usuario == null){
				$model->cedula = $cedula;
				$model->scenario = "registro";
				//$model->solicitarVerificacion = true;
				$model->verificacionValidada = true;
				Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;
				// Se debe redireccionar para continuar el registro
				$this->redirect(CController::createUrl('realizarRegistro', array()));
				Yii::app()->end();
			} else if($usuario->esClienteFiel){
				$model->cedula = $cedula;
				$model->scenario = "actualizar";
			//	$model->solicitarVerificacion = false;

				// consultar y enviar a la verificacion por celular y correo electronico

				try{

					$restClientSII = new RESTClient ();
					$restClientSII->initialize ( array (
							'server' => $restURL,
					) );

					// Buscar para ver si existe el cliente

					$response = $restClientSII->get('cliente/ver', array(
							'numeroDocumento' => $model->cedula,
					));

					if($restClientSII->status()==200) {

						$response = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true );
						$data = $response['data'];
						$model->telefonoCelular = $data['celular'];
						$model->correoElectronico = $data['email'];
						$sql = "update t_CodigoVerificacion set estado = 0 WHERE numeroDocumento = $cedula";
						Yii::app()->db->createCommand($sql)->execute();

						$codigoVerificacion = new CodigoVerificacion();
						$codigoVerificacion->numeroTelefono = $model->telefonoCelular;
						$codigoVerificacion->numeroDocumento = $cedula;

						$elibom = new ElibomClient(Yii::app()->params['elibom']['url'], Yii::app()->params['elibom']['usuario'], Yii::app()->params['elibom']['password']);

						if($codigoVerificacion->save()){
							$telefono = $codigoVerificacion->numeroTelefono;
							$mensaje = "La Rebaja te informa el código de verificacion: ".$codigoVerificacion->idCodigo;
							$mensaje = str_replace(" ", "%20", $mensaje);
							$response = $elibom->sendMessage($telefono, $mensaje);

							// Se envia correo electr�nico al n�mero

							if($response['action'] == 'sendmessage') {
								Yii::log("Error enviando numero telefono $telefono codigo Verificacion  \n" , CLogger::LEVEL_INFO, 'application');
							}

							$this->enviarCodigoVerificacion($model->nombre,$codigoVerificacion->idCodigo,$model->correoElectronico);

							$modelCedula = new VerificacionForm();
							$modelCedula->cedula = $cedula;

							Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']] = $modelCedula;

							$model->verificacionValidada = false;
							Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;

							$this->redirect(CController::createUrl('codigoVerificacion'));
						}
					}else{
						$model->scenario = "registro";
					//	$model->solicitarVerificacion = true;
						$model->verificacionValidada = false;
						Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;
						// Se debe redireccionar para continuar el registro
						$this->redirect(CController::createUrl('realizarRegistro', array()));
						Yii::app()->end();
					}
					// inactivar los demas codigos de verificaion del usuario para evitar fraudes



				}catch(Exception $e){
					echo $e->getMessage();
					exit();
				}


			}else{
				$model->scenario = "registro";
				//$model->solicitarVerificacion = true;
				$model->verificacionValidada = true;
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

			//		$model->solicitarVerificacion = false;
					$model->verificacionValidada = false;
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
							$mensaje = "La Rebaja te informa el código de verificacion: ".$codigoVerificacion->idCodigo;
							$mensaje = str_replace(" ", "%20", $mensaje);
							$response = $elibom->sendMessage($telefono, $mensaje);

							// Se envia correo electr�nico al n�mero

							if($response['action'] == 'sendmessage') {
								Yii::log("Error enviando numero telefono $telefono codigo Verificacion  \n" , CLogger::LEVEL_INFO, 'application');
							}

							$this->enviarCodigoVerificacion($model->nombre,$codigoVerificacion->idCodigo,$model->correoElectronico);

							$modelCedula = new VerificacionForm();
							$modelCedula->cedula = $cedula;

							Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']] = $modelCedula;
							$this->redirect(CController::createUrl('codigoVerificacion'));
						}

					}catch(Exception $e){
						echo $e->getMessage();
						exit();
					}

				}else{
				//	$model->solicitarVerificacion = true;
					Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;
					$this->redirect(CController::createUrl('realizarRegistro', array()));
				}

			}

		} catch (Exception $e){
			print_r($e->getMessage());exit();
			// not implemented yet
		}

	}


	public function enviarCodigoVerificacion($nombre,$codigoVerificacion,$email){
		$asuntoCorreo = Yii::app()->params->clienteFiel['asuntoVerificacion'];
		$contenidoCorreo = $this->renderPartial(Yii::app()->params->rutasPlantillasCorreo['verificacionClienteFiel'], array(
				'nombre' => $nombre,
				'codigo' =>$codigoVerificacion

		), true, true);

		$htmlCorreo = PlantillaCorreo::getContenido('codigoVerificacion',$contenidoCorreo);

		try {
			sendHtmlEmail($email, $asuntoCorreo, $htmlCorreo);
		} catch (Exception $ce) {
			Yii::log("Error enviando correo $email - $asuntoCorreo codigo Verificacion  \n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
		}

		return true;
	}

	public function enviarCorreoBienvenida($objUsuario,$email){
		$asuntoCorreo = Yii::app()->params->clienteFiel['asuntoVerificacion'];
		$contenidoCorreo = $this->renderPartial(Yii::app()->params->rutasPlantillasCorreo['bienvenidaClienteFiel'], array(
				'objUsuario' => $objUsuario,
		), true, true);

		$htmlCorreo = PlantillaCorreo::getContenido('bienvenidaClienteFiel',$contenidoCorreo);
		try {
			sendHtmlEmail($email, $asuntoCorreo, $htmlCorreo);
		} catch (Exception $ce) {
			Yii::log("Error enviando correo $email - $asuntoCorreo codigo Verificacion  \n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
		}

		return true;
	}


	public static function callWSUsuarioInterno($username) {
		$client = new SoapClient(Yii::app()->params->webServiceUrl['persona'], array(
				"trace" => 1,
				"exceptions" => 0,
				'connection_timeout' => 5,
				'cache_wsdl' => WSDL_CACHE_NONE
		));

		try {
			$result = $client->getPersona($username);

			return $result;
		} catch (SoapFault $exc) {
			//$this->addError('password', 'ha ocurrido un error');
		} catch (Exception $exc) {
			//$this->addError('password', 'ha ocurrido un error');
		}
	}



	public function actionCodigoVerificacion(){


		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']])){
			$modelCedula = Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']];
		}else{
			$this->redirect(CController::createUrl('index'));
			Yii::app()->end();
		}

		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesion']])){
			$model = Yii::app()->session[Yii::app()->params->clienteFiel['sesion']];
		}

		$celular = $model->telefonoCelular;
		$email =  $model->correoElectronico;

		$celular = "XXX-XXX-X". substr($celular,-3);
		$email = substr($email,0,3)."XXXX@XXXXX.XXX";


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

				$model->verificacionValidada = true;
				Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;
				$this->redirect(CController::createUrl('realizarRegistro'));
				Yii::app()->end();
			}else{
				$modelCedula->addError('codigoVerificacion', "El c&oacute;digo no es correcto");
			}
		}

		if($this->isMobile){
			$this->render('codigoVerificacion', array(
					'model' => $modelCedula,
					'celular' => $celular,
					'email' => $email,
					'paso' => 1
			));
		}else{
			$this->render('d_codigoVerificacion', array(
					'model' => $modelCedula,
					'celular' => $celular,
					'email' => $email,
					'paso' => 1
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

		$model = new RegistroClienteFielForm();
		
		if(!$model->verificacionValidada){
			$this->redirect(CController::createUrl('index'));
			Yii::app()->end();
		}
		
		$listCiudad = array();
		$listProfesion = array();
		$listOcupacion = array();

		// cliente SII
		$restURL = Yii::app()->params->clienteFiel['url'];
		$restClientDatos = new RESTClient ();
		$restClientDatos->initialize ( array (
		    'server' => $restURL,
		) );
		
		$listCiudad = $restClientDatos->get('ciudad/list');
		if($restClientDatos->status() == 200) {
		    $listCiudad = CJSON::decode($listCiudad);
		}

		$listProfesion = $restClientDatos->get('profesion/list');
		if($restClientDatos->status() == 200) {
		    $listProfesion = CJSON::decode($listProfesion);
		    $listOcupacion = $listProfesion['ocupaciones'];
		    $listProfesion = $listProfesion['profesiones'];
		}

		$params[] = array();
		$params['listCiudad'] = $listCiudad;
		$params['listProfesion'] = $listProfesion;
		$params['listOcupacion'] = $listOcupacion;
		
		$usuario = Usuario::model()->findByPk($model->cedula);
        
		// cliente SII
		$restClientSII = new RESTClient();
		$restClientSII->initialize ( array (
				'server' => $restURL,
		) );

		// Buscar para ver si existe el cliente

		$response = $restClientSII->get('cliente/ver', array(
            'numeroDocumento' => $model->cedula,
		));
        
		if($restClientSII->status()==200) {
			$model->scenario = 'actualizar';
			$response = json_decode( preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $response), true );
			$data = $response['data'];
			$model->cedula = $model->cedula;
			$model->nombre = $data['nombres'];
			$model->apellido = $data['apellidos'];
			$model->telefonoCelular = $data['celular'];
			$model->telefonoFijo = $data['telefono'];
			$model->correoElectronico = $data['email'];
			$model->tieneMascotas = $data['tieneMascota'];
			$model->tieneHijos = $data['tieneHijosMenores'];
			$model->fechaNacimiento = $data['fechaNacimiento'];
			$model->ciudad = $data['IdCiudad'];
			$model->genero = $data['IdSexo'];
			$model->profesion = $data['IdProfesion'];
			$model->ocupacion = $data['IdOcupacion'];

			$model->scenario = 'actualizar';
		} else {
			$model->scenario = 'registro';

			if(!$usuario){
				$params['modelUsuario'] = new UsuarioForm();
			}
		}

		if($_POST){
			$model->attributes = $_POST['RegistroClienteFielForm'];
			$model->ocupacion= $_POST['RegistroClienteFielForm']['ocupacion'];
			$error = false;
			if(isset($_POST['UsuarioForm'])){

				$params['modelUsuario']->attributes = $_POST['UsuarioForm'];
				$params['modelUsuario']->cedula = $model->cedula;

				if(!$params['modelUsuario']->validate()){
					$error = true;
				}else{
					$model->password = $params['modelUsuario']->clave;
				}
			}

			if(!$model->validate()){
				$error = true;
			}

			// si guarda

			if(!$error){
				// solicitar un nuevo codigo de verificacion por correo
				if($model->scenario == 'registro'){
					Yii::app()->session[Yii::app()->params->clienteFiel['sesion']] = $model;

					try{
						$cedula = $model->cedula;
						// inactivar los demas codigos de verificaion del usuario para evitar fraudes

						$sql = "update t_CodigoVerificacion set estado = 0 WHERE numeroDocumento = $cedula";
						Yii::app()->db->createCommand($sql)->execute();

						$codigoVerificacion = new CodigoVerificacion();
						$codigoVerificacion->numeroTelefono = $model->telefonoCelular;
						$codigoVerificacion->numeroDocumento = $cedula;

						$elibom = new ElibomClient(Yii::app()->params['elibom']['url'], Yii::app()->params['elibom']['usuario'], Yii::app()->params['elibom']['password']);

						if($codigoVerificacion->save()){
							$telefono = $codigoVerificacion->numeroTelefono;

							$this->enviarCodigoVerificacion($model->nombre,$codigoVerificacion->idCodigo,$model->correoElectronico);

							$modelCedula = new VerificacionForm();
							$modelCedula->cedula = $cedula;

							Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']] = $modelCedula;
							$this->redirect(CController::createUrl('codigoVerificacionFinal'));
						}

					}catch(Exception $e){
						echo $e->getMessage();
						exit();
					}
				}else if($model->scenario == 'actualizar'){

					$response = $restClientSII->put("cliente/actualizar/numeroDocumento/$model->cedula", array(
							//'numeroDocumento' => $model->cedula,
							'apellidos' => $model->apellido,
							'nombres' => $model->nombre,
							'apellidosNombres' =>$model->apellido." ". $model->nombre,
							'telefono' => $model->telefonoFijo,
							'celular' => $model->telefonoCelular,
							'IdCiudad' => $model->ciudad,
							'email' => $model->correoElectronico,
							'idSexo' => $model->genero,
							'fechaNacimiento' => $model->fechaNacimiento,
							'IdProfesion' => $model->profesion,
							'IdOcupacion' => $model->ocupacion,
							'tieneHijos' => $model->tieneHijos,
							'tieneHijosMenores' => $model->tieneHijos,
							'tieneMascota' => $model->tieneMascotas,
					));

					if($restClientSII->status()==200 ) {
						$this->limpiarVariables();
						$this->redirect(CController::createUrl('bienvenida'));

						Yii::app()->end();
					}
				}
			}
		}


		$params['model'] = $model;
		if($this->isMobile){
			$this->render('registro', $params);
		}else{
			$this->render('d_registro', $params);
		}
	}


	public function actionEnvioVerificacion(){
		$cedula = $_POST['cedula'];
		$tipo = $_POST['tipo'];
		$correo = $nombre =  null;
		if($tipo == 1){
			$celular = $_POST['celular'];
		}else{
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

			$celular = $result[0]->C_CELULAR;
			$correo = $result[0]->C_CORREO_MAIN;
			$nombre = $result[0]->NAME;
		}

		$sql = "update t_CodigoVerificacion set estado = 0 WHERE numeroDocumento = $cedula";
		Yii::app()->db->createCommand($sql)->execute();

		$codigoVerificacion = new CodigoVerificacion();
		$codigoVerificacion->numeroTelefono = $celular;
		$codigoVerificacion->numeroDocumento = $cedula;

		$elibom = new ElibomClient(Yii::app()->params['elibom']['url'], Yii::app()->params['elibom']['usuario'], Yii::app()->params['elibom']['password']);

		if($codigoVerificacion->save()){
			$telefono = $celular;
			$mensaje = "La Rebaja te informa el código de verificacion: ".$codigoVerificacion->idCodigo;
			$mensaje = str_replace(" ", "%20", $mensaje);
			$response = $elibom->sendMessage($telefono, $mensaje);

			if($tipo != 1 && $correo != ""){
				$this->enviarCodigoVerificacion($nombre,$codigoVerificacion->idCodigo,$correo);
			}

			echo CJSON::encode(array('result' => 'ok', 'response' => 'Se ha enviado un codigo a tu celular'));
			Yii::app()->end();
		}

		echo CJSON::encode(array('result' => 'error', 'response' => 'Error al enviar la comprobaci&oacute;n al celular, comunicate con nosotros'));
		Yii::app()->end();
	}

	public function actionCodigoVerificacionFinal(){

		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']]) &&
				isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesion']])){
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

				$this->actionGuardarDatos();

				Yii::app()->end();
			}else{
				$modelCedula->addError('codigoVerificacion', "El c&oacute;digo no es correcto");
			}
		}

		if($this->isMobile){
			$this->render('codigoVerificacion', array(
					'model' => $modelCedula,
					'paso' => 2
			));
		}else{
			$this->render('d_codigoVerificacion', array(
					'model' => $modelCedula,
					'paso' => 2
			));
		}
	}


	public function actionBienvenida(){
		if($this->isMobile){
			$this->render('bienvenida');
		}else{
			$this->render('d_bienvenida');
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

	private function  actionGuardarDatos(){

		$restClientSII = new RESTClient ();
		$restURL = Yii::app()->params->clienteFiel['url'];

		$restClientSII->initialize ( array (
				'server' => $restURL,
		) );
		if(isset(Yii::app()->session[Yii::app()->params->clienteFiel['sesion']])) {
			$model = Yii::app()->session[Yii::app()->params->clienteFiel['sesion']];
		}

		$usuario = Usuario::model()->findByPk($model->cedula);

		$response = $restClientSII->post('cliente/crear', array(
				'numeroDocumento' => $model->cedula,
				'IdTipoDocumento' => 1,
				'apellidos' => $model->apellido,
				'nombres' => $model->nombre,
				'apellidosNombres' =>$model->apellido." ". $model->nombre,
				'telefono' => $model->telefonoFijo,
				'celular' => $model->telefonoCelular,
				'IdCiudad' => $model->ciudad,
				'email' => $model->correoElectronico,
				'IdSexo' => $model->genero,
				'fechaNacimiento' => $model->fechaNacimiento,
				'IdProfesion' => $model->profesion,
				'IdOcupacion' => $model->ocupacion,
				'tieneHijos' => $model->tieneHijos,
				'tieneHijosMenores' => $model->tieneHijos,
				'tieneMascota' => $model->tieneMascotas,
				'aceptaPolitica' => 1,
		));


		if($restClientSII->status()==200 ) { // guardo con exito

			// verificar si es usuario de la rebaja virtual

			if($usuario){
				// actualizar usuario con el perfil de cliente fiel
				if(!$model->clienteInterno){
					$usuario->codigoPerfil = Yii::app()->params->clienteFiel['codigoPerfilActivo'];
				}
				$usuario->esClienteFiel = 1;


				if($usuario->save()){

					$this->enviarCorreoBienvenida($usuario,$usuario->correoElectronico);
					$this->limpiarVariables();
					$this->redirect(CController::createUrl('bienvenida'));
				}

				// enviar correo electronico de bienvenida al club

			} else{

				$usuario = new Usuario();
				$usuario->apellido = $model->apellido;
				if($model->clienteInterno){
					$usuario->codigoPerfil = Yii::app()->params->perfil['asociado'];
				}else{
					$usuario->codigoPerfil = Yii::app()->params->clienteFiel['codigoPerfilActivo'];
				}
				$usuario->correoElectronico = $model->correoElectronico;
				$usuario->esClienteFiel = 1;
				$usuario->identificacionUsuario = $model->cedula;
				$usuario->nombre = $model->nombre;

				$usuario->clave = md5($model->password);
				$usuario->save();

				$usuarioExtendida = new UsuarioExtendida();
				$usuarioExtendida->identificacionUsuario = $model->cedula;
				$usuarioExtendida->fechaNacimiento = $model->fechaNacimiento;
				$usuarioExtendida->genero = $model->genero;
				$usuarioExtendida->fechaRegistro = Date("Y-m-d H:i:s");
				$usuarioExtendida->save();

				$this->enviarCorreoBienvenida($usuario,$usuario->correoElectronico);
				$this->limpiarVariables();
				$this->redirect(CController::createUrl('bienvenida'));
				Yii::app()->end();
			}

		} else {
			// error al guardar
		}
	}

	public function limpiarVariables(){
		unset(Yii::app()->session[Yii::app()->params->clienteFiel['sesion']]);
		unset(Yii::app()->session[Yii::app()->params->clienteFiel['sesionVerificacion']]);
	}
}
