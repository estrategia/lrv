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
    public $codigoCliente;
    public $codigoPromocion;
    public $confirmacion;
    public $listCodigoEspecial = array();
    public $pasoValidado = array();

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
            array('tarjetaNumero, numeroCuotas, codigoCliente, codigoPromocion', 'safe'),
            array('comentario, tarjetaNumero, numeroCuotas, codigoCliente, codigoPromocion', 'default', 'value' => null),
            array('idFormaPago', 'pagoValidate', 'on' => 'pago, finalizar'),
            array('codigoCliente', 'clienteFielValidate', 'on' => 'pago, finalizar'),
            array('codigoPromocion', 'promocionValidate', 'on' => 'pago, finalizar'),
            array('confirmacion', 'compare', 'compareValue'=>1, 'on'=>'confirmacion', 'message'=>'Aceptar términos y condiciones'),
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
            'codigoCliente' => 'Código cliente fiel',
            'codigoPromocion' => 'Código promoción',
            'confirmacion' => 'Acepto términos y condiciones'
        );
    }
    
    public function calcularConfirmacion($positions){
        $this->confirmacion=null;
        $this->listCodigoEspecial = array();
        foreach($positions as $position){
            if($position->isProduct()){
                if($position->objProducto->objCodigoEspecial->confirmacionCompra == "SI"){
                    $this->listCodigoEspecial[$position->objProducto->objCodigoEspecial->codigoEspecial] = $position->objProducto->objCodigoEspecial;
                }
            }
        }
        
        if(empty($this->listCodigoEspecial)){
            $this->confirmacion=1;
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

                if (strlen($this->tarjetaNumero) != 12  ) {
                    $this->addError('tarjetaNumero', $this->getAttributeLabel('tarjetaNumero') . " debe tener 12 dígitos");
                }
            }

            if ($this->numeroCuotas === null || empty($this->numeroCuotas)) {
                $this->addError('numeroCuotas', $this->getAttributeLabel('numeroCuotas') . " no puede estar vacío");
            } else {
                $int = intval($this->numeroCuotas);
                if ($int <= 0 || $int>6) {
                    $this->addError('numeroCuotas', $this->getAttributeLabel('numeroCuotas') . " debe ser número entre 1 y 6");
                }
            }
        } else {
            $this->tarjetaNumero = null;
            $this->numeroCuotas = null;
        }
    }

    public function clienteFielValidate($attribute, $params) {
        if (!$this->hasErrors()) {
            //validar numero tarjeta
        }
    }

    public function promocionValidate($attribute, $params) {
        if (!$this->hasErrors()) {
            //validar numero tarjeta
        }
    }
    
    public static function listDataCuotas(){
        return array('1'=>1,'2'=>2,'3'=>3,'4'=>4,'5'=>5,'6'=>6);
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
