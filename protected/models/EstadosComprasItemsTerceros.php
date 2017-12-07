<?php

/**
 * This is the model class for table "m_EstadosComprasItemsTerceros".
 *
 * The followings are the available columns in table 'm_EstadosComprasItemsTerceros':
 * @property integer $idEstadoItemTercero
 * @property string $nombre
 * @property string $fechaCreacion
 */
class EstadosComprasItemsTerceros extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'm_EstadosComprasItemsTerceros';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, editableTercero, estado, fechaCreacion', 'required'),
			array('nombre', 'length', 'max'=>60),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idEstadoItemTercero, nombre, fechaCreacion', 'safe', 'on'=>'search'),
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
			'idEstadoItemTercero' => 'Id Estado Item Tercero',
			'nombre' => 'Nombre',
			'fechaCreacion' => 'Fecha Creacion',
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

		$criteria->compare('idEstadoItemTercero',$this->idEstadoItemTercero);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fechaCreacion',$this->fechaCreacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EstadosComprasItemsTerceros the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
