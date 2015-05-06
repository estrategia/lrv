<?php

/**
 * This is the model class for table "t_FormasPago".
 *
 * The followings are the available columns in table 't_FormasPago':
 * @property integer $idCompra
 * @property integer $idFormaPago
 * @property integer $valor
 * @property string $tipoTarjeta
 * @property string $numeroTarjeta
 * @property string $digitoVerificacionTarjeta
 * @property integer $cuotasTarjeta
 * @property string $aprobacionTarjeta
 * @property integer $valorBono
 *
 * The followings are the available model relations:
 * @property MFormapago $idFormaPago0
 * @property TCompras $idCompra0
 */
class FormasPago extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_FormasPago';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idFormaPago', 'required'),
            array('idCompra, idFormaPago, valor, cuotasTarjeta, valorBono', 'numerical', 'integerOnly' => true),
            array('tipoTarjeta, digitoVerificacionTarjeta', 'length', 'max' => 10),
            array('numeroTarjeta, aprobacionTarjeta', 'length', 'max' => 20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompra, idFormaPago, valor, tipoTarjeta, numeroTarjeta, digitoVerificacionTarjeta, cuotasTarjeta, aprobacionTarjeta, valorBono', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idFormaPago0' => array(self::BELONGS_TO, 'MFormapago', 'idFormaPago'),
            'idCompra0' => array(self::BELONGS_TO, 'TCompras', 'idCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCompra' => 'Id Compra',
            'idFormaPago' => 'Id Forma Pago',
            'valor' => 'Valor',
            'tipoTarjeta' => 'Tipo Tarjeta',
            'numeroTarjeta' => 'Numero Tarjeta',
            'digitoVerificacionTarjeta' => 'Digito Verificacion Tarjeta',
            'cuotasTarjeta' => 'Cuotas Tarjeta',
            'aprobacionTarjeta' => 'Aprobacion Tarjeta',
            'valorBono' => 'Valor Bono',
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
        $criteria->compare('idFormaPago', $this->idFormaPago);
        $criteria->compare('valor', $this->valor);
        $criteria->compare('tipoTarjeta', $this->tipoTarjeta, true);
        $criteria->compare('numeroTarjeta', $this->numeroTarjeta, true);
        $criteria->compare('digitoVerificacionTarjeta', $this->digitoVerificacionTarjeta, true);
        $criteria->compare('cuotasTarjeta', $this->cuotasTarjeta);
        $criteria->compare('aprobacionTarjeta', $this->aprobacionTarjeta, true);
        $criteria->compare('valorBono', $this->valorBono);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return FormasPago the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
