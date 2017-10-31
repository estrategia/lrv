<?php

/**
 * This is the model class for table "t_ProductoDetalle".
 *
 * The followings are the available columns in table 't_ProductoDetalle':
 * @property string $idProductoDetalle
 * @property string $codigoProducto
 * @property string $titulo
 * @property string $contenidoEscritorio
 * @property string $contenidoMovil
 * @property integer $estado
 * @property string $fechaCreacion
 * @property string $fechaActualizacion
 *
 * The followings are the available model relations:
 * @property Producto $objProducto
 * @property ProductoDetalleImagenes[] $listProductoDetalleImagenes
 * @property ProductoDetalleVideos[] $listProductoDetalleVideos
 */
class ProductoDetalle extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ProductoDetalle';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigoProducto, titulo, contenidoEscritorio, contenidoMovil, fechaCreacion, fechaActualizacion', 'required'),
			array('estado', 'numerical', 'integerOnly'=>true),
			array('codigoProducto', 'length', 'max'=>10),
			array('titulo', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProductoDetalle, codigoProducto, titulo, contenidoEscritorio, contenidoMovil, estado, fechaCreacion, fechaActualizacion', 'safe', 'on'=>'search'),
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
			'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
			'listProductoDetalleImagenes' => array(self::HAS_MANY, 'ProductoDetalleImagenes', 'idProductoDetalle'),
			'listProductoDetalleVideos' => array(self::HAS_MANY, 'ProductoDetalleVideos', 'idProductoDetalle'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProductoDetalle' => 'Id Producto Detalle',
			'codigoProducto' => 'Codigo Producto',
			'titulo' => 'Titulo',
			'contenidoEscritorio' => 'Contenido Escritorio',
			'contenidoMovil' => 'Contenido Movil',
			'estado' => 'Estado',
			'fechaCreacion' => 'Fecha Creacion',
			'fechaActualizacion' => 'Fecha Actualizacion',
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

		$criteria->compare('idProductoDetalle',$this->idProductoDetalle,true);
		$criteria->compare('codigoProducto',$this->codigoProducto,true);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('contenidoEscritorio',$this->contenidoEscritorio,true);
		$criteria->compare('contenidoMovil',$this->contenidoMovil,true);
		$criteria->compare('estado',$this->estado);
		$criteria->compare('fechaCreacion',$this->fechaCreacion,true);
		$criteria->compare('fechaActualizacion',$this->fechaActualizacion,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return ProductoDetalle the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
