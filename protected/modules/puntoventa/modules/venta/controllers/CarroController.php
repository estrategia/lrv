<?php

class CarroController extends ControllerVenta{
	/**
	 * @return array action filters
	 * */
	public function filters() {
		return array(
				//'access',
				'login + agregar,index',
				'entrega + index',
				//'loginajax + direccionActualizar',
		);
	}
	
	/*
	 public function filters() {
	 return array(
	 array('tienda.filters.AccessControlFilter'),
	 array('tienda.filters.LanzamientoControlFilter'),
	 );
	 } */

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
	
	public function actionIndex() {
		$this->active = "compra";
		if($this->tipoVenta != null){
			if($this->tipoVenta == 1){
				$this->redirect(CController::createUrl('entreganacional/carro'));
			}else{
				$this->redirect(CController::createUrl('ventaasistida/carro'));
			}
		}else{
			$this->redirect(CController::createUrl('tipoEntrega'));
		}
	}
	
}
