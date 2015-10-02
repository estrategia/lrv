<?php

/**
 * This is the model class for table "m_Producto".
 *
 * The followings are the available columns in table 'm_Producto':
 * @property string $codigoProducto
 * @property string $codigoBarras
 * @property string $descripcionProducto
 * @property string $presentacionProducto
 * @property integer $idMarca
 * @property string $codigoProveedor
 * @property integer $codigoImpuesto
 * @property integer $idCategoriaBI
 * @property integer $activo
 * @property integer $codigoEspecial
 * @property string $fraccionado
 * @property string $numeroFracciones
 * @property integer $codigoMedidaFraccion
 * @property string $unidadFraccionamiento
 * @property string $codigoUnidadMedida
 * @property string $cantidadUnidadMedida
 * @property string $fechaCreacion
 * @property integer $ventaVirtual
 * @property integer $mostrarAhorroVirtual
 * @property string $tercero
 * @property string $orden
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

    /**
     * @return string the associated database table name
     */

    public $id;

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
            array('descripcionProducto, presentacionProducto, idMarca, codigoProveedor, codigoUnidadMedida, cantidadUnidadMedida, fechaCreacion', 'required'),
            array('codigoImpuesto, idMarca, idCategoriaBI, activo, codigoEspecial, codigoMedidaFraccion, ventaVirtual, mostrarAhorroVirtual', 'numerical', 'integerOnly' => true),
            array('codigoProducto, cantidadUnidadMedida', 'length', 'max' => 10),
            array('codigoBarras', 'length', 'max' => 50),
            array('descripcionProducto, presentacionProducto', 'length', 'max' => 200),
            array('codigoProveedor, numeroFracciones, unidadFraccionamiento, codigoUnidadMedida', 'length', 'max' => 5),
            array('fraccionado, tercero, orden', 'length', 'max' => 1),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('codigoProducto, codigoBarras, idMarca, descripcionProducto, presentacionProducto, codigoProveedor, codigoImpuesto, idCategoriaBI, activo, codigoEspecial, fraccionado, tercero, orden, numeroFracciones, codigoMedidaFraccion, unidadFraccionamiento, codigoUnidadMedida, cantidadUnidadMedida, fechaCreacion, ventaVirtual, mostrarAhorroVirtual', 'safe', 'on' => 'search'),
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
            'listDescuentosEspeciales' => array(self::HAS_MANY, 'ProductosDescuentosEspeciales', 'codigoProducto'),
            //'listPerfiles' => array(self::MANY_MANY, 'Perfil', 't_ProductosDescuentosPerfiles(codigoProducto, codigoPerfil)'),
            'listFiltros' => array(self::MANY_MANY, 'FiltroDetalle', 't_ProductosFiltros(codigoProducto, idFiltroDetalle)'),
            'objMarca' => array(self::BELONGS_TO, 'Marca', 'idMarca'),
            'objCategoriaBI' => array(self::BELONGS_TO, 'Categoria', 'idCategoriaBI'),
            
            
            //'listCategoriasTienda' => array(self::MANY_MANY, 'CategoriaTienda', '', 'through' => 'CategoriasCategoriaTienda', 'condition' => 'CategoriasCategoriaTienda.idCategoriaBI=106'),
            //'listCategoriasCategoriaTienda' => array(self::HAS_MANY, 'CategoriasCategoriaTienda', 'idCategoriaBI'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'codigoProducto' => 'Codigo Producto',
            'codigoBarras' => 'Codigo Barras',
            'descripcionProducto' => 'Descripcion Producto',
            'presentacionProducto' => 'Presentacion Producto',
            'idMarca' => 'Id Marca',
            'codigoProveedor' => 'Codigo Proveedor',
            'codigoImpuesto' => 'Codigo Impuesto',
            'idCategoriaBI' => 'Categoria',
            'activo' => 'Activo',
            'codigoEspecial' => 'Codigo Especial',
            'fraccionado' => 'Fraccionado',
            'numeroFracciones' => 'Numero Fracciones',
            'codigoMedidaFraccion' => 'Codigo Medida Fraccion',
            'unidadFraccionamiento' => 'Unidad Fraccionamiento',
            'codigoUnidadMedida' => 'Codigo Unidad Medida',
            'cantidadUnidadMedida' => 'Cantidad Unidad Medida',
            'fechaCreacion' => 'Fecha Creacion',
            'ventaVirtual' => 'Venta Virtual',
            'mostrarAhorroVirtual' => 'Mostrar Descuento Virtual',
            'tercero' => 'Tercero',
            'orden' => 'Orden',
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
        $criteria->compare('codigoBarras', $this->codigoBarras, true);
        $criteria->compare('descripcionProducto', $this->descripcionProducto, true);
        $criteria->compare('presentacionProducto', $this->presentacionProducto, true);
        $criteria->compare('idMarca', $this->idMarca);
        $criteria->compare('codigoProveedor', $this->codigoProveedor, true);
        $criteria->compare('codigoImpuesto', $this->codigoImpuesto);
        $criteria->compare('idCategoriaBI', $this->idCategoriaBI);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('codigoEspecial', $this->codigoEspecial);
        $criteria->compare('fraccionado', $this->fraccionado);
        $criteria->compare('numeroFracciones', $this->numeroFracciones, true);
        $criteria->compare('codigoMedidaFraccion', $this->codigoMedidaFraccion);
        $criteria->compare('unidadFraccionamiento', $this->unidadFraccionamiento, true);
        $criteria->compare('codigoUnidadMedida', $this->codigoUnidadMedida, true);
        $criteria->compare('cantidadUnidadMedida', $this->cantidadUnidadMedida, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);
        $criteria->compare('ventaVirtual', $this->ventaVirtual);
        $criteria->compare('mostrarAhorroVirtual', $this->mostrarAhorroVirtual);
        $criteria->compare('tercero', $this->tercero);
        $criteria->compare('orden', $this->orden);

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
    
    public function rutaImagen(){
        $objImagen = $this->objImagen(YII::app()->params->producto['tipoImagen']['mini']);
        if($objImagen == null)
            return Yii::app()->params->producto['noImagen']['mini'];
        
        return Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $objImagen->rutaImagen;
    }

    /**
     * Retorna el tipo de imagen de un producto, si no se detecta, retorna null
     * @param int tipo de imagen
     * @return Imagen imagen del producto
     */
    public function objImagenDesktop($tipo,$listImagenes) {
        $obj = null;

        foreach ($listImagenes as $imagen) {
            if ($imagen['tipoImagen'] == $tipo && $imagen['estadoImagen'] == 1) {
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

    public function getCalificacion($arreglo = false) {
        $calificacion = 0;
        $votos = 0;

        foreach ($this->listCalificaciones as $objCalificacion) {
            if ($objCalificacion->aprobado == 1) {
                $calificacion += $objCalificacion->calificacion;
                $votos++;
            }
        }

        if ($votos > 0)
            $calificacion = $calificacion / $votos;
        
        $calificacion = round($calificacion, 1);
        
        if($arreglo){
            return array(
                'calificacion' => $calificacion,
                'votos' => $votos
            );
        }

        return $calificacion;
    }

    public function getSaldo($codigoCiudad, $codigoSector) {
        if ($this->tercero == 1) {
            foreach ($this->listSaldosTerceros as $objProductoSaldoTercero) {
                if ($objProductoSaldoTercero->codigoCiudad == $codigoCiudad && $objProductoSaldoTercero->codigoSector == $codigoSector) {
                    return $objProductoSaldoTercero;
                }
            }
        } else {
            foreach ($this->listSaldos as $objSaldo) {
                if ($objSaldo->codigoCiudad == $codigoCiudad && $objSaldo->codigoSector == $codigoSector) {
                    return $objSaldo;
                }
            }
        }

        return null;
    }
    
    public static function cadenaUrl($producto){
        return str_replace(" ","-", $producto).".html";
    }
    
    public function getArrayCalificacion(){
        $sumaCalificaciones=array("1"=>0,"2"=>0,"3"=>0,"4"=>0,"5"=>0);
        $contadorCalificacion=0;
        foreach ($this->listCalificaciones as $objComentario){
                if ($objComentario->aprobado == 1){
                      $contadorCalificacion++;
                      if($objComentario->calificacion==5){$sumaCalificaciones[5]++;}
                      else if($objComentario->calificacion==4){$sumaCalificaciones[4]++;}                                 
                      else if($objComentario->calificacion==3){$sumaCalificaciones[3]++;}
                      else if($objComentario->calificacion==2){$sumaCalificaciones[2]++;}
                      else if($objComentario->calificacion==1){$sumaCalificaciones[1]++;}
                }
         }
            if($contadorCalificacion==0){
                return  array(
                "1"=>0,
                "2"=>0,
                "3"=>0,
                "4"=>0,
                "5"=>0,
            );
         }
         
            return array(
                "1"=>($sumaCalificaciones[1]/$contadorCalificacion*100),
                "2"=>($sumaCalificaciones[2]/$contadorCalificacion*100),
                "3"=>($sumaCalificaciones[3]/$contadorCalificacion*100),
                "4"=>($sumaCalificaciones[4]/$contadorCalificacion*100),
                "5"=>($sumaCalificaciones[5]/$contadorCalificacion*100),
            );
         
    }
    
    public function getContadorCalificaciones(){
         $contadorCalificacion=0;
        foreach ($this->listCalificaciones as $objComentario){
                if ($objComentario->aprobado == 1){
                      $contadorCalificacion++;
                }
         }
         return $contadorCalificacion;
    }
    
    
    
}
