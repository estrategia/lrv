<?php

/**
 * This is the model class for table "m_ModuloPerfil".
 *
 * The followings are the available columns in table 'm_ModuloPerfil':
 * @property string $idModuloPerfil
 * @property integer $idModulo
 * @property integer $idPerfil
 *
 * The followings are the available model relations:
 * @property MModulosConfigurados $idModulo0
 */
class ModuloPerfil extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_ModuloPerfil';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idModulo, idPerfil', 'required'),
			array('idModulo', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idModuloPerfil, idModulo, idPerfil', 'safe', 'on'=>'search'),
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
			'objModulo' => array(self::BELONGS_TO, 'ModulosConfigurados', 'idModulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idModuloPerfil' => 'Id Modulo Perfil',
			'idModulo' => 'Modulo',
			'idPerfil' => 'Perfil(es)',
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

		$criteria->compare('idModuloPerfil',$this->idModuloPerfil,true);
		$criteria->compare('idModulo',$this->idModulo);
		$criteria->compare('idPerfil',$this->idPerfil);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ModuloPerfil the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
