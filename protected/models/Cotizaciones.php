<?php

/**
 * This is the model class for table "t_Cotizaciones".
 *
 * The followings are the available columns in table 't_Cotizaciones':
 * @property string $idCotizacion
 * @property string $identificacionUsuario
 * @property string $fechaCotizacion
 * @property integer $subtotalCompra
 * @property integer $impuestosCompra
 * @property integer $baseImpuestosCompra
 * @property integer $totalCompra
 * @property integer $ahorroCompra
 * @property integer $domicilio
 * @property integer $flete
 * @property integer $codigoPerfil
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property integer $tiempoDomicilioCedi
 * @property integer $valorDomicilioCedi
 * @property integer $codigoCedi
 *
 * The followings are the available model relations:
 * @property Ciudad $objCiudad
 * @property Sector $objSector
 * @property listCotizacionItems[] $CotizacionesItems
 */
class Cotizaciones extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_Cotizaciones';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('identificacionUsuario, codigoCiudad, codigoSector', 'required'),
            array('subtotalCompra, impuestosCompra, baseImpuestosCompra, totalCompra, ahorroCompra, domicilio, flete, codigoPerfil, tiempoDomicilioCedi, valorDomicilioCedi, codigoCedi', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario', 'length', 'max' => 100),
            array('codigoCiudad, codigoSector', 'length', 'max' => 10),
            array('fechaCotizacion', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCotizacion, identificacionUsuario, fechaCotizacion, subtotalCompra, impuestosCompra, baseImpuestosCompra, totalCompra, ahorroCompra, domicilio, flete, codigoPerfil, codigoCiudad, codigoSector, tiempoDomicilioCedi, valorDomicilioCedi, codigoCedi', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
            'listCotizacionItems' => array(self::HAS_MANY, 'CotizacionesItems', 'idCotizacion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCotizacion' => 'Id Cotizacion',
            'identificacionUsuario' => 'Identificacion Usuario',
            'fechaCotizacion' => 'Fecha Cotizacion',
            'subtotalCompra' => 'Subtotal Compra',
            'impuestosCompra' => 'Impuestos Compra',
            'baseImpuestosCompra' => 'Base Impuestos Compra',
            'totalCompra' => 'Total Compra',
            'ahorroCompra' => 'Ahorro Compra',
            'domicilio' => 'Domicilio',
            'flete' => 'Flete',
            'codigoPerfil' => 'Codigo Perfil',
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
    public function search($params = null) {
        // @todo Please modify the following code to remove attributes that should not be searched.
        $criteria = new CDbCriteria;

        $criteria->compare('t.idCotizacion', $this->idCotizacion);
        $criteria->compare('t.identificacionUsuario', $this->identificacionUsuario);
        //$criteria->compare('t.fechaCotizacion', $this->fechaCotizacion, true);
        $criteria->compare('t.subtotalCompra', $this->subtotalCompra);
        $criteria->compare('t.impuestosCompra', $this->impuestosCompra);
        $criteria->compare('t.baseImpuestosCompra', $this->baseImpuestosCompra);
        $criteria->compare('t.totalCompra', $this->totalCompra);
        $criteria->compare('t.ahorroCompra', $this->ahorroCompra);
        $criteria->compare('t.domicilio', $this->domicilio);
        $criteria->compare('t.flete', $this->flete);
        $criteria->compare('t.codigoPerfil', $this->codigoPerfil);
        $criteria->compare('t.codigoCiudad', $this->codigoCiudad);
        $criteria->compare('t.codigoSector', $this->codigoSector);
        $criteria->compare('t.tiempoDomicilioCedi', $this->tiempoDomicilioCedi);
        $criteria->compare('t.valorDomicilioCedi', $this->valorDomicilioCedi);
        $criteria->compare('t.codigoCedi', $this->codigoCedi);
        
        if(isset($params['with'])){
            $criteria->with = $params['with'];
        }
        
        if($this->fechaCotizacion!=null && !empty($this->fechaCotizacion)){
            $criteria->compare('t.fechaCotizacion', ">=$this->fechaCotizacion");
        }
        
        if (isset($params['order'])) {
            $criteria->order = $params['order'];
        }
        
        $configProvider= array('criteria' => $criteria);
        $configProvider['pagination'] = array('pageSize' => isset($params['pageSize']) ? $params['pageSize'] : 10);
        
        return new CActiveDataProvider($this, $configProvider);
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Cotizaciones the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    
    public function beforeSave() {
        if ($this->isNewRecord) {
            //$this->fechaCotizacion = new CDbExpression('NOW()');
            $this->fechaCotizacion = date('Y-m-d H:i:s');
        }
        
        return parent::beforeSave();
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
