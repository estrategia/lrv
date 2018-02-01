<?php

class SitioController extends ControllerCliente
{

	public function actionIndex()
	{
		$this->menuActivo = 'index';
		if($this->isMobile){
			$this->render('index');
		}else{
			$this->render('d_index');
		}
	}

	public function actionGanadores(){
		$this->menuActivo = 'ganadores';
		if($this->isMobile){
			$this->render('ganadores');
		}else{
			$this->render('d_ganadores');
		}
	}

	public function actionReglamentos(){
		$this->menuActivo = 'concursos';
		if($this->isMobile){
			$this->render('reglamentos');
		}else{
			$this->render('d_reglamentos');
		}
	}
}
