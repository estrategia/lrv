<?php

class ActivacionForm extends CFormModel {
	public $codigoActivacionValidacion = null;
 
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoActivacionValidacion', 'required'),
            array('codigoActivacionValidacion', 'length', 'max' => 10),
        );
    }

     /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoActivacionValidacion' => 'Validar c&oacute;digo de activaci&oacute;n',
        );
    }

}
