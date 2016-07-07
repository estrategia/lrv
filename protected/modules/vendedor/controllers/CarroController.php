<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarroController
 *
 * @author miguel.sanchez
 */
class CarroController extends ControllerVendedor {

    /**
     * @return array action filters
     * */
//    public function filters() {
//        return array(
//            array(
//                'application.filters.SessionControlFilter + index, pagoexpress, pagoinvitado, pagar, comprar',
//                'isMobile' => $this->isMobile
//            ),
//            'login + pagoexpress',
//            //'access + autenticar, recordar, registro, restablecer',
//            'loginajax + crearcotizacion',
//        );
//    }


    public function filterLogin($filter) {
        if (!Yii::app()->controller->module->user->getClienteLogueado()) {
            $this->redirect(Yii::app()->user->loginUrl);
        }
        $filter->run();
    }

    public function filterAccess($filter) {
        if (!Yii::app()->controller->module->user->getClienteLogueado()) {
            $this->redirect(CController::createUrl('/cliente/cliente'));
        }
        $filter->run();
    }

    public function filterLoginajax($filter) {
        if (!Yii::app()->controller->module->user->getClienteLogueado()) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta usuario autenticado, por favor iniciar sesión para continuar'));
            Yii::app()->end();
        }
        $filter->run();
    }

    public function actionPasoporel() {
        $opcion = Yii::app()->getRequest()->getPost('opcion');

        if ($opcion == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inv&aacute;lida'));
            Yii::app()->end();
        }

        $modelPago = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']];
        }

        if ($modelPago == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
            Yii::app()->end();
        }

        if ($opcion == "modal") {
            $modelPago->consultarDisponibilidad(Yii::app()->shoppingCartSalesman);
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;

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
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;

            echo CJSON::encode(array('result' => 'ok', 'response' => 'Punto de venta seleccionado'));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud env&aacute;lida'));
            Yii::app()->end();
        }
    }

    public function actionAgregar() {
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
                'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
            'params' => array(
                ':activo' => 1,
                ':codigo' => $producto,
                ':saldo' => 0,
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
            $position = Yii::app()->shoppingCartSalesman->itemAt($producto);

            if ($position !== null) {
                $cantidadCarroUnidad = $position->getQuantityUnit();
            }

            //si hay saldo, agrega a carro, sino consulta bodega
            if ($cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
                $objProductoCarro = new ProductoCarro($objProducto);
                Yii::app()->shoppingCartSalesman->put($objProductoCarro, false, $cantidadU);
            } else {
                $objPagoForm = new FormaPagoVendedorForm;
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

                $htmlBodega = $this->renderPartial('_carroBodega', array(
                    'objSaldo' => $objSaldo,
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
            Yii::app()->shoppingCartSalesman->put($objProductoCarro, true, $cantidadF);
        }

        /* if (!ctype_digit($cantidad)) {
          echo CJSON::encode(array('result' => 'error', 'response' => 'La cantidad de productos, debe ser n&uacute;mero entero.'));
          Yii::app()->end();
          }
         */

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'relacionados' => $objProducto->tieneRelacionados(),
                'canastaHTML' => $this->renderPartial("canasta", null, true),
                'mensajeHTML' => $this->renderPartial('_carroAgregado', null, true),
                'objetosCarro' => Yii::app()->shoppingCartSalesman->getCount()
            ),
        ));
        Yii::app()->end();
    }

    public function actionAgregarcompra() {
        if ($this->objSectorCiudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Para agregar este pedido al carro de compras, debes seleccionar ciudad.'));
            Yii::app()->end();
        }

        $compra = Yii::app()->getRequest()->getPost('compra', null);

        if ($compra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $objCompra = Compras::model()->find(array(
            'condition' => 'idCompra=:compra AND identificacionUsuario=:usuario',
            'params' => array(
                ':compra' => $compra,
                ':usuario' => Yii::app()->controller->module->user->getCedulaCliente()
            )
        ));

        if ($objCompra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Compra no existente'));
            Yii::app()->end();
        }

        $idCombos = array();
        $fecha = new DateTime;
        $agregadoCompleto = true;
        $agregadoItem = false;
        $nUnidadesCompra = 0;
        $nUnidadesCarro = 0;

        foreach ($objCompra->listItems as $objItem) {
            if ($objItem->idCombo != null) {
                if (!isset($idCombos[$objItem->idCombo])) {
                    $nUnidadesCompra += $objItem->unidades;

                    $objCombo = Combo::model()->find(array(
                        'with' => array('listProductos', 'listProductosCombo', 'listComboSectorCiudad'),
                        'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                        'params' => array(
                            ':combo' => $objItem->idCombo,
                            ':estado' => 1,
                            ':fecha' => $fecha->format('Y-m-d H:i:s'),
                            ':saldo' => 0,
                            ':ciudad' => $this->objSectorCiudad->codigoCiudad,
                            ':sector' => $this->objSectorCiudad->codigoSector,
                        )
                    ));

                    if ($objCombo === null) {
                        $agregadoCompleto = false;
                        continue;
                    }

                    $objSaldo = $objCombo->getSaldo($this->objSectorCiudad->codigoCiudad, $this->objSectorCiudad->codigoSector);

                    if ($objSaldo === null) {
                        $agregadoCompleto = false;
                        continue;
                    }

                    $cantidadCarroUnidad = 0;
                    $position = Yii::app()->shoppingCartSalesman->itemAt($objCombo->getcodigo());

                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantity();
                    }

                    if ($cantidadCarroUnidad + $objItem->unidades <= $objSaldo->saldo) {
                        $objProductoCarro = new ProductoCarro($objCombo);
                        Yii::app()->shoppingCartSalesman->put($objProductoCarro, false, $objItem->unidades);
                        $agregadoItem = true;
                        $nUnidadesCarro += $objItem->unidades;
                    } else {
                        $agregadoCompleto = false;
                    }
                }

                //identificar combos
                $idCombos[$objItem->idCombo] = $objItem->unidades;
            } else {
                $nUnidadesCompra += $objItem->unidades;
                $nUnidadesCompra += $objItem->fracciones;
                $nUnidadesCompra += $objItem->unidadesCedi;

                //agregar productos
                $objProducto = Producto::model()->find(array(
                    'with' => array(
                        'listSaldos' => array('condition' => '(listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                        'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                        'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                    ),
                    'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                    'params' => array(
                        ':activo' => 1,
                        ':codigo' => $objItem->codigoProducto,
                        ':ciudad' => $this->objSectorCiudad->codigoCiudad,
                        ':sector' => $this->objSectorCiudad->codigoSector,
                    ),
                ));

                if ($objProducto === null) {
                    $agregadoCompleto = false;
                    continue;
                }

                $objSaldo = $objProducto->getSaldo($this->objSectorCiudad->codigoCiudad, $this->objSectorCiudad->codigoSector);

                if ($objSaldo === null) {
                    $agregadoCompleto = false;
                    continue;
                }

                $position = Yii::app()->shoppingCartSalesman->itemAt($objItem->codigoProducto);

                if ($objItem->unidades > 0) {
                    $cantidadCarroUnidad = 0;
                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantityUnit();
                    }

                    //si hay saldo, agrega a carro
                    if ($cantidadCarroUnidad + $objItem->unidades <= $objSaldo->saldoUnidad) {
                        $objProductoCarro = new ProductoCarro($objProducto);
                        Yii::app()->shoppingCartSalesman->put($objProductoCarro, false, $objItem->unidades);
                        $agregadoItem = true;
                        $nUnidadesCarro += $objItem->unidades;
                    } else {
                        $agregadoCompleto = false;
                    }
                }

                if ($objItem->fracciones > 0) {
                    $cantidadCarroFraccion = 0;

                    if ($position !== null) {
                        $cantidadCarroFraccion = $position->getQuantity(true);
                    }

                    //si hay saldo, agrega a carro
                    if ($cantidadCarroFraccion + $objItem->fracciones <= $objSaldo->saldoFraccion) {
                        $objProductoCarro = new ProductoCarro($objProducto);
                        Yii::app()->shoppingCartSalesman->put($objProductoCarro, true, $objItem->fracciones);
                        $agregadoItem = true;
                        $nUnidadesCarro += $objItem->fracciones;
                    } else {
                        $agregadoCompleto = false;
                    }
                }

                if ($objItem->unidadesCedi > 0) {
                    $cantidadCarroBodega = 0;

                    if ($position !== null) {
                        $cantidadCarroBodega = $position->getQuantityStored();
                    }

                    $objSaldoBodega = ProductosSaldosCedi::model()->find(array(
                        'condition' => 'codigoProducto=:producto AND codigoCedi=:cedi AND saldoUnidad>=:saldo',
                        'params' => array(
                            ':producto' => $objItem->codigoProducto,
                            ':cedi' => $this->objSectorCiudad->objCiudad->codigoSucursal,
                            ':saldo' => $objItem->unidadesCedi + $cantidadCarroBodega
                        )
                    ));

                    if ($objSaldoBodega === null) {
                        $agregadoCompleto = false;
                    } else {
                        $objProductoCarro = new ProductoCarro($objProducto);
                        if (Yii::app()->shoppingCartSalesman->putStored($objProductoCarro, $objItem->unidadesCedi)) {
                            $agregadoItem = true;
                            $nUnidadesCarro += $objItem->unidadesCedi;
                        } else {
                            $agregadoCompleto = false;
                        }
                    }
                }
            }
        }

        if ($nUnidadesCarro == 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Productos no disponibles'));
            Yii::app()->end();
        }

        $porcentajeCarro = floor(100 * ($nUnidadesCarro / $nUnidadesCompra));

        $canasta = 'canasta';

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial($canasta, null, true),
                'mensajeHTML' => $this->renderPartial('//common/mensajeHtml', array('mensaje' => "$porcentajeCarro% de lista agregada"), true),
            ),
        ));
        Yii::app()->end();
    }

    public function actionAgregarcotizacion() {
        if ($this->objSectorCiudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Seleccionar ubicaci&oacute;n.'));
            Yii::app()->end();
        }

        $cotizacion = Yii::app()->getRequest()->getPost('cotizacion', null);

        if ($cotizacion === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $fecha = new DateTime;
        $dias = Yii::app()->params->cotizaciones['diasVisualizar'];
        $fecha->modify("-$dias days");
        $objCotizacion = Cotizaciones::model()->find(array(
            'condition' => 'idCotizacion=:cotizacion AND identificacionUsuario=:usuario AND fechaCotizacion>=:fecha AND codigoCiudad=:ciudad AND codigoSector=:sector',
            'params' => array(
                ':cotizacion' => $cotizacion,
                ':usuario' => YYii::app()->controller->module->user->getCedulaCliente(),
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':ciudad' => $this->objSectorCiudad->codigoCiudad,
                ':sector' => $this->objSectorCiudad->codigoSector,
            )
        ));

        if ($objCotizacion === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Cotizaci&oacute;n no existente o vencida'));
            Yii::app()->end();
        }

        $idCombos = array();
        $fecha = new DateTime;
        $agregadoCompleto = true;
        $agregadoItem = false;
        $nUnidadesCompra = 0;
        $nUnidadesCarro = 0;

        foreach ($objCotizacion->listCotizacionItems as $objItem) {
            $agregadoItem = false;
            if ($objItem->idCombo != null) {
                if (!isset($idCombos[$objItem->idCombo])) {
                    $nUnidadesCompra += $objItem->unidades;

                    $objCombo = Combo::model()->find(array(
                        'with' => array('listProductos', 'listProductosCombo', 'listComboSectorCiudad'),
                        'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                        'params' => array(
                            ':combo' => $objItem->idCombo,
                            ':estado' => 1,
                            ':fecha' => $fecha->format('Y-m-d H:i:s'),
                            ':saldo' => 0,
                            ':ciudad' => $this->objSectorCiudad->codigoCiudad,
                            ':sector' => $this->objSectorCiudad->codigoSector,
                        )
                    ));

                    if ($objCombo === null) {
                        $agregadoCompleto = false;
                        continue;
                    }

                    $objSaldo = $objCombo->getSaldo($this->objSectorCiudad->codigoCiudad, $this->objSectorCiudad->codigoSector);

                    if ($objSaldo === null) {
                        $agregadoCompleto = false;
                        continue;
                    }

                    $cantidadCarroUnidad = 0;
                    $position = Yii::app()->shoppingCartSalesman->itemAt($objCombo->getcodigo());

                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantity();
                    }

                    if ($cantidadCarroUnidad + $objItem->unidades <= $objSaldo->saldo) {
                        $objProductoCarro = new ProductoCarro($objCombo);
                        Yii::app()->shoppingCartSalesman->put($objProductoCarro, false, $objItem->unidades);

                        //calcular precio combo
                        $precioCombo = 0;
                        foreach ($objCotizacion->listCotizacionItems as $objItemAux) {
                            if ($objItem->idCombo == $objItemAux->idCombo) {
                                $precioCombo += $objItemAux->precioBaseUnidad;
                            }
                        }

                        $objProductoCarro->setPriceUnit($precioCombo);
                        Yii::app()->shoppingCartSalesman->updatePosition($objProductoCarro);

                        $agregadoItem = true;
                        $nUnidadesCarro += $objItem->unidades;
                    } else {
                        $agregadoCompleto = false;
                    }
                }

                //identificar combos
                $idCombos[$objItem->idCombo] = $objItem->unidades;
            } else {
                $nUnidadesCompra += $objItem->unidades;
                $nUnidadesCompra += $objItem->fracciones;
                $nUnidadesCompra += $objItem->unidadesCedi;

                //agregar productos
                $objProducto = Producto::model()->find(array(
                    'with' => array(
                        'listSaldos' => array('condition' => '(listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                        'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                        'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                    ),
                    'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                    'params' => array(
                        ':activo' => 1,
                        ':codigo' => $objItem->codigoProducto,
                        ':ciudad' => $this->objSectorCiudad->codigoCiudad,
                        ':sector' => $this->objSectorCiudad->codigoSector,
                    ),
                ));

                if ($objProducto === null) {
                    $agregadoCompleto = false;
                    continue;
                }

                $objSaldo = $objProducto->getSaldo($this->objSectorCiudad->codigoCiudad, $this->objSectorCiudad->codigoSector);

                if ($objSaldo === null) {
                    $agregadoCompleto = false;
                    continue;
                }

                $position = Yii::app()->shoppingCartSalesman->itemAt($objItem->codigoProducto);
                $objProductoCarro = new ProductoCarro($objProducto);

                if ($objItem->unidades > 0) {
                    $cantidadCarroUnidad = 0;
                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantityUnit();
                    }

                    //si hay saldo, agrega a carro
                    if ($cantidadCarroUnidad + $objItem->unidades <= $objSaldo->saldoUnidad) {
                        Yii::app()->shoppingCartSalesman->put($objProductoCarro, false, $objItem->unidades);
                        $agregadoItem = true;
                        $nUnidadesCarro += $objItem->unidades;
                    } else {
                        $agregadoCompleto = false;
                    }
                }

                if ($objItem->fracciones > 0) {
                    $cantidadCarroFraccion = 0;

                    if ($position !== null) {
                        $cantidadCarroFraccion = $position->getQuantity(true);
                    }

                    //si hay saldo, agrega a carro
                    if ($cantidadCarroFraccion + $objItem->fracciones <= $objSaldo->saldoFraccion) {
                        Yii::app()->shoppingCartSalesman->put($objProductoCarro, true, $objItem->fracciones);
                        $agregadoItem = true;
                        $nUnidadesCarro += $objItem->fracciones;
                    } else {
                        $agregadoCompleto = false;
                    }
                }

                if ($objItem->unidadesCedi > 0) {
                    $cantidadCarroBodega = 0;

                    if ($position !== null) {
                        $cantidadCarroBodega = $position->getQuantityStored();
                    }

                    $objSaldoBodega = ProductosSaldosCedi::model()->find(array(
                        'condition' => 'codigoProducto=:producto AND codigoCedi=:cedi AND saldoUnidad>=:saldo',
                        'params' => array(
                            ':producto' => $objItem->codigoProducto,
                            ':cedi' => $objCotizacion->objCiudad->codigoSucursal,
                            ':saldo' => $objItem->unidadesCedi + $cantidadCarroBodega
                        )
                    ));

                    if ($objSaldoBodega === null) {
                        $agregadoCompleto = false;
                    } else {
                        if (Yii::app()->shoppingCartSalesman->putStored($objProductoCarro, $objItem->unidadesCedi)) {
                            $agregadoItem = true;
                            $nUnidadesCarro += $objItem->unidadesCedi;
                        } else {
                            $agregadoCompleto = false;
                        }
                    }

                    if ($agregadoItem) {
                        $objProductoCarro->setPriceUnit($objItem->precioBaseUnidad);
                        $objProductoCarro->setPriceFraction($objItem->precioBaseFraccion);
                        $objProductoCarro->setDiscountPriceUnit($objItem->descuentoUnidad);
                        $objProductoCarro->setDiscountPriceFraction($objItem->descuentoFraccion);
                        $objProductoCarro->setTax($objItem->porcentajeImpuesto);
                        $objProductoCarro->setDelivery($objItem->tiempoEntrega);
                        $objProductoCarro->setShipping($objItem->flete);

                        /* $listBeneficios = array();
                          foreach($objItem->listBeneficios as $objBeneficio){

                          } */

                        $objProductoCarro->setBeneficios($objItem->listBeneficios);

                        Yii::app()->shoppingCartSalesman->updatePosition($objProductoCarro);
                    }
                }
            }

            //$position->setPriceUnit(1000);
            //Yii::app()->shoppingCartSalesman->updatePosition($position);
        }

        if ($nUnidadesCarro == 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Productos no disponibles'));
            Yii::app()->end();
        }

        $porcentajeCarro = floor(100 * ($nUnidadesCarro / $nUnidadesCompra));

        $canasta = 'canasta';

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial($canasta, null, true),
                'mensajeHTML' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => "$porcentajeCarro% de lista agregada"), true),
            ),
        ));
        Yii::app()->end();
    }

    public function actionAgregarlista() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Seleccionar ubicación.'));
            Yii::app()->end();
        }

        $lista = Yii::app()->getRequest()->getPost('lista', null);

        if ($lista === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $objLista = ListasPersonales::model()->find(array(
            'condition' => 'idLista=:lista AND identificacionUsuario=:usuario',
            'params' => array(
                ':lista' => $lista,
                ':usuario' => Yii::app()->controller->module->user->getCedulaCliente()
            )
        ));

        if ($objLista === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Lista no existente'));
            Yii::app()->end();
        }

        $fecha = new DateTime;
        $nUnidadesCompra = 0;
        $nUnidadesCarro = 0;

        foreach ($objLista->listDetalle as $objDetalle) {
            if ($objDetalle->idCombo != null) {
                $nUnidadesCompra += $objDetalle->unidades;

                $objCombo = Combo::model()->find(array(
                    'with' => array('listProductos', 'listProductosCombo', 'listComboSectorCiudad'),
                    'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                    'params' => array(
                        ':combo' => $objDetalle->idCombo,
                        ':estado' => 1,
                        ':fecha' => $fecha->format('Y-m-d H:i:s'),
                        ':saldo' => 0,
                        ':ciudad' => $objSectorCiudad->codigoCiudad,
                        ':sector' => $objSectorCiudad->codigoSector,
                    )
                ));

                if ($objCombo === null) {
                    continue;
                }

                $objSaldo = $objCombo->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

                if ($objSaldo === null) {
                    continue;
                }

                if ($objDetalle->unidades > 0) {
                    $cantidadCarroUnidad = 0;
                    $position = Yii::app()->shoppingCartSalesman->itemAt($objCombo->getcodigo());

                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantity();
                    }

                    if ($cantidadCarroUnidad + $objDetalle->unidades <= $objSaldo->saldo) {
                        $objProductoCarro = new ProductoCarro($objCombo);
                        Yii::app()->shoppingCartSalesman->put($objProductoCarro, false, $objDetalle->unidades);
                        $nUnidadesCarro += $objDetalle->unidades;
                    }
                }
            } else if ($objDetalle->codigoProducto != null) {
                $nUnidadesCompra += $objDetalle->unidades;

                //agregar productos
                $objProducto = Producto::model()->find(array(
                    'with' => array(
                        'listSaldos' => array('condition' => '(listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                        'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                        'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                    ),
                    'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                    'params' => array(
                        ':activo' => 1,
                        ':codigo' => $objDetalle->codigoProducto,
                        ':ciudad' => $objSectorCiudad->codigoCiudad,
                        ':sector' => $objSectorCiudad->codigoSector,
                    ),
                ));

                if ($objProducto === null) {
                    continue;
                }

                $objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

                if ($objSaldo === null) {
                    continue;
                }

                $position = Yii::app()->shoppingCartSalesman->itemAt($objDetalle->codigoProducto);

                if ($objDetalle->unidades > 0) {
                    $cantidadCarroUnidad = 0;
                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantityUnit();
                    }

                    //si hay saldo, agrega a carro
                    if ($cantidadCarroUnidad + $objDetalle->unidades <= $objSaldo->saldoUnidad) {
                        $objProductoCarro = new ProductoCarro($objProducto);
                        Yii::app()->shoppingCartSalesman->put($objProductoCarro, false, $objDetalle->unidades);
                        $nUnidadesCarro += $objDetalle->unidades;
                    }
                }
            }
        }

        if ($nUnidadesCarro == 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Productos no disponibles'));
            Yii::app()->end();
        }

        $porcentajeCarro = floor(100 * ($nUnidadesCarro / $nUnidadesCompra));

        $canasta = 'canasta';

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial($canasta, null, true),
                'mensajeHTML' => $this->renderPartial('//common/mensajeHtml', array('mensaje' => "$porcentajeCarro% de lista agregada"), true),
            ),
        ));
        Yii::app()->end();
    }

    public function actionAgregarCombo() {
        $combo = Yii::app()->getRequest()->getPost('combo', null);
        $cantidad = Yii::app()->getRequest()->getPost('cantidad', null);

        if ($combo === null || $cantidad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
            Yii::app()->end();
        }

        $fecha = new DateTime;
        $objCombo = Combo::model()->find(array(
            'with' => array('listImagenesCombo', 'listProductos', 'listProductosCombo', 'listComboSectorCiudad'),
            'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
            'params' => array(
                ':combo' => $combo,
                ':estado' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':saldo' => 0,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            )
        ));

        if ($objCombo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        $objSaldo = $objCombo->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

        if ($objSaldo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        $cantidadCarroUnidad = 0;
        $position = Yii::app()->shoppingCartSalesman->itemAt($objCombo->getcodigo());

        if ($position !== null) {
            $cantidadCarroUnidad = $position->getQuantity();
        }

        if ($cantidadCarroUnidad + $cantidad > $objSaldo->saldo) {
            echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldo unidades"));
            Yii::app()->end();
        }

        $objProductoCarro = new ProductoCarro($objCombo);
        Yii::app()->shoppingCartSalesman->put($objProductoCarro, false, $cantidad);

        $canastaVista = "canasta";

        $mensajeCanasta = $this->renderPartial('_carroAgregado', null, true);

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial($canastaVista, null, true),
                'mensajeHTML' => $mensajeCanasta,
                'objetosCarro' => Yii::app()->shoppingCartSalesman->getCount()
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
        
        $objPagoForm = new FormaPagoVendedorForm;
        if (!$objPagoForm->tieneDomicilio($objSectorCiudad)) {
            echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento."));
            Yii::app()->end();
        }

        $cantidadCarroUnidad = 0;
        $cantidadCarroBodega = 0;
        $position = Yii::app()->shoppingCartSalesman->itemAt($producto);

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
                        //'response' => 'Cantidad no disponible para entrega ' . Yii::app()->shoppingCartSalesman->getDeliveryStored() . ' hrs'
                ));
                Yii::app()->end();
            }
        }

        $objProductoCarro = new ProductoCarro($objProducto);
        if ($cantidadUbicacion > 0) {
            Yii::app()->shoppingCartSalesman->put($objProductoCarro, false, $cantidadUbicacion);
        }

        if ($cantidadBodega > 0) {
            Yii::app()->shoppingCartSalesman->putStored($objProductoCarro, $cantidadBodega);
        }

        $mensajeCanasta = $this->renderPartial('_carroAgregado', null, true);
        $canastaVista = "canasta";

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial($canastaVista, null, true),
                'mensajeHTML' => $mensajeCanasta,
                'objetosCarro' => Yii::app()->shoppingCartSalesman->getCount()
            ),
        ));
        Yii::app()->end();
    }

    public function actionIndex($opcion = null) {
        $this->render('index', array('vistaCarro' => "/carro/carro", 'opcion' => $opcion));
        Yii::app()->end();
    }

    public function actionModificar() {
        $carroVista = "carro";
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'No se detecta ubicación',
                    'carroHTML' => $this->renderPartial($carroVista, null, true),
            )));
            Yii::app()->end();
        }

        $modificar = Yii::app()->getRequest()->getPost('modificar', null);
        $id = Yii::app()->getRequest()->getPost('position', null);

        if ($modificar === null || $id === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Solicitud inválida, no se detectan datos',
                    'carroHTML' => $this->renderPartial($carroVista, null, true)
            )));
            Yii::app()->end();
        }

        $position = Yii::app()->shoppingCartSalesman->itemAt($id);
        //!Yii::app()->shoppingCartSalesman->contains($id)

        if ($position === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Producto no agregado a carro',
                    'carroHTML' => $this->renderPartial($carroVista, null, true)
            )));
            Yii::app()->end();
        }

        if ($modificar == 1) {
            $this->modificarProducto($position, $objSectorCiudad);
        } else if ($modificar == 2) {
            $this->modificarCombo($position, $objSectorCiudad);
        } else if ($modificar == 3) {
            $this->modificarBodega($position, $objSectorCiudad);
        }

        echo CJSON::encode(array('result' => 'error', 'response' => array(
                'message' => 'Solicitud inválida',
                'carroHTML' => $this->renderPartial($carroVista, null, true)
        )));
        Yii::app()->end();
    }

    private function modificarProducto($position, $objSectorCiudad) {
        $cantidadU = Yii::app()->getRequest()->getPost('cantidadU', null);
        $cantidadF = Yii::app()->getRequest()->getPost('cantidadF', null);

        if ($cantidadU === null || $cantidadF === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Solicitud inválida, no se detectan datos',
                    'carroHTML' => $this->renderPartial("carro", null, true),
            )));
            Yii::app()->end();
        }

        if ($cantidadF < 0 && $cantidadU < 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Cantidad no válida',
                    'carroHTML' => $this->renderPartial("carro", null, true),
            )));
            Yii::app()->end();
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
                ':codigo' => $position->objProducto->codigoProducto,
                ':saldo' => 0,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            ),
        ));

        if ($objProducto === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Producto no disponible',
                    'carroHTML' => $this->renderPartial("carro", null, true),
            )));
            Yii::app()->end();
        }

        $objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

        if ($objSaldo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Producto no disponible',
                    'carroHTML' => $this->renderPartial("carro", null, true),
            )));
            Yii::app()->end();
        }

        $agregarU = false;
        $agregarF = false;

        if ($cantidadU >= 0) {
            //si hay saldo, agrega a carro, sino consulta bodega
            if ($cantidadU <= $objSaldo->saldoUnidad) {
                $agregarU = true;
            } else {
                $objPagoForm = new FormaPagoVendedorForm;
                if (!$objPagoForm->tieneDomicilio($this->objSectorCiudad)) {
                    echo CJSON::encode(array('result' => 'error', 'response' => array(
                            'message' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades",
                            'carroHTML' => $this->renderPartial("carro", null, true),
                    )));
                    Yii::app()->end();
                }

                $cantidadBodega = $cantidadU - $objSaldo->saldoUnidad;
                $cantidadUbicacion = $cantidadU - $cantidadBodega - $position->getQuantityUnit();

                //si hay en bodegas, mensaje para ver detalle bodega, sino, mensaje error
                $objSaldoBodega = ProductosSaldosCedi::model()->find(array(
                    'condition' => 'codigoProducto=:producto AND codigoCedi=:cedi AND saldoUnidad>=:saldo',
                    'params' => array(
                        ':producto' => $position->objProducto->codigoProducto,
                        ':cedi' => $objSectorCiudad->objCiudad->codigoSucursal,
                        ':saldo' => $cantidadBodega
                    )
                ));

                if ($objSaldoBodega === null) {
                    echo CJSON::encode(array('result' => 'error', 'response' => array(
                            'message' => "La cantidad solicitada no está disponible en este momento. No hay unidades disponibles",
                            'carroHTML' => $this->renderPartial("carro", null, true),
                    )));
                    Yii::app()->end();
                }

                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'carroHTML' => $this->renderPartial("carro", null, true),
                        'dialogoHTML' => $this->renderPartial('_carroBodega', array(
                            'objSaldo' => $objSaldo,
                            'objProducto' => $objProducto,
                            'cantidadUbicacion' => $cantidadUbicacion,
                            'cantidadBodega' => $cantidadBodega), true),
                    ),
                ));
                Yii::app()->end();
            }
        }

        if ($cantidadF >= 0) {
            if ($cantidadF <= $objSaldo->saldoFraccion) {
                $agregarF = true;
            } else {
                echo CJSON::encode(array('result' => 'error', 'response' => array(
                        'message' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoFraccion fracciones",
                        'carroHTML' => $this->renderPartial("carro", null, true),
                )));
                Yii::app()->end();
            }
        }

        if ($agregarU) {
            Yii::app()->shoppingCartSalesman->update($position, false, $cantidadU);
        }

        if ($agregarF) {
            Yii::app()->shoppingCartSalesman->update($position, true, $cantidadF);
        }

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial("canasta", null, true),
                'carroHTML' => $this->renderPartial("carro", null, true),
            ),
        ));
        Yii::app()->end();
    }

    private function modificarCombo($position, $objSectorCiudad) {
        $carroVista = "carro";

        $cantidad = Yii::app()->getRequest()->getPost('cantidad', null);

        if ($cantidad === null || $cantidad < 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Solicitud inválida, no se detectan datos',
                    'carroHTML' => $this->renderPartial($carroVista, null, true),
            )));
            Yii::app()->end();
        }

        $fecha = new DateTime;
        $objCombo = Combo::model()->find(array(
            'with' => array('listProductos', 'listProductosCombo', 'listComboSectorCiudad'),
            'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>=:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
            'params' => array(
                ':combo' => $position->objCombo->idCombo,
                ':estado' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                'saldo' => $cantidad,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            )
        ));

        if ($objCombo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => "La cantidad solicitada no está disponible en este momento. No hay combos disponibles",
                    'carroHTML' => $this->renderPartial($carroVista, null, true),
            )));
            Yii::app()->end();
        }

        Yii::app()->shoppingCartSalesman->update($position, false, $cantidad);

        $canastaVista = "canasta";

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial($canastaVista, null, true),
                'carroHTML' => $this->renderPartial($carroVista, null, true),
            ),
        ));
        Yii::app()->end();
    }

    private function modificarBodega($position, $objSectorCiudad) {
        $carroVista = "carro";
        
        $objPagoForm = new FormaPagoVendedorForm;
        if (!$objPagoForm->tieneDomicilio($this->objSectorCiudad)) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Solicitud inválida, entrega de bodega no disponible',
                    'carroHTML' => $this->renderPartial($carroVista, null, true),
            )));
            Yii::app()->end();
        }

        $cantidad = Yii::app()->getRequest()->getPost('cantidad', null);

        if ($cantidad === null || $cantidad < 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Solicitud inválida, no se detectan datos',
                    'carroHTML' => $this->renderPartial($carroVista, null, true),
            )));
            Yii::app()->end();
        }

        $objSaldoBodega = ProductosSaldosCedi::model()->find(array(
            'condition' => 'codigoProducto=:producto AND codigoCedi=:cedi AND saldoUnidad>=:saldo',
            'params' => array(
                ':producto' => $position->objProducto->codigoProducto,
                ':cedi' => $objSectorCiudad->objCiudad->codigoSucursal,
                ':saldo' => $cantidad
            )
        ));

        if ($objSaldoBodega === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'La cantidad solicitada no está disponible en este momento. No hay unidades disponibles',
                    'carroHTML' => $this->renderPartial($carroVista, null, true),
            )));
            Yii::app()->end();
        }

        Yii::app()->shoppingCartSalesman->updateStored($position, $cantidad);
        $canastaVista = "canasta";

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial($canastaVista, null, true),
                'carroHTML' => $this->renderPartial($carroVista, null, true),
            ),
        ));
        Yii::app()->end();
    }

    public function actionVacio() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        echo CJSON::encode(array('result' => 'ok', 'response' => Yii::app()->shoppingCartSalesman->isEmpty()));
        Yii::app()->end();
    }

    public function actionEliminar() {
        $id = Yii::app()->getRequest()->getPost('id', null);
        $eliminar = Yii::app()->getRequest()->getPost('eliminar', null);

        if ($id === null || $eliminar === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $position = Yii::app()->shoppingCartSalesman->itemAt($id);

        if ($position == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no agregado a carro'));
            Yii::app()->end();
        }

        if ($eliminar == 1) {
            Yii::app()->shoppingCartSalesman->update($position, false, 0);
        } else if ($eliminar == 2) {
            Yii::app()->shoppingCartSalesman->update($position, true, 0);
        } else if ($eliminar == 3) {
            Yii::app()->shoppingCartSalesman->updateStored($position, 0);
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        echo CJSON::encode(array(
            'result' => 'ok',
            'carro' => $this->renderPartial("carro", null, true),
            'canasta' => $this->renderPartial("canasta", null, true),
        ));
        Yii::app()->end();
    }

    public function actionVaciar() {
        Yii::app()->shoppingCartSalesman->clear();

        echo CJSON::encode(array(
            'result' => 'ok',
            'carro' => $this->renderPartial("carro", null, true),
            'canasta' => $this->renderPartial("canasta", null, true),
        ));
        Yii::app()->end();
    }

    public function actionPagar($paso = null, $post = false) {
        if (is_string($post)) {
            $post = ($post == "true");
        }
        
        if ($this->objSectorCiudad === null) {
            if ($post) {
                echo CJSON::encode(array('result' => 'ok', 'response' => 'Seleccionar ubicaci&oacute;n', 'redirect' => $this->createUrl('/vendedor/sitio/ubicacion')));
                Yii::app()->end();
            } else {
                Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
                $this->redirect($this->createUrl('/vendedor/sitio/ubicacion'));
                Yii::app()->end();
            }
        }
        
        $modelPago = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']];

            if ((!Yii::app()->controller->module->user->getClienteLogueado() && !$modelPago->pagoInvitado) || (Yii::app()->controller->module->user->getClienteLogueado() && $modelPago->pagoInvitado)) {
                $modelPago = null;
                Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = null;
            }
        }

        if (Yii::app()->shoppingCartSalesman->isEmpty()) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = null;

            if ($post) {
                echo CJSON::encode(array('result' => 'ok', 'response' => 'Carro vac&iacute;o', 'redirect' => $this->createUrl("/vendedor/carro/pagar")));
                Yii::app()->end();
            } else {
                $this->render('carroVacio'); //$this->render('index');
                Yii::app()->end();
            }
        }
        
        if (!Yii::app()->controller->module->user->getClienteLogueado() && !Yii::app()->controller->module->user->getIsClienteInvitado() && $modelPago == null) {
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['redireccionAutenticacion']] = $this->createAbsoluteUrl('pagar');
            $this->render('/vendedor/usuario/autenticar', array('pagar' => true));
            Yii::app()->end();
        }
        
        if ($modelPago == null) {
            $modelPago = new FormaPagoVendedorForm;
            $modelPago->isMobil = true;
            
            if (Yii::app()->controller->module->user->getIsClienteInvitado()) {
                $modelPago->identificacionUsuario = null;
                $modelPago->pagoInvitado = true;
            }else {
                $modelPago->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                $modelPago->pagoInvitado = false;
            }

            $modelPago->consultarHorario($this->objSectorCiudad);
            $modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
        }

        if ($modelPago->tipoEntrega == null) {
            $modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
        }

        //verificar si tiene domicilio
        if (!$modelPago->tieneDomicilio($this->objSectorCiudad)) {
            $modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['presencial'];
        }

        if (Yii::app()->controller->module->user->getIsClienteInvitado()) {
            $modelPago->pagoInvitado = true;
            $modelPago->identificacionUsuario = null;
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
            $this->pagarInvitadoMovil($paso, $post, $modelPago);
        } else {
            $this->pagarAutenticadoMovil($paso, $post, $modelPago);
        }
    }
    
    private function pagarAutenticadoMovil($paso, $post, $modelPago) {
        if ($paso === null)
            $paso = Yii::app()->params->pagar['pasos'][1];

        if (!in_array($paso, Yii::app()->params->pagar['pasosDisponibles']['domicilio'])) {
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
                case Yii::app()->params->pagar['pasos'][1]:
                    $form = new FormaPagoVendedorForm($paso);
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    //$form->objSectorCiudad = $modelPago->objSectorCiudad;
                    $form->tipoEntrega = $modelPago->tipoEntrega;

                    if (isset($_POST['FormaPagoVendedorForm'])) {
                        foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                        //$form->attributes = $_POST['FormaPagoVendedorForm'];
                    }

                    if ($form->validate()) {
                        $modelPago->tipoEntrega = $form->tipoEntrega;

                        if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                            $modelPago->indicePuntoVenta = $form->indicePuntoVenta;
                            $modelPago->seleccionarPdv($form->indicePuntoVenta);
                        }

                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][2]:
                    $form = new FormaPagoVendedorForm($paso);
                    $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->tipoEntrega = $modelPago->tipoEntrega;
                    $form->idDireccionDespacho = Yii::app()->getRequest()->getPost('direccion', null);
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    //$form->objSectorCiudad = $modelPago->objSectorCiudad;

                    if (isset($_POST['FormaPagoVendedorForm'])) {
                        foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                        //$form->attributes = $_POST['FormaPagoVendedorForm'];
                    }

                    if ($form->validate()) {
                        $modelPago->idDireccionDespacho = $form->idDireccionDespacho;
                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][3]:

                    $form = new FormaPagoVendedorForm($paso);
                    $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->tipoEntrega = $modelPago->tipoEntrega;
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    //$form->objSectorCiudad = $modelPago->objSectorCiudad;

                    if (isset($_POST['FormaPagoVendedorForm'])) {
                        foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                        //$form->attributes = $_POST['FormaPagoVendedorForm'];
                    }

                    if ($form->validate()) {
                        $modelPago->fechaEntrega = $form->fechaEntrega;
                        $modelPago->comentario = $form->comentario;
                        $modelPago->telefonoContacto = $form->telefonoContacto;
                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    $form = new FormaPagoVendedorForm($paso);
                    $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->tipoEntrega = $modelPago->tipoEntrega;
                    $form->bono = $modelPago->bono;
                    $form->totalCompra = $modelPago->totalCompra;
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    //$form->objSectorCiudad = $modelPago->objSectorCiudad;

                    if (isset($_POST['FormaPagoVendedorForm'])) {
                        foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                        //$form->attributes = $_POST['FormaPagoVendedorForm'];
                    }

                    if ($form->validate()) {
                        //$modelPago->attributes = $_POST['FormaPagoForm'];
                        $modelPago->idFormaPago = $form->idFormaPago;
                        $modelPago->numeroTarjeta = $form->numeroTarjeta;
                        $modelPago->cuotasTarjeta = $form->cuotasTarjeta;
                        $modelPago->usoBono = $form->usoBono;
                        //$modelPago->codigoCliente = $form->codigoCliente;
                        //$modelPago->codigoPromocion = $form->codigoPromocion;
                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][5]:
                    Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;

                    if ($siguiente == "finalizar") {
                        if (isset($_POST['FormaPagoVendedorForm'])) {
                            $form = new FormaPagoVendedorForm($paso);
                            $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                            $form->pagoInvitado = $modelPago->pagoInvitado;
                            $form->tipoEntrega = $modelPago->tipoEntrega;
                            $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                            //$form->objSectorCiudad = $modelPago->objSectorCiudad;

                            if (isset($_POST['FormaPagoVendedorForm'])) {
                                foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                                    $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                                }
                                //$form->attributes = $_POST['FormaPagoVendedorForm'];
                            }

                            if ($form->validate()) {
                                //$modelPago->attributes = $_POST['FormaPagoForm'];
                                $modelPago->confirmacion = $form->confirmacion;
                                $modelPago->pasoValidado[$paso] = $paso;
                                Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                                echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados", 'redirect' => $this->createUrl("carro/comprar")));
                                Yii::app()->end();
                            } else {
                                echo CActiveForm::validate($form);
                                Yii::app()->end();
                            }
                        } else {
                            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
                            Yii::app()->end();
                        }
                    }

                    echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                    Yii::app()->end();
                    break;
            }

            echo CJSON::encode(array('result' => 'error', 'response' => 'ERROR'));
            Yii::app()->end();
        } else {
            $this->fixedFooter = true;

            //validar pasos anteriores
            $modelPago->validarPasos(Yii::app()->params->pagar['pasosDisponibles']['domicilio'], $paso);

            $params = array();
            $params['paso'] = $paso;
            $params['parametros']['paso'] = $paso;

            $nPasoActual = Yii::app()->params->pagar['pasos'][$paso];
            $nPasoAnterior = $nPasoActual - 1;
            $nPasoSiguiente = $nPasoActual + 1;
            $pasoSiguiente = isset(Yii::app()->params->pagar['pasos'][$nPasoSiguiente]) ? Yii::app()->params->pagar['pasos'][$nPasoSiguiente] : null;
            $pasoAnterior = isset(Yii::app()->params->pagar['pasos'][$nPasoAnterior]) ? Yii::app()->params->pagar['pasos'][$nPasoAnterior] : null;

            $params['pasoAnterior'] = $pasoAnterior;
            $params['pasoSiguiente'] = $pasoSiguiente;
            $params['nPasoActual'] = $nPasoActual;

            switch ($paso) {
                case Yii::app()->params->pagar['pasos'][2]:
                    //Yii::app()->session[Yii::app()->params->sesion['direccionEntrega']]
                    $criteriaDireccion = array(
                        'condition' => 'identificacionUsuario=:cedula AND (codigoCiudad=:ciudad AND (codigoSector=:sector OR codigoSector=0)) AND activo=:activo',
                        'params' => array(
                            ':cedula' => Yii::app()->controller->module->user->getCedulaCliente(),
                            ':activo' => 1,
                            ':ciudad' => $this->objSectorCiudad->codigoCiudad,
                            ':sector' => $this->objSectorCiudad->codigoSector
                        )
                    );

                    if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['direccionEntrega']]) && Yii::app()->session[Yii::app()->params->vendedor['sesion']['direccionEntrega']] != null) {
                        //$criteriaDireccion['condition'] .= " AND idDireccionDespacho=:direccion";
                        //$criteriaDireccion['params'][':direccion'] = Yii::app()->session[Yii::app()->params->vendedor['sesion']['direccionEntrega']];
                        $modelPago->idDireccionDespacho = Yii::app()->session[Yii::app()->params->vendedor['sesion']['direccionEntrega']];
                    }

                    $listDirecciones = DireccionesDespacho::model()->findAll($criteriaDireccion);

                    $params['parametros']['listDirecciones'] = $listDirecciones;
                    break;
                case Yii::app()->params->pagar['pasos'][3]:
                    $params['parametros']['listHorarios'] = $modelPago->listDataHoras();
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    $listFormaPago = FormaPago::model()->findAll(array(
                        'order' => 'formaPago',
                        'condition' => 'estadoFormaPago=:estado AND  ventaVendedor=:ventavendedor',
                        'params' => array(':estado' => 1, ':ventavendedor' => 1)
                    ));

                    $modelPago->consultarBono(Yii::app()->shoppingCartSalesman->getTotalCost());
                    Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                    $params['parametros']['listFormaPago'] = $listFormaPago;

                    break;
                case Yii::app()->params->pagar['pasos'][5]:
                    $objDireccion = DireccionesDespacho::model()->findByPk($modelPago->idDireccionDespacho);
                    $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
                    $params['parametros']['objDireccion'] = $objDireccion;
                    $params['parametros']['objFormaPago'] = $objFormaPago;

                    Yii::app()->shoppingCartSalesman->setBono($modelPago->calcularBonoRedimido());
                    $modelPago->calcularConfirmacion(Yii::app()->shoppingCartSalesman->getPositions());
                    break;
            }

            $params['parametros']['modelPago'] = $modelPago;
            $this->render("pagar", $params);
        }
    }
    
    private function pagarInvitadoMovil($paso, $post, $modelPago) {
        if ($paso === null)
            $paso = Yii::app()->params->pagar['pasos'][1];

        if (!in_array($paso, Yii::app()->params->pagar['pasosDisponibles']['domicilio'])) {
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
                case Yii::app()->params->pagar['pasos'][1]:
                    $form = new FormaPagoVendedorForm($paso);
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    //$form->objSectorCiudad = $modelPago->objSectorCiudad;
                    $form->tipoEntrega = $modelPago->tipoEntrega;

                    if (isset($_POST['FormaPagoVendedorForm'])) {
                        foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                        //$form->attributes = $_POST['FormaPagoVendedorForm'];
                    }

                    if ($form->validate()) {
                        $modelPago->tipoEntrega = $form->tipoEntrega;

                        if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                            $modelPago->indicePuntoVenta = $form->indicePuntoVenta;
                            $modelPago->seleccionarPdv($form->indicePuntoVenta);
                        }

                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][2]:
                    $form = new FormaPagoVendedorForm($paso);
                    $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->tipoEntrega = $modelPago->tipoEntrega;
                    $form->idDireccionDespacho = Yii::app()->getRequest()->getPost('direccion', null);
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    //$form->objSectorCiudad = $modelPago->objSectorCiudad;

                    if (isset($_POST['FormaPagoVendedorForm'])) {
                        foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                        //$form->attributes = $_POST['FormaPagoVendedorForm'];
                    }

                    if ($form->validate()) {
                        if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
                            $modelPago->descripcion = $form->descripcion;
                            $modelPago->nombre = $form->nombre;
                            $modelPago->correoElectronico = $form->correoElectronico;
                            $modelPago->direccion = $form->direccion;
                            $modelPago->barrio = $form->barrio;
                            $modelPago->telefono = $form->telefono;
                            $modelPago->extension = $form->extension;
                            $modelPago->celular = $form->celular;
                        }
                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][3]:

                    $form = new FormaPagoVendedorForm($paso);
                    $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->tipoEntrega = $modelPago->tipoEntrega;
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    //$form->objSectorCiudad = $modelPago->objSectorCiudad;

                    if (isset($_POST['FormaPagoVendedorForm'])) {
                        foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                        //$form->attributes = $_POST['FormaPagoVendedorForm'];
                    }

                    if ($form->validate()) {
                        $modelPago->fechaEntrega = $form->fechaEntrega;
                        $modelPago->comentario = $form->comentario;
                        $modelPago->telefonoContacto = $form->telefonoContacto;
                        $modelPago->correoElectronicoContacto = $form->correoElectronicoContacto;
                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    $form = new FormaPagoVendedorForm($paso);
                    $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->tipoEntrega = $modelPago->tipoEntrega;
                    $form->bono = $modelPago->bono;
                    $form->totalCompra = $modelPago->totalCompra;
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    //$form->objSectorCiudad = $modelPago->objSectorCiudad;

                    if (isset($_POST['FormaPagoVendedorForm'])) {
                        foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                        //$form->attributes = $_POST['FormaPagoVendedorForm'];
                    }

                    if ($form->validate()) {
                        //$modelPago->attributes = $_POST['FormaPagoForm'];
                        $modelPago->idFormaPago = $form->idFormaPago;
                        $modelPago->numeroTarjeta = $form->numeroTarjeta;
                        $modelPago->cuotasTarjeta = $form->cuotasTarjeta;
                        $modelPago->usoBono = $form->usoBono;
                        //$modelPago->codigoCliente = $form->codigoCliente;
                        //$modelPago->codigoPromocion = $form->codigoPromocion;
                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][5]:
                    Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;

                    if ($siguiente == "finalizar") {
                        if (isset($_POST['FormaPagoVendedorForm'])) {
                            $form = new FormaPagoVendedorForm($paso);
                            $form->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();
                            $form->pagoInvitado = $modelPago->pagoInvitado;
                            $form->tipoEntrega = $modelPago->tipoEntrega;
                            $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                            //$form->objSectorCiudad = $modelPago->objSectorCiudad;

                            if (isset($_POST['FormaPagoVendedorForm'])) {
                                foreach ($_POST['FormaPagoVendedorForm'] as $atributo => $valor) {
                                    $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                                }
                                //$form->attributes = $_POST['FormaPagoVendedorForm'];
                            }

                            if ($form->validate()) {
                                $modelPago->confirmacion = $form->confirmacion;
                                $modelPago->pasoValidado[$paso] = $paso;
                                Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                                echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados", 'redirect' => $this->createUrl("carro/comprar")));
                                Yii::app()->end();
                            } else {
                                echo CActiveForm::validate($form);
                                Yii::app()->end();
                            }
                        } else {
                            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
                            Yii::app()->end();
                        }
                    }

                    echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("carro/pagar", array('paso' => $siguiente))));
                    Yii::app()->end();
                    break;
            }

            echo CJSON::encode(array('result' => 'error', 'response' => 'ERROR'));
            Yii::app()->end();
        } else {
            $this->fixedFooter = true;
            
            //validar pasos anteriores
            $modelPago->validarPasos(Yii::app()->params->pagar['pasosDisponibles']['domicilio'], $paso);

            $params = array();
            $params['paso'] = $paso;
            $params['parametros']['paso'] = $paso;

            $nPasoActual = Yii::app()->params->pagar['pasos'][$paso];
            $nPasoAnterior = $nPasoActual - 1;
            $nPasoSiguiente = $nPasoActual + 1;
            $pasoSiguiente = isset(Yii::app()->params->pagar['pasos'][$nPasoSiguiente]) ? Yii::app()->params->pagar['pasos'][$nPasoSiguiente] : null;
            $pasoAnterior = isset(Yii::app()->params->pagar['pasos'][$nPasoAnterior]) ? Yii::app()->params->pagar['pasos'][$nPasoAnterior] : null;

            $params['pasoAnterior'] = $pasoAnterior;
            $params['pasoSiguiente'] = $pasoSiguiente;
            $params['nPasoActual'] = $nPasoActual;

            switch ($paso) {
                case Yii::app()->params->pagar['pasos'][2]:
                    break;
                case Yii::app()->params->pagar['pasos'][3]:
                    $params['parametros']['listHorarios'] = $modelPago->listDataHoras();
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    $listFormaPago = FormaPago::model()->findAll(array(
                        'order' => 'formaPago',
                        'condition' => 'estadoFormaPago=:estado AND idFormaPago <> :credirebaja AND  ventaVendedor =:ventavendedor',
                        'params' => array(':estado' => 1, ':credirebaja' => Yii::app()->params->formaPago['idCredirebaja'], ':ventavendedor' => 1)
                    ));

                    $modelPago->consultarBono(Yii::app()->shoppingCart->getTotalCost());
                    Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;
                    $params['parametros']['listFormaPago'] = $listFormaPago;

                    break;
                case Yii::app()->params->pagar['pasos'][5]:
                    //$objDireccion = DireccionesDespacho::model()->findByPk($modelPago->idDireccionDespacho);
                    $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
                    $params['parametros']['objDireccion'] = null;
                    $params['parametros']['objFormaPago'] = $objFormaPago;

                    Yii::app()->shoppingCartSalesman->setBono($modelPago->calcularBonoRedimido());
                    $modelPago->calcularConfirmacion(Yii::app()->shoppingCartSalesman->getPositions());
                    break;
            }

            $params['parametros']['modelPago'] = $modelPago;
            $this->render("pagar", $params);
        }
    }

    public function actionComprar() {
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']];

        if ($modelPago === null) {
            Yii::app()->user->setFlash('error', "Error: Por favor verificar los datos de tu compra.");
            $this->redirect($this->createUrl('/carro'));
            Yii::app()->end();
        }

        $modelPago->totalCompra = Yii::app()->shoppingCartSalesman->getTotalCost();
        Yii::app()->shoppingCartSalesman->setBono($modelPago->calcularBonoRedimido());

        if (!in_array($modelPago->tipoEntrega, Yii::app()->params->entrega['listaTipos'])) {
            Yii::app()->user->setFlash('error', "Tipo de entrega inválido, por favor seleccionar tipo de entrega.");
            $this->redirect($this->createUrl('carro'));
        }

        //validaciones de compra
        if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
            $pasoValidacion = null;
            //se valida que cada paso este realizado
            $modelPago->validarConfirmacion(Yii::app()->shoppingCartSalesman->getPositions());
            $pasosDisponibles = Yii::app()->params->pagar['pasosDisponibles']['domicilio'];
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;

            foreach ($pasosDisponibles as $idx => $paso) {
                $modelPago->setScenario($paso);
                $form = new FormaPagoVendedorForm($paso);
                //$form->attributes = $modelPago->attributes;
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
                $this->redirect($this->createUrl('/vendedor/carro/pagar', $paramsValidacion));
                Yii::app()->end();
            }
        } else if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
            $pasoValidacion = null;
            //se valida que cada paso este realizado
            $modelPago->validarConfirmacion(Yii::app()->shoppingCartSalesman->getPositions());
            $pasosDisponibles = Yii::app()->params->pagar['pasosDisponibles']['domicilio'];
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = $modelPago;

            foreach ($pasosDisponibles as $idx => $paso) {
                $modelPago->setScenario($paso);
                $form = new FormaPagoVendedorForm($paso);
                //$form->attributes = $modelPago->attributes;
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
                $this->redirect($this->createUrl('/vendedor/carro/pagar'));
                Yii::app()->end();
            }
        } else {
            Yii::app()->user->setFlash('error', "Error: Por favor verificar los datos de tu compra. Tipo de entrega inv&aacute;lido.");
            $this->redirect($this->createUrl('/vendedor/carro/pagar'));
            Yii::app()->end();
        }

        //si ha llegado aqui, paso todas las validaciones y se puede proceder con proceso de compra
        if ($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
            $this->render('pasarela', array('pagoExpress' => $modelPago->pagoExpress, 'isMobil' => true));
            Yii::app()->end();
        }

        $resultCompra = $this->procesoCompra($modelPago, $modelPago->tipoEntrega);

        if ($resultCompra['result'] == 1) {
            $vistaCompraContenido = "compraContenido";

            Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']] = null;
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['compraInvitado']] = null;
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']] = null;

            $contenidoSitio = $this->renderPartial($vistaCompraContenido, array(
                'objCompra' => $resultCompra['response']['objCompra'],
                'modelPago' => $resultCompra['response']['modelPago'],
                'objCompraDireccion' => $resultCompra['response']['objCompraDireccion'],
                'objFormaPago' => $resultCompra['response']['objFormaPago'],
                'objFormasPago' => $resultCompra['response']['objFormasPago']), true);

            Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = null;
            Yii::app()->shoppingCartSalesman->clear();
            $this->render('compra', array(
                'contenido' => $contenidoSitio,
                'objCompra' => $resultCompra['response']['objCompra'],
            ));
            Yii::app()->end();
        } else {
            Yii::app()->user->setFlash('error', "Error al realizar compra, por favor intente de nuevo. " . $resultCompra['response']);
            if ($modelPago->pagoExpress) {
                $this->redirect($this->createUrl('carro'));
                Yii::app()->end();
            } else {
                $this->redirect($this->createUrl('carro/pagar'));
                Yii::app()->end();
            }
        }
    }

    private function procesoCompra(FormaPagoVendedorForm $modelPago, $tipoEntrega) {
        $categoriasCompra = array();
        $productosCompra = array();
        $transaction = Yii::app()->db->beginTransaction();
        try {
            Yii::app()->shoppingCartSalesman->setBono($modelPago->calcularBonoRedimido());

            //registrar compra compra
            $objCompra = new Compras;
            $objCompra->identificacionUsuario = ($modelPago->pagoInvitado ? null : $modelPago->identificacionUsuario);
            $objCompra->tipoEntrega = $tipoEntrega;
            $objCompra->idVendedor = Yii::app()->controller->module->user->id;
            $objCompra->codigoVendedor = Yii::app()->controller->module->user->code;

            //if($tipoEntrega==Yii::app()->params->entrega['tipo']['domicilio']){
            $objCompra->fechaEntrega = $modelPago->fechaEntrega;
            $objCompra->observacion = $modelPago->comentario;
            //}

            if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                $puntoVenta = $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta];
                $objCompra->idComercial = $puntoVenta[1];
            }

            if ($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
                $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['pendientePasarela'];
            } else {
                $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['subasta'];
            }

            $objCompra->idTipoVenta = 3;
            $objCompra->activa = 1;
            $objCompra->invitado = ($modelPago->pagoInvitado ? 1 : 0);
            $objCompra->codigoPerfil = Yii::app()->shoppingCartSalesman->getCodigoPerfil();
            $objCompra->codigoCiudad = Yii::app()->shoppingCartSalesman->getCodigoCiudad();
            $objCompra->codigoSector = Yii::app()->shoppingCartSalesman->getCodigoSector();

            if ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
                $objCompra->tiempoDomicilioCedi = Yii::app()->shoppingCartSalesman->getDeliveryStored();
                $objCompra->valorDomicilioCedi = Yii::app()->shoppingCartSalesman->getShippingStored();
                $objCompra->codigoCedi = Yii::app()->shoppingCartSalesman->objSectorCiudad->objCiudad->codigoSucursal;
            } else if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                $objCompra->tiempoDomicilioCedi = 0;
                $objCompra->valorDomicilioCedi = 0;
                $objCompra->codigoCedi = 0;
            }

            $objCompra->subtotalCompra = Yii::app()->shoppingCartSalesman->getCost();
            $objCompra->impuestosCompra = Yii::app()->shoppingCartSalesman->getTaxPrice();
            $objCompra->baseImpuestosCompra = Yii::app()->shoppingCartSalesman->getBaseTaxPrice();
            $objCompra->domicilio = Yii::app()->shoppingCartSalesman->getShipping();
            $objCompra->flete = Yii::app()->shoppingCartSalesman->getExtraShipping();
            $objCompra->totalCompra = Yii::app()->shoppingCartSalesman->getTotalCost();

            if (!$objCompra->save()) {
                throw new Exception("Error al guardar compra" . $objCompra->validateErrorsResponse());
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

            $objFormasPago = new FormasPago; //FormaPago::model()->findByPk($modelPago->idFormaPago);
            $objFormasPago->idCompra = $objCompra->idCompra;
            $objFormasPago->valor = Yii::app()->shoppingCartSalesman->getTotalCost();
            $objFormasPago->numeroTarjeta = $modelPago->numeroTarjeta;
            $objFormasPago->cuotasTarjeta = $modelPago->cuotasTarjeta;
            $objFormasPago->idFormaPago = $modelPago->idFormaPago;
            $objFormasPago->valorBono = Yii::app()->shoppingCartSalesman->getBono();

            if ($objFormasPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
                $numValidacion = substr(($objCompra->identificacionUsuario + $objCompra->idCompra + $objCompra->totalCompra) * 863, -7);
                $objFormasPago->numeroValidacion = $numValidacion;
            }

            if (!$objFormasPago->save()) {
                throw new Exception("Error al guardar forma de pago" . $objFormasPago->validateErrorsResponse());
            }

            $objCompraDireccion = new ComprasDireccionesDespacho;

            if ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {

                if ($modelPago->pagoInvitado) {
                    $objCompraDireccion->idCompra = $objCompra->idCompra;
                    $objCompraDireccion->descripcion = $modelPago->descripcion;
                    $objCompraDireccion->nombre = $modelPago->nombre;
                    $objCompraDireccion->direccion = $modelPago->direccion;
                    $objCompraDireccion->barrio = $modelPago->barrio;
                    $objCompraDireccion->telefono = $modelPago->telefono;
                    $objCompraDireccion->celular = $modelPago->celular;
                    $objCompraDireccion->codigoCiudad = Yii::app()->shoppingCartSalesman->getCodigoCiudad();
                    $objCompraDireccion->codigoSector = Yii::app()->shoppingCartSalesman->getCodigoSector();
                    $objCompraDireccion->correoElectronico = $modelPago->correoElectronico;
                } else {
                    $objDireccion = DireccionesDespacho::model()->findByPk($modelPago->idDireccionDespacho);

                    if ($objDireccion->codigoSector == 0 && Yii::app()->shoppingCartSalesman->getCodigoSector() != 0) {
                        $objDireccion->codigoSector = Yii::app()->shoppingCartSalesman->getCodigoSector();
                        $objDireccion->save();
                    }

                    $objCompraDireccion->idCompra = $objCompra->idCompra;
                    $objCompraDireccion->descripcion = $objDireccion->descripcion;
                    $objCompraDireccion->nombre = $objDireccion->nombre;
                    $objCompraDireccion->direccion = $objDireccion->direccion;
                    $objCompraDireccion->barrio = $objDireccion->barrio;
                    $objCompraDireccion->telefono = $objDireccion->telefono;
                    $objCompraDireccion->celular = $objDireccion->celular;
                    $objCompraDireccion->codigoCiudad = $objDireccion->codigoCiudad;
                    $objCompraDireccion->codigoSector = $objDireccion->codigoSector;
                    $objCompraDireccion->pdvAsignado = $objDireccion->pdvAsignado;
                }
            } else if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                $objCompraDireccion = new ComprasDireccionesDespacho;
                $objCompraDireccion->idCompra = $objCompra->idCompra;
                $objCompraDireccion->descripcion = "NA";
                $objCompraDireccion->nombre = "NA";
                $objCompraDireccion->direccion = "NA";
                $objCompraDireccion->barrio = "NA";
                $objCompraDireccion->telefono = $modelPago->telefonoContacto;

                if ($modelPago->pagoInvitado) {
                    $objCompraDireccion->correoElectronico = $modelPago->correoElectronicoContacto;
                }
            }

            if (!$objCompraDireccion->save()) {
                throw new Exception("Error al guardar dirección de compra" . $objCompraDireccion->validateErrorsResponse());
            }

            //generar puntos //--
            $listPuntosCompra = array();

            if (!$modelPago->pagoInvitado) {
                $fecha = new DateTime;
                $parametrosPuntos = array(
                    Yii::app()->params->puntos['categoria'] => Yii::app()->shoppingCartSalesman->getCategorias(),
                    Yii::app()->params->puntos['marca'] => Yii::app()->shoppingCartSalesman->getMarcas(),
                    Yii::app()->params->puntos['proveedor'] => Yii::app()->shoppingCartSalesman->getProveedores(),
                    Yii::app()->params->puntos['producto'] => Yii::app()->shoppingCartSalesman->getProductosCantidad(),
                    Yii::app()->params->puntos['monto'] => $objCompra->subtotalCompra,
                    Yii::app()->params->puntos['cedula'] => array(
                        'identificacionUsuario' => Yii::app()->controller->module->user->getCedulaCliente(),
                        'valor' => $objCompra->subtotalCompra),
                    Yii::app()->params->puntos['rango'] => array(
                        'fecha' => $fecha,
                        'valor' => $objCompra->subtotalCompra),
                    Yii::app()->params->puntos['cumpleanhos'] => array(
                        'fechaNacimiento' => Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']]->objUsuarioExtendida->fechaNacimiento,
                        'valor' => $objCompra->subtotalCompra),
                    Yii::app()->params->puntos['clientefielCompra'] => $objCompra->subtotalCompra,
                );
                $listPuntosCompra = ComprasPuntos::generarPuntos($fecha, Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']], $parametrosPuntos);
            }
            //-- generar puntos
            // guardar puntos  //--
            foreach ($listPuntosCompra as $objPuntoCompra) {
                $objPuntoCompra->idCompra = $objCompra->idCompra;
                if (!$objPuntoCompra->save()) {
                    throw new Exception("Error al guardar punto de compra $objPuntoCompra->idPunto. " . $objPuntoCompra->validateErrorsResponse());
                }
            }
            //-- guardar puntos //--
            //items de compra
            $positions = Yii::app()->shoppingCartSalesman->getPositions();
            foreach ($positions as $position) {
                if ($position->isProduct()) {
                    //actualizar saldo producto //--
                    $objSaldo = null;
                    if ($position->objProducto->tercero == 1) {
                        $objSaldo = ProductosSaldosTerceros::model()->find(array(
                            'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto',
                            'params' => array(
                                ':ciudad' => Yii::app()->shoppingCartSalesman->getCodigoCiudad(),
                                ':sector' => Yii::app()->shoppingCartSalesman->getCodigoSector(),
                                ':producto' => $position->objProducto->codigoProducto
                            )
                        ));
                    } else {
                        $objSaldo = ProductosSaldos::model()->find(array(
                            'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto',
                            'params' => array(
                                ':ciudad' => Yii::app()->shoppingCartSalesman->getCodigoCiudad(),
                                ':sector' => Yii::app()->shoppingCartSalesman->getCodigoSector(),
                                ':producto' => $position->objProducto->codigoProducto
                            )
                        ));
                    }

                    if ($objSaldo == null) {
                        throw new Exception("Producto " . $position->objProducto->codigoProducto . " no disponible");
                    }

                    if ($objSaldo->saldoUnidad < $position->getQuantityUnit()) {
                        throw new Exception("Producto " . $position->objProducto->codigoProducto . ". La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades");
                    }

                    if ($objSaldo->saldoFraccion < $position->getQuantity(true)) {
                        throw new Exception("Producto " . $position->objProducto->codigoProducto . ". La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoFraccion fracciones");
                    }

                    $objSaldo->saldoUnidad = $objSaldo->saldoUnidad - $position->getQuantityUnit();
                    $objSaldo->saldoFraccion = $objSaldo->saldoFraccion - $position->getQuantity(true);
                    $objSaldo->save();
                    //-- actualizar saldo producto
                    //actualizar saldo bodega //--
                    if ($position->getQuantityStored() > 0) {
                        $objSaldoBodega = ProductosSaldosCedi::model()->find(array(
                            'condition' => 'codigoCedi=:cedi AND codigoProducto=:producto',
                            'params' => array(
                                ':cedi' => Yii::app()->shoppingCartSalesman->getObjCiudad()->codigoSucursal,
                                ':producto' => $position->objProducto->codigoProducto
                            )
                        ));

                        if ($objSaldoBodega == null) {
                            throw new Exception("Producto " . $position->objProducto->codigoProducto . " no disponible en bodega");
                        }

                        if ($objSaldoBodega->saldoUnidad < $position->getQuantityStored()) {
                            throw new Exception("Producto " . $position->objProducto->codigoProducto . ". La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldoBodega->saldoUnidad unidades");
                        }

                        $objSaldoBodega->saldoUnidad = $objSaldoBodega->saldoUnidad - $position->getQuantityStored();
                        $objSaldoBodega->save();
                    }
                    //-- actualizar saldo bodega

                    $objItem = new ComprasItems;
                    $objItem->idCompra = $objCompra->idCompra;
                    $objItem->codigoProducto = $position->objProducto->codigoProducto;
                    $objItem->descripcion = $position->objProducto->descripcionProducto;
                    $objItem->presentacion = $position->objProducto->presentacionProducto;
                    $objItem->precioBaseUnidad = $position->getPrice(false, false);
                    $objItem->precioBaseFraccion = $position->getPrice(true, false);
                    $objItem->descuentoUnidad = $position->getDiscountPrice();
                    $objItem->descuentoFraccion = $position->getDiscountPrice(true);
                    $objItem->precioTotalUnidad = $position->getSumPriceUnit();
                    $objItem->precioTotalFraccion = $position->getSumPriceFraction(true);
                    $objItem->terceros = $position->objProducto->tercero;
                    $objItem->unidades = $position->getQuantityUnit();
                    $objItem->fracciones = $position->getQuantity(true);
                    $objItem->unidadesCedi = $position->getQuantityStored();
                    $objItem->codigoImpuesto = $position->objProducto->codigoImpuesto;
                    $objItem->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['activo'];
                    //$objItem->idEstadoItemTercero = null;
                    $objItem->flete = $position->getShipping();
                    $objItem->disponible = 1;

                    if ($objCompra->identificacionUsuario !== null) {
                        $categoriasCompra[] = "('" . $objCompra->identificacionUsuario . "','" . $position->objProducto->idCategoriaBI . "')";
                    }

                    $productosCompra[] = "('" . $position->objProducto->codigoProducto . "', '" . $position->objProducto->idCategoriaBI . "')";

                    if (!$objItem->save()) {
                        throw new Exception("Error al guardar item de compra $objItem->codigoProducto. " . $objItem->validateErrorsResponse());
                    }
                    
                    
                    foreach($modelPago->usoBono as $idx => $usoBono){
                        if($usoBono == 1 && $modelPago->bono[$idx]['modoUso'] == 2){
                            if($modelPago->bono[$idx]['codigoProducto'] ==  $objItem->codigoProducto){
                                
                                $beneficio = Beneficios::model()->find("idBeneficio = $idx");
                                
                                if($beneficio){
                                    $objBeneficioItem = new BeneficiosComprasItems;
                                    $objBeneficioItem->idBeneficio = $beneficio->idBeneficio;
                                    $objBeneficioItem->idBeneficioSincronizado = $beneficio->idBeneficioSincronizado;
                                    $objBeneficioItem->idCompraItem = $objItem->idCompraItem;
                                    $objBeneficioItem->tipo = $beneficio->tipo;
                                    $objBeneficioItem->fechaIni = $beneficio->fechaIni;
                                    $objBeneficioItem->fechaFin = $beneficio->fechaFin;
                                    $objBeneficioItem->dsctoUnid = $beneficio->dsctoUnid;
                                    $objBeneficioItem->dsctoFrac = $beneficio->dsctoFrac;
                                    $objBeneficioItem->vtaUnid = $beneficio->vtaUnid;
                                    $objBeneficioItem->vtaFrac = $beneficio->vtaFrac;
                                    $objBeneficioItem->pagoUnid = $beneficio->pagoUnid;
                                    $objBeneficioItem->pagoFrac = $beneficio->pagoFrac;
                                    $objBeneficioItem->cuentaCop = $beneficio->cuentaCop;
                                    $objBeneficioItem->nitCop = $beneficio->nitCop;
                                    $objBeneficioItem->porcCop = $beneficio->porcCop;
                                    $objBeneficioItem->cuentaProv = $beneficio->cuentaProv;
                                    $objBeneficioItem->nitProv = $beneficio->nitProv;
                                    $objBeneficioItem->porcProv = $beneficio->porcProv;
                                    $objBeneficioItem->promoFiel = $beneficio->promoFiel;
                                    $objBeneficioItem->mensaje = $beneficio->mensaje;
                                    $objBeneficioItem->swobligaCli = $beneficio->swobligaCli;
                                    $objBeneficioItem->fechaCreacionBeneficio = $beneficio->fechaCreacionBeneficio;
                                    
                                     if (!$objBeneficioItem->save()) {
                                        throw new Exception("Error al guardar beneficio de compra $objBeneficioItem->idCompraItem. " . $objBeneficioItem->validateErrorsResponse());
                                    }
                                }
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
                } else if ($position->isCombo()) {
                    $objSaldo = ComboSectorCiudad::model()->find(array(
                        'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND idCombo=:combo',
                        'params' => array(
                            ':ciudad' => Yii::app()->shoppingCartSalesman->getCodigoCiudad(),
                            ':sector' => Yii::app()->shoppingCartSalesman->getCodigoSector(),
                            ':combo' => $position->objCombo->idCombo
                        )
                    ));

                    if ($objSaldo == null) {
                        throw new Exception("Combo " . $position->objCombo->getCodigo() . " no disponible");
                    }

                    if ($objSaldo->saldo < $position->getQuantity()) {
                        throw new Exception("Combo " . $position->objCombo->getCodigo() . "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldo unidades");
                    }

                    $objSaldo->saldo = $objSaldo->saldo - $position->getQuantity();
                    $objSaldo->save();

                    foreach ($position->objCombo->listProductosCombo as $productoCombo) {
                        $objItem = new ComprasItems;
                        $objItem->idCompra = $objCompra->idCompra;
                        $objItem->idCombo = $position->objCombo->idCombo;
                        $objItem->codigoProducto = $productoCombo->objProducto->codigoProducto;
                        $objItem->descripcion = $productoCombo->objProducto->descripcionProducto;
                        $objItem->descripcionCombo = $position->objCombo->descripcionCombo;
                        $objItem->presentacion = $productoCombo->objProducto->presentacionProducto;
                        $objItem->precioBaseUnidad = $productoCombo->precio;
                        $objItem->precioBaseFraccion = 0;
                        $objItem->descuentoUnidad = 0;
                        $objItem->descuentoFraccion = 0;
                        $objItem->precioTotalUnidad = $productoCombo->precio * $position->getQuantity();
                        $objItem->precioTotalFraccion = 0;
                        $objItem->terceros = $productoCombo->objProducto->tercero;
                        $objItem->unidades = $position->getQuantity();
                        $objItem->fracciones = 0;
                        $objItem->unidadesCedi = 0;
                        $objItem->codigoImpuesto = $productoCombo->objProducto->codigoImpuesto;
                        $objItem->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['activo'];
                        //$objItem->idEstadoItemTercero = null;
                        $objItem->flete = $position->getShipping();
                        $objItem->disponible = 1;
                        if (!$objItem->save()) {
                            throw new Exception("Error al guardar item de compra $objItem->codigoProducto. " . $objItem->validateErrorsResponse());
                        }

                        if ($objCompra->identificacionUsuario !== null) {
                            $categoriasCompra[] = "('" . $objCompra->identificacionUsuario . "','" . $productoCombo->objProducto->idCategoriaBI . "')";
                        }

                        $productosCompra[] = "('" . $productoCombo->objProducto->codigoProducto . "', '" . $productoCombo->objProducto->idCategoriaBI . "')";
                    }
                }
            }

            $nombreUsuario = "NA";
            $correoUsuario = "NA";

            if ($modelPago->pagoInvitado) {
                if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
                    $nombreUsuario = $modelPago->nombre;
                    $correoUsuario = $modelPago->correoElectronico;
                } else if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                    $correoUsuario = $modelPago->correoElectronicoContacto;
                }
            } else {
                $objUsuario = Yii::app()->session[Yii::app()->params->vendedor['sesion']['cliente']];
                $nombreUsuario = $objUsuario->getNombreCompleto();
                $correoUsuario = $objUsuario->correoElectronico;
            }


            $objPasarelaEnvio = null;
            $asuntoCorreo = Yii::app()->params->asunto['pedidoRealizado'];

            if ($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
                $asuntoCorreo = Yii::app()->params->asunto['pedidoRealizadoPasarela'];

                $objPasarelaEnvio = new PasarelaEnvios;
                $objPasarelaEnvio->idCompra = $objCompra->idCompra;
                $objPasarelaEnvio->valor = $objCompra->totalCompra;
                $objPasarelaEnvio->iva = $objCompra->impuestosCompra;
                $objPasarelaEnvio->baseIva = $objCompra->baseImpuestosCompra;
                $objPasarelaEnvio->moneda = "COP";
                $objPasarelaEnvio->nombre = $nombreUsuario;
                $objPasarelaEnvio->identificacionUsuario = $objCompra->identificacionUsuario;
                $objPasarelaEnvio->tipoDocumento = 1;
                $objPasarelaEnvio->correoElectronico = $correoUsuario;

                if (!$objPasarelaEnvio->save()) {
                    throw new Exception("Error al guardar registro de pasarela. " . $objPasarelaEnvio->validateErrorsResponse());
                }

                $objObservacionPasarela = new ComprasObservaciones;
                $objObservacionPasarela->idCompra = $objCompra->idCompra;
                $objObservacionPasarela->observacion = "Pendiente pasarela ";
                $objObservacionPasarela->idOperador = 38;
                $objObservacionPasarela->notificarCliente = 0;

                if (!$objObservacionPasarela->save()) {
                    throw new Exception("Error al guardar observación" . $objObservacion->validateErrorsResponse());
                }
            }

            if (count($categoriasCompra) > 0) {
                $sql = "INSERT INTO t_ComprasUsuariosCategorias(identificacionUsuario, idCategoriaBI) VALUES " . implode(",", $categoriasCompra) . " ON DUPLICATE KEY UPDATE cantidad=cantidad+1";
                Yii::app()->db->createCommand($sql)->execute();
            }

            if (count($productosCompra) > 0) {
                $sql = "INSERT INTO t_ProductosVendidos(codigoProducto, idCategoriaBI) VALUES " . implode(",", $productosCompra) . " ON DUPLICATE KEY UPDATE cantidad=cantidad+1";
                Yii::app()->db->createCommand($sql)->execute();
            }

            $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
            $contenidoCorreo = $this->renderPartial('compraCorreo', array(
                'objCompra' => $objCompra,
                'modelPago' => $modelPago,
                'objCompraDireccion' => $objCompraDireccion,
                'objFormaPago' => $objFormaPago,
                'objFormasPago' => $objFormasPago,
                'nombreUsuario' => $nombreUsuario), true, true);
            $htmlCorreo = $this->renderPartial('/usuario/_correo', array('contenido' => $contenidoCorreo), true, true);

            try {
                sendHtmlEmail($correoUsuario, $asuntoCorreo, $htmlCorreo);
            } catch (Exception $ce) {
                Yii::log("Error enviando correo al registrar compra #$objCompra->idCompra\n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
            }

            $transaction->commit();

            if ($modelPago->idFormaPago != Yii::app()->params->formaPago['pasarela']['idPasarela']) {
                ini_set('default_socket_timeout', 5);
                $client = new SoapClient(null, array(
                    'location' => Yii::app()->params->webServiceUrl['remisionPosECommerce'],
                    'uri' => "",
                    'trace' => 1,
                    'connection_timeout' => 5,
                ));

                try {
                    $result = $client->__soapCall("CongelarCompraAutomatica", array('idPedido' => $objCompra->idCompra)); //763759, 763743
                    if (!empty($result) && $result[0] == 1) {
                        $objCompraRemision = Compras::model()->findByPk($objCompra->idCompra, array("with" => "objPuntoVenta"));
                        $contenidoCorreo = $this->renderPartial('application.modules.callcenter.views.pedido.compraCorreo', array('objCompra' => $objCompraRemision), true, true);
                        $htmlCorreo = $this->renderPartial('application.views.common.correo', array('contenido' => $contenidoCorreo), true, true);
                        try {
                            sendHtmlEmail($result[2], Yii::app()->params->asunto['pedidoRemitido'], $htmlCorreo);
                        } catch (Exception $ce) {
                            Yii::log("Error enviando correo de remision automatica #$objCompra->idCompra\n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
                        }
                    }
                } catch (SoapFault $exc) {
                    Yii::log("SoapFault WebService CongelarCompraAutomatica [compra: $objCompra->idCompra]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n" . $client->__getLastResponse(), CLogger::LEVEL_INFO, 'application');
                } catch (Exception $exc) {
                    Yii::log("Exception WebService CongelarCompraAutomatica [compra: $objCompra->idCompra]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
                }
            }

            /* if ($modelPago->bono !== null && $modelPago->usoBono == 1) {
              $objFormasPago->valorBono = $modelPago->bono['valor'];
              } */

            if ($objFormasPago->valorBono > 0) {
                $modelPago->actualizarBono($objCompra);
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

    public function actionCrearcotizacion() {
        $transaction = Yii::app()->db->beginTransaction();
        try {
            //registrar cotizacion
            $objCotizacion = new Cotizaciones;
            $objCotizacion->identificacionUsuario = Yii::app()->controller->module->user->getCedulaCliente();

            $objCotizacion->codigoPerfil = Yii::app()->shoppingCartSalesman->getCodigoPerfil();
            $objCotizacion->codigoCiudad = Yii::app()->shoppingCartSalesman->getCodigoCiudad();
            $objCotizacion->codigoSector = Yii::app()->shoppingCartSalesman->getCodigoSector();

            $objCotizacion->tiempoDomicilioCedi = Yii::app()->shoppingCartSalesman->getDeliveryStored();
            $objCotizacion->valorDomicilioCedi = Yii::app()->shoppingCartSalesman->getShippingStored();
            $objCotizacion->codigoCedi = Yii::app()->shoppingCartSalesman->objSectorCiudad->objCiudad->codigoSucursal;

            $objCotizacion->subtotalCompra = Yii::app()->shoppingCartSalesman->getCost();
            $objCotizacion->impuestosCompra = Yii::app()->shoppingCartSalesman->getTaxPrice();
            $objCotizacion->baseImpuestosCompra = Yii::app()->shoppingCartSalesman->getBaseTaxPrice();
            $objCotizacion->domicilio = Yii::app()->shoppingCartSalesman->getShipping();
            $objCotizacion->flete = Yii::app()->shoppingCartSalesman->getExtraShipping();
            $objCotizacion->totalCompra = Yii::app()->shoppingCartSalesman->getTotalCost();
            $objCotizacion->ahorroCompra = Yii::app()->shoppingCartSalesman->getDiscountPrice(true);

            if (!$objCotizacion->save()) {
                throw new Exception("Error al guardar cotizacion" . $objCotizacion->validateErrorsResponse());
            }

            //items de compra
            $positions = Yii::app()->shoppingCartSalesman->getPositions();
            foreach ($positions as $position) {
                if ($position->isProduct()) {
                    $objItem = new CotizacionesItems;
                    $objItem->idCotizacion = $objCotizacion->idCotizacion;
                    $objItem->codigoProducto = $position->objProducto->codigoProducto;
                    $objItem->descripcion = $position->objProducto->descripcionProducto;
                    $objItem->presentacion = $position->objProducto->presentacionProducto;
                    $objItem->precioBaseUnidad = $position->getPrice(false, false);
                    $objItem->precioBaseFraccion = $position->getPrice(true, false);
                    $objItem->descuentoUnidad = $position->getDiscountPrice();
                    $objItem->descuentoFraccion = $position->getDiscountPrice(true);
                    $objItem->precioTotalUnidad = $position->getSumPriceUnit();
                    $objItem->precioTotalFraccion = $position->getSumPriceFraction(true);
                    $objItem->terceros = $position->objProducto->tercero;
                    $objItem->unidades = $position->getQuantityUnit();
                    $objItem->fracciones = $position->getQuantity(true);
                    $objItem->unidadesCedi = $position->getQuantityStored();
                    $objItem->codigoImpuesto = $position->objProducto->codigoImpuesto;
                    $objItem->impuestosItem = $position->getTaxPrice(true);
                    $objItem->porcentajeImpuesto = $position->getTax();
                    $objItem->baseImpuestos = $position->getBaseTaxPrice(true);
                    $objItem->flete = $position->getShipping();
                    $objItem->tiempoEntrega = $position->getDelivery();

                    if (!$objItem->save()) {
                        throw new Exception("Error al guardar item de cotizacion $objItem->codigoProducto. " . $objItem->validateErrorsResponse());
                    }

                    //beneficios
                    foreach ($position->getBeneficios() as $objBeneficio) {
                        $objBeneficioItem = new BeneficiosCotizacionesItems;
                        $objBeneficioItem->idBeneficio = $objBeneficio->idBeneficio;
                        $objBeneficioItem->idBeneficioSincronizado = $objBeneficio->idBeneficioSincronizado;
                        $objBeneficioItem->idCotizacionItem = $objItem->idCotizacionItem;
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
                            throw new Exception("Error al guardar beneficio de cotizacion $objBeneficioItem->idCotizacionItem. " . $objBeneficioItem->validateErrorsResponse());
                        }
                    }
                } else if ($position->isCombo()) {
                    foreach ($position->objCombo->listProductosCombo as $productoCombo) {
                        $objItem = new CotizacionesItems;
                        $objItem->idCotizacion = $objCotizacion->idCotizacion;
                        $objItem->idCombo = $position->objCombo->idCombo;
                        $objItem->codigoProducto = $productoCombo->objProducto->codigoProducto;
                        $objItem->descripcion = $productoCombo->objProducto->descripcionProducto;
                        $objItem->descripcionCombo = $position->objCombo->descripcionCombo;
                        $objItem->presentacion = $productoCombo->objProducto->presentacionProducto;
                        $objItem->precioBaseUnidad = $productoCombo->precio;
                        $objItem->precioBaseFraccion = 0;
                        $objItem->descuentoUnidad = 0;
                        $objItem->descuentoFraccion = 0;
                        $objItem->precioTotalUnidad = $productoCombo->precio * $position->getQuantity();
                        $objItem->precioTotalFraccion = 0;
                        $objItem->terceros = $productoCombo->objProducto->tercero;
                        $objItem->unidades = $position->getQuantity();
                        $objItem->fracciones = 0;
                        $objItem->unidadesCedi = 0;
                        $objItem->codigoImpuesto = $productoCombo->objProducto->codigoImpuesto;
                        $objItem->impuestosItem = $position->getTaxPrice(true);
                        $objItem->porcentajeImpuesto = $position->getTax();
                        $objItem->baseImpuestos = $position->getBaseTaxPrice(true);
                        $objItem->flete = $position->getShipping();
                        if (!$objItem->save()) {
                            throw new Exception("Error al guardar item de cotizacion $objItem->codigoProducto. " . $objItem->validateErrorsResponse());
                        }
                    }
                }
            }

            $transaction->commit();

            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => 'Cotizaci&oacute;n creada'
            ));
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }

            echo CJSON::encode(array(
                'result' => 'error',
                'response' => $exc->getMessage()
            ));
        }
    }

    public function actionList() {
        //Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        //Yii::app()->shoppingCartSalesman->clear();
        //exit();
        //CVarDumper::dump(Yii::app()->shoppingCartSalesman->itemAt(91269), 2, true);
        //echo "<br/>";
        //echo "<br/>";

        echo "Descuento: " . Yii::app()->shoppingCartSalesman->getDiscountPrice();
        echo "<br/>";
        echo "ciudad: " . Yii::app()->shoppingCartSalesman->getCodigoCiudad();
        echo "<br/>";
        echo "sector: " . Yii::app()->shoppingCartSalesman->getCodigoSector();
        echo "<br/>";
        echo "perfil: " . Yii::app()->shoppingCartSalesman->getCodigoPerfil();
        echo "<br/>";
        echo "cantidad productos: " . Yii::app()->shoppingCartSalesman->getCount();
        echo "<br/>";
        echo "cantidad items: " . Yii::app()->shoppingCartSalesman->getItemsCount();
        echo "<br/>";
        echo "costo total: " . Yii::app()->shoppingCartSalesman->getCost();
        echo "<br/>";
        echo "costo total: " . Yii::app()->shoppingCartSalesman->getTotalCost();
        echo "<br/>";
        // echo "tiempo: " . Yii::app()->shoppingCartSalesman->getDelivery();
        //echo "<br/>";
        echo "servicio: " . Yii::app()->shoppingCartSalesman->getShipping();
        echo "<br/>";


        echo "<br/>";


        $positions = Yii::app()->shoppingCartSalesman->getPositions();
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

            if ($position->isProduct()) {
                echo "Es producto<br/>";
            }

            echo "<br/>";
        }
    }

    public function actionForm($limpiar = false) {
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']];

        CVarDumper::dump($modelPago, 10, true);
        echo "<br/><br/>RULES<br/><br/>";
        CVarDumper::dump($modelPago->rules(), 10, true);
        echo "<br/><br/>SCENARIO: " . $modelPago->getScenario();

        if ($limpiar)
            Yii::app()->session[Yii::app()->params->vendedor['sesion']['carroPagarForm']] = null;
    }

    /* public function actionPuntos(){
      $fecha = new DateTime;
      $parametrosPuntos = array(
      Yii::app()->params->puntos['categoria'] => Yii::app()->shoppingCartSalesman->getCategorias(),
      Yii::app()->params->puntos['marca'] => Yii::app()->shoppingCartSalesman->getMarcas(),
      Yii::app()->params->puntos['proveedor'] => Yii::app()->shoppingCartSalesman->getProveedores(),
      Yii::app()->params->puntos['producto'] => Yii::app()->shoppingCartSalesman->getProductosCantidad(),
      Yii::app()->params->puntos['monto'] => Yii::app()->shoppingCartSalesman->getTotalCost(),
      Yii::app()->params->puntos['cedula'] => Yii::app()->user->name,
      Yii::app()->params->puntos['rango'] => $fecha,
      Yii::app()->params->puntos['cumpleanhos'] => Yii::app()->session[Yii::app()->params->usuario['sesion']]->objUsuarioExtendida->fechaNacimiento,
      Yii::app()->params->puntos['clientefielCompra'] => Yii::app()->shoppingCartSalesman->getCost(),
      );

      echo "-- PARAMETROS --<br/>";
      CVarDumper::dump($parametrosPuntos,3,true);
      echo "<br/>-- PARAMETROS --<br/><br/>";

      $listPuntos = Puntos::generarPuntos($fecha,Yii::app()->session[Yii::app()->params->usuario['sesion']], $parametrosPuntos);

      echo "<br/><br/>-- PUNTOS --<br/><br/>";
      CVarDumper::dump($listPuntos,3,true);
      } */
}
