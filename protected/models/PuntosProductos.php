<?php

/**
 * This is the model class for table "t_PuntosProductos".
 *
 * The followings are the available columns in table 't_PuntosProductos':
 * @property integer $idPunto
 * @property string $codigoProducto
 * @property integer $cantidad
 * 
 * The followings are the available model relations:
 * @property Puntos $objPuntos
 * @property Producto $objProducto
 */
class PuntosProductos extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_PuntosProductos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idPunto, codigoProducto', 'required'),
            array('idPunto, cantidad', 'numerical', 'integerOnly' => true),
            array('codigoProducto', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPunto, codigoProducto, cantidad', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objPuntos' => array(self::BELONGS_TO, 'Puntos', 'idPunto'),
            'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPunto' => 'Id Punto',
            'codigoProducto' => 'Codigo Producto',
            'cantidad' => 'Cantidad',
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

        $criteria->compare('idPunto', $this->idPunto);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('cantidad', $this->cantidad);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PuntosProductos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
