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
            //'tablePrefix' => '', // even empty table prefix required!!!
            'emulatePrepare' => true,
            'enableProfiling' => true,
            //'schemaCacheID' => 'cache',
            //'queryCacheID' => 'cache',
            //'schemaCachingDuration' => 120,
            'enableParamLogging' => true,
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
            'sincronizarBeneficiosSIICOP' => 'http://192.168.40.137/copservir/beneficios/sweb/wslrv',
            'envioCorreosRecordatorios' => 'http://localhost/lrv/sweb/wslrv'
        ),
        'claveLista' => 'listapersonallrv', 
        'producto' => array(
            'tipoImagen' => array(
                'mini' => 1,
                'grande' => 2,
            ),
            'tipoImagenSelect' => array(
                1 => 'mini',
                2 => 'grande'
            ),
            'noImagen' => array(
                'mini' => '/images/productos/thumb/noimage.png',
                'grande' => '/images/productos/noimage.png',
            )
        ),
        'carpetaImagen' => array(
            'categorias' => '/images/menu/',
            'codigoEspecial' => '/images/codigoespecial/',
            'productos' => array(1 => '/images/productos/thumb/', 2 => '/images/productos/'),
            'combos' => array(1 => '/images/combos/thumb/', 2 => '/images/combos/'),
            'menuDesktop' => '/images/menu/desktop/',
        )
    ),
);
