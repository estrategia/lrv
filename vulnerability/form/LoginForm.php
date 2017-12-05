<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel {

    public $username;
    public $password;

    /**
     *
     * @var UserIdentity usuario para autenticacion
     */
    private $_identity;

    /**
     *
     * @var string url desde donde se ingresa al login
     */
    public $urlReferrer;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('username, password', 'required', 'message' => '{attribute} no puede estar vacío'),
            ///array('urlReferrer', 'safe'),
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'username' => 'Cédula',
            'password' => 'Contraseña',
        );
    }

   /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();

            switch ($this->_identity->errorCode) {
                case UserIdentity::ERROR_NONE:
                    Yii::app()->user->login($this->_identity);
                    break;
                case UserIdentity::ERROR_USERNAME_INVALID:
                    $this->addError('username', 'Usuario incorrecto');
                    break;
                case UserIdentity::ERROR_USER_INACTIVE:
                    $this->addError('username', 'Usuario inactivo');
                    break;
                case UserIdentity::ERROR_PASSWORD_INVALID:
                    $this->addError('password', 'Contrase&ntilde;a incorrecta');
                    break;
                case UserIdentity::ERROR_USER_ACCESS:
                    $this->addError('username', 'Error al registrar acceso a usuario');
                    break;
                case UserIdentity::ERROR_USER_VALIDATE:
                    $this->addError('username', 'Error de validaci&oacute;n para efectuar autenticaci&oacute;n');
                    break;
                default:
                    $this->addError('password', 'Usuario o contrase&ntilde; incorrecta');
                    break;
            }
        }
    }
}