<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ControllerTelefarma extends ControllerOperator {

    public $objSectorCiudad = null;
    public $sectorName = null;
    public $isMobile = false;

    public function init() {
        $this->pageTitle = Yii::app()->name;

        if (isset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['sectorCiudadEntrega']]) && Yii::app()->session[Yii::app()->params->telefarma['sesion']['sectorCiudadEntrega']] != null) {
            $this->objSectorCiudad = Yii::app()->session[Yii::app()->params->telefarma['sesion']['sectorCiudadEntrega']];
        }
        $this->layout = "telefarma";
        $this->getSectorName();
        $this->registerJs();
        $this->registerCss();
    }

    public function registerJs(){
        parent::registerJs();
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/select2/select2.min.js", CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/bootstrap/js/bootstrap-slider.js", CClientScript::POS_HEAD);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/raty/jquery.raty.js", CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/ad-gallery/jquery.ad-gallery.js", CClientScript::POS_HEAD);
        
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/telefarma.js", CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/telefarma-jj.js", CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/telefarma-masm.js", CClientScript::POS_END);
    }

    public function registerCss(){
        parent::registerCss();
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/select2/select2.min.css");
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/bootstrap/css/bootstrap-slider.css");
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/raty/jquery.raty.css");
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/ad-gallery/jquery.ad-gallery.css");
         
        //Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/vitalcall.css");
    }

    public function getSectorName() {
    	if ($this->objSectorCiudad != null) {
    		$this->sectorName = $this->objSectorCiudad->objCiudad->nombreCiudad;

    		if ($this->objSectorCiudad->objSector->codigoSector != 0)
    			$this->sectorName .= " - " . $this->objSectorCiudad->objSector->nombreSector;
    	}else {
    		$this->sectorName = "Seleccionar ciudad";
    	}
    }



}
