<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormaPagoVitalCallForm
 *
 * @author juan.aragon
 */
class BuscarProductosVitallCallForm extends CFormModel {
	
	// put your code here
	public $busqueda;
	public $resultadoBusqueda;
	public $idFormula;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules() {
		// Yii::log("validacion 0\n", CLogger::LEVEL_INFO, 'application');
		$rules = array ();
		// $rules[] = array('busqueda', 'minLength' => 3, 'message' => 'Mínimo 3 letras');
		
		return $rules;
	}
	
	/**
	 * Valida que exista empleado con cedula indicada y que este activo.
	 * Este es un validador declarado en rules().
	 */
	public function attributeTrim($attribute, $params) {
		if ($this->$attribute != null && gettype ( $this->$attribute ) == "string") {
			$this->$attribute = trim ( $this->$attribute );
		}
	}
	
	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels() {
		return array (
				'busqueda' => 'Buscar' 
		);
	}
	public function buscarProductos() {
		$sesion = Yii::app ()->getSession ()->getSessionId ();
		$codigosArray = GSASearch ( $this->busqueda, $sesion );
		// $h2 = round(microtime(true) * 1000);
		// $codigosStr = implode(",", $codigosArray);
		
		$codigoPerfil = Yii::app ()->shoppingCart->getCodigoPerfil ();
		
		if (empty ( $codigosArray )) {
			try {
				Busquedas::registrarBusqueda ( array (
						'idenficacionUsuario' => Yii::app ()->user->isGuest ? null : Yii::app ()->user->name,
						'tipoBusqueda' => Yii::app ()->params->busqueda ['tipo'] ['buscador'],
						'msgBusqueda' => "$this->busqueda: busqueda GSA",
						null,
						null 
				) );
			} catch ( Exception $exc ) {
				Yii::log ( $exc->getMessage () . "\n" . $exc->getTraceAsString (), CLogger::LEVEL_ERROR, 'application' );
			}
		}
		
		$codigosProductosArray = array ();
		foreach ( $codigosArray as $key => $codigos ) {
			$codigosProductosArray [] = $key;
		}
		$codigosStr = implode ( ",", $codigosProductosArray );
		
		$parametrosProductos = array ();
		$listCombos = array ();
		
		$parametrosProductos = array (
				'order' => 'rel.relevancia DESC,t.orden DESC',
				'with' => array (
						'listImagenes' => array (
								'on' => 'listImagenes.estadoImagen=:activo AND listImagenes.tipoImagen=:tipoImagen' 
						),
						'objVitalCall' => array(
								'on' => 'objVitalCall.estado =:activo AND objVitalCall.fechaInicio <=:fecha AND objVitalCall.fechaFin >=:fecha',
						),
				),
				'condition' => "t.activo=:activo AND objVitalCall.codigoProducto is not null AND t.codigoProducto IN ($codigosStr) AND 
								objVitalCall.idProductoVitalCall NOT IN (SELECT idProductoVitalCall FROM t_ProductosFormulaVitalCall WHERE idFormula =:idFormula)",
				'params' => array (
						':tipoImagen' => Yii::app ()->params->producto ['tipoImagen'] ['mini'],
						':activo' => 1 ,
						':fecha' => Date("Y-m-d h:i:s"),
						':idFormula' => $this->idFormula
				) 
		);
		
		$parametrosProductos ['join'] = "JOIN t_relevancia_temp_$sesion rel ON t.codigoProducto = rel.codigoProducto ";
		
		// $h1 = round(microtime(true) * 1000);
		$this->resultadoBusqueda = Producto::model ()->findAll ( $parametrosProductos );
		
		// $h2 = round(microtime(true) * 1000);
	}
}
