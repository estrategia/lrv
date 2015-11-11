<?php

/**
 * This is the model class for table "t_ProductosModulos".
 *
 * The followings are the available columns in table 't_ProductosModulos':
 * @property integer $idProductoModulo
 * @property integer $idModulo
 * @property string $codigoProducto
 *
 * The followings are the available model relations:
 * @property MModulosConfigurados $idModulo0
 * @property MProducto $codigoProducto0
 */
class ProductosModulos extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ProductosModulos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idModulo, codigoProducto', 'required'),
			array('idProductoModulo, idModulo', 'numerical', 'integerOnly'=>true),
			array('codigoProducto', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProductoModulo, idModulo, codigoProducto', 'safe', 'on'=>'search'),
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
			'objModuloConfigurado' => array(self::BELONGS_TO, 'ModulosConfigurados', 'idModulo'),
			'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProductoModulo' => 'Id Producto Modulo',
			'idModulo' => 'Id Modulo',
			'codigoProducto' => 'Codigo Producto',
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

		$criteria->compare('idProductoModulo',$this->idProductoModulo);
		$criteria->compare('idModulo',$this->idModulo);
		$criteria->compare('codigoProducto',$this->codigoProducto,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductosModulos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
