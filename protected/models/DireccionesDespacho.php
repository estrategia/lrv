<?php

/**
 * This is the model class for table "t_DireccionesDespacho".
 *
 * The followings are the available columns in table 't_DireccionesDespacho':
 * @property integer $idDireccionDespacho
 * @property string $identificacionUsuario
 * @property string $descripcion
 * @property string $identificacionBeneficiario
 * @property string $nombre
 * @property string $direccion
 * @property string $barrio
 * @property string $telefono
 * @property string $celular
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property integer $activo
 * @property integer $extension
 * @property string $pdvAsignado
 *
 * The followings are the available model relations:
 * @property MUsuario $identificacionUsuario0
 */
class DireccionesDespacho extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_DireccionesDespacho';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idDireccionDespacho', 'required', 'on' => 'update', 'message' => '{attribute} no puede estar vacío'),
            array('identificacionUsuario, descripcion, nombre, direccion, barrio, telefono, codigoCiudad, codigoSector', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('activo, extension', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario, direccion', 'length', 'min'=> 5, 'max' => 100),
            array('descripcion', 'length', 'min'=> 3, 'max' => 50),
            array('nombre, barrio', 'length', 'min'=> 5, 'max' => 50),
            array('identificacionBeneficiario, celular', 'length', 'min'=> 5, 'max' => 20),
            array('telefono', 'length', 'min'=> 5, 'max' => 11),
            array('codigoCiudad, codigoSector', 'length', 'max' => 10),
            array('pdvAsignado', 'length', 'max' => 3),
            array('identificacionBeneficiario, celular, extension, pdvAsignado','default','value'=>null),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idDireccionDespacho, identificacionUsuario, descripcion, identificacionBeneficiario, nombre, direccion, barrio, telefono, celular, codigoCiudad, codigoSector, activo, extension, pdvAsignado', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'identificacionUsuario0' => array(self::BELONGS_TO, 'MUsuario', 'identificacionUsuario'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idDireccionDespacho' => 'Id Direccion Despacho',
            'identificacionUsuario' => 'Identificación usuario',
            'descripcion' => 'Descripción',
            'identificacionBeneficiario' => 'Identificación beneficiario',
            'nombre' => 'Nombre',
            'direccion' => 'Dirección',
            'barrio' => 'Barrio',
            'telefono' => 'Teléfono',
            'celular' => 'Celular',
            'codigoCiudad' => 'Ciudad',
            'codigoSector' => 'Sector',
            'activo' => 'Activo',
            'extension' => 'Extensión',
            'pdvAsignado' => 'Punto de venta',
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

        $criteria->compare('idDireccionDespacho', $this->idDireccionDespacho);
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('identificacionBeneficiario', $this->identificacionBeneficiario, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('direccion', $this->direccion, true);
        $criteria->compare('barrio', $this->barrio, true);
        $criteria->compare('telefono', $this->telefono, true);
        $criteria->compare('celular', $this->celular, true);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('extension', $this->extension);
        $criteria->compare('pdvAsignado', $this->pdvAsignado, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return DireccionesDespacho the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}