<?php

/**
 * This is the model class for table "t_ModificacionesItems".
 *
 * The followings are the available columns in table 't_ModificacionesItems':
 * @property string $idModificacion
 * @property integer $idOperador
 * @property integer $idCompra
 * @property integer $idCompraItem
 * @property string $codigoProducto
 * @property integer $descuentoAnterior
 * @property integer $descuentoNuevo
 * @property integer $tipoUnidad
 *
 * The followings are the available model relations:
 * @property Operador $objOperador
 * @property Compras $objCompra
 * @property ComprasItems $objCompraItem
 */
class ModificacionesDescuentoItems extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ModificacionesDescuentoItems';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('idOperador, idCompra, idCompraItem, codigoProducto, descuentoAnterior, descuentoNuevo, tipoUnidad', 'required'),
            array('idOperador, idCompra, idCompraItem, descuentoAnterior, descuentoNuevo, tipoUnidad', 'numerical', 'integerOnly' => true),
            array('codigoProducto', 'length', 'max' => 10),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idModificacion, idOperador, idCompra, idCompraItem, codigoProducto, descuentoAnterior, descuentoNuevo, tipoUnidad', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objOperador' => array(self::BELONGS_TO, 'Operador', 'idOperador'),
            'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
            'objCompraItem' => array(self::BELONGS_TO, 'ComprasItems', 'idCompraItem'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idModificacion' => 'Id',
            'idOperador' => 'Operador',
            'idCompra' => 'Compra',
            'idCompraItem' => 'Compra Item',
            'codigoProducto' => 'Producto',
            'descuentoAnterior' => 'Descuento Anterior',
            'descuentoNuevo' => 'Descuento Nuevo',
            'tipoUnidad' => 'Tipo Unidad',
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

        $criteria->compare('idModificacion', $this->idModificacion, true);
        $criteria->compare('idOperador', $this->idOperador);
        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('idCompraItem', $this->idCompraItem);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('descuentoAnterior', $this->descuentoAnterior);
        $criteria->compare('descuentoNuevo', $this->descuentoNuevo);
        $criteria->compare('tipoUnidad', $this->tipoUnidad);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ModificacionesItems the static model class
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
