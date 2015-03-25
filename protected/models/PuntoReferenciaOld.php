<?php

/**
 * This is the model class for table "m_PuntoReferencia".
 *
 * The followings are the available columns in table 'm_PuntoReferencia':
 * @property integer $idPuntoReferencia
 * @property integer $idSubSector
 * @property string $nombreReferencia
 * @property integer $estadoReferencia
 *
 * The followings are the available model relations:
 * @property SubSector $objSubSector
 * @property Sector[] $listSectores
 */
class PuntoReferenciaOld extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_PuntoReferenciaOld';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idSubSector, nombreReferencia', 'required'),
            array('idSubSector, estadoReferencia', 'numerical', 'integerOnly' => true),
            array('nombreReferencia', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPuntoReferencia, idSubSector, nombreReferencia, estadoReferencia', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objSubSector' => array(self::BELONGS_TO, 'SubSectorOld', 'idSubSector'),
            'listSectores' => array(self::MANY_MANY, 'Sector', 'm_SectorPuntoReferenciaOld(idPuntoReferencia, codigoSector)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPuntoReferencia' => 'Id Punto Referencia',
            'idSubSector' => 'Id Subsector',
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
        $criteria->compare('idSubSector', $this->idSubSector);
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
