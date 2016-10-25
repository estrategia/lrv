<?php

class UserEntrega {

    public $isGuest = true;
    public $id = null;
    public $shortName = null;
    public $name = '__GUEST__';
    public $loginUrl = array('/entreganacional/usuario/autenticar');
    public $homeUrl = array('/entreganacional');
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

        if (isset(Yii::app()->session[Yii::app()->params->entreganacional['sesion']['usuario']]) && (Yii::app()->session[Yii::app()->params->entreganacional['sesion']['usuario']] instanceof Operador)) {
            $user = Yii::app()->session[Yii::app()->params->entreganacional['sesion']['usuario']];
        } else {
            Yii::app()->session[Yii::app()->params->entreganacional['sesion']['usuario']] = null;
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
            Yii::app()->session[Yii::app()->params->entreganacional['sesion']['usuario']] = $identity->user;

            $pdv = OperadorSubasta::model()->find('idOperador =:idoperador', array(':idoperador' => $identity->user->idOperador));

            if ($pdv != null) {
                Yii::app()->session[Yii::app()->params->entreganacional['sesion']['pdv']] = $pdv->idComercial;

                $puntov = PuntoVenta::model()->find('idComercial =:idcomercial', array('idcomercial' => $pdv->idComercial));
                $objCiudadSector = SectorCiudad::model()->find(array(
                    'with' => array('objCiudad', 'objSector'),
                    'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
                    'params' => array(
                        'ciudad' => $puntov->codigoCiudad,
                        'sector' => $puntov->idSectorLRV,
                        'estado' => 1
                    )
                ));
                if ($objCiudadSector != null) {
                    Yii::app()->session[Yii::app()->params->entreganacional['sesion']['objCiudadSector']] = $objCiudadSector;
                }
            }
            $this->restoreUser($identity->user);
            return true;
        }

        return false;
    }

    public function logout() {
        $sessions = Yii::app()->params->entreganacional['sesion'];

        foreach ($sessions as $sesion) {
            unset(Yii::app()->session[$sesion]);
        }
    }

}
