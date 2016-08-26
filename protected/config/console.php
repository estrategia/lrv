<?php

// This is the configuration for yiic console application.
// Any writable CConsoleApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'Drogueria - La Rebaja Virtual',
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
            'connectionString' => 'mysql:host=localhost;port=3306;dbname=lrvmovil_copservir',
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
                    //'categories' => 'application',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_WARNING,
                    'logFile' => 'cron_warning.log',
                    //'categories' => 'application',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'cron_info.log',
                    //'categories' => 'application',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'logFile' => 'cron_trace.log',
                    'levels' => 'trace, vardump',
                    //'categories' => 'application',
                ),
                array(
                    'class'=> 'CFileLogRoute',
                    'levels'=> CLogger::LEVEL_INFO,
                    'logFile' => 'cron_bloqueo_info.log',
                    'categories'=> 'bloqueo_usuario',
                ),
            ),
        ),
    ),
    'params' => array(
        'correoAdmin' => 'infolrv@copservir.com',
        'bloqueoUsuario' => array(
            'diasBloqueo' => 3,
            'cantidadCompras' => 14,
            'acumuladoCompras' => 200000,
        ),
        'webServiceUrl' => array(
            'sincronizarBeneficiosSIICOP' => 'http://localhost/copservir/beneficios/sweb/wslrv',
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
        ),
        'callcenter' => array(
            'correo' => 'miguel.sanchez@eiso.com.co',
            'estadoCompra' => array(
                'estado' => array(
                    'pendiente' => 1,
                    'tramite' => 2,
                    'asignado' => 3,
                    'remitido' => 4,
                    'facturado' => 5,
                    'entregado' => 6,
                    'cancelado' => 7,
                    'devolucion' => 8,
                    'remisionBorrada' => 9,
                    'remisionAutomatica' => 10,
                    'pendientePasarela' => 11,
                    'aprobadoPasarela' => 12,
                    'negadoPasarela' => 13,
                    'validacionManualPasarela' => 14,
                    'mensajeroAsignado' => 15,
                    'subasta' => 16,
                ),
            )
        ),
        'formaPago' => array(
            'idCredirebaja' => 2,
            'tarjetasDatafono' => array(5, 6, 7, 8, 9, 10, 11, 12),
            'tarjetasDatafonoLogo' => array(
                5 => '/images/iconos/visa_logo.png',
                6 => '/images/iconos/visa_logo.png',
                7 => '/images/iconos/visaelectron_logo.png',
                8 => '/images/iconos/maestro_logo.png',
                9 => '/images/iconos/mastercard_logo.png',
                10 => '/images/iconos/exito_logo.png',
                11 => '/images/iconos/bigpass_logo.png',
                12 => '/images/iconos/sodexo_logo.png',
            ),
            'pasarela' => array(
                'valorMinimo' => 5000,
                'idPasarela' => 3,
                'usuarioId' => '2',
                'llaveEncripcion' => '1111111111111111',
                'prueba' => '1',
                'action' => 'https://gateway2.pagosonline.net/apps/gateway/index.html',
                'descripcion' => 'La Rebaja Virtual - Pasarela de pago',
            )
        ),
    ),
);

