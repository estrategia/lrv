<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormaPagoVitalCallForm
 *
 * @author miguel.sanchez
 */
class FormaPagoVitalCallForm extends CFormModel {

    //put your code here
    public $identificacionUsuario;
    public $fechaEntrega;
    public $comentario;
    public $idFormaPago;
    public $numeroTarjeta;
    public $cuotasTarjeta;
    public $confirmacion;
    public $listCodigoEspecial = array();
    public $pasoValidado = array();
    public $listPuntosVenta = array(0 => 0, 1 => 'No consultado');
    public $indicePuntoVenta;
    public $objHorarioCiudadSector = null;
    public $pagoInvitado = true;
    public $tipoEntrega;
    public $totalCompra = null;
    public $objSectorCiudad = null;
    
    public $objDireccion = null;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        //Yii::log("validacion 0\n", CLogger::LEVEL_INFO, 'application');
        $rules = array();
        $rules[] = array('tipoEntrega', 'required', 'message' => '{attribute} no puede estar vacío');
        $rules[] = array('tipoEntrega', 'in', 'range' => Yii::app()->params->entrega['listaTipos'], 'allowEmpty' => false);
        $rules[] = array('tipoEntrega', 'tipoEntregaValidate');

        $rules[] = array('identificacionUsuario', 'required', 'message' => '{attribute} no puede estar vacío');

        //Yii::log("validacion 1\n", CLogger::LEVEL_INFO, 'application');
        //Yii::log("this->pagoInvitado: " . CVarDumper::dumpAsString($this->pagoInvitado) . "\n", CLogger::LEVEL_INFO, 'application');

            //Yii::log("validacion 7\n", CLogger::LEVEL_INFO, 'application');

        //Yii::log("validacion 10\n", CLogger::LEVEL_INFO, 'application');

        $rules[] = array('fechaEntrega', 'required', 'on' => 'entrega, informacion, finalizar', 'message' => '{attribute} no puede estar vacío');
        $rules[] = array('comentario', 'length', 'max' => 250, 'on' => 'entrega, informacion, finalizar');
        $rules[] = array('fechaEntrega', 'fechaValidate', 'on' => 'entrega, informacion, finalizar');
        $rules[] = array('idFormaPago', 'required', 'on' => 'pago, informacion, finalizar', 'message' => 'Seleccionar forma de pago');
        $rules[] = array('numeroTarjeta, cuotasTarjeta', 'safe');
        $rules[] = array('comentario, numeroTarjeta, cuotasTarjeta', 'default', 'value' => null);
        $rules[] = array('idFormaPago', 'pagoValidate', 'on' => 'pago, informacion, finalizar');
        $rules[] = array('confirmacion', 'compare', 'compareValue' => 1, 'on' => 'confirmacion, finalizar', 'message' => 'Aceptar términos anteriores');

        if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
            //Yii::log("validacion 11\n", CLogger::LEVEL_INFO, 'application');
            $rules[] = array('indicePuntoVenta', 'required', 'on' => 'informacion', 'message' => 'Seleccionar Punto de Venta');
        } else if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
            //Yii::log("validacion 12\n", CLogger::LEVEL_INFO, 'application');
            $rules[] = array('indicePuntoVenta', 'safe');
            $rules[] = array('indicePuntoVenta', 'default', 'value' => null);
        }

        //Yii::log("validacion 13\n", CLogger::LEVEL_INFO, 'application');

        //Yii::log("Rules:\n" . CVarDumper::dumpAsString($rules), CLogger::LEVEL_INFO, 'application');

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
            'fechaEntrega' => 'Programación de entrega',
            'comentario' => 'Comentario adicional',
            'idFormaPago' => 'Forma de pago',
            'numeroTarjeta' => 'Número tarjeta',
            'cuotasTarjeta' => 'Cuotas',
            'confirmacion' => 'Acepto términos anteriores',
            'indicePuntoVenta' => 'Punto de Venta',
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
                if ($position->getObjProducto()->objCodigoEspecial->confirmacionCompra == 1) {
                    $this->listCodigoEspecial[$position->getObjProducto()->objCodigoEspecial->codigoEspecial] = $position->getObjProducto()->objCodigoEspecial;

                    if (!isset($listEspecialTmp[$position->getObjProducto()->objCodigoEspecial->codigoEspecial])) {
                        $this->confirmacion = null;
                        //echo "Cambia Confirmacion [".$position->getObjProducto()->objCodigoEspecial->codigoEspecial."]<br/>";
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
        //Yii::log("pagoValidate IN\n", CLogger::LEVEL_INFO, 'application');

        if ($this->idFormaPago == Yii::app()->params->formaPago['idCredirebaja']) {
            if ($this->numeroTarjeta === null) {
                $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " no puede estar vacío ");
            } else {
                $this->numeroTarjeta = trim($this->numeroTarjeta);

                if (is_numeric($this->numeroTarjeta)) {
                    if (strlen($this->numeroTarjeta) != 12) {
                        $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " debe tener 12 dígitos");
                    }
                } else {
                    $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " debe ser numerico");
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
            //Yii::log("pagoValidate -- formapago:$this->idFormaPago -- total: " . $totalCompra , CLogger::LEVEL_INFO, 'application');
            $this->numeroTarjeta = null;
            $this->cuotasTarjeta = null;
            $totalCompra = $this->totalCompra;
            
            if ($this->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
                //Yii::log("pagoValidate -- IN PASARELA " , CLogger::LEVEL_INFO, 'application');

                if ($totalCompra < Yii::app()->params->formaPago['pasarela']['valorMinimo']) {
                    //Yii::log("pagoValidate -- IN VALOR MINIMO PASARELA " , CLogger::LEVEL_INFO, 'application');
                    $this->addError('idFormaPago', "Compra por pasarela debe ser mayor a " . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->params->formaPago['pasarela']['valorMinimo'], Yii::app()->params->formatoMoneda['moneda']));
                }
            }
        }
    }

    public function consultarHorario() {
        if ($this->objSectorCiudad != null) {
            if ($this->objHorarioCiudadSector == null || $this->objHorarioCiudadSector->codigoCiudad != $this->objSectorCiudad->codigoCiudad || $this->objHorarioCiudadSector->codigoSector != $this->objSectorCiudad->codigoSector) {
	            $this->objHorarioCiudadSector = HorariosCiudadSector::model()->find(array(
	                'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND estadoCiudadSector=:estado',
	                'params' => array(
	                    ':estado' => 1,
	                    ':ciudad' => $this->objSectorCiudad->codigoCiudad,
	                    ':sector' => $this->objSectorCiudad->codigoSector
	                )
	            ));
            }
        }
    }

    public function tieneDomicilio() {
        $this->consultarHorario();

        if ($this->objHorarioCiudadSector == null || ($this->objHorarioCiudadSector != null && $this->objHorarioCiudadSector->sadCiudadSector == 0)) {
            return false;
        }

        return true;
    }

    public function consultarDisponibilidad($shoppingCart) {
        //$positions = $shoppingCart->getPositions();
        
        $this->indicePuntoVenta = null;
        $this->listPuntosVenta = array(0 => 0, 1 => 'Consulta no exitosa');

        $arrUnidadFracc = array();

        $productos = array();
        foreach ($shoppingCart->getPositions() as $position) {
            if ($position->getObjProducto() instanceof Producto) {
                $productos[] = array(
                    "CODIGO_PRODUCTO" => $position->getObjProducto()->codigoProducto,
                    "ID_PRODUCTO" => $position->getObjProducto()->codigoProducto,
                    "CANTIDAD" => intval($position->getQuantityUnit()),
                    "FRACCION" => $position->getQuantity(true) * $position->getObjProducto()->unidadFraccionamiento,
                    "DESCRIPCION" => $position->getObjProducto()->descripcionProducto,
                );
            }

            $arrUnidadFracc[$position->getObjProducto()->codigoProducto] = $position->getObjProducto()->unidadFraccionamiento;
        }

          /*CVarDumper::dump($productos,10,true);
          echo "<br/>";
          echo "<br/>";*/
          //exit();
          try {
            $client = new SoapClient(null, array(
                'location' => Yii::app()->params->webServiceUrl['serverLRV'],
                'uri' => "",
                'trace' => 1
            ));
            $this->listPuntosVenta = $client->__soapCall("LRVConsultarSaldoMovilNEW", array(
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

                    if ($objPdv === null) {
                        unset($this->listPuntosVenta[1][$indicePdv]);
                        continue;
                    }

                    $this->listPuntosVenta[1][$indicePdv]['HORA_INICIO'] = null;
                    $this->listPuntosVenta[1][$indicePdv]['HORA_FIN'] = null;
                    $dia = 'festivo';
                    $fecha = new DateTime;
                    //si no es festivo, se verifica el dia de la semana
                    if (!DiasFestivos::esFestivo($fecha)) {
                        $dia = $fecha->format('w');
                    }
                    $foraneaHorario = HorarioPuntoVenta::getHorariosDias()[$dia]['foranea'];
                    $horario = $objPdv->$foraneaHorario;

                    if ($horario !== null) {
                        $this->listPuntosVenta[1][$indicePdv]['HORA_INICIO'] = DateTime::createFromFormat('Y-m-d H:i:s', $fecha->format('Y-m-d') . " $horario->HorarioInicio");
                        $this->listPuntosVenta[1][$indicePdv]['HORA_FIN'] = DateTime::createFromFormat('Y-m-d H:i:s', $fecha->format('Y-m-d') . " $horario->HorarioFin");
                    }

                    if ($this->listPuntosVenta[1][$indicePdv]['HORA_INICIO'] == null || $this->listPuntosVenta[1][$indicePdv]['HORA_FIN'] == null) {
                        unset($this->listPuntosVenta[1][$indicePdv]);
                        continue;
                    }

                    $diffIni = $this->listPuntosVenta[1][$indicePdv]['HORA_INICIO']->diff($fecha);
                    $diffFin = $fecha->diff($this->listPuntosVenta[1][$indicePdv]['HORA_FIN']);

                    if ($diffIni->invert == 1 || $diffFin->invert == 1) {
                        unset($this->listPuntosVenta[1][$indicePdv]);
                        continue;
                    }

                    foreach ($pdv[4] as $indiceProd => $producto) {
                        $arrSaldo = $this->decimalToUnidFracc($producto->SALDO, $arrUnidadFracc[$producto->CODIGO_PRODUCTO]);
                        $arrCantidad = $this->decimalToUnidFracc($producto->CANTIDAD . "." . $producto->FRACCION, $arrUnidadFracc[$producto->CODIGO_PRODUCTO]);
                        $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->CANTIDAD_UNIDAD = $arrCantidad['UNIDAD'];
                        $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->CANTIDAD_FRACCION = $arrCantidad['FRACCION'];
                        $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->SALDO_UNIDAD = $arrSaldo['UNIDAD'];
                        $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->SALDO_FRACCION = $arrSaldo['FRACCION'];
                        $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->COMPLETITUD_UNIDAD = $arrSaldo['UNIDAD'] >= $arrCantidad['UNIDAD'];
                        $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->COMPLETITUD_FRACCION = $arrSaldo['FRACCION'] >= $arrCantidad['FRACCION'];
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
                $position = Yii::app()->shoppingCartVitalCall->itemAt($producto->CODIGO_PRODUCTO);

                if ($position !== null) {
                    $arrPositions[$producto->CODIGO_PRODUCTO] = $producto->CODIGO_PRODUCTO;
                    if ($producto->SALDO_UNIDAD >= $producto->CANTIDAD_UNIDAD) {
                        Yii::app()->shoppingCartVitalCall->update($position, false, $producto->CANTIDAD_UNIDAD);
                    } else {
                        Yii::app()->shoppingCartVitalCall->update($position, false, $producto->SALDO_UNIDAD);
                    }

                    if ($producto->SALDO_FRACCION >= $producto->CANTIDAD_FRACCION) {
                        Yii::app()->shoppingCartVitalCall->update($position, true, $producto->CANTIDAD_FRACCION);
                    } else {
                        Yii::app()->shoppingCartVitalCall->update($position, true, $producto->SALDO_UNIDAD);
                    }
                }
            }

            foreach (Yii::app()->shoppingCartVitalCall->getPositions() as $position) {
                if ($position->isProduct()) {
                    if (!isset($arrPositions[$position->getObjProducto()->codigoProducto])) {
                        Yii::app()->shoppingCartVitalCall->remove($position->getObjProducto()->codigoProducto);
                    }
                }
            }
        }
    }

    private function decimalToUnidFracc($n, $uFracc) {
        $aux = (string) $n;
        $n = explode(".", $aux);

        $arrCantidad = array(
            'UNIDAD' => 0,
            'FRACCION' => 0
        );

        if (isset($n[0])) {
            $arrCantidad['UNIDAD'] = intval($n[0]);
        }

        if (isset($n[1])) {
            $arrCantidad['FRACCION'] = intval($n[1]);
        }

        if ($arrCantidad['FRACCION'] > 0) {
            $arrCantidad['FRACCION'] = intval($arrCantidad['FRACCION'] / $uFracc);
        }

        return $arrCantidad;

        /* return array(
          'UNIDAD' => $n,
          'FRACCION' => 0
          ); */
    }

    public static function listDataCuotas() {
        return array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5);
    }

    public function listDataHoras() {
        $deltaHorario = Yii::app()->params->horarioEntrega['deltaDefecto'];
        $this->consultarHorario();

        if ($this->objSectorCiudad !== null) {
            if (isset(Yii::app()->params->horarioEntrega['deltaHorarios'][$this->objSectorCiudad->codigoCiudad])) {
                $arrHorario = Yii::app()->params->horarioEntrega['deltaHorarios'][$this->objSectorCiudad->codigoCiudad];

                $fActual = new DateTime;
                $fInicio = DateTime::createFromFormat('Y-m-d H:i:s', $arrHorario['fechaInicio']);
                $fFin = DateTime::createFromFormat('Y-m-d H:i:s', $arrHorario['fechaFin']);

                $diffInicio = $fInicio->diff($fActual);
                $diffFin = $fActual->diff($fFin);

                if ($diffInicio->invert == 0 && $diffFin->invert == 0) {
                    $deltaHorario = $arrHorario['deltaHorario'];
                }
            }
        }

        $horariosDia = array(
            '0' => array('inicio' => 'horaInicioDomingoFestivo', 'fin' => 'horaFinDomingoFestivo', 'inicioAdicional' => 'horaInicioAdicionalDomingoFestivo', 'finAdicional' => 'horaFinAdicionalDomingoFestivo'),
            '1' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado', 'inicioAdicional' => 'horaInicioAdicionalLunesASabado', 'finAdicional' => 'horaFinAdicionalLunesASabado'),
            '2' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado', 'inicioAdicional' => 'horaInicioAdicionalLunesASabado', 'finAdicional' => 'horaFinAdicionalLunesASabado'),
            '3' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado', 'inicioAdicional' => 'horaInicioAdicionalLunesASabado', 'finAdicional' => 'horaFinAdicionalLunesASabado'),
            '4' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado', 'inicioAdicional' => 'horaInicioAdicionalLunesASabado', 'finAdicional' => 'horaFinAdicionalLunesASabado'),
            '5' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado', 'inicioAdicional' => 'horaInicioAdicionalLunesASabado', 'finAdicional' => 'horaFinAdicionalLunesASabado'),
            '6' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado', 'inicioAdicional' => 'horaInicioAdicionalLunesASabado', 'finAdicional' => 'horaFinAdicionalLunesASabado'),
            'festivo' => array('inicio' => 'horaInicioDomingoFestivo', 'fin' => 'horaFinDomingoFestivo', 'inicioAdicional' => 'horaInicioAdicionalDomingoFestivo', 'finAdicional' => 'horaFinAdicionalDomingoFestivo')
        );

        $horaIniServicio = "07:00:00";
        $horaFinServicio = "23:00:00";
        $horaInicioAdicional = null;
        $horaFinAdicional = null;

        if ($this->objHorarioCiudadSector != null) {
            $dia = 'festivo';
            $ahora = new DateTime;
            //si no es festivo, se verifica el dia de la semana
            if (!DiasFestivos::esFestivo($ahora)) {
                $dia = $ahora->format('w');
            }
            $horaIniServicio = $this->objHorarioCiudadSector->$horariosDia[$dia]['inicio'];
            $horaFinServicio = $this->objHorarioCiudadSector->$horariosDia[$dia]['fin'];
            $horaInicioAdicional = $this->objHorarioCiudadSector->$horariosDia[$dia]['inicioAdicional'];
            $horaFinAdicional = $this->objHorarioCiudadSector->$horariosDia[$dia]['finAdicional'];
        }

        $sqlAdicional = "";

        if (!empty($horaInicioAdicional) && !empty($horaFinAdicional)) {
            $sqlAdicional = "SELECT idHorario, concat('Ma&ntilde;ana a las ', DATE_FORMAT(hora, '%h:%i %p')) as etiqueta, concat(DATE_ADD(CURDATE(), INTERVAL 1 DAY), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as fecha, hora 
                FROM   m_Horario 
                WHERE hora between '$horaInicioAdicional' and '$horaFinAdicional' 
                UNION
                ";
        }

        $sql = "SELECT idHorario, concat('Hoy a las ', DATE_FORMAT(hora, '%h:%i %p')) as etiqueta, concat(curdate(), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as fecha, hora
             FROM   m_Horario
             WHERE  hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '" . $horaFinServicio . "' and (hora >= ADDTIME(CURTIME(), '" . $deltaHorario . "'))
             UNION 
             $sqlAdicional SELECT idHorario, concat('Ma&ntilde;ana a las ', DATE_FORMAT(hora, '%h:%i %p')) as etiqueta, concat(DATE_ADD(CURDATE(), INTERVAL 1 DAY), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as fecha, hora
             FROM m_Horario
             WHERE (hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '12:00') ORDER BY fecha";

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $rows = $command->queryAll();

        if (empty($rows)) {
            try {
                sendHtmlEmail(Yii::app()->params->callcenter['correo'], "FALLO SELECT HORARIO ENTREGA PEDIDOS", $sql);
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n" . "FALLO SELECT HORARIO ENTREGA PEDIDOS: $sql", CLogger::LEVEL_ERROR, 'application');
            }
        }

        return $rows;
    }

    public function tipoEntregaValidate($attribute, $params) {
        if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial'] && Yii::app()->shoppingCartVitalCall->getStoredItemsCount() > 0) {
            $this->addError($attribute, "Pasar por el pedido no diponible");
        }

        if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio'] && !$this->tieneDomicilio($this->objSectorCiudad)) {
            $this->addError($attribute, "La ubicaci&oacute;n seleccionada no cuenta con entrega a domicilio");
        }
    }

    public function fechaValidate($attribute, $params) {
        if ($this->fechaEntrega != null) {
            $listHoras = $this->listDataHoras();
            $valido = false;

            foreach ($listHoras as $hora) {
                if ($hora['fecha'] == $this->fechaEntrega) {
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
