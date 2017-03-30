<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PrecioProducto
 *
 * @author miguel.sanchez
 */
class PrecioProducto extends Precio {

    protected $precioUnidad = 0;
    protected $precioFraccion = 0;
    protected $unidadFraccionamiento = 0;
    protected $precioFraccionTotal = 0;
    protected $ahorroUnidad = 0;
    protected $ahorroUnidadDescuento = 0;
    protected $ahorroUnidadBono = 0;
    protected $ahorroFraccion = 0;
    protected $ahorroFraccionDescuento = 0;
    protected $ahorroFraccionBono = 0;

    function __construct(Producto $objProducto, $objCiudadSector, $codigoPerfil, $consultaPrecio = false) {
        $fecha = new DateTime;
        $tienePrecio = false;
        $tieneSaldo = false;
        
        if ($objCiudadSector != null) {
            if ($objProducto->tercero == 1) {
                $listSaldosTerceros = array();

                if ($consultaPrecio) {
                    $listSaldosTerceros = ProductosSaldosTerceros::model()->findAll(array(
                        'condition' => '(codigoProducto=:producto AND codigoCiudad=:ciudad AND codigoSector=:sector)',
                        'params' => array(
                            ':producto' => $objProducto->codigoProducto,
                            ':ciudad' => $objCiudadSector->codigoCiudad,
                            ':sector' => $objCiudadSector->codigoSector,
                        ),
                    ));
                } else {
                    $listSaldosTerceros = $objProducto->listSaldosTerceros;
                }

                foreach ($listSaldosTerceros as $objProductoSaldoTercero) {
                    if ($objProductoSaldoTercero->codigoCiudad == $objCiudadSector->codigoCiudad && $objProductoSaldoTercero->codigoSector == $objCiudadSector->codigoSector) {
                        $this->precioUnidad = $objProductoSaldoTercero->precioUnidad;
                        $this->precioFraccion = $objProductoSaldoTercero->precioFraccion;
                        $this->unidadFraccionamiento = $objProducto->unidadFraccionamiento;
                        $this->flete = $objProductoSaldoTercero->flete;
                        $this->tiempoEntrega = $objProductoSaldoTercero->tiempoDomicilio;

                        if ($objProductoSaldoTercero->saldoUnidad > 0 || $objProductoSaldoTercero->saldoFraccion > 0) {
                            $tieneSaldo = true;
                        }

                        break;
                    }
                }


                if ($this->precioUnidad > 0 || $this->precioFraccion > 0) {
                    $tienePrecio = true;
                }
            } else {
                $listPrecios = array();
                $listSaldos = array();

                if ($consultaPrecio) {
                    $listPrecios = ProductosPrecios::model()->findAll(array(
                        'condition' => '(codigoProducto=:producto AND codigoCiudad=:ciudad AND codigoSector=:sector)',
                        'params' => array(
                            ':producto' => $objProducto->codigoProducto,
                            ':ciudad' => $objCiudadSector->codigoCiudad,
                            ':sector' => $objCiudadSector->codigoSector,
                        ),
                    ));

                    $listSaldos = ProductosSaldos::model()->findAll(array(
                        'condition' => '(codigoProducto=:producto AND codigoCiudad=:ciudad AND codigoSector=:sector)',
                        'params' => array(
                            ':producto' => $objProducto->codigoProducto,
                            ':ciudad' => $objCiudadSector->codigoCiudad,
                            ':sector' => $objCiudadSector->codigoSector,
                        ),
                    ));
                } else {
                    $listPrecios = $objProducto->listPrecios;
                    $listSaldos = $objProducto->listSaldos;
                }
                
                /************************ SALDOS DE BODEGA *****************************/
                
                $listSaldosBodega = array();
                
                if ($consultaPrecio) {
                	$listSaldosBodega = ProductosSaldosCedi::model()->findAll(array(
                			'condition' => '(codigoProducto=:producto AND codigoCedi=:codigoCedi)',
                			'params' => array(
                					':codigoCedi' => $objCiudadSector->objCiudad->codigoSucursal,
                					':producto' => $objProducto->codigoProducto,
                			),
                	));
                } else {
                	$listSaldosBodega = $objProducto->listSaldosCedi;
                }
                
                foreach ($listSaldosBodega as $objProductoSaldoBodega) {
                	  if ($objProductoSaldoBodega->saldoUnidad > 0 ) {
                			$tieneSaldo = true;
                		}
                	break;
                }
                
                /************************ FIN SALDOS DE BODEGA **************************/

                foreach ($listPrecios as $objProductoPrecio) {
                    if ($objProductoPrecio->codigoCiudad == $objCiudadSector->codigoCiudad && $objProductoPrecio->codigoSector == $objCiudadSector->codigoSector) {
                        $this->precioUnidad = $objProductoPrecio->precioUnidad;
                        $this->precioFraccion = $objProductoPrecio->precioFraccion;
                        $this->unidadFraccionamiento = $objProducto->unidadFraccionamiento;
                        break;
                    }
                }

                if ($this->precioUnidad > 0 || $this->precioFraccion > 0) {
                    $tienePrecio = true;
                }

                foreach ($listSaldos as $objProductoSaldo) {
                    if ($objProductoSaldo->codigoCiudad == $objCiudadSector->codigoCiudad && $objProductoSaldo->codigoSector == $objCiudadSector->codigoSector) {
                        if ($objProductoSaldo->saldoUnidad > 0 || $objProductoSaldo->saldoFraccion > 0) {
                            $tieneSaldo = true;
                        }
                        break;
                    }
                }
            }   

            $objDescuentoEspecial = ProductosDescuentosEspeciales::model()->find(array(
                'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto AND codigoPerfil=:perfil AND fechaInicio<=:fecha AND fechaFin>=:fecha ',
                'params' => array(
                    ':ciudad' => $objCiudadSector->codigoCiudad,
                    ':sector' => $objCiudadSector->codigoSector,
                    ':perfil' => $codigoPerfil,
                    ':producto' => $objProducto->codigoProducto,
                    ':fecha' => $fecha->format('Y-m-d H:i:s'),
                )
            ));

            if ($objDescuentoEspecial === null) {
                $objDescuentoEspecial = ProductosDescuentosEspeciales::model()->find(array(
                    'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto AND codigoPerfil=:perfil AND fechaInicio<=:fecha AND fechaFin>=:fecha ',
                    'params' => array(
                        ':ciudad' => $objCiudadSector->codigoCiudad,
                        ':sector' => Yii::app()->params->sector['*'],
                        ':perfil' => $codigoPerfil,
                        ':producto' => $objProducto->codigoProducto,
                        ':fecha' => $fecha->format('Y-m-d H:i:s'),
                    )
                ));
            }

            if ($objDescuentoEspecial === null) {
                $objDescuentoEspecial = ProductosDescuentosEspeciales::model()->find(array(
                    'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto AND codigoPerfil=:perfil AND fechaInicio<=:fecha AND fechaFin>=:fecha ',
                    'params' => array(
                        ':ciudad' => Yii::app()->params->ciudad['*'],
                        ':sector' => Yii::app()->params->sector['*'],
                        ':perfil' => $codigoPerfil,
                        ':producto' => $objProducto->codigoProducto,
                        ':fecha' => $fecha->format('Y-m-d H:i:s'),
                    )
                ));
            }

            if ($objDescuentoEspecial === null) {
                $objDescuentoEspecial = ProductosDescuentosEspeciales::model()->find(array(
                    'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND codigoProducto=:producto AND codigoPerfil=:perfil AND fechaInicio<=:fecha AND fechaFin>=:fecha ',
                    'params' => array(
                        ':ciudad' => Yii::app()->params->ciudad['*'],
                        ':sector' => Yii::app()->params->sector['*'],
                        ':perfil' => Yii::app()->params->perfil['*'],
                        ':producto' => $objProducto->codigoProducto,
                        ':fecha' => $fecha->format('Y-m-d H:i:s'),
                    )
                ));
            }

            if ($objDescuentoEspecial !== null){
                $this->porcentajeDescuentoPerfil = $objDescuentoEspecial->descuentoPerfil;
            	$this->ahorroUnidad += self::redondear(floor($this->precioUnidad * ($this->porcentajeDescuentoPerfil / 100)),1,10);
            	$this->ahorroUnidadDescuento += self::redondear(floor($this->precioUnidad * ($this->porcentajeDescuentoPerfil / 100)),1,10);
            }
            else {
                $objDescuentoPerfil = ProductosDescuentosPerfiles::model()->find(array(
                    'condition' => 'codigoProducto=:producto AND codigoPerfil=:perfil',
                    'params' => array(
                        ':perfil' => $codigoPerfil,
                        ':producto' => $objProducto->codigoProducto,
                    )
                ));

                if ($objDescuentoPerfil !== null){
                    $this->porcentajeDescuentoPerfil = $objDescuentoPerfil->descuentoPerfil;
                    $this->ahorroUnidad += self::redondear(floor($this->precioUnidad * ($this->porcentajeDescuentoPerfil / 100)),1,10);
                    $this->ahorroUnidadDescuento += self::redondear(floor($this->precioUnidad * ($this->porcentajeDescuentoPerfil / 100)),1,10);
                }
            }

            //consultar beneficios del producto
            //$fecha = new DateTime;
            $condition = 't.fechaIni<=:fecha AND t.fechaFin>=:fecha AND t.tipo IN (' . implode(",", Yii::app()->params->beneficios['lrv']) . ')';
            $params = array(
                ':fecha' => $fecha->format('Y-m-d'),
                ':ciudad' => $objCiudadSector->codigoCiudad,
                ':producto' => $objProducto->codigoProducto
            );

            if (esClienteFiel()) {
                $condition .= " AND (swobligaCli=0 || swobligaCli=2)";
            } else {
                $condition .= " AND swobligaCli=0";
            }
            
            $condition .= " AND (t.tipo IN (".implode(",", Yii::app()->params->beneficios['descuentos']).") )";
            
            $this->listBeneficios = Beneficios::model()->findAll(array(
                'with' => array(
                	'listCedulas',
                    'listPuntosVenta' => array('condition' => 'listPuntosVenta.codigoCiudad=:ciudad'),
                    'listBeneficiosProductos' => array('condition' => 'listBeneficiosProductos.codigoProducto=:producto')
                ),
                'condition' => $condition,
                'params' => $params,
            ));
            
            /*********************************** BENEFICIOS DE BONOS ******************************/
           
            $condition = 't.fechaIni<=:fecha AND t.fechaFin>=:fecha AND t.tipo IN (' . implode(",", Yii::app()->params->beneficios['lrv']) . ')';
            $params = array(
            		':fecha' => $fecha->format('Y-m-d'),
            		':ciudad' => $objCiudadSector->codigoCiudad,
            		':producto' => $objProducto->codigoProducto
            );
            
            if (esClienteFiel()) {
            	$condition .= " AND (swobligaCli=0 || swobligaCli=2)";
            } else {
            	$condition .= " AND swobligaCli=0";
            }
            
            $condition .= " AND (t.tipo IN (".implode(",", Yii::app()->params->beneficios['bonos']).") )";
            
            if(Yii::app()->user->isGuest)
            	$condition .= " AND (t.tipo != 25)";
            else
            	$condition .= " AND ((t.tipo = 25  AND listCedulas.numeroDocumento = '".Yii::app()->user->name."') OR (t.tipo != 25  AND listCedulas.numeroDocumento IS NULL))";
            
            $this->listBeneficiosBonos = Beneficios::model()->findAll(array(
            		'with' => array(
            				'listCedulas',
            				'listPuntosVenta' => array('condition' => 'listPuntosVenta.codigoCiudad=:ciudad'),
            				'listBeneficiosProductos' => array('condition' => 'listBeneficiosProductos.codigoProducto=:producto')
            		),
            		'condition' => $condition,
            		'params' => $params,
            ));

            $this->porcentajeDescuentoBeneficio = 0;
			
           
            if (Yii::app()->params->beneficios['configuracionActiva'] == Yii::app()->params->beneficios['configuracion']['acumulado']) {
               foreach ($this->listBeneficios as $objBeneficio) {
                    $this->porcentajeDescuentoBeneficio += $objBeneficio->dsctoUnid;
                    $this->porcentajeDescuentoBeneficioDescuento += $objBeneficio->dsctoUnid;
                    
                    $this->ahorroUnidadDescuento += self::redondear(floor($this->precioUnidad * ($objBeneficio->dsctoUnid / 100)),1,10);
                    $this->ahorroUnidad += self::redondear(floor($this->precioUnidad * ($objBeneficio->dsctoUnid / 100)),1,10);
                    //$this->ahorroFraccion=  floor($this->precioFraccionTotal * ($this->getPorcentajeDescuento() / 100));
                }
                
                foreach ($this->listBeneficiosBonos as $objBeneficio) {
                	$this->porcentajeDescuentoBeneficio += $objBeneficio->dsctoUnid;
                	$this->porcentajeDescuentoBeneficioBono += $objBeneficio->dsctoUnid;
                	
                	$this->ahorroUnidad += self::redondear(floor($this->precioUnidad * ($objBeneficio->dsctoUnid / 100)),1,10);
                	$this->ahorroUnidadBono += self::redondear(floor($this->precioUnidad * ($objBeneficio->dsctoUnid / 100)),1,10);
                }
                
            } else if (Yii::app()->params->beneficios['configuracionActiva'] == Yii::app()->params->beneficios['configuracion']['mayor']) {

                $cantBeneficios = count($this->listBeneficios);
                $objBeneficioAux = null;
                $tipoDescuento = 0;
                if ($cantBeneficios > 0) {
                	$tipoDescuento = 1;
                    $objBeneficioAux = $this->listBeneficios[0];
                    for($idx=1; $idx<$cantBeneficios; $idx++) {
                        $objBeneficio = $this->listBeneficios[$idx];
                        if ($objBeneficio->dsctoUnid > $objBeneficioAux->dsctoUnid) {
                            $objBeneficioAux = $objBeneficio;
                        }
                    }
                }
                
                // beneficios de los bonos
                
                $cantBeneficiosBonos = count($this->listBeneficiosBonos);
                
                if ($cantBeneficiosBonos > 0) {
                	if($objBeneficioAux == null){
                		$objBeneficioAux = $this->listBeneficiosBonos[0];
                		$tipoDescuento = 2;
                	}
                	for($idx=1; $idx<$cantBeneficiosBonos; $idx++) {
                		$objBeneficio = $this->listBeneficiosBonos[$idx];
                		if ($objBeneficio->dsctoUnid > $objBeneficioAux->dsctoUnid) {
                			$objBeneficioAux = $objBeneficio;
                			$tipoDescuento = 2;
                		}
                	}
                }
                if($tipo == 1){
                	$this->porcentajeDescuentoBeneficio = $objBeneficioAux->dsctoUnid;
                	$this->porcentajeDescuentoBeneficioDescuento = $objBeneficioAux->dsctoUnid;
                	
                	$this->ahorroUnidadDescuento += self::redondear(floor($this->precioUnidad * ($objBeneficioAux->dsctoUnid / 100)),1,10);
                	$this->ahorroUnidad += self::redondear(floor($this->precioUnidad * ($objBeneficioAux->dsctoUnid / 100)),1,10);
                	
                	$this->listBeneficios = array($objBeneficioAux);
                }
                else{
	                $this->porcentajeDescuentoBeneficio = $objBeneficioAux->dsctoUnid;
	                $this->porcentajeDescuentoBeneficioBono = $objBeneficioAux->dsctoUnid;
	                 
	                $this->ahorroUnidad += self::redondear(floor($this->precioUnidad * ($objBeneficioAux->dsctoUnid / 100)),1,10);
	                $this->ahorroUnidadBono = self::redondear(floor($this->precioUnidad * ($objBeneficioAux->dsctoUnid / 100)),1,10);
	                 
	                $this->listBeneficiosBonos = array($objBeneficioAux);
                }
            } else {
                $this->porcentajeDescuentoBeneficio = 0;
                $this->listBeneficios = array();
                $this->listBeneficiosBonos = array();
            }

            //restriccion de maximo de beneficio
            if ($this->porcentajeDescuentoBeneficio > Yii::app()->params->beneficios['porcentajeMaximo']) {
                $this->porcentajeDescuentoBeneficio = 0;
                $this->listBeneficios = array();
                $this->ahorroUnidad = 0;
                $this->ahorroUnidadDescuento = 0;
                $this->ahorroUnidadBono = 0;
            }

            if ($objCiudadSector->esDefecto() || ($tienePrecio && $tieneSaldo)) {
                $this->precioFraccionTotal = $this->precioFraccion * $this->unidadFraccionamiento;
                $this->precioUnidad = self::redondear($this->precioUnidad, 1);
                $this->precioFraccionTotal = self::redondear($this->precioFraccionTotal, 1);
                /*
                $this->ahorroUnidad = floor($this->precioUnidad * ($this->getPorcentajeDescuento() / 100));
                //$this->ahorroFraccion=  floor($this->precioFraccionTotal * ($this->getPorcentajeDescuento() / 100));
                $this->ahorroUnidad = self::redondear($this->ahorroUnidad, 1, 10);
               
                $this->ahorroUnidadDescuento = floor($this->precioUnidad * ($this->getPorcentajeDescuentoDescuento() / 100));
                   //$this->ahorroFraccion=  floor($this->precioFraccionTotal * ($this->getPorcentajeDescuento() / 100));
                $this->ahorroUnidadDescuento = self::redondear($this->ahorroUnidadDescuento, 1);
                
                $this->ahorroUnidadBono = floor($this->precioUnidad * ($this->getPorcentajeDescuentoBono(self::DESCUENTO_BENEFICIO) / 100));
                //$this->ahorroFraccion=  floor($this->precioFraccionTotal * ($this->getPorcentajeDescuento() / 100));
                $this->ahorroUnidadBono = self::redondear($this->ahorroUnidadBono, 1);
                */ 
                //$this->ahorroFraccion = self::redondear($this->ahorroFraccion, 1);
                $this->inicializado = true;
                
                if($this->precioUnidad<=0){
                	$this->inicializado = false;
                }
            }
        }

        $this->listPuntos = Puntos::model()->findAll(array(
            'with' => array('listPuntosProductos' => array('condition' => 'listPuntosProductos.codigoProducto=:producto AND listPuntosProductos.cantidad=:cantidad')),
            'condition' => 'codigoPunto=:tipo AND activo=:activo AND fechaInicio<=:fecha AND fechaFin>=:fecha',
            'params' => array(
                ':tipo' => Yii::app()->params->puntos['producto'],
                ':activo' => 1,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':producto' => $objProducto->codigoProducto,
                ':cantidad' => 1,
            )
        ));
    }
    
    
    

    public function getPrecio() {
        $params = func_get_args();

        $tipo = isset($params[0]) ? $params[0] : -1;
        $descuento = isset($params[1]) ? $params[1] : true;
        $tiposBeneficios = isset($params[2]) ? $params[2] : true;
        if ($tipo == self::PRECIO_UNIDAD) {
            if ($descuento){
            	if($tiposBeneficios)
                	return $this->precioUnidad - $this->ahorroUnidad;
            	else
            		return $this->precioUnidad - $this->ahorroUnidadDescuento;
            }		
            else
            	return $this->precioUnidad;
            	
        }else if ($tipo == self::PRECIO_FRACCION) {
            if ($descuento == true){
            		if($tiposBeneficios)
                		return $this->precioFraccionTotal - $this->ahorroFraccion;
            		else
            			return $this->precioFraccionTotal - $this->ahorroFraccionDescuento;
            }
            else{
            	if($tiposBeneficios)
                	return $this->precioFraccionTotal;
            }
        }else {
            //throw new Exception("Tipo precio indefinido");
            return "";
        }
    }

    public function getAhorro() {
        $params = func_get_args();
        $tipo = isset($params[0]) ? $params[0] : -1;
        $tiposBeneficios = isset($params[1]) ? $params[1] : true;

        if ($tipo == self::PRECIO_UNIDAD) {
        	if($tiposBeneficios)
            	return $this->ahorroUnidad;
        	else
        		return $this->ahorroUnidadDescuento;
        } else if ($tipo == self::PRECIO_FRACCION) {
        	if($tiposBeneficios)
            	return $this->ahorroFraccion;
        	else
        		return $this->ahorroFraccionDescuento;
        } else {
            //throw new Exception("Tipo precio indefinido");
            return "";
        }
    }
    
    public function getBono(){
    	return $this->ahorroUnidadBono;
    }
    

}
