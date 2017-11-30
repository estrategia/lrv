<?php

class CatalogoController extends ControllerVenta {

	public function filters() {
		return array(
				//'access',
				'login + buscar, producto, bodega',
				'entrega + buscar',
				//'loginajax + direccionActualizar',
		);
	}
	
	public function filterLogin($filter) {
		if (Yii::app()->controller->module->user->isGuest) {
			$this->redirect(Yii::app()->controller->module->user->loginUrl);
		}
		$filter->run();
	}
	
	public function filterEntrega($filter) {
		if (!$this->objCiudadSectorDestino) {
			$this->redirect(CController::createUrl('pedido/ubicacion'));
		}
		$filter->run();
	}

    public function actionBuscar() {
       $this->active = "buscar";
       if($this->tipoVenta != null){
        	if($this->tipoVenta == 1){
        		$this->redirect(CController::createUrl('entreganacional/catalogo/buscar'));
        	}else{
        		$this->redirect(CController::createUrl('ventaasistida/catalogo/buscar'));
        	}
        }else{
        	$this->redirect(CController::createUrl('tipoEntrega'));
        }
    }
 
}
