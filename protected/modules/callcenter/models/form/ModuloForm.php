<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class ModuloForm extends CFormModel {
    
    public $idModulo;
    public $tipo;
    public $inicio;
    public $fin;
    public $dias;
    public $estado;
    public $descripcion;
    public $contenido;
    
    
     public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo, inicio, fin, dias, orden', 'required'),
            array('tipo, orden', 'numerical', 'integerOnly' => true),
            array('dias', 'length', 'max' => 30),
            array('descripcion', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idModulo, tipo, inicio, fin, dias, orden, descripcion', 'safe', 'on' => 'search'),
        );
    }

     public function attributeLabels() {
        return array(
            'idModulo' => 'Id Modulo',
            'tipo' => 'Tipo',
            'inicio' => 'Día Inicio',
            'fin' => 'Día Fín',
            'dias' => 'Dias',
            'orden' => 'Orden',
            'descripcion' => 'Descripcion',
            'contenido' => 'Contenido'
        );
    }

    
}