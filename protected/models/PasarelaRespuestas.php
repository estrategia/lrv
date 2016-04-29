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
 * @property string $numeroVisible
 * @property string $codigoAutorizacion
 *
 * The followings are the available model relations:
 * @property TCompras $idCompra0
 */
class PasarelaRespuestas extends CActiveRecord {

    const TIPO_RESPUESTA = 1;
    const TIPO_CONFIRMACION = 2;

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
            array('numeroVisible', 'length', 'max' => 20),
            array('codigoAutorizacion', 'length', 'max' => 10),
            array('valor, valorPesos, iva, valorAdicional', 'length', 'max' => 16),
            array('moneda', 'length', 'max' => 3),
            array('cus', 'length', 'max' => 15),
            array('bancoPse', 'length', 'max' => 50),
            array('fechaTransaccion', 'length', 'max' => 20),
            array('correoElectronico', 'length', 'max' => 100),
            array('mensaje, numeroVisible, codigoAutorizacion, correoElectronico', 'default', 'value' => null),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPasarelaRespuesta, estadoPol, codigoRespuestaPol, idCompra, refPol, mensaje, medioPago, tipoMedioPago, cuotas, valor, valorPesos, iva, valorAdicional, moneda, cus, bancoPse, fechaTransaccion, correoElectronico, tipoRespuesta, numeroVisible, codigoAutorizacion', 'safe', 'on' => 'search'),
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
            'numeroVisible' => 'n&uacute;mero Visible',
            'codigoAutorizacion' => 'c&oacute;digo Autorizaci&oacute;n',
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
        $criteria->compare('numeroVisible', $this->numeroVisible);
        $criteria->compare('codigoAutorizacion', $this->codigoAutorizacion);

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

    /*
     * Validaciones de datos que afecten insert/update
     */

    public function validaDatos() {
        if (!is_numeric($this->estadoPol)) {
            $this->estadoPol = 0;
        }
        if (!is_numeric($this->codigoRespuestaPol)) {
            $this->codigoRespuestaPol = 0;
        }
        if (!is_numeric($this->refPol)) {
            $this->refPol = 0;
        }
        if (!is_numeric($this->medioPago)) {
            $this->medioPago = 0;
        }
        if (!is_numeric($this->tipoMedioPago)) {
            $this->tipoMedioPago = 0;
        }
        if (!is_numeric($this->cuotas)) {
            $this->cuotas = 0;
        }
        if (!is_numeric($this->valor)) {
            $this->valor = 0;
        }
        if (!is_numeric($this->valorPesos)) {
            $this->valorPesos = 0;
        }
        if (!is_numeric($this->iva)) {
            $this->iva = 0;
        }
        if (!is_numeric($this->valorAdicional)) {
            $this->valorAdicional = 0;
        }
        if (!is_numeric($this->cus)) {
            $this->cus = 0;
        }
        if ($this->moneda == null || empty($this->moneda)) {
            $this->moneda = "COP";
        }
        if ($this->bancoPse == null || empty($this->bancoPse)) {
            $this->bancoPse = "NA";
        }
        if ($this->fechaTransaccion == null || empty($this->fechaTransaccion)) {
            $this->fechaTransaccion = "NA";
        }
        /* if($this->correoElectronico==null || empty($this->correoElectronico)){
          $this->correoElectronico = "NA";
          } */
    }

    public function beforeValidate() {
        $this->validaDatos();
        return parent::beforeValidate();
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

    public function getTipoRespuesta() {
        $respuesta = "NA";

        if ($this->tipoRespuesta = self::TIPO_RESPUESTA) {
            $respuesta = "Respuesta";
        } else if ($this->tipoRespuesta = self::TIPO_CONFIRMACION) {
            $respuesta = "Confirmacion";
        }

        return $respuesta;
    }

    public function getEstadoTransaccion() {
        $estado = "NA";

        if ($this->estadoPol > 0) {
            $query = "SELECT * FROM m_PasarelaEstadoPol WHERE codigo=$this->estadoPol";
            $result = Yii::app()->db->createCommand($query)->queryRow(true);
            if(!empty($result))
                $estado = $result['descripcion'];
        }
        
        if ($this->codigoRespuestaPol > 0) {
            $query = "SELECT * FROM m_PasarelaCodigoRespuestaPol WHERE codigo=$this->codigoRespuestaPol";
            $result = Yii::app()->db->createCommand($query)->queryRow(true);
            
            if(!empty($result))
                $estado .= " - " . $result['descripcion'];
        }

        return $estado;
    }

    public function getMedioPago() {
        $pago = "NA";

        if ($this->tipoMedioPago > 0) {
            $query = "SELECT * FROM m_PasarelaTipoMedioPago WHERE codigo=$this->tipoMedioPago";
            $result = Yii::app()->db->createCommand($query)->queryRow(true);
            if(!empty($result))
                $pago = $result['descripcion'];
        }
        
        if ($this->medioPago > 0) {
            $query = "SELECT * FROM m_PasarelaMedioPago WHERE codigo=$this->medioPago";
            $result = Yii::app()->db->createCommand($query)->queryRow(true);
            
            if(!empty($result))
                $pago .= " - " . $result['descripcion'];
        }

        return $pago;
    }

}
