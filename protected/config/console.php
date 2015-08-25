<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'SIICOP Console Application',
    // preloading 'log' component
    'preload' => array('log'),
    'import' => array(
    //'application.models.*',
    //'application.components.*',
    //'application.components.behaviors.*',
    ),
    // application components
    'components' => array(
        'db' => array(
            'connectionString' => 'mysql:host=localhost;port=3306;dbname=lrvmovil',
            'username' => 'root',
            //'password' => '',
            'charset' => 'UTF8',
            'tablePrefix' => '', // even empty table prefix required!!!
            'emulatePrepare' => true,
            'enableProfiling' => true,
            'schemaCacheID' => 'cache',
            'queryCacheID' => 'cache',
            'schemaCachingDuration' => 120
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_ERROR,
                    'logFile' => 'cron_error.log',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_WARNING,
                    'logFile' => 'cron_warning.log',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'cron_info.log',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'logFile' => 'cron_trace.log',
                    'levels' => 'trace, vardump',
                ),
            ),
        ),
    ),
    'params' => array(
        'webServiceUrl' => array(
            'sincronizarBeneficiosSIICOP' => 'http://localhost/copservir/beneficios/sweb/wslrv'
        ),
    ),
);
