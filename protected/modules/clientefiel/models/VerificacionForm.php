<?php

/**
 * Description of RegistroForm
 *
 * @author miguel.sanchez
 */
class VerificacionForm extends CFormModel {

	public $cedula;
    public $codigoVerificacion;
  
    
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
             
            array('codigoVerificacion,cedula', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('codigoVerificacion', 'numerical','integerOnly'=>true),
            array('codigoVerificacion,cedula', 'length', 'min'=> 1, 'max'=>6),
            array('codigoVerificacion,cedula', 'safe', ),
        );
    }
  
    
    public function getContentClass(){
    	$clase = "ui-content";
    	$escenario = $this->getScenario();
    	 
    	if($escenario == "registro"){
    		$clase = "";
    	}
    	 
    	return $clase;
    }
    
    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
        	
        	'cedula' => 'Cedula',
            'codigoVerificacion' => 'C&oacute;digo de verificaci&oacute;n',
        );
    }
    

}
