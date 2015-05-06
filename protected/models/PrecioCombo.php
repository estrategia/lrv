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
    
    function __construct(Combo &$objCombo/*, SectorCiudad $objCiudadSector = null*/) {
        $this->precio = 0;
        $this->ahorro = 0;

        foreach ($objCombo->listProductosCombo as $objProductoCombo) {
            $this->precio += $objProductoCombo->precio;
            
                /*foreach ($objProductoCombo->objProducto->objProducto->listPrecios as $objProductoPrecio) {
                    if ($objProductoPrecio->codigoCiudad == $objCiudadSector->codigoCiudad && $objProductoPrecio->codigoSector == $objCiudadSector->codigoSector) {
                        $this->ahorro += $objProductoPrecio->precioUnidad - $objProductoCombo->precio;
                        break;
                    }
                }*/
        }
        
        $this->inicializado = true;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getAhorro() {
        return $this->ahorro;
    }
}
