<?php

/**
 * This is the model class for table "t_PerfilCompras".
 *
 * The followings are the available columns in table 't_PerfilCompras':
 * @property integer $idPerfilCompras
 * @property integer $codigoPerfil
 * @property integer $saldosMinimos
 * @property integer $cantidadDespacharItem
 * @property integer $valorMaximoItem
 * @property string $codigoCiudad
 * @property string $codigoSector
 *
 * The followings are the available model relations:
 * @property MPerfil $codigoPerfil0
 * @property MCiudad $codigoCiudad0
 * @property MSector $codigoSector0
 */
class PerfilCompras extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_PerfilCompras';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigoPerfil, saldosMinimos, cantidadDespacharItem, valorMaximoItem, codigoCiudad, codigoSector', 'required'),
			array('codigoPerfil, saldosMinimos, cantidadDespacharItem, valorMaximoItem', 'numerical', 'integerOnly'=>true),
			array('codigoCiudad, codigoSector', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPerfilCompras, codigoPerfil, saldosMinimos, cantidadDespacharItem, valorMaximoItem, codigoCiudad, codigoSector', 'safe', 'on'=>'search'),
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
			'codigoPerfil0' => array(self::BELONGS_TO, 'MPerfil', 'codigoPerfil'),
			'codigoCiudad0' => array(self::BELONGS_TO, 'MCiudad', 'codigoCiudad'),
			'codigoSector0' => array(self::BELONGS_TO, 'MSector', 'codigoSector'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPerfilCompras' => 'Id Perfil Compras',
			'codigoPerfil' => 'Codigo Perfil',
			'saldosMinimos' => 'Saldos Minimos',
			'cantidadDespacharItem' => 'Cantidad Despachar Item',
			'valorMaximoItem' => 'Valor Maximo Item',
			'codigoCiudad' => 'Codigo Ciudad',
			'codigoSector' => 'Codigo Sector',
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

		$criteria->compare('idPerfilCompras',$this->idPerfilCompras);
		$criteria->compare('codigoPerfil',$this->codigoPerfil);
		$criteria->compare('saldosMinimos',$this->saldosMinimos);
		$criteria->compare('cantidadDespacharItem',$this->cantidadDespacharItem);
		$criteria->compare('valorMaximoItem',$this->valorMaximoItem);
		$criteria->compare('codigoCiudad',$this->codigoCiudad,true);
		$criteria->compare('codigoSector',$this->codigoSector,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return PerfilCompras the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
