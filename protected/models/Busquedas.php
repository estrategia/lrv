<?php

/**
 * This is the model class for table "t_Busquedas".
 *
 * The followings are the available columns in table 't_Busquedas':
 * @property integer $idBusqueda
 * @property string $identificacionUsuario
 * @property string $tipoBusqueda
 * @property string $busqueda
 * @property string $fecha
 * @property string $codigoCiudad
 * @property string $codigoSector
 */
class Busquedas extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_Busquedas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipoBusqueda, busqueda, fecha', 'required'),
            array('identificacionUsuario, busqueda', 'length', 'max' => 100),
            array('tipoBusqueda', 'length', 'max' => 2),
            array('codigoCiudad, codigoSector', 'length', 'max' => 10),
            array('codigoCiudad, codigoSector', 'default', 'value' => null),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idBusqueda, identificacionUsuario, tipoBusqueda, busqueda, fecha, codigoCiudad, codigoSector', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idBusqueda' => 'Id Busqueda',
            'identificacionUsuario' => 'Identificacion Usuario',
            'tipoBusqueda' => 'Tipo Busqueda',
            'busqueda' => 'Busqueda',
            'fecha' => 'Fecha',
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
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

        $criteria->compare('idBusqueda', $this->idBusqueda);
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('tipoBusqueda', $this->tipoBusqueda, true);
        $criteria->compare('busqueda', $this->busqueda, true);
        $criteria->compare('fecha', $this->fecha, true);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Busquedas the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public static function registrarBusqueda($params) {
        $objBusqueda = new Busquedas;
        $objBusqueda->identificacionUsuario = $params['idenficacionUsuario'];
        $objBusqueda->tipoBusqueda = $params['tipoBusqueda'];
        $objBusqueda->busqueda = $params['msgBusqueda'];
        $objBusqueda->fecha = new CDbExpression('NOW()');
        $objBusqueda->codigoCiudad = $params['codigoCiudad'];
        $objBusqueda->codigoSector = $params['codigoSector'];
        $objBusqueda->save();
    }

}
