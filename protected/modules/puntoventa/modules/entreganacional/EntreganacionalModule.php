<?php

class EntreganacionalModule extends CWebModule {

    public $homeUrl = array('/entreganacional/default');

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'entreganacional.models.*',
            'entreganacional.components.*',
        ));
        
        $this->layoutPath = "protected/modules/puntoventa/views/layouts";
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
