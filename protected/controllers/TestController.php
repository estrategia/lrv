<?php

class TestController extends Controller {
    
    public function actionImplode(){
        $categorias = array(
            1 => 1,
            2=>2,
            5=>9,
        );
        $cadena = implode(",", $categorias);
        
        echo $cadena;
    }
    
    public function actionBuscar(){
        
        $client = new SoapClient(null, array(
            'location' => "http://www.copservir.com/webService/serverLRV.php",
            'uri' => "",
            'trace' => 1
        ));
        
        $response = $client->__soapCall('BuscardorLRV', array('BUSQUEDA'=> 'LECHE KLIM'));
        
        CVarDumper::dump($response);
    }
    
    public function actionWsbarrio(){
        $barrio = "Pance";
        $ciudad = 76001;
        
        $client = new SoapClient(null, array(
            'location' => "http://www.copservir.com/webService/serverLRV.php",
            'uri' => "http://www.copservir.com",
            'trace' => 1
        ));
        
        $result = $client->__soapCall("LRVConsultarBarrio", array('idCiudad' => $ciudad, 'barrio' => $barrio));
        CVarDumper::dump($result,10,true);
        
        /*array
        (
            0 => stdClass#1
            (
                [RESPUESTA] => 0
                [DESCRIPCION] => 'NO EXISTEN REGISTROS PARA EL BARRIO PANCE'
                [PDV] => '-1'
            )
        )*/
        
    }

    public function actionWsgeo() {
        $direccion = "Cll 36 No. 40-74";
        $ciudad = 76520;
        $llave = md5($direccion . $ciudad . "javela");

        $client = new SoapClient(null, array(
            'location' => "http://www.copservir.com/webService/serverGeo.php",
            'uri' => "http://www.copservir.com",
            'trace' => 1
        ));

        $params = array(
            "direccion" => $direccion,
            "idCiudad" => $ciudad,
            "key" => $llave
        );

        $result = $client->__soapCall("ConsultarClienteLRV", $params);
        
        CVarDumper::dump($result,10,true);
        
        /*array
            (
            0 => stdClass#1
            (
                [RESPUESTA] => 0
                [DESCRIPCION] => 'PARAMETROS RECHAZADOS.'
                [PDV] => ''
                [PDV_NOMBRE] => ''
                [ALTERNAS] => ''
            )
        )*/
    }

    public function actionWsbono() {
        $client = new SoapClient(null, array(
            'location' => "http://www.copservir.com/webService/crmLrv.php",
            'uri' => "http://www.copservir.com",
            'trace' => 1
        ));
        $result = $client->__soapCall("ActualizarBono", array('identificacion' => '123321123321456654'));

        /*if (!empty($result) && $result[0]->ESTADO == 1 && $result[0]->VALOR_BONO > 0) {
            echo ("Bono: " . $result[0]->VALOR_BONO);
        }*/



        CVarDumper::dump($result, 10, true);

        /* require_once (Yii::app()->basePath . DS . 'vendors' . DS . 'nusoap/nusoap.php');
          $soapclient = new nusoap_client( 'http://www.copservir.com/webService/crmLrv.php', false);
          $response = $soapclient->call('ConsultarBono',array('identificacion'=>'70691830'));
          CVarDumper::dump($response, 10, true); */
    }

    public function actionWsdisponibilidad() {
        $productos = array();
        $productos[0]["CODIGO_PRODUCTO"] = 26255;
        $productos[0]["ID_PRODUCTO"] = 26255;
        $productos[0]["CANTIDAD"] = 5;
        $productos[0]["DESCRIPCION"] = "NA";

        $productos[1]["CODIGO_PRODUCTO"] = 11203;
        $productos[1]["ID_PRODUCTO"] = 11203;
        $productos[1]["CANTIDAD"] = 3;
        $productos[1]["DESCRIPCION"] = "NA";

        $productos[2]["CODIGO_PRODUCTO"] = 29874;
        $productos[2]["ID_PRODUCTO"] = 29874;
        $productos[2]["CANTIDAD"] = 6;
        $productos[2]["DESCRIPCION"] = "NA";

        $productos[3]["CODIGO_PRODUCTO"] = 22667;
        $productos[3]["ID_PRODUCTO"] = 22667;
        $productos[3]["CANTIDAD"] = 2;
        $productos[3]["DESCRIPCION"] = "NA";

        $client = new SoapClient(null, array(
            'location' => "http://www.copservir.com/webService/serverLRV.php",
            'uri' => "http://www.copservir.com",
            'trace' => 1
        ));

        $return = $client->__soapCall("LRVConsultarSaldoMovil", array('productos' => $productos, 'ciudad' => 76001, 'sector' => 22));
        
   /*     for($i=0;$i<count($return[1]);$i++){
            for($j=0;$j<count($return[1])-1;$j++){
                $valuej=0;
                $valuej1=0;
                if(isset($return[1][$j][5])){
                    $valuej=$return[1][$j][5];
                }
                if(isset($return[1][$j+1][5])){
                    $valuej1=$return[1][$j+1][5];
                }
                
                if($valuej<$valuej1){
                    $aux=$valuej[1][$j];
                    $valuej[1][$j]=$valuej[1][$j+1];;
                    $valuej[1][$j+1]=$aux;
                }
            }
        }*/
           CVarDumper::dump($return, 10, true);
     

        /* require_once (Yii::app()->basePath . DS . 'vendors' . DS . 'nusoap/nusoap.php');
          $productos = array();
          $productos[0]["CODIGO_PRODUCTO"] = 26255;
          $productos[0]["ID_PRODUCTO"] = 26255;
          $productos[0]["CANTIDAD"] = 5;
          $productos[0]["DESCRIPCION"] = "NA";

          $productos[1]["CODIGO_PRODUCTO"] = 11203;
          $productos[1]["ID_PRODUCTO"] = 11203;
          $productos[1]["CANTIDAD"] = 3;
          $productos[1]["DESCRIPCION"] = "NA";

          $productos[2]["CODIGO_PRODUCTO"] = 29874;
          $productos[2]["ID_PRODUCTO"] = 29874;
          $productos[2]["CANTIDAD"] = 6;
          $productos[2]["DESCRIPCION"] = "NA";

          $productos[3]["CODIGO_PRODUCTO"] = 22667;
          $productos[3]["ID_PRODUCTO"] = 22667;
          $productos[3]["CANTIDAD"] = 2;
          $productos[3]["DESCRIPCION"] = "NA";

          $soapclient = new nusoap_client('http://www.copservir.com/webService/serverLRV.php', false);
          $response = $soapclient->call('LRVConsultarSaldoMovil', array('productos' => $productos, 'ciudad' => 76001, 'sector' => 22));

          CVarDumper::dump($response, 10, true); */
    }

    public function actionBuscarsaldos($idCompra=null, $pdv=null) {

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPos'],
            'uri' => "",
            'trace' => 1
        ));
       $result = $client->__soapCall("SaldosSadRemision",  array('idPedido' => $idCompra, 'pdv_despacho' => $pdv));
       echo "<pre>";
       print_r(unserialize(serialize($result)));
       echo "</pre>";
    }
    
    public function actionReplace() {
        $plantilla = Yii::app()->params->callcenter['notificacion']['plantilla'][6];
        //$plantilla = "hola perro como estas";
        $saludo = "Buenos días";
        $plantilla = str_replace(array("{saludo}", "{nombreUsuario}"), array($saludo, "asdfafd"), $plantilla);
        echo $plantilla;
    }

    public function actionPuntos() {
        
        
        echo "categorias<br>";
        CVarDumper::dump(Yii::app()->shoppingCart->getCategorias(),10, true);
        echo "<br><br>marcas<br>";
        CVarDumper::dump(Yii::app()->shoppingCart->getMarcas(),10, true);
        echo "<br><br>proveedores<br>";
        CVarDumper::dump(Yii::app()->shoppingCart->getProveedores(),10, true);
        echo "<br><br>productos<br>";
        CVarDumper::dump(Yii::app()->shoppingCart->getProductosCantidad(),10, true);
        
        exit();
                
                

        $fecha = new DateTime;
        $categorias = array(476);

        /* $listPuntos = Puntos::model()->findAll(array(
          'with' => array('listPuntosCategorias' => array('condition'=>'listPuntosCategorias.idCategoriaBI IN (' . implode(",", $categorias) . ')')),
          'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
          'params' => array(
          ':tipo' => Yii::app()->params->puntos['categoria'],
          ':activo' => 1,
          ':fecha' => $fecha->format('Y-m-d H:i:s')
          )
          )); */
        
        $productos = Yii::app()->shoppingCart->getProductosCantidad();

        $listPuntos = Puntos::generarPuntosTipo($fecha, Yii::app()->params->puntos['producto'], $productos);
        
        //Yii::app()->params->puntos['producto'] => Yii::app()->shoppingCart->getProductosCantidad()

        //CVarDumper::dump($listPuntos);

        foreach ($listPuntos as $objPunto) {
            echo "id: $objPunto->idPunto, tipoValor: $objPunto->tipoValor, valor: $objPunto->valor<br>";
        }
    }
    
    public function actionPuntoscompra() {
        $fecha = new DateTime;
        $parametrosPuntos = array(
            Yii::app()->params->puntos['categoria'] => Yii::app()->shoppingCart->getCategorias(),
            Yii::app()->params->puntos['marca'] => Yii::app()->shoppingCart->getMarcas(),
            Yii::app()->params->puntos['proveedor'] => Yii::app()->shoppingCart->getProveedores(),
            Yii::app()->params->puntos['producto'] => Yii::app()->shoppingCart->getProductosCantidad(),
            Yii::app()->params->puntos['clientefielCompra'] => Yii::app()->shoppingCart->getCost(),
            
            /*Yii::app()->params->puntos['monto'] => Yii::app()->shoppingCart->getCost(),
            
            Yii::app()->params->puntos['cedula'] => array(
                'identificacionUsuario' => Yii::app()->user->name, 
                'valor'=> Yii::app()->shoppingCart->getCost()),
            
            Yii::app()->params->puntos['rango'] => array(
                'fecha' => $fecha, 
                'valor'=> Yii::app()->shoppingCart->getCost()),
            
            Yii::app()->params->puntos['cumpleanhos'] => array(
                'fechaNacimiento' => Yii::app()->session[Yii::app()->params->usuario['sesion']]->objUsuarioExtendida->fechaNacimiento, 
                'valor'=> Yii::app()->shoppingCart->getCost()),*/
        );
        
        //CVarDumper::dump($parametrosPuntos,3,true);exit();
        
        $listPuntosCompra = ComprasPuntos::generarPuntos($fecha,Yii::app()->session[Yii::app()->params->usuario['sesion']], $parametrosPuntos);

        CVarDumper::dump($listPuntosCompra,3,true);
    }

    public function actionExcel() {
        Yii::import('application.vendors.phpexcel.PHPExcel', true);
        $objPHPExcel = new PHPExcel();
        //$objPHPExcel->getProperties()->setTitle("Office 2007 XLSX Test Document");

        $objPHPExcel->setActiveSheetIndex(0);
        $objWorksheet = $objPHPExcel->getSheet(0);
        $objWorksheet->setTitle('Data');
        $objWorksheet->setCellValue('A1', 'Hello');
        //$objWorksheet->setCellValueByColumnAndRow(0,1, 'Hello');
        // Redirect output to a clients web browser (Excel5)
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="archivo' . date('YmdHis') . '.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        //header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

    public function actionAuth() {
        echo Yii::app()->user->isGuest ? "invitado" : "autenticado";
        echo "<br/>";
        //echo Yii::app()->operator->isGuest ? "invitado" : "autenticado";
    }

    public function actionComprapdv() {
        $model = Compras::model()->findByPk(271945);
        echo "pdv: $model->idComercial<br/>";
        echo "pdv: " . $model->objPuntoVenta->nombrePuntoDeVenta . "<br/>";
    }

    public function actionRuta() {
        echo CController::createAbsoluteUrl('/');
    }

    public function actionPrecio() {
        $precio = 107.5;
        echo "modulo: " . $precio % 50;
        echo "<br>";
        $precio = Precio::redondear($precio, 0);
        echo $precio;
    }

    public function actionDisponibilidad() {
        $formapago = new FormaPagoForm;
        //print_r($formapago->listPuntosVenta);

        $formapago->consultarDisponibilidad(Yii::app()->shoppingCart);
        echo "<br/><br/>";
        CVarDumper::dump($formapago->listPuntosVenta, 10, true);
    }

    public function actionDecimal() {
        $n = 700.99;
        $aux = (string) $n;
        $n = explode(".", $aux);
        $n = array(
            'unidad' => $n[0],
            'fraccion' => isset($n[1]) ? $n[1] : 0
        );

        CVarDumper::dump($n, 10, true);
    }

    public function actionBeneficio() {
        /* $model = Beneficios::model()->findByPk(3);


          echo $model->objBeneficioTipo->descripcion;
          echo "<br/>";
          foreach($model->listPuntosVenta as $pdv){
          echo "$pdv->nombrePuntoDeVenta";
          echo "<br/>";
          }

          echo "<br/>";
          foreach($model->listBeneficiosProductos as $obj){
          echo $obj->objProducto->descripcionProducto;
          echo "<br/>";
          }
         * 
         */

        $fecha = new DateTime;
        $models = Beneficios::model()->findAll(array(
            'with' => array('listPuntosVenta' => array('condition' => 'listPuntosVenta.codigoCiudad=:ciudad'), 'listBeneficiosProductos' => array('condition' => 'listBeneficiosProductos.codigoProducto=:producto')),
            'condition' => 't.fechaIni<=:fecha AND t.fechaFin>=:fecha AND t.tipo IN (' . implode(",", Yii::app()->params->beneficios['lrv']) . ')',
            'params' => array(
                ':fecha' => $fecha->format('Y-m-d'),
                ':ciudad' => 76001,
                ':producto' => 30128
            )
        ));

        echo count($models);
    }

    public function actionTodos() {
        echo Yii::app()->params->sector['*'];
    }

    public function actionProducto($codigo) {
        $objProducto = Producto::model()->find(array(
            'condition' => 'codigoProducto=:codigo',
            'params' => array(
                ':codigo' => $codigo,
            ),
        ));

        CVarDumper::dump($objProducto->listCategoriasTienda,3,true);

        echo "<br/><br/>";

        //CVarDumper::dump($objProducto->objCategoriaBI->listCategoriasTienda);
    }

    public function actionOwl() {
        $this->render('owl');
    }

    public function actionAtributo() {
        $producto = Producto::model()->findByPk(10670);
        //$productos = Producto::model()->findAll(array('condition' => 'codigoProducto<>:codigo LIMIT 20000,5000', 'params' => array(':codigo' => 30282800)));


        if ($producto != null) {
            echo "$producto->presentacionProducto<br/>";
            foreach ($producto->listFiltros as $objFiltro) {
                echo "$objFiltro->nombreDetalle<br/>";
            }
        }
    }

    public function actionMobile1() {
        if ($this->isMobile) {
            $this->render('index', array('content' => 'mobile'));
        }
    }

    public function actionMobile2() {
        echo Yii::app()->params->usuario['estado']['inactivo'];
        echo "<br>";
        if (Yii::app()->detectMobileBrowser->showMobile) {
            echo "mobile";
        } else {
            echo "pc";
        }
    }

    public function actionMobile3() {
        $detect = Yii::app()->mobileDetect;
        // call methods
        $detect->isMobile();
        $detect->isTablet();
        $detect->isIphone();

        if ($detect->isMobile()) {
            echo "mobile<br/>";
        }


        if ($detect->isTablet()) {
            echo "tablet<br/>";
        }

        if ($detect->isIphone()) {
            echo "iphone<br/>";
        }

        if ($detect->isiOS()) {
            echo "ios<br/>";
        }

        if ($detect->isAndroidOS()) {
            echo "android<br/>";
        }
    }

    public function actionIndex() {
        $this->render('index');
    }

    public function actionCopiar() {
        ini_set('max_execution_time', 600);

        $copiar = "95048.png";
        $carpetaGrande = Yii::getPathOfAlias('webroot') . Yii::app()->params->carpetaImagen['productos'][2];
        $carpetaMini = Yii::getPathOfAlias('webroot') . Yii::app()->params->carpetaImagen['productos'][1];
        $imgGrande = $carpetaGrande . $copiar;
        $imgMini = $carpetaMini . $copiar;

        $productos = Producto::model()->findAll(array('condition' => 'codigoProducto<>:codigo LIMIT 20000,5000', 'params' => array(':codigo' => 30282800)));

        foreach ($productos as $producto) {
            copy($imgGrande, $carpetaGrande . $producto->codigoProducto . ".png");
            copy($imgMini, $carpetaMini . $producto->codigoProducto . ".png");
        }
    }

    public function actionDistancia($lat, $lon) {

        $puntosv = PuntoVenta::model()->findAll();
        $pdvCerca = array('pdv' => null, 'dist' => -1);

        foreach ($puntosv as $pdv) {
            $dist = distanciaCoordenadas($lat, $lon, $pdv->longitudGoogle, $pdv->latitudGoogle);

            echo "$pdv->idPuntoDeVenta|$pdv->nombrePuntoDeVenta|$pdv->codigoCiudad|$pdv->longitudGoogle|$pdv->latitudGoogle|$dist<br/>";

            if ($pdvCerca['pdv'] == null) {
                $pdvCerca['pdv'] = $pdv;
                $pdvCerca['dist'] = $dist;
            } else {
                if ($dist < $pdvCerca['dist']) {
                    $pdvCerca['pdv'] = $pdv;
                    $pdvCerca['dist'] = $dist;
                }
            }
        }
    }

    public function actionSector1() {
        /* $subsectores = SubSector1::model()->findAll(array(
          'with' => array('objCiudad', 'listReferencias' => array('with' => 'listSectores'))
          ));

          foreach ($subsectores as $subsector) {
          echo "-cod: $subsector->codigoSubSector ciud: " . $subsector->objCiudad->nombreCiudad . " nom: $subsector->nombreSubSector<br/>";
          foreach ($subsector->listReferencias as $referencia) {
          echo "--cod: $referencia->codigoPuntoReferencia subsec: $referencia->codigoSubSector ciud: $referencia->codigoCiudad nom: $referencia->nombreReferencia<br/>";



          foreach ($referencia->listSectores as $sector) {
          echo "---cod: $sector->codigoSector $sector->nombreSector<br/>";
          //CVarDumper::dump($sector);
          }
          echo "<br/>";
          }
          echo "<br/>";
          }

          echo "<br/>";
          echo "<br/>"; */

        $listCiudadesSubsectores = Ciudad::model()->findAll(array(
            'with' => array('listSubSectores' => array('condition' => 'listSubSectores.estadoSubSector=1', 'order' => 'listSubSectores.nombreSubSector', 'with' => array('listReferencias' => array('condition' => 'listReferencias.estadoReferencia=1', 'order' => 'listReferencias.nombreReferencia', 'with' => array('listSectores' => array('order' => 'listSectores.nombreSector')))))),
            'order' => 't.nombreCiudad'
        ));

        /* $listCiudades = Ciudad::model()->findAll(array(
          'with' => array('listSubSectores' => array('condition' => 'estadoSubSector=1', 'with' => array('listReferencias' => array('condition' => 'estadoReferencia=1', 'with' => 'listSectores')))),
          'order' => 't.nombreCiudad'
          )); */

        foreach ($listCiudadesSubsectores as $indice => $ciudad) {
            echo "$indice: $ciudad->codigoCiudad|$ciudad->nombreCiudad<br/>";
            foreach ($ciudad->listSubSectores as $subsector) {
                echo "-cod: $subsector->codigoSubSector ciud: " . $subsector->codigoCiudad . " nom: $subsector->nombreSubSector<br/>";
                foreach ($subsector->listReferencias as $referencia) {
                    echo "--cod: $referencia->codigoPuntoReferencia subsec: $referencia->codigoSubSector ciud: $referencia->codigoCiudad nom: $referencia->nombreReferencia<br/>";
                    foreach ($referencia->listSectores as $sector) {
                        echo "---cod: $sector->codigoSector $sector->nombreSector<br/>";
                    }
                    echo "<br/>";
                }
                echo "<br/>";
            }
            echo "<br/>";
        }
    }

    public function actionSectores() {

        $criteria = new CDbCriteria;
        //$criteria->with = 'listSectores';
        $criteria->condition = 'estadoCiudadSector=:estadoCiudadSector AND estadoSector=:estadoSector AND estadoCiudad=:estadoCiudad';
        $criteria->params = array(
            ':estadoCiudadSector' => 1,
            ':estadoSector' => 1,
            ':estadoCiudad' => 1,
        );

        $criteria->with = array('listSectores' => array(
                'alias' => 'sect',
                'condition' => 'sect.codigoSector<>0',
        ));

        $ciudades = Ciudad::model()->findAll(array(
            'with' => array('listSectores'),
            'order' => 't.orden',
            'condition' => 'estadoCiudadSector=:estadoCiudadSector AND estadoSector=:estadoSector AND estadoCiudad=:estadoCiudad',
            'params' => array(
                ':estadoCiudadSector' => 1,
                ':estadoSector' => 1,
                ':estadoCiudad' => 1,
            )
        ));

        //$ciudades = Ciudad::model()->findAll($criteria);



        foreach ($ciudades as $indice => $ciudad) {
            echo "$indice: $ciudad->codigoCiudad|$ciudad->nombreCiudad<br/>";
            foreach ($ciudad->listSectores as $sector) {
                echo "    $sector->codigoSector|$sector->nombreSector<br/>";
            }
            echo "<br/>";
        }
    }

    public function actionCiudad() {
        $ciudad = Ciudad::model()->find(array(
            'condition' => 'codigoCiudad=76001'
        ));

        echo $ciudad->nombreCiudad . "<br><br>";

        foreach ($ciudad->listSubSectores as $subsector) {
            echo "id: $subsector->codigoSubSector - $subsector->nombreSubSector " . $subsector->objCiudad->nombreCiudad . " <br/>";
            foreach ($subsector->listSectorReferencias as $sectorReferencia) {
                echo "-- id: " . $sectorReferencia->getNombreSector() . " <br/>";
                foreach ($sectorReferencia->listPuntoReferencias as $referencia) {
                    echo "--- Punto ref: $referencia->nombreReferencia <br/>";
                }
                echo "<br/>";
            }
            echo "<br/>";
        }
    }

    public function actionSubsector() {
        $listCiudades = Ciudad::model()->findAll(array(
            'with' => array(
                'listSubSectores' => array(
                    'condition' => 'estadoSubSector=1',
                    'with' => array(
                        'listSectorReferencias' => array(
                            'condition' => 'listSectorReferencias.estadoSectorReferencia=1',
                            'with' => array(
                                'objSectorCiudad' => array(
                                    'condition' => 'objSectorCiudad.estadoCiudadSector=1',
                                    'with' => array(
                                        'objSector' => array(
                                            'condition' => 'objSector.estadoSector=1',
                                            'order' => 'objSector.nombreSector',
                                        ))),
                                'listPuntoReferencias' => array('condition' => 'listPuntoReferencias.estadoReferencia=1', 'order' => 'listPuntoReferencias.nombreReferencia')
                            ))))),
            'order' => 't.nombreCiudad'
        ));

        foreach ($listCiudades as $indice => $ciudad) {
            echo "$indice: $ciudad->codigoCiudad|$ciudad->nombreCiudad<br/>";
            foreach ($ciudad->listSubSectores as $subsector) {
                echo "id: $subsector->codigoSubSector - $subsector->nombreSubSector " . $subsector->objCiudad->nombreCiudad . " <br/>";
                foreach ($subsector->listSectorReferencias as $sectorReferencia) {
                    echo "-- id: " . $sectorReferencia->objSectorCiudad->objSector->nombreSector . " <br/>";
                    foreach ($sectorReferencia->listPuntoReferencias as $referencia) {
                        echo "--- Punto ref: $referencia->nombreReferencia <br/>";
                    }
                    echo "<br/>";
                }

                /* foreach ($subsector->listReferencias as $referencia) {
                  echo "-- id: $referencia->idPuntoReferencia - $referencia->nombreReferencia <br/>";
                  foreach ($referencia->listSectores as $sector) {
                  echo "--- id: $sector->codigoSector - $sector->nombreSector <br/>";
                  }
                  echo "<br/>";
                  } */
                echo "<br/>";
            }
            echo "<br/>";
        }

        /* $listCiudades = Ciudad::model()->findAll(array(
          'with' => array('listSubSectores' => array('condition' => 'estadoSubSector=1', 'with' => array('listReferencias' => array('condition' => 'estadoReferencia=1', 'with' => 'listSectores')))),
          'order' => 't.nombreCiudad'
          ));

          foreach ($listCiudades as $indice => $ciudad) {
          echo "$indice: $ciudad->codigoCiudad|$ciudad->nombreCiudad<br/>";
          foreach ($ciudad->listSubSectores as $model) {
          echo "id: $model->idSubSector - $model->nombreSubSector " . $model->objCiudad->nombreCiudad . " <br/>";
          foreach ($model->listReferencias as $referencia) {
          echo "-- id: $referencia->idPuntoReferencia - $referencia->nombreReferencia <br/>";
          foreach ($referencia->listSectores as $sector) {
          echo "--- id: $sector->codigoSector - $sector->nombreSector <br/>";
          }
          echo "<br/>";
          }
          echo "<br/>";
          }
          echo "<br/>";
          } */




        /* $models = SubSector::model()->findAll(array(
          'with' => array('objCiudad', 'listReferencias' => array('with' => 'listSectores')),
          ));

          foreach ($models as $model) {
          echo "id: $model->idSubSector - $model->nombreSubSector " . $model->objCiudad->nombreCiudad . " <br/>";
          foreach($model->listReferencias as $referencia){
          echo "-- id: $referencia->idPuntoReferencia - $referencia->nombreReferencia <br/>";
          foreach($referencia->listSectores as $sector){
          echo "--- id: $sector->codigoSector - $sector->nombreSector <br/>";
          }
          echo "<br/>";
          }
          echo "<br/>";
          } */
    }

    public function actionCategoria() {
        $catgorias = CategoriaTienda::model()->findAll(array(
            'order' => 't.orden',
            'condition' => 't.visible=:visible AND idCategoriaPadre IS NULL',
            'params' => array(
                ':visible' => 1
            )
        ));

        foreach ($catgorias as $categoria) {
            echo "id: $categoria->idCategoriaTienda - $categoria->nombreCategoriaTienda <br/>";
            foreach ($categoria->listCategoriasHijasMenu as $cat1) {
                echo "-- id: $cat1->idCategoriaTienda - $cat1->nombreCategoriaTienda <br/>";
                foreach ($cat1->listCategoriasHijasMenu as $cat2) {
                    echo "--- id: $cat2->idCategoriaTienda - $cat2->nombreCategoriaTienda <br/>";
                }
                echo "<br/>";
            }
            echo "<br/>";
        }
    }

    public function actionXml() {
        $xmlstr = "<?xml version='1.0' standalone='yes'?>
        <peliculas>
         <pelicula>
          <titulo>PHP: Titulo 1</titulo>
         </pelicula>
         <pelicula>
          <titulo>PHP: Titulo 2</titulo>
         </pelicula>
         <pelicula>
          <titulo>PHP: Titulo 3</titulo>
         </pelicula>
        </peliculas>";


        $peliculas = new SimpleXMLElement($xmlstr);

        foreach ($peliculas as $pelicula) {
            echo "Titulo: " . $pelicula->titulo . "<br/>";
        }

        echo "<br/><br/><br/>";

        $xml1 = "<?xml version='1.0' standalone='yes'?>";
        $xml1 += "<productos>
            <producto><codigo>10002</codigo></producto><producto><codigo>10003</codigo></producto><producto><codigo>10004</codigo></producto><producto><codigo>10005</codigo></producto></productos>
            </productos>";

        $xml2 = "<?xml version='1.0' standalone='yes'?>
        <productos>
         <producto>
          <codigo>10002</codigo>
         </producto>
         <producto>
          <codigo>10003</codigo>
         </producto>
         <producto>
          <codigo>10004</codigo>
         </producto>
        </productos>";

        $productos = new SimpleXMLElement($xml2);

        foreach ($productos as $producto) {
            echo "Codigo: " . $producto->codigo . "<br/>";
        }

        echo "<br/><br/><br/>";

        $xml3 = $this->renderPartial('xml', null, true);
        $productos3 = new SimpleXMLElement($xml3);

        foreach ($productos3 as $producto) {
            echo "Codigo: " . $producto->codigo . "<br/>";
        }
    }

    public function actionXml1() {
        $xml = new SimpleXMLElement('<xml/>');

        for ($i = 1; $i <= 8; ++$i) {
            $track = $xml->addChild('track');
            $track->addChild('path', "song$i.mp3");
            $track->addChild('title', "Track $i - Track Title");
        }

        $tracks = new SimpleXMLElement($xml);
    }
    
    
    public function actionCompra($pedido=436361,$pdv=1){
        // http://localhost/lrv/callcenter/admin/detallepedido/pedido/272012/asignar/1
   //     $objCompra= Compras::model()->findByPk($pedido);
        
        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPos'],
            'uri' => "",
            'trace' => 1
        ));
       $result = $client->__soapCall("SaldosSadRemision",  array('idPedido' => $pedido, 'pdv_despacho' => $pdv));
        
      
       echo "<pre>";
       print_r($result);
       echo "</pre>";
    }
    
    public function actionPerfil(){
        //CVarDumper::dump(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']],10,true);
        //echo "<br><br><br>";
        echo Yii::app()->shoppingCart->getCodigoPerfil();
        echo "<br><br><br>";
        CVarDumper::dump(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']],10,true);
    }

}
