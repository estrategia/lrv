<?php

/**
 * This is the model class for table "t_Compras".
 *
 * The followings are the available columns in table 't_Compras':
 * @property integer $idCompra
 * @property string $identificacionUsuario
 * @property string $documentoCruce
 * @property string $fechaCompra
 * @property string $fechaEntrega
 * @property string $tipoEntrega
 * @property integer $donacionFundacion
 * @property integer $idComercial
 * @property integer $subtotalCompra
 * @property integer $impuestosCompra
 * @property integer $totalCompra
 * @property integer $idEstadoCompra
 * @property integer $codigoOperador
 * @property string $observacion
 * @property integer $idTipoVenta
 * @property integer $activa
 * @property integer $domicilio
 * @property integer $flete
 * @property integer $invitado
 * @property integer $codigoPerfil
 * @property string $saldosPdv
 * @property integer $seguimiento
 * @property integer $descuentoPromo
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property integer $tiempoDomicilioCedi
 * @property integer $valorDomicilioCedi
 * @property integer $codigoCedi
 *
 * The followings are the available model relations:
 * @property MCiudad $codigoCiudad0
 * @property MEstadocompra $idEstadoCompra0
 * @property MSector $codigoSector0
 * @property MTipoventa $idTipoVenta0
 * @property TOperadores $codigoOperador0
 * @property TComprasItems[] $tComprasItems
 * @property TComprasObs[] $tComprasObs
 */
class Compras extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_Compras';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, tipoEntrega, codigoCiudad, codigoSector', 'required'),
            array('donacionFundacion, idComercial, subtotalCompra, impuestosCompra, totalCompra, idEstadoCompra, codigoOperador, idTipoVenta, activa, domicilio, flete, invitado, codigoPerfil, seguimiento, descuentoPromo, tiempoDomicilioCedi, valorDomicilioCedi, codigoCedi', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario', 'length', 'max' => 100),
            array('documentoCruce', 'length', 'max' => 8),
            array('tipoEntrega', 'length', 'max' => 20),
            array('observacion', 'length', 'max' => 250),
            array('codigoCiudad, codigoSector', 'length', 'max' => 10),
            array('fechaCompra, fechaEntrega, saldosPdv', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompra, identificacionUsuario, documentoCruce, fechaCompra, fechaEntrega, tipoEntrega, donacionFundacion, idComercial, subtotalCompra, impuestosCompra, totalCompra, idEstadoCompra, codigoOperador, observacion, idTipoVenta, activa, domicilio, flete, invitado, codigoPerfil, saldosPdv, seguimiento, descuentoPromo, codigoCiudad, codigoSector, tiempoDomicilioCedi, valorDomicilioCedi, codigoCedi', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'codigoCiudad0' => array(self::BELONGS_TO, 'MCiudad', 'codigoCiudad'),
            'idEstadoCompra0' => array(self::BELONGS_TO, 'MEstadocompra', 'idEstadoCompra'),
            'codigoSector0' => array(self::BELONGS_TO, 'MSector', 'codigoSector'),
            'idTipoVenta0' => array(self::BELONGS_TO, 'MTipoventa', 'idTipoVenta'),
            'codigoOperador0' => array(self::BELONGS_TO, 'TOperadores', 'codigoOperador'),
            'tComprasItems' => array(self::HAS_MANY, 'TComprasItems', 'idCompra'),
            'tComprasObs' => array(self::HAS_MANY, 'TComprasObs', 'idCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCompra' => 'Id Compra',
            'identificacionUsuario' => 'Identificacion Usuario',
            'documentoCruce' => 'Documento Cruce',
            'fechaCompra' => 'Fecha Compra',
            'fechaEntrega' => 'Fecha Entrega',
            'tipoEntrega' => 'Tipo Entrega',
            'donacionFundacion' => 'Donacion Fundacion',
            'idComercial' => 'Id Comercial',
            'subtotalCompra' => 'Subtotal Compra',
            'impuestosCompra' => 'Impuestos Compra',
            'totalCompra' => 'Total Compra',
            'idEstadoCompra' => 'Id Estado Compra',
            'codigoOperador' => 'Codigo Operador',
            'observacion' => 'Observacion',
            'idTipoVenta' => 'Id Tipo Venta',
            'activa' => 'Activa',
            'domicilio' => 'Domicilio',
            'flete' => 'Flete',
            'invitado' => 'Invitado',
            'codigoPerfil' => 'Codigo Perfil',
            'saldosPdv' => 'Saldos Pdv',
            'seguimiento' => 'Seguimiento',
            'descuentoPromo' => 'Descuento Promo',
            'codigoCiudad' => 'Codigo Ciudad',
            'codigoSector' => 'Codigo Sector',
            'tiempoDomicilioCedi' => 'Tiempo Domicilio Cedi',
            'valorDomicilioCedi' => 'Valor Domicilio Cedi',
            'codigoCedi' => 'Codigo Cedi',
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
        $criteria->compare('identificacionUsuario', $this->identificacionUsuario, true);
        $criteria->compare('documentoCruce', $this->documentoCruce, true);
        $criteria->compare('fechaCompra', $this->fechaCompra, true);
        $criteria->compare('fechaEntrega', $this->fechaEntrega, true);
        $criteria->compare('tipoEntrega', $this->tipoEntrega, true);
        $criteria->compare('donacionFundacion', $this->donacionFundacion);
        $criteria->compare('idComercial', $this->idComercial);
        $criteria->compare('subtotalCompra', $this->subtotalCompra);
        $criteria->compare('impuestosCompra', $this->impuestosCompra);
        $criteria->compare('totalCompra', $this->totalCompra);
        $criteria->compare('idEstadoCompra', $this->idEstadoCompra);
        $criteria->compare('codigoOperador', $this->codigoOperador);
        $criteria->compare('observacion', $this->observacion, true);
        $criteria->compare('idTipoVenta', $this->idTipoVenta);
        $criteria->compare('activa', $this->activa);
        $criteria->compare('domicilio', $this->domicilio);
        $criteria->compare('flete', $this->flete);
        $criteria->compare('invitado', $this->invitado);
        $criteria->compare('codigoPerfil', $this->codigoPerfil);
        $criteria->compare('saldosPdv', $this->saldosPdv, true);
        $criteria->compare('seguimiento', $this->seguimiento);
        $criteria->compare('descuentoPromo', $this->descuentoPromo);
        $criteria->compare('codigoCiudad', $this->codigoCiudad, true);
        $criteria->compare('codigoSector', $this->codigoSector, true);
        $criteria->compare('tiempoDomicilioCedi', $this->tiempoDomicilioCedi);
        $criteria->compare('valorDomicilioCedi', $this->valorDomicilioCedi);
        $criteria->compare('codigoCedi', $this->codigoCedi);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Compras the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /*
     * @return CActiveRecord registro que se guarda en base de datos
     */
    public function beforeSave() {
        if ($this->isNewRecord) {
            //$this->fechaCompra = new CDbExpression('NOW()');
            $this->fechaCompra = date('Y-m-d H:i:s');
        }
        return parent::beforeSave();
    }

}
