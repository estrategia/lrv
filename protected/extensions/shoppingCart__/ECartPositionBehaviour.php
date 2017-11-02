<?php

/**
 * position in the cart
 *
 * @author pirrat <mrakobesov@gmail.com>
 * @version 0.7
 * @package ShoppingCart
 *
 * Can be used with not AR models.
 */
class ECartPositionBehaviour extends CModelBehavior {

    /**
     * number of positions
     * @var int
     */
    private $quantity = 0;

    /**
     * Сумма скидки на позицию
     * @var float
     */
    private $discountPercentage = 0.0;
    
    private $shipping = 0;
    
    private $tax = 0.0;


    public function init() {

    }

    /**
     * Returns total price for all units of the position
     * @param bool $withDiscount
     * @return float
     *
     */
    public function getSumPrice($withDiscount = true) {
        $fullSum = $this->owner->getPrice() * $this->quantity;
        
        if($withDiscount){
            $fullSum -=  $this->discountPercentage * $this->quantity;
        }
        return $fullSum;
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
    
    /*public function setShipping($newVal){
        $this->shipping = $newVal;
    }*/
    
    public function getShipping(){
        return $this->shipping;
    }
    
    /*public function setTax($newVal){
        $this->tax = $newVal;
    }*/
    
    public function getTax(){
        return $this->tax;
    }

    /**
     * Установить сумму скидки на позицию
     * @param  $price
     * @return void
     */
    public function setDiscountPercentaje($price) {
        $this->discountPercentage = $price;
    }

}
