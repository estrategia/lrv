<?php

/**
 * This is the model class for table "t_FormasPago".
 *
 * The followings are the available columns in table 't_FormasPago':
 * @property integer $idCompra
 * @property integer $idFormaPago
 * @property integer $valor
 * @property string $numeroTarjeta
 * @property integer $cuotasTarjeta
 * @property integer $valorBono
 * @property string $numeroValidacion
 *
 * The followings are the available model relations:
 * @property Formapago $objFormaPago
 * @property Compras $objCompra
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
            array('numeroTarjeta', 'length', 'max' => 20),
            array('numeroValidacion', 'length', 'max' => 20),
            array('numeroValidacion, numeroTarjeta', 'default', 'value' => null),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompra, idFormaPago, valor, numeroTarjeta, cuotasTarjeta, valorBono, numeroValidacion', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objFormaPago' => array(self::BELONGS_TO, 'FormaPago', 'idFormaPago'),
            'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
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
            'numeroTarjeta' => 'Numero Tarjeta',
            'cuotasTarjeta' => 'Cuotas Tarjeta',
            'valorBono' => 'Valor Bono',
            'numeroValidacion' => 'N&uacute;mero Validaci&oacute;n',
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
        $criteria->compare('numeroTarjeta', $this->numeroTarjeta, true);
        $criteria->compare('numeroValidacion', $this->numeroValidacion, true);
        $criteria->compare('cuotasTarjeta', $this->cuotasTarjeta);
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
