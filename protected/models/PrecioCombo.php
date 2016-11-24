<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrecioCombo
 *
 * @author miguel.sanchez
 */
class PrecioCombo extends Precio {
    protected $precio = 0;
    protected $ahorro = 0;
    
    function __construct(Combo &$objCombo) {
        $this->precio = 0;
        $this->ahorro = 0;

        foreach ($objCombo->listProductosCombo as $objProductoCombo) {
            $this->precio += $objProductoCombo->precio;
        }
        
        if($this->precio>0){
            $this->precio = $this->redondear($this->precio,1);
            $this->inicializado = true;
        }
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getAhorro() {
        return $this->ahorro;
    }
}
