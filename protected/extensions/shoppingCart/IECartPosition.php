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
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando beneficios"."" . PHP_EOL);
        return $this->listBeneficios;
    }
    
    public function getBeneficiosBonos(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando beneficios bonos"."" . PHP_EOL);
    	   return $this->listBeneficiosBonos;
    }
    
    /*public function getDelivery() {
        return $this->delivery;
    }*/
    
    public function hasDelivery()
    {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando hasDelivery"."" . PHP_EOL);
    	 
        return ( $this->deliveryStart>0 || $this->deliveryEnd>0 );
    }
    
    public function getDelivery($type = 'end', $format = 'number') 
    {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getDelivery"."" . PHP_EOL);
    	 
    	
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
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getEsSuscripcion"."" . PHP_EOL);
    	 
        return $this->esSuscripcion;
    }

    /**
     * Returns total price for all units of the position
     * @param bool $withDiscount
     * @return float
     *
     */
    public function getSumPrice($withStored = true, $withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPrice"."" . PHP_EOL);
    	 
        /* $fullSum = $this->getPrice() * $this->quantity;

          if($withDiscount){
          $fullSum -=  $this->discountPrice * $this->quantity;
          }
          return $fullSum; */
        return $this->getPrice(false, $withDiscount) * ($this->quantityUnit + ($withStored ? $this->quantityStored : 0)) + $this->getPrice(true, $withDiscount) * $this->quantityFraction;
    }
    
    public function getSumPriceUnit($withStored = true, $withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPriceUnit"."" . PHP_EOL);
    	
    	return $this->getPrice(false, $withDiscount) * ($this->quantityUnit + ($withStored ? $this->quantityStored : 0));
    }

    public function getSumPriceUnitSuscription() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPriceUnitSuscription"."" . PHP_EOL);
    	 
        return $this->getPriceSuscription() * $this->quantitySuscription;
    }
    
    public function getSumPriceFraction($withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPriceFraction"."" . PHP_EOL);
    	 
        return $this->getPrice(true, $withDiscount) * $this->quantityFraction;
    }
    
    
    public function getSumPriceToken($withStored = true, $withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPriceToken"."" . PHP_EOL);
    	
    	/* $fullSum = $this->getPrice() * $this->quantity;
    
    	if($withDiscount){
    	$fullSum -=  $this->discountPrice * $this->quantity;
    	}
    	return $fullSum; */
    	return $this->getPriceToken(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0)) + $this->getPriceToken(true, $withDiscount) * $this->quantityFraction;
    }
    
    public function getSumPriceUnitToken($withStored = true, $withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPriceUnitToken"."" . PHP_EOL);
    	 
    	return $this->getPriceToken(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0));
    }
    
    public function getSumPriceFractionToken($withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPriceFractionToken"."" . PHP_EOL);
    	
    	return $this->getPriceToken(true, $withDiscount) * $this->quantityFraction;
    }
    
    
    /**
     * Returns total price for all units of the position
     * @param bool $withDiscount
     * @return float
     *
     */
    public function getSumPriceStored($withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPriceStored"."" . PHP_EOL);
    	 
        return $this->getPrice(false, $withDiscount) * $this->quantityStored;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantity($fraction = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getQuantity"."" . PHP_EOL);
    	 
        return ($fraction ? $this->quantityFraction : ($this->quantityUnit+$this->quantityStored));
    }
    
    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantityUnit() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getQuantityUnit"."" . PHP_EOL);
    	 
        return $this->quantityUnit;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantityStored() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getQuantityStored"."" . PHP_EOL);
    	 
        return $this->quantityStored;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantitySuscription() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getQuantitySuscription"."" . PHP_EOL);
    	 
        return $this->quantitySuscription;
    }

    /**
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantity($newVal, $fraction = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setQuantity"."" . PHP_EOL);
    	 
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
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setQuantityStored"."" . PHP_EOL);
    	 
        $this->quantityStored = $newVal;
    }

    /**
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantitySuscription($newVal) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setQuantitySuscription"."" . PHP_EOL);
    	 
        $this->quantitySuscription = $newVal;
    }

    public function setShipping($newVal) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setShipping"."" . PHP_EOL);
    	 
        $this->shipping = $newVal;
    }

    public function getShipping() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getShipping"."" . PHP_EOL);
    	 
        if($this->shippingMaxUnits==0) {
            return $this->shipping;
        } else {
            $cantidadEnvios = ceil($this->quantityUnit/$this->shippingMaxUnits);
            return  $cantidadEnvios * $this->shipping;
        }
    }

    public function setTax($newVal) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setTax"."" . PHP_EOL);
    	 
        $this->tax = $newVal;
    }

    public function getTax() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getTax"."" . PHP_EOL);
    	 
        return $this->tax;
    }
    
    public function setPriceUnit($price){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setPriceUnit"."" . PHP_EOL);
    	 
        $this->priceUnit = $price;
    }
    
    public function setPriceFraction($price){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setPriceFraction"."" . PHP_EOL);
    	 
        $this->priceFraction = $price;
    }
    
    public function setDiscountPriceUnit($discount){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setDiscountPriceUnit"."" . PHP_EOL);
    	 
        $this->discountPriceUnit = $discount;
    }
    
    public function setDiscountPriceFraction($discount){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPriceFractionToken"."" . PHP_EOL);
    	 
        $this->discountPriceFraction = $discount;
    }

    public function setDiscountSuscriptionUnit($discount)
    {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumPriceFractionToken"."" . PHP_EOL);
    	 
        $this->discountSuscriptionUnit = $discount;
    }
    
    public function setDelivery($delivery){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setDiscountPriceFraction"."" . PHP_EOL);
    	 
        $this->delivery = $delivery;
    }
    
    public function setBeneficios($listBeneficios){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setBeneficios"."" . PHP_EOL);
    	 
        $this->listBeneficios = $listBeneficios;
    }
    
    public function setBeneficiosBonos($listBeneficios){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando setBeneficiosBonos"."" . PHP_EOL);
    	 
    	$this->listBeneficiosBonos = $listBeneficios;
    }

    public function getTaxPrice($total = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getTaxPrice"."" . PHP_EOL);
    	 
        $tax = 0.0;
        if ($total)
            $tax = Precio::calcularImpuesto($this->getPriceToken(true) * $this->quantityFraction,$this->tax) + Precio::calcularImpuesto($this->getPriceToken() * ($this->quantityUnit+$this->quantityStored+$this->quantitySuscription),$this->tax);
        else
            $tax = Precio::calcularImpuesto($this->getPriceToken() , $this->tax);
        
        return round($tax);
    }
    
    public function getBaseTaxPrice($total = false){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getBaseTaxPrice"."" . PHP_EOL);
    	 
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
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getDiscountPrice"."" . PHP_EOL);
    	 
        return ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);
    }
    
    public function getDiscountPriceSuscription() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getDiscountPriceSuscription"."" . PHP_EOL);
    	 
        return $this->discountSuscriptionUnit;
    }
    
    public function getDiscountPriceToken($fraction = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getDiscountPriceToken"."" . PHP_EOL);
    	 
    	return ($fraction ? $this->discountPriceFractionDiscount : $this->discountPriceUnitDiscount);
    }
    
    public function hasDiscount(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando hasDiscount"."" . PHP_EOL);
    	 
        return (($this->discountPriceFraction+$this->discountPriceUnit + $this->discountSuscriptionUnit) > 0);
    }
    
    public function getSumToken(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getSumToken"."" . PHP_EOL);
    	 
    	return ($this->quantityUnit + $this->quantityStored)* $this->priceTokenUnit;
    }
    
    /**
     * @return float price
     */
    
    public function getPrice($fraction = false, $withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getPrice"."" . PHP_EOL);
    	 
        $price = ($fraction ? $this->priceFraction : $this->priceUnit);

        if ($withDiscount)
            $price -= ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);

        return $price;
    }

    public function getPriceSuscription() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getPriceSuscription"."" . PHP_EOL);
    	 
        $price = $this->priceSuscriptionUnit;
        $price -= $this->discountSuscriptionUnit;
        return $price;
    }
    
    public function getPriceToken($fraction = false, $withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getPriceToken"."" . PHP_EOL);
    	 
    	$price = ($fraction ? $this->priceFraction : $this->priceUnit);
    
    	if ($withDiscount)
    		$price -= ($fraction ? $this->discountPriceFractionDiscount : $this->discountPriceUnitDiscount);
    
    	return $price;
    }
    
    public function getTotalPrice() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getTotalPrice"."" . PHP_EOL);
    	 
        $price = $this->getSumPrice();
        $price += $this->getSumPriceUnitSuscription();
        $price += $this->shipping;
        return $price;
    }
    
    public function getTotalPriceToken() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCart - Generando getTotalPriceToken"."" . PHP_EOL);
    	 
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
