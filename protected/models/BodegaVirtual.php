<?php

/**
 * This is the model class for table "m_BodegaVirtual".
 *
 * The followings are the available columns in table 'm_BodegaVirtual':
 * @property integer $idBodega
 * @property string $nombreBodega
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property MCiudad[] $mCiudads
 */
class BodegaVirtual extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_BodegaVirtual';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreBodega', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('nombreBodega', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idBodega, nombreBodega, estado', 'safe', 'on'=>'search'),
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
			'listCiudades' => array(self::MANY_MANY, 'Ciudad', 'm_CiudadBodega(idBodega, codigoCiudad)'),
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
			'idBodega' => 'Id Bodega',
			'nombreBodega' => 'Nombre Bodega',
			'estado' => 'Estado',
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

		$criteria->compare('idBodega',$this->idBodega);
		$criteria->compare('nombreBodega',$this->nombreBodega,true);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BodegaVirtual the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	
}
