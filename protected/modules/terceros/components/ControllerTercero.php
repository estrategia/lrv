<?php

/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class ControllerTercero extends CController {

    // public $layout = 'admin';
    public $menu = array();
    public $showMenu = true;
    public $active = "";
    /**
     * @var array the breadcrumbs of the current page. The value of this property will
     * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
     * for more details on how to specify this property.
     */
    public $breadcrumbs = array();

    public function init() {
        $this->pageTitle = Yii::app()->name;
        $this->registerJs();
        $this->registerCss();
    }

    public function registerJs() {
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/bootstrap/dist/js/bootstrap.min.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/js/jquery.cookie.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/moment/min/moment.min.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/fullcalendar/dist/fullcalendar.min.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/js/jquery.dataTables.min.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/chosen/chosen.jquery.min.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/colorbox/jquery.colorbox-min.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/js/jquery.noty.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/responsive-tables/responsive-tables.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/js/jquery.raty.min.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/js/jquery.iphone.toggle.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/js/jquery.autogrow-textarea.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/js/jquery.uploadify-3.1.min.js', CClientScript::POS_END);
        //Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/js/jquery.history.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/charisma/js/charisma.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/loading/js/Loading.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/bootbox.min.js', CClientScript::POS_END);
        
        //Yii::app()->clientScript->registerCoreScript('jquery');
        
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/libs/owl-carousel/owl.carousel.min.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/terceros.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/common.js', CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . '/js/modulos.js', CClientScript::POS_END);
    }

//custom application css
    public function registerCss() {
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/css/charisma-app.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/chosen/chosen.min.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/colorbox/example3/colorbox.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/responsive-tables/responsive-tables.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/css/jquery.noty.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/css/noty_theme_default.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/css/jquery.iphone.toggle.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/css/uploadify.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/charisma/css/animate.min.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/loading/css/Loading.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/owl-carousel/owl.carousel.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/libs/owl-carousel/owl.theme.css');
        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . '/css/terceros.css');
        //Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/libs/charisma/css/bootstrap-simplex.min.css");
    }

}
