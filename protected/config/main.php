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
        'application.models.*',
        'application.models.form.*',
        'application.models.view.*',
        'application.components.*',
        'ext.shoppingCart.*',
    ),
    'modules' => array(
// uncomment the following to enable the Gii tool

        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '4dm1n*-*',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
// enable cookie-based authentication
            'loginUrl' => array('usuario/autenticar'),
            'allowAutoLogin' => true,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => true,
        ),
        //CONEXION SERVIDOR LOCAL
        /* 'db' => array(
          'connectionString' => 'mysql:host=localhost;port=3306;dbname=promarca_lrvmovil',
          'emulatePrepare' => true,
          'username' => 'promarca_tmp',
          'password' => 'T3mp0r4l',
          'charset' => 'utf8',
          ), */
//CONEXION SERVIDOR REMOTO
        /* 'db' => array(
          'connectionString' => 'mysql:host=66.147.244.236;port=3306;dbname=promarca_lrvmovil',
          'emulatePrepare' => true,
          'username' => 'promarca_tmp',
          'password' => 'T3mp0r4l',
          'charset' => 'utf8',
          ), */
//CONEXION MIGUEL
        'db' => array(
            'connectionString' => 'mysql:host=localhost;port=3306;dbname=lrvmovil',
            'emulatePrepare' => true,
            'username' => 'root',
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
// use 'site/error' action to display errors
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
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_ERROR,
                    'logFile' => 'app_error.log',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_WARNING,
                    'logFile' => 'app_warning.log',
                ),
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => CLogger::LEVEL_INFO,
                    'logFile' => 'app_info.log',
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
            ),
        ),
    ),
    'params' => array(
        'correoAdmin' => 'infolrv@copservir.com',
        'urlSitio' => 'www.larebajavirtual.com',
        'clienteFiel' => array('correo' => 'cliente_fiel@copservir.com', 'telefono' => '01 8000 93 99 00'),
        'usuario' => array(
            //'perfilDefecto' => 1,
            'sesion' => 'larebaja.online.usuario',
            'estado' => array('activo' => 1, 'inactivo' => 0),
            'estadoNombre' => array(0 => 'Inactivo', 1 => 'Activo'),
        ),
        'sesion' => array(
            'usuario' => 'larebaja.online.usuario',
            'usuarioBienvenida' => 'larebaja.online.usuario.bienvenida',
            'tipoEntrega' => 'larebaja.online.entrega.tipoEntrega',
            'redireccionEntrega' => 'larebaja.online.entrega.redireccion',
            'redireccionUbicacion' => 'larebaja.online.ubicacion.redireccion',
            'redireccionAutenticacion' => 'larebaja.online.usuario.autenticacion',
            'pdvEntrega' => 'larebaja.online.ubicacion.pdvEntrega',
            'sectorCiudadEntrega' => 'larebaja.online.ubicacion.sectorCiudadEntrega',
            'subSectorCiudadEntrega' => 'larebaja.online.ubicacion.subSsectorCiudadEntrega',
            'productosBusquedaOrden' => 'larebaja.online.productos.busqueda.orden',
            'productosBusquedaFiltro' => 'larebaja.online.productos.busqueda.filtro',
            'productosBusquedaCategoria' => 'larebaja.online.productos.busqueda.categoria',
            'carroPagarForm' => 'larebaja.online.carro.pagar.form',
        ),
        'entrega' => array(
            'tipo' => array('presencial' => 1, 'domicilio' => 2),
            'sesion' => 'larebaja.online.entrega.tipoEntrega',
        ),
        'generos' => array(1 => 'Femenino', 2 => 'Masculino'),
        'genero' => array(
            'lista' => array(1 => 'Femenino', 2 => 'Masculino'),
            'valor' => array('femenino' => 1, 'masculino' => 2),
            'nombre' => array('femenino' => 'Femenino', 'masculino' => 'Masculino', 1 => 'Femenino', 2 => 'Masculino')
        ),
        'producto' => array(
            'tipoImagen' => array(
                'mini' => 1,
                'grande' => 2,
            ),
            'noImagen' => array(
                'mini' => '/images/productos/thumb/noimage.gif',
                'grande' => '/images/productos/noimage.gif',
            )
        ),
        'pagar' => array(
            'pasos' => array(
                'despacho' => 1, 'entrega' => 2, 'pago' => 3, 'confirmacion' => 4,
                1 => 'despacho', 2 => 'entrega', 3 => 'pago', 4 => 'confirmacion',
            ),
            'pasosDisponibles' => array('despacho', 'entrega', 'pago', 'confirmacion'),
        ),
        'formaPago' => array(
            'idCredirebaja' => 2,
        ),
        'carpetaImagen' => array(
            'categorias' => '/images/menu/',
            'codigoEspecial' => '/images/codigoespecial/',
            'productos' => array(1 => '/images/productos/thumb/', 2 => '/images/productos/'),
            'combos' => array(1 => '/images/combos/thumb/', 2 => '/images/combos/'),
        ),
        'busqueda' => array(
            'tipo' => array(
                'categoria' => 1, 'buscador' => 2
            ),
            'imagen' => array(
                'exito' => '/images/productos-encontrados.jpg',
                'noExito' => '/images/sin_resultado.png',
                'noExacta' => '/images/conicidedencias-no-exactas.jpg',
            ),
        ),
        'ciudad' => array(
            '*' => 99999
        ),
        'sector' => array(
            '*' => 99
        ),
        'perfil' => array(
            'defecto' => 1,
            '*' => 99
        ),
        'servicioVentaControlada' => 17,
        'asuntoRecordatorioClave' => 'Clave de Ingreso',
        'asuntoBienvenida' => 'La Rebaja te da la bienvenida',
        'formatoMoneda' => array('patron' => "¤#,##0;(¤#,##0)", 'moneda' => '$'),
    ),
);
