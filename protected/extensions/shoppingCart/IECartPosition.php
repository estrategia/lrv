<?php

/**
 * IECartPosition
 *
 * @author pirrat <mrakobesov@gmail.com>
 * @version 0.7
 * @package ShoppingCart
 */
abstract class IECartPosition {
    protected $priceUnit = 0;
    protected $priceUnitDiscount = 0;

    protected $priceFraction = 0;
    protected $priceFractionDiscount = 0;
    
    protected $quantityUnit = 0;
    protected $quantityStored = 0;
    protected $quantityFraction = 0;
    
    protected $discountPriceUnit = 0.0;
    protected $discountPriceUnitDiscount = 0.0;
    
    protected $discountPriceFraction = 0.0;
    protected $discountPriceFractionDiscount = 0.0;
    
    protected $shipping = 0;
    protected $shippingMaxUnits = 0;
    //protected $delivery = 0;
    protected $deliveryStart = 0;
    protected $deliveryEnd = 0;
    
    protected $tax = 0.0;
    protected $listBeneficios = array();
    protected $listBeneficiosBonos = array();
    
    protected $priceTokenUnit = 0;

    protected $quantitySuscription = 0;
    protected $discountSuscriptionUnit = 0;

    protected $priceSuscriptionUnit = 0;
    // protected $priceSuscriptionUnitDiscount = 0;
    protected $cantidadPeriodoSuscripcion = 0;
    protected $suscripcion = null;
    protected $esSuscripcion = false;

    public function getBeneficios(){
        return $this->listBeneficios;
    }
    
    public function getBeneficiosBonos(){
    	   return $this->listBeneficiosBonos;
    }
    
    /*public function getDelivery() {
        return $this->delivery;
    }*/
    
    public function hasDelivery()
    {
        return ( $this->deliveryStart>0 || $this->deliveryEnd>0 );
    }
    
    public function getDelivery($type = 'end', $format = 'number') 
    {
        if ($format=='number') {
            if ($type=='start') {
                return $this->deliveryStart;
            } else {
                return $this->deliveryEnd;
            }
        } else if ($format=='date') {
            $fecha = new DateTime();
            
            if ($type=='start') {
                $fecha->modify("+$this->deliveryStart days");
            } else {
                $fecha->modify("+$this->deliveryEnd days");
            }
            
            return $fecha->format("Y-m-d");
        } else {
            $fecha = new DateTime();
            $fechaInicio = clone $fecha;
            $fechaInicio->modify("+$this->deliveryStart days");
            $fechaFin = clone $fecha;
            $fechaFin->modify("+$this->deliveryEnd days");
            $tiempoEntrega = $fechaInicio->format("Y-m-d") . " , " . $fechaFin->format("Y-m-d");
            return $tiempoEntrega;
        }
    }
    
    public function getEsSuscripcion()
    {
        return $this->esSuscripcion;
    }

    /**
     * Returns total price for all units of the position
     * @param bool $withDiscount
     * @return float
     *
     */
    public function getSumPrice($withStored = true, $withDiscount = true) {
        /* $fullSum = $this->getPrice() * $this->quantity;

          if($withDiscount){
          $fullSum -=  $this->discountPrice * $this->quantity;
          }
          return $fullSum; */
        return $this->getPrice(false, $withDiscount) * ($this->quantityUnit + ($withStored ? $this->quantityStored : 0)) + $this->getPrice(true, $withDiscount) * $this->quantityFraction;
    }
    
    public function getSumPriceUnit($withStored = true, $withDiscount = true){
        return $this->getPrice(false, $withDiscount) * ($this->quantityUnit + ($withStored ? $this->quantityStored : 0));
    }

    public function getSumPriceUnitSuscription() {
        return $this->getPriceSuscription() * $this->quantitySuscription;
    }
    
    public function getSumPriceFraction($withDiscount = true){
        return $this->getPrice(true, $withDiscount) * $this->quantityFraction;
    }
    
    
    public function getSumPriceToken($withStored = true, $withDiscount = true) {
    	/* $fullSum = $this->getPrice() * $this->quantity;
    
    	if($withDiscount){
    	$fullSum -=  $this->discountPrice * $this->quantity;
    	}
    	return $fullSum; */
    	return $this->getPriceToken(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0)) + $this->getPriceToken(true, $withDiscount) * $this->quantityFraction;
    }
    
    public function getSumPriceUnitToken($withStored = true, $withDiscount = true){
    	return $this->getPriceToken(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0));
    }
    
    public function getSumPriceFractionToken($withDiscount = true){
    	return $this->getPriceToken(true, $withDiscount) * $this->quantityFraction;
    }
    
    
    /**
     * Returns total price for all units of the position
     * @param bool $withDiscount
     * @return float
     *
     */
    public function getSumPriceStored($withDiscount = true) {
        return $this->getPrice(false, $withDiscount) * $this->quantityStored;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantity($fraction = false) {
        return ($fraction ? $this->quantityFraction : ($this->quantityUnit+$this->quantityStored));
    }
    
    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantityUnit() {
        return $this->quantityUnit;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantityStored() {
        return $this->quantityStored;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantitySuscription() {
        return $this->quantitySuscription;
    }

    /**
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantity($newVal, $fraction = false) {
        // Yii::log("Cart Position: " . $newVal, CLogger::LEVEL_INFO, 'error');

        if ($fraction) {
            $this->quantityFraction = $newVal;
        } else {
            if ($this->suscripcion !== null) {
                // $this->quantitySuscription = $newVal;
                // $cantidadDisponiblePeriodoActual = $this->suscripcion->consultarCantidadPeriodo();
                $cantidadDisponiblePeriodoActual = $this->cantidadPeriodoSuscripcion;
                if ($newVal > $cantidadDisponiblePeriodoActual) {
                    $this->quantitySuscription = $cantidadDisponiblePeriodoActual;
                    $this->quantityUnit = $newVal - $this->quantitySuscription;
                } 
                if ($newVal <= $cantidadDisponiblePeriodoActual) {
                    $this->quantitySuscription = $newVal;
                    $this->quantityUnit = 0;
                } 
            } else {
                $this->quantityUnit = $newVal;
            }
        }
    }

    /**
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantityStored($newVal) {
        $this->quantityStored = $newVal;
    }

    /**
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantitySuscription($newVal) {
        $this->quantitySuscription = $newVal;
    }

    public function setShipping($newVal) {
        $this->shipping = $newVal;
    }

    public function getShipping() {
        if($this->shippingMaxUnits==0) {
            return $this->shipping;
        } else {
            $cantidadEnvios = ceil($this->quantityUnit/$this->shippingMaxUnits);
            return  $cantidadEnvios * $this->shipping;
        }
    }

    public function setTax($newVal) {
        $this->tax = $newVal;
    }

    public function getTax() {
        return $this->tax;
    }
    
    public function setPriceUnit($price){
        $this->priceUnit = $price;
    }
    
    public function setPriceFraction($price){
        $this->priceFraction = $price;
    }
    
    public function setDiscountPriceUnit($discount){
        $this->discountPriceUnit = $discount;
    }
    
    public function setDiscountPriceFraction($discount){
        $this->discountPriceFraction = $discount;
    }

    public function setDiscountSuscriptionUnit($discount)
    {
        $this->discountSuscriptionUnit = $discount;
    }
    
    public function setDelivery($delivery){
        $this->delivery = $delivery;
    }
    
    public function setBeneficios($listBeneficios){
        $this->listBeneficios = $listBeneficios;
    }
    
    public function setBeneficiosBonos($listBeneficios){
    	$this->listBeneficiosBonos = $listBeneficios;
    }

    public function getTaxPrice($total = false) {
        $tax = 0.0;
        if ($total)
            $tax = Precio::calcularImpuesto($this->getPriceToken(true) * $this->quantityFraction,$this->tax) + Precio::calcularImpuesto($this->getPriceToken() * ($this->quantityUnit+$this->quantityStored+$this->quantitySuscription),$this->tax);
        else
            $tax = Precio::calcularImpuesto($this->getPriceToken() , $this->tax);
        
        return round($tax);
    }
    
    public function getBaseTaxPrice($total = false){
        $base = 0.0;
        
        if ($total)
            $base = Precio::calcularBaseImpuesto($this->getPriceToken(true) * $this->quantityFraction,$this->tax) + Precio::calcularBaseImpuesto($this->getPriceToken() * ($this->quantityUnit+$this->quantityStored+$this->quantitySuscription),$this->tax);
        else
            $base = Precio::calcularBaseImpuesto($this->getPriceToken() , $this->tax);
        
        return round($base);
    }

    /**
     * @param  $newVal
     * @return void
     */
    /* public function setDiscountPrice($newVal) {
      $this->discountPrice = $newVal;
      } */

    public function getDiscountPrice($fraction = false) {
        return ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);
    }
    
    public function getDiscountPriceSuscription() {
        return $this->discountSuscriptionUnit;
    }
    
    public function getDiscountPriceToken($fraction = false) {
    	return ($fraction ? $this->discountPriceFractionDiscount : $this->discountPriceUnitDiscount);
    }
    
    public function hasDiscount(){
        return (($this->discountPriceFraction+$this->discountPriceUnit + $this->discountSuscriptionUnit) > 0);
    }
    
    public function getSumToken(){
    	return ($this->quantityUnit + $this->quantityStored)* $this->priceTokenUnit;
    }
    
    /**
     * @return float price
     */
    
    public function getPrice($fraction = false, $withDiscount = true) {
        $price = ($fraction ? $this->priceFraction : $this->priceUnit);

        if ($withDiscount)
            $price -= ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);

        return $price;
    }

    public function getPriceSuscription() {
        $price = $this->priceSuscriptionUnit;
        $price -= $this->discountSuscriptionUnit;
        return $price;
    }
    
    public function getPriceToken($fraction = false, $withDiscount = true) {
    	$price = ($fraction ? $this->priceFraction : $this->priceUnit);
    
    	if ($withDiscount)
    		$price -= ($fraction ? $this->discountPriceFractionDiscount : $this->discountPriceUnitDiscount);
    
    	return $price;
    }
    
    public function getTotalPrice() {
        $price = $this->getSumPrice();
        $price += $this->getSumPriceUnitSuscription();
        $price += $this->shipping;
        return $price;
    }
    
    public function getTotalPriceToken() {
    	$price = $this->getSumPriceToken();
    	$price += $this->shipping;
    	return $price;
    }

    abstract public function generate($params);

    /**
     * @return mixed id
     */
    abstract public function getId();

}
