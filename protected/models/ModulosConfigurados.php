<?php

/**
 * This is the model class for table "m_ModulosConfigurados".
 *
 * The followings are the available columns in table 'm_ModulosConfigurados':
 * @property integer $idModulo
 * @property integer $tipo
 * @property string $inicio
 * @property string $fin
 * @property string $dias
 * @property integer $estado
 * @property string $descripcion
 * @property string $contenido
 * @property string $contenidoMovil
 * @property integer $autenticacion
 *
 * The followings are the available model relations:
 * @property ImagenBanner[] $listImagenesBanners
 * @property ModuloSectorCiudad[] $listModulosSectoresCiudades
 * @property ProductosModulos[] $listProductosModulos
 * @property UbicacionModulos[] $listUbicacionesModulos
 */
class ModulosConfigurados extends CActiveRecord {

    const TIPO_BANNER = 1;
    const TIPO_PRODUCTOS = 2;
    const TIPO_IMAGENES = 3;
    const TIPO_HTML = 4;
    const TIPO_HTML_PRODUCTOS = 5;
    const TIPO_ENLACE_MENU = 6;
    const TIPO_PROMOCION_FLOTANTE = 7;
    const TIPO_PRODUCTOS_CUADRICULA = 8;
    const TIPO_GRUPO_MODULOS = 9;
    const TIPO_PRODUCTOS_CARRO = 10;
    const TIPO_PRODUCTOS_BANNER = 11;
    const TIPO_MENU_CONFIGURABLE = 12;

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'm_ModulosConfigurados';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('tipo, inicio, fin, estado, dias, autenticacion', 'required'),
            array('tipo, estado, aleatorio, lineas, agotado, autenticacion, esMundo', 'numerical', 'integerOnly' => true),
            array('dias', 'length', 'max' => 30),
            array('descripcion, titulo', 'length', 'max' => 255),
        	array('urlAmigable', 'length', 'max' => 64),
            array('contenido', 'required', 'on' => 'contenido'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('idModulo, tipo, inicio, fin, dias, estado, aleatorio, lineas, agotado, descripcion, titulo, contenido, contenidoMovil, autenticacion, urlAmigable, esMundo', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'listImagenesBanners' => array(self::HAS_MANY, 'ImagenBanner', 'idModulo', 'order' => 'listImagenesBanners.orden ASC'),
            'listModulosSectoresCiudades' => array(self::HAS_MANY, 'ModuloSectorCiudad', 'idModulo'),
            'listProductosModulos' => array(self::HAS_MANY, 'ProductosModulos', 'idModulo'),
            'listUbicacionesModulos' => array(self::HAS_MANY, 'UbicacionModulos', 'idModulo'),
            'objMenuModulo' => array(self::BELONGS_TO, 'MenuModulo', 'idModulo'),
            'listModulosGrupo' => array(self::MANY_MANY, 'ModulosConfigurados', 't_GruposModulos(idGrupoModulo, idModulo)', 'order'=>'listModulosGrupo_listModulosGrupo.orden'),
            'objModuloGrupo' => array(self::BELONGS_TO, 'GruposModulos', '','on' => 't.idModulo=objModuloGrupo.idModulo AND objModuloGrupo.idGrupoModulo =:idgrupoModulo'),
            'listPerfiles' => array(self::HAS_MANY, 'ModuloPerfil', 'idModulo'),
        	'objMenuMundo'	=> array(self::HAS_ONE, 'MenuPublicidad', 'idModulo'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'idModulo' => 'Id Modulo',
            'tipo' => 'Tipo',
            'titulo' => 'Titulo',
            'inicio' => 'Inicio',
            'fin' => 'Fin',
            'dias' => 'Dias',
            'estado' => 'Estado',
            'descripcion' => 'Descripcion',
            'contenido' => 'Contenido',
            'contenidoMovil' => 'contenidoMovil',
            'aleatorio' => 'Aleatorio' ,
            'lineas' => 'Número de líneas',
            'Agotado' => 'Mostrar agotados',
            'autenticacion' => 'Tipo de autenticaci&oacute;n',
        	'esMundo' => 'Es mundo',
        	'urlAmigable' => 'Direcci&oacute;n amigable',
        		
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

        $criteria->order ="t.idModulo DESC";
        $criteria->compare('idModulo', $this->idModulo);
        $criteria->compare('tipo', $this->tipo);
        $criteria->compare('inicio', $this->inicio, true);
        $criteria->compare('fin', $this->fin, true);
        $criteria->compare('dias', $this->dias, true);
        $criteria->compare('estado', $this->estado);
        $criteria->compare('descripcion', $this->descripcion, true);
        $criteria->compare('titulo', $this->titulo, true);
        $criteria->compare('contenido', $this->contenido, true);
        $criteria->compare('contenidoMovil', $this->contenidoMovil, true);
        $criteria->compare('autenticacion', $this->autenticacion, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }
    
    
     public function searchModulos($idGrupoModulo) {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;
        
        $criteria->with = array('objModuloGrupo');
        $criteria->condition = 't.tipo  NOT IN (:grupoModulo)';
        $criteria->params = array (
            ':grupoModulo' => ModulosConfigurados::TIPO_GRUPO_MODULOS,
            ':idgrupoModulo' => $idGrupoModulo
        );
        $criteria->order ="t.idModulo DESC";
        
        $criteria->compare('t.tipo', $this->tipo);
        $criteria->compare('t.inicio', $this->inicio, true);
        $criteria->compare('t.fin', $this->fin, true);
        $criteria->compare('t.descripcion', $this->descripcion, true); 
        $criteria->compare('t.titulo', $this->titulo, true); 
        
        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return ModulosConfigurados the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getListaProductos_backup($objSectorCiudad) {
    
    	$listaCodigos = array();
    	$listaCodigosCategoria = array();
    	$listaCodigosMarca = array();
    
    	foreach ($this->listProductosModulos as $objProductoModulo) {
    		if ($objProductoModulo->codigoProducto !== null)
    			$listaCodigos[] = $objProductoModulo->codigoProducto;
    			if ($objProductoModulo->idCategoriaBI !== null)
    				$listaCodigosCategoria[] = $objProductoModulo->idCategoriaBI;
    				if ($objProductoModulo->idMarca !== null)
    					$listaCodigosMarca[] = $objProductoModulo->idMarca;
    	}
    
    	$listaProductos = array();
    
    	if (!empty($listaCodigos) || !empty($listaCodigosCategoria) || !empty($listaCodigosMarca)) {
    		$criteria = array(
    				'order' => (($this->aleatorio == 1)? 'rand()': 't.orden DESC'). (($this->lineas != NULL && $this->aleatorio == 1) ? ' LIMIT '.($this->lineas*5): ''),
    				'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones'),
    				'condition' => "t.activo=:activo AND (listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' OR listImagenes.tipoImagen IS NULL)",
    				'params' => array(
    						':activo' => 1,
    				)
    		);
    
    		$condition = "";
    
    		if (!empty($listaCodigos)) {
    			$condition .= "t.codigoProducto IN (" . implode(",", $listaCodigos) . ")";
    		}
    
    		if (!empty($listaCodigosCategoria) || !empty($listaCodigosMarca)) {
    			$conditionAux = "";
    
    			if (!empty($listaCodigosCategoria)) {
    				$conditionAux .= "t.idCategoriaBI IN (" . implode(",", $listaCodigosCategoria) . ")";
    			}
    
    			if (!empty($listaCodigosMarca)) {
    				if (!empty($conditionAux)) {
    					$conditionAux .= " AND";
    				}
    
    				$conditionAux .= " t.idMarca IN (" . implode(",", $listaCodigosMarca) . ")";
    			}
    
    			if (empty($condition)) {
    				$condition = " AND $conditionAux";
    			} else {
    				$condition = " AND ($condition OR ($conditionAux))";
    			}
    		} else {
    			if (!empty($condition))
    				$condition = " AND $condition";
    		}
    
    		$criteria['condition'] .= " $condition";
    
    		if ($objSectorCiudad !== null) {
    			$criteria['with']['listSaldos'] = array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector OR listSaldos.idProductoSaldos IS NULL' );
    			$criteria['with']['listPrecios'] = array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector OR listPrecios.idProductoPrecios IS NULL');
    			$criteria['with']['listSaldosTerceros'] = 'listSaldosTerceros';
    
    			if($this->agotado == 0 && in_array($this->tipo, array(self::TIPO_PRODUCTOS_CUADRICULA, $this->tipo==self::TIPO_PRODUCTOS, $this->tipo==self::TIPO_PRODUCTOS_BANNER))){
    				$criteria['condition'] .= " AND ( (listSaldos.idProductoSaldos IS NOT NULL AND listSaldos.saldoUnidad>0 AND listPrecios.idProductoPrecios IS NOT NULL) OR (listSaldosTerceros.idProductoSaldo IS NOT NULL AND listSaldosTerceros.saldoUnidad>0))";
    			}
    			/*
    			 $criteria['with']['listSaldos'] = 'listSaldos';
    			 $criteria['with'][] = 'listPrecios';
    			 $criteria['with'][] = 'listSaldosTerceros';
    			 $criteria['condition'] .= " AND (listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector OR listSaldos.idProductoSaldos IS NULL)";
    			 $criteria['condition'] .= " AND (listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector OR listPrecios.idProductoPrecios IS NULL)";
    			 $criteria['condition'] .= " AND (listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector OR listSaldosTerceros.idProductoSaldo IS NULL)";
    			 */
    
    			//$criteria['condition'] .= " AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)";
    			//$criteria['params'][':saldo'] = 0;
    
    			$criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
    			$criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
    		}
    
    		$listaProductos = Producto::model()->findAll($criteria);
    
    		foreach ($listaProductos as $objProducto) {
    			if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
    				CodigoEspecial::setState($objProducto->objCodigoEspecial);
    			}
    		}
    	}
    
    	return $listaProductos;
    }
    
    public function getListaProductos($objSectorCiudad) {
        
        $listaCodigos = array();
        $listaCodigosCategoria = array();
        $listaCodigosMarca = array();
        
        foreach ($this->listProductosModulos as $objProductoModulo) {
            if ($objProductoModulo->codigoProducto !== null)
                $listaCodigos[] = $objProductoModulo->codigoProducto;
                if ($objProductoModulo->idCategoriaBI !== null)
                    $listaCodigosCategoria[] = $objProductoModulo->idCategoriaBI;
                    if ($objProductoModulo->idMarca !== null)
                        $listaCodigosMarca[] = $objProductoModulo->idMarca;
        }
        
        $listaProductos = array();
        
        if (!empty($listaCodigos) || !empty($listaCodigosCategoria) || !empty($listaCodigosMarca)) {
            $criteria = array(
                'order' => (($this->aleatorio == 1)? 'rand()': 't.orden DESC'). (($this->lineas != NULL && $this->aleatorio == 1) ? ' LIMIT '.($this->lineas*5): ''),
                'with' => array('listImagenes' => array (
                    'on' => 'listImagenes.estadoImagen=:activo AND listImagenes.tipoImagen=:tipoImagen'
                ), 'objCodigoEspecial', 'listCalificaciones'),
                'condition' => "t.activo=:activo AND (listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' OR listImagenes.tipoImagen IS NULL)",
                'params' => array(
                    ':activo' => 1,
                    ':tipoImagen' =>  YII::app ()->params->producto ['tipoImagen'] ['mini'],
                )
            );
            
            
            $condition = "";
            
            
            /*
             $sesion = Yii::app ()->getSession ()->getSessionId ();
             
             
             $insert = array();
             foreach($listaCodigos as $lista){
             $insert[]= "($lista)";
             }
             $h1 = round(microtime(true) * 1000);
             if (!empty($insert)) {
             $sql = "DROP TEMPORARY TABLE IF EXISTS t_productosmodulos_temp_$sesion;
             CREATE TEMPORARY TABLE t_productosmodulos_temp_$sesion (
             codigoProducto int(10) unsigned NOT NULL,
             KEY `idx_t_productosmodulos_temp_codigoProducto` (`codigoProducto`)
             
             );
             SET FOREIGN_KEY_CHECKS = 0;
             INSERT INTO t_productosmodulos_temp_$sesion (codigoProducto) VALUES " . implode(",", $insert);
             Yii::app()->db->createCommand($sql)->query();
             }
             */
            $h2 = round(microtime(true) * 1000);
            
            
            if (!empty($listaCodigos)) {
                $condition .= "t.codigoProducto IN (" . implode(",", $listaCodigos) . ")";
            }
            if (!empty($listaCodigosCategoria) || !empty($listaCodigosMarca)) {
                $conditionAux = "";
                
                if (!empty($listaCodigosCategoria)) {
                    $conditionAux .= "t.idCategoriaBI IN (" . implode(",", $listaCodigosCategoria) . ")";
                }
                
                if (!empty($listaCodigosMarca)) {
                    if (!empty($conditionAux)) {
                        $conditionAux .= " AND";
                    }
                    
                    $conditionAux .= " t.idMarca IN (" . implode(",", $listaCodigosMarca) . ")";
                }
                
                if (empty($condition)) {
                    $condition = " AND $conditionAux";
                } else {
                    $condition = " AND ($condition OR ($conditionAux))";
                }
            } else {
                if (!empty($condition))
                    $condition = " AND $condition";
            }
            
            $criteria['condition'] .= " $condition";
            
            if ($objSectorCiudad !== null) {
                $criteria['with']['listSaldos'] = array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector');
                $criteria['with']['listPrecios'] = array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector');
                $criteria['with']['listSaldosTerceros'] = 'listSaldosTerceros';
                $criteria['with']['listFletesTerceros'] = array('on' => 'listFletesTerceros.codigoCiudad=:ciudad');
                $criteria['with']['listSaldosCedi'] = array('on' => 'codigoCedi=:codigoCedi');
                //   $criteria['join'] = "JOIN t_productosmodulos_temp_$sesion rel ON t.codigoProducto = rel.codigoProducto ";
                $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
                $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
                $criteria['params'][':codigoCedi'] = $objSectorCiudad->objCiudad->codigoSucursal;
                
                if (!$objSectorCiudad->esDefecto()) {
                    if($this->agotado == 0 && in_array($this->tipo, array(self::TIPO_PRODUCTOS_CUADRICULA, $this->tipo==self::TIPO_PRODUCTOS, $this->tipo==self::TIPO_PRODUCTOS_BANNER))){
                        $criteria['condition'] .= " AND ( listSaldos.saldoUnidad>0 OR listSaldosTerceros.saldoUnidad>0 OR listSaldosCedi.saldoUnidad > 0)";
                    }
                }
            }
            
            $listaProductos = Producto::model()->findAll($criteria);
            
            //  echo ($h2-$h1);exit();
            
            foreach ($listaProductos as $objProducto) {
                if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                    CodigoEspecial::setState($objProducto->objCodigoEspecial);
                }
            }
            
        }
        
        return $listaProductos;
    }
    
    public function getListaProductos_old($objSectorCiudad) {
        
        $listaCodigos = array();
        $listaCodigosCategoria = array();
        $listaCodigosMarca = array();
        
        foreach ($this->listProductosModulos as $objProductoModulo) {
            if ($objProductoModulo->codigoProducto !== null)
                $listaCodigos[] = $objProductoModulo->codigoProducto;
                if ($objProductoModulo->idCategoriaBI !== null)
                    $listaCodigosCategoria[] = $objProductoModulo->idCategoriaBI;
                    if ($objProductoModulo->idMarca !== null)
                        $listaCodigosMarca[] = $objProductoModulo->idMarca;
        }
        
        $listaProductos = array();
        
        if (!empty($listaCodigos) || !empty($listaCodigosCategoria) || !empty($listaCodigosMarca)) {
            $criteria = array(
                'order' => (($this->aleatorio == 1)? 'rand()': 't.orden DESC'). (($this->lineas != NULL && $this->aleatorio == 1) ? ' LIMIT '.($this->lineas*5): ''),
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones'),
                'condition' => "t.activo=:activo AND (listImagenes.tipoImagen='" . Yii::app()->params->producto['tipoImagen']['mini'] . "' OR listImagenes.tipoImagen IS NULL)",
                'params' => array(
                    ':activo' => 1,
                )
            );
            
            $condition = "";
            
            if (!empty($listaCodigos)) {
                $condition .= "t.codigoProducto IN (" . implode(",", $listaCodigos) . ")";
            }
            
            if (!empty($listaCodigosCategoria) || !empty($listaCodigosMarca)) {
                $conditionAux = "";
                
                if (!empty($listaCodigosCategoria)) {
                    $conditionAux .= "t.idCategoriaBI IN (" . implode(",", $listaCodigosCategoria) . ")";
                }
                
                if (!empty($listaCodigosMarca)) {
                    if (!empty($conditionAux)) {
                        $conditionAux .= " AND";
                    }
                    
                    $conditionAux .= " t.idMarca IN (" . implode(",", $listaCodigosMarca) . ")";
                }
                
                if (empty($condition)) {
                    $condition = " AND $conditionAux";
                } else {
                    $condition = " AND ($condition OR ($conditionAux))";
                }
            } else {
                if (!empty($condition))
                    $condition = " AND $condition";
            }
            
            $criteria['condition'] .= " $condition";
            
            
            if (!$objSectorCiudad->esDefecto()) {
                $criteria['with']['listSaldos'] = array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector OR listSaldos.idProductoSaldos IS NULL');
                $criteria['with']['listPrecios'] = array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector OR listPrecios.idProductoPrecios IS NULL');
                $criteria['with']['listSaldosTerceros'] ='listSaldosTerceros';
                $criteria['with']['listSaldosCedi'] = array('on' => 'codigoCedi =:codigoCedi' );
                $criteria['params'][':codigoCedi'] = $objSectorCiudad->objCiudad->codigoSucursal ;
                
                if($this->agotado == 0 && in_array($this->tipo, array(self::TIPO_PRODUCTOS_CUADRICULA, $this->tipo==self::TIPO_PRODUCTOS, $this->tipo==self::TIPO_PRODUCTOS_BANNER))){
                    $criteria['condition'] .= " AND ( (listSaldos.idProductoSaldos IS NOT NULL AND listSaldos.saldoUnidad>0 AND listPrecios.idProductoPrecios IS NOT NULL) OR
                                                                                           (listSaldosTerceros.idProductoSaldo IS NOT NULL AND listSaldosTerceros.saldoUnidad>0) OR
                                                                                           (listSaldosCedi.idProductosSaldosCedi IS NOT NULL AND listSaldosCedi.saldoUnidad > 0)
                                                                                           )";
                }
                /*
                 $criteria['with']['listSaldos'] = 'listSaldos';
                 $criteria['with'][] = 'listPrecios';
                 $criteria['with'][] = 'listSaldosTerceros';
                 $criteria['condition'] .= " AND (listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector OR listSaldos.idProductoSaldos IS NULL)";
                 $criteria['condition'] .= " AND (listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector OR listPrecios.idProductoPrecios IS NULL)";
                 $criteria['condition'] .= " AND (listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector OR listSaldosTerceros.idProductoSaldo IS NULL)";
                 */
                
                //$criteria['condition'] .= " AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)";
                //$criteria['params'][':saldo'] = 0;
                
                $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
                $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
            }else{
                $criteria['with']['listSaldos'] = array('on' => 'listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector');
                $criteria['with']['listPrecios'] = array('on' => 'listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector');
                $criteria['with']['listSaldosTerceros'] ='listSaldosTerceros';
                $criteria['with']['listSaldosCedi'] = array('on' => 'codigoCedi =:codigoCedi' );
                
                $criteria['params'][':codigoCedi'] = $objSectorCiudad->objCiudad->codigoSucursal ;
                $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
                $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
            }
            
            $listaProductos = Producto::model()->findAll($criteria);
            
            
            foreach ($listaProductos as $objProducto) {
                if ($objProducto->codigoEspecial != null && $objProducto->codigoEspecial != 0) {
                    CodigoEspecial::setState($objProducto->objCodigoEspecial);
                }
            }
        }
        
        return $listaProductos;
    }

    public static function getModulosBanner($objSectorCiudad, $codigoPerfil, $ubicacion) {
        $fecha = new DateTime;
        
        $criteria = array(
            'with' => array('listImagenesBanners', 'listUbicacionesModulos', 'listModulosSectoresCiudades', 'listPerfiles'),
            'order' => 'listUbicacionesModulos.orden, listImagenesBanners.orden',
            'condition' => 't.estado=:estado AND t.tipo =:tipo AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha AND listUbicacionesModulos.ubicacion=:ubicacion AND (listPerfiles.idPerfil =:perfilA  OR listPerfiles.idPerfil =:perfil )'
            . ' AND (t.autenticacion =:autenticacion OR t.autenticacion =:autenticacionA)',
            'params' => array(
                ':estado' => 1,
                ':tipo' => ModulosConfigurados::TIPO_BANNER,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
                ':ubicacion' => $ubicacion,
                ':perfil' => $codigoPerfil,
                ':perfilA' => Yii::app()->params->perfil['*'],
                ':autenticacion' => (Yii::app()->user->isGuest ? 1 : 2),
                ':autenticacionA' => Yii::app()->params->callcenter['modulosConfigurados']['autenticacion']['*'], 
            )
        );

        if ($objSectorCiudad == null) {
            $criteria['condition'] .= " AND listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector";
            $criteria['params'][':sector'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudad'] = Yii::app()->params->ciudad['*'];
        } else {
            $condicion = " AND ( (listModulosSectoresCiudades.codigoCiudad=:ciudadA AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector))";

            $criteria['condition'] .= $condicion;
            $criteria['params'][':sectorA'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudadA'] = Yii::app()->params->ciudad['*'];
            $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
            $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
        }
     
        return ModulosConfigurados::model()->findAll($criteria);
    }

    public static function getModulosMenu($objSectorCiudad) {
        $fecha = new DateTime;

        $criteria = array(
            'with' => array('listModulosSectoresCiudades', 'objMenuModulo', 'listModulosSectoresCiudades'),
            'condition' => 't.estado=:estado AND t.tipo =:tipo AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha',
            'params' => array(
                ':estado' => 1,
                ':tipo' => ModulosConfigurados::TIPO_ENLACE_MENU,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
            )
        );

        if ($objSectorCiudad == null) {
            $criteria['condition'] .= " AND listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector";
            $criteria['params'][':sector'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudad'] = Yii::app()->params->ciudad['*'];
        } else {
            $condicion = " AND ( (listModulosSectoresCiudades.codigoCiudad=:ciudadA AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector))";

            $criteria['condition'] .= $condicion;
            $criteria['params'][':sectorA'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudadA'] = Yii::app()->params->ciudad['*'];
            $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
            $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
        }

        return ModulosConfigurados::model()->findAll($criteria);
    }

    public static function getModuloFlotante($objSectorCiudad, $codigoPerfil, $ubicacion, $categoria = null) {
        $fecha = new DateTime;

        $criteria = array(
            'with' => array('listModulosSectoresCiudades', 'listPerfiles'),
            'condition' => "t.estado=:estado AND t.tipo =:tipo AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha AND listUbicacionesModulos.ubicacion=:ubicacion AND (listPerfiles.idPerfil =:perfilA  OR listPerfiles.idPerfil =:perfil )",
            'params' => array(
                ':estado' => 1,
                ':tipo' => ModulosConfigurados::TIPO_PROMOCION_FLOTANTE,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
                ':ubicacion' => $ubicacion,
                ':perfil' => $codigoPerfil,
                ':perfilA' => Yii::app()->params->perfil['*']
            )
        );

        if ($categoria == null) {
            $criteria['with'][] = 'listUbicacionesModulos';
        } else {
            $criteria['with']['listUbicacionesModulos'] = array('with' => 'listUbicacionesCategorias');
            $criteria['condition'] .= " AND listUbicacionesCategorias.idCategoriaTienda = $categoria";
        }

        if ($objSectorCiudad == null) {
            $criteria['condition'] .= " AND listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector";
            $criteria['params'][':sector'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudad'] = Yii::app()->params->ciudad['*'];
        } else {
            $condicion = " AND ( (listModulosSectoresCiudades.codigoCiudad=:ciudadA AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector))";

            $criteria['condition'] .= $condicion;
            $criteria['params'][':sectorA'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudadA'] = Yii::app()->params->ciudad['*'];
            $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
            $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
        }

        return ModulosConfigurados::model()->find($criteria);
    }

    public static function getModulosGrupo($idGrupo) {
        $fecha = new DateTime;

        $objModulo = ModulosConfigurados::model()->find(array(
            //'order' => 'listModulosGrupo_listModulosGrupo.orden',
            'with' => 'listModulosGrupo',
            'condition' => 't.estado=:estado AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha AND t.idModulo=:modulo AND listModulosGrupo.estado=:estado AND listModulosGrupo.dias LIKE :dia AND listModulosGrupo.inicio<=:fecha AND listModulosGrupo.fin>=:fecha',
            'params' => array(
                ':estado' => 1,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
                ':modulo' => $idGrupo
            )
        ));

        if ($objModulo == null) {
            return array();
        } else {
            return $objModulo->listModulosGrupo;
        }
    }

    public static function getModulos($objSectorCiudad, $codigoPerfil, $ubicacion, $categoria = null) {
        $fecha = new DateTime;

        $criteria = array(
            'order' => 'listUbicacionesModulos.orden',
            'with' => array('listModulosSectoresCiudades', 'listPerfiles'),
            'condition' => "t.estado=:estado AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha AND listUbicacionesModulos.ubicacion=:ubicacion AND (listPerfiles.idPerfil =:perfilA  OR listPerfiles.idPerfil =:perfil )"
            . ' AND (t.autenticacion =:autenticacion OR t.autenticacion =:autenticacionA)',
            'params' => array(
                ':estado' => 1,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
                ':ubicacion' => $ubicacion,
                ':perfil' => $codigoPerfil,
                ':perfilA' => Yii::app()->params->perfil['*'],
                ':autenticacion' => (Yii::app()->user->isGuest ? 1 : 2),
                ':autenticacionA' => Yii::app()->params->callcenter['modulosConfigurados']['autenticacion']['*'], 
            )
        );

        if ($categoria == null) {
            $criteria['with'][] = 'listUbicacionesModulos';
        } else {
            $criteria['with']['listUbicacionesModulos'] = array('with' => 'listUbicacionesCategorias');
            $criteria['condition'] .= " AND listUbicacionesCategorias.idCategoriaTienda = $categoria";
        }

        if ($objSectorCiudad == null) {
            $criteria['condition'] .= " AND listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector";
            $criteria['params'][':sector'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudad'] = Yii::app()->params->ciudad['*'];
        } else {
            $condicion = " AND ( (listModulosSectoresCiudades.codigoCiudad=:ciudadA AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector))";

            $criteria['condition'] .= $condicion;
            $criteria['params'][':sectorA'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudadA'] = Yii::app()->params->ciudad['*'];
            $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
            $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
        }
        
    //    $criteria['condition'].= " AND t.tipo IN (1,3,4,5,12)";

        return  ModulosConfigurados::model()->findAll($criteria);
        
    }
    
    public static function getModulo($idModulo) {
        
        
        return ModulosConfigurados::model()->find( array(
                'condition' => "t.idModulo =:idmodulo",
                'params' => array(
                    ':idmodulo' => $idModulo
                )
         ));
    }
    
    public static function getModuloVigente($idModulo, $codigoPerfil, $objSectorCiudad = null){
        $fecha = new DateTime;
        
        $criteria = array(
            'with' => array('listModulosSectoresCiudades', 'listPerfiles'),
            'condition' => "t.idModulo =:idmodulo AND t.estado=:estado AND t.dias LIKE :dia AND t.inicio<=:fecha AND t.fin>=:fecha AND (listPerfiles.idPerfil =:perfilA  OR listPerfiles.idPerfil =:perfil )",
            'params' => array(
                ':idmodulo' => $idModulo,
                ':estado' => 1,
                ':dia' => "%" . $fecha->format("w") . "%",
                ':fecha' => $fecha->format("Y-m-d"),
                ':perfil' => $codigoPerfil,
                ':perfilA' => Yii::app()->params->perfil['*'],
            )
        );
        
        if ($objSectorCiudad == null) {
            $criteria['condition'] .= " AND listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector";
            $criteria['params'][':sector'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudad'] = Yii::app()->params->ciudad['*'];
        } else {
            $condicion = " AND ( (listModulosSectoresCiudades.codigoCiudad=:ciudadA AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sectorA)";
            $condicion .= " OR (listModulosSectoresCiudades.codigoCiudad=:ciudad AND listModulosSectoresCiudades.codigoSector=:sector))";

            $criteria['condition'] .= $condicion;
            $criteria['params'][':sectorA'] = Yii::app()->params->sector['*'];
            $criteria['params'][':ciudadA'] = Yii::app()->params->ciudad['*'];
            $criteria['params'][':sector'] = $objSectorCiudad->codigoSector;
            $criteria['params'][':ciudad'] = $objSectorCiudad->codigoCiudad;
        }
        
        return ModulosConfigurados::model()->find($criteria);
        
    }
}
