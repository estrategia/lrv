<?php

/**
 * This is the model class for table "t_Mascota".
 *
 * The followings are the available columns in table 't_Mascota':
 * @property integer $idMascota
 * @property integer $cedulaCliente
 * @property string $nombreCliente
 * @property string $fechaNacimientoCliente
 * @property string $direccion
 * @property string $codigoCiudad
 * @property integer $telefono
 * @property integer $tipoMascota
 * @property string $nombreMascota
 * @property integer $edadMascota
 * @property string $fechaRegistro
 *
 * The followings are the available model relations:
 * @property MCiudad $codigoCiudad0
 */
class Mascotas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_Mascotas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cedulaCliente, nombreCliente, direccion, codigoCiudad, telefono, tipoMascota, nombreMascota, edadMascota, correo', 'required'),
			array('cedulaCliente, telefono, tipoMascota, edadMascota', 'numerical', 'integerOnly'=>true),
			array('nombreCliente', 'length', 'max'=>64),
			array('correo','email'),
			array('direccion, nombreMascota', 'length', 'max'=>32),
			array('codigoCiudad', 'length', 'max'=>10),
			array('fechaNacimientoCliente, fechaRegistro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idMascota, cedulaCliente, nombreCliente, fechaNacimientoCliente, direccion, codigoCiudad, telefono, tipoMascota, nombreMascota, edadMascota, fechaRegistro', 'safe', 'on'=>'search'),
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
			'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idMascota' => 'Id Mascota',
			'cedulaCliente' => 'Cedula Cliente',
			'nombreCliente' => 'Nombre Cliente',
			'fechaNacimientoCliente' => 'Fecha Nacimiento Cliente',
			'direccion' => 'Direccion',
			'codigoCiudad' => 'Codigo Ciudad',
			'correo' => 'Correo',
			'telefono' => 'Telefono',
			'tipoMascota' => 'Tipo Mascota',
			'nombreMascota' => 'Nombre Mascota',
			'edadMascota' => 'Edad Mascota',
			'fechaRegistro' => 'Fecha Registro',
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

		$criteria->compare('idMascota',$this->idMascota);
		$criteria->compare('cedulaCliente',$this->cedulaCliente);
		$criteria->compare('nombreCliente',$this->nombreCliente,true);
		$criteria->compare('fechaNacimientoCliente',$this->fechaNacimientoCliente);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('codigoCiudad',$this->codigoCiudad,true);
		$criteria->compare('telefono',$this->telefono);
		$criteria->compare('correo',$this->correo, true);
		$criteria->compare('tipoMascota',$this->tipoMascota);
		$criteria->compare('nombreMascota',$this->nombreMascota,true);
		$criteria->compare('edadMascota',$this->edadMascota);
		$criteria->compare('fechaRegistro',$this->fechaRegistro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Mascota the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function exportar() {
		ini_set('memory_limit', '-1');
		$content = '"# Mascota";"Cedula";"Nombre Amo";"Fecha Nacimiento";"Direccion";"Correo";"Ciudad";"Telefono";"Tipo Mascota";"Nombre Mascota";"Edad Mascota";"FechaRegistro"'."\n";
		$dataProvider = $this->search(true);
	
		if ($dataProvider !== null) {
			foreach ($dataProvider->getData() as $idx => $objMascota) {
				$content .= "$objMascota->idMascota;$objMascota->cedulaCliente;$objMascota->nombreCliente;$objMascota->fechaNacimientoCliente;$objMascota->direccion;$objMascota->correo;".$objMascota->objCiudad->nombreCiudad.";$objMascota->telefono;".
				Yii::app()->params->mascotas['tipo'][$objMascota->tipoMascota].";$objMascota->nombreMascota;$objMascota->edadMascota;$objMascota->fechaRegistro\n";
			}
		}
	
		Yii::app()->request->sendFile('BonosLRV_' . date('YmdHis') . '.csv', $content);
		Yii::app()->end();
	}
}
