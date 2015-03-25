<?php

/**
 * This is the model class for table "m_SectorPuntoReferencia1".
 *
 * The followings are the available columns in table 'm_SectorPuntoReferencia1':
 * @property integer $codigoPuntoReferencia
 * @property integer $codigoSubSector
 * @property string $codigoCiudad
 * @property string $codigoSector
 *
 * The followings are the available model relations:
 * @property MPuntoReferencia1 $codigoPuntoReferencia0
 * @property MPuntoReferencia1 $codigoSubSector0
 * @property MSectorCiudad $codigoCiudad0
 * @property MSectorCiudad $codigoSector0
 */
class SectorPuntoReferencia extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_SectorPuntoReferencia';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoPuntoReferencia, codigoSubSector, codigoCiudad, codigoSector', 'required'),
            array('codigoPuntoReferencia, codigoSubSector', 'numerical', 'integerOnly' => true),
            array('codigoCiudad, codigoSector', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoPuntoReferencia, codigoSubSector, codigoCiudad, codigoSector', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            /*'codigoPuntoReferencia0' => array(self::BELONGS_TO, 'MPuntoReferencia', 'codigoPuntoReferencia'),
            'codigoSubSector0' => array(self::BELONGS_TO, 'MPuntoReferencia', 'codigoSubSector'),
            'codigoCiudad0' => array(self::BELONGS_TO, 'MSectorCiudad', 'codigoCiudad'),
            'codigoSector0' => array(self::BELONGS_TO, 'MSectorCiudad', 'codigoSector'),*/
            
            'objSector' => array(self::BELONGS_TO, 'SectorCiudad', array('codigoCiudad', 'codigoSector')),
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoPuntoReferencia' => 'Codigo Punto Referencia',
            'codigoSubSector' => 'Codigo Sub Sector',
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
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

        $criteria->compare('codigoPuntoReferencia', $this->codigoPuntoReferencia);
        $criteria->compare('codigoSubSector', $this->codigoSubSector);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SectorPuntoReferencia1 the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
