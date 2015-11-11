<?php

/**
 * This is the model class for table "m_PuntoReferencia".
 *
 * The followings are the available columns in table 'm_PuntoReferencia':
 * @property integer $idPuntoReferencia
 * @property integer $idSectorPuntoReferencia
 * @property string $nombreReferencia
 * @property integer $estadoReferencia
 *
 * The followings are the available model relations:
 * @property SectorPuntoReferencia $objSectorPRef
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
            array('idSectorPuntoReferencia, nombreReferencia', 'required'),
            array('idSectorPuntoReferencia, estadoReferencia', 'numerical', 'integerOnly' => true),
            array('nombreReferencia', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPuntoReferencia, idSectorPuntoReferencia, nombreReferencia, estadoReferencia', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objSectorPRef' => array(self::BELONGS_TO, 'SectorPuntoReferencia', 'idSectorPuntoReferencia'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPuntoReferencia' => 'Id Punto Referencia',
            'idSectorPuntoReferencia' => 'Id Sector Punto Referencia',
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

        $criteria->compare('idPuntoReferencia', $this->idPuntoReferencia);
        $criteria->compare('idSectorPuntoReferencia', $this->idSectorPuntoReferencia);
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
     * @return PuntoReferencia the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
