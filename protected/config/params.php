<?php

return array(
    "fechaActualizacion" => array(
        "js" => "20170323",
        "css" => "20170323"
    ),
    'elibom' => array(
        'url' => 'https://api.masivapp.com/SmsHandlers/sendhandler.ashx',
        'usuario' => 'Api_7V7K-',
        'password' => '68IK0BHE-W',
    ),
    "meses" => array(
        1 => "Enero",
        2 => "Febrero",
        3 => "Marzo",
        4 => "Abril",
        6 => "Junio",
        7 => "Julio",
        8 => "Agosto",
        9 => "Septiembre",
        10 => "Octubre",
        11 => "Noviembre",
        12 => "Diciembre"
    ),
    'dispositivo' => array(
        'desktop' => 1,
        'movil' => 2,
        1 => 'Desktop',
        2 => 'Movil'
    ),
    'horarioEntrega' => array(
        'deltaDefecto' => '0 1:00:0.000000', // testing
        'deltaEntregaNacional' => '0 2:00:0.000000', // testing
        'deltaHorarios' => array(
            '76001' => array(
                'fechaInicio' => '2016-04-21 00:00:00',
                'fechaFin' => '2016-04-21 16:23:00',
                'deltaHorario' => '0 2:00:0.000000'
            )
        )
    ),
    'impuestoDomicilio' => 1,
    'tipoFormulaMedica' => '2',
    'promociones' => array(
        'viernesnegro' => array(
            'icono' => '/images/inicio/masvistos.png',
            'nombre' => 'Viernes negro',
            'fechaInicio' => '2015-11-25 13:00:00',
            'fechaFin' => '2017-11-28 15:10:00',
            'elementos' => array(
                array(
                    'rutaImagen' => '/images/banner/banner_inicio1-2015-10-20.jpg',
                    'productos' => array(12957, 12959, 30128, 32591, 97448, 17600, 26767, 48679, 48683)
                ),
                array(
                    'rutaImagen' => '/images/banner/banner_inicio2-2015-10-20.jpg',
                    'productos' => array(12957, 12959, 30128, 32591, 97448, 17600, 26767, 48679, 48683)
                ),
                array(
                    'rutaImagen' => '/images/banner/banner_inicio1.jpg',
                    'productos' => array(12957, 12959, 30128, 32591, 97448, 17600, 26767, 48679, 48683)
                ),
                array(
                    'rutaImagen' => '/images/banner/banner_inicio2.jpg',
                    'productos' => array(12957, 12959, 30128, 32591, 97448, 17600, 26767, 48679, 48683)
                ),
                array(
                    'rutaImagen' => '/images/banner/banner_inicio3.jpg',
                    'productos' => array(12957, 12959, 30128, 32591, 97448, 17600, 26767, 48679, 48683)
                )
            )
        )
    ),
    'minimoSlideProductos' => 5,
    'minimoGridProductos' => 5,
    'correoAdmin' => 'infolrv@copservir.com',
    'plantillasCorreo' => array(
        'header' => 'header',
        'footer' => 'footer',
        'finCompra' => 'finCompra',
        'desbloquearCuenta' => 'desbloquearCuenta',
        'bonoCreado' => 'bonoCreado',
        'bonoPorVencer' => 'bonoPorVencer',
        'formulasVencer' => 'formulasVencer',
        'recordarLista' => 'recordarLista',
        'observacionPedido' => 'observacionPedido',
        'compraCallcenter' => 'compraCallcenter',
        'cambioEstadoCompraItemTercero' => 'cambioEstadoCompraItemTercero',
        'registroUsuarioTercero' => 'cambioEstadoCompraItemTercero',
        'recordarClaveTercero' => 'recordarClaceTercero',
    	'codigoVerificacion' => 'codigoVerificacion',
    	'bienvenidaClienteFiel'  => 'bienvenidaClienteFiel',
    ),
    'rutasPlantillasCorreo' => array(
        'compraCorreo' => 'compraCorreo',
        'compraCallcenter' => 'application.modules.callcenter.views.pedido.compraCorreo',
        'correoRecordacion' => '//common/correoRecordacion',
        'correoRecordarClave' => '_correoRecordar',
        'correoDesbloqueo' => '//common/correoDesbloqueo',
        'correoBloqueo' => '//common/correoBloqueo',
        'reactivacionBono' => '_mensajeCorreoReactivacion',
        'mensajeHtml' => '//common/mensajeHtml',
        'bonoCorreo' => 'bonoCorreo',
        'cambioEstadoCompraItemTercero' => 'application.modules.terceros.views.compras.correoCambioEstadoItem',
    	'verificacionClienteFiel' => '//common/correoVerificacion',
    	'bienvenidaClienteFiel' => '//common/bienvenidaClienteFiel',
    ),
    'maximoComparacion' => 5,
    'urlSitio' => 'www.larebajavirtual.com',
    'urlChatLinea' => '/contenido/ver/tipo/grupo/contenido/41',
    'clienteFiel' => array(
        'correo' => 'cliente_fiel@copservir.com',
        'telefono' => '01 8000 93 99 00',
        'dias' => array(1, 10, 15, 25),
        'montoCompra' => 1000,
        'puntosCompra' => 10,
    	// nuevo portal
    	'url' => "http://localhost/siicop/clientefiel/api/",
    	'usuario' => 'admin',
    	'password' => 'admin',
    	'sesion' => 'lrv.clientefiel.clientefielregistro',
    	'sesionVerificacion' => 'lrv.clientefiel.codigoverificacion',
    	'codigoPerfilActivo' => 5,
    	'asuntoVerificacion' => 'La Rebaja Virtual: Verificacion de datos',
    ),
    'usuario' => array(
        'sesion' => 'larebaja.online.usuario',
        'estado' => array(
            'activo' => 1,
            'inactivo' => 0
        ),
        'estadoNombre' => array(
            0 => 'Inactivo',
            1 => 'Activo'
        )
    ),
    'claveLista' => 'listapersonallrv',
    'bono' => array(
        'diaMinimoRecordacion' => 1,
        'diaMaximoRecordacion' => 5,
    ),
    'sesion' => array(
        'cookieExpiracion' => 2592000, // 1 dia 86400 --> 30 dias
        'claveCookie' => 'l4r384j4cook13',
        'usuario' => 'larebaja.online.usuario',
        'usuarioBienvenida' => 'larebaja.online.usuario.bienvenida',
        // 'tipoEntrega' => 'larebaja.online.entrega.tipoEntrega',
        'redireccionEntrega' => 'larebaja.online.entrega.redireccion',
        'redireccionUbicacion' => 'larebaja.online.ubicacion.redireccion',
        'redireccionAutenticacion' => 'larebaja.online.usuario.autenticacion',
        'pdvEntrega' => 'larebaja.online.ubicacion.pdvEntrega',
        'direccionEntrega' => 'larebaja.online.ubicacion.direccionEntrega',
        'sectorCiudadEntrega' => 'larebaja.online.ubicacion.sectorCiudadEntrega',
        'subSectorCiudadEntrega' => 'larebaja.online.ubicacion.subSsectorCiudadEntrega',
        'productosBusquedaOrden' => 'larebaja.online.productos.busqueda.orden',
        'productosBusquedaFiltro' => 'larebaja.online.productos.busqueda.filtro',
        'productosBusquedaCategoria' => 'larebaja.online.productos.busqueda.categoria',
        'carroPagarForm' => 'larebaja.online.carro.pagar.form',
        'productosComparar' => 'larebaja.online.productos.agregarProductos',
        'productosNoAgregados' => 'larebaja.online.productos.noAgregados',
        'formulaMedica' => 'larebaja.online.compra.formulaMedica',
    	'mundoSuperior' => 	'larebaja.online.contenido.mundo',
    ),
    'entrega' => array(
        'listaTipos' => array(1, 2),
        'tipo' => array(
            'presencial' => 1,
            'domicilio' => 2,
            2 => 'DOMICILIO',
            1 => 'PRESENCIAL'
        ),
        'sesion' => 'larebaja.online.entrega.tipoEntrega'
    ),
    'generos' => array(
        1 => 'Femenino',
        2 => 'Masculino'
    ),
    'genero' => array(
        'lista' => array(
            1 => 'Femenino',
            2 => 'Masculino'
        ),
        'valor' => array(
            'femenino' => 1,
            'masculino' => 2
        ),
        'nombre' => array(
            'femenino' => 'Femenino',
            'masculino' => 'Masculino',
            1 => 'Femenino',
            2 => 'Masculino'
        )
    ),
    'producto' => array(
        'tipoImagen' => array(
            'mini' => 1,
            'grande' => 2
        ),
        'tipoImagenSelect' => array(
            1 => 'mini',
            2 => 'grande'
        ),
        'noImagen' => array(
            'mini' => '/images/productos/thumb/noimage.png',
            'grande' => '/images/productos/noimage.png'
        )
    ),
    'calificacion' => array(
        'categoriasNoCalificacion' => array(1, 2)
    ),
    'cotizaciones' => array(
        'diasVisualizar' => 100
    ),
    'pagar' => array(
        'pasos' => array(
            'tipoentrega' => 1,
            'despacho' => 2,
            'entrega' => 3,
            'pago' => 4,
            'confirmacion' => 5,
            1 => 'tipoentrega',
            2 => 'despacho',
            3 => 'entrega',
            4 => 'pago',
            5 => 'confirmacion'
        ),
        'pasosDisponibles' => array(
            'domicilio' => array(
                'tipoentrega',
                'despacho',
                'entrega',
                'pago',
                'confirmacion'
            ),
            'presencial' => array(
                'entrega',
                'pago',
                'confirmacion'
            )
        ),
        'pasosDesktop' => array(
            'informacion' => 1,
            'confirmacion' => 2,
            1 => 'informacion',
            2 => 'confirmacion'
        ),
        'pasosDisponiblesDesktop' => array(
            'informacion',
            'confirmacion'
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
            12 => '/images/iconos/sodexo_logo.png'
        ),
        'pasarela' => array(
            'valorMinimo' => 5000,
            'idPasarela' => 3,
            'usuarioId' => '2',
            'llaveEncripcion' => '1111111111111111',
            'prueba' => '1',
            'action' => 'https://gateway2.pagosonline.net/apps/gateway/index.html',
            'descripcion' => 'La Rebaja Virtual - Pasarela de pago'
        )
    ),
    'calificaciones' => array(
        'estados' => array(
            '0' => 'Sin aprobar',
            '1' => 'Aprobado'
        )
    ),
    'carpetaImagen' => array(
        'categorias' => '/images/menu/',
        'codigoEspecial' => '/images/codigoespecial/',
        'productos' => array(
            1 => '/images/productos/thumb/',
            2 => '/images/productos/',
            'detalleImagenes' => '/images/productos-detalle/',
        ),
        'combos' => array(
            1 => '/images/combos/thumb/',
            2 => '/images/combos/'
        ),
        'menuDesktop' => '/images/menu/desktop/'
    ),
    'busqueda' => array(
        'tipoBuscador' => array(
            'GSA' => 1,
            'webService' => 2
        ),
        'buscadorActivo' => 2,
        'tipo' => array(
            'categoria' => 1,
            'buscador' => 2
        ),
        'imagen' => array(
            'exito' => '/images/productos-encontrados.jpg',
            'noExito' => '/images/sin_resultado.png',
            'noExacta' => '/images/conicidedencias-no-exactas.jpg'
        ),
        'productosPorPagina' => array(
            4 => array(12, 24, 36, 48, 60),
            5 => array(15, 30, 50, 100, 150)
        )
    ),
    'ciudad' => array(
        '*' => 99999
    ),
    'sector' => array(
        '*' => 99,
        'sinSector' => 0
    ),
    'ubicacionDefecto' => true,
    'perfil' => array(
        'defecto' => 1,
        'asociado' => 2,
        'clienteFiel' => 5,
        'telefarma' => 20,
        '*' => 99
    ),
    'tipoVenta' => array(
        'virtual' => 1,
        'nacional' => 2, // new
        'asistida' => 3,
        'telefarma' => 4,
    	'vap' => 5,
    ),
    'bloqueoUsuario' => array(
        'diasBloqueo' => 15,
        'cantidadCompras' => 80,
        'acumuladoCompras' => 20000000000000
    ),
    'logueo' => array(
        '*' => 3
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
        'clientefielCompra' => 301
    ),
    'longitudPeriodoSuscripcion' => 30, // Dias
    'longitudToleranciaPeriodoSuscripcion' => 5, // Dias
    'diasRecordarSuscripcion' => 5,
    'beneficios' => array(
      /* 'lrv' => array(21, 22, 23, 24, 25, 26),
        'descuentos' => array(21, 22, 23, 24), // new
        'bonos' => array(25, 26), // new
        'beneficioCedula' => 25,
        'tipoBonoFormaPago' => array(
            25 => 7,
            26 => 8
        ),
        'tipoMedioPago' => array(
            25 => 15,
            26 => 16
        ),*/
    	   'lrv' => array(50,51,52,53,54,55,56,57,58,70,71),
        	'descuentos' => array(50,51,52,53,57,58,63,64,70,71), // new
        	'bonos' => array(54,55,56), // new
        	'descuentosClienteInterno' => array(57,58),
        	'bonosClienteInterno' => array(56),
        	'beneficioCedula' => 54,
            'beneficiosSuscripcion' => array(63,64),
        	'tipoBonoFormaPago' => array(
        				54 => 7,
        				55 => 8,
        				56 => 8
        	),
        	'tipoMedioPago' => array(
        				54 => 15,
        				55 => 16,
        				56 => 16,
        	),
        'recambios' => array(1, 10),
        'recambioslabel' => array(
            1 => 'Recambio',
            10 => 'Recambio Cruzado'
        ),
        'recambio' => 1,
        'recambioCruzado' => 10,
        'swobligaCli' => array(
            0 => 'Todos',
            2 => 'Cliente fiel',
        	3 => 'Cliente interno'
        ),
        'porcentajeMaximo' => 80,
        'configuracion' => array(
            'acumulado' => 1,
            'mayor' => 2
        ),
        'configuracionActiva' => 1,
        'diasBorrado' => 100,
    ),
    'servicioVentaControlada' => 17,
    'gps' => array(
        'distanciaMaxima' => 20
    ) // kilometros
    ,
    'google' => array(
        'llaveMapa' => 'gme-copservir'
    ),
    'asunto' => array(
        'recordatorioClave' => 'La Rebaja Virtual: Clave de ingreso',
        'bienvenida' => 'La Rebaja Virtual: Bienvenido(a)',
        'pedidoRealizado' => 'La Rebaja Virtual: Pedido realizado',
        'pedidoRealizadoPasarela' => 'La Rebaja Virtual: Pendiente de Confirmación Pasarela',
        'pedidoRemitido' => 'La Rebaja Virtual: Pedido remitido'
    ),
    'asuntoTercero' => array(
        'registroUsuario' => 'Se ha registrado su usuario',
        'cambioEstadoCompraItem' => 'Notificacion de cambio de estado de producto',
        'cambioClave' => 'Restauracion de contraseña'
    ),
    'asuntoRecordatorioClave' => 'Clave de Ingreso',
    'asuntoBienvenida' => 'La Rebaja te da la bienvenida',
    'formatoMoneda' => array(
        'patron' => "¤#,##0;(¤#,##0)",
        'moneda' => '$'
    ),
	'codigoSeguridadCRM' => 'EiS0-CoPserv1r-12#54'
	,
    'webServiceUrl' => array(
        'serverGeo' => 'http://www.copservir.com/webService/serverGeo.php',
        'serverLRV' => 'http://www.copservir.com/webService/serverLRV.php',
        'crmLrv' => "http://www.copservir.com/webService/crmLrv.php",
        'remisionPos' => "http://www.copservir.com/webService/serverLRV.php",
        'remisionPosECommerce' => "http://www.copservir.com/webService/Pos/RemisionPosEcommerce.php",
        'persona' => 'http://localhost/siicop/wsMultiportal/persona',
        //console
        'sincronizarBeneficiosSIICOP' => 'http://localhost/siicop/beneficios/sweb/wslrv',
       // 'sincronizarBeneficiosSIICOP' => 'http://localhost/siicop/beneficios/sweb/wslrv',
        'envioCorreosRecordatorios' => 'http://localhost/lrv/sweb/wslrv',
    ),
    'vendedor' => array(
        'sesion' => array(
            'usuario' => 'larebaja.online.vendedor.usuario',
            'cliente' => 'larebaja.online.vendedor.cliente',
            'sectorCiudadEntrega' => 'larebaja.online.vendedor.sectorciudadentrega',
            'formPedidoBusqueda' => 'larebaja.online.vendedor.formpedidobusqueda',
            'modelBonosAdminExport' => 'larebaja.online.vendedor.modelbonosadminexport',
            'pdvEntrega' => 'larebaja.online.vendedor.pdventrega',
            'carroPagarForm' => 'larebaja.online.vendedor.carropagarform',
            'redireccionUbicacion' => 'larebaja.online.vendedor.redireccionubicacion',
            'redireccionVendedor' => 'larebaja.online.vendedor.redireccionvendedor',
            'redireccionCliente' => 'larebaja.online.vendedor.redireccioncliente',
            'redireccionAutenticacion' => 'larebaja.online.vendedor.redireccionautenticacion',
            'direccionEntrega' => 'larebaja.online.vendedor.direccionentrega',
            // 'tipoEntrega' => 'larebaja.online.vendedor.tipoentrega',
            'compraInvitado' => 'larebaja.online.vendedor.comprainvitado',
            'formulaMedica' => 'larebaja.online.vendedor.compra.formulamedica'
        )
    ),
    'puntoventa' => array(
        'sesion' => array(
            'usuario' => 'larebaja.online.puntoventa.usuario',
            'formPedidoBusqueda' => 'larebaja.online.puntoventa.formpedidobusqueda',
            'objCiudadSector' => 'larebaja.online.puntoventa.objciudadsector',
            'pdv' => 'larebaja.online.puntoventa.pdv',
        	'tipoEntrega' => 'larebaja.online.puntoventa.tipoentrega',
            'pdvDestino' => 'larebaja.online.puntoventa.pdvdestino',
            
        ),
        'perfil' => 3
    ) // new
    ,
    'entreganacional' => array(
        'sesion' => array(
            'usuario' => 'larebaja.online.entreganacional.usuario',
            'objCiudadSector' => 'larebaja.online.entreganacional.objciudadsector',
            'pdv' => 'larebaja.online.entreganacional.pdv'
        ),
        'perfil' => 5
    ),
    'callcenter' => array(
        'correo' => 'alexander_javela@copservir.com',
        'pedidos' => array(
            'diasVisualizar' => 1,
            'tiempoRecargarPagina' => 10000
        ),
        'perfil' => array(
            1 => 'Operador',
            2 => 'Administrador',
            3 => 'Vendedor punto de venta',
            4 => 'Mensajero Vendedor',
            5 => 'Entrega Nacional'
        ),
        'promociones' => array(
            'urlImagenes' => 'images/promociones/'
        ), // new promociones
        'perfilesOperador' => array(
            'operador' => 1,
            'administrador' => 2,
            'vendedorPDV' => 3,
            'mensajeroVendedor' => 4
        ),
        'perfiles' => array(1, 2, 3, 4, 5),
        'usuario' => array(
            'estado' => array(
                'activo' => 1,
                'inactivo' => 0
            ),
            'estadoNombre' => array(
                0 => 'Inactivo',
                1 => 'Activo'
            )
        ),
        'bonos' => array(
            'estado' => array(
                'activo' => 1,
                'inactivo' => 2,
                'redimido' => 0
            ),
            'estadoNombre' => array(
                1 => 'Activo',
                0 => 'Redimido',
                2 => 'Inactivo'
            ),
            'tipo' => array(
                'manual' => 1,
                'cargue' => 2
            ),
            'tipoNombre' => array(
                1 => 'Manual',
                2 => 'Cargue'
            ),
            'tipoConfiguracion' => array(
                1 => 'Tradicional',
                2 => 'Bono promocional'
            ),
            'asuntoCorreo' => 'Tienes un bono disponible',
            'tipoBonoCRM' => 3,
            'tipoBonoPQRS' => 3,
            'tipoBonoTiendaPQRS' => 3,
            'codigoFORCO' => 1,
            'formaPagoBonos' => 8,
            	'vigenciaForco' => 1,
            	'keyBonos' => 'larebajavirtual.com',
            	'tipoBonoFORCO' => 1,
        ),
        'reactivacionBono' => array(
            'asuntoMensaje' => 'Activacion bono cliente fiel',
            'destinatarios' => array(
                'karen_charria@copservir.com',
                'fernando_riasco@copservir.com'
            )
        ),
        'observacion' => array(
            'asuntoMensaje' => 'La rebaja virtual - información de su pedido',
            'estado' => array(
                7 => 'Cancelar',
                1 => 'Volver a pendiente',
                8 => 'Devolución',
                5 => 'Facturado',
                17 => 'Entregado'
            )
        ),
        'notificacion' => array(// para jave
            'tipo' => array(
                '1' => '1. Volver a Pendiente',
                '2' => '2. Ofrecer otros productos',
                '3' => '3. Pedido solicitado fuera de servicio',
                '4' => '4. Pedido solicitado y no hay domicilio',
                '5' => '5. Producto agotado',
                '6' => '6. Confirmar dirección',
                '7' => '7. Confirmar pedio de pago',
                '8' => '8. Se solicita con Tarjeta credirebaja y no tiene cupo',
                '9' => '9. Se solicita con Tarjeta credirebaja y esta en mora'
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
                '9' => '{saludo} Sr(a) {nombreUsuario}, tratamos de comunicarnos con usted pero no fue posible. Para informarle que su pedido de venta No. {codigoCompra}, atendido por el punto de venta {nombrePdv}, no se ha podido despachar, ya que que usted se encuentra en mora con la Tarjeta credirebaja. Favor comunicarse a la línea 01 8000 93 99 00 para confirmar si se le realiza el despacho con otro medio de pago. Auxiliar {nombreOperador}. Muchas Gracias.'
            )
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
                'validacionManualPasarela' => 14,
                'mensajeroAsignado' => 15,
                'subasta' => 16
            ),
            'colorClass' => array(
                16 => 'info',
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
                14 => 'danger',
                15 => 'danger',
                17 => 'success'
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
                10 => 'Productos &uacute;ltimo antojo',
                11 => 'Productos banner',
            	12 => 'Men&uacute; publicidad'
            ),
            'ubicacionModulos' => array(
                1 => 'Inicio',
                2 => 'División',
                3 => 'Categoria',
                4 => 'Fin Compra',
                10 => 'Móvil Home',
                11 => 'Móvil Inicio',
                12 => 'Vendedor Inicio'
            ),
            'diasSemana' => array(
                0 => 'Domingo',
                1 => 'Lunes',
                2 => 'Martes',
                3 => 'Miércoles',
                4 => 'Jueves',
                5 => 'Viernes',
                6 => 'Sábado'
            ),
            'tiposContenidos' => array(
                1 => 'Link',
                2 => 'Html',
                3 => 'Ninguno'
            ),
            'urlImagenes' => 'images/banner/',
            'tiposListasProductos' => array(
                0 => 'Producto',
                1 => 'Marca',
                2 => 'Categoria'
            ),
            'estadosModulos' => array(
                0 => 'Inactivo',
                1 => 'Activo'
            ),
            'urlModulosConfigurados' => '/contenido/ver/tipo/grupo/contenido/',
            'booleanos' => array(
                '1' => 'Si',
                '0' => 'No'
            ),
            'autenticacion' => array(
                'estados' => array(
                    1 => 'Sin autenticaci&oacute;n',
                    2 => 'Con autenticaci&oacute;n',
                    3 => 'Ambos'
                ),
                '*' => 3
            )
        ),
        'categorias' => array(
            'visible' => array(
                '0' => 'No visible',
                '1' => 'Visible'
            )
        ),
        'estadoItem' => array(
            'estado' => array(
                'activo' => 1,
                'modificado' => 2,
                'adicionado' => 3,
                'eliminado' => 4
            )
        ),
        'sesion' => array(
            'usuario' => 'larebaja.online.callcenter.usuario',
            'formPedidoBusqueda' => 'larebaja.online.callcenter.formpedidobusqueda',
            'modelBonosAdminExport' => 'larebaja.online.callcenter.modelbonosadminexport',
            'modelMascotasAdminExport' => 'larebaja.online.callcenter.modelmascotasadminexport'
        )
    ),
    'telefarma' => array(
        'sesion' => array(
            'sectorCiudadEntrega' => 'larebaja.online.telefarma.sectorciudadentrega',
            'carroPagarForm' => 'larebaja.online.telefarma.carropagarform',
            'redireccionUbicacion' => 'larebaja.online.telefarma.redireccionubicacion',
            'productosBusquedaOrden' => 'larebaja.online.telefarma.productos.busqueda.orden',
            'productosBusquedaFiltro' => 'larebaja.online.telefarma.productos.busqueda.filtro',
            'busquedaExportar' => 'larebaja.online.telefarma.productos.busqueda.exportar',
            'usuariosExportar' => 'larebaja.online.telefarma.productos.usuarios.exportar',
            'formulaMedica' => 'larebaja.online.telefarma.compra.formulamedica',
            'reporteMedico' => 'larebaja.online.telefarma.compra.reportemedico'
        ),
        'descuento' => 10,
        'pagar' => array(
            'pasos' => array(
                'informacion' => 1,
                'confirmacion' => 2,
                1 => 'informacion',
                2 => 'confirmacion'
            ),
            'pasosDisponibles' => array(
                'informacion',
                'confirmacion'
            )
        ),
        'diasRecordatorioFormula' => array(1, 3)
    ),
    'entregaNacional' => array(
        'sesion' => array(
            'carroPagarForm' => 'larebaja.online.entreganacional.carropagarform'
        ),
        'pagar' => array(
            'pasos' => array(
                'informacion' => 1,
                'confirmacion' => 2,
                1 => 'informacion',
                2 => 'confirmacion'
            ),
            'pasosDisponibles' => array(
                'informacion',
                'confirmacion'
            )
        ),
        'domicilio' => array(
            'sinrecogida' => 1000,
            'recogida' => 2000
        )
    ),
    'contenidoInicio' => array(
        'tipos' => array(
            1 => 'Usuario no logueado',
            2 => 'Autenticado Cumplea&ntilde;os',
            3 => 'Autenticado que no ha comprado',
            4 => 'Autenticado sin listas personales',
            5 => 'Autenticado que hace tiempo no ingresa'
        ),
        'tiposContenido' => array(
            'noAutenticado' => 1,
            'cumpleanos' => 2,
            'noCompra' => 3,
            'sinLista' => 4,
            'noIngresa' => 5
        ),
        'tiempoNoIngreso' => 30, // dias
        'generos' => array(
            1 => 'Femenino',
            2 => 'Masculino',
            9 => 'Ambos'
        ),
        'ambosGeneros' => 9
    ),
    'mascotas' => array(
        'tipo' => array(
            '1' => 'Perro',
            '2' => 'Gato'
        )
    ),
    'terceros' => array(
        // 'correo' => 'alexander_javela@copservir.com',
        /*'pedidos' => array(
            'diasVisualizar' => 1,
            'tiempoRecargarPagina' => 10000
        ),*/
        'usuario' => array(
            'estado' => array(
                'activo' => 1,
                'inactivo' => 0
            ),
            'estadoNombre' => array(
                0 => 'Inactivo',
                1 => 'Activo'
            )
        ),
        'sesion' => array(
            'usuario' => 'larebaja.online.terceros.usuario',
        )
    ),
	'servientrega' => array(
			'urlWebService' => 'http://web.servientrega.com:8081/GeneracionGuias.asmx?WSDL',
			'username' => 'Testcopservir',
			'password' => 'BpSUh12jBIiWdACDozgOaQ',
			'codigoFacturacion' => 'BpSUh12jBIiWdACDozgOaQ',
			'NombreCargue' => 'COPSERVIR_SISCLINET',
			'valorMinimoSeguro' => 300,
			'porcentajeSeguro' => 0.01,
			'valorMinimoSeguroVariable' => 30000
	)
);
