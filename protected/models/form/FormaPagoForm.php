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
    public $tarjetaTipo;
    public $tarjetaNumero;
    public $tarjetaVerificacion;
    public $numeroCuotas;
    public $codigoCliente;
    public $codigoPromocion;
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
            array('idDireccionDespacho', 'required', 'on' => 'despacho', 'message' => '{attribute} no puede estar vacío'),
            array('fechaEntrega, comentario', 'required', 'on' => 'entrega', 'message' => '{attribute} no puede estar vacío'),
            array('comentario', 'length', 'max' => 250, 'on' => 'entrega', 'message' => '{attribute} no puede estar vacío'),
            array('idFormaPago', 'required', 'on' => 'pago', 'message' => '{attribute} no puede estar vacío'),
            array('idFormaPago', 'pagoValidate', 'on' => 'pago'),
            array('codigoCliente', 'clienteFielValidate', 'on' => 'pago'),
            array('codigoPromocion', 'promocionValidate', 'on' => 'pago'),
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
            'tarjetaTipo' => '00',
            'tarjetaNumero' => '0000000000',
            'tarjetaVerificacion' => '00',
            'numeroCuotas' => 'Cuotas',
            'codigoCliente' => 'Código cliente fiel',
            'codigoPromocion' => 'Código promoción',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function pagoValidate($attribute, $params) {
        if (!$this->hasErrors()) {
            //validar numero tarjeta
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

    public function getListaHorasSelect($deltaHorario = "0 1:00:0.000000", $horaIniServicio = "07:00:00", $horaFinServicio = "23:00:00") {
        $sql = " SELECT id_horario, concat('Hoy a las ', DATE_FORMAT(hora, '%h:%i %p')) as horanew,
                    concat(curdate(), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as new_fecha, hora
             FROM   m_lista_horario
             WHERE  hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '" . $horaFinServicio . "' and
                    (hora >= ADDTIME(CURTIME(), '" . $deltaHorario . "'))
             UNION
             SELECT id_horario, concat('Ma&ntilde;ana a las ', DATE_FORMAT(hora, '%h:%i %p')) as horanew,
                    concat(DATE_ADD(CURDATE(), INTERVAL 1 DAY), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as new_fecha, hora
             FROM m_lista_horario
             WHERE (hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '12:00')";

        $r_horas = $this->_db->fetchAll($sql);

        if (sizeof($r_horas) == 0) {
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
            $headers .= "FROM: La Rebaja Virtual <infolrv@copservir.com>";

            $para = "alexander_javela@copservir.com";
            $asunto = "FALLO SELECT PEDIDOS " . $idPedido;
            $mensaje = $sql;
            mail($para, $asunto, $mensaje, $headers);

            $r_horas = $this->_db->fetchAll($sql);
        }

        $this->_db->closeConnection();

        return $r_horas;
    }

}
