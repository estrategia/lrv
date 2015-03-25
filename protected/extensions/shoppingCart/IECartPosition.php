<?php

/**
 * IECartPosition
 *
 * @author pirrat <mrakobesov@gmail.com>
 * @version 0.7
 * @package ShoppingCart
 */
abstract class IECartPosition {

    protected $price = 0;
    protected $quantity = 0;
    protected $discountPrice = 0.0;
    protected $shipping = 0;
    protected $tax = 0.0;

    /**
     * Returns total price for all units of the position
     * @param bool $withDiscount
     * @return float
     *
     */
    public function getSumPrice($withDiscount = true) {
        /* $fullSum = $this->getPrice() * $this->quantity;

          if($withDiscount){
          $fullSum -=  $this->discountPrice * $this->quantity;
          }
          return $fullSum; */

        return $this->getPrice($withDiscount) * $this->quantity;
    }

    /**
     * Returns quantity.
     * @return int
     */
    public function getQuantity() {
        return $this->quantity;
    }

    /**
     * Updates quantity.
     *
     * @param int quantity
     */
    public function setQuantity($newVal) {
        $this->quantity = $newVal;
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
            return $this->getPrice() * $this->tax * $this->quantity;
        else
            return $this->getPrice() * $this->tax;
    }

    /**
     * Установить сумму скидки на позицию
     * @param  $newVal
     * @return void
     */
    public function setDiscountPrice($newVal) {
        $this->discountPrice = $newVal;
    }

    public function getDiscountPrice() {
        return $this->discountPrice;
    }

    /**
     * @return float price
     */
    public function getPrice($withDiscount = true) {
        if ($withDiscount)
            return $this->price - $this->discountPrice;
        else
            return $this->price;
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

    public function getCode() {
        
    }

}
