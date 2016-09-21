<?php

/**
 * This is the model class for table "t_ProductosFormulaVitalCall".
 *
 * The followings are the available columns in table 't_ProductosFormulaVitalCall':
 * @property string $idFormula
 * @property string $idProductoVitalCall
 * @property string $cantidad
 * @property string $dosis
 * @property string $intervalo
 * @property string $fechaCreacion
 * 
 * @property ProductosVitalCall $objProductoVC
 * @property FormulasVitalCall[] $listFormulasVC
 */
class ProductosFormulaVitalCall extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ProductosFormulaVitalCall';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idFormula, idProductoVitalCall, cantidad, dosis, intervalo, fechaCreacion', 'required'),
            array('idFormula, idProductoVitalCall, cantidad, dosis, intervalo', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idFormula, idProductoVitalCall, cantidad, dosis, intervalo, fechaCreacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objProductoVC' => array(self::BELONGS_TO, 'ProductosVitalCall', 'idProductoVitalCall'),
            'listFormulasVC' => array(self::HAS_MANY, 'FormulasVitalCall', 'identificacionUsuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idFormula' => 'Id Formula',
            'idProductoVitalCall' => 'Id Producto Vitall Call',
            'cantidad' => 'Cantidad',
            'dosis' => 'Dosis',
            'intervalo' => 'Intervalo',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('idFormula', $this->idFormula, true);
        $criteria->compare('idProductoVitalCall', $this->idProductoVitalCall, true);
        $criteria->compare('cantidad', $this->cantidad, true);
        $criteria->compare('dosis', $this->dosis, true);
        $criteria->compare('intervalo', $this->intervalo, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ProductosFormulaVitalCall the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
