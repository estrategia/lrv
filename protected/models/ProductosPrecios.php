<?php

/**
 * This is the model class for table "t_ProductosPrecios".
 *
 * The followings are the available columns in table 't_ProductosPrecios':
 * @property integer $idProductoPrecios
 * @property string $codigoProducto
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property string $precioUnidad
 * @property string $precioFraccion
 * @property integer $costo
 *
 * The followings are the available model relations:
 * @property Ciudad $objCiudad
 * @property Producto $objProducto
 * @property Sector $objSector
 */
class ProductosPrecios extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ProductosPrecios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('costo', 'numerical', 'integerOnly' => true),
            array('codigoProducto, codigoCiudad, codigoSector, precioUnidad, precioFraccion', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idProductoPrecios, codigoProducto, codigoCiudad, codigoSector, precioUnidad, precioFraccion, costo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
            'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idProductoPrecios' => 'Id Producto Precios',
            'codigoProducto' => 'Codigo Producto',
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
            'precioUnidad' => 'Precio Unidad',
            'precioFraccion' => 'Precio Fraccion',
            'costo' => 'Costo',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idProductoPrecios', $this->idProductoPrecios);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('precioUnidad', $this->precioUnidad, true);
        $criteria->compare('precioFraccion', $this->precioFraccion, true);
        $criteria->compare('costo', $this->costo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductosPrecios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
