<?php

/**
 * This is the model class for table "m_Sector".
 *
 * The followings are the available columns in table 'm_Sector':
 * @property string $codigoSector
 * @property string $nombreSector
 * @property string $estadoSector
 */
class Sector extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_Sector';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoSector, nombreSector', 'required'),
            array('codigoSector', 'length', 'max' => 10),
            array('nombreSector', 'length', 'max' => 45),
            array('estadoSector', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoSector, nombreSector, estadoSector', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listCiudades' => array(self::MANY_MANY, 'Ciudad', 'm_SectorCiudad(codigoCiudad, codigoSector)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoSector' => 'Codigo Sector',
            'nombreSector' => 'Nombre Sector',
            'estadoSector' => 'Estado Sector',
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

        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('nombreSector', $this->nombreSector, true);
        $criteria->compare('estadoSector', $this->estadoSector, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Sector the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
