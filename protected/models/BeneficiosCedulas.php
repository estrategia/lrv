<?php

/**
 * This is the model class for table "t_BeneficiosCedulas".
 *
 * The followings are the available columns in table 't_BeneficiosCedulas':
 * @property string $IdBeneficio
 * @property integer $numeroDocumento
 *
 * The followings are the available model relations:
 * @property TBeneficios $idBeneficio
 */
class BeneficiosCedulas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_BeneficiosCedulas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('IdBeneficio, numeroDocumento', 'required'),
			array('numeroDocumento', 'numerical', 'integerOnly'=>true),
			array('IdBeneficio', 'length', 'max'=>11),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('IdBeneficio, numeroDocumento', 'safe', 'on'=>'search'),
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
			'objBeneficio' => array(self::BELONGS_TO, 'Beneficios', 'IdBeneficio'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'IdBeneficio' => 'Id Beneficio',
			'numeroDocumento' => 'Numero Documento',
                        'estado' => 'Estado'
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

		$criteria->compare('IdBeneficio',$this->IdBeneficio,true);
		$criteria->compare('numeroDocumento',$this->numeroDocumento);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return BeneficiosCedulas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
