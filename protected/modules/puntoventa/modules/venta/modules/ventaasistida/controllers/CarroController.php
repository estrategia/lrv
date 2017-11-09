<?php

class CarroController extends ControllerVenta{
	/**
	 * @return array action filters
	 * */
	public function filters() {
		return array(
				//'access',
				'login + agregar,index',
				'entrega + index',
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

	public function filterEntrega($filter) {
		
		if (!$this->objCiudadSectorDestino) {
			$this->redirect(CController::createUrl('pedido/ubicacion'));
		}
		$filter->run();
	}
	public function actionIndex() {
		$this->active = "compra";
		$this->render('index');
	//	Yii::app()->end();
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
		
		$maximo = Yii::app()->getRequest()->getPost('maximo', null);
		$puntoVenta = Yii::app()->getRequest()->getPost('pdv', null);
		
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
						'listPreciosVAP' => array('condition' => '(listPreciosVAP.codigoCiudad=:ciudad) OR (listPreciosVAP.codigoCiudad IS NULL)'),
						'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
				),
				'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPreciosVAP.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
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
	
		$idPosition = $producto;
		$cantidadCarroUnidad = $cantidadCarroFraccion =  0;
		$cantidadUnidadPDV = $cantidadFraccionPDV = 0;
		$position = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->itemAt($idPosition);
		
		if ($position !== null) {
			//si hay saldo, agrega a carro, sino consulta bodega
			$cantidadCarroUnidad = $position->getQuantityUnit();
			
			$productoPuntoDeVenta = $position->getPDV($puntoVenta);
			
			
			if($productoPuntoDeVenta !== null){
				$cantidadUnidadPDV = $productoPuntoDeVenta['unidades'];
				$cantidadFraccionPDV = $productoPuntoDeVenta['fracciones'];
			}
			
			if($position->getQuantity(true) > 0) {
				$cantidadCarroFraccion = $position->getQuantity(true) * $objProducto->unidadFraccionamiento/$objProducto->numeroFracciones;
			}
		}
		
		$divisionFracciones = $objProducto->numeroFracciones > 0 ?
		$objProducto->unidadFraccionamiento/$objProducto->numeroFracciones:
		0;
		// $canastaVista = "canasta";
		
		//si hay saldo, agrega a carro, sino consulta bodega
		if ($cantidadUnidadPDV + $cantidadFraccionPDV + $cantidadU + $cantidadF*$divisionFracciones <= $maximo) {
			if ($cantidadU >= 0) {
				$objProducto->saldosDisponibles = $maximo;
				$objProductoCarro = new ProductoCarroAsistida($objProducto);
				Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->put($objProductoCarro, false, $cantidadU, $puntoVenta);
			}
			if ($cantidadF >= 0) {
				$objProducto->saldosDisponibles = $maximo;
				$objProductoCarro = new ProductoCarroAsistida($objProducto);
				Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->put($objProductoCarro, true, $cantidadF,$puntoVenta);
			}
			
			$position = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->itemAt($idPosition);
			
		} else {
			$fracciones = $objProducto->unidadFraccionamiento > 0 ?
			intval(abs(intval($maximo)-$maximo)*$objProducto->numeroFracciones/$objProducto->unidadFraccionamiento):
			0;
			echo CJSON::encode(array('result' => 'error', 'response' => array(
					'message' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: ".intval($maximo)." unidades ".
					($fracciones > 0 ? ($fracciones." fracciones. ") : ""),
					'maximoUnidades' => intval($maximo),
					'maximoFracciones' => $fracciones,
					//	'carroHTML' => $this->renderPartial($carroVista, null, true),
			)));
			Yii::app()->end();
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
					'objetosCarro' => Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getCount()
				),
		));
		Yii::app()->end();
	}
	
	public function actionModificar() {
	
		$modificar = Yii::app()->getRequest()->getPost('modificar', null);
		$id = Yii::app()->getRequest()->getPost('position', null);
	
		$modelPago = null;
	
		$objSectorCiudad = $this->objCiudadSectorDestino;
	
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
	
		$position = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->itemAt($id);
		// !Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->contains($id)
	
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
		
		if($cantidadF == null){
			$cantidadF = 0;
		}
	
		$codigoProducto = $position->objProducto->codigoProducto;
	
		$objProducto = Producto::model()->find(array(
				'with' => array(
						'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
						'listPreciosVAP' => array('condition' => '(listPreciosVAP.codigoCiudad=:ciudad) OR (listPreciosVAP.codigoCiudad IS NULL)'),
						'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
				),
				'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPreciosVAP.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
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
	
		$agregarU = false;
		$agregarF = false;
		$divisionFracciones = $objProducto->numeroFracciones > 0 ? 
									$objProducto->unidadFraccionamiento/$objProducto->numeroFracciones:
									0;
		// $canastaVista = "canasta";
	
			//si hay saldo, agrega a carro, sino consulta bodega
			if ($cantidadU + $cantidadF*$divisionFracciones <= $position->objProducto->saldosDisponibles) {
				if ($cantidadU >= 0) {
					$agregarU = true;
				}
				if ($cantidadF >= 0) {
					$agregarF = true;
				}
			} else {
				$fracciones = $objProducto->unidadFraccionamiento > 0 ?
													intval(abs(intval($position->objProducto->saldosDisponibles)-$position->objProducto->saldosDisponibles)*$objProducto->numeroFracciones/$objProducto->unidadFraccionamiento):
													0;
				echo CJSON::encode(array('result' => 'error', 'response' => array(
							'message' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: ".intval($position->objProducto->saldosDisponibles)." unidades ".
										($fracciones > 0 ? ($fracciones." fracciones. ") : ""),
							'maximoUnidades' => intval($position->objProducto->saldosDisponibles),
							'maximoFracciones' => $fracciones,
							//	'carroHTML' => $this->renderPartial($carroVista, null, true),
					)));
					Yii::app()->end();
			}
		
		if ($agregarU) {
			Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->update($position, false, $cantidadU);
		}
	
		if ($agregarF) {
			Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->update($position, true, $cantidadF);
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
	
		$position = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->itemAt($id);
	
		if ($position == null) {
			echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no agregado a carro'));
			Yii::app()->end();
		}
	
		if ($eliminar == 1) {
			Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->update($position, false, 0);
		} else if ($eliminar == 2) {
			Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->update($position, true, 0);
		} else if ($eliminar == 3) {
			Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->updateStored($position, 0);
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
		Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->clear();
		unset(Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']]);

	
		echo CJSON::encode(array(
				'result' => 'ok',
			//	'canasta' => $this->renderPartial("canasta" , null, true),
				'carro' => $this->renderPartial("carro", null, true),
		));
		Yii::app()->end();
	}
	
	public function actionPagar($paso = null, $post = false) {
		//$this->layout = "simple";
		$modelPago = null;
	
		if (is_string($post)) {
			$post = ($post == "true");
		}
	
		if (isset(Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] != null) {
			$modelPago = Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']];
		}
		 
		//	CVarDumper::dump($modelPago,10,true);exit();
	
		if (Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->isEmpty()) {
			if ($post) {
				echo CJSON::encode(array('result' => 'ok', 'response' => 'Carro vac&iacute;o', 'redirect' => $this->createUrl("/puntoventa/ventaasistida/carro")));
			} else {
				$this->redirect($this->createUrl('/puntoventa/venta/ventaasistida/carro'));
			}
			Yii::app()->end();
		}
		
		
		 
		if ($modelPago == null) {
			$modelPago = new FormaPagoVentaAsistidaForm;
			$modelPago->consultarHorario($this->objSectorCiudad);
			$modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];
			Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = $modelPago;
		}
	
		if ($modelPago->tipoEntrega == null) {
			$modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];
		}
		
		//print_r($modelPago);exit();
	 
		Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = $modelPago;
	
		//finalizan validaciones previas e inicializa proceso de pasos de pago
	
		if ($paso === null)
			$paso = Yii::app()->params->entregaNacional['pagar']['pasos'][1];
	
			if (!in_array($paso, Yii::app()->params->entregaNacional['pagar']['pasosDisponibles'])) {
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
					case Yii::app()->params->entregaNacional['pagar']['pasos'][1]:
						$form = new FormaPagoVentaAsistidaForm($paso);
						$form->identificacionUsuario = $modelPago->identificacionUsuario;
						$form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
						$form->totalCompra = $modelPago->totalCompra;
	
						
						if (isset($_POST['FormaPagoVentaAsistidaForm'])) {
							foreach ($_POST['FormaPagoVentaAsistidaForm'] as $atributo => $valor) {
								$form->$atributo = is_string($valor) ? trim($valor) : $valor;
							}
						}
						
						if ($form->validate()) {
							$modelPago->tipoEntrega = $form->tipoEntrega;
							/********************************** SE DEBE CAMBIAR POR ENTREGA A DOMICILIO E INCLUIR SERVICIO DE RECOJIDA ************************************/
								

								$modelPago->nombre = $form->nombre;
								$modelPago->direccion = $form->direccion;
								$modelPago->barrio = $form->barrio;
								$modelPago->telefono = $form->telefono;
								$modelPago->extension = $form->extension;
								$modelPago->celular = $form->celular;
								
								/***************** DATOS USUARIO *******************/
								$modelPago->identificacionUsuario = $form->identificacionUsuario;
								$modelPago->recogida = $form->recogida;
								$modelPago->direccionRemitente = $form->direccionRemitente;
								$modelPago->barrioRemitente = $form->barrioRemitente;
								$modelPago->correoRemitente = $form->correoRemitente;
								$modelPago->nombreRemitente = $form->nombreRemitente;
								$modelPago->telefonoRemitente = $form->telefonoRemitente;
								/****************************************************/
								
								$modelPago->fechaEntrega = $form->fechaEntrega;
								$modelPago->idFormaPago = $form->idFormaPago;
								$modelPago->numeroTarjeta = $form->numeroTarjeta;
								$modelPago->cuotasTarjeta = $form->cuotasTarjeta;
								
								$modelPago->comentario = $form->comentario;
								$modelPago->pasoValidado[$paso] = $paso;
	
							Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = $modelPago;
	
							echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/puntoventa/venta/ventaasistida/carro/pagar", array('paso' => $siguiente))));
							Yii::app()->end();
						} else {
							echo CActiveForm::validate($form);
							Yii::app()->end();
						}
	
						break;
					case Yii::app()->params->entregaNacional['pagar']['pasos'][2]:
	
						if ($siguiente != "finalizar") {
							echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/puntoventa/venta/ventaasistida/carro/pagar", array('paso' => $siguiente))));
							Yii::app()->end();
						}
	
						$form = new FormaPagoVentaAsistidaForm($paso);
						$form->identificacionUsuario = $modelPago->identificacionUsuario;
						$form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
						$form->tipoEntrega = $modelPago->tipoEntrega;
	
						if (isset($_POST['FormaPagoVentaAsistidaForm'])) {
							foreach ($_POST['FormaPagoVentaAsistidaForm'] as $atributo => $valor) {
								$form->$atributo = is_string($valor) ? trim($valor) : $valor;
							}
						}
	
						if ($form->validate()) {
							$modelPago->pasoValidado[$paso] = $paso;
							$modelPago->confirmacion = $form->confirmacion;
							Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = $modelPago;
							echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados", 'redirect' => $this->createUrl("/puntoventa/venta/ventaasistida/carro/comprar")));
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
				$modelPago->validarPasos(Yii::app()->params->entregaNacional['pagar']['pasosDisponibles'], $paso);
	
				$params = array();
				$params['parametros']['paso'] = $paso;
				$params['paso'] = $paso;
	
				$nPasoActual = Yii::app()->params->entregaNacional['pagar']['pasos'][$paso];
				$nPasoAnterior = $nPasoActual - 1;
				$nPasoSiguiente = $nPasoActual + 1;
				$pasoSiguiente = isset(Yii::app()->params->entregaNacional['pagar']['pasos'][$nPasoSiguiente]) ? Yii::app()->params->entregaNacional['pagar']['pasos'][$nPasoSiguiente] : null;
				$pasoAnterior = isset(Yii::app()->params->entregaNacional['pagar']['pasos'][$nPasoAnterior]) ? Yii::app()->params->entregaNacional['pagar']['pasos'][$nPasoAnterior] : null;
	
				$params['parametros']['pasoAnterior'] = $pasoAnterior;
				$params['parametros']['pasoSiguiente'] = $pasoSiguiente;
				$params['parametros']['nPasoActual'] = $nPasoActual;
	
				switch ($paso) {
					case Yii::app()->params->entregaNacional['pagar']['pasos'][1]:
						$params['parametros']['listHorarios'] = $modelPago->listDataHoras();
	
						$listFormaPago = FormaPago::getFormasPago(4);
						Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = $modelPago;
						$params['parametros']['listFormaPago'] = $listFormaPago;
	
						break;
					case Yii::app()->params->entregaNacional['pagar']['pasos'][2]:
						$objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
						$params['parametros']['objFormaPago'] = $objFormaPago;
	
	
						//verificar productos en pdv
						if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
							$modelPago->seleccionarPdv($modelPago->indicePuntoVenta);
						}
						$modelPago->calcularConfirmacion(Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getPositions());
						//$modelPago->calcularFormulas(Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getPositions());
						break;
				}
				$params['parametros']['modelPago'] = $modelPago;
				$this->render("pagar", $params);
			}
	}
	
	public function actionComprar() {
		$modelPago = null;
	
		if (isset(Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] != null)
			$modelPago = Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']];
	
			if ($modelPago === null) {
				Yii::app()->user->setFlash('error', "Error: Por favor verificar los datos de tu compra.");
				$this->redirect($this->createUrl('/puntoventa/venta/ventaasistida/carro'));
				Yii::app()->end();
			}
	
			$modelPago->totalCompra = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getTotalCost();
	
			if (!in_array($modelPago->tipoEntrega, Yii::app()->params->entrega['listaTipos'])) {
				Yii::app()->user->setFlash('error', "Tipo de entrega inválido, por favor seleccionar tipo de entrega.");
				$this->redirect($this->createUrl('/puntoventa/venta/ventaasistida/carro'));
			}
	
			//validaciones de compra
			$pasoValidacion = null;
			//se valida que cada paso este realizado
			$modelPago->validarConfirmacion(Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getPositions());
			$pasosDisponibles = Yii::app()->params->entregaNacional['pagar']['pasosDisponibles'];
			Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = $modelPago;
	
			foreach ($pasosDisponibles as $idx => $paso) {
				$modelPago->setScenario($paso);
				$form = new FormaPagoVentaAsistidaForm($paso);
				foreach ($modelPago->attributes as $atributo => $valor) {
					$form->$atributo = $valor;
				}
	
				if (!$form->validate()) {
					$pasoValidacion = $paso;
					break;
				}
			}
	
			if ($pasoValidacion != null) {
				Yii::app()->user->setFlash('error', "Error: Por favor verificar los datos de tu compra. " . CActiveForm::validate($modelPago));
				$paramsValidacion = array();
				$paramsValidacion['paso'] = $pasoValidacion;
				$this->redirect($this->createUrl('/puntoventa/venta/ventaasistida/carro/pagar', $paramsValidacion));
				Yii::app()->end();
			}
	
			//si ha llegado aqui, paso todas las validaciones y se puede proceder con proceso de compra
			if ($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
				Yii::app()->user->setFlash('error', "Error: Pago en l&iacute;nea no habilitado.");
				$this->redirect($this->createUrl('/puntoventa/venta/ventaasistida/carro'));
			}
	
			$resultCompra = $this->procesoCompra($modelPago, $modelPago->tipoEntrega);
	
			if ($resultCompra['result'] == 1) {
				$contenidoSitio = $this->renderPartial("compraContenido", array(
						'objCompra' => $resultCompra['response']['objCompra'],
						'modelPago' => $resultCompra['response']['modelPago'],
						'objCompraDireccion' => $resultCompra['response']['objCompraDireccion'],
						'objFormaPago' => $resultCompra['response']['objFormaPago'],
						'objFormasPago' => $resultCompra['response']['objFormasPago']), true);
	
				Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = null;
				Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->clear();
				unset(Yii::app()->session[Yii::app()->params->puntoventa['sesion']['tipoEntrega']]);
				$this->render('application.views.carro.compra', array(
						'contenido' => $contenidoSitio,
						'objCompra' => $resultCompra['response']['objCompra'],
				));
				
				Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdvDestino']] = null;
				Yii::app()->end();
			} else {
				Yii::app()->user->setFlash('error', "Error al realizar compra, por favor intente de nuevo. " . $resultCompra['response']);
				$this->redirect($this->createUrl('/puntoventa/venta/ventaasistida/carro/pagar'));
				Yii::app()->end();
			}
	}
	
	private function procesoCompra(FormaPagoVentaAsistidaForm $modelPago, $tipoEntrega) {
		$transaction = Yii::app()->db->beginTransaction();
		try {
			
			//registrar compra compra
			$objCompra = new Compras;
			$objCompra->identificacionUsuario = $modelPago->identificacionUsuario;
			$objCompra->tipoEntrega = $tipoEntrega;
			$objCompra->fechaEntrega = $modelPago->fechaEntrega;
			$objCompra->observacion = $modelPago->comentario;
	
			/********************************* IDENTIFICAR EL PUNTO DE VENTA EN LA SESIoN *******************/
			
			$objCompra->idComercial = $this->objPuntoVentaDestino->idComercial;
			
			if($modelPago->recogida == 1){
				$objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['pendiente'];
				
			}else{
				// guardar la compra como remitida POS y llamar el webservice de remision.
				$objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['remitido'];
				// remitir
				
				
			}
			/****************************** CONFIGURAR ESTE TIPO DE ENTREGA *********************************/
			$objCompra->idTipoVenta = Yii::app()->params->tipoVenta['nacional'];
			/************************************************************************************************/
			
			$objCompra->activa = 1;
			$objCompra->invitado = 1;
			$objCompra->codigoPerfil = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getCodigoPerfil();
			$objCompra->codigoCiudad = $this->objCiudadSectorDestino->codigoCiudad;
			$objCompra->codigoSector = $this->objCiudadSectorDestino->codigoSector;
	
			//no se maneja venta bodega
			$objCompra->tiempoDomicilioCedi = 0;
			$objCompra->valorDomicilioCedi = 0;
			$objCompra->codigoCedi = 0;
	
			$objCompra->subtotalCompra = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getCostToken();
			$objCompra->impuestosCompra = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getTaxPrice();
			$objCompra->baseImpuestosCompra = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getBaseTaxPrice();
			$objCompra->domicilio = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getShipping();
			$objCompra->flete = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getExtraShipping();
			$objCompra->totalCompra = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getTotalCost();
			$objCompra->codigoVendedor = Yii::app()->controller->module->user->codigoVendedor;
			if (!$objCompra->save()) {
				throw new Exception("Error al guardar compra [0]" . $objCompra->validateErrorsResponse());
			}
	
			
			// COMENTARIOS EN ESTADO RECOGIDA
				$objEstadoCompra = new ComprasEstados;
				$objEstadoCompra->idCompra = $objCompra->idCompra;
				$objEstadoCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['asignado'];
				$objEstadoCompra->idOperador = 38;
				if (!$objEstadoCompra->save()) {
					throw new Exception("Error al guardar traza de estado: " . $objEstadoCompra->validateErrorsResponse());
				}
	
				$objObservacion = new ComprasObservaciones;
				$objObservacion->idCompra = $objCompra->idCompra;
				$objObservacion->observacion = "Cambio de Estado: Asignado PDV. " . $objCompra->idComercial;
				$objObservacion->idOperador = 38;
				$objObservacion->notificarCliente = 0;
	
				if (!$objObservacion->save()) {
					throw new Exception("Error al guardar observación" . $objObservacion->validateErrorsResponse());
				}
	
				$objEstadoCompra2 = new ComprasEstados;
				$objEstadoCompra2->idCompra = $objCompra->idCompra;
				$objEstadoCompra2->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['pendiente'];
				$objEstadoCompra2->idOperador = 38;
				if (!$objEstadoCompra2->save()) {
					throw new Exception("Error al guardar traza de estado: " . $objEstadoCompra2->validateErrorsResponse());
				}
	
				$objObservacion2 = new ComprasObservaciones;
				$objObservacion2->idCompra = $objCompra->idCompra;
				$objObservacion2->observacion = "Cambio de Estado: Pendiente de entrega a cliente en PDV. " . $objCompra->idComercial;
				$objObservacion2->idOperador = 38;
				$objObservacion2->notificarCliente = 0;
	
				if (!$objObservacion2->save()) {
					throw new Exception("Error al guardar observación" . $objObservacion2->validateErrorsResponse());
				}
			
	
			/* ***************************************************************************************************** */
			/* ************************************** GUARDAN LAS FORMAS DE PAGO *********************************** */
			/* ***************************************************************************************************** */
	
			$objFormasPago = new FormasPago; //FormaPago::model()->findByPk($modelPago->idFormaPago);
			$objFormasPago->idCompra = $objCompra->idCompra;
			$objFormasPago->valor = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getTotalCost();
			$objFormasPago->numeroTarjeta = $modelPago->numeroTarjeta;
			$objFormasPago->cuotasTarjeta = $modelPago->cuotasTarjeta;
			$objFormasPago->idFormaPago = $modelPago->idFormaPago;
	
			if (!$objFormasPago->save()) {
				throw new Exception("Error al guardar forma de pago" . $objFormasPago->validateErrorsResponse());
			}
	
			$objCompraDireccion = new ComprasDireccionesDespacho;
			$objCompraDireccion->idCompra = $objCompra->idCompra;
			$objCompraDireccion->descripcion = $modelPago->nombre; /****** VALIDAR *********/
	
		//	if ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
				$objCompraDireccion->nombre = $modelPago->nombre;
				$objCompraDireccion->direccion = $modelPago->direccion;
				$objCompraDireccion->barrio = $modelPago->barrio;
				$objCompraDireccion->telefono = $modelPago->telefono;
				
				$objCompraDireccion->celular = $modelPago->celular;
				$objCompraDireccion->codigoCiudad = $this->objCiudadSectorDestino->codigoCiudad;
				$objCompraDireccion->codigoSector = $this->objCiudadSectorDestino->codigoSector;
		//		$objCompraDireccion->correoElectronico = $modelPago->correoElectronico;
		/*	} else if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
				$objCompraDireccion->nombre = "NA";
				$objCompraDireccion->direccion = "NA";
				$objCompraDireccion->barrio = "NA";
				$objCompraDireccion->telefono = $modelPago->telefonoContacto;
				$objCompraDireccion->correoElectronico = $modelPago->correoElectronicoContacto;
			}*/
	
			if (!$objCompraDireccion->save()) {
				throw new Exception("Error al guardar dirección de compra" . $objCompraDireccion->validateErrorsResponse());
			}
	
			/************************************************************************************************/
			/******************************** GUARDAR LOS DATOS DEL REMITENTE *******************************/
			/************************************************************************************************/
			$objCompraRemitente = new ComprasRemitente();
			$objCompraRemitente->idCompra = $objCompra->idCompra;
			$objCompraRemitente->cedulaRemitente =  $modelPago->identificacionUsuario;
			$objCompraRemitente->nombreRemitente =  $modelPago->nombreRemitente;
			$objCompraRemitente->telefonoRemitente =  $modelPago->telefonoRemitente;
			$objCompraRemitente->correoRemitente =  $modelPago->correoRemitente;
			
			
			$objCompraRemitente->direccionRemitente =  $modelPago->direccionRemitente;
			$objCompraRemitente->barrioRemitente =  $modelPago->barrioRemitente;
			$objCompraRemitente->recogida =  $modelPago->recogida;
			
			
			$objCompraRemitente->puntoVentaDestino = $this->objPuntoVentaDestino->idComercial;
			$objCompraRemitente->servicioRed = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getShippingServicio();
			$objCompraRemitente->servicioRecogida = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getShippingRecogida();
			
			if (!$objCompraRemitente->save()) {
				throw new Exception("Error al guardar dirección de compra" . $objCompraRemitente->validateErrorsResponse());
			}
			
			// Guardar datos del Cliente 
			
			$objCliente = Cliente::model()->find(array(
					'condition' => 'numeroDocumento =:documento',
					'params' => array(
							':documento' => $modelPago->identificacionUsuario
					)
			));
			
			if($objCliente == null){
				$objCliente = new Cliente();
				$objCliente->numeroDocumento = $modelPago->identificacionUsuario;
			}
				
			$objCliente->nombre = $modelPago->nombreRemitente;
			$objCliente->telefono = $modelPago->telefonoRemitente;
			$objCliente->email = $modelPago->correoRemitente;
			
			if(!$objCliente->save()){
				throw new Exception("Error al guardar el cliente" . $objCliente->validateErrorsResponse());
			}
			
			$objBeneficiario = new Beneficiario();
			$objBeneficiario->celular = $modelPago->celular;
			$objBeneficiario->direccion = $modelPago->direccion;
			$objBeneficiario->extension = $modelPago->extension;
			$objBeneficiario->nombre = $modelPago->nombre;
			$objBeneficiario->barrio = $modelPago->barrio;
			$objBeneficiario->numeroDocumento = $modelPago->identificacionUsuario;
			$objBeneficiario->telefono = $modelPago->telefono;
			
			if(!$objBeneficiario->save()){
				throw new Exception("Error al guardar dirección de compra" . $objBeneficiario->validateErrorsResponse());
			}
			
			//items de compra
			$positions = Yii::app()->getModule('puntoventa')->shoppingCartNationalSale->getPositions();
			foreach ($positions as $position) {
				//actualizar saldo producto //--
				$objSaldo = null;
				if ($position->getObjProducto()->tercero != 1) {
					$objSaldo = ProductosSaldos::model()->find(array(
							'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto',
							'params' => array(
									':ciudad' => $this->objCiudadSectorDestino->codigoCiudad,
									':sector' => $this->objCiudadSectorDestino->codigoSector,
									':producto' => $position->getObjProducto()->codigoProducto
							)
					));
				}
	
				if ($objSaldo == null) {
				//	throw new Exception("Producto " . $position->getObjProducto()->codigoProducto . " no disponible");
				}
	
				/*if ($objSaldo->saldoUnidad < $position->getQuantityUnit()) {
					throw new Exception("Producto " . $position->getObjProducto()->codigoProducto . ". La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades");
				}
	
				if ($objSaldo->saldoFraccion < $position->getQuantity(true)) {
					throw new Exception("Producto " . $position->getObjProducto()->codigoProducto . ". La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoFraccion fracciones");
				}*/
	
				if($objSaldo != null){
					$objSaldo->saldoUnidad = $objSaldo->saldoUnidad - $position->getQuantityUnit();
					$objSaldo->saldoFraccion = $objSaldo->saldoFraccion - $position->getQuantity(true);
					$objSaldo->save();
				}
				//-- actualizar saldo producto
	
				$objItem = new ComprasItems;
				$objItem->idCompra = $objCompra->idCompra;
				$objItem->codigoProducto = $position->getObjProducto()->codigoProducto;
				$objItem->descripcion = $position->getObjProducto()->descripcionProducto;
				$objItem->presentacion = $position->getObjProducto()->presentacionProducto;
				$objItem->precioBaseUnidad = $position->getPrice(false, false);
				$objItem->precioBaseFraccion = $position->getPrice(true, false);
				
				$objItem->descuentoUnidad = $position->getDiscountPriceToken();
				$objItem->descuentoFraccion = $position->getDiscountPriceToken(true);
				$objItem->precioTotalUnidad = $position->getSumPriceUnitToken();
				$objItem->precioTotalFraccion = $position->getSumPriceFractionToken(true);
				
				$objItem->terceros = $position->getObjProducto()->tercero;
				$objItem->unidades = $position->getQuantityUnit();
				$objItem->fracciones = $position->getQuantity(true);
				$objItem->unidadesCedi = $position->getQuantityStored();
				$objItem->codigoImpuesto = $position->getObjProducto()->codigoImpuesto;
				$objItem->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['activo'];
				//$objItem->idEstadoItemTercero = null;
				$objItem->flete = $position->getShipping();
				$objItem->disponible = 1;
				
				if (!$objItem->save()) {
					throw new Exception("Error al guardar item de compra $objItem->codigoProducto. " . $objItem->validateErrorsResponse());
				}
	
				// guardar los productos por punto de venta
				
				$productosPDV = $position->getPDVs();
				
				if($productosPDV != null){
					foreach($productosPDV as $key => $productoPDV){
						$modelPunto = new ComprasPuntoVentaAsistida();
						$modelPunto->idCompra = $objCompra->idCompra;
						$modelPunto->codigoProducto = $objItem->codigoProducto;
						$modelPunto->idComercial = $key;
						$modelPunto->cantidadUnidad = $productoPDV['unidades'];
						$modelPunto->cantidadFraccion = $productoPDV['fracciones'];
						$modelPunto->subTotalUnidades = $modelPunto->cantidadUnidad * $objItem->precioTotalUnidad;
						$modelPunto->subTotalFracciones = $modelPunto->cantidadUnidad * $objItem->precioTotalFraccion;
						$modelPunto->idComercialDestino = $objCompraRemitente->puntoVentaDestino;
						if(!$modelPunto->save()){
							throw new Exception("Error al guardar item de punto de venta de compra $objItem->codigoProducto. " . $objItem->validateErrorsResponse());
						}
					}
				}
				//beneficios
				foreach ($position->getBeneficios() as $objBeneficio) {
					$objBeneficioItem = new BeneficiosComprasItems;
					$objBeneficioItem->idBeneficio = $objBeneficio->idBeneficio;
					$objBeneficioItem->idBeneficioSincronizado = $objBeneficio->idBeneficioSincronizado;
					$objBeneficioItem->idCompraItem = $objItem->idCompraItem;
					$objBeneficioItem->tipo = $objBeneficio->tipo;
					$objBeneficioItem->fechaIni = $objBeneficio->fechaIni;
					$objBeneficioItem->fechaFin = $objBeneficio->fechaFin;
					$objBeneficioItem->dsctoUnid = $objBeneficio->dsctoUnid;
					$objBeneficioItem->dsctoFrac = $objBeneficio->dsctoFrac;
					$objBeneficioItem->vtaUnid = $objBeneficio->vtaUnid;
					$objBeneficioItem->vtaFrac = $objBeneficio->vtaFrac;
					$objBeneficioItem->pagoUnid = $objBeneficio->pagoUnid;
					$objBeneficioItem->pagoFrac = $objBeneficio->pagoFrac;
					$objBeneficioItem->cuentaCop = $objBeneficio->cuentaCop;
					$objBeneficioItem->nitCop = $objBeneficio->nitCop;
					$objBeneficioItem->porcCop = $objBeneficio->porcCop;
					$objBeneficioItem->cuentaProv = $objBeneficio->cuentaProv;
					$objBeneficioItem->nitProv = $objBeneficio->nitProv;
					$objBeneficioItem->porcProv = $objBeneficio->porcProv;
					$objBeneficioItem->promoFiel = $objBeneficio->promoFiel;
					$objBeneficioItem->mensaje = $objBeneficio->mensaje;
					$objBeneficioItem->swobligaCli = $objBeneficio->swobligaCli;
					$objBeneficioItem->fechaCreacionBeneficio = $objBeneficio->fechaCreacionBeneficio;
	
					if (!$objBeneficioItem->save()) {
						throw new Exception("Error al guardar beneficio de compra $objBeneficioItem->idCompraItem. " . $objBeneficioItem->validateErrorsResponse());
					}
				}
				
				foreach ($position->getBeneficiosBonos() as $objBeneficio) {
						
					if(in_array($objBeneficio->tipo, Yii::app()->params->beneficios['bonos']) ){
						$objBeneficioItem = new BeneficiosComprasItems;
						$objBeneficioItem->idBeneficio = $objBeneficio->idBeneficio;
						$objBeneficioItem->idBeneficioSincronizado = $objBeneficio->idBeneficioSincronizado;
						$objBeneficioItem->idCompraItem = $objItem->idCompraItem;
						$objBeneficioItem->tipo = $objBeneficio->tipo;
						$objBeneficioItem->fechaIni = $objBeneficio->fechaIni;
						$objBeneficioItem->fechaFin = $objBeneficio->fechaFin;
						$objBeneficioItem->dsctoUnid = $objBeneficio->dsctoUnid;
						$objBeneficioItem->dsctoFrac = $objBeneficio->dsctoFrac;
						$objBeneficioItem->vtaUnid = $objBeneficio->vtaUnid;
						$objBeneficioItem->vtaFrac = $objBeneficio->vtaFrac;
						$objBeneficioItem->pagoUnid = $objBeneficio->pagoUnid;
						$objBeneficioItem->pagoFrac = $objBeneficio->pagoFrac;
						$objBeneficioItem->cuentaCop = $objBeneficio->cuentaCop;
						$objBeneficioItem->nitCop = $objBeneficio->nitCop;
						$objBeneficioItem->porcCop = $objBeneficio->porcCop;
						$objBeneficioItem->cuentaProv = $objBeneficio->cuentaProv;
						$objBeneficioItem->nitProv = $objBeneficio->nitProv;
						$objBeneficioItem->porcProv = $objBeneficio->porcProv;
						$objBeneficioItem->promoFiel = $objBeneficio->promoFiel;
						$objBeneficioItem->mensaje = $objBeneficio->mensaje;
						$objBeneficioItem->swobligaCli = $objBeneficio->swobligaCli;
						$objBeneficioItem->fechaCreacionBeneficio = $objBeneficio->fechaCreacionBeneficio;
							
						if (!$objBeneficioItem->save()) {
							throw new Exception("Error al guardar beneficio de compra $objBeneficioItem->idCompraItem. " . $objBeneficioItem->validateErrorsResponse());
						}
							
						// Guardar la forma de pago
						$objBonoTienda = BonoTienda::model()->find(array(
								'condition' => 'idBonoTiendaTipo =:tipoBono',
								'params' => array(
										':tipoBono' => Yii::app()->params->beneficios['tipoBonoFormaPago'][$objBeneficio->tipo],
								)
						));
				
						$objFormaPagoBono = new FormasPago;
						$objFormaPagoBono->valorBonoUnidad = floor(Precio::redondear($objBeneficio->dsctoUnid/100*$position->getPriceToken(), 1));
						$objFormaPagoBono->valor = $objFormaPagoBono->valorBonoUnidad * $position->getQuantityUnit(); // valor total del bono.
						$objFormaPagoBono->idCompra = $objCompra->idCompra;
						$objFormaPagoBono->idFormaPago = Yii::app()->params->beneficios['tipoMedioPago'][$objBeneficio->tipo]; /*******************/
						$objFormaPagoBono->cuenta = $objBeneficio->cuentaProv;
						$objFormaPagoBono->formaPago = $objBonoTienda->formaPago;
						$objFormaPagoBono->idBonoTiendaTipo =  Yii::app()->params->beneficios['tipoBonoFormaPago'][$objBeneficio->tipo];
							
						$objFormaPagoBono->codigoProducto = $position->objProducto->codigoProducto;
							
						if(!$objFormaPagoBono->save()){
							echo "<pre>";
							print_r($objFormaPagoBono->getErrors());
							exit();
							Yii::log("FormaPago-Bono: Exception [idCompra: $objCompra->idCompra -- idbono: $idx -- idUsuario: $objCompra->identificacionUsuario]\n", CLogger::LEVEL_INFO, 'error');
						}
							
					}
				}
			}
	
			$nombreUsuario = "INVITADO";
			$correoUsuario = "NA";
	
			$nombreUsuario = $modelPago->nombre;
			$correoUsuario = $modelPago->correoRemitente;
			
	
			$objPasarelaEnvio = null;
			$asuntoCorreo = Yii::app()->params->asunto['pedidoRealizado'];
	
			$objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
			$contenidoCorreo = $this->renderPartial(Yii::app()->params->rutasPlantillasCorreo['compraCorreo'], array(
					'objCompra' => $objCompra,
					'modelPago' => $modelPago,
					'objCompraDireccion' => $objCompraDireccion,
					'objFormaPago' => $objFormaPago,
					'objFormasPago' => $objFormasPago,
					'nombreUsuario' => $nombreUsuario), true, true);
			
			$htmlCorreo = PlantillaCorreo::getContenido('finCompra',$contenidoCorreo);
			
			try {
				sendHtmlEmail($correoUsuario, $asuntoCorreo, $htmlCorreo);
			} catch (Exception $ce) {
				Yii::log("Error enviando correo al registrar compra #$objCompra->idCompra\n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
			}
	
			$transaction->commit();
	
			ini_set('default_socket_timeout', 5);
			$client = new SoapClient(null, array(
					'location' => Yii::app()->params->webServiceUrl['remisionPosECommerce'],
					'uri' => "",
					'trace' => 1,
					'connection_timeout' => 5,
			));
	
			try {
				/***************************** VALIDAR CON JAVELA ESTE PEDAZO DE CODIGO ****************************************************/
						 
					$objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['pendiente'];
					if (!$objCompra->save()) {
						throw new Exception("Error al guardar compra [1]" . $objCompra->validateErrorsResponse());
					}
				
				/***********************************************VER SI SE MANEJA LA MISMA PLANTILLA********************************************************/
				
			}catch (Exception $exc) {
				Yii::log("Exception WebService CongelarCompraAutomatica [compra: $objCompra->idCompra]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
			}
	
			return array(
					'result' => 1,
					'response' => array(
							'objCompra' => $objCompra,
							'modelPago' => $modelPago,
							'objCompraDireccion' => $objCompraDireccion,
							'objFormaPago' => $objFormaPago,
							'objFormasPago' => $objFormasPago,
							'objPasarelaEnvio' => $objPasarelaEnvio,
					)
			);
		} catch (Exception $exc) {
			Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
	
			try {
				$transaction->rollBack();
			} catch (Exception $txexc) {
				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
			}
	
			return array(
					'result' => 0,
					'response' => $exc->getMessage()
			);
		}
	}
	
	
	
}
