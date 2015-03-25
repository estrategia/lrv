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
            'with' => array('listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'), 'listPrecios'),
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

        if ($cantidadF > 0) {
            $objProductoCarro = new ProductoCarro($objProducto, true);
            Yii::app()->shoppingCart->put($objProductoCarro, $cantidadF);
        }

        if ($cantidadU > 0) {
            $objProductoCarro = new ProductoCarro($objProducto, false);
            Yii::app()->shoppingCart->put($objProductoCarro, $cantidadU);
        }

        /* if (!ctype_digit($cantidad)) {
          echo CJSON::encode(array('result' => 'error', 'response' => 'La cantidad de productos, debe ser n&uacute;mero entero.'));
          Yii::app()->end();
          }
         */

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => 'Producto se cargó a la canasta',
            'canasta' => $this->renderPartial('canasta', null, true),
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
        $id = Yii::app()->getRequest()->getPost('id', null);
        $cantidad = Yii::app()->getRequest()->getPost('cantidad', null);

        if ($id === null || $cantidad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        if (!Yii::app()->shoppingCart->contains($id)) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no agregado a carro'));
            Yii::app()->end();
        }

        $position = Yii::app()->shoppingCart->itemAt($id);
        Yii::app()->shoppingCart->update($position, $cantidad);

        echo CJSON::encode(array(
            'result' => 'ok',
            'carro' => $this->renderPartial('carro', null, true),
            'canasta' => $this->renderPartial('canasta', null, true),
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

    public function actionPagar($paso = null, $ajax = false) {
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

        if ($ajax) {
            $siguiente = Yii::app()->getRequest()->getPost('siguiente', null);
            switch ($paso) {
                case Yii::app()->params->pagar['pasos'][1]:
                    $modelPago->idDireccionDespacho = Yii::app()->getRequest()->getPost('direccion', null);

                    if ($modelPago->validate()) {
                        $modelPago->pasoValidado[] = $paso;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($modelPago);
                        Yii::app()->end();
                    }
                    break;
                case Yii::app()->params->pagar['pasos'][2]:
                    break;
                case Yii::app()->params->pagar['pasos'][3]:
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    break;
            }

            echo CJSON::encode(array('result' => 'error', 'response' => 'ERROR'));
            Yii::app()->end();
        } else {

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
            $params['parametros']['modelPago'] = $modelPago;

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


                    /* echo "Cant: " . count($listDirecciones);
                      echo "<br/>cedula: " . Yii::app()->user->name;
                      echo "<br/>ciudad: " . $objSectorCiudad->codigoCiudad;
                      echo "<br/>sector: " . $objSectorCiudad->codigoSector;
                      echo "<br/>Direcciones<br/><br/>"; */
                    foreach ($listDirecciones as $model) {
                        //echo "Id: $model->idDireccionDespacho<br/>";
                        $model->codigoCiudad = "$model->codigoCiudad-$model->codigoSector";
                    }

                    //exit();

                    $params['parametros']['listUbicacion'] = array();

                    //$this->render('direcciones', array('models' => $models, 'listUbicacion' => $listUbicacion, 'carro' => false));


                    $params['parametros']['prueba'] = 1;
                    break;
                case Yii::app()->params->pagar['pasos'][2]:
                    $params['parametros']['prueba'] = 2;
                    break;
                case Yii::app()->params->pagar['pasos'][3]:
                    $params['parametros']['prueba'] = 3;
                    break;
                case Yii::app()->params->pagar['pasos'][4]:
                    $params['parametros']['prueba'] = 4;
                    break;
            }

            $this->render('pagar', $params);
        }
    }

    /* public function actionAdd($codigo = 10670) {

      $objProducto = Producto::model()->findByPk($codigo);
      $objProductoCarro = new ProductoCarro($objProducto, 1);
      //$objProductoCarro->setProducto($objProducto, 25096, 1, 1, 1);
      //Yii::app()->shoppingCart->codigoCiudad = 25096;
      //Yii::app()->shoppingCart->codigoSector = 1;

      Yii::app()->shoppingCart->setUbicacion(25096, 1);

      $objProducto->tipoUnidadPrecio = 1;
      Yii::app()->shoppingCart->put($objProductoCarro, 1);
      } */

    public function actionList() {
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
            echo "Precio: " . $position->getPrice();
            echo "<br/>";
            echo "Cantidad: " . $position->getQuantity();
            echo "<br/>";
            echo "Precio: " . $position->getSumPrice();
            echo "<br/>";
            echo "Otro: " . $position->objProducto->codigoProducto;
            echo "<br/>";

            echo "<br/>";
        }
    }

}
