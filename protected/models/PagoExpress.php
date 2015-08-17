<?php

/**
 * This is the model class for table "t_PagoExpress".
 *
 * The followings are the available columns in table 't_PagoExpress':
 * @property integer $idPagoExpress
 * @property string $identificacionUsuario
 * @property integer $idDireccionDespacho
 * @property integer $idFormaPago
 * @property integer $activo
 * @property string $numeroTarjeta
 * @property integer $cuotasTarjeta
 *
 * The followings are the available model relations:
 * @property FormaPago $objFormaPago
 * @property Usuario $objUsuario
 * @property DireccionesDespacho $objDireccionDespacho
 */
class PagoExpress extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_PagoExpress';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, idDireccionDespacho, idFormaPago', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('idDireccionDespacho, idFormaPago, activo, cuotasTarjeta', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario', 'length', 'max' => 100),
            array('numeroTarjeta', 'length', 'max' => 12),
            array('numeroTarjeta, cuotasTarjeta', 'safe'),
            array('numeroTarjeta, cuotasTarjeta', 'default', 'value' => null),
            array('idFormaPago', 'pagoValidate'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPagoExpress, identificacionUsuario, idDireccionDespacho, idFormaPago, activo, numeroTarjeta, cuotasTarjeta', 'safe', 'on' => 'search'),
        );
    }
    
    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function pagoValidate($attribute, $params) {
        if ($this->idFormaPago == Yii::app()->params->formaPago['idCredirebaja']) {
            if ($this->numeroTarjeta === null) {
                $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " no puede estar vacío ");
            } else {
                $this->numeroTarjeta = trim($this->numeroTarjeta);

                if (strlen($this->numeroTarjeta) != 12) {
                    $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " debe tener 12 dígitos");
                }
            }

            if ($this->cuotasTarjeta === null || empty($this->cuotasTarjeta)) {
                $this->addError('cuotasTarjeta', $this->getAttributeLabel('cuotasTarjeta') . " no puede estar vacío");
            } else {
                $int = intval($this->cuotasTarjeta);
                if ($int <= 0 || $int > 6) {
                    $this->addError('cuotasTarjeta', $this->getAttributeLabel('cuotasTarjeta') . " debe ser número entre 1 y 6");
                }
            }
        } else {
            $this->numeroTarjeta = null;
            $this->cuotasTarjeta = null;
        }
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objFormaPago' => array(self::BELONGS_TO, 'FormaPago', 'idFormaPago'),
            'objUsuario' => array(self::BELONGS_TO, 'Usuario', 'identificacionUsuario'),
            'objDireccionDespacho' => array(self::BELONGS_TO, 'DireccionesDespacho', 'idDireccionDespacho'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPagoExpress' => 'Id Pago Express',
            'identificacionUsuario' => 'Identificación usuario',
            'idDireccionDespacho' => 'Dirección de despacho',
            'idFormaPago' => 'Forma de pago',
            'activo' => 'Activo',
            'numeroTarjeta' => 'Número tarjeta',
            'cuotasTarjeta' => 'Cuotas',
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

        $criteria->compare('idPagoExpress', $this->idPagoExpress);
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('idDireccionDespacho', $this->idDireccionDespacho);
        $criteria->compare('idFormaPago', $this->idFormaPago);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('numeroTarjeta', $this->numeroTarjeta, true);
        $criteria->compare('cuotasTarjeta', $this->cuotasTarjeta);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return PagoExpress the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
