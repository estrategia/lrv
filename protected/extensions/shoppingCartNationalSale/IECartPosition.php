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
    
    public function getBeneficios(){
        return $this->listBeneficios;
    }
    
    public function getDelivery() {
        return $this->delivery;
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
        return $this->getPrice(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0)) + $this->getPrice(true, $withDiscount) * $this->quantityFraction;
    }
    
    public function getSumPriceUnit($withStored = true, $withDiscount = true){
        return $this->getPrice(false, $withDiscount) * ($this->quantityUnit+ ($withStored ? $this->quantityStored : 0));
    }
    
    public function getSumPriceFraction($withDiscount = true){
        return $this->getPrice(true, $withDiscount) * $this->quantityFraction;
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
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantity($newVal, $fraction = false) {
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
        $this->quantityStored = $newVal;
    }

    public function setShipping($newVal) {
        $this->shipping = $newVal;
    }

    public function getShipping() {
        return $this->shipping;
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
    
    public function setDelivery($delivery){
        $this->delivery = $delivery;
    }
    
    public function setBeneficios($listBeneficios){
        $this->listBeneficios = $listBeneficios;
    }

    public function getTaxPrice($total = false) {
        $tax = 0.0;
        if ($total)
            $tax = Precio::calcularImpuesto($this->getPrice(true) * $this->quantityFraction,$this->tax) + Precio::calcularImpuesto($this->getPrice() * ($this->quantityUnit+$this->quantityStored),$this->tax);
        else
            $tax = Precio::calcularImpuesto($this->getPrice() , $this->tax);
        
        return round($tax);
    }
    
    public function getBaseTaxPrice($total = false){
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
        return ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);
    }
    
    public function hasDiscount(){
        return (($this->discountPriceFraction+$this->discountPriceUnit) > 0);
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

    public function getTotalPrice() {
        $price = $this->getSumPrice();
        $price += $this->shipping;
        return $price;
    }

    abstract public function generate($params);

    /**
     * @return mixed id
     */
    abstract public function getId();

}
