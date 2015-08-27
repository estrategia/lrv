<?php

/**
 * This is the model class for table "t_ComprasPuntos".
 *
 * The followings are the available columns in table 't_ComprasPuntos':
 * @property string $idCompraPunto
 * @property string $idPunto
 * @property integer $codigoPunto
 * @property integer $idCompra
 * @property string $fechaInicio
 * @property string $fechaFin
 * @property string $fechaCreacion
 * @property string $fechaActualizacion
 * @property integer $activo
 * @property integer $tipoValor
 * @property integer $valor
 * @property integer $cantidadPuntos
 *
 * The followings are the available model relations:
 * @property Punto $objPunto
 * @property Compras $objCompra
 */
class ComprasPuntos extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_ComprasPuntos';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('codigoPunto, idCompra, fechaInicio, fechaFin, fechaCreacion, fechaActualizacion, tipoValor, valor, cantidadPuntos', 'required'),
            array('codigoPunto, idCompra, activo, tipoValor, valor, cantidadPuntos', 'numerical', 'integerOnly' => true),
            array('idPunto', 'length', 'max' => 11),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompraPunto, idPunto, codigoPunto, idCompra, fechaInicio, fechaFin, fechaCreacion, fechaActualizacion, activo, tipoValor, valor, cantidadPuntos', 'safe', 'on' => 'search'),
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
            'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCompraPunto' => 'Id Compra Punto',
            'idPunto' => 'Id Punto',
            'codigoPunto' => 'Codigo Punto',
            'idCompra' => 'Id Compra',
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
            'fechaCreacion' => 'Fecha Creacion',
            'fechaActualizacion' => 'Fecha Actualizacion',
            'activo' => 'Activo',
            'tipoValor' => 'Tipo Valor',
            'valor' => 'Valor',
            'cantidadPuntos' => 'Cantidad Puntos',
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

        $criteria->compare('idCompraPunto', $this->idCompraPunto, true);
        $criteria->compare('idPunto', $this->idPunto, true);
        $criteria->compare('codigoPunto', $this->codigoPunto);
        $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('fechaInicio', $this->fechaInicio, true);
        $criteria->compare('fechaFin', $this->fechaFin, true);
        $criteria->compare('fechaCreacion', $this->fechaCreacion, true);
        $criteria->compare('fechaActualizacion', $this->fechaActualizacion, true);
        $criteria->compare('activo', $this->activo);
        $criteria->compare('tipoValor', $this->tipoValor);
        $criteria->compare('valor', $this->valor);
        $criteria->compare('cantidadPuntos', $this->cantidadPuntos);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ComprasPuntos the static model class
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
    
    public static function calcularPuntos($valor){
         $divisor = floor(Yii::app()->params->clienteFiel['montoCompra']/Yii::app()->params->clienteFiel['puntosCompra']);
         return floor($valor/$divisor);
    }
    
    public static function calcularTotalPuntos($tipoValor, $valor, $total){
        if($tipoValor == 1){
            return $valor;
        }else if($tipoValor == 2){
            return self::calcularPuntos($total)*$valor;
        }else{
            return 0;
        }
    }
    
    public static function generarPuntos(DateTime $fecha, $objUsuario, $parametros) {
        $listPuntos = array();
        $dia = $fecha->format('j');
        
        if ($objUsuario instanceof Usuario && $objUsuario->codigoPerfil == 1 && $objUsuario->esClienteFiel == 1 && !in_array($dia, Yii::app()->params->clienteFiel['dias']) && $objUsuario->invitado==0) {
            foreach (Yii::app()->params->puntos as $nombrePunto => $codigoPunto) {
                if (isset($parametros[$codigoPunto])) {
                    $listPuntos = array_merge($listPuntos, self::generarPuntosTipo($fecha, $codigoPunto, $objUsuario, $parametros[$codigoPunto]));
                }
            }
        }

        return $listPuntos;
    }

    private static function generarPuntosTipo(DateTime $fecha, $tipo, $objUsuario, $parametro) {
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
            return self::generarPuntosPorRango($parametro);
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
            $objPuntoCompra = new ComprasPuntos;
            $objPuntoCompra->idPunto=null;
            $objPuntoCompra->codigoPunto = Yii::app()->params->puntos['clientefielCompra'];
            $objPuntoCompra->fechaInicio = $objPuntoCompra->fechaFin = $objPuntoCompra->fechaCreacion = $objPuntoCompra->fechaActualizacion = $fecha->format('Y-m-d H:i:s');
            $objPuntoCompra->activo = 1;
            $objPuntoCompra->tipoValor = Puntos::TIPO_CANTIDAD;
            $objPuntoCompra->valor = self::calcularPuntos($total);
            $objPuntoCompra->cantidadPuntos = self::calcularPuntos($total);
            return array($objPuntoCompra);
        }else{
            return array();
        }
    }

    private static function generarPuntosPorCategorias(DateTime $fecha, $categorias) {
        $codigos = array();
        
        foreach ($categorias as $categoria){
            $codigos[$categoria['codigo']] = $categoria['codigo'];
        }
        
        if (empty($codigos))
            return array();

        $listPuntos = Puntos::model()->findAll(array(
            'with' => array('listPuntosCategorias' => array('condition' => 'listPuntosCategorias.idCategoriaBI IN (' . implode(",", $codigos) . ')')),
            'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
            'params' => array(
                ':tipo' => Yii::app()->params->puntos['categoria'],
                ':activo' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s')
            )
        ));
        
        $listPuntosCompra = array();
        
        foreach($listPuntos as $objPunto){
            foreach($objPunto->listPuntosCategorias as $objPuntoCategoria){
                foreach ($categorias as $categoria){
                    if($objPuntoCategoria->idCategoriaBI == $categoria['codigo'] && $categoria['valor']>=Yii::app()->params->clienteFiel['montoCompra']){
                        $objPuntoCompra = new ComprasPuntos;
                        $objPuntoCompra->idPunto = $objPunto->idPunto;
                        $objPuntoCompra->codigoPunto = $objPunto->codigoPunto;
                        //$objPuntoCompra->idCompra = $objCompra->idCompra;
                        $objPuntoCompra->fechaInicio = $objPunto->fechaInicio;
                        $objPuntoCompra->fechaFin = $objPunto->fechaFin;
                        $objPuntoCompra->fechaCreacion = $objPunto->fechaCreacion;
                        $objPuntoCompra->fechaActualizacion = $objPunto->fechaActualizacion;
                        $objPuntoCompra->activo = $objPunto->activo;
                        $objPuntoCompra->tipoValor = $objPunto->tipoValor;
                        $objPuntoCompra->valor = $objPunto->valor;
                        $objPuntoCompra->cantidadPuntos = self::calcularTotalPuntos($objPunto->tipoValor, $objPunto->valor, $categoria['valor']);
                        $listPuntosCompra[] = $objPuntoCompra;
                    }
                }
            }         
        }
        
        return $listPuntosCompra;
    }

    private static function generarPuntosPorMarcas(DateTime $fecha, $marcas) {
        $codigos = array();
        
        foreach ($marcas as $marca){
            $codigos[$marca['codigo']] = $marca['codigo'];
        }
        
        if (empty($codigos))
            return array();

        $listPuntos = Puntos::model()->findAll(array(
            'with' => array('listPuntosMarcas' => array('condition' => 'listPuntosMarcas.idMarca IN (' . implode(",", $codigos) . ')')),
            'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
            'params' => array(
                ':tipo' => Yii::app()->params->puntos['marca'],
                ':activo' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s')
            )
        ));
        
        $listPuntosCompra = array();
        
        foreach($listPuntos as $objPunto){
            foreach($objPunto->listPuntosMarcas as $objPuntoMarca){
                foreach ($marcas as $marca){
                    if($objPuntoMarca->idMarca == $marca['codigo'] && $marca['valor']>=Yii::app()->params->clienteFiel['montoCompra']){
                        $objPuntoCompra = new ComprasPuntos;
                        $objPuntoCompra->idPunto = $objPunto->idPunto;
                        $objPuntoCompra->codigoPunto = $objPunto->codigoPunto;
                        //$objPuntoCompra->idCompra = $objCompra->idCompra;
                        $objPuntoCompra->fechaInicio = $objPunto->fechaInicio;
                        $objPuntoCompra->fechaFin = $objPunto->fechaFin;
                        $objPuntoCompra->fechaCreacion = $objPunto->fechaCreacion;
                        $objPuntoCompra->fechaActualizacion = $objPunto->fechaActualizacion;
                        $objPuntoCompra->activo = $objPunto->activo;
                        $objPuntoCompra->tipoValor = $objPunto->tipoValor;
                        $objPuntoCompra->valor = $objPunto->valor;
                        $objPuntoCompra->cantidadPuntos = self::calcularTotalPuntos($objPunto->tipoValor, $objPunto->valor, $marca['valor']);
                        $listPuntosCompra[] = $objPuntoCompra;
                    }
                }
            }         
        }
        
        return $listPuntosCompra;
    }

    private static function generarPuntosPorProveedores(DateTime $fecha, $proveedores) {
         $codigos = array();
        
        foreach ($proveedores as $proveedor){
            $codigos[$proveedor['codigo']] = $proveedor['codigo'];
        }
        
        if (empty($codigos))
            return array();

        $listPuntos = Puntos::model()->findAll(array(
            'with' => array('listPuntosProveedores' => array('condition' => 'listPuntosProveedores.codigoProveedor IN (' . implode(",", $codigos) . ')')),
            'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
            'params' => array(
                ':tipo' => Yii::app()->params->puntos['proveedor'],
                ':activo' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s')
            )
        ));
        
        $listPuntosCompra = array();
        
        foreach($listPuntos as $objPunto){
            foreach($objPunto->listPuntosProveedores as $objPuntoProveedor){
                foreach ($proveedores as $proveedor){
                    if($objPuntoProveedor->codigoProveedor == $proveedor['codigo'] && $proveedor['valor']>=Yii::app()->params->clienteFiel['montoCompra']){
                        $objPuntoCompra = new ComprasPuntos;
                        $objPuntoCompra->idPunto = $objPunto->idPunto;
                        $objPuntoCompra->codigoPunto = $objPunto->codigoPunto;
                        //$objPuntoCompra->idCompra = $objCompra->idCompra;
                        $objPuntoCompra->fechaInicio = $objPunto->fechaInicio;
                        $objPuntoCompra->fechaFin = $objPunto->fechaFin;
                        $objPuntoCompra->fechaCreacion = $objPunto->fechaCreacion;
                        $objPuntoCompra->fechaActualizacion = $objPunto->fechaActualizacion;
                        $objPuntoCompra->activo = $objPunto->activo;
                        $objPuntoCompra->tipoValor = $objPunto->tipoValor;
                        $objPuntoCompra->valor = $objPunto->valor;
                        $objPuntoCompra->cantidadPuntos = self::calcularTotalPuntos($objPunto->tipoValor, $objPunto->valor, $proveedor['valor']);
                        $listPuntosCompra[] = $objPuntoCompra;
                    }
                }
            }         
        }
        
        return $listPuntosCompra;
    }

    private static function generarPuntosPorProductos(DateTime $fecha, $productos) {
        $listPuntosCompra = array();

        foreach ($productos as $producto) {
            if($producto['valor']>=Yii::app()->params->clienteFiel['montoCompra']){
                $listPtosAux = Puntos::model()->findAll(array(
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

                foreach ($listPtosAux as $objPunto){
                    foreach($objPunto->listPuntosProductos as $objPuntoProducto){
                        $veces = floor($producto['cantidad']/$objPuntoProducto->cantidad);

                        $objPuntoCompra = new ComprasPuntos;
                        $objPuntoCompra->idPunto = $objPunto->idPunto;
                        $objPuntoCompra->codigoPunto = $objPunto->codigoPunto;
                        //$objPuntoCompra->idCompra = $objCompra->idCompra;
                        $objPuntoCompra->fechaInicio = $objPunto->fechaInicio;
                        $objPuntoCompra->fechaFin = $objPunto->fechaFin;
                        $objPuntoCompra->fechaCreacion = $objPunto->fechaCreacion;
                        $objPuntoCompra->fechaActualizacion = $objPunto->fechaActualizacion;
                        $objPuntoCompra->activo = $objPunto->activo;
                        $objPuntoCompra->tipoValor = $objPunto->tipoValor;
                        $objPuntoCompra->valor = $objPunto->valor;
                        $objPuntoCompra->cantidadPuntos = self::calcularTotalPuntos($objPunto->tipoValor, $objPunto->valor, $producto['valor'])*$veces;
                        $listPuntosCompra[] = $objPuntoCompra;
                    }
                }
            }
        }

        return $listPuntosCompra;
    }

    private static function generarPuntosPorMonto(DateTime $fecha, $monto) {
        
        if($monto < Yii::app()->params->clienteFiel['montoCompra']){
            return array();
        }
        
        $listPuntos = Puntos::model()->findAll(array(
            'with' => array('listPuntosParametro' => array('condition' => 'listPuntosParametro.valorParametro>=:monto')),
            'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
            'params' => array(
                ':tipo' => Yii::app()->params->puntos['monto'],
                ':activo' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':monto' => $monto
            )
        ));
        
        $listPuntosCompra = array();
        
        foreach($listPuntos as $objPunto){
            $objPuntoCompra = new ComprasPuntos;
            $objPuntoCompra->idPunto = $objPunto->idPunto;
            $objPuntoCompra->codigoPunto = $objPunto->codigoPunto;
            //$objPuntoCompra->idCompra = $objCompra->idCompra;
            $objPuntoCompra->fechaInicio = $objPunto->fechaInicio;
            $objPuntoCompra->fechaFin = $objPunto->fechaFin;
            $objPuntoCompra->fechaCreacion = $objPunto->fechaCreacion;
            $objPuntoCompra->fechaActualizacion = $objPunto->fechaActualizacion;
            $objPuntoCompra->activo = $objPunto->activo;
            $objPuntoCompra->tipoValor = $objPunto->tipoValor;
            $objPuntoCompra->valor = $objPunto->valor;
            $objPuntoCompra->cantidadPuntos = self::calcularTotalPuntos($objPunto->tipoValor, $objPunto->valor, $monto);
            $listPuntosCompra[] = $objPuntoCompra;
        }
        
        return $listPuntosCompra;
    }

    private static function generarPuntosPorCedula(DateTime $fecha, $parametro) {
        if($parametro['valor'] < Yii::app()->params->clienteFiel['montoCompra']){
            return array();
        }
        
        $listPuntos = Puntos::model()->findAll(array(
            'with' => array('listPuntosParametro' => array('condition' => 'listPuntosParametro.valorParametro=:cedula')),
            'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
            'params' => array(
                ':tipo' => Yii::app()->params->puntos['cedula'],
                ':activo' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':cedula' => $parametro['identificacionUsuario']
            )
        ));
        
        $listPuntosCompra = array();
        
        foreach($listPuntos as $objPunto){
            $objPuntoCompra = new ComprasPuntos;
            $objPuntoCompra->idPunto = $objPunto->idPunto;
            $objPuntoCompra->codigoPunto = $objPunto->codigoPunto;
            //$objPuntoCompra->idCompra = $objCompra->idCompra;
            $objPuntoCompra->fechaInicio = $objPunto->fechaInicio;
            $objPuntoCompra->fechaFin = $objPunto->fechaFin;
            $objPuntoCompra->fechaCreacion = $objPunto->fechaCreacion;
            $objPuntoCompra->fechaActualizacion = $objPunto->fechaActualizacion;
            $objPuntoCompra->activo = $objPunto->activo;
            $objPuntoCompra->tipoValor = $objPunto->tipoValor;
            $objPuntoCompra->valor = $objPunto->valor;
            $objPuntoCompra->cantidadPuntos = self::calcularTotalPuntos($objPunto->tipoValor, $objPunto->valor, $parametro['valor']);
            $listPuntosCompra[] = $objPuntoCompra;
        }
        
        return $listPuntosCompra;
    }

    private static function generarPuntosPorRango($parametro) {
        if($parametro['valor'] < Yii::app()->params->clienteFiel['montoCompra']){
            return array();
        }
        
        $listPuntos = Puntos::model()->findAll(array(
            'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
            'params' => array(
                ':tipo' => Yii::app()->params->puntos['rango'],
                ':activo' => 1,
                ':fecha' => $parametro['fecha']->format('Y-m-d H:i:s')
            )
        ));
        
        $listPuntosCompra = array();
        
        foreach($listPuntos as $objPunto){
            $objPuntoCompra = new ComprasPuntos;
            $objPuntoCompra->idPunto = $objPunto->idPunto;
            $objPuntoCompra->codigoPunto = $objPunto->codigoPunto;
            //$objPuntoCompra->idCompra = $objCompra->idCompra;
            $objPuntoCompra->fechaInicio = $objPunto->fechaInicio;
            $objPuntoCompra->fechaFin = $objPunto->fechaFin;
            $objPuntoCompra->fechaCreacion = $objPunto->fechaCreacion;
            $objPuntoCompra->fechaActualizacion = $objPunto->fechaActualizacion;
            $objPuntoCompra->activo = $objPunto->activo;
            $objPuntoCompra->tipoValor = $objPunto->tipoValor;
            $objPuntoCompra->valor = $objPunto->valor;
            $objPuntoCompra->cantidadPuntos = self::calcularTotalPuntos($objPunto->tipoValor, $objPunto->valor, $parametro['valor']);
            $listPuntosCompra[] = $objPuntoCompra;
        }
        
        return $listPuntosCompra;
    }

    private static function generarPuntosPorCumpleanhos(DateTime $fecha, $parametro) {
        if($parametro['valor'] < Yii::app()->params->clienteFiel['montoCompra']){
            return array();
        }
        
        $fechaCumpleanho = $parametro['fechaNacimiento'];
        
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
            $listPuntos = Puntos::model()->findAll(array(
                'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
                'params' => array(
                    ':tipo' => Yii::app()->params->puntos['cumpleanhos'],
                    ':activo' => 1,
                    ':fecha' => $fecha->format('Y-m-d H:i:s')
                )
            ));
            
            $listPuntosCompra = array();

            foreach($listPuntos as $objPunto){
                $objPuntoCompra = new ComprasPuntos;
                $objPuntoCompra->idPunto = $objPunto->idPunto;
                $objPuntoCompra->codigoPunto = $objPunto->codigoPunto;
                //$objPuntoCompra->idCompra = $objCompra->idCompra;
                $objPuntoCompra->fechaInicio = $objPunto->fechaInicio;
                $objPuntoCompra->fechaFin = $objPunto->fechaFin;
                $objPuntoCompra->fechaCreacion = $objPunto->fechaCreacion;
                $objPuntoCompra->fechaActualizacion = $objPunto->fechaActualizacion;
                $objPuntoCompra->activo = $objPunto->activo;
                $objPuntoCompra->tipoValor = $objPunto->tipoValor;
                $objPuntoCompra->valor = $objPunto->valor;
                $objPuntoCompra->cantidadPuntos = self::calcularTotalPuntos($objPunto->tipoValor, $objPunto->valor, $parametro['valor']);
                $listPuntosCompra[] = $objPuntoCompra;
            }

            return $listPuntosCompra;
        } else {
            return array();
        }
    }

}
