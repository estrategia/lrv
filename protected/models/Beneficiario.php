<?php

/**
 * This is the model class for table "m_Beneficiario".
 *
 * The followings are the available columns in table 'm_Beneficiario':
 * @property integer $idBeneficiario
 * @property integer $numeroDocumento
 * @property string $nombre
 * @property string $direccion
 * @property string $telefono
 * @property string $extension
 * @property string $celular
 *
 * The followings are the available model relations:
 * @property MCliente $numeroDocumento0
 */
class Beneficiario extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_Beneficiario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('numeroDocumento, nombre, direccion, telefono, extension, celular', 'required'),
			array('numeroDocumento', 'numerical', 'integerOnly'=>true),
			array('nombre, direccion', 'length', 'max'=>255),
			array('telefono, extension, celular', 'length', 'max'=>15),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idBeneficiario, numeroDocumento, nombre, direccion, telefono, extension, celular', 'safe', 'on'=>'search'),
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
			'numeroDocumento0' => array(self::BELONGS_TO, 'MCliente', 'numeroDocumento'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idBeneficiario' => 'Id Beneficiario',
			'numeroDocumento' => 'Numero Documento',
			'nombre' => 'Nombre',
			'direccion' => 'Direccion',
			'telefono' => 'Telefono',
			'extension' => 'Extension',
			'celular' => 'Celular',
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

		$criteria->compare('idBeneficiario',$this->idBeneficiario);
		$criteria->compare('numeroDocumento',$this->numeroDocumento);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('telefono',$this->telefono,true);
		$criteria->compare('extension',$this->extension,true);
		$criteria->compare('celular',$this->celular,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Beneficiario the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
