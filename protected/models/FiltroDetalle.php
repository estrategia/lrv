<?php

/**
 * This is the model class for table "m_Atributo".
 *
 * The followings are the available columns in table 'm_Atributo':
 * @property integer $idFiltroDetalle
 * @property string $idFiltro
 * @property string $nombreDetalle
 *
 * The followings are the available model relations:
 * @property Producto[] $listProductos
 * @property Filtro $objFiltro
 */
class FiltroDetalle extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_FiltroDetalle';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idFiltro, nombreDetalle', 'required'),
            array('idFiltro', 'length', 'max'=>11),
            array('nombreDetalle', 'length', 'max' => 50),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idFiltroDetalle, idFiltro, nombreDetalle', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listProductos' => array(self::MANY_MANY, 'Producto', 't_ProductosFiltros(idFiltroDetalle, codigoProducto)'),
            'objFiltro' => array(self::BELONGS_TO, 'Filtro', 'idFiltro'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idFiltroDetalle' => 'Id',
            'idFiltro' => 'Id Filtro',
            'nombreDetalle' => 'Nombre Detalle',
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

        $criteria->compare('idFiltroDetalle', $this->idFiltroDetalle);
        $criteria->compare('idFiltro',$this->idFiltro,true);
        $criteria->compare('nombreDetalle', $this->nombreDetalle, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Atributo the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
