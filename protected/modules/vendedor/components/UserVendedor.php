<?php

class UserVendedor {

    public $isGuest = true;
    public $id = null;
    public $code = null;
    public $shortName = null;
    
    public $clienteInvitado =  false;
    public $cedulaCliente =  null;
    public $nombreCliente =  null;
    public $nombreCortoCliente =  null;
    public $codigoPerfilCliente =  null;
    
    public $name = '__GUEST__';
    public $loginUrl = array('/vendedor/usuario/autenticar');
    public $homeUrl = array('/vendedor');
    public $profile = null;

    public function init() {
        $this->restoreFromSession();
    }

    public function getIsGuest() {
        return $this->isGuest;
    }
    
    public function getIsClienteInvitado(){
        return $this->clienteInvitado;
    }
    
    public function getClienteLogueado(){
        return $this->clienteInvitado == false && $this->cedulaCliente !== null;
    }
    
    public function getCedulaCliente(){
        return $this->cedulaCliente;
    }    

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
    
    public function getNombreCliente() {
        return $this->nombreCliente;
    }

    public function getShortName() {
        return $this->shortName;
    }
  

    /**
     * Restores the shopping cart from the session
     */
    public function restoreFromSession() {
        $user = null;
        $cliente = null;

        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['usuario']]) && (Yii::app()->session[Yii::app()->params->vendedor['sesion']['usuario']] instanceof Operador)) {
            $user = Yii::app()->session[Yii::app()->params->vendedor['sesion']['usuario']];
        } else {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['usuario']] = null;
        }
        
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']]) && (Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']] instanceof Usuario)) {
            $cliente = Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']];
        } else {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']] = null;
        }
        $this->restoreUser($user,$cliente);
    }

    private function restoreUser($user, $cliente = null) {
        if ($user !== null && $user instanceof Operador) {
            $this->isGuest = false;
            $this->id = $user->idOperador;
            $this->code = $user->objOperadorVendedor->codigoVendedor;
            $this->name = $user->usuario;
            $nombre = explode(" ", $user->nombre);
            $this->shortName = $nombre[0];
            $this->profile = $user->perfil;
        }
        if ($cliente !== null && $cliente instanceof Usuario) {
            $this->clienteInvitado = false;
            $this->cedulaCliente = $cliente->identificacionUsuario;
            $this->nombreCliente = $cliente->nombre." ".$cliente->apellido;
            $nombre = explode(" ", $this->nombreCliente);
            $this->nombreCortoCliente = $nombre[0];
            $this->codigoPerfilCliente = $cliente->codigoPerfil;
        }
        
        if(isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['compraInvitado']])){
            $this->clienteInvitado = Yii::app()->session[Yii::app()->params->vendedor['sesion']['compraInvitado']];
        }
    }
    
    public function login($identity) {
        if ($identity !== null && ($identity instanceof VendedorIdentity) && $identity->user !== null) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['usuario']] = $identity->user;
            $this->restoreUser($identity->user);
            return true;
        }
        return false;
    }

    public function logout() {
        $sessions = Yii::app()->params->vendedor['sesion'];
        
        // Limpiar carrito de compras
        
        Yii::app()->getModule('vendedor')->shoppingCartSalesman->clear();
        
        foreach ($sessions as $sesion) {
            _deleteCookie($sesion);
            unset(Yii::app()->session[$sesion]);
        }
    }
    
    public function logoutCliente(){
        
        Yii::app()->getModule('vendedor')->shoppingCartSalesman->clear();
        Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']] = null; 
        Yii::app()->session[Yii::app()->params->vendedor['sesion']['compraInvitado']] = null; 
        Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']] = null; 
        
    }

}
