<?php

/**
 * This is the model class for table "t_ComprasUnidadesBodega".
 *
 * The followings are the available columns in table 't_ComprasUnidadesBodega':
 * @property integer $idCompraUnidadBodega
 * @property integer $idCompra
 * @property integer $idCompraItem
 * @property string $codigoProducto
 * @property integer $idBodega
 * @property integer $cantidad
 *
 * The followings are the available model relations:
 * @property Compras $idCompra0
 * @property ComprasItems $idCompraItem0
 * @property Producto $codigoProducto0
 * @property BodegaVirtual $idBodega0
 */
class ComprasUnidadesBodega extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ComprasUnidadesBodega';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCompra, idCompraItem, codigoProducto, idBodega, cantidad', 'required'),
			array('idCompra, idCompraItem, idBodega, cantidad', 'numerical', 'integerOnly'=>true),
			array('codigoProducto', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCompraUnidadBodega, idCompra, idCompraItem, codigoProducto, idBodega, cantidad', 'safe', 'on'=>'search'),
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
			'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
			'objCompraItem' => array(self::BELONGS_TO, 'ComprasItems', 'idCompraItem'),
			'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
			'objBodega' => array(self::BELONGS_TO, 'BodegaVirtual', 'idBodega'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCompraUnidadBodega' => 'Id Compra Unidad Bodega',
			'idCompra' => 'Id Compra',
			'idCompraItem' => 'Id Compra Item',
			'codigoProducto' => 'Codigo Producto',
			'idBodega' => 'Id Bodega',
			'cantidad' => 'Cantidad',
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

		$criteria->compare('idCompraUnidadBodega',$this->idCompraUnidadBodega);
		$criteria->compare('idCompra',$this->idCompra);
		$criteria->compare('idCompraItem',$this->idCompraItem);
		$criteria->compare('codigoProducto',$this->codigoProducto,true);
		$criteria->compare('idBodega',$this->idBodega);
		$criteria->compare('cantidad',$this->cantidad);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TComprasUnidadesBodega the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
