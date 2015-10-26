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
    public $listFiltrosCheck = array();
    public $listFiltros;
    public $listCategoriasTienda = array();
    public $listCategoriasTiendaCheck = array();
    public $precio;
    
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('listMarcas, nombre, listFiltros, listCategoriasTienda, precio', 'safe'),
            array('listMarcas, nombre, precio', 'default', 'value' => null),
        );
    }
    
    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'listMarcas' => 'Marcas',
            'nombre' => 'Nombre',
            'listFiltros' => 'Filtros',
            'listCategoriasTienda' => 'Categorías',
            'precio' => 'Precio',
        );
    }
    
    public function getPrecioInicio(){
        if($this->precio == null || empty($this->precio) || !isset($this->precio[0]) || $this->precio[0]<0)
            return -1;
        return $this->precio[0];
    }
    
    public function getPrecioFin(){
        if($this->precio == null || empty($this->precio) || !isset($this->precio[1]) || $this->precio[1]<0)
            return -1;
        return $this->precio[1];
    }

}