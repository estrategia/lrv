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
 * @property integer $idOperador
 * @property integer $terceros
 * @property integer $unidades
 * @property integer $unidadesSuscripcion
 * @property integer $fracciones
 * @property integer $unidadesCedi
 * @property integer $codigoImpuesto
 * @property integer $idEstadoItem
 * @property integer $flete
 * @property integer $disponible
 * @property integer $idCombo
 * @property string $descripcionCombo
 * @property string $registroMedico
 *
 * The followings are the available model relations:
 * @property EstadoItem $objEstadoItem
 * @property Compras $objCompra
 * @property Medico $objMedico
 */
class ComprasItems extends CActiveRecord {

    private $estadoAnterior;
    public $filtroCallcenter;
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
            array('idCompra, precioBaseUnidad, precioBaseFraccion, descuentoUnidad, descuentoFraccion, precioTotalUnidad, precioTotalFraccion, idOperador, terceros, unidades, fracciones, unidadesCedi, unidadesSuscripcion, codigoImpuesto, idEstadoItem, flete, disponible, idCombo, descuentoSuscripcion, precioTotalSuscripcion, idEstadoItemTercero, codigoProveedor', 'numerical', 'integerOnly' => true),
            array('codigoProducto, idOperadorLogistico', 'length', 'max' => 10),
            array('codigoProducto, fechaEntregaInicial, fechaEntregaFinal', 'safe'),
            array('descripcion', 'length', 'max' => 200),
            array('presentacion, descripcionCombo, numeroGuia', 'length', 'max' => 100),
        	array('registroMedico', 'length', 'max'=>20),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idCompraItem, idCompra, codigoProducto, descripcion, descripcionCombo, presentacion, precioBaseUnidad, precioBaseFraccion, descuentoUnidad, descuentoFraccion, precioTotalUnidad, precioTotalFraccion, idOperador, terceros, unidades, fracciones, unidadesCedi, codigoImpuesto, idEstadoItem, flete, disponible, idCombo, registroMedico', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objProducto' => array(self::BELONGS_TO, 'Producto', 'codigoProducto'),
            'objCombo' => array(self::BELONGS_TO, 'Combo', 'idCombo'),
            'objImpuesto' => array(self::BELONGS_TO, 'Impuesto', 'codigoImpuesto'),
            'objCompra' => array(self::BELONGS_TO, 'Compras', 'idCompra'),
            'objOperador' => array(self::BELONGS_TO, 'Operador', 'idOperador'),
            'objEstadoItem' => array(self::BELONGS_TO, 'EstadoItem', 'idEstadoItem'),
            'listBeneficios' => array(self::HAS_MANY, 'BeneficiosComprasItems', 'idCompraItem'),

            'listBodegas' => array(self::HAS_MANY, 'ComprasUnidadesBodega', 'idCompraItem'),
            'objMedico' => array(self::BELONGS_TO, 'Medico', 'registroMedico'),

        	'operadorLogisticoTerceros' => array(self::BELONGS_TO, 'OperadorLogisticoTerceros', 'idOperadorLogistico'),
        	'estadoTercero' => array(self::BELONGS_TO, 'EstadosComprasItemsTerceros', 'idEstadoItemTercero'),

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
            'idOperador' => 'Codigo Operador',
            'terceros' => 'Terceros',
            'unidades' => 'Unidades',
            'fracciones' => 'Fracciones',
            'unidadesCedi' => 'Unidades Cedi',
            'unidadesSuscripcion' => 'Unidades Suscripcion',
            'codigoImpuesto' => 'Impuesto',
            'idEstadoItem' => 'Id Estado Item',
            'flete' => 'Flete',
            'disponible' => 'Disponible',
            'idCombo' => 'Id Combo',
            'descripcionCombo' => 'Sescripcion Combo',
            'registroMedico' => 'Registro Medico',
            'descuentoSuscripcion' => 'Descuento Suscripcion',
            'precioTotalSuscripcion' => 'Precio Unidad Suscripcion'
        );
    }

    public function afterFind() {
        $this->estadoAnterior = $this->idEstadoItemTercero;
        parent::afterFind();
    }

    public function afterSave() {
        if ($this->estadoAnterior != $this->idEstadoItemTercero) {
            if ($this->guardarTraza()) {
                $this->notificarCorreoCambioEstado();
            }
        }
        parent::afterSave();
    }

    private function guardarTraza()
    {
        $traza = new TrazaComprasItemsTerceros;
        $traza->idCompraItem = $this->idCompraItem;
        $traza->idEstadoItemTercero = $this->idEstadoItemTercero;
        $traza->fechaCreacion = date('Y-m-d H:i:s');
        return $traza->save();
    }

    private function notificarCorreoCambioEstado()
    {
        $asuntoCorreo = Yii::app()->params['asuntoTercero']['cambioEstadoCompraItem'];
        $contenidoCorreo = Yii::app()->controller->renderPartial(
            Yii::app()->params['rutasPlantillasCorreo']['cambioEstadoCompraItemTercero'], 
            array('item' => $this,), true, true);
        $compra = $this->objCompra;
        $correo = "";
        if ($compra->invitado == 0) {
            $correo = $compra->objUsuario->correoElectronico;
        } else {
            $direccion = ComprasDireccionesDespacho::find('t.idCompra = :idCompra', [':idCompra' => $this->idCompra]);
            $correo = $direccion->correoElectronico;
        }
        $htmlCorreo = PlantillaCorreo::getContenido('registroUsuarioTercero',$contenidoCorreo);
        
        try {
            sendHtmlEmail($correo, $asuntoCorreo, $htmlCorreo);
        } catch (Exception $ce) {
            Yii::log("Error enviando correo al cambiar estado item compra #$this->idCompraItem\n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
        }
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
        $criteria->compare('idOperador', $this->idOperador);
        $criteria->compare('terceros', $this->terceros);
        $criteria->compare('unidades', $this->unidades);
        $criteria->compare('fracciones', $this->fracciones);
        $criteria->compare('unidadesCedi', $this->unidadesCedi);
        $criteria->compare('codigoImpuesto', $this->codigoImpuesto);
        $criteria->compare('idEstadoItem', $this->idEstadoItem);
        $criteria->compare('flete', $this->flete);
        $criteria->compare('disponible', $this->disponible);
        $criteria->compare('idCombo', $this->idCombo);
        $criteria->compare('descripcionCombo', $this->descripcionCombo, true);
        $criteria->compare('registroMedico',$this->registroMedico,true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function searchTercerosCallcenter() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        $criteria->condition = 't.terceros = 1';
        $fechaActual = date('Y-m-d H:i:s');

        if ($this->filtroCallcenter == 1) {
            $criteria->condition .= ' AND t.idEstadoItemTercero = 2';
        }
        if ($this->filtroCallcenter == 2) {
            $criteria->condition .= ' AND t.idEstadoItemTercero <> 5';
            $criteria->condition .= " AND t.fechaEntregaFinal < '$fechaActual'";
        }
        if ($this->filtroCallcenter == 3) {
            $criteria->condition .= ' AND t.idEstadoItemTercero = 6';
        }
        // $criteria->compare('idCompra', $this->idCompra);
        $criteria->compare('codigoProducto', $this->codigoProducto, true);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('presentacion', $this->presentacion, true);
        // $criteria->compare('precioBaseUnidad', $this->precioBaseUnidad);
        // $criteria->compare('precioBaseFraccion', $this->precioBaseFraccion);
        // $criteria->compare('descuentoUnidad', $this->descuentoUnidad);
        // $criteria->compare('descuentoFraccion', $this->descuentoFraccion);
        // $criteria->compare('precioTotalUnidad', $this->precioTotalUnidad);
        // $criteria->compare('precioTotalFraccion', $this->precioTotalFraccion);
        // $criteria->compare('idOperador', $this->idOperador);
        // $criteria->compare('terceros', $this->terceros);
        // $criteria->compare('unidades', $this->unidades);
        // $criteria->compare('fracciones', $this->fracciones);
        // $criteria->compare('unidadesCedi', $this->unidadesCedi);
        // $criteria->compare('codigoImpuesto', $this->codigoImpuesto);
        // $criteria->compare('idEstadoItem', $this->idEstadoItem);
        // $criteria->compare('flete', $this->flete);
        // $criteria->compare('disponible', $this->disponible);
        // $criteria->compare('idCombo', $this->idCombo);
        // $criteria->compare('descripcionCombo', $this->descripcionCombo, true);
        // $criteria->compare('registroMedico',$this->registroMedico,true);

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

    public function getTotalUnidades() {
        $unidades = $this->unidades + $this->unidadesCedi + $this->unidadesSuscripcion;
        // $unidades = $this->unidades + $this->unidadesCedi;
        $fracciones = 0;

        if ($this->fracciones > 0) {
            $fracciones = round($this->objProducto->unidadFraccionamiento / $this->objProducto->numeroFracciones, 4);
            $fracciones = $fracciones * $this->fracciones;
        }

        return $unidades + $fracciones;
    }
    
    public function getPrecioUnidad($descuento = false){
        $precio = $this->precioBaseUnidad;
        
        if($descuento){
            $precio -= $this->descuentoUnidad;
        }
        
        return $precio;
    }

    public function modificarDescuento($descuento, $tipo, $idOperador) {
        $precioDiff  = 0;
        $descuentoAux = 0;
        
        if ($tipo == 1) {
            $precioDiff = ($this->descuentoUnidad - $descuento) * $this->unidades;
            $descuentoAux = $this->descuentoUnidad;
            $this->descuentoUnidad = $descuento;
        }else if ($tipo == 2) {
            $precioDiff = ($this->descuentoFraccion - $descuento) * $this->unidades;
            $descuentoAux = $this->descuentoFraccion;
            $this->descuentoFraccion = $descuento;
        }else{
            throw new Exception('Tipo de descuento inv&aacute;lido ');
        }
       
        $this->precioTotalUnidad += $precioDiff;
        $this->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['modificado'];
        $this->idOperador = $idOperador;

        $objCompra = $this->objCompra;
        $objCompra->subtotalCompra += $precioDiff;
        // $objCompra->subtotalCompra += $this->precioTotalSuscripcion;
        $objCompra->impuestosCompra += round(Precio::calcularImpuesto($precioDiff, $this->objImpuesto->porcentaje));
        $objCompra->baseImpuestosCompra += round(Precio::calcularBaseImpuesto($precioDiff, $this->objImpuesto->porcentaje));
        $objCompra->totalCompra += $precioDiff;
        // $objCompra->totalCompra += $this->precioTotalSuscripcion;

        $transaction = Yii::app()->db->beginTransaction();

        if (!$this->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error de actualización item: ' . $this->validateErrorsResponse());
        }

        if ($objCompra->totalCompra < 0) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Total compra no puede ser negativo');
        }

        if (!$objCompra->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error de actualización compra: ' . $objCompra->validateErrorsResponse());
        }
        
        $objModificion = new ModificacionesDescuentoItems;
        $objModificion->idOperador = $idOperador;
        $objModificion->idCompra = $this->idCompra;
        $objModificion->idCompraItem = $this->idCompraItem;
        $objModificion->codigoProducto = $this->codigoProducto;
        $objModificion->descuentoAnterior = $descuentoAux;
        $objModificion->descuentoNuevo = $descuento;
        $objModificion->tipoUnidad = $tipo;
        
        if (!$objModificion->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error al guardar traza: ' . $objModificion->validateErrorsResponse());
        }
        
        $transaction->commit();
    }

    public function actualizarUnidades($cantidad) {
        $sumaUnidades = $this->unidades + $this->unidadesSuscripcion;
        // $cantDiff = $cantidad - $this->unidades;
        $cantDiff = $cantidad - $sumaUnidades;
        //igual
        if ($cantDiff == 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Actualización exitosa.'));
            Yii::app()->end();
        }

        //aumentar --> verificar saldo
        if ($cantDiff > 0) {
            $objProducto = Producto::model()->find(array(
                'with' => array(
                    'listSaldos' => array('condition' => '(listSaldos.saldoUnidad>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                'params' => array(
                    ':activo' => 1,
                    ':codigo' => $this->codigoProducto,
                    ':saldo' => 0,
                    ':ciudad' => $this->objCompra->codigoCiudad,
                    ':sector' => $this->objCompra->codigoSector,
                ),
            ));

            if ($objProducto === null) {
                throw new Exception('Producto no disponible.');
            }

            $objSaldo = $objProducto->getSaldo($this->objCompra->codigoCiudad, $this->objCompra->codigoSector);

            if ($objSaldo === null) {
                throw new Exception("La cantidad solicitada no está disponible en este momento. No hay unidades disponibles");
            }

            if ($cantDiff > $objSaldo->saldoUnidad) {
                throw new Exception("La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades");
            }
        }
        
        $bonosProducto = FormasPago::model()->findAll(array(
        		'condition' => 'idCompra =:idCompra AND codigoProducto=:codigoProducto',
        		'params' => array(
        				':idCompra' => $this->idCompra,
        				':codigoProducto' => $this->codigoProducto
        		) 
        ));
        
        $bonoDescuento = 0;
        if(count($bonosProducto) > 0){
        	// Se aumentaron cantidades
        	foreach($bonosProducto as $objBono){
        		$objBono->valor  = $objBono->valorBonoUnidad * $cantidad;
        		$bonoDescuento += $objBono->valorBonoUnidad;
        		if(!$objBono->save()){
        			try {
        				$transaction->rollBack();
        			} catch (Exception $txexc) {
        				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
        			}
        		}
        	}	
        }
        Yii::log("cantDiff: $cantDiff", CLogger::LEVEL_INFO, 'error');

        
        $suscripcion = SuscripcionesProductosUsuario::model()->find(
            'identificacionUsuario=:identificacionUsuario AND idProducto=:idProducto',
            [':identificacionUsuario' => $this->objCompra->identificacionUsuario, ':idProducto' => $this->codigoProducto]
        );

        $cantidadMaximaSuscripcion = $suscripcion->cantidadDisponiblePeriodoActual;

        if ($cantidad > $cantidadMaximaSuscripcion) {
            $this->unidadesSuscripcion = $cantidadMaximaSuscripcion;
            $this->unidades = $cantidad - $this->unidadesSuscripcion;
        } 
        if ($cantidad <= $cantidadMaximaSuscripcion) {
            $this->unidadesSuscripcion = $cantidad;
            $this->unidades = 0;
        } 

        $precioSubTotal = ($this->precioBaseUnidad - $this->descuentoUnidad) * $this->unidades;
        $precioSubTotal += ($this->precioBaseUnidad - $this->descuentoSuscripcion) * $this->unidadesSuscripcion;
        
        // $precioTotal = $this->precioBaseUnidad - $this->descuentoUnidad ;
        // $precioDiff = $precioTotal * $cantDiff;
        // Yii::log("cantDiff: $precioDiff", CLogger::LEVEL_INFO, 'error');
        $this->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['modificado'];
        $this->idOperador = Yii::app()->controller->module->user->id;
        
        $objCompra = $this->objCompra;
        // $objCompra->subtotalCompra += $precioDiff;
        // $objCompra->subtotalCompra += $this->precioTotalSuscripcion;
        
        //    $precioDiff-= $cantDiff*$bonoDescuento;
        $objCompra->impuestosCompra = round(Precio::calcularImpuesto($precioSubTotal, $this->objImpuesto->porcentaje));
        $objCompra->baseImpuestosCompra = round(Precio::calcularBaseImpuesto($precioSubTotal, $this->objImpuesto->porcentaje));
        // $objCompra->totalCompra += $precioDiff;
        // $objCompra->otalCompra += $this->precioTotalSuscripcion;
        $objCompra->subtotalCompra = $precioSubTotal;
        // $objCompra->subtotalCompra = $precioSubTotal;
        
        if ($this->unidades + $this->fracciones == 0) {
            $objCompra->flete -= $this->flete;
        }

        $transaction = Yii::app()->db->beginTransaction();

        if (!$this->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error de actualización item: ' . $this->validateErrorsResponse());
        }

        if ($objCompra->totalCompra < 0) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Total compra no puede ser negativo');
        }

        if (!$objCompra->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error de actualización compra: ' . $objCompra->validateErrorsResponse());
        }
        $transaction->commit();
    }

    public function actualizarFracciones($cantidad) {
        $cantDiff = $cantidad - $this->fracciones;
        //igual
        if ($cantDiff == 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Actualización exitosa.'));
            Yii::app()->end();
        }

        //aumentar
        if ($cantDiff > 0) {
            $objProducto = Producto::model()->find(array(
                'with' => array(
                    'listSaldos' => array('condition' => '(listSaldos.saldoFraccion>:saldo AND listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoFraccion IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                    'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                    'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                ),
                'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                'params' => array(
                    ':activo' => 1,
                    ':codigo' => $this->codigoProducto,
                    ':saldo' => 0,
                    ':ciudad' => $this->objCompra->codigoCiudad,
                    ':sector' => $this->objCompra->codigoSector,
                ),
            ));

            if ($objProducto === null) {
                throw new Exception('Producto no disponible.');
            }

            $objSaldo = $objProducto->getSaldo($this->objCompra->codigoCiudad, $this->objCompra->codigoSector);

            if ($objSaldo === null) {
                throw new Exception("La cantidad solicitada no está disponible en este momento. No hay unidades disponibles");
            }

            if ($cantDiff > $objSaldo->saldoFraccion) {
                throw new Exception("La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoFraccion fracciones");
            }
        }

        $precioTotal = $this->precioBaseFraccion - $this->descuentoFraccion;
        $precioDiff = $precioTotal * $cantDiff;
        $this->fracciones += $cantDiff;
        $this->precioTotalFraccion += $precioDiff;
        $this->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['modificado'];
        $this->idOperador = Yii::app()->controller->module->user->id;

        $objCompra = $this->objCompra;
        $objCompra->subtotalCompra += $precioDiff;
        // $objCompra->subtotalCompra += $this->precioTotalSuscripcion;
        $objCompra->impuestosCompra += round(Precio::calcularImpuesto($precioDiff, $this->objImpuesto->porcentaje));
        $objCompra->baseImpuestosCompra += round(Precio::calcularBaseImpuesto($precioDiff, $this->objImpuesto->porcentaje));
        $objCompra->totalCompra += $precioDiff;
        // $objCompra->totalCompra += $this->precioTotalSuscripcion;

        if ($this->unidades + $this->fracciones == 0) {
            $objCompra->flete -= $this->flete;
        }

        $transaction = Yii::app()->db->beginTransaction();

        if (!$this->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error de actualización item: ' . $this->validateErrorsResponse());
        }

        if ($objCompra->totalCompra < 0) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Total compra no puede ser negativo');
        }
        if (!$objCompra->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error de actualización compra: ' . $objCompra->validateErrorsResponse());
        }
        $transaction->commit();
    }

    public function actualizarBodega($cantidad) {
        $cantDiff = $cantidad - $this->unidadesCedi;
        //igual
        if ($cantDiff == 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Actualización exitosa.'));
            Yii::app()->end();
        }
        $transaction = Yii::app()->db->beginTransaction();
        
        //aumentar
        if ($cantDiff > 0) {

        	$bodegas = $this->objCompra->getBodegas("ASC");
        	$sql = "SELECT sum(saldoUnidad)-($cantDiff) as saldoUnidades FROM t_ProductosSaldosCedi WHERE codigoProducto=$this->codigoProducto AND
        	codigoCedi IN (".implode(",", $bodegas).")";
        	$query = Yii::app()->db->createCommand($sql);
        	 
        	$objSaldoBodega = $query->queryRow();
        	
        	if ($objSaldoBodega['saldoUnidades'] < 0) {
        		echo CJSON::encode(array(
        				'result' => 'error',
        				'response' => "La cantidad solicitada no está disponible en este momento. No hay unidades disponibles",
        				//'response' => 'Cantidad no disponible para entrega ' . Yii::app()->shoppingCart->getDeliveryStored() . ' hrs'
        		));
        		Yii::app()->end();
        	}
        	
            if ($cantDiff > $objSaldoBodega['saldoUnidades']) {
                throw new Exception("La cantidad solicitada no está disponible en este momento. Saldos disponibles: ".$objSaldoBodega['saldoUnidades']." unidades");
            }
        }
        
        // Actualizar las unidades de las bodegas
        
        if($cantDiff > 0){
        	$bodegas = $this->objCompra->getBodegas("ASC");
        	// Tomar cantidades de las bodegas
        	$this->calculateUnidadesBodega($bodegas,$cantDiff);
        }else if($cantDiff < 0){
        	$bodegas = $this->objCompra->getBodegas("DESC");
        	// Devolver cantidades de las bodegas
        	$this->restarUnidadesBodega($bodegas,$cantDiff);
        	
        }

        $precioTotal = $this->precioBaseUnidad - $this->descuentoUnidad;
        $precioDiff = $precioTotal * $cantDiff;
        $this->unidadesCedi += $cantDiff;
        $this->precioTotalUnidad += $precioDiff;
        $this->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['modificado'];
        $this->idOperador = Yii::app()->controller->module->user->id;

        $objCompra = $this->objCompra;
        $objCompra->subtotalCompra += $precioDiff;
        // $objCompra->subtotalCompra += $this->precioTotalSuscripcion;
        $objCompra->impuestosCompra += round(Precio::calcularImpuesto($precioDiff, $this->objImpuesto->porcentaje));
        $objCompra->baseImpuestosCompra += round(Precio::calcularBaseImpuesto($precioDiff, $this->objImpuesto->porcentaje));
        $objCompra->totalCompra += $precioDiff;
        // $objCompra->totalCompra += $this->precioTotalSuscripcion;

        $fleteDiff = $this->objCompra->getValorFlete()- $this->objCompra->flete;
        $objCompra->flete = $this->objCompra->getValorFlete();
        $objCompra->totalCompra += $fleteDiff;
       

        if (!$this->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error de actualización item: ' . $this->validateErrorsResponse());
        }
        if ($objCompra->totalCompra < 0) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Total compra no puede ser negativo');
        }
        if (!$objCompra->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error de actualización compra: ' . $objCompra->validateErrorsResponse());
        }
        $transaction->commit();
    }
    
    
    
    public function calculateUnidadesBodega($bodegas, $cantidad){
    	 

    	$cantidadesBodega = array();
    	 
    	$listSaldosCedi = ProductosSaldosCedi::model()->findAll( array(
    			'condition' => 'codigoProducto =:codigoProducto AND codigoCedi IN ('.implode(",",$bodegas).') ',
    			'params' => array(
    					'codigoProducto' => $this->objProducto->codigoProducto
    			),
    			'order' => 'field(codigoCedi,'. implode(",", $bodegas).' )'
    	));
    
    	$i = 0;
    	do {
    		$saldoBodega = $listSaldosCedi[$i];
    		$unidadesBodega = 0;
    		
    		if($saldoBodega->saldoUnidad > 0){
	    		if($cantidad > $saldoBodega->saldoUnidad){
	    			$unidadesBodega = $saldoBodega->saldoUnidad;
	    		}else{
	    			$unidadesBodega = $cantidad;
	    		}
	    		 
	    		$cantidad -=$unidadesBodega;
	    		 
	    		$cantidadesBodega[$saldoBodega->codigoCedi] = $unidadesBodega;
	    		
	    		$saldoBodega->saldoUnidad -=$unidadesBodega;
	    		
	    	
	    		if(!$saldoBodega->save()){
	    			throw new Exception('Error de actualización compra: ' . $saldoBodega->validateErrorsResponse());
	    		}
	    		
	    		$objUnidadesBodega = ComprasUnidadesBodega::model()->find( array(
	    				'condition' => 'idCompraItem =:idCompraItem AND idBodega =:idBodega ',
	    				'params' => array(
	    						'idCompraItem' => $this->idCompraItem,
	    						'idBodega' => $saldoBodega->codigoCedi
	    				),
	    		));
	    		
	    		if(!$objUnidadesBodega){
	    			$objUnidadesBodega = new ComprasUnidadesBodega();
	    			$objUnidadesBodega->codigoProducto = $this->codigoProducto;
	    			$objUnidadesBodega->idCompraItem = $this->idCompraItem;
	    			$objUnidadesBodega->idCompra = $this->idCompra;
	    			$objUnidadesBodega->idBodega = $saldoBodega->codigoCedi;
	    			$objUnidadesBodega->cantidad = 0;
	    		}
	    		
	    		$objUnidadesBodega->cantidad += $unidadesBodega;
	    		
	    		if(!$objUnidadesBodega->save()){
            		throw new Exception('Error de actualización compra: ' . implode(",",$objUnidadesBodega->getErrors()));
	    		}
	    		
	    	//	$volumenBodegas[$saldoBodega->codigoCedi] = $unidadesBodega * $volumetria;
    		}
    		$i++;
    	} while ( $cantidad > 0 );
    	 
    	return  $cantidadesBodega;
    }
    
    public function restarUnidadesBodega($bodegas, $cantidad){
    	$cantidadesBodega = array();
    	$cantidad = abs($cantidad);
    	$listVentaCedi = ComprasUnidadesBodega::model()->findAll( array(
    			'condition' => 'idCompraItem =:idCompraItem AND idBodega IN ('.implode(",",$bodegas).') ',
    			'params' => array(
    					'idCompraItem' => $this->idCompraItem
    			),
    			'order' => 'field(idBodega,'. implode(",", $bodegas).' )'
    	));
    	
    	$i = 0;
    	do {
    		$unidadesCedi = $listVentaCedi[$i];
    		$unidadesBodega = 0;
    		$cantidadesSubstraidas = 0;
    		
    		if($cantidad > $unidadesCedi->cantidad){
    			$cantidad -= $unidadesCedi->cantidad;
    			$cantidadesSubstraidas = $unidadesCedi->cantidad;
    			$unidadesCedi->cantidad = 0;
    			
    		}else if($cantidad <= $unidadesCedi->cantidad){
    			$unidadesCedi->cantidad -= $cantidad;
    			$cantidadesSubstraidas = $cantidad;
    			$cantidad = 0;
    			
    		}
    		
    		if(!$unidadesCedi->save()) {
            	throw new Exception('Error de actualización compra: ' . $unidadesCedi->validateErrorsResponse());
	    	};
    		
    		$saldoCedi = ProductosSaldosCedi::model()->find(array(
    				'condition' => 'codigoProducto =:codigoProducto AND codigoCedi =:codigoCedi',
    				'params' => array(
    						':codigoProducto' => $unidadesCedi->codigoProducto,
    						':codigoCedi' => $unidadesCedi->idBodega,
    				)
    		));
    		
    		if($unidadesCedi->cantidad < 0){
    			$unidadesCedi->delete();
    		}
    		    
    		$saldoCedi->saldoUnidad += $cantidadesSubstraidas;
    		
    		if(!$saldoCedi->save()){
            	throw new Exception('Error de actualización compra: ' . $saldoCedi->validateErrorsResponse());
	    	}
    		$i++;
    	} while ( $cantidad > 0 );
    	
    	return  $cantidadesBodega;
    }
    

}
