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
    
    
    public function actionPagar($paso = null, $post = false) {
    	$this->layout = "simple";
    	$modelPago = null;
    	
    	if (is_string($post)) {
            $post = ($post == "true");
        }
        
        if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
        	$modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
        }
         
        if(empty($modelPago) || !($modelPago->objSectorCiudad instanceof SectorCiudad) ){
        	throw new CHttpException(404, 'Proceso de compra no iniciado');
        }
        
        if (Yii::app()->shoppingCartVitalCall->isEmpty()) {
        	if ($post) {
        		echo CJSON::encode(array('result' => 'ok', 'response' => 'Carro vac&iacute;o', 'redirect' => $this->createUrl("/callcenter/vitalcall/carro")));
        		Yii::app()->end();
        	} else {
        		$this->redirect($this->createUrl('/callcenter/vitalcall/cliente'));
        		Yii::app()->end();
        	}
        }
        
        if ($modelPago->tipoEntrega == null) {
        	$modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];
        }
        
        //verificar si ubicacion (ciudad-sector) tiene domicilio
        if (!$modelPago->tieneDomicilio()) {
        	$modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['presencial'];
        }
        
        Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;
        
        //finalizan validaciones previas e inicializa proceso de pasos de pago
        
        if ($paso === null)
        	$paso = Yii::app()->params->vitalCall['pagar']['pasos'][1];
        
       	if (!in_array($paso, Yii::app()->params->vitalCall['pagar']['pasosDisponibles'])) {
       		throw new CHttpException(404, 'Página solicitada no existe.');
       	}
       
       	$modelPago->setScenario($paso);
       	
       	
       	if ($post) {
       		$siguiente = Yii::app()->getRequest()->getPost('siguiente', null);
       	
       		if ($siguiente === null) {
       			echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
       			Yii::app()->end();
       		}
       	
       		switch ($paso) {
       			case Yii::app()->params->vitalCall['pagar']['pasos'][1]:
       				$form = new FormaPagoVitalCallForm($paso);
       				$form->identificacionUsuario = $modelPago->identificacionUsuario;
       				$form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
       				$form->totalCompra = $modelPago->totalCompra;
       	
       				if (isset($_POST['FormaPagoVitalCallForm'])) {
       					foreach ($_POST['FormaPagoVitalCallForm'] as $atributo => $valor) {
       						$form->$atributo = is_string($valor) ? trim($valor) : $valor;
       					}
       				}
       	
       				if ($form->validate()) {
       					$modelPago->tipoEntrega = $form->tipoEntrega;
       	
       					if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
       						$modelPago->indicePuntoVenta = $form->indicePuntoVenta;
       						$modelPago->seleccionarPdv($form->indicePuntoVenta);
       					}
       	
       					$modelPago->fechaEntrega = $form->fechaEntrega;
       					$modelPago->idFormaPago = $form->idFormaPago;
       					$modelPago->numeroTarjeta = $form->numeroTarjeta;
       					$modelPago->cuotasTarjeta = $form->cuotasTarjeta;
       					$modelPago->comentario = $form->comentario;
       					$modelPago->pasoValidado[$paso] = $paso;
       	
       					Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;
       	
       					echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/callcenter/vitalcall/carro/pagar", array('paso' => $siguiente))));
       					Yii::app()->end();
       				} else {
       					echo CActiveForm::validate($form);
       					Yii::app()->end();
       				}
       	
       				break;
       			case Yii::app()->params->vitalCall['pagar']['pasos'][2]:
       	
       				if ($siguiente != "finalizar") {
       					echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/callcenter/vitalcall/carro/pagar", array('paso' => $siguiente))));
       					Yii::app()->end();
       				}
       	
       				$form = new FormaPagoVitalCallForm($paso);
       				$form->identificacionUsuario = $modelPago->identificacionUsuario;
       				$form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
       				$form->tipoEntrega = $modelPago->tipoEntrega;
       	
       				if (isset($_POST['FormaPagoVitalCallForm'])) {
       					foreach ($_POST['FormaPagoVitalCallForm'] as $atributo => $valor) {
       						$form->$atributo = is_string($valor) ? trim($valor) : $valor;
       					}
       				}
       	
       				if ($form->validate()) {
       					$modelPago->pasoValidado[$paso] = $paso;
       					$modelPago->confirmacion = $form->confirmacion;
       					Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;
       					echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados", 'redirect' => $this->createUrl("/callcenter/vitalcall/carro/comprar")));
       					Yii::app()->end();
       				} else {
       					echo CActiveForm::validate($form);
       					Yii::app()->end();
       				}
       				break;
       			default :
       				echo CJSON::encode(array('result' => 'error', 'response' => 'Paso no detectado'));
       				break;
       		}
       	} else {
       		//validar pasos anteriores
       		$modelPago->validarPasos(Yii::app()->params->vitalCall['pagar']['pasosDisponibles'], $paso);
       	
       		$params = array();
       		$params['parametros']['paso'] = $paso;
       		$params['paso'] = $paso;
       	
       		$nPasoActual = Yii::app()->params->vitalCall['pagar']['pasos'][$paso];
       		$nPasoAnterior = $nPasoActual - 1;
       		$nPasoSiguiente = $nPasoActual + 1;
       		$pasoSiguiente = isset(Yii::app()->params->vitalCall['pagar']['pasos'][$nPasoSiguiente]) ? Yii::app()->params->vitalCall['pagar']['pasos'][$nPasoSiguiente] : null;
       		$pasoAnterior = isset(Yii::app()->params->vitalCall['pagar']['pasos'][$nPasoAnterior]) ? Yii::app()->params->vitalCall['pagar']['pasos'][$nPasoAnterior] : null;
       	
       		$params['parametros']['pasoAnterior'] = $pasoAnterior;
       		$params['parametros']['pasoSiguiente'] = $pasoSiguiente;
       		$params['parametros']['nPasoActual'] = $nPasoActual;
       	
       		switch ($paso) {
       			case Yii::app()->params->vitalCall['pagar']['pasos'][1]:
       				$params['parametros']['listHorarios'] = $modelPago->listDataHoras();
       	
       				$listFormaPago = FormaPago::model()->findAll(array(
       						'order' => 'formaPago',
       						'condition' => 'estadoFormaPago=:estado',
       						'params' => array(':estado' => 1)
       				));
       				Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;
       				$params['parametros']['listFormaPago'] = $listFormaPago;
       	
       				break;
       			case Yii::app()->params->vitalCall['pagar']['pasos'][2]:
       				$objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
       				$params['parametros']['objFormaPago'] = $objFormaPago;
       	
       	
       				//verificar productos en pdv
       				if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
       					$modelPago->seleccionarPdv($modelPago->indicePuntoVenta);
       				}
       				$modelPago->calcularConfirmacion(Yii::app()->shoppingCartVitalCall->getPositions());
       				break;
       		}
       		$params['parametros']['modelPago'] = $modelPago;
       		$this->render("pagar", $params);
       	}
    }
    
    public function actionPasoporel() {
    	$opcion = Yii::app()->getRequest()->getPost('opcion');
    
    	if ($opcion == null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inv&aacute;lida'));
    		Yii::app()->end();
    	}
    
    	$modelPago = null;
    	if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
    		$modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
    	}
    
    	if ($modelPago == null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
    		Yii::app()->end();
    	}
    
    	if ($opcion == "modal") {
    		$modelPago->consultarDisponibilidad(Yii::app()->shoppingCartVitalCall);
    		Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;
    
    		echo CJSON::encode(array(
    				'result' => 'ok',
    				'response' => $this->renderPartial("_pagarPresencial", array('listPuntosVenta' => $modelPago->listPuntosVenta), true)
    		));
    		Yii::app()->end();
    	} else if ($opcion == "seleccion") {
    		if ($modelPago->listPuntosVenta[0] == 0) {
    			echo CJSON::encode(array('result' => 'error', 'response' => $modelPago->listPuntosVenta[1]));
    			Yii::app()->end();
    		}
    
    		$idx = Yii::app()->getRequest()->getPost('idx');
    
    		if ($idx == null) {
    			echo CJSON::encode(array('result' => 'error', 'response' => 'Datos inv&aacute;lidos'));
    			Yii::app()->end();
    		}
    
    		$modelPago->seleccionarPdv($idx);
    		Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;
    
    		echo CJSON::encode(array('result' => 'ok', 'response' => 'Punto de venta seleccionado'));
    		Yii::app()->end();
    	} else {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud env&aacute;lida'));
    		Yii::app()->end();
    	}
    }
    
    public function actionDisponibilidad(){
    	$modelPago = null;
    	if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
    		$modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
    	}
    	
    	if ($modelPago == null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
    		Yii::app()->end();
    	}

    	$modelPago->consultarDisponibilidad(Yii::app()->shoppingCartVitalCall);
    }
    
    
    
    public function actionList() {
    	//Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = null;
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
    
    public function actionVaciar() {
		Yii::app ()->shoppingCartVitalCall->clear ();
		
		$this->redirect ( 'index' );
		/*
		 * echo CJSON::encode(array(
		 * 'result' => 'ok',
		 * 'carro' => $this->renderPartial("carro", null, true),
		 * 'canasta' => $this->renderPartial("canasta", null, true),
		 * ));
		 */
		Yii::app ()->end ();
	}
	public function actionModificar() {
		
		$modificar = Yii::app ()->getRequest ()->getPost ( 'modificar', null );
		$id = Yii::app ()->getRequest ()->getPost ( 'position', null );
		
		$modelPago = null;
		
		if (isset ( Yii::app ()->session [Yii::app ()->params->vitalCall ['sesion'] ['carroPagarForm']] ) && Yii::app ()->session [Yii::app ()->params->vitalCall ['sesion'] ['carroPagarForm']] != null) {
			$modelPago = Yii::app ()->session [Yii::app ()->params->vitalCall ['sesion'] ['carroPagarForm']];
		}
		
		if ($modificar === null || $id === null) {
			echo CJSON::encode ( array (
					'result' => 'error',
					'response' => array (
							'message' => 'Solicitud inválida, no se detectan datos',
						//	'carroHTML' => $this->renderPartial ( $carroVista, null, true ) 
					) 
			) );
			Yii::app ()->end ();
		}
		
		$position = Yii::app ()->shoppingCartVitalCall->itemAt ( $id );
		// !Yii::app()->shoppingCart->contains($id)
		
		if ($position === null) {
			echo CJSON::encode ( array (
					'result' => 'error',
					'response' => array (
							'message' => 'Producto no agregado a carro',
						//	'carroHTML' => $this->renderPartial ( $carroVista, null, true ) 
					) 
			) );
			Yii::app ()->end ();
		}
		
		if ($modificar == 1) {
			$this->modificarProducto ( $position, $modelPago->objSectorCiudad );
		} 
		
		echo CJSON::encode ( array (
				'result' => 'error',
				'response' => array (
						'message' => 'Solicitud inválida',
					//	'carroHTML' => $this->renderPartial ( $carroVista, null, true ) 
				) 
		) );
		Yii::app ()->end ();
	}
	
	
	private function modificarProducto($position, $objSectorCiudad) {
		$carroVista = "carro";
		
	
		$cantidadU = Yii::app()->getRequest()->getPost('cantidadU', null);
		$cantidadF = Yii::app()->getRequest()->getPost('cantidadF', null);
	
		if ($cantidadU === null || $cantidadF === null) {
			echo CJSON::encode(array('result' => 'error', 'response' => array(
					'message' => 'Solicitud inválida, no se detectan datos',
					'carroHTML' => $this->renderPartial($carroVista, null, true),
			)));
			Yii::app()->end();
		}
	
		if ($cantidadF < 0 && $cantidadU < 0) {
			echo CJSON::encode(array('result' => 'error', 'response' => array(
					'message' => 'Cantidad no válida',
					'carroHTML' => $this->renderPartial($carroVista, null, true),
			)));
			Yii::app()->end();
		}
		
		if($position->isFormula()){
			$codigoProducto = $position->objProductoFormula->objProductoVC->codigoProducto;
		}else{
			$codigoProducto = $position->objProducto->codigoProducto;
		}
		
		$objProducto = Producto::model()->find(array(
				'with' => array(
						'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
						'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
						'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
				),
				'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
				'params' => array(
						':activo' => 1,
						':codigo' => $codigoProducto,
						':saldo' => 0,
						':ciudad' => $objSectorCiudad->codigoCiudad,
						':sector' => $objSectorCiudad->codigoSector,
				),
		));
	
		if ($objProducto === null) {
			echo CJSON::encode(array('result' => 'error', 'response' => array(
					'message' => 'Producto no disponible',
					'carroHTML' => $this->renderPartial($carroVista, null, true),
			)));
			Yii::app()->end();
		}
	
		$objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);
	
		if ($objSaldo === null) {
			echo CJSON::encode(array('result' => 'error', 'response' => array(
					'message' => 'Producto no disponible',
					'carroHTML' => $this->renderPartial($carroVista, null, true),
			)));
			Yii::app()->end();
		}
	
		$agregarU = false;
		$agregarF = false;
	
		// $canastaVista = "canasta";
		
		if ($cantidadU >= 0) {
			//si hay saldo, agrega a carro, sino consulta bodega
			if ($cantidadU <= $objSaldo->saldoUnidad) {
				$agregarU = true;
			} else {
				$objPagoForm = new FormaPagoForm;
				if (!$objPagoForm->tieneDomicilio($this->objSectorCiudad)) {
					echo CJSON::encode(array('result' => 'error', 'response' => array(
							'message' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades",
						//	'carroHTML' => $this->renderPartial($carroVista, null, true),
					)));
					Yii::app()->end();
				}
				Yii::app()->end();
			}
		}
	
		if ($cantidadF >= 0) {
			if ($cantidadF <= $objSaldo->saldoFraccion) {
				$agregarF = true;
			} else {
				echo CJSON::encode(array('result' => 'error', 'response' => array(
						'message' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoFraccion fracciones",
					//	'carroHTML' => $this->renderPartial($carroVista, null, true),
				)));
				Yii::app()->end();
			}
		}
	
		if ($agregarU) {
			Yii::app()->shoppingCartVitalCall->update($position, false, $cantidadU);
		}
	
		if ($agregarF) {
			Yii::app()->shoppingCartVitalCall->update($position, true, $cantidadF);
		}
	
		echo CJSON::encode(array(
				'result' => 'ok',
				'response' => array(
					//	'carroHTML' => $this->renderPartial($canastaVista, null, true),
						'canastaHTML' => $this->renderPartial('carro', null, true),
				),
		));
		Yii::app()->end();
	}
	
	public function actionEliminar() {
		$id = Yii::app()->getRequest()->getPost('id', null);
		$eliminar = Yii::app()->getRequest()->getPost('eliminar', null);
	
		if ($id === null || $eliminar === null) {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
			Yii::app()->end();
		}
	
		$position = Yii::app()->shoppingCartVitalCall->itemAt($id);
	
		if ($position == null) {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no agregado a carro'));
			Yii::app()->end();
		}
	
		if ($eliminar == 1) {
			Yii::app()->shoppingCartVitalCall->update($position, false, 0);
		} else if ($eliminar == 2) {
			Yii::app()->shoppingCartVitalCall->update($position, true, 0);
		} else if ($eliminar == 3) {
			Yii::app()->shoppingCartVitalCall->updateStored($position, 0);
		} else {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
			Yii::app()->end();
		}
	
		echo CJSON::encode(array(
				'result' => 'ok',
			//	'carro' => $this->renderPartial("carro" , null, true),
				'canastaHTML' => $this->renderPartial("carro", null, true),
		));
		Yii::app()->end();
	}
}
