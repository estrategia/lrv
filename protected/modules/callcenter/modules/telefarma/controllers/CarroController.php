<?php
class CarroController extends ControllerTelefarma {

	public $defaultAction = "index";
	
	public function filters() {
		return array(
				//'access',
				'login + index, comprar, pagar',
				//'loginajax + direccionActualizar',
		);
	}
	
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
        $objSectorCiudad = null;

        if (isset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['sectorCiudadEntrega']]) && Yii::app()->session[Yii::app()->params->telefarma['sesion']['sectorCiudadEntrega']] != null) {
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->telefarma['sesion']['sectorCiudadEntrega']];
        }

        if (empty($objSectorCiudad) || !($objSectorCiudad instanceof SectorCiudad)) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
            Yii::app()->end();
        }

        $tipo = Yii::app()->getRequest()->getPost('tipo', null);

        $this->agregarProducto($objSectorCiudad);
      
        echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, tipo incorrecto'));
        Yii::app()->end();
    }

    public function agregarVitalCall(FormaPagoVitalCallForm $modelPago) {
        $formula = Yii::app()->getRequest()->getPost('formula', null);
        $producto = Yii::app()->getRequest()->getPost('producto', null);
        $cantidadU = Yii::app()->getRequest()->getPost('cantidadU', null);
        $cantidadF = Yii::app()->getRequest()->getPost('cantidadF', null);

        if ($formula === null || $producto === null || $cantidadU === null || $cantidadF === null) {
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
                ':formula' => $formula,
                ':producto' => $producto
            )
        ));

        if ($objProductoFormula === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'ProductoFormula no existente'));
            Yii::app()->end();
        }

        if (!$objProductoFormula->objProductoVC->esVigente()) {
            echo CJSON::encode(array('result' => 'error', 'response' => "Producto no vigente [telefarma: $objProductoFormula->idProductoVitalCall, producto: " . $objProductoFormula->objProductoVC->codigoProducto . "]"));
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
        $idPositionCart = Yii::app()->shoppingCartVitalCall->getIdFromCode($objProducto->codigoProducto);
        
        if($idPositionCart!==null && $idPositionCart!=$idPosition){
        	echo CJSON::encode(array('result' => 'error', 'response' => 'Producto agregado sin f&oacute;rmula o en otra f&oacute;rmula'));
        	Yii::app()->end();
        }

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

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial("canasta", null, true),
                'mensajeHTML' => $this->renderPartial('_carroAgregado', array('objProducto' => $objProducto), true),
                'objetosCarro' => Yii::app()->shoppingCartVitalCall->getCount()
            ),
        ));
        Yii::app()->end();
    }

    public function agregarProducto(SectorCiudad $objSectorCiudad) {
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
            		'listSaldosCedi' => array('on' => '(codigoCedi =:codigoCedi)'),
                'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR (listSaldosCedi.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
            'params' => array(
                ':activo' => 1,
                ':codigo' => $producto,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            	':codigoCedi' => $this->objSectorCiudad->objCiudad->codigoSucursal,
            ),
        ));

        if ($objProducto === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        $objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

//         if ($objSaldo === null) {
//             echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
//             Yii::app()->end();
//         }

        $idPosition = $producto;
      /*  $idPositionCart = Yii::app()->shoppingCartVitalCall->getIdFromCode($objProducto->codigoProducto);
        
        if($idPositionCart!==null && $idPositionCart!=$idPosition){
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto agregado sin f&oacute;rmula o en otra f&oacute;rmula'));
            Yii::app()->end();
        }*/

        if ($cantidadU > 0) {
            $cantidadCarroUnidad = 0;
            $position = Yii::app()->shoppingCartVitalCall->itemAt($idPosition);

            if ($position !== null) {
                $cantidadCarroUnidad = $position->getQuantityUnit();
            }

            //si hay saldo, agrega a carro, sino consulta bodega
            if (($objSaldo != null) && $cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
                $objProductoCarro = new ProductoCarro($objProducto);
                Yii::app()->shoppingCartVitalCall->put($objProductoCarro, false, $cantidadU);
            } else {
            	
            	$objPagoForm = new FormaPagoForm;
            	if (!$objPagoForm->tieneDomicilio($objSectorCiudad)) {
	            	echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
	                Yii::app()->end();
            	}
            	
            	$saldoUnidad = 0 ;
            	if(isset( $objSaldo->saldoUnidad)){
            		$saldoUnidad =  $objSaldo->saldoUnidad;
            	}
                
                $cantidadBodega = $cantidadCarroUnidad + $cantidadU - $saldoUnidad;
                $cantidadUbicacion = $cantidadU - $cantidadBodega;
                
                //si hay en bodegas, mensaje para ver detalle bodega, sino, mensaje error
                $objSaldoBodega = ProductosSaldosCedi::model()->find(array(
                		'condition' => 'codigoProducto=:producto AND codigoCedi=:cedi AND saldoUnidad>=:saldo',
                		'params' => array(
                				':producto' => $producto,
                				':cedi' => $objSectorCiudad->objCiudad->codigoSucursal,
                				':saldo' => $cantidadBodega
                		)
                ));
                
                if ($objSaldoBodega === null) {
                	echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $saldoUnidad unidades"));
                	Yii::app()->end();
                }
                
              	$htmlBodega = $this->renderPartial('_carroBodega', array(
                			'saldoUnidad' => $saldoUnidad,
                			'objProducto' => $objProducto,
                			'cantidadUbicacion' => $cantidadUbicacion,
                			'cantidadBodega' => $cantidadBodega), true);
              	
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
            Yii::app()->shoppingCartVitalCall->put($objProductoCarro, true, $cantidadF);
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
                'objetosCarro' => Yii::app()->shoppingCartVitalCall->getCount()
            ),
        ));
        Yii::app()->end();
    }
    
    
    public function actionAgregarBodega() {
    	$producto = Yii::app()->getRequest()->getPost('producto', null);
    	$cantidadUbicacion = Yii::app()->getRequest()->getPost('cantidadU', null);
    	$cantidadBodega = Yii::app()->getRequest()->getPost('cantidadB', null);
    
    	if ($producto === null || $cantidadUbicacion === null || $cantidadBodega === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
    		Yii::app()->end();
    	}
    
    	if ($cantidadBodega < 1 && $cantidadUbicacion < 1) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no válida'));
    		Yii::app()->end();
    	}
    
    	$objSectorCiudad = $this->objSectorCiudad;
    
    	if ($objSectorCiudad == null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
    		Yii::app()->end();
    	}
    
    	$objPagoForm = new FormaPagoForm;
    	if (!$objPagoForm->tieneDomicilio($objSectorCiudad)) {
    		echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento."));
    		Yii::app()->end();
    	}
    
    	$cantidadCarroUnidad = 0;
    	$cantidadCarroBodega = 0;
    	$position = Yii::app()->shoppingCartVitalCall->itemAt($producto);
    
    	if ($position !== null) {
    		$cantidadCarroUnidad = $position->getQuantityUnit();
    		$cantidadCarroBodega = $position->getQuantityStored();
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
    					':ciudad' => $objSectorCiudad->codigoCiudad,
    					':sector' => $objSectorCiudad->codigoSector,
    			),
    	));
    
    	if ($objProducto === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
    		Yii::app()->end();
    	}
    
    	if ($cantidadUbicacion > 0) {
    		$objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);
    
    		if ($objSaldo === null) {
    			echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
    			Yii::app()->end();
    		}
    
    		if ($cantidadCarroUnidad + $cantidadUbicacion > $objSaldo->saldoUnidad) {
    			echo CJSON::encode(array(
    					'result' => 'error',
    					'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
    			Yii::app()->end();
    		}
    	}
    
    	if ($cantidadBodega > 0) {
    		$objSaldoBodega = ProductosSaldosCedi::model()->find(array(
    				'condition' => 'codigoProducto=:producto AND codigoCedi=:cedi AND saldoUnidad>=:saldo',
    				'params' => array(
    						':producto' => $producto,
    						':cedi' => $objSectorCiudad->objCiudad->codigoSucursal,
    						':saldo' => $cantidadBodega + $cantidadCarroBodega
    				)
    		));
    
    		if ($objSaldoBodega === null) {
    			echo CJSON::encode(array(
    					'result' => 'error',
    					'response' => "La cantidad solicitada no está disponible en este momento. No hay unidades disponibles",
    					//'response' => 'Cantidad no disponible para entrega ' . Yii::app()->shoppingCartVitalCall->getDeliveryStored() . ' hrs'
    			));
    			Yii::app()->end();
    		}
    	}
    
    	$objProductoCarro = new ProductoCarro($objProducto);
    	if ($cantidadUbicacion > 0) {
    		Yii::app()->shoppingCartVitalCall->put($objProductoCarro, false, $cantidadUbicacion);
    	}
    
    	if ($cantidadBodega > 0) {
    		Yii::app()->shoppingCartVitalCall->putStored($objProductoCarro, $cantidadBodega);
    	}
    
    	$mensajeCanasta = "";
    	$mensajeCanasta = $this->renderPartial('_carroAgregado', array('objProducto' => $objProducto), true);
    	
    
    	$canastaVista = "canasta";
    	
    	echo CJSON::encode(array(
    			'result' => 'ok',
    			'response' => array(
    					'canastaHTML' => $this->renderPartial($canastaVista, null, true),
    					'mensajeHTML' => $mensajeCanasta,
    					'objetosCarro' => Yii::app()->shoppingCartVitalCall->getCount()
    			),
    	));
    	Yii::app()->end();
    }

    public function actionVaciar() {
        Yii::app()->shoppingCartVitalCall->clear();
        unset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']]);
        //unset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['formulaMedica']]);

         echo CJSON::encode(array(
         		'result' => 'ok',
         		'canasta' => $this->renderPartial("canasta" , null, true),
         		'carro' => $this->renderPartial("carro", null, true),
          ));
        Yii::app()->end();
    }
	
    public function actionPasoporel() {
        $opcion = Yii::app()->getRequest()->getPost('opcion');

        if ($opcion == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inv&aacute;lida'));
            Yii::app()->end();
        }

        $modelPago = null;
        if (isset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']];
        }

        if ($modelPago == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
            Yii::app()->end();
        }

        if ($opcion == "modal") {
            $modelPago->consultarDisponibilidad(Yii::app()->shoppingCartVitalCall);
            Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = $modelPago;

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
            Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = $modelPago;

            echo CJSON::encode(array('result' => 'ok', 'response' => 'Punto de venta seleccionado'));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud env&aacute;lida'));
            Yii::app()->end();
        }
    }
    
    public function actionComprar() {
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']];

        if ($modelPago === null) {
            Yii::app()->user->setFlash('error', "Error: Por favor verificar los datos de tu compra.");
            $this->redirect($this->createUrl('/callcenter/telefarma/carro'));
            Yii::app()->end();
        }

        $modelPago->totalCompra = Yii::app()->shoppingCartVitalCall->getTotalCost();

        if (!in_array($modelPago->tipoEntrega, Yii::app()->params->entrega['listaTipos'])) {
            Yii::app()->user->setFlash('error', "Tipo de entrega inválido, por favor seleccionar tipo de entrega.");
            $this->redirect($this->createUrl('/callcenter/telefarma/carro'));
        }

        //validaciones de compra
        $pasoValidacion = null;
        //se valida que cada paso este realizado
        $modelPago->validarConfirmacion(Yii::app()->shoppingCartVitalCall->getPositions());
        $pasosDisponibles = Yii::app()->params->telefarma['pagar']['pasosDisponibles'];
        Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = $modelPago;

        foreach ($pasosDisponibles as $idx => $paso) {
            $modelPago->setScenario($paso);
            $form = new FormaPagoTelefarmaForm($paso);
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
            $this->redirect($this->createUrl('/callcenter/telefarma/carro/pagar', $paramsValidacion));
            Yii::app()->end();
        }

        //si ha llegado aqui, paso todas las validaciones y se puede proceder con proceso de compra
        if ($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
            Yii::app()->user->setFlash('error', "Error: Pago en l&iacute;nea no habilitado.");
            $this->redirect($this->createUrl('/callcenter/telefarma/carro'));
        }

        $resultCompra = $this->procesoCompra($modelPago, $modelPago->tipoEntrega);

        if ($resultCompra['result'] == 1) {
            $contenidoSitio = $this->renderPartial("compraContenido", array(
                'objCompra' => $resultCompra['response']['objCompra'],
                'modelPago' => $resultCompra['response']['modelPago'],
                'objCompraDireccion' => $resultCompra['response']['objCompraDireccion'],
                'objFormaPago' => $resultCompra['response']['objFormaPago'],
                'objFormasPago' => $resultCompra['response']['objFormasPago']), true);

            Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = null;
            Yii::app()->shoppingCartVitalCall->clear();
            $this->render('application.views.carro.compra', array(
                'contenido' => $contenidoSitio,
                'objCompra' => $resultCompra['response']['objCompra'],
            ));
            Yii::app()->end();
        } else {
            Yii::app()->user->setFlash('error', "Error al realizar compra, por favor intente de nuevo. " . $resultCompra['response']);
            $this->redirect($this->createUrl('/callcenter/telefarma/carro/pagar'));
            Yii::app()->end();
        }
    }

    private function procesoCompra(FormaPagoTelefarmaForm $modelPago, $tipoEntrega) {
        $transaction = Yii::app()->db->beginTransaction();
        try {
        	//registrar medico
        	$sqlMedico = "INSERT INTO m_Medico(registroMedico, nombre, institucion, telefono, correoElectronico) VALUES ($modelPago->registroMedico, '$modelPago->nombreMedico', '$modelPago->institucionMedico', '$modelPago->telefonoMedico', '$modelPago->correoElectronicoMedico') ON DUPLICATE KEY UPDATE nombre='$modelPago->nombreMedico', institucion='$modelPago->institucionMedico', telefono='$modelPago->telefonoMedico', correoElectronico='$modelPago->correoElectronicoMedico'";
        	Yii::app()->db->createCommand($sqlMedico)->execute();
        	
            //registrar compra compra
            $objCompra = new Compras;
            $objCompra->identificacionUsuario = null;
            $objCompra->tipoEntrega = $tipoEntrega;
            $objCompra->fechaEntrega = $modelPago->fechaEntrega;
            $objCompra->observacion = $modelPago->comentario;

            if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                $puntoVenta = $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta];
                $objCompra->idComercial = $puntoVenta[1];
            }

            $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['pendiente'];

            $objCompra->idTipoVenta = Yii::app()->params->tipoVenta['telefarma'];
            $objCompra->activa = 1;
            $objCompra->invitado = 1;
            $objCompra->codigoPerfil = Yii::app()->shoppingCartVitalCall->getCodigoPerfil();
            $objCompra->codigoCiudad = Yii::app()->shoppingCartVitalCall->getCodigoCiudad();
            $objCompra->codigoSector = Yii::app()->shoppingCartVitalCall->getCodigoSector();

            //no se maneja venta bodega
            $objCompra->tiempoDomicilioCedi = 0;
            $objCompra->valorDomicilioCedi = 0;
            $objCompra->codigoCedi = 0;

            $objCompra->subtotalCompra = Yii::app()->shoppingCartVitalCall->getCost();
            $objCompra->impuestosCompra = Yii::app()->shoppingCartVitalCall->getTaxPrice();
            $objCompra->baseImpuestosCompra = Yii::app()->shoppingCartVitalCall->getBaseTaxPrice();
            $objCompra->domicilio = Yii::app()->shoppingCartVitalCall->getShipping();
            $objCompra->flete = Yii::app()->shoppingCartVitalCall->getExtraShipping();
            $objCompra->totalCompra = Yii::app()->shoppingCartVitalCall->getTotalCost();

            if (!$objCompra->save()) {
                throw new Exception("Error al guardar compra [0]" . $objCompra->validateErrorsResponse());
            }

            if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                $puntoVenta = $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta];

                $objEstadoCompra = new ComprasEstados;
                $objEstadoCompra->idCompra = $objCompra->idCompra;
                $objEstadoCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['asignado'];
                $objEstadoCompra->idOperador = 38;
                if (!$objEstadoCompra->save()) {
                    throw new Exception("Error al guardar traza de estado: " . $objEstadoCompra->validateErrorsResponse());
                }

                $objObservacion = new ComprasObservaciones;
                $objObservacion->idCompra = $objCompra->idCompra;
                $objObservacion->observacion = "Cambio de Estado: Asignado PDV. " . $puntoVenta[2];
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
                $objObservacion2->observacion = "Cambio de Estado: Pendiente de entrega a cliente en PDV. " . $puntoVenta[2];
                $objObservacion2->idOperador = 38;
                $objObservacion2->notificarCliente = 0;

                if (!$objObservacion2->save()) {
                    throw new Exception("Error al guardar observación" . $objObservacion2->validateErrorsResponse());
                }
            }

            /* ***************************************************************************************************** */
            /* ************************************** GUARDAN LAS FORMAS DE PAGO *********************************** */
            /* ***************************************************************************************************** */

            $objFormasPago = new FormasPago; //FormaPago::model()->findByPk($modelPago->idFormaPago);
            $objFormasPago->idCompra = $objCompra->idCompra;
            $objFormasPago->valor = Yii::app()->shoppingCartVitalCall->getTotalCost();
            $objFormasPago->numeroTarjeta = $modelPago->numeroTarjeta;
            $objFormasPago->cuotasTarjeta = $modelPago->cuotasTarjeta;
            $objFormasPago->idFormaPago = $modelPago->idFormaPago;

            if (!$objFormasPago->save()) {
                throw new Exception("Error al guardar forma de pago" . $objFormasPago->validateErrorsResponse());
            }

            $objCompraDireccion = new ComprasDireccionesDespacho;
            $objCompraDireccion->idCompra = $objCompra->idCompra;
            $objCompraDireccion->descripcion = $modelPago->descripcion;

            if ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
            	$objCompraDireccion->nombre = $modelPago->nombre;
            	$objCompraDireccion->direccion = $modelPago->direccion;
            	$objCompraDireccion->barrio = $modelPago->barrio;
            	$objCompraDireccion->telefono = $modelPago->telefono;
            	$objCompraDireccion->celular = $modelPago->celular;
            	$objCompraDireccion->codigoCiudad = Yii::app()->shoppingCartVitalCall->getCodigoCiudad();
            	$objCompraDireccion->codigoSector = Yii::app()->shoppingCartVitalCall->getCodigoSector();
            	$objCompraDireccion->correoElectronico = $modelPago->correoElectronico;
            } else if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                $objCompraDireccion->nombre = "NA";
                $objCompraDireccion->direccion = "NA";
                $objCompraDireccion->barrio = "NA";
                $objCompraDireccion->telefono = $modelPago->telefonoContacto;
                $objCompraDireccion->correoElectronico = $modelPago->correoElectronicoContacto;
            }

            if (!$objCompraDireccion->save()) {
                throw new Exception("Error al guardar dirección de compra" . $objCompraDireccion->validateErrorsResponse());
            }

            //items de compra
            $positions = Yii::app()->shoppingCartVitalCall->getPositions();
            foreach ($positions as $position) {
                //actualizar saldo producto //--
                $objSaldo = null;
                if ($position->getObjProducto()->tercero != 1) {
                    $objSaldo = ProductosSaldos::model()->find(array(
                        'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto',
                        'params' => array(
                            ':ciudad' => Yii::app()->shoppingCartVitalCall->getCodigoCiudad(),
                            ':sector' => Yii::app()->shoppingCartVitalCall->getCodigoSector(),
                            ':producto' => $position->getObjProducto()->codigoProducto
                        )
                    ));
                }

                if ($objSaldo == null) {
                    throw new Exception("Producto " . $position->getObjProducto()->codigoProducto . " no disponible");
                }

                if ($objSaldo->saldoUnidad < $position->getQuantityUnit()) {
                    throw new Exception("Producto " . $position->getObjProducto()->codigoProducto . ". La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades");
                }

                if ($objSaldo->saldoFraccion < $position->getQuantity(true)) {
                    throw new Exception("Producto " . $position->getObjProducto()->codigoProducto . ". La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoFraccion fracciones");
                }

                $objSaldo->saldoUnidad = $objSaldo->saldoUnidad - $position->getQuantityUnit();
                $objSaldo->saldoFraccion = $objSaldo->saldoFraccion - $position->getQuantity(true);
                $objSaldo->save();
                //-- actualizar saldo producto

                $objItem = new ComprasItems;
                $objItem->idCompra = $objCompra->idCompra;
                $objItem->codigoProducto = $position->getObjProducto()->codigoProducto;
                $objItem->descripcion = $position->getObjProducto()->descripcionProducto;
                $objItem->presentacion = $position->getObjProducto()->presentacionProducto;
                $objItem->precioBaseUnidad = $position->getPrice(false, false);
                $objItem->precioBaseFraccion = $position->getPrice(true, false);
                $objItem->descuentoUnidad = $position->getDiscountPrice();
                $objItem->descuentoFraccion = $position->getDiscountPrice(true);
                $objItem->precioTotalUnidad = $position->getSumPriceUnit();
                $objItem->precioTotalFraccion = $position->getSumPriceFraction(true);
                $objItem->terceros = $position->getObjProducto()->tercero;
                $objItem->unidades = $position->getQuantityUnit();
                $objItem->fracciones = $position->getQuantity(true);
                $objItem->unidadesCedi = $position->getQuantityStored();
                $objItem->codigoImpuesto = $position->getObjProducto()->codigoImpuesto;
                $objItem->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['activo'];
                //$objItem->idEstadoItemTercero = null;
                $objItem->flete = $position->getShipping();
                $objItem->disponible = 1;
                $objItem->registroMedico = $modelPago->registroMedico;
                
                if (!$objItem->save()) {
                    throw new Exception("Error al guardar item de compra $objItem->codigoProducto. " . $objItem->validateErrorsResponse());
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
            }
            
        	$nombreUsuario = "INVITADO";
            $correoUsuario = "NA";

            if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
                $nombreUsuario = $modelPago->nombre;
                $correoUsuario = $modelPago->correoElectronico;
            } else if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                $correoUsuario = $modelPago->correoElectronicoContacto;
            }

            $objPasarelaEnvio = null;
            $asuntoCorreo = Yii::app()->params->asunto['pedidoRealizado'];

            $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
            $contenidoCorreo = $this->renderPartial('compraCorreo', array(
                'objCompra' => $objCompra,
                'modelPago' => $modelPago,
                'objCompraDireccion' => $objCompraDireccion,
                'objFormaPago' => $objFormaPago,
                'objFormasPago' => $objFormasPago,
                'nombreUsuario' => $nombreUsuario), true, true);
            $htmlCorreo = $this->renderPartial('application.views.common.correo', array('contenido' => $contenidoCorreo), true, true);

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
                $result = $client->__soapCall("CongelarCompraAutomatica", array('idPedido' => $objCompra->idCompra)); //763759, 763743
                //$result = array(0=>0,1=>'congelar prueba error');
                //$result = array(0 => 1, 1 => 'congelar prueba ok', 2 => 'miguel.sanchex@gmail.com.co');
                if (!empty($result) && $result[0] == 1) {
                    $objCompraRemision = Compras::model()->findByPk($objCompra->idCompra, array("with" => "objPuntoVenta"));
                    $contenidoCorreo = $this->renderPartial('application.modules.callcenter.views.pedido.compraCorreo', array('objCompra' => $objCompraRemision), true, true);
                    $htmlCorreo = $this->renderPartial('application.views.common.correo', array('contenido' => $contenidoCorreo), true, true);
                    try {
                        sendHtmlEmail($result[2], Yii::app()->params->asunto['pedidoRemitido'], $htmlCorreo);
                    } catch (Exception $ce) {
                        Yii::log("Error enviando correo de remision automatica #$objCompra->idCompra\n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
                    }
                } else {
                    $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['subasta'];
                    if (!$objCompra->save()) {
                        throw new Exception("Error al guardar compra [1]" . $objCompra->validateErrorsResponse());
                    }
                }
            } catch (SoapFault $exc) {
                Yii::log("SoapFault WebService CongelarCompraAutomatica [compra: $objCompra->idCompra]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n" . $client->__getLastResponse(), CLogger::LEVEL_INFO, 'application');
            } catch (Exception $exc) {
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

    public function actionDisponibilidad() {
        $modelPago = null;
        if (isset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']];
        }

        if ($modelPago == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
            Yii::app()->end();
        }

        $modelPago->consultarDisponibilidad(Yii::app()->shoppingCartVitalCall);
    }

    public function actionList() {
        //Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = null;
        //Yii::app()->shoppingCartVitalCall->clear();
        //exit();
        //CVarDumper::dump(Yii::app()->shoppingCartVitalCall->itemAt(91269), 2, true);
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

    public function actionModificar() {

        $modificar = Yii::app()->getRequest()->getPost('modificar', null);
        $id = Yii::app()->getRequest()->getPost('position', null);

        $modelPago = null;

        $objSectorCiudad = $this->objSectorCiudad;

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

        $position = Yii::app()->shoppingCartVitalCall->itemAt($id);
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
                'canasta' => $this->renderPartial("canasta" , null, true),
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
            	'canasta' => $this->renderPartial("canasta" , null, true),
            	'canastaHTML' => $this->renderPartial("carro", null, true),
        ));
        Yii::app()->end();
    }
    
    public function actionForm($limpiar = false) {
    	$modelPago = null;
    
    	if (isset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] != null)
    		$modelPago = Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']];
    
    		CVarDumper::dump($modelPago, 10, true);
    		echo "<br/><br/>RULES<br/><br/>";
    		CVarDumper::dump($modelPago->rules(), 10, true);
    		echo "<br/><br/>SCENARIO: " . $modelPago->getScenario();
    
    		if ($limpiar){
    			Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = null;
    			//unset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']]);
    		}
    }
    
    public function actionPagar($paso = null, $post = false) {
    	//$this->layout = "simple";
    	$modelPago = null;
    
    	if (is_string($post)) {
    		$post = ($post == "true");
    	}
    
    	if (isset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] != null) {
    		$modelPago = Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']];
    	}
    	
    //	CVarDumper::dump($modelPago,10,true);exit();
    
    	if (Yii::app()->shoppingCartVitalCall->isEmpty()) {
    		if ($post) {
    			echo CJSON::encode(array('result' => 'ok', 'response' => 'Carro vac&iacute;o', 'redirect' => $this->createUrl("/callcenter/telefarma/carro")));
    		} else {
    			$this->redirect($this->createUrl('/callcenter/telefarma/carro'));
    		}
    		Yii::app()->end();
    	}
    	
    	if ($modelPago == null) {
    		$modelPago = new FormaPagoTelefarmaForm;
    		$modelPago->consultarHorario($this->objSectorCiudad);
    		$modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];
    		Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = $modelPago;
    	}
    
    	if ($modelPago->tipoEntrega == null) {
    		$modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];
    	}
    
    	//verificar si ubicacion (ciudad-sector) tiene domicilio
    	if (!$modelPago->tieneDomicilio($this->objSectorCiudad)) {
    		$modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['presencial'];
    	}
    	
    	Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = $modelPago;
    
    	//finalizan validaciones previas e inicializa proceso de pasos de pago
    
    	if ($paso === null)
    		$paso = Yii::app()->params->telefarma['pagar']['pasos'][1];
    
    		if (!in_array($paso, Yii::app()->params->telefarma['pagar']['pasosDisponibles'])) {
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
    				case Yii::app()->params->telefarma['pagar']['pasos'][1]:
    					$form = new FormaPagoTelefarmaForm($paso);
    					$form->identificacionUsuario = $modelPago->identificacionUsuario;
    					$form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
    					$form->totalCompra = $modelPago->totalCompra;
    
    					if (isset($_POST['FormaPagoTelefarmaForm'])) {
    						foreach ($_POST['FormaPagoTelefarmaForm'] as $atributo => $valor) {
    							$form->$atributo = is_string($valor) ? trim($valor) : $valor;
    						}
    					}
    
    					if ($form->validate()) {
    						$modelPago->tipoEntrega = $form->tipoEntrega;
    						
    						if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
    							$modelPago->nombre = $form->nombre;
    							$modelPago->correoElectronico = $form->correoElectronico;
    							$modelPago->direccion = $form->direccion;
    							$modelPago->barrio = $form->barrio;
    							$modelPago->telefono = $form->telefono;
    							$modelPago->extension = $form->extension;
    							$modelPago->celular = $form->celular;
    						} else if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
    							$modelPago->telefonoContacto = $form->telefonoContacto;
    							$modelPago->correoElectronicoContacto = $form->correoElectronicoContacto;
    							$modelPago->indicePuntoVenta = $form->indicePuntoVenta;
    							$modelPago->seleccionarPdv($form->indicePuntoVenta);
    						}
    
    						$modelPago->fechaEntrega = $form->fechaEntrega;
    						$modelPago->idFormaPago = $form->idFormaPago;
    						$modelPago->numeroTarjeta = $form->numeroTarjeta;
    						$modelPago->cuotasTarjeta = $form->cuotasTarjeta;
    						$modelPago->registroMedico = $form->registroMedico;
    						$modelPago->nombreMedico = $form->nombreMedico;
    						$modelPago->institucionMedico = $form->institucionMedico;
    						$modelPago->telefonoMedico = $form->telefonoMedico;
    						$modelPago->correoElectronicoMedico = $form->correoElectronicoMedico;
    						$modelPago->comentario = $form->comentario;
    						$modelPago->pasoValidado[$paso] = $paso;
    
    						Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = $modelPago;
    
    						echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/callcenter/telefarma/carro/pagar", array('paso' => $siguiente))));
    						Yii::app()->end();
    					} else {
    						echo CActiveForm::validate($form);
    						Yii::app()->end();
    					}
    
    					break;
    				case Yii::app()->params->telefarma['pagar']['pasos'][2]:
    
    					if ($siguiente != "finalizar") {
    						echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/callcenter/telefarma/carro/pagar", array('paso' => $siguiente))));
    						Yii::app()->end();
    					}
    
    					$form = new FormaPagoTelefarmaForm($paso);
    					$form->identificacionUsuario = $modelPago->identificacionUsuario;
    					$form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
    					$form->tipoEntrega = $modelPago->tipoEntrega;
    
    					if (isset($_POST['FormaPagoTelefarmaForm'])) {
    						foreach ($_POST['FormaPagoTelefarmaForm'] as $atributo => $valor) {
    							$form->$atributo = is_string($valor) ? trim($valor) : $valor;
    						}
    					}
    
    					if ($form->validate()) {
    						$modelPago->pasoValidado[$paso] = $paso;
    						$modelPago->confirmacion = $form->confirmacion;
    						Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = $modelPago;
    						echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados", 'redirect' => $this->createUrl("/callcenter/telefarma/carro/comprar")));
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
    			$modelPago->validarPasos(Yii::app()->params->telefarma['pagar']['pasosDisponibles'], $paso);
    
    			$params = array();
    			$params['parametros']['paso'] = $paso;
    			$params['paso'] = $paso;
    
    			$nPasoActual = Yii::app()->params->telefarma['pagar']['pasos'][$paso];
    			$nPasoAnterior = $nPasoActual - 1;
    			$nPasoSiguiente = $nPasoActual + 1;
    			$pasoSiguiente = isset(Yii::app()->params->telefarma['pagar']['pasos'][$nPasoSiguiente]) ? Yii::app()->params->telefarma['pagar']['pasos'][$nPasoSiguiente] : null;
    			$pasoAnterior = isset(Yii::app()->params->telefarma['pagar']['pasos'][$nPasoAnterior]) ? Yii::app()->params->telefarma['pagar']['pasos'][$nPasoAnterior] : null;
    
    			$params['parametros']['pasoAnterior'] = $pasoAnterior;
    			$params['parametros']['pasoSiguiente'] = $pasoSiguiente;
    			$params['parametros']['nPasoActual'] = $nPasoActual;
    
    			switch ($paso) {
    				case Yii::app()->params->telefarma['pagar']['pasos'][1]:
    					$params['parametros']['listHorarios'] = $modelPago->listDataHoras();
    
    					$listFormaPago = FormaPago::model()->findAll(array(
    							'order' => 'formaPago',
    							'condition' => 'ventaVitalCall=:estado',
    							'params' => array(':estado' => 1)
    					));
    					Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = $modelPago;
    					$params['parametros']['listFormaPago'] = $listFormaPago;
    
    					break;
    				case Yii::app()->params->telefarma['pagar']['pasos'][2]:
    					$objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
    					$params['parametros']['objFormaPago'] = $objFormaPago;
    
    
    					//verificar productos en pdv
    					if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
    						$modelPago->seleccionarPdv($modelPago->indicePuntoVenta);
    					}
    					$modelPago->calcularConfirmacion(Yii::app()->shoppingCartVitalCall->getPositions());
    					//$modelPago->calcularFormulas(Yii::app()->shoppingCartVitalCall->getPositions());
    					break;
    			}
    			$params['parametros']['modelPago'] = $modelPago;
    			$this->render("pagar", $params);
    		}
    }
    
    public function actionAutocompleteMedico($term) {
    	$productos = Medico::model ()->findAll ( array (
    			'condition' => "(nombre like '%$term%') ",
    			'params' => array (
    					':activo' => 1
    			)
    	));
    	foreach ( $productos as $model ) {
    		$results [] = array (
    				'label' => $model ['registroMedico'] . " - " . $model ['nombre'],
    				'value' => $model ['nombre'],
    				'registroMedico' => $model ['registroMedico'],
    				'institucion' => $model ['institucion'],
    				'telefono' => $model ['telefono'],
    				'correo' => $model ['correoElectronico'],
    		);
    	}
    	echo CJSON::encode ( $results );
    }

}
