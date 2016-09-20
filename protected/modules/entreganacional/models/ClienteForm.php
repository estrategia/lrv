<?php

/**
 * ClienteForm class.
 * ClienteForm is the data structure for find a client
 */
class ClienteForm extends CFormModel {

    public $numeroDocumento = null;
    
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('numeroDocumento','required', 'message' => '{attribute} no puede estar vacío'),
            array('numeroDocumento', 'length', 'min'=>5, 'max'=>12,),
        );
    }
 
    public function attributeLabels() {
        return array(
            'numeroDocumento' => 'Cédula del cliente',
        );
    }

  
}