<?php

/**
 * This is the model class for table "t_ProductosVitallCall".
 *
 * The followings are the available columns in table 't_ProductosVitallCall':
 * @property string $idProductoVitallCall
 * @property string $codigoProducto
 * @property string $descripcion
 * @property integer $estado
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $fechaCreacion
 *
 * The followings are the available model relations:
 * @property TFormulasVitalCall[] $tFormulasVitalCalls
 * @property MProducto $codigoProducto0
 */
class ProductosVitallCall extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ProductosVitallCall';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigoProducto, descripcion, fechaInicio, fechaFin, fechaCreacion', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('codigoProducto', 'length', 'max'=>10),
			array('descripcion', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProductoVitallCall, codigoProducto, descripcion, estado, fechaInicio, fechaFin, fechaCreacion', 'safe', 'on'=>'search'),
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
			'tFormulasVitalCalls' => array(self::MANY_MANY, 'TFormulasVitalCall', 't_ProductosFormulaVitalCall(idProductoVitallCall, idFormula)'),
			'codigoProducto0' => array(self::BELONGS_TO, 'MProducto', 'codigoProducto'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProductoVitallCall' => 'Id Producto Vitall Call',
			'codigoProducto' => 'Codigo Producto',
			'descripcion' => 'Descripcion',
			'estado' => 'Estado',
			'fechaInicio' => 'Fecha Inicio',
			'fechaFin' => 'Fecha Fin',
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

		$criteria->compare('idProductoVitallCall',$this->idProductoVitallCall,true);
		$criteria->compare('codigoProducto',$this->codigoProducto,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fechaInicio',$this->fechaInicio,true);
		$criteria->compare('fechaFin',$this->fechaFin,true);
		$criteria->compare('fechaCreacion',$this->fechaCreacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductosVitallCall the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
