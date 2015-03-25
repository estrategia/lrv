<?php

/**
 * This is the model class for table "m_Ciudad".
 *
 * The followings are the available columns in table 'm_Ciudad':
 * @property string $codigoCiudad
 * @property string $nombreCiudad
 * @property string $estadoCiudad
 * @property integer $excentoImpuestos
 * @property integer $orden
 * @property integer $codigoSucursal
 */
class Ciudad extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_Ciudad';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoCiudad, nombreCiudad', 'required'),
            array('excentoImpuestos, orden, codigoSucursal', 'numerical', 'integerOnly' => true),
            array('codigoCiudad', 'length', 'max' => 10),
            array('nombreCiudad', 'length', 'max' => 100),
            array('estadoCiudad', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoCiudad, nombreCiudad, estadoCiudad, excentoImpuestos, orden, codigoSucursal', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listSectores' => array(self::MANY_MANY, 'Sector', 'm_SectorCiudad(codigoCiudad, codigoSector)'),
            'listSubSectores' => array(self::HAS_MANY, 'SubSector', 'codigoCiudad'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoCiudad' => 'Codigo Ciudad',
            'nombreCiudad' => 'Nombre Ciudad',
            'estadoCiudad' => 'Estado Ciudad',
            'excentoImpuestos' => 'Excento Impuestos',
            'orden' => 'Orden',
            'codigoSucursal' => 'Codigo Sucursal',
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

        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('nombreCiudad', $this->nombreCiudad, true);
        $criteria->compare('estadoCiudad', $this->estadoCiudad, true);
        $criteria->compare('excentoImpuestos', $this->excentoImpuestos);
        $criteria->compare('orden', $this->orden);
        $criteria->compare('codigoSucursal', $this->codigoSucursal);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Ciudad the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
