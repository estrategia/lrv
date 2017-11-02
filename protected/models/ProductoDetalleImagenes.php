<?php

/**
 * This is the model class for table "t_ProductoDetalleImagenes".
 *
 * The followings are the available columns in table 't_ProductoDetalleImagenes':
 * @property string $idProductoDetalleImagen
 * @property string $idProductoDetalle
 * @property string $codigoProducto
 * @property string $tituloImagen
 * @property string $rutaImagenEscritorio
 * @property string $rutaImagenMovil
 * @property string $fechaCreacion
 * @property string $fechaActualizacion
 *
 * The followings are the available model relations:
 * @property ProductoDetalle $objProductoDetalle
 */
class ProductoDetalleImagenes extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 't_ProductoDetalleImagenes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
		    array('idProductoDetalleImagen', 'required', 'on' => 'update', 'message' => '{attribute} no puede estar vac&iacute;o'),
			array('idProductoDetalle, tituloImagen', 'required'),
			array('idProductoDetalle', 'length', 'max'=>19),
			array('rutaImagenEscritorio, rutaImagenMovil', 'length', 'max'=>255),
		    array('rutaImagenEscritorio, rutaImagenMovil', 'file', 'safe' => true, 'types' => 'jpg, jpeg, gif, png, bmp', 'maxSize' => 2 * 1024 * 1024, 'allowEmpty' => false, 'on' => 'create', 'message' => '{attribute} no puede estar vac&iacute;o'),
		    array('rutaImagenEscritorio, rutaImagenMovil', 'file', 'safe' => true, 'types' => 'jpg, jpeg, gif, png, bmp', 'maxSize' => 2 * 1024 * 1024, 'allowEmpty' => true, 'on' => 'update', 'message' => '{attribute} no puede estar vac&iacute;o'),
		    array('tituloImagen', 'length', 'max'=>45),
		    array('fechaCreacion, fechaActualizacion', 'safe'),
		    array('codigoProducto', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idProductoDetalleImagen, idProductoDetalle, tituloImagen, rutaImagenEscritorio, rutaImagenMovil, codigoProducto, fechaCreacion, fechaActualizacion', 'safe', 'on'=>'search'),
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
			'objProductoDetalle' => array(self::BELONGS_TO, 'ProductoDetalle', 'idProductoDetalle'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idProductoDetalleImagen' => 'Id Producto Detalle Imagen',
			'idProductoDetalle' => 'Id Producto Detalle',
		    'tituloImagen' => 'Titulo',
			'rutaImagenEscritorio' => 'Imagen escritorio',
			'rutaImagenMovil' => 'Imagen movil',
		    'tituloImagen' => 'Titulo imagen',
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
        
		$criteria->compare('idProductoDetalleImagen',$this->idProductoDetalleImagen,true);
		$criteria->compare('idProductoDetalle',$this->idProductoDetalle,true);
		$criteria->compare('rutaImagenEscritorio',$this->rutaImagenEscritorio,true);
		$criteria->compare('rutaImagenMovil',$this->rutaImagenMovil,true);
		$criteria->compare('tituloImagen',$this->tituloImagen,true);
		$criteria->compare('codigoProducto',$this->codigoProducto,true);
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
	 * @return ProductoDetalleImagenes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public function beforeSave() {
	    if ($this->isNewRecord) {
	        //$this->fechaCreacion = new CDbExpression('NOW()');
	        $this->fechaCreacion = date('Y-m-d H:i:s');
	        
	        /*$codigoProducto = Yii::app()->db->createCommand("SELECT codigoProducto FROM t_ProductoDetalle WHERE idProductoDetalle='. $this->idProductoDetalle.'")->queryScalar();
	 	        
	        if($codigoProducto!== false){
	            $this->codigoProducto = $codigoProducto;
	        }else {
	            throw new Exception("Producto no detectado en detalle", 404);
	        }*/
	    }
	    
	    return parent::beforeSave();
	}
}
