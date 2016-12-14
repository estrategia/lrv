<?php
abstract class UsuarioSIICOP{
	
	protected $Username;
	protected $Email;
	protected $NombreCompleto;
	
	abstract function setUsername($username);
	
	abstract function setEmail($email);
	
	abstract function setNombreCompleto($nombreCompleto);
	
	abstract function getUserName();
	
	abstract function getEmail();
	
	abstract function getNombreCompleto();
	
}