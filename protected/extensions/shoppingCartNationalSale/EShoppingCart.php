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
     * @var float
     */
    protected $discountPrice = 0.0;
    public $objDireccionVC = null;
    public $objSectorCiudadOrigen = null;
    public $objSectorCiudadDestino = null;
    public $tipoVenta = null;
    protected $shipping = 0;
    protected $shippingServicio = 0;
    protected $shippingRecogida = 0;
    public $codigoPerfil = null;
    protected $bonoValue = 0;

    public function init() {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "shoppingCartLog.txt", "a");
    	fwrite($file, Date("Y-m-d H:i:s ")." Ejecutando Init Carro EShoppingCartNationalSale"."" . PHP_EOL);
        $this->restoreFromSession();
    }
    
    public function setBono($newVal) {
    	$this->bonoValue = $newVal;
    }
    
    public function getBono() {
    	return $this->bonoValue;
    }

    public function setShipping($newVal) {
        $this->shipping = $newVal;
        $this->saveStateAttributes();
    }

	public function CalculateShipping() {
        if ($this->objSectorCiudadDestino !== null && $this->objSectorCiudadDestino instanceof SectorCiudad) {
        	$modelPago = null;
        	if (isset(Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] != null)
    			$modelPago = Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']];
    	
    			
	    		if(!empty($modelPago)){
	    			$this->shipping = Yii::app()->params->entregaNacional['domicilio']['sinrecogida'];
	    			$this->shippingServicio = Yii::app()->params->entregaNacional['domicilio']['sinrecogida'];
		    		if($modelPago->recogida == 1){ 
		    			$this->shipping += Yii::app()->params->entregaNacional['domicilio']['recogida'];
		    			$this->shippingRecogida = Yii::app()->params->entregaNacional['domicilio']['recogida'];
		    		}
	    		}else{
	    			$this->shipping = 0;
	    		}
          	
            $this->saveStateAttributes();
        }
    }

    public function getShipping() {
        return $this->shipping;
    }
    
    public function getShippingServicio() {
    	return $this->shippingServicio;
    }
    
    public function getShippingRecogida() {
    	return $this->shippingRecogida;
    }

    public function getCodigoPerfil() {
        return $this->codigoPerfil;
    }
    
    public function getObjSectorCiudadOrigen(){
    	return $this->objSectorCiudadOrigen;
    }
    
    public function getObjCiudadOrigen(){
    	if(!empty($this->objSectorCiudadOrigen))
    		return $this->objSectorCiudadOrigen->objCiudad;
    	else null;
    }
    
    public function getObjCiudadDestino(){
    	if(!empty($this->objSectorCiudadDestino))
    		return $this->objSectorCiudadDestino->objCiudad;
    	else null;
    }
    

    public function getCodigoCiudadOrigen() {
        if ($this->objSectorCiudadOrigen == null)
            return null;
        return $this->objSectorCiudadOrigen->codigoCiudad;
    }

    public function getCodigoSectorOrigen() {
        if ($this->objSectorCiudadOrigen == null)
            return null;
        return $this->objSectorCiudadOrigen->codigoSector;
    }
    
    public function getCodigoCiudadDestino() {
    	if ($this->objSectorCiudadDestino == null)
    		return null;
    		return $this->objSectorCiudadDestino->codigoCiudad;
    }
    
    public function getCodigoSectorDestino() {
    	if ($this->objSectorCiudadDestino == null)
    		return null;
    		return $this->objSectorCiudadDestino->codigoSector;
    }

    /*public function getCategorias() {
        $arrCategorias = array();
        foreach ($this as $position) {
            if ($position->isProduct()) {
                $arrCategorias[] = array(
                    'refe' => $position->objProducto->codigoProducto,
                    'codigo' => $position->objProducto->idCategoriaBI,
                    'valor' => $position->getSumPrice(),
                    'tieneDescuento' => $position->hasDiscount()
                );
            }
        }
        return $arrCategorias;
    }

    public function getMarcas() {
        $arrMarcas = array();
        foreach ($this as $position) {
            if ($position->isProduct()) {
                $arrMarcas[] = array(
                    'refe' => $position->objProducto->codigoProducto,
                    'codigo' => $position->objProducto->idMarca,
                    'valor' => $position->getSumPrice(),
                    'tieneDescuento' => $position->hasDiscount()
                );
            }
        }
        return $arrMarcas;
    }

    public function getProveedores() {
        $arrProveedores = array();
        foreach ($this as $position) {
            if ($position->isProduct()) {
                $arrProveedores[] = array(
                    'refe' => $position->objProducto->codigoProducto,
                    'codigo' => $position->objProducto->codigoProveedor,
                    'valor' => $position->getSumPrice(),
                    'tieneDescuento' => $position->hasDiscount()
                );
            }
        }
        return $arrProveedores;
    }

    public function getProductosCantidad() {
        $arrProductos = array();
        foreach ($this as $position) {
            if ($position->isProduct()) {
                $arrProductos[] = array(
                    'codigo' => $position->objProducto->codigoProducto,
                    'cantidad' => $position->getQuantityUnit(),
                    'valor' => $position->getSumPrice(),
                    'tieneDescuento' => $position->hasDiscount()
                );
            }
        }
        return $arrProductos;
    }*/
    
    /**
     * Restores the shopping cart from the session
     */
    public function restoreFromSession() {
    	$modelPago = null;
    	
    	if (isset(Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] != null)
    		$modelPago = Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']];
    	
    	
    	if($modelPago instanceof FormaPagoEntregaNacionalForm ){
    		$this->objSectorCiudadOrigen = $modelPago->objCiudadSectorOrigen;
    		$this->objSectorCiudadDestino = $modelPago->objCiudadSectorDestino;
    	}
    	
    	if($modelPago instanceof FormaPagoVentaAsistidaForm){
    		$this->objSectorCiudadDestino = $modelPago->objCiudadSectorDestino;
    	}
    	
    	if(isset(Yii::app()->session[Yii::app()->params->puntoventa['sesion']['tipoEntrega']])){
    		$this->tipoVenta = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['tipoEntrega']];
    	}
    		
        $data = Yii::app()->getUser()->getState($this->getClass());
        $this->shipping = Yii::app()->getUser()->getState($this->getClass() . '_Shipping');
      //  $this->codigoPerfil = Yii::app()->getUser()->getState(__CLASS__ . '_CodigoPerfil');
                
        //CVarDumper::dump($this->codigoPerfil, 10, true);echo "<br>";
        //CVarDumper::dump($this->shipping, 10, true);echo "<br>";
        
        if (is_array($data) || $data instanceof Traversable)
            foreach ($data as $key => $product)
                parent::add($key, $product);
        
        $this->CalculateShipping();
        
        //CVarDumper::dump($this->codigoPerfil, 10, true);echo "<br>";
        //CVarDumper::dump($this->shipping, 10, true);echo "<br>";
    }

    /**
     * Add item to the shopping cart
     * If the position was previously added to the cart,
     * then information of it is updated, and count increases by $quantity
     * @param IECartPosition $position
     * @param int $quantity count of elements positions
     * @param bool $fraction adding fraction or not
     */
    public function put(IECartPosition $position, $fraction, $quantity = 1, $pdv = 0) {
        $key = $position->getId();
        $numCant = $quantity;
        if ($this->itemAt($key) instanceof IECartPosition) {
        	
            $position = $this->itemAt($key);
            $oldQuantity = $position->getQuantity($fraction);
            $quantity += $oldQuantity;
        }
		
        $this->update($position, $fraction, $quantity, $pdv,$numCant);
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

    public function updatePositions() {
    	if($this->tipoVenta == 1){
	        if ($this->objSectorCiudadOrigen !== null && $this->codigoPerfil!==null) {
	            foreach ($this as $position) {
	                $key = $position->getId();
	
	                $position->generate(array(
	                    'objSectorCiudad' => $this->objSectorCiudadOrigen,
	                    'codigoPerfil' => $this->codigoPerfil
	                ));
	                parent::add($key, $position);
	
	                $this->applyDiscounts();
	                $this->onUpdatePoistion(new CEvent($this));
	                $this->saveState();
	            }
	        }
    	}else{
    		if ($this->objSectorCiudadDestino !== null && $this->codigoPerfil!==null) {
    			foreach ($this as $position) {
    				$key = $position->getId();
    		
    				$position->generate(array(
    						'objSectorCiudad' => $this->objSectorCiudadDestino,
    						'codigoPerfil' => $this->codigoPerfil
    				));
    				parent::add($key, $position);
    		
    				$this->applyDiscounts();
    				$this->onUpdatePoistion(new CEvent($this));
    				$this->saveState();
    			}
    		}
    	}
    }
    
    public function updatePositionKey($key) {
        $position = $this->itemAt($key);
        if ($this->objSectorCiudadOrigen !== null && $this->codigoPerfil!==null && $position !==null) {
            $position->generate(array(
                'objSectorCiudad' => $this->objSectorCiudadOrigen,
                'codigoPerfil' => $this->codigoPerfil
            ));
            parent::add($key, $position);

            $this->applyDiscounts();
            $this->onUpdatePoistion(new CEvent($this));
            $this->saveState();
        }
    }
    
    public function updatePosition(IECartPosition $position) {
        if ($this->objSectorCiudadOrigen !== null && $this->codigoPerfil!==null && $position !==null) {
            parent::add($position->getId(), $position);

            //$this->applyDiscounts();
            $this->onUpdatePoistion(new CEvent($this));
            $this->saveState();
        }
    }

    /**
     * Updates the position in the shopping cart
     * If the position was previously added, then it will be updated in shopping cart,
     * if the position was not previously in the cart, it will be added there.
     * If the count of less than 1, the position will be deleted.
     *
     * @param IECartPosition $position
     * @param int $quantity
     * @param bool $fraction adding fraction or not
     */
    public function update(IECartPosition $position, $fraction, $quantity, $pdv = 0, $numCant = 0, $delete = false) {
    	if($this->tipoVenta == 1){
    		
    		
	    	if ($this->objSectorCiudadOrigen !== null) {
	            $key = $position->getId();
	
	            $position->generate(array(
	                'objSectorCiudad' => $this->objSectorCiudadOrigen,
	                'codigoPerfil' => $this->codigoPerfil
	            ));
	
	            $position->setQuantity($quantity, $fraction);
	            
	            
	           
	            if ($position->getQuantity(true) + $position->getQuantity(false) < 1)
	                $this->remove($key);
	            else
	                parent::add($key, $position);
	
	            $this->applyDiscounts();
	            $this->onUpdatePoistion(new CEvent($this));
	            $this->saveState();
	            return true;
	        }
    	}else{
    		if ($this->objSectorCiudadDestino !== null) {
    			$key = $position->getId();
    		
    			$position->generate(array(
    					'objSectorCiudad' => $this->objSectorCiudadDestino,
    					'codigoPerfil' => $this->codigoPerfil
    			));
    		
    			//$position->attachBehavior("CartPosition", new ECartPositionBehaviour());
    			
    			$QuantityPDV = $position->getUnitPDV($pdv,true);
    			$FracPDV = $position->getUnitPDV($pdv,false);
    			
    			if($delete){
	    			 $totalQuantityUnit = $position->getQuantity(false);
	    			 $totalQuantityFrac = $position->getQuantity(true);
	    			 
	    			 $position->setQuantity($totalQuantityUnit - $QuantityPDV, false);
	    			 $position->setQuantity($totalQuantityFrac - $FracPDV, true);
	    			 
	    			 $position->deletePDV($pdv);
    			}else{
    				$position->setQuantity($quantity, $fraction);
    				
    				if(!$fraction){
    					$QuantityPDV+=$numCant;
    				}else{
    					$FracPDV+=$numCant;
    				}
    				$position->setPDV($pdv,$QuantityPDV,$FracPDV);
    			}
    		
    			if ($position->getQuantity(true) + $position->getQuantity(false) < 1)
    				$this->remove($key);
    			else
    				parent::add($key, $position);
    				$this->applyDiscounts();
    				$this->onUpdatePoistion(new CEvent($this));
    				$this->saveState();
    				return true;
    		}
    	}
        return false;
    }

    public function isUnitStored(){
    	$positions = $this->getPositions();
    	 
    	foreach($positions as $position){
    		if ($position->getDelivery() == 0 && $position->getShipping() == 0 && $position->isProduct() && $position->getQuantityStored() > 0){
    			return true;
    		}
    	}
    	 
    	return false;
    }
    
    /**
     * Saves the state of the object in the session.
     * @return void
     */
    protected function saveState() {
        Yii::app()->getUser()->setState($this->getClass(), $this->toArray());
        $this->saveStateAttributes();
    }

    protected function saveStateAttributes() {
        Yii::app()->getUser()->setState('SectorCiudadOrigen', $this->objSectorCiudadOrigen);
        Yii::app()->getUser()->setState('SectorCiudadDestino', $this->objSectorCiudadDestino);
        Yii::app()->getUser()->setState($this->getClass() . '_CodigoPerfil', $this->codigoPerfil);
        Yii::app()->getUser()->setState($this->getClass() . '_Shipping', $this->shipping);
    }
    
    private function getClass(){
    	return __CLASS__ . "NationalSale";
    }

    /**
     * Returns count of items in shopping cart
     * @return int
     */
    public function getItemsCount() {
        $count = 0;
        foreach ($this as $position) {
            $count += $position->getQuantity() + $position->getQuantity(true);
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
    
    /**
     * Returns total price for all items in the shopping cart.
     * @param bool $withDiscount
     * @return float
     */
    public function getCostToken($withDiscount = true) {
    	$price = 0.0;
    	foreach ($this as $position) {
    		$price += $position->getSumPriceToken($withDiscount);
    	}
    
    	if ($withDiscount)
    		$price -= $this->discountPrice;
    
    		return $price;
    }
    

 public function getTotalCost($withBono = false) {

        $price = 0.0;
  		foreach ($this as $position) {
        	if($withBono)
        		$price += $position->getTotalPrice();
        	else 
        		$price += $position->getTotalPriceToken();
        }

        $price -= $this->discountPrice;
        $price += $this->shipping /*+ $this->shippingStored*/;
  
        return $price;
    }
    
    public function getTotalCostClient() {
    	$price = $this->getTotalCost(true) - $this->bonoValue; /***** Valor que est� afectando la compra ******/
        return $price;
   }
    

    public function getExtraShipping() {
        $shipping = 0.0;
        foreach ($this as $position) {
            $shipping += $position->getShipping();
        }
        
        return $shipping;
    }

    public function getTaxPrice() {
        $tax = 0;
        if ($this->objSectorCiudadOrigen != null && $this->objSectorCiudadOrigen->objCiudad->excentoImpuestos == 0) {
            foreach ($this as $position) {
                $tax += $position->getTaxPrice(true);
            }
        }
        
        $tax += $this->getTaxShipping();
        //$tax = ceil($tax);
        return $tax;
    }
    
    public function getBaseTaxPrice(){
        $tax = 0;
        if ($this->objSectorCiudadOrigen != null && $this->objSectorCiudadOrigen->objCiudad->excentoImpuestos == 0) {
            foreach ($this as $position) {
                $tax += $position->getBaseTaxPrice(true);
            }
        }
        
        $tax += $this->getTaxShipping(true) ;
         
        //$tax = ceil($tax);
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
                $discount += $position->getDiscountPrice() * $position->getQuantity() + $position->getDiscountPrice(true) * $position->getQuantity(true);
                //$discount -= $position->getShipping();
            }
            $discount += $this->discountPrice;
            //$discount -= $this->shipping;

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
    
    public function getIdFromCode($code) {
    	foreach ($this as $position) {
    		if($position->getObjProducto()->codigoProducto==$code){
    			return $position->getId();
    		}
    	}
    	return null;
    }
    
    public function getItemAtCode($code){
    	foreach ($this as $position) {
    		if($position->getObjProducto()->codigoProducto==$code){
    			return $position;
    		}
    	}
    	return null;
    }
    
    public function getTotalBonoProducto(){
    	$price = 0.0;
    	foreach ($this as $position) {
    		$price += $position->getSumToken();
    	}
    	return $price;
    }
    
    public function getTaxShipping($base = false){
    	 
    	$impuestoQuery = Impuesto::model()->findByPk(Yii::app()->params->impuestoDomicilio);
    	 
    	$impuesto = $impuestoQuery->valor;
    	 
    	 
    	if($base == true)
    		return round(Precio::calcularBaseImpuesto($this->shipping, $impuesto/100));
    		else
    			return round(Precio::calcularImpuesto($this->shipping, $impuesto/100));
    }
    
    public function clear(){
    	$this->setShipping(0);
    	$this->CalculateShipping();
    	parent::clear();
    }
}
