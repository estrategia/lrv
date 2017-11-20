<?php 
  /**
  * 
  */
  class RestProductoController extends CController
  {

    private $format = 'json';
    
    public function filters()
    {
      return array();
    }

    public function actionList()
    {
      $productos = Producto::model()->findAll();
      echo CJSON::encode($productos);
    }

    public function actionProducto()
    {
      $codigoProducto = $_GET['codigoProducto'];
      $codigoCiudad = $_GET['codigoCiudad'];
      $codigoSector = $_GET['codigoSector'];

      $objSectorCiudad = SectorCiudad::model()->find(array(
                    'with' => array('objCiudad', 'objSector'),
                    'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
                    'params' => array(
                        ':ciudad' => $codigoCiudad,
                        ':sector' => $codigoSector,
                        ':estado' => 1,
                    )
                ));


      $objProducto = Producto::model()->find(array(
                'with' => array(
                    'listImagenesGrandes',
                    'objDetalle',
                    'objCodigoEspecial',
                    'objMedidaFraccion',
                    // 'listCalificaciones' => array('with' => 'objUsuario'),
                    'listSaldos' => array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector OR listSaldos.idProductoSaldos IS NULL'),
                    'listPrecios' => array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector'),
                    // 'listSaldosTerceros' => array('on' => 'listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector OR listSaldosTerceros.idProductoSaldo IS NULL')
                ),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
                'params' => array(
                    ':activo' => 1,
                    ':codigo' => $codigoProducto,
                    ':ciudad' => $codigoCiudad,
                    ':sector' => $codigoSector,
                    // ':tipoImagen' => YII::app()->params->producto['tipoImagen']['mini'],
                ),
            ));

      $objPrecio = new PrecioProducto($objProducto, $objSectorCiudad, Yii::app()->params->perfil['defecto']);

      // CVarDumper::dump($objProducto,10,true);

      $codigoEspecial = '';
      $imagenes = [];
      $imagen = [];
      $precioUnidad = [];
      $precioFraccion = [];
      $fraccion = [];
      // $urlImagenes = "holi";
      $urlImagenes = Yii::app()->getBaseUrl(true) . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']];

      // echo $urlImagenes;


      foreach ($objProducto->listImagenesGrandes as $objImagen) {

        $imagen['nombreImagen'] = $objImagen->nombreImagen;
        $imagen['tituloImagen'] = $objImagen->tituloImagen;
        $imagen['descripcionImagen'] = $objImagen->descripcionImagen;
        $imagen['rutaImagen'] = $urlImagenes . $objImagen->rutaImagen;
        
        $imagenes[] = $imagen;
      }

      if ($objProducto->codigoEspecial != 0) {
        $codigoEspecial = $objProducto->objCodigoEspecial->descripcion;
      }

      $precioUnidad = [
        'precioBase' => $objPrecio->getPrecio(Precio::PRECIO_UNIDAD, false),
        'precioReal' => $objPrecio->getPrecio(Precio::PRECIO_UNIDAD),
        'ahorro' => $objPrecio->getAhorro(Precio::PRECIO_UNIDAD),
      ];

      if ($objProducto->fraccionado) {
        $precioFraccion = [
          'precioBase' => $objPrecio->getPrecio(Precio::PRECIO_FRACCION, false),
          'precioReal' => $objPrecio->getPrecio(Precio::PRECIO_FRACCION),
          'ahorro' => $objPrecio->getAhorro(Precio::PRECIO_FRACCION),
        ];

        $fraccion = [
          'descripcionMedidaFraccion' => $objProducto->objMedidaFraccion->descripcionMedidaFraccion,
          'unidadFraccionamiento' => $objProducto->unidadFraccionamiento,
        ];
      }
      
      $productoResponse = array(
        'descripcionProducto' => $objProducto->descripcionProducto,
        'presentacionProducto' => $objProducto->presentacionProducto,
        'codigoProducto' => $objProducto->codigoProducto,
        'imagenesProducto' => $imagenes,
        'descuento' => $objPrecio->getPorcentajeDescuento(),
        'precioUnidad' => $precioUnidad,
        'precioFraccion' => $precioFraccion,
        'fraccion' => $fraccion,
        'codigoProveedor' => $objProducto->codigoProveedor,
      );
      echo CJSON::encode($productoResponse);
    }

    public function actionBuscar()
    {
      $term = $_GET['termino'];
      $lab = $_GET['laboratorio'];
      $sesion = Yii::app()->getSession()->getSessionId() . "_visitamedica";
      $codigosArray = GSASearch($term, $sesion);
      $parametrosProductos = [];
      $categoria1 = Yii::app()->params['calificacion']['categoriasNoCalificacion'][0];
      $categoria2 = Yii::app()->params['calificacion']['categoriasNoCalificacion'][1];
      if ($lab == -1) {
        $parametrosProductos = array(
                  'order' => 'rel.relevancia DESC,t.orden DESC',
                  'condition' => "t.activo=:activo AND (t.idUnidadNegocioBI=:categoria1 OR t.idUnidadNegocioBI=:categoria2)",
                  'params' => array(
                      ':activo' => 1,
                      ':categoria1' => $categoria1,
                      ':categoria2' => $categoria2,
                  )
              );
        $parametrosProductos['join'] = "JOIN t_relevancia_temp_$sesion rel ON t.codigoProducto  = rel.codigoProducto ";
      } else {
        $parametrosProductos = array(
                  'order' => 'rel.relevancia DESC,t.orden DESC',
                  'condition' => "t.activo=:activo AND t.codigoProveedor=:nitLaboratorio AND (t.idUnidadNegocioBI=:categoria1 OR t.idUnidadNegocioBI=:categoria2)",
                  'params' => array(
                      ':activo' => 1,
                      ':nitLaboratorio' => $lab,
                      ':categoria1' => $categoria1,
                      ':categoria2' => $categoria2,
                  )
              );
        $parametrosProductos['join'] = "JOIN t_relevancia_temp_$sesion rel ON t.codigoProducto  = rel.codigoProducto ";
      }
      $productos = Producto::model()->findAll($parametrosProductos);
      echo CJSON::encode($productos);
    }

    public function actionSimular()
    {
      $response = [
        'result' => 1,
        'response' => [
          // Pdv 1
          [
            'idComercial' => 13141,
            'nombrePDV' => 'REBAJA PLUS No. 1 - CALI',
            'direccionPDV' => 'No. 100-, Cl. 16 #48',
            'nombreCiudad' => 'Cali, Valle',
            'nombreSector' => 'CIUDAD JARDIN',
            'nombreBarrio' => 'CIUDAD JARDIN',
            'telefono' => 5245222,
            'nombreAdministrador' => 'Juan',
            'coordenadas' => [
              'latitud' => 10.254,
              'longitud' => -75.0023,
            ],
            'producto' => [
              'rotacion' => 10,
              'maximo' => 15,
              'minimo' => 5,
              'clase' => 'A',
              'saldo' => 11,
            ],
          ],
          // Pdv 2
          [
            'idComercial' => 13142,
            'nombrePDV' => 'REBAJA PLUS No. 6 - CALI',
            'direccionPDV' => 'Calle 13 No. 66-20',
            'nombreCiudad' => 'Cali, Valle',
            'nombreSector' => 'LIMONAR',
            'nombreBarrio' => 'LIMONAR',
            'telefono' => 5245222,
            'nombreAdministrador' => 'Pedro',
            'coordenadas' => [
              'latitud' => 11.01,
              'longitud' => -75.1911,
            ],
            'producto' => [
              'rotacion' => 10,
              'maximo' => 12,
              'minimo' => 3,
              'clase' => 'L',
              'saldo' => 1,
            ],
          ],
          // Pdv 3
          [
            'idComercial' => 13143,
            'nombrePDV' => 'REBAJA No. 24 - CALI',
            'direccionPDV' => 'Calle 5 No. 69-08',
            'nombreCiudad' => 'Cali, Valle',
            'nombreSector' => 'BARRIO CALDAS',
            'nombreBarrio' => 'BARRIO CALDAS',
            'telefono' => 5245222,
            'nombreAdministrador' => 'Pepe',
            'coordenadas' => [
              'latitud' => 10.0101,
              'longitud' => -75.9918,
            ],
            'producto' => [
              'rotacion' => 10,
              'maximo' => 8,
              'minimo' => 4,
              'clase' => 'D',
              'saldo' => 1,
            ],
          ],
          // Pdv 4
          [
            'idComercial' => 13144,
            'nombrePDV' => 'REBAJA No. 5 - CALI',
            'direccionPDV' => 'Calle 42 No. 83C-22' ,
            'nombreCiudad' => 'Cali, Valle',
            'nombreSector' => 'CIUDADELA COMFANDI',
            'nombreBarrio' => 'CIUDADELA COMFANDI',
            'telefono' => 5245222,
            'nombreAdministrador' => 'Jose',
            'coordenadas' => [
              'latitud' => 10.8918,
              'longitud' => -75.1919,
            ],
            'producto' => [
              'rotacion' => 10,
              'maximo' => 10,
              'minimo' => 10,
              'clase' => 'A',
              'saldo' => 4,
            ],
          ],
        ],
      ];
      echo CJSON::encode([$response]);
    }
  }
?>