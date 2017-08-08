<?php

/**
 * This is the model class for table "m_MenuItemPublicidad".
 *
 * The followings are the available columns in table 'm_MenuItemPublicidad':
 * @property integer $idItem
 * @property string $codigoPublicidad
 * @property string $enlace
 * @property string $iconoMovil
 * @property string $iconoDesktop
 *
 * The followings are the available model relations:
 * @property MMenuPublicidad $codigoPublicidad0
 */
class MenuItemPublicidad extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_MenuItemPublicidad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idModulo, enlace, titulo', 'required'),
			array('enlace, enlaceMovil, titulo, iconoMovil, iconoDesktop', 'length', 'max'=>64),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idItem, idModulo,  enlace, iconoMovil, iconoDesktop', 'safe', 'on'=>'search'),
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
			'objMenuPublicidad' => array(self::BELONGS_TO, 'MenuPublicidad', 'idModulo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idItem' => 'Id Item',
			'idModulo' => 'Modulo',
			'enlace' => 'Enlace',
			'iconoMovil' => 'Icono Movil',
			'iconoDesktop' => 'Icono Desktop',
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

		$criteria->compare('idItem',$this->idItem);
		$criteria->compare('codigoPublicidad',$this->codigoPublicidad,true);
		$criteria->compare('enlace',$this->enlace,true);
		$criteria->compare('iconoMovil',$this->iconoMovil,true);
		$criteria->compare('iconoDesktop',$this->iconoDesktop,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return MenuItemPublicidad the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
