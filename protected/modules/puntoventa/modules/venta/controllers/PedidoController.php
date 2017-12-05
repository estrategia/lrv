<?php

class PedidoController extends ControllerVenta {

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
    
    public function actionTipoEntrega(){
    	$this->layout = 'entrega';
    	$this->active = 'entrega';
    	if($_POST){
    		$tipoEntrega = $_POST['TipoEntrega'];
    		Yii::app()->session[Yii::app()->params->puntoventa['sesion']['tipoEntrega']] = $tipoEntrega;
    		
    		if($tipoEntrega == 2){
    			$puntoVenta = PuntoVenta::model()->find(array(
        			'condition' => 'idComercial =:idcomercial',
        			'params' => array(
        					'idcomercial' => Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']]
        			)
	        	));
	        	
    			$ciudad = $puntoVenta->codigoCiudad;
    			$sector = $puntoVenta->idSectorLRV;
    			
	        	$this->objPuntoVentaDestino = $puntoVenta;
        		$objSectorCiudadDestino = SectorCiudad::model()->find(array(
        				'with' => array('objCiudad', 'objSector'),
        				'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
        				'params' => array(
        						':ciudad' => $ciudad,
        						':sector' => $sector,
        						':estado' => 1,
        				)
        		));
    			
    			$modelPago = new FormaPagoVentaAsistidaForm();
    			$modelPago->objCiudadSectorDestino = $objSectorCiudadDestino;
    			Yii::app()->session[Yii::app()->params->entregaNacional['sesion']['carroPagarForm']] = $modelPago;
    		}
    		$this->redirect(CController::createUrl('ubicacion'));
    		
    		
    	}
    	
    	$this->render('formEntrega');
    }

    public function actionUbicacion(){
    	
    	
        $this->layout = 'entrega';
        $this->active = 'ubicacion';

        if($this->tipoVenta != null){
        	
        	if($this->tipoVenta == 1){
        		$this->redirect(CController::createUrl('entreganacional/pedido/ubicacion'));
        	}else{
        		$this->redirect(CController::createUrl('ventaasistida/pedido/ubicacion'));
        	}
        }else{
        	$this->redirect(CController::createUrl('tipoEntrega'));
        }
       
    }

    

}