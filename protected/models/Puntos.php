<?php

/**
 * This is the model class for table "t_Puntos".
 *
 * The followings are the available columns in table 't_Puntos':
 * @property integer $idPunto
 * @property integer $codigoPunto
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $fechaCreacion
 * @property string $fechaActualizacion
 * @property integer $activo
 * @property integer $tipoValor
 * @property integer $valor
 *
 * The followings are the available model relations:
 * @property Punto $objPunto
 *
 * @property PuntosCategorias[] $listPuntosCategorias
 * @property PuntosMarcas[] $listPuntosMarcas
 * @property PuntosProductos[] $listPuntosProductos
 * @property PuntosProveedores[] $listPuntosProveedores
 * @property PuntosParametros[] $listPuntosParametro
 *
 * @property Categoria[] $listCategorias
 * @property Marca[] $listMarcas
 * @property Producto[] $listProductos
 * @property Proveedor[] $listProveedores
 */
class Puntos extends CActiveRecord {
    const TIPO_CANTIDAD = 1;
    const TIPO_MULTIPLICADOR = 2;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_Puntos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoPunto, fechaInicio, fechaFin, fechaCreacion, fechaActualizacion, tipoValor, valor', 'required'),
            array('codigoPunto, activo, tipoValor, valor', 'numerical', 'integerOnly' => true),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idPunto, codigoPunto, fechaInicio, fechaFin, fechaCreacion, fechaActualizacion, activo, tipoValor, valor', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objPunto' => array(self::BELONGS_TO, 'Punto', 'codigoPunto'),
            'listPuntosCategorias' => array(self::HAS_MANY, 'PuntosCategorias', 'idPunto'),
            'listPuntosMarcas' => array(self::HAS_MANY, 'PuntosMarcas', 'idPunto'),
            'listPuntosProductos' => array(self::HAS_MANY, 'PuntosProductos', 'idPunto'),
            'listPuntosProveedores' => array(self::HAS_MANY, 'PuntosProveedores', 'idPunto'),
            'listPuntosParametro' => array(self::HAS_MANY, 'PuntosParametro', 'idPunto'),
            'listCategorias' => array(self::MANY_MANY, 'Categoria', 't_PuntosCategorias(idPunto, idCategoriaBI)'),
            'listMarcas' => array(self::MANY_MANY, 'Marca', 't_PuntosMarcas(idPunto, idMarca)'),
            'listProductos' => array(self::MANY_MANY, 'Producto', 't_PuntosProductos(idPunto, codigoProducto)'),
            'listProveedores' => array(self::MANY_MANY, 'Proveedor', 't_PuntosProductos(idPunto, codigoProveedor)'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idPunto' => 'Id Punto',
            'codigoPunto' => 'Codigo Punto',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
            'fechaCreacion' => 'Fecha Creacion',
            'fechaActualizacion' => 'Fecha Actualizacion',
            'activo' => 'Activo',
            'tipoValor' => 'Tipo Valor',
            'valor' => 'Valor',
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

        $criteria->compare('idPunto', $this->idPunto);
        $criteria->compare('codigoPunto', $this->codigoPunto);
        $criteria->compare('fechaInicio', $this->fechaInicio, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);
        $criteria->compare('fechaActualizacion', $this->fechaActualizacion, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('tipoValor', $this->tipoValor);
        $criteria->compare('valor', $this->valor);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Puntos the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
}
