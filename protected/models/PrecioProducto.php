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
    protected $ahorroFraccion = 0;

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
                			'condition' => '(codigoProducto=:producto AND codigoCedi=:codigoCedi',
                			'params' => array(
                					':codigoCedi' => $objProducto->objCiudad->codigoSucursal,
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

            if ($objDescuentoEspecial !== null)
                $this->porcentajeDescuentoPerfil = $objDescuentoEspecial->descuentoPerfil;
            else {
                $objDescuentoPerfil = ProductosDescuentosPerfiles::model()->find(array(
                    'condition' => 'codigoProducto=:producto AND codigoPerfil=:perfil',
                    'params' => array(
                        ':perfil' => $codigoPerfil,
                        ':producto' => $objProducto->codigoProducto,
                    )
                ));

                if ($objDescuentoPerfil !== null)
                    $this->porcentajeDescuentoPerfil = $objDescuentoPerfil->descuentoPerfil;
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
            $condition .= " AND t.tipo != 25";

            $this->listBeneficios = Beneficios::model()->findAll(array(
                'with' => array(
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
                }
            } else if (Yii::app()->params->beneficios['configuracionActiva'] == Yii::app()->params->beneficios['configuracion']['mayor']) {

                $cantBeneficios = count($this->listBeneficios);

                if ($cantBeneficios > 0) {
                    $objBeneficioAux = $this->listBeneficios[0];
                    for($idx=1; $idx<$cantBeneficios; $idx++) {
                        $objBeneficio = $this->listBeneficios[$idx];
                        if ($objBeneficio->dsctoUnid > $objBeneficioAux->dsctoUnid) {
                            $objBeneficioAux = $objBeneficio;
                        }
                    }
                    $this->porcentajeDescuentoBeneficio = $objBeneficioAux->dsctoUnid;
                    $this->listBeneficios = array($objBeneficioAux);
                }
            } else {
                $this->porcentajeDescuentoBeneficio = 0;
                $this->listBeneficios = array();
            }

            //restriccion de maximo de beneficio
            if ($this->porcentajeDescuentoBeneficio > Yii::app()->params->beneficios['porcentajeMaximo']) {
                $this->porcentajeDescuentoBeneficio = 0;
                $this->listBeneficios = array();
            }

            if ($tienePrecio && $tieneSaldo) {
                $this->precioFraccionTotal = $this->precioFraccion * $this->unidadFraccionamiento;
                $this->precioUnidad = self::redondear($this->precioUnidad, 1);
                $this->precioFraccionTotal = self::redondear($this->precioFraccionTotal, 1);
                $this->ahorroUnidad = floor($this->precioUnidad * ($this->getPorcentajeDescuento() / 100));
                //$this->ahorroFraccion=  floor($this->precioFraccionTotal * ($this->getPorcentajeDescuento() / 100));
                $this->ahorroUnidad = self::redondear($this->ahorroUnidad, 1);
                //$this->ahorroFraccion = self::redondear($this->ahorroFraccion, 1);
                $this->inicializado = true;
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
        if ($tipo == self::PRECIO_UNIDAD) {
            if ($descuento)
                return $this->precioUnidad - $this->ahorroUnidad;
            else
                return $this->precioUnidad;
        }else if ($tipo == self::PRECIO_FRACCION) {
            if ($descuento == true)
                return $this->precioFraccionTotal - $this->ahorroFraccion;
            else
                return $this->precioFraccionTotal;
        }else {
            //throw new Exception("Tipo precio indefinido");
            return "";
        }
    }

    public function getAhorro() {
        $params = func_get_args();
        $tipo = isset($params[0]) ? $params[0] : -1;

        if ($tipo == self::PRECIO_UNIDAD) {
            return $this->ahorroUnidad;
        } else if ($tipo == self::PRECIO_FRACCION) {
            return $this->ahorroFraccion;
        } else {
            //throw new Exception("Tipo precio indefinido");
            return "";
        }
    }

}
