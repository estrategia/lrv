<?php

class UsuarioPuntoVenta extends UsuarioSIICOP{
	
	public $Pdv = null;
	public $CodigoVendedor = null;
	
	function setUsername($username){
		$this->Username = $username;
	}
	
	public function setEmail($email){
		$this->Email = $email;
	}
	
	public function setNombreCompleto($nombreCompleto){
		$this->NombreCompleto = $nombreCompleto;
	}
	
	public function getUserName(){
		return $this->Username;
	}
	
	public function getEmail(){
		return $this->Email;
	}
	
	public function getNombreCompleto(){
		return $this->NombreCompleto;
	}
	
	
	public function setPuntoVenta($pdv){
		$this->Pdv = $pdv;
	}
	
	public function getPuntoVenta(){
		return $this->Pdv;
	}
	
	public function setCodigoVendedor($codigoVendedor){
		$this->CodigoVendedor = $codigoVendedor;
	}
	
	public function getCodigoVendedor(){
		return $this->CodigoVendedor;
	}
	
}