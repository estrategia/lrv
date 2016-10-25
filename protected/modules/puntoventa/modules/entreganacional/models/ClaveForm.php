<?php

/**
 * ClaveForm class.
 * ClaveForm is the data structure for restore password
 */
class ClaveForm extends CFormModel {

    public $clave = null;
    public $claveConfirmar = null;
    
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('clave, claveConfirmar', 'message' => '{attribute} no puede estar vacío'),
            array('clave, claveConfirmar', 'length', 'min'=>5, 'max'=>15,),
            array('claveConfirmar', 'validarClave'),
        );
    }
 
    public function attributeLabels() {
        return array(
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
