<?php

/**
 * Description of RegistroForm
 *
 * @author miguel.sanchez
 */
class CedulaForm extends CFormModel {

    public $cedula;
  
    
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
             
            array('cedula', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('cedula', 'numerical','integerOnly'=>true),
            array('cedula', 'length', 'min'=>5, 'max'=>12),
            array('cedula', 'safe', ),
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
            'cedula' => 'Cédula',
        );
    }
    

}
