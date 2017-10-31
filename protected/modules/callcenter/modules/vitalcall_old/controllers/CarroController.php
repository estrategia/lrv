<?php
class CarroController extends ControllerVitalcall {

    public function actionIndex() {
        $this->render('index');
        Yii::app()->end();
    }

    public function actionAgregar() {
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
        }

        if (empty($modelPago) || !($modelPago->objSectorCiudad instanceof SectorCiudad)) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
            Yii::app()->end();
        }

        $tipo = Yii::app()->getRequest()->getPost('tipo', null);

        if ($tipo == 1) {
            $this->agregarVitalCall($modelPago);
        } else if ($tipo == 2) {
            $this->agregarProducto($modelPago);
        }

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
            echo CJSON::encode(array('result' => 'error', 'response' => "Producto no vigente [vitalcall: $objProductoFormula->idProductoVitalCall, producto: " . $objProductoFormula->objProductoVC->codigoProducto . "]"));
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
        $idPositionCart = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getIdFromCode($objProducto->codigoProducto);
        
        if($idPositionCart!==null && $idPositionCart!=$idPosition){
        	echo CJSON::encode(array('result' => 'error', 'response' => 'Producto agregado sin f&oacute;rmula o en otra f&oacute;rmula'));
        	Yii::app()->end();
        }

        if ($cantidadU > 0) {
            $cantidadCarroUnidad = 0;
            $position = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->itemAt($idPosition);

            if ($position !== null) {
                $cantidadCarroUnidad = $position->getQuantityUnit();
            }

            //si hay saldo, agrega a carro, sino consulta bodega
            if ($cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
                $objProductoCarro = new ProductoCarro($objProductoFormula);
                Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->put($objProductoCarro, false, $cantidadU);
            } else {
                echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
                Yii::app()->end();
            }
        }

        if ($cantidadF > 0) {
            $objProductoCarro = new ProductoCarro($objProductoFormula);
            Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->put($objProductoCarro, true, $cantidadF);
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
                'objetosCarro' => Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCount()
            ),
        ));
        Yii::app()->end();
    }

    public function agregarProducto(FormaPagoVitalCallForm $modelPago) {
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
                'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
            'params' => array(
                ':activo' => 1,
                ':codigo' => $producto,
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
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        $idPosition = $producto;
        $idPositionCart = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getIdFromCode($objProducto->codigoProducto);
        
        if($idPositionCart!==null && $idPositionCart!=$idPosition){
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto agregado sin f&oacute;rmula o en otra f&oacute;rmula'));
            Yii::app()->end();
        }

        if ($cantidadU > 0) {
            $cantidadCarroUnidad = 0;
            $position = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->itemAt($idPosition);

            if ($position !== null) {
                $cantidadCarroUnidad = $position->getQuantityUnit();
            }

            //si hay saldo, agrega a carro, sino consulta bodega
            if ($cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
                $objProductoCarro = new ProductoCarro($objProducto);
                Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->put($objProductoCarro, false, $cantidadU);
            } else {
                echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
                Yii::app()->end();
            }
        }

        if ($cantidadF > 0) {
            $objProductoCarro = new ProductoCarro($objProducto);
            Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->put($objProductoCarro, true, $cantidadF);
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
                'objetosCarro' => Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCount()
            ),
        ));
        Yii::app()->end();
    }

    public function actionVaciar() {
        Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->clear();
        unset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]);
        unset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['formulaMedica']]);

         echo CJSON::encode(array(
         		'result' => 'ok',
         		'canasta' => $this->renderPartial("canasta" , null, true),
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

        if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
        }

        if (empty($modelPago) || !($modelPago->objSectorCiudad instanceof SectorCiudad)) {
            throw new CHttpException(404, 'Proceso de compra no iniciado');
        }

        if (Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->isEmpty()) {
            if ($post) {
                echo CJSON::encode(array('result' => 'ok', 'response' => 'Carro vac&iacute;o', 'redirect' => $this->createUrl("/callcenter/vitalcall_old/carro")));
                Yii::app()->end();
            } else {
                $this->redirect($this->createUrl('/callcenter/vitalcall_old/cliente'));
                Yii::app()->end();
            }
        }

        if ($modelPago->tipoEntrega == null) {
            $modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];
        }

        //verificar si ubicacion (ciudad-sector) tiene domicilio
        if (!$modelPago->tieneDomicilio()) {
            $modelPago->tipoEntrega = Yii::app()->params->entrega['tipo']['presencial'];
        }

        Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;

        //finalizan validaciones previas e inicializa proceso de pasos de pago

        if ($paso === null)
            $paso = Yii::app()->params->vitalCall['pagar']['pasos'][1];

        if (!in_array($paso, Yii::app()->params->vitalCall['pagar']['pasosDisponibles'])) {
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
                case Yii::app()->params->vitalCall['pagar']['pasos'][1]:
                    $form = new FormaPagoVitalCallForm($paso);
                    $form->identificacionUsuario = $modelPago->identificacionUsuario;
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    $form->totalCompra = $modelPago->totalCompra;

                    if (isset($_POST['FormaPagoVitalCallForm'])) {
                        foreach ($_POST['FormaPagoVitalCallForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                    }

                    if ($form->validate()) {
                        $modelPago->tipoEntrega = $form->tipoEntrega;

                        if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                            $modelPago->indicePuntoVenta = $form->indicePuntoVenta;
                            $modelPago->seleccionarPdv($form->indicePuntoVenta);
                        }

                        $modelPago->fechaEntrega = $form->fechaEntrega;
                        $modelPago->idFormaPago = $form->idFormaPago;
                        $modelPago->numeroTarjeta = $form->numeroTarjeta;
                        $modelPago->cuotasTarjeta = $form->cuotasTarjeta;
                        $modelPago->comentario = $form->comentario;
                        $modelPago->pasoValidado[$paso] = $paso;

                        Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;

                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/callcenter/vitalcall_old/carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    } else {
                        echo CActiveForm::validate($form);
                        Yii::app()->end();
                    }

                    break;
                case Yii::app()->params->vitalCall['pagar']['pasos'][2]:

                    if ($siguiente != "finalizar") {
                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Datos guardados', 'redirect' => $this->createUrl("/callcenter/vitalcall_old/carro/pagar", array('paso' => $siguiente))));
                        Yii::app()->end();
                    }

                    $form = new FormaPagoVitalCallForm($paso);
                    $form->identificacionUsuario = $modelPago->identificacionUsuario;
                    $form->objHorarioCiudadSector = $modelPago->objHorarioCiudadSector;
                    $form->tipoEntrega = $modelPago->tipoEntrega;

                    if (isset($_POST['FormaPagoVitalCallForm'])) {
                        foreach ($_POST['FormaPagoVitalCallForm'] as $atributo => $valor) {
                            $form->$atributo = is_string($valor) ? trim($valor) : $valor;
                        }
                    }

                    if ($form->validate()) {
                        $modelPago->pasoValidado[$paso] = $paso;
                        $modelPago->confirmacion = $form->confirmacion;
                        Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;
                        echo CJSON::encode(array('result' => 'ok', 'response' => "Datos guardados", 'redirect' => $this->createUrl("/callcenter/vitalcall_old/carro/comprar")));
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
            $modelPago->validarPasos(Yii::app()->params->vitalCall['pagar']['pasosDisponibles'], $paso);

            $params = array();
            $params['parametros']['paso'] = $paso;
            $params['paso'] = $paso;

            $nPasoActual = Yii::app()->params->vitalCall['pagar']['pasos'][$paso];
            $nPasoAnterior = $nPasoActual - 1;
            $nPasoSiguiente = $nPasoActual + 1;
            $pasoSiguiente = isset(Yii::app()->params->vitalCall['pagar']['pasos'][$nPasoSiguiente]) ? Yii::app()->params->vitalCall['pagar']['pasos'][$nPasoSiguiente] : null;
            $pasoAnterior = isset(Yii::app()->params->vitalCall['pagar']['pasos'][$nPasoAnterior]) ? Yii::app()->params->vitalCall['pagar']['pasos'][$nPasoAnterior] : null;

            $params['parametros']['pasoAnterior'] = $pasoAnterior;
            $params['parametros']['pasoSiguiente'] = $pasoSiguiente;
            $params['parametros']['nPasoActual'] = $nPasoActual;

            switch ($paso) {
                case Yii::app()->params->vitalCall['pagar']['pasos'][1]:
                    $params['parametros']['listHorarios'] = $modelPago->listDataHoras();

                    $listFormaPago = FormaPago::model()->findAll(array(
                        'order' => 'formaPago',
                        'condition' => 'ventaVitalCall=:estado',
                        'params' => array(':estado' => 1)
                    ));
                    Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;
                    $params['parametros']['listFormaPago'] = $listFormaPago;

                    break;
                case Yii::app()->params->vitalCall['pagar']['pasos'][2]:
                    $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
                    $params['parametros']['objFormaPago'] = $objFormaPago;


                    //verificar productos en pdv
                    if ($modelPago->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                        $modelPago->seleccionarPdv($modelPago->indicePuntoVenta);
                    }
                    $modelPago->calcularConfirmacion(Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getPositions());
                    $modelPago->calcularFormulas(Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getPositions());
                    break;
            }
            $params['parametros']['modelPago'] = $modelPago;
            $this->render("pagar", $params);
        }
    }

    public function actionPasoporel() {
        $opcion = Yii::app()->getRequest()->getPost('opcion');

        if ($opcion == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inv&aacute;lida'));
            Yii::app()->end();
        }

        $modelPago = null;
        if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
        }

        if ($modelPago == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
            Yii::app()->end();
        }

        if ($opcion == "modal") {
            $modelPago->consultarDisponibilidad(Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall);
            Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;

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
            Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;

            echo CJSON::encode(array('result' => 'ok', 'response' => 'Punto de venta seleccionado'));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud env&aacute;lida'));
            Yii::app()->end();
        }
    }
    
    public function actionComprar() {
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];

        if ($modelPago === null) {
            Yii::app()->user->setFlash('error', "Error: Por favor verificar los datos de tu compra.");
            $this->redirect($this->createUrl('/callcenter/vitalcall_old/carro'));
            Yii::app()->end();
        }

        $modelPago->totalCompra = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getTotalCost();

        if (!in_array($modelPago->tipoEntrega, Yii::app()->params->entrega['listaTipos'])) {
            Yii::app()->user->setFlash('error', "Tipo de entrega inválido, por favor seleccionar tipo de entrega.");
            $this->redirect($this->createUrl('/callcenter/vitalcall_old/carro'));
        }

        //validaciones de compra
        $pasoValidacion = null;
        //se valida que cada paso este realizado
        $modelPago->validarConfirmacion(Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getPositions());
        $pasosDisponibles = Yii::app()->params->vitalCall['pagar']['pasosDisponibles'];
        Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;

        foreach ($pasosDisponibles as $idx => $paso) {
            $modelPago->setScenario($paso);
            $form = new FormaPagoVitalCallForm($paso);
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
            $this->redirect($this->createUrl('/callcenter/vitalcall_old/carro/pagar', $paramsValidacion));
            Yii::app()->end();
        }


        //si ha llegado aqui, paso todas las validaciones y se puede proceder con proceso de compra
        if ($modelPago->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
            Yii::app()->user->setFlash('error', "Error: Pago en l&iacute;nea no habilitado.");
            $this->redirect($this->createUrl('/callcenter/vitalcall_old/carro'));
        }

        $resultCompra = $this->procesoCompra($modelPago, $modelPago->tipoEntrega);

        if ($resultCompra['result'] == 1) {
            $contenidoSitio = $this->renderPartial("compraContenido", array(
                'objCompra' => $resultCompra['response']['objCompra'],
                'modelPago' => $resultCompra['response']['modelPago'],
                'objCompraDireccion' => $resultCompra['response']['objCompraDireccion'],
                'objFormaPago' => $resultCompra['response']['objFormaPago'],
                'objFormasPago' => $resultCompra['response']['objFormasPago']), true);

            Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = null;
            Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->clear();
            $this->render('application.views.carro.compra', array(
                'contenido' => $contenidoSitio,
                'objCompra' => $resultCompra['response']['objCompra'],
            ));
            Yii::app()->end();
        } else {
            Yii::app()->user->setFlash('error', "Error al realizar compra, por favor intente de nuevo. " . $resultCompra['response']);
            $this->redirect($this->createUrl('/callcenter/vitalcall_old/carro/pagar'));
            Yii::app()->end();
        }
    }

    private function procesoCompra(FormaPagoVitalCallForm $modelPago, $tipoEntrega) {
        $transaction = Yii::app()->db->beginTransaction();
        try {
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

            $objCompra->idTipoVenta = Yii::app()->params->tipoVenta['vitalCall'];
            $objCompra->activa = 1;
            $objCompra->invitado = 1;
            $objCompra->codigoPerfil = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoPerfil();
            $objCompra->codigoCiudad = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoCiudad();
            $objCompra->codigoSector = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoSector();

            //no se maneja venta bodega
            $objCompra->tiempoDomicilioCedi = 0;
            $objCompra->valorDomicilioCedi = 0;
            $objCompra->codigoCedi = 0;

            $objCompra->subtotalCompra = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCost();
            $objCompra->impuestosCompra = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getTaxPrice();
            $objCompra->baseImpuestosCompra = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getBaseTaxPrice();
            $objCompra->domicilio = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getShipping();
            $objCompra->flete = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getExtraShipping();
            $objCompra->totalCompra = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getTotalCost();

            if (!$objCompra->save()) {
                throw new Exception("Error al guardar compra [0]" . $objCompra->validateErrorsResponse());
            }

            if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['formulaMedica']])) {
              foreach (Yii::app()->session[Yii::app()->params->vitalCall['sesion']['formulaMedica']] as $formula) {
              $formulaMedica = new FormulasMedicas();
              $formulaMedica->idCompra = $objCompra->idCompra;
              $formulaMedica->nombreMedico = $formula['nombreMedico'];
              $formulaMedica->institucion = $formula['institucion'];
              $formulaMedica->registroMedico = $formula['registroMedico'];
              $formulaMedica->telefono = $formula['telefono'];
              $formulaMedica->correoElectronico = $formula['correoElectronico'];
              $formulaMedica->formulaMedica = $formula['formulaMedica'];

              if (!$formulaMedica->save()) {
              	//echo "<pre>";
              	//print_r($formulaMedica->getErrors());exit();
              	throw new Exception("Error al formula medica" . implode(",",$formulaMedica->getErrors()));
              }
              }

              unset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['formulaMedica']]);
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

            /*             * ***************************************************************************************************** */
            /*             * ************************************** GUARDAN LAS FORMAS DE PAGO *********************************** */
            /*             * ***************************************************************************************************** */

            $objFormasPago = new FormasPago; //FormaPago::model()->findByPk($modelPago->idFormaPago);
            $objFormasPago->idCompra = $objCompra->idCompra;
            $objFormasPago->valor = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getTotalCost();
            $objFormasPago->numeroTarjeta = $modelPago->numeroTarjeta;
            $objFormasPago->cuotasTarjeta = $modelPago->cuotasTarjeta;
            $objFormasPago->idFormaPago = $modelPago->idFormaPago;


            if (!$objFormasPago->save()) {
                throw new Exception("Error al guardar forma de pago" . $objFormasPago->validateErrorsResponse());
            }

            //$objFormasPago->valorBono = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getBono();
            $objCompraDireccion = new ComprasDireccionesDespacho;
            $objCompraDireccion->idCompra = $objCompra->idCompra;
            $objCompraDireccion->descripcion = "NA";
            $objCompraDireccion->telefono = $modelPago->objDireccion->objUsuarioVC->telefono;
            $objCompraDireccion->correoElectronico = $modelPago->objDireccion->objUsuarioVC->correoElectronico;

            if ($tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
                $objCompraDireccion->nombre = $modelPago->objDireccion->objUsuarioVC->nombre . " " . $modelPago->objDireccion->objUsuarioVC->apellido;
                $objCompraDireccion->direccion = $modelPago->objDireccion->direccion;
                $objCompraDireccion->barrio = $modelPago->objDireccion->barrio;
                $objCompraDireccion->codigoCiudad = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoCiudad();
                $objCompraDireccion->codigoSector = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoSector();
            } else if ($tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                $objCompraDireccion->nombre = "NA";
                $objCompraDireccion->direccion = "NA";
                $objCompraDireccion->barrio = "NA";
            }

            if (!$objCompraDireccion->save()) {
                throw new Exception("Error al guardar dirección de compra" . $objCompraDireccion->validateErrorsResponse());
            }

            //items de compra
            $positions = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getPositions();
            foreach ($positions as $position) {
                //actualizar saldo producto //--
                $objSaldo = null;
                if ($position->getObjProducto()->tercero != 1) {
                    $objSaldo = ProductosSaldos::model()->find(array(
                        'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto',
                        'params' => array(
                            ':ciudad' => Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoCiudad(),
                            ':sector' => Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoSector(),
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
                
                if($position->isFormula()){
                	$objItem->idFormula = $position->objProductoFormula->idFormula;
                	$objItem->idProductoVitalCall = $position->objProductoFormula->idProductoVitalCall;
                }
                
                $totalUnidades = 0;
                $totalFracciones = 0;
                
                if($objItem->unidades>0){
                	$totalUnidades = $objItem->unidades*$position->getObjProducto()->cantidadUnidadMedida;
                }
                
                if($objItem->fracciones>0){
                	$totalFracciones = $objItem->fracciones*$position->getObjProducto()->unidadFraccionamiento;
                }
                
                $totalCantidad = $totalUnidades+$totalFracciones;
                
                $sql = "UPDATE t_ProductosFormulaVitalCall SET cantidadComprada=cantidadComprada+$totalCantidad, fechaCompra='$objCompra->fechaEntrega', cantidadUltimaCompra=$totalCantidad WHERE idFormula=$objItem->idFormula AND idProductoVitalCall=$objItem->idProductoVitalCall";
                Yii::app()->db->createCommand($sql)->execute();

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
            
            $nombreUsuario = $modelPago->objDireccion->objUsuarioVC->nombre . " " . $modelPago->objDireccion->objUsuarioVC->apellido;
            $correoUsuario = $modelPago->objDireccion->objUsuarioVC->correoElectronico;

            $objPasarelaEnvio = null;
            $asuntoCorreo = Yii::app()->params->asunto['pedidoRealizado'];

            $objFormaPago = FormaPago::model()->findByPk($modelPago->idFormaPago);
            $contenidoCorreo = $this->renderPartial('application.views.carro.compraCorreo', array(
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
        if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
        }

        if ($modelPago == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Proceso de compra no iniciado'));
            Yii::app()->end();
        }

        $modelPago->consultarDisponibilidad(Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall);
    }

    public function actionList() {
        //Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = null;
        //Yii::app()->shoppingCart->clear();
        //exit();
        //CVarDumper::dump(Yii::app()->shoppingCart->itemAt(91269), 2, true);
        //echo "<br/>";
        //echo "<br/>";

        echo "Descuento: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getDiscountPrice();
        echo "<br/>";
        echo "ciudad: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoCiudad();
        echo "<br/>";
        echo "sector: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoSector();
        echo "<br/>";
        echo "perfil: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoPerfil();
        echo "<br/>";
        echo "cantidad productos: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCount();
        echo "<br/>";
        echo "cantidad items: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getItemsCount();
        echo "<br/>";
        echo "costo total: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCost();
        echo "<br/>";
        echo "costo total: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getTotalCost();
        echo "<br/>";
        // echo "tiempo: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getDelivery();
        //echo "<br/>";
        echo "servicio: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getShipping();
        echo "<br/>";


        echo "<br/>";


        $positions = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getPositions();
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

        if (isset(Yii::app()->session [Yii::app()->params->vitalCall ['sesion'] ['carroPagarForm']]) && Yii::app()->session [Yii::app()->params->vitalCall ['sesion'] ['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session [Yii::app()->params->vitalCall ['sesion'] ['carroPagarForm']];
        }

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

        $position = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->itemAt($id);
        // !Yii::app()->shoppingCart->contains($id)

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
            $this->modificarProducto($position, $modelPago->objSectorCiudad);
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

        if ($position->isFormula()) {
            $codigoProducto = $position->objProductoFormula->objProductoVC->codigoProducto;
        } else {
            $codigoProducto = $position->objProducto->codigoProducto;
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
            Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->update($position, false, $cantidadU);
        }

        if ($agregarF) {
            Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->update($position, true, $cantidadF);
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

        $position = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->itemAt($id);

        if ($position == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no agregado a carro'));
            Yii::app()->end();
        }

        if ($eliminar == 1) {
            Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->update($position, false, 0);
        } else if ($eliminar == 2) {
            Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->update($position, true, 0);
        } else if ($eliminar == 3) {
            Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->updateStored($position, 0);
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
    

    public function actionAdicionarFormula() {
    
    
    	$array = array();
    	if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['formulaMedica']])) {
    		$array = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['formulaMedica']];
    	}
    	$ruta = "";
    
    	if ($_FILES) {
    		$model = new FormulasMedicas();
    		$model->attributes = $_POST['FormulasMedicas'];
    		$uploadedFile = CUploadedFile::getInstance($model, "formulaMedica");
    
    		if ($_FILES['FormulasMedicas']['size']['formulaMedica'] > 0) {
    			$directorio = 'images/formulamedica/' . Date("Ymdhis") . $uploadedFile->getName();
    			if ($uploadedFile->saveAs($directorio)) {
    				$ruta = $directorio;
    			} else {
    				echo CJSON::encode(
    						array(
    								'result' => 'ok',
    								'response' => 'Error al cargar la imagen de la categoría'
    						));
    				Yii::app()->end();
    			}
    		}
    	}
    
    	if($_POST['tipo-formula'] == 1){
    		$modelFormula = new FormulasMedicas('datosMedico');
    	}else {
    		$modelFormula = new FormulasMedicas('datosFormula');
    	}
    
    	$modelFormula->attributes = $_POST['FormulasMedicas'];
    	if(!empty($ruta)){
    		$modelFormula->formulaMedica = $ruta;
    	}
    
    	if (!$modelFormula->validate()) {
    		echo CActiveForm::validate($modelFormula);
    		Yii::app()->end();
    	}
    
    	$array[] = array('nombreMedico' => $_POST['FormulasMedicas']['nombreMedico'],
    			'institucion' => $_POST['FormulasMedicas']['institucion'],
    			'registroMedico' => $_POST['FormulasMedicas']['registroMedico'],
    			'telefono' => $_POST['FormulasMedicas']['telefono'],
    			'correoElectronico' => $_POST['FormulasMedicas']['correoElectronico'],
    			'formulaMedica' => $ruta);
    
    	Yii::app()->session[Yii::app()->params->vitalCall['sesion']['formulaMedica']] = $array;
    	echo CJSON::encode(array(
    			'result' => 'ok',
    			'response' =>$this->renderPartial('_formulasMedicasAdicionadas', null, true, false) 
    	));
    }
    
    public function actionForm($limpiar = false) {
    	$modelPago = null;
    
    	if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null)
    		$modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
    
    		CVarDumper::dump($modelPago, 10, true);
    		echo "<br/><br/>RULES<br/><br/>";
    		CVarDumper::dump($modelPago->rules(), 10, true);
    		echo "<br/><br/>SCENARIO: " . $modelPago->getScenario();
    
    		if ($limpiar){
    			Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = null;
    			//unset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]);
    		}
    }

}
