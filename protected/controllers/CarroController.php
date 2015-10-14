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
class CarroController extends Controller {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            array('application.filters.SessionControlFilter + index, pagoexpress, pagoinvitado, pagar, comprar'),
            'login + pagoexpress',
                //'access + autenticar, recordar, registro, restablecer',
                //'loginajax + agregar',
        );
    }

    public function filterLogin($filter) {
        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->user->loginUrl);
        }
        $filter->run();
    }

    public function filterAccess($filter) {
        if (!Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $filter->run();
    }

    public function filterLoginajax($filter) {
        if (Yii::app()->user->isGuest) {
            //$this->redirect(Yii::app()->user->loginUrl);
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta usuario autenticado, por favor iniciar sesión para poder agregar productos al carro'));
            //Yii::app()->end();
        }
        $filter->run();
    }

    public function actionAgregar() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
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
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
            'params' => array(
                ':activo' => 1,
                ':codigo' => $producto,
                ':saldo' => 0,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            ),
        ));

        if ($objProducto === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        $objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

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
                if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['presencial']) {
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
                        ':cedi' => $objSectorCiudad->objCiudad->codigoSucursal,
                        ':saldo' => $cantidadBodega
                    )
                ));

                if ($objSaldoBodega === null) {
                    echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
                    Yii::app()->end();
                }
                
                if($this->isMobile){
                    $htmlBodega=$this->renderPartial('_carroBodega', array(
                                'objSaldo' => $objSaldo,
                                'objProducto' => $objProducto,
                                'cantidadUbicacion' => $cantidadUbicacion,
                                'cantidadBodega' => $cantidadBodega), true);
                }else{
                    $htmlBodega=$this->renderPartial('_d_carroBodega', array(
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

        $mensajeCanasta="";
        if($this->isMobile){
            $mensajeCanasta=$this->renderPartial('_carroAgregado', null, true);
        }else{
            $mensajeCanasta=$this->renderPartial('_d_carroAgregado', 
                    array( 'objProducto' => $objProducto), true);
        }
        
        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'relacionados' => $objProducto->tieneRelacionados(),
                'canastaHTML' => $this->renderPartial('canasta', null, true),
                'mensajeHTML' => $mensajeCanasta,
                'objetosCarro'=>Yii::app()->shoppingCart->getCount()
            ),
            
        ));
        Yii::app()->end();
    }

    public function actionAgregarcompra() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Seleccionar ubicaci&oacute;n.'));
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
                ':usuario' => Yii::app()->user->name
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
                            ':ciudad' => $objSectorCiudad->codigoCiudad,
                            ':sector' => $objSectorCiudad->codigoSector,
                        )
                    ));

                    if ($objCombo === null) {
                        $agregadoCompleto = false;
                        continue;
                    }

                    $objSaldo = $objCombo->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

                    if ($objSaldo === null) {
                        $agregadoCompleto = false;
                        continue;
                    }

                    $cantidadCarroUnidad = 0;
                    $position = Yii::app()->shoppingCart->itemAt($objCombo->getcodigo());

                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantity();
                    }

                    if ($cantidadCarroUnidad + $objItem->unidades <= $objSaldo->saldo) {
                        $objProductoCarro = new ProductoCarro($objCombo);
                        Yii::app()->shoppingCart->put($objProductoCarro, false, $objItem->unidades);
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
                        ':ciudad' => $objSectorCiudad->codigoCiudad,
                        ':sector' => $objSectorCiudad->codigoSector,
                    ),
                ));

                if ($objProducto === null) {
                    $agregadoCompleto = false;
                    continue;
                }

                $objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

                if ($objSaldo === null) {
                    $agregadoCompleto = false;
                    continue;
                }

                $position = Yii::app()->shoppingCart->itemAt($objItem->codigoProducto);

                if ($objItem->unidades > 0) {
                    $cantidadCarroUnidad = 0;
                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantityUnit();
                    }

                    //si hay saldo, agrega a carro
                    if ($cantidadCarroUnidad + $objItem->unidades <= $objSaldo->saldoUnidad) {
                        $objProductoCarro = new ProductoCarro($objProducto);
                        Yii::app()->shoppingCart->put($objProductoCarro, false, $objItem->unidades);
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
                        Yii::app()->shoppingCart->put($objProductoCarro, true, $objItem->fracciones);
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
                            ':cedi' => $objSectorCiudad->objCiudad->codigoSucursal,
                            ':saldo' => $objItem->unidadesCedi + $cantidadCarroBodega
                        )
                    ));

                    if ($objSaldoBodega === null) {
                        $agregadoCompleto = false;
                    } else {
                        $objProductoCarro = new ProductoCarro($objProducto);
                        Yii::app()->shoppingCart->putStored($objProductoCarro, $objItem->unidadesCedi);
                        $agregadoItem = true;
                        $nUnidadesCarro += $objItem->unidadesCedi;
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
        if(!$this->isMobile)
        {
            //$canasta = 'd_canasta';
        }

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial($canasta, null, true),
                'mensajeHTML' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => "$porcentajeCarro% de lista agregada"), true),
            ),
        ));
        Yii::app()->end();
    }
    
    public function actionAgregarcotizacion() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
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
                ':usuario' => Yii::app()->user->name,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':ciudad' => Yii::app()->shoppingCart->getCodigoCiudad(),
                ':sector' => Yii::app()->shoppingCart->getCodigoSector()
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
                            ':ciudad' => $objSectorCiudad->codigoCiudad,
                            ':sector' => $objSectorCiudad->codigoSector,
                        )
                    ));

                    if ($objCombo === null) {
                        $agregadoCompleto = false;
                        continue;
                    }

                    $objSaldo = $objCombo->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

                    if ($objSaldo === null) {
                        $agregadoCompleto = false;
                        continue;
                    }

                    $cantidadCarroUnidad = 0;
                    $position = Yii::app()->shoppingCart->itemAt($objCombo->getcodigo());

                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantity();
                    }

                    if ($cantidadCarroUnidad + $objItem->unidades <= $objSaldo->saldo) {
                        $objProductoCarro = new ProductoCarro($objCombo);
                        Yii::app()->shoppingCart->put($objProductoCarro, false, $objItem->unidades);
                        
                        //calcular precio combo
                        $precioCombo = 0;
                        foreach ($objCotizacion->listCotizacionItems as $objItemAux) {
                            if($objItem->idCombo==$objItemAux->idCombo){
                                $precioCombo += $objItemAux->precioBaseUnidad;
                            }
                        }
                        
                        $objProductoCarro->setPriceUnit($precioCombo);
                        Yii::app()->shoppingCart->updatePosition($objProductoCarro);
                        
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
                        ':ciudad' => $objSectorCiudad->codigoCiudad,
                        ':sector' => $objSectorCiudad->codigoSector,
                    ),
                ));

                if ($objProducto === null) {
                    $agregadoCompleto = false;
                    continue;
                }

                $objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

                if ($objSaldo === null) {
                    $agregadoCompleto = false;
                    continue;
                }

                $position = Yii::app()->shoppingCart->itemAt($objItem->codigoProducto);
                $objProductoCarro = new ProductoCarro($objProducto);

                if ($objItem->unidades > 0) {
                    $cantidadCarroUnidad = 0;
                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantityUnit();
                    }

                    //si hay saldo, agrega a carro
                    if ($cantidadCarroUnidad + $objItem->unidades <= $objSaldo->saldoUnidad) {
                        Yii::app()->shoppingCart->put($objProductoCarro, false, $objItem->unidades);
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
                        Yii::app()->shoppingCart->put($objProductoCarro, true, $objItem->fracciones);
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
                        Yii::app()->shoppingCart->putStored($objProductoCarro, $objItem->unidadesCedi);
                        $agregadoItem = true;
                        $nUnidadesCarro += $objItem->unidadesCedi;
                    }
                    
                    if($agregadoItem){
                        $objProductoCarro->setPriceUnit($objItem->precioBaseUnidad);
                        $objProductoCarro->setPriceFraction($objItem->precioBaseFraccion);
                        $objProductoCarro->setDiscountPriceUnit($objItem->descuentoUnidad);
                        $objProductoCarro->setDiscountPriceFraction($objItem->descuentoFraccion);
                        $objProductoCarro->setTax($objItem->porcentajeImpuesto);
                        $objProductoCarro->setDelivery($objItem->tiempoEntrega);
                        $objProductoCarro->setShipping($objItem->flete);
                        
                        /*$listBeneficios = array();
                        foreach($objItem->listBeneficios as $objBeneficio){
                            
                        }*/
                        
                        $objProductoCarro->setBeneficios($objItem->listBeneficios);
                        
                        Yii::app()->shoppingCart->updatePosition($objProductoCarro);
                    }
                }
            }
            
            //$position->setPriceUnit(1000);
            //Yii::app()->shoppingCart->updatePosition($position);
        }

        if ($nUnidadesCarro == 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Productos no disponibles'));
            Yii::app()->end();
        }

        $porcentajeCarro = floor(100 * ($nUnidadesCarro / $nUnidadesCompra));

        $canasta = 'canasta';
        if(!$this->isMobile)
        {
            //$canasta = 'd_canasta';
        }


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
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

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
                ':usuario' => Yii::app()->user->name
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
                    $position = Yii::app()->shoppingCart->itemAt($objCombo->getcodigo());

                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantity();
                    }

                    if ($cantidadCarroUnidad + $objDetalle->unidades <= $objSaldo->saldo) {
                        $objProductoCarro = new ProductoCarro($objCombo);
                        Yii::app()->shoppingCart->put($objProductoCarro, false, $objDetalle->unidades);
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

                $position = Yii::app()->shoppingCart->itemAt($objDetalle->codigoProducto);

                if ($objDetalle->unidades > 0) {
                    $cantidadCarroUnidad = 0;
                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantityUnit();
                    }

                    //si hay saldo, agrega a carro
                    if ($cantidadCarroUnidad + $objDetalle->unidades <= $objSaldo->saldoUnidad) {
                        $objProductoCarro = new ProductoCarro($objProducto);
                        Yii::app()->shoppingCart->put($objProductoCarro, false, $objDetalle->unidades);
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

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial('canasta', null, true),
                'mensajeHTML' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => "$porcentajeCarro% de lista agregada"), true),
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
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
            Yii::app()->end();
        }

        $fecha = new DateTime;
        $objCombo = Combo::model()->find(array(
            'with' => array('listProductos', 'listProductosCombo', 'listComboSectorCiudad'),
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
        $position = Yii::app()->shoppingCart->itemAt($objCombo->getcodigo());

        if ($position !== null) {
            $cantidadCarroUnidad = $position->getQuantity();
        }

        if ($cantidadCarroUnidad + $cantidad > $objSaldo->saldo) {
            echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldo unidades"));
            Yii::app()->end();
        }

        $objProductoCarro = new ProductoCarro($objCombo);
        Yii::app()->shoppingCart->put($objProductoCarro, false, $cantidad);

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial('canasta', null, true),
                'mensajeHTML' => $this->renderPartial('_carroAgregado', null, true),
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

        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
            Yii::app()->end();
        }

        $cantidadCarroUnidad = 0;
        $cantidadCarroBodega = 0;
        $position = Yii::app()->shoppingCart->itemAt($producto);

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
                    'response'=>"La cantidad solicitada no está disponible en este momento. No hay unidades disponibles",
                    //'response' => 'Cantidad no disponible para entrega ' . Yii::app()->shoppingCart->getDeliveryStored() . ' hrs'
                ));
                Yii::app()->end();
            }
        }

        $objProductoCarro = new ProductoCarro($objProducto);
        if ($cantidadUbicacion > 0) {
            Yii::app()->shoppingCart->put($objProductoCarro, false, $cantidadUbicacion);
        }

        if ($cantidadBodega > 0) {
            Yii::app()->shoppingCart->putStored($objProductoCarro, $cantidadBodega);
        }

        $mensajeCanasta="";
        if($this->isMobile){
            $mensajeCanasta=$this->renderPartial('_carroAgregado', null, true);
        }else{
            $mensajeCanasta=$this->renderPartial('_d_carroAgregado', 
                    array('objProducto' => $objProducto), true);
        }
        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial('canasta', null, true),
                'mensajeHTML' => $mensajeCanasta,
                'objetosCarro'=>Yii::app()->shoppingCart->getCount()
            ),
        ));
        Yii::app()->end();
    }

    /* public function actionCanasta() {
      $this->render('canasta');
      } */

    public function actionIndex() {
        $this->render('index');
        Yii::app()->end();
    }

    public function actionModificar() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'No se detecta ubicación',
                    'carroHTML' => $this->renderPartial('carro', null, true),
            )));
            Yii::app()->end();
        }

        $modificar = Yii::app()->getRequest()->getPost('modificar', null);
        $id = Yii::app()->getRequest()->getPost('position', null);

        if ($modificar === null || $id === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Solicitud inválida, no se detectan datos',
                    'carroHTML' => $this->renderPartial('carro', null, true)
            )));
            Yii::app()->end();
        }

        $position = Yii::app()->shoppingCart->itemAt($id);
        //!Yii::app()->shoppingCart->contains($id)

        if ($position === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Producto no agregado a carro',
                    'carroHTML' => $this->renderPartial('carro', null, true)
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
                'carroHTML' => $this->renderPartial('carro', null, true)
        )));
        Yii::app()->end();
    }

    private function modificarProducto($position, $objSectorCiudad) {
        $cantidadU = Yii::app()->getRequest()->getPost('cantidadU', null);
        $cantidadF = Yii::app()->getRequest()->getPost('cantidadF', null);

        if ($cantidadU === null || $cantidadF === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        if ($cantidadF < 0 && $cantidadU < 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no válida'));
            Yii::app()->end();
        }

        $objProducto = Producto::model()->find(array(
            'with' => array(
                'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
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
                    'carroHTML' => $this->renderPartial('carro', null, true),
            )));
            Yii::app()->end();
        }

        $objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

        if ($objSaldo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Producto no disponible',
                    'carroHTML' => $this->renderPartial('carro', null, true),
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
                if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['presencial']) {
                    echo CJSON::encode(array('result' => 'error', 'response' => array(
                            'message' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades",
                            'carroHTML' => $this->renderPartial('carro', null, true),
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
                            'carroHTML' => $this->renderPartial('carro', null, true),
                    )));
                    Yii::app()->end();
                }

                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'carroHTML' => $this->renderPartial('carro', null, true),
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
                        'carroHTML' => $this->renderPartial('carro', null, true),
                )));
                Yii::app()->end();
            }
        }

        if ($agregarU) {
            Yii::app()->shoppingCart->update($position, false, $cantidadU);
        }

        if ($agregarF) {
            Yii::app()->shoppingCart->update($position, true, $cantidadF);
        }

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial('canasta', null, true),
                'carroHTML' => $this->renderPartial('carro', null, true),
            ),
        ));
        Yii::app()->end();
    }

    private function modificarCombo($position, $objSectorCiudad) {
        $cantidad = Yii::app()->getRequest()->getPost('cantidad', null);

        if ($cantidad === null || $cantidad < 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Solicitud inválida, no se detectan datos',
                    'carroHTML' => $this->renderPartial('carro', null, true),
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
                    'carroHTML' => $this->renderPartial('carro', null, true),
            )));
            Yii::app()->end();
        }

        Yii::app()->shoppingCart->update($position, false, $cantidad);

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial('canasta', null, true),
                'carroHTML' => $this->renderPartial('carro', null, true),
            ),
        ));
        Yii::app()->end();
    }

    private function modificarBodega($position, $objSectorCiudad) {
        $cantidad = Yii::app()->getRequest()->getPost('cantidad', null);

        if ($cantidad === null || $cantidad < 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Solicitud inválida, no se detectan datos',
                    'carroHTML' => $this->renderPartial('carro', null, true),
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
            echo CJSON::encode(array(
                'result' => 'error', 
                'response' => "La cantidad solicitada no está disponible en este momento. No hay unidades disponibles"));
            Yii::app()->end();
        }

        Yii::app()->shoppingCart->updateStored($position, $cantidad);

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial('canasta', null, true),
                'carroHTML' => $this->renderPartial('carro', null, true),
            ),
        ));
        Yii::app()->end();
    }
    
    public function actionVacio(){
         if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }
        
        echo CJSON::encode(array('result' => 'ok', 'response' => Yii::app()->shoppingCart->isEmpty()));
        Yii::app()->end();
    }

    public function actionEliminar() {
        $id = Yii::app()->getRequest()->getPost('id', null);
        $eliminar = Yii::app()->getRequest()->getPost('eliminar', null);

        if ($id === null || $eliminar === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $position = Yii::app()->shoppingCart->itemAt($id);

        if ($position == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no agregado a carro'));
            Yii::app()->end();
        }
        
        if ($eliminar == 1) {
            Yii::app()->shoppingCart->update($position, false, 0);
        } else if ($eliminar == 2) {
            Yii::app()->shoppingCart->update($position, true, 0);
        } else if ($eliminar == 3) {
            Yii::app()->shoppingCart->updateStored($position, 0);
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        echo CJSON::encode(array(
            'result' => 'ok',
            'carro' => $this->renderPartial('carro', null, true),
            'canasta' => $this->renderPartial('canasta', null, true),
        ));
        Yii::app()->end();
    }
    
    public function actionVaciar() {
        Yii::app()->shoppingCart->clear();

        echo CJSON::encode(array(
            'result' => 'ok',
            'carro' => $this->renderPartial('carro', null, true),
            'canasta' => $this->renderPartial('canasta', null, true),
        ));
        Yii::app()->end();
    }

    public function actionPagoexpress() {
        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
            $this->redirect($this->createUrl('/sitio/ubicacion'));
        }

        if (Yii::app()->shoppingCart->isEmpty()) {
            $this->render('carroVacio');//$this->render('index');
            Yii::app()->end();
        }

        if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != Yii::app()->params->entrega['tipo']['domicilio']) {
            Yii::app()->user->setFlash('error', "Tipo de entrega no válido");
            $this->redirect($this->createUrl('/carro'));
        }

        $objPagoExpress = PagoExpress::model()->find(array(
            'with' => array('objDireccionDespacho' => array('condition' => 'objDireccionDespacho.codigoCiudad=:ciudad AND objDireccionDespacho.codigoSector=:sector')),
            'condition' => 't.identificacionUsuario=:cedula AND t.activo=:activo',
            'params' => array(
                ':cedula' => Yii::app()->user->name,
                ':activo' => 1,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector
            )
        ));

        if ($objPagoExpress === null) {
            Yii::app()->user->setFlash('error', "No se detecta pago express");
            $this->redirect($this->createUrl('/carro'));
        }

        $modelPago = new FormaPagoForm;
        $modelPago->identificacionUsuario = Yii::app()->user->name;
        $modelPago->consultarHorario($objSectorCiudad);
        $listHoras = $modelPago->listDataHoras();

        if (empty($listHoras)) {
            Yii::app()->user->setFlash('error', "No hay horario de entrega disponible");
            $this->redirect($this->createUrl('/carro'));
        }

        $modelPago->fechaEntrega = $listHoras[0]['fecha'];
        $modelPago->numeroTarjeta = $objPagoExpress->numeroTarjeta;
        $modelPago->cuotasTarjeta = $objPagoExpress->cuotasTarjeta;
        $modelPago->idFormaPago = $objPagoExpress->idFormaPago;
        $modelPago->idDireccionDespacho = $objPagoExpress->idDireccionDespacho;
        
        $modelPago->pasoValidado[Yii::app()->params->pagar['pasos'][1]] = Yii::app()->params->pagar['pasos'][1];
        $modelPago->pasoValidado[Yii::app()->params->pagar['pasos'][2]] = Yii::app()->params->pagar['pasos'][2];
        $modelPago->pasoValidado[Yii::app()->params->pagar['pasos'][3]] = Yii::app()->params->pagar['pasos'][3];
        
        $modelPago->calcularConfirmacion(Yii::app()->shoppingCart->getPositions());

        if ($modelPago->confirmacion == null) {
            $objDireccion = DireccionesDespacho::model()->findByPk($modelPago->idDireccionDespacho);
            $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
            $params['objDireccion'] = $objDireccion;
            $params['objFormaPago'] = $objFormaPago;
            $params['modelPago'] = $modelPago;
            $modelPago->pagoExpress = true;
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
            $this->render('_paso4', $params);
            Yii::app()->end();
        } else {
            //$this->comprarExpress($modelPago);
            $modelPago->pagoExpress = true;
            $modelPago->pasoValidado[Yii::app()->params->pagar['pasos'][4]] = Yii::app()->params->pagar['pasos'][4];
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
            $this->actionComprar();
        }
    }

    public function verficiarDomicilio($objSectorCiudad, $tipoEntrega){
         if ($tipoEntrega != Yii::app()->params->entrega['tipo']['presencial']) {
            $objHorarioSecCiud = HorariosCiudadSector::model()->find(array(
                'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector',
                'params' => array(
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            ));

            if($objHorarioSecCiud!=null && $objHorarioSecCiud->sadCiudadSector==0){
                Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] = Yii::app()->params->entrega['tipo']['presencial'];
                Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
            }
        }
    }
    
    public function actionPagoinvitado(){
        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        $modelPago = new FormaPagoForm;
        $modelPago->identificacionUsuario = Yii::app()->user->name;
        $modelPago->pagoInvitado = true;
        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
        $this->actionPagar();
    }
    
    public function actionPagar($paso = null, $post = false, $cambio = false) {
        if(is_string($post)){
            $post = ($post=="true");
        }
        
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            if($post){
                echo CJSON::encode(array('result' => 'ok', 'response' => 'Seleccionar ubicaci&oacute;n', 'redirect' => $this->createUrl('/sitio/ubicacion')));
                Yii::app()->end();
            }else{
                Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
                $this->redirect($this->createUrl('/sitio/ubicacion'));
                Yii::app()->end();
            }
        }
        
        $modelPago = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null){
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];
            
            if((Yii::app()->user->isGuest && !$modelPago->pagoInvitado) || (!Yii::app()->user->isGuest && $modelPago->pagoInvitado)){
                $modelPago = null;
                Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
            }
        }
        
        $tipoEntrega = null;

        if ($cambio) {
            Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] = Yii::app()->params->entrega['tipo']['domicilio'];
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
            $paso = null;
            $post = false;
        }
        
        if (Yii::app()->shoppingCart->isEmpty()) {
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
            
            if($post){
                echo CJSON::encode(array('result' => 'ok', 'response' => 'Carro vac&iacute;o', 'redirect' => $this->createUrl("/carro/pagar")));
                Yii::app()->end();
            }else{
                $this->render('carroVacio');//$this->render('index');
                Yii::app()->end();
            }
        }

        if (Yii::app()->user->isGuest && $modelPago == null) {
            Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = $this->createAbsoluteUrl('pagar');
            $this->render('/usuario/autenticar', array('pagar' => true));
            Yii::app()->end();
        }

        if (isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != null)
            $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];
        
        $this->verficiarDomicilio($objSectorCiudad, $tipoEntrega);

        if ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
            $this->pagarDomicilio($paso, $post);
        } else if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
            $this->pagarPresencial($paso, $post);
        } else {
            $this->redirect($this->createUrl('/sitio'));
        }
    }

    public function pagarDomicilio($paso, $post) {
        $modelPago = null;

        if ($paso === null)
            $paso = Yii::app()->params->pagar['pasos'][1];

        if (!in_array($paso, Yii::app()->params->pagar['pasosDisponibles']['domicilio'])) {
            throw new CHttpException(404, 'Página solicitada no existe.');
        }

        $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];
        } else {
            $modelPago = new FormaPagoForm;
            $modelPago->identificacionUsuario = Yii::app()->user->name;
            $modelPago->consultarHorario($objSectorCiudad);
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
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
                    $form = new FormaPagoForm($paso);
                    $form->identificacionUsuario = Yii::app()->user->name;
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->idDireccionDespacho = Yii::app()->getRequest()->getPost('direccion', null);
                    
                    
                    if (isset($_POST['FormaPagoForm'])) {
                        $form->attributes = $_POST['FormaPagoForm'];
                    }

                    if ($form->validate()) {
                        $modelPago->idDireccionDespacho = $form->idDireccionDespacho;
                        $modelPago->descripcion = $form->descripcion;
                        $modelPago->nombre = $form->nombre;
                        $modelPago->direccion = $form->direccion;
                        $modelPago->barrio = $form->barrio;
                        $modelPago->telefono = $form->telefono;
                        $modelPago->extension = $form->extension;
                        $modelPago->celular = $form->celular;
                        $modelPago->correoElectronico = $form->correoElectronico;
                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][2]:
                    if ($_POST['FormaPagoForm']) {
                        $form = new FormaPagoForm($paso);
                        $form->identificacionUsuario = Yii::app()->user->name;
                        $form->pagoInvitado = $modelPago->pagoInvitado;
                        $form->attributes = $_POST['FormaPagoForm'];
                        $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;

                        if ($form->validate()) {
                            //$modelPago->attributes = $_POST['FormaPagoForm'];
                            $modelPago->fechaEntrega = $form->fechaEntrega;
                            $modelPago->comentario = $form->comentario;
                            $modelPago->pasoValidado[$paso] = $paso;
                            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                            echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/carro/pagar", array('paso' => $siguiente))));
                            Yii::app()->end();
                        } else {
                            echo CActiveForm::validate($form);
                            Yii::app()->end();
                        }
                    } else {
                        echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][3]:
                    $form = new FormaPagoForm($paso);
                    $form->identificacionUsuario = Yii::app()->user->name;
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->bono = $modelPago->bono;

                    if (isset($_POST['FormaPagoForm'])) {
                        $form->attributes = $_POST['FormaPagoForm'];
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
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;

                    if ($siguiente == "finalizar") {
                        if ($_POST['FormaPagoForm']) {
                            $form = new FormaPagoForm($paso);
                            $form->identificacionUsuario = Yii::app()->user->name;
                            $form->pagoInvitado = $modelPago->pagoInvitado;
                            $form->attributes = $_POST['FormaPagoForm'];

                            if ($form->validate()) {
                                //$modelPago->attributes = $_POST['FormaPagoForm'];
                                $modelPago->confirmacion = $form->confirmacion;
                                $modelPago->pasoValidado[$paso] = $paso;
                                Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                                echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados", 'redirect' => $this->createUrl("/carro/comprar")));
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

                    echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/carro/pagar", array('paso' => $siguiente))));
                    Yii::app()->end();
                    break;
            }

            echo CJSON::encode(array('result' => 'error', 'response' => 'ERROR'));
            Yii::app()->end();
        } else {
            //CVarDumper::dump($modelPago, 3);
            $this->fixedFooter = true;

            if ($modelPago->pagoExpress) {
                $paso = Yii::app()->params->pagar['pasos'][1];
                $modelPago = new FormaPagoForm;
                $modelPago->identificacionUsuario = Yii::app()->user->name;
                $modelPago->consultarHorario($objSectorCiudad);
                Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
            }
            
            //validar pasos anteriores
            $modelPago->validarPasos(Yii::app()->params->pagar['pasosDisponibles']['domicilio'], $paso);

            $params = array();
            $params['paso'] = $paso;

            $nPasoActual = Yii::app()->params->pagar['pasos'][$paso];
            $nPasoAnterior = $nPasoActual - 1;
            $nPasoSiguiente = $nPasoActual + 1;
            $pasoSiguiente = isset(Yii::app()->params->pagar['pasos'][$nPasoSiguiente]) ? Yii::app()->params->pagar['pasos'][$nPasoSiguiente] : null;
            $pasoAnterior = isset(Yii::app()->params->pagar['pasos'][$nPasoAnterior]) ? Yii::app()->params->pagar['pasos'][$nPasoAnterior] : null;

            $params['pasoAnterior'] = $pasoAnterior;
            $params['pasoSiguiente'] = $pasoSiguiente;

            switch ($paso) {
                case Yii::app()->params->pagar['pasos'][1]:
                    $listDirecciones = DireccionesDespacho::model()->findAll(array(
                        'condition' => 'identificacionUsuario=:cedula AND (codigoCiudad=:ciudad AND (codigoSector=:sector OR codigoSector=0)) AND activo=:activo',
                        'params' => array(
                            ':cedula' => Yii::app()->user->name,
                            ':activo' => 1,
                            ':ciudad' => $objSectorCiudad->codigoCiudad,
                            ':sector' => $objSectorCiudad->codigoSector
                        )
                    ));

                    $params['parametros']['listDirecciones'] = $listDirecciones;
                    break;
                case Yii::app()->params->pagar['pasos'][2]:
                    $params['parametros']['listHorarios'] = $modelPago->listDataHoras();
                    break;
                case Yii::app()->params->pagar['pasos'][3]:
                    $listFormaPago = FormaPago::model()->findAll(array(
                        'order' => 'formaPago',
                        'condition' => 'estadoFormaPago=:estado',
                        'params' => array(':estado' => 1)
                    ));
                    $modelPago->consultarBono(Yii::app()->shoppingCart->getTotalCost());
                    Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                    $params['parametros']['listFormaPago'] = $listFormaPago;

                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    $objDireccion = DireccionesDespacho::model()->findByPk($modelPago->idDireccionDespacho);
                    $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
                    $params['parametros']['objDireccion'] = $objDireccion;
                    $params['parametros']['objFormaPago'] = $objFormaPago;

                    if ($modelPago->bono !== null && $modelPago->usoBono == 1) {
                        Yii::app()->shoppingCart->setBono($modelPago->bono['valor']);
                    }

                    $modelPago->calcularConfirmacion(Yii::app()->shoppingCart->getPositions());
                    break;
            }

            $params['parametros']['modelPago'] = $modelPago;
            $this->render('pagarDomicilio', $params);
        }
    }

    private function pagarPresencial($paso, $post) {
        /*if(is_string($post)){
            $post = ($post=="true");
        }*/
        
        $modelPago = null;
        
        if ($paso === null)
            $paso = Yii::app()->params->pagar['pasos'][2];

        if (!in_array($paso, Yii::app()->params->pagar['pasosDisponibles']['presencial'])) {
            throw new CHttpException(404, 'Página solicitada no existe.');
        }

        $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];
        
        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null){
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];
        }else {
            $modelPago = new FormaPagoForm;
            $modelPago->identificacionUsuario = Yii::app()->user->name;
            $modelPago->consultarHorario($objSectorCiudad);
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
        }
        
        //$modelPago->setScenario($paso);

        if ($post) {
            $siguiente = Yii::app()->getRequest()->getPost('siguiente', null);

            if ($siguiente === null) {
                echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
                Yii::app()->end();
            }
            
            switch ($paso) {
                case Yii::app()->params->pagar['pasos'][2]:
                    $form = new FormaPagoForm($paso);
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->identificacionUsuario = Yii::app()->user->name;
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    
                    if (isset($_POST['FormaPagoForm'])){
                        $form->attributes = $_POST['FormaPagoForm'];
                    }

                    if ($form->validate()) {
                        $modelPago->fechaEntrega = $form->fechaEntrega;
                        $modelPago->telefonoContacto = $form->telefonoContacto;
                        $modelPago->correoElectronico = $form->correoElectronico;
                        $modelPago->comentario = $form->comentario;
                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    
                    break;
                case Yii::app()->params->pagar['pasos'][3]:
                    $form = new FormaPagoForm($paso);
                    $form->identificacionUsuario = Yii::app()->user->name;
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    $form->bono = $modelPago->bono;

                    if (isset($_POST['FormaPagoForm'])){
                        $form->attributes = $_POST['FormaPagoForm'];
                    }

                    if ($form->validate()) {
                        $modelPago->pasoValidado[$paso] = $paso;
                        $modelPago->idFormaPago = $form->idFormaPago;
                        $modelPago->numeroTarjeta = $form->numeroTarjeta;
                        $modelPago->cuotasTarjeta = $form->cuotasTarjeta;
                        $modelPago->usoBono = $form->usoBono;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;

                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    if ($siguiente != "finalizar") {
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    }
                    
                    $form = new FormaPagoForm($paso);
                    $form->identificacionUsuario = Yii::app()->user->name;
                    $form->pagoInvitado = $modelPago->pagoInvitado;
                    
                    if (isset($_POST['FormaPagoForm'])){
                        $form->attributes = $_POST['FormaPagoForm'];
                    }

                    if ($form->validate()) {
                        $modelPago->pasoValidado[$paso] = $paso;
                        $modelPago->confirmacion = $form->confirmacion;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados", 'redirect' => $this->createUrl("/carro/comprar")));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                    break;
                default :
                    echo CJSON::encode(array('result'=>'error','response'=>'Paso no detectado'));
                    break;
            }
        } else {
            //validar pasos anteriores
            $modelPago->validarPasos(Yii::app()->params->pagar['pasosDisponibles']['presencial'], $paso);
            $params = array();
            $params['paso'] = $paso;
            $nPasoActual = Yii::app()->params->pagar['pasos'][$paso];
            //$nPasoActual = ($nPasoActual<2) ? 2 : $nPasoActual;
            //$nPasoAnterior = $nPasoActual - 1;
            $nPasoAnterior = $nPasoActual - 1;
            $nPasoAnterior = ($nPasoAnterior<2) ? -1 : $nPasoAnterior;
            $nPasoSiguiente = $nPasoActual + 1;
            $pasoSiguiente = isset(Yii::app()->params->pagar['pasos'][$nPasoSiguiente]) ? Yii::app()->params->pagar['pasos'][$nPasoSiguiente] : null;
            $pasoAnterior = isset(Yii::app()->params->pagar['pasos'][$nPasoAnterior]) ? Yii::app()->params->pagar['pasos'][$nPasoAnterior] : null;

            $params['pasoAnterior'] = $pasoAnterior;
            $params['pasoSiguiente'] = $pasoSiguiente;
            
            if($paso==Yii::app()->params->pagar['pasos'][2]){
                if(isset($_POST['pos']) || $modelPago->pdvSeleccionado()){
                    if(isset($_POST['pos'])){
                        $indicePdv = trim($_POST['pos']);
                        $modelPago->seleccionarPdv($indicePdv);
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                    }

                    $params['parametros']['listHorarios'] = $modelPago->listDataHoras();
                }else{
                    if ($modelPago->pagoExpress) {
                        $modelPago = new FormaPagoForm;
                        $modelPago->identificacionUsuario = Yii::app()->user->name;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                    }

                    $modelPago->consultarDisponibilidad(Yii::app()->shoppingCart);
                    Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;

                    $this->render('pagarPresencial', array('listPuntosVenta' => $modelPago->listPuntosVenta));
                    Yii::app()->end();
                }
                //$this->render('_paso2', $params);
            }else if($paso==Yii::app()->params->pagar['pasos'][3]){
                $listFormaPago = FormaPago::model()->findAll(array(
                    'order' => 'formaPago',
                    'condition' => 'estadoFormaPago=:estado',
                    'params' => array(':estado' => 1)
                ));
                $modelPago->consultarBono(Yii::app()->shoppingCart->getTotalCost());
                Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                $modelPago->setScenario('pago');
                $params['parametros']['listFormaPago'] = $listFormaPago;
                //$params['modelPago'] = $modelPago;
                //$params['submit'] = true;

                //$this->render('_paso3', $params);
            }else if($paso == Yii::app()->params->pagar['pasos'][4]){
                $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
                $params['parametros']['objDireccion'] = null;
                $params['parametros']['objFormaPago'] = $objFormaPago;

                if ($modelPago->bono !== null && $modelPago->usoBono == 1) {
                    Yii::app()->shoppingCart->setBono($modelPago->bono['valor']);
                }
                
                $modelPago->calcularConfirmacion(Yii::app()->shoppingCart->getPositions());
                Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                $modelPago->setScenario('finalizar');
                //$params['modelPago'] = $modelPago;
                //$this->render('_paso4', $params);
            }
            
            $params['parametros']['modelPago'] = $modelPago;
            $this->render('pasosPresencial', $params);
        }
    }    
    
    public function actionComprar() {
        $modelPago = null;
        
        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];

        if ($modelPago === null) {
            Yii::app()->user->setFlash('error', "Error: Por favor verificar los datos de tu compra.");
            $this->redirect($this->createUrl('/carro'));
            Yii::app()->end();
        }

        if ($modelPago->bono !== null && $modelPago->usoBono == 1) {
            Yii::app()->shoppingCart->setBono($modelPago->bono['valor']);
        }
        
        $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];
        
        if(!in_array($tipoEntrega, Yii::app()->params->entrega['listaTipos'])){
            Yii::app()->user->setFlash('error', "Tipo de entrega inválido, por favor seleccionar tipo de entrega.");
            $this->redirect($this->createUrl('/carro'));
        }
        
        //validaciones de compra
        if ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
            $pasoValidacion = null;
            //se valida que cada paso este realizado
            $modelPago->validarConfirmacion(Yii::app()->shoppingCart->getPositions());
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
            foreach (Yii::app()->params->pagar['pasosDisponibles']['domicilio'] as $idx => $paso) {
                $modelPago->setScenario($paso);
                if (!$modelPago->validate()) {
                    $pasoValidacion = $paso;
                    break;
                }
            }

            //validar nuevamente modelo pago con metodo valid para cada uno de los pasos
            /*$modelPago->setScenario('finalizar');
            if (!$modelPago->validate()) {
                $confirmacion = false;
            }*/

            if($pasoValidacion != null){
                if ($modelPago->pagoExpress) {
                    Yii::app()->user->setFlash('error', "Error: Por favor verificar la configuración de tu pago express.");
                    $this->redirect($this->createUrl('/carro'));
                    Yii::app()->end();
                } else {
                    Yii::app()->user->setFlash('error', "Error: Por favor verificar los datos de tu compra.");
                    $paramsValidacion = array();
                    $paramsValidacion['paso'] = $pasoValidacion;
                     
                    $this->redirect($this->createUrl('/carro/pagar', $paramsValidacion));
                    Yii::app()->end();
                }
            }
        } else if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
            $pasoValidacion = null;
            //se valida que cada paso este realizado
            $modelPago->validarConfirmacion(Yii::app()->shoppingCart->getPositions());
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
            foreach (Yii::app()->params->pagar['pasosDisponibles']['presencial'] as $idx => $paso) {
                $modelPago->setScenario($paso);
                if (!$modelPago->validate()) {
                    $pasoValidacion = $paso;
                    break;
                }
            }
            
            /*$confirmacion = true;
            //validar nuevamente modelo pago con metodo valid para cada uno de los pasos
            foreach (Yii::app()->params->pagar['pasosDisponibles']['presencial'] as $idx => $paso) {
                if (!isset($modelPago->pasoValidado[$paso])) {
                    $confirmacion = false;
                    break;
                }
            }*/

            if($pasoValidacion != null){
                Yii::app()->user->setFlash('error', "Error: Por favor verificar los datos de tu compra.");
                $this->redirect($this->createUrl('/carro/pagar'));
                Yii::app()->end();
            }
        }
        
        //si ha llegado aqui, paso todas las validaciones y se puede proceder con proceso de compra
        if($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']){
            $this->render('pasarela', array('pagoExpress'=>$modelPago->pagoExpress));
            Yii::app()->end();
        }
        
        $resultCompra = $this->procesoCompra($modelPago, $tipoEntrega);
        
        if($resultCompra['result']==1){
            $contenidoSitio = $this->renderPartial('compraContenido', array(
                'objCompra' => $resultCompra['response']['objCompra'],
                'modelPago' => $resultCompra['response']['modelPago'],
                'objCompraDireccion' => $resultCompra['response']['objCompraDireccion'],
                'objFormaPago' => $resultCompra['response']['objFormaPago'],
                'objFormasPago' => $resultCompra['response']['objFormasPago']), true);

            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
            Yii::app()->shoppingCart->clear();
            $this->render('compra', array(
                'contenido' => $contenidoSitio,
            ));
            Yii::app()->end();
        }else{
            Yii::app()->user->setFlash('error', "Error al realizar compra, por favor intente de nuevo. " . $resultCompra['response']);
            if($modelPago->pagoExpress){
                $this->redirect($this->createUrl('/carro'));
                Yii::app()->end();
            }else{
                $this->redirect($this->createUrl('/carro/pagar'));
                Yii::app()->end();
            }
        }
    }
    
    private function procesoCompra(FormaPagoForm $modelPago, $tipoEntrega){
        $categoriasCompra = array();
        $productosCompra = array();
        $transaction = Yii::app()->db->beginTransaction();
            try {
                //registrar compra compra
                $objCompra = new Compras;
                $objCompra->identificacionUsuario = ($modelPago->pagoInvitado ? null : $modelPago->identificacionUsuario);
                $objCompra->tipoEntrega = $tipoEntrega;
                
                //if($tipoEntrega==Yii::app()->params->entrega['tipo']['domicilio']){
                    $objCompra->fechaEntrega = $modelPago->fechaEntrega;
                    $objCompra->observacion = $modelPago->comentario;
                //}
                
                if($tipoEntrega==Yii::app()->params->entrega['tipo']['presencial']){
                    $puntoVenta = $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta];
                    $objCompra->idComercial = $puntoVenta[1];
                }
                
                if($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']){
                    $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['pendientePasarela'];
                }else{
                    $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['pendiente'];
                }
                
                $objCompra->idTipoVenta = 1;
                $objCompra->activa = 1;
                $objCompra->invitado = ($modelPago->pagoInvitado ? 1 : 0);
                $objCompra->codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
                $objCompra->codigoCiudad = Yii::app()->shoppingCart->getCodigoCiudad();
                $objCompra->codigoSector = Yii::app()->shoppingCart->getCodigoSector();
                
                if($tipoEntrega==Yii::app()->params->entrega['tipo']['domicilio']){
                    $objCompra->tiempoDomicilioCedi = Yii::app()->shoppingCart->getDeliveryStored();
                    $objCompra->valorDomicilioCedi = Yii::app()->shoppingCart->getShippingStored();
                    $objCompra->codigoCedi = Yii::app()->shoppingCart->objSectorCiudad->objCiudad->codigoSucursal;
                }else if($tipoEntrega==Yii::app()->params->entrega['tipo']['presencial']){
                    $objCompra->tiempoDomicilioCedi = 0;
                    $objCompra->valorDomicilioCedi = 0;
                    $objCompra->codigoCedi = 0;
                }
                
                $objCompra->subtotalCompra = Yii::app()->shoppingCart->getCost();
                $objCompra->impuestosCompra = Yii::app()->shoppingCart->getTaxPrice();
                $objCompra->baseImpuestosCompra = Yii::app()->shoppingCart->getBaseTaxPrice();
                $objCompra->domicilio = Yii::app()->shoppingCart->getShipping();
                $objCompra->flete = Yii::app()->shoppingCart->getExtraShipping();
                $objCompra->totalCompra = Yii::app()->shoppingCart->getTotalCost();
                
                if (!$objCompra->save()) {
                    throw new Exception("Error al guardar compra" . $objCompra->validateErrorsResponse());
                }
                
                if($tipoEntrega==Yii::app()->params->entrega['tipo']['presencial']){
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
                
                if ($modelPago->bono !== null && $modelPago->usoBono == 1) {
                    Yii::app()->shoppingCart->setBono($modelPago->bono['valor']);
                }
                
                $objFormasPago = new FormasPago; //FormaPago::model()->findByPk($modelPago->idFormaPago);
                $objFormasPago->idCompra = $objCompra->idCompra;
                $objFormasPago->valor = Yii::app()->shoppingCart->getTotalCost();
                $objFormasPago->numeroTarjeta = $modelPago->numeroTarjeta;
                $objFormasPago->cuotasTarjeta = $modelPago->cuotasTarjeta;
                $objFormasPago->idFormaPago = $modelPago->idFormaPago;
                $objFormasPago->valorBono = Yii::app()->shoppingCart->getBono();
                /* if ($modelPago->bono !== null && $modelPago->usoBono == 1) {
                    $objFormasPago->valorBono = $modelPago->bono['valor'];
                } */
                
                /*if($objFormasPago->valorBono>0){
                    try{
                        $clientBono = new SoapClient(null, array(
                            'location' => Yii::app()->params->webServiceUrl['crmLrv'],
                            'uri' => "",
                            'trace' => 1
                        ));
                        $resultBono = $clientBono->__soapCall("ActualizarBono", array('identificacion' => $objCompra->identificacionUsuario));

                        if (empty($resultBono) || $resultBono[0]->ESTADO == 0) {
                            throw new Exception("Error al actualizar bono");
                        }
                    }catch(SoapFault $soapExc){
                        throw new Exception("Error al actualizar bono");
                    }
                }*/
                
                if (!$objFormasPago->save()) {
                    throw new Exception("Error al guardar forma de pago" . $objFormasPago->validateErrorsResponse());
                }
                
                $objCompraDireccion = new ComprasDireccionesDespacho;
                
                if($tipoEntrega==Yii::app()->params->entrega['tipo']['domicilio']){
                    
                    if($modelPago->pagoInvitado){
                        $objCompraDireccion->idCompra = $objCompra->idCompra;
                        $objCompraDireccion->descripcion = $modelPago->descripcion;
                        $objCompraDireccion->nombre = $modelPago->nombre;
                        $objCompraDireccion->direccion = $modelPago->direccion;
                        $objCompraDireccion->barrio = $modelPago->barrio;
                        $objCompraDireccion->telefono = $modelPago->telefono;
                        $objCompraDireccion->celular = $modelPago->celular;
                        $objCompraDireccion->codigoCiudad = Yii::app()->shoppingCart->getCodigoCiudad();
                        $objCompraDireccion->codigoSector = Yii::app()->shoppingCart->getCodigoSector();
                        $objCompraDireccion->correoElectronico = $modelPago->correoElectronico;
                    }else{
                        $objDireccion = DireccionesDespacho::model()->findByPk($modelPago->idDireccionDespacho);
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

                        if($objDireccion->codigoSector == 0 && Yii::app()->shoppingCart->getCodigoSector()!=0){
                            $objDireccion->codigoSector = Yii::app()->shoppingCart->getCodigoSector();
                            $objDireccion->save();
                        }
                    }
                    
                    
                }else if($tipoEntrega==Yii::app()->params->entrega['tipo']['presencial']){
                    $objCompraDireccion = new ComprasDireccionesDespacho;
                    $objCompraDireccion->idCompra = $objCompra->idCompra;
                    $objCompraDireccion->descripcion = "NA";
                    $objCompraDireccion->nombre = "NA";
                    $objCompraDireccion->direccion = "NA";
                    $objCompraDireccion->barrio = "NA";
                    $objCompraDireccion->telefono = $modelPago->telefonoContacto;
                    
                    if($modelPago->pagoInvitado){
                        $objCompraDireccion->correoElectronico = $modelPago->correoElectronico;
                    }
                }

                if (!$objCompraDireccion->save()) {
                    throw new Exception("Error al guardar dirección de compra" . $objCompraDireccion->validateErrorsResponse());
                }
                
                //generar puntos //--
                $listPuntosCompra = array();
                
                if(!$modelPago->pagoInvitado){
                    $fecha = new DateTime;
                    $parametrosPuntos = array(
                        Yii::app()->params->puntos['categoria'] => Yii::app()->shoppingCart->getCategorias(),
                        Yii::app()->params->puntos['marca'] => Yii::app()->shoppingCart->getMarcas(),
                        Yii::app()->params->puntos['proveedor'] => Yii::app()->shoppingCart->getProveedores(),
                        Yii::app()->params->puntos['producto'] => Yii::app()->shoppingCart->getProductosCantidad(),
                        Yii::app()->params->puntos['monto'] => $objCompra->subtotalCompra,
                        Yii::app()->params->puntos['cedula'] => array(
                            'identificacionUsuario' => Yii::app()->user->name, 
                            'valor'=> $objCompra->subtotalCompra),
                        Yii::app()->params->puntos['rango'] => array(
                            'fecha' => $fecha, 
                            'valor'=> $objCompra->subtotalCompra),
                        Yii::app()->params->puntos['cumpleanhos'] => array(
                            'fechaNacimiento' => Yii::app()->session[Yii::app()->params->usuario['sesion']]->objUsuarioExtendida->fechaNacimiento, 
                            'valor'=> $objCompra->subtotalCompra),
                        Yii::app()->params->puntos['clientefielCompra'] => $objCompra->subtotalCompra,
                    );
                    $listPuntosCompra = ComprasPuntos::generarPuntos($fecha,Yii::app()->session[Yii::app()->params->usuario['sesion']], $parametrosPuntos);
                }
                //-- generar puntos

                // guardar puntos  //--
                foreach($listPuntosCompra as $objPuntoCompra){
                    $objPuntoCompra->idCompra = $objCompra->idCompra;
                    if (!$objPuntoCompra->save()) {
                        throw new Exception("Error al guardar punto de compra $objPuntoCompra->idPunto. " . $objPuntoCompra->validateErrorsResponse());
                    }
                }
                //-- guardar puntos //--

                //items de compra
                $positions = Yii::app()->shoppingCart->getPositions();
                foreach ($positions as $position) {
                    if ($position->isProduct()) {
                        //actualizar saldo producto //--
                        $objSaldo = null;
                        if ($position->objProducto->tercero == 1) {
                            $objSaldo = ProductosSaldosTerceros::model()->find(array(
                                'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto',
                                'params' => array(
                                    ':ciudad' => Yii::app()->shoppingCart->getCodigoCiudad(),
                                    ':sector' => Yii::app()->shoppingCart->getCodigoSector(),
                                    ':producto' => $position->objProducto->codigoProducto
                                )
                            ));
                        } else {
                            $objSaldo = ProductosSaldos::model()->find(array(
                                'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto',
                                'params' => array(
                                    ':ciudad' => Yii::app()->shoppingCart->getCodigoCiudad(),
                                    ':sector' => Yii::app()->shoppingCart->getCodigoSector(),
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
                        if($position->getQuantityStored()>0){
                            $objSaldoBodega = ProductosSaldosCedi::model()->find(array(
                                'condition' => 'codigoCedi=:cedi AND codigoProducto=:producto',
                                'params' => array(
                                    ':cedi' => Yii::app()->shoppingCart->getObjCiudad()->codigoSucursal,
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
                        
                        if($objCompra->identificacionUsuario !== null){
                            $categoriasCompra[] = "('". $objCompra->identificacionUsuario . "','".$position->objProducto->idCategoriaBI."')";
                        }
                        
                        $productosCompra[] = "('".$position->objProducto->codigoProducto."')";

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
                    } else if ($position->isCombo()) {
                        $objSaldo = ComboSectorCiudad::model()->find(array(
                            'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND idCombo=:combo',
                            'params' => array(
                                ':ciudad' => Yii::app()->shoppingCart->getCodigoCiudad(),
                                ':sector' => Yii::app()->shoppingCart->getCodigoSector(),
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
                            
                            if($objCompra->identificacionUsuario !== null){
                                $categoriasCompra[] = "('". $objCompra->identificacionUsuario . "','".$productoCombo->objProducto->idCategoriaBI."')";
                            }
                            
                            $productosCompra[] = "('".$productoCombo->objProducto->codigoProducto."')";
                        }
                    }
                }
                
                $nombreUsuario = "NA";
                $correoUsuario = "NA";
                
                if($modelPago->pagoInvitado){
                    $nombreUsuario = $modelPago->nombre;
                    $correoUsuario = $modelPago->correoElectronico;
                }else{
                    $objUsuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
                    $nombreUsuario = $objUsuario->getNombreCompleto();
                    $correoUsuario = $objUsuario->correoElectronico;
                }
                
                
                $objPasarelaEnvio = null;
                $asuntoCorreo = Yii::app()->params->asunto['pedidoRealizado'];
                
                if($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']){
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
                }
                
                if(count($categoriasCompra)>0){
                    $sql="INSERT INTO t_ComprasUsuariosCategorias(identificacionUsuario, idCategoriaBI) VALUES ".implode(",", $categoriasCompra) . " ON DUPLICATE KEY UPDATE cantidad=cantidad+1";
                    Yii::app()->db->createCommand($sql)->execute(); 
                }
                
                if(count($productosCompra)>0){
                    $sql="INSERT INTO t_ProductosVendidos(codigoProducto) VALUES ".implode(",", $productosCompra) . " ON DUPLICATE KEY UPDATE cantidad=cantidad+1";
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
                sendHtmlEmail($correoUsuario, $asuntoCorreo, $htmlCorreo);
                $transaction->commit();
                
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
    
    public function actionPagopasarela(){
        $modelPago = null;
        
        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];

        if ($modelPago === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => "Por favor verificar los datos de tu compra."));
            Yii::app()->end();
        }
        
        $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];
        
        if(!in_array($tipoEntrega, Yii::app()->params->entrega['listaTipos'])){
            echo CJSON::encode(array('result' => 'error', 'response' => "Tipo de entrega inválido, por favor seleccionar tipo de entrega."));
            Yii::app()->end();
        }
        
        $resultCompra = $this->procesoCompra($modelPago, $tipoEntrega);
        
        if($resultCompra['result']!=1){
            echo CJSON::encode(array('result' => 'error', 'response' => "Error al realizar compra, por favor intente de nuevo. " . $resultCompra['response']));
            Yii::app()->end();
        }
        
        if($resultCompra['response']['objPasarelaEnvio'] == null){
            echo CJSON::encode(array('result' => 'error', 'response' => "No se detectan datos para envío de pasarela de pago"));
            Yii::app()->end();
        }
            
        $action = Yii::app()->params->formaPago['pasarela']['action'];
        $usuarioId = Yii::app()->params->formaPago['pasarela']['usuarioId'];
        $descripcion = Yii::app()->params->formaPago['pasarela']['descripcion'];
        $prueba = Yii::app()->params->formaPago['pasarela']['prueba'];
        
        $urlRespuesta = $this->createAbsoluteUrl('/pasarela/respuesta');
        $urlConfirmacion = $this->createAbsoluteUrl('/pasarela/confirmacion');
        $llaveEncripcion = Yii::app()->params->formaPago['pasarela']['llaveEncripcion'];
        
        $firma = $llaveEncripcion . "~" . $usuarioId . "~" . $resultCompra['response']['objPasarelaEnvio']->idCompra . "~" . $resultCompra['response']['objPasarelaEnvio']->valor . "~" . $resultCompra['response']['objPasarelaEnvio']->moneda;
        $firma = md5($firma);
        
        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        Yii::app()->shoppingCart->clear();

        echo CJSON::encode(array(
            'result' => 'ok', 
            'response' => $this->renderPartial('pasarelaForm', array(
                'model'=> $resultCompra['response']['objPasarelaEnvio'],
                'action' => $action,
                'usuarioId' => $usuarioId,
                'descripcion' => $descripcion,
                'prueba' => $prueba,
                'urlRespuesta' => $urlRespuesta,
                'urlConfirmacion' => $urlConfirmacion,
                'firma' => $firma
                ),true) ));
        Yii::app()->end();
    }
    
    public function actionCrearcotizacion(){
        $transaction = Yii::app()->db->beginTransaction();
            try {
                //registrar cotizacion
                $objCotizacion = new Cotizaciones;
                $objCotizacion->identificacionUsuario = Yii::app()->user->name;
                
                $objCotizacion->codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
                $objCotizacion->codigoCiudad = Yii::app()->shoppingCart->getCodigoCiudad();
                $objCotizacion->codigoSector = Yii::app()->shoppingCart->getCodigoSector();
                
                $objCotizacion->tiempoDomicilioCedi = Yii::app()->shoppingCart->getDeliveryStored();
                $objCotizacion->valorDomicilioCedi = Yii::app()->shoppingCart->getShippingStored();
                $objCotizacion->codigoCedi = Yii::app()->shoppingCart->objSectorCiudad->objCiudad->codigoSucursal;
                
                $objCotizacion->subtotalCompra = Yii::app()->shoppingCart->getCost();
                $objCotizacion->impuestosCompra = Yii::app()->shoppingCart->getTaxPrice();
                $objCotizacion->baseImpuestosCompra = Yii::app()->shoppingCart->getBaseTaxPrice();
                $objCotizacion->domicilio = Yii::app()->shoppingCart->getShipping();
                $objCotizacion->flete = Yii::app()->shoppingCart->getExtraShipping();
                $objCotizacion->totalCompra = Yii::app()->shoppingCart->getTotalCost();
                $objCotizacion->ahorroCompra = Yii::app()->shoppingCart->getDiscountPrice(true);
                
                if (!$objCotizacion->save()) {
                    throw new Exception("Error al guardar cotizacion" . $objCotizacion->validateErrorsResponse());
                }
                
                //items de compra
                $positions = Yii::app()->shoppingCart->getPositions();
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
          
    /*public function actionList() {
        //Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        //Yii::app()->shoppingCart->clear();
        //exit();
        CVarDumper::dump(Yii::app()->shoppingCart->itemAt(91269), 2, true);
        echo "<br/>";echo "<br/>";

        echo "Descuento: " . Yii::app()->shoppingCart->getDiscountPrice();
        echo "<br/>";
        echo "ciudad: " . Yii::app()->shoppingCart->getCodigoCiudad();
        echo "<br/>";
        echo "sector: " . Yii::app()->shoppingCart->getCodigoSector();
        echo "<br/>";
        echo "perfil: " . Yii::app()->shoppingCart->getCodigoPerfil();
        echo "<br/>";
        echo "cantidad productos: " . Yii::app()->shoppingCart->getCount();
        echo "<br/>";
        echo "cantidad items: " . Yii::app()->shoppingCart->getItemsCount();
        echo "<br/>";
        echo "costo total: " . Yii::app()->shoppingCart->getCost();
        echo "<br/>";
        echo "costo total: " . Yii::app()->shoppingCart->getTotalCost();
        echo "<br/>";
        //echo "tiempo: " . Yii::app()->shoppingCart->getDelivery();
        //echo "<br/>";

        echo "<br/>";


        $positions = Yii::app()->shoppingCart->getPositions();
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
    }*/
    
    /*public function actionForm($limpiar=false){
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];

        CVarDumper::dump($modelPago,10,true);
        echo "<br/><br/>";
        CVarDumper::dump($modelPago->rules(),10,true);
        
        if($limpiar)
         Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
    }*/
    
    /*public function actionPuntos(){
        $fecha = new DateTime;
        $parametrosPuntos = array(
            Yii::app()->params->puntos['categoria'] => Yii::app()->shoppingCart->getCategorias(),
            Yii::app()->params->puntos['marca'] => Yii::app()->shoppingCart->getMarcas(),
            Yii::app()->params->puntos['proveedor'] => Yii::app()->shoppingCart->getProveedores(),
            Yii::app()->params->puntos['producto'] => Yii::app()->shoppingCart->getProductosCantidad(),
            Yii::app()->params->puntos['monto'] => Yii::app()->shoppingCart->getTotalCost(),
            Yii::app()->params->puntos['cedula'] => Yii::app()->user->name,
            Yii::app()->params->puntos['rango'] => $fecha,
            Yii::app()->params->puntos['cumpleanhos'] => Yii::app()->session[Yii::app()->params->usuario['sesion']]->objUsuarioExtendida->fechaNacimiento,
            Yii::app()->params->puntos['clientefielCompra'] => Yii::app()->shoppingCart->getCost(),
        );
        
        echo "-- PARAMETROS --<br/>";
        CVarDumper::dump($parametrosPuntos,3,true);
        echo "<br/>-- PARAMETROS --<br/><br/>";
        
        $listPuntos = Puntos::generarPuntos($fecha,Yii::app()->session[Yii::app()->params->usuario['sesion']], $parametrosPuntos);
        
        echo "<br/><br/>-- PUNTOS --<br/><br/>";
        CVarDumper::dump($listPuntos,3,true);
    }*/
}
