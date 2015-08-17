<?php

/**
 * This is the model class for table "t_ComprasPuntos".
 *
 * The followings are the available columns in table 't_ComprasPuntos':
 * @property string $idCompraPunto
 * @property string $idPunto
 * @property integer $codigoPunto
 * @property integer $idCompra
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $fechaCreacion
 * @property string $fechaActualizacion
 * @property integer $activo
 * @property integer $tipoValor
 * @property integer $valor
 *
 * The followings are the available model relations:
 * @property Punto $objPunto
 * @property Compras $objCompra
 */
class ComprasPuntos extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ComprasPuntos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoPunto, idCompra, fechaInicio, fechaFin, fechaCreacion, fechaActualizacion, tipoValor, valor', 'required'),
            array('codigoPunto, idCompra, activo, tipoValor, valor', 'numerical', 'integerOnly' => true),
            array('idPunto', 'length', 'max' => 11),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompraPunto, idPunto, codigoPunto, idCompra, fechaInicio, fechaFin, fechaCreacion, fechaActualizacion, activo, tipoValor, valor', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objPunto' => array(self::BELONGS_TO, 'Punto', 'codigoPunto'),
            'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCompraPunto' => 'Id Compra Punto',
            'idPunto' => 'Id Punto',
            'codigoPunto' => 'Codigo Punto',
            'idCompra' => 'Id Compra',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
            'fechaCreacion' => 'Fecha Creacion',
            'fechaActualizacion' => 'Fecha Actualizacion',
            'activo' => 'Activo',
            'tipoValor' => 'Tipo Valor',
            'valor' => 'Valor',
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

        $criteria->compare('idCompraPunto', $this->idCompraPunto, true);
        $criteria->compare('idPunto', $this->idPunto, true);
        $criteria->compare('codigoPunto', $this->codigoPunto);
        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('fechaInicio', $this->fechaInicio, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);
        $criteria->compare('fechaActualizacion', $this->fechaActualizacion, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('tipoValor', $this->tipoValor);
        $criteria->compare('valor', $this->valor);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ComprasPuntos the static model class
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
