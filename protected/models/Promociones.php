<?php

/**
 * This is the model class for table "t_Promociones".
 *
 * The followings are the available columns in table 't_Promociones':
 * @property integer $idPromocion
 * @property string $rutaImagen
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $descripcion
 * @property string $dias
 * @property integer $idCategoriaTienda
 * @property integer $estado
 *
 * The followings are the available model relations:
 * @property MCategoriaTienda $idCategoriaTienda0
 */
class Promociones extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_Promociones';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechaInicio, fechaFin, descripcion, dias, nombre, url', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('rutaImagen, url', 'length', 'max'=>128),
			array('descripcion, nombre', 'length', 'max'=>64),
			array('dias', 'length', 'max'=>32),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idPromocion, rutaImagen, fechaInicio, fechaFin, descripcion, dias, nombre, url, estado', 'safe', 'on'=>'search'),
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
			//'objCategoriaTienda' => array(self::BELONGS_TO, 'CategoriaTienda', 'idCategoriaTienda'),
			'listSectorCiudad' => array(self::HAS_MANY, 'PromocionesSectorCiudad', 'idPromocion'),	
			'listCategoriasTienda' => array(self::HAS_MANY, 'PromocionesCategorias', 'idPromocion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idPromocion' => 'Id Promocion',
			'rutaImagen' => 'Ruta Imagen',
			'fechaInicio' => 'Fecha Inicio',
			'fechaFin' => 'Fecha Fin',
			'descripcion' => 'Descripcion',
			'dias' => 'Dias',
			'nombre' => 'Nombre',
			//'idCategoriaTienda' => 'Categoria Tienda',
			'estado' => 'Estado',
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

		$criteria->compare('idPromocion',$this->idPromocion);
		$criteria->compare('rutaImagen',$this->rutaImagen,true);
		$criteria->compare('fechaInicio',$this->fechaInicio,true);
		$criteria->compare('fechaFin',$this->fechaFin,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('dias',$this->dias,true);
	//	$criteria->compare('idCategoriaTienda',$this->idCategoriaTienda);
		$criteria->compare('estado',$this->estado);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Promociones the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
