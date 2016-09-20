<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class OrdenamientoForm extends CFormModel {

    public $orden = 5;

    const SI_PRECIO = 1;
    const NO_PRECIO = 2;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('orden', 'safe'),
            array('orden', 'default', 'value' => null),
        );
    }

    public function getOpciones($tipo) {
        if ($tipo == self::SI_PRECIO)
            return array(5 => 'Por Relevancia', 1 => 'Precio Ascendente', 2 => 'Precio Descendente', 3 => 'Nombre', 4 => 'Presentación');
        else if ($tipo == self::NO_PRECIO)
            return array(5 => 'Por Relevancia', 3 => 'Nombre', 4 => 'Presentación');
    }
    
    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'orden' => 'Orden',
        );
    }

}
