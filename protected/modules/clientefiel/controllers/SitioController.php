<?php

class SitioController extends ControllerCliente
{

	public function actionIndex()
	{
		if($this->isMobile){
			$this->render('index');
		}else{
			$this->render('d_index');
		}
	}

	public function actionGanadores(){
		if($this->isMobile){
			$this->render('ganadores');
		}else{
			$this->render('d_ganadores');
		}
	}

	public function actionReglamentos(){
		if($this->isMobile){
			$this->render('reglamentos');
		}else{
			$this->render('d_reglamentos');
		}
	}
}
