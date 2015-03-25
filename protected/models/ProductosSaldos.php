<?php

/**
 * This is the model class for table "t_ProductosSaldos".
 *
 * The followings are the available columns in table 't_ProductosSaldos':
 * @property integer $idProductoSaldos
 * @property string $codigoProducto
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property string $saldoUnidad
 * @property string $saldoFraccion
 *
 * The followings are the available model relations:
 * @property Producto $objProducto
 * @property Ciudad $objCiudad
 * @property Sector $objSector
 */
class ProductosSaldos extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ProductosSaldos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoProducto, codigoCiudad, codigoSector, saldoUnidad, saldoFraccion', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idProductoSaldos, codigoProducto, codigoCiudad, codigoSector, saldoUnidad, saldoFraccion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idProductoSaldos' => 'Id Producto Saldos',
            'codigoProducto' => 'Codigo Producto',
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
            'saldoUnidad' => 'Saldo Unidad',
            'saldoFraccion' => 'Saldo Fraccion',
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

        $criteria->compare('idProductoSaldos', $this->idProductoSaldos);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('saldoUnidad', $this->saldoUnidad, true);
        $criteria->compare('saldoFraccion', $this->saldoFraccion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductosSaldos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
