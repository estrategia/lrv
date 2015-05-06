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
                if ($position->objProducto->objCodigoEspecial->confirmacionCompra == "SI") {
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

        if (true) {
            $this->bono = array(
                'valor' => 2000,
                'vigencia' => DateTime::createFromFormat('Y-m-d', '2015-06-01')
            );

            /*if ($this->bono['valor'] > $total) {
                $this->bono = null;
            }*/
        }
    }

    public function consultarDisponibilidad($positions) {
        $this->listPuntosVenta = array(0 => 0, 1 => 'Consulta no exitosa');

        if (rand(0, 9) > -1) {
            $this->listPuntosVenta = array(
                0 => 1,
                1 => array(//lista pdvs
                    0 => array(
                        0 => 1,
                        1 => '427',
                        2 => 'Rebaja plus no 1 ciudad jardin',
                        3 => 'Direccion xxx 1',
                        4 => array(//lista productos de pdv
                            0 => array(
                                'CODIGO_PRODUCTO' => 30128,
                                'ID_PRODUCTO' => 30128,
                                'CANTIDAD' => 1.2,
                                'DESCRIPCION' => 'DOLEX GRIPA',
                                'SALDO' => 1.0,
                            ),
                            1 => array(
                                'CODIGO_PRODUCTO' => 41076,
                                'ID_PRODUCTO' => 41076,
                                'CANTIDAD' => 2,
                                'DESCRIPCION' => 'PAPAS MARGARITA LIMON FAMILIAR',
                                'SALDO' => 1,
                            )
                        ),
                        5 => 80
                    ),
                    1 => array(
                        0 => 1,
                        1 => '4A1',
                        2 => 'Rebaja plus no 4 jardin plaza',
                        3 => 'Direccion xxx 2',
                        4 => array(//lista productos de pdv
                            0 => array(
                                'CODIGO_PRODUCTO' => 30128,
                                'ID_PRODUCTO' => 30128,
                                'CANTIDAD' => 2.5,
                                'DESCRIPCION' => 'DOLEX GRIPA',
                                'SALDO' => 1.0,
                            ),
                            1 => array(
                                'CODIGO_PRODUCTO' => 41076,
                                'ID_PRODUCTO' => 41076,
                                'CANTIDAD' => 3,
                                'DESCRIPCION' => 'PAPAS MARGARITA LIMON FAMILIAR',
                                'SALDO' => 1,
                            )
                        ),
                        5 => 60
                    ),
                    2 => array(
                        0 => 1,
                        1 => '405',
                        2 => 'Rebaja no 5 ciudadela comfandi',
                        3 => 'Direccion xxx 3',
                        4 => array(//lista productos de pdv
                            0 => array(
                                'CODIGO_PRODUCTO' => 30128,
                                'ID_PRODUCTO' => 30128,
                                'CANTIDAD' => 2.5,
                                'DESCRIPCION' => 'DOLEX GRIPA',
                                'SALDO' => 2.5,
                            ),
                            1 => array(
                                'CODIGO_PRODUCTO' => 41076,
                                'ID_PRODUCTO' => 41076,
                                'CANTIDAD' => 3,
                                'DESCRIPCION' => 'PAPAS MARGARITA LIMON FAMILIAR',
                                'SALDO' => 3,
                            )
                        ),
                        5 => 90
                    ),
                    3 => array(
                        0 => 0,
                        1 => -1,
                        2 => 'SIN NOMBRE',
                        3 => 'NO EXISTE',
                        4 => array(),
                        5 => 0
                    ),
                    4 => array(
                        0 => 0,
                        1 => -1,
                        2 => 'SIN NOMBRE',
                        3 => 'NO EXISTE',
                        4 => array(),
                        5 => 0
                    )
                ),
                2 => '427'
            );

            $this->listPuntosVenta[3] = 0;

            //recorrer lista para eliminar pdvs no encontrados 
            //recalcular cantidades y saldos teniendo en cuenta fracciones
            //y definir si alguno tiene 100% en pos 3 0:no, 1:si
            if ($this->listPuntosVenta[0] == 1) {
                foreach ($this->listPuntosVenta[1] as $indicePdv => $pdv) {
                    if ($pdv[0] == 1) {
                        if ($pdv[5] == 100) {
                            $this->listPuntosVenta[3] = 1;
                        }

                        if (empty($pdv[4])) {
                            unset($this->listPuntosVenta[1][$indicePdv]);
                        } else {
                            foreach ($pdv[4] as $indiceProd => $producto) {

                                $arrSaldo = $this->decimalToUnidFracc($producto['SALDO']);

                                if ($arrSaldo['UNIDAD'] <= 0 && $arrSaldo['FRACCION'] <= 0) {
                                    unset($this->listPuntosVenta[1][$indicePdv][4][$indiceProd]);
                                } else {
                                    $arrCantidad = $this->decimalToUnidFracc($producto['CANTIDAD']);
                                    $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]['CANTIDAD_UNIDAD'] = $arrCantidad['UNIDAD'];
                                    $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]['CANTIDAD_FRACCION'] = $arrCantidad['FRACCION'];
                                    $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]['SALDO_UNIDAD'] = $arrSaldo['UNIDAD'];
                                    $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]['SALDO_FRACCION'] = $arrSaldo['FRACCION'];
                                }
                            }
                        }
                    } else {
                        unset($this->listPuntosVenta[1][$indicePdv]);
                    }
                }
            }
        }
    }

    private function decimalToUnidFracc($n) {
        $aux = (string) $n;
        $n = explode(".", $aux);
        return array(
            'UNIDAD' => isset($n[0]) ? $n[0] : 0,
            'FRACCION' => isset($n[1]) ? $n[1] : 0
        );
    }

    public static function listDataCuotas() {
        return array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5, '6' => 6);
    }

    public static function listDataHoras($horaIniServicio = "07:00:00", $horaFinServicio = "23:00:00", $deltaHorario = "0 1:00:0.000000") {
        $sql = "SELECT idHorario, concat('Hoy a las ', DATE_FORMAT(hora, '%h:%i %p')) as etiqueta, concat(curdate(), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as fecha, hora
             FROM   m_Horario
             WHERE  hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '" . $horaFinServicio . "' and (hora >= ADDTIME(CURTIME(), '" . $deltaHorario . "'))
             UNION
             SELECT idHorario, concat('Ma&ntilde;ana a las ', DATE_FORMAT(hora, '%h:%i %p')) as etiqueta, concat(DATE_ADD(CURDATE(), INTERVAL 1 DAY), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as fecha, hora
             FROM m_Horario
             WHERE (hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '12:00')";

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

}
