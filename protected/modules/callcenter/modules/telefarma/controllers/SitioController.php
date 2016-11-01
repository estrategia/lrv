<?php

class SitioController extends ControllerTelefarma {

    public $defaultAction = "ubicacion";

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if (Yii::app()->controller->module->user->isGuest)
            $this->layout = "simple";
        else
            $this->layout = "admin";

        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
    
    public function actionUbicacion() {
    	$this->active = "ubicacion";
    	$listObjCiudad = Ciudad::model()->findAll(array(
    			'order' => 't.orden, t.nombreCiudad',
    			'condition' => 'estadoCiudad=:estadoCiudad',
    			'params' => array(
    					':estadoCiudad' => 1,
    			)
    	));
    
    	$listPdv = PuntoVenta::model()->findAll(array(
    			'order' => 'idComercial',
    			'condition' => 'estado=:estado',
    			'params' => array(':estado' => 1)));
    
    
    	Yii::import('ext.select2.Select2');
    	$listDataCiudad = CHtml::listData($listObjCiudad, 'codigoCiudad', 'nombreCiudad');
    	$redirect = Yii::app()->request->urlReferrer == null ? $this->createUrl('/callcenter/telefarma/cliente') : Yii::app()->request->urlReferrer;
    
    	$this->render('ubicacion', array(
    			'listDataCiudad' => $listDataCiudad,
    			'objSectorCiudad' => $this->objSectorCiudad,
    			'urlRedirect' => $redirect,
    			'listPdv' => $listPdv
    	));
    }
    
    public function actionUbicacionSeleccion() {
    	$ciudad = null;
    	$sector = null;
    
    	if (empty_lrv(trim($_REQUEST['select-pdv-asignar'])	)) {
    		echo CJSON::encode(array(
    				'result' => 'error',
    				'response' => 'Seleccionar punto de venta'
    		));
    		Yii::app()->end();
    	}
    
    	$puntoVenta = PuntoVenta::model()->find(array(
    			'condition' => 'idComercial =:idcomercial',
    			'params' => array(
    					'idcomercial' => trim($_REQUEST['select-pdv-asignar'])
    			)
    	));
    
    	$ciudad = $puntoVenta->codigoCiudad;
    	$sector = $puntoVenta->idSectorLRV;
    
    	if (empty_lrv($ciudad) || empty_lrv($sector)) {
    		echo CJSON::encode(array(
    				'result' => 'error',
    				'response' => 'Seleccionar ubicaci&oacute;n'
    		));
    		Yii::app()->end();
    	}
    
    	$objSectorCiudad = SectorCiudad::model()->find(array(
    			'with' => array('objCiudad', 'objSector'),
    			'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
    			'params' => array(
    					':ciudad' => $ciudad,
    					':sector' => $sector,
    					':estado' => 1,
    			)
    	));
    
    	if ($objSectorCiudad == null) {
    		echo CJSON::encode(array(
    				'result' => 'error',
    				'response' => 'Ubicaci&oacute;n no existente ' . ' -- ciudad: ' . CVarDumper::dumpAsString($ciudad) . ' --' . ' -- sector: ' . CVarDumper::dumpAsString($sector) . ' --'
    		));
    		Yii::app()->end();
    	}
    	
    	$objSectorCiudadOld = null;
    
    	if (!empty($this->objSectorCiudad))
    		$objSectorCiudadOld = Yii::app()->session[Yii::app()->params->telefarma['sesion']['sectorCiudadEntrega']];
    
    		$objSectorCiudad->objCiudad->getDomicilio();
    		Yii::app()->session[Yii::app()->params->telefarma['sesion']['sectorCiudadEntrega']] = $objSectorCiudad;
    
    		if ($objSectorCiudadOld != null && ($objSectorCiudadOld->codigoCiudad != $objSectorCiudad->codigoCiudad || $objSectorCiudadOld->codigoSector != $objSectorCiudad->codigoSector)) {
    			Yii::app()->shoppingCartVitalCall->clear();
    			Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = null;
    		}
    		
    		$modelPago = null;
    		if(isset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']])){
    			$modelPago = Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']];
    		}else{
    			$modelPago = new FormaPagoTelefarmaForm();
    		}
    		
    		$modelPago->barrio = trim($_REQUEST['barrio']);
    		$modelPago->direccion = trim($_REQUEST['direccion']);
    		
    		//Yii::app()->shoppingCartVitalCall->CalculateShipping();
    
    		$objHorarioSecCiud = HorariosCiudadSector::model()->find(array(
    				'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector',
    				'params' => array(
    						':ciudad' => $objSectorCiudad->codigoCiudad,
    						':sector' => $objSectorCiudad->codigoSector,
    				)
    		));
    
    		$redirect = $this->createUrl('/callcenter/telefarma/catalogo/buscar');
    	
    		//se debe de eliminar url de sesion
    		echo CJSON::encode(array(
    				'result' => 'ok',
    				'response' => 'Se ha cambiado la ciudad de entrega por: ' . $objSectorCiudad->objCiudad->nombreCiudad,
    				'urlAnterior' => $redirect));
    		Yii::app()->end();
    }
}
