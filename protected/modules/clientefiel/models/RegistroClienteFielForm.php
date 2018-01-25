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
             
            array('cedula,nombre, apellido, correoElectronico, fechaNacimiento, genero, fechaNacimiento, tieneHijos, profesion, tieneMascotas, telefonoFijo, telefonoCelular, ciudad', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('condiciones', 'required', 'message' => 'Aceptar términos y condiciones'),
            array('cedula', 'numerical','integerOnly'=>true),
            array('cedula', 'length', 'min'=>5, 'max'=>12),
            array('correoElectronico', 'email', 'allowEmpty' => false),
            array('fechaNacimiento', 'date', 'format' => 'yyyy-M-d', 'allowEmpty' => true),
            array('genero', 'in', 'range' => array(1, 2), 'on' => 'registro, actualizar', 'allowEmpty' => true),
            
            array('cedula, nombre, apellido, correoElectronico', 'length', 'max' => 50),
            
            array('cedula,nombre, apellido, correoElectronico, fechaNacimiento, genero, fechaNacimiento, tieneHijos, 
            	  tieneMascotas, telefonoFijo, telefonoCelular, ciudad', 'safe', 'on' => 'registro'),
            array('cedula', 'validarCedula', 'on' => 'registro'),
            array('correoElectronico', 'validarCorreo', 'on' => 'registro, actualizar'),
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
    
    public function getTitleForm(){
        $nombre = "NA";
        $escenario = $this->getScenario();
        
        if($escenario == "registro"){
            $nombre = "";// "Creaci&oacute;n de cuenta";
        }else if($escenario == "actualizar"){
            $nombre = "Informaci&oacute;n personal";
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
    
//     /**
//      * Valida que exista empleado con cedula indicada y que este activo.
//      * Este es un validador declarado en rules().
//      */
//     public function attributeTrim($attribute, $params) {
//         if($this->$attribute != null && gettype($this->$attribute)=="string"){
//             $this->$attribute = trim($this->$attribute);
//         }
        
//         if($attribute=="condiciones" && empty($this->condiciones)){
//             $this->condiciones = null;
//         }
//     }

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
