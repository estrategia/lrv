<?php

/**
 * This is the model class for table "m_Cliente".
 *
 * The followings are the available columns in table 'm_Cliente':
 * @property integer $numeroDocumento
 * @property string $nombre
 * @property string $telefono
 * @property string $celular
 * @property string $email
 *
 * The followings are the available model relations:
 * @property MBeneficiario[] $mBeneficiarios
 */
class Cliente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_Cliente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numeroDocumento, nombre, telefono,  email', 'required'),
			array('numeroDocumento', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			array('telefono', 'length', 'max'=>12),
			array('email', 'length', 'max'=>62),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('numeroDocumento, nombre, telefono,  email', 'safe', 'on'=>'search'),
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
			'mBeneficiarios' => array(self::HAS_MANY, 'MBeneficiario', 'numeroDocumento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'numeroDocumento' => 'Numero Documento',
			'nombre' => 'Nombre',
			'telefono' => 'Telefono',
			'email' => 'Email',
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

		$criteria->compare('numeroDocumento',$this->numeroDocumento);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cliente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
