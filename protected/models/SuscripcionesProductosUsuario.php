<?php

/**
 * This is the model class for table "t_SuscripcionesProductosUsuario".
 *
 * The followings are the available columns in table 't_SuscripcionesProductosUsuario':
 * @property string $idSuscripcion
 * @property string $identificacionUsuario
 * @property string $idProducto
 * @property string $idBeneficio
 * @property string $fechasSuscripcion
 * @property string $cantidadDisponiblePeriodoActual
 * @property string $peridoActual
 */
class SuscripcionesProductosUsuario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_SuscripcionesProductosUsuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('identificacionUsuario, idProducto, idBeneficio, descuentoProducto', 'required'),
			array('idSuscripcion', 'length', 'max'=>20),
			array('identificacionUsuario', 'length', 'max'=>100),
			array('idProducto, cantidadDisponiblePeriodoActual', 'length', 'max'=>10),
			array('idBeneficio', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idSuscripcion, identificacionUsuario, idProducto, idBeneficio, fechaSuscripcion, cantidadDisponiblePeriodoActual, peridoActual', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'beneficio' => array(self::BELONGS_TO, 'Beneficios', 'idBeneficio'),
			'objProducto' => array(self::BELONGS_TO, 'Producto', 'idProducto'),
			'producto' => array(self::BELONGS_TO, 'Producto', 'idProducto'),
			'usuario' => array(self::HAS_ONE, 'Usuario', 'identificacionUsuario'),
			'periodos' => array(self::HAS_MANY, 'PeriodosSuscripcion', 'idSuscripcion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idSuscripcion' => 'Id Suscripcion',
			'identificacionUsuario' => 'Identificacion Usuario',
			'idProducto' => 'Id Producto',
			'idBeneficio' => 'Id Beneficio',
			'fechaSuscripcion' => 'Fecha Suscripcion',
			'cantidadDisponiblePeriodoActual' => 'Cantidad Disponible Periodo Actual',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idSuscripcion',$this->idSuscripcion,true);
		$criteria->compare('identificacionUsuario',$this->identificacionUsuario,true);
		$criteria->compare('idProducto',$this->idProducto,true);
		$criteria->compare('idBeneficio',$this->idBeneficio,true);
		$criteria->compare('fechaSuscripcion',$this->fechaSuscripcion,true);
		$criteria->compare('cantidadDisponiblePeriodoActual',$this->cantidadDisponiblePeriodoActual,true);

		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchMisSuscripciones()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.
	
		$criteria=new CDbCriteria;
	
		$criteria->compare('idSuscripcion',$this->idSuscripcion,true);
		$criteria->compare('identificacionUsuario',$this->identificacionUsuario,true);
		$criteria->compare('idProducto',$this->idProducto,true);
		$criteria->compare('idBeneficio',$this->idBeneficio,true);
		$criteria->compare('fechaSuscripcion',$this->fechaSuscripcion,true);
		$criteria->compare('cantidadDisponiblePeriodoActual',$this->cantidadDisponiblePeriodoActual,true);
		
		$criteria->addCondition("fechaFin >= now()");
	
	
		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SuscripcionesProductosUsuario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	public function generarPeriodos($numeroPeriodos)
	{
		$fechasPeriodos = self::calcularFechasPeriodos(date('Y-m-d H:i:s'), $numeroPeriodos);
		$periodos = [];
		$infoBase = [
			'idSuscripcion' => $this->idSuscripcion,
			'cantidadComprada' => 0,
			'usado' => 0,
			'notificadoCorreo' => 0,
			'numeroPeriodo' => 1,
		];
		foreach ($fechasPeriodos as $key => $fechaPeriodo) {
			$periodos[] = $infoBase + $fechaPeriodo;
			$infoBase['numeroPeriodo'] ++;
		}
		$periodos[0]['notificadoCorreo'] = 1;
		
		$connection = Yii::app()->db;
	   	$transaction=$connection->beginTransaction();
		try {
			$builder = Yii::app()->db->schema->commandBuilder;
			$command=$builder->createMultipleInsertCommand('t_PeriodosSuscripcion', $periodos);
			$command->execute();
			$transaction->commit();
		} catch(Exception $e) {
			// echo $e;
			$transaction->rollBack();
		}
		$ultimoPeriodo = $this->consultarUltimoPeriodo();
		$this->fechaFin = end($periodos)['fechaFin'];
		$this->cantidadPeriodos = $ultimoPeriodo->numeroPeriodo;
		$this->save();
	}

	public function actualizarPeriodos($numeroPeriodos)
	{
		$periodosACrear = 0;
		$periodosAEliminar = 0;
		$fechasPeriodos = [];
		if ($numeroPeriodos > $this->cantidadPeriodos) {
			$periodosACrear = $numeroPeriodos - $this->cantidadPeriodos;
			$ultimoPeriodo = $this->consultarUltimoPeriodo();
			$fechaInicial = date('Y-m-d', strtotime("+1 day", strtotime($ultimoPeriodo->fechaFin)));
			$fechasPeriodos = $this->calcularFechasPeriodos($fechaInicial, $periodosACrear);
			$periodos = [];
			$infoBase = [
				'idSuscripcion' => $this->idSuscripcion,
				'cantidadComprada' => 0,
				'usado' => 0,
				'notificadoCorreo' => 0,
				'numeroPeriodo' => $ultimoPeriodo->numeroPeriodo + 1,
			];
			foreach ($fechasPeriodos as $key => $fechaPeriodo) {
				$periodos[] = $infoBase + $fechaPeriodo;
				$infoBase['numeroPeriodo'] ++;
			}
			
			Yii::log(CVarDumper::dumpAsString($ultimoPeriodo), CLogger::LEVEL_INFO, 'application');
			$connection = Yii::app()->db;
			$transaction=$connection->beginTransaction();
			try {
				$builder = Yii::app()->db->schema->commandBuilder;
				$command=$builder->createMultipleInsertCommand('t_PeriodosSuscripcion', $periodos);
				$command->execute();
				$transaction->commit();
				$this->cantidadPeriodos = $numeroPeriodos;			
				// return true;
			} catch(Exception $e) {
				// echo $e;
				$transaction->rollBack();
				// return false;
			}

		} else if ($numeroPeriodos < $this->cantidadPeriodos && $numeroPeriodos > $this->periodoActual) {
			$periodosAEliminar = $this->cantidadPeriodos - $numeroPeriodos + 1;
			PeriodosSuscripcion::model()->deleteAll(
				'numeroPeriodo > :numeroPeriodo',
				[':numeroPeriodo' => $periodosAEliminar]
			);
		}
		$ultimoPeriodo = $this->consultarUltimoPeriodo();
		$this->fechaFin = $ultimoPeriodo->fechaFin;
		$this->cantidadPeriodos = $ultimoPeriodo->numeroPeriodo;
		$this->save();
	}

	public static function calcularFechasPeriodos($fechaInicial, $numeroPeriodos)
	{
		$fechas = [];
		$longitudPeriodo = Yii::app()->params['longitudPeriodoSuscripcion'];
		$longitudTolerancia = Yii::app()->params['longitudToleranciaPeriodoSuscripcion'];
		$fechaInicioP = date('Y-m-d', strtotime($fechaInicial));
		
		for ($i=1; $i <= $numeroPeriodos ; $i++) {
			$fechaFinP = date('Y-m-d', strtotime("+ $longitudPeriodo  days", strtotime($fechaInicioP)));
			$fechaInicioTolerancia = date('Y-m-d', strtotime("- $longitudTolerancia  days", strtotime($fechaFinP)));
			$fechas[] = [
				'fechaInicio' => $fechaInicioP, 
				"fechaFin" => $fechaFinP,
				"fechaInicioTolerancia" => $fechaInicioTolerancia
			];
			$fechaInicioP = date('Y-m-d', strtotime("+ 1 days", strtotime($fechaFinP)));
		}
		// CVarDumper::dump($fechas,10,true);
		return $fechas;
	}

	public function consultarUltimoPeriodo()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "idSuscripcion = :idSuscripcion";
		$criteria->order = "fechaFin DESC";
		$criteria->params = [':idSuscripcion' => $this->idSuscripcion];
		$periodo = PeriodosSuscripcion::model()->find($criteria);
		// CVarDumper::dump($periodo, 10,true);
		return $periodo;
	}

	public function consultarPeriodoActual()
	{
		// $fechaActual = "2017-12-30";
		$fechaActual = date('Y-m-d');
		$criteria = new CDbCriteria();
		$criteria->condition = "idSuscripcion = :idSuscripcion";
		$criteria->condition .= " AND fechaInicio <= :fechaActual";
		$criteria->condition .= " AND fechaFin >= :fechaActual";
		$criteria->params = [':idSuscripcion' => $this->idSuscripcion, ':fechaActual' => $fechaActual];
		$periodo = PeriodosSuscripcion::model()->find($criteria);
		// CVarDumper::dump($periodo, 10,true);
		return $periodo;
	}

	public function consultarCantidadPeriodoActual()
	{
		$cantidadPeriodo = 0;
		$fechaActual = date('Y-m-d');
		$periodo = $this->consultarPeriodoActual();
		$cantidadPeriodo = $this->cantidadDisponiblePeriodoActual;
		if ($periodo->usado == 1) {
			if (strtotime($fechaActual) >= strtotime($periodo->fechaInicioTolerancia)) {
				$idPeriodoSiguiente = $periodo->idPeriodo + 1;
				$periodoSiguiente = PeriodosSuscripcion::model()->find("$idPeriodoSiguiente");
				if($periodoSiguiente !== null) {
					$cantidadPeriodo = $periodoSiguiente->usado == 0 ? $this->cantidadDisponiblePeriodoActual : 0;
				}
			} else {
				$cantidadPeriodo = 0;
			}
		}
		return $cantidadPeriodo;
	}

	public function consultarNumeroPeriodoActual()
	{
		$numeroPeriodoActual = PHP_INT_MAX;
		$periodo = $this->consultarPeriodoActual();
		if($periodo != null) {
			$numeroPeriodoActual = $periodo->numeroPeriodo;
		}
		return $numeroPeriodoActual;
	}

	public static function consultarSuscripcionesRecordar($porCedula=true)
	{
		$criteria = new CDbCriteria;
		$criteria->join = 'JOIN t_PeriodosSuscripcion periodos ON periodos.idSuscripcion = t.idSuscripcion';
		$criteria->condition = 'periodos.fechaInicio <= :fechaActual';
		$criteria->condition .= ' AND periodos.fechaFin >= :fechaActual';
		$criteria->condition .= ' AND periodos.notificadoCorreo = 0';
		$criteria->condition .= ' AND periodos.usado <> 1';
		$criteria->params = [':fechaActual' => date('Y-m-d')];
		$suscripciones = self::model()->findAll($criteria);
		if ($porCedula) {
			$suscripcionesPorCedula = [];
			foreach ($suscripciones as $key => $suscripcion) {
				if (!isset($suscripcionesPorCedula[$suscripcion->identificacionUsuario])) {
					$suscripcionesPorCedula[$suscripcion->identificacionUsuario] = [];
				}
				$suscripcionesPorCedula[$suscripcion->identificacionUsuario][] = $suscripcion;
			}
			return $suscripcionesPorCedula;
		}
		return $suscripciones;
	}

	public static function consultarBeneficioSuscripcion($codigoProducto)
	{
		$criteriaBeneficio = new CDbCriteria;
		$criteriaBeneficio->condition = 't.codigoProducto=:codigoProducto';
		$criteriaBeneficio->condition .= ' AND objBeneficio.tipo IN (' . implode(",", Yii::app()->params->beneficios['beneficiosSuscripcion']) . ')';
		$criteriaBeneficio->with = 'objBeneficio';
		$criteriaBeneficio->params = [':codigoProducto' => $codigoProducto];
		$beneficioProducto = BeneficiosProductos::model()->find($criteriaBeneficio);
		return $beneficioProducto;
	}

}