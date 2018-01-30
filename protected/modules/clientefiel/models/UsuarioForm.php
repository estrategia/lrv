<?php

/**
 * Description of RegistroForm
 *
 * @author miguel.sanchez
 */
class UsuarioForm extends CFormModel {

    public $cedula;
    public $clave = null;
    public $claveConfirmar = null;
    
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
             
            array('cedula,clave, claveConfirmar', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('cedula', 'numerical','integerOnly'=>true),
            array('cedula', 'length', 'min'=>5, 'max'=>12),
         	array('clave', 'validarClave'),
            array('cedula, clave, claveConfirmar', 'safe'),
         
        );
    }
    
    public function getSubmitName(){
        $nombre = "NA";
        $escenario = $this->getScenario();
        
        if($escenario == "registro"){
            $nombre = "Registrar";
        }else if($escenario == "actualizar"){
            $nombre = "Guardar";
        }
        
        return $nombre;
    }
    
    public function getTitleForm(){
        $nombre = "NA";
        $escenario = $this->getScenario();
        
        if($escenario == "registro"){
            $nombre = "";// "Creaci&oacute;n de cuenta";
        }else if($escenario == "actualizar"){
            $nombre = "Informaci&oacute;n personal";
        }
        
        return $nombre;
    }
    
    public function getSubmitType(){
        $tipo = "submit";
        $escenario = $this->getScenario();
        
        if($escenario == "registro"){
            $tipo = "button";
        }
        
        return $tipo;
    }
    
    public function getContentClass(){
    	$clase = "ui-content";
    	$escenario = $this->getScenario();
    	 
    	if($escenario == "registro"){
    		$clase = "";
    	}
    	 
    	return $clase;
    }
    
    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'cedula' => 'Cédula',
            'clave' => 'Contraseña',
            'claveConfirmar' => 'Confirmar contraseña',
        );
    }
   
    /**
     * Valida existencia de usuario con correo ingresado
     */
    public function validarClave() {
        if (!$this->hasErrors()) {
            if ($this->clave != $this->claveConfirmar) {
                $this->addError('clave', 'Contraseña no coincide');
                $this->addError('claveConfirmar', 'Contraseña no coincide');
                $this->clave = null;
                $this->claveConfirmar = null;
            }
        }
    }
    
   

}
