<?php

class DefaultController extends ControllerOperator
{
	public function actionIndex()
	{
		$this->render('index');
	}
}