<?php

class DefaultController extends ControllerVendedor
{
	public function actionIndex()
	{
           $this->render('index');
	}
}