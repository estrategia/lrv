<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController {

    /**
     * @var string the default layout for the controller view. Defaults to '//layouts/column1',
     * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
     */
    public $layout = '//layouts/main';

    /**
     * @var array context menu items. This property will be assigned to {@link CMenu::items}.
     */
    public $menu = array();

    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();
    public $isMobile = true;
    public $showSeeker = true;
    public $showHeaderIcons = true;
    public $logoLinkMenu = true;
    public $fixedFooter = false;
    public $extraContentList = array();
    public $extraPageList = array();
    public $sectorName = "";

    public function init() {
        /* if (Yii::app()->detectMobileBrowser->showMobile) {
          $this->isMobile = true;
          $this->layout = '//layouts/mobile';
          } */

        $this->layout = '//layouts/mobile';

        $this->pageTitle = Yii::app()->name;

        $this->getSectorName();
        $this->registerJs();
        $this->registerCss();
    }

    public function getSectorName() {
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] != null) {
            $sectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];
            $subSector = Yii::app()->session[Yii::app()->params->sesion['subSectorCiudadEntrega']];
            $this->sectorName = $sectorCiudad->objCiudad->nombreCiudad;
            if ($subSector != null)
                $this->sectorName .= " - " . $subSector->nombreSubSector;
            else if ($sectorCiudad->objSector->codigoSector != 0)
                $this->sectorName .= " - " . $sectorCiudad->objSector->nombreSector;
        }else{
            $this->sectorName = "Seleccionar ubicación";
        }
    }

    public function registerJs() {
        if ($this->isMobile) {
            /* $cs = Yii::app()->clientScript;
              $cs->scriptMap = array(
              'jquery.js' => false,
              'jquery.ui.js' => false,
              );

              Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquery/jquery-1.10.0.min.js", CClientScript::POS_HEAD);
              Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquerymobile/js/jquery.mobile-1.4.5.min.js", CClientScript::POS_HEAD);
              Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquery/jquery.validate.min.js", CClientScript::POS_HEAD); */
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/jquerymobile/js/jquery.mobile-1.4.5.min.js", CClientScript::POS_HEAD);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/raty/jquery.raty.js", CClientScript::POS_HEAD);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.carousel.min.js", CClientScript::POS_HEAD);
            Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/main.js", CClientScript::POS_HEAD);
        } else {
            
        }
    }

//custom application css
    public function registerCss() {
        if ($this->isMobile) {
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/jquerymobile/css/themes/default/jquery.mobile-1.4.5.min.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/raty/jquery.raty.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.carousel.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/owl-carousel/owl.theme.css");
            Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/main.css");
        } else {
            
        }
    }

}
