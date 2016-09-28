<?php

class CarroController extends ControllerVitalcall {
	public function actionIndex() {
		$this->render('index');
		Yii::app()->end();
	}
		
    public function actionAgregar(){
    	$modelPago = null;
    	
    	if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
    		$modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
    	}
    	
    	if(empty($modelPago) || !($modelPago->objSectorCiudad instanceof SectorCiudad) ){
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
    		Yii::app()->end();
    	}
    	
    	$tipo = Yii::app()->getRequest()->getPost('tipo', null);
    	
    	if($tipo==1){
    		$this->agregarVitalCall($modelPago);
    	}else if($tipo==2){
    		$this->agregarProducto($modelPago);
    	}
    	
    	echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, tipo incorrecto'));
    	Yii::app()->end();
    }
    
    public function agregarVitalCall(FormaPagoVitalCallForm $modelPago){
    	$formula = Yii::app()->getRequest()->getPost('formula', null);
    	$producto = Yii::app()->getRequest()->getPost('producto', null);
    	$cantidadU = Yii::app()->getRequest()->getPost('cantidadU', null);
    	$cantidadF = Yii::app()->getRequest()->getPost('cantidadF', null);
    	
    	if ($formula===null || $producto===null || $cantidadU===null || $cantidadF===null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
    		Yii::app()->end();
    	}
    	
    	if ($cantidadF < 1 && $cantidadU < 1) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no válida'));
    		Yii::app()->end();
    	}
    	
    	$objProductoFormula = ProductosFormulaVitalCall::model()->find(array(
    			'with' => array('objProductoVC'),
    			'condition' => 't.idFormula=:formula AND t.idProductoVitalCall=:producto',
    			'params' => array(
    					':formula'=> $formula,
    					':producto' => $producto
    			)
    	));
    	
    	if($objProductoFormula===null){
    		echo CJSON::encode(array('result' => 'error', 'response' => 'ProductoFormula no existente'));
    		Yii::app()->end();
    	}
    	
    	if(!$objProductoFormula->objProductoVC->esVigente()){
    		echo CJSON::encode(array('result' => 'error', 'response' => "Producto no vigente [vitalcall: $objProductoFormula->idProductoVitalCall, producto: " . $objProductoFormula->objProductoVC->codigoProducto .  "]"));
    		Yii::app()->end();
    	}
    	
    	$objProducto = Producto::model()->find(array(
    			'with' => array(
    					'listSaldos' => array('condition' => '(listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR listSaldos.idProductoSaldos IS NULL'),
    					'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR listPrecios.idProductoPrecios IS NULL'),
    			),
    			'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
    			'params' => array(
    					':activo' => 1,
    					':codigo' => $objProductoFormula->objProductoVC->codigoProducto,
    					':ciudad' => $modelPago->objSectorCiudad->codigoCiudad,
    					':sector' => $modelPago->objSectorCiudad->codigoSector,
    			),
    	));
    	
    	if ($objProducto === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
    		Yii::app()->end();
    	}
    	
    	$objSaldo = $objProducto->getSaldo($modelPago->objSectorCiudad->codigoCiudad, $modelPago->objSectorCiudad->codigoSector);
    	
    	if ($objSaldo === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Saldo no disponible'));
    		Yii::app()->end();
    	}
    	
    	$idPosition = "$formula-$producto";
    	
    	if ($cantidadU > 0) {
    		$cantidadCarroUnidad = 0;
    		$position = Yii::app()->shoppingCartVitalCall->itemAt($idPosition);
    	
    		if ($position !== null) {
    			$cantidadCarroUnidad = $position->getQuantityUnit();
    		}
    	
    		//si hay saldo, agrega a carro, sino consulta bodega
    		if ($cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
    			$objProductoCarro = new ProductoCarro($objProductoFormula);
    			Yii::app()->shoppingCartVitalCall->put($objProductoCarro, false, $cantidadU);
    		} else {
    			echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
    			Yii::app()->end();
    		}
    	}
    	
    	if ($cantidadF > 0) {
    		$objProductoCarro = new ProductoCarro($objProductoFormula);
    		Yii::app()->shoppingCartVitalCall->put($objProductoCarro, true, $cantidadF);
    	}
    	
    	/* if (!ctype_digit($cantidad)) {
    	 echo CJSON::encode(array('result' => 'error', 'response' => 'La cantidad de productos, debe ser n&uacute;mero entero.'));
    	 Yii::app()->end();
    	 }
    	 */
    	
    	$mensajeCanasta = $this->renderPartial('_carroAgregado', array('objProducto' => $objProducto), true);
    	$canastaVista = "_canasta";
    	
    	echo CJSON::encode(array(
    			'result' => 'ok',
    			'response' => array(
    					//'canastaHTML' => $this->renderPartial($canastaVista, null, true),
    					'mensajeHTML' => $mensajeCanasta,
    					'objetosCarro' => Yii::app()->shoppingCartVitalCall->getCount()
    			),
    	));
    	Yii::app()->end();
    }
    
    public function agregarProducto(FormaPagoVitalCallForm $modelPago) {
    	$producto = Yii::app()->getRequest()->getPost('producto', null);
    	$cantidadU = Yii::app()->getRequest()->getPost('cantidadU', null);
    	$cantidadF = Yii::app()->getRequest()->getPost('cantidadF', null);
    
    	if ($producto === null || $cantidadU === null || $cantidadF === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
    		Yii::app()->end();
    	}
    
    	if ($cantidadF < 1 && $cantidadU < 1) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no válida'));
    		Yii::app()->end();
    	}
    
    	$objProducto = Producto::model()->find(array(
    			'with' => array(
    					'listSaldos' => array('condition' => '(listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
    					'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
    					'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
    			),
    			'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
    			'params' => array(
    					':activo' => 1,
    					':codigo' => $producto,
    					':ciudad' => $modelPago->objSectorCiudad->codigoCiudad,
    					':sector' => $modelPago->objSectorCiudad->codigoSector,
    			),
    	));
    
    	if ($objProducto === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
    		Yii::app()->end();
    	}
    
    	$objSaldo = $objProducto->getSaldo($modelPago->objSectorCiudad->codigoCiudad, $modelPago->objSectorCiudad->codigoSector);
    
    	if ($objSaldo === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
    		Yii::app()->end();
    	}
    	
    	$idPosition = $producto;
    
    	if ($cantidadU > 0) {
    		$cantidadCarroUnidad = 0;
    		$position = Yii::app()->shoppingCartVitalCall->itemAt($idPosition);
    	
    		if ($position !== null) {
    			$cantidadCarroUnidad = $position->getQuantityUnit();
    		}
    	
    		//si hay saldo, agrega a carro, sino consulta bodega
    		if ($cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
    			$objProductoCarro = new ProductoCarro($objProducto);
    			Yii::app()->shoppingCartVitalCall->put($objProductoCarro, false, $cantidadU);
    		} else {
    			echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
    			Yii::app()->end();
    		}
    	}
    	
    	if ($cantidadF > 0) {
    		$objProductoCarro = new ProductoCarro($objProducto);
    		Yii::app()->shoppingCartVitalCall->put($objProductoCarro, true, $cantidadF);
    	}
    
    	/* if (!ctype_digit($cantidad)) {
    	 echo CJSON::encode(array('result' => 'error', 'response' => 'La cantidad de productos, debe ser n&uacute;mero entero.'));
    	 Yii::app()->end();
    	 }
    	 */
    
    	$mensajeCanasta = $this->renderPartial('_carroAgregado', array('objProducto' => $objProducto), true);
    	$canastaVista = "_canasta";
    	
    	echo CJSON::encode(array(
    			'result' => 'ok',
    			'response' => array(
    					//'canastaHTML' => $this->renderPartial($canastaVista, null, true),
    					'mensajeHTML' => $mensajeCanasta,
    					'objetosCarro' => Yii::app()->shoppingCartVitalCall->getCount()
    			),
    	));
    	Yii::app()->end();
    }
    
    public function actionVaciar() {
    	Yii::app()->shoppingCartVitalCall->clear();
    
    	/*echo CJSON::encode(array(
    			'result' => 'ok',
    			'carro' => $this->renderPartial("carro", null, true),
    			'canasta' => $this->renderPartial("canasta", null, true),
    	));*/
    	Yii::app()->end();
    }
    
    public function actionList() {
    	//Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
    	//Yii::app()->shoppingCart->clear();
    	//exit();
    	//CVarDumper::dump(Yii::app()->shoppingCart->itemAt(91269), 2, true);
    	//echo "<br/>";
    	//echo "<br/>";
    
    	echo "Descuento: " . Yii::app()->shoppingCartVitalCall->getDiscountPrice();
    	echo "<br/>";
    	echo "ciudad: " . Yii::app()->shoppingCartVitalCall->getCodigoCiudad();
    	echo "<br/>";
    	echo "sector: " . Yii::app()->shoppingCartVitalCall->getCodigoSector();
    	echo "<br/>";
    	echo "perfil: " . Yii::app()->shoppingCartVitalCall->getCodigoPerfil();
    	echo "<br/>";
    	echo "cantidad productos: " . Yii::app()->shoppingCartVitalCall->getCount();
    	echo "<br/>";
    	echo "cantidad items: " . Yii::app()->shoppingCartVitalCall->getItemsCount();
    	echo "<br/>";
    	echo "costo total: " . Yii::app()->shoppingCartVitalCall->getCost();
    	echo "<br/>";
    	echo "costo total: " . Yii::app()->shoppingCartVitalCall->getTotalCost();
    	echo "<br/>";
    	// echo "tiempo: " . Yii::app()->shoppingCartVitalCall->getDelivery();
    	//echo "<br/>";
    	echo "servicio: " . Yii::app()->shoppingCartVitalCall->getShipping();
    	echo "<br/>";
    
    
    	echo "<br/>";
    
    
    	$positions = Yii::app()->shoppingCartVitalCall->getPositions();
    	foreach ($positions as $position) {
    		echo "Id: " . $position->getId();
    		echo "<br/>";
    		echo "Precio U: " . $position->getPrice();
    		echo "<br/>";
    		echo "Precio F: " . $position->getPrice(true);
    		echo "<br/>";
    		echo "Cantidad U: " . $position->getQuantity();
    		echo "<br/>";
    		echo "Cantidad Stored: " . $position->getQuantityStored();
    		echo "<br/>";
    		echo "Cantidad F: " . $position->getQuantity(true);
    		echo "<br/>";
    		echo "Precio: " . $position->getSumPrice();
    		echo "<br/>";
    		echo "Flete: " . $position->getShipping();
    		echo "<br/>";
    		echo "Impuestos: " . $position->getTax();
    		echo "<br/>";
    		echo "Impuestos precio: " . $position->getTaxPrice();
    		echo "<br/>";
    		echo "Impuestos base: " . $position->getBaseTaxPrice();
    		echo "<br/>";
    		echo "Tiempo entrega: " . $position->getDelivery();
    		echo "<br/>";
    
    
    		echo "Beneficios: <br/>";
    		print_r($position->getBeneficios());
    		echo "<br/>";
    
    		if ($position->isFormula()) {
    			echo "Es formula<br/>";
    		}
    
    		echo "<br/>";
    	}
    }

}
