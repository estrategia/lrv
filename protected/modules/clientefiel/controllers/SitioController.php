<?php

class SitioController extends Controller
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
}