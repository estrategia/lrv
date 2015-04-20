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
                'listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'),
                'listPrecios' => array('condition' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector'),
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
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
                        'mensajeHTML' => $this->renderPartial('_carroBodega', array(
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
            'with' => array('listProductos', 'listProductosCombo'),
            'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND t.saldo>:saldo AND t.codigoCiudad=:ciudad AND t.codigoSector=:sector',
            'params' => array(
                ':combo' => $combo,
                ':estado' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                'saldo' => 0,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            )
        ));

        if ($objCombo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
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
                'listSaldos' => array('condition' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'),
                'listPrecios' => array('condition' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector'),
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
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
                echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no disponible para entrega '.Yii::app()->shoppingCart->getDeliveryStored() .' hrs'));
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

    public function actionCanasta() {
        $this->render('canasta');
    }

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
                'listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'),
                'listPrecios' => array('condition' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector'),
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
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
                        'mensajeHTML' => $this->renderPartial('_carroBodega', array(
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

        if ($cantidad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => array(
                    'message' => 'Solicitud inválida, no se detectan datos',
                    'carroHTML' => $this->renderPartial('carro', null, true),
            )));
            Yii::app()->end();
        }

        $fecha = new DateTime;
        $objCombo = Combo::model()->find(array(
            'with' => array('listProductos', 'listProductosCombo'),
            'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND t.saldo>=:saldo AND t.codigoCiudad=:ciudad AND t.codigoSector=:sector',
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

        if ($cantidad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        if ($cantidad < 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no válida'));
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

        if ($id === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        if (!Yii::app()->shoppingCart->contains($id)) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no agregado a carro'));
            Yii::app()->end();
        }

        Yii::app()->shoppingCart->remove($id);

        echo CJSON::encode(array(
            'result' => 'ok',
            'carro' => $this->renderPartial('carro', null, true),
            'canasta' => $this->renderPartial('canasta', null, true),
        ));
        Yii::app()->end();
    }

    public function actionPagar($paso = null, $post = false) {
        $tipoEntrega = null;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != null)
            $tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];

        if ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
            $this->pagarDomicilio($paso, $post);
        } else if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
            $this->pagarPresencial();
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

        $nPasoActual = Yii::app()->params->pagar['pasos'][$paso];
        $nPasoAnterior = $nPasoActual - 1;
        $nPasoSiguiente = $nPasoActual + 1;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];
        else
            $modelPago = new FormaPagoForm;

        $modelPago->setScenario($paso);
        $modelPago->identificacionUsuario = Yii::app()->user->name;

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

                        if ($form->validate()) {
                            //$modelPago->attributes = $_POST['FormaPagoForm'];
                            $modelPago->idFormaPago = $form->idFormaPago;
                            $modelPago->tarjetaNumero = $form->tarjetaNumero;
                            $modelPago->numeroCuotas = $form->numeroCuotas;
                            $modelPago->codigoCliente = $form->codigoCliente;
                            $modelPago->codigoPromocion = $form->codigoPromocion;
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
            //CVarDumper::dump($modelPago);
            $this->fixedFooter = true;

            $objSectorCiudad = null;
            if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
                $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

            if ($objSectorCiudad === null) {
                Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
                $this->redirect($this->createUrl('/sitio/ubicacion'));
            }

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
                    $objHorarioCiudadSector = HorariosCiudadSector::model()->find(array(
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

                    $params['parametros']['listHorarios'] = $listHorarios;
                    break;
                case Yii::app()->params->pagar['pasos'][3]:
                    $listFormaPago = FormaPago::model()->findAll(array(
                        'order' => 'formaPago',
                        'condition' => 'estadoFormaPago=:estado',
                        'params' => array(':estado' => 1)
                    ));
                    $params['parametros']['listFormaPago'] = $listFormaPago;
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    $objDireccion = DireccionesDespacho::model()->findByPk($modelPago->idDireccionDespacho);
                    $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
                    $params['parametros']['objDireccion'] = $objDireccion;
                    $params['parametros']['objFormaPago'] = $objFormaPago;
                    $modelPago->calcularConfirmacion(Yii::app()->shoppingCart->getPositions());
                    break;
            }
            
            $params['parametros']['modelPago'] = $modelPago;
            $this->render('pagarDomicilio', $params);
        }
    }

    public function pagarPresencial() {
        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;

        $params = array();

        $this->render('pagarPresencial', $params);
    }

    public function actionComprar() {
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];

        if ($modelPago === null) {
            $this->redirect($this->createUrl('pagar'));
        }

        $confirmacion = true;

        if ($modelPago !== null) {
            foreach (Yii::app()->params->pagar['pasosDisponibles'] as $idx => $paso) {
                if (!isset($modelPago->pasoValidado[$paso])) {
                    $confirmacion = false;
                    break;
                }
            }

            $modelPago->setScenario('finalizar');
            if ($confirmacion && !$modelPago->validate()) {
                $confirmacion = false;
            }
        }

        if ($confirmacion) {
            //registrar compra compra
            //renderizar pantalla de gracias por su compra
            //Yii::app()->shoppingCart->clear();
            //Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
        } else {
            //mostrar error de compra
        }

        //validar modelo pago con metodo valid para cada uno de los pasos

        echo "pago: " . ($confirmacion ? "TRUE" : "FALSE") . " <br/>";

        CVarDumper::dump($modelPago, 10, true);

        //Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = null;
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

            if ($position->isProduct()) {
                echo "Es producto<br/>";
            }

            echo "<br/>";
        }
    }

}
