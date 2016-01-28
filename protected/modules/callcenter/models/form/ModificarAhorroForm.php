<?php

/**
 * ModificarAhorroForm class.
 * ModificarAhorroForm is the data structure for modify 
 */
class ModificarAhorroForm extends CFormModel {

    public $idCompraItem;
    public $descuento;
    public $opcion;
    public $objItem = null;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('idCompraItem, descuento, opcion', 'required', 'message' => '{attribute} no puede estar vacío'),
             array('descuento', 'numerical','integerOnly'=>true,'min'=>0, 'tooSmall'=>'{attribute} deber ser mayor a 0', 'message' => '{attribute} deber ser número'),
            array('opcion', 'in', 'range' => array(1, 2), 'allowEmpty' => false),
            array('idCompraItem', 'validateExist'),
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function validateExist($attribute, $params) {
        $this->objItem = ComprasItems::model()->find(array(
            'with' => array('objCompra'=> array('with'=>'objFormaPagoCompra')),
            'condition' => 'idCompraItem=:item',
            'params' => array(
                ':item' => $this->idCompraItem,
            )
        ));
        
        if($this->objItem===null){
            $this->addError($attribute, 'Producto de compra no existente');
        }else{
            if($this->objItem->objCompra->objFormaPagoCompra->idFormaPago != Yii::app()->params->formaPago['pasarela']['idPasarela']){
                $this->addError($attribute, 'Forma de pago no permitida para modificar ahorro');
            }
        }
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'idCompraItem' => 'Item de compra',
            'descuento' => 'Nuevo ahorro',
            'opcion' => 'Opción',
        );
    }

}
