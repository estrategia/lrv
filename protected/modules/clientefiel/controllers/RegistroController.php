<?php

class RegistroController extends Controller{
	
	
	public function actionIndex(){
		
		$model = new RegistroClienteFielForm('registro');
		$this->render('registro', array(
				'model' => $model
		));
	}
}