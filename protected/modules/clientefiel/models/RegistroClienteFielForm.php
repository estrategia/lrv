<?php

/**
 * Description of RegistroForm
 *
 * @author miguel.sanchez
 */
class RegistroClienteFielForm extends CFormModel {

    public $cedula;
    public $clave = null;
    public $claveConfirmar = null;
    public $nombre;
    public $apellido;
    
    public $telefonoFijo;
    public $telefonoCelular;
    public $ciudad;

    public $correoElectronico;
    public $genero;
    public $fechaNacimiento;
    public $ocupacion;
    public $profesion;
    public $condiciones;
    public $tieneHijos;
    public $tieneMascotas;
    
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
             
            array('cedula,nombre, apellido, correoElectronico, fechaNacimiento,  genero, 
            		fechaNacimiento, tieneHijos,  tieneMascotas, telefonoFijo, telefonoCelular', 
            		'required', 'message' => '{attribute} no puede estar vacío'),
             array('condiciones', 'required', 'message' => 'Aceptar términos y condiciones'),
         //    array('cedula', 'numerical','integerOnly' => true),
         //    array('cedula', 'length', 'min'=>5, 'max'=>12),
             array('correoElectronico', 'email', 'allowEmpty' => false),
             array('fechaNacimiento', 'date', 'format' => 'yyyy-M-d', 'allowEmpty' => true),
             array('genero', 'in', 'range' => array(1, 2),  'allowEmpty' => true),
            
              array('cedula, nombre, apellido, correoElectronico', 'length', 'max' => 50),
            
             array('cedula,nombre, apellido, correoElectronico, fechaNacimiento, genero, fechaNacimiento, tieneHijos, 
              	  tieneMascotas, telefonoFijo, telefonoCelular, ciudad','safe'),

              array('correoElectronico', 'validarCorreo' ),
        );
    }
    
    public function getSubmitName(){
        $nombre = "NA";
        $escenario = $this->getScenario();
        
        if($escenario == "registro"){
            $nombre = "Registrar";
        }else if($escenario == "actualizar"){
            $nombre = "Guardar";
        }
        
        return $nombre;
    }
    
    
    public function getSubmitType(){
        $tipo = "submit";
        $escenario = $this->getScenario();
        
        if($escenario == "registro"){
            $tipo = "button";
        }
        
        return $tipo;
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
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'correoElectronico' => 'Correo electrónico',
            'genero' => 'Género',
            'fechaNacimiento' => 'Fecha de nacimiento',
            'clave' => 'Contraseña',
            'claveConfirmar' => 'Confirmar contraseña',
            'condiciones' => 'Acepto términos y condiciones',
            'profesion'=>'Profesión',
        );
    }
    

    /**
     * Valida existencia de usuario con correo ingresado
     */
    public function validarClave() {
        if (!$this->hasErrors()) {
            if ($this->clave != $this->claveConfirmar) {
                $this->addError('clave', 'Contraseña no coincide');
                $this->addError('claveConfirmar', 'Contraseña no coincide');
                $this->clave = null;
                $this->claveConfirmar = null;
            }
        }
    }
    
    /**
     * Valida existencia de usuario con correo ingresado
     */
    public function validarProfesion() {
        if (!$this->hasErrors()) {
            if ($this->profesion != null) {
                $objProfesion = ProfesionCliente::model()->findByPk($this->profesion);
                
                if($objProfesion==null)
                    $this->addError('profesion', 'Profesión no válida');
            }
        }
    }

    /**
     * Valida existencia de usuario con cedula ingresada
     */
    public function validarCedula() {
        if (!$this->hasErrors()) {
//             $usuario = Usuario::model()->findByPk($this->cedula);
//             if ($usuario !== null) {
//                 $this->addError('cedula', 'Cédula ya registrada');
//             }
        	
        }
    }

    /**
     * Valida existencia de usuario con correo ingresado
     */
    public function validarCorreo() {
        if (!$this->hasErrors("correoElectronico")) {
            $usuario = null;
            
//             if ($this->getScenario() == 'registro') {
//                 $usuario = Usuario::model()->find('correoElectronico=:correo', array(':correo' => $this->correoElectronico));
//             }else if($this->getScenario() == 'actualizar'){
//                 $usuario = Usuario::model()->find('correoElectronico=:correo AND identificacionUsuario<>:cedula', array(':correo' => $this->correoElectronico, ':cedula' => $this->cedula));
//             }

//             if ($usuario !== null) {
//                 $this->addError('correoElectronico', 'Correo electrónico ya registrado');
//             }
        }
    }

}
