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
    protected $tax = 0.0;

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

    public function getTaxPrice($total = false) {
        if ($total)
            return ($this->getPrice(true) * $this->tax * $this->quantityFraction) + ($this->getPrice() * $this->tax * ($this->quantityUnit+$this->quantityStored));
        else
            return $this->getPrice() * $this->tax;
    }

    /**
     * Установить сумму скидки на позицию
     * @param  $newVal
     * @return void
     */
    /* public function setDiscountPrice($newVal) {
      $this->discountPrice = $newVal;
      } */

    public function getDiscountPrice($fraction = false) {
        return ($fraction ? $this->discountPriceFraction : $this->discountPriceUnit);
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

    public function generate($params) {
        
    }

    /**
     * @return mixed id
     */
    public function getId() {
        
    }

}
