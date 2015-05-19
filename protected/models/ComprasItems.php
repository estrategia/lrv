<?php

/**
 * This is the model class for table "t_ComprasItems".
 *
 * The followings are the available columns in table 't_ComprasItems':
 * @property integer $idCompraItem
 * @property integer $idCompra
 * @property string $codigoProducto
 * @property string $descripcion
 * @property string $presentacion
 * @property integer $precioBaseUnidad
 * @property integer $precioBaseFraccion
 * @property integer $descuentoUnidad
 * @property integer $descuentoFraccion
 * @property integer $precioTotalUnidad
 * @property integer $precioTotalFraccion
 * @property integer $codigoDescuento
 * @property integer $codigoOperador
 * @property integer $terceros
 * @property integer $unidades
 * @property integer $fracciones
 * @property integer $unidadesCedi
 * @property integer $impuesto
 * @property integer $idEstadoItemTercero
 * @property integer $idEstadoItem
 * @property integer $flete
 * @property string $tiempoEntrega
 * @property integer $disponible
 * @property integer $tiempoDespachoHoras
 * @property string $recambio
 * @property integer $idPromocion
 * @property integer $idCombo
 * @property string $descripcionCombo
 *
 * The followings are the available model relations:
 * @property MEstadoItem $idEstadoItem0
 * @property MEstadoItemTercero $idEstadoItemTercero0
 * @property TCompras $idCompra0
 */
class ComprasItems extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ComprasItems';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idCompra, precioBaseUnidad, precioBaseFraccion, descuentoUnidad, descuentoFraccion, precioTotalUnidad, precioTotalFraccion, codigoDescuento, codigoOperador, terceros, unidades, fracciones, unidadesCedi, impuesto, idEstadoItemTercero, idEstadoItem, flete, disponible, tiempoDespachoHoras, idPromocion, idCombo', 'numerical', 'integerOnly' => true),
            array('codigoProducto', 'length', 'max' => 10),
            array('descripcion, presentacion, descripcionCombo', 'length', 'max' => 100),
            array('tiempoEntrega', 'length', 'max' => 20),
            array('recambio', 'length', 'max' => 255),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompraItem, idCompra, codigoProducto, descripcion, descripcionCombo, presentacion, precioBaseUnidad, precioBaseFraccion, descuentoUnidad, descuentoFraccion, precioTotalUnidad, precioTotalFraccion, codigoDescuento, codigoOperador, terceros, unidades, fracciones, unidadesCedi, impuesto, idEstadoItemTercero, idEstadoItem, flete, tiempoEntrega, disponible, tiempoDespachoHoras, recambio, idPromocion, idCombo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'idEstadoItem0' => array(self::BELONGS_TO, 'MEstadoItem', 'idEstadoItem'),
            'idEstadoItemTercero0' => array(self::BELONGS_TO, 'MEstadoItemTercero', 'idEstadoItemTercero'),
            'idCompra0' => array(self::BELONGS_TO, 'TCompras', 'idCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCompraItem' => 'Id Compra Item',
            'idCompra' => 'Id Compra',
            'codigoProducto' => 'Codigo Producto',
            'descripcion' => 'Descripcion',
            'presentacion' => 'Presentacion',
            'precioBaseUnidad' => 'Precio Base Unidad',
            'precioBaseFraccion' => 'Precio Base Fraccion',
            'descuentoUnidad' => 'Descuento Unidad',
            'descuentoFraccion' => 'Descuento Fraccion',
            'precioTotalUnidad' => 'Precio Total Unidad',
            'precioTotalFraccion' => 'Precio Total Fraccion',
            'codigoDescuento' => 'Codigo Descuento',
            'codigoOperador' => 'Codigo Operador',
            'terceros' => 'Terceros',
            'unidades' => 'Unidades',
            'fracciones' => 'Fracciones',
            'unidadesCedi' => 'Unidades Cedi',
            'impuesto' => 'Impuesto',
            'idEstadoItemTercero' => 'Id Estado Item Tercero',
            'idEstadoItem' => 'Id Estado Item',
            'flete' => 'Flete',
            'tiempoEntrega' => 'Tiempo Entrega',
            'disponible' => 'Disponible',
            'tiempoDespachoHoras' => 'Tiempo Despacho Horas',
            'recambio' => 'Recambio',
            'idPromocion' => 'Id Promocion',
            'idCombo' => 'Id Combo',
            'descripcionCombo' => 'Sescripcion Combo'
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

        $criteria->compare('idCompraItem', $this->idCompraItem);
        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('presentacion', $this->presentacion, true);
        $criteria->compare('precioBaseUnidad', $this->precioBaseUnidad);
        $criteria->compare('precioBaseFraccion', $this->precioBaseFraccion);
        $criteria->compare('descuentoUnidad', $this->descuentoUnidad);
        $criteria->compare('descuentoFraccion', $this->descuentoFraccion);
        $criteria->compare('precioTotalUnidad', $this->precioTotalUnidad);
        $criteria->compare('precioTotalFraccion', $this->precioTotalFraccion);
        $criteria->compare('codigoDescuento', $this->codigoDescuento);
        $criteria->compare('codigoOperador', $this->codigoOperador);
        $criteria->compare('terceros', $this->terceros);
        $criteria->compare('unidades', $this->unidades);
        $criteria->compare('fracciones', $this->fracciones);
        $criteria->compare('unidadesCedi', $this->unidadesCedi);
        $criteria->compare('impuesto', $this->impuesto);
        $criteria->compare('idEstadoItemTercero', $this->idEstadoItemTercero);
        $criteria->compare('idEstadoItem', $this->idEstadoItem);
        $criteria->compare('flete', $this->flete);
        $criteria->compare('tiempoEntrega', $this->tiempoEntrega, true);
        $criteria->compare('disponible', $this->disponible);
        $criteria->compare('tiempoDespachoHoras', $this->tiempoDespachoHoras);
        $criteria->compare('recambio', $this->recambio, true);
        $criteria->compare('idPromocion', $this->idPromocion);
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
     * @return ComprasItems the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

}
