<?php
//use Elibom\APIClient\ElibomClient as ElibomClient;

//controlador de prueba TestController prueba
class TestController extends Controller {
    
    public function actionRestConsume()
    {
        $username = "admin";
        $password = "admin";
        $token = "$username:$password";
        $token = base64_encode( $token );
        $restURL = "http://localhost/siicop/clientefiel/api/";
        
        $restClient = new RESTClient ();
        $restClient->initialize ( array (
            'server' => $restURL,
        ) );
        
        //$restClient->set_header("Authorization","Basic $token");
        $response = $restClient->put('cliente/actualizar', array('numeroDocumento'=>'10283'));
        
        if($restClient->status()==200) {
            $response = CJSON::decode($response);
            CVarDumper::dump($response,10,true);
            //$restClient->debug();
        } else {
            //echo "Error: " . $restClient->status() . "<br>";
            //CVarDumper::dump($restClient,10,true);
            $restClient->debug();
        }
        
        Yii::app()->end();
        
    }
    
    public function actionElibom () {
        $telefono = "3104629251";
        $mensaje = "La factura de su linea 3104629251 ha sido enviada a su correo electronico. Valor $425620.58 Fecha de Pago 31/01/2018";
        $mensaje = str_replace(" ", "%20", $mensaje);
        $elibom = new ElibomClient(Yii::app()->params['elibom']['url'], Yii::app()->params['elibom']['usuario'], Yii::app()->params['elibom']['password']);
        try {
            $response = $elibom->sendMessage($telefono, $mensaje);
            
            if($response['action'] == 'sendmessage') {
                echo "EXITO: " . CJSON::encode($response['data']['acceptreport']) . "<br>";
                CVarDumper::dump($response['data']['acceptreport'],10,true);
            } else {
                echo "ERROR [+" . $response['data']['errorcode'] ."]: " . $response['data']['errormessage'];
            }
        } catch (Exception $e) {
            echo "ERROR [-" . $e->getCode() ."]: " . $e->getMessage();
        }
    }
    
    public function actionSmsCurl() {
        $curl = curl_init();
        
        $telefono = "573002817433";
        $mensaje = "masm%20prueba%20" . date('Y-m-d %20 H:i:s');
        
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.masivapp.com/SmsHandlers/sendhandler.ashx?action=sendmessage&username=Api_7V7K-&password=68IK0BHE-W&recipient=$telefono&messagedata=$mensaje&longMessage=false",
            CURLOPT_RETURNTRANSFER => true,
            //CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_SSL_VERIFYPEER => false,
            //CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                //"Cache-Control: no-cache",
                //"Postman-Token: cfb6a12d-0dd5-52c8-b230-40f50bd0781a",
                //'Accept: application/json'
            ),
        ));
        
        //curl_setopt($curl, CURLOPT_USERPWD, "Api_7V7K-:68IK0BHE-W");
        //curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        //curl_setopt($curl, CURLOPT_SSLVERSION,3);
       // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,false); // este es el reimportante
        
        //curl_setopt($curl,CURLOPT_HTTPHEADER,array('Accept: application/variant_div(left, right).epg.vrt.be.playlist_1.1+xml'));
        
        $response = curl_exec($curl);
        $err = curl_error($curl);
        
        curl_close($curl);
        
        //echo "<pre>";
        if ($err) {
            echo "cURL Error #:" . $err . "<br>";
            
            CVarDumper::dump($err,10,true);
            
        } else {
            CVarDumper::dump($response,10,true);
            
            echo "<br>";
            
            $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
            
            CVarDumper::dump($array,10,true); 
            
        }
        
                
    }
    
    public function actionSms()
    {
        $restURL = "https://api.masivapp.com/SmsHandlers/sendhandler.ashx";
        
        $restClient = new RESTClient ();
        $restClient->initialize ( array (
            'server' => $restURL,
        ) );
        
        $restClient->format('json');
        $restClient->option('RETURNTRANSFER', true);
        $restClient->option('MAXREDIRS', 10);
        $restClient->option('TIMEOUT', 30);
        $restClient->option('SSL_VERIFYPEER', false);
        $restClient->option('CUSTOMREQUEST', 'GET');
        
        $params = array(
            'action'=>'sendmessage',
            'username' => 'Api_7V7K-',
            'password' => '68IK0BHE-W',
            'recipient' => '573002817433',
            'messagedata' => 'Prueba ('.date('YmdHis').'): Saludando al sinverguenza',
            'longMessage' => false,
        );
        
        
        
        $response = $restClient->get(null, $params);
        
        /*
        CVarDumper::dump($restClient,10,true); echo "<br>";
        echo "<br>Status: " . $restClient->status() . "<br>";
        CVarDumper::dump($response,10,true);
        echo "<br><br>DEBUG<br>";
        $restClient->debug();
        exit();
        */
        
        echo "<br>Status: " . $restClient->status() . "<br><br>";
        if($restClient->status()==200) {
            //CVarDumper::dump($response,15,true);
            echo "<br><br>";
            //$response =  utf8_encode($response);
            $xml = simplexml_load_string($response, "SimpleXMLElement", LIBXML_NOCDATA);
            $json = json_encode($xml);
            $array = json_decode($json,TRUE);
            
            CVarDumper::dump($array,10,true); 
            
        } else {
            echo "cURL Error #:" . $restClient->error() . "<br><br>";
            
            CVarDumper::dump($restClient,10,true);
            
            //$restClient->debug();
        }
        
        echo "<br><br>";
        CVarDumper::dump($restClient,10,true); echo "<br>";
        
        Yii::app()->end();
    }
    
    public function actionRound(){
        $valor = 0.2;
        $round = ceil($valor);
        echo "$round";
        
    }
    
    public function actionUrlm(){
        CVarDumper::dump(Yii::app()->urlManager,10,true);
    }
    
    public function actionListprod(){
    	//prueba
        $objModulo = ModulosConfigurados::model()->find(array(
            'condition' => 'idModulo=2',
        ));
        
        $listProductos = $objModulo->getListaProductos($this->objSectorCiudad);
    }
    
    public function actionBloqueo() {
        /* $usuario = '1113618983';
          $sql="select max(idCompra) idCompra from t_BloqueosUsuarios bu join t_ComprasBloqueoUsuarios cbu on bu.idBloqueoUsuario=cbu.idBloqueoUsuario where bu.identificacionUsuario=:usuario and anho=:anho and mes=:mes";
          $command=Yii::app()->db->createCommand();
          $command->text=$sql;
          $command->bindValue(':usuario',$usuario, PDO::PARAM_STR);
          $command->bindValue(':anho',2016, PDO::PARAM_INT);
          $command->bindValue(':mes',1, PDO::PARAM_INT);
          $valor = $command->queryScalar();
          CVarDumper::dump($valor,10,true); */

        /*$sqlBloqueoCompra = "INSERT INTO t_ComprasBloqueoUsuarios (idBloqueoUsuario,idCompra) VALUES ";
        $arrValoresInsertar = array();

        $arrValoresInsertar[] = "(:idBloqueo,40)";
        $arrValoresInsertar[] = "(:idBloqueo,41)";
        $arrValoresInsertar[] = "(:idBloqueo,42)";
        $arrValoresInsertar[] = "(:idBloqueo,43)";
        $arrValoresInsertar[] = "(:idBloqueo,44)";
        $arrValoresInsertar[] = "(:idBloqueo,45)";
        
        $sqlBloqueoCompra.= implode(",",$arrValoresInsertar);
        
        $command = Yii::app()->db->createCommand($sqlBloqueoCompra);
        $command->bindValue(':idBloqueo', 1, PDO::PARAM_INT);
        $rows = $command->execute();
        CVarDumper::dump($rows,10,true);*/
        
        /*$objCompra = Compras::model()->findByPk(150);
        CVarDumper::dump($objCompra->fechaCompraDate,10,true);
        $anho = $objCompra->fechaCompraDate->format('Y');
        $mes = $objCompra->fechaCompraDate->format('j');
        CVarDumper::dump("Ano: $anho - Mes: $mes",10,true);*/
        
        /*$rows = Yii::app()->db->createCommand("UPDATE m_Usuario SET activo=:activo WHERE identificacionUsuario=:usuario")->bindValue(':activo', 1, PDO::PARAM_INT)->bindValue(':usuario', "1113618983", PDO::PARAM_STR)->execute();
        CVarDumper::dump($rows,10,true);*/
        
        /*$fecha = new DateTime;
        $diasBloqueo = Yii::app()->params->bloqueoUsuario['diasBloqueo'];
        $fecha->modify("-$diasBloqueo days");
        
        $listBloqueoUsuarios = BloqueosUsuarios::model()->findAll(array(
            'with' => 'objUsuario',
            'condition' => 'estado=:estado AND fechaRegistro<=:fecha',
            'params' => array(
                ':estado' => BloqueosUsuarios::ESTADO_BLOQUEADO,
                ':fecha' => $fecha->format('Y-m-d H:i:s')
            )
        ));
        
        foreach($listBloqueoUsuarios as $idx=> $objBloqueoUsuario){
            echo "IDX: $idx <br>";
            CVarDumper::dump($objBloqueoUsuario->attributes,5,true);
            echo "<br><br>";
            $objBloqueoUsuario->desbloquearCuenta();
        }*/
        
        $objUsuario = Usuario::model()->find(array(
            "condition" => "identificacionUsuario=:usuario",
            "params"=> array(":usuario"=>1113618983)
        ));
        
        $contenidoCorreo = $this->renderPartial('//common/correoDesbloqueo', array('objUsuario' => $objUsuario), true, true);
        echo $this->renderPartial('//common/correo', array('contenido' => $contenidoCorreo));   
    }

    public function actionData() {
        //$data = Yii::app()->getUser()->getState("EShoppingCart");
        $data = Yii::app()->shoppingCart->getPositions();

        CVarDumper::dump($data, 10, true);
    }

    public function actionReauto() {
        $idCompra = -1;

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPosECommerce'],
            'uri' => "",
            'trace' => 1
        ));

        try {
            $result = $client->__soapCall("CongelarCompraAutomatica", array('idPedido' => $idCompra));
            CVarDumper::dump($result, 10, true);
        } catch (SoapFault $exc) {
            echo("SoapFault WebService CongelarCompraAutomatica [compra: $idCompra]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n" . $client->__getLastResponse());
        } catch (Exception $exc) {
            echo ("Exception WebService CongelarCompraAutomatica [compra: $idCompra]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString());
        }
    }
    
    public function actionPdvsweb(){
        $client = new SoapClient("http://sii.copservir.com/puntoventa/sweb/puntoventa");
        
        $result = $client->getPuntoVenta(array('codciudad'=>76001));
        CVarDumper::dump($result, 10, true);
    }
    
    public function actionRemanu(){
        $idCompra = -1;
        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPosECommerce'],
            'uri' => "",
            'trace' => 1
        ));
        $result = $client->__soapCall("CongelarCompraManual", array('idPedido' => $idCompra));
        CVarDumper::dump($result, 10, true);
    }

    public function actionIframe() {
        $this->render('iframe');
    }

    public function actionBono() {
        //ini_set('default_socket_timeout', 5);

        $deftimeout = ini_get('default_socket_timeout');
        echo "deftimeout: $deftimeout <br><br><br>";

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['crmLrv'],
            'uri' => "",
            //'exceptions' => 0,
            'trace' => 1,
            'connection_timeout' => 5,
                //'default_socket_timeout' => 5
        ));

        try {
            $result = $client->__soapCall("ConsultarBono", array('identificacion' => '12345'));

            echo "REQUEST<br><br>";
            $req = $client->__getLastRequest();
            CVarDumper::dump($req, 10, true);

            echo "<br><br>RESULT<br><br>";
            CVarDumper::dump($result, 10, true);
        } catch (SoapFault $exc) {
            echo "SoapFault: " . $exc->getMessage();
            echo "<br><br>__getLastResponse<br><br>";
            CVarDumper::dump($client->__getLastResponse(), 10, true);
        } catch (Exception $exc) {
            echo "Exception: " . $exc->getMessage();
        }
    }

    public function actionProbar() {
        try {
            $client = new SoapClient("http://localhost/lrv/correo/wslrv", array("trace" => 1, 'cache_wsdl' => WSDL_CACHE_NONE, 'exceptions' => 0)); //$result = $client->recordarCorreos();
            CVarDumper::dump($client->__getLastRequest());
        } catch (Exception $e) {
            
        }
    }

    public function test(){
    	echo "Hola mundo";
    }
    
    public function actionTipoentrega() {
        CVarDumper::dump(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']], 10, true);
    }

    public function actionForm() {
        echo "actionForm<br/>";

        $modelPago = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] != null) {
            echo "si existia<br/>";
            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];
            $modelPago->consultarHorario($this->objSectorCiudad);
        } else {
            echo "no existia<br/>";
            $modelPago = new FormaPagoForm;
            $modelPago->identificacionUsuario = Yii::app()->user->name;
            $modelPago->consultarHorario($this->objSectorCiudad);
        }

        echo "consultarHorario<br/>";
        $modelPago->consultarHorario($this->objSectorCiudad);

        if ($modelPago->tieneDomicilio($this->objSectorCiudad)) {
            echo "si tiene domicilio<br>";
        } else {
            echo "no tiene domicilio<br>";
        }
        exit();

        $form = new FormaPagoForm('informacion');
        $form->pagoInvitado = false;
        $form->identificacionUsuario = 1113618983;
        $form->consultarHorario($this->objSectorCiudad);
        $form->isMobil = false;
        $form->tipoEntrega = Yii::app()->params->entrega['tipo']['domicilio'];

        $form->cuotasTarjeta = 1;
        $form->idDireccionDespacho = $form->fechaEntrega = $form->comentario = $form->numeroTarjeta = $form->telefonoContacto = $form->idDireccionDespacho = '';

        echo "FORM 1 --<br>";
        CVarDumper::dump($form, 10, true);
        echo "<br>";

        if ($form->validate()) {
            echo "VALIDADO OK";
        } else {
            echo "VALIDADO ERROR<br>";
            echo CActiveForm::validate($form);
        }
    }

    function get_url_contents($url) {
        /* $crl = curl_init();
          $timeout = 5;
          curl_setopt($crl, CURLOPT_URL, $url);
          curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
          curl_setopt($crl, CURLOPT_CONNECTTIMEOUT, $timeout);
          $ret = curl_exec($crl);
          curl_close($crl);
          return $ret; */

        $ch = curl_init("REMOTE XML FILE");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
    }

    public function actionGsa($term) {
        //GSASearchAux($term);
        $url = "http://gsa.copservir.com/search?site=larebaja_collection&client=larebaja_frontend&output=xml_no_dtd&q=$term&filter=0&num=200&ie=UTF-8&ulang=es&sort=date:D:S:d1&entqr=3&entqrm=0&wc=20&wc_mc=1";

        $result = $this->get_url_contents($url);
        echo "<br><br>URL: $url<br>Result<br>";
        CVarDumper::dump($result, 10, true);
        echo "<br><br>";


        /* $aContext = array(
          'http' => array(
          'request_fulluri' => true,
          ),
          );

          $cxContext = stream_context_create($aContext);
          $result = file_get_contents($url, False, $cxContext);
          echo "<br><br>URL: $url<br>Result<br>";
          CVarDumper::dump($result, 10, true);
          echo "<br><br>"; */


        /* $result = implode('', file($url));
          echo "<br><br>URL: $url<br>Result<br>";
          CVarDumper::dump($result, 10, true);
          echo "<br><br>"; */

        /* $myfile = fopen($url, "r") or die("Unable to open file!");
          CVarDumper::dump(fgets($myfile),10,true);
          fclose($myfile); */

        //echo '<pre>', htmlspecialchars(file_get_contents($url)), '</pre>';


        /* $result = file_get_contents($url);
          echo "<br><br>URL: $url<br>Result<br>";
          CVarDumper::dump($result, 10, true);
          echo "<br><br>"; */
    }

    public function actionMerge() {
        $array1 = array(3, 5, 7, 9);
        $array2 = array(5, 15, 25, 89);
        //$resultado = array_merge($array1, $array2);
        $resultado = array();

        /* foreach ($array1 as $value) {
          $resultado[$value] = $value;
          }

          foreach ($array2 as $value) {
          $resultado[$value] = $value;
          } */

        $codigosStr = implode(",", $resultado);
        CVarDumper::dump($resultado, 10, true);
        echo "<br><br>";
        CVarDumper::dump($codigosStr, 10, true);
    }

    public function actionAutenticar() {
        $model = new LoginForm;
        $model->username = "1113618983";
        $model->password = "12345";
        $model->validate();
    }

    public function actionUrl1() {
        $urlProtocolo = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && !in_array(strtolower($_SERVER['HTTPS']), array('off', 'no'))) ? 'https' : 'http';

        //Get domain portion
        $urlHost = '://' . $_SERVER['HTTP_HOST'];

        //Get path to script
        $urlRequest = $_SERVER['REQUEST_URI'];

        $urlFull = "$urlProtocolo | $urlHost | $urlRequest";
        $urlMovil = "://m.larebajavirtual.com";
        $urlDesktop = "://larebajavirtual.com";

        echo "Protocolo: $urlProtocolo<br/>Host: $urlHost<br/>Request: $urlRequest<br/>UrlFull: $urlFull<br/><br/>";
    }

    public function actionUrl() {
        $urlProtocolo = 'http';

        //Get domain portion
        $urlHost = '://www.m.larebajavirtual.com';
        $urlHost = str_replace("://www.", "://", $urlHost);

        //Get path to script
        $urlRequest = "/lrv/";

        $urlFull = $urlProtocolo . $urlHost . $urlRequest;
        $urlMovil = "://m.larebajavirtual.com";
        $urlDesktop = "://larebajavirtual.com";

        echo "Protocolo: $urlProtocolo<br/>Host: $urlHost<br/>Request: $urlRequest<br/>UrlFull: $urlFull<br/><br/>";

        //si el host es movil y el dispositivo es escritorio => cambiar host por escritorio
        if (!$this->isMobile && strpos($urlHost, $urlMovil) !== FALSE) {
            echo "Host movil y dispositivo escritorio<br/>";
            $urlFull = str_replace($urlMovil, $urlDesktop, $urlFull);
            echo "<br/>UrlFull: $urlFull<br/><br/>";
            //header("Location: $urlFull");
        }

        //si el host es escritorio y el dispositivo es movil => cambiar host por movil
        if ($this->isMobile && strpos($urlHost, $urlDesktop) !== FALSE) {
            echo "Host desktop y dispositivo movil<br/>";
            $urlFull = str_replace($urlDesktop, $urlMovil, $urlFull);
            echo "<br/>UrlFull: $urlFull<br/><br/>";
            //header("Location: $urlFull");
        }

        echo "FIN<br/>";
    }

    public function actionEntrega() {
        CVarDumper::dump(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']], 10, true);
    }

    public function actionMapa() {
        Yii::app()->getClientScript()->registerScriptFile("https://maps.googleapis.com/maps/api/js?client=gme-copservir", CClientScript::POS_END);
        Yii::app()->getClientScript()->registerScriptFile(Yii::app()->request->baseUrl . "/js/ubicacion.min.js", CClientScript::POS_END);
        $this->render('mapa');
    }

    public function actionDirubica() {
        CVarDumper::dump(Yii::app()->session[Yii::app()->params->sesion['direccionEntrega']], 10, true);
    }

    public function actionModulogrupo() {
        $objModulo = ModulosConfigurados::model()->find(array(
            'order' => 'listModulosGrupo_listModulosGrupo.orden',
            'with' => 'listModulosGrupo',
            'condition' => 't.idModulo=:modulo',
            'params' => array(
                ':modulo' => 10
            )
        ));

        CVarDumper::dump($objModulo, 10, true);
    }

    public function actionCategoriaraiz() {
        $categorias = CategoriaTienda::model()->findAll(array(
            'condition' => 't.idCategoriaPadre IS NULL',
        ));

        foreach ($categorias as $categoria) {
            $categoria->idCategoriaRaiz = $categoria->idCategoriaTienda;
            $categoria->save();
            foreach ($categoria->listCategoriasHijas as $categoriaHija1) {
                $categoriaHija1->idCategoriaRaiz = $categoria->idCategoriaTienda;
                $categoriaHija1->save();
                foreach ($categoriaHija1->listCategoriasHijas as $categoriaHija2) {
                    $categoriaHija2->idCategoriaRaiz = $categoria->idCategoriaTienda;
                    $categoriaHija2->save();
                    foreach ($categoriaHija2->listCategoriasHijas as $categoriaHija3) {
                        $categoriaHija3->idCategoriaRaiz = $categoria->idCategoriaTienda;
                        $categoriaHija3->save();
                        foreach ($categoriaHija3->listCategoriasHijas as $categoriaHija4) {
                            $categoriaHija4->idCategoriaRaiz = $categoria->idCategoriaTienda;
                            $categoriaHija4->save();
                        }
                    }
                }
            }
        }
    }

    public function actionAnalitics($idCompra) {
        $objCompra = Compras::model()->findByPk($idCompra);
        $script = GoogleAnalytics::getScriptCompra($objCompra);
        echo $script;
    }

    /* public function actionUrl() {
      $url = "http://localhost/embebida/";
      $raw = rawurlencode($url);
      $encode = urlencode($url);
      echo "$url<br/>";
      echo "$raw<br/>";
      echo "$encode<br/>";
      } */

    public function actionDiff() {
        $datetime1 = new DateTime('2009-10-11');
        $datetime2 = new DateTime('2009-10-13');
        $interval = $datetime2->diff($datetime1);
        echo $interval->invert;
    }

    public function actionPdvhora() {
        $objPdv = PuntoVenta::model()->find(array("condition" => "idComercial=:comercial", 'params' => array(':comercial' => "4K4")));

        $hinicio = null;
        $hfin = null;
        $dia = 'festivo';
        $fecha = new DateTime;
        //si no es festivo, se verifica el dia de la semana
        if (!DiasFestivos::esFestivo($fecha)) {
            $dia = $fecha->format('w');
        }

        $foraneaHorario = HorarioPuntoVenta::getHorariosDias()[$dia]['foranea'];

        echo "foranea: $foraneaHorario <br/><br/>";

        $horario = $objPdv->$foraneaHorario;
        CVarDumper::dump($horario, 10, true);
        echo "<br/><br/>";

        if ($horario !== null) {
            $hinicio = DateTime::createFromFormat('H:i:s', $horario->HorarioInicio);
            $hfin = DateTime::createFromFormat('H:i:s', $horario->HorarioFin);
        }

        CVarDumper::dump($hinicio, 10, true);
        echo "<br/><br/>";
        CVarDumper::dump($hfin, 10, true);
    }

    public function actionVideo() {
        $this->render('video');
    }

    public function actionPdf() {
        //$compra = Compras::model()->with('items', 'items.producto')->findByPk($compra);
        //$model = CreditoCop::generarSolicitud($compra);

        $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'Letter'); //Letter, Legal, A4
        $mPDF1->SetTitle("Solicitud de credito");
        $mPDF1->SetAuthor("Copservir");
        //$styleBootstrap = file_get_contents(Yii::getPathOfAlias('bootstrap.assets') . '/css/bootstrap.css');
        //$styleCustom = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/main.css');
        //$mPDF1->WriteHTML($styleBootstrap, 1);
        //$mPDF1->WriteHTML($styleCustom, 1);

        $mPDF1->WriteHTML("<strong>Error, no se detecta formulario</strong>");
        //$mPDF1->WriteHTML($this->renderPartial('_solicitudCredito', array('model' => $model), true));

        $filename = 'SolicitudCreditoServicoop_' . date('YmdHis') . '.pdf';
        $mPDF1->Output($filename, 'D');
    }

    public function actionPdv() {
        $objPuntoVenta = PuntoVenta::model()->findByPk(1);

        CVarDumper::dump($objPuntoVenta->objHorarioAperturaLunesASabado, 10, true);
    }

    public function actionRelacionados() {
        /* $objProducto = Producto::model()->find(array(
          'condition' => 'listRelacionados.codigoProducto=84259',
          'with' => 'listRelacionados'
          )); */

        /* $objProducto = Producto::model()->findAll(array(
          'condition' => 'r.codigoProducto=84259',
          'join' => 'JOIN t_ProductosRelacionados r ON (t.codigoProducto=r.codigoRelacionado)'
          )); */

        $objProducto = Producto::model()->find(array(
            'condition' => 'codigoProducto=12957',
        ));


        CVarDumper::dump($objProducto->tieneRelacionados(), 10, true);
    }

    public function actionDistancia1() {
        $lat1 = 3.345389;
        $lat2 = 3.345721;

        $lon1 = -76.530664;
        $lon2 = -76.530643;


        $dist = distanciaCoordenadas($lat1, $lon1, $lat2, $lon2);
        echo "Distancia: $dist";
    }

    public function actionMemoria() {

        //ini_set('memory_limit', '100M');
        //echo  "Asignada: ". memory_get_peak_usage(true);
        //echo "<br/>";
        //$asigned_memory = memory_get_usage(true);
        //$used_memory = memory_get_usage();

        echo "Asignada: " . (memory_get_usage(true) / 1024);
        echo "<br/>";
        echo "Usada: " . (memory_get_usage(false) / 1024);
        echo "<br/>";
        echo "Libre: " . ((memory_get_usage(true) - memory_get_usage(false)) / 1024);
        echo "<br/>";

        /* echo "<br/>";echo "<br/>";
          $start_memory = memory_get_usage();
          $foo = "5";
          echo "$start_memory<br/>";
          echo memory_get_usage() - $start_memory; */


        /* $a = str_repeat("Hello", 4242);
          echo memory_get_usage() . "\n";
          echo "<br/>";
          unset($a);
          echo memory_get_usage() . "\n";
          echo "<br/>"; */
    }

    public function actionCorreo() {
        $mail_body = '
    <b>Message Num :</b> 769<br />
    <b>Message Date :</b> 2013-04-08 09:03:21<br />
    <b>Name :</b> John Doe<br />
    <b>Phone :</b> 123456789<br />
    <b>E-mail :</b> abcdf@somedomain.com<br />
    <b>Message :</b> Here is the message info<br />
';

        try {
            sendHtmlEmail("miguel.sanchez@eiso.com.co", "prueba correo", $mail_body);
            echo "Enviado";
        } catch (Exception $exc) {
            echo "Error: " . $exc->getMessage() . "<br/><br/>";
            echo $exc->getTraceAsString();
        }
    }

    public function actionCf() {
        $codigoPerfil = Yii::app()->shoppingCart->getCodigoPerfil();

        print_r($codigoPerfil);
    }

    public function actionImplode() {
        $categorias = array(
            1 => 1,
            2 => 2,
            5 => 9,
        );
        $cadena = implode(",", $categorias);

        echo $cadena;
    }

    public function actionBuscar() {

        $client = new SoapClient(null, array(
            'location' => "http://www.copservir.com/webService/serverLRV.php",
            'uri' => "",
            'trace' => 1
        ));

        $response = $client->__soapCall('BuscardorLRV', array('BUSQUEDA' => 'LECHE KLIM'));

        CVarDumper::dump($response);
    }

    public function actionWsbarrio() {
        $barrio = "Pance";
        $ciudad = 76001;

        $client = new SoapClient(null, array(
            'location' => "http://www.copservir.com/webService/serverLRV.php",
            'uri' => "http://www.copservir.com",
            'trace' => 1
        ));

        $result = $client->__soapCall("LRVConsultarBarrio", array('idCiudad' => $ciudad, 'barrio' => $barrio));
        CVarDumper::dump($result, 10, true);

        /* array
          (
          0 => stdClass#1
          (
          [RESPUESTA] => 0
          [DESCRIPCION] => 'NO EXISTEN REGISTROS PARA EL BARRIO PANCE'
          [PDV] => '-1'
          )
          ) */
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

        CVarDumper::dump($result, 10, true);

        /* array
          (
          0 => stdClass#1
          (
          [RESPUESTA] => 0
          [DESCRIPCION] => 'PARAMETROS RECHAZADOS.'
          [PDV] => ''
          [PDV_NOMBRE] => ''
          [ALTERNAS] => ''
          )
          ) */
    }

    public function actionBeneficios() {
        try {
            $client = new SoapClient("http://sii.copservir.com/beneficios/sweb/wslrv", array(
                'uri' => "",
                'trace' => 1,
            ));
            $result = $client->setBeneficios(100);

            CVarDumper::dump($result, 10, true);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function actionWsbono() {
        $client = new SoapClient(null, array(
            'location' => "http://www.copservir.com/webService/crmLrv.php",
            'uri' => "http://www.copservir.com",
            'trace' => 1,
            "exceptions" => 0,
        ));
        $result = $client->__soapCall("ConsultarBono", array('identificacion' => '93451033'));

        /* if (!empty($result) && $result[0]->ESTADO == 1 && $result[0]->VALOR_BONO > 0) {
          echo ("Bono: " . $result[0]->VALOR_BONO);
          } */



        CVarDumper::dump($result, 10, true);

        /* require_once (Yii::app()->basePath . DS . 'vendors' . DS . 'nusoap/nusoap.php');
          $soapclient = new nusoap_client( 'http://www.copservir.com/webService/crmLrv.php', false);
          $response = $soapclient->call('ConsultarBono',array('identificacion'=>'70691830'));
          CVarDumper::dump($response, 10, true); */
    }

    public function actionWsdisponibilidad() {
        /*$productos = array();
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
        $productos[3]["DESCRIPCION"] = "NA";*/
        
        $shoppingCart = Yii::app()->shoppingCart;
        $productos = array();
        foreach ($shoppingCart->getPositions() as $position) {
            if ($position->isProduct()) {
                $productos[] = array(
                    "CODIGO_PRODUCTO" => $position->objProducto->codigoProducto,
                    "ID_PRODUCTO" => $position->objProducto->codigoProducto,
                    "CANTIDAD" => intval($position->getQuantityUnit()),
                    "FRACCION" => $position->getQuantity(true)*$position->objProducto->unidadFraccionamiento,
                    "DESCRIPCION" => $position->objProducto->descripcionProducto,
                );
            }
        }
        
        echo "Productos:<br><br>";
        CVarDumper::dump($productos, 10, true);
        echo "<br><br>";

        $client = new SoapClient(null, array(
            'location' => "http://www.copservir.com/webService/serverLRV.php",
            'uri' => "http://www.copservir.com",
            'trace' => 1
        ));

        $return = $client->__soapCall("LRVConsultarSaldoMovilNEW", array('productos' => $productos, 'ciudad' => 76001, 'sector' => 22));

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
          } */
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

    public function actionBuscarsaldos($idCompra = null, $pdv = null) {

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPos'],
            'uri' => "",
            'trace' => 1
        ));
        $result = $client->__soapCall("SaldosSadRemision", array('idPedido' => $idCompra, 'pdv_despacho' => $pdv));
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
        CVarDumper::dump(Yii::app()->shoppingCart->getCategorias(), 10, true);
        echo "<br><br>marcas<br>";
        CVarDumper::dump(Yii::app()->shoppingCart->getMarcas(), 10, true);
        echo "<br><br>proveedores<br>";
        CVarDumper::dump(Yii::app()->shoppingCart->getProveedores(), 10, true);
        echo "<br><br>productos<br>";
        CVarDumper::dump(Yii::app()->shoppingCart->getProductosCantidad(), 10, true);

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
            Yii::app()->params->puntos['monto'] => Yii::app()->shoppingCart->getCost(),
            Yii::app()->params->puntos['cedula'] => array(
                'identificacionUsuario' => Yii::app()->user->name,
                'valor' => Yii::app()->shoppingCart->getCost()),
            Yii::app()->params->puntos['rango'] => array(
                'fecha' => $fecha,
                'valor' => Yii::app()->shoppingCart->getCost()),
            Yii::app()->params->puntos['cumpleanhos'] => array(
                'fechaNacimiento' => Yii::app()->session[Yii::app()->params->usuario['sesion']]->objUsuarioExtendida->fechaNacimiento,
                'valor' => Yii::app()->shoppingCart->getCost()),
        );

        //CVarDumper::dump($parametrosPuntos,3,true);exit();

        $listPuntosCompra = ComprasPuntos::generarPuntos($fecha, Yii::app()->session[Yii::app()->params->usuario['sesion']], $parametrosPuntos);

        CVarDumper::dump($listPuntosCompra, 3, true);
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
        /*$objProducto = Producto::model()->find(array(
            'with' => array('listImagenesGrandes'),
            'condition' => 't.codigoProducto=:codigo',
            'params' => array(
                ':codigo' => $codigo,
            ),
        ));*/
        
        $objProducto = Producto::model()->find(array(
            'with' => array('listImagenes' => array('on' => 'listImagenes.idImagen IS NULL OR (listImagenes.estadoImagen=1 AND listImagenes.tipoImagen=' . YII::app()->params->producto['tipoImagen']['mini'] . ')')),
            'condition' => 't.codigoProducto=:codigo',
            'params' => array(
                ':codigo' => $codigo,
            ),
        ));
        
        
        

        CVarDumper::dump($objProducto, 10, true);

        //CVarDumper::dump($objProducto->listCategoriasTienda, 3, true);

        echo "<br/><br/>";
        
        ///CVarDumper::dump($objProducto->listImagenesGrandes, 10, true);

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
            'with' => array('listSectorCiudad' => array('with' => 'objSector')),
            'order' => 't.orden, t.nombreCiudad',
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
            foreach ($ciudad->listSectorCiudad as $sectorCiudad) {
                echo "    $sectorCiudad->codigoSector|" . $sectorCiudad->objSector->nombreSector . "<br/>";
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

    public function actionCompra($pedido = 436361, $pdv = 1) {
        // http://localhost/lrv/callcenter/admin/detallepedido/pedido/272012/asignar/1
        //     $objCompra= Compras::model()->findByPk($pedido);

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['remisionPos'],
            'uri' => "",
            'trace' => 1
        ));
        $result = $client->__soapCall("SaldosSadRemision", array('idPedido' => $pedido, 'pdv_despacho' => $pdv));


        echo "<pre>";
        print_r($result);
        echo "</pre>";
    }

    public function actionPerfil() {
        //CVarDumper::dump(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']],10,true);
        //echo "<br><br><br>";
        echo Yii::app()->shoppingCart->getCodigoPerfil();
        echo "<br><br><br>";
        CVarDumper::dump(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']], 10, true);
    }

    public function actionVerUsuario() {
        echo "<pre>";
        print_r(Yii::app()->user->name);
        echo "</pre>";
    }

    public function actionVerProductosNoAgregados() {
        echo "<pre>";
        print_r(Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']]);
        echo "</pre>";
    }

    /**
     * @param none
     * @return int valor entero
     * @soap
     */
    public function recordarCorreos() {

        $dia = Date("d");
        $listasPersonales = ListasPersonales::model()->findAll(array(
            'with' => array('listDetalle' =>
                array('with' =>
                    array('objProducto' =>
                        array('with' => 'listImagenes'),
                        'objCombo' =>
                        array('with' => '')
                    )
                ),
                'objUsuario',),
            'condition' => "((t.diaRecordar-t.diasAnticipacion <=:diaRecordar  AND :diaRecordar <= t.diaRecordar) OR 
                             ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d'))-t.diasAnticipacion)%t.diasRecordar) = 0 OR
                               ( date_sub(date_add( date_sub(NOW(), INTERVAL ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) DAY) ,
                                    INTERVAL (CASE WHEN ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) = 0 THEN 0 ELSE t.diasRecordar end) DAY) , INTERVAL t.diasAnticipacion DAY) <= now() AND
                                date_format(t.fechaCreacion, '%Y-%m-%d') <= date_add( date_sub(NOW(), INTERVAL ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) DAY) ,
                                    INTERVAL (CASE WHEN ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) = 0 THEN 0 ELSE t.diasRecordar end) DAY) )
                             )
                             AND
                             t.estadoLista = 1",
            'params' => array(
                'diaRecordar' => Date("d")
            )
        ));

        foreach ($listasPersonales as $listaPersonal) {
            $claveEncriptada = encrypt("$listaPersonal->identificacionUsuario~$listaPersonal->idLista~$listaPersonal->fechaCreacion", Yii::app()->params->claveLista);
            $contenidoCorreo = $this->renderPartial('//common/correoRecordacion', array(
                'listasPersonal' => $listaPersonal,
                'clave' => $claveEncriptada
                    ), true, false);
            $htmlCorreo = $this->renderPartial('//common/correo', array('contenido' => $contenidoCorreo), true, true);
            $asuntoCorreo = " LA REBAJA VIRTUAL - Recordar lista ";
            try {
                sendHtmlEmail($listaPersonal->objUsuario->correoElectronico, $asuntoCorreo, $htmlCorreo);
            } catch (Exception $ce) {
                Yii::log("Error enviando correo al recordar lista \n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
            }
        }

        return 1;
    }
    
    public function actionCantidadproductos(){
        echo count(Yii::app()->shoppingCart->getPositions());
    }
    
    public function actionMigracionBonos(){
    	$formasPago = FormasPago::model()->findAll(array(
    			'condition' => 'valorBono> 0'
    	));
    	
    	$bonoTienda = BonoTienda::model()->findByPk(4); // modify
    	 
    	foreach($formasPago as $forma){
    		$bonoFormaPago = new FormasPago();
    		$bonoFormaPago->idFormaPago = 8;  // modify
    		$bonoFormaPago->idCompra = $forma->idCompra;
    		$bonoFormaPago->valor = $forma->valorBono;
    		$bonoFormaPago->cuenta = $bonoTienda->cuenta;
    		$bonoFormaPago->formaPago = $bonoTienda->formaPago;
    		$bonoFormaPago->idBonoTiendaTipo = $bonoTienda->idBonoTiendaTipo;
    	
    		if(!$bonoFormaPago->save()){
    			Yii::log("NO SE PUDO GUARDAR EL BONO COMO FORMA DE PAGO EN LA COMPRA $forma->idCompra");
    		}else{
    			$forma->valorBono = 0;
    			if(!$forma->save()){
    				Yii::log("NO SE PUDO ACTUALIZAR LA FORMA DE PAGO EN LA COMPRA $forma->idCompra");
    			}
    		}
    	}
    }
    
    public function actionEnvioSMS(){
    	require_once (Yii::app()->basePath . DS . 'extensions' . DS . 'elibom'.DS.'elibom.php'); //
    	$elibom = new ElibomClient('usuario@dominio.com', 'api_password');
    	$deliveryId = $elibom->sendMessage('3166220738, 573002111111', 'Esto es una prueba en PHP');
    }
    
    public function actionEnviarCorreoFormulas(){
    	Yii::import('application.models.Producto');
    	Yii::import('application.modules.callcenter.modules.vitalCall.models.ProductosFormulaVitalCall');
    	Yii::import('application.modules.callcenter.modules.vitalCall.models.FormulasVitalCall');
    	Yii::import('application.modules.callcenter.modules.vitalCall.models.ProductosVitalCall');
    	Yii::import('application.modules.callcenter.modules.vitalCall.models.UsuarioVitalCall');
    	$productosFormulasMedicas = ProductosFormulaVitalCall::obtenerFormulasVencer();
    
    	$formulaEnvio = array();
    	foreach($productosFormulasMedicas as $formulaProducto){
    		$formulaEnvio[$formulaProducto->idFormula]['objFormula'] = $formulaProducto->objFormulaVC;
    		$formulaEnvio[$formulaProducto->idFormula]['objUsuario'] = $formulaProducto->objFormulaVC->objUsuarioVC;
    		$formulaEnvio[$formulaProducto->idFormula]['listProductos'][$formulaProducto->idProductoVitalCall]['objProducto'] = $formulaProducto->objProductoVC->objProducto;
    		$formulaEnvio[$formulaProducto->idFormula]['listProductos'][$formulaProducto->idProductoVitalCall]['objProductoVC'] = $formulaProducto->objProductoVC;
    		$formulaEnvio[$formulaProducto->idFormula]['listProductos'][$formulaProducto->idProductoVitalCall]['objFormulaProducto'] = $formulaProducto;
    	}
    
    	foreach($formulaEnvio as $formula){
    		$vistaDesbloqueo = Yii::getPathOfAlias('application.views.common.correoFormulaVencer').'.php';
    		$vistaCorreo = Yii::getPathOfAlias('application.views.common.correo').'.php';
    	//	echo "<pre>";print_r($formula['objUsuario']);exit();
    		if(file_exists($vistaCorreo) && file_exists($vistaDesbloqueo)){
    			$contenidoCorreo = $this->renderFile($vistaDesbloqueo, array('objFormula' => $formula), true);
    			$htmlCorreo = $this->renderFile($vistaCorreo, array('contenido' => $contenidoCorreo), true);
    				
    			try {
    				sendHtmlEmail($formula['objUsuario']->correoElectronico, "La Rebaja Virtual: Desbloqueo de cuenta", $htmlCorreo, Yii::app()->params->callcenter['correo']);
    			} catch (Exception $exc) {
    				Yii::log("BloqueoCuentaCommand::desbloquearCuenta - Error envio correo [".$exc->getMessage()."] usuario [$objBloqueoUsuario->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
    			}
    		}else{
    			Yii::log("BloqueoCuentaCommand::desbloquearCuenta - Error envio correo [vista no existe] usuario [$objBloqueoUsuario->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
    		}
    	}
    
    }
    
    public function actionBeneficioVerificar($idSincronizacion = null){
    	$client = new SoapClient(Yii::app()->params->webServiceUrl['sincronizarBeneficiosSIICOP'], array(
    			"trace" => 1,
    			'cache_wsdl' => WSDL_CACHE_NONE,
    			'exceptions' => 0
    	));
    	
    	try {
    		$result = $client->setBeneficios($idSincronizacion);
    		echo "<pre>";
    		print_r($result);
    	} catch (Exception $e) {
    		$h2 = round(microtime(true) * 1000);
    		Yii::app()->exit();
    	}
    }
    
    
    public function actionSincronizarbeneficios($idBeneficio = null) { // recibe el parametro de id de sincronización
    	//       Yii::import('application.modules.beneficios.models.sincrolrv.*');
    	Yii::import('application.models.Beneficios');
    	Yii::import('application.models.BeneficioTipo');
    	Yii::import('application.models.BeneficiosProductos');
    	Yii::import('application.models.BeneficiosPuntosVenta');
    	Yii::app()->db->createCommand("SET FOREIGN_KEY_CHECKS=0")->execute();
    	ini_set('memory_limit', '-1');
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "sincronizacionlog_" . date("H-i-s") . ".txt", "w");
    	$client = new SoapClient("http://sii.copservir.com/beneficios/sweb/wslrv", array(
    			"trace" => 1,
    			'cache_wsdl' => WSDL_CACHE_NONE,
    			'exceptions' => 0
    	));
    	$pendientesSincronizar = true;
    	$i = 0;
    	do {
    		$start = round(microtime(true) * 1000);
    		$arrBeneficios = array();
    		//Beneficios-BeneficiosProductos
    		$h1 = round(microtime(true) * 1000);
    
    		$transaction = Yii::app()->db->beginTransaction();
    		$idSincronizacion = 0;
    		$idSincronizacion = $idBeneficio;
    		
    		$h2 = round(microtime(true) * 1000);
    
    		// llamar a web service enviandole el id de sincronización
    
    		$h1 = round(microtime(true) * 1000);
    
    		try {

    			$result = $client->setBeneficios($idSincronizacion);

    		} catch (Exception $e) {
    			$h2 = round(microtime(true) * 1000);
    			Yii::app()->exit();
    		}
    
    		$h2 = round(microtime(true) * 1000);
    
    		if ($result['Result'] == 0) {
    			Yii::log("Beneficios no han sido sincronizados correctamente\nDescripción:" . $result['Response'] . date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
    			Yii::app()->end();
    		}
    
    		if ($result['Result'] == 2) {
    			$pendientesSincronizar = false;
    		}
    		if ($result['Result'] == 1) {
    			$pendientesSincronizar = true;
    			$arrTiposBeneficio = $result['arrTiposBeneficio'];
    			$arrBeneficios = $result['arrBeneficios'];
    
    			foreach ($arrTiposBeneficio as $beneficioTipo) {
    				$objBeneficioTipo = BeneficioTipo::model()->find(array(
    						'condition' => 'tipo=:tipo',
    						'params' => array(
    								':tipo' => $beneficioTipo['Tipo']
    						)
    				));
    
    				if ($objBeneficioTipo === null) {
    					$objBeneficioTipo = new BeneficioTipo;
    					$objBeneficioTipo->tipo = $beneficioTipo['Tipo'];
    					$objBeneficioTipo->fechaCreacion = $beneficioTipo['FechaCreacion'];
    				}
    
    				$objBeneficioTipo->descripcion = $beneficioTipo['Descripcion'];
    				$h1 = round(microtime(true) * 1000);
    
    				if (!$objBeneficioTipo->save()) {
    					throw new Exception("Error al guardar mBeneficioTipo {id: " . $beneficioTipo['IdBeneficioTipo'] . ", tipo: " . $beneficioTipo['Tipo'] . " error: " . CActiveForm::validate($objBeneficioTipo) . "}");
    				}
    
    				$h2 = round(microtime(true) * 1000);
    			}
    			$datosPdv = array();
    			$beneficiosProductos = array();
    			$beneficiosCedulas = array();
    			foreach ($arrBeneficios as $beneficio) {
    				$objBeneficio = new Beneficios;
    				$objBeneficio->idBeneficioSincronizado = $beneficio['IdBeneficio'];
    				$objBeneficio->tipo = $beneficio['Tipo'];
    				$objBeneficio->fechaIni = $beneficio['FechaIni'];
    				$objBeneficio->fechaFin = $beneficio['FechaFin'];
    				$objBeneficio->dsctoUnid = $beneficio['DsctoUnid'];
    				$objBeneficio->dsctoFrac = $beneficio['DsctoFrac'];
    				$objBeneficio->vtaUnid = $beneficio['VtaUnid'];
    				$objBeneficio->vtaFrac = $beneficio['VtaFrac'];
    				$objBeneficio->pagoUnid = $beneficio['PagoUnid'];
    				$objBeneficio->pagoFrac = $beneficio['PagoFrac'];
    				$objBeneficio->cuentaCop = $beneficio['CuentaCop'];
    				$objBeneficio->nitCop = $beneficio['NitCop'];
    				$objBeneficio->porcCop = $beneficio['PorcCop'];
    				$objBeneficio->cuentaProv = $beneficio['CuentaProv'];
    				$objBeneficio->nitProv = $beneficio['NitProv'];
    				$objBeneficio->porcProv = $beneficio['PorcProv'];
    				$objBeneficio->promoFiel = $beneficio['PromoFiel'];
    				$objBeneficio->mensaje = $beneficio['Mensaje'];
    				$objBeneficio->swobligaCli = $beneficio['SwobligaCli'];
    				$objBeneficio->fechaCreacionBeneficio = $beneficio['FechaCreacionBeneficio'];
    				$h1 = round(microtime(true) * 1000);
    
    				if (!$objBeneficio->save()) {
    					throw new Exception("Error al guardar tBeneficios {id: " . $beneficio['IdBeneficio'] . ", tipo: " . $beneficio['Tipo'] . " error: " . CActiveForm::validate($objBeneficio) . "}");
    				}
    
    				$h2 = round(microtime(true) * 1000);
    
    				foreach ($beneficio['listBeneficiosProductos'] as $benefProd) {
    
    					$h1 = round(microtime(true) * 1000);
    
    					if ($benefProd['Mensaje'] != null) {
    						$benefProd['Mensaje'] = "'" . $benefProd['Mensaje'] . "'";
    					} else {
    						$benefProd['Mensaje'] = "NULL";
    					}
    
    					if ($benefProd['Unid'] == null) {
    						$benefProd['Unid'] = "NULL";
    					}
    
    					if ($benefProd['Obsequio'] == null) {
    						$benefProd['Obsequio'] = "NULL";
    					}
    
    					$beneficiosProductos[] = "($objBeneficio->idBeneficio," .
    					$benefProd['Refe'] . "," .
    					$benefProd['Mensaje'] . "," .
    					$benefProd['Unid'] . "," .
    					$benefProd['Obsequio'] . "," .
    					$benefProd['tipo'] . ")";
    
    					$h2 = round(microtime(true) * 1000);
    					//  echo "Trying save in beneficios producto's table".". Time execution: ".($h2-$h1)." miliseconds\n";
    				}
    				//  echo "lista de productos ".count($beneficio['listBeneficiosPuntoVenta']);
    				$h1 = round(microtime(true) * 1000);
    
    				foreach ($beneficio['listBeneficiosPuntoVenta'] as $benefPdv) {
    					$datosPdv[] = "($objBeneficio->idBeneficio,'" . $benefPdv['IDComercial'] . "')";
    				}
    
    				if ($beneficio['listCedulas']) {
    					fwrite($file, "Insertando cedulas en el beneficio $objBeneficio->idBeneficio \n");
    
    					foreach ($beneficio['listCedulas'] as $benCed) {
    						$beneficiosCedulas[] = "($objBeneficio->idBeneficio,".$benCed['NumeroDocumento'].")";
    					}
    				}
    
    				$h2 = round(microtime(true) * 1000);
    			}
    			if (count($datosPdv) > 0) {
    				$sql = "INSERT INTO t_BeneficiosPuntosVenta(idBeneficio,idComercial) VALUES " . implode(",", $datosPdv);
    				Yii::app()->db->createCommand($sql)->execute();
    			}
    
    			if (count($beneficiosProductos) > 0) {
    
    				$sql = "INSERT INTO t_BeneficiosProductos
                                    (idBeneficio,
                                    codigoProducto,
                                    mensaje,
                                    unid,
                                    obsequio,
                                    tipo)
                                    VALUES " . implode(",", $beneficiosProductos);
    				Yii::app()->db->createCommand($sql)->execute();
    			}
    
    			if (count($beneficiosCedulas) > 0) {
    				$sql = "INSERT INTO t_BeneficiosCedulas
                                    (idBeneficio,
                                    numeroDocumento)
                                    VALUES " . implode(",", $beneficiosCedulas);
    				Yii::app()->db->createCommand($sql)->execute();
    				
    				echo $sql;exit();
    				 
    			}
    		}
    		$transaction->commit();
    		$end = round(microtime(true) * 1000);
    		fwrite($file, "Time execution process $i " . ". " . ($end - $start) . " miliseconds" . PHP_EOL);
    		echo "Time execution process $i " . ". " . ($end - $start) . " miliseconds\n";
    		$i++;
    	} while ($pendientesSincronizar);
    	fwrite($file, "Beneficios sincronizados correctamente " . PHP_EOL);
    	fclose($file);
    	echo "Beneficios sincronizados correctamente";
    	Yii::log("Beneficios sincronizados correctamente\n" . date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
    }

    
    public function actionPruebaBeneficio($idSincronizacion = null){
    	
    	$client = new SoapClient("http://sii.copservir.com/beneficios/sweb/wslrv", array(
    			"trace" => 1,
    			'cache_wsdl' => WSDL_CACHE_NONE,
    			'exceptions' => 0
    	));
    	$pendientesSincronizar = true;
    	$i = 0;
    	
    	try {
    		$result = $client->setBeneficios($idSincronizacion);
    		$arrBeneficios = $result['arrBeneficios'];
    		foreach ($arrBeneficios as $beneficio) {
    			print_r($beneficio['listCedulas']);
    		}
    	} catch (Exception $e) {
    		$h2 = round(microtime(true) * 1000);
    		Yii::app()->exit();
    	}
    }
    
    public function actionServEtgaEnvio(){
    	Yii::import("application.models.servientrega.AuthHeader");
    	$auth = new AuthHeader("Testcopservir", "BpSUh12jBIiWdACDozgOaQ==", "SER408", "COPSERVIR_SISCLINET");
    	$header = new SoapHeader("http://tempuri.org/", "AuthHeader", $auth, false);
    	$client = new SoapClient('http://web.servientrega.com:8081/GeneracionGuias.asmx?WSDL', array(
    			"trace" => 1,
    			"exceptions" => 0,
    			'cache_wsdl' => WSDL_CACHE_NONE
    	));
    	$client->__setSoapHeaders($header);
    	$parm = array();
    	$paramReq = $this->renderPartial('CargueMasivoExternoDTO', array(), true);
    	$parm[] = new SoapVar($paramReq, XSD_ANYXML);
    	$service = $client->CargueMasivoExterno(new SoapVar($parm, SOAP_ENC_OBJECT));
    	$req = $client->__getLastRequest();
    	CVarDumper::dump($req, 10, true);
    	echo"<br/><br/>";
    	CVarDumper::dump($service, 10, true);
    	
    }
    
    public function actionServEtgaRastreo($guia){
    	$client = new SoapClient('http://sismilenio.servientrega.com.co/wsrastreoenvios/wsrastreoenvios.asmx?WSDL', array(
    			"trace" => 1,
    			"exceptions" => 0,
    			'cache_wsdl' => WSDL_CACHE_NONE
    	));
    	//$client->__setSoapHeaders($header);
    	$parm = array();
    	$paramReq = $this->renderPartial('ConsultarGuia', array("NumeroGuia"=>$guia), true);
    	$parm[] = new SoapVar($paramReq, XSD_ANYXML);
    	$service = $client->ConsultarGuia(new SoapVar($parm, SOAP_ENC_OBJECT));
    	$req = $client->__getLastRequest();
    	CVarDumper::dump($req, 10, true);
    	echo"<br/><br/><br/><br/>";
    	CVarDumper::dump($service, 10, true);
    }
    

    public function actionModificarBeneficios(){
    	$client = new SoapClient("http://www.larebajavirtual.com/sweb/wslrv", array(
    			'uri' => "",
    			'trace' => 1
    	));
    	
    	// $result = $client->eliminarBeneficios(str_replace("Refe","codigoProducto", $condicion));
    	$result = $client->eliminarBeneficios("codigoProducto in (115775,115776) and fechaFin='2017-04-23'");
    //	$result = $client->actualizarBeneficios("fechaFin='2017-04-23'","codigoProducto in (115775,115776) and fechaIni='2017-04-24'");
    	echo $result;
    }


    public function actionPass($pass){
    	$cifrado = CPasswordHelper::hashPassword($pass);
    	echo "Pass: $pass";
    	echo "<br>Cifr: $cifrado";
    }
    
    public function actionPassvalid(){
    	$pass = "luf9jiw35t";
    	$hash = '$2y$13$0nOpakDK4jPmDMlBugeWcuJ44V/g7k4Q7bZmHrKhfO2fMjwccuqT2';
    	
    	if ( CPasswordHelper::verifyPassword($pass, $hash) ) {
    		echo "validado OK";
    	} else {
    		echo "validado ERROR";
    	}
    }
    public function actionJwt(){
    	$key= "secret";
    	
    	$token= [
    		"sub"=> "1234567890",
    		"name" => "John Doe",
    		"admin" => true
    	];
    	$jwt = JWT::encode($token,$key,'HS256');
    	echo "<br><br>encode: $jwt<br><br>";
    	$decoded= JWT::decode($jwt, $key, array('HS256'));
    	CVarDumper::dump($decoded,10,true);echo "<br><br>";
    	
    	$key = "example_key";
    	$token = array(
    		"iss" => "http://example.org",
    		"aud" => "http://example.com",
    		"iat" => 1356999524,
    		"nbf" => 1357000000
    	);
    	$jwt = JWT::encode($token,$key,'HS256');
    	echo "<br><br>encode: $jwt<br><br>";
    	$decoded = JWT::decode($jwt, $key, array('HS256'));
    	CVarDumper::dump($decoded,10,true);echo "<br><br>";
    	
    	//$decoded_array = (array) $decoded;
    	//JWT::$leeway = 60; // $leeway in seconds
    	//$decoded = JWT::decode($jwt, $key, array('HS256'));
    	
    }
    
    
    public function actionSincronizarBeneficio($inicial, $final){
    	 
    	Yii::app()->db->createCommand("SET FOREIGN_KEY_CHECKS=0")->execute();
    	 
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "sincronizacionLog.txt", "a");
    	$client = new SoapClient(Yii::app()->params->webServiceUrl['sincronizarBeneficiosSIICOP'], array(
    			"trace" => 1,
    			'cache_wsdl' => WSDL_CACHE_NONE,
    			'exceptions' => 0
    	));
    	$pendientesSincronizar = true;
    	fwrite($file, Date("Y-m-d h:i:s")." - Inicio de ejecucion de el proceso" . PHP_EOL);
    	$i = 0;
    	 
    	do {
    		$start = round(microtime(true) * 1000);
    		$arrBeneficios = array();
    		//Beneficios-BeneficiosProductos
    		$h1 = round(microtime(true) * 1000);
    		 
    		$transaction = Yii::app()->db->beginTransaction();
    		$idSincronizacion = $inicial;
    
    		 
    		$h2 = round(microtime(true) * 1000);
    		fwrite($file, Date("Y-m-d h:i:s")."- "."Buscando el maximo idSincronizado ".($h2 - $h1)." milisegundos" . PHP_EOL);
    		// llamar a web service enviandole el id de sincronizacion
    		 
    		$h1 = round(microtime(true) * 1000);
    		 
    		try {
    			$result = $client->setBeneficios($idSincronizacion);
    		} catch (Exception $e) {
    			$h2 = round(microtime(true) * 1000);
    			Yii::app()->exit();
    		}
    		 
    		$h2 = round(microtime(true) * 1000);
    		fwrite($file, Date("Y-m-d h:i:s")."- "."Llamando al webservice del siicop ".($h2 - $h1)." milisegundos" . PHP_EOL);
    		 
    		 
    		if ($result['Result'] == 0) {
    			Yii::log("Beneficios no han sido sincronizados correctamente\nDescripcion: " . $result['Response'] . date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
    			Yii::app()->end();
    		}
    		 
    		if ($result['Result'] == 2) {
    			$pendientesSincronizar = false;
    		}
    		if ($result['Result'] == 1) {
    			$pendientesSincronizar = true;
    			 
    			$arrBeneficios = $result['arrBeneficios'];
    			 
    			 
    			$datosPdv = array();
    			$beneficiosProductos = array();
    			$beneficiosCedulas = array();
    			$inicio = round(microtime(true) * 1000);
    			fwrite($file, Date("Y-m-d h:i:s")." - "."Iniciando a guardar  ".count($arrBeneficios)." registros" . PHP_EOL);
    			foreach ($arrBeneficios as $beneficio) {
    				$h1 = round(microtime(true) * 1000);
    
    				// buscar si el beneficio existe
    
    				$inicial = $beneficio['IdBeneficio'];
    
    				$sql = "SELECT idBeneficio FROM t_Beneficios WHERE idBeneficioSincronizado = ".$beneficio['IdBeneficio'];
    				$existeBeneficio = Yii::app()->db->createCommand($sql)->queryAll();
    
    				if($existeBeneficio == null){
    					$objBeneficio = new Beneficios;
    					 
    					$objBeneficio->idBeneficioSincronizado = $beneficio['IdBeneficio'];
    					$objBeneficio->tipo = $beneficio['Tipo'];
    					$objBeneficio->fechaIni = $beneficio['FechaIni'];
    					$objBeneficio->fechaFin = $beneficio['FechaFin'];
    					$objBeneficio->dsctoUnid = $beneficio['DsctoUnid'];
    					$objBeneficio->dsctoFrac = $beneficio['DsctoFrac'];
    					$objBeneficio->vtaUnid = $beneficio['VtaUnid'];
    					$objBeneficio->vtaFrac = $beneficio['VtaFrac'];
    					$objBeneficio->pagoUnid = $beneficio['PagoUnid'];
    					$objBeneficio->pagoFrac = $beneficio['PagoFrac'];
    					$objBeneficio->cuentaCop = $beneficio['CuentaCop'];
    					$objBeneficio->nitCop = $beneficio['NitCop'];
    					$objBeneficio->porcCop = $beneficio['PorcCop'];
    					$objBeneficio->cuentaProv = $beneficio['CuentaProv'];
    					$objBeneficio->nitProv = $beneficio['NitProv'];
    					$objBeneficio->porcProv = $beneficio['PorcProv'];
    					$objBeneficio->promoFiel = $beneficio['PromoFiel'];
    					$objBeneficio->mensaje = $beneficio['Mensaje'];
    					$objBeneficio->swobligaCli = $beneficio['SwobligaCli'];
    					$objBeneficio->fechaCreacionBeneficio = $beneficio['FechaCreacionBeneficio'];
    
    					if (!$objBeneficio->save()) {
    						throw new Exception("Error al guardar tBeneficios {id: " . $beneficio['IdBeneficio'] . ", tipo: " . $beneficio['Tipo'] . " error: " . CActiveForm::validate($objBeneficio) . "}");
    					}
    
    					$h2 = round(microtime(true) * 1000);
    					fwrite($file, Date("Y-m-d h:i:s")."- "."Guardando el beneficio No. $objBeneficio->idBeneficioSincronizado -   ".($h2 - $h1)." milisegundos" . PHP_EOL);
    
    					foreach ($beneficio['listBeneficiosProductos'] as $benefProd) {
    
    						$h1 = round(microtime(true) * 1000);
    
    						if ($benefProd['Mensaje'] != null) {
    							$benefProd['Mensaje'] = "'" . $benefProd['Mensaje'] . "'";
    						} else {
    							$benefProd['Mensaje'] = "NULL";
    						}
    
    						if ($benefProd['Unid'] == null) {
    							$benefProd['Unid'] = "NULL";
    						}
    
    						if ($benefProd['Obsequio'] == null) {
    							$benefProd['Obsequio'] = "NULL";
    						}
    
    						$beneficiosProductos[] = "($objBeneficio->idBeneficio," .
    						$benefProd['Refe'] . "," .
    						$benefProd['Mensaje'] . "," .
    						$benefProd['Unid'] . "," .
    						$benefProd['Obsequio'] . "," .
    						$benefProd['tipo'] . ")";
    
    						$h2 = round(microtime(true) * 1000);
    
    					}
    
//     					foreach ($beneficio['listBeneficiosPuntoVenta'] as $benefPdv) {
//     						$datosPdv[] = "($objBeneficio->idBeneficio,'" . $benefPdv['IDComercial'] . "')";
//     					}
    
    
    					if ($beneficio['listCedulas']) {
    						foreach ($beneficio['listCedulas'] as $benCed) {
    							$beneficiosCedulas[] = "($objBeneficio->idBeneficio,".$benCed['NumeroDocumento'].")";
    						}
    					}
    				}
    			}
    			if (count($datosPdv) > 0) {
    				$h1 = round(microtime(true) * 1000);
    				$sql = "INSERT INTO t_BeneficiosPuntosVenta(idBeneficio,idComercial) VALUES " . implode(",", $datosPdv);
    				Yii::app()->db->createCommand($sql)->execute();
    				$h2 = round(microtime(true)*1000);
    				fwrite($file, Date("Y-m-d h:i:s")."- "."Insertando puntos de venta -   ".($h2 - $h1)." milisegundos" . PHP_EOL);
    			}
    			 
    			if (count($beneficiosProductos) > 0) {
    				$h1 = round(microtime(true) * 1000);
    				$sql = "INSERT INTO t_BeneficiosProductos
                                    (idBeneficio,
                                    codigoProducto,
                                    mensaje,
                                    unid,
                                    obsequio,
                                    tipo)
                                    VALUES " . implode(",", $beneficiosProductos);
    				Yii::app()->db->createCommand($sql)->execute();
    				$h2 = round(microtime(true)*1000);
    				fwrite($file, Date("Y-m-d h:i:s")."- "."Insertando beneficios productos -   ".($h2 - $h1)." milisegundos" . PHP_EOL);
    				 
    			}
    			 
    			if (count($beneficiosCedulas) > 0) {
    				$h1 = round(microtime(true) * 1000);
    				$sql = "INSERT INTO t_BeneficiosCedulas
                                    (idBeneficio,
                                    numeroDocumento)
                                    VALUES " . implode(",", $beneficiosCedulas);
    				Yii::app()->db->createCommand($sql)->execute();
    				$h2 = round(microtime(true)*1000);
    				fwrite($file, Date("Y-m-d h:i:s")."- "."Insertando cedulas -   ".($h2 - $h1)." milisegundos" . PHP_EOL);
    					
    			}
    			$fin = round(microtime(true) * 1000);
    			fwrite($file, Date("Y-m-d h:i:s")." - "."Finalizo guardar beneficios en base de datos Tiempo:   ".($fin - $inicio)." milisegundos" . PHP_EOL);
    		}
    		$transaction->commit();
    		$end = round(microtime(true) * 1000);
    		fwrite($file, Date("Y-m-d h:i:s")." - Finalizo  ejecucion de el Lote:  $i " . ". " . ($end - $start) . " milisegundos" . PHP_EOL);
    		$i++;
    	} while ($pendientesSincronizar && $inicial < $final);
    	echo "Final";
    }
    
    
    public function actionTestJwt(){
    	$token = array(
    			"blog" => "http://weblog.nabi.ir",
    			"name" => "nabi",
    			"date" => "2017-03-09",
    			"number" => 1396
    	);
    	
    	$jwt = Yii::app()->JWT->encode($token);
    	echo "<pre>";
    	print_r($jwt);
    	echo "</pre>";
    	$decode = Yii::app()->JWT->decode($jwt);
    	echo "<pre>";
    	var_dump($decode);
    }
    
    public function actionEnvio(){
    	generateXMLPedido();
    }
    
    
    public function actionSoat($placa){
        $iBus = [
            'AuthenticationHeaderUser' => 'admin',
            'AuthenticationHeaderPassword' => 'adminIbancos123',
            'urlWebService' => 'http://pre.transfiriendo.com/IBusSE/Services/Basic/EventManagerService.asmx?WSDL',
        ];
        
        $iSoat = [
            'isoatUser' => 'coopservirpto',
            'isoatPassword' => 'abc123',
            'isoatCompanyCode' => '1',
            'isoatCountry' => '57',
            'canal' => 'DROGAS LA REBAJA PUNTO',
            'canalSuperior' => 'DROGAS LA REBAJA',
            'rangoPapeleria' => [
                'inicio' => 30075551,
                'fin' => 30075650,
                'siguiente' => 30075551
            ],
        ];
        
        $client = new SoapClient($iBus['urlWebService'], array(
            "trace" => 1,
            "exceptions" => 0,
            'cache_wsdl' => WSDL_CACHE_NONE
        ));
        
        $auth = array(
            'UserName' => $iBus['AuthenticationHeaderUser'],
            'Password' => $iBus['AuthenticationHeaderPassword'],
        );
        
        //$auth = new AuthenticationHeader(Yii::$app->params["iBus"]["AuthenticationHeaderUser"], Yii::$app->params["iBus"]["AuthenticationHeaderPassword"]);
        $header = new SoapHeader("http://tempuri.org/", "AuthenticationHeader", $auth, false);
        $client->__setSoapHeaders($header);
        
        $parm = array();
        $parm[] = new SoapVar('GetVehicle', XSD_STRING, null, null, 'ns1:serviceName');
        
        $cadenaLogin = "<Login>
                    <Username>" . $iSoat["isoatUser"] . "</Username>
                    <Password>" . $iSoat["isoatPassword"] . "</Password>
                    <CompanyCode>" . $iSoat["isoatCompanyCode"] . "</CompanyCode>
                    <CountryCode>" . $iSoat["isoatCountry"] . "</CountryCode>
                </Login>";
        
        $paramReq = "<GetVehicleReq>";
        $paramReq .= $cadenaLogin . "
                        <Data>
                            <NumberPlate>$placa</NumberPlate>
                        </Data>
                    </GetVehicleReq>";
        
        $parm[] = new SoapVar($paramReq, XSD_STRING, null, null, 'ns1:parameters');
        $service = $client->StartService(new SoapVar($parm, SOAP_ENC_OBJECT));
        //$array = XMLToArray::createArray($service->StartServiceResult);
        
        echo "<br><br>Client:<br>";
        CVarDumper::dump($client,10,true);
        
        echo "<br><br>Respuesta:<br>";
        CVarDumper::dump($service,10,true);
        
        echo "<br><br>Peticion:<br>";
        CVarDumper::dump($client->__getLastRequest(),10,true);
        
        echo "<br><br>Respuesta:<br>";
        CVarDumper::dump($client->__getLastResponse());
        
    }
    
    
    public function actionServientrega($idCompra){
    	
        $url = "http://web.servientrega.com:8081/GeneracionGuias.asmx?WSDL";
        $login = "Testcopservir";
        $pass = "BpSUh12jBIiWdACDozgOaQ==";
        $codFactura = "SER408";
        $cargue = "COPSERVIR_SISCLINET";
        
        $despachos = ComprasDespachoCedi::model()->findAll(array(
        		'condition' => 'idCompra =:compra',
        		'params' => array(
        				':compra' => $idCompra
        		)
        ));
        
        $objCompra = Compras::model()->findByPk($idCompra);
        
        $despacho = array();
        
        if($despachos){
        	foreach($despachos as $compraDespacho){
        		if($compraDespacho->idOperadorLogistico == 1){
        			$despacho = $compraDespacho;
        			break;
        		}
        	}
        }
        
        
        $client = new \SoapClient($url, array(
            "trace" => 1,
            "exceptions" => 0,
            'cache_wsdl' => WSDL_CACHE_NONE
        ));
        
        $auth = array(
            'login' => $login,
            'pwd' => $pass,
            'Id_CodFacturacion' => $codFactura,
            'Nombre_Cargue' => $cargue,
        );
        
        $header = new SoapHeader("http://tempuri.org/", "AuthHeader", $auth, false);
        $client->__setSoapHeaders($header);
        
        $paramReq = $this->renderPartial('CargueMasivoExternoDTO', array(
        		'objCompra' => $objCompra,
    			'objBodega' => $despacho->objBodega,
    			'objCompraDespacho' => $despacho), true);
        $parm[] = new SoapVar($paramReq, XSD_ANYXML);
        $service = $client->CargueMasivoExterno(new SoapVar($parm, SOAP_ENC_OBJECT));
     
        if($service->CargueMasivoExternoResult){
            echo "<br>EXITO!!!!<br>";
            
            echo "<br><br>Respuesta:<br>";
             CVarDumper::dump($service,10,true);
            //$resultadoArray = get_object_vars($service->envios);
             $resultadoArray = json_decode(json_encode($service->envios), true);
            echo "<br><br>Respuesta array:<br>";
            CVarDumper::dump($resultadoArray,10,true);
            $despacho->numeroGuia = $service->arrayGuias->string;
            $despacho->save();
            
        } else {
            echo "<br>ERROR!!!!<br>";
        }
        
        
        
        /*echo "<br><br>Respuesta:<br>";
        CVarDumper::dump($service,10,true);
        
        echo "<br><br>Peticion:<br>";
        CVarDumper::dump($client->__getLastRequest(),10,true);
        
        echo "<br><br>Ultima Respuesta:<br>";
        CVarDumper::dump($client->__getLastResponse(),10,true);*/
        
        
    }
    
    
    public function actionTrack(){
    	$url = "http://sismilenio.servientrega.com.co/wsrastreoenvios/wsrastreoenvios.asmx?WSDL";
    	$login = "Testcopservir";
    	$pass = "BpSUh12jBIiWdACDozgOaQ==";
    	$codFactura = "SER408";
    	$cargue = "COPSERVIR_SISCLINET";
    
    	$client = new \SoapClient($url, array(
    			"trace" => 1,
    			"exceptions" => 0,
    			'cache_wsdl' => WSDL_CACHE_NONE
    	));
    
    	$auth = array(
    			'login' => $login,
    			'pwd' => $pass,
    			'Id_CodFacturacion' => $codFactura,
    			'Nombre_Cargue' => $cargue,
    	);
    
    //	$header = new SoapHeader("http://tempuri.org/", "AuthHeader", $auth, false);
    //	$client->__setSoapHeaders($header);
    
    	$paramReq = $this->renderPartial('RastreoGuia', array(), true);
    	$parm[] = new SoapVar($paramReq, XSD_ANYXML);
    	$service = $client->ConsultarGuiaExterno(new SoapVar($parm, SOAP_ENC_OBJECT));
    	CVarDumper::dump($service->ConsultarGuiaExternoResult,10,true);exit();
    	if($service->CargueMasivoExternoResult){
    		echo "<br>EXITO!!!!<br>";
    
    		echo "<br><br>Respuesta:<br>";
    		CVarDumper::dump($service,10,true);
    		//$resultadoArray = get_object_vars($service->envios);
    		$resultadoArray = json_decode(json_encode($service->envios), true);
    		echo "<br><br>Respuesta array:<br>";
    		CVarDumper::dump($resultadoArray,10,true);
    
    
    	} else {
    		echo "<br>ERROR!!!!<br>";
    	}
    
    
    
    	/*echo "<br><br>Respuesta:<br>";
    	 CVarDumper::dump($service,10,true);
    
    	 echo "<br><br>Peticion:<br>";
    	 CVarDumper::dump($client->__getLastRequest(),10,true);
    
    	 echo "<br><br>Ultima Respuesta:<br>";
    	 CVarDumper::dump($client->__getLastResponse(),10,true);*/
    
    
    }
    
}
