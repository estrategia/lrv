<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginOperatorForm extends CFormModel {

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
            'username' => 'Usuario',
            'password' => 'Clave',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_identity = new OperatorIdentity($this->username, $this->password);
            $this->_identity->authenticate();

            switch ($this->_identity->errorCode) {
                case OperatorIdentity::ERROR_NONE:
                    Yii::app()->controller->module->user->login($this->_identity);
                    break;
                case OperatorIdentity::ERROR_USERNAME_INVALID:
                    $this->addError('username', 'Usuario incorrecto');
                    break;
                case OperatorIdentity::ERROR_USER_INACTIVE:
                    $this->addError('username', 'Usuario inactivo');
                    break;
                case OperatorIdentity::ERROR_PASSWORD_INVALID:
                    $this->addError('password', 'Contrase&ntilde;a incorrecta');
                    break;
                default:
                    $this->addError('password', 'Usuario o contrase&ntilde; incorrecta');
                    break;
            }
        }
    }

}
