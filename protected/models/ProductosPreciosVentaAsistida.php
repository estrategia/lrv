<?php

/**
 * This is the model class for table "t_ProductosPreciosVentaAsistida".
 *
 * The followings are the available columns in table 't_ProductosPreciosVentaAsistida':
 * @property integer $idProductoPrecios
 * @property string $codigoProducto
 * @property string $codigoCiudad
 * @property string $precioUnidad
 * @property string $precioFraccion
 * @property string $costo
 *
 * The followings are the available model relations:
 * @property MProducto $codigoProducto0
 * @property MCiudad $codigoCiudad0
 */
class ProductosPreciosVentaAsistida extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ProductosPreciosVentaAsistida';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigoProducto, codigoCiudad, precioUnidad, precioFraccion, costo', 'required'),
			array('codigoProducto, codigoCiudad, precioUnidad, precioFraccion, costo', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProductoPrecios, codigoProducto, codigoCiudad, precioUnidad, precioFraccion, costo', 'safe', 'on'=>'search'),
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
			'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
			'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProductoPrecios' => 'Id Producto Precio',
			'codigoProducto' => 'Codigo Producto',
			'codigoCiudad' => 'Codigo Ciudad',
			'precioUnidad' => 'Precio Unidad',
			'precioFraccion' => 'Precio Fraccion',
			'costo' => 'Costo',
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

		$criteria->compare('idProductoPrecios',$this->idProductoPrecios);
		$criteria->compare('codigoProducto',$this->codigoProducto,true);
		$criteria->compare('codigoCiudad',$this->codigoCiudad,true);
		$criteria->compare('precioUnidad',$this->precioUnidad,true);
		$criteria->compare('precioFraccion',$this->precioFraccion,true);
		$criteria->compare('costo',$this->costo,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductosPreciosVentaAsistida the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
