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
abstract class Precio {

    protected $porcentajeDescuentoPerfil = 0;
    protected $porcentajeDescuentoBeneficio = 0;
    protected $inicializado = false;
    protected $listBeneficios = array();
    protected $flete = 0;
    protected $tiempoEntrega = 0;

    const PRECIO_UNIDAD = 1;
    const PRECIO_FRACCION = 2;
    const DESCUENTO_PERFIL = 1;
    const DESCUENTO_BENEFICIO = 2;
    const DESCUENTO_COMPLETO = 9;

    abstract public function getPrecio();

    abstract public function getAhorro();

    public function getFlete() {
        return $this->flete;
    }

    public function getTiempoEntrega() {
        return $this->tiempoEntrega;
    }

    public function tieneBeneficio() {
        return !empty($this->listBeneficios);
    }

    public function getBeneficios() {
        return $this->listBeneficios;
    }

    public function inicializado() {
        return $this->inicializado;
    }

    public function getPorcentajeDescuento($tipo = self::DESCUENTO_COMPLETO) {
        if ($tipo == self::DESCUENTO_COMPLETO)
            return $this->porcentajeDescuentoBeneficio + $this->porcentajeDescuentoPerfil;
        else if ($tipo == self::DESCUENTO_PERFIL)
            return $this->porcentajeDescuentoPerfil;
        else if ($tipo == self::DESCUENTO_BENEFICIO)
            return $this->porcentajeDescuentoBeneficio;
        else
            throw new Exception("Tipo porcentaje indefinido");
    }

    /*
     * valor: valor
     * tipo: 1: arriba, <>1: abajo
     */

    public static function redondear($valor, $tipo) {
        $multiplo = 50;

        if ($valor > 0) {
            $modulo = $valor % $multiplo;
            if ($modulo > 0) {
                if ($tipo == 1) {
                    $valor += $multiplo - ($modulo);
                } else {
                    $valor -= $modulo;
                }
            }
        }

        return $valor;
    }

}
