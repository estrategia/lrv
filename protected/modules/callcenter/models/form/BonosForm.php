<?php

/**
 * RemisionForm class.
 * RemisionForm is the data structure for keeping
 */
class BonosForm extends CFormModel {
    public $numeroDocumento;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('numeroDocumento', 'required', 'message' => '{attribute} no puede estar vacío'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'numeroDocumento' => 'Número de Documento',
        );
    }
}
