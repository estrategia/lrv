<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Precio
 *
 * @author miguel.sanchez
 */
class PrecioOld {

    //put your code here
    public $precioUnidad = 0;
    public $precioFraccion = 0;
    public $unidadFraccionamiento = 0;
    public $porcentajeDescuentoPerfil = 0;

    const PRECIO_UNIDAD = 1;
    const PRECIO_FRACCION = 2;

    public function getPrecio($tipo, $descuento = true) {
        if ($tipo == self::PRECIO_UNIDAD) {
            //if ($this->precioUnidad != null) {
                if ($descuento)
                    return $this->precioUnidad * (1 - ( $this->porcentajeDescuentoPerfil / 100));
                else
                    return $this->precioUnidad;
            //} else
                //return null;
        }else if ($tipo == self::PRECIO_FRACCION) {
            //if ($this->precioFraccion != null){
                if ($descuento)
                    return $this->precioFraccion * $this->unidadFraccionamiento * (1 - ($this->porcentajeDescuentoPerfil / 100));
                else
                    return $this->precioFraccion * $this->unidadFraccionamiento;
            //}else
                //return null;
        }else {
            throw new Exception("Tipo precio indefinido");
        }
    }

    public function getAhorro($tipo) {
        if ($tipo == self::PRECIO_UNIDAD) {
            //if ($this->precioUnidad != null)
                return $this->precioUnidad * ($this->porcentajeDescuentoPerfil / 100);
            //else
                //return null;
        }else if ($tipo == self::PRECIO_FRACCION) {
            //if ($this->precioFraccion != null)
                return $this->precioFraccion * $this->unidadFraccionamiento * ($this->porcentajeDescuentoPerfil / 100);
            //else
                //return null;
        }else {
            throw new Exception("Tipo precio indefinido");
        }
    }

}
