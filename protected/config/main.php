<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Drogueria - La Rebaja Virtual',
    'language' => 'es',
    'sourceLanguage' => 'es',
    'defaultController' => 'sitio',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.widgets.*',
        'application.models.*',
        'application.models.form.*',
        'application.models.view.*',
        'application.components.*',
        'ext.shoppingCart.*',
        //'ext.shoppingCartSalesman.*',
        //'ext.shoppingCartVitalCall.*',
        'ext.shoppingCartNationalSale.*'
    ),
	'onBeginRequest' => array('WorldUrlManager', 'initRules'),
    'modules' => require(dirname(__FILE__) . '/modules.php'),
    // application components
    'components' => array(
        'user' => array(
            // enable cookie-based authentication
            'loginUrl' => array('usuario/autenticar'),
            'allowAutoLogin' => true,
        ),
        'urlManager' => require(dirname(__FILE__) . '/urlManager.php'),
        'db' => require(dirname(__FILE__) . '/database.php'),
        'errorHandler' => array(
            'errorAction' => 'sitio/error',
        ),
        'detectMobileBrowser' => array(
            'class' => 'ext.detectmobilebrowser.XDetectMobileBrowser',
        ),
        'mobileDetect' => array(
            'class' => 'ext.MobileDetect.MobileDetect'
        ),
        'shoppingCart' => array(
            'class' => 'ext.shoppingCart.EShoppingCart',
        ),
        /*'shoppingCartSalesman' => array(
            'class' => 'ext.shoppingCartSalesman.EShoppingCart',
        ),
        'shoppingCartVitalCall' => array(
            'class' => 'ext.shoppingCartVitalCall.EShoppingCart',
        ),
        'shoppingCartNationalSale' => array(
            'class' => 'ext.shoppingCartNationalSale.EShoppingCart',
        ),*/
        'ePdf' => array(
            'class' => 'ext.yii-pdf.EYiiPdf',
            'params' => array(
                'mpdf' => array(
                    'librarySourcePath' => 'application.vendors.mpdf.*',
                    'constants' => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class' => 'mpdf',
                ),
            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_ERROR,
                    'logFile' => 'app_error.log',
                //'categories' => 'application',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_WARNING,
                    'logFile' => 'app_warning.log',
                //'categories' => 'application',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'app_info.log',
                //'categories' => 'application',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'trace, vardump',
                ),
                array(
                    'class' => 'CWebLogRoute',
                    'enabled' => YII_DEBUG,
                    'levels' => 'error, warning',
                    'showInFireBug' => true,
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'app_bloqueo_info.log',
                    'categories' => 'bloqueo_usuario',
                ),
            ),
        ),
    ),
    'params' => require(dirname(__FILE__) . '/params.php'),
);
