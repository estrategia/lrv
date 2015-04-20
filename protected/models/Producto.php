<?php

/**
 * This is the model class for table "m_Producto".
 *
 * The followings are the available columns in table 'm_Producto':
 * @property string $codigoProducto
 * @property integer $codigoExtendido
 * @property string $codigoBarras
 * @property string $descripcionProducto
 * @property string $presentacionProducto
 * @property integer $idMarca
 * @property string $codigoProveedor
 * @property integer $codigoImpuesto
 * @property integer $idCategorizacion
 * @property integer $unidadNegocio
 * @property integer $division
 * @property integer $idCategoriaBI
 * @property integer $activo
 * @property integer $codigoEspecial
 * @property string $indicadorOferta
 * @property integer $indicadorPerenne
 * @property integer $frecuenciaPerenne
 * @property integer $indicadorMarcaPropia
 * @property string $fraccionado
 * @property string $numeroFracciones
 * @property integer $codigoMedidaFraccion
 * @property string $unidadFraccionamiento
 * @property string $codigoUnidadMedida
 * @property string $cantidadUnidadMedida
 * @property string $fechaCreacion
 * @property integer $orden
 * @property integer $ventaVirtual
 * @property integer $mostrarAhorroVirtual
 *
 * The followings are the available model relations:
 * @property Proveedor $objProveedor
 * @property CodigoEspecial $objCodigoEspecial
 * @property UnidadMedida $objUnidadMedida
 * @property Impuesto $objImpuesto
 * @property Imagen listImagenes
 * @property Marca $objMarca
 */
class Producto extends CActiveRecord {

    private $objPrecio = false;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_Producto';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('descripcionProducto, presentacionProducto, idMarca, codigoProveedor, idCategorizacion, codigoUnidadMedida, cantidadUnidadMedida, fechaCreacion, orden', 'required'),
            array('codigoExtendido, codigoImpuesto, idCategorizacion, idMarca, unidadNegocio, division, idCategoriaBI, activo, codigoEspecial, indicadorPerenne, frecuenciaPerenne, indicadorMarcaPropia, codigoMedidaFraccion, orden, ventaVirtual, mostrarAhorroVirtual', 'numerical', 'integerOnly' => true),
            array('codigoProducto, cantidadUnidadMedida', 'length', 'max' => 10),
            array('codigoBarras', 'length', 'max' => 50),
            array('descripcionProducto, presentacionProducto', 'length', 'max' => 100),
            array('codigoProveedor, numeroFracciones, unidadFraccionamiento, codigoUnidadMedida', 'length', 'max' => 5),
            array('indicadorOferta, fraccionado', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoProducto, codigoExtendido, codigoBarras, idMarca, descripcionProducto, presentacionProducto, codigoProveedor, codigoImpuesto, idCategorizacion, unidadNegocio, division, idCategoriaBI, activo, codigoEspecial, indicadorOferta, indicadorPerenne, frecuenciaPerenne, indicadorMarcaPropia, fraccionado, numeroFracciones, codigoMedidaFraccion, unidadFraccionamiento, codigoUnidadMedida, cantidadUnidadMedida, fechaCreacion, orden, ventaVirtual, mostrarAhorroVirtual', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objProveedor' => array(self::BELONGS_TO, 'Proveedor', 'codigoProveedor'),
            'objCodigoEspecial' => array(self::BELONGS_TO, 'CodigoEspecial', 'codigoEspecial'),
            //'objUnidadMedida' => array(self::BELONGS_TO, 'Unidadmedida', 'codigoUnidadMedida'),
            'objMedidaFraccion' => array(self::BELONGS_TO, 'MedidaFraccion', 'codigoMedidaFraccion'),
            'objImpuesto' => array(self::BELONGS_TO, 'Impuesto', 'codigoImpuesto'),
            'objDetalle' => array(self::HAS_ONE, 'ProductoDetalle', 'codigoProducto'),
            'listImagenes' => array(self::HAS_MANY, 'Imagen', 'codigoProducto'),
            'listCalificaciones' => array(self::HAS_MANY, 'ProductosCalificaciones', 'codigoProducto'),
            'listSaldos' => array(self::HAS_MANY, 'ProductosSaldos', 'codigoProducto'),
            'listPrecios' => array(self::HAS_MANY, 'ProductosPrecios', 'codigoProducto'),
            'listSaldosTerceros' => array(self::HAS_MANY, 'ProductosSaldosTerceros', 'codigoProducto'),
            'listDescuentosPerfiles' => array(self::HAS_MANY, 'ProductosDescuentosPerfiles', 'codigoProducto'),
            //'listPerfiles' => array(self::MANY_MANY, 'Perfil', 't_ProductosDescuentosPerfiles(codigoProducto, codigoPerfil)'),
            'listAtributos' => array(self::MANY_MANY, 'Atributo', 't_ProductosAtributos(codigoProducto, idAtributo)'),
            'objMarca' => array(self::BELONGS_TO, 'Marca', 'idMarca'),
            'objCategoriaBI' => array(self::BELONGS_TO, 'Categoria', 'idCategoriaBI'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoProducto' => 'Codigo Producto',
            'codigoExtendido' => 'Codigo Extendido',
            'codigoBarras' => 'Codigo Barras',
            'descripcionProducto' => 'Descripcion Producto',
            'presentacionProducto' => 'Presentacion Producto',
            'idMarca' => 'Id Marca',
            'codigoProveedor' => 'Codigo Proveedor',
            'codigoImpuesto' => 'Codigo Impuesto',
            'idCategorizacion' => 'Id Categorizacion',
            'unidadNegocio' => 'Unidad Negocio',
            'division' => 'Division',
            'idCategoriaBI' => 'Categoria',
            'activo' => 'Activo',
            'codigoEspecial' => 'Codigo Especial',
            'indicadorOferta' => 'Indicador Oferta',
            'indicadorPerenne' => 'Indicador Perenne',
            'frecuenciaPerenne' => 'Frecuencia Perenne',
            'indicadorMarcaPropia' => 'Indicador Marca Propia',
            'fraccionado' => 'Fraccionado',
            'numeroFracciones' => 'Numero Fracciones',
            'codigoMedidaFraccion' => 'Codigo Medida Fraccion',
            'unidadFraccionamiento' => 'Unidad Fraccionamiento',
            'codigoUnidadMedida' => 'Codigo Unidad Medida',
            'cantidadUnidadMedida' => 'Cantidad Unidad Medida',
            'fechaCreacion' => 'Fecha Creacion',
            'orden' => 'Orden',
            'ventaVirtual' => 'Venta Virtual',
            'mostrarAhorroVirtual' => 'Mostrar Descuento Virtual',
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

        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('codigoExtendido', $this->codigoExtendido);
        $criteria->compare('codigoBarras', $this->codigoBarras, true);
        $criteria->compare('descripcionProducto', $this->descripcionProducto, true);
        $criteria->compare('presentacionProducto', $this->presentacionProducto, true);
        $criteria->compare('idMarca', $this->idMarca);
        $criteria->compare('codigoProveedor', $this->codigoProveedor, true);
        $criteria->compare('codigoImpuesto', $this->codigoImpuesto);
        $criteria->compare('idCategorizacion', $this->idCategorizacion);
        $criteria->compare('unidadNegocio', $this->unidadNegocio);
        $criteria->compare('division', $this->division);
        $criteria->compare('idCategoriaBI', $this->idCategoriaBI);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('codigoEspecial', $this->codigoEspecial);
        $criteria->compare('indicadorOferta', $this->indicadorOferta, true);
        $criteria->compare('indicadorPerenne', $this->indicadorPerenne);
        $criteria->compare('frecuenciaPerenne', $this->frecuenciaPerenne);
        $criteria->compare('indicadorMarcaPropia', $this->indicadorMarcaPropia);
        $criteria->compare('fraccionado', $this->fraccionado, true);
        $criteria->compare('numeroFracciones', $this->numeroFracciones, true);
        $criteria->compare('codigoMedidaFraccion', $this->codigoMedidaFraccion);
        $criteria->compare('unidadFraccionamiento', $this->unidadFraccionamiento, true);
        $criteria->compare('codigoUnidadMedida', $this->codigoUnidadMedida, true);
        $criteria->compare('cantidadUnidadMedida', $this->cantidadUnidadMedida, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);
        $criteria->compare('orden', $this->orden);
        $criteria->compare('ventaVirtual', $this->ventaVirtual);
        $criteria->compare('mostrarAhorroVirtual', $this->mostrarAhorroVirtual);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Producto the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * Retorna el tipo de imagen de un producto, si no se detecta, retorna null
     * @param int tipo de imagen
     * @return Imagen imagen del producto
     */
    public function objImagen($tipo) {
        $obj = null;

        foreach ($this->listImagenes as $imagen) {
            if ($imagen->tipoImagen == $tipo && $imagen->estadoImagen == 1) {
                $obj = $imagen;
                break;
            }
        }
        return $obj;
    }

    /**
     * Retorna lista del tipo de imagen de un producto, si no se detecta
     * @param int tipo de imagen
     * @return array imagen del producto
     */
    public function listImagen($tipo) {
        $list = array();

        foreach ($this->listImagenes as $imagen) {
            if ($imagen->tipoImagen == $tipo && $imagen->estadoImagen == 1) {
                $list[] = $imagen;
            }
        }
        return $list;
    }

    public function getCalificacion() {
        $calificacion = 0;
        $cont = 0;

        foreach ($this->listCalificaciones as $objCalificacion) {
            if ($objCalificacion->aprobado == 1) {
                $calificacion += $objCalificacion->calificacion;
                $cont++;
            }
        }

        if ($cont > 0)
            $calificacion = $calificacion / $cont;

        return $calificacion;
    }

    public function getSaldo($codigoCiudad, $codigoSector) {
        foreach ($this->listSaldos as $objSaldo) {
            if ($objSaldo->codigoCiudad == $codigoCiudad && $objSaldo->codigoSector == $codigoSector) {
                return $objSaldo;
            }
        }

        return null;
    }

    public function getPrecio($codigoCiudad, $codigoSector, $codigoPerfil, $forzar = false) {
        if (!$this->objPrecio || $forzar) {
            $this->objPrecio = new Precio;
            
            foreach ($this->listPrecios as $objProductoPrecio) {
                if ($objProductoPrecio->codigoCiudad == $codigoCiudad && $objProductoPrecio->codigoSector == $codigoSector) {
                    $this->objPrecio->precioUnidad = $objProductoPrecio->precioUnidad;

                    //if ($this->fraccionado == 1){
                    $this->objPrecio->precioFraccion = $objProductoPrecio->precioFraccion;
                    $this->objPrecio->unidadFraccionamiento = $this->unidadFraccionamiento;
                    //}

                    break;
                }
            }

            foreach ($this->listDescuentosPerfiles as $objDescuentoPerfil) {
                if ($objDescuentoPerfil->codigoPerfil == $codigoPerfil) {
                    $this->objPrecio->porcentajeDescuentoPerfil = $objDescuentoPerfil->descuentoPerfil;
                    break;
                }
            }
        }

        return $this->objPrecio;
    }

}
