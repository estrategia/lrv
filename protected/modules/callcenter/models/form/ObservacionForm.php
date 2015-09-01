<?php

/**
 * ObservacionForm class.
 * ObservacionForm is the data structure for keeping
 */
class ObservacionForm extends CFormModel {

    public $tipoObservacion;
    public $estado;
    public $observacion;
    public $idCompra;

    function __construct($idCompra = null) {
        $this->idCompra = $idCompra;
        parent::__construct();
    }

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('observacion, tipoObservacion, idCompra', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('estado', 'safe'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'observacion' => 'Observación',
            'tipoObservacion' => 'Tipo de observación',
            'estado' => 'Cambiar de estado',
        );
    }

    public function listTipoObservacion() {
        return CHtml::listData(TipoObservacion::model()->findAll(array('order'=>'idTipoObservacion')), 'idTipoObservacion', 'observacion');
    }

}
