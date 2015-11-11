<?php

/**
 * This is the model class for table "t_UbicacionModulos".
 *
 * The followings are the available columns in table 't_UbicacionModulos':
 * @property integer $idUbicacion
 * @property integer $idModulo
 * @property integer $ubicacion
 * @property integer $orden
 *
 * The followings are the available model relations:
 * @property TUbicacionCategoria[] $tUbicacionCategorias
 * @property MModulosConfigurados $idModulo0
 */
class UbicacionModulos extends CActiveRecord {
    const UBICACION_ESCRITORIO_HOME = 1;
    const UBICACION_ESCRITORIO_DIVISION = 2;
    const UBICACION_ESCRITORIO_CATEGORIA = 3;
    const UBICACION_MOVIL_HOME = 10;
    const UBICACION_MOVIL_INICIO = 11;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_UbicacionModulos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idModulo, ubicacion, orden', 'required'),
            array('idModulo, ubicacion, orden', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idUbicacion, idModulo, ubicacion, orden', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objUbicacionCategorias' => array(self::HAS_MANY, 'UbicacionCategoria', 'idUbicacion'),
            'objModulo' => array(self::BELONGS_TO, 'ModulosConfigurados', 'idModulo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idUbicacion' => 'Id Ubicacion',
            'idModulo' => 'Id Modulo',
            'ubicacion' => 'Ubicacion',
            'orden' => 'Orden',
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

        $criteria->compare('idUbicacion', $this->idUbicacion);
        $criteria->compare('idModulo', $this->idModulo);
        $criteria->compare('ubicacion', $this->ubicacion);
        $criteria->compare('orden', $this->orden);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UbicacionModulos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
