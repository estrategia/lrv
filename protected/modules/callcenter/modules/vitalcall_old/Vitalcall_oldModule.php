<?php

class Vitalcall_oldModule extends CWebModule {
    public $homeUrl = array('/callcenter/vitalcall_old');

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'callcenter.models.*',
            //'callcenter.models.form.*',
            'vitalcall_old.models.*',
            'vitalcall_old.components.*',
            'callcenter.components.*',
            'application.components.*',
            'application.components.behaviors.*',
        ));
        
        Yii::app()->setComponents(array(
            'errorHandler' => array(
                'errorAction' => 'callcenter/vitalcall_old/sitio/error',
            ),
        ));

        $this->layoutPath = "protected/modules/callcenter/views/layouts";
        Yii::app()->homeUrl = array('/callcenter/vitalcall_old');
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else
            return false;
    }

}
