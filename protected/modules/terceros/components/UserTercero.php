<?php

class UserTercero {

    public $isGuest = true;
    public $id = null;
    public $shortName = null;
    public $name = '__GUEST__';
    public $loginUrl = array('/terceros/usuario/autenticar');
    public $homeUrl = array('/terceros');
    public $codigoProveedor = null;
    // public $profile = null;

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

        if (isset(Yii::app()->session[Yii::app()->params['terceros']['sesion']['usuario']]) && (Yii::app()->session[Yii::app()->params['terceros']['sesion']['usuario']] instanceof UsuarioTercero)) {
            $user = Yii::app()->session[Yii::app()->params['terceros']['sesion']['usuario']];
        } else {
            Yii::app()->session[Yii::app()->params['terceros']['sesion']['usuario']] = null;
        }

        $this->restoreUser($user);
    }

    private function restoreUser($user) {
        if ($user !== null && $user instanceof UsuarioTercero) {
            $this->isGuest = false;
            $this->id = $user->idOperador;
            $this->name = $user->correoContacto;
            $this->shortName = $user->correoContacto;
            $this->codigoProveedor = $user->codigoProveedor;
        }
    }

    public function login($identity) {
        if ($identity !== null && ($identity instanceof TerceroIdentity) && $identity->user !== null) {
            Yii::app()->session[Yii::app()->params['terceros']['sesion']['usuario']] = $identity->user;
            $this->restoreUser($identity->user);
            return true;
        }

        return false;
    }

    public function logout() {
        $sessions = Yii::app()->params['terceros']['sesion'];

        foreach ($sessions as $sesion) {
            unset(Yii::app()->session[$sesion]);
        }
    }

}
