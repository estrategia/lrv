<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of FormaPagoForm
 *
 * @author miguel.sanchez
 */
class FormaPagoForm extends CFormModel {

    //put your code here
    public $identificacionUsuario;
    public $idDireccionDespacho;
    public $fechaEntrega;
    public $comentario;
    public $idFormaPago;
    public $numeroTarjeta;
    public $cuotasTarjeta;
    public $bono = array();
    public $usoBono = array();
    public $confirmacion;
    public $listCodigoEspecial = array();
    public $pasoValidado = array();
    public $listPuntosVenta = array(0 => 0, 1 => 'No consultado');
    public $indicePuntoVenta;
    public $objHorarioCiudadSector = null;
    public $pagoExpress = false;
    public $telefonoContacto;
    public $pagoInvitado = false;
    public $descripcion;
    public $nombre;
    public $direccion;
    public $barrio;
    public $telefono;
    public $extension;
    public $celular;
    public $correoElectronico;
    public $correoElectronicoContacto;
    public $tipoEntrega;
    public $isMobil = true;
    public $totalCompra = null;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        //Yii::log("validacion 0\n", CLogger::LEVEL_INFO, 'application');
        if ($this->isMobil) {
            if (isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != null) {
                $this->tipoEntrega = Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']];
            }
        }

        $rules = array();
        $rules[] = array('tipoEntrega', 'required', 'message' => '{attribute} no puede estar vacío');
        $rules[] = array('tipoEntrega', 'in', 'range' => Yii::app()->params->entrega['listaTipos'], 'allowEmpty' => false);
        //$rules[] = array('idDireccionDespacho', 'default', 'value' => null);

        if ($this->pagoInvitado) {
            $rules[] = array('identificacionUsuario', 'safe');
            $rules[] = array('identificacionUsuario', 'default', 'value' => null);
        } else {
            $rules[] = array('identificacionUsuario', 'required', 'message' => '{attribute} no puede estar vacío');
        }

        //Yii::log("validacion 1\n", CLogger::LEVEL_INFO, 'application');
        //Yii::log("this->pagoInvitado: " . CVarDumper::dumpAsString($this->pagoInvitado) . "\n", CLogger::LEVEL_INFO, 'application');

        if ($this->pagoInvitado) {
            //Yii::log("validacion 2\n", CLogger::LEVEL_INFO, 'application');
            //echo "<br/>PAGO INVITADO<br/>";
            //$rules[] = array('descripcion, nombre, direccion, barrio, telefono, extension, celular, correoElectronico', 'attributeTrim');

            if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
                //Yii::log("validacion 3\n", CLogger::LEVEL_INFO, 'application');
                //echo "<br/>PAGO INVITADO DOMICILIO<br/>";
                $rules[] = array('descripcion, nombre, direccion, barrio, telefono', 'required', 'on' => 'despacho, informacion, finalizar', 'message' => '{attribute} no puede estar vacío');

                $rules[] = array('correoElectronico', 'required', 'on' => 'despacho, informacion, finalizar', 'message' => '{attribute} no puede estar vacío');
                $rules[] = array('correoElectronico', 'email', 'on' => 'despacho, informacion, finalizar');
                $rules[] = array('correoElectronico', 'length', 'max' => 50, 'on' => 'despacho, informacion, finalizar');

                $rules[] = array('correoElectronicoContacto', 'safe');

                $rules[] = array('extension, telefono, celular', 'numerical', 'integerOnly' => true, 'on' => 'despacho, informacion, finalizar', 'message' => '{attribute} deber ser número');
                $rules[] = array('direccion', 'length', 'min' => 5, 'max' => 100, 'on' => 'despacho, informacion, finalizar');
                $rules[] = array('descripcion', 'length', 'min' => 3, 'max' => 50, 'on' => 'despacho, informacion, finalizar');
                $rules[] = array('nombre, barrio', 'length', 'min' => 5, 'max' => 50, 'on' => 'despacho, informacion, finalizar');
                $rules[] = array('celular', 'length', 'min' => 5, 'max' => 20, 'on' => 'despacho, informacion, finalizar');
                $rules[] = array('telefono', 'length', 'min' => 5, 'max' => 11, 'on' => 'despacho, informacion, finalizar');
                $rules[] = array('extension', 'length', 'max' => 5, 'on' => 'despacho, informacion, finalizar');
            } else if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                //Yii::log("validacion 5\n", CLogger::LEVEL_INFO, 'application');
                // echo "<br/>PAGO PRESENCIAL<br/>";
                $rules[] = array('descripcion, nombre, direccion, barrio, extension, telefono, celular', 'safe');

                $rules[] = array('correoElectronico', 'safe');

                $rules[] = array('correoElectronicoContacto', 'required', 'on' => 'entrega, informacion, finalizar', 'message' => '{attribute} no puede estar vacío');
                $rules[] = array('correoElectronicoContacto', 'email', 'on' => 'entrega, informacion, finalizar');
                $rules[] = array('correoElectronicoContacto', 'length', 'max' => 50, 'on' => 'entrega, informacion, finalizar');
            }

            //Yii::log("validacion 6\n", CLogger::LEVEL_INFO, 'application');


            $rules[] = array('idDireccionDespacho', 'safe');
            $rules[] = array('celular, extension, idDireccionDespacho', 'default', 'value' => null);
        } else {
            //Yii::log("validacion 7\n", CLogger::LEVEL_INFO, 'application');

            $rules[] = array('descripcion, nombre, direccion, barrio, extension, telefono, celular, correoElectronico, correoElectronicoContacto', 'safe');
            //$rules[] = array('idDireccionDespacho', 'required', 'on' => 'despacho, informacion, finalizar', 'message' => '{attribute} no puede estar vacío');

            if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
                //Yii::log("validacion 8\n", CLogger::LEVEL_INFO, 'application');
                $rules[] = array('idDireccionDespacho', 'required', 'on' => 'despacho, informacion, finalizar', 'message' => '{attribute} no puede estar vacío');
            } else if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
                //Yii::log("validacion 9\n", CLogger::LEVEL_INFO, 'application');
                $rules[] = array('idDireccionDespacho', 'safe');
            }
        }

        //Yii::log("validacion 10\n", CLogger::LEVEL_INFO, 'application');

        $rules[] = array('fechaEntrega', 'required', 'on' => 'entrega, informacion, finalizar', 'message' => '{attribute} no puede estar vacío');
        $rules[] = array('comentario', 'length', 'max' => 250, 'on' => 'entrega, informacion, finalizar');
        $rules[] = array('fechaEntrega', 'fechaValidate', 'on' => 'entrega, informacion, finalizar');
        $rules[] = array('idFormaPago', 'required', 'on' => 'pago, informacion, finalizar', 'message' => 'Seleccionar forma de pago');
        $rules[] = array('numeroTarjeta, cuotasTarjeta', 'safe');
        $rules[] = array('comentario, numeroTarjeta, cuotasTarjeta', 'default', 'value' => null);
        $rules[] = array('usoBono', 'bonoValidate', 'on' => 'pago, informacion, finalizar');
        $rules[] = array('idFormaPago', 'pagoValidate', 'on' => 'pago, informacion, finalizar');
        $rules[] = array('confirmacion', 'compare', 'compareValue' => 1, 'on' => 'confirmacion, finalizar', 'message' => 'Aceptar términos anteriores');

        if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['presencial']) {
            //Yii::log("validacion 11\n", CLogger::LEVEL_INFO, 'application');
            $rules[] = array('telefonoContacto', 'required', 'on' => 'entrega, informacion, finalizar', 'message' => '{attribute} no puede estar vacío');
            $rules[] = array('telefonoContacto', 'numerical', 'integerOnly' => true, 'on' => 'entrega, informacion, finalizar', 'message' => '{attribute} deber ser número');
            $rules[] = array('telefonoContacto', 'length', 'min' => 5, 'max' => 50, 'on' => 'entrega, informacion, finalizar');

            if ($this->isMobil) {
                $rules[] = array('indicePuntoVenta', 'safe');
            } else {
                $rules[] = array('indicePuntoVenta', 'required', 'on' => 'informacion', 'message' => 'Seleccionar Punto de Venta');
            }
        } else if ($this->tipoEntrega == Yii::app()->params->entrega['tipo']['domicilio']) {
            //Yii::log("validacion 12\n", CLogger::LEVEL_INFO, 'application');
            $rules[] = array('telefonoContacto', 'safe');
            $rules[] = array('telefonoContacto', 'default', 'value' => null);
        }

        //Yii::log("validacion 13\n", CLogger::LEVEL_INFO, 'application');
        //array('clienteFielValidate', 'on' => 'pago, finalizar'),
        //array('codigoPromocion', 'promocionValidate', 'on' => 'pago, finalizar'),
        //array('descripcion, nombre, barrio, telefono, celular', 'length', 'max' => 50);
        //Yii::log("Rules:\n" . CVarDumper::dumpAsString($rules), CLogger::LEVEL_INFO, 'application');

        return $rules;
    }

    /**
     * Valida que exista empleado con cedula indicada y que este activo.
     * Este es un validador declarado en rules().
     */
    public function attributeTrim($attribute, $params) {
        if ($this->$attribute != null && gettype($this->$attribute) == "string") {
            $this->$attribute = trim($this->$attribute);
        }
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'identificacionUsuario' => 'Cédula',
            'idDireccionDespacho' => 'Dirección de despacho',
            'fechaEntrega' => 'Programación de entrega',
            'comentario' => 'Comentario adicional',
            'idFormaPago' => 'Forma de pago',
            'numeroTarjeta' => 'Número tarjeta',
            'cuotasTarjeta' => 'Cuotas',
            'confirmacion' => 'Acepto términos anteriores',
            'usoBono' => 'Bono',
            'telefonoContacto' => 'Teléfono de contacto',
            'descripcion' => 'Descripción',
            'nombre' => 'Nombre',
            'direccion' => 'Dirección',
            'barrio' => 'Barrio',
            'telefono' => 'Teléfono',
            'celular' => 'Celular',
            'extension' => 'Extensión',
            'correoElectronico' => 'Correo electrónico',
            'correoElectronicoContacto' => 'Correo electrónico',
            'indicePuntoVenta' => 'Punto de Venta',
        );
    }

    public function calcularConfirmacion($positions) {
        $this->confirmacion = null;
        $this->validarConfirmacion($positions);
    }

    public function validarConfirmacion($positions) {
        $listEspecialTmp = $this->listCodigoEspecial;
        $this->listCodigoEspecial = array();

        foreach ($positions as $position) {
            if ($position->isProduct()) {
                if ($position->objProducto->objCodigoEspecial->confirmacionCompra == 1) {
                    $this->listCodigoEspecial[$position->objProducto->objCodigoEspecial->codigoEspecial] = $position->objProducto->objCodigoEspecial;

                    if (!isset($listEspecialTmp[$position->objProducto->objCodigoEspecial->codigoEspecial])) {
                        $this->confirmacion = null;
                        //echo "Cambia Confirmacion [".$position->objProducto->objCodigoEspecial->codigoEspecial."]<br/>";
                    }
                }
            }
        }

        if (empty($this->listCodigoEspecial)) {
            $this->confirmacion = 1;
        }
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function pagoValidate($attribute, $params) {
        //Yii::log("pagoValidate IN\n", CLogger::LEVEL_INFO, 'application');
        
        if ($this->idFormaPago == Yii::app()->params->formaPago['idCredirebaja']) {
            if ($this->numeroTarjeta === null) {
                $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " no puede estar vacío ");
            } else {
                $this->numeroTarjeta = trim($this->numeroTarjeta);

                if (is_numeric($this->numeroTarjeta)) {
                    if (strlen($this->numeroTarjeta) != 12) {
                        $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " debe tener 12 dígitos");
                    }
                } else {
                    $this->addError('numeroTarjeta', $this->getAttributeLabel('numeroTarjeta') . " debe ser numerico");
                }
            }

            if ($this->cuotasTarjeta === null || empty($this->cuotasTarjeta)) {
                $this->addError('cuotasTarjeta', $this->getAttributeLabel('cuotasTarjeta') . " no puede estar vacío");
            } else {
                $int = intval($this->cuotasTarjeta);
                if ($int <= 0 || $int > 6) {
                    $this->addError('cuotasTarjeta', $this->getAttributeLabel('cuotasTarjeta') . " debe ser número entre 1 y 6");
                }
            }
        } else {
            $totalCompra = $this->totalCompra - $this->calcularBonoRedimido();
            
            //Yii::log("pagoValidate -- formapago:$this->idFormaPago -- total: " . $totalCompra , CLogger::LEVEL_INFO, 'application');
            $this->numeroTarjeta = null;
            $this->cuotasTarjeta = null;
            if ($this->idFormaPago == Yii::app()->params->formaPago['pasarela']['idPasarela']) {
                //Yii::log("pagoValidate -- IN PASARELA " , CLogger::LEVEL_INFO, 'application');
                
                if ($totalCompra < Yii::app()->params->formaPago['pasarela']['valorMinimo']) {
                    //Yii::log("pagoValidate -- IN VALOR MINIMO PASARELA " , CLogger::LEVEL_INFO, 'application');
                    $this->addError('idFormaPago', "Compra por pasarela debe ser mayor a " . Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], Yii::app()->params->formaPago['pasarela']['valorMinimo'], Yii::app()->params->formatoMoneda['moneda']));
                }
            }
        }
    }

    public function bonoValidate($attribute, $params) {
        if (!empty($this->bono)) {
            if (empty($this->usoBono)) {
                $this->addError('usoBono', $this->getAttributeLabel('usoBono') . " no puede estar vac&iacute;o");
            } else {
                if (count($this->bono) == count($this->usoBono)) {
                    $totalBono = 0;
                    foreach ($this->bono as $idx => $bono) {
                        if (!isset($this->usoBono[$idx])) {
                            $this->addError('usoBono', $this->getAttributeLabel('usoBono') . " inv&aacute;lido");
                            break;
                        }
                        
                        if(!$this->bono[$idx]['disponibleCompra'] && $this->usoBono[$idx]==1){
                            $this->usoBono[$idx]=0;
                        }
                        
                        if($this->usoBono[$idx]==1){
                            $totalBono+= $this->bono[$idx]['valor'];
                        }
                    }
                    
                    if($this->totalCompra !== null && $this->totalCompra<$totalBono){
                        $this->addError('usoBono', "Total bono [$totalBono] excede total de compra [$this->totalCompra]");
                    }
                } else {
                    $this->addError('usoBono', $this->getAttributeLabel('usoBono') . " inv&aacute;lido");
                }
            }
        }
    }

    public function consultarBono($total = null) {
        $this->bono = array();
        $auxUsoBono = $this->usoBono;
        $this->usoBono = array();
        $this->totalCompra = $total;

        $fecha = date('Y-m-d');

        //-- bonos propios de la tienda
        $condicionBonos = "identificacionUsuario=:usuario AND vigenciaInicio<=:fecha AND vigenciaFin>=:fecha AND estado=:estado";
        $paramsBonos = array(
            ':usuario' => $this->identificacionUsuario,
            ':fecha' => $fecha,
            ':estado' => 1,
        );

        /* if ($total !== null) {
          $condicionBonos .= " AND minimoCompra<=:total";
          $paramsBonos[':total'] = $total;
          } */

        $listBonosTienda = BonosTienda::model()->findAll(array(
            'condition' => $condicionBonos,
            'params' => $paramsBonos
        ));

        foreach ($listBonosTienda as $objBono) {
            $this->bono["$objBono->idBonoTienda"] = array(
                'valor' => $objBono->valor,
                'disponibleCompra' => ($this->totalCompra !== null && $this->totalCompra >= $objBono->minimoCompra),
                'vigenciaInicio' => "$objBono->vigenciaInicio",
                'vigenciaFin' => "$objBono->vigenciaFin",
                'minimoCompra' => $objBono->minimoCompra,
                'concepto' => $objBono->concepto,
            );

            $this->usoBono["$objBono->idBonoTienda"] = 0;
        }
        //-- bonos propios de la tienda
        //-- bono crm
        ini_set('default_socket_timeout', 5);
        $client = new SoapClient(null, array(
            'location' => Yii::app()->params->webServiceUrl['crmLrv'],
            'uri' => "",
            'trace' => 1,
            'connection_timeout' => 5,
        ));

        try {
            $result = $client->__soapCall("ConsultarBono", array('identificacion' => $this->identificacionUsuario));

            if (!empty($result) && $result[0]->ESTADO == 1 && $result[0]->VALOR_BONO > 0) {
                $fechaDate = new DateTime;
                $vigInicio = DateTime::createFromFormat('Y-m-d', $result[0]->VIGENCIA_INICIO);
                $vigFin = DateTime::createFromFormat('Y-m-d', $result[0]->VIGENCIA_FINA);
                $diff1 = $fechaDate->diff($vigFin);
                $diff2 = $vigInicio->diff($fechaDate);

                if ($diff1->invert == 0 && $diff2->invert == 0) {
                    $this->bono['crm'] = array(
                        'valor' => $result[0]->VALOR_BONO,
                        'disponibleCompra' => ($this->totalCompra !== null && $this->totalCompra >= $result[0]->VALOR_BONO),
                        'vigenciaInicio' => $result[0]->VIGENCIA_INICIO,
                        'vigenciaFin' => $result[0]->VIGENCIA_FINA,
                        'minimoCompra' => $result[0]->VALOR_BONO,
                        'concepto' => 'Cliente Fiel',
                    );
                    $this->usoBono["crm"] = 0;
                }
            }
        } catch (SoapFault $exc) {
            Yii::log("SoapFault WebService ConsultarBono [$this->identificacionUsuario]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n" . $client->__getLastResponse(), CLogger::LEVEL_INFO, 'application');
        } catch (Exception $exc) {
            Yii::log("Exception WebService ConsultarBono [$this->identificacionUsuario]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
        }
        //-- bono crm

        foreach ($this->bono as $idx => $bono) {
            if (isset($auxUsoBono[$idx]) && isset($this->usoBono[$idx])) {
                $this->usoBono[$idx] = $auxUsoBono[$idx];
            }
        }
    }

    public function actualizarBono(Compras $objCompra) {
        if (empty($this->bono)) {
            Yii::log("ActualizarBono: No existe bono consultado [$this->identificacionUsuario]", CLogger::LEVEL_INFO, 'application');
        } else {
            foreach ($this->bono as $idx => $bono) {
                if ($this->usoBono[$idx] == 1) {
                    if ($idx == 'crm') {
                        ini_set('default_socket_timeout', 5);
                        $client = new SoapClient(null, array(
                            'location' => Yii::app()->params->webServiceUrl['crmLrv'],
                            'uri' => "",
                            'trace' => 1,
                            'connection_timeout' => 5,
                        ));

                        try {
                            $result = $client->__soapCall("ActualizarBono", array('identificacion' => $this->identificacionUsuario));
                            if (empty($result) || $result[0]->ESTADO == 0) {
                                throw new Exception("Error al actualizar bono: " . CVarDumper::dumpAsString($result));
                            }
                        } catch (SoapFault $exc) {
                            Yii::log("ActualizarBono-CRM: SoapFault WebService [idCompra: $objCompra->idCompra -- idbono: $idx -- idUsuario: $objCompra->identificacionUsuario]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\nRESPONSE WS:\n" . $client->__getLastResponse(), CLogger::LEVEL_INFO, 'application');
                        } catch (Exception $exc) {
                            Yii::log("ActualizarBono-CRM: Exception WebService  [idCompra: $objCompra->idCompra -- idbono: $idx -- idUsuario: $objCompra->identificacionUsuario]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
                        }
                    } else {
                        $valorCompra = $objCompra->totalCompra + $this->calcularBonoRedimido(); //$objCompra->subtotalCompra + $objCompra->domicilio + $objCompra->flete

                        try {
                            $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $objCompra->fechaCompra)->format('Y-m-d');

                            $objBonoTienda = BonosTienda::model()->find(array(
                                'condition' => 'idBonoTienda=:idBono AND identificacionUsuario=:usuario  AND vigenciaInicio<=:fecha AND vigenciaFin>=:fecha AND estado=:estado AND minimoCompra<=:total',
                                'params' => array(
                                    ':idBono' => $idx,
                                    ':usuario' => $objCompra->identificacionUsuario,
                                    ':fecha' => $fecha,
                                    ':estado' => 1,
                                    ':total' => $valorCompra
                                )
                            ));

                            if ($objBonoTienda === null) {
                                Yii::log("ActualizarBono-Tienda: NULL [idCompra: $objCompra->idCompra -- idbono: $idx -- idUsuario: $objCompra->identificacionUsuario]", CLogger::LEVEL_INFO, 'application');
                            } else {
                                $objBonoTienda->estado = 0;
                                $objBonoTienda->idCompra = $objCompra->idCompra;
                                $objBonoTienda->valorCompra = $valorCompra;
                                $objBonoTienda->fechaUso = $objCompra->fechaCompra;
                                if (!$objBonoTienda->save()) {
                                    Yii::log("ActualizarBono-Tienda: cambio estado [idCompra: $objCompra->idCompra -- idbono: $idx -- idUsuario: $objCompra->identificacionUsuario]\n" . CActiveForm::validate($objBonoTienda), CLogger::LEVEL_INFO, 'application');
                                }
                            }
                        } catch (Exception $ex) {
                            Yii::log("ActualizarBono-Tienda: Exception [idCompra: $objCompra->idCompra -- idbono: $idx -- idUsuario: $objCompra->identificacionUsuario]\n" . $ex->getMessage() . "\n" . $ex->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
                        }
                    }
                }
            }
        }
    }

    public function calcularBonoRedimido() {
        $valorBono = 0;

        foreach ($this->bono as $idx => $bono) {
            if ($this->usoBono[$idx] == 1) {
                $valorBono += $bono['valor'];
            }
        }

        return $valorBono;
    }

    public function actualizarBono0() {
        if ($this->bono !== null && $this->usoBono == 1) {
            //$deftimeout = ini_get('default_socket_timeout');
            ini_set('default_socket_timeout', 5);
            $client = new SoapClient(null, array(
                'location' => Yii::app()->params->webServiceUrl['crmLrv'],
                'uri' => "",
                'trace' => 1,
                'connection_timeout' => 5,
            ));

            try {
                $result = $client->__soapCall("ActualizarBono", array('identificacion' => $this->identificacionUsuario));
                //ini_set('default_socket_timeout', $deftimeout);

                if (empty($result) || $result[0]->ESTADO == 0) {
                    throw new Exception("Error al actualizar bono: " . CVarDumper::dumpAsString($result));
                }
            } catch (SoapFault $exc) {
                //ini_set('default_socket_timeout', $deftimeout);
                Yii::log("SoapFault WebService ActualizarBono [$this->identificacionUsuario]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\nRESPONSE WS:\n" . $client->__getLastResponse(), CLogger::LEVEL_INFO, 'application');
            } catch (Exception $exc) {
                //ini_set('default_socket_timeout', $deftimeout);
                Yii::log("Exception WebService ActualizarBono [$this->identificacionUsuario]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
            }
        } else {
            Yii::log("Error al actualizar bono - no existe bono consultado [$this->identificacionUsuario]\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
        }
    }

    public function consultarHorario($objSectorCiudad) {
        if ($objSectorCiudad != null) {
            if ($this->objHorarioCiudadSector == null || $this->objHorarioCiudadSector->codigoCiudad != $objSectorCiudad->codigoCiudad || $this->objHorarioCiudadSector->codigoSector != $objSectorCiudad->codigoSector) {
                $this->objHorarioCiudadSector = HorariosCiudadSector::model()->find(array(
                    'condition' => 'codigoCiudad=:ciudad AND codigoSector=:sector AND estadoCiudadSector=:estado',
                    'params' => array(
                        ':estado' => 1,
                        ':ciudad' => $objSectorCiudad->codigoCiudad,
                        ':sector' => $objSectorCiudad->codigoSector
                    )
                ));
            }
        }
    }

    public function tieneDomicilio($objSectorCiudad) {
        $this->consultarHorario($objSectorCiudad);

        if ($this->objHorarioCiudadSector == null || ($this->objHorarioCiudadSector != null && $this->objHorarioCiudadSector->sadCiudadSector == 0)) {
            return false;
        }

        return true;
    }

    public function consultarDisponibilidad($shoppingCart) {
        //$positions = $shoppingCart->getPositions();
        $this->indicePuntoVenta = null;
        $this->listPuntosVenta = array(0 => 0, 1 => 'Consulta no exitosa');

        $productos = array();
        foreach ($shoppingCart->getPositions() as $position) {
            if ($position->isProduct()) {
                $productos[] = array(
                    "CODIGO_PRODUCTO" => $position->objProducto->codigoProducto,
                    "ID_PRODUCTO" => $position->objProducto->codigoProducto,
                    "CANTIDAD" => $position->getQuantityUnit(),
                    "DESCRIPCION" => $position->objProducto->descripcionProducto,
                );
            }
        }

        /* CVarDumper::dump($productos,10,true);
          echo "<br/>";
          echo "<br/>"; */
        try {
            $client = new SoapClient(null, array(
                'location' => Yii::app()->params->webServiceUrl['serverLRV'],
                'uri' => "",
                'trace' => 1
            ));
            $this->listPuntosVenta = $client->__soapCall("LRVConsultarSaldoMovil", array(
                'productos' => $productos,
                'ciudad' => $shoppingCart->getCodigoCiudad(),
                'sector' => $shoppingCart->getCodigoSector()
            ));
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            $this->listPuntosVenta = array(0 => 0, 1 => 'Error al consultar disponibilidad de productos');
        }

        if (empty($this->listPuntosVenta)) {
            $this->listPuntosVenta = array(0 => 0, 1 => 'No hay disponibilidad de productos');
        }

        //CVarDumper::dump($this->listPuntosVenta,10,true);
        //exit();
        // Ordenar de mayor a menor los puntos de venta de acuerdo a 
        /*    for($i=0;$i<count($this->listPuntosVenta[1]);$i++){
          for($j=0;$j<count($this->listPuntosVenta[1])-1;$j++){
          $valuej=0;
          $valuej1=0;
          if(isset($this->listPuntosVenta[1][$j][5])){
          $valuej=$this->listPuntosVenta[1][$j][5];
          }
          if(isset($this->listPuntosVenta[1][$j+1][5])){
          $valuej1=$this->listPuntosVenta[1][$j+1][5];
          }

          if($valuej<$valuej1){
          $aux=$this->listPuntosVenta[1][$j];
          $this->listPuntosVenta[1][$j]=$this->listPuntosVenta[1][$j+1];;
          $this->listPuntosVenta[1][$j+1]=$aux;
          }
          }
          }
         */
        $this->listPuntosVenta[3] = 0;

        //recorrer lista para eliminar pdvs no encontrados 
        //recalcular cantidades y saldos teniendo en cuenta fracciones
        //y definir si alguno tiene 100% en pos 3 0:no, 1:si
        if ($this->listPuntosVenta[0] == 1) {
            foreach ($this->listPuntosVenta[1] as $indicePdv => $pdv) {
                if ($pdv[0] == 1 && !empty($pdv[4])) {
                    if ($pdv[5] == 100) {
                        $this->listPuntosVenta[3] = 1;
                    }

                    $objPdv = PuntoVenta::model()->find(array("condition" => "idComercial=:comercial", 'params' => array(':comercial' => $pdv[1])));
                    $this->listPuntosVenta[1][$indicePdv]['HORA_INICIO'] = null;
                    $this->listPuntosVenta[1][$indicePdv]['HORA_FIN'] = null;
                    $dia = 'festivo';
                    $fecha = new DateTime;
                    //si no es festivo, se verifica el dia de la semana
                    if (!DiasFestivos::esFestivo($fecha)) {
                        $dia = $fecha->format('w');
                    }
                    $foraneaHorario = HorarioPuntoVenta::getHorariosDias()[$dia]['foranea'];
                    $horario = $objPdv->$foraneaHorario;

                    if ($horario !== null) {
                        $this->listPuntosVenta[1][$indicePdv]['HORA_INICIO'] = DateTime::createFromFormat('Y-m-d H:i:s', $fecha->format('Y-m-d') . " $horario->HorarioInicio");
                        $this->listPuntosVenta[1][$indicePdv]['HORA_FIN'] = DateTime::createFromFormat('Y-m-d H:i:s', $fecha->format('Y-m-d') . " $horario->HorarioFin");
                    }

                    if ($this->listPuntosVenta[1][$indicePdv]['HORA_INICIO'] == null || $this->listPuntosVenta[1][$indicePdv]['HORA_FIN'] == null) {
                        unset($this->listPuntosVenta[1][$indicePdv]);
                        continue;
                    }

                    $diffIni = $this->listPuntosVenta[1][$indicePdv]['HORA_INICIO']->diff($fecha);
                    $diffFin = $fecha->diff($this->listPuntosVenta[1][$indicePdv]['HORA_FIN']);

                    if ($diffIni->invert == 1 || $diffFin->invert == 1) {
                        unset($this->listPuntosVenta[1][$indicePdv]);
                        continue;
                    }

                    foreach ($pdv[4] as $indiceProd => $producto) {
                        $arrSaldo = $this->decimalToUnidFracc($producto->SALDO);
                        if ($arrSaldo['UNIDAD'] <= 0 && $arrSaldo['FRACCION'] <= 0) {
                            unset($this->listPuntosVenta[1][$indicePdv][4][$indiceProd]);
                        } else {
                            $arrCantidad = $this->decimalToUnidFracc($producto->CANTIDAD);
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->CANTIDAD_UNIDAD = $arrCantidad['UNIDAD'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->CANTIDAD_FRACCION = $arrCantidad['FRACCION'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->SALDO_UNIDAD = $arrSaldo['UNIDAD'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->SALDO_FRACCION = $arrSaldo['FRACCION'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->COMPLETITUD_UNIDAD = $arrSaldo['UNIDAD'] >= $arrCantidad['UNIDAD'];
                            $this->listPuntosVenta[1][$indicePdv][4][$indiceProd]->COMPLETITUD_FRACCION = $arrSaldo['FRACCION'] >= $arrCantidad['FRACCION'];
                        }
                    }
                } else {
                    unset($this->listPuntosVenta[1][$indicePdv]);
                }
            }
        }
    }

    public function pdvSeleccionado() {
        return ($this->indicePuntoVenta != null);
    }

    public function seleccionarPdv($indicePdv) {
        if (!empty($this->listPuntosVenta)) {
            $puntoVenta = $this->listPuntosVenta[1][$indicePdv];
            $this->indicePuntoVenta = $indicePdv;
            $arrPositions = array();

            //recorrer productos y actualiar carro
            foreach ($puntoVenta[4] as $indiceProd => $producto) {
                $position = Yii::app()->shoppingCart->itemAt($producto->CODIGO_PRODUCTO);

                if ($position !== null) {
                    $arrPositions[$producto->CODIGO_PRODUCTO] = $producto->CODIGO_PRODUCTO;
                    if ($producto->SALDO_UNIDAD >= $producto->CANTIDAD_UNIDAD) {
                        Yii::app()->shoppingCart->update($position, false, $producto->CANTIDAD_UNIDAD);
                    } else {
                        Yii::app()->shoppingCart->update($position, false, $producto->SALDO_UNIDAD);
                    }

                    if ($producto->SALDO_FRACCION >= $producto->CANTIDAD_FRACCION) {
                        Yii::app()->shoppingCart->update($position, true, $producto->CANTIDAD_FRACCION);
                    } else {
                        Yii::app()->shoppingCart->update($position, true, $producto->SALDO_UNIDAD);
                    }
                }
            }

            foreach (Yii::app()->shoppingCart->getPositions() as $position) {
                if ($position->isProduct()) {
                    if (!isset($arrPositions[$position->objProducto->codigoProducto])) {
                        Yii::app()->shoppingCart->remove($position->objProducto->codigoProducto);
                    }
                }
            }
        }
    }

    private function decimalToUnidFracc($n) {
        /* $aux = (string) $n;
          $n = explode(".", $aux);
          return array(
          'UNIDAD' => isset($n[0]) ? $n[0] : 0,
          'FRACCION' => isset($n[1]) ? $n[1] : 0
          ); */

        return array(
            'UNIDAD' => $n,
            'FRACCION' => 0
        );
    }

    public static function

    listDataCuotas() {
        return array('1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5);
    }

    public function

    listDataHoras($deltaHorario = "0 1:00:0.000000") {
        $horariosDia = array(
            '0' => array('inicio' => 'horaInicioDomingoFestivo', 'fin' => 'horaFinDomingoFestivo'),
            '1' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '2' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '3' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '4' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '5' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            '6' => array('inicio' => 'horaInicioLunesASabado', 'fin' => 'horaFinLunesASabado'),
            'festivo' => array('inicio' => 'horaInicioDomingoFestivo', 'fin' => 'horaFinDomingoFestivo')
        );

        $horaIniServicio = "07:00:00";
        $horaFinServicio = "23:00:00";

        if ($this->objHorarioCiudadSector != null) {
            $dia = 'festivo';
            $ahora = new DateTime;
            //si no es festivo, se verifica el dia de la semana
            if (!DiasFestivos::esFestivo($ahora)) {
                $dia = $ahora->format('w');
            }
            $horaIniServicio = $this->objHorarioCiudadSector->$horariosDia[$dia]['inicio'];
            $horaFinServicio = $this->objHorarioCiudadSector->$horariosDia[$dia]['fin'];
        }

        $sql = "SELECT idHorario, concat('Hoy a las ', DATE_FORMAT(hora, '%h:%i %p')) as etiqueta, concat(curdate(), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as fecha, hora
             FROM   m_Horario
             WHERE  hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '" . $horaFinServicio . "' and (hora >= ADDTIME(CURTIME(), '" . $deltaHorario . "'))
             UNION
             SELECT idHorario, concat('Ma&ntilde;ana a las ', DATE_FORMAT(hora, '%h:%i %p')) as etiqueta, concat(DATE_ADD(CURDATE(), INTERVAL 1 DAY), ' ', DATE_FORMAT(hora, '%H:%i:%s')) as fecha, hora
             FROM m_Horario
             WHERE (hora between ADDTIME('" . $horaIniServicio . "', '" . $deltaHorario . "') and '12:00') ORDER BY fecha";

        $connection = Yii::app()->db;
        $command = $connection->createCommand($sql);
        $rows = $command->queryAll();

        if (empty($rows)) {
            try {
                sendHtmlEmail(Yii::app()->params->callcenter['correo'], "FALLO SELECT HORARIO ENTREGA PEDIDOS", $sql);
            } catch (Exception $exc) {
                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n" . "FALLO SELECT HORARIO ENTREGA PEDIDOS: $sql", CLogger::LEVEL_ERROR, 'application');
            }
        }

        return $rows;
    }

    public function fechaValidate($attribute, $params) {
        if ($this->fechaEntrega != null) {
            $listHoras = $this->listDataHoras();
            $valido = false;

            foreach ($listHoras as $hora) {
                if ($hora['fecha'] == $this->fechaEntrega) {
                    $valido = true;
                    break;
                }
            }

            if (!$valido) {
                $this->addError('fechaEntrega', $this->getAttributeLabel('fechaEntrega') . " no disponible");
            }
        }
    }

    public function validarPasos($pasosDisponibles, &$paso) {
        //validar pasos anteriores
        foreach ($pasosDisponibles as $idx => $pasoAux) {
            if (strcmp($pasoAux, $paso) == 0)
                break;

            if (!isset($this->pasoValidado[$pasoAux])) {
                $paso = $pasoAux;
                break;
            }
        }
    }

}
