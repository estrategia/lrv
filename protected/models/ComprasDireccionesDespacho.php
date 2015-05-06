<?php

/**
 * This is the model class for table "t_ComprasDireccionesDespacho".
 *
 * The followings are the available columns in table 't_ComprasDireccionesDespacho':
 * @property integer $idCompra
 * @property string $descripcion
 * @property string $identificacion
 * @property string $nombre
 * @property string $direccion
 * @property string $barrio
 * @property string $telefono
 * @property string $celular
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property string $pdvAsignado
 *
 * The followings are the available model relations:
 * @property TCompras $idCompra0
 */
class ComprasDireccionesDespacho extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ComprasDireccionesDespacho';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCompra', 'required'),
			array('idCompra', 'numerical', 'integerOnly'=>true),
			array('descripcion, nombre, barrio, telefono, celular', 'length', 'max'=>50),
			array('identificacion', 'length', 'max'=>20),
			array('direccion', 'length', 'max'=>100),
			array('codigoCiudad, codigoSector', 'length', 'max'=>10),
			array('pdvAsignado', 'length', 'max'=>3),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCompra, descripcion, identificacion, nombre, direccion, barrio, telefono, celular, codigoCiudad, codigoSector, pdvAsignado', 'safe', 'on'=>'search'),
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
			'idCompra0' => array(self::BELONGS_TO, 'TCompras', 'idCompra'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCompra' => 'Id Compra',
			'descripcion' => 'Descripcion',
			'identificacion' => 'Identificacion',
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'barrio' => 'Barrio',
			'telefono' => 'Telefono',
			'celular' => 'Celular',
			'codigoCiudad' => 'Codigo Ciudad',
			'codigoSector' => 'Codigo Sector',
			'pdvAsignado' => 'Pdv Asignado',
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

		$criteria->compare('idCompra',$this->idCompra);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('identificacion',$this->identificacion,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('barrio',$this->barrio,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('celular',$this->celular,true);
		$criteria->compare('codigoCiudad',$this->codigoCiudad,true);
		$criteria->compare('codigoSector',$this->codigoSector,true);
		$criteria->compare('pdvAsignado',$this->pdvAsignado,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ComprasDireccionesDespacho the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
