<?php

/**
 * This is the model class for table "t_PasarelaRespuestas".
 *
 * The followings are the available columns in table 't_PasarelaRespuestas':
 * @property string $idPasarelaRespuesta
 * @property integer $estadoPol
 * @property integer $codigoRespuestaPol
 * @property integer $idCompra
 * @property integer $refPol
 * @property string $mensaje
 * @property integer $medioPago
 * @property integer $tipoMedioPago
 * @property integer $cuotas
 * @property string $valor
 * @property string $valorPesos
 * @property string $iva
 * @property string $valorAdicional
 * @property string $moneda
 * @property string $cus
 * @property string $bancoPse
 * @property string $fechaTransaccion
 * @property string $correoElectronico
 * @property integer $tipoRespuesta
 *
 * The followings are the available model relations:
 * @property TCompras $idCompra0
 */
class PasarelaRespuestas extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_PasarelaRespuestas';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('estadoPol, codigoRespuestaPol, idCompra, refPol, medioPago, tipoMedioPago, cuotas, valor, iva, valorAdicional, moneda, cus, bancoPse, fechaTransaccion, tipoRespuesta', 'required'),
            array('estadoPol, codigoRespuestaPol, idCompra, refPol, medioPago, tipoMedioPago, cuotas, tipoRespuesta', 'numerical', 'integerOnly' => true),
            array('mensaje', 'length', 'max' => 255),
            array('valor, valorPesos, iva, valorAdicional', 'length', 'max' => 16),
            array('moneda', 'length', 'max' => 3),
            array('cus', 'length', 'max' => 15),
            array('bancoPse', 'length', 'max' => 25),
            array('fechaTransaccion', 'length', 'max' => 20),
            array('correoElectronico', 'length', 'max' => 100),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPasarelaRespuesta, estadoPol, codigoRespuestaPol, idCompra, refPol, mensaje, medioPago, tipoMedioPago, cuotas, valor, valorPesos, iva, valorAdicional, moneda, cus, bancoPse, fechaTransaccion, correoElectronico, tipoRespuesta', 'safe', 'on' => 'search'),
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
            'idPasarelaRespuesta' => 'Id Pasarela Respuesta',
            'estadoPol' => 'Estado Pol',
            'codigoRespuestaPol' => 'Codigo Respuesta Pol',
            'idCompra' => 'Id Compra',
            'refPol' => 'Ref Pol',
            'mensaje' => 'Mensaje',
            'medioPago' => 'Medio Pago',
            'tipoMedioPago' => 'Tipo Medio Pago',
            'cuotas' => 'Cuotas',
            'valor' => 'Valor',
            'valorPesos' => 'Valor Pesos',
            'iva' => 'Iva',
            'valorAdicional' => 'Valor Adicional',
            'moneda' => 'Moneda',
            'cus' => 'Cus',
            'bancoPse' => 'Banco Pse',
            'fechaTransaccion' => 'Fecha Transaccion',
            'correoElectronico' => 'Correo Electronico',
            'tipoRespuesta' => 'Tipo Respuesta',
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

        $criteria->compare('idPasarelaRespuesta', $this->idPasarelaRespuesta, true);
        $criteria->compare('estadoPol', $this->estadoPol);
        $criteria->compare('codigoRespuestaPol', $this->codigoRespuestaPol);
        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('refPol', $this->refPol);
        $criteria->compare('mensaje', $this->mensaje, true);
        $criteria->compare('medioPago', $this->medioPago);
        $criteria->compare('tipoMedioPago', $this->tipoMedioPago);
        $criteria->compare('cuotas', $this->cuotas);
        $criteria->compare('valor', $this->valor, true);
        $criteria->compare('valorPesos', $this->valorPesos, true);
        $criteria->compare('iva', $this->iva, true);
        $criteria->compare('valorAdicional', $this->valorAdicional, true);
        $criteria->compare('moneda', $this->moneda, true);
        $criteria->compare('cus', $this->cus, true);
        $criteria->compare('bancoPse', $this->bancoPse, true);
        $criteria->compare('fechaTransaccion', $this->fechaTransaccion, true);
        $criteria->compare('correoElectronico', $this->correoElectronico, true);
        $criteria->compare('tipoRespuesta', $this->tipoRespuesta);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PasarelaRespuestas the static model class
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
