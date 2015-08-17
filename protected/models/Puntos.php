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

    public static function generarPuntos(DateTime $fecha, $objUsuario, $parametros) {
        $listPuntos = array();
        $dia = $fecha->format('j');
        
        if ($objUsuario instanceof Usuario && $objUsuario->codigoPerfil == 1 && $objUsuario->esClienteFiel == 1 && !in_array($dia, Yii::app()->params->clienteFiel['dias']) && $objUsuario->invitado==0) {
            foreach (Yii::app()->params->puntos as $nombrePunto => $codigoPunto) {
                if (isset($parametros[$codigoPunto])) {
                    $listPuntos = array_merge($listPuntos, self::generarPuntosTipo($fecha, $codigoPunto, $parametros[$codigoPunto]));
                }
            }
        }

        return $listPuntos;
    }

    public static function generarPuntosTipo(DateTime $fecha, $tipo, $parametro) {
        if ($tipo == Yii::app()->params->puntos['categoria']) {
            return self::generarPuntosPorCategorias($fecha, $parametro);
        } else if ($tipo == Yii::app()->params->puntos['marca']) {
            return self::generarPuntosPorMarcas($fecha, $parametro);
        } else if ($tipo == Yii::app()->params->puntos['proveedor']) {
            return self::generarPuntosPorProveedores($fecha, $parametro);
        } else if ($tipo == Yii::app()->params->puntos['producto']) {
            return self::generarPuntosPorProductos($fecha, $parametro);
        } else if ($tipo == Yii::app()->params->puntos['monto']) {
            return self::generarPuntosPorMonto($fecha, $parametro);
        } else if ($tipo == Yii::app()->params->puntos['cedula']) {
            return self::generarPuntosPorCedula($fecha, $parametro);
        } else if ($tipo == Yii::app()->params->puntos['rango']) {
            return self::generarPuntosPorRango($fecha);
        } else if ($tipo == Yii::app()->params->puntos['cumpleanhos']) {
            return self::generarPuntosPorCumpleanhos($fecha, $parametro);
        }else if($tipo == Yii::app()->params->puntos['clientefielCompra']){
            return self::generarPuntosClienteFielCompra($fecha, $parametro);
        }else{
            return array();
        }
    }
    
    private static function generarPuntosClienteFielCompra(DateTime $fecha, $total){
        if($total>=Yii::app()->params->clienteFiel['montoCompra']){
            $divisor = floor(Yii::app()->params->clienteFiel['montoCompra']/Yii::app()->params->clienteFiel['puntosCompra']);
            $puntos = floor($total/$divisor);
            
            $objPunto = new Puntos;
            $objPunto->idPunto=null;
            $objPunto->codigoPunto = Yii::app()->params->puntos['clientefielCompra'];
            $objPunto->fechaInicio = $objPunto->fechaFin = $objPunto->fechaCreacion = $objPunto->fechaActualizacion = $fecha->format('Y-m-d H:i:s');
            $objPunto->activo = 1;
            $objPunto->tipoValor = self::TIPO_CANTIDAD;
            $objPunto->valor = $puntos;
            return array($objPunto);
        }else{
            return array();
        }
    }
    

    private static function generarPuntosPorCategorias(DateTime $fecha, $categorias) {
        if (empty($categorias))
            return array();

        return self::model()->findAll(array(
                    'with' => array('listPuntosCategorias' => array('condition' => 'listPuntosCategorias.idCategoriaBI IN (' . implode(",", $categorias) . ')')),
                    'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
                    'params' => array(
                        ':tipo' => Yii::app()->params->puntos['categoria'],
                        ':activo' => 1,
                        ':fecha' => $fecha->format('Y-m-d H:i:s')
                    )
        ));
    }

    private static function generarPuntosPorMarcas(DateTime $fecha, $marcas) {
        if (empty($marcas))
            return array();

        return self::model()->findAll(array(
                    'with' => array('listPuntosMarcas' => array('condition' => 'listPuntosMarcas.idMarca IN (' . implode(",", $marcas) . ')')),
                    'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
                    'params' => array(
                        ':tipo' => Yii::app()->params->puntos['marca'],
                        ':activo' => 1,
                        ':fecha' => $fecha->format('Y-m-d H:i:s')
                    )
        ));
    }

    private static function generarPuntosPorProveedores(DateTime $fecha, $proveedores) {
        if (empty($proveedores))
            return array();

        return self::model()->findAll(array(
                    'with' => array('listPuntosProveedores' => array('condition' => 'listPuntosProveedores.codigoProveedor IN (' . implode(",", $proveedores) . ')')),
                    'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
                    'params' => array(
                        ':tipo' => Yii::app()->params->puntos['proveedor'],
                        ':activo' => 1,
                        ':fecha' => $fecha->format('Y-m-d H:i:s')
                    )
        ));
    }

    private static function generarPuntosPorProductos(DateTime $fecha, $productos) {
        $listPuntos = array();

        foreach ($productos as $producto) {
            $listPtosAux = self::model()->findAll(array(
                'with' => array('listPuntosProductos' => array('condition' => 'listPuntosProductos.codigoProducto=:producto AND listPuntosProductos.cantidad<=:cantidad')),
                'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
                'params' => array(
                    ':tipo' => Yii::app()->params->puntos['producto'],
                    ':activo' => 1,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                    ':producto' => $producto['codigo'],
                    ':cantidad' => $producto['cantidad'],
                )
            ));
            
            foreach ($listPtosAux as $objPuntos){
                foreach($objPuntos->listPuntosProductos as $objPuntosProductos){
                    $veces = floor($producto['cantidad']/$objPuntosProductos->cantidad);
                    for($n=0;$n<$veces;$n++){
                        $listPuntos[] = $objPuntos;
                    }
                }
            }
        }

        return $listPuntos;
    }

    private static function generarPuntosPorMonto(DateTime $fecha, $monto) {
        return self::model()->findAll(array(
                    'with' => array('listPuntosParametro' => array('condition' => 'listPuntosParametro.valorParametro>=:monto')),
                    'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
                    'params' => array(
                        ':tipo' => Yii::app()->params->puntos['monto'],
                        ':activo' => 1,
                        ':fecha' => $fecha->format('Y-m-d H:i:s'),
                        ':monto' => $monto
                    )
        ));
    }

    private static function generarPuntosPorCedula(DateTime $fecha, $cedula) {
        return self::model()->findAll(array(
                    'with' => array('listPuntosParametro' => array('condition' => 'listPuntosParametro.valorParametro=:cedula')),
                    'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
                    'params' => array(
                        ':tipo' => Yii::app()->params->puntos['cedula'],
                        ':activo' => 1,
                        ':fecha' => $fecha->format('Y-m-d H:i:s'),
                        ':cedula' => $cedula
                    )
        ));
    }

    private static function generarPuntosPorRango(DateTime $fecha) {
        return self::model()->findAll(array(
                    'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
                    'params' => array(
                        ':tipo' => Yii::app()->params->puntos['rango'],
                        ':activo' => 1,
                        ':fecha' => $fecha->format('Y-m-d H:i:s')
                    )
        ));
    }

    private static function generarPuntosPorCumpleanhos(DateTime $fecha, $fechaCumpleanho) {
        if ($fechaCumpleanho == null || !is_string($fechaCumpleanho)) {
            return array();
        }

        $fechaCumpleanho = trim($fechaCumpleanho);

        if (empty($fechaCumpleanho)) {
            return array();
        }

        $arr = explode("-", $fechaCumpleanho);

        if (!isset($arr[1]) || !isset($arr[2])) {
            return array();
        }

        if ($fecha->format('m') == $arr[1] && $fecha->format('d') == $arr[2]) {
            return self::model()->findAll(array(
                        'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
                        'params' => array(
                            ':tipo' => Yii::app()->params->puntos['cumpleanhos'],
                            ':activo' => 1,
                            ':fecha' => $fecha->format('Y-m-d H:i:s')
                        )
            ));
        } else {
            return array();
        }
    }

}
