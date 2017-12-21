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
    protected $priceFraction = 0;
    protected $quantityUnit = 0;
    protected $quantityStored = 0;
    protected $quantityFraction = 0;
    protected $discountPriceUnit = 0.0;
    protected $discountPriceFraction = 0.0;
    protected $shipping = 0;
    protected $delivery = 0;
    protected $tax = 0.0;
    protected $listBeneficios = array();
    
    protected $priceTokenUnit = 0;
    
    public function getBeneficios(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getBeneficios"."" . PHP_EOL);
    	
        return $this->listBeneficios;
    }
    
    public function getDelivery() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getDelivery"."" . PHP_EOL);
    	
        return $this->delivery;
    }

    /**
     * Returns total price for all units of the position
     * @param bool $withDiscount
     * @return float
     *
     */
    public function getSumPrice($withStored = true, $withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getSumPrice"."" . PHP_EOL);
    	 
        /* $fullSum = $this->getPrice() * $this->quantity;

          if($withDiscount){
          $fullSum -=  $this->discountPrice * $this->quantity;
          }
          return $fullSum; */
        return $this->getPrice(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0)) + $this->getPrice(true, $withDiscount) * $this->quantityFraction;
    }
    
    public function getSumPriceUnit($withStored = true, $withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getSumPriceUnit"."" . PHP_EOL);
    	 
        return $this->getPrice(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0));
    }
    
    public function getSumPriceFraction($withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getSumPriceFraction"."" . PHP_EOL);
    	 
        return $this->getPrice(true, $withDiscount) * $this->quantityFraction;
    }
    
    /**
     * Returns total price for all units of the position
     * @param bool $withDiscount
     * @return float
     *
     */
    public function getSumPriceStored($withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getSumPriceStored"."" . PHP_EOL);
    	 
        return $this->getPrice(false, $withDiscount) * $this->quantityStored;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantity($fraction = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getQuantity"."" . PHP_EOL);
    	 
        return ($fraction ? $this->quantityFraction : ($this->quantityUnit+$this->quantityStored));
    }
    
    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantityUnit() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getQuantityUnit"."" . PHP_EOL);
    	 
        return $this->quantityUnit;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantityStored() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getQuantityStored"."" . PHP_EOL);
    	 
        return $this->quantityStored;
    }

    /**
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantity($newVal, $fraction = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setQuantity"."" . PHP_EOL);
    	 
        if ($fraction) {
            $this->quantityFraction = $newVal;
        } else {
            $this->quantityUnit = $newVal;
        }
    }

    /**
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantityStored($newVal) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setQuantityStored"."" . PHP_EOL);
    	 
        $this->quantityStored = $newVal;
    }

    public function setShipping($newVal) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setShipping"."" . PHP_EOL);
    	 
        $this->shipping = $newVal;
    }

    public function getShipping() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getShipping"."" . PHP_EOL);
    	 
        return $this->shipping;
    }

    public function setTax($newVal) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setTax"."" . PHP_EOL);
    	 
        $this->tax = $newVal;
    }

    public function getTax() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getTax"."" . PHP_EOL);
    	 
        return $this->tax;
    }
    
    public function setPriceUnit($price){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setPriceUnit"."" . PHP_EOL);
    	 
        $this->priceUnit = $price;
    }
    
    public function setPriceFraction($price){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setPriceFraction"."" . PHP_EOL);
    	 
        $this->priceFraction = $price;
    }
    
    public function setDiscountPriceUnit($discount){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setDiscountPriceUnit"."" . PHP_EOL);
    	 
        $this->discountPriceUnit = $discount;
    }
    
    public function setDiscountPriceFraction($discount){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setDiscountPriceFraction"."" . PHP_EOL);
    	 
        $this->discountPriceFraction = $discount;
    }
    
    public function setDelivery($delivery){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setDelivery"."" . PHP_EOL);
    	 
        $this->delivery = $delivery;
    }
    
    public function setBeneficios($listBeneficios){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando setBeneficios"."" . PHP_EOL);
    	 
        $this->listBeneficios = $listBeneficios;
    }

    public function getTaxPrice($total = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getTaxPrice"."" . PHP_EOL);
    	 
        $tax = 0.0;
        if ($total)
            $tax = Precio::calcularImpuesto($this->getPrice(true) * $this->quantityFraction,$this->tax) + Precio::calcularImpuesto($this->getPrice() * ($this->quantityUnit+$this->quantityStored),$this->tax);
        else
            $tax = Precio::calcularImpuesto($this->getPrice() , $this->tax);
        
        return round($tax);
    }
    
    public function getBaseTaxPrice($total = false){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getBaseTaxPrice"."" . PHP_EOL);
    	 
        $base = 0.0;
        
        if ($total)
            $base = Precio::calcularBaseImpuesto($this->getPrice(true) * $this->quantityFraction,$this->tax) + Precio::calcularBaseImpuesto($this->getPrice() * ($this->quantityUnit+$this->quantityStored),$this->tax);
        else
            $base = Precio::calcularBaseImpuesto($this->getPrice() , $this->tax);
        
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
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getDiscountPrice"."" . PHP_EOL);
    	 
        return ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);
    }
    
    public function hasDiscount(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando hasDiscount"."" . PHP_EOL);
    	 
        return (($this->discountPriceFraction+$this->discountPriceUnit) > 0);
    }

    /**
     * @return float price
     */
    public function getPrice($fraction = false, $withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getPrice"."" . PHP_EOL);
    	 
        $price = ($fraction ? $this->priceFraction : $this->priceUnit);

        if ($withDiscount)
            $price -= ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);

        return $price;
    }

    public function getTotalPrice() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getTotalPrice"."" . PHP_EOL);
    	 
        $price = $this->getSumPrice();
        $price += $this->shipping;
        return $price;
    }
    
    public function getTotalPriceToken() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartVitallCall - Generando getTotalPriceToken"."" . PHP_EOL);
    	 
    	$price = $this->getSumPriceToken();
    	$price += $this->shipping;
    	return $price;
    }
    
    public function getSumToken(){
    	return ($this->quantityUnit + $this->quantityStored)* $this->priceTokenUnit;
    }
    

    abstract public function generate($params);

    /**
     * @return mixed id
     */
    abstract public function getId();

}
