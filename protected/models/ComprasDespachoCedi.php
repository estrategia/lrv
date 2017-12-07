<?php

/**
 * This is the model class for table "t_ComprasDespachoCedi".
 *
 * The followings are the available columns in table 't_ComprasDespachoCedi':
 * @property integer $idCompraDespacho
 * @property integer $idCompra
 * @property integer $idOperadorLogistico
 * @property integer $idBodega
 * @property string $codigoCiudad
 * @property integer $valorDeclaradoTotal
 * @property integer $valorFlete
 * @property string $numeroGuia
 *
 * The followings are the available model relations:
 * @property TCompras $idCompra0
 * @property MOperadorLogistico $idOperadorLogistico0
 * @property MBodegaVirtual $idBodega0
 * @property MCiudad $codigoCiudad0
 */
class ComprasDespachoCedi extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ComprasDespachoCedi';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCompra, idOperadorLogistico, idBodega, codigoCiudad, valorDeclaradoTotal, valorFlete', 'required'),
			array('idCompra, idOperadorLogistico, idBodega, valorDeclaradoTotal, valorFlete', 'numerical', 'integerOnly'=>true),
			array('codigoCiudad', 'length', 'max'=>10),
			array('numeroGuia', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idCompraDespacho, idCompra, idOperadorLogistico, idBodega, codigoCiudad, valorDeclaradoTotal, valorFlete, numeroGuia', 'safe', 'on'=>'search'),
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
			'objOperadorLogistico' => array(self::BELONGS_TO, 'OperadorLogistico', 'idOperadorLogistico'),
			'objBodega' => array(self::BELONGS_TO, 'BodegaVirtual', 'idBodega'),
			'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCompraDespacho' => 'Id Compra Despacho',
			'idCompra' => 'Id Compra',
			'idOperadorLogistico' => 'Id Operador Logistico',
			'idBodega' => 'Id Bodega',
			'codigoCiudad' => 'Codigo Ciudad',
			'valorDeclaradoTotal' => 'Valor Declarado Total',
			'valorFlete' => 'Valor Flete',
			'numeroGuia' => 'Numero Guia',
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

		$criteria->compare('idCompraDespacho',$this->idCompraDespacho);
		$criteria->compare('idCompra',$this->idCompra);
		$criteria->compare('idOperadorLogistico',$this->idOperadorLogistico);
		$criteria->compare('idBodega',$this->idBodega);
		$criteria->compare('codigoCiudad',$this->codigoCiudad,true);
		$criteria->compare('valorDeclaradoTotal',$this->valorDeclaradoTotal);
		$criteria->compare('valorFlete',$this->valorFlete);
		$criteria->compare('numeroGuia',$this->numeroGuia,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ComprasDespachoCedi the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
