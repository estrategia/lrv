<?php

/**
 * This is the model class for table "m_SubSector".
 *
 * The followings are the available columns in table 'm_SubSector':
 * @property integer $idSubSector
 * @property string $codigoCiudad
 * @property string $nombreSubSector
 * @property integer $estadoSubSector
 *
 * The followings are the available model relations:
 * @property PuntoReferencia[] $listReferencias
 * @property Ciudad $objCiudad
 */
class SubSectorOld extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_SubSectorOld';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoCiudad, nombreSubSector', 'required'),
            array('estadoSubSector', 'numerical', 'integerOnly' => true),
            array('codigoCiudad', 'length', 'max' => 10),
            array('nombreSubSector', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idSubSector, codigoCiudad, nombreSubSector, estadoSubSector', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listReferencias' => array(self::HAS_MANY, 'PuntoReferenciaOld', 'idSubSector'),
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idSubSector' => 'Id Subsector',
            'codigoCiudad' => 'Codigo Ciudad',
            'nombreSubSector' => 'Nombre Sub Sector',
            'estadoSubSector' => 'Estado Sub Sector',
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

        $criteria->compare('idSubSector', $this->idSubSector);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('nombreSubSector', $this->nombreSubSector, true);
        $criteria->compare('estadoSubSector', $this->estadoSubSector);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SubSector the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
