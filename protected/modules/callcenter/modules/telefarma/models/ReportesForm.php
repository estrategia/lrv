<?php


class ReportesForm extends CFormModel {

	// put your code here
	public $fechaInicio;
	public $fechaFin;
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules() {
		// Yii::log("validacion 0\n", CLogger::LEVEL_INFO, 'application');
		$rules = array ( array('fechaInicio, fechaFin', 'required'));
		// $rules[] = array('busqueda', 'minLength' => 3, 'message' => 'Minimo 3 letras');

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
				'fechaInicio' => 'Fecha Inicio',
				'fechaFin' => 'Fecha Fin'
		);
	}
	
}
