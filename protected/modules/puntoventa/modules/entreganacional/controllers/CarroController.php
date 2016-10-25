<?php

class CarroController extends ControllerOperator{
	/**
	 * @return array action filters
	 * */
	public function filters() {
		return array(
				//'access',
				'login + agregar',
				//'loginajax + direccionActualizar',
		);
	}
	
	/*
	 public function filters() {
	 return array(
	 array('tienda.filters.AccessControlFilter'),
	 array('tienda.filters.LanzamientoControlFilter'),
	 );
	 } */

	public function filterLogin($filter) {
		if (Yii::app()->controller->module->user->isGuest) {
			$this->redirect(Yii::app()->controller->module->user->loginUrl);
		}
		$filter->run();
	}
	public function actionAgregar() {
		$modelPago = null;
	
// 		if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
// 			$modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
// 		}
	
// 		if (empty($modelPago) || !($modelPago->objSectorCiudad instanceof SectorCiudad)) {
// 			echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
// 			Yii::app()->end();
// 		}
	
		$tipo = Yii::app()->getRequest()->getPost('tipo', null);
	

		$this->agregarProducto();

	
		echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, tipo incorrecto'));
		Yii::app()->end();
	}
	
	public function agregarProducto() {
		$producto = Yii::app()->getRequest()->getPost('producto', null);
		$cantidadU = Yii::app()->getRequest()->getPost('cantidadU', null);
		$cantidadF = Yii::app()->getRequest()->getPost('cantidadF', null);
		$puntoVenta = Yii::app()->session[Yii::app()->params->entreganacional['sesion']['pdv']];
		
		$objPuntoVenta = PuntoVenta::model()->find(array(
			'condition' => 'IDComercial = :idcomercial',
			'params' => array(
					':idcomercial' => $puntoVenta
			)
		));
		
		// obtener un objeto de la clase punto de venta
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
						':ciudad' => $objPuntoVenta->codigoCiudad,
						':sector' => $objPuntoVenta->idSectorLRV,
				),
		));
	
		if ($objProducto === null) {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
			Yii::app()->end();
		}
	
		$objSaldo = $objProducto->getSaldo($objPuntoVenta->codigoCiudad, $objPuntoVenta->idSectorLRV);
	
		if ($objSaldo === null) {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
			Yii::app()->end();
		}
	
		$idPosition = $producto;
		$idPositionCart = Yii::app()->shoppingCartNationalSale->getIdFromCode($objProducto->codigoProducto);
	
		if($idPositionCart!==null && $idPositionCart!=$idPosition){
			echo CJSON::encode(array('result' => 'error', 'response' => 'Producto agregado sin f&oacute;rmula o en otra f&oacute;rmula'));
			Yii::app()->end();
		}
	
		if ($cantidadU > 0) {
			$cantidadCarroUnidad = 0;
			$position = Yii::app()->shoppingCartNationalSale->itemAt($idPosition);
	
			if ($position !== null) {
				$cantidadCarroUnidad = $position->getQuantityUnit();
			}
			//si hay saldo, agrega a carro, sino consulta bodega
			if ($cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
				$objProductoCarro = new ProductoCarro($objProducto);
				Yii::app()->shoppingCartNationalSale->put($objProductoCarro, false, $cantidadU);
			} else {
				echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
				Yii::app()->end();
			}
		}
	
		if ($cantidadF > 0) {
			$objProductoCarro = new ProductoCarro($objProducto);
			Yii::app()->shoppingCartNationalSale->put($objProductoCarro, true, $cantidadF);
		}
	
		/* if (!ctype_digit($cantidad)) {
		 echo CJSON::encode(array('result' => 'error', 'response' => 'La cantidad de productos, debe ser n&uacute;mero entero.'));
		 Yii::app()->end();
		 }
		 */
	
		echo CJSON::encode(array(
				'result' => 'ok',
				'response' => array(
						'canastaHTML' => $this->renderPartial("canasta", null, true),
						'mensajeHTML' => $this->renderPartial('_carroAgregado', array('objProducto' => $objProducto), true),
						'objetosCarro' => Yii::app()->shoppingCartNationalSale->getCount()
				),
		));
		Yii::app()->end();
	}
	
	public function actionVaciar() {
		Yii::app()->shoppingCartNationalSale->clear();
		unset(Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']]);
		unset(Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['formulaMedica']]);
	
		echo CJSON::encode(array(
				'result' => 'ok',
				'canasta' => $this->renderPartial("canasta" , null, true),
				'carro' => $this->renderPartial("carro", null, true),
		));
		Yii::app()->end();
	}
	
}