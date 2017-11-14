<?php

class DefaultController extends ControllerTercero
{
	public function actionIndex()
	{
		$this->render('index');
	}
}