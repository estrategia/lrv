<?php

/**
 * This is the model class for table "t_PasarelaEnvios".
 *
 * The followings are the available columns in table 't_PasarelaEnvios':
 * @property integer $idCompra
 * @property integer $valor
 * @property string $iva
 * @property string $baseIva
 * @property string $moneda
 * @property string $nombre
 * @property string $identificacionUsuario
 * @property integer $tipoDocumento
 * @property string $correoElectronico
 *
 * The followings are the available model relations:
 * @property TCompras $idCompra0
 */
class PasarelaEnvios extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_PasarelaEnvios';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idCompra, valor, iva, baseIva, moneda, nombre, tipoDocumento, correoElectronico', 'required'),
            array('idCompra, valor, tipoDocumento', 'numerical', 'integerOnly' => true),
            array('iva, baseIva', 'length', 'max' => 16),
            array('moneda', 'length', 'max' => 3),
            array('nombre', 'length', 'max' => 200),
            array('identificacionUsuario, correoElectronico', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompra, valor, iva, baseIva, moneda, nombre, identificacionUsuario, tipoDocumento, correoElectronico', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idCompra0' => array(self::BELONGS_TO, 'TCompras', 'idCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCompra' => 'Id Compra',
            'valor' => 'Valor',
            'iva' => 'Iva',
            'baseIva' => 'Base Iva',
            'moneda' => 'Moneda',
            'nombre' => 'Nombre',
            'identificacionUsuario' => 'Identificacion Usuario',
            'tipoDocumento' => 'Tipo Documento',
            'correoElectronico' => 'Correo Electronico',
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

        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('valor', $this->valor);
        $criteria->compare('iva', $this->iva, true);
        $criteria->compare('baseIva', $this->baseIva, true);
        $criteria->compare('moneda', $this->moneda, true);
        $criteria->compare('nombre', $this->nombre, true);
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('tipoDocumento', $this->tipoDocumento);
        $criteria->compare('correoElectronico', $this->correoElectronico, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PasarelaEnvios the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    /**
     * Metodo que hereda comportamiento de ValidateModelBehavior
     * @return void
     */
    public function behaviors() {
        return array(
            'ValidateModelBehavior' => array(
                'class' => 'application.components.behaviors.ValidateModelBehavior',
                'model' => $this
            ),
        );
    }

}
