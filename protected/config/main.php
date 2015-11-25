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
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        'callcenter' => array(
            'defaultController' => 'admin',
            'components' => array(
                'user' => array(
                    'class' => 'callcenter.components.UserOperator',
                ),
            )),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1',
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
        'session' => array(
            'class' => 'CDbHttpSession',
            'timeout' => 2592000//1 dia 86400 --> 30 dias,
        ),
        'urlManager' => array(
            'urlFormat' => 'path',
            'showScriptName' => false,
            'caseSensitive' => true,
        ),
        'db' => array(
            'connectionString' => 'mysql:host=localhost;port=3306;dbname=lrvmovil',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
            'enableProfiling' => true,
            'enableParamLogging' => true,
        ),
        /* 'db' => array(
          'connectionString' => 'mysql:host=66.147.244.236;port=3306;dbname=promarca_tmp_lrv',
          'emulatePrepare' => true,
          'username' => 'promarca_tmp',
          'password' => 'T3mp0r4l',
          'charset' => 'utf8',
          'enableProfiling' => true,
          'enableParamLogging' => true,
          ), */
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
        'maximoComparacion' => 5,
        'urlSitio' => 'www.larebajavirtual.com',
        'clienteFiel' => array(
            'correo' => 'cliente_fiel@copservir.com',
            'telefono' => '01 8000 93 99 00',
            'dias' => array(1, 10, 15, 25),
            'montoCompra' => 1000,
            'puntosCompra' => 10,
        ),
        'usuario' => array(
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
            'productosComparar' => 'larebaja.online.productos.agregarProductos'
        ),
        'entrega' => array(
            'listaTipos' => array(1, 2),
            'tipo' => array('presencial' => 1, 'domicilio' => 2, 2 => 'DOMICILIO', 1 => 'PRESENCIAL'),
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
        'calificacion' => array(
            'categoriasNoCalificacion' => array(1, 2)
        ),
        'cotizaciones' => array(
            'diasVisualizar' => 10,
        ),
        'pagar' => array(
            'pasos' => array(
                'despacho' => 1, 'entrega' => 2, 'pago' => 3, 'confirmacion' => 4,
                1 => 'despacho', 2 => 'entrega', 3 => 'pago', 4 => 'confirmacion',
            ),
            'pasosDisponibles' => array(
                'domicilio' => array('despacho', 'entrega', 'pago', 'confirmacion'),
                'presencial' => array('entrega', 'pago', 'confirmacion'),
            ),
        ),
        'formaPago' => array(
            'idCredirebaja' => 2,
            'tarjetasDatafono' => array(5, 6, 7, 8, 9, 10, 11, 12),
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
        'carpetaImagen' => array(
            'categorias' => '/images/menu/',
            'codigoEspecial' => '/images/codigoespecial/',
            'productos' => array(1 => '/images/productos/thumb/', 2 => '/images/productos/'),
            'combos' => array(1 => '/images/combos/thumb/', 2 => '/images/combos/'),
            'menuDesktop' => '/images/menu/desktop/',
        ),
        'busqueda' => array(
            'tipoBuscador' => array(
                'GSA' => 1,
                'webService' => 2
            ),
            'buscadorActivo' => 2,
            'tipo' => array(
                'categoria' => 1, 'buscador' => 2
            ),
            'imagen' => array(
                'exito' => '/images/productos-encontrados.jpg',
                'noExito' => '/images/sin_resultado.png',
                'noExacta' => '/images/conicidedencias-no-exactas.jpg',
            ),
            'productosPorPagina' => array(5, 10, 15, 20, 25)
        ),
        'ciudad' => array(
            '*' => 99999
        ),
        'sector' => array(
            '*' => 99,
            'sinSector' => 0
        ),
        'perfil' => array(
            'defecto' => 1,
            'clienteFiel' => 3,
            '*' => 99
        ),
        'puntos' => array(
            'categoria' => 101,
            'marca' => 102,
            'proveedor' => 103,
            'producto' => 104,
            'monto' => 201,
            'cedula' => 202,
            'rango' => 203,
            'cumpleanhos' => 204,
            'clientefielCompra' => 301,
        ),
        'beneficios' => array(
            'lrv' => array(21, 22, 23, 24),
            'recambios' => array(1, 10),
            'recambio' => 1,
            'recambioCruzado' => 10,
            'swobligaCli' => array(0 => 'Todos', 2 => 'Cliente fiel'),
            'porcentajeMaximo' => 60,
        ),
        'servicioVentaControlada' => 17,
        'gps' => array(
            'distanciaMaxima' => 20//kilometros
        ),
        'asunto' => array(
            'recordatorioClave' => 'La Rebaja Virtual: Clave de ingreso',
            'bienvenida' => 'La Rebaja Virtual: Bienvenido(a)',
            'pedidoRealizado' => 'La Rebaja Virtual: Pedido realizado',
            'pedidoRealizadoPasarela' => 'La Rebaja Virtual: Pedido por pago en línea en proceso de validación',
            'pedidoRemitido' => 'La Rebaja Virtual: Pedido remitido',
        ),
        'asuntoRecordatorioClave' => 'Clave de Ingreso',
        'asuntoBienvenida' => 'La Rebaja te da la bienvenida',
        'formatoMoneda' => array('patron' => "¤#,##0;(¤#,##0)", 'moneda' => '$'),
        'webServiceUrl' => array(
            'serverGeo' => 'http://www.copservir.com/webService/serverGeo.php',
            'serverLRV' => 'http://www.copservir.com/webService/serverLRV.php',
            'crmLrv' => "http://www.copservir.com/webService/crmLrv.php",
            'remisionPos' => "http://www.copservir.com/webService/serverLRV.php",
            'remisionPosECommerce' => "http://www.copservir.com/webService/Pos/RemisionPosEcommerce.php"
        ),
        'callcenter' => array(
            'correo' => 'alexander_javela@copservir.com',
            'pedidos' => array(
                'diasVisualizar' => 30,
                'tiempoRecargarPagina' => 30000,
            ),
            'perfil' => array(
                1 => 'Operador',
                2 => 'Administrador',
            ),
            'usuario' => array(
                'estado' => array('activo' => 1, 'inactivo' => 0),
                'estadoNombre' => array(0 => 'Inactivo', 1 => 'Activo'),
            ),
            'observacion' => array(
                'asuntoMensaje' => 'La rebaja virtual - información de su pedido',
                'estado' => array(
                    7 => 'Cancelar',
                    1 => 'Volver a pendiente',
                    8 => 'Devolución',
                    5 => 'Facturado',
                ),
            ),
            'notificacion' => array(
                'tipo' => array(
                    '1' => '1. Volver a Pendiente',
                    '2' => '2. Ofrecer otros productos',
                    '3' => '3. Pedido solicitado fuera de servicio',
                    '4' => '4. Pedido solicitado y no hay domicilio',
                    '5' => '5. Producto agotado',
                    '6' => '6. Confirmar dirección',
                    '7' => '7. Confirmar pedio de pago',
                    '8' => '8. Se solicita con Tarjeta credirebaja y no tiene cupo',
                    '9' => '9. Se solicita con Tarjeta credirebaja y esta en mora',
                ),
                'plantilla' => array(
                    '1' => '{saludo} Sr(a) {nombreUsuario}, para informarle que en su pedido de venta virtual No. {codigoCompra}, atendido por el punto de venta {nombrePdv}, se estan consiguiendo los productos (*) lo cual causara un atraso en el tiempo de entrega del pedido. Para mayor información comunicarse a la línea 01 8000 93 99 00. Auxiliar {nombreOperador}. Muchas Gracias',
                    '2' => '{saludo} Sr(a) {nombreUsuario}, nos hemos tratado de comunicar con usted pero no ha sido posible. Para informarle que en su pedido de venta virtual No. {codigoCompra}, atendido por el punto de venta {nombrePdv}, no se tienen disponibles los productos (*)  y (*). Se le puede ofrecer (*). Para confirmar cambios en el pedido favor comunicarse a la línea 01 8000 93 99 00. Auxiliar {nombreOperador}. Muchas Gracias.',
                    '3' => '{saludo} Sr(a) {nombreUsuario}, nos hemos tratado de comunicar con usted pero no ha sido posible, acerca de su pedido de venta virtual No. {codigoCompra}, para atender con el punto de venta {nombrePdv}, le informamos que en el momento que la solicito no teníamos servicio, por favor nos confirma a la línea 01 8000 93 99 00  con el Auxiliar {nombreOperador}, si todavía necesita el despacho. Muchas Gracias',
                    '4' => '{saludo} Sr(a) {nombreUsuario}, tratamos de comunicarnos con usted pero no fue posible, acerca de su venta virtual No {codigoCompra}, para atender con el punto de venta {nombrePdv}, le informamos que en este momento ya no contamos con servicio a domicilio para su sector, por favor nos confirma a la línea 01 8000 93 99 00  con el Auxiliar {nombreOperador}, si podemos realizar el despacho el día de mañana. Muchas Gracias.',
                    '5' => '{saludo} Sr(a) {nombreUsuario}, nos hemos tratado de comunicar con usted pero no ha sido posible, para informarle que el producto que usted solicito en el pedido de venta virtual No. {codigoCompra} para atender con el punto de venta {nombrePdv}, no esta disponible, se encuentra agotado, cualquier inquietud se puede comunicar a nuestra línea 01 8000 93 99 00 con  el Auxiliar {nombreOperador}. Muchas Gracias.',
                    '6' => '{saludo} Sr(a) {nombreUsuario}, tratamos de comunicarnos con usted pero no fue posible. Para informarle que su pedido de venta No. {codigoCompra}, atendido por el punto de venta {nombrePdv}, fue despachado a la Dirección {direccionUsuario}, pero nos informan que no fue posible realizar la entrega. Favor comunicarse a la línea 01 8000 93 99 00 para confirmar la dirección de despacho. Auxiliar {nombreOperador}. Muchas Gracias.',
                    '7' => '{saludo} Sr(a) {nombreUsuario}, tratamos de comunicarnos con usted pero no fue posible. Para informarle que su pedido de venta No. {codigoCompra}, atendido por el punto de venta {nombrePdv}, no se ha podido despachar, ya que no es clara la forma de pago. Favor comunicarse a la línea 01 8000 93 99 00 para confirmar si es con Tarjeta Credirejaba o si es con otro tipo de tarjeta. Auxiliar {nombreOperador}. Muchas Gracias.',
                    '8' => '{saludo} Sr(a) {nombreUsuario}, tratamos de comunicarnos con usted pero no fue posible. Para informarle que su pedido de venta No. {codigoCompra}, atendido por el punto de venta {nombrePdv}, no se ha podido despachar, ya que la Tarjeta credirebaja no tiene cupo. Favor comunicarse a la línea 01 8000 93 99 00 para confirmar si se le realiza el despacho con otro medio de pago. Auxiliar {nombreOperador}. Muchas Gracias.',
                    '9' => '{saludo} Sr(a) {nombreUsuario}, tratamos de comunicarnos con usted pero no fue posible. Para informarle que su pedido de venta No. {codigoCompra}, atendido por el punto de venta {nombrePdv}, no se ha podido despachar, ya que que usted se encuentra en mora con la Tarjeta credirebaja. Favor comunicarse a la línea 01 8000 93 99 00 para confirmar si se le realiza el despacho con otro medio de pago. Auxiliar {nombreOperador}. Muchas Gracias.',
                ),
            ),
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
                ),
                'colorClass' => array(
                    1 => 'info',
                    2 => 'primary',
                    3 => 'success',
                    4 => 'danger',
                    5 => 'warning',
                    6 => 'success',
                    7 => 'default',
                    8 => 'default',
                    9 => 'primary',
                    10 => 'danger',
                    11 => 'danger',
                    12 => 'success',
                    13 => 'warning',
                )
            ),
            'modulosConfigurados' => array(
                'tiposModulos' => array(
                    1 => 'Banner',
                    2 => 'Lista de Productos',
                    3 => 'Lista de Imagenes',
                    4 => 'Html',
                    5 => 'Html y lista de productos',
                    6 => 'Enlaces men&uacute;',
                    7 => 'Promoci&oacute;n flotante',
                    8 => 'Cuadricula de productos',
                    9 => 'Grupo de m&oacute;dulos',
                ),
                'ubicacionModulos' => array(
                    1 => 'Inicio',
                    2 => 'División',
                    3 => 'Categoria'
                ),
                'diasSemana' => array(
                    0 => 'Domingo',
                    1 => 'Lunes',
                    2 => 'Martes',
                    3 => 'Miércoles',
                    4 => 'Jueves',
                    5 => 'Viernes',
                    6 => 'Sábado',
                ),
                'tiposContenidos' => array(
                    1 => 'Link',
                    2 => 'Html',
                    3 => 'Ninguno'
                ),
                'urlImagenes' => 'images/banners/',
                'tiposListasProductos' => array(
                    0 => 'Producto',
                    1 => 'Marca',
                    2 => 'Categoria'
                ),
                'estadosModulos' => array(
                    0 => 'Inactivo',
                    1 => 'Activo'
                ),
            ),
            'categorias' => array(
                'visible'  => array(
                    '0' => 'No visible',
                    '1' => 'Visible'
                )
            ),
            'estadoItem' => array(
                'estado' => array(
                    'activo' => 1,
                    'modificado' => 2,
                    'adicionado' => 3,
                    'eliminado' => 4,
                ),
            ),
            'sesion' => array(
                'usuario' => 'larebaja.online.callcenter.usuario',
                'formPedidoBusqueda' => 'larebaja.online.callcenter.formpedidobusqueda',
            ),
        ),
    ),
);
