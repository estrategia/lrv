<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ControllerVenta extends ControllerPuntoVenta {

    public $layout = 'entrega';
    public $menu = array();
    public $showMenu = true;
    public $active = null;
    public $objCiudadSectorOrigen = null;
    public $objCiudadSectorDestino = null;
    public $objPuntoVentaDestino = null;
    public $objPuntoVentaOrigen = null;
    public $tipoVenta = null;
    public $isMobile = false;
    public $urlLogo = "entreganacional.png";
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function init() {
        $this->pageTitle = Yii::app()->name;
         if (isset(Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdvDestino']]) && Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdvDestino']] != null) {
        	$this->objPuntoVentaDestino = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdvDestino']];
        	$this->objCiudadSectorDestino = SectorCiudad::model()->find(array(
        			'with' => array('objCiudad', 'objSector'),
        			'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
        			'params' => array(
        					':ciudad' => $this->objPuntoVentaDestino->codigoCiudad,
        					':sector' => $this->objPuntoVentaDestino->idSectorLRV,
        					':estado' => 1,
        			)
        	));
        }
        if (isset(Yii::app()->session[Yii::app()->params->puntoventa['sesion']['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->puntoventa['sesion']['tipoEntrega']] != null) {
        	$this->tipoVenta = Yii::app()->session[Yii::app()->params->puntoventa['sesion']['tipoEntrega']];
        }
         
        if (isset(Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']]) && Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']] != null) {
        	
        	$puntoVenta = PuntoVenta::model()->find(array(
        			'condition' => 'idComercial =:idcomercial',
        			'params' => array(
        					'idcomercial' => Yii::app()->session[Yii::app()->params->puntoventa['sesion']['pdv']]
        			)
        	));
        	
        	$ciudad = $puntoVenta->codigoCiudad;
        	$sector = $puntoVenta->idSectorLRV;

        	if($this->tipoVenta == 1){
	        	$this->objPuntoVentaOrigen = $puntoVenta;
	        	$this->objCiudadSectorOrigen = SectorCiudad::model()->find(array(
	        			'with' => array('objCiudad', 'objSector'),
	        			'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
	        			'params' => array(
	        					':ciudad' => $ciudad,
	        					':sector' => $sector,
	        					':estado' => 1,
	        			)
	        	));
        	}else if($this->tipoVenta == 2){
        		$this->objPuntoVentaDestino = $puntoVenta;
        		$this->objCiudadSectorDestino = SectorCiudad::model()->find(array(
        				'with' => array('objCiudad', 'objSector'),
        				'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
        				'params' => array(
        						':ciudad' => $ciudad,
        						':sector' => $sector,
        						':estado' => 1,
        				)
        		));
        	}
        }
        
        $this->registerJs();
        $this->registerCss();
    }

    public function registerJs() {
      	parent::registerJs();
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/select2/select2.min.js", CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/bootstrap/js/bootstrap-slider.js", CClientScript::POS_HEAD);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/raty/jquery.raty.js", CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/ad-gallery/jquery.ad-gallery.js", CClientScript::POS_HEAD);
        
        if($this->tipoVenta == 1){
        	Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/ventanacional.js", CClientScript::POS_HEAD);
        }else{
        	Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/ventaasistida.js", CClientScript::POS_HEAD);
        }
    }

//custom application css
    public function registerCss() {
    	parent::registerCss();
    	Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/select2/select2.min.css");
    	Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/bootstrap/css/bootstrap-slider.css");
    	Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/raty/jquery.raty.css");
    	Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/ad-gallery/jquery.ad-gallery.css");
    }

}
