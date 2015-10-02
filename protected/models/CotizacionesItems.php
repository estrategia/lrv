<?php

/**
 * This is the model class for table "t_CotizacionesItems".
 *
 * The followings are the available columns in table 't_CotizacionesItems':
 * @property string $idCotizacionItem
 * @property string $idCotizacion
 * @property string $codigoProducto
 * @property string $descripcion
 * @property string $presentacion
 * @property integer $precioBaseUnidad
 * @property integer $precioBaseFraccion
 * @property integer $descuentoUnidad
 * @property integer $descuentoFraccion
 * @property integer $precioTotalUnidad
 * @property integer $precioTotalFraccion
 * @property integer $terceros
 * @property integer $unidades
 * @property integer $fracciones
 * @property integer $unidadesCedi
 * @property integer $codigoImpuesto
 * @property integer $impuestosItem
 * @property string $porcentajeImpuesto
 * @property integer $baseImpuestos
 * @property integer $flete
 * @property integer $tiempoEntrega
 * @property integer $idCombo
 * @property string $descripcionCombo
 *
 * The followings are the available model relations:
 * @property BeneficiosCotizacionesItems[] $listBeneficios
 * @property Combo $objCombo
 * @property Producto $objProducto
 * @property Impuesto $objImpuesto
 * @property Cotizaciones $objCotizacion
 */
class CotizacionesItems extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_CotizacionesItems';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('porcentajeImpuesto', 'required'),
            array('precioBaseUnidad, precioBaseFraccion, descuentoUnidad, descuentoFraccion, precioTotalUnidad, precioTotalFraccion, terceros, unidades, fracciones, unidadesCedi, codigoImpuesto, impuestosItem, baseImpuestos, flete, tiempoEntrega, idCombo', 'numerical', 'integerOnly' => true),
            array('idCotizacion, codigoProducto', 'length', 'max' => 10),
            array('descripcion, presentacion, descripcionCombo', 'length', 'max' => 100),
            array('porcentajeImpuesto', 'length', 'max' => 4),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCotizacionItem, idCotizacion, codigoProducto, descripcion, presentacion, precioBaseUnidad, precioBaseFraccion, descuentoUnidad, descuentoFraccion, precioTotalUnidad, precioTotalFraccion, terceros, unidades, fracciones, unidadesCedi, codigoImpuesto, impuestosItem, porcentajeImpuesto, baseImpuestos, flete, tiempoEntrega, idCombo, descripcionCombo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listBeneficios' => array(self::HAS_MANY, 'BeneficiosCotizacionesItems', 'idCotizacionItem'),
            'objCombo' => array(self::BELONGS_TO, 'Combo', 'idCombo'),
            'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
            'objImpuesto' => array(self::BELONGS_TO, 'Impuesto', 'codigoImpuesto'),
            'objCotizacion' => array(self::BELONGS_TO, 'Cotizaciones', 'idCotizacion'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCotizacionItem' => 'Id Cotizacion Item',
            'idCotizacion' => 'Id Cotizacion',
            'codigoProducto' => 'Codigo Producto',
            'descripcion' => 'Descripcion',
            'presentacion' => 'Presentacion',
            'precioBaseUnidad' => 'Precio Base Unidad',
            'precioBaseFraccion' => 'Precio Base Fraccion',
            'descuentoUnidad' => 'Descuento Unidad',
            'descuentoFraccion' => 'Descuento Fraccion',
            'precioTotalUnidad' => 'Precio Total Unidad',
            'precioTotalFraccion' => 'Precio Total Fraccion',
            'terceros' => 'Terceros',
            'unidades' => 'Unidades',
            'fracciones' => 'Fracciones',
            'unidadesCedi' => 'Unidades Cedi',
            'codigoImpuesto' => 'Codigo Impuesto',
            'impuestosItem' => 'Impuestos Item',
            'porcentajeImpuesto' => 'Porcentaje Impuesto',
            'baseImpuestos' => 'Base Impuestos',
            'flete' => 'Flete',
            'tiempoEntrega' => 'Tiempo Entrega',
            'idCombo' => 'Id Combo',
            'descripcionCombo' => 'Descripcion Combo',
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

        $criteria->compare('idCotizacionItem', $this->idCotizacionItem, true);
        $criteria->compare('idCotizacion', $this->idCotizacion, true);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('presentacion', $this->presentacion, true);
        $criteria->compare('precioBaseUnidad', $this->precioBaseUnidad);
        $criteria->compare('precioBaseFraccion', $this->precioBaseFraccion);
        $criteria->compare('descuentoUnidad', $this->descuentoUnidad);
        $criteria->compare('descuentoFraccion', $this->descuentoFraccion);
        $criteria->compare('precioTotalUnidad', $this->precioTotalUnidad);
        $criteria->compare('precioTotalFraccion', $this->precioTotalFraccion);
        $criteria->compare('terceros', $this->terceros);
        $criteria->compare('unidades', $this->unidades);
        $criteria->compare('fracciones', $this->fracciones);
        $criteria->compare('unidadesCedi', $this->unidadesCedi);
        $criteria->compare('codigoImpuesto', $this->codigoImpuesto);
        $criteria->compare('impuestosItem', $this->impuestosItem);
        $criteria->compare('porcentajeImpuesto', $this->porcentajeImpuesto, true);
        $criteria->compare('baseImpuestos', $this->baseImpuestos);
        $criteria->compare('flete', $this->flete);
        $criteria->compare('tiempoEntrega', $this->tiempoEntrega);
        $criteria->compare('idCombo', $this->idCombo);
        $criteria->compare('descripcionCombo', $this->descripcionCombo, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return CotizacionesItems the static model class
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
