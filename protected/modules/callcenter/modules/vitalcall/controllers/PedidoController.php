<?php

class PedidoController extends ControllerVitalcall {
	
	public function actionTest(){
		echo Yii::app()->shoppingCartVitalCall->getClass();
	}

    public function actionNuevo() {

        $modelPago = null;
        $direccionCliente = null;
        $objSectorCiudad = null;

        if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
            $modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
        }

        //CVarDumper::dump($modelPago,10,true);exit();

        if (isset($_REQUEST['direccion'])) {
            $direccionCliente = $_REQUEST['direccion'];
        }

        if (empty($modelPago) && empty($direccionCliente)) {
            throw new CHttpException(404, 'Solicitud denegada. Datos inv&aacute;lidos.');
        }

        if (empty($modelPago)) {
            $objDireccionVC = DireccionesDespachoVitalCall::model()->find(array(
           		'with' => array('objUsuarioVC', 'objCiudad', 'objSector'),
                'condition' => 'idDireccionesDespachoVitalCall=:direccion',
                'params' => array(':direccion' => $direccionCliente),
            ));

            if ($objDireccionVC === null) {
                throw new CHttpException(404, 'Direcci&oacute;n inv&aacute;lida.');
            }
            
            if($objDireccionVC->objUsuarioVC->estado!=1){
            	throw new CHttpException(404, 'Usuario inactivo.');
           }

            $modelPago = new FormaPagoVitalCallForm;
            $modelPago->identificacionUsuario = $objDireccionVC->identificacionUsuario;
            $modelPago->objDireccion = $objDireccionVC;
            $modelPago->objSectorCiudad = $objDireccionVC->objSectorCiudad;
            Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = $modelPago;
        }

        //CVarDumper::dump($modelPago,10,true);
        $objUsuario = UsuarioVitalCall::model()->find(array(
            'with' => array('listFormulasVC' => array('with' => array('listProductosVC' => array('with' => array('objProducto' => array('with' =>
                                    array(
                                        'listImagenes' => array('on' => 'listImagenes.estadoImagen=:estado AND listImagenes.tipoImagen=:tipoImagen'),
                                        'listSaldos' => array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'),
                                        'listPrecios' => array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector'),
                                    )
                                )))))),
            'condition' => 't.identificacionUsuario=:usuario AND t.estado=:estado AND (listSaldos.saldoUnidad>=:saldo OR listSaldos.saldoFraccion>=:saldo)',
            'params' => array(
                ':usuario' => $modelPago->identificacionUsuario,
                ':estado' => 1,
                ':tipoImagen' => YII::app()->params->producto['tipoImagen']['mini'],
                ':saldo' => 0,
                ':ciudad' => $modelPago->objSectorCiudad->codigoCiudad,
                ':sector' => $modelPago->objSectorCiudad->codigoSector
            )
        ));

        $this->render('nuevo', array(
            'objUsuario' => $objUsuario,
            'objSectorCiudad' => $modelPago->objSectorCiudad
        ));
    }
    
    public function actionBuscar() {
    	if (!Yii::app()->request->isPostRequest) {
    		throw new CHttpException(404, 'Solicitud inválida.');
    	}
    	
    	$modelPago = null;
    	
    	if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] != null) {
    		$modelPago = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']];
    	}
    
    	$busqueda = Yii::app()->getRequest()->getPost('busqueda');
    
    	if ($busqueda === null || $modelPago === null) {
    		throw new CHttpException(404, 'Solicitud inválida.');
    	}
    
    	$busqueda = trim($busqueda);
    
    	if (empty($busqueda)) {
    		throw new CHttpException(404, 'Búsqueda no puede estar vacío.');
    	}
    
    	$listProductos = array();
    	$sesion = Yii::app()->getSession()->getSessionId() . "vitalcall";
    	$codigosArray = GSASearch($busqueda,$sesion);
    	//$codigosArray = array(10670, 21461, 22159, 410760, 301280, 10192, 30128, 36085);
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
    						':ciudad' => $modelPago->objSectorCiudad->codigoCiudad,
    						':sector' => $modelPago->objSectorCiudad->codigoSector,
    				),
    				'order' => 'rel.relevancia DESC, t.orden'
    		));
    
    		
    	}
    
    	$this->renderPartial('buscar', array(
    			'listProductos' => $listProductos,
    			'listCombos' => array(),
    			'objSectorCiudad' => $modelPago->objSectorCiudad,
    			'codigoPerfil' => Yii::app()->params->perfil['defecto'],
    			'nombreBusqueda' => $busqueda,
    	));
    }

}
