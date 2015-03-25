<?php

/**
 * This is the model class for table "m_SubSector1".
 *
 * The followings are the available columns in table 'm_SubSector1':
 * @property integer $codigoSubSector
 * @property string $codigoCiudad
 * @property string $nombreSubSector
 * @property integer $estadoSubSector
 *
 * The followings are the available model relations:
 * @property MPuntoReferencia1[] $mPuntoReferencia1s
 * @property MPuntoReferencia1[] $mPuntoReferencia1s1
 * @property MCiudad $codigoCiudad0
 */
class SubSector extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_SubSector';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoSubSector, codigoCiudad, nombreSubSector', 'required'),
            array('codigoSubSector, estadoSubSector', 'numerical', 'integerOnly' => true),
            array('codigoCiudad', 'length', 'max' => 10),
            array('nombreSubSector', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoSubSector, codigoCiudad, nombreSubSector, estadoSubSector', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            //'mPuntoReferencia1s' => array(self::HAS_MANY, 'PuntoReferencia1', 'codigoSubSector'),
            //'mPuntoReferencia1s1' => array(self::HAS_MANY, 'PuntoReferencia1', 'codigoCiudad'),
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
            'listReferencias' => array(self::HAS_MANY, 'PuntoReferencia', array('codigoSubSector','codigoCiudad')),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoSubSector' => 'Codigo Sub Sector',
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

        $criteria->compare('codigoSubSector', $this->codigoSubSector);
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
     * @return SubSector1 the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
