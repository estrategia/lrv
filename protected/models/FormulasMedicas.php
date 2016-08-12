<?php

/**
 * This is the model class for table "t_FormulasMedicas".
 *
 * The followings are the available columns in table 't_FormulasMedicas':
 * @property integer $idFormulaMedica
 * @property integer $idCompra
 * @property string $nombreMedico
 * @property string $institucion
 * @property string $registroMedico
 * @property string $descripcion
 * @property string $formulaMedica
 *
 * The followings are the available model relations:
 * @property TCompras $idCompra0
 */
class FormulasMedicas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
    
	public function tableName()
	{
		return 't_FormulasMedicas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idCompra, telefono', 'numerical', 'integerOnly'=>true),
			array('nombreMedico, institucion, registroMedico, correoElectronico', 'length', 'max'=>64),
			array('telefono', 'length', 'max'=>20),			
            array('correoElectronico', 'email'),            
            array('formulaMedica', 'length', 'max'=>128),
			array('nombreMedico, telefono', 'required', 'on' => 'datosMedico'),

			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idFormulaMedica, idCompra, nombreMedico, institucion, registroMedico, descripcion, formulaMedica', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFormulaMedica' => 'Id Formula Medica',
			'idCompra' => 'Id Compra',
			'nombreMedico' => 'Nombre Medico',
			'institucion' => 'Institucion',
			'registroMedico' => 'Registro Medico',
			'telefono' => 'Teléfono',
			'correoElectronico' => 'Correo Electrónico',						
			'formulaMedica' => 'Formula Medica',
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

		$criteria->compare('idFormulaMedica',$this->idFormulaMedica);
		$criteria->compare('idCompra',$this->idCompra);
		$criteria->compare('nombreMedico',$this->nombreMedico,true);
		$criteria->compare('institucion',$this->institucion,true);
		$criteria->compare('registroMedico',$this->registroMedico,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('formulaMedica',$this->formulaMedica,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return FormulasMedicas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
