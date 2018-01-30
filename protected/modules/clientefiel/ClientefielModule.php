<?php

class ClientefielModule extends CWebModule
{

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		
		$this->setImport(array(
			'clientefiel.models.*',
			'clientefiel.components.*',
		));

    	$this->layoutPath = "protected/views/layouts";
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			if ($controller->isMobile) {
				$controller->layout = 'clienteFiel';
			} else {
				$controller->layout = '_d_clienteFiel';
			}
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
