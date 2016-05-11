<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CatalogoController extends ControllerVendedor {

    public function filters() {
        return array(
            'ubicacion + buscar,categoria',
                //'login + index, infoPersonal, direcciones, direccionCrear, pagoexpress, listapedidos, pedido, listapersonal, listadetalle',
                //'loginajax + direccionActualizar',
        );
    }

    public function filterUbicacion($filter) {
        if (!Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]) {
            $this->redirect(CController::createUrl('sitio/ubicacion'));
            Yii::app()->end();
        }
        $filter->run();
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
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

        $codigoPerfil = Yii::app()->shoppingCartSalesman->getCodigoPerfil();

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


            Yii::app()->end();
        }

        $formFiltro = new FiltroForm;
        $formOrdenamiento = new OrdenamientoForm;


        if (isset($_POST['OrdenamientoForm'])) {
            $formOrdenamiento->attributes = $_POST['OrdenamientoForm'];
        }

        if (isset($_POST['FiltroForm'])) {
            $formFiltro->attributes = $_POST['FiltroForm'];
            $formFiltro->listCategoriasTiendaCheck = $formFiltro->listCategoriasTienda;
        }

        //Yii::log("Buscar:Filtro1\n" . CVarDumper::dumpAsString($formFiltro), CLogger::LEVEL_INFO, 'application');

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
        //Yii::log("Buscar:Filtro2\n" . CVarDumper::dumpAsString($formFiltro), CLogger::LEVEL_INFO, 'application');

        $parametrosVista['listProductos'] = $listProductos;
        $this->render('listaProductos', $parametrosVista);
    }

    public function actionCategoria($categoria) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

        $codigoPerfil = Yii::app()->shoppingCartSalesman->getCodigoPerfil();

        $objCategoria = CategoriaTienda::model()->find(array(
            'with' => array('objCategoriaPadre', 'listCategoriasBI'),
            'condition' => 't.idCategoriaTienda=:categoria ',
            'params' => array(
                ':categoria' => $categoria,
            //  ':dispositivo' => $this->isMobile ? CategoriaTienda::DISPOSITIVO_MOVIL : CategoriaTienda::DISPOSITIVO_ESCRITORIO
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

            $this->render('listaProductos', array(
                'listProductos' => array(),
                'listCombos' => array(),
                'msgCodigoEspecial' => array(),
                'listCodigoEspecial' => array(),
                'imagenBusqueda' => Yii::app()->params->busqueda['imagen']['noExito'],
                'objSectorCiudad' => $objSectorCiudad,
                'codigoPerfil' => $codigoPerfil,
                'nombreBusqueda' => 'NA',
                'objModulo' => ModulosConfigurados::getModuloFlotante($this->objSectorCiudad, Yii::app()->shoppingCartSalesman->getCodigoPerfil(), UbicacionModulos::UBICACION_ESCRITORIO_CATEGORIA, $categoria)
            ));


            Yii::app()->end();
        }

        $formOrdenamiento = new OrdenamientoForm;
        $formFiltro = new FiltroForm;


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


        $parametrosVista['listProductos'] = $listProductos;
        $this->render('listaProductos', $parametrosVista);
    }

    public function actionProducto($producto) {
        $objSectorCiudad = $this->objSectorCiudad;


        $objProducto = Producto::model()->find(array(
            'with' => array(
                'listImagenesGrandes',
                'objDetalle',
                'objCodigoEspecial',
                'listCalificaciones' => array('with' => 'objUsuario'),
                'listSaldos' => array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector OR listSaldos.idProductoSaldos IS NULL'),
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

        //CVarDumper::dump($objProducto, 10, true);exit();
        //throw new CHttpException(404, 'Producto no existe.');

        if ($objProducto == null) {
            throw new CHttpException(404, 'Producto no existe.');
        }

        $codigoPerfil = Yii::app()->shoppingCartSalesman->getCodigoPerfil();
        $objCalificacion = null;


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
    }

    public function actionBodega($producto, $ubicacion, $bodega) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

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

        $codigoPerfil = Yii::app()->shoppingCartSalesman->getCodigoPerfil();
        $cantidadCarro = 0;
        $position = Yii::app()->shoppingCartSalesman->itemAt($producto);

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

    public function actionCombo($combo) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->vendedor['sesion']['sectorCiudadEntrega']];

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

}
