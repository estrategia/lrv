<?php

class UserOperator {

    public $isGuest = true;
    public $id = null;
    public $shortName = null;
    public $name = '__GUEST__';
    public $loginUrl = array('/callcenter/usuario/autenticar');
    public $homeUrl = array('/callcenter');
    public $profile = null;

    public function init() {
        $this->restoreFromSession();
    }

    public function getIsGuest() {
        return $this->isGuest;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getShortName() {
        return $this->shortName;
    }

    /**
     * Restores the shopping cart from the session
     */
    public function restoreFromSession() {
        $user = null;

        if (isset(Yii::app()->session[Yii::app()->params->callcenter['sesion']['usuario']]) && (Yii::app()->session[Yii::app()->params->callcenter['sesion']['usuario']] instanceof Operador)) {
            $user = Yii::app()->session[Yii::app()->params->callcenter['sesion']['usuario']];
        } else {
            Yii::app()->session[Yii::app()->params->callcenter['sesion']['usuario']] = null;
        }

        $this->restoreUser($user);
    }

    private function restoreUser($user) {
        if ($user !== null && $user instanceof Operador) {
            $this->isGuest = false;
            $this->id = $user->idOperador;
            $this->name = $user->usuario;
            $nombre = explode(" ", $user->nombre);
            $this->shortName = $nombre[0];
            $this->profile = $user->perfil;
        }
    }

    public function login($identity) {
        if ($identity !== null && ($identity instanceof OperatorIdentity) && $identity->user !== null) {
            Yii::app()->session[Yii::app()->params->callcenter['sesion']['usuario']] = $identity->user;
            $this->restoreUser($identity->user);
            return true;
        }

        return false;
    }

    public function logout() {
        $sessions = Yii::app()->params->callcenter['sesion'];

        foreach ($sessions as $sesion) {
            unset(Yii::app()->session[$sesion]);
        }
    }

}
