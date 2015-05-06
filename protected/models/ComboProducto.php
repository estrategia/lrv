<?php

/**
 * This is the model class for table "m_ComboProducto".
 *
 * The followings are the available columns in table 'm_ComboProducto':
 * @property integer $idComboProducto
 * @property integer $idCombo
 * @property string $codigoProducto
 * @property integer $precio
 *
 * The followings are the available model relations:
 * @property Combo $objCombo
 * @property Producto $objProducto
 */
class ComboProducto extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_ComboProducto';
    }
    
    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idCombo, codigoProducto, precio', 'required'),
            array('idCombo, precio', 'numerical', 'integerOnly' => true),
            array('codigoProducto', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idComboProducto, idCombo, codigoProducto, precio', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objCombo' => array(self::BELONGS_TO, 'Combo', 'idCombo'),
            'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idComboProducto' => 'Id Combo Producto',
            'idCombo' => 'Id Combo',
            'codigoProducto' => 'Codigo Producto',
            'precio' => 'Precio',
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

        $criteria->compare('idComboProducto', $this->idComboProducto);
        $criteria->compare('idCombo', $this->idCombo);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('precio', $this->precio);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ComboProducto the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
