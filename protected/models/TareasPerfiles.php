<?php

/**
 * This is the model class for table "t_TareasPerfiles".
 *
 * The followings are the available columns in table 't_TareasPerfiles':
 * @property integer $idTareaPerfil
 * @property string $rutaArchivo
 * @property integer $tipoTarea
 * @property integer $estado
 * @property string $fechaRegistro
 */
class TareasPerfiles extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_TareasPerfiles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rutaArchivo, tipoTarea, estado', 'required'),
			array('tipoTarea, estado', 'numerical', 'integerOnly'=>true),
			array('rutaArchivo', 'length', 'max'=>256),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idTareaPerfil, rutaArchivo, tipoTarea, estado, fechaRegistro', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idTareaPerfil' => 'Id Tarea Perfil',
			'rutaArchivo' => 'Ruta Archivo',
			'tipoTarea' => 'Tipo Tarea',
			'estado' => 'Estado',
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

		$criteria->compare('idTareaPerfil',$this->idTareaPerfil);
		$criteria->compare('rutaArchivo',$this->rutaArchivo,true);
		$criteria->compare('tipoTarea',$this->tipoTarea);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fechaRegistro',$this->fechaRegistro,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return TareasPerfiles the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
