<?php

/**
 * This is the model class for table "m_SectorPuntoReferencia".
 *
 * The followings are the available columns in table 'm_SectorPuntoReferencia':
 * @property integer $idSectorPuntoReferencia
 * @property integer $codigoSubSector
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property string $nombreSector
 * @property integer $estadoSectorReferencia
 *
 * The followings are the available model relations:
 * @property SectorCiudad $objSectorCiudad
 * @property Ciudad $objCiudad
 * @property Sector $objSector
 * @property SubSector $objSubsector
 * @property PuntoReferencia[] $listPuntoReferencias
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
            array('codigoSubSector, codigoCiudad, codigoSector, estadoSectorReferencia', 'required'),
            array('codigoSubSector, estadoSectorReferencia', 'numerical', 'integerOnly' => true),
            array('codigoCiudad, codigoSector', 'length', 'max' => 10),
            array('nombreSector', 'length', 'max' => 45),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idSectorPuntoReferencia, codigoSubSector, codigoCiudad, codigoSector, nombreSector, estadoSectorReferencia', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objSectorCiudad' => array(self::BELONGS_TO, 'SectorCiudad', array('codigoCiudad', 'codigoSector')),
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
            'objSubsector' => array(self::BELONGS_TO, 'SubSector', array('codigoSubSector', 'codigoCiudad')),
            'listPuntoReferencias' => array(self::HAS_MANY, 'PuntoReferencia', 'idSectorPuntoReferencia'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idSectorPuntoReferencia' => 'Id Sector Punto Referencia',
            'codigoSubSector' => 'Codigo Sub Sector',
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
            'nombreSector' => 'Nombre Sector',
            'estadoSectorReferencia' => 'Estado Sector Referencia',
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

        $criteria->compare('idSectorPuntoReferencia', $this->idSectorPuntoReferencia);
        $criteria->compare('codigoSubSector', $this->codigoSubSector);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('nombreSector', $this->nombreSector, true);
        $criteria->compare('estadoSectorReferencia', $this->estadoSectorReferencia);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return SectorPuntoReferencia the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function getNombreSector(){
        if($this->nombreSector !== null)
            return $this->nombreSector;
        
        return $this->objSector->nombreSector;
    }

}
