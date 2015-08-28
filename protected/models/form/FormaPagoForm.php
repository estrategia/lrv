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
    public $tarjetaNumero;
    public $numeroCuotas;
    public $bono;
    public $usoBono = 0;
    public $confirmacion;
    public $listCodigoEspecial = array();
    public $pasoValidado = array();
    public $listPuntosVenta = array(0 => 0, 1 => 'No consultado');
    public $indicePuntoVenta;
    public $objHorarioCiudadSector = null;
    public $pagoExpress = false;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('identificacionUsuario', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('idDireccionDespacho', 'required', 'on' => 'despacho, finalizar', 'message' => '{attribute} no puede estar vacío'),
            array('fechaEntrega', 'required', 'on' => 'entrega, finalizar', 'message' => '{attribute} no puede estar vacío'),
            array('comentario', 'length', 'max' => 250, 'on' => 'entrega, finalizar', 'message' => '{attribute} no puede estar vacío'),
            array('fechaEntrega', 'fechaValidate', 'on' => 'entrega, finalizar'),
            array('idFormaPago', 'required', 'on' => 'pago, finalizar', 'message' => '{attribute} no puede estar vacío'),
            array('tarjetaNumero, numeroCuotas', 'safe'),
            array('comentario, tarjetaNumero, numeroCuotas, usoBono', 'default', 'value' => null),
            array('idFormaPago', 'pagoValidate', 'on' => 'pago, finalizar'),
            array('usoBono', 'bonoValidate', 'on' => 'pago, finalizar'),
            //array('clienteFielValidate', 'on' => 'pago, finalizar'),
            //array('codigoPromocion', 'promocionValidate', 'on' => 'pago, finalizar'),
            array('confirmacion', 'compare', 'compareValue' => 1, 'on' => 'confirmacion', 'message' => 'Aceptar términos y condiciones'),
        );
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
            'tarjetaNumero' => 'Número tarjeta',
            'numeroCuotas' => 'Cuotas',
            'confirmacion' => 'Acepto términos y condiciones',
            'usoBono' => 'Bono'
        );
    }

    public function calcularConfirmacion($positions) {
        $this->confirmacion = null;
        $this->listCodigoEspecial = array();
        foreach ($positions as $position) {
            if ($position->isProduct()) {
                if ($position->objProducto->objCodigoEspecial->confirmacionCompra == 1) {
                    $this->listCodigoEspecial[$position->objProducto->objCodigoEspecial->codigoEspecial] = $position->objProducto->objCodigoEspecial;
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
            if ($this->tarjetaNumero === null) {
                $this->addError('tarjetaNumero', $this->getAttributeLabel('tarjetaNumero') . " no puede estar vacío ");
            } else {
                $this->tarjetaNumero = trim($this->tarjetaNumero);

                if (strlen($this->tarjetaNumero) != 12) {
                    $this->addError('tarjetaNumero', $this->getAttributeLabel('tarjetaNumero') . " debe tener 12 dígitos");
                }
            }

            if ($this->numeroCuotas === null || empty($this->numeroCuotas)) {
                $this->addError('numeroCuotas', $this->getAttributeLabel('numeroCuotas') . " no puede estar vacío");
            } else {
                $int = intval($this->numeroCuotas);
                if ($int <= 0 || $int > 6) {
                    $this->addError('numeroCuotas', $this->getAttributeLabel('numeroCuotas') . " debe ser número entre 1 y 6");
                }
            }
        } else {
            $this->tarjetaNumero = null;
            $this->numeroCuotas = null;
            if ($this->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
                if(Yii::app()->shoppingCart->getTotalCost()<Yii::app()->params->formaPago['pasarela']['valorMinimo']){
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

        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['crmLrv'],
            'uri' => "",
            'trace' => 1
        ));
        $result = $client->__soapCall("ConsultarBono", array('identificacion' => $this->identificacionUsuario));

        if (!empty($result) && $result[0]->ESTADO == 1 && $result[0]->VALOR_BONO > 0 && $result[0]->VALOR_BONO <= $total) {
            $this->bono = array(
                'valor' => $result[0]->VALOR_BONO,
                'vigencia' => DateTime::createFromFormat('Y-m-d', '2015-06-01')
            );
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
        
        /*CVarDumper::dump($productos,10,true);
        echo "<br/>";
        echo "<br/>";*/
        
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
        
        if(empty($this->listPuntosVenta)){
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
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->COMPLETITUD_UNIDAD = $arrSaldo['UNIDAD']>=$arrCantidad['UNIDAD'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->COMPLETITUD_FRACCION = $arrSaldo['FRACCION']>=$arrCantidad['FRACCION'];
                        }
                    }
                } else {
                    unset($this->listPuntosVenta[1][$indicePdv]);
                }
            }
        }
    }

    private function decimalToUnidFracc($n) {
        /*$aux = (string) $n;
        $n = explode(".", $aux);
        return array(
            'UNIDAD' => isset($n[0]) ? $n[0] : 0,
            'FRACCION' => isset($n[1]) ? $n[1] : 0
        );*/
        
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

        if ($this->objHorarioCiudadSector != null) {
            $dia = 'festivo';
            $ahora = new DateTime;
            //si no es festivo, se verifica el dia de la semana
            if (!DiasFestivos::esFestivo($ahora)) {
                $dia = $ahora->format('w');
            }
            $horaIniServicio = $this->objHorarioCiudadSector->$horariosDia[$dia]['inicio'];
            $horaFinServicio = $this->objHorarioCiudadSector->$horariosDia[$dia]['fin'];
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

    public
            function fechaValidate($attribute, $params) {
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
