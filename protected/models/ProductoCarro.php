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
    public $objProducto = null;
    public $objCombo = null;

    public function __construct($param) {
        if ($param instanceof Producto) {
            $this->objProducto = $param;
        }else if($param instanceof Combo){
            $this->objCombo = $param;
        }
    }
    
    public function isCombo(){
        return ($this->objCombo !== null);
    }
    
    public function isProduct(){
        return ($this->objProducto !== null);
    }
    
    public function generate($params) {
        if ($this->isProduct()) {
            $objprecio = new PrecioProducto($this->objProducto, $params['objSectorCiudad'], $params['codigoPerfil']);
            $this->listBeneficios = $objprecio->getBeneficios();
            
            $this->priceUnit = $objprecio->getPrecio(Precio::PRECIO_UNIDAD, false);
            $this->priceFraction = $objprecio->getPrecio(Precio::PRECIO_FRACCION, false);

            $this->discountPriceUnit = $objprecio->getAhorro(Precio::PRECIO_UNIDAD);
            $this->discountPriceFraction = $objprecio->getAhorro(Precio::PRECIO_FRACCION);
            $this->tax = $this->objProducto->objImpuesto->porcentaje;
            $this->shipping = $objprecio->getFlete();
            $this->delivery = $objprecio->getTiempoEntrega();
        }else if($this->isCombo()){
            $objprecio = new PrecioCombo($this->objCombo);
            $this->priceUnit = $objprecio->getPrecio();
        }
    }
    
    public function getId() {
        if ($this->isProduct()) {
            return $this->objProducto->codigoProducto;
        }else if($this->isCombo()){
            return $this->objCombo->getCodigo();
        }
    }
}
