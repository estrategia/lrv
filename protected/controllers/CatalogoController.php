<?php

class CatalogoController extends Controller {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            array(
                'application.filters.SessionControlFilter + categoria, buscar, relacionados, bodega, descuentos, masvendidos, masvistos, verTodosProductos',
                'isMobile' => $this->isMobile
            ),
        );
    }

    public function actionDivision($division) {

        $objCategoria = CategoriaTienda::model()->find(array(
            'order' => 't.orden',
            'condition' => 't.visible=:visible AND t.idCategoriaTienda=:division AND t.tipoDispositivo=:dispositivo',
            'params' => array(
                ':visible' => 1,
                ':division' => $division,
                ':dispositivo' => CategoriaTienda::DISPOSITIVO_ESCRITORIO
            ),
            'with' => array('listCategoriasHijas'),
        ));

        if (empty($objCategoria)) {
            throw new CHttpException(404, 'La Categoria no existe.');
            Yii::app()->end();
        }

        $this->breadcrumbs = array(
            'Inicio' => array('/'),
            $objCategoria->nombreCategoriaTienda
        );

        $modulosConfigurados = ModulosConfigurados::getModulos($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_ESCRITORIO_DIVISION, $division);

        $productos = array();
        if ($modulosConfigurados == null) {
            // buscar productos top 
            $productos = Categoria::productosDivision($division, $this->isMobile);
        }
        $this->render('d_division', array(
            'objCategoria' => $objCategoria,
            'listModulos' => $modulosConfigurados,
            'listProductos' => $productos
        ));
    }

    public function actionCategoria($categoria) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();

        $objCategoria = CategoriaTienda::model()->find(array(
            'with' => array('objCategoriaPadre', 'listCategoriasBI'),
            'condition' => 't.idCategoriaTienda=:categoria AND t.tipoDispositivo=:dispositivo',
            'params' => array(
                ':categoria' => $categoria,
                ':dispositivo' => $this->isMobile ? CategoriaTienda::DISPOSITIVO_MOVIL : CategoriaTienda::DISPOSITIVO_ESCRITORIO
            ),
        ));

        $listIdsCategoriaBI = array();

        if ($objCategoria != null) {

            if ($objCategoria->objCategoriaPadre == null) {
                $this->breadcrumbs = array(
                    'Inicio' => array('/'),
                    $objCategoria->nombreCategoriaTienda
                );
            } else {
                $this->breadcrumbs = array(
                    'Inicio' => array('/'),
                    $objCategoria->objCategoriaPadre->nombreCategoriaTienda => array('/catalogo/division/division/' . $objCategoria->objCategoriaPadre->idCategoriaTienda),
                    $objCategoria->nombreCategoriaTienda
                );
            }


            foreach ($objCategoria->listCategoriasBI as $objCategoriaBI) {
                $listIdsCategoriaBI[] = $objCategoriaBI->idCategoriaBI;
            }
        }

        if ($objCategoria == null || empty($listIdsCategoriaBI)) {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Categor&iacute;as'
            );

            try {
                Busquedas::registrarBusqueda(array(
                    'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                    'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
                    'msgBusqueda' => $objCategoria == null ? "Categoria tienda: $categoria. No existe" : "Categoria tienda: $categoria - $objCategoria->nombreCategoriaTienda",
                    'codigoCiudad' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoCiudad,
                    'codigoSector' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoSector,
                ));
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }

            if ($this->isMobile) {
                $this->render('listaProductos', array(
                    'listProductos' => array(),
                    'listCombos' => array(),
                    'msgCodigoEspecial' => array(),
                    'listCodigoEspecial' => array(),
                    'imagenBusqueda' => Yii::app()->params->busqueda['imagen']['noExito'],
                    'objSectorCiudad' => $objSectorCiudad,
                    'codigoPerfil' => $codigoPerfil,
                    'nombreBusqueda' => 'NA',
                    'objModulo' => ModulosConfigurados::getModuloFlotante($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_ESCRITORIO_CATEGORIA, $categoria)
                ));
            } else {
                $this->render('d_listaProductos', array(
                    'listCombos' => array(),
                    'msgCodigoEspecial' => array(),
                    'listCodigoEspecial' => array(),
                    'imagenBusqueda' => Yii::app()->params->busqueda['imagen']['noExito'],
                    'objSectorCiudad' => $objSectorCiudad,
                    'codigoPerfil' => $codigoPerfil,
                    'nombreBusqueda' => 'NA',
                    'dataprovider' => null
                ));
            }

            Yii::app()->end();
        }

        $formOrdenamiento = new OrdenamientoForm;
        $formFiltro = new FiltroForm;

        if ($this->isMobile) {
            $categoriaSesion = null;

            if (isset(Yii::app()->session[Yii::app()->params->sesion['productosBusquedaCategoria']])) {
                $categoriaSesion = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaCategoria']];

                if ($categoriaSesion != $categoria) {
                    $categoriaSesion = null;
                }
            }

            if ($categoriaSesion == null) {
                Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] = null;
                Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] = null;
            }

            if (isset($_POST['OrdenamientoForm'])) {
                $formOrdenamiento->attributes = $_POST['OrdenamientoForm'];
                Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] = $formOrdenamiento;

                if (Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] != null) {
                    $formFiltro = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']];
                }
            }

            if (isset($_POST['FiltroForm'])) {
                $formFiltro->attributes = $_POST['FiltroForm'];
                $formFiltro->listMarcasCheck = $formFiltro->listMarcas;
                $formFiltro->listFiltrosCheck = $formFiltro->listFiltros;
                Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] = $formFiltro;

                if (Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] != null) {
                    $formOrdenamiento = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']];
                }
            }
        } else {
            if (!isset($_GET['ajax'])) {
                Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] = null;
                Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] = null;
            }

            if (Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] != null) {
                $formFiltro = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']];
                $formFiltro->listMarcasCheck = $formFiltro->listMarcas;
                $formFiltro->listFiltrosCheck = $formFiltro->listFiltros;
            }

            if (Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] != null) {
                $formOrdenamiento = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']];
            }
        }

        Yii::app()->session[Yii::app()->params->sesion['productosBusquedaCategoria']] = $categoria;
        //Yii::log("Ordenamiento: \n" . CVarDumper::dumpAsString($formOrdenamiento), CLogger::LEVEL_INFO, 'application');
        //Yii::log("Filtro: \n" . CVarDumper::dumpAsString($formFiltro), CLogger::LEVEL_INFO, 'application');

        $parametrosProductos = array();
        $listCombos = array();

        if ($objSectorCiudad == null) {
            $parametrosProductos = array(
                'order' => 't.orden DESC',
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listFiltros'),
                'condition' => "t.activo=:activo AND t.idCategoriaBI IN (" . implode(",", $listIdsCategoriaBI) . ") AND (listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' OR listImagenes.tipoImagen IS NULL)",
                'params' => array(
                    ':activo' => 1,
                )
            );
        } else {
            $parametrosProductos = array(
                'order' => 't.orden DESC',
                'with' => array(
                    'listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listFiltros',
                    'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => "t.activo=:activo AND t.idCategoriaBI IN (" . implode(",", $listIdsCategoriaBI) . ") AND (listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' OR listImagenes.tipoImagen IS NULL) AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)",
                'params' => array(
                    ':activo' => 1,
                    ':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            );

            if (!$this->isMobile && !isset($_GET['ajax'])) {
                $query = "SELECT  MIN(listPrecios.precioUnidad) minproducto, MAX(listPrecios.precioUnidad) maxproducto, MIN(listSaldosTerceros.precioUnidad) mintercero, MAX(listSaldosTerceros.precioUnidad) maxtercero ";
                $query .= "FROM m_Producto t ";
                $query .= "LEFT OUTER JOIN t_ProductosSaldos listSaldos ON (listSaldos.codigoProducto=t.codigoProducto) ";
                $query .= "LEFT OUTER JOIN t_ProductosPrecios listPrecios ON (listPrecios.codigoProducto=t.codigoProducto)  ";
                $query .= "LEFT OUTER JOIN t_ProductosSaldosTerceros listSaldosTerceros ON (listSaldosTerceros.codigoProducto=t.codigoProducto) ";
                $query .= "WHERE (t.activo=1 AND t.idCategoriaBI IN (" . implode(",", $listIdsCategoriaBI) . ") AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)) ";
                $query .= "AND ((listSaldos.saldoUnidad>0 AND listSaldos.codigoCiudad='$objSectorCiudad->codigoCiudad' AND listSaldos.codigoSector='$objSectorCiudad->codigoSector') OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)) ";
                $query .= "AND ((listPrecios.codigoCiudad='$objSectorCiudad->codigoCiudad' AND listPrecios.codigoSector='$objSectorCiudad->codigoSector') OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)) ";
                $query .= "AND ((listSaldosTerceros.saldoUnidad>0 AND listSaldosTerceros.codigoCiudad='$objSectorCiudad->codigoCiudad' AND listSaldosTerceros.codigoSector='$objSectorCiudad->codigoSector') OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL))";
                $resultadoRango = Yii::app()->db->createCommand($query)->queryRow();
                $formFiltro->setRango($resultadoRango['minproducto'], $resultadoRango['maxproducto'], $resultadoRango['mintercero'], $resultadoRango['maxtercero']);
            }
            $fecha = new DateTime;

            $listCombos = Combo::model()->findAll(array(
                'with' => array('listComboSectorCiudad', 'listProductos' => array('condition' => 'listProductos.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ')')),
                'condition' => 't.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                'params' => array(
                    ':estado' => 1,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                    'saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            ));
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

        if ($formFiltro->nombre != null) {
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND t.descripcionProducto LIKE '%$formFiltro->nombre%'";
        }

        if ($formFiltro->listMarcasCheck != null && !empty($formFiltro->listMarcasCheck)) {
            $listMarcasCheck = array_flip($formFiltro->listMarcasCheck);
            $codigosMarcas = implode(",", $listMarcasCheck);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND t.idMarca IN ($codigosMarcas)";
        }

        if ($formFiltro->listFiltrosCheck != null && !empty($formFiltro->listFiltrosCheck)) {
            //print_r($formFiltro->listFiltrosCheck);exit();
            $listFiltrosCheck = array_flip($formFiltro->listFiltrosCheck);
            $codigosAtributos = implode(",", $listFiltrosCheck);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listFiltros.idFiltroDetalle IN ($codigosAtributos)";
        }

        if ($formFiltro->getPrecioInicio() >= 0) {
            //$parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listPrecios.precioUnidad>=" . $formFiltro->getPrecioInicio();
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND ((listPrecios.precioUnidad IS NOT NULL AND listPrecios.precioUnidad>=" . $formFiltro->getPrecioInicio() . ") OR (listSaldosTerceros.precioUnidad IS NOT NULL AND listSaldosTerceros.precioUnidad>=" . $formFiltro->getPrecioInicio() . ") )";
        }

        if ($formFiltro->getPrecioFin() > 0) {
            //$parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listPrecios.precioUnidad<=" . $formFiltro->getPrecioFin();
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND ((listPrecios.precioUnidad IS NOT NULL AND listPrecios.precioUnidad<=" . $formFiltro->getPrecioFin() . ") OR (listSaldosTerceros.precioUnidad IS NOT NULL AND listSaldosTerceros.precioUnidad<=" . $formFiltro->getPrecioFin() . ") )";
        }

        $listProductos = Producto::model()->findAll($parametrosProductos);

        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $msgCodigoEspecial = array();
        $formFiltro->listMarcas = array();
        $formFiltro->listFiltros = array();
        foreach ($listProductos as $idxProd => $objProducto) {
            if ($formFiltro->calificacion > 0 && $objProducto->getCalificacion() < $formFiltro->calificacion) {
                unset($listProductos[$idxProd]);
                continue;
            }

            if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                $msgCodigoEspecial[$objProducto->codigoEspecial] = $objProducto->objCodigoEspecial;
            }
            $formFiltro->listMarcas[$objProducto->idMarca] = $objProducto->objMarca->nombreMarca;

            foreach ($objProducto->listFiltros as $objFiltro) {
                if (!isset($formFiltro->listFiltros[$objFiltro->idFiltro])) {
                    $formFiltro->listFiltros[$objFiltro->idFiltro] = array(
                        'nombreFiltro' => $objFiltro->objFiltro->nombreFiltro,
                        'listFiltros' => array()
                    );
                }
                $formFiltro->listFiltros[$objFiltro->idFiltro]['listFiltros'][$objFiltro->idFiltroDetalle] = $objFiltro->nombreDetalle;
            }
        }

        $parametrosVista = array(
            'listCombos' => $listCombos,
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'objSectorCiudad' => $objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
            'nombreBusqueda' => $objCategoria->nombreCategoriaTienda,
        );

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];
            try {
                Busquedas::registrarBusqueda(array(
                    'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                    'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
                    'msgBusqueda' => $objCategoria == null ? "Categoria tienda: $categoria. No tiene productos" : "Categoria tienda: $categoria - $objCategoria->nombreCategoriaTienda",
                    'codigoCiudad' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoCiudad,
                    'codigoSector' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoSector,
                ));
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
        } else {
            $parametrosVista['formOrdenamiento'] = $formOrdenamiento;
            $parametrosVista['formFiltro'] = $formFiltro;
        }

        $parametrosVista['imagenBusqueda'] = $imagenBusqueda;

        if ($this->isMobile) {
            $parametrosVista['listProductos'] = $listProductos;
            $this->render('listaProductos', $parametrosVista);
        } else {
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
                        'pageSize' => $pagina, // elementos por página
                    ),
                ));
            }

            $parametrosVista['dataprovider'] = $dataProvider;
            $parametrosVista['objModulo'] = ModulosConfigurados::getModuloFlotante($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_ESCRITORIO_CATEGORIA, $categoria);
            $parametrosVista['listModulos'] = ModulosConfigurados::getModulos($this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil(), UbicacionModulos::UBICACION_ESCRITORIO_CATEGORIA, $categoria);
            $this->render('d_listaProductos', $parametrosVista);
        }
    }

    public function actionFiltrar() {
        if ($this->isMobile) {
            echo CJSON::encode(array("result" => "error", "response" => "Solicitud inv&aacute;lida"));
            Yii::app()->end();
        }

        $formOrdenamiento = new OrdenamientoForm;
        $formFiltro = new FiltroForm;
        Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] = null;
        Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] = null;

        if (isset($_POST['OrdenamientoForm'])) {
            $formOrdenamiento->attributes = $_POST['OrdenamientoForm'];
            Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] = $formOrdenamiento;
        }

        if (isset($_POST['FiltroForm'])) {
            $formFiltro->attributes = $_POST['FiltroForm'];
            Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] = $formFiltro;
        }

        echo CJSON::encode(array("result" => "ok", "response" => "Filtro almacenado"));
        Yii::app()->end();
    }

    public function actionFiltro() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        $listMarcas = Yii::app()->getRequest()->getPost('marcas', array());
        $listFiltros = Yii::app()->getRequest()->getPost('atributos', array());
        $tipo = Yii::app()->getRequest()->getPost('tipo');
        $categoria = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaCategoria']];

        $objCategoria = CategoriaTienda::model()->find(array(
            'with' => 'listCategoriasBI',
            'condition' => 't.idCategoriaTienda=:categoria AND t.tipoDispositivo=:dispositivo',
            'params' => array(
                ':categoria' => $categoria,
                ':dispositivo' => $this->isMobile ? CategoriaTienda::DISPOSITIVO_MOVIL : CategoriaTienda::DISPOSITIVO_ESCRITORIO
            ),
        ));

        $listIdsCategoriaBI = array();

        if ($objCategoria != null) {
            foreach ($objCategoria->listCategoriasBI as $objCategoria) {
                $listIdsCategoriaBI[] = $objCategoria->idCategoriaBI;
            }
        }

        $formFiltro = new FiltroForm;
        $formFiltro->listMarcas = $listMarcas;
        $formFiltro->listFiltros = $listFiltros;
        $parametrosProductos = array();

        if ($objSectorCiudad == null) {
            $parametrosProductos = array(
                'with' => array('objMarca', 'listFiltros'),
                'condition' => 't.activo=:activo AND t.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ')',
                'params' => array(
                    ':activo' => 1,
                )
            );
        } else {
            $parametrosProductos = array(
                'with' => array(
                    'objMarca', 'listFiltros',
                    'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => 't.activo=:activo AND t.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ') AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                'params' => array(
                    ':activo' => 1,
                    ':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            );
        }

        if (!empty($formFiltro->listMarcas)) {
            $codigosMarcas = implode(",", $formFiltro->listMarcas);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND t.idMarca IN ($codigosMarcas)";
        }

        if (!empty($formFiltro->listFiltros)) {
            $codigosFiltros = implode(",", $formFiltro->listFiltros);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listFiltros.idFiltro IN ($codigosFiltros)";
        }

        if (isset(Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']])) {
            $formFiltro->nombre = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']]->nombre;
        }

        if ($formFiltro->nombre != null) {
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND t.descripcionProducto LIKE '%$formFiltro->nombre%'";
        }

        $formFiltro->listMarcasCheck = array();
        foreach ($formFiltro->listMarcas as $idMarca => $marca) {
            $formFiltro->listMarcasCheck[$idMarca] = $idMarca;
        }

        $formFiltro->listFiltrosCheck = array();
        foreach ($formFiltro->listFiltros as $idFiltroDetalle => $idFiltro) {
            $formFiltro->listFiltrosCheck[$idFiltroDetalle] = $idFiltroDetalle;
        }

        $listProductos = Producto::model()->findAll($parametrosProductos);

        $formFiltro->listMarcas = array();
        $formFiltro->listFiltros = array();

        foreach ($listProductos as $objProducto) {
            $formFiltro->listMarcas[$objProducto->idMarca] = $objProducto->objMarca->nombreMarca;

            foreach ($objProducto->listFiltros as $objFiltro) {
                if (!isset($formFiltro->listFiltros[$objFiltro->idFiltro])) {
                    $formFiltro->listFiltros[$objFiltro->idFiltro] = array(
                        'nombreFiltro' => $objFiltro->objFiltro->nombreFiltro,
                        'listFiltros' => array()
                    );
                }
                $formFiltro->listFiltros[$objFiltro->idFiltro]['listFiltros'][$objFiltro->idFiltroDetalle] = $objFiltro->nombreDetalle;
            }
        }
        $params = array();

        $params['atributos'] = $this->renderPartial($this->isMobile ? '_formFiltroAtributos' : '_d_formFiltroAtributos', array('formFiltro' => $formFiltro), true);

        if ($tipo == 2) {
            $params['marcas'] = $this->renderPartial($this->isMobile ? '_formFiltroMarcas' : '_d_formFiltroMarcas', array('formFiltro' => $formFiltro), true);
        }

        echo CJSON::encode($params);
    }

    public function actionBuscar() {
        $term = trim(Yii::app()->request->getParam('busqueda', '')); //$term = isset($_REQUEST['busqueda']) ? $_REQUEST['busqueda'] : '';
        $categoriasBuscador = Yii::app()->request->getParam('categoriasBuscador', array()); //$categoriasBuscador = isset($_REQUEST['categoriasBuscador']) ? $_REQUEST['categoriasBuscador'] : array();

        if (is_string($categoriasBuscador)) {
            $categoriasBuscador = explode("_", $categoriasBuscador);
        }

        $codigosArray = GSASearch($term);
        $codigosStr = implode(",", $codigosArray);

        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();

        $this->breadcrumbs = array(
            'Inicio' => array('/'),
            "B&uacute;squeda $term"
        );

        if (empty($codigosArray)) {
            try {
                Busquedas::registrarBusqueda(array(
                    'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                    'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['buscador'],
                    'msgBusqueda' => "$term: busqueda GSA",
                    'codigoCiudad' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoCiudad,
                    'codigoSector' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoSector,
                ));
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            if ($this->isMobile) {
                $this->render('listaProductos', array(
                    'listProductos' => array(),
                    'listCombos' => array(),
                    'msgCodigoEspecial' => array(),
                    'listCodigoEspecial' => array(),
                    'imagenBusqueda' => Yii::app()->params->busqueda['imagen']['noExito'],
                    'objSectorCiudad' => $objSectorCiudad,
                    'codigoPerfil' => $codigoPerfil,
                    'nombreBusqueda' => $term,
                ));
            } else {
                $this->render('d_listaProductos', array(
                    'listCombos' => array(),
                    'msgCodigoEspecial' => array(),
                    'listCodigoEspecial' => array(),
                    'imagenBusqueda' => Yii::app()->params->busqueda['imagen']['noExito'],
                    'objSectorCiudad' => $objSectorCiudad,
                    'codigoPerfil' => $codigoPerfil,
                    'nombreBusqueda' => 'NA',
                    'dataprovider' => null
                ));
            }

            Yii::app()->end();
        }

        $formFiltro = new FiltroForm;
        $formOrdenamiento = new OrdenamientoForm;

        if ($this->isMobile) {
            if (isset($_POST['OrdenamientoForm'])) {
                $formOrdenamiento->attributes = $_POST['OrdenamientoForm'];
            }

            if (isset($_POST['FiltroForm'])) {
                $formFiltro->attributes = $_POST['FiltroForm'];
                $formFiltro->listCategoriasTiendaCheck = $formFiltro->listCategoriasTienda;
            }
        } else {
            if (!isset($_GET['ajax'])) {
                Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] = null;
                Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] = null;
            }

            if (Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] != null) {
                $formFiltro = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']];
                $formFiltro->listCategoriasTiendaCheck = $formFiltro->listCategoriasTienda;
                //$formFiltro->listMarcasCheck = $formFiltro->listMarcas;
                //$formFiltro->listFiltrosCheck = $formFiltro->listFiltros;
            }

            if (Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] != null) {
                $formOrdenamiento = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']];
            }
        }

        $parametrosProductos = array();
        $listCombos = array();

        if ($objSectorCiudad == null) {
            $parametrosProductos = array(
                'order' => 't.orden DESC',
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones',
                    'objCategoriaBI' => array('with' => array('listCategoriasTienda' => array('on' => 'listCategoriasTienda.tipoDispositivo=:dispositivo'))),
                ),
                'condition' => "t.activo=:activo AND t.codigoProducto IN ($codigosStr)",
                'params' => array(
                    ':activo' => 1,
                    ':dispositivo' => $this->isMobile ? CategoriaTienda::DISPOSITIVO_MOVIL : CategoriaTienda::DISPOSITIVO_ESCRITORIO
                )
            );
        } else {
            $parametrosProductos = array(
                'order' => 't.orden DESC',
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones',
                    'objCategoriaBI' => array('with' => array('listCategoriasTienda' => array('on' => 'listCategoriasTienda.tipoDispositivo=:dispositivo'))),
                    'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => "t.activo=:activo AND t.codigoProducto IN ($codigosStr) AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)",
                'params' => array(
                    ':activo' => 1,
                    ':dispositivo' => $this->isMobile ? CategoriaTienda::DISPOSITIVO_MOVIL : CategoriaTienda::DISPOSITIVO_ESCRITORIO,
                    ':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            );

            if (!$this->isMobile && !isset($_GET['ajax'])) {
                $query = "SELECT  MIN(listPrecios.precioUnidad) minproducto, MAX(listPrecios.precioUnidad) maxproducto, MIN(listSaldosTerceros.precioUnidad) mintercero, MAX(listSaldosTerceros.precioUnidad) maxtercero ";
                $query .= "FROM m_Producto t ";
                $query .= "LEFT OUTER JOIN t_ProductosSaldos listSaldos ON (listSaldos.codigoProducto=t.codigoProducto) ";
                $query .= "LEFT OUTER JOIN t_ProductosPrecios listPrecios ON (listPrecios.codigoProducto=t.codigoProducto)  ";
                $query .= "LEFT OUTER JOIN t_ProductosSaldosTerceros listSaldosTerceros ON (listSaldosTerceros.codigoProducto=t.codigoProducto) ";
                $query .= "WHERE (t.activo=1 AND t.codigoProducto IN ($codigosStr) AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)) ";
                $query .= "AND ((listSaldos.saldoUnidad>0 AND listSaldos.codigoCiudad='$objSectorCiudad->codigoCiudad' AND listSaldos.codigoSector='$objSectorCiudad->codigoSector') OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)) ";
                $query .= "AND ((listPrecios.codigoCiudad='$objSectorCiudad->codigoCiudad' AND listPrecios.codigoSector='$objSectorCiudad->codigoSector') OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)) ";
                $query .= "AND ((listSaldosTerceros.saldoUnidad>0 AND listSaldosTerceros.codigoCiudad='$objSectorCiudad->codigoCiudad' AND listSaldosTerceros.codigoSector='$objSectorCiudad->codigoSector') OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL))";
                $resultadoRango = Yii::app()->db->createCommand($query)->queryRow();
                $formFiltro->setRango($resultadoRango['minproducto'], $resultadoRango['maxproducto'], $resultadoRango['mintercero'], $resultadoRango['maxtercero']);
            }

            $fecha = new DateTime;
            $listCombos = Combo::model()->findAll(array(
                'with' => array('listComboSectorCiudad', 'listProductos' => array('condition' => "listProductos.codigoProducto IN ($codigosStr)")),
                'condition' => 't.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                'params' => array(
                    ':estado' => 1,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                    'saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            ));
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

        if (!empty($categoriasBuscador)) {
            $codigosCategorias = implode(",", $categoriasBuscador);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listCategoriasTienda.idCategoriaRaiz IN ($codigosCategorias)";
        }

        if ($formFiltro->listCategoriasTiendaCheck != null && !empty($formFiltro->listCategoriasTiendaCheck)) {
            $codigosCategorias = implode(",", $formFiltro->listCategoriasTiendaCheck);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listCategoriasTienda.idCategoriaTienda IN ($codigosCategorias)";
        }

        if ($formFiltro->getPrecioInicio() >= 0) {
            //$parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listPrecios.precioUnidad>=" . $formFiltro->getPrecioInicio();
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND ((listPrecios.precioUnidad IS NOT NULL AND listPrecios.precioUnidad>=" . $formFiltro->getPrecioInicio() . ") OR (listSaldosTerceros.precioUnidad IS NOT NULL AND listSaldosTerceros.precioUnidad>=" . $formFiltro->getPrecioInicio() . ") )";
        }

        if ($formFiltro->getPrecioFin() > 0) {
            //$parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listPrecios.precioUnidad<=" . $formFiltro->getPrecioFin();
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND ((listPrecios.precioUnidad IS NOT NULL AND listPrecios.precioUnidad<=" . $formFiltro->getPrecioFin() . ") OR (listSaldosTerceros.precioUnidad IS NOT NULL AND listSaldosTerceros.precioUnidad<=" . $formFiltro->getPrecioFin() . ") )";
        }

        $listProductos = Producto::model()->findAll($parametrosProductos);

        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $msgCodigoEspecial = array();
        $formFiltro->listCategoriasTienda = array();
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
            }
        }

        $parametrosVista = array(
            'listCombos' => $listCombos,
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'objSectorCiudad' => $objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['buscador'],
            'nombreBusqueda' => $term,
        );

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];
            if ($objSectorCiudad != null) {
                try {
                    Busquedas::registrarBusqueda(array(
                        'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                        'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['buscador'],
                        'msgBusqueda' => "$term: busqueda local",
                        'codigoCiudad' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoCiudad,
                        'codigoSector' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoSector,
                    ));
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                }
            }
        } else {
            $parametrosVista['formOrdenamiento'] = $formOrdenamiento;
            $parametrosVista['formFiltro'] = $formFiltro;
        }

        $parametrosVista['imagenBusqueda'] = $imagenBusqueda;

        if ($this->isMobile) {
            $parametrosVista['listProductos'] = $listProductos;
            $this->render('listaProductos', $parametrosVista);
        } else {
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
            $this->render('d_listaProductos', $parametrosVista);
        }
    }

    public function actionRelacionados($producto) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
        $parametrosProductos = array();
        $listCombos = array();

        if ($objSectorCiudad == null) {
            $parametrosProductos = array(
                'order' => 't.orden DESC',
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones'),
                'condition' => 't.activo=:activo AND r.codigoProducto=:producto',
                'join' => 'JOIN t_ProductosRelacionados r ON (t.codigoProducto=r.codigoRelacionado)',
                'params' => array(
                    ':activo' => 1,
                    ':producto' => $producto
                )
            );
        } else {
            $parametrosProductos = array(
                'order' => 't.orden DESC',
                'with' => array(
                    'listImagenes', 'objCodigoEspecial', 'listCalificaciones',
                    'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => 't.activo=:activo AND r.codigoProducto=:producto AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                'join' => 'JOIN t_ProductosRelacionados r ON (t.codigoProducto=r.codigoRelacionado)',
                'params' => array(
                    ':activo' => 1,
                    ':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                    ':producto' => $producto
                )
            );

            $fecha = new DateTime;

            $listCombos = Combo::model()->findAll(array(
                'with' => array('listComboSectorCiudad', 'listProductos' => array('condition' => "listProductos.codigoProducto = $producto")),
                'condition' => 't.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                'params' => array(
                    ':estado' => 1,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                    'saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            ));
        }

        $listProductos = Producto::model()->findAll($parametrosProductos);

        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $msgCodigoEspecial = array();
        foreach ($listProductos as $objProducto) {
            if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                $msgCodigoEspecial[$objProducto->codigoEspecial] = $objProducto->objCodigoEspecial;
            }
        }

        $parametrosVista = array(
            'listProductos' => $listProductos,
            'listCombos' => $listCombos,
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'objSectorCiudad' => $objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'tipoBusqueda' => -1,
            'nombreBusqueda' => "productos relacionados",
        );

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];
            try {
                Busquedas::registrarBusqueda(array(
                    'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                    'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
                    'msgBusqueda' => "Producto: $producto. No tiene productos relacionados",
                    'codigoCiudad' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoCiudad,
                    'codigoSector' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoSector,
                ));
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
        }

        $parametrosVista['imagenBusqueda'] = $imagenBusqueda;
        $this->render('listaProductos', $parametrosVista);
    }

    public function actionProducto($producto) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

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
                    'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                'params' => array(
                    ':activo' => 1,
                    ':codigo' => $producto,
                    ':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                ),
            ));
        }

        if ($objProducto == null) {
            throw new CHttpException(404, 'Producto no existe.');
        }

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
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

        if ($this->isMobile) {
            $this->render('productoDetalle', array(
                'objProducto' => $objProducto,
                'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil),
                'objSectorCiudad' => $objSectorCiudad,
                'codigoPerfil' => $codigoPerfil,
                'listaPuntoVenta' => $listaPuntoVenta,
                'objCalificacion' => $objCalificacion,
                'listRelacionados' => $listRelacionados,
                'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['buscador'],
            ));
        } else {
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
                );
            } else {
                $this->breadcrumbs = array(
                    'Inicio' => array('/'),
                    $objCategoria->objCategoriaTienda->nombreCategoriaTienda => array('/catalogo/categoria/categoria/' . $objCategoria->objCategoriaTienda->idCategoriaTienda)
                );
            }


            $objFormCalificacion = new CalificacionForm;
            $this->render('d_productoDetalle', array(
                'objProducto' => $objProducto,
                'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil),
                'objSectorCiudad' => $objSectorCiudad,
                'codigoPerfil' => $codigoPerfil,
                'listaPuntoVenta' => $listaPuntoVenta,
                'objCalificacion' => $objCalificacion,
                'listRelacionados' => $listRelacionados,
                'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['buscador'],
                'objFormCalificacion' => $objFormCalificacion
            ));
        }
    }

    public function actionBodega($producto, $ubicacion, $bodega) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            throw new CHttpException(404, 'Solicitud inválida.');
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
                'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
            ),
            'condition' => 't.ventaVirtual=:venta AND t.activo=:activo AND t.codigoProducto=:codigo  AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
            'params' => array(
                ':venta' => 1,
                ':activo' => 1,
                ':codigo' => $producto,
                ':saldo' => 0,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            ),
        ));

        if ($objProducto == null) {
            throw new CHttpException(404, 'Producto no disponible.');
        }

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
        $cantidadCarro = 0;
        $position = Yii::app()->shoppingCart->itemAt($producto);

        if ($position != null) {
            $cantidadCarro = $position->getQuantity();
        }

        if ($this->isMobile) {
            $this->render('bodegaDetalle', array(
                'objProducto' => $objProducto,
                'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil),
                'cantidadUbicacion' => $ubicacion,
                'cantidadBodega' => $bodega,
                'cantidadCarro' => $cantidadCarro
            ));
        } else {
            $this->render('d_bodegaDetalle', array(
                'objProducto' => $objProducto,
                'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil),
                'cantidadUbicacion' => $ubicacion,
                'cantidadBodega' => $bodega,
                'cantidadCarro' => $cantidadCarro
            ));
        }
    }

    public function actionCombo($combo) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $fecha = new DateTime;

        $objCombo = Combo::model()->find(array(
            'with' => array('listProductos', 'listImagenesComboGrande', 'listProductosCombo', 'listComboSectorCiudad'),
            'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
            'params' => array(
                ':combo' => $combo,
                ':estado' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':saldo' => 0,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            )
        ));

        if ($objCombo == null) {
            throw new CHttpException(404, 'Combo no existe.');
        }

        if ($this->isMobile) {
            $this->render('comboDetalle', array(
                'objCombo' => $objCombo,
                'objPrecio' => new PrecioCombo($objCombo),
            ));
        } else {
            $this->render('d_comboDetalle', array(
                'objCombo' => $objCombo,
                'objPrecio' => new PrecioCombo($objCombo),
            ));
        }
    }

    public function actionAgregarProductoComparar() {
        $codigoProducto = Yii::app()->getRequest()->getPost('producto');
        $listaProductos = array();

        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $listaProductos = Yii::app()->session[Yii::app()->params->sesion['productosComparar']];

        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            $objProducto = Producto::model()->find(array(
                'with' => array('listImagenes', 'objDetalle', 'objCodigoEspecial', 'listCalificaciones' => array('with' => 'objUsuario')),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
                'params' => array(
                    ':activo' => 1,
                    ':codigo' => $codigoProducto,
                ),
            ));
        } else {
            $objProducto = Producto::model()->find(array(
                'with' => array(
                    'listImagenes',
                    'objDetalle',
                    'objCodigoEspecial',
                    'listCalificaciones' => array('with' => 'objUsuario'),
                    'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                'params' => array(
                    ':activo' => 1,
                    ':codigo' => $codigoProducto,
                    ':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                ),
            ));
        }


        $listaProductos[$codigoProducto] = $objProducto;
        Yii::app()->session[Yii::app()->params->sesion['productosComparar']] = $listaProductos;


        echo CJSON::encode(array(
            'result' => 'ok',
            'productos' => count(Yii::app()->session[Yii::app()->params->sesion['productosComparar']]),
            'maximoComparar' => Yii::app()->params->maximoComparacion
        ));
    }

    public function actionQuitarProductoComparar() {
        $codigoProducto = Yii::app()->getRequest()->getPost('producto');
        $listaProductos = array();

        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $listaProductos = Yii::app()->session[Yii::app()->params->sesion['productosComparar']];


        unset($listaProductos[$codigoProducto]);
        Yii::app()->session[Yii::app()->params->sesion['productosComparar']] = $listaProductos;


        echo CJSON::encode(array(
            'result' => 'ok',
            'productos' => count(Yii::app()->session[Yii::app()->params->sesion['productosComparar']]),
            'maximoComparar' => Yii::app()->params->maximoComparacion
        ));
    }

    public function actionVerProductosComparar() {
        $listaProductos = array();
        if (isset(Yii::app()->session[Yii::app()->params->sesion['productosComparar']]))
            $listaProductos = Yii::app()->session[Yii::app()->params->sesion['productosComparar']];



        echo $this->renderPartial('d_comparacionProductos', array(
            'listaProductos' => $listaProductos
                ), true, false);
    }

    public function actionSubtotalUnidad() {
        $codigoProducto = Yii::app()->getRequest()->getPost('codigo');
        $cantidad = Yii::app()->getRequest()->getPost('cantidad');

        if ($codigoProducto == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta producto'));
            Yii::app()->end();
        }

        if ($cantidad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta cantidad'));
            Yii::app()->end();
        }

        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];


        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
            Yii::app()->end();
        }

        $objProducto = Producto::model()->find(array(
            'with' => array(
                'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
            'params' => array(
                ':activo' => 1,
                ':codigo' => $codigoProducto,
                ':saldo' => 0,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            ),
        ));

        if ($objProducto == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible.'));
            Yii::app()->end();
        }

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
        $objPrecio = new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil);
        $valor = $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidad;
        $valorFormato = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $valor, Yii::app()->params->formatoMoneda['moneda']);

        echo CJSON::encode(array('result' => 'ok', 'response' => array('valor' => $valor, 'valorFormato' => $valorFormato)));
        Yii::app()->end();
    }

    public function actionSubtotalFraccion() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];


        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
            Yii::app()->end();
        }

        $codigoProducto = Yii::app()->getRequest()->getPost('codigo');
        $cantidadUnidad = Yii::app()->getRequest()->getPost('cantidadUnidad');
        $cantidadFraccion = Yii::app()->getRequest()->getPost('cantidadFraccion');

        if ($codigoProducto == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta producto'));
            Yii::app()->end();
        }

        if ($cantidadUnidad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta cantidad unidad'));
            Yii::app()->end();
        }

        if ($cantidadFraccion == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta cantidad fraccion'));
            Yii::app()->end();
        }

        $objProducto = Producto::model()->find(array(
            'with' => array(
                'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
            'params' => array(
                ':activo' => 1,
                ':codigo' => $codigoProducto,
                ':saldo' => 0,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            ),
        ));

        if ($objProducto == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible.'));
            Yii::app()->end();
        }

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
        $objPrecio = new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil);
        $valorUnidad = $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidadUnidad;
        $valorFraccion = $objPrecio->getPrecio(Precio::PRECIO_FRACCION) * $cantidadFraccion;
        $valorTotal = $valorUnidad + $valorFraccion;

        $valorUnidadFormato = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $valorUnidad, Yii::app()->params->formatoMoneda['moneda']);
        $valorFraccionFormato = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $valorFraccion, Yii::app()->params->formatoMoneda['moneda']);
        $valorTotalFormato = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $valorTotal, Yii::app()->params->formatoMoneda['moneda']);

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'valorUnidad' => $valorUnidad,
                'valorFraccion' => $valorFraccion,
                'valorTotal' => $valorTotal,
                'valorUnidadFormato' => $valorUnidadFormato,
                'valorFraccionFormato' => $valorFraccionFormato,
                'valorTotalFormato' => $valorTotalFormato,
        )));

        Yii::app()->end();
    }

    public function actionSubtotalCombo() {
        $combo = Yii::app()->getRequest()->getPost('codigo');
        $cantidad = Yii::app()->getRequest()->getPost('cantidad');

        if ($combo == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta producto'));
            Yii::app()->end();
        }

        if ($cantidad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta cantidad'));
            Yii::app()->end();
        }

        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];


        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
            Yii::app()->end();
        }

        $fecha = new DateTime;
        $objCombo = Combo::model()->find(array(
            'with' => array('listProductos', 'listProductosCombo', 'listComboSectorCiudad'),
            'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
            'params' => array(
                ':combo' => $combo,
                ':estado' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':saldo' => 0,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            )
        ));

        if ($objCombo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        $objPrecio = new PrecioCombo($objCombo);
        $valor = $objPrecio->getPrecio() * $cantidad;
        $valorFormato = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $valor, Yii::app()->params->formatoMoneda['moneda']);

        echo CJSON::encode(array('result' => 'ok', 'response' => array('valor' => $valor, 'valorFormato' => $valorFormato)));
        Yii::app()->end();
    }

    public function actionSubtotalBodega() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];


        if ($objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
            Yii::app()->end();
        }

        $codigoProducto = Yii::app()->getRequest()->getPost('codigo');
        $cantidadBodega = Yii::app()->getRequest()->getPost('bodega');
        $cantidadUbicacion = Yii::app()->getRequest()->getPost('ubicacion');

        if ($codigoProducto == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta producto'));
            Yii::app()->end();
        }

        if ($cantidadBodega == null || $cantidadUbicacion == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta cantidad'));
            Yii::app()->end();
        }

        $objProducto = Producto::model()->find(array(
            'with' => array(
                'listSaldos' => array('condition' => '(listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
            ),
            'condition' => 't.ventaVirtual=:venta AND t.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
            'params' => array(
                ':venta' => 1,
                ':activo' => 1,
                ':codigo' => $codigoProducto,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector,
            ),
        ));

        if ($objProducto == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible.'));
            Yii::app()->end();
        }

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
        $objPrecio = new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil);
        $valorBodega = $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidadBodega;
        $valorUbicacion = $objPrecio->getPrecio(Precio::PRECIO_UNIDAD) * $cantidadUbicacion;
        $valorTotal = $valorBodega + $valorUbicacion;

        $valorBodegaFormato = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $valorBodega, Yii::app()->params->formatoMoneda['moneda']);
        $valorUbicacionFormato = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $valorUbicacion, Yii::app()->params->formatoMoneda['moneda']);
        $valorTotalFormato = Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $valorTotal, Yii::app()->params->formatoMoneda['moneda']);

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'valorBodega' => $valorBodega,
                'valorUbicacion' => $valorUbicacion,
                'valorTotal' => $valorTotal,
                'valorBodegaFormato' => $valorBodegaFormato,
                'valorUbicacionFormato' => $valorUbicacionFormato,
                'valorTotalFormato' => $valorTotalFormato,
        )));

        Yii::app()->end();
    }

    public function actionCalificar() {
        if (Yii::app()->user->isGuest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Usuario no autenticado.'));
            Yii::app()->end();
        }

        if ($this->isMobile) {
            $this->calificarProductoMovil();
        } else {
            $this->calificarProductoDesktop();
        }
    }

    private function calificarProductoDesktop() {
        $codigoProducto = Yii::app()->getRequest()->getPost('codigo');


        if ($codigoProducto == null || empty($codigoProducto)) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta producto a calificar.'));
            Yii::app()->end();
        }


        $model = new CalificacionForm();
        $model->attributes = $_POST['CalificacionForm'];
        if (!$model->validate()) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        } else {
            $comentario = $model->comentario;
            $titulo = $model->titulo;
        }

        $fecha = new DateTime();
        $fecha->modify("-1 day");

        try {
            $objCalificacion = ProductosCalificaciones::model()->find(array(
                'condition' => 'codigoProducto=:producto AND identificacionUsuario=:usuario AND fecha>=:fecha',
                'params' => array(
                    ':producto' => $codigoProducto,
                    ':usuario' => Yii::app()->user->name,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ),
            ));

            if ($objCalificacion !== null) {
                echo CJSON::encode(array('result' => 'error', 'response' => "Tu calificación es $objCalificacion->calificacion. Puedes volver a calificar dentro de " . $objCalificacion->getDiferencia()->format('%h horas y %i minutos')));
                Yii::app()->end();
            }

            $objCalificacion = new ProductosCalificaciones;
            $objCalificacion->attributes = $_POST['CalificacionForm'];
            $objCalificacion->codigoProducto = $codigoProducto;
            $objCalificacion->identificacionUsuario = Yii::app()->user->name;
            //$fechaCalificacion = new DateTime();
            $objCalificacion->aprobado = 0;

            if ($objCalificacion->save()) {
                //$objCalificacion->refresh();
                echo CJSON::encode(array('result' => 'ok', 'response' => 'Gracias por tu comentario'));
                Yii::app()->end();
            } else {
                echo CJSON::encode(array('result' => 'error', 'response' => 'Error al guardar calificación. ' . $objCalificacion->validateErrorsResponse()));
                Yii::app()->end();
            }
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            echo CJSON::encode(array('result' => 'error', 'response' => 'Error: ' . $exc->getMessage()));
            Yii::app()->end();
        }
    }

    private function calificarProductoMovil() {
        $codigoProducto = Yii::app()->getRequest()->getPost('codigo');
        $titulo = Yii::app()->getRequest()->getPost('titulo');

        $comentario = Yii::app()->getRequest()->getPost('comentario');
        $calificacion = Yii::app()->getRequest()->getPost('calificacion');

        if ($codigoProducto == null || empty($codigoProducto)) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta producto a calificar.'));
            Yii::app()->end();
        }

        if ($titulo == null || empty($titulo)) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Título no puede estar vacío.'));
            Yii::app()->end();
        }
        if ($comentario == null || empty($comentario)) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Comentario no puede estar vacío.'));
            Yii::app()->end();
        }

        if ($calificacion == null || empty($calificacion) || $calificacion == 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Por favor selecciona el número de estrellas con el que quieres calificar este producto.'));
            Yii::app()->end();
        }

        $fecha = new DateTime();
        $fecha->modify("-1 day");

        try {
            $objCalificacion = ProductosCalificaciones::model()->find(array(
                'condition' => 'codigoProducto=:producto AND identificacionUsuario=:usuario AND fecha>=:fecha',
                'params' => array(
                    ':producto' => $codigoProducto,
                    ':usuario' => Yii::app()->user->name,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ),
            ));

            if ($objCalificacion !== null) {
                echo CJSON::encode(array('result' => 'error', 'response' => "Tu calificación es $objCalificacion->calificacion. Puedes volver a calificar dentro de " . $objCalificacion->getDiferencia()->format('%h horas y %i minutos')));
                Yii::app()->end();
            }

            $objCalificacion = new ProductosCalificaciones;
            $objCalificacion->codigoProducto = $codigoProducto;
            $objCalificacion->identificacionUsuario = Yii::app()->user->name;
            $objCalificacion->calificacion = $calificacion;
            $objCalificacion->titulo = $titulo;
            $objCalificacion->comentario = $comentario;

            //$fechaCalificacion = new DateTime();
            $objCalificacion->aprobado = 0;

            if ($objCalificacion->save()) {
                //$objCalificacion->refresh();
                echo CJSON::encode(array('result' => 'ok', 'response' => 'Gracias por tu comentario'));
                Yii::app()->end();
            } else {
                echo CJSON::encode(array('result' => 'error', 'response' => 'Error al guardar calificación. ' . $objCalificacion->validateErrorsResponse()));
                Yii::app()->end();
            }
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            echo CJSON::encode(array('result' => 'error', 'response' => 'Error: ' . $exc->getMessage()));
            Yii::app()->end();
        }
    }

    public function actionDescuentos() {
        $sql = "SELECT idCategoriaBI FROM t_ComprasUsuariosCategorias";
        $fecha = new DateTime;

        if (!Yii::app()->user->isGuest) {
            $sql .= " WHERE identificacionUsuario='" . Yii::app()->user->name . "'";
        }

        $listIdsCategoriaBI = Yii::app()->db->createCommand($sql)->queryColumn();

        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            $this->redirect($this->createUrl('/sitio/ubicacion'));
        }

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
        $listCombos = array();

        $criteria = new CDbCriteria;
        $criteria->order = "t.orden DESC LIMIT 50";
        $criteria->with = array('listImagenes', 'objCodigoEspecial'/* , 'listCalificaciones' */);
        $criteria->with['listSaldos'] = array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)');
        $criteria->with['listPrecios'] = array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)');
        $criteria->with['listSaldosTerceros'] = array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)');
        $criteria->condition = "t.activo=:activo AND t.idUnidadNegocioBI NOT IN (" . implode(",", Yii::app()->params->calificacion['categoriasNoCalificacion']) . ") AND listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)";
        $criteria->params = array(':activo' => 1);
        $criteria->params[':saldo'] = 0;
        $criteria->params[':ciudad'] = $objSectorCiudad->codigoCiudad;
        $criteria->params[':sector'] = $objSectorCiudad->codigoSector;

        if (!empty($listIdsCategoriaBI)) {
            $criteria->condition .= ' AND t.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ')';
        }

        if (!empty($listIdsCategoriaBI)) {
            $listCombos = Combo::model()->findAll(array(
                'with' => array('listComboSectorCiudad', 'listProductos' => array('condition' => 'listProductos.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ')')),
                'condition' => 't.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                'params' => array(
                    ':estado' => 1,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                    'saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            ));
        }

        $swobligaCli = "";
        if (esClienteFiel()) {
            $swobligaCli = " AND (swobligaCli=0 || swobligaCli=2)";
        } else {
            $swobligaCli = " AND swobligaCli=0";
        }

        $criteria->condition .= " AND t.codigoProducto IN (
                SELECT DISTINCT bp.codigoProducto
                FROM t_Beneficios t
                JOIN t_BeneficiosPuntosVenta bpdv ON t.idBeneficio=bpdv.idBeneficio
                JOIN t_BeneficiosProductos bp ON t.idBeneficio=bp.idBeneficio
                JOIN m_PuntoVenta pdv ON pdv.idComercial=bpdv.idComercial
                WHERE t.fechaIni<=:fecha AND t.fechaFin>=:fecha AND pdv.codigoCiudad=:ciudad AND t.tipo IN (" . implode(",", Yii::app()->params->beneficios['lrv']) . ") $swobligaCli )";
        $criteria->params[':fecha'] = $fecha->format('Y-m-d');

        $listProductos = Producto::model()->findAll($criteria);

        if (empty($listProductos) && !empty($listIdsCategoriaBI)) {
            $criteria->condition = str_replace(' AND t.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ')', "", $criteria->condition);
            $listProductos = Producto::model()->findAll($criteria);
        }

        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $msgCodigoEspecial = array();
        foreach ($listProductos as $objProducto) {
            if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                $msgCodigoEspecial[$objProducto->codigoEspecial] = $objProducto->objCodigoEspecial;
            }
        }

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];
            try {
                Busquedas::registrarBusqueda(array(
                    'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                    'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
                    'msgBusqueda' => "Descuentos",
                    'codigoCiudad' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoCiudad,
                    'codigoSector' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoSector,
                ));
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
        }

        $parametrosVista = array(
            'listProductos' => $listProductos,
            'listCombos' => $listCombos,
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'objSectorCiudad' => $objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
            'nombreBusqueda' => "Descuentos",
        );

        $parametrosVista['imagenBusqueda'] = $imagenBusqueda;

        if ($this->isMobile) {
            $this->render('listaProductos', $parametrosVista);
        } else {
            $pagina = 30;
            if (isset($_GET['pageSize']) and is_numeric($_GET['pageSize'])) {
                $pagina = $_GET['pageSize'];
            }

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

            $parametrosVista['dataprovider'] = $dataProvider;
            $parametrosVista['cantidadItems'] = 5;
            $this->render('d_listaProductos', $parametrosVista);
        }
    }

    public function actionMasvendidos() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            $this->redirect($this->createUrl('/sitio/ubicacion'));
        }

        $limite = 50;
        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
        $listCombos = array();

        $criteria = array();
        $criteria['with'] = array('listImagenes', 'objCodigoEspecial'/* , 'listCalificaciones' */);
        $criteria['with']['listSaldos'] = array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)');
        $criteria['with']['listPrecios'] = array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)');
        $criteria['with']['listSaldosTerceros'] = array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)');
        $criteria['condition'] = "t.activo=:activo AND t.idUnidadNegocioBI NOT IN (" . implode(",", Yii::app()->params->calificacion['categoriasNoCalificacion']) . ") AND listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)";
        $criteria['params'] = array(':activo' => 1);
        $criteria['params'][':saldo'] = 0;
        $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
        $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;

        $criteria1 = $criteria;

        if (Yii::app()->user->isGuest) {
            $criteria1['join'] = "JOIN t_ProductosVendidos vendidos ON (vendidos.codigoProducto=t.codigoProducto) ";
            $criteria1['order'] = "vendidos.cantidad DESC, t.orden DESC LIMIT $limite";
        } else {
            $criteria1['join'] = "JOIN t_ProductosVendidos vendidos ON (vendidos.codigoProducto=t.codigoProducto) "
                    . "JOIN t_ComprasUsuariosCategorias comprascateg ON (comprascateg.idCategoriaBI=vendidos.idCategoriaBI)";
            $criteria1['condition'] .= " AND comprascateg.identificacionUsuario='" . Yii::app()->user->name . "'";
            $criteria1['order'] = "comprascateg.cantidad DESC, vendidos.cantidad DESC, t.orden DESC LIMIT $limite";
        }

        $listProductos = Producto::model()->findAll($criteria1);

        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $msgCodigoEspecial = array();
        foreach ($listProductos as $objProducto) {
            if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                $msgCodigoEspecial[$objProducto->codigoEspecial] = $objProducto->objCodigoEspecial;
            }
        }

        $limiteRestante = $limite - count($listProductos);
        $listProductos2 = array();

        if ($limiteRestante > 0) {
            $listCodigosResultado = array();

            foreach ($listProductos as $objProducto) {
                $listCodigosResultado[] = $objProducto->codigoProducto;
            }

            $criteria2 = $criteria;

            if (!empty($listCodigosResultado)) {
                $criteria2['condition'] .= ' AND t.codigoProducto NOT IN (' . implode(",", $listCodigosResultado) . ')';
            }

            $criteria2['join'] = "JOIN t_ProductosVendidos vendidos ON (vendidos.codigoProducto=t.codigoProducto) ";
            $criteria2['order'] = "vendidos.cantidad DESC, t.orden DESC LIMIT $limiteRestante";
            $listProductos2 = Producto::model()->findAll($criteria2);
        }

        if (!empty($listProductos2)) {
            $listProductos = array_merge($listProductos, $listProductos2);
        }

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];
            try {
                Busquedas::registrarBusqueda(array(
                    'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                    'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
                    'msgBusqueda' => "Mas Vendidos",
                    'codigoCiudad' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoCiudad,
                    'codigoSector' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoSector,
                ));
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
        }

        $parametrosVista = array(
            'listProductos' => $listProductos,
            'listCombos' => $listCombos,
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'objSectorCiudad' => $objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
            'nombreBusqueda' => "M&aacute;s vendidos",
        );

        $parametrosVista['imagenBusqueda'] = $imagenBusqueda;

        if ($this->isMobile) {
            $this->render('listaProductos', $parametrosVista);
        } else {
            $pagina = 30;
            if (isset($_GET['pageSize']) and is_numeric($_GET['pageSize'])) {
                $pagina = $_GET['pageSize'];
            }

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

            $parametrosVista['dataprovider'] = $dataProvider;
            $parametrosVista['cantidadItems'] = 5;
            $this->render('d_listaProductos', $parametrosVista);
        }
    }

    public function actionMasvistos() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            $this->redirect($this->createUrl('/sitio/ubicacion'));
        }

        $limite = 50;
        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();
        $listCombos = array();

        $criteria = array();
        $criteria['with'] = array('listImagenes', 'objCodigoEspecial'/* , 'listCalificaciones' */);
        $criteria['with']['listSaldos'] = array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)');
        $criteria['with']['listPrecios'] = array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)');
        $criteria['with']['listSaldosTerceros'] = array('condition' => '(listSaldosTerceros.saldoUnidad>:saldo AND listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)');
        $criteria['condition'] = "t.activo=:activo AND t.idUnidadNegocioBI NOT IN (" . implode(",", Yii::app()->params->calificacion['categoriasNoCalificacion']) . ") AND listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)";
        $criteria['params'] = array(':activo' => 1);
        $criteria['params'][':saldo'] = 0;
        $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
        $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;

        $criteria1 = $criteria;

        if (Yii::app()->user->isGuest) {
            $criteria1['join'] = "JOIN t_ProductosVistos vistos ON (vistos.codigoProducto=t.codigoProducto) ";
            $criteria1['order'] = "vistos.cantidad DESC, t.orden DESC LIMIT $limite";
        } else {
            $criteria1['join'] = "JOIN t_ProductosVistos vistos ON (vistos.codigoProducto=t.codigoProducto) "
                    . "JOIN t_ComprasUsuariosCategorias comprascateg ON (comprascateg.idCategoriaBI=vistos.idCategoriaBI)";
            $criteria1['condition'] .= " AND comprascateg.identificacionUsuario='" . Yii::app()->user->name . "'";
            $criteria1['order'] = "comprascateg.cantidad DESC, vistos.cantidad DESC, t.orden DESC LIMIT $limite";
        }

        $listProductos = Producto::model()->findAll($criteria1);

        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $msgCodigoEspecial = array();
        foreach ($listProductos as $objProducto) {
            if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                $msgCodigoEspecial[$objProducto->codigoEspecial] = $objProducto->objCodigoEspecial;
            }
        }

        $limiteRestante = $limite - count($listProductos);
        $listProductos2 = array();

        if ($limiteRestante > 0) {
            $listCodigosResultado = array();

            foreach ($listProductos as $objProducto) {
                $listCodigosResultado[] = $objProducto->codigoProducto;
            }

            $criteria2 = $criteria;

            if (!empty($listCodigosResultado)) {
                $criteria2['condition'] .= ' AND t.codigoProducto NOT IN (' . implode(",", $listCodigosResultado) . ')';
            }

            $criteria2['join'] = "JOIN t_ProductosVistos vistos ON (vistos.codigoProducto=t.codigoProducto) ";
            $criteria2['order'] = "vistos.cantidad DESC, t.orden DESC LIMIT $limiteRestante";
            $listProductos2 = Producto::model()->findAll($criteria2);
        }

        if (!empty($listProductos2)) {
            $listProductos = array_merge($listProductos, $listProductos2);
        }

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];
            try {
                Busquedas::registrarBusqueda(array(
                    'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                    'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
                    'msgBusqueda' => "Mas Vistos",
                    'codigoCiudad' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoCiudad,
                    'codigoSector' => $objSectorCiudad == null ? null : $objSectorCiudad->codigoSector,
                ));
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
        }

        $parametrosVista = array(
            'listCombos' => $listCombos,
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'objSectorCiudad' => $objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
            'nombreBusqueda' => "M&aacute;s vistos",
        );

        $parametrosVista['imagenBusqueda'] = $imagenBusqueda;

        if ($this->isMobile) {
            $parametrosVista['listProductos'] = $listProductos;
            $this->render('listaProductos', $parametrosVista);
        } else {
            $pagina = 30;
            if (isset($_GET['pageSize']) and is_numeric($_GET['pageSize'])) {
                $pagina = $_GET['pageSize'];
            }

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

            $parametrosVista['dataprovider'] = $dataProvider;
            $parametrosVista['cantidadItems'] = 5;
            $this->render('d_listaProductos', $parametrosVista);
        }
    }

    public function actionPromocion($nombre, $elemento) {
        if (!$this->isMobile) {
            $this->actionIndex();
        }

        $promocion = $nombre;
        if (!isset(Yii::app()->params->promociones[$promocion]) && !isset(Yii::app()->params->promociones[$promocion][$elemento])) {
            throw new CHttpException(404, 'Promoci&oacute;n no existe.');
        }

        $fActual = new DateTime;
        $fInicio = DateTime::createFromFormat('Y-m-d H:i:s', Yii::app()->params->promociones[$promocion]['fechaInicio']);
        $fFin = DateTime::createFromFormat('Y-m-d H:i:s', Yii::app()->params->promociones[$promocion]['fechaFin']);

        $diffInicio = $fInicio->diff($fActual);
        $diffFin = $fActual->diff($fFin);

        if ($diffInicio->invert == 1 || $diffFin->invert == 1) {
            throw new CHttpException(404, 'Promoci&oacute;n no existe.');
        }

        $listaCodigos = Yii::app()->params->promociones[$promocion]['elementos'][$elemento]['productos'];
        $listProductos = array();

        if (!empty($listaCodigos)) {
            $criteria = array(
                'order' => 't.orden DESC',
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones'),
                'condition' => "t.activo=:activo AND (listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' OR listImagenes.tipoImagen IS NULL)",
                'params' => array(
                    ':activo' => 1,
                )
            );

            $criteria['condition'] .= " AND t.codigoProducto IN (" . implode(",", $listaCodigos) . ")";
            $criteria['with']['listSaldos'] = array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector OR listSaldos.idProductoSaldos IS NULL');
            $criteria['with']['listPrecios'] = array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector OR listPrecios.idProductoPrecios IS NULL');
            $criteria['with']['listSaldosTerceros'] = array('on' => 'listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector OR listSaldosTerceros.idProductoSaldo IS NULL');
            $criteria['params'][':ciudad'] = $this->objSectorCiudad->codigoCiudad;
            $criteria['params'][':sector'] = $this->objSectorCiudad->codigoSector;

            $listProductos = Producto::model()->findAll($criteria);
        }

        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $msgCodigoEspecial = array();
        foreach ($listProductos as $objProducto) {
            if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                $msgCodigoEspecial[$objProducto->codigoEspecial] = $objProducto->objCodigoEspecial;
            }
        }

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];
            try {
                Busquedas::registrarBusqueda(array(
                    'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                    'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
                    'msgBusqueda' => "Mas Vistos",
                    'codigoCiudad' => $this->objSectorCiudad == null ? null : $this->objSectorCiudad->codigoCiudad,
                    'codigoSector' => $this->objSectorCiudad == null ? null : $this->objSectorCiudad->codigoSector,
                ));
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
        }

        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();

        $parametrosVista = array(
            'listProductos' => $listProductos,
            'listCombos' => array(),
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'objSectorCiudad' => $this->objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
            'nombreBusqueda' => Yii::app()->params->promociones[$promocion]['nombre'],
        );

        $parametrosVista['imagenBusqueda'] = $imagenBusqueda;
        $this->render('listaProductos', $parametrosVista);
    }

    public function actionVerTodosProductos($opcion = null, $item = null) {
        $listaProductos = array();

        if ($opcion == 'relacionados') {
            $relacionados = ProductosRelacionados::model()->findAll(array(
                'with' => 'objProductoRelacionado',
                'order' => 't.orden',
                'condition' => 't.codigoProducto=:producto',
                'params' => array(
                    ':producto' => $item
                )
            ));
            foreach ($relacionados as $objProducto) {
                $listaProductos[] = $objProducto->objProductoRelacionado;
            }
        } else if ($opcion == 'lista') {
            $modulo = ModulosConfigurados::getModulo($item);
            $listaProductos = $modulo->getListaProductos($this->objSectorCiudad);
        } else {
            // error;
            if ($objProducto == null) {
                throw new CHttpException(404, 'Opción no encontrada.');
            }
        }

        if ($listaProductos == null) {
            throw new CHttpException(404, 'No existen productos.');
        }
        $this->render('d_gridProductos', array(
            'listaProductos' => $listaProductos
        ));
    }
}
