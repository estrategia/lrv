<?php

/**
 * This is the model class for table "t_Compras".
 *
 * The followings are the available columns in table 't_Compras':
 * @property integer $idCompra
 * @property string $identificacionUsuario
 * @property string $documentoCruce
 * @property string $fechaCompra
 * @property string $fechaEntrega
 * @property string $tipoEntrega
 * @property integer $donacionFundacion
 * @property string $idComercial
 * @property integer $subtotalCompra
 * @property integer $impuestosCompra
 * @property integer $baseImpuestosCompra
 * @property integer $totalCompra
 * @property integer $idEstadoCompra
 * @property integer $idOperador
 * @property string $observacion
 * @property integer $idTipoVenta
 * @property integer $activa
 * @property integer $domicilio
 * @property integer $flete
 * @property integer $invitado
 * @property integer $codigoPerfil
 * @property string $saldosPdv
 * @property integer $seguimiento
 * @property string $codigoCiudad
 * @property string $codigoSector
 * @property integer $tiempoDomicilioCedi
 * @property integer $valorDomicilioCedi
 * @property integer $codigoCedi
 *
 * The followings are the available model relations:
 * @property SectorCiudad $objSectorCiudad
 * @property Ciudad $objCiudad
 * @property Sector $objSector
 * @property ComprasItems[] $listItems
 * @property PuntoVenta $objPuntoVenta
 * 
 * @property Estadocompra $objEstadoCompra
 * @property TipoVenta $objTipoVenta
 * @property Operador $objOperador
 * @property TComprasObs[] $tComprasObs
 */
class Compras extends CActiveRecord {

    public $busquedaSearch;
    public $tiempoRestante;
    private $_fechaCompraDate;
    private $_fechaEntregaDate;

    public function getfechaCompraDate() {
        return $this->_fechaCompraDate;
    }

    public function getfechaEntregaDate() {
        return $this->_fechaEntregaDate;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 't_Compras';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipoEntrega, codigoCiudad, codigoSector', 'required'),
            array('donacionFundacion, subtotalCompra, impuestosCompra, baseImpuestosCompra, totalCompra, idEstadoCompra, idOperador, idTipoVenta, activa, domicilio, flete, invitado, codigoPerfil, seguimiento, tiempoDomicilioCedi, valorDomicilioCedi, codigoCedi', 'numerical', 'integerOnly' => true),
            array('identificacionUsuario', 'length', 'max' => 100),
            array('idComercial', 'length', 'max' => 10),
            array('documentoCruce', 'length', 'max' => 8),
            array('tipoEntrega', 'length', 'max' => 20),
            array('observacion', 'length', 'max' => 250),
            array('codigoCiudad, codigoSector', 'length', 'max' => 10),
            array('fechaCompra, fechaEntrega, saldosPdv', 'safe'),
            array('identificacionUsuario', 'default', 'value' => null),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('busquedaSearch, formaPagoSearch, idCompra, identificacionUsuario, documentoCruce, fechaCompra, fechaEntrega, tipoEntrega, donacionFundacion, idComercial, subtotalCompra, impuestosCompra, baseImpuestosCompra, totalCompra, idEstadoCompra, idOperador, observacion, idTipoVenta, activa, domicilio, flete, invitado, codigoPerfil, saldosPdv, seguimiento, codigoCiudad, codigoSector, tiempoDomicilioCedi, valorDomicilioCedi, codigoCedi', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'objSectorCiudad' => array(self::BELONGS_TO, 'SectorCiudad', array('codigoCiudad', 'codigoSector')),
            'objCiudad' => array(self::BELONGS_TO, 'Ciudad', 'codigoCiudad'),
            'objSector' => array(self::BELONGS_TO, 'Sector', 'codigoSector'),
            'listItems' => array(self::HAS_MANY, 'ComprasItems', 'idCompra'),
            'objPuntoVenta' => array(self::BELONGS_TO, 'PuntoVenta', '', 'on' => 't.idComercial=objPuntoVenta.idComercial'),
            'objCompraDireccion' => array(self::HAS_ONE, 'ComprasDireccionesDespacho', 'idCompra'),
            'objFormaPagoCompra' => array(self::HAS_ONE, 'FormasPago', 'idCompra'),
        	'listFormaPagoCompra' => array(self::HAS_MANY, 'FormasPago', 'idCompra'),
            'objUsuario' => array(self::BELONGS_TO, 'Usuario', 'identificacionUsuario'),
            'objPerfil' => array(self::BELONGS_TO, 'Perfil', 'codigoPerfil'),
            'objTipoVenta' => array(self::BELONGS_TO, 'TipoVenta', 'idTipoVenta'),
            'objOperador' => array(self::BELONGS_TO, 'Operador', 'idOperador'),
            //'objEstadoOperador' => array(self::BELONGS_TO, 'CompraEstadoOperador', 'idCompraEstadoOperador'),
            'objEstadoCompra' => array(self::BELONGS_TO, 'EstadoCompra', 'idEstadoCompra'),
            'listObservaciones' => array(self::HAS_MANY, 'ComprasObservaciones', 'idCompra'),
            'objPasarelaEnvio' => array(self::HAS_ONE, 'PasarelaEnvios', 'idCompra'),
            'listPasarelaRespuestas' => array(self::HAS_MANY, 'PasarelaRespuestas', 'idCompra'),
            'listFormulas' => array(self::HAS_MANY, 'FormulasMedicas', 'idCompra'),
        	'objComprasRemitente' => array(self::HAS_ONE, 'ComprasRemitente', 'idCompra'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idCompra' => 'Id Compra',
            'identificacionUsuario' => 'Identificacion Usuario',
            'documentoCruce' => 'Documento Cruce',
            'fechaCompra' => 'Fecha Compra',
            'fechaEntrega' => 'Fecha Entrega',
            'tipoEntrega' => 'Tipo Entrega',
            'donacionFundacion' => 'Donacion Fundacion',
            'idComercial' => 'Id Comercial',
            'subtotalCompra' => 'Subtotal Compra',
            'impuestosCompra' => 'Impuestos Compra',
            'baseImpuestosCompra' => 'Base Impuestos',
            'totalCompra' => 'Total Compra',
            'idEstadoCompra' => 'Estado',
            'idOperador' => 'Operador',
            'observacion' => 'Observacion',
            'idTipoVenta' => 'Id Tipo Venta',
            'activa' => 'Activa',
            'domicilio' => 'Domicilio',
            'flete' => 'Flete',
            'invitado' => 'Invitado',
            'codigoPerfil' => 'Codigo Perfil',
            'saldosPdv' => 'Saldos Pdv',
            'seguimiento' => 'Seguimiento',
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
        $criteria = new CDbCriteria;
        $criteria->with = array("objOperador", "objCiudad", "objTipoVenta", "objUsuario", "objCompraDireccion", "objFormaPagoCompra" => array("with" => "objFormaPago"), "objEstadoCompra");
        if ($params != null && isset($params['operadorPedido'])) {
            $condition = "1=1";
            $paramsCondition = array();

            if (isset($params['formaPago'])) {
                $condition .= " AND objFormaPagoCompra.idFormaPago=:formaPago";
                $paramsCondition[':formaPago'] = $params['formaPago'];
            }

            if ($this->fechaCompra !== null && !empty($this->fechaCompra)) {
                $condition .= " AND t.fechaCompra>=:fecha";
                $paramsCondition[':fecha'] = $this->fechaCompra;
            }

            if ($this->tipoEntrega !== null && !empty($this->tipoEntrega)) {
                $condition .= " AND t.tipoEntrega=:tipoEntrega";
                $paramsCondition[':tipoEntrega'] = $this->tipoEntrega;
            }

            if ($this->seguimiento !== null) {
                $condition .= " AND t.seguimiento=:seguimiento";
                $paramsCondition[':seguimiento'] = $this->seguimiento;
            }

            if ($this->codigoSector !== null && $this->codigoCiudad !== null) {
                $condition .= " AND t.codigoSector=:codigoSector AND t.codigoCiudad=:codigoCiudad";
                $paramsCondition[':codigoSector'] = $this->codigoSector;
                $paramsCondition[':codigoCiudad'] = $this->codigoCiudad;
            }

            if ($this->idEstadoCompra == Yii::app()->params->callcenter['estadoCompra']['estado']['pendiente']) {
                $fecha1 = new DateTime;
                $fecha1->modify('+90 minutes');

                $fecha2 = new DateTime;
                $fecha2->modify('+120 minutes');

                $condition .= " AND (t.idEstadoCompra=:estadoCompra OR (t.seguimiento=1 AND t.fechaEntrega BETWEEN '" . $fecha1->format('Y-m-d H:i:s') . "' AND '" . $fecha2->format('Y-m-d H:i:s') . "'))";
            } else {

                if (($this->idEstadoCompra !== null && !empty($this->idEstadoCompra))) {

                    $condition .= " AND t.idEstadoCompra=:estadoCompra";
                }
            }
            if (($this->idEstadoCompra !== null && !empty($this->idEstadoCompra))) {
                $paramsCondition[':estadoCompra'] = $this->idEstadoCompra;
            }

            $criteria->condition = $condition;
            $criteria->params = $paramsCondition;
        } else {
            $criteria->compare('t.idCompra', $this->idCompra);
            $criteria->compare('t.identificacionUsuario', $this->identificacionUsuario);
            $criteria->compare('t.documentoCruce', $this->documentoCruce, true);
            $criteria->compare('t.fechaCompra', $this->fechaCompra, true);

            $criteria->compare('t.fechaEntrega', $this->fechaEntrega, true);
            $criteria->compare('t.tipoEntrega', $this->tipoEntrega);
            $criteria->compare('t.donacionFundacion', $this->donacionFundacion);
            $criteria->compare('t.idComercial', $this->idComercial);
            $criteria->compare('t.subtotalCompra', $this->subtotalCompra);
            $criteria->compare('t.impuestosCompra', $this->impuestosCompra);
            $criteria->compare('t.baseImpuestosCompra', $this->baseImpuestosCompra);
            $criteria->compare('t.totalCompra', $this->totalCompra);
            $criteria->compare('t.idEstadoCompra', $this->idEstadoCompra);
            $criteria->compare('t.idOperador', $this->idOperador);
            $criteria->compare('t.observacion', $this->observacion, true);
            $criteria->compare('t.idTipoVenta', $this->idTipoVenta);
            $criteria->compare('t.activa', $this->activa);
            $criteria->compare('t.domicilio', $this->domicilio);
            $criteria->compare('t.flete', $this->flete);
            $criteria->compare('t.invitado', $this->invitado);
            $criteria->compare('t.codigoPerfil', $this->codigoPerfil);
            $criteria->compare('t.saldosPdv', $this->saldosPdv, true);
            $criteria->compare('t.seguimiento', $this->seguimiento);
            $criteria->compare('t.codigoCiudad', $this->codigoCiudad);
            $criteria->compare('t.codigoSector', $this->codigoSector);
            $criteria->compare('t.tiempoDomicilioCedi', $this->tiempoDomicilioCedi);
            $criteria->compare('t.valorDomicilioCedi', $this->valorDomicilioCedi);
            $criteria->compare('t.codigoCedi', $this->codigoCedi);
        }

        if ($params === null) {
            return new CActiveDataProvider($this, array(
                'criteria' => $criteria,
            ));
        }

        if (isset($params['order'])) {
            $criteria->order = $params['order'];
        }
        
        if(isset($params['select'])){
        	$criteria->select = $params['select'];
        }

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => isset($params['pageSize']) ? $params['pageSize'] : 50,
            ),
        ));
    }

    public function searchAnteriores() {
        $criteria = new CDbCriteria;
        $criteria->with = array("objCompraDireccion", "objCiudad", "objSector", "objPuntoVenta");
        
        if($this->idTipoVenta == Yii::app()->params->tipoVenta['telefarma']){
            $criteria->condition = "t.identificacionUsuario IS NULL AND t.invitado=:invitado AND t.idTipoVenta=:tipoventa AND objCompraDireccion.identificacionUsuario=:usuario";
            $criteria->params = array(
                ':invitado' => 1,
                ':usuario' => $this->identificacionUsuario,
                ':tipoventa' => Yii::app()->params->tipoVenta['telefarma'],
            );
        }else{
            $criteria->condition = "t.tipoEntrega=:tipoEntrega AND t.identificacionUsuario=:usuario AND t.identificacionUsuario IS NOT NULL AND t.idComercial IS NOT NULL";
            $criteria->params = array(
                ':usuario' => $this->identificacionUsuario,
                ':tipoEntrega' => $this->tipoEntrega,
            );
        }

        $criteria->order = 't.fechaCompra DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => false,
        ));
    }

    public function searchBusqueda($form) {
        $criteria = new CDbCriteria;
        $criteria->with = "objUsuario";
        //    $condition = "t.tipoEntrega=:tipoEntrega";
        //    $params = array(':tipoEntrega' => Yii::app()->params->entrega["tipo"]['domicilio']);
        $condition = "true ";
        $params = array();
        if ($form['tipo'] == 'criterio') {
        	
        	/************** mejorar como trabajarla *********************************************/
        	if(strlen(trim($form['valorCriterio'])) < 3){
        		$condition .= " AND false";
        	}
            else if ($form['criterio'] == 1) {
                $nombre = trim($form['valorCriterio']);
                if (!empty($nombre)) {
                    $condition .= " AND (objUsuario.nombre LIKE :nombre OR objUsuario.apellido LIKE :nombre)";
                    $params[':nombre'] = $form['valorCriterio'];
                }
            } else if ($form['criterio'] == 2) {
                $identificacion = trim($form['valorCriterio']);
                $condition .= " AND t.identificacionUsuario=:usuario";
                $params[':usuario'] = $identificacion;
            } else if ($form['criterio'] == 3) {
                $compra = trim($form['valorCriterio']);
                $condition .= " AND t.idCompra=:compra";
                $params[':compra'] = $compra;
            } else if ($form['criterio'] == 4) {
                $pdv = trim($form['valorCriterio']);
                $condition .= " AND t.idComercial=:pdv";
                $params[':pdv'] = $pdv;
            }
        } else if ($form['tipo'] == 'operador') {
            $condition .= " AND idOperador=:operador AND idEstadoCompra=:estado";
            $params[':operador'] = trim($form['operador']);
            $params[':estado'] = trim($form['estado']);
        } else if ($form['tipo'] == 'estado') {
            $condition .= " AND idEstadoCompra=:estado";
            $params[':estado'] = trim($form['estado']);
        }

        $criteria->condition = $condition;
        $criteria->params = $params;
        $criteria->order = 't.fechaCompra DESC';

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Compras the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /*
     * @return CActiveRecord registro que se guarda en base de datos
     */

    public function beforeSave() {
        if ($this->isNewRecord) {
            //$this->fechaCompra = new CDbExpression('NOW()');
            $this->fechaCompra = date('Y-m-d H:i:s');
            $this->seguimiento = 0;
            if($this->codigoVendedor == null){
                $this->codigoVendedor = 0;
            }
        }

        if (!$this->isNewRecord) {
            if ($this->objFormaPagoCompra != null) {
            	$formasPago = FormasPago::model()->findAll('idCompra =:idcompra', array(':idcompra' => $this->idCompra));
            	$val = 0;
            	for($i = 1;$i < count($formasPago);$i++){
            		$val += $formasPago[$i]->valor;
            	}
                if ($this->objFormaPagoCompra->idFormaPago != Yii::app()->params->formaPago['pasarela']['idPasarela']) {
                    
                	$this->objFormaPagoCompra->valor = $this->totalCompra-$val;

                    if (!$this->objFormaPagoCompra->save()) {
                        throw new Exception('Error de actualización forma pago: ' . $this->objFormaPagoCompra->validateErrorsResponse());
                    }
                }
            }
        }

        return parent::beforeSave();
    }

    public function afterFind() {
        $this->_fechaCompraDate = DateTime::createFromFormat('Y-m-d H:i:s', $this->fechaCompra);
        $this->_fechaEntregaDate = DateTime::createFromFormat('Y-m-d H:i:s', $this->fechaEntrega);
        return parent::afterFind();
    }

    public function afterSave() {
        $this->_fechaCompraDate = DateTime::createFromFormat('Y-m-d H:i:s', $this->fechaCompra);
        $this->_fechaEntregaDate = DateTime::createFromFormat('Y-m-d H:i:s', $this->fechaEntrega);

        if ($this->isNewRecord) {
            $this->verificarBloqueoUsuario();
        }

        return parent::afterSave();
    }

    /*
     * 
     */
    public function verificarBloqueoUsuario() {
        if ($this->invitado == 0 && !empty($this->identificacionUsuario)) {
            $objUsuario = Usuario::model()->find(array(
                'with' => array('objUsuarioExtendida', 'objPerfil'),
                'condition' => 't.identificacionUsuario=:cedula',
                'params' => array(
                    ':cedula' => $this->identificacionUsuario
                )
            ));
            
            if($objUsuario!==null ){
            	
            	$bloqueoCuenta = BloqueoCuenta::model()->find(array(
            			'condition' =>  'perfil =:perfil',
            			'params' => array(
            					':perfil' => $objUsuario->codigoPerfil
            			)
            	));
            	
            	
            	if($bloqueoCuenta != null){
	                try{
	                    $anho = $this->fechaCompraDate->format('Y');
	                    $mes = $this->fechaCompraDate->format('n');
	
	                    // Usuario desbloqueado en este mes ?
	                    $usuarioDesbloqueado = BloqueosUsuarios::model()->find(array(
	                    		'condition' => 'identificacionUsuario=:usuario AND YEAR(fechaDesbloqueo)=:anho AND MONTH(fechaDesbloqueo)=:mes',
	                    		'params' => array(
	                    				':usuario' => $this->identificacionUsuario,
	                    				':anho' => $anho,
	                    				':mes' => $mes,
	                    		)
	                    ));
	                    
	                    if($usuarioDesbloqueado == null){
		                    //consultar si ya tenia compras bloqueadas
		                    $sql = "select max(idCompra) idCompra "
		                            . "from t_BloqueosUsuarios bu "
		                            . "join t_ComprasBloqueoUsuarios cbu on bu.idBloqueoUsuario=cbu.idBloqueoUsuario "
		                            . "where bu.estado=:desbloqueado AND bu.identificacionUsuario=:usuario and anho=:anho and mes=:mes";
		
		                    $command = Yii::app()->db->createCommand();
		                    $command->text = $sql;
		                    $command->bindValue(':desbloqueado', BloqueosUsuarios::ESTADO_DESBLOQUEADO, PDO::PARAM_INT);
		                    $command->bindValue(':usuario', $this->identificacionUsuario, PDO::PARAM_STR);
		                    $command->bindValue(':anho', $anho, PDO::PARAM_INT);
		                    $command->bindValue(':mes', $mes, PDO::PARAM_INT);
		                    $idCompra = $command->queryScalar();
		
		                    
		                    $condition = "identificacionUsuario=:usuario AND YEAR(fechaCompra)=:anho AND MONTH(fechaCompra)=:mes";
		                    $params = array(':usuario' => $this->identificacionUsuario, ':anho' => $anho, ':mes' => $mes);
		
		                    if ($idCompra != null) {
		                        $condition .=" AND idCompra>:idCompra";
		                        $params[':idCompra'] = $idCompra;
		                    }
		
		                    //consultar compras para evaluar comportamiento
		                    $listCompras = self::model()->findAll(array(
		                        'condition' => $condition,
		                        'params' => $params
		                    ));
		
		                    $cantidadCompras = 0;
		                    $acumuladoCompras = 0;
		                    $limiteCantidad = $bloqueoCuenta->cantidadCompras;
		                    $limiteAcumulado = $bloqueoCuenta->acumuladoCompras;
		
		                    $arrValoresInsertar = array();
		                    foreach($listCompras as $objCompra){
		                        $cantidadCompras++;
		                        $acumuladoCompras += $objCompra->totalCompra;
		                        $arrValoresInsertar[] = "(:idBloqueoUsuario,$objCompra->idCompra)";
		                    }
		
		                    //si comportamiento de compra excede los limites establecidos se procede con bloqueo de usuario
		                    if( $cantidadCompras>0 && (($limiteCantidad>0 && $cantidadCompras>$limiteCantidad) || ($limiteAcumulado>0 && $acumuladoCompras>$limiteAcumulado)) ){
		                        $objUsuario->activo=Usuario::ESTADO_BLOQUEADO;
		                        
		                        if(isset(Yii::app()->session[Yii::app()->params->usuario['sesion']]) && Yii::app()->session[Yii::app()->params->usuario['sesion']] instanceof Usuario){
		                            Yii::app()->session[Yii::app()->params->usuario['sesion']] = $objUsuario;
		                        }
		
		                        $objBloqueoUsuario = new BloqueosUsuarios;
		                        $objBloqueoUsuario->identificacionUsuario = $this->identificacionUsuario;
		                        $objBloqueoUsuario->numeroCompras = $cantidadCompras;
		                        $objBloqueoUsuario->acumuladoCompras = $acumuladoCompras;
		                        $objBloqueoUsuario->anho = $anho;
		                        $objBloqueoUsuario->mes = $mes;
		                        $objBloqueoUsuario->estado = BloqueosUsuarios::ESTADO_BLOQUEADO;
		                        $fechaHoy = date('Y-m-d H:i:s');
		                        $objBloqueoUsuario->fechaRegistro = $fechaHoy;
		                        $objBloqueoUsuario->fechaActualizacion = $fechaHoy;
		
		                        if($objBloqueoUsuario->save()){
		                            //$rowsInactivacion = Yii::app()->db->createCommand("UPDATE m_Usuario SET activo=:activo WHERE identificacionUsuario=:usuario")->bindValue(':activo', Usuario::ESTADO_BLOQUEADO, PDO::PARAM_INT)->bindValue(':usuario', $this->identificacionUsuario, PDO::PARAM_STR)->execute();
		                            //$rowsInactivacion>0
		                            if($objUsuario->save()){
		                                $contenidoCorreo = Yii::app()->controller->renderPartial(Yii::app()->params->rutasPlantillasCorreo['correoBloqueo'], array('objUsuario' => $objUsuario), true);
                                        
		                                $htmlCorreo = PlantillaCorreo::getContenido('finCompra', $contenidoCorreo);
		                                
		                                try{
		                                    sendHtmlEmail($objUsuario->correoElectronico, "La Rebaja Virtual: Bloqueo de cuenta", $htmlCorreo,Yii::app()->params->callcenter['correo']);
		                                }  catch (Exception $exc){}
		
		                                $sqlBloqueoCompra = "INSERT INTO t_ComprasBloqueoUsuarios (idBloqueoUsuario,idCompra) VALUES " . implode(",",$arrValoresInsertar);
		                                $command = Yii::app()->db->createCommand($sqlBloqueoCompra);
		                                $command->bindValue(':idBloqueoUsuario', $objBloqueoUsuario->idBloqueoUsuario, PDO::PARAM_INT);
		                                $rowsBloqueoCompra = $command->execute();
		
		                                if($rowsBloqueoCompra<=0){
		                                    Yii::log("Compras::verificarBloqueoUsuario - Error al guardar compras de bloqueo de usuario: \n". CVarDumper::dumpAsString($objBloqueoUsuario->attributes) . "\nCompras:\n" . CVarDumper::dumpAsString($arrValoresInsertar) . "\nErrores:\n" . CVarDumper::dumpAsString($objBloqueoUsuario->validateErrorsResponse()) ,CLogger::LEVEL_INFO, 'bloqueo_usuario');
		                                }
		                            }else{
		                                Yii::log("Compras::verificarBloqueoUsuario - Error al inactivar usuario: \n". CVarDumper::dumpAsString($objUsuario->validateErrorsResponse()) . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes) . "\nCompras:\n" . CVarDumper::dumpAsString($arrValoresInsertar) ,CLogger::LEVEL_INFO, 'bloqueo_usuario');
		                            }
		                        }else{
		                            Yii::log("Compras::verificarBloqueoUsuario - Error al guardar bloqueo de usuario: \n". CVarDumper::dumpAsString($objBloqueoUsuario->attributes) . "\nCompras:\n" . CVarDumper::dumpAsString($arrValoresInsertar) . "\nErrores:\n" . CVarDumper::dumpAsString($objBloqueoUsuario->validateErrorsResponse()) ,CLogger::LEVEL_INFO, 'bloqueo_usuario');
		                        }
		                    }else{
		                        //Yii::log("Compras::verificarBloqueoUsuario - PRUEBA 100" ,CLogger::LEVEL_INFO, 'bloqueo_usuario');
		                    }
	                    }
	                }catch(Exception $exc){
	                    Yii::log("Compras::verificarBloqueoUsuario - Exception para compra [$this->idCompra]:\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() ,CLogger::LEVEL_INFO, 'bloqueo_usuario');
	                }
            	}
            }
        }
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

    public function actualizarCombo($combo, $cantidad) {
        $listItems = ComprasItems::model()->findAll(array(
            'condition' => 'idCompra=:compra AND idCombo=:combo',
            'params' => array(
                ':compra' => $this->idCompra,
                ':combo' => $combo
            )
        ));

        if (empty($listItems)) {
            throw new Exception('Combos de compra no existentes.');
        }

        $cantDiff = $cantidad - $listItems[0]->unidades;

        //igual
        if ($cantDiff == 0) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Actualización exitosa.'));
            Yii::app()->end();
        }

        if ($cantDiff > 0) {
            $objCombo = Combo::model()->find(array(
                'with' => array('listComboSectorCiudad'),
                'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                'params' => array(
                    ':combo' => $combo,
                    ':estado' => 1,
                    ':saldo' => 0,
                    ':ciudad' => $this->codigoCiudad,
                    ':sector' => $this->codigoSector,
                )
            ));

            if ($objCombo === null) {
                throw new Exception("La cantidad solicitada no está disponible en este momento. No hay unidades disponibles");
            }

            $objSaldo = $objCombo->getSaldo($this->codigoCiudad, $this->codigoSector);

            if ($objSaldo === null) {
                throw new Exception("La cantidad solicitada no está disponible en este momento. No hay unidades disponibles");
            }

            if ($cantDiff > $objSaldo->saldo) {
                throw new Exception("La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldo unidades");
            }
        }

        $transaction = Yii::app()->db->beginTransaction();

        foreach ($listItems as $objItem) {
            $precioTotal = $objItem->precioBaseUnidad - $objItem->descuentoUnidad;
            $precioDiff = $precioTotal * $cantDiff;

            $objItem->unidades += $cantDiff;
            $objItem->precioTotalUnidad += $precioDiff;
            $objItem->idEstadoItem = Yii::app()->params->callcenter['estadoItem']['estado']['modificado'];
            $objItem->idOperador = Yii::app()->controller->module->user->id;

            $this->subtotalCompra += $precioDiff;
            $this->totalCompra += $precioDiff;

            if (!$objItem->save()) {
                try {
                    $transaction->rollBack();
                } catch (Exception $txexc) {
                    Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                }
                throw new Exception('Error de actualización item: ' . $objItem->validateErrorsResponse());
            }
        }

        if (!$this->save()) {
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
            throw new Exception('Error de actualización compra: ' . $this->validateErrorsResponse());
        }
        $transaction->commit();
    }

    public static function calcularFechaVisualizar() {
        $fecha = new DateTime;
        $dias = Yii::app()->params->callcenter['pedidos']['diasVisualizar'] - 1;
        $fecha->modify("-$dias days");
        return $fecha->format('Y-m-d 00:00:00');
    }

    public static function cantidadComprasPorEstado($fecha, $idOperador = null) {
        if ($fecha === null) {
            $fecha = self::calcularFechaVisualizar();
        }

        $queryPendiente = "";
        $estadoPendiente = Yii::app()->params->callcenter['estadoCompra']['estado']['pendiente'];
        if ($idOperador == null) {
            $queryPendiente = "SELECT COUNT(t.idCompra) as cantidad
            FROM t_Compras as t  
            WHERE t.idEstadoCompra='$estadoPendiente'";
        } else {
            $queryPendiente = "SELECT COUNT(t.idCompra) as  cantidad
            FROM t_Compras  as t WHERE t.idOperador=$idOperador AND t.idEstadoCompra='$estadoPendiente'";
        }
        $resultPendiente = Yii::app()->db->createCommand($queryPendiente)->queryRow(true);


        $query1 = "";
        if ($idOperador == null) {
            /*   $query1 = "SELECT eo.idEstadoCompra, COUNT(t.idCompra) cantidad
              FROM t_Compras t
              RIGHT OUTER JOIN m_EstadoCompra eo ON (eo.idEstadoCompra=t.idEstadoCompra) AND (t.fechaCompra>='$fecha' AND t.tipoEntrega='" . Yii::app()->params->entrega["tipo"]['domicilio'] . "') OR (t.idOperador IS NULL AND t.fechaCompra IS NULL)
              GROUP BY eo.idEstadoCompra
              ORDER BY eo.idEstadoCompra"; */

            $query1 = "SELECT eo.idEstadoCompra, COUNT(t.idCompra) cantidad
            FROM t_Compras t  
            INNER JOIN m_EstadoCompra eo ON (eo.idEstadoCompra=t.idEstadoCompra) 
            WHERE (t.fechaCompra>='$fecha' AND t.idEstadoCompra<>$estadoPendiente)
            GROUP BY eo.idEstadoCompra
            ORDER BY eo.idEstadoCompra";

            $fecha1 = new DateTime;
            $fecha1->modify('+90 minutes');

            $fecha2 = new DateTime;
            $fecha2->modify('+120 minutes');

            $condition = " (t.seguimiento=1 AND t.fechaEntrega BETWEEN '" . $fecha1->format('Y-m-d H:i:s') . "' AND '" . $fecha2->format('Y-m-d H:i:s') . "')";

            $query2 = "SELECT COUNT(t.idCompra) as cantidad
            FROM t_Compras as t  
            WHERE (t.fechaCompra>='$fecha' AND $condition)";
        } else {
            /*   $query1 = "SELECT eo.idEstadoCompra, COUNT(t.idCompra) cantidad
              FROM t_Compras t
              RIGHT OUTER JOIN m_EstadoCompra eo ON (eo.idEstadoCompra=t.idEstadoCompra) AND (t.idOperador=$idOperador AND t.fechaCompra>='$fecha' AND t.tipoEntrega='" . Yii::app()->params->entrega["tipo"]['domicilio'] . "') OR (t.idOperador IS NULL AND t.fechaCompra IS NULL)
              GROUP BY t.idOperador, eo.idEstadoCompra
              ORDER BY eo.idEstadoCompra"; */

            $query1 = "SELECT eo.idEstadoCompra, COUNT(t.idCompra) cantidad
            FROM t_Compras t  
            INNER JOIN m_EstadoCompra eo ON (eo.idEstadoCompra=t.idEstadoCompra) 
            WHERE (t.idOperador=$idOperador AND t.fechaCompra>='$fecha' AND t.idEstadoCompra<>$estadoPendiente)
            GROUP BY eo.idEstadoCompra
            ORDER BY eo.idEstadoCompra";

            $fecha1 = new DateTime;
            $fecha1->modify('+90 minutes');

            $fecha2 = new DateTime;
            $fecha2->modify('+120 minutes');

            $condition = " (t.seguimiento=1 AND t.fechaEntrega BETWEEN '" . $fecha1->format('Y-m-d H:i:s') . "' AND '" . $fecha2->format('Y-m-d H:i:s') . "')";

            $query2 = "SELECT COUNT(t.idCompra) as  cantidad
            FROM t_Compras  as t WHERE (t.idOperador=$idOperador AND t.fechaCompra>='$fecha' AND $condition)";
        }
        $resultAux1 = Yii::app()->db->createCommand($query1)->queryAll(true);
        $resultAux2 = Yii::app()->db->createCommand($query2)->queryAll(true);
        $result = array();
        $estados = EstadoCompra::model()->findAll();

        foreach ($resultAux1 as $arr) {
            $result[$arr['idEstadoCompra']] = $arr['cantidad'];
        }

        $result[$estadoPendiente] = $resultPendiente['cantidad'] + $resultAux2[0]['cantidad'];

        foreach ($estados as $est) {
            if (!isset($result[$est->idEstadoCompra])) {
                $result[$est->idEstadoCompra] = 0;
            }
        }

        $query2 = "";
        if ($idOperador == null) {
            $query2 = "SELECT COUNT(c.idCompra) cantidad
            FROM t_Compras c
            JOIN t_ComprasItems ci ON (ci.idCompra=c.idCompra)
            WHERE ci.terceros=1 AND c.fechaCompra>='$fecha' ";
        } else {
            $query2 = "SELECT COUNT(c.idCompra) cantidad
            FROM t_Compras c
            JOIN t_ComprasItems ci ON (ci.idCOmpra=c.idCompra)
            WHERE ci.terceros=1 AND c.idOperador=$idOperador AND c.fechaCompra>='$fecha' ";
        }
        $resultAux2 = Yii::app()->db->createCommand($query2)->queryRow(true);
        $result['terceros'] = $resultAux2['cantidad'];

        $query3 = "";
        if ($idOperador == null) {
            $query3 = "SELECT COUNT(c.idCompra) cantidad
            FROM t_Compras c
            WHERE c.seguimiento=1";
        } else {
            $query3 = "SELECT COUNT(c.idCompra) cantidad
            FROM t_Compras c
            WHERE c.seguimiento=1 AND c.idOperador=$idOperador";
        }
        $resultAux3 = Yii::app()->db->createCommand($query3)->queryRow(true);
        $result['seguimiento'] = $resultAux3['cantidad'];

        $query4 = "";
        if ($idOperador == null) {
            $query4 = "SELECT COUNT(c.idCompra) cantidad
            FROM t_Compras c JOIN t_FormasPago fp ON fp.idCompra=c.idCompra
            WHERE fp.idFormaPago='" . Yii::app()->params->formaPago['pasarela']['idPasarela'] . "' AND c.fechaCompra>='$fecha' ";
        } else {
            $query4 = "SELECT COUNT(c.idCompra) cantidad
            FROM t_Compras c JOIN t_FormasPago fp ON fp.idCompra=c.idCompra
            WHERE fp.idFormaPago='" . Yii::app()->params->formaPago['pasarela']['idPasarela'] . "' AND c.idOperador=$idOperador AND c.fechaCompra>='$fecha' ";
        }
        $resultAux4 = Yii::app()->db->createCommand($query4)->queryRow(true);
        $result['enlinea'] = $resultAux4['cantidad'];
        
        $query5 = "";
        if ($idOperador == null) {
        	$query5 = "SELECT COUNT(c.idCompra) cantidad
            FROM t_Compras c 
            WHERE c.idTipoVenta='" . Yii::app()->params->tipoVenta['nacional'] . "' AND c.fechaCompra>='$fecha' ";
        } else {
        	$query5 = "SELECT COUNT(c.idCompra) cantidad
            FROM t_Compras c 
            WHERE idTipoVenta='" . Yii::app()->params->tipoVenta['nacional'] . "' AND c.idOperador=$idOperador AND c.fechaCompra>='$fecha' ";
        }
        $resultAux4 = Yii::app()->db->createCommand($query5)->queryRow(true);
        $result['entregaNacional'] = $resultAux4['cantidad'];

        return $result;
    }

    public function generarDocumentoCruce($idOperador = null) {
        $consecutivo = rand(100000, 999999);
        $pdv = $this->idComercial;

        if ($pdv != null && !empty($pdv)) {
            $car1 = substr($pdv, 0, 1);
            $car2 = substr($pdv, 1, 1);
            $car3 = substr($pdv, 2, 1);

            $ver = ord($car2);

            if ($ver >= 65) {
                $dig1 = $car1 + ($ver + 1 - 65) + $car3; //$ver+1-65
            } else {
                $dig1 = $car1 + $car2 + $car3;
            }

            //echo "Mostrador:" .$dig1 ."<br>";

            $numero = $consecutivo;

            $digVeri = 0;
            $flag = 0;

            for ($i = 0; $i < strlen($numero); $i++) {
                $num = substr($numero, $i, 1);
                $var1 = 0;
                $var2 = 0;
                if ($flag == 0) {
                    $num = $num * 1;

                    if (strlen($num) == 2) {
                        $var1 = substr($num, 0, 1);
                        $var2 = substr($num, 1, 1);

                        $digVeri += $var1 + $var2;
                    } else {
                        $digVeri += $num;
                    }
                    $flag = 1;
                } else {
                    $num = $num * 2;

                    if (strlen($num) == 2) {
                        $var1 = substr($num, 0, 1);
                        $var2 = substr($num, 1, 1);

                        $digVeri += $var1 + $var2;
                    } else {
                        $digVeri += $num;
                    }
                    $flag = 0;
                }
                //echo "Numero" .$num ."<br>";
            }
            //echo "Tamaï¿½o DifVeri: ".strlen($digVeri). "<br>";
            if (strlen($digVeri) == 2) {
                $digVeri = substr($digVeri, 1, 1);
            }
            //echo "DifVeri: ".$digVeri. "<br>";

            if ($digVeri > 0) {
                $digVeri = 10 - $digVeri;
            }

            $numero += $dig1;
            $digVeri = $digVeri . $numero;

            $objCruce = new DocumentoCruce;
            $objCruce->idCompra = $this->idCompra;
            $objCruce->idComercial = $this->idComercial;
            $objCruce->documentoCruce = $digVeri;
            $objCruce->idOperador = $idOperador;

            if (!$objCruce->save()) {
                throw new Exception('Error al registrar cruce: ' . $objCruce->validateErrorsResponse());
            }

            $this->documentoCruce = $digVeri;
        }
    }
	/************************************************************************************/
    public function getSaldosPDV() {
       // return unserialize(preg_replace('!s:(\d+):"(.*?)";!e', "'s:'.strlen('$2').':\"$2\";'", $this->saldosPdv));
    	return unserialize($this->saldosPdv);
    }

    public function getPuntosCompra() {
        $puntos = ComprasPuntos::model()->find("idCompra=:idcompra", array("idcompra" => $this->idCompra));

        if (!$puntos) {
            return 0;
        } else {
            return $puntos->cantidadPuntos;
        }
    }
    
    public function gridDetallePedido($data, $row) {
        $params = array('pedido' => $data->idCompra);

        if ($data->idOperador == null && $data->idEstadoCompra == Yii::app()->params->callcenter ['estadoCompra']['estado']['pendiente']) {
            $params['asignar'] = true;
        }

        $result = "<a class='btn btn-success  btn-xs' href='" . Yii::app()->createUrl('/callcenter/admin/detallepedido', $params) . "' target='_blank'><i
                     class='glyphicon glyphicon-zoom-in glyphicon-white'></i> $data->idCompra</a>";
        return $result;
    }

    public function gridPuntoventaPedido($data, $row) {
        if ($data->objPuntoVenta === null)
            return "NA";
        return $data->objPuntoVenta->nombrePuntoDeVenta . "<br/>" . $data->objPuntoVenta->direccionPuntoDeVenta;
    }

    public function gridOrigenPedido($data, $row) {
        if ($data->identificacionUsuario == null || $data->invitado) {
            return $data->objCompraDireccion->nombre . "<br/>" . $data->objCompraDireccion->correoElectronico;
        } else {
            	if(isset($data->objUsuario)){ 
                	return "$data->identificacionUsuario<br/>" . $data->objUsuario->getNombreCompleto() . "<br/>" . $data->objUsuario->correoElectronico;
            	}else if($data->idTipoVenta  == Yii::app()->params->tipoVenta['vap']){
            		return "$data->identificacionUsuario<br/>" .$data->objComprasRemitente->nombreRemitente. "<br/>" . $data->objComprasRemitente->correoRemitente;
            	}
        }
    }

    public function gridValorPedido($data, $row) {
        return Yii::app()->numberFormatter->format(Yii::app
                        ()->params->formatoMoneda['patron'], $data->totalCompra, Yii::app()->params->formatoMoneda['moneda']);
    }

    public function gridDestinoPedido($data, $row) {

        if ($data->objCompraDireccion == null)
            return "NA";
        return $data->
                objCompraDireccion->nombre . "<br/>" . $data->objCompraDireccion->direccion . "<br/>" . $data->objCompraDireccion->barrio;
    }

    public function gridPagoPedido($data, $row) {
        if ($data->objFormaPagoCompra === null)
            return "NA";

        $result = $data->objFormaPagoCompra->objFormaPago->formaPago;
        if ($data->objFormaPagoCompra->numeroTarjeta != null && !empty($data->objFormaPagoCompra->numeroTarjeta))
            $result .= "<strong>No. tarjeta:</strong> " . $data->objFormaPagoCompra->numeroTarjeta . "<br/><strong>No. cuotas:</strong> " . $data->objFormaPagoCompra->cuotasTarjeta;

        return $result;
    }

    public function gridEstadoPedido($data, $row) {
        return "<span class='label label-" . Yii::app()->params->callcenter['estadoCompra']['colorClass'][$data->idEstadoCompra] . "'>" . $data->objEstadoCompra->compraEstado . "</span>";
    }
    
    public function sumaFormasPago(){
    	$formasPago = FormasPago::model()->findAll('idCompra =:idcompra', array(':idcompra' => $this->idCompra));
    	$val = 0;
    	for($i = 0;$i < count($formasPago);$i++){
    		$val += $formasPago[$i]->valor;
    	}
    	
    	return $val;
    }
    
    public function gridRowCssClassFunction($row, $data) {
        $classes = array();
        $rowCssClass = array('odd', 'even');
        $classes [] = $rowCssClass[$row % count($rowCssClass)];
        if ($data->seguimiento == 1)
            $classes[] = "seguimiento";
        else if ($data->tipoEntrega == 1) {
            $classes[] = "presencial";
        }
        return empty($classes) ? false : implode(' ', $classes);
    }
    
    public function isVentaCentralizada(){
    	return false;
    }

}
