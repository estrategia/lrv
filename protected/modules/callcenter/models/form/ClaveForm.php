<?php

/**
 * ClaveForm class.
 * ClaveForm is the data structure for restore password
 */
class ClaveForm extends CFormModel {

    public $identificacionUsuario;
    public $nuevaClave;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('identificacionUsuario', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('identificacionUsuario', 'validateExist'),
        );
    }

    public function validateExist($attribute, $params) {
        if (!$this->hasErrors()) {
            $objUsuario = Usuario::model()->find(array(
                'condition' => "identificacionUsuario=:identificacion",
                'params' => array(
                    ':identificacion' => $this->identificacionUsuario
                )
            ));
            
            if ($objUsuario===null)
                $this->addError($attribute, $this->getAttributeLabel($attribute) . ' no existe.');
            else if($objUsuario->activo!=1)
                $this->addError($attribute, $this->getAttributeLabel($attribute) . ' no activo.');
            else{
                $this->nuevaClave = PasswordGenerator::generatePass(8);
                $objUsuario->clave = $objUsuario->hash($this->nuevaClave);
                if(!$objUsuario->save()){
                    $this->addError($attribute, ' Error al cambiar clave, intente de nuevo.');
                }
            }
        }
    }
    
    

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'identificacionUsuario' => 'Número de identificación',
        );
    }

}
