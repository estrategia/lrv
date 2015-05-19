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

    function __construct(Producto &$objProducto, &$objCiudadSector, $codigoPerfil) {
        if ($objCiudadSector != null) {
            if ($objProducto->tercero == 1) {
                foreach ($objProducto->listSaldosTerceros as $objProductoSaldoTercero) {
                    if ($objProductoSaldoTercero->codigoCiudad == $objCiudadSector->codigoCiudad && $objProductoSaldoTercero->codigoSector == $objCiudadSector->codigoSector) {
                        $this->precioUnidad = $objProductoSaldoTercero->precioUnidad;
                        $this->precioFraccion = $objProductoSaldoTercero->precioFraccion;
                        $this->unidadFraccionamiento = $objProducto->unidadFraccionamiento;
                        $this->flete = $objProductoSaldoTercero->flete;
                        $this->tiempoEntrega = $objProductoSaldoTercero->tiempoDomicilio;
                        break;
                    }
                }
            } else {
                foreach ($objProducto->listPrecios as $objProductoPrecio) {
                    if ($objProductoPrecio->codigoCiudad == $objCiudadSector->codigoCiudad && $objProductoPrecio->codigoSector == $objCiudadSector->codigoSector) {
                        $this->precioUnidad = $objProductoPrecio->precioUnidad;
                        $this->precioFraccion = $objProductoPrecio->precioFraccion;
                        $this->unidadFraccionamiento = $objProducto->unidadFraccionamiento;
                        break;
                    }
                }
            }

            $fecha = new DateTime;
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
            $fecha = new DateTime;
            $condition = 't.fechaIni<=:fecha AND t.fechaFin>=:fecha AND t.tipo IN (' . implode(",", Yii::app()->params->beneficios['lrv']) . ')';
            $params = array(
                ':fecha' => $fecha->format('Y-m-d'),
                ':ciudad' => $objCiudadSector->codigoCiudad,
                ':producto' => $objProducto->codigoProducto
            );
            
            if ($codigoPerfil == Yii::app()->params->perfil['clienteFiel']) {
                $condition .= ' AND (swobligaCli=0 || swobligaCli=1)';
            } else {
                $condition .= ' AND swobligaCli=0';
            }
            
            $this->listBeneficios = Beneficios::model()->findAll(array(
                'with' => array(
                    'listPuntosVenta' => array('condition' => 'listPuntosVenta.codigoCiudad=:ciudad'),
                    'listBeneficiosProductos' => array('condition' => 'listBeneficiosProductos.codigoProducto=:producto')
                ),
                'condition' => $condition,
                'params' => $params,
            ));

            $this->porcentajeDescuentoBeneficio = 0;
            foreach ($this->listBeneficios as $objBeneficio) {
                $this->porcentajeDescuentoBeneficio += $objBeneficio->dsctoUnid;
            }

            //se deja solo mayor descuento
            if ($this->tieneBeneficio() && $this->porcentajeDescuentoBeneficio >= $this->porcentajeDescuentoPerfil) {
                $this->porcentajeDescuentoPerfil = 0;
            } else {
                $this->porcentajeDescuentoBeneficio = 0;
                $this->listBeneficios = array();
            }
            
            $this->precioFraccionTotal = $this->precioFraccion * $this->unidadFraccionamiento;
            $this->precioUnidad = self::redondear($this->precioUnidad,1);
            $this->precioFraccionTotal = self::redondear($this->precioFraccionTotal,1);
            $this->ahorroUnidad = floor($this->precioUnidad * ($this->getPorcentajeDescuento() / 100));
            $this->ahorroFraccion=  floor($this->precioFraccionTotal * ($this->getPorcentajeDescuento() / 100));
            $this->ahorroUnidad = self::redondear($this->ahorroUnidad, 0);
            $this->ahorroFraccion = self::redondear($this->ahorroFraccion, 0);

            $this->inicializado = true;
        }
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
            throw new Exception("Tipo precio indefinido");
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
            throw new Exception("Tipo precio indefinido");
        }
    }

}
