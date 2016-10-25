<?php

class PedidoController extends ControllerOperator {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            //'access',
            'login + index, pedidos',
            'busqueda + buscarProductos'
                //'loginajax + direccionActualizar',
        );
    }

     public function filterLogin($filter) {
        if (Yii::app()->controller->module->user->isGuest) {
            $this->redirect(Yii::app()->controller->module->user->loginUrl);
        }
        $filter->run();
    }

    public function filterBusqueda($filter){
        if(empty(Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdvDestino']])){
            $this->redirect(CController::createUrl('index'));
        }
         $filter->run();
    }

    public function actionIndex(){
        $this->layout = 'simple';

        $modelCliente = new ClienteForm();
        $params = array();
        Yii::import('ext.select2.Select2');

        if(isset($_POST['ClienteForm'])){
            // buscar compras con estado 
            $modelCliente->attributes = $_POST['ClienteForm'];
            $model = new Compras('search');
            $model->unsetAttributes();
           
            $model->idTipoVenta = 2;

            //$model->tipoEntrega = Yii::app()->params->entrega["tipo"]['domicilio'];
            $model->identificacionUsuario = $modelCliente->numeroDocumento;
            //    $fecha = Compras::calcularFechaVisualizar();
            //    $model->fechaCompra = $fecha;

       
            $sort = "t.fechaCompra DESC";

            $params['dataProvider'] = $model->search(array('order' => $sort));
        }

        $params['modelCliente'] = $modelCliente;

        $this->render('formCliente', $params);
    }

    public function actionGeoDireccion() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $direccion = Yii::app()->getRequest()->getPost('direccion');
        $ciudad = Yii::app()->getRequest()->getPost('ciudad');

        if ($direccion === null || $ciudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }
        $direccion = trim($direccion);
        $ciudad = trim($ciudad);
        $llave = md5($direccion . $ciudad . "javela");

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['serverGeo'],
            'uri' => "",
            'trace' => 1
        ));
        $params = array(
            "direccion" => $direccion,
            "idCiudad" => $ciudad,
            "key" => $llave
        );
        $result = $client->__soapCall("ConsultarClienteLRV", $params);

        if (empty($result)) {
            echo CJSON::encode(array('result' => 'error', 'response' => "Error: no se obtuvo respuesta"));
        } else {
            $result = $result[0];
            if ($result->RESPUESTA == 1) {
                echo CJSON::encode(array('result' => 'ok', 'response' => 
                    "<strong> RESULTADO: </strong>" . $result->PDV . "-" . $result->PDV_NOMBRE,
                    'pdv' => $result->PDV));
            } else {
                echo CJSON::encode(array('result' => 'error', 'response' => $result->DESCRIPCION));
            }
        }
    }


    public function actionAsignarpdv() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $pdv = Yii::app()->getRequest()->getPost('pdv');

        if ($pdv === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
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

        Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdvDestino']] = $objPdv;
        
        $modelPago = new FormaPagoEntregaNacionalForm();
        
        // punto de venta de entrega
        $objSectorCiudadDestino = SectorCiudad::model()->find(array(
        			'condition' => 'codigoCiudad =:codigoCiudad AND codigoSector =:codigoSector',
        			'params' => array(
        				':codigoCiudad' => $objPdv->codigoCiudad, 
        				':codigoSector' => $objPdv->idSectorLRV,
        			)
        ));
        
        $modelPago->objSectorCiudadDestino = $objSectorCiudadDestino;
        
        // punto de venta de entrega
        $puntoVenta = PuntoVenta::model()->find(array(
        			'condition' => 'iDComercial =:idComercial',
        			'params' => array(
        					':idComercial' => Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']]
        			),
        ));
        
        $objSectorCiudadOrigen = SectorCiudad::model()->find(array(
        			'condition' => 'codigoCiudad =:codigoCiudad AND codigoSector =:codigoSector',
        			'params' => array(
        				':codigoCiudad' => $puntoVenta->codigoCiudad, 
        				':codigoSector' => $puntoVenta->idSectorLRV,
        			)
        ));
        
        $modelPago->objSectorCiudadOrigen = $objSectorCiudadOrigen;
        Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = $modelPago;
        
        echo CJSON::encode(array
                (   'result' => 'ok', 
                    'response' => "Se ha seleccionado el punto de venta $objPdv->idComercial - $objPdv->nombrePuntoDeVenta",
                    'redirect' => CController::createUrl('pedido/buscarProductos'),
                ));
        Yii::app()->end();
        
    }

    public function actionBuscarProductos(){
        $this->layout = 'simple';
        $resultadoBusqueda = "";
        
        if($_POST){
	        $busqueda = Yii::app()->getRequest()->getPost('busqueda');
	        
	        $busqueda = trim($busqueda);
	        
	    //	CVarDumper::dump($busqueda,true,10);exit();    
	        $listProductos = array();
	        $listCombos = array();
	        $sesion = Yii::app()->getSession()->getSessionId();
	        $codigosArray = GSASearch($busqueda,$sesion);
	        $codigosStr = implode(",", $codigosArray);
	        $pdvDestino = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdvDestino']];
	        $pdvOrigen = PuntoVenta::model()->find(
	        		array(
	        				'condition' => "IDComercial =:idcomercial",
	        				"params" => array(
	        						":idcomercial" => Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']])
	        		));
	        if($pdvOrigen === null){
	        	throw new CHttpException(404, 'Solicitud inválida.');
	        }
	        
	        if (!empty($codigosArray)) {
	        	$listProductos = Producto::model()->findAll(array(
	        			'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objCategoriaBI',
	        					'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
	        					'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
	        					'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
	        			),
	        			'join' => 'JOIN t_relevancia_temp_'.$sesion.' rel ON rel.codigoProducto = t.codigoProducto',
	        			'condition' => "t.activo=:activo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)",
	        			'params' => array(
	        					':activo' => 1,
	        					':saldo' => 0,
	        					':ciudad' => $pdvOrigen->codigoCiudad,
	        					':sector' => $pdvOrigen->idSectorLRV,
	        			),
	        			'order' => 'rel.relevancia DESC, t.orden'
	        	));
	        
	        	$fecha = new DateTime;
	        	$listCombos = Combo::model()->findAll(array(
	        			'with' => array('listComboSectorCiudad', 'listProductos' => array('condition' => "listProductos.codigoProducto IN ($codigosStr)")),
	        			'condition' => 't.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
	        			'params' => array(
	        					':estado' => 1,
	        					':fecha' => $fecha->format('Y-m-d H:i:s'),
	        					'saldo' => 0,
	        					':ciudad' => $pdvOrigen->codigoCiudad,
	        					':sector' => $pdvOrigen->idSectorLRV,
	        			)
	        	));
	        }
	        
	        $productosBusqueda = $resultadoFinal =  $listaProductosSaldos  = array();
	        foreach ($listProductos as $position) {
	        
	        	$productosBusqueda[] = array(
	        			"CODIGO_PRODUCTO" => $position->codigoProducto,
	        			"ID_PRODUCTO" => $position->codigoProducto,
	        			"CANTIDAD" => 1,
	        			"DESCRIPCION" => $position->descripcionProducto,
	        	);
	        }
	        
	        try {
	        	$client = new SoapClient(null, array(
	        			'location' => Yii::app()->params->webServiceUrl['serverLRV'],
	        			'uri' => "",
	        			'trace' => 1
	        	));
	        	$puntosVenta = $client->__soapCall("LRVConsultarSaldoMovil", array(
	        			'productos' => $productosBusqueda,
	        			'ciudad' => $pdvDestino->codigoCiudad,
	        			'sector' => $pdvDestino->idSectorLRV
	        	));
	        
	        	$puntoVenta = null;
	        	if (!empty($puntosVenta)) {
	        		foreach ($puntosVenta[1] as $pdv) {
	        			//   if ($pdv[1] == $pdvDestino->idComercial) {
	        			$puntoVenta = $pdv;
	        			break;
	        			//    }
	        		}
	        	}
	        
	        
	        	foreach($puntoVenta[4] as $saldos){
	        		$listaProductosSaldos[$saldos->CODIGO_PRODUCTO] = $saldos->SALDO;
	        	}
	        
	        	foreach ($listProductos as $producto){
	        		if(isset($listaProductosSaldos[$producto->codigoProducto]) ){
	        			if($listaProductosSaldos[$producto->codigoProducto] > 0){
	        				$resultadoFinal[] = $producto;
	        			}
	        		}
	        	}
	        	
	        	$dataProvider = new CArrayDataProvider($resultadoFinal, array(
	        			'id' => 'codigoProducto',
	        			'pagination' => array(
	        					'pageSize' => 10,
	        			),
	        	));
	        
	        	
	        } catch (Exception $exc) {
	        	Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
	        	//  $this->listPuntosVenta = array(0 => 0, 1 => 'Error al consultar disponibilidad de productos');
	        	echo CJSON::encode(array(
	        			'result' => 'error',
	        			'response' => 'No se puede consultar la totalidad del pedido'
	        	));
	        }
	        
	        $resultadoBusqueda = $this->renderPartial('resultadoBusqueda', array(
	        		'dataprovider' => $dataProvider,
	        		'listCombos' => $listCombos,
	        		'objSectorCiudad' => SectorCiudad::model()->find(array(
	        				'condition' => 'codigoCiudad =:ciudad AND codigoSector =:sector',
	        				'params' => array(
	        						':ciudad' => $pdvOrigen->codigoCiudad,
	        						':sector' => $pdvOrigen->idSectorLRV,
	        				))),
	        		'codigoPerfil' => 1, // verificar en el futuro
	        		'nombreBusqueda' => $busqueda,
	        		'listaProductosSaldos' => $listaProductosSaldos,
	        ),true,false);
        }
        
        $this->render('pedido', array(
        		'resultadoBusqueda' => $resultadoBusqueda
        ));
    }

    public function actionBuscarProducto() {

    }


}