<?php

/**
 * This is the model class for table "t_FleteProductoTercero".
 *
 * The followings are the available columns in table 't_FleteProductoTercero':
 * @property string $idFleteProducto
 * @property string $codigoProducto
 * @property string $codigoCiudad
 * @property integer $valorFlete
 * @property string $tiempoEntregaInicial
 * @property string $tiempoEntregaFinal
 * @property string $unidadesMismoValor
 *
 * The followings are the available model relations:
 * @property MCiudad $codigoCiudad0
 * @property MProducto $codigoProducto0
 */
class FleteProductoTercero extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_FleteProductoTercero';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigoProducto, codigoCiudad, tiempoEntregaInicial, tiempoEntregaFinal, unidadesMismoValor', 'required'),
			array('valorFlete', 'numerical', 'integerOnly'=>true),
			array('idFleteProducto', 'length', 'max'=>20),

			array('codigoProducto, codigoCiudad, tiempoEntregaInicial, tiempoEntregaFinal, unidadesMismoValor', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idFleteProducto, codigoProducto, codigoCiudad, valorFlete, tiempoEntregaInicial, tiempoEntregaFinal, unidadesMismoValor', 'safe', 'on'=>'search'),
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
			'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
			'producto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFleteProducto' => 'Id Flete Producto',
			'codigoProducto' => 'Codigo Producto',
			'codigoCiudad' => 'Ciudad Destino',
			'valorFlete' => 'Valor Flete',
			'tiempoEntregaInicial' => 'Tiempo Entrega Inicial',
			'tiempoEntregaFinal' => 'Tiempo Entrega Final',
			'unidadesMismoValor' => 'Unidades Mismo Valor',
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

		$criteria->compare('idFleteProducto',$this->idFleteProducto,true);
		$criteria->compare('codigoProducto',$this->codigoProducto,true);
		$criteria->compare('codigoCiudad',$this->codigoCiudad,true);
		$criteria->compare('valorFlete',$this->valorFlete);
		$criteria->compare('tiempoEntregaInicial',$this->tiempoEntregaInicial,true);
		$criteria->compare('tiempoEntregaFinal',$this->tiempoEntregaFinal,true);
		$criteria->compare('unidadesMismoValor',$this->unidadesMismoValor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	public function searchProducto()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idFleteProducto',$this->idFleteProducto,true);
		$criteria->compare('codigoProducto',$this->codigoProducto,true);
		$criteria->compare('codigoCiudad',$this->codigoCiudad,true);
		$criteria->compare('valorFlete',$this->valorFlete);
		$criteria->compare('tiempoEntregaInicial',$this->tiempoEntregaInicial,true);
		$criteria->compare('tiempoEntregaFinal',$this->tiempoEntregaFinal,true);
		$criteria->compare('unidadesMismoValor',$this->unidadesMismoValor,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FleteProductoTercero the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
