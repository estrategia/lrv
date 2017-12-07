<?php

class TercerosModule extends CWebModule
{
    public $homeUrl = array('/terceros');
    // public $user = ;

	public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'terceros.models.*',
			'terceros.components.*',
            'application.models.Ciudad',
            'application.models.Producto',
            'application.models.ProductosSaldosTerceros',
            'application.models.FleteProductoTercero',
            'application.models.Compras',
            'application.models.ComprasItems',
            'application.models.EstadosComprasItemsTerceros',
			'application.models.TrazaComprasItemsTerceros',
			// 'application.components.*',
            // 'application.components.behaviors.*',
		));

		Yii::app()->setComponents(array(
            'user' => array(
                'loginUrl' => array('/terceros/usuario/autenticar'),
            ),
            'errorHandler' => array(
                'errorAction' => 'terceros/sitio/error',
            ),
        ));

        $this->layoutPath = "protected/modules/terceros/views/layouts";
        Yii::app()->homeUrl = array('/terceros');
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
