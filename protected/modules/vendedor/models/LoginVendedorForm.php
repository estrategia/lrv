<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginVendedorForm extends CFormModel {

    public $username;
    public $password;
    public $condiciones;

    /**
     *
     * @var UserIdentity usuario para autenticacion
     */
    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
        	array('condiciones', 'attributeTrim'),
        	array('username, password', 'required', 'message' => '{attribute} no puede estar vacío'),
        	array('condiciones','required', 'message' =>'Debe aceptar los t&eacute;rminos y condiciones'),
            ///array('urlReferrer', 'safe'),
            array('password', 'authenticate'),
        );
    }

    /**
     * Valida que exista empleado con cedula indicada y que este activo.
     * Este es un validador declarado en rules().
     */
    public function attributeTrim($attribute, $params) {
    	if($attribute=="condiciones" && empty($this->condiciones)){
    		$this->condiciones = null;
    	}
    }
    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'username' => 'Usuario',
            'password' => 'Clave',
        		'condiciones' => 'Acepta t&eacute;rminos y condiciones'
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new VendedorIdentity($this->username, $this->password);
            $this->_identity->authenticate();
           
            switch ($this->_identity->errorCode) {
                case VendedorIdentity::ERROR_NONE:
                    Yii::app()->controller->module->user->login($this->_identity);
                    break;
                case VendedorIdentity::ERROR_USERNAME_INVALID:
                    $this->addError('username', 'Usuario incorrecto');
                    break;
                case VendedorIdentity::ERROR_USER_INACTIVE:
                    $this->addError('username', 'Usuario inactivo');
                    break;
                case VendedorIdentity::ERROR_PASSWORD_INVALID:
                    $this->addError('password', 'Contrase&ntilde;a incorrecta');
                    break;
                default:
                    $this->addError('password', 'Usuario o contrase&ntilde; incorrecta');
                    break;
            }
        }
    }

}
