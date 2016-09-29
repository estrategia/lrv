<?php

class FormulaController extends ControllerVitalcall {
	
	public function actionTest(){
		echo Yii::app()->shoppingCartVitalCall->getClass();
	}

    public function actionNueva() {

        $modelPago = null;
        $direccionCliente = null;
        $objSectorCiudad = null;
		
        $modelFormulaMedica = new FormulasVitalCall();
        if(isset($_POST['cliente'])){
        	$modelFormulaMedica->identificacionUsuario = $_POST['cliente'];
        }
        //CVarDumper::dump($modelPago,10,true);exit();
		
        if(isset($_POST['FormulasVitalCall'])){
        	$modelFormulaMedica->attributes = $_POST['FormulasVitalCall'];
        	$modelFormulaMedica->fechaCreacion = Date("Y-m-d h:i:s");
        	if($modelFormulaMedica->validate()){
        		if($modelFormulaMedica->save()){
        			$this->redirect(CController::createUrl('cliente/ver/', array('id' => $modelFormulaMedica->identificacionUsuario)));
        		}
        	}
        }

        $this->render('formulaForm', array(
            'modelFormulaMedica' => $modelFormulaMedica,
        ));
    }
 
    public function actionActualizar($id) {
    
    	$modelFormulaMedica = FormulasVitalCall::model()->findByPk($id);
    
    	//CVarDumper::dump($modelPago,10,true);exit();
    
    	if(isset($_POST['FormulasVitalCall'])){
    		$modelFormulaMedica->attributes = $_POST['FormulasVitalCall'];
    		if($modelFormulaMedica->validate()){
    			if($modelFormulaMedica->save()){
    				$this->redirect(CController::createUrl('cliente/ver/', array('id' => $modelFormulaMedica->identificacionUsuario)));
    			}
    		}
    	}
    
    	$this->render('formulaForm', array(
    			'modelFormulaMedica' => $modelFormulaMedica,
    	));
    }    
    
    public function actionAgregarProductos($id){
    	
    	$modelBuscarProductos = new BuscarProductosVitallCallForm();
    	$modelBuscarProductos->idFormula = $id;
    	if($_POST){
    		// buscar productos
    		
    		$modelBuscarProductos->attributes = $_POST['BuscarProductosVitallCallForm'];
    		$modelBuscarProductos->buscarProductos();
    		
    	}
    	
    		$productosFormula = ProductosFormulaVitalCall::model()->findAll(array(
    				'with' => array('objProductoVC' => array ('with' => array ('objProducto'))),
    				'order' => 't.fechaCreacion',
    				'condition' => 't.idFormula =:idFormula', 
    				'params' => array(
    						'idFormula' => $id
    				)
    		));
    	
    	$this->render('agregarProductos', array(
    			'modelBuscarProductos' => $modelBuscarProductos,
    			'productosFormula' => $productosFormula
    	));
    }
    
    public function agregarVitalCall(){
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
    	
    	
    	echo CJSON::encode(array('result' => 'error', 'response' => 'vitalcall 1'));
    	Yii::app()->end();
    }
    
    public function actionAgregarProductoFormula(){
    	
    	if($_POST){
	    	$model = new ProductosFormulaVitalCall();
	    	$model->cantidad = $_POST['cantidad'];
	    	$model->dosis = $_POST['dosis'];
	    	$model->intervalo = $_POST['intervalo'];
	    	$model->idProductoVitalCall = $_POST['idProductoVitalCall'];
	    	$model->idFormula = $_POST['idFormula'];
	    	$model->fechaCreacion = Date("Y-m-d h:i:s");
	    	if($model->save()){
	    		$productosFormula = ProductosFormulaVitalCall::model()->findAll(array(
	    				'with' => array('objProductoVC' => array ('with' => array ('objProducto'))),
	    				'order' => 't.fechaCreacion',
	    				'condition' => 't.idFormula =:idFormula',
	    				'params' => array(
	    						'idFormula' => $model->idFormula
	    				)
	    		));
	    		$productos = $this->renderPartial('_listaProductosAgregados', array("productosFormula" => $productosFormula), true, false);
	    		echo CJSON::encode(array('result' => 'ok', 'response' => $productos));
	    	}else{
	    		echo CJSON::encode(array('result' => 'error', 'response' => 'Debe completar todos los campos'));
	    	}
    	}
    }
    
    public function actionEliminarProductoFormula(){
    if($_POST){
    		$model = ProductosFormulaVitalCall::model()->find(array(
    				'condition' => 'idFormula =:idFormula AND idProductoVitalCall=:idProductoVitalCall' ,
    				'params' => array(
    						':idFormula' =>  $_POST['idFormula'],
    						':idProductoVitalCall' => $_POST['idProductoVitalCall'],
    				)
    		));
    		
    		if(!$model){
    			echo CJSON::encode(array('result' => 'error', 'response' => 'Los datos a actualizar son invalidos o han sido borrados'));
    			Yii::app()->end();
    		}
    		
    		if($model->delete()){
    			
    			$productosFormula = ProductosFormulaVitalCall::model()->findAll(array(
	    				'with' => array('objProductoVC' => array ('with' => array ('objProducto'))),
	    				'order' => 't.fechaCreacion',
	    				'condition' => 't.idFormula =:idFormula',
	    				'params' => array(
	    						'idFormula' => $model->idFormula
	    				)
	    		));
	    		$productos = $this->renderPartial('_listaProductosAgregados', array("productosFormula" => $productosFormula), true, false);
    			
    			echo CJSON::encode(array('result' => 'ok', 'response' => $productos));
    		}else{
    			print_r($model->getErrors());
    			echo CJSON::encode(array('result' => 'error', 'response' => 'Error al guardar los datos'));
    		}
    	}
    }

    
    public function actionEditarProductoFormula(){
    	if($_POST){
    		$model = ProductosFormulaVitalCall::model()->find(array(
    				'condition' => 'idFormula =:idFormula AND idProductoVitalCall=:idProductoVitalCall' ,
    				'params' => array(
    						':idFormula' =>  $_POST['idFormula'],
    						':idProductoVitalCall' => $_POST['idProductoVitalCall'],
    				)
    		));
    		
    		if(!$model){
    			echo CJSON::encode(array('result' => 'error', 'response' => 'Los datos a actualizar son invalidos o han sido borrados'));
    			Yii::app()->end();
    		}
    		
    		$model->cantidad = $_POST['cantidad'];
    		$model->dosis = $_POST['dosis'];
    		$model->intervalo = $_POST['intervalo'];
    		$model->idProductoVitalCall = $_POST['idProductoVitalCall'];
    	
    		if($model->save()){
    			$productosFormula = ProductosFormulaVitalCall::model()->findAll(array(
    					'with' => array('objProductoVC' => array ('with' => array ('objProducto'))),
    					'order' => 't.fechaCreacion',
    					'condition' => 't.idFormula =:idFormula',
    					'params' => array(
    							'idFormula' => $model->idFormula
    					)
    			));
    			$productos = $this->renderPartial('_listaProductosAgregados', array("productosFormula" => $productosFormula), true, false);
    			 
    			echo CJSON::encode(array('result' => 'ok', 'response' => $productos));
    		}else{
    			print_r($model->getErrors());
    			echo CJSON::encode(array('result' => 'error', 'response' => 'Error al guardar los datos'));
    		}
    	}
    }
    
    public function actionAgregar1() {
    	if ($this->objSectorCiudad == null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
    		Yii::app()->end();
    	}
    
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
    					//':saldo' => 0,
    					':ciudad' => $this->objSectorCiudad->codigoCiudad,
    					':sector' => $this->objSectorCiudad->codigoSector,
    			),
    	));
    
    	if ($objProducto === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
    		Yii::app()->end();
    	}
    
    	$objSaldo = $objProducto->getSaldo($this->objSectorCiudad->codigoCiudad, $this->objSectorCiudad->codigoSector);
    
    	if ($objSaldo === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
    		Yii::app()->end();
    	}
    
    	if ($cantidadU > 0) {
    		$cantidadCarroUnidad = 0;
    		$position = Yii::app()->shoppingCart->itemAt($producto);
    
    		if ($position !== null) {
    			$cantidadCarroUnidad = $position->getQuantityUnit();
    		}
    
    		//si hay saldo, agrega a carro, sino consulta bodega
    		if ($cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
    			$objProductoCarro = new ProductoCarro($objProducto);
    			Yii::app()->shoppingCart->put($objProductoCarro, false, $cantidadU);
    		} else {
    			$objPagoForm = new FormaPagoForm;
    			if (!$objPagoForm->tieneDomicilio($this->objSectorCiudad)) {
    				echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
    				Yii::app()->end();
    			}
    
    			$cantidadBodega = $cantidadCarroUnidad + $cantidadU - $objSaldo->saldoUnidad;
    			$cantidadUbicacion = $cantidadU - $cantidadBodega;
    
    			//si hay en bodegas, mensaje para ver detalle bodega, sino, mensaje error
    			$objSaldoBodega = ProductosSaldosCedi::model()->find(array(
    					'condition' => 'codigoProducto=:producto AND codigoCedi=:cedi AND saldoUnidad>=:saldo',
    					'params' => array(
    							':producto' => $producto,
    							':cedi' => $this->objSectorCiudad->objCiudad->codigoSucursal,
    							':saldo' => $cantidadBodega
    					)
    			));
    
    			if ($objSaldoBodega === null) {
    				echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
    				Yii::app()->end();
    			}
    
    			if ($this->isMobile) {
    				$htmlBodega = $this->renderPartial('_carroBodega', array(
    						'objSaldo' => $objSaldo,
    						'objProducto' => $objProducto,
    						'cantidadUbicacion' => $cantidadUbicacion,
    						'cantidadBodega' => $cantidadBodega), true);
    			} else {
    				$htmlBodega = $this->renderPartial('_d_carroBodega', array(
    						'objSaldo' => $objSaldo,
    						'objProducto' => $objProducto,
    						'cantidadUbicacion' => $cantidadUbicacion,
    						'cantidadBodega' => $cantidadBodega), true);
    			}
    			echo CJSON::encode(array(
    					'result' => 'ok',
    					'response' => array(
    							'dialogoHTML' => $htmlBodega,
    					),
    			));
    			Yii::app()->end();
    		}
    	}
    
    	if ($cantidadF > 0) {
    		$objProductoCarro = new ProductoCarro($objProducto);
    		Yii::app()->shoppingCart->put($objProductoCarro, true, $cantidadF);
    	}
    
    	/* if (!ctype_digit($cantidad)) {
    	 echo CJSON::encode(array('result' => 'error', 'response' => 'La cantidad de productos, debe ser n&uacute;mero entero.'));
    	 Yii::app()->end();
    	 }
    	 */
    
    	$mensajeCanasta = "";
    	if ($this->isMobile) {
    		$mensajeCanasta = $this->renderPartial('_carroAgregado', null, true);
    	} else {
    		$mensajeCanasta = $this->renderPartial('_d_carroAgregado', array('objProducto' => $objProducto), true);
    	}
    
    	$canastaVista = "canasta";
    	if (!$this->isMobile) {
    		$canastaVista = "d_canasta";
    	}
    
    	echo CJSON::encode(array(
    			'result' => 'ok',
    			'response' => array(
    					'relacionados' => $objProducto->tieneRelacionados(),
    					'canastaHTML' => $this->renderPartial($canastaVista, null, true),
    					'mensajeHTML' => $mensajeCanasta,
    					'objetosCarro' => Yii::app()->shoppingCart->getCount()
    			),
    	));
    	Yii::app()->end();
    }

}
