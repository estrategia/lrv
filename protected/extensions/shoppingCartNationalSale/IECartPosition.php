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
    protected $delivery = 0;
    protected $tax = 0.0;
    
    protected $listBeneficios = array();
    protected $listBeneficiosBonos = array();
    protected $listPDV = array();
    
    
    protected $priceTokenUnit = 0;
    
    
    public function getBeneficios(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getBeneficios"."" . PHP_EOL);
    	
        return $this->listBeneficios;
    }
    
    public function getPDVs(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getPDVs"."" . PHP_EOL);
    	
    	return $this->listPDV;
    }
    
    public function getPDV($pdv){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getPDV"."" . PHP_EOL);
    	
    	if(isset($this->listPDV[$pdv]))
    		return $this->listPDV[$pdv];
    	else 
    		return null;
    }
    
    
    public function getUnitPDV($pdv, $unit = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getUnitPDV"."" . PHP_EOL);
    	
    	if(isset($this->listPDV[$pdv])){
    		if($unit)
    			return $this->listPDV[$pdv]['unidades'];
    		else
    			return $this->listPDV[$pdv]['fracciones'];
    	}
    	else
    		return 0;
    }
    
    public function setPDV($pdv, $unit, $frac = 0){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando setPDV"."" . PHP_EOL);
    	
    	$this->listPDV[$pdv] = array(
    			'unidades' => $unit,
    			'fracciones' => $frac
    	);
    }
    
    public function deletePDV($pdv){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando deletePDV"."" . PHP_EOL);
    	
    	unset($this->listPDV[$pdv]);
    }
    
    public function getBeneficiosBonos(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getBeneficiosBonos"."" . PHP_EOL);
    	
    	return $this->listBeneficiosBonos;
    }
    
    public function getDelivery() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPriceToken"."" . PHP_EOL);
    	
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
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getSumPrice"."" . PHP_EOL);
    	
        /* $fullSum = $this->getPrice() * $this->quantity;

          if($withDiscount){
          $fullSum -=  $this->discountPrice * $this->quantity;
          }
          return $fullSum; */
        return $this->getPrice(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0)) + $this->getPrice(true, $withDiscount) * $this->quantityFraction;
    }
    
    public function getSumPriceUnit($withStored = true, $withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getSumPriceUnit"."" . PHP_EOL);
    	
        return $this->getPrice(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0));
    }
    
    public function getSumPriceFraction($withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getSumPriceFraction"."" . PHP_EOL);
    	
        return $this->getPrice(true, $withDiscount) * $this->quantityFraction;
    }
    
    
    public function getSumPriceToken($withStored = true, $withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getSumPriceToken"."" . PHP_EOL);
    	
      	return $this->getPriceToken(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0)) + $this->getPriceToken(true, $withDiscount) * $this->quantityFraction;
    }
    
    public function getSumPriceUnitToken($withStored = true, $withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getSumPriceUnitToken"."" . PHP_EOL);
    	
    	return $this->getPriceToken(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0));
    }
    
    public function getSumPriceFractionToken($withDiscount = true){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getSumPriceFractionToken"."" . PHP_EOL);
    	
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
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getSumPriceStored"."" . PHP_EOL);
    	
        return $this->getPrice(false, $withDiscount) * $this->quantityStored;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantity($fraction = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getQuantity"."" . PHP_EOL);
    	
        return ($fraction ? $this->quantityFraction : ($this->quantityUnit+$this->quantityStored));
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantityUnit() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getQuantityUnit"."" . PHP_EOL);
    	
        return $this->quantityUnit;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantityStored() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getQuantityStored"."" . PHP_EOL);
    	
        return $this->quantityStored;
    }

    /**
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantity($newVal, $fraction = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPriceToken"."" . PHP_EOL);
    	
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
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPriceToken"."" . PHP_EOL);
    	
        $this->quantityStored = $newVal;
    }

    public function setShipping($newVal) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando setShipping"."" . PHP_EOL);
    	
        $this->shipping = $newVal;
    }

    public function getShipping() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPriceToken"."" . PHP_EOL);
    	
        return $this->shipping;
    }

    public function setTax($newVal) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPriceToken"."" . PHP_EOL);
    	
        $this->tax = $newVal;
    }

    public function getTax() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPriceToken"."" . PHP_EOL);
    	
        return $this->tax;
    }
    
    public function setPriceUnit($price){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPriceToken"."" . PHP_EOL);
    	
        $this->priceUnit = $price;
    }
    
    public function setPriceFraction($price){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando setPriceFraction"."" . PHP_EOL);
    	
        $this->priceFraction = $price;
    }
    
    public function setDiscountPriceUnit($discount){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando setDiscountPriceUnit"."" . PHP_EOL);
    	
        $this->discountPriceUnit = $discount;
    }
    
    public function setDiscountPriceFraction($discount){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando setDiscountPriceFraction"."" . PHP_EOL);
    	
        $this->discountPriceFraction = $discount;
    }
    
    public function setDelivery($delivery){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando setDelivery"."" . PHP_EOL);
    	
        $this->delivery = $delivery;
    }
    
    public function setBeneficios($listBeneficios){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando setBeneficios"."" . PHP_EOL);
    	
        $this->listBeneficios = $listBeneficios;
    }
    
    public function setBeneficiosBonos($listBeneficios){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando setBeneficiosBonos"."" . PHP_EOL);
    	
    	$this->listBeneficiosBonos = $listBeneficios;
    }
    

    public function getTaxPrice($total = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTaxPrice"."" . PHP_EOL);
    	
        $tax = 0.0;
        if ($total)
            $tax = Precio::calcularImpuesto($this->getPrice(true) * $this->quantityFraction,$this->tax) + Precio::calcularImpuesto($this->getPrice() * ($this->quantityUnit+$this->quantityStored),$this->tax);
        else
            $tax = Precio::calcularImpuesto($this->getPrice() , $this->tax);
        
        return round($tax);
    }
    
    public function getBaseTaxPrice($total = false){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPriceToken"."" . PHP_EOL);
    	
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
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getDiscountPrice"."" . PHP_EOL);
    	
        return ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);
    }
    
    public function getDiscountPriceToken($fraction = false) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getDiscountPriceToken"."" . PHP_EOL);
    	
    	return ($fraction ? $this->discountPriceFractionDiscount : $this->discountPriceUnitDiscount);
    }
    
    public function hasDiscount(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando hasDiscount"."" . PHP_EOL);
    	
        return (($this->discountPriceFraction+$this->discountPriceUnit) > 0);
    }

    /**
     * @return float price
     */
    public function getPrice($fraction = false, $withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getPrice"."" . PHP_EOL);
    	
        $price = ($fraction ? $this->priceFraction : $this->priceUnit);

        if ($withDiscount)
            $price -= ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);

        return $price;
    }
    
    public function getPriceToken($fraction = false, $withDiscount = true) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getPriceToken"."" . PHP_EOL);
    	
    	$price = ($fraction ? $this->priceFraction : $this->priceUnit);
    
    	if ($withDiscount)
    		$price -= ($fraction ? $this->discountPriceFractionDiscount : $this->discountPriceUnitDiscount);
    
    		return $price;
    }
    

    public function getTotalPrice() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPrice"."" . PHP_EOL);
    	
        $price = $this->getSumPrice();
        $price += $this->shipping;
        return $price;
    }
    
    public function getSumToken(){
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getSumToken"."" . PHP_EOL);
    	
    	return ($this->quantityUnit + $this->quantityStored)* $this->priceTokenUnit;
    }
    
    public function getTotalPriceToken() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale - Generando getTotalPriceToken"."" . PHP_EOL);
    	
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
