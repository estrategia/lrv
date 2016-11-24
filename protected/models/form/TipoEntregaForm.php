<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class TipoEntregaForm extends CFormModel {

    public $tipo;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('tipo', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('tipo', 'in', 'range' => array(1, 2), 'allowEmpty' => false),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'tipo' => 'Tipo Entrega',
        );
    }

}
