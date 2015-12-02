<?php

/**
 * This is the model class for table "t_HorariosCiudadSector".
 *
 * The followings are the available columns in table 't_HorariosCiudadSector':
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property string $estadoCiudadSector
 * @property string $horaInicioLunesASabado
 * @property string $horaFinLunesASabado
 * @property string $sadCiudadSector
 */
class HorariosCiudadSector extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_HorariosCiudadSector';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoCiudad, codigoSector', 'required'),
            array('codigoCiudad, codigoSector, estadoCiudadSector, sadCiudadSector', 'length', 'max' => 10),
            array('horaInicioLunesASabado, horaFinLunesASabado', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoCiudad, codigoSector, estadoCiudadSector, horaInicioLunesASabado, horaFinLunesASabado, sadCiudadSector', 'safe', 'on' => 'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
            'estadoCiudadSector' => 'Estado Ciudad Sector',
            'horaInicioLunesASabado' => 'Hora Inicio',
            'horaFinLunesASabado' => 'Hora Fin',
            'sadCiudadSector' => 'Sad Ciudad Sector',
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
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('estadoCiudadSector', $this->estadoCiudadSector, true);
        $criteria->compare('horaInicioLunesASabado', $this->horaInicioLunesASabado, true);
        $criteria->compare('horaFinLunesASabado', $this->horaFinLunesASabado, true);
        $criteria->compare('sadCiudadSector', $this->sadCiudadSector, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return HorariosCiudadSector the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
