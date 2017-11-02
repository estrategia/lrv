<?php

class PedidoController extends ControllerVentaAsistida {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            //'access',
            'login + index, pedidos, ubicacion',
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

    public function actionUbicacion(){
        $this->layout = 'entrega';
        $this->active = 'ubicacion';

        $modelCliente = new Cliente();
        $params = array();
        Yii::import('ext.select2.Select2');
        $params['FormCliente'] = $modelCliente;
        if(isset($_POST['Cliente'])){
            // buscar compras con estado 
           	$objUsuario = Cliente::model()->find(array(
	           	'condition' => 'numeroDocumento =:documento',
           		'params' => array(
           				'documento' => $_POST['Cliente']['numeroDocumento']
           		)
           	));
           	
           	$model = new Beneficiario('search');
            $model->unsetAttributes();

            $model->numeroDocumento = $modelCliente->numeroDocumento;
       
            $sort = "t.fechaCompra DESC";

            $params['dataProvider'] = $model->search(array('order' => $sort));
            
           	$params['modelCliente'] = $objUsuario;
        }

        $this->render('formCliente', $params);
    }

   
    public function actionAsignarcliente() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $usuario = Yii::app()->getRequest()->getPost('usuario');
        $usuario = Yii::app()->getRequest()->getPost('usuario');

        if ($usuario === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud invalida.'));
            Yii::app()->end();
        }

        $objUsuario = Usuario::model()->find(array(
        		'condition' => 'identificacionUsuario =:usuario',
        		'params' => array(
        				':usuario' => $usuario
        		)
        ))   ;
        
        
        $modelPago = Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']];
        $modelPago->cedulaRemitente = $objUsuario->identificacionUsuario;
        
        $modelPago->nombre = $objUsuario->nombre." ".$objUsuario->apellido;
        $modelPago->correoRemitente = $objUsuario->correoElectronico;
        $modelPago->identificacionUsuario = $modelPago->cedulaRemitente;
        Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = $modelPago;
        
        echo CJSON::encode(array
                (   'result' => 'ok', 
                    'response' => "Cliente Asignado para venta ".$modelPago->nombre ,
                    'redirect' => CController::createUrl('catalogo/buscar'),
                ));
        Yii::app()->end();
        
    }

    public function actionBuscarProductos(){
        $this->layout = 'simple';
        $resultadoBusqueda = $busqueda = "";
        $dataProvider = null;
        $listCombos = array();
        
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
        
        if($_POST){
	        $busqueda = Yii::app()->getRequest()->getPost('busqueda');
	        
	        $busqueda = trim($busqueda);
	        
	    //	CVarDumper::dump($busqueda,true,10);exit();    
	        $listProductos = array();
	        $listCombos = array();
	        $sesion = Yii::app()->getSession()->getSessionId();
	        $codigosArray = GSASearch($busqueda,$sesion);
	        $codigosStr = implode(",", $codigosArray);
	        
	        
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
        }
        
        $this->render('pedido', array(
        		'dataProvider' => $dataProvider,
	        	'listCombos' => $listCombos,
	        	'objSectorCiudad' => SectorCiudad::model()->find(array(
	        			'condition' => 'codigoCiudad =:ciudad AND codigoSector =:sector',
	        			'params' => array(
	        					':ciudad' => $pdvOrigen->codigoCiudad,
	        					':sector' => $pdvOrigen->idSectorLRV,
	        			))),
	        	'codigoPerfil' => 1, // verificar en el futuro
	        	'nombreBusqueda' => $busqueda,
	       // 	'listaProductosSaldos' => $listaProductosSaldos,
        ));
    }

    protected function gridDetallePedido($data, $row) {
    	$params = array('pedido' => $data->idCompra);
       	$result = "$data->idCompra";
    	return $result;
    }
    
    protected function gridOrigenPedido($data, $row) {
    	if ($data->identificacionUsuario == null) {
    		return $data->objCompraDireccion->nombre . "<br/>" . $data->objCompraDireccion->correoElectronico;
    	} else {
    		return "$data->identificacionUsuario<br/>" . $data->objUsuario->getNombreCompleto() . "<br/>" . $data->objUsuario->correoElectronico;
    	}
    }
    
    protected function gridDestinoPedido($data, $row) {
    
    	if ($data->objCompraDireccion == null)
    		return "NA";
    		return $data->
    		objCompraDireccion->nombre . "<br/>" . $data->objCompraDireccion->direccion . "<br/>" . $data->objCompraDireccion->barrio;
    }
    
    protected function gridPagoPedido($data, $row) {
    	if ($data->objFormaPagoCompra === null)
    		return "NA";
    
    		$result = $data->objFormaPagoCompra->objFormaPago->formaPago;
    		if ($data->objFormaPagoCompra->numeroTarjeta != null && !empty($data->objFormaPagoCompra->numeroTarjeta))
    			$result .= "<strong>No. tarjeta:</strong> " . $data->objFormaPagoCompra->numeroTarjeta . "<br/><strong>No. cuotas:</strong> " . $data->objFormaPagoCompra->cuotasTarjeta;
    
    			return $result;
    }
    
    protected function gridEstadoPedido($data, $row) {
    	return "<span class='label label-" . Yii::app()->params->callcenter['estadoCompra']['colorClass'][$data->idEstadoCompra] . "'>" . $data->objEstadoCompra->compraEstado . "</span>";
    }
    
    protected function gridUsoDireccion($data, $row) {
    	
    	$result = "<a href='#' data-beneficiario='".$data->idBeneficiario."' data-cliente='$data->numeroDocumento' data-action='asignar-cliente' class='btn btn-info' >Usar</a>";
    
    	return $result;
    }
    

}