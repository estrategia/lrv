<?php

/**
 * This is the model class for table "t_DomicilioCedi".
 *
 * The followings are the available columns in table 't_DomicilioCedi':
 * @property integer $idDomicilioCedi
 * @property integer $codigoCedi
 * @property string $codigoCiudad
 * @property integer $tiempoDomicilio
 * @property integer $valorDomicilio
 *
 * The followings are the available model relations:
 * @property MCiudad $codigoCiudad0
 */
class DomicilioCedi extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_DomicilioCedi';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoCedi, codigoCiudad, tiempoDomicilio', 'required'),
            array('codigoCedi, tiempoDomicilio, valorDomicilio', 'numerical', 'integerOnly' => true),
            array('codigoCiudad', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idDomicilioCedi, codigoCedi, codigoCiudad, tiempoDomicilio, valorDomicilio', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'codigoCiudad0' => array(self::BELONGS_TO, 'MCiudad', 'codigoCiudad'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idDomicilioCedi' => 'Id Domicilio Cedi',
            'codigoCedi' => 'Codigo Cedi',
            'codigoCiudad' => 'Codigo Ciudad',
            'tiempoDomicilio' => 'Tiempo Domicilio',
            'valorDomicilio' => 'Valor Domicilio',
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

        $criteria->compare('idDomicilioCedi', $this->idDomicilioCedi);
        $criteria->compare('codigoCedi', $this->codigoCedi);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('tiempoDomicilio', $this->tiempoDomicilio);
        $criteria->compare('valorDomicilio', $this->valorDomicilio);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DomicilioCedi the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
