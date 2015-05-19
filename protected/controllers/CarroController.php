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
                //'access + autenticar, recordar, registro, restablecer',
                //'loginajax + agregar',
        );
    }

    public function filterAccess($filter) {
        if (!Yii::app()->user->isGuest) {
            //Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']] = 'null';
            $this->redirect(Yii::app()->homeUrl);
        }
        $filter->run();
    }

    public function filterLoginajax($filter) {
        if (Yii::app()->user->isGuest) {
            //$this->redirect(Yii::app()->user->loginUrl);
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta usuario autenticado, por favor iniciar sesión para poder agregar productos a la canasta'));
            //Yii::app()->end();
        }
        $filter->run();
    }

    public function actionAgregar() {
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

        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
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
                $cantidadCarroUnidad = $position->getQuantity();
            }

            //si hay saldo, agrega a carro, sino consulta bodega
            if ($cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
                $objProductoCarro = new ProductoCarro($objProducto);
                Yii::app()->shoppingCart->put($objProductoCarro, false, $cantidadU);
            } else {
                if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['presencial']) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no disponible'));
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
                    echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no disponible'));
                    Yii::app()->end();
                }

                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
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

        if ($cantidadF > 0) {
            $objProductoCarro = new ProductoCarro($objProducto);
            Yii::app()->shoppingCart->put($objProductoCarro, true, $cantidadF);
        }

        /* if (!ctype_digit($cantidad)) {
          echo CJSON::encode(array('result' => 'error', 'response' => 'La cantidad de productos, debe ser n&uacute;mero entero.'));
          Yii::app()->end();
          }
         */

        /* echo CJSON::encode(array(
          'result' => 'ok',
          'response' => 'Producto se cargó a la canasta',
          'canasta' => $this->renderPartial('canasta', null, true),
          )); */
        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial('canasta', null, true),
                'mensajeHTML' => $this->renderPartial('_carroAgregado', null, true),
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
            echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no disponible'));
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
            $cantidadCarroUnidad = $position->getQuantity() - $position->getQuantityStored();
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
                echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no disponible para entrega inmediata'));
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
                echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no disponible para entrega ' . Yii::app()->shoppingCart->getDeliveryStored() . ' hrs'));
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

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'canastaHTML' => $this->renderPartial('canasta', null, true),
                'mensajeHTML' => $this->renderPartial('_carroAgregado', null, true),
            ),
        ));
        Yii::app()->end();
    }

    /* public function actionCanasta() {
      $this->render('canasta');
      } */

    public function actionIndex() {
        $this->render('index');
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
                            'message' => 'Cantidad no disponible',
                            'carroHTML' => $this->renderPartial('carro', null, true),
                    )));
                    Yii::app()->end();
                }

                $cantidadBodega = $cantidadU - $objSaldo->saldoUnidad;
                $cantidadUbicacion = $cantidadU - $cantidadBodega - ($position->getQuantity() - $position->getQuantityStored());

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
                            'message' => 'Cantidad no disponible',
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
                        'message' => 'Cantidad no disponible',
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
                    'message' => 'Cantidad no disponible',
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

        /* if ($cantidad < 0) {
          echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no válida'));
          Yii::app()->end();
          } */

        $objSaldoBodega = ProductosSaldosCedi::model()->find(array(
            'condition' => 'codigoProducto=:producto AND codigoCedi=:cedi AND saldoUnidad>=:saldo',
            'params' => array(
                ':producto' => $position->objProducto->codigoProducto,
                ':cedi' => $objSectorCiudad->objCiudad->codigoSucursal,
                ':saldo' => $cantidad
            )
        ));

        if ($objSaldoBodega === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no disponible'));
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

    public function actionPagar($paso = null, $post = false, $cambio = false) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
            $this->redirect($this->createUrl('/sitio/ubicacion'));
        }

        $tipoEntrega = null;

        if ($cambio) {
            Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] = Yii::app()->params->entrega['tipo']['domicilio'];
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
            $paso = null;
            $post = false;
        }

        if (isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != null)
            $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];

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

        if (!in_array($paso, Yii::app()->params->pagar['pasosDisponibles'])) {
            throw new CHttpException(404, 'Página solicitada no existe.');
        }

        $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];
        $nPasoActual = Yii::app()->params->pagar['pasos'][$paso];
        $nPasoAnterior = $nPasoActual - 1;
        $nPasoSiguiente = $nPasoActual + 1;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];
        } else {
            $modelPago = new FormaPagoForm;
            $modelPago->identificacionUsuario = Yii::app()->user->name;
            //$modelPago->consultarBono(Yii::app()->shoppingCart->getTotalCost());
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
                    $modelPago->idDireccionDespacho = Yii::app()->getRequest()->getPost('direccion', null);

                    if ($modelPago->validate()) {
                        $modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($modelPago);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][2]:
                    if ($_POST['FormaPagoForm']) {
                        $form = new FormaPagoForm($paso);
                        $form->identificacionUsuario = Yii::app()->user->name;
                        $form->attributes = $_POST['FormaPagoForm'];

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
                    if ($_POST['FormaPagoForm']) {
                        $form = new FormaPagoForm($paso);
                        $form->identificacionUsuario = Yii::app()->user->name;
                        $form->attributes = $_POST['FormaPagoForm'];
                        $form->bono = $modelPago->bono;

                        //CVarDumper::dump($form);

                        if ($form->validate()) {
                            //$modelPago->attributes = $_POST['FormaPagoForm'];
                            $modelPago->idFormaPago = $form->idFormaPago;
                            $modelPago->tarjetaNumero = $form->tarjetaNumero;
                            $modelPago->numeroCuotas = $form->numeroCuotas;
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
                    } else {
                        echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;

                    if ($siguiente == "finalizar") {
                        if ($_POST['FormaPagoForm']) {
                            $form = new FormaPagoForm($paso);
                            $form->identificacionUsuario = Yii::app()->user->name;
                            $form->attributes = $_POST['FormaPagoForm'];

                            if ($form->validate()) {
                                //$modelPago->attributes = $_POST['FormaPagoForm'];
                                //$modelPago->confirmacion = $form->confirmacion;

                                $modelPago->pasoValidado[$paso] = $paso;
                                Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                                echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados $modelPago->confirmacion", 'redirect' => $this->createUrl("/carro/comprar")));
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
            $params = array();
            $params['paso'] = $paso;

            $pasoSiguiente = isset(Yii::app()->params->pagar['pasos'][$nPasoSiguiente]) ? Yii::app()->params->pagar['pasos'][$nPasoSiguiente] : null;
            $pasoAnterior = isset(Yii::app()->params->pagar['pasos'][$nPasoAnterior]) ? Yii::app()->params->pagar['pasos'][$nPasoAnterior] : null;

            $params['pasoAnterior'] = $pasoAnterior;
            $params['pasoSiguiente'] = $pasoSiguiente;

            switch ($paso) {
                case Yii::app()->params->pagar['pasos'][1]:
                    $listDirecciones = DireccionesDespacho::model()->findAll(array(
                        'condition' => 'identificacionUsuario=:cedula AND codigoCiudad=:ciudad AND codigoSector=:sector AND activo=:activo',
                        'params' => array(
                            ':cedula' => Yii::app()->user->name,
                            ':activo' => 1,
                            ':ciudad' => $objSectorCiudad->codigoCiudad,
                            ':sector' => $objSectorCiudad->codigoSector
                        )
                    ));

                    $params['parametros']['listDirecciones'] = $listDirecciones;
                    foreach ($listDirecciones as $model) {
                        $model->codigoCiudad = "$model->codigoCiudad-$model->codigoSector";
                    }

                    $params['parametros']['listUbicacion'] = array();
                    break;
                case Yii::app()->params->pagar['pasos'][2]:
                    $params['parametros']['prueba'] = 2;
                    /* $objHorarioCiudadSector = HorariosCiudadSector::model()->find(array(
                      'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND estadoCiudadSector=:estado',
                      'params' => array(
                      ':estado' => 1,
                      ':ciudad' => $objSectorCiudad->codigoCiudad,
                      ':sector' => $objSectorCiudad->codigoSector
                      )
                      ));

                      $listHorarios = array();

                      if ($objHorarioCiudadSector == null) {
                      $listHorarios = FormaPagoForm::listDataHoras();
                      } else {
                      $listHorarios = FormaPagoForm::listDataHoras($objHorarioCiudadSector->horaInicio, $objHorarioCiudadSector->horaFin);
                      }
                     * 
                     */

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
        //Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];
        else {
            $modelPago = new FormaPagoForm;
            $modelPago->identificacionUsuario = Yii::app()->user->name;
        }

        if ($post) {
            if (isset($_POST['pos'])) {
                $indicePdv = $_POST['pos'];
                $puntoVenta = $modelPago->listPuntosVenta[1][$indicePdv];
                $modelPago->indicePuntoVenta = $indicePdv;

                //recorrer productos y actualiar carro
                foreach ($puntoVenta[4] as $indiceProd => $producto) {
                    /* $positions = Yii::app()->shoppingCart->getPositions();

                      foreach ($positions as $position) {

                      } */

                    $position = Yii::app()->shoppingCart->itemAt($producto['CODIGO_PRODUCTO']);
                    if ($position !== null) {
                        if ($producto['CANTIDAD_UNIDAD'] > 0) {
                            Yii::app()->shoppingCart->update($position, false, $producto['SALDO_UNIDAD']);
                        }

                        if ($producto['CANTIDAD_FRACCION'] > 0) {
                            Yii::app()->shoppingCart->update($position, true, $producto['SALDO_FRACCION']);
                        }
                    }
                }

                $listFormaPago = FormaPago::model()->findAll(array(
                    'order' => 'formaPago',
                    'condition' => 'estadoFormaPago=:estado',
                    'params' => array(':estado' => 1)
                ));
                $modelPago->consultarBono(Yii::app()->shoppingCart->getTotalCost());
                Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                $modelPago->setScenario('pago');
                $params['listFormaPago'] = $listFormaPago;
                $params['modelPago'] = $modelPago;
                $params['submit'] = true;

                $this->render('_paso3', $params);

                //$this->comprarPresencial($modelPago);
            } else if (isset($_POST['FormaPagoForm'])) {
                if (isset($_POST['siguiente']) && $_POST['siguiente'] == "finalizar") {
                    $form = new FormaPagoForm('confirmacion');
                    $form->identificacionUsuario = Yii::app()->user->name;
                    $form->attributes = $_POST['FormaPagoForm'];

                    if ($form->validate()) {
                        //$modelPago->attributes = $_POST['FormaPagoForm'];
                        //$modelPago->confirmacion = $form->confirmacion;

                        //$modelPago->pasoValidado[$paso] = $paso;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados $modelPago->confirmacion", 'redirect' => $this->createUrl("/carro/comprar")));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }
                } else {
                    $form = new FormaPagoForm('pago');
                    $form->attributes = $_POST['FormaPagoForm'];
                    $modelPago->idFormaPago = $form->idFormaPago;
                    $modelPago->tarjetaNumero = $form->tarjetaNumero;
                    $modelPago->numeroCuotas = $form->numeroCuotas;
                    $modelPago->usoBono = $form->usoBono;
                    Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                    $modelPago->setScenario('pago');

                    if ($modelPago->validate()) {
                        $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
                        $params['objDireccion'] = null;
                        $params['objFormaPago'] = $objFormaPago;

                        if ($modelPago->bono !== null && $modelPago->usoBono == 1) {
                            Yii::app()->shoppingCart->setBono($modelPago->bono['valor']);
                        }

                        $modelPago->calcularConfirmacion(Yii::app()->shoppingCart->getPositions());
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        $modelPago->setScenario('finalizar');
                        $params['modelPago'] = $modelPago;

                        $this->render('_paso4', $params);
                    } else {

                        $listFormaPago = FormaPago::model()->findAll(array(
                            'order' => 'formaPago',
                            'condition' => 'estadoFormaPago=:estado',
                            'params' => array(':estado' => 1)
                        ));
                        $modelPago->consultarBono(Yii::app()->shoppingCart->getTotalCost());
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        $modelPago->setScenario('pago');
                        $params['listFormaPago'] = $listFormaPago;
                        $params['modelPago'] = $modelPago;
                        $params['submit'] = true;
                        $this->render('_paso3', $params);
                    }
                }
            }
        } else {
            $modelPago->consultarDisponibilidad(Yii::app()->shoppingCart->getPositions());
            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;

            $this->render('pagarPresencial', array('listPuntosVenta' => $modelPago->listPuntosVenta));
        }
    }

    public function actionComprar() {
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];

        if ($modelPago === null) {
            $this->redirect($this->createUrl('pagar'));
        }

        if ($modelPago->bono !== null && $modelPago->usoBono == 1) {
            Yii::app()->shoppingCart->setBono($modelPago->bono['valor']);
        }

        $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];

        if ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
            $this->comprarDomicilio($modelPago);
        } else if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
            $this->comprarPresencial($modelPago);
        } else {
            $this->redirect($this->createUrl('/sitio'));
        }


        //echo "pago: " . ($confirmacion ? "TRUE" : "FALSE") . " <br/>";
        //CVarDumper::dump($modelPago, 10, true);
        //Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
    }

    private function comprarDomicilio(FormaPagoForm $modelPago) {
        $confirmacion = true;

        foreach (Yii::app()->params->pagar['pasosDisponibles'] as $idx => $paso) {
            if (!isset($modelPago->pasoValidado[$paso])) {
                $confirmacion = false;
                break;
            }
        }

        //validar modelo pago con metodo valid para cada uno de los pasos
        $modelPago->setScenario('finalizar');
        if ($confirmacion && !$modelPago->validate()) {
            $confirmacion = false;
        }

        if ($confirmacion) {
            $transaction = Yii::app()->db->beginTransaction();
            try {
                //registrar compra compra
                $objCompra = new Compras;
                $objCompra->identificacionUsuario = $modelPago->identificacionUsuario;
                $objCompra->fechaEntrega = $modelPago->fechaEntrega;
                $objCompra->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];
                $objCompra->idEstadoCompra = 1;
                $objCompra->observacion = $modelPago->comentario;
                $objCompra->idTipoVenta = 1;
                $objCompra->activa = 1;
                $objCompra->invitado = 0;
                $objCompra->codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
                $objCompra->codigoCiudad = Yii::app()->shoppingCart->getCodigoCiudad();
                $objCompra->codigoSector = Yii::app()->shoppingCart->getCodigoSector();
                $objCompra->tiempoDomicilioCedi = Yii::app()->shoppingCart->getDeliveryStored();
                $objCompra->valorDomicilioCedi = Yii::app()->shoppingCart->getShippingStored();
                $objCompra->codigoCedi = Yii::app()->shoppingCart->objSectorCiudad->objCiudad->codigoSucursal;
                $objCompra->subtotalCompra = Yii::app()->shoppingCart->getCost();
                $objCompra->impuestosCompra = Yii::app()->shoppingCart->getTaxPrice();
                $objCompra->domicilio = Yii::app()->shoppingCart->getShipping();
                $objCompra->flete = Yii::app()->shoppingCart->getExtraShipping();
                $objCompra->totalCompra = Yii::app()->shoppingCart->getTotalCost();
                //$objCompra->save();
                if (!$objCompra->save()) {
                    throw new Exception("Error al guardar compra" . $objCompra->getErrors());
                }

                $objFormasPago = new FormasPago; //FormaPago::model()->findByPk($modelPago->idFormaPago);
                $objFormasPago->idCompra = $objCompra->idCompra;
                $objFormasPago->valor = Yii::app()->shoppingCart->getTotalCost();
                $objFormasPago->numeroTarjeta = $modelPago->tarjetaNumero;
                $objFormasPago->cuotasTarjeta = $modelPago->numeroCuotas;
                $objFormasPago->idFormaPago = $modelPago->idFormaPago;
                $objFormasPago->valorBono = Yii::app()->shoppingCart->getBono();
                /* if ($modelPago->usoBono == 1 && $modelPago->bono != null) {
                  $objFormasPago->valorBono = $modelPago->bono['valor'];
                  } */
                //$objFormasPago->save();
                if (!$objFormasPago->save()) {
                    throw new Exception("Error al guardar forma de pago" . $objFormasPago->getErrors());
                }

                $objDireccion = DireccionesDespacho::model()->findByPk($modelPago->idDireccionDespacho);
                $objCompraDireccion = new ComprasDireccionesDespacho;
                $objCompraDireccion->idCompra = $objCompra->idCompra;
                $objCompraDireccion->descripcion = $objDireccion->descripcion;
                $objCompraDireccion->identificacion = $objDireccion->identificacionBeneficiario;
                $objCompraDireccion->nombre = $objDireccion->nombre;
                $objCompraDireccion->direccion = $objDireccion->direccion;
                $objCompraDireccion->barrio = $objDireccion->barrio;
                $objCompraDireccion->telefono = $objDireccion->telefono;
                $objCompraDireccion->celular = $objDireccion->celular;
                $objCompraDireccion->codigoCiudad = $objDireccion->codigoCiudad;
                $objCompraDireccion->codigoSector = $objDireccion->codigoSector;
                $objCompraDireccion->pdvAsignado = $objDireccion->pdvAsignado;
                //$objCompraDireccion->save();
                if (!$objCompraDireccion->save()) {
                    throw new Exception("Error al guardar dirección de compra" . $objCompraDireccion->getErrors());
                }

                //items de compra
                $positions = Yii::app()->shoppingCart->getPositions();
                foreach ($positions as $position) {
                    if ($position->isProduct()) {
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

                        if ($objSaldo->saldoUnidad < ($position->getQuantity() - $position->getQuantityStored())) {
                            throw new Exception("Producto " . $position->objProducto->codigoProducto . " ya no cuenta con unidades solicitadas");
                        }

                        if ($objSaldo->saldoFraccion < $position->getQuantity(true)) {
                            throw new Exception("Producto " . $position->objProducto->codigoProducto . " ya no cuenta con fracciones solicitadas");
                        }

                        $objSaldo->saldoUnidad = $objSaldo->saldoUnidad - ($position->getQuantity() - $position->getQuantityStored());
                        $objSaldo->saldoFraccion = $objSaldo->saldoFraccion - $position->getQuantity(true);
                        $objSaldo->save();

                        //actualizar unidades bodega
                        //actualizar unidades bodega
                        //actualizar unidades bodega


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
                        $objItem->terceros = 0;
                        $objItem->unidades = $position->getQuantity() - $position->getQuantityStored();
                        $objItem->fracciones = $position->getQuantity(true);
                        $objItem->unidadesCedi = $position->getQuantityStored();
                        $objItem->impuesto = $position->objProducto->codigoImpuesto;
                        $objItem->idEstadoItem = 1;
                        //$objItem->idEstadoItemTercero = null;
                        $objItem->flete = $position->getShipping();
                        //$objItem->tiempoEntrega;
                        $objItem->disponible = 1;
                        //$objItem->tiempoDespachoHoras;
                        //$objItem->recambio;
                        //$objItem->idPromocion;

                        if (!$objItem->save()) {
                            throw new Exception("Error al guardar item de compra $objItem->codigoProducto. " . $objItem->getErrors());
                        }

                        //beneficios
                        foreach ($position->getBeneficios() as $objBeneficio) {
                            $objBeneficioItem = new BeneficiosComprasItems;
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
                            $objBeneficioItem->swobligaCli = $objBeneficio->swobligaCli;
                            $objBeneficioItem->fechaCreacionBeneficio = $objBeneficio->fechaCreacionBeneficio;

                            if (!$objBeneficioItem->save()) {
                                throw new Exception("Error al guardar beneficio de compra $objBeneficioItem->idCompraItem. " . $objBeneficioItem->getErrors());
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
                            throw new Exception("Combo " . $position->objCombo->getCodigo() . " ya no cuenta con unidades solicitadas");
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
                            $objItem->terceros = 0;
                            $objItem->unidades = $position->getQuantity();
                            $objItem->fracciones = 0;
                            $objItem->unidadesCedi = 0;
                            $objItem->impuesto = $productoCombo->objProducto->codigoImpuesto;
                            $objItem->idEstadoItem = 1;
                            //$objItem->idEstadoItemTercero = null;
                            $objItem->flete = $position->getShipping();
                            //$objItem->tiempoEntrega;
                            $objItem->disponible = 1;
                            //$objItem->tiempoDespachoHoras;
                            //$objItem->recambio;
                            //$objItem->idPromocion;
                            if (!$objItem->save()) {
                                throw new Exception("Error al guardar item de compra $objItem->codigoProducto. " . $objItem->getErrors());
                            }
                        }
                    }
                }

                $transaction->commit();
                $usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
                $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
                $contenidoCorreo = $this->renderPartial('compraCorreo', array(
                    'objCompra' => $objCompra,
                    'modelPago' => $modelPago,
                    'objCompraDireccion' => $objCompraDireccion,
                    'objFormaPago' => $objFormaPago,
                    'objFormasPago' => $objFormasPago), true, true);
                $htmlCorreo = $this->renderPartial('/usuario/_correo', array('contenido' => $contenidoCorreo), true, true);
                sendHtmlEmail($usuario->correoElectronico, Yii::app()->params->asunto['pedidoRealizado'], $htmlCorreo);
                
                $contenidoSitio = $this->renderPartial('compraContenido', array(
                    'objCompra' => $objCompra,
                    'modelPago' => $modelPago,
                    'objCompraDireccion' => $objCompraDireccion,
                    'objFormaPago' => $objFormaPago,
                    'objFormasPago' => $objFormasPago), true, true);

                Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
                Yii::app()->shoppingCart->clear();
                $this->render('compra', array(
                    'contenido' => $contenidoSitio,
                ));
                Yii::app()->end();
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

                try {
                    $transaction->rollBack();
                } catch (Exception $txexc) {
                    Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                }

                Yii::app()->user->setFlash('error', "Error al realizar compra, por favor intente de nuevo. " . $exc->getMessage());
                $this->redirect($this->createUrl('pagar'));
                Yii::app()->end();
            }
        } else {
            $this->redirect($this->createUrl('pagar'));
        }
    }

    private function comprarPresencial(FormaPagoForm $modelPago) {
        $transaction = Yii::app()->db->beginTransaction();
        try {
            //registrar compra compra
            $objCompra = new Compras;
            $objCompra->identificacionUsuario = $modelPago->identificacionUsuario;

            $puntoVenta = $modelPago->listPuntosVenta[1][$modelPago->indicePuntoVenta];
            $objCompra->idComercial = $puntoVenta[1];

            //$objCompra->fechaEntrega;
            $objCompra->tipoEntrega = Yii::app()->params->entrega['tipo']['presencial'];
            $objCompra->idEstadoCompra = 1;
            //$objCompra->observacion;
            $objCompra->idTipoVenta = 1;
            $objCompra->activa = 1;
            $objCompra->invitado = 0;
            $objCompra->codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
            $objCompra->codigoCiudad = Yii::app()->shoppingCart->getCodigoCiudad();
            $objCompra->codigoSector = Yii::app()->shoppingCart->getCodigoSector();
            $objCompra->tiempoDomicilioCedi = 0;
            $objCompra->valorDomicilioCedi = 0;
            $objCompra->codigoCedi = 0;
            $objCompra->subtotalCompra = Yii::app()->shoppingCart->getCost();
            $objCompra->impuestosCompra = Yii::app()->shoppingCart->getTaxPrice();
            $objCompra->domicilio = Yii::app()->shoppingCart->getShipping();
            $objCompra->flete = Yii::app()->shoppingCart->getExtraShipping();
            $objCompra->totalCompra = Yii::app()->shoppingCart->getTotalCost();
            //$objCompra->save();
            if (!$objCompra->save()) {
                throw new Exception("Error al guardar compra" . $objCompra->getErrors());
            }

            $objFormasPago = new FormasPago; //FormaPago::model()->findByPk($modelPago->idFormaPago);
            $objFormasPago->idCompra = $objCompra->idCompra;
            $objFormasPago->valor = Yii::app()->shoppingCart->getTotalCost();
            //$objFormasPago->numeroTarjeta = $modelPago->tarjetaNumero;
            //$objFormasPago->cuotasTarjeta = $modelPago->numeroCuotas;
            $objFormasPago->idFormaPago = $modelPago->idFormaPago;
            $objFormasPago->valorBono = Yii::app()->shoppingCart->getBono();
            /* if ($modelPago->usoBono == 1 && $modelPago->bono != null) {
              $objFormasPago->valorBono = $modelPago->bono['valor'];
              } */
            //$objFormasPago->save();
            if (!$objFormasPago->save()) {
                throw new Exception("Error al guardar forma de pago" . $objFormasPago->getErrors());
            }

            $objCompraDireccion = new ComprasDireccionesDespacho;
            $objCompraDireccion->idCompra = $objCompra->idCompra;
            $objCompraDireccion->descripcion = "NA";
            $objCompraDireccion->identificacion = "NA";
            $objCompraDireccion->nombre = "NA";
            $objCompraDireccion->direccion = "NA";
            $objCompraDireccion->barrio = "NA";
            //$objCompraDireccion->save();
            if (!$objCompraDireccion->save()) {
                throw new Exception("Error al guardar dirección de compra" . $objCompraDireccion->getErrors());
            }

            //items de compra
            $positions = Yii::app()->shoppingCart->getPositions();
            foreach ($positions as $position) {
                if ($position->isProduct()) {
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

                    if ($objSaldo->saldoUnidad < ($position->getQuantity() - $position->getQuantityStored())) {
                        throw new Exception("Producto " . $position->objProducto->codigoProducto . " ya no cuenta con unidades solicitadas");
                    }

                    if ($objSaldo->saldoFraccion < $position->getQuantity(true)) {
                        throw new Exception("Producto " . $position->objProducto->codigoProducto . " ya no cuenta con fracciones solicitadas");
                    }

                    $objSaldo->saldoUnidad = $objSaldo->saldoUnidad - ($position->getQuantity() - $position->getQuantityStored());
                    $objSaldo->saldoFraccion = $objSaldo->saldoFraccion - $position->getQuantity(true);
                    $objSaldo->save();

                    //actualizar unidades bodega
                    //actualizar unidades bodega
                    //actualizar unidades bodega


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
                    $objItem->terceros = 0;
                    $objItem->unidades = $position->getQuantity() - $position->getQuantityStored();
                    $objItem->fracciones = $position->getQuantity(true);
                    $objItem->unidadesCedi = $position->getQuantityStored();
                    $objItem->impuesto = $position->objProducto->codigoImpuesto;
                    $objItem->idEstadoItem = 1;
                    //$objItem->idEstadoItemTercero = null;
                    $objItem->flete = $position->getShipping();
                    //$objItem->tiempoEntrega;
                    $objItem->disponible = 1;
                    //$objItem->tiempoDespachoHoras;
                    //$objItem->recambio;
                    //$objItem->idPromocion;

                    if (!$objItem->save()) {
                        throw new Exception("Error al guardar item de compra $objItem->codigoProducto. " . $objItem->getErrors());
                    }

                    //beneficios
                    foreach ($position->getBeneficios() as $objBeneficio) {
                        $objBeneficioItem = new BeneficiosComprasItems;
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
                        $objBeneficioItem->swobligaCli = $objBeneficio->swobligaCli;
                        $objBeneficioItem->fechaCreacionBeneficio = $objBeneficio->fechaCreacionBeneficio;

                        if (!$objBeneficioItem->save()) {
                            throw new Exception("Error al guardar beneficio de compra $objBeneficioItem->idCompraItem. " . $objBeneficioItem->getErrors());
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
                        throw new Exception("Combo " . $position->objCombo->getCodigo() . " ya no cuenta con unidades solicitadas");
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
                        $objItem->terceros = 0;
                        $objItem->unidades = $position->getQuantity();
                        $objItem->fracciones = 0;
                        $objItem->unidadesCedi = 0;
                        $objItem->impuesto = $productoCombo->objProducto->codigoImpuesto;
                        $objItem->idEstadoItem = 1;
                        //$objItem->idEstadoItemTercero = null;
                        $objItem->flete = $position->getShipping();
                        //$objItem->tiempoEntrega;
                        $objItem->disponible = 1;
                        //$objItem->tiempoDespachoHoras;
                        //$objItem->recambio;
                        //$objItem->idPromocion;
                        if (!$objItem->save()) {
                            throw new Exception("Error al guardar item de compra $objItem->codigoProducto. " . $objItem->getErrors());
                        }
                    }
                }
            }

            $transaction->commit();
            $usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
            $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
            $contenidoCorreo = $this->renderPartial('compraCorreo', array(
                'objCompra' => $objCompra,
                'modelPago' => $modelPago,
                'objCompraDireccion' => $objCompraDireccion,
                'objFormaPago' => $objFormaPago,
                'objFormasPago' => $objFormasPago), true, true);
            $htmlCorreo = $this->renderPartial('/usuario/_correo', array('contenido' => $contenidoCorreo), true, true);
            sendHtmlEmail($usuario->correoElectronico, Yii::app()->params->asunto['pedidoRealizado'], $htmlCorreo);
            
            $contenidoSitio = $this->renderPartial('compraContenido', array(
                    'objCompra' => $objCompra,
                    'modelPago' => $modelPago,
                    'objCompraDireccion' => $objCompraDireccion,
                    'objFormaPago' => $objFormaPago,
                    'objFormasPago' => $objFormasPago), true, true);

            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
            Yii::app()->shoppingCart->clear();
            $this->render('compra', array(
                'contenido' => $contenidoSitio,
            ));
            Yii::app()->end();
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }

            Yii::app()->user->setFlash('error', "Error al realizar compra, por favor intente de nuevo. " . $exc->getMessage());
            $this->redirect($this->createUrl('pagar'));
            //$this->render('registro', array('model' => $model));
            Yii::app()->end();
        }
    }

    public function actionAdd($codigo = 10670) {

        $objProducto = Producto::model()->findByPk($codigo);
        $objProductoCarro = new ProductoCarro($objProducto);
        //$objProductoCarro->setProducto($objProducto, 25096, 1, 1, 1);
        //Yii::app()->shoppingCart->codigoCiudad = 25096;
        //Yii::app()->shoppingCart->codigoSector = 1;
        //Yii::app()->shoppingCart->setUbicacion(25096, 1);
        //$objProducto->tipoUnidadPrecio = 1;
        Yii::app()->shoppingCart->put($objProductoCarro, 1);
    }

    public function actionList() {
        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        //Yii::app()->shoppingCart->clear();
        //exit();
        //CVarDumper::dump(Yii::app()->shoppingCart->itemAt(30128), 2, true);


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

}
