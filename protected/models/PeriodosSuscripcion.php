<?php

/**
 * This is the model class for table "t_PeriodosSuscripcion".
 *
 * The followings are the available columns in table 't_PeriodosSuscripcion':
 * @property string $idPeriodoSuscripcion
 * @property string $idSuscripcion
 * @property string $cantidadComprada
 * @property integer $usado
 * @property integer $notificadoCorreo
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $fechaInicioTolerancia
 *
 * The followings are the available model relations:
 * @property TSuscripcionesProductosUsuario $idSuscripcion0
 */
class PeriodosSuscripcion extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_PeriodosSuscripcion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idSuscripcion, fechaInicio, fechaFin, fechaInicioTolerancia', 'required'),
			array('usado, notificadoCorreo', 'numerical', 'integerOnly'=>true),
			array('idSuscripcion', 'length', 'max'=>20),
			array('cantidadComprada', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPeriodoSuscripcion, idSuscripcion, cantidadComprada, usado, notificadoCorreo, fechaInicio, fechaFin, fechaInicioTolerancia', 'safe', 'on'=>'search'),
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
			'idSuscripcion0' => array(self::BELONGS_TO, 'TSuscripcionesProductosUsuario', 'idSuscripcion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPeriodoSuscripcion' => 'Id Periodo Suscripcion',
			'idSuscripcion' => 'Id Suscripcion',
			'cantidadComprada' => 'Cantidad Comprada',
			'usado' => 'Usado',
			'notificadoCorreo' => 'Notificado Correo',
			'fechaInicio' => 'Fecha Inicio',
			'fechaFin' => 'Fecha Fin',
			'fechaInicioTolerancia' => 'Fecha Inicio Tolerancia',
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

		$criteria->compare('idPeriodoSuscripcion',$this->idPeriodoSuscripcion,true);
		$criteria->compare('idSuscripcion',$this->idSuscripcion,true);
		$criteria->compare('cantidadComprada',$this->cantidadComprada,true);
		$criteria->compare('usado',$this->usado);
		$criteria->compare('notificadoCorreo',$this->notificadoCorreo);
		$criteria->compare('fechaInicio',$this->fechaInicio,true);
		$criteria->compare('fechaFin',$this->fechaFin,true);
		$criteria->compare('fechaInicioTolerancia',$this->fechaInicioTolerancia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PeriodosSuscripcion the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
