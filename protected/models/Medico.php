<?php

/**
 * This is the model class for table "m_Medico".
 *
 * The followings are the available columns in table 'm_Medico':
 * @property string $registro
 * @property string $nombre
 * @property string $institucion
 * @property string $telefono
 * @property string $correoElectronico
 */
class Medico extends CActiveRecord{
	/**
	 * @return string the associated database table name
	 */
	public function tableName(){
		return 'm_Medico';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules(){
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('registro, nombre, institucion, telefono', 'required'),
			array('registro', 'length', 'max'=>20),
			array('nombre, institucion', 'length', 'max'=>200),
			array('telefono', 'length', 'max'=>50),
			array('correoElectronico', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('registro, nombre, institucion, telefono, correoElectronico', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations(){
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels(){
		return array(
			'registro' => 'Registro',
			'nombre' => 'Nombre',
			'institucion' => 'Institucion',
			'telefono' => 'Telefono',
			'correoElectronico' => 'Correo Electronico',
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
	public function search(){
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('registro',$this->registro,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('institucion',$this->institucion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('correoElectronico',$this->correoElectronico,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Medico the static model class
	 */
	public static function model($className=__CLASS__){
		return parent::model($className);
	}
}
