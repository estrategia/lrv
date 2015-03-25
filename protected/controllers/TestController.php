<?php

class TestController extends Controller {
    public function actionProducto($codigo){
        $objProducto = Producto::model()->find(array(
            'condition' => 'codigoProducto=:codigo',
            'params' => array(
                ':codigo' => $codigo,
            ),
        ));
        
        CVarDumper::dump($objProducto->objCategoriaBI);
        
        echo "<br/><br/>";
        
        CVarDumper::dump($objProducto->objCategoriaBI->listCategoriasTienda);
    }
    
    public function actionOwl(){
        $this->render('owl');
    }

    public function actionAtributo() {
        $producto = Producto::model()->findByPk(10670);
        //$productos = Producto::model()->findAll(array('condition' => 'codigoProducto<>:codigo LIMIT 20000,5000', 'params' => array(':codigo' => 30282800)));
        
        
        if ($producto != null) {
            echo "$producto->presentacionProducto<br/>";
            foreach ($producto->listAtributos as $objAtributo) {
                echo "$objAtributo->nombreAtributo<br/>";
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

        $ciudades = Ciudad::model()->findAll($criteria);



        foreach ($ciudades as $indice => $ciudad) {
            echo "$indice: $ciudad->codigoCiudad|$ciudad->nombreCiudad<br/>";
            foreach ($ciudad->listSectores as $sector) {
                echo "    $sector->codigoSector|$sector->nombreSector<br/>";
            }
            echo "<br/>";
        }
    }

    public function actionSubsector() {
        $listCiudades = Ciudad::model()->findAll(array(
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
        }




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

}
