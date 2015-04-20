<?php

/**
 * This is the model class for table "m_Combo".
 *
 * The followings are the available columns in table 'm_Combo':
 * @property integer $idCombo
 * @property string $codigoSector
 * @property string $codigoCiudad
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property integer $estadoCombo
 * @property integer $saldo
 *
 * The followings are the available model relations:
 * @property Ciudad objCiudad
 * @property Sector $objSector
 * @property Producto[] $listProductos
 * @property ImagenCombo[] $listImagenes
 */
class Combo extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_Combo';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('descripcionCombo, codigoSector, codigoCiudad, fechaInicio, fechaFin', 'required'),
            array('estadoCombo, saldo', 'numerical', 'integerOnly' => true),
            array('descripcionCombo', 'length', 'max' => 100),
            array('codigoSector, codigoCiudad', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCombo, descripcionCombo, codigoSector, codigoCiudad, fechaInicio, fechaFin, estadoCombo, saldo', 'safe', 'on' => 'search'),
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
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
            'listProductosCombo' => array(self::HAS_MANY, 'ComboProducto', 'idCombo'),
            'listProductos' => array(self::MANY_MANY, 'Producto', 'm_ComboProducto(idCombo, codigoProducto)'),
            'listImagenes' => array(self::HAS_MANY, 'ImagenCombo', 'idCombo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCombo' => 'Id Combo',
            'descripcionCombo' => 'Descripcion Combo',
            'codigoSector' => 'Codigo Sector',
            'codigoCiudad' => 'Codigo Ciudad',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
            'estadoCombo' => 'Estado Combo',
            'saldo' => 'Saldo',
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

        $criteria->compare('idCombo', $this->idCombo);
        $criteria->compare('descripcionCombo', $this->descripcionCombo, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('fechaInicio', $this->fechaInicio, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);
        $criteria->compare('estadoCombo', $this->estadoCombo);
        $criteria->compare('saldo', $this->saldo);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return MCombo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * Retorna el tipo de imagen de un producto, si no se detecta, retorna null
     * @param int tipo de imagen
     * @return Imagen imagen del producto
     */
    public function objImagen($tipo) {
        $obj = null;

        foreach ($this->listImagenes as $imagen) {
            if ($imagen->tipoImagen == $tipo && $imagen->estadoImagen==1) {
                $obj = $imagen;
                break;
            }
        }
        return $obj;
    }
    
    /**
     * Retorna lista del tipo de imagen de un producto, si no se detecta
     * @param int tipo de imagen
     * @return array imagen del producto
     */
    public function listImagen($tipo) {
        $list = array();

        foreach ($this->listImagenes as $imagen) {
            if ($imagen->tipoImagen == $tipo && $imagen->estadoImagen==1) {
                $list[] = $imagen;
            }
        }
        return $list;
    }
    
    public function getPrecio(){
        $precio = 0;
        
        foreach($this->listProductosCombo as $objProductoCombo){
            $precio += $objProductoCombo->precio;
        }
        
        return $precio;
    }
    
    public function getCodigo(){
        return "C-$this->idCombo";
    }

}
