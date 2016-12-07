<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CalificacionForm extends CFormModel {

    public $titulo;
    public $codigoProducto;
    public $comentario;
    public $calificacion;
    public $aprobado;
    
    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
     public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('calificacion, titulo, comentario', 'required','message' => '{attribute} no puede estar vacío'),
            array('calificacion, aprobado', 'numerical', 'integerOnly' => true),
            array('codigoProducto', 'length', 'max' => 10),
            /*array('identificacionUsuario', 'length', 'max' => 10),*/
            array('titulo', 'length', 'max' => 100),
            array('comentario', 'length', 'max' => 500),
         /*   array('fecha', 'safe'),*/
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
           /* array('idCalificacion, codigoProducto, identificacionUsuario, calificacion, titulo, comentario, fecha, aprobado', 'safe', 'on' => 'search'),*/
        );
    }
    
    public function attributeLabels() {
        return array(
            'calificacion' => 'Calificacion',
            'titulo' => 'Titulo Calificacion',
            'comentario' => 'Comentario',
        );
    }
    
    /**
     * Valida que exista empleado con cedula indicada y que este activo.
     * Este es un validador declarado en rules().
     */
    public function attributeTrim($attribute, $params) {
        if($this->$attribute != null && gettype($this->$attribute)=="string"){
            $this->$attribute = trim($this->$attribute);
        }
        
        if($attribute=="condiciones" && empty($this->condiciones)){
            $this->condiciones = null;
        }
    }

}
