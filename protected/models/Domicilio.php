<?php

/**
 * This is the model class for table "m_Domicilio".
 *
 * The followings are the available columns in table 'm_Domicilio':
 * @property integer $idDomicilio
 * @property integer $valorDomicilio
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property integer $codigoPerfil
 *
 * The followings are the available model relations:
 * @property Ciudad $objCiudad
 * @property Perfil $objPerfil
 * @property Sector $objSector
 */
class Domicilio extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_Domicilio';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('valorDomicilio, fechaInicio, fechaFin, codigoCiudad, codigoSector, codigoPerfil', 'required'),
            array('valorDomicilio, codigoPerfil', 'numerical', 'integerOnly' => true),
            array('codigoCiudad, codigoSector', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idDomicilio, valorDomicilio, fechaInicio, fechaFin, codigoCiudad, codigoSector, codigoPerfil', 'safe', 'on' => 'search'),
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
            'objPerfil' => array(self::BELONGS_TO, 'Perfil', 'codigoPerfil'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idDomicilio' => 'Id Domicilio',
            'valorDomicilio' => 'Valor Domicilio',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
            'codigoCiudad' => 'Ciudad',
            'codigoSector' => 'Sector',
            'codigoPerfil' => 'Perfil',
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

        $criteria->compare('idDomicilio', $this->idDomicilio);
        $criteria->compare('valorDomicilio', $this->valorDomicilio);
        $criteria->compare('fechaInicio', $this->fechaInicio, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('codigoPerfil', $this->codigoPerfil);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Domicilio the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
