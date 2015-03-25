<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ProductoCarro
 *
 * @author miguel.sanchez
 */
class ProductoCarro extends IECartPosition {

    //public $objprecio;
    
    public $objProducto;
    //public $tipoUnidadPrecio;
    public $fraccion;

    public function __construct($objProducto, $fraccion) {
        $this->objProducto = $objProducto;
        $this->fraccion = $fraccion;
    }
    
    public function generate($params) {
        $objprecio = $this->objProducto->getPrecio($params['objSectorCiudad']->codigoCiudad, $params['objSectorCiudad']->codigoSector, $params['codigoPerfil']);
        $this->price = $objprecio->getPrecio(($this->fraccion? Precio::PRECIO_FRACCION : Precio::PRECIO_UNIDAD), false);
        
        $this->discountPrice = $objprecio->getAhorro(($this->fraccion? Precio::PRECIO_FRACCION : Precio::PRECIO_UNIDAD));
        $this->tax = $this->objProducto->objImpuesto->porcentaje;
    }
    
    public function getId() {
        return $this->objProducto->codigoProducto . "_" . ($this->fraccion? "F" : "U");
    }
    
    public function getCode(){
        return $this->objProducto->codigoProducto;
    }
    
    /*public function setPrice($newVal){
        $this->price = $newVal;
    }*/

    //public function getPrice() {
        /*if ($this->objprecio != null) {
            return $this->objprecio->getPrecio(($this->fraccion? Precio::PRECIO_FRACCION : Precio::PRECIO_UNIDAD));
        }
        return 0;*/
        //return $this->price;
    //}

    //public function attributeNames() { }
}
