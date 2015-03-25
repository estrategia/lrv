<?php

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class FiltroForm extends CFormModel {

    public $proveedor;
    public $nombre;
    public $listMarcas;
    public $listMarcasCheck = array();
    public $listAtributosCheck = array();
    public $listAtributos;
    public $listCategoriasTienda = array();

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('listMarcas, nombre, listAtributos', 'safe'),
            array('listMarcas, nombre', 'default', 'value' => null),
        );
    }
    
    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'listMarcas' => 'Marcas',
            'nombre' => 'Nombre',
            'listAtributos' => 'Atributos'
        );
    }

}