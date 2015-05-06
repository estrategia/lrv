<?php

/**
 * This is the model class for table "t_ProductosDescuentosEspeciales".
 *
 * The followings are the available columns in table 't_ProductosDescuentosEspeciales':
 * @property string $idDescuentosEspecial
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property string $codigoProducto
 * @property integer $codigoPerfil
 * @property integer $descuentoPerfil
 * @property string $fechaInicio
 * @property string $fechaFin
 *
 * The followings are the available model relations:
 * @property MCiudad $codigoCiudad0
 * @property MPerfil $codigoPerfil0
 * @property MProducto $codigoProducto0
 * @property MSector $codigoSector0
 */
class ProductosDescuentosEspeciales extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ProductosDescuentosEspeciales';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoCiudad, codigoSector, codigoProducto, codigoPerfil, descuentoPerfil, fechaInicio, fechaFin', 'required'),
            array('codigoPerfil, descuentoPerfil', 'numerical', 'integerOnly' => true),
            array('codigoCiudad, codigoSector, codigoProducto', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idDescuentosEspecial, codigoCiudad, codigoSector, codigoProducto, codigoPerfil, descuentoPerfil, fechaInicio, fechaFin', 'safe', 'on' => 'search'),
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
            'objPerfil' => array(self::BELONGS_TO, 'Perfil', 'codigoPerfil'),
            'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idDescuentosEspecial' => 'Id Descuentos Especial',
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
            'codigoProducto' => 'Codigo Producto',
            'codigoPerfil' => 'Codigo Perfil',
            'descuentoPerfil' => 'Descuento Perfil',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
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

        $criteria->compare('idDescuentosEspecial', $this->idDescuentosEspecial, true);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('codigoPerfil', $this->codigoPerfil);
        $criteria->compare('descuentoPerfil', $this->descuentoPerfil);
        $criteria->compare('fechaInicio', $this->fechaInicio, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductosDescuentosEspeciales the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
