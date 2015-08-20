<?php

class PedidoController extends ControllerOperator {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            //'access',
            //'login + index, pedidos, detallepedido',
            'loginadmin + exportar',
            'loginajax + seguimiento, asignarpdv, agregar',
        );
    }

    public function filterAccess($filter) {
        if (!Yii::app()->controller->module->user->isGuest) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $filter->run();
    }

    public function filterLoginadmin($filter) {
        if (Yii::app()->controller->module->user->isGuest || Yii::app()->controller->module->user->profile != 2) {
            $this->redirect(Yii::app()->controller->module->homeUrl);
        }
        $filter->run();
    }

    public function filterLoginajax($filter) {
        if (Yii::app()->controller->module->user->isGuest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Usuario no autenticado.'));
            Yii::app()->end();
        }
        $filter->run();
    }

    public function actionExportar() {
        $model = new ReportePedidoForm;

        if (isset($_POST['ReportePedidoForm'])) {
            $model->unsetAttributes();
            $model->attributes = $_POST['ReportePedidoForm'];

            if ($model->validate()) {
                $model->exportarCompras();
            }
        }

        $this->render('exportar', array('model' => $model));
    }

    public function actionSeguimiento() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $seguimiento = Yii::app()->getRequest()->getPost('seguimiento');
        $compra = Yii::app()->getRequest()->getPost('compra');

        if ($seguimiento === null || $compra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $objCompra = Compras::model()->findByPk($compra);

        if ($objCompra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Pedido no existe.'));
            Yii::app()->end();
        }

        $objCompra->seguimiento = $seguimiento;
        $objCompra->save();

        echo CJSON::encode(array('result' => 'ok', 'response' => 'Pedido actualizado.'));
        Yii::app()->end();
    }

    public function actionAsignarpdv() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $pdv = Yii::app()->getRequest()->getPost('pdv');
        $compra = Yii::app()->getRequest()->getPost('compra');

        if ($pdv === null || $compra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $objCompra = Compras::model()->findByPk($compra);

        if ($objCompra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Pedido no existe.'));
            Yii::app()->end();
        }

        $objPdv = PuntoVenta::model()->find(array(
            'condition' => 'idComercial=:pdv',
            'params' => array(
                ':pdv' => $pdv
            )
        ));

        if ($objPdv === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Punto venta no existe.'));
            Yii::app()->end();
        }

        $transaction = Yii::app()->db->beginTransaction();
        try {
            $objCompra->idComercial = $objPdv->idComercial;
            $objCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['asignado'];
            $objCompra->generarDocumentoCruce(Yii::app()->controller->module->user->id);
            if (!$objCompra->save()) {
                throw new Exception('Error de asignación: ' . $objCompra->validateErrorsResponse());
            }

            $objEstadoCompra = new ComprasEstados;
            $objEstadoCompra->idCompra = $objCompra->idCompra;
            $objEstadoCompra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['asignado'];
            $objEstadoCompra->idOperador = Yii::app()->controller->module->user->id;
            if (!$objEstadoCompra->save()) {
                throw new Exception("Error al guardar traza de estado: " . $objEstadoCompra->validateErrorsResponse());
            }

            $objObservacion = new ComprasObservaciones;
            $objObservacion->idCompra = $objCompra->idCompra;
            $objObservacion->observacion = "Cambio de Estado: Asignado PDV. " . $objPdv->nombrePuntoDeVenta;
            $objObservacion->idOperador = Yii::app()->controller->module->user->id;
            $objObservacion->notificarCliente = 0;

            if (!$objObservacion->save()) {
                throw new Exception("Error al guardar observación" . $objObservacion->validateErrorsResponse());
            }

            $transaction->commit();

            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'msg' => 'Punto venta asignado.',
                    'htmlEncabezado' => $this->renderPartial('/admin/_encabezadoPedido', array('objCompra' => $objCompra), true, false)
            )));
            Yii::app()->end();
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }

            echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
            Yii::app()->end();
        }
    }

    public function actionModificar() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $accion = Yii::app()->getRequest()->getPost('accion');

        if ($accion === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        if ($accion == 11 || $accion == 12 || $accion == 13) {
            $this->modificarProducto($accion);
        } else if ($accion == 2) {
            $this->modificarCombo();
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }
    }

    private function modificarProducto($accion) {
        $cantidad = Yii::app()->getRequest()->getPost('cantidad');
        $item = Yii::app()->getRequest()->getPost('item');

        if ($cantidad === null || $item === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida.'));
            Yii::app()->end();
        }
        
        if ($cantidad <0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Las cantidades deben ser números mayores o iguales a cero.'));
            Yii::app()->end();
        }

        $objItem = ComprasItems::model()->find(array(
            'with' => 'objCompra',
            'condition' => 'idCompraItem=:item',
            'params' => array(
                ':item' => $item
            )
        ));

        if ($objItem === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto de compra no existente.'));
            Yii::app()->end();
        }

        try {
            if ($accion == 11) {
                $objItem->actualizarUnidades($cantidad);
            } else if ($accion == 12) {
                $objItem->actualizarFracciones($cantidad);
            } else if ($accion == 13) {
                $objItem->actualizarBodega($cantidad);
            }
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'msg' => 'Producto actualizado.',
                    'htmlDetalle' => $this->renderPartial('/admin/_adminPedido', array('objCompra' => $objItem->objCompra), true, false),
                    'htmlEncabezado' => $this->renderPartial('/admin/_encabezadoPedido', array('objCompra' => $objItem->objCompra), true, false)
            )));
            Yii::app()->end();
        } catch (Exception $exc) {
            echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
            Yii::app()->end();
        }
    }

    private function modificarCombo() {
        $cantidad = Yii::app()->getRequest()->getPost('cantidad');
        $combo = Yii::app()->getRequest()->getPost('combo');
        $compra = Yii::app()->getRequest()->getPost('compra');

        if ($cantidad === null || $combo === null || $compra === null ) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida.'));
            Yii::app()->end();
        }
        
        if ($cantidad <0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Las cantidades deben ser números mayores o iguales a cero.'));
            Yii::app()->end();
        }

        $objCompra = Compras::model()->find(array(
            'condition' => 't.idCompra=:compra',
            'params' => array(
                ':compra' => $compra
            )
        ));

        if ($objCompra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto de compra no existente.'));
            Yii::app()->end();
        }

        try {
            $objCompra->actualizarCombo($combo, $cantidad);
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'msg' => 'Producto actualizado.',
                    'htmlDetalle' => $this->renderPartial('/admin/_adminPedido', array('objCompra' => $objCompra), true, false),
                    'htmlEncabezado' => $this->renderPartial('/admin/_encabezadoPedido', array('objCompra' => $objCompra), true, false)
            )));
            Yii::app()->end();
        } catch (Exception $exc) {
            echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
            Yii::app()->end();
        }
    }

    public function actionBuscar() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $busqueda = Yii::app()->getRequest()->getPost('busqueda');
        $compra = Yii::app()->getRequest()->getPost('compra');

        if ($busqueda === null || $compra === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $busqueda = trim($busqueda);

        if (empty($busqueda)) {
            throw new CHttpException(404, 'Búsqueda no puede estar vacío.');
        }

        $objCompra = Compras::model()->findByPk($compra);

        if ($objCompra === null) {
            throw new CHttpException(404, 'Compra no existe.');
        }

        $listProductos = array();
        $listCombos = array();
        $codigosArray = GSASearch($busqueda);
        //$codigosArray = array(10670, 21461, 22159, 410760, 301280, 10192, 30128, 36085);
        $codigosStr = implode(",", $codigosArray);

        if (!empty($codigosArray)) {
            $listProductos = Producto::model()->findAll(array(
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objCategoriaBI',
                    'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => "t.activo=:activo AND t.codigoProducto IN ($codigosStr) AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)",
                'params' => array(
                    ':activo' => 1,
                    ':saldo' => 0,
                    ':ciudad' => $objCompra->codigoCiudad,
                    ':sector' => $objCompra->codigoSector,
                )
            ));

            $fecha = new DateTime;
            $listCombos = Combo::model()->findAll(array(
                'with' => array('listComboSectorCiudad', 'listProductos' => array('condition' => "listProductos.codigoProducto IN ($codigosStr)")),
                'condition' => 't.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                'params' => array(
                    ':estado' => 1,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                    'saldo' => 0,
                    ':ciudad' => $objCompra->codigoCiudad,
                    ':sector' => $objCompra->codigoSector,
                )
            ));
        }

        $this->renderPartial('buscar', array(
            'listProductos' => $listProductos,
            'listCombos' => $listCombos,
            'objSectorCiudad' => $objCompra->objSectorCiudad,
            'codigoPerfil' => $objCompra->codigoPerfil,
            'nombreBusqueda' => $busqueda,
        ));
    }

    public function actionBeneficios() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud invalida.');
        }

        $item = Yii::app()->getRequest()->getPost('item');

        if ($item === null) {
            throw new CHttpException(404, 'Solicitud invalida.');
        }

        $objItem = ComprasItems::model()->find(array(
            'with' => array('listBeneficios' => array('with' => 'objBeneficioTipo')),
            'condition' => 't.idCompraItem=:item',
            'params' => array(
                ':item' => $item
            )
        ));

        $this->renderPartial('beneficios', array(
            'objItem' => $objItem,
        ));
    }

    public function actionDisponibilidad() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida'));
            Yii::app()->end();
        }

        $item = Yii::app()->getRequest()->getPost('item');

        if ($item === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $objItem = ComprasItems::model()->findByPk($item);

        if ($objItem === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto de compra no existente'));
            Yii::app()->end();
        }

        if ($objItem->idCombo === null) {
            if ($objItem->disponible == 1)
                $objItem->disponible = 0;
            else
                $objItem->disponible = 1;
            $objItem->save();

            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'msg' => 'Pedido actualizado.',
                    'htmlDetalle' => $this->renderPartial('/admin/_adminPedido', array('objCompra' => $objItem->objCompra), true, false),
            )));
        }else {
            $listItems = ComprasItems::model()->findAll(array(
                'condition' => 'idCompra=:compra AND idCombo=:combo',
                'params' => array(
                    ':compra' => $objItem->idCompra,
                    ':combo' => $objItem->idCombo,
                ),
            ));
            
            foreach ($listItems as $objItemCompra){
                if ($objItemCompra->disponible == 1)
                    $objItemCompra->disponible = 0;
                else
                    $objItemCompra->disponible = 1;
                $objItemCompra->save();
            }
            
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'msg' => 'Pedido actualizado.',
                    'htmlDetalle' => $this->renderPartial('/admin/_adminPedido', array('objCompra' => $objItem->objCompra), true, false),
            )));
        }
    }

    public function actionAgregar() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida'));
            Yii::app()->end();
        }

        $tipo = Yii::app()->getRequest()->getPost('tipo');
        $compra = Yii::app()->getRequest()->getPost('compra');

        if ($tipo === null || $compra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $objCompra = Compras::model()->find(array(
            'condition' => 't.idCompra=:compra',
            'params' => array(
                ':compra' => $compra
            )
        ));

        if ($objCompra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Compra no existente.'));
            Yii::app()->end();
        }

        if ($tipo == 1) {
            $this->agregarProducto($objCompra);
        } else if ($tipo == 2) {
            $this->agregarCombo($objCompra);
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }
    }

    private function agregarProducto(Compras &$objCompra) {
        $producto = Yii::app()->getRequest()->getPost('producto');
        $cantidadU = Yii::app()->getRequest()->getPost('cantidadU');
        $cantidadF = Yii::app()->getRequest()->getPost('cantidadF');

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
                ':ciudad' => $objCompra->codigoCiudad,
                ':sector' => $objCompra->codigoSector,
            ),
        ));

        if ($objProducto === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        $objSaldo = $objProducto->getSaldo($objCompra->codigoCiudad, $objCompra->codigoSector);

        if ($objSaldo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. No hay unidades disponibles"));
            Yii::app()->end();
        }

        $position = new ProductoCarro($objProducto);
        $position->generate(array(
            'objSectorCiudad' => $objCompra->objSectorCiudad,
            'codigoPerfil' => $objCompra->codigoPerfil
        ));

        if ($cantidadU > 0) {
            if ($cantidadU <= $objSaldo->saldoUnidad) {
                $position->setQuantity($cantidadU, false);
            } else {
                echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
                Yii::app()->end();
            }
        }

        if ($cantidadF > 0) {
            if ($cantidadF <= $objSaldo->saldoFraccion) {
                $position->setQuantity($cantidadF, true);
            } else {
                echo CJSON::encode(array(
                    'result' => 'error', 
                    'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoFraccion fracciones"));
                Yii::app()->end();
            }
        }

        $transaction = Yii::app()->db->beginTransaction();
        try {
            $objSaldo->saldoUnidad = $objSaldo->saldoUnidad - ($position->getQuantity() - $position->getQuantityStored());
            $objSaldo->saldoFraccion = $objSaldo->saldoFraccion - $position->getQuantity(true);
            $objSaldo->save();

            $objItem = new ComprasItems;
            $objItem->idCompra = $objCompra->idCompra;
            $objItem->codigoProducto = $objProducto->codigoProducto;
            $objItem->descripcion = $objProducto->descripcionProducto;
            $objItem->presentacion = $objProducto->presentacionProducto;
            $objItem->precioBaseUnidad = $position->getPrice(false, false);
            $objItem->precioBaseFraccion = $position->getPrice(true, false);
            $objItem->descuentoUnidad = $position->getDiscountPrice();
            $objItem->descuentoFraccion = $position->getDiscountPrice(true);
            $objItem->precioTotalUnidad = $position->getSumPriceUnit();
            $objItem->precioTotalFraccion = $position->getSumPriceFraction(true);
            $objItem->terceros = 0;
            $objItem->unidades = $position->getQuantity() - $position->getQuantityStored();
            $objItem->fracciones = $position->getQuantity(true);
            $objItem->unidadesCedi = $position->getQuantityStored();
            $objItem->codigoImpuesto = $objProducto->codigoImpuesto;
            $objItem->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['adicionado'];
            $objItem->idOperador = Yii::app()->controller->module->user->id;
            //$objItem->idEstadoItemTercero = null;
            $objItem->flete = $position->getShipping();
            $objItem->disponible = 1;

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

            $objCompra->subtotalCompra += $position->getSumPrice();
            $objCompra->totalCompra += $position->getTotalPrice();
            $objCompra->flete += $position->getShipping();
            $objCompra->impuestosCompra += ceil($position->getTaxPrice(true));

            if (!$objCompra->save()) {
                throw new Exception("Error al guardar compra" . $objCompra->validateErrorsResponse());
            }

            $transaction->commit();

            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'msg' => 'Pedido actualizado.',
                    'htmlDetalle' => $this->renderPartial('/admin/_adminPedido', array('objCompra' => $objCompra), true, false),
                    'htmlEncabezado' => $this->renderPartial('/admin/_encabezadoPedido', array('objCompra' => $objCompra), true, false)
            )));
            Yii::app()->end();
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }

            echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
            Yii::app()->end();
        }
    }

    private function agregarCombo(Compras &$objCompra) {
        $combo = Yii::app()->getRequest()->getPost('combo', null);
        $cantidad = Yii::app()->getRequest()->getPost('cantidad', null);

        if ($combo === null || $cantidad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        if ($cantidad < 1) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no válida'));
            Yii::app()->end();
        }

        $fecha = new DateTime;
        $objCombo = Combo::model()->find(array(
            'with' => array('listProductosCombo'),
            'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha',
            'params' => array(
                ':combo' => $combo,
                ':estado' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
            )
        ));

        if ($objCombo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        $objSaldo = ComboSectorCiudad::model()->find(array(
            'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND idCombo=:combo',
            'params' => array(
                ':ciudad' => $objCompra->codigoCiudad,
                ':sector' => $objCompra->codigoSector,
                ':combo' => $combo
            )
        ));

        if ($objSaldo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        if ($cantidad > $objSaldo->saldo) {
            echo CJSON::encode(array(
                'result' => 'error', 
                'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldo unidades"));
            Yii::app()->end();
        }

        $position = new ProductoCarro($objCombo);
        $position->generate(array(
            'objSectorCiudad' => $objCompra->objSectorCiudad,
            'codigoPerfil' => $objCompra->codigoPerfil
        ));
        $position->setQuantity($cantidad, false);

        $transaction = Yii::app()->db->beginTransaction();
        try {
            $objSaldo->saldo = $objSaldo->saldo - $position->getQuantity();
            $objSaldo->save();

            foreach ($objCombo->listProductosCombo as $productoCombo) {
                $objItem = new ComprasItems;
                $objItem->idCompra = $objCompra->idCompra;
                $objItem->idCombo = $objCombo->idCombo;
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
                $objItem->terceros = 0;
                $objItem->unidades = $position->getQuantity();
                $objItem->fracciones = 0;
                $objItem->unidadesCedi = 0;
                $objItem->codigoImpuesto = $productoCombo->objProducto->codigoImpuesto;
                $objItem->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['adicionado'];
                $objItem->idOperador = Yii::app()->controller->module->user->id;
                //$objItem->idEstadoItemTercero = null;
                $objItem->flete = $position->getShipping();
                $objItem->disponible = 1;
                if (!$objItem->save()) {
                    throw new Exception("Error al guardar item de compra $objItem->codigoProducto. " . $objItem->validateErrorsResponse());
                }
            }

            $objCompra->subtotalCompra += $position->getSumPrice();
            $objCompra->totalCompra += $position->getTotalPrice();
            $objCompra->flete += $position->getShipping();
            $objCompra->impuestosCompra += ceil($position->getTaxPrice(true));

            if (!$objCompra->save()) {
                throw new Exception("Error al guardar compra" . $objCompra->validateErrorsResponse());
            }

            $transaction->commit();

            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'msg' => 'Pedido actualizado.',
                    'htmlDetalle' => $this->renderPartial('/admin/_adminPedido', array('objCompra' => $objCompra), true, false),
                    'htmlEncabezado' => $this->renderPartial('/admin/_encabezadoPedido', array('objCompra' => $objCompra), true, false)
            )));
            Yii::app()->end();
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }

            echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
            Yii::app()->end();
        }
    }

    public function actionBuscarSaldo() {

            $idCompra = Yii::app()->getRequest()->getPost('idCompra');
            $pdv = Yii::app()->getRequest()->getPost("pdv");
          //  $idCompra=210372;

            $respuesta = $this->buscarsaldos($idCompra, $pdv);
            $datosSerializados = serialize($respuesta);

            $compra=Compras::model()->findByPk($idCompra);
            $compra->saldosPdv=$datosSerializados;
            $compra->save();
            $htmlRespuesta=$this->renderPartial("_saldosPDV",array("respuesta"=>$respuesta),true);
             echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'htmlSaldo' => $htmlRespuesta
            )));
   
    }

    public function buscarsaldos($idCompra, $pdv) {

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPos'],
            'uri' => "",
            'trace' => 1
        ));
       $result = $client->__soapCall("SaldosSadRemision",  array('idPedido' => $idCompra, 'pdv_despacho' => $pdv));
       return $result;
    }
    
    public function actionRemitir(){
        $idCompra = Yii::app()->getRequest()->getPost('idCompra');
        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPos'],
            'uri' => "",
            'trace' => 1
        ));
       $result = $client->__soapCall("CongelarCompraManual",  array('idPedido' => $idCompra));
       
        echo CJSON::encode(array(
                    'result' => $result[0],
                    'response' => array(
                        'htmlResponse' => $result[1]
         )));
    }
    
    public function actionRemitirBorrar(){
         $idCompra = Yii::app()->getRequest()->getPost('idCompra');
         $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPos'],
            'uri' => "",
            'trace' => 1
        ));
       $result = $client->__soapCall("BorrarCongelada",  array('idPedido' => $idCompra));
       
       echo CJSON::encode(array(
                    'result' => $result[0],
                    'response' => array(
                        'htmlResponse' => $result[1]
       )));
    }
}
