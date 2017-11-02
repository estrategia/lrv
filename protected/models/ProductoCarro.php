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
    //public $objProductoFormula = null;

    public function __construct($param) {
        if ($param instanceof Producto) {
            $this->objProducto = $param;
        }else if($param instanceof Combo){
            $this->objCombo = $param;
        }/*else if($param instanceof ProductosFormulaVitalCall){
        	$this->objProductoFormula = $param;
        }*/
    }
    
    public function isCombo(){
        return ($this->objCombo instanceof Combo);
    }
    
    public function isProduct(){
        return ($this->objProducto instanceof Producto);
    }

    /*public function isFormula(){
    	return ($this->objProductoFormula instanceof ProductosFormulaVitalCall);
    }*/
    
    public function getObjProducto(){
    	if($this->isProduct())
    		return $this->objProducto;
    	/*else if($this->isFormula())
    		return $this->objProductoFormula->objProductoVC->objProducto;*/
    }
    
    public function generate($params) {
        if ($this->isProduct()) {
            $objprecio = new PrecioProducto($this->objProducto, $params['objSectorCiudad'], $params['codigoPerfil']);
            $this->listBeneficios = $objprecio->getBeneficios();
            $this->listBeneficiosBonos = $objprecio->getBeneficiosBonos();
            $this->suscripcion = $objprecio->getSuscripcion();
            if ($this->suscripcion !== null) {
                $this->cantidadPeriodoSuscripcion = $this->suscripcion->consultarCantidadPeriodoActual();
                if ($this->cantidadPeriodoSuscripcion == 0) {
                    $this->suscripcion = null;
                }
            }
            // $this->quantitySuscription = 0;
            
            $this->priceUnit = $objprecio->getPrecio(Precio::PRECIO_UNIDAD, false);
            $this->priceSuscriptionUnit = $objprecio->getPrecio(Precio::PRECIO_UNIDAD, false);
            
            $this->priceUnitDiscount = $objprecio->getPrecio(Precio::PRECIO_UNIDAD, false, true);
            $this->priceSuscriptionUnitDiscount = $objprecio->getPrecio(Precio::PRECIO_UNIDAD, true, true, true, true);

            $this->priceFraction = $objprecio->getPrecio(Precio::PRECIO_FRACCION, false);
            $this->priceFractionDiscount = $objprecio->getPrecio(Precio::PRECIO_FRACCION, false,false);
   
            $this->discountPriceUnit = $objprecio->getAhorro(Precio::PRECIO_UNIDAD);
            $this->discountPriceUnitDiscount = $objprecio->getAhorro(Precio::PRECIO_UNIDAD,false);
            $this->discountSuscriptionUnit = $objprecio->getAhorro(Precio::PRECIO_UNIDAD, true, true);
            
            $this->discountPriceFraction = $objprecio->getAhorro(Precio::PRECIO_FRACCION);
            $this->discountPriceFractionDiscount = $objprecio->getAhorro(Precio::PRECIO_FRACCION);
            
            // $this->setQuantitySuscription(1);
            // $this->hola();
            $this->tax = $this->objProducto->objImpuesto->porcentaje;
            $this->shipping = $objprecio->getFlete();
            $this->delivery = $objprecio->getTiempoEntrega();
            
            $this->priceTokenUnit = $objprecio->getBono();
        }else if($this->isCombo()){
            $objprecio = new PrecioCombo($this->objCombo);
            $this->priceUnit = $objprecio->getPrecio();
        }/*else if($this->isFormula()){
        	$objProducto = $this->objProductoFormula->objProductoVC->objProducto;
        	
        	$objprecio = new PrecioProducto($objProducto, $params['objSectorCiudad'], $params['codigoPerfil']);
        	$this->listBeneficios = $objprecio->getBeneficios();
        	
        	$this->priceUnit = $objprecio->getPrecio(Precio::PRECIO_UNIDAD, false);
        	$this->priceFraction = $objprecio->getPrecio(Precio::PRECIO_FRACCION, false);
        	
        	$this->discountPriceUnit = $objprecio->getAhorro(Precio::PRECIO_UNIDAD);
        	$this->discountPriceFraction = $objprecio->getAhorro(Precio::PRECIO_FRACCION);
        	$this->tax = $objProducto->objImpuesto->porcentaje;
        	$this->shipping = $objprecio->getFlete();
        	$this->delivery = $objprecio->getTiempoEntrega();
        }*/
    }
    
    public function getId() {
        if ($this->isProduct()) {
            return $this->objProducto->codigoProducto;
            // return $this->suscripcion ? $this->objProducto->codigoProducto : $this->objProducto->codigoProducto . 'suscripcion';
        }else if($this->isCombo()){
            return $this->objCombo->getCodigo();
        }/*else if($this->isFormula()){
        	return $this->objProductoFormula->idFormula . "-" . $this->objProductoFormula->idProductoVitalCall;
        }*/
    }
}
