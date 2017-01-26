<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class OperatorIdentity extends CUserIdentity {
    const ERROR_USER_INACTIVE = 3;
    public $user = null;
    
    /**
     * Autentica un usuario
     * Verfica si usuario existe en base de datos
     * y que corresponda con su password
     * @return boolean si autenticacion es correcta
     */
    public function _authenticate_() {
        $user = Operador::model()->find(array(
            'condition' => 't.usuario=:usuario AND t.perfil IN ('.implode(", ",Yii::app()->params->callcenter['perfiles']).')',
            'params' => array(
                ':usuario' => $this->username
            )
        ));
        
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($user->activo != Yii::app()->params->usuario['estado']['activo']) {
            $this->errorCode = self::ERROR_USER_INACTIVE;
        } else if (!$user->validarContrasena($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->errorCode = self::ERROR_NONE;
            $this->user = $user;
        }
        
        return !$this->errorCode;
    }
    
    public function authenticate() {
    /*	$user = Operador::model()->find(array(
    			'condition' => 't.usuario=:usuario AND t.perfil IN ('.implode(", ",Yii::app()->params->callcenter['perfiles']).')',
    			'params' => array(
    					':usuario' => $this->username
    			)
    	));*/
    	
    	$resultWebServicesLogin = self::callWSLogin($this->username, $this->password);
    	if ($resultWebServicesLogin['result'] == 3) {
    		$this->errorCode = self::ERROR_NONE;
    		
          //  echo "<pre>";print_r($resultWebServicesLogin);exit();
    		$this->user = new UsuarioPuntoVenta();
    		$this->user->setUsername($resultWebServicesLogin['response']['Username']);
    		$this->user->setEmail($resultWebServicesLogin['response']['Email']);
    		$this->user->setNombreCompleto($resultWebServicesLogin['response']['NombreCompleto']);
    		$this->user->setPuntoVenta($resultWebServicesLogin['response']['Pdv']);
    		$this->user->setCodigoVendedor($resultWebServicesLogin['response']['CodigoVendedor']);
    		
    	} else if ($resultWebServicesLogin['result'] == 0) {
    		$this->errorCode = self::ERROR_USERNAME_INVALID;
    	} else if ($resultWebServicesLogin['result'] == 1) {
    		$this->errorCode = self::ERROR_USER_INACTIVE;
    	} else if ($resultWebServicesLogin['result'] == 2) {
    		$this->errorCode = self::ERROR_PASSWORD_INVALID;
    	}
    	return !$this->errorCode;
    }
    
    /**
     * Funcion para consumir el web services de login
     * @param string $username, string password
     * @return array['result'],
     */
    public static function callWSLogin($username, $password) {
    	$client = new SoapClient(Yii::app()->params->webServiceUrl['persona'], array(
    			"trace" => 1,
    			"exceptions" => 0,
    			'connection_timeout' => 5,
    			'cache_wsdl' => WSDL_CACHE_NONE
    	));
    
    	try {
    		$result = $client->getLogin($username, sha1($password),true);
    		
    		return $result;
    	} catch (SoapFault $exc) {
    		$this->addError('password', 'ha ocurrido un error');
    	} catch (Exception $exc) {
    		$this->addError('password', 'ha ocurrido un error');
    	}
    }

}
