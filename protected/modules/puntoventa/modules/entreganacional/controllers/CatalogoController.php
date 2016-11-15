<?php

class CatalogoController extends ControllerEntregaNacional {

	public function filters() {
		return array(
				//'access',
				'login + buscar, producto, bodega',
				//'loginajax + direccionActualizar',
		);
	}
	
	public function filterLogin($filter) {
		if (Yii::app()->controller->module->user->isGuest) {
			$this->redirect(Yii::app()->controller->module->user->loginUrl);
		}
		$filter->run();
	}

    public function actionBuscar() {
    	$this->active = "buscar";
        $term = trim(Yii::app()->request->getParam('busqueda', ''));

        if (empty($term)) {
            $this->render('buscar');
        } else {
            $this->buscar($term);
        }
    }

    public function buscar($term) {
    	$sesion = Yii::app()->getSession()->getSessionId();
        $codigosArray = GSASearch($term, $sesion);
        $objSectorCiudadOrigen = $this->objCiudadSectorOrigen;
        $codigoPerfil = Yii::app()->params->perfil['defecto'];

        if (empty($codigosArray)) {
            $this->render('listaProductos', array(
                'msgCodigoEspecial' => array(),
                'listCodigoEspecial' => array(),
                'imagenBusqueda' => Yii::app()->params->busqueda['imagen']['noExito'],
                'objSectorCiudad' => $this->objCiudadSectorDestino,
                'codigoPerfil' => $codigoPerfil,
                'nombreBusqueda' => 'NA',
                'dataprovider' => null
            ));
            Yii::app()->end();
        }

        $codigosProductosArray = array();
        foreach ($codigosArray as $key => $codigos) {
            $codigosProductosArray[] = $key;
        }
        $codigosStr = implode(",", $codigosProductosArray);

        $formFiltro = new FiltroForm;
        $formOrdenamiento = new OrdenamientoForm;

	
        if (!isset($_GET['ajax'])) {
            Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaOrden']] = null;
            Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaFiltro']] = null;
        }

        if (Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaFiltro']] != null) {
            $formFiltro = Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaFiltro']];
            $formFiltro->listCategoriasTiendaCheck = $formFiltro->listCategoriasTienda;
        }

        if (Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaOrden']] != null) {
            $formOrdenamiento = Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaOrden']];
        }

        $parametrosProductos = array();

        $parametrosProductos = array(
            'select' => '*, CASE WHEN (listImagenes.idImagen <> null) THEN 1 ELSE 0 END AS tieneImagen',
            'order' => 'tieneImagen DESC, rel.relevancia DESC, t.orden DESC',
            'with' => array(
                'listImagenes' => array('on' => 'listImagenes.estadoImagen=:activo AND listImagenes.tipoImagen=:tipoImagen'),
                'objCodigoEspecial',
                'listCalificaciones',
            	'objCategoriaBI' => array('with' => array('listCategoriasTienda' => array('on' => 'listCategoriasTienda.tipoDispositivo=:dispositivo'))),
            //    'listSaldos' => array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'),
                'listPrecios' => array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector'),
                'listSaldosTerceros' => array('on' => 'listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector')
            ),
            'condition' => "t.activo=:activo AND listPrecios.codigoCiudad is not null",
            'params' => array(
                ':tipoImagen' => YII::app()->params->producto['tipoImagen']['mini'],
                ':activo' => 1,
                ':dispositivo' => CategoriaTienda::DISPOSITIVO_ESCRITORIO,
                ':ciudad' => $objSectorCiudadOrigen->codigoCiudad,
	        	':sector' => $objSectorCiudadOrigen->codigoSector,
            )
        );
        $parametrosProductos['join'] = "JOIN t_relevancia_temp_$sesion rel ON t.codigoProducto  = rel.codigoProducto ";

        if (!isset($_GET['ajax'])) {
            $query = "SELECT  MIN(listPrecios.precioUnidad) minproducto, MAX(listPrecios.precioUnidad) maxproducto, 0  mintercero, 0 maxtercero ";
            $query .= "FROM m_Producto t ";
      //      $query .= "LEFT OUTER JOIN t_ProductosSaldos listSaldos ON (listSaldos.codigoProducto=t.codigoProducto) AND listSaldos.codigoCiudad='$objSectorCiudadOrigen->codigoCiudad' AND listSaldos.codigoSector='$objSectorCiudadOrigen->codigoSector'";
            $query .= "LEFT OUTER JOIN t_ProductosPrecios listPrecios ON (listPrecios.codigoProducto=t.codigoProducto) AND listPrecios.codigoCiudad='$objSectorCiudadOrigen->codigoCiudad' AND listPrecios.codigoSector='$objSectorCiudadOrigen->codigoSector' ";
      //      $query .= "LEFT OUTER JOIN t_ProductosSaldosTerceros listSaldosTerceros ON (listSaldosTerceros.codigoProducto=t.codigoProducto) AND listSaldosTerceros.codigoCiudad='$objSectorCiudadOrigen->codigoCiudad' AND listSaldosTerceros.codigoSector='$objSectorCiudadOrigen->codigoSector'";
            $query .= "WHERE t.activo=1 AND t.codigoProducto IN ($codigosStr) ";

            $resultadoRango = Yii::app()->db->createCommand($query)->queryRow();
            $formFiltro->setRango($resultadoRango['minproducto'], $resultadoRango['maxproducto'], $resultadoRango['mintercero'], $resultadoRango['maxtercero']);
        }

        if ($formOrdenamiento->orden != null) {
            if ($formOrdenamiento->orden == 1) {
                $parametrosProductos['order'] = "((CASE WHEN listPrecios.precioUnidad IS NULL THEN 0 ELSE listPrecios.precioUnidad END) + (CASE WHEN listSaldosTerceros.precioUnidad IS NULL THEN 0 ELSE listSaldosTerceros.precioUnidad END)) ASC";
            } else if ($formOrdenamiento->orden == 2) {
                $parametrosProductos['order'] = "((CASE WHEN listPrecios.precioUnidad IS NULL THEN 0 ELSE listPrecios.precioUnidad END) + (CASE WHEN listSaldosTerceros.precioUnidad IS NULL THEN 0 ELSE listSaldosTerceros.precioUnidad END)) DESC";
            } else if ($formOrdenamiento->orden == 3) {
                $parametrosProductos['order'] = "t.descripcionProducto";
            } else if ($formOrdenamiento->orden == 4) {
                $parametrosProductos['order'] = "t.presentacionProducto";
            }
        }

        if ($formFiltro->listCategoriasTiendaCheck != null && !empty($formFiltro->listCategoriasTiendaCheck)) {
            $codigosCategorias = implode(",", $formFiltro->listCategoriasTiendaCheck);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listCategoriasTienda.idCategoriaTienda IN ($codigosCategorias)";
        }

        if ($formFiltro->getPrecioInicio() >= 0) {
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND ((listPrecios.precioUnidad IS NOT NULL AND listPrecios.precioUnidad>=" . $formFiltro->getPrecioInicio() . ") OR (listSaldosTerceros.precioUnidad IS NOT NULL AND listSaldosTerceros.precioUnidad>=" . $formFiltro->getPrecioInicio() . ") )";
        }

        if ($formFiltro->getPrecioFin() > 0) {
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND ((listPrecios.precioUnidad IS NOT NULL AND listPrecios.precioUnidad<=" . $formFiltro->getPrecioFin() . ") OR (listSaldosTerceros.precioUnidad IS NOT NULL AND listSaldosTerceros.precioUnidad<=" . $formFiltro->getPrecioFin() . ") )";
        }

        $listProductos = Producto::model()->findAll($parametrosProductos);
        $dataProvider = null;
        /****************** BUSCAR SALDOS DE PRODUCTOS ENCONTRADOS EN EL PUNTO DE VENTA DE DESTINO ************/
        
        $productosBusqueda = $resultadoFinal =  $listaProductosSaldos  = array();
        foreach ($listProductos as $position) {
        	 
        	$productosBusqueda[] = array(
        			"CODIGO_PRODUCTO" => $position->codigoProducto,
        			"ID_PRODUCTO" => $position->codigoProducto,
        			"CANTIDAD" => 1,
        			"DESCRIPCION" => $position->descripcionProducto,
        	);
        }
         
        try {
        	$client = new SoapClient(null, array(
        			'location' => Yii::app()->params->webServiceUrl['serverLRV'],
        			'uri' => "",
        			'trace' => 1
        	));

        	$puntosVenta = $client->__soapCall("LRVConsultarSaldoMovil", array(
        			'productos' => $productosBusqueda,
        			'ciudad' => $this->objPuntoVentaDestino->codigoCiudad,
        			'sector' => $this->objPuntoVentaDestino->idSectorLRV
        	));
        	 
        	$puntoVenta = null;
        	if (!empty($puntosVenta)) {
        		foreach ($puntosVenta[1] as $pdv) {
        			//   if ($pdv[1] == $pdvDestino->idComercial) {
        			$puntoVenta = $pdv;
        			break;
        			//    }
        		}
        		
        		foreach($puntoVenta[4] as $saldos){
        			$listaProductosSaldos[$saldos->CODIGO_PRODUCTO] = $saldos->SALDO;
        		}
        		
        		foreach ($listProductos as $producto){
        			if(isset($listaProductosSaldos[$producto->codigoProducto]) ){
        				if($listaProductosSaldos[$producto->codigoProducto] > 0){
        					$producto->saldosDisponibles = $listaProductosSaldos[$producto->codigoProducto];
        					$resultadoFinal[] = $producto;
        				}
        			}
        		}
        		
        		$pagina = 24;
        		if (isset($_GET['pageSize']) and is_numeric($_GET['pageSize'])) {
        			$pagina = $_GET['pageSize'];
        		}
        		
        		if (!empty($listProductos)) {
        			$dataProvider = new CArrayDataProvider($listProductos, array(
        					'id' => 'codigoProducto',
        					'sort' => array(
        							'attributes' => array(
        									'descripcionProducto'
        							),
        					),
        					'pagination' => array(
        							'pageSize' => $pagina,
        					),
        			));
        		}
        		
        	}else{
        		$this->render('listaProductos', array(
        				'msgCodigoEspecial' => array(),
        				'listCodigoEspecial' => array(),
        				'imagenBusqueda' => Yii::app()->params->busqueda['imagen']['noExito'],
        				'objSectorCiudad' => $this->objCiudadSectorDestino,
        				'codigoPerfil' => $codigoPerfil,
        				'nombreBusqueda' => 'NA',
        				'dataprovider' => null
        		));
        		Yii::app()->end();
        	}
        } catch (Exception $exc) {
        	Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
        	//  $this->listPuntosVenta = array(0 => 0, 1 => 'Error al consultar disponibilidad de productos');
        	echo CJSON::encode(array(
        			'result' => 'error',
        			'response' => 'No se puede consultar la totalidad del pedido'
        	));
        }
        
        
        /*******************************************************************************************************/
        
        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $msgCodigoEspecial = array();
        if (!isset($_GET['ajax'])) {
            $formFiltro->listCategoriasTienda = array();
        }

        foreach ($listProductos as $idxProd => $objProducto) {
            if ($formFiltro->calificacion > 0 && $objProducto->getCalificacion() < $formFiltro->calificacion) {
                unset($listProductos[$idxProd]);
                continue;
            }

            if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                $msgCodigoEspecial[$objProducto->codigoEspecial] = $objProducto->objCodigoEspecial;
            }

            if (!isset($_GET['ajax'])) {
                foreach ($objProducto->objCategoriaBI->listCategoriasTienda as $objCategoriaTienda) {
                    $formFiltro->listCategoriasTienda[$objCategoriaTienda->idCategoriaTienda] = $objCategoriaTienda->nombreCategoriaTienda;
                }
                natsort($formFiltro->listCategoriasTienda);
            }
        }

        $parametrosVista = array(
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'objSectorCiudad' => $objSectorCiudadOrigen,
            'codigoPerfil' => $codigoPerfil,
            'nombreBusqueda' => $term,
        );

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];
        } else {
            $parametrosVista['formOrdenamiento'] = $formOrdenamiento;
            $parametrosVista['formFiltro'] = $formFiltro;
        }

        $parametrosVista['imagenBusqueda'] = $imagenBusqueda;
        //Yii::log("Buscar:Filtro2\n" . CVarDumper::dumpAsString($formFiltro), CLogger::LEVEL_INFO, 'application');

        

        $parametrosVista['dataprovider'] = $dataProvider;
        $this->render('listaProductos', $parametrosVista);
    }

    public function actionFiltrar() {

        $formOrdenamiento = new OrdenamientoForm;
        $formFiltro = new FiltroForm;
        //Yii::log("Filtrar:Filtro0\n" . CVarDumper::dumpAsString(Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']]), CLogger::LEVEL_INFO, 'application');

        if (isset($_POST['OrdenamientoForm'])) {
            Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaOrden']] = null;
            $formOrdenamiento->attributes = $_POST['OrdenamientoForm'];
            Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaOrden']] = $formOrdenamiento;
        }

        if (isset($_POST['FiltroForm'])) {
            Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaFiltro']] = null;
            $formFiltro->attributes = $_POST['FiltroForm'];
            Yii::app()->session[Yii::app()->params->telefarma['sesion']['productosBusquedaFiltro']] = $formFiltro;
        }

        //Yii::log("Filtrar:Filtro1\n" . CVarDumper::dumpAsString($formFiltro), CLogger::LEVEL_INFO, 'application');

        echo CJSON::encode(array("result" => "ok", "response" => "Filtro almacenado"));
        Yii::app()->end();
    }
    
    public function actionProducto($producto) {
    //	$this->active = "buscar";
        $objSectorCiudad = $this->objCiudadSectorDestino;

        if ($objSectorCiudad == null) {
            $objProducto = Producto::model()->find(array(
                'with' => array('listImagenesGrandes', 'objDetalle', 'objCodigoEspecial', 'listCalificaciones' => array('with' => 'objUsuario')),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
                'params' => array(
                    ':activo' => 1,
                    ':codigo' => $producto,
                ),
            ));
        } else {
            $objProducto = Producto::model()->find(array(
                'with' => array(
                    'listImagenesGrandes',
                    'objDetalle',
                    'objCodigoEspecial',
                    'listCalificaciones' => array('with' => 'objUsuario'),
                  //  'listSaldos' => array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector OR listSaldos.idProductoSaldos IS NULL'),
                    'listPrecios' => array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector OR listPrecios.idProductoPrecios IS NULL'),
                    'listSaldosTerceros' => array('on' => 'listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector OR listSaldosTerceros.idProductoSaldo IS NULL')
                ),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
                'params' => array(
                    ':activo' => 1,
                    ':codigo' => $producto,
                    //':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                ),
            ));
        }

        //CVarDumper::dump($objProducto, 10, true);exit();
        //throw new CHttpException(404, 'Producto no existe.');

        if ($objProducto == null) {
            throw new CHttpException(404, 'Producto no existe.');
        }
        
        // verificar cantidad m·xima de saldos.
        
        /*********************************/

        $productosBusqueda = $listaProductosSaldos =  array();
        	$productosBusqueda[] = array(
        			"CODIGO_PRODUCTO" => $objProducto->codigoProducto,
        			"ID_PRODUCTO" => $objProducto->codigoProducto,
        			"CANTIDAD" => 1,
        			"DESCRIPCION" => $objProducto->descripcionProducto,
        	);
     
         
        try {
        	$client = new SoapClient(null, array(
        			'location' => Yii::app()->params->webServiceUrl['serverLRV'],
        			'uri' => "",
        			'trace' => 1
        	));
        
        	$puntosVenta = $client->__soapCall("LRVConsultarSaldoMovil", array(
        			'productos' => $productosBusqueda,
        			'ciudad' => $this->objPuntoVentaDestino->codigoCiudad,
        			'sector' => $this->objPuntoVentaDestino->idSectorLRV
        	));
        
        	$puntoVenta = null;
        
        	foreach ($puntosVenta[1] as $pdv) {
        		//   if ($pdv[1] == $pdvDestino->idComercial) {
        		$puntoVenta = $pdv;
        		break;
        		//    }
        	}
        	
        	foreach($puntoVenta[4] as $saldos){
        		$listaProductosSaldos[$saldos->CODIGO_PRODUCTO] = $saldos->SALDO;
        	}
        	
        	if(isset($listaProductosSaldos[$objProducto->codigoProducto]) ){
        		if($listaProductosSaldos[$objProducto->codigoProducto] > 0){
        			$objProducto->saldosDisponibles = $listaProductosSaldos[$objProducto->codigoProducto];
        		}
        	}
        		
        }catch(Exception $e){
        	
        }
        
        
        /*********************************/
        $codigoPerfil = Yii::app()->shoppingCartNationalSale->getCodigoPerfil();
        $objCalificacion = null;

        if (!Yii::app()->user->isGuest) {
            $fecha = new DateTime();
            $fecha->modify("-1 day");

            $objCalificacion = ProductosCalificaciones::model()->find(array(
                'condition' => 'codigoProducto=:producto AND identificacionUsuario=:usuario AND fecha>=:fecha',
                'params' => array(
                    ':producto' => $producto,
                    ':usuario' => Yii::app()->user->name,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ),
            ));
        }

        $listaPuntoVenta = array();

        if ($objProducto->ventaVirtual == 0 && $objSectorCiudad != null) {
            $listaPuntoVenta = PuntoVenta::model()->findAll(array(
                'with' => array('listServicios' => array('condition' => 'listServicios.idTipoServicio=:servicio')),
                'condition' => 'codigoCiudad=:ciudad AND idSectorLRV=:sector AND estado=:estado',
                'params' => array(
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                    ':estado' => 1,
                    ':servicio' => Yii::app()->params->servicioVentaControlada
                )
            ));
        }

        $listRelacionados = ProductosRelacionados::model()->findAll(array(
            'with' => 'objProductoRelacionado',
            'order' => 't.orden',
            'condition' => 't.codigoProducto=:producto',
            'params' => array(
                ':producto' => $producto
            )
        ));

        try {
            $sql = "INSERT INTO t_ProductosVistos(codigoProducto, idCategoriaBI) VALUES ($objProducto->codigoProducto,$objProducto->idCategoriaBI) ON DUPLICATE KEY UPDATE cantidad=cantidad+1";
            Yii::app()->db->createCommand($sql)->execute();
        } catch (Exception $ex) {
            
        }

   
         $objCategoria = CategoriasCategoriaTienda::model()->find(array(
                'with' => array('objCategoriaTienda'),
                'condition' => 't.idCategoriaBI=:categoriabi AND objCategoriaTienda.tipoDispositivo=:dispositivo',
                'params' => array(
                    ':categoriabi' => $objProducto->idCategoriaBI,
                    ':dispositivo' => CategoriaTienda::DISPOSITIVO_ESCRITORIO
                )
            ));

            if ($objCategoria == null) {
                $this->breadcrumbs = array(
                    'Inicio' => array('/'),
                    $objProducto->descripcionProducto
                );
            } else {
                $this->breadcrumbs = array(
                    'Inicio' => array('/'),
                    $objCategoria->objCategoriaTienda->nombreCategoriaTienda => array('/catalogo/categoria/categoria/' . $objCategoria->objCategoriaTienda->idCategoriaTienda),
                    $objProducto->descripcionProducto
                );
            }

         
            $this->render('d_productoDetalle', array(
                'objProducto' => $objProducto,
                'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil),
                'objSectorCiudad' => $objSectorCiudad,
                'codigoPerfil' => $codigoPerfil,
                'listaPuntoVenta' => $listaPuntoVenta,
                'objCalificacion' => $objCalificacion,
                'listRelacionados' => $listRelacionados,
                'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['buscador'],
            ));
       
    }
    
    
    public function actionBodega($producto, $ubicacion, $bodega) {
    	$objSectorCiudad = $this->objSectorCiudad;
    	//$this->active = "buscar";
    	if ($objSectorCiudad == null) {
    		throw new CHttpException(404, 'Solicitud inv√°lida.');
    	}
    
    	if ($ubicacion < 0) {
    		$ubicacion = 0;
    	}
    
    	if ($bodega < 0) {
    		$bodega = 0;
    	}
    
    	$objProducto = Producto::model()->find(array(
    			'with' => array(
    					'listImagenesGrandes',
    					'objDetalle',
    					'objCodigoEspecial',
    					'listCalificaciones' => array('with' => 'objUsuario'),
    				//	'listSaldos' => array( 'on' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
    					'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
    				//	'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
    			),
    			'condition' => 't.ventaVirtual=:venta AND t.activo=:activo AND t.codigoProducto=:codigo AND listPrecios.codigoCiudad IS NOT NULL',
    			'params' => array(
    					':venta' => 1,
    					':activo' => 1,
    					':codigo' => $producto,
    					':ciudad' => $objSectorCiudad->codigoCiudad,
    					':sector' => $objSectorCiudad->codigoSector,
    			),
    	));
    
    	if ($objProducto == null) {
    		throw new CHttpException(404, 'Producto de bodega no disponible.');
    	}
    
    	$codigoPerfil = Yii::app()->shoppingCartNationalSale->getCodigoPerfil();
    	$cantidadCarro = 0;
    	$position = Yii::app()->shoppingCartNationalSale->itemAt($producto);
    
    	if ($position != null) {
    		$cantidadCarro = $position->getQuantity();
    	}
    
    	$this->render('bodegaDetalle', array(
    				'objProducto' => $objProducto,
    				'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil),
    				'cantidadUbicacion' => $ubicacion,
    				'cantidadBodega' => $bodega,
    				'cantidadCarro' => $cantidadCarro
    	));
    
    }

}
