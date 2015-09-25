<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormaPagoForm
 *
 * @author miguel.sanchez
 */
class FormaPagoForm extends CFormModel {

    //put your code here
    public $identificacionUsuario;
    public $idDireccionDespacho;
    public $fechaEntrega;
    public $comentario;
    public $idFormaPago;
    public $numeroTarjeta;
    public $cuotasTarjeta;
    public $bono;
    public $usoBono = 0;
    public $confirmacion;
    public $listCodigoEspecial = array();
    public $pasoValidado = array();
    public $listPuntosVenta = array(0 => 0, 1 => 'No consultado');
    public $indicePuntoVenta;
    public $objHorarioCiudadSector = null;
    public $pagoExpress = false;
    public $telefonoContacto;
    public $pagoInvitado = false;
    public $descripcion;
    public $nombre;
    public $direccion;
    public $barrio;
    public $telefono;
    public $extension;
    public $celular;
    public $correoElectronico;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {

        $rules = array();
        $rules[] = array('identificacionUsuario', 'required', 'message' => '{attribute} no puede estar vacío');

        if ($this->pagoInvitado) {
            //echo "<br/>PAGO INVITADO<br/>";
            
             //$rules[] = array('descripcion, nombre, direccion, barrio, telefono, extension, celular, correoElectronico', 'attributeTrim');
             
            if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['domicilio']) {
                //echo "<br/>PAGO INVITADO DOMICILIO<br/>";
                $rules[] = array('descripcion, nombre, direccion, barrio, telefono', 'required', 'on' => 'despacho, finalizar', 'message' => '{attribute} no puede estar vacío');
            
                $rules[] = array('correoElectronico', 'required', 'on' => 'despacho, finalizar', 'message' => '{attribute} no puede estar vacío');
                $rules[] = array('correoElectronico', 'email', 'on' => 'despacho, finalizar');
                $rules[] = array('correoElectronico', 'length', 'max' => 50, 'on' => 'despacho, finalizar');
                
                $rules[] = array('extension, telefono, celular', 'numerical', 'integerOnly' => true, 'on' => 'despacho, finalizar', 'message' => '{attribute} deber ser número');
                $rules[] = array('direccion', 'length', 'min' => 5, 'max' => 100, 'on' => 'despacho, finalizar');
                $rules[] = array('descripcion', 'length', 'min' => 3, 'max' => 50, 'on' => 'despacho, finalizar');
                $rules[] = array('nombre, barrio', 'length', 'min' => 5, 'max' => 50, 'on' => 'despacho, finalizar');
                $rules[] = array('celular', 'length', 'min' => 5, 'max' => 20, 'on' => 'despacho, finalizar');
                $rules[] = array('telefono', 'length', 'min' => 5, 'max' => 11, 'on' => 'despacho, finalizar');
                $rules[] = array('extension', 'length', 'max' => 5, 'on' => 'despacho, finalizar');
            }

            if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['presencial']) {
               // echo "<br/>PAGO PRESENCIAL<br/>";
                $rules[] = array('correoElectronico', 'required', 'on' => 'entrega, finalizar', 'message' => '{attribute} no puede estar vacío');
                $rules[] = array('correoElectronico', 'email', 'on' => 'entrega, finalizar');
                $rules[] = array('correoElectronico', 'length', 'max' => 50, 'on' => 'entrega, finalizar');
            }
            
            
            $rules[] = array('idDireccionDespacho', 'safe');
            $rules[] = array('celular, extension, idDireccionDespacho', 'default', 'value' => null);
        } else {
            $rules[] = array('descripcion, nombre, direccion, barrio, extension, telefono, celular, correoElectronico', 'safe');
            $rules[] = array('idDireccionDespacho', 'required', 'on' => 'despacho, finalizar', 'message' => '{attribute} no puede estar vacío');
        }
        
        $rules[] = array('fechaEntrega', 'required', 'on' => 'entrega, finalizar', 'message' => '{attribute} no puede estar vacío');
        $rules[] = array('comentario', 'length', 'max' => 250, 'on' => 'entrega, finalizar');
        $rules[] = array('fechaEntrega', 'fechaValidate', 'on' => 'entrega, finalizar');
        $rules[] = array('idFormaPago', 'required', 'on' => 'pago, finalizar', 'message' => '{attribute} no puede estar vacío');
        $rules[] = array('numeroTarjeta, cuotasTarjeta', 'safe');
        $rules[] = array('comentario, numeroTarjeta, cuotasTarjeta, usoBono', 'default', 'value' => null);
        $rules[] = array('idFormaPago', 'pagoValidate', 'on' => 'pago, finalizar');
        $rules[] = array('usoBono', 'bonoValidate', 'on' => 'pago, finalizar');
        $rules[] = array('confirmacion', 'compare', 'compareValue' => 1, 'on' => 'confirmacion, finalizar', 'message' => 'Aceptar términos anteriores');


        if (Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] == Yii::app()->params->entrega['tipo']['presencial']) {
            $rules[] = array('telefonoContacto', 'required', 'on' => 'entrega, finalizar', 'message' => '{attribute} no puede estar vacío');
            $rules[] = array('telefonoContacto', 'length', 'max' => 50, 'on' => 'entrega, finalizar');
        } else {
            $rules[] = array('telefonoContacto', 'safe');
            $rules[] = array('telefonoContacto', 'default', 'value' => null);
        }

        //array('clienteFielValidate', 'on' => 'pago, finalizar'),
        //array('codigoPromocion', 'promocionValidate', 'on' => 'pago, finalizar'),
        //array('descripcion, nombre, barrio, telefono, celular', 'length', 'max' => 50);

        return $rules;
    }

    /**
     * Valida que exista empleado con cedula indicada y que este activo.
     * Este es un validador declarado en rules().
     */
    public function attributeTrim($attribute, $params) {
        if ($this->$attribute != null && gettype($this->$attribute) == "string") {
            $this->$attribute = trim($this->$attribute);
        }
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'identificacionUsuario' => 'Cédula',
            'idDireccionDespacho' => 'Dirección de despacho',
            'fechaEntrega' => 'Programación de entrega',
            'comentario' => 'Comentario adicional',
            'idFormaPago' => 'Forma de pago',
            'numeroTarjeta' => 'Número tarjeta',
            'cuotasTarjeta' => 'Cuotas',
            'confirmacion' => 'Acepto términos anteriores',
            'usoBono' => 'Bono',
            'telefonoContacto' => 'Teléfono de contacto',
            'descripcion' => 'Descripción',
            'nombre' => 'Nombre',
            'direccion' => 'Dirección',
            'barrio' => 'Barrio',
            'telefono' => 'Teléfono',
            'celular' => 'Celular',
            'extension' => 'Extensión',
            'correoElectronico' => 'Correo electrónico',
        );
    }

    public function calcularConfirmacion($positions) {
        $this->confirmacion = null;
        $this->validarConfirmacion($positions);
    }

    public function validarConfirmacion($positions) {
        $listEspecialTmp = $this->listCodigoEspecial;
        $this->listCodigoEspecial = array();

        foreach ($positions as $position) {
            if ($position->isProduct()) {
                if ($position->objProducto->objCodigoEspecial->confirmacionCompra == 1) {
                    $this->listCodigoEspecial[$position->objProducto->objCodigoEspecial->codigoEspecial] = $position->objProducto->objCodigoEspecial;

                    if (!isset($listEspecialTmp[$position->objProducto->objCodigoEspecial->codigoEspecial])) {
                        $this->confirmacion = null;
                        //echo "Cambia Confirmacion [".$position->objProducto->objCodigoEspecial->codigoEspecial."]<br/>";
                    }
                }
            }
        }

        if (empty($this->listCodigoEspecial)) {
            $this->confirmacion = 1;
        }
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function pagoValidate($attribute, $params) {
        if ($this->idFormaPago == Yii::app()->params->formaPago['idCredirebaja']) {
            if ($this->numeroTarjeta === null) {
                $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " no puede estar vacío ");
            } else {
                $this->numeroTarjeta = trim($this->numeroTarjeta);

                if (strlen($this->numeroTarjeta) != 12) {
                    $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " debe tener 12 dígitos");
                }
            }

            if ($this->cuotasTarjeta === null || empty($this->cuotasTarjeta)) {
                $this->addError('cuotasTarjeta', $this->getAttributeLabel('cuotasTarjeta') . " no puede estar vacío");
            } else {
                $int = intval($this->cuotasTarjeta);
                if ($int <= 0 || $int > 6) {
                    $this->addError('cuotasTarjeta', $this->getAttributeLabel('cuotasTarjeta') . " debe ser número entre 1 y 6");
                }
            }
        } else {
            $this->numeroTarjeta = null;
            $this->cuotasTarjeta = null;
            if ($this->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
                if (Yii::app()->shoppingCart->getTotalCost() < Yii::app()->params->formaPago['pasarela']['valorMinimo']) {
                    $this->addError('idFormaPago', "Compra por pasarela debe ser mayor a " . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->params->formaPago['pasarela']['valorMinimo'], Yii::app()->params->formatoMoneda['moneda']));
                }
            }
        }
    }

    public function bonoValidate($attribute, $params) {
        if ($this->bono !== null) {
            if ($this->usoBono == null) {
                $this->addError('usoBono', $this->getAttributeLabel('usoBono') . " no puede estar vacío");
            } else if (!in_array($this->usoBono, array(1, 0))) {
                $this->addError('usoBono', $this->getAttributeLabel('usoBono') . " inválido");
            }
        }
    }

    public function consultarBono($total) {
        $this->bono = null;

        try {
            $client = new SoapClient(null, array(
                'location' => Yii::app()->params->webServiceUrl['crmLrv'],
                'uri' => "",
                'trace' => 1
            ));
            $result = $client->__soapCall("ConsultarBono", array('identificacion' => $this->identificacionUsuario));

            if (!empty($result) && $result[0]->ESTADO == 1 && $result[0]->VALOR_BONO > 0 && $result[0]->VALOR_BONO <= $total) {
                $this->bono = array(
                    'valor' => $result[0]->VALOR_BONO,
                    'vigenciaInicio' => $result[0]->VIGENCIA_INICIO,
                    'vigenciaFin' => $result[0]->VIGENCIA_FINA
                );
            }
        } catch (Exception $exc) {
            Yii::log("Error WebService ConsultarBono\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
        }
    }

    public function consultarHorario($objSectorCiudad) {
        $this->objHorarioCiudadSector = HorariosCiudadSector::model()->find(array(
            'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND estadoCiudadSector=:estado',
            'params' => array(
                ':estado' => 1,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector
            )
        ));
    }

    public function consultarDisponibilidad($shoppingCart) {
        //$positions = $shoppingCart->getPositions();
        $this->indicePuntoVenta = null;
        $this->listPuntosVenta = array(0 => 0, 1 => 'Consulta no exitosa');

        $productos = array();
        foreach ($shoppingCart->getPositions() as $position) {
            if ($position->isProduct()) {
                $productos[] = array(
                    "CODIGO_PRODUCTO" => $position->objProducto->codigoProducto,
                    "ID_PRODUCTO" => $position->objProducto->codigoProducto,
                    "CANTIDAD" => $position->getQuantityUnit(),
                    "DESCRIPCION" => $position->objProducto->descripcionProducto,
                );
            }
        }

        /* CVarDumper::dump($productos,10,true);
          echo "<br/>";
          echo "<br/>"; */
        try {
            $client = new SoapClient(null, array(
                'location' => Yii::app()->params->webServiceUrl['serverLRV'],
                'uri' => "",
                'trace' => 1
            ));
            $this->listPuntosVenta = $client->__soapCall("LRVConsultarSaldoMovil", array(
                'productos' => $productos,
                'ciudad' => $shoppingCart->getCodigoCiudad(),
                'sector' => $shoppingCart->getCodigoSector()
            ));
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            $this->listPuntosVenta = array(0 => 0, 1 => 'Error al consultar disponibilidad de productos');
        }

        if (empty($this->listPuntosVenta)) {
            $this->listPuntosVenta = array(0 => 0, 1 => 'No hay disponibilidad de productos');
        }

        //CVarDumper::dump($this->listPuntosVenta,10,true);
        //exit();
        // Ordenar de mayor a menor los puntos de venta de acuerdo a 
        /*    for($i=0;$i<count($this->listPuntosVenta[1]);$i++){
          for($j=0;$j<count($this->listPuntosVenta[1])-1;$j++){
          $valuej=0;
          $valuej1=0;
          if(isset($this->listPuntosVenta[1][$j][5])){
          $valuej=$this->listPuntosVenta[1][$j][5];
          }
          if(isset($this->listPuntosVenta[1][$j+1][5])){
          $valuej1=$this->listPuntosVenta[1][$j+1][5];
          }

          if($valuej<$valuej1){
          $aux=$this->listPuntosVenta[1][$j];
          $this->listPuntosVenta[1][$j]=$this->listPuntosVenta[1][$j+1];;
          $this->listPuntosVenta[1][$j+1]=$aux;
          }
          }
          }
         */
        $this->listPuntosVenta[3] = 0;

        //recorrer lista para eliminar pdvs no encontrados 
        //recalcular cantidades y saldos teniendo en cuenta fracciones
        //y definir si alguno tiene 100% en pos 3 0:no, 1:si
        if ($this->listPuntosVenta[0] == 1) {
            foreach ($this->listPuntosVenta[1] as $indicePdv => $pdv) {
                if ($pdv[0] == 1 && !empty($pdv[4])) {
                    if ($pdv[5] == 100) {
                        $this->listPuntosVenta[3] = 1;
                    }

                    $objPdv = PuntoVenta::model()->find(array("condition" => "idComercial=:comercial", 'params' => array(':comercial' => $pdv[1])));
                    $this->listPuntosVenta[1][$indicePdv]['HORA_INICIO'] = null;
                    $this->listPuntosVenta[1][$indicePdv]['HORA_FIN'] = null;
                    $dia = 'festivo';
                    $fecha = new DateTime;
                    //si no es festivo, se verifica el dia de la semana
                    if (DiasFestivos::esFestivo($fecha)) {
                        $dia = $fecha->format('w');
                    }
                    $foraneaHorario = HorarioPuntoVenta::getHorariosDias()[$dia]['foranea'];
                    $horario = $objPdv->$foraneaHorario;

                    if ($horario !== null) {
                        $this->listPuntosVenta[1][$indicePdv]['HORA_INICIO'] = DateTime::createFromFormat('H:i:s', $horario->horarioInicio);
                        $this->listPuntosVenta[1][$indicePdv]['HORA_FIN'] = DateTime::createFromFormat('H:i:s', $horario->horarioFin);
                    }

                    foreach ($pdv[4] as $indiceProd => $producto) {
                        $arrSaldo = $this->decimalToUnidFracc($producto->SALDO);
                        if ($arrSaldo['UNIDAD'] <= 0 && $arrSaldo['FRACCION'] <= 0) {
                            unset($this->listPuntosVenta[1][$indicePdv][4][$indiceProd]);
                        } else {
                            $arrCantidad = $this->decimalToUnidFracc($producto->CANTIDAD);
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->CANTIDAD_UNIDAD = $arrCantidad['UNIDAD'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->CANTIDAD_FRACCION = $arrCantidad['FRACCION'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->SALDO_UNIDAD = $arrSaldo['UNIDAD'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->SALDO_FRACCION = $arrSaldo['FRACCION'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->COMPLETITUD_UNIDAD = $arrSaldo['UNIDAD'] >= $arrCantidad['UNIDAD'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->COMPLETITUD_FRACCION = $arrSaldo['FRACCION'] >= $arrCantidad['FRACCION'];
                        }
                    }
                } else {
                    unset($this->listPuntosVenta[1][$indicePdv]);
                }
            }
        }
    }

    public function pdvSeleccionado() {
        return ($this->indicePuntoVenta != null);
    }

    public function seleccionarPdv($indicePdv) {
        if (!empty($this->listPuntosVenta)) {
            $puntoVenta = $this->listPuntosVenta[1][$indicePdv];
            $this->indicePuntoVenta = $indicePdv;
            $arrPositions = array();

            //recorrer productos y actualiar carro
            foreach ($puntoVenta[4] as $indiceProd => $producto) {
                $position = Yii::app()->shoppingCart->itemAt($producto->CODIGO_PRODUCTO);

                if ($position !== null) {
                    $arrPositions[$producto->CODIGO_PRODUCTO] = $producto->CODIGO_PRODUCTO;
                    if ($producto->SALDO_UNIDAD >= $producto->CANTIDAD_UNIDAD) {
                        Yii::app()->shoppingCart->update($position, false, $producto->CANTIDAD_UNIDAD);
                    } else {
                        Yii::app()->shoppingCart->update($position, false, $producto->SALDO_UNIDAD);
                    }

                    if ($producto->SALDO_FRACCION >= $producto->CANTIDAD_FRACCION) {
                        Yii::app()->shoppingCart->update($position, true, $producto->CANTIDAD_FRACCION);
                    } else {
                        Yii::app()->shoppingCart->update($position, true, $producto->SALDO_UNIDAD);
                    }
                }
            }

            foreach (Yii::app()->shoppingCart->getPositions() as $position) {
                if ($position->isProduct()) {
                    if (!isset($arrPositions[$position->objProducto->codigoProducto])) {
                        Yii::app()->shoppingCart->remove($position->objProducto->codigoProducto);
                    }
                }
            }
        }
    }

    private function decimalToUnidFracc($n) {
        /* $aux = (string) $n;
          $n = explode(".", $aux);
          return array(
          'UNIDAD' => isset($n[0]) ? $n[0] : 0,
          'FRACCION' => isset($n[1]) ? $n[1] : 0
          ); */

        return array(
            'UNIDAD' => $n,
            'FRACCION' => 0
        );
    }

    public static function

    listDataCuotas() {
        return array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6);
    }

    public function

    listDataHoras($deltaHorario = "0 1:00:0.000000") {
        $horariosDia = array(
            '0' => array('inicio' => 'horaInicioDomingoFestivo', 'fin' => 'horaFinDomingoFestivo'),
            '1' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '2' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '3' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '4' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '5' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '6' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            'festivo' => array('inicio' => 'horaInicioDomingoFestivo', 'fin' => 'horaFinDomingoFestivo')
        );

        $horaIniServicio = "07:00:00";
        $horaFinServicio = "23:00:00";

        Yii::log("Listhoras1: $horaFinServicio" . "\n", CLogger::LEVEL_INFO, 'application');

        if ($this->objHorarioCiudadSector != null) {
            $dia = 'festivo';
            $ahora = new DateTime;
            //si no es festivo, se verifica el dia de la semana
            if (!DiasFestivos::esFestivo($ahora)) {
                $dia = $ahora->format('w');
            }
            $horaIniServicio = $this->objHorarioCiudadSector->$horariosDia[$dia]['inicio'];
            $horaFinServicio = $this->objHorarioCiudadSector->$horariosDia[$dia]['fin'];

            Yii::log("Listhoras2: $horaFinServicio" . "\n", CLogger::LEVEL_INFO, 'application');
        }

        $sql = "SELECT idHorario, concat('Hoy a las ', DATE_FORMAT(hora, '%h:%i %p')) as etiqueta, concat(curdate(), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as fecha, hora
             FROM   m_Horario
             WHERE  hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '" . $horaFinServicio . "' and (hora >= ADDTIME(CURTIME(), '" . $deltaHorario . "'))
             UNION
             SELECT idHorario, concat('Ma&ntilde;ana a las ', DATE_FORMAT(hora, '%h:%i %p')) as etiqueta, concat(DATE_ADD(CURDATE(), INTERVAL 1 DAY), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as fecha, hora
             FROM m_Horario
             WHERE (hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '12:00') ORDER BY fecha";

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $rows = $command->queryAll();

        /* if (empty($rows)) {
          $headers = "MIME-Version: 1.0\r\n";
          $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
          $headers .= "FROM: La Rebaja Virtual <infolrv@copservir.com>";

          $para = "alexander_javela@copservir.com";
          $asunto = "FALLO SELECT PEDIDOS " . $idPedido;
          $mensaje = $sql;
          mail($para, $asunto, $mensaje, $headers);

          $r_horas = $this->_db->fetchAll($sql);
          } */

        return $rows;
    }

    public function fechaValidate($attribute, $params) {
        if ($this->fechaEntrega != null) {
            Yii::log("Fecha entrega: $this->fechaEntrega\n", CLogger::LEVEL_INFO, 'application');
            $listHoras = $this->listDataHoras();
            $valido = false;

            Yii::log("Listhoras:" . CVarDumper::dumpAsString($listHoras) . "\n", CLogger::LEVEL_INFO, 'application');

            foreach ($listHoras as $hora) {
                Yii::log("Hora: " . CVarDumper::dumpAsString($hora) . "\n", CLogger::LEVEL_INFO, 'application');
                if ($hora['fecha'] == $this->fechaEntrega) {
                    Yii::log("Hora igual: " . CVarDumper::dumpAsString($hora) . "\n", CLogger::LEVEL_INFO, 'application');
                    $valido = true;
                    break;
                }
            }

            if (!$valido) {
                $this->addError('fechaEntrega', $this->getAttributeLabel('fechaEntrega') . " no disponible");
            }
        }
    }

    public function validarPasos($pasosDisponibles, &$paso) {
        //validar pasos anteriores
        foreach ($pasosDisponibles as $idx => $pasoAux) {
            if (strcmp($pasoAux, $paso) == 0)
                break;

            if (!isset($this->pasoValidado[$pasoAux])) {
                $paso = $pasoAux;
                break;
            }
        }
    }

}
