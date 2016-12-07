<?php

/**
 * This is the model class for table "m_BonoTienda".
 *
 * The followings are the available columns in table 'm_BonoTienda':
 * @property integer $idBonoTienda
 * @property string $concepto
 * @property integer $cuenta
 * @property integer $formapago
 * @property integer $tipo
 * @property integer $estado
 * @property string $fechaIni
 * @property string $fechaFin
 * @property integer $cantidadUso
 * @property integer $valorBono
 * @property integer $valorMinCompra
 * @property string $codigoUso
 */
class BonoTienda extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_BonoTienda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('concepto', 'required'),
			array('cuenta, formaPago, tipo, estado, cantidadUso, valorBono, valorMinCompra', 'numerical', 'integerOnly'=>true),
			array('concepto', 'length', 'max'=>60),
			array('codigoUso', 'length', 'max'=>20),
			array('fechaIni, fechaFin', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idBonoTiendaTipo, concepto, cuenta, formaPago, tipo, estado, fechaIni, fechaFin, cantidadUso, valorBono, valorMinCompra, codigoUso', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idBonoTiendaTipo' => 'Id Bono Tienda Tipo',
			'concepto' => 'Concepto',
			'cuenta' => 'Cuenta',
			'formaPago' => 'Forma Pago',
			'tipo' => 'Tipo',
			'estado' => 'Estado',
			'fechaIni' => 'Fecha Ini',
			'fechaFin' => 'Fecha Fin',
			'cantidadUso' => 'Cantidad Uso',
			'valorBono' => 'Valor Bono',
			'valorMinCompra' => 'Valor Min Compra',
			'codigoUso' => 'Codigo Uso',
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

		$criteria->compare('idBonoTiendaTipo',$this->idBonoTiendaTipo);
		$criteria->compare('concepto',$this->concepto,true);
		$criteria->compare('cuenta',$this->cuenta);
		$criteria->compare('formaPago',$this->formaPago);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fechaIni',$this->fechaIni,true);
		$criteria->compare('fechaFin',$this->fechaFin,true);
		$criteria->compare('cantidadUso',$this->cantidadUso);
		$criteria->compare('valorBono',$this->valorBono);
		$criteria->compare('valorMinCompra',$this->valorMinCompra);
		$criteria->compare('codigoUso',$this->codigoUso,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BonoTienda the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
