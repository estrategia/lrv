<?php

//'with' => array('listImagenes', 'objDetalle', 'objCodigoEspecial', 'listCalificaciones' => array('with' => 'objUsuario'), 'listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'), 'listPrecios' => array('condition' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector')),
class CatalogoController extends Controller {

    public function actionCategoria($categoria) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        $codigoPerfil = Yii::app()->params->usuario['perfilDefecto'];

        if (!Yii::app()->user->isGuest) {
            $usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
            $codigoPerfil = $usuario->objPerfil->codigoPerfil;
        }

        $objCategoria = CategoriaTienda::model()->find(array(
            'with' => 'listCategoriasBI',
            'condition' => 't.idCategoriaTienda=:categoria',
            'params' => array(
                ':categoria' => $categoria
            ),
        ));

        $listIdsCategoriaBI = array();

        if ($objCategoria != null) {
            foreach ($objCategoria->listCategoriasBI as $objCategoria) {
                $listIdsCategoriaBI[] = $objCategoria->idCategoriaBI;
            }
        }

        if ($objCategoria == null || empty($listIdsCategoriaBI)) {
            if ($objSectorCiudad != null) {
                try {
                    Busquedas::registrarBusqueda(array(
                        'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                        'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
                        'msgBusqueda' => $objCategoria == null ? "Categoria tienda: $categoria. No existe" : "Categoria tienda: $categoria - $objCategoria->nombreCategoriaTienda",
                        'codigoCiudad' => $objSectorCiudad->codigoCiudad,
                        'codigoSector' => $objSectorCiudad->codigoSector,
                    ));
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                }
            }

            $this->render('listaProductos', array(
                'listProductos' => array(),
                'msgCodigoEspecial' => array(),
                'listCodigoEspecial' => array(),
                'imagenBusqueda' => Yii::app()->params->busqueda['imagen']['noExito'],
                'objSectorCiudad' => $objSectorCiudad,
                'codigoPerfil' => $codigoPerfil,
            ));

            Yii::app()->end();
        }

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

        Yii::app()->session[Yii::app()->params->sesion['productosBusquedaCategoria']] = $categoria;

//echo "Categoria: $categoriaSesion";


        $formOrdenamiento = new OrdenamientoForm;

        if (isset($_POST['OrdenamientoForm'])) {
            $formOrdenamiento->attributes = $_POST['OrdenamientoForm'];
            Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] = $formOrdenamiento;

            if (Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] != null) {
                $formFiltro = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']];
            }
        }

        $formFiltro = new FiltroForm;
        if (isset($_POST['FiltroForm'])) {
            $formFiltro->attributes = $_POST['FiltroForm'];
            Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']] = $formFiltro;

            if (Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']] != null) {
                $formOrdenamiento = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaOrden']];
            }
        }

        $parametrosProductos = array();

        if ($objSectorCiudad == null) {
            $parametrosProductos = array(
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listAtributos'),
                'condition' => 't.activo=:activo AND t.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ')',
                'params' => array(
                    ':activo' => 1,
                //':categoria' => $categoria
                )
            );
        } else {
            $parametrosProductos = array(
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listAtributos', 'listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'), 'listPrecios' => array('condition' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector')),
                'condition' => 't.activo=:activo AND t.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ')',
                'params' => array(
                    ':activo' => 1,
                    //':categoria' => $categoria,
                    ':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            );
        }

        if ($formOrdenamiento->orden != null) {
            if ($formOrdenamiento->orden == 1) {
                $parametrosProductos['order'] = "listPrecios.precioUnidad ASC";
            } else if ($formOrdenamiento->orden == 2) {
                $parametrosProductos['order'] = "listPrecios.precioUnidad DESC";
            } else if ($formOrdenamiento->orden == 3) {
                $parametrosProductos['order'] = "t.descripcionProducto";
            } else if ($formOrdenamiento->orden == 4) {
                $parametrosProductos['order'] = "t.presentacionProducto";
            }
        }

        if ($formFiltro->nombre != null) {
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND t.descripcionProducto LIKE '%$formFiltro->nombre%'";
        }

        if ($formFiltro->listMarcas != null) {
            $formFiltro->listMarcasCheck = $formFiltro->listMarcas;
            $codigosMarcas = implode(",", $formFiltro->listMarcas);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND t.idMarca IN ($codigosMarcas)";
        }

        if ($formFiltro->listAtributos != null) {
            $formFiltro->listAtributosCheck = $formFiltro->listAtributos;
            $codigosAtributos = implode(",", $formFiltro->listAtributos);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listAtributos.idAtributo IN ($codigosAtributos)";
        }

        $listProductos = Producto::model()->findAll($parametrosProductos);

        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $msgCodigoEspecial = array();
        $formFiltro->listMarcas = array();
        $formFiltro->listAtributos = array();
        foreach ($listProductos as $objProducto) {
            if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                $msgCodigoEspecial[$objProducto->codigoEspecial] = $objProducto->objCodigoEspecial;
            }
            $formFiltro->listMarcas[$objProducto->idMarca] = $objProducto->objMarca->nombreMarca;

            foreach ($objProducto->listAtributos as $objAtributo) {
                $formFiltro->listAtributos[$objAtributo->idAtributo] = $objAtributo->nombreAtributo;
            }
        }

        $parametrosVista = array(
            'listProductos' => $listProductos,
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'objSectorCiudad' => $objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
        );

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];

            if ($objSectorCiudad != null) {
                try {
                    Busquedas::registrarBusqueda(array(
                        'idenficacionUsuario' => Yii::app()->user->isGuest ? null : Yii::app()->user->name,
                        'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['categoria'],
                        'msgBusqueda' => $objCategoria == null ? "Categoria tienda: $categoria. No existe" : "Categoria tienda: $categoria - $objCategoria->nombreCategoriaTienda",
                        'codigoCiudad' => $objSectorCiudad->codigoCiudad,
                        'codigoSector' => $objSectorCiudad->codigoSector,
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

        $this->render('listaProductos', $parametrosVista);
    }

    public function actionFiltro() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        $listMarcas = Yii::app()->getRequest()->getPost('marcas', array());
        $listAtributos = Yii::app()->getRequest()->getPost('atributos', array());
        $categoria = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaCategoria']];

        $objCategoria = CategoriaTienda::model()->find(array(
            'with' => 'listCategoriasBI',
            'condition' => 't.idCategoriaTienda=:categoria',
            'params' => array(
                ':categoria' => $categoria
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
        $formFiltro->listAtributos = $listAtributos;
        $parametrosProductos = array();

        if ($objSectorCiudad == null) {
            $parametrosProductos = array(
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listAtributos'),
                'condition' => 't.activo=:activo AND t.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ')',
                'params' => array(
                    ':activo' => 1,
                )
            );
        } else {
            $parametrosProductos = array(
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objMarca', 'listAtributos', 'listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'), 'listPrecios' => array('condition' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector')),
                'condition' => 't.activo=:activo AND t.idCategoriaBI IN (' . implode(",", $listIdsCategoriaBI) . ')',
                'params' => array(
                    ':activo' => 1,
                    ':saldo' => 0,
                    ':ciudad' => $objSectorCiudad->codigoCiudad,
                    ':sector' => $objSectorCiudad->codigoSector,
                )
            );
        }
        
        /* if ($formFiltro->nombre != null) {
          $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND t.descripcionProducto LIKE '%$formFiltro->nombre%'";
          } */

        if (!empty($formFiltro->listMarcas)) {
            $codigosMarcas = implode(",", $formFiltro->listMarcas);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND t.idMarca IN ($codigosMarcas)";
        }

        if (!empty($formFiltro->listAtributos)) {
            $codigosAtributos = implode(",", $formFiltro->listAtributos);
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND listAtributos.idAtributo IN ($codigosAtributos)";
        }

        if (isset(Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']])) {
            $formFiltro->nombre = Yii::app()->session[Yii::app()->params->sesion['productosBusquedaFiltro']]->nombre;
        }

        if ($formFiltro->nombre != null) {
            $parametrosProductos['condition'] = $parametrosProductos['condition'] . " AND t.descripcionProducto LIKE '%$formFiltro->nombre%'";
        }

        $formFiltro->listMarcasCheck = array();
        foreach ($formFiltro->listMarcas as $idMarca) {
            $formFiltro->listMarcasCheck[$idMarca] = $idMarca;
        }

        $formFiltro->listAtributosCheck = array();
        foreach ($formFiltro->listAtributos as $idMarca) {
            $formFiltro->listAtributosCheck[$idMarca] = $idMarca;
        }

        $listProductos = Producto::model()->findAll($parametrosProductos);

        $formFiltro->listMarcas = array();
        $formFiltro->listAtributos = array();

        foreach ($listProductos as $objProducto) {
            $formFiltro->listMarcas[$objProducto->idMarca] = $objProducto->objMarca->nombreMarca;

            foreach ($objProducto->listAtributos as $objAtributo) {
                $formFiltro->listAtributos[$objAtributo->idAtributo] = $objAtributo->nombreAtributo;
            }
        }

        echo CJSON::encode(array(
            //'form' => CVarDumper::dumpAsString($formFiltro),
            'marcas' => $this->renderPartial('_formFiltroMarcas', array('formFiltro' => $formFiltro), true),
            'atributos' => $this->renderPartial('_formFiltroAtributos', array('formFiltro' => $formFiltro), true)
        ));
    }

    public function actionBuscar() {
        //$term = Yii::app()->getRequest()->getPost('busqueda', '');
        $term = Yii::app()->request->getParam('busqueda', '');
        $term = trim($term);

        if (empty($term)) {
            $this->redirect($this->createUrl('/sitio/categorias'));
        }

        //ini_set('memory_limit', '-1');
        ini_set('memory_limit', '1024M');

        $listProductosXML = Producto::model()->findAll(array(
            'condition' => 'descripcionProducto LIKE :term',
            'params' => array(
                ':term' => "%$term%"
            )
        ));

        $xmlStr = $this->renderPartial('xmlGSA', array('listProductos' => $listProductosXML), true);
        $listCodigos = new SimpleXMLElement($xmlStr);
        $codigosArray = array();

        foreach ($listCodigos as $productoXml) {
            $codigosArray[] = $productoXml->codigo;
        }

        $codigosStr = implode(",", $codigosArray);

        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        $listProductos = array();

        if (!empty($codigosArray)) {
            if ($objSectorCiudad == null) {
                $listProductos = Producto::model()->findAll(array(
                    'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objCategoriaBI'),
                    'condition' => "t.activo=:activo AND t.codigoProducto IN ($codigosStr)",
                    'params' => array(
                        ':activo' => 1,
                    //':term' => "%$term%",
                    )
                ));
            } else {
                $listProductos = Producto::model()->findAll(array(
                    'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objCategoriaBI', 'listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'), 'listPrecios'),
                    'condition' => "t.activo=:activo AND t.codigoProducto IN ($codigosStr)",
                    'params' => array(
                        ':activo' => 1,
                        //':term' => "%$term%",
                        ':saldo' => 0,
                        ':ciudad' => $objSectorCiudad->codigoCiudad,
                        ':sector' => $objSectorCiudad->codigoSector,
                    )
                ));
            }
        }

        $listCodigoEspecial = CodigoEspecial::model()->findAll(array(
            'condition' => 'codigoEspecial<>0'
        ));

        $formFiltro = new FiltroForm;

        $msgCodigoEspecial = array();
        foreach ($listProductos as $objProducto) {
            if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                $msgCodigoEspecial[$objProducto->codigoEspecial] = $objProducto->objCodigoEspecial;
            }

            foreach ($objProducto->objCategoriaBI->listCategoriasTienda as $objCategoriaTienda) {
                $formFiltro->listCategoriasTienda[$objCategoriaTienda->idCategoriaTienda] = $objCategoriaTienda;
            }
        }

        $imagenBusqueda = null;
        if (empty($listProductos)) {
            $imagenBusqueda = Yii::app()->params->busqueda['imagen']['noExito'];

            if ($objSectorCiudad != null) {
                try {
                    $busqueda = new Busquedas;

                    if (!Yii::app()->user->isGuest)
                        $busqueda->identificacionUsuario = Yii::app()->user->name;

                    $busqueda->tipoBusqueda = Yii::app()->params->busqueda['tipo']['buscador'];
                    $busqueda->busqueda = $term;
                    $busqueda->fecha = new CDbExpression('NOW()');
                    $busqueda->codigoCiudad = $objSectorCiudad->codigoCiudad;
                    $busqueda->codigoSector = $objSectorCiudad->codigoSector;
                    $busqueda->save();
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                }
            }
        }

        $codigoPerfil = Yii::app()->params->usuario['perfilDefecto'];

        if (!Yii::app()->user->isGuest) {
            $usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
            $codigoPerfil = $usuario->objPerfil->codigoPerfil;
        }

        $this->render('listaProductos', array(
            'listProductos' => $listProductos,
            'msgCodigoEspecial' => $msgCodigoEspecial,
            'listCodigoEspecial' => $listCodigoEspecial,
            'imagenBusqueda' => $imagenBusqueda,
            'objSectorCiudad' => $objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'formFiltro' => $formFiltro,
            'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['buscador'],
        ));
    }

    /* public function actionPrueba($producto) {
      $fecha = new DateTime();
      $fecha->modify("-1 day");

      echo $fecha->format('Y-m-d H:i:s') . "<br/>";


      $objCalificacion = ProductosCalificaciones::model()->find(array(
      'condition' => 'codigoProducto=:producto AND identificacionUsuario=:usuario AND fecha>=:fecha',
      'params' => array(
      ':producto' => $producto,
      ':usuario' => Yii::app()->user->name,
      ':fecha' => $fecha->format('Y-m-d H:i:s'),
      ),
      ));

      if ($objCalificacion == null) {
      echo "NULL";
      Yii::app()->end();
      }

      $di = $objCalificacion->getDiferencia();
      echo $di->format('%H:%i:%s');
      } */

    public function actionProducto($producto) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad == null) {
            $objProducto = Producto::model()->find(array(
                'with' => array('listImagenes', 'objDetalle', 'objCodigoEspecial', 'listCalificaciones' => array('with' => 'objUsuario'), 'listPrecios'),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
                'params' => array(
                    ':activo' => 1,
                    ':codigo' => $producto,
                ),
            ));
        } else {
            $objProducto = Producto::model()->find(array(
                'with' => array('listImagenes', 'objDetalle', 'objCodigoEspecial', 'listCalificaciones' => array('with' => 'objUsuario'), 'listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'), 'listPrecios'),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
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

        $codigoPerfil = Yii::app()->params->usuario['perfilDefecto'];
        $objCalificacion = null;

        if (!Yii::app()->user->isGuest) {
            $usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
            $codigoPerfil = $usuario->objPerfil->codigoPerfil;

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

        $this->render('productoDetalle', array(
            'objProducto' => $objProducto,
            'objSectorCiudad' => $objSectorCiudad,
            'codigoPerfil' => $codigoPerfil,
            'listaPuntoVenta' => $listaPuntoVenta,
            'objCalificacion' => $objCalificacion,
            'listaPuntoVenta' => $listaPuntoVenta,
            'tipoBusqueda' => Yii::app()->params->busqueda['tipo']['buscador'],
        ));
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
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ciudad'));
            Yii::app()->end();
        }

        $objProducto = Producto::model()->find(array(
            'with' => array('listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'), 'listPrecios' => array('condition' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector')),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
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

        $codigoPerfil = Yii::app()->params->usuario['perfilDefecto'];

        if (!Yii::app()->user->isGuest) {
            $usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
            $codigoPerfil = $usuario->objPerfil->codigoPerfil;
        }

        $objPrecio = $objProducto->getPrecio($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector, $codigoPerfil);
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
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ciudad'));
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
            'with' => array('listSaldos' => array('condition' => 'listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector'), 'listPrecios' => array('condition' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector')),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
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

        $codigoPerfil = Yii::app()->params->usuario['perfilDefecto'];

        if (!Yii::app()->user->isGuest) {
            $usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
            $codigoPerfil = $usuario->objPerfil->codigoPerfil;
        }

        $objPrecio = $objProducto->getPrecio($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector, $codigoPerfil);
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

    public function actionCalificar() {
        if (Yii::app()->user->isGuest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Usuario no autenticado.'));
            Yii::app()->end();
        }

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
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta calificación.'));
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

            $fechaCalificacion = new DateTime();
            $objCalificacion->fecha = new CDbExpression('NOW()');
            $objCalificacion->aprobado = 0;

            if ($objCalificacion->save()) {
//$objCalificacion->refresh();
                echo CJSON::encode(array('result' => 'ok', 'response' => 'Calificación exitosa'));
                Yii::app()->end();
            } else {
                echo CJSON::encode(array('result' => 'error', 'response' => 'Error al guardar calificación. Intente de nuevo.'));
                Yii::app()->end();
            }
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            echo CJSON::encode(array('result' => 'error', 'response' => 'Error: ' . $exc->getMessage()));
            Yii::app()->end();
        }
    }

}
