<?php

class CarroController extends ControllerEntregaNacional{
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
	
	public function actionIndex() {
		$this->active = "compra";
		$this->render('index');
		Yii::app()->end();
	}
	
	public function actionAgregar() {
		$modelPago = null;
	
		$tipo = Yii::app()->getRequest()->getPost('tipo', null);
		$this->agregarProducto();

	
		echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, tipo incorrecto'));
		Yii::app()->end();
	}
	
	public function agregarProducto() {
		$producto = Yii::app()->getRequest()->getPost('producto', null);
		$cantidadU = Yii::app()->getRequest()->getPost('cantidadU', null);
		$cantidadF = Yii::app()->getRequest()->getPost('cantidadF', null);
		$puntoVenta = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']];
		
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
					'mensajeHTML' => $this->renderPartial('_carroAgregado', array('objProducto' => $objProducto), true),
					'objetosCarro' => Yii::app()->shoppingCartNationalSale->getCount()
				),
		));
		Yii::app()->end();
	}
	
	public function actionModificar() {
	
		$modificar = Yii::app()->getRequest()->getPost('modificar', null);
		$id = Yii::app()->getRequest()->getPost('position', null);
	
		$modelPago = null;
	
		$objSectorCiudad = $this->objCiudadSectorOrigen;
	
		if ($modificar === null || $id === null) {
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => array(
							'message' => 'Solicitud inválida, no se detectan datos',
							//	'carroHTML' => $this->renderPartial ( $carroVista, null, true )
					)
			));
			Yii::app()->end();
		}
	
		$position = Yii::app()->shoppingCartNationalSale->itemAt($id);
		// !Yii::app()->shoppingCartVitalCall->contains($id)
	
		if ($position === null) {
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => array(
							'message' => 'Producto no agregado a carro',
							//	'carroHTML' => $this->renderPartial ( $carroVista, null, true )
					)
			));
			Yii::app()->end();
		}
	
		if ($modificar == 1) {
			$this->modificarProducto($position, $objSectorCiudad);
		}
	
		echo CJSON::encode(array(
				'result' => 'error',
				'response' => array(
						'message' => 'Solicitud inválida',
						//	'carroHTML' => $this->renderPartial ( $carroVista, null, true )
				)
		));
		Yii::app()->end();
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
	
		$codigoProducto = $position->objProducto->codigoProducto;
	
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
				echo CJSON::encode(array('result' => 'error', 'response' => array(
							'message' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades",
							//	'carroHTML' => $this->renderPartial($carroVista, null, true),
					)));
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
			Yii::app()->shoppingCartNationalSale->update($position, false, $cantidadU);
		}
	
		if ($agregarF) {
			Yii::app()->shoppingCartNationalSale->update($position, true, $cantidadF);
		}
	
		echo CJSON::encode(array(
				'result' => 'ok',
				'response' => array(
					//	'canasta' => $this->renderPartial("canasta" , null, true),
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
	
		$position = Yii::app()->shoppingCartNationalSale->itemAt($id);
	
		if ($position == null) {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no agregado a carro'));
			Yii::app()->end();
		}
	
		if ($eliminar == 1) {
			Yii::app()->shoppingCartNationalSale->update($position, false, 0);
		} else if ($eliminar == 2) {
			Yii::app()->shoppingCartNationalSale->update($position, true, 0);
		} else if ($eliminar == 3) {
			Yii::app()->shoppingCartNationalSale->updateStored($position, 0);
		} else {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
			Yii::app()->end();
		}
	
		echo CJSON::encode(array(
				'result' => 'ok',
			//	'canasta' => $this->renderPartial("canasta" , null, true),
				'canastaHTML' => $this->renderPartial("carro", null, true),
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