<?php

/**
 * This is the model class for table "m_PuntoReferencia1".
 *
 * The followings are the available columns in table 'm_PuntoReferencia1':
 * @property integer $codigoPuntoReferencia
 * @property integer $codigoSubSector
 * @property string $codigoCiudad
 * @property string $nombreReferencia
 * @property integer $estadoReferencia
 *
 * The followings are the available model relations:
 * @property MSubSector1 $codigoSubSector0
 * @property MSubSector1 $codigoCiudad0
 * @property MSectorPuntoReferencia1[] $mSectorPuntoReferencia1s
 * @property MSectorPuntoReferencia1[] $mSectorPuntoReferencia1s1
 */
class PuntoReferencia extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_PuntoReferencia';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoPuntoReferencia, codigoSubSector, codigoCiudad, nombreReferencia', 'required'),
            array('codigoPuntoReferencia, codigoSubSector, estadoReferencia', 'numerical', 'integerOnly' => true),
            array('codigoCiudad', 'length', 'max' => 10),
            array('nombreReferencia', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoPuntoReferencia, codigoSubSector, codigoCiudad, nombreReferencia, estadoReferencia', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'codigoSubSector0' => array(self::BELONGS_TO, 'SubSector1', 'codigoSubSector'),
            //'codigoCiudad0' => array(self::BELONGS_TO, 'SubSector1', 'codigoCiudad'),
            //'mSectorPuntoReferencia1s' => array(self::HAS_MANY, 'MSectorPuntoReferencia1', 'codigoPuntoReferencia'),
            //'mSectorPuntoReferencia1s1' => array(self::HAS_MANY, 'MSectorPuntoReferencia1', 'codigoSubSector'),
            'objSector' => array(self::BELONGS_TO, 'SubSector', array('codigoSubSector','codigoCiudad')),
            'listSectores' => array(self::MANY_MANY, 'Sector', 'm_SectorPuntoReferencia(codigoPuntoReferencia, codigoSubSector, codigoCiudad, codigoSector)'),
            //'listSectoresCiudades' => array(self::MANY_MANY, 'Sector', 'm_SectorPuntoReferencia(codigoPuntoReferencia, codigoSubSector, codigoCiudad, codigoSector)'),
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
            'nombreReferencia' => 'Nombre Referencia',
            'estadoReferencia' => 'Estado Referencia',
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
        $criteria->compare('nombreReferencia', $this->nombreReferencia, true);
        $criteria->compare('estadoReferencia', $this->estadoReferencia);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PuntoReferencia1 the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
