<?php

/**
 * ReactivarBonoTiendaForm class.
 * ReactivarBonoTiendaForm is the data structure for keeping
 */
class ReactivarBonoTiendaForm extends CFormModel {
    public $idBonoTienda;
    public $comentario;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('idBonoTienda, comentario', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('comentario', 'length', 'max' => 255),
            array('comentario', 'length', 'min' => 20),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'idBonoTienda' => 'Bono tienda',
            'comentario' => 'comentario',
        );
    }
}
