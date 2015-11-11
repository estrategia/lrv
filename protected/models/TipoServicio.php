<?php

/**
 * This is the model class for table "m_TipoServicio".
 *
 * The followings are the available columns in table 'm_TipoServicio':
 * @property integer $idTipoServicio
 * @property integer $idCategoriaTipoServicio
 * @property string $nombreTipoServicio
 *
 * The followings are the available model relations:
 * @property PuntoVenta[] $listPuntoVentas
 */
class TipoServicio extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_TipoServicio';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idCategoriaTipoServicio, nombreTipoServicio', 'required'),
            array('idCategoriaTipoServicio', 'numerical', 'integerOnly' => true),
            array('nombreTipoServicio', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idTipoServicio, idCategoriaTipoServicio, nombreTipoServicio', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listPuntoVentas' => array(self::MANY_MANY, 'PuntoVenta', 't_ServiciosPuntoVenta(idTipoServicio, idPuntoDeVenta)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idTipoServicio' => 'Id Tipo Servicio',
            'idCategoriaTipoServicio' => 'Idcategoria Tipo Servicio',
            'nombreTipoServicio' => 'Nombre Tipo Servicio',
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

        $criteria->compare('idTipoServicio', $this->idTipoServicio);
        $criteria->compare('idCategoriaTipoServicio', $this->idCategoriaTipoServicio);
        $criteria->compare('nombreTipoServicio', $this->nombreTipoServicio, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return TipoServicio the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
