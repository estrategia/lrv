<?php

/**
 * RemisionForm class.
 * RemisionForm is the data structure for keeping
 */
class RemisionForm extends CFormModel {
    public $idCompra;
    public $idComercial;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('idCompra, idComercial', 'required', 'message' => '{attribute} no puede estar vacío'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'idCompra' => 'Número de pedido',
            'idComercial' => 'Punto de Venta',
        );
    }
    
    public function listPuntoVenta(){
        return CHtml::listData(PuntoVenta::model()->findAll(), 'idComercial', 'nombrePuntoDeVenta');
    }

}
