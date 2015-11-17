<?php

/**
 * This is the model class for table "t_UbicacionCategoria".
 *
 * The followings are the available columns in table 't_UbicacionCategoria':
 * @property integer $idUbicacionCategoria
 * @property integer $idUbicacion
 * @property integer $idCategoriaBi
 *
 * The followings are the available model relations:
 * @property TUbicacionModulos $idUbicacion0
 * @property MCategoria $idCategoriaBi0
 */
class UbicacionCategoria extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_UbicacionCategoria';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idUbicacion, idCategoriaTienda', 'required'),
            array('idUbicacion, idCategoriaTienda', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idUbicacionCategoria, idUbicacion, idCategoriaTienda', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objUbicacionModulo' => array(self::BELONGS_TO, 'UbicacionModulos', 'idUbicacion'),
            'objCategoriaTienda' => array(self::BELONGS_TO, 'CategoriaTienda', 'idCategoriaTienda'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idUbicacionCategoria' => 'Id Ubicacion Categoria',
            'idUbicacion' => 'Ubicación',
            'idCategoriaTienda' => 'Categoría',
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

        $criteria->compare('idUbicacionCategoria', $this->idUbicacionCategoria);
        $criteria->compare('idUbicacion', $this->idUbicacion);
        $criteria->compare('idCategoriaTienda', $this->idCategoriaTienda);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return UbicacionCategoria the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
