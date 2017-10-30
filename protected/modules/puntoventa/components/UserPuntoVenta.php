<?php

class UserPuntoVenta {

    public $isGuest = true;
    public $id = null;
    public $shortName = null;
    public $name = '__GUEST__';
    public $loginUrl = array('/puntoventa/usuario/autenticar');
    public $homeUrl = array('/puntoventa');
    public $profile = null;
    public $codigoVendedor = null;

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

         if (isset(Yii::app()->session[Yii::app()->params->puntoventa['sesion']['usuario']]) && (Yii::app()->session[Yii::app()->params->puntoventa['sesion']['usuario']] instanceof UsuarioPuntoVenta)) {
            $user = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['usuario']];
        } else {
            Yii::app()->session[Yii::app()->params->puntoventa['sesion']['usuario']] = null;
        }
        
        $this->restoreUser($user);
    }

  /*  private function restoreUser($user) {
        if ($user !== null && $user instanceof Operador) {
            $this->isGuest = false;
            $this->id = $user->idOperador;
            $this->name = $user->usuario;
            $nombre = explode(" ", $user->nombre);
            $this->shortName = $nombre[0];
            $this->profile = $user->perfil;
            if(isset($user->objOperadorVendedor->codigoVendedor)){
            	$this->codigoVendedor = $user->objOperadorVendedor->codigoVendedor;
            }
        }
    }*/

    private function restoreUser($user) {
    	if ($user !== null && $user instanceof UsuarioPuntoVenta) {
    		$this->isGuest = false;
    	//	$this->id = $user->idOperador;
    		$this->name = $user->getNombreCompleto();
    		$nombre = explode(" ", $user->getNombreCompleto());
    		$this->shortName = $nombre[0];
    		//$this->profile = $user->perfil;
    		$this->profile = Yii::app()->params->puntoventa['perfil'];
    	//	if(isset($user->objOperadorVendedor->codigoVendedor)){
    		$this->codigoVendedor = $user->getCodigoVendedor();
    	//	}
    	}
    
    }
    public function login($identity) {
        if ($identity !== null && ($identity instanceof OperatorIdentity) && $identity->user !== null) {
            Yii::app()->session[Yii::app()->params->puntoventa['sesion']['usuario']] = $identity->user;


            // $pdv =  OperadorSubasta::model()->find('idOperador =:idoperador', array(':idoperador' => $identity->user->idOperador));
            $pdv =  $identity->user->getPuntoVenta();

            if ($pdv != null) {
                Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']] = $pdv;

                $puntov = PuntoVenta::model()->find('idComercial =:idcomercial', array(':idcomercial' => $pdv));
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
                    Yii::app()->session[Yii::app()->params->puntoventa['sesion']['objCiudadSector']] = $objCiudadSector;
                }
            }
            $this->restoreUser($identity->user);
            
           
            return true;
        }

        return false;
    }
    
    

    public function logout() {
        $sessions = Yii::app()->params->puntoventa['sesion'];
        Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->clear();
        foreach ($sessions as $sesion) {
            unset(Yii::app()->session[$sesion]);
        }
    }

}
