<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginTerceroForm extends CFormModel {

    public $username;
    public $password;

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
            'username' => 'Correo',
            'password' => 'Clave',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new TerceroIdentity($this->username, $this->password);
            $this->_identity->authenticate();

            switch ($this->_identity->errorCode) {
                case TerceroIdentity::ERROR_NONE:
                    Yii::app()->controller->module->user->login($this->_identity);
                    break;
                case TerceroIdentity::ERROR_USERNAME_INVALID:
                    $this->addError('username', 'Correo incorrecto');
                    break;
                case TerceroIdentity::ERROR_USER_INACTIVE:
                    $this->addError('username', 'Usuario inactivo');
                    break;
                case TerceroIdentity::ERROR_PASSWORD_INVALID:
                    $this->addError('password', 'Contrase&ntilde;a incorrecta');
                    break;
                default:
                    $this->addError('password', 'Correo o contrase&ntilde; incorrecta');
                    break;
            }
        }
    }

}
