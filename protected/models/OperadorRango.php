<?php

/**
 * This is the model class for table "m_OperadorRango".
 *
 * The followings are the available columns in table 'm_OperadorRango':
 * @property integer $idOperadorRango
 * @property integer $idOperadorLogistico
 * @property integer $tipo
 * @property double $valorInicial
 * @property double $valorFinal
 *
 * The followings are the available model relations:
 * @property MOperadorLogistico $idOperadorLogistico0
 */
class OperadorRango extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_OperadorRango';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idOperadorLogistico, tipo, valorInicial, valorFinal', 'required'),
			array('idOperadorLogistico, tipo', 'numerical', 'integerOnly'=>true),
			array('valorInicial, valorFinal', 'numerical'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idOperadorRango, idOperadorLogistico, tipo, valorInicial, valorFinal', 'safe', 'on'=>'search'),
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
			'idOperadorLogistico0' => array(self::BELONGS_TO, 'MOperadorLogistico', 'idOperadorLogistico'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idOperadorRango' => 'Id Operador Rango',
			'idOperadorLogistico' => 'Id Operador Logistico',
			'tipo' => 'Tipo',
			'valorInicial' => 'Valor Inicial',
			'valorFinal' => 'Valor Final',
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

		$criteria->compare('idOperadorRango',$this->idOperadorRango);
		$criteria->compare('idOperadorLogistico',$this->idOperadorLogistico);
		$criteria->compare('tipo',$this->tipo);
		$criteria->compare('valorInicial',$this->valorInicial);
		$criteria->compare('valorFinal',$this->valorFinal);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return OperadorRango the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
