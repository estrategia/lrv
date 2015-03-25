<?php

/**
 * Shopping cart class
 *
 * @author pirrat <mrakobesov@gmail.com>
 * @version 0.7
 * @package ShoppingCart
 */
class EShoppingCart extends CMap {

    /**
     * Update the model on session restore?
     * @var boolean
     */
    public $discounts = array();

    /**
     * Сумма скидки на всю корзину
     * @var float
     */
    protected $discountPrice = 0.0;
    public $codigoPerfil = null;
    public $objSectorCiudad = null;
    protected $shipping = 0;

    public function init() {
        $this->restoreFromSession();
    }

    /* public function setUbicacion($objSectorCiudad) {
      if ($this->objSectorCiudad == null || $objSectorCiudad->codigoCiudad != $this->objSectorCiudad->codigoCiudad || $objSectorCiudad->codigoSector != $this->objSectorCiudad->codigoSector) {
      $this->objSectorCiudad = $objSectorCiudad;
      $this->clear();
      $this->saveState();
      }
      } */

    public function setShipping($newVal) {
        $this->shipping = $newVal;
        $this->saveStateAttributes();
    }

    public function getShipping() {
        return $this->shipping;
    }

    public function setCodigoPerfil($codigoPerfil) {
        $this->codigoPerfil = $codigoPerfil;
        $this->saveStateAttributes();
    }

    public function getCodigoPerfil() {
        return $this->codigoPerfil;
    }

    public function getCodigoCiudad() {
        if ($this->objSectorCiudad == null)
            return null;
        return $this->objSectorCiudad->codigoCiudad;
    }

    public function getObjCiudad() {
        return $this->objSectorCiudad->objCiudad;
    }

    public function getCodigoSector() {
        if ($this->objSectorCiudad == null)
            return null;
        return $this->objSectorCiudad->codigoSector;
    }

    /**
     * Restores the shopping cart from the session
     */
    public function restoreFromSession() {
        $data = Yii::app()->getUser()->getState(__CLASS__);

        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $this->objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        //$this->objSectorCiudad = Yii::app()->getUser()->getState('SectorCiudad');
        $this->codigoPerfil = Yii::app()->getUser()->getState(__CLASS__ . '_CodigoPerfil');

        if (is_array($data) || $data instanceof Traversable)
            foreach ($data as $key => $product)
                parent::add($key, $product);
    }

    /**
     * Add item to the shopping cart
     * If the position was previously added to the cart,
     * then information of it is updated, and count increases by $quantity
     * @param IECartPosition $position
     * @param int count of elements positions
     */
    public function put(IECartPosition $position, $quantity = 1) {
        $key = $position->getId();
        if ($this->itemAt($key) instanceof IECartPosition) {
            $position = $this->itemAt($key);
            $oldQuantity = $position->getQuantity();
            $quantity += $oldQuantity;
        }

        $this->update($position, $quantity);
    }

    /**
     * @param mixed $key
     * @param mixed $value
     */
    public function add($key, $value) {
        $this->put($value, 1);
    }

    /**
     * Removes position from the shopping cart of key
     * @param mixed $key
     */
    public function remove($key) {
        parent::remove($key);
        $this->applyDiscounts();
        $this->onRemovePosition(new CEvent($this));
        $this->saveState();
    }

    /**
     * Updates the position in the shopping cart
     * If the position was previously added, then it will be updated in shopping cart,
     * if the position was not previously in the cart, it will be added there.
     * If the count of less than 1, the position will be deleted.
     *
     * @param IECartPosition $position
     * @param int $quantity
     */
    public function update(IECartPosition $position, $quantity) {
        if ($this->objSectorCiudad !== null) {

            if ($this->codigoPerfil == null)
                $this->codigoPerfil = Yii::app()->params->usuario['perfilDefecto'];

            $key = $position->getId();

            $position->generate(array(
                'objSectorCiudad' => $this->objSectorCiudad,
                'codigoPerfil' => $this->codigoPerfil
            ));

            //$position->attachBehavior("CartPosition", new ECartPositionBehaviour());

            $position->setQuantity($quantity);

            if ($position->getQuantity() < 1)
                $this->remove($key);
            else
                parent::add($key, $position);

            $this->applyDiscounts();
            $this->onUpdatePoistion(new CEvent($this));
            $this->saveState();
            return true;
        }
        return false;
    }

    /**
     * Saves the state of the object in the session.
     * @return void
     */
    protected function saveState() {
        Yii::app()->getUser()->setState(__CLASS__, $this->toArray());
        $this->saveStateAttributes();
    }

    protected function saveStateAttributes() {
        //Yii::app()->getUser()->setState('SectorCiudad', $this->objSectorCiudad);
        Yii::app()->getUser()->setState(__CLASS__ . '_CodigoPerfil', $this->codigoPerfil);
    }

    /**
     * Returns count of items in shopping cart
     * @return int
     */
    public function getItemsCount() {
        $count = 0;
        foreach ($this as $position) {
            $count += $position->getQuantity();
        }

        return $count;
    }

    /**
     * Returns total price for all items in the shopping cart.
     * @param bool $withDiscount
     * @return float
     */
    public function getCost($withDiscount = true) {
        $price = 0.0;
        foreach ($this as $position) {
            $price += $position->getSumPrice($withDiscount);
        }

        if ($withDiscount)
            $price -= $this->discountPrice;

        return $price;
    }

    public function getTotalCost() {

        $price = 0.0;
        foreach ($this as $position) {
            $price += $position->getTotalPrice();
        }

        $price -= $this->discountPrice;

        return $price;
    }

    public function getExtraShipping() {
        $shipping = 0.0;
        foreach ($this as $position) {
            $shipping += $position->getShipping();
        }
        return $shipping;
    }

    /* public function getTax($position = null) {
      $tax = 0.0;
      if ($position == null) {
      if ($this->objSectorCiudad != null && $this->objSectorCiudad->objCiudad->excentoImpuestos == 0) {
      foreach ($this as $position) {
      $tax += $position->getTax();
      }
      }
      } else {
      if ($this->objSectorCiudad != null && $this->objSectorCiudad->objCiudad->excentoImpuestos == 0) {
      $tax = $position->getTax();
      }
      }
      return $tax;
      } */

    public function getTaxPrice() {
        $tax = 0.0;
        if ($this->objSectorCiudad != null && $this->objSectorCiudad->objCiudad->excentoImpuestos == 0) {
            foreach ($this as $position) {
                $tax += $position->getTaxPrice(true);
            }
        }
        return $tax;
    }

    public function onRemovePosition($event) {
        $this->raiseEvent('onRemovePosition', $event);
    }

    public function onUpdatePoistion($event) {
        $this->raiseEvent('onUpdatePoistion', $event);
    }

    /**
     * apply discounts for all positions
     * @return void
     */
    protected function applyDiscounts() {
        foreach ($this->discounts as $discount) {
            $discountObj = Yii::createComponent($discount);
            $discountObj->setShoppingCart($this);
            $discountObj->apply();
        }
    }

    public function addDiscountPrice($price) {
        $this->discountPrice += $price;
    }

    public function getDiscountPrice($total = false) {
        if ($total) {
            $discount = 0.0;
            foreach ($this as $position) {
                $discount += $position->getDiscountPrice(true)*$position->getQuantity();
                $discount -= $position->getShipping();
            }
            $discount += $this->discountPrice;
            $discount -= $this->shipping;
            
            return $discount;
        } else
            return $this->discountPrice;
    }

    /**
     * Returns array all positions
     * @return array
     */
    public function getPositions() {
        return $this->toArray();
    }

    /**
     * @return bool
     */
    public function isEmpty() {
        return !(bool) $this->getCount();
    }

}