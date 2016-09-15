<?php

class CotizarController extends ControllerVitalcall {
	
	public function actionUbicacion() {
		$this->layout = "simple";
		
		$redirect = Yii::app()->request->urlReferrer == null ? $this->createUrl('/callcenter/vitalcall/cliente') : Yii::app()->request->urlReferrer;
	
		$this->render('ubicacion', array(
				'objSectorCiudad' => $this->objSectorCiudad,
				'urlRedirect' => $redirect
		));
	}
	
	public function actionUbicacionSeleccion() {
		$ciudad = null;
		$sector = null;
	
		if (isset($_REQUEST['ciudad'])) {
			$ciudad = trim($_REQUEST['ciudad']);
		}
	
		if (isset($_REQUEST['sector'])) {
			$sector = trim($_REQUEST['sector']);
		}
	
		if (empty_lrv($ciudad) || empty_lrv($sector)) {
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => 'Seleccionar ubicaci&oacute;n'
			));
			Yii::app()->end();
		}
	
		$objSectorCiudad = SectorCiudad::model()->find(array(
				'with' => array('objCiudad', 'objSector'),
				'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
				'params' => array(
						':ciudad' => $ciudad,
						':sector' => $sector,
						':estado' => 1,
				)
		));
	
		if ($objSectorCiudad == null) {
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => 'Ubicaci&oacute;n no existente ' . ' -- ciudad: ' . CVarDumper::dumpAsString($ciudad) . ' --' . ' -- sector: ' . CVarDumper::dumpAsString($sector) . ' --'
			));
			Yii::app()->end();
		}
	
		$objSectorCiudadOld = null;
	
		if (!empty($this->objSectorCiudad))
			$objSectorCiudadOld = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['sectorCiudadEntrega']];
	
			$objSectorCiudad->objCiudad->getDomicilio();
			Yii::app()->session[Yii::app()->params->vitalCall['sesion']['sectorCiudadEntrega']] = $objSectorCiudad;
	
			if ($objSectorCiudadOld != null && ($objSectorCiudadOld->codigoCiudad != $objSectorCiudad->codigoCiudad || $objSectorCiudadOld->codigoSector != $objSectorCiudad->codigoSector)) {
				//Yii::app()->shoppingCart->clear();
				//Yii::app()->session[Yii::app()->params->vitalCall['sesion']['carroPagarForm']] = null;
			}
	
			//Yii::app()->shoppingCart->CalculateShipping();
	
			$objHorarioSecCiud = HorariosCiudadSector::model()->find(array(
					'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector',
					'params' => array(
							':ciudad' => $objSectorCiudad->codigoCiudad,
							':sector' => $objSectorCiudad->codigoSector,
					)
			));
	
			$redirect = $this->createUrl('/callcenter/vitalcall/cotizar/buscar');
	
			//se debe de eliminar url de sesion
			echo CJSON::encode(array(
					'result' => 'ok',
					'response' => 'Se ha cambiado la ciudad de entrega por: ' . $objSectorCiudad->objCiudad->nombreCiudad,
					'urlAnterior' => $redirect));
			Yii::app()->end();
	}
	
	public function actionBuscar() {
		$this->layout = "simple";
		
		$term = trim(Yii::app()->request->getParam('busqueda', ''));
		
		if(empty($term)){
			$this->render('buscar');
		}else{
			$this->buscar($term);
		}
	}
	
	public function buscar($term){
		$sesion = Yii::app()->getSession()->getSessionId();
		$codigosArray = GSASearch($term, $sesion);
		$objSectorCiudad = $this->objSectorCiudad;
		$codigoPerfil = Yii::app()->params->perfil['defecto'];
		
		if (empty($codigosArray)) {
				$this->render('listaProductos', array(
						'msgCodigoEspecial' => array(),
						'listCodigoEspecial' => array(),
						'imagenBusqueda' => Yii::app()->params->busqueda['imagen']['noExito'],
						'objSectorCiudad' => $objSectorCiudad,
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
				Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaOrden']] = null;
				Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaFiltro']] = null;
			}
			
			if (Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaFiltro']] != null) {
				$formFiltro = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaFiltro']];
				$formFiltro->listCategoriasTiendaCheck = $formFiltro->listCategoriasTienda;
			}
		
			if (Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaOrden']] != null) {
				$formOrdenamiento = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaOrden']];
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
							'listSaldos' => array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'),
							'listPrecios' => array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector'),
							'listSaldosTerceros' => array('on' => 'listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector')
					),
					'condition' => "t.activo=:activo AND (listSaldos.saldoUnidad>:saldo OR listSaldos.saldoFraccion>:saldo OR listSaldosTerceros.saldoUnidad>:saldo)",
					'params' => array(
							':tipoImagen' => YII::app()->params->producto['tipoImagen']['mini'],
							':activo' => 1,
							':dispositivo' => CategoriaTienda::DISPOSITIVO_ESCRITORIO,
							':saldo' => 0,
							':ciudad' => $objSectorCiudad->codigoCiudad,
							':sector' => $objSectorCiudad->codigoSector
					)
			);
			$parametrosProductos['join'] = "JOIN t_relevancia_temp_$sesion rel ON t.codigoProducto  = rel.codigoProducto ";
		
			if (!isset($_GET['ajax'])) {
				$query = "SELECT  MIN(listPrecios.precioUnidad) minproducto, MAX(listPrecios.precioUnidad) maxproducto, MIN(listSaldosTerceros.precioUnidad) mintercero, MAX(listSaldosTerceros.precioUnidad) maxtercero ";
				$query .= "FROM m_Producto t ";
				$query .= "LEFT OUTER JOIN t_ProductosSaldos listSaldos ON (listSaldos.codigoProducto=t.codigoProducto) AND listSaldos.codigoCiudad='$objSectorCiudad->codigoCiudad' AND listSaldos.codigoSector='$objSectorCiudad->codigoSector'";
				$query .= "LEFT OUTER JOIN t_ProductosPrecios listPrecios ON (listPrecios.codigoProducto=t.codigoProducto) AND listPrecios.codigoCiudad='$objSectorCiudad->codigoCiudad' AND listPrecios.codigoSector='$objSectorCiudad->codigoSector' ";
				$query .= "LEFT OUTER JOIN t_ProductosSaldosTerceros listSaldosTerceros ON (listSaldosTerceros.codigoProducto=t.codigoProducto) AND listSaldosTerceros.codigoCiudad='$objSectorCiudad->codigoCiudad' AND listSaldosTerceros.codigoSector='$objSectorCiudad->codigoSector'";
				$query .= "WHERE t.activo=1 AND t.codigoProducto IN ($codigosStr) AND (listSaldos.saldoUnidad > 0 OR listSaldosTerceros.saldoUnidad > 0) ";
				
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
				'objSectorCiudad' => $objSectorCiudad,
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
		
			$pagina = 24;
			if (isset($_GET['pageSize']) and is_numeric($_GET['pageSize'])) {
				$pagina = $_GET['pageSize'];
			}
		
			$dataProvider = null;
		
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
		
			$parametrosVista['dataprovider'] = $dataProvider;
			$this->render('listaProductos', $parametrosVista);
	
	}
	
	public function actionFiltrar() {
	
		$formOrdenamiento = new OrdenamientoForm;
		$formFiltro = new FiltroForm;
		//Yii::log("Filtrar:Filtro0\n" . CVarDumper::dumpAsString(Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']]), CLogger::LEVEL_INFO, 'application');
	
		if (isset($_POST['OrdenamientoForm'])) {
			Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaOrden']] = null;
			$formOrdenamiento->attributes = $_POST['OrdenamientoForm'];
			Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaOrden']] = $formOrdenamiento;
		}
	
		if (isset($_POST['FiltroForm'])) {
			Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaFiltro']] = null;
			$formFiltro->attributes = $_POST['FiltroForm'];
			Yii::app()->session[Yii::app()->params->vitalCall['sesion']['productosBusquedaFiltro']] = $formFiltro;
		}
	
		//Yii::log("Filtrar:Filtro1\n" . CVarDumper::dumpAsString($formFiltro), CLogger::LEVEL_INFO, 'application');
	
		echo CJSON::encode(array("result" => "ok", "response" => "Filtro almacenado"));
		Yii::app()->end();
	}
	
	
	
	

}