<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class RecordarVendedorForm extends CFormModel {

    public $usuario;
    public $_usuario;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('usuario', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('usuario', 'safe'),
            array('usuario', 'validarUsuario'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'usuario' => 'Usuario',
        );
    }

    /**
     * Valida existencia de usuario con correo ingresado
     */
    public function validarUsuario($attribute, $params) {
        if (!$this->hasErrors()) {
            $this->_usuario = Operador::model()->find(array(
                'condition' => 'usuario=:usuario',
                'params' => array(':usuario' => $this->usuario)
            ));

            if ($this->_usuario === null) {
                $this->addError('correoElectronico', $this->getAttributeLabel($attribute) . ' no registrado');
            }
        }
    }

}
