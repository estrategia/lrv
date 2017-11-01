<?php

class UsuarioController extends Controller {
    //public $defaultAction = 'autenticar';

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            array(
                'application.filters.SessionControlFilter + pagoexpress, cotizacion, direcciones',
                'isMobile' => $this->isMobile
            ),
            'access + autenticar, recordar, registro, restablecer',
            'login + index, infoPersonal, contrasena, direcciones, pagoexpress, listapedidos, pedido, listadetalle, listacotizaciones, bonos',
            'loginajax + direccionCrear, direccionActualizar',
        );
    }

    public function filterAccess($filter) {
        if (!Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->homeUrl);
        }
        $filter->run();
    }

    public function filterLogin($filter) {
        if (Yii::app()->user->isGuest) {
            $this->redirect(Yii::app()->user->loginUrl);
        }
        $filter->run();
    }

    public function filterLoginajax($filter) {
        if (Yii::app()->user->isGuest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta usuario autenticado, por favor iniciar sesión para continuar'));
            Yii::app()->end();
        }
        $filter->run();
    }

    public function actionIndex() {
        if ($this->isMobile) {
            $this->showSeeker = false;
            $this->render('menu');
        } else {
            $this->actionInfopersonal();
        }
    }

    /**
     * Visualiza la pagina de autenticacion de usuario
     */
    public function actionAutenticar($opcion = null) {
        $this->showSeeker = true;

        if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']]) || Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] == 'null') {
            Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = (Yii::app()->request->urlReferrer == null ? 'null' : Yii::app()->request->urlReferrer);
        }

        if ($this->isMobile) {
            $this->render('autenticar');
        } else {
            $this->render('d_autenticar', array(
                'opcion' => $opcion
            ));
        }
    }

    public function actionIngresar() {
        if (!Yii::app()->request->isPostRequest) {
            $this->redirect(Yii::app()->homeUrl);
            Yii::app()->end();
        }

        $model = new LoginForm;

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];

            $redirect = Yii::app()->homeUrl;
            if (isset(Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']]) && Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] != 'null') {
                $redirect = Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']];
            } else {
                $redirect = Yii::app()->request->urlReferrer == null ? Yii::app()->homeUrl : Yii::app()->request->urlReferrer;
            }

            //echo CJSON::encode(array("result"=>"error","response"=>"redirect: $redirect"));exit();

            if ($model->validate()) {
            	Yii::app()->shoppingCart->setCalcularUnidades();
                Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = 'null';
                echo CJSON::encode(array(
                    "result" => "ok",
                    "response" => array(
                        "msg" => "",
                        "redirect" => $redirect
                )));
                Yii::app()->end();
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        } else {
            echo CJSON::encode(array("result" => "error", "response" => "Datos inv&aacute;lidos"));
            //echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionRegistro() {
        if (!Yii::app()->request->isPostRequest) {
            $this->redirect(Yii::app()->homeUrl);
            Yii::app()->end();
        }

        $model = new RegistroForm('registro');

        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];

            $urlBienvenida = Yii::app()->homeUrl;
            if (isset(Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']]) && Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] != 'null') {
                $urlBienvenida = Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']];
            } else {
                $urlBienvenida = Yii::app()->request->urlReferrer == null ? Yii::app()->homeUrl : Yii::app()->request->urlReferrer;
            }

            //echo CJSON::encode(array("result"=>"error","response"=>"redirect: $urlBienvenida"));exit();

            if ($model->validate()) {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    $usuario = new Usuario;
                    $usuario->identificacionUsuario = $model->cedula;
                    $usuario->nombre = $model->nombre;
                    $usuario->apellido = $model->apellido;
                    $usuario->correoElectronico = $model->correoElectronico;
                    $usuario->clave = $usuario->hash($model->clave);
                    $usuario->nombre = $model->nombre;
                    $usuario->activo = Yii::app()->params->usuario['estado']['activo'];

                    $perfilEspecial = PerfilesEspeciales::model()->find('identificacionUsuario=:cedula', array(':cedula' => $usuario->identificacionUsuario));

                    if ($perfilEspecial === null) {
                        $usuario->codigoPerfil = Yii::app()->params->perfil['defecto'];
                    } else {
                        $usuario->codigoPerfil = $perfilEspecial->codigoPerfil;
                    }

                    $usuario->invitado = 0;

                    if (!$usuario->save()) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('error', "Error al guardar información básica, por favor, intente de nuevo.");
                        $this->render('registro', array('model' => $model));
                        Yii::app()->end();
                    }

                    $usuarioExt = new UsuarioExtendida;
                    $usuarioExt->identificacionUsuario = $usuario->identificacionUsuario;
                    $usuarioExt->genero = $model->genero;
                    $usuarioExt->fechaNacimiento = $model->fechaNacimiento;

                    if (!$usuarioExt->save()) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('error', "Error al guardar información complementaria, por favor, intente de nuevo. Error: " . CActiveForm::validate($usuarioExt));
                        $this->render('registro', array('model' => $model));
                        Yii::app()->end();
                    }

                    $contenido = $this->renderPartial('_correoBienvenida', array('objUsuario' => $usuario), true, true);
                    $htmlCorreo = $this->renderPartial('//common/correo', array('contenido' => $contenido), true, true);
                    // sendHtmlEmail($usuario->correoElectronico, Yii::app()->params->asuntoBienvenida, $htmlCorreo);
                    $transaction->commit();

                    $identity = new UserIdentity($model->cedula, $model->clave);
                    $identity->authenticate();
                    Yii::app()->user->login($identity);

                    Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = 'null';

                    $bienvenida = "";
                    if ($this->isMobile) {
                        $bienvenida = "bienvenida";
                    } else {
                        $bienvenida = "d_bienvenida";
                    }
                    echo CJSON::encode(array(
                        'result' => 'ok',
                        'response' => array(
                            'msg' => '',
                            'bienvenidaHTML' => $this->renderPartial($bienvenida, array('objUsuario' => $usuario, 'url' => $urlBienvenida), true, false)
                        )
                    ));
                    Yii::app()->end();
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

                    try {
                        $transaction->rollBack();
                    } catch (Exception $txexc) {
                        Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }

                    CJSON::encode(array('result' => 'error', 'response' => "Error al realizar registro, por favor intente de nuevo. " . $exc->getMessage()));
                    Yii::app()->end();
                }
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        } else {
            echo CJSON::encode(array("result" => "error", "response" => "Datos inv&aacute;lidos"));
            //echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Cierra sesion y redirecciona a la pagina de autenticacion
     */
    public function actionSalir() {
        $sessions = Yii::app()->params->sesion;
        foreach ($sessions as $sesion) {
            unset(Yii::app()->session[$sesion]);
            _deleteCookie($sesion);
        }

        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRecordar() {
        if (!Yii::app()->request->isPostRequest) {
            $this->redirect(Yii::app()->homeUrl);
            Yii::app()->end();
        }

        $model = new RecordarForm;

        if (isset($_POST['RecordarForm'])) {
            $model->attributes = $_POST['RecordarForm'];

            if ($model->validate()) {
                try {
                    $objUsuarioExtendida = $model->usuario->objUsuarioExtendida;
                    $fecha = new DateTime;
                    $fecha->modify('+1 day');
                    $objUsuarioExtendida->recuperacionFecha = $fecha->format('Y-m-d H:i:s');
                    $objUsuarioExtendida->recuperacionCodigo = md5($objUsuarioExtendida->identificacionUsuario) . md5($fecha->format('YmdHis'));
                    $objUsuarioExtendida->recuperacionCodigo = md5($objUsuarioExtendida->recuperacionCodigo);
                    $objUsuarioExtendida->save();
                    $model->usuario->objUsuarioExtendida = $objUsuarioExtendida;

                    $contenido = $this->renderPartial(Yii::app()->params->rutasPlantillasCorreo['correoRecordarClave'], array('objUsuario' => $model->usuario), true, true);
                    
                    
                    $htmlCorreo = $this->renderPartial('//common/correo', array('contenido' => $contenido), true, true);
                    sendHtmlEmail($model->correoElectronico, Yii::app()->params->asuntoRecordatorioClave, $htmlCorreo);

                    echo CJSON::encode(array("result" => "ok", "response" => "Se ha enviado a su correo los datos de restauración de clave"));
                    Yii::app()->end();
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    CJSON::encode(array('result' => 'error', 'response' => "Error al realizar registro, por favor intente de nuevo. " . $exc->getMessage()));
                    Yii::app()->end();
                }
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        } else {
            echo CJSON::encode(array("result" => "error", "response" => "Datos inv&aacute;lidos"));
            //echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionRestablecer($codigo) {
        $this->showSeeker = false;

        $model = new RegistroForm('restablecer');

        $objUsuario = Usuario::model()->find(array(
            'with' => array('objUsuarioExtendida' => array('condition' => 'recuperacionCodigo=:codigo AND recuperacionFecha>=:fecha')),
            'params' => array(
                ':codigo' => $codigo,
                ':fecha' => date('Y-m-d H:i:s'),
            )
        ));


        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];

            if ($model->validate()) {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    $objUsuario->clave = md5($model->clave);
                    $objUsuario->fechaUltimoAcceso = new CDbExpression('NOW()');
                    $objUsuario->objUsuarioExtendida->recuperacionFecha = null;
                    $objUsuario->objUsuarioExtendida->recuperacionCodigo = null;

                    if (!$objUsuario->save() || !$objUsuario->objUsuarioExtendida->save()) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('error', "Error al actualizar contraseña, por favor, intente de nuevo.");
                        if ($this->isMobile) {
                            $this->render('restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
                        } else {
                            $this->render('d_restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
                        }
                        Yii::app()->end();
                    }

                    $transaction->commit();
                    $identity = new UserIdentity($objUsuario->identificacionUsuario, $model->clave);
                    $identity->authenticate();
                    Yii::app()->user->login($identity);
                    if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']]) || Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] == 'null') {
                        $this->redirect(Yii::app()->homeUrl);
                    } else {
                        $redirect = Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']];
                        Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = 'null';
                        $this->redirect($redirect);
                    }
                } catch (Exception $exc) {
                    try {
                        $transaction->rollBack();
                    } catch (Exception $txexc) {
                        Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }

                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    Yii::app()->user->setFlash('error', "Error: " . $exc->getMessage());
                    if ($this->isMobile) {
                        $this->render('restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
                    } else {
                        $this->render('d_restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
                    }
                    Yii::app()->end();
                }
            }
        }

        if ($this->isMobile) {
            $this->render('restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
        } else {
            $this->render('d_restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
        }
    }

    public function actionInfopersonal() {
        $this->showSeeker = false;

        if (!$this->isMobile) {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Informaci&oacute;n personal'
            );
        }

        $model = new RegistroForm('actualizar');
        //$usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
        $usuario = Usuario::model()->find(array(
            'with' => array('objUsuarioExtendida', 'objPerfil'),
            'condition' => 't.identificacionUsuario=:cedula',
            'params' => array(
                ':cedula' => Yii::app()->user->name
            )
        ));
        $usuarioExt = $usuario->objUsuarioExtendida;
        $model->cedula = $usuario->identificacionUsuario;

        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];
            $model->correoElectronico = $usuario->correoElectronico;

            if ($model->validate()) {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    $usuario->nombre = $model->nombre;
                    $usuario->apellido = $model->apellido;

                    if (!$usuario->save()) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('error', "Error al guardar información básica, por favor, intente de nuevo.");
                        //$this->render('registro', array('model' => $model));

                        if ($this->isMobile) {
                            $this->render('registro', array('model' => $model));
                        } else {
                            $this->render('d_usuario', array('vista' => 'd_registro', 'params' => array('model' => $model)));
                        }

                        Yii::app()->end();
                    }

                    if ($model->profesion != null && !empty($model->profesion))
                        $usuarioExt->codigoProfesion = $model->profesion;
                    else
                        $usuarioExt->codigoProfesion = null;

                    if ($model->genero != null)
                        $usuarioExt->genero = $model->genero;

                    if ($model->fechaNacimiento != null)
                        $usuarioExt->fechaNacimiento = $model->fechaNacimiento;

                    if (!$usuarioExt->save()) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('error', "Error al guardar información complementaria, por favor, intente de nuevo.");
                        //$this->render('registro', array('model' => $model));

                        if ($this->isMobile) {
                            $this->render('registro', array('model' => $model));
                        } else {
                            $this->render('d_usuario', array('vista' => 'd_registro', 'params' => array('model' => $model)));
                        }
                        Yii::app()->end();
                    }

                    $usuario->objUsuarioExtendida = $usuarioExt;
                    Yii::app()->session[Yii::app()->params->usuario['sesion']] = $usuario;

                    $transaction->commit();
                    Yii::app()->user->setFlash('success', "Información actualizada.");
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

                    try {
                        $transaction->rollBack();
                    } catch (Exception $txexc) {
                        Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }

                    Yii::app()->user->setFlash('error', "Error al realizar registro, por favor intente de nuevo.");
                    //$this->render('registro', array('model' => $model));

                    if ($this->isMobile) {
                        $this->render('registro', array('model' => $model));
                    } else {
                        $this->render('d_usuario', array('vista' => 'd_registro', 'params' => array('model' => $model)));
                    }
                    Yii::app()->end();
                }
            }
        } else {
            $model->cedula = $usuario->identificacionUsuario;
            $model->nombre = $usuario->nombre;
            $model->apellido = $usuario->apellido;
            $model->correoElectronico = $usuario->correoElectronico;
            $model->genero = $usuarioExt->genero;
            $model->fechaNacimiento = $usuarioExt->fechaNacimiento;
            $model->profesion = $usuarioExt->codigoProfesion;
        }

        if ($this->isMobile) {
            $this->render('registro', array('model' => $model));
        } else {
            $this->render('d_usuario', array('vista' => 'd_registro', 'params' => array('model' => $model)));
        }
    }

    public function actionContrasena() {
        $this->showSeeker = false;

        if (!$this->isMobile) {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Cambiar contrase&ntilde;a'
            );
        }

        $model = new RegistroForm('contrasena');
        //$usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
        $usuario = Usuario::model()->find(array(
            //'with' => array('objUsuarioExtendida', 'objPerfil'),
            'condition' => 't.identificacionUsuario=:cedula',
            'params' => array(
                ':cedula' => Yii::app()->user->name
            )
        ));

        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];
            if ($model->validate()) {
                try {
                    $usuario->clave = $usuario->hash($model->clave);

                    if ($usuario->save()) {
                        Yii::app()->user->setFlash('success', "Información actualizada.");
                        $model->clave = $model->claveConfirmar = null;
                    } else {
                        Yii::app()->user->setFlash('error', "Error al guardar contraseña, por favor, intente de nuevo.");
                    }
                    //Yii::app()->session[Yii::app()->params->usuario['sesion']] = $usuario;
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    Yii::app()->user->setFlash('error', "Error al realizar registro, por favor intente de nuevo.");
                    //$this->render('registro', array('model' => $model));
                    if ($this->isMobile) {
                        $this->render('registro', array('model' => $model));
                    } else {
                        $this->render('d_usuario', array('vista' => 'd_contrasena', 'params' => array('model' => $model)));
                    }
                    Yii::app()->end();
                }
            }
        }

        if ($this->isMobile) {
            $this->render('registro', array('model' => $model));
        } else {
            $this->render('d_usuario', array('vista' => 'd_contrasena', 'params' => array('model' => $model)));
        }
    }

    public function actionPagoexpress() {
        $objSectorCiudad = $this->objSectorCiudad;

        /*if ($objSectorCiudad === null || $objSectorCiudad->esDefecto()) {
            Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
            $this->redirect($this->createUrl('/sitio/ubicacion'));
        }*/
		
        $objPagoExpress = PagoExpress::model()->find(array(
            'with' => array('objDireccionDespacho' => array('condition' => 'objDireccionDespacho.codigoCiudad=:ciudad AND objDireccionDespacho.codigoSector=:sector')),
            'condition' => 't.identificacionUsuario=:cedula AND t.activo=:activo',
            'params' => array(
                ':cedula' => Yii::app()->user->name,
                ':activo' => 1,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector
            )
        ));

        if ($objPagoExpress === null) {
            $objPagoExpress = new PagoExpress;
            $objPagoExpress->identificacionUsuario = Yii::app()->user->name;
        }


        if (isset($_POST['Submit'])) {
            if (isset($_POST['PagoExpress'])) {
                $objPagoExpress->attributes = $_POST['PagoExpress'];
            }

            if ($_POST['Submit'] == 1 || strtolower($_POST['Submit']) == "modificar") {
                $objPagoExpress->activo = 1;
            } else {
                $objPagoExpress->activo = 0;
            }

            if ($objPagoExpress->validate()) {
                $objPagoExpress->save();
                //Yii::app()->user->setFlash('success', "Información actualizada.");
            }
        }

        if (!$objPagoExpress->isNewRecord && $objPagoExpress->activo == 0) {
            $objPagoExpress = new PagoExpress;
        }

        $listDirecciones = DireccionesDespacho::model()->findAll(array(
            'condition' => 'identificacionUsuario=:cedula AND codigoCiudad=:ciudad AND codigoSector=:sector AND activo=:activo',
            'params' => array(
                ':cedula' => Yii::app()->user->name,
                ':activo' => 1,
                ':ciudad' => $objSectorCiudad->codigoCiudad,
                ':sector' => $objSectorCiudad->codigoSector
            )
        ));

        $listFormaPago = FormaPago::model()->findAll(array(
            'order' => 'formaPago',
            'condition' => 'estadoFormaPago=:estado',
            'params' => array(':estado' => 1)
        ));

        $params = array(
            'listDirecciones' => $listDirecciones,
            'listFormaPago' => $listFormaPago,
            'objPagoExpress' => $objPagoExpress);

        if ($this->isMobile) {
            $this->render('pagoExpress', $params);
        } else {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Pago express'
            );

            $this->render('d_usuario', array('vista' => 'd_pagoExpress', 'params' => $params));
        }
    }

    public function actionBonos(){
        
        $modelPago = new FormaPagoForm;
        $modelPago->identificacionUsuario = Yii::app()->user->name;
        $modelPago->consultarBono();
        
     
        $params = array('bonos' => $modelPago->bono);
        if ($this->isMobile) {
            $this->render('bonos', $params);
        } else {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Bonos'
            );

            $this->render('d_usuario', array('vista' => 'd_bonos', 'params' => $params));
        }
    }
    
    public function actionListapedidos() {

        $model = new Compras('search');
        $model->unsetAttributes();
        if (isset($_GET['Compras']))
            $model->attributes = $_GET['Compras'];
        $model->activa = 1;
        $model->identificacionUsuario = Yii::app()->user->name;

        $params = array('model' => $model);
        if ($this->isMobile) {
            $this->render('pedidos', $params);
        } else {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Listado de pedidos'
            );
            $this->render('d_usuario', array('vista' => 'd_pedidos', 'params' => $params));
        }
    }
    
    
    public function actionSuscripciones() {
    
    	$model = new SuscripcionesProductosUsuario('search');
    	$model->unsetAttributes();
    	if (isset($_GET['SuscripcionesProductosUsuario']))
    		$model->attributes = $_GET['SuscripcionesProductosUsuario'];
    	
    	$model->identificacionUsuario = Yii::app()->user->name;
    
    	$params = array('model' => $model);
    	if ($this->isMobile) {
    		$this->render('suscripciones', $params);
    	} else {
    		$this->breadcrumbs = array(
    				'Inicio' => array('/'),
    				'Mi cuenta' => array('/usuario'),
    				'Mis suscripciones'
    		);
    	
    	 $this->render('d_usuario', array('vista' => 'd_suscripciones', 'params' => $params));
    	
    	}
    }
    

    public function actionPedido($compra) {
        $objCompra = Compras::model()->find(array(
            'with' => 'objPuntoVenta',
            'condition' => 'idCompra=:compra AND identificacionUsuario=:usuario',
            'params' => array(
                ':compra' => $compra,
                ':usuario' => Yii::app()->user->name
            )
        ));

        if ($objCompra === null) {
            $this->redirect($this->createUrl('listapedidos'));
        }

        $params = array(
            'objCompra' => $objCompra,
        );

        if ($this->isMobile) {
            $this->render('pedido', $params);
        } else {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Listado de pedidos' => array('/usuario/listapedidos'),
                "#$compra"
            );

            $this->render('d_usuario', array('vista' => 'd_pedido', 'params' => $params));
        }
    }

    public function actionListacotizaciones() {
        $model = new Cotizaciones('search');
        $model->unsetAttributes();
        if (isset($_GET['Cotizaciones']))
            $model->attributes = $_GET['Cotizaciones'];
        $model->identificacionUsuario = Yii::app()->user->name;

        $fecha = new DateTime;
        $dias = Yii::app()->params->cotizaciones['diasVisualizar'];
        $fecha->modify("-$dias days");
        $model->fechaCotizacion = $fecha->format('Y-m-d H:i:s');
        $model->codigoCiudad = Yii::app()->shoppingCart->getCodigoCiudad();
        $model->codigoSector = Yii::app()->shoppingCart->getCodigoSector();

        $params = array('model' => $model);
        if ($this->isMobile) {
            $this->render('cotizaciones', $params);
        } else {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Cotizaciones'
            );

            $this->render('d_usuario', array('vista' => 'd_cotizaciones', 'params' => $params));
        }
    }

    public function actionCotizacion($cotizacion) {
        $fecha = new DateTime;
        $dias = Yii::app()->params->cotizaciones['diasVisualizar'];
        $fecha->modify("-$dias days");

        $objCotizacion = Cotizaciones::model()->find(array(
            'condition' => 'idCotizacion=:cotizacion AND identificacionUsuario=:usuario AND fechaCotizacion>=:fecha AND codigoCiudad=:ciudad AND codigoSector=:sector',
            'params' => array(
                ':cotizacion' => $cotizacion,
                ':usuario' => Yii::app()->user->name,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':ciudad' => Yii::app()->shoppingCart->getCodigoCiudad(),
                ':sector' => Yii::app()->shoppingCart->getCodigoSector()
            )
        ));

        if ($objCotizacion === null) {
            $this->redirect($this->createUrl('listacotizaciones'));
        }

        $params = array('objCotizacion' => $objCotizacion);
        if ($this->isMobile) {
            $this->render('cotizacion', $params);
        } else {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Listado de cotizaciones' => array('/usuario/listapedidos'),
                "#$cotizacion"
            );
            $this->render('d_usuario', array('vista' => 'd_cotizacion', 'params' => $params));
        }
    }

    public function actionCotizacionpdf($cotizacion) {
        $fecha = new DateTime;
        $dias = Yii::app()->params->cotizaciones['diasVisualizar'];
        $fecha->modify("-$dias days");

        $objCotizacion = Cotizaciones::model()->find(array(
            'condition' => 'idCotizacion=:cotizacion AND identificacionUsuario=:usuario AND fechaCotizacion>=:fecha AND codigoCiudad=:ciudad AND codigoSector=:sector',
            'params' => array(
                ':cotizacion' => $cotizacion,
                ':usuario' => Yii::app()->user->name,
                ':fecha' => $fecha->format('Y-m-d H:i:s'),
                ':ciudad' => Yii::app()->shoppingCart->getCodigoCiudad(),
                ':sector' => Yii::app()->shoppingCart->getCodigoSector()
            )
        ));

        $mPDF1 = Yii::app()->ePdf->mpdf('utf-8', 'Letter'); //Letter, Legal, A4
        $mPDF1->SetTitle("La Rebaja Virtual - Cotizacion");
        $mPDF1->SetAuthor("Copservir");

        if ($objCotizacion === null) {
            $mPDF1->WriteHTML("<strong>Error, no se detecta cotización</strong>");
        } else {
            $mPDF1->WriteHTML($this->renderPartial('cotizacionPDF', array('objCotizacion' => $objCotizacion), true));
        }

        $filename = 'LaRebajaVirtual_' . date('YmdHis') . '.pdf';
        $mPDF1->Output($filename, 'D');
    }

    public function actionOcultarpedido() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $compra = Yii::app()->getRequest()->getPost('compra', null);

        if ($compra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $objCompra = Compras::model()->find(array(
            'condition' => 'idCompra=:compra AND identificacionUsuario=:usuario',
            'params' => array(
                ':compra' => $compra,
                ':usuario' => Yii::app()->user->name
            )
        ));

        if ($objCompra === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Compra no existente'));
            Yii::app()->end();
        }

        $objCompra->activa = 0;
        $objCompra->save();

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => 'Pedido oculto',
        ));
        Yii::app()->end();
    }

    public function actionListapersonal($lista = null) {
        if ($lista === null) {
            $this->listapersonal();
            Yii::app()->end();
        } else if ($lista == 'post') {
            $this->listapersonalAdmin();
            Yii::app()->end();
        } else if ($lista == 'guardar') {
            $this->listapersonalGuardar();
            Yii::app()->end();
        } else {
            $this->listapersonaldetalle($lista);
            Yii::app()->end();
        }
    }

    private function listapersonalAdmin() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $render = Yii::app()->getRequest()->getPost('render', false);

        if ($render) {
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'form' => $this->renderPartial('_form', array('model' => new ListasPersonales), true)
            )));
            Yii::app()->end();
        } else if (isset($_POST['ListasPersonales'])) {
            $lista = Yii::app()->getRequest()->getPost('lista', null);
            $model = null;
            
            

            if ($lista !== null) {
                $model = ListasPersonales::model()->find(array(
                    'with' => 'listDetalle',
                    'condition' => 't.idLista=:lista AND t.identificacionUsuario=:usuario',
                    'params' => array(
                        ':lista' => $lista,
                        ':usuario' => Yii::app()->user->name
                    )
                ));
            }

            if ($model == null) {
                $model = new ListasPersonales;
            }

            $mensaje = "Lista " . ($model->isNewRecord ? "creada" : "actualizada");

            $model->attributes = $_POST['ListasPersonales'];
            $model->identificacionUsuario = Yii::app()->user->name;

            if ($model->diasAnticipacion == null) {
                $model->diasAnticipacion = 0;
            }

            if ($model->save()) {
                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => array(
                        'mensajeHtml' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => $mensaje), true),
                        'optionHtml' => "<option value='$model->idLista'>$model->nombreLista</option>"
                    )
                ));
                Yii::app()->end();
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }
    }

    private function listapersonal() {
        $model = new ListasPersonales('search');
        $model->unsetAttributes();
        if (isset($_GET['ListasPersonales']))
            $model->attributes = $_GET['ListasPersonales'];

        $model->activa = 1;
        $model->identificacionUsuario = Yii::app()->user->name;

        $params = array('model' => $model);
        if ($this->isMobile) {
            $this->render('listaPersonal', $params);
        } else {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Listas personales'
            );
            $this->render('d_usuario', array('vista' => 'd_listaPersonal', 'params' => $params));
        }
    }

    private function listapersonaldetalle($lista) {
        $model = ListasPersonales::model()->find(array(
            'with' => array('listDetalle' => array("with" => array("objProducto" => array("with" => array("listImagenes", "objCodigoEspecial", "listCalificaciones")),
                        "objCombo" => array("with" => array("listProductosCombo", "listImagenesCombo"))))),
            'condition' => 't.idLista=:lista AND t.identificacionUsuario=:usuario',
            'params' => array(
                ':lista' => $lista,
                ':usuario' => Yii::app()->user->name
            )
        ));

        if ($model === null) {
            $this->redirect($this->createUrl('listapersonal'));
        }

        $params = array('model' => $model);
        if ($this->isMobile) {
            $this->render('listaDetalle', $params);
        } else {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Listas personales' => array('/usuario/listapersonal'),
                $model->nombreLista
            );

            $this->render('d_usuario', array('vista' => 'd_listaDetalle', 'params' => $params));
        }
    }

    public function actionListapersonaleliminar() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $lista = Yii::app()->getRequest()->getPost('lista', false);

        if ($lista === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        $objListaPersonal = ListasPersonales::model()->find(array(
            //'with' => 'listDetalle',
            'condition' => 't.idLista=:lista AND t.identificacionUsuario=:usuario',
            'params' => array(
                ':lista' => $lista,
                ':usuario' => Yii::app()->user->name
            )
        ));

        if ($objListaPersonal === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'La lista personal no existe'));
            Yii::app()->end();
        }

        $objListaPersonal->activa = 0;
        $objListaPersonal->save();

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => 'Lista personal eliminada',
        ));
        Yii::app()->end();
    }

    private function listapersonalGuardar() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        if (Yii::app()->user->isGuest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Debe autenticarse antes de crear lista'));
            Yii::app()->end();
        }

        $render = Yii::app()->getRequest()->getPost('render', false);

        if ($render) {
            $tipoProducto = Yii::app()->getRequest()->getPost('tipo', null);
            $codigo = Yii::app()->getRequest()->getPost('codigo', null);
            $unidades = Yii::app()->getRequest()->getPost('unidades', null);

            if ($tipoProducto == null || $codigo == null || $unidades == null) {
                echo CJSON::encode(array('result' => 'error', 'response' => 'Datos inválidos'));
                Yii::app()->end();
            }

            if (!in_array($tipoProducto, array(1, 2, 3))) {
                echo CJSON::encode(array('result' => 'error', 'response' => 'Datos inválidos'));
                Yii::app()->end();
            }

            $model = new ListaGuardarForm;
            $model->identificacionUsuario = Yii::app()->user->name;
            $model->tipo = $tipoProducto;
            $model->codigo = $codigo;
            $model->unidades = $unidades;

            $listaGuardar = 'listaGuardar';
            if (!$this->isMobile) {
                $listaGuardar = 'd_listaGuardar';
            }

            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'dialogoHTML' => $this->renderPartial($listaGuardar, array('model' => $model), true)
            )));
            Yii::app()->end();
        } else if (isset($_POST['ListaGuardarForm'])) {
            $model = new ListaGuardarForm;
            $model->attributes = $_POST['ListaGuardarForm'];
            $model->identificacionUsuario = Yii::app()->user->name;

            if (!in_array($model->tipo, array(1, 2, 3))) {
                echo CJSON::encode(array('result' => 'error', 'response' => 'Datos inválidos'));
                Yii::app()->end();
            }

            if ($model->validate()) {
                if ($model->tipo == 3) {
                    $positions = Yii::app()->shoppingCart->getPositions();
                    foreach ($positions as $position) {
                        $conditions = "t.idLista=:lista";
                        $params = array(
                            ':lista' => $model->idLista,
                            ':usuario' => Yii::app()->user->name
                        );

                        if ($position->isProduct()) {
                            $conditions .= " AND t.codigoProducto=:producto";
                            $params[':producto'] = $position->objProducto->codigoProducto;
                        } else if ($position->isCombo()) {
                            $conditions .= " AND t.idCombo=:combo";
                            $params[':combo'] = $position->objCombo->idCombo;
                        }

                        $objDetalle = ListasPersonalesDetalle::model()->find(array(
                            'with' => array('objLista' => array('condition' => 'objLista.identificacionUsuario=:usuario')),
                            'condition' => $conditions,
                            'params' => $params
                        ));

                        if ($objDetalle === null) {
                            $objDetalle = new ListasPersonalesDetalle;
                            $objDetalle->idLista = $model->idLista;

                            if ($position->isProduct()) {
                                $objDetalle->codigoProducto = $position->objProducto->codigoProducto;
                            } else if ($position->isCombo()) {
                                $objDetalle->idCombo = $position->objCombo->idCombo;
                            }
                        }

                        $objDetalle->unidades = $position->getQuantity();
                        $objDetalle->save();
                    }
                    echo CJSON::encode(array(
                        'result' => 'ok',
                        'response' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => "Carro guardado"), true)
                    ));
                    Yii::app()->end();
                } else {
                    $conditions = "t.idLista=:lista";
                    $params = array(
                        ':lista' => $model->idLista,
                        ':usuario' => Yii::app()->user->name
                    );

                    if ($model->tipo == 1) {
                        $conditions .= " AND t.codigoProducto=:producto";
                        $params[':producto'] = $model->codigo;
                    } else if ($model->tipo == 2) {
                        $conditions .= " AND t.idCombo=:combo";
                        $params[':combo'] = $model->codigo;
                    }

                    $objDetalle = ListasPersonalesDetalle::model()->find(array(
                        'with' => array('objLista' => array('condition' => 'objLista.identificacionUsuario=:usuario')),
                        'condition' => $conditions,
                        'params' => $params
                    ));

                    if ($objDetalle === null) {
                        $objDetalle = new ListasPersonalesDetalle;
                        $objDetalle->idLista = $model->idLista;

                        if ($model->tipo == 1) {
                            $objDetalle->codigoProducto = $model->codigo;
                        } else if ($model->tipo == 2) {
                            $objDetalle->idCombo = $model->codigo;
                        }
                    }

                    $objDetalle->unidades = $model->unidades;
                    $objDetalle->save();

                    echo CJSON::encode(array(
                        'result' => 'ok',
                        'response' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => "Producto guardado"), true)
                    ));
                    Yii::app()->end();
                }
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
    }

    public function actionListadetalle($accion) {
        if ($accion == "actualizar") {
            $this->listadetalleActualizar();
        } else if ($accion == "eliminar") {
            $this->listadetalleEliminar();
        }
    }

    private function listadetalleActualizar() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $detalle = Yii::app()->getRequest()->getPost('detalle', null);
        $unidades = Yii::app()->getRequest()->getPost('unidades', null);

        if ($detalle == null || $unidades == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Datos inválidos'));
            Yii::app()->end();
        }


        $objDetalle = ListasPersonalesDetalle::model()->find(array(
            'with' => array('objLista' => array('condition' => 'identificacionUsuario=:usuario')),
            'condition' => 't.idListaDetalle=:detalle',
            'params' => array(
                ':detalle' => $detalle,
                ':usuario' => Yii::app()->user->name
            )
        ));

        if ($objDetalle == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }


        if ($unidades <= 0) {
            $objDetalle->delete();
        } else {
            $objDetalle->unidades = $unidades;
            $objDetalle->save();
        }

        $listaDetalle = '_listaDetalle';
        if (!$this->isMobile) {
            $listaDetalle = '_d_listaDetalle';
        }

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'detalleHTML' => $this->renderPartial($listaDetalle, array('model' => $objDetalle->objLista), true),
                'mensajeHTML' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => "Elemento actualizado"), true),
            )
        ));
        Yii::app()->end();
    }

    private function listadetalleEliminar() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $detalle = Yii::app()->getRequest()->getPost('detalle', null);

        if ($detalle == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Datos inválidos'));
            Yii::app()->end();
        }


        $objDetalle = ListasPersonalesDetalle::model()->find(array(
            'with' => array('objLista' => array('condition' => 'identificacionUsuario=:usuario')),
            'condition' => 't.idListaDetalle=:detalle',
            'params' => array(
                ':detalle' => $detalle,
                ':usuario' => Yii::app()->user->name
            )
        ));

        if ($objDetalle == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $objDetalle->delete();

        $listaDetalle = '_listaDetalle';
        if (!$this->isMobile) {
            $listaDetalle = '_d_listaDetalle';
        }

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'detalleHTML' => $this->renderPartial($listaDetalle, array('model' => $objDetalle->objLista), true),
                'mensajeHTML' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => "Elemento actualizado"), true),
            )
        ));
        Yii::app()->end();
    }

    public function actionDireccionesUbicacion() {
        $contenido = "NA";

        if (Yii::app()->user->isGuest) {
            $contenido = "No hay usuario autenticado";
        } else {
            $listDirecciones = DireccionesDespacho::consultarDireccionesUsuario(Yii::app()->user->name, true, true);
            if (empty($listDirecciones)) {
                $contenido = "No hay direcciones de despacho registradas";
            } else {
                if ($this->isMobile) {
                    $contenido = $this->renderPartial('direcciones', array('listDirecciones' => $listDirecciones, 'editar' => false), true);
                } else {
                    $contenido = $this->renderPartial('d_direcciones', array('listDirecciones' => $listDirecciones, 'modal' => true), true);
                }
            }
        }

        $this->renderPartial($this->isMobile ? 'direccionesUbicacion' : 'd_direccionesUbicacion', array(
            'contenido' => $contenido
        ));
    }

    public function actionDirecciones() {
        $objSectorCiudad = $this->objSectorCiudad;

        if ($objSectorCiudad === null) {
            Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
            $this->redirect($this->createUrl('/sitio/ubicacion'));
        }

        $this->showSeeker = false;
        $this->fixedFooter = true;

        $listDirecciones = DireccionesDespacho::consultarDireccionesUsuario(Yii::app()->user->name, true);

        $params = array('listDirecciones' => $listDirecciones);
        if ($this->isMobile) {
            $this->render('direcciones', $params);
        } else {
            $this->breadcrumbs = array(
                'Inicio' => array('/'),
                'Mi cuenta' => array('/usuario'),
                'Direcciones de despacho'
            );

            $this->render('d_usuario', array('vista' => 'd_direcciones', 'params' => $params));
        }
    }

    public function actionDireccionActualizar() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $render = Yii::app()->getRequest()->getPost('render', false);
        $radio = Yii::app()->getRequest()->getPost('radio', 0);

        if ($render == true && !$this->isMobile) {
            $direccion = Yii::app()->getRequest()->getPost('direccion');

            if ($direccion == null) {
                echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
                Yii::app()->end();
            }

            $model = DireccionesDespacho::model()->find(array(
                'condition' => 'idDireccionDespacho=:direccion AND identificacionUsuario=:usuario',
                'params' => array(
                    ':direccion' => $direccion,
                    ':usuario' => Yii::app()->user->name,
                )
            ));

            if ($model == null) {
                echo CJSON::encode(array('result' => 'error', 'response' => 'Direcci&oacute;n no existe'));
                Yii::app()->end();
            }


            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'dialogoHTML' => $this->renderPartial('_d_direccionForm', array('model' => $model, 'radio' => $radio), true)
            )));
            Yii::app()->end();
        } else if (isset($_POST['DireccionesDespacho'])) {
            $form = new DireccionesDespacho('update');
            $form->attributes = $_POST['DireccionesDespacho'];

            $model = DireccionesDespacho::model()->findByPk($form->idDireccionDespacho);

            if ($model == null) {
                //echo CJSON::encode(array('result' => 'error', 'response' => 'Página solicitada no existe'));
                //Yii::app()->end();
                throw new CHttpException(404, 'Página solicitada no existe.');
            }

            if ($radio != 'pasoscompra') {
                $model->descripcion = $form->descripcion;
            }

            $model->nombre = $form->nombre;
            $model->direccion = $form->direccion;
            $model->barrio = $form->barrio;
            $model->telefono = $form->telefono;
            $model->extension = $form->extension;
            $model->celular = $form->celular;

            if ($model->validate()) {
                if (!$model->save()) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'Error al guardar dirección, por favor intente de nuevo'));
                    Yii::app()->end();
                }

                if ($this->isMobile) {
                    echo CJSON::encode(array('result' => 'ok', 'response' => 'Informaci&oacute;n actualizada'));
                    Yii::app()->end();
                } else {
                    $idDireccionSeleccionada = 0;
                    $modelPago = null;
                    if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']])) {
                        $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];
                    }

                    if ($modelPago != null) {
                        $idDireccionSeleccionada = $modelPago->idDireccionDespacho;
                    }

                    if ($radio == 'pasoscompra') {
                        echo CJSON::encode(array(
                            'result' => 'ok',
                            'response' => array('mensaje' => 'Informaci&oacute;n actualizada')
                        ));
                    } else {
                        echo CJSON::encode(array(
                            'result' => 'ok',
                            'response' => array(
                                'mensaje' => 'Informaci&oacute;n actualizada',
                                'direccion' => $model->idDireccionDespacho,
                                'direccionHTML' => $this->renderPartial('/usuario/_d_direccionVista', array('model' => $model, 'radio' => $radio, 'idDireccionSeleccionada' => $idDireccionSeleccionada, 'editar' => true), true),
                        )));
                    }
                    Yii::app()->end();
                }
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        } else {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }
    }

    public function actionDireccionEliminar() {
        $pk = Yii::app()->getRequest()->getPost('direccion', null);

        if (!Yii::app()->request->isPostRequest || $pk === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $model = DireccionesDespacho::model()->findByPk($pk);

        if ($model == null) {
            throw new CHttpException(404, 'Página solicitada no existe.');
        }

        $model->setScenario('updateDelete');
        $model->activo = 0;

        if (!$model->save()) {
            echo CJSON::encode(array('result' => 'error', 'response' => "Error al eliminar dirección, por favor intente de nuevo. " . CVarDumper::dumpAsString($model->getErrors())));
            Yii::app()->end();
        }

        echo CJSON::encode(array('result' => 'ok', 'response' => 'Direcci&oacute;n eliminada'));
        Yii::app()->end();
    }

    public function actionDireccionCrear() {
        $objSectorCiudad = $this->objSectorCiudad;

        if ($objSectorCiudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Seleccionar ubicación'));
            Yii::app()->end();
        }

        $render = Yii::app()->getRequest()->getPost('render', false);

        $direccionForm = "_direccionForm";
        $direcciones = "_direcciones";
        if (!$this->isMobile) {
            $direccionForm = "_d_direccionForm";
            $direcciones = "_d_direcciones";
        }


        if ($render == true) {
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'dialogoHTML' => $this->renderPartial($direccionForm, array('model' => new DireccionesDespacho, 'modal' => true), true)
            )));
            Yii::app()->end();
        } else if (isset($_POST['DireccionesDespacho'])) {
            $model = new DireccionesDespacho;
            $model->attributes = $_POST['DireccionesDespacho'];

            $model->identificacionUsuario = Yii::app()->user->name;
            $model->activo = 1;
            $model->codigoCiudad = $objSectorCiudad->codigoCiudad;
            $model->codigoSector = $objSectorCiudad->codigoSector;

            if ($model->validate()) {
                if (!$model->save()) {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'Error al guardar dirección, por favor intente de nuevo'));
                    Yii::app()->end();
                }

                if ($this->isMobile) {
                    $modal = Yii::app()->getRequest()->getPost('modal', 0);

                    if ($modal == 1) {
                        $listDirecciones = DireccionesDespacho::consultarDireccionesUsuario(Yii::app()->user->name, true);
                        echo CJSON::encode(array('result' => 'ok', 'response' => array(
                                'mensaje' => 'Direcci&oacute;n adicionada',
                                'direccionesHTML' => $this->renderPartial('_direcciones', array('listDirecciones' => $listDirecciones), true)
                        )));
                        Yii::app()->end();
                    } else {
                        $modelPago = null;
                        if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]))
                            $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];

                        if ($modelPago != null) {
                            $modelPago->idDireccionDespacho = $model->idDireccionDespacho;
                            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                        }

                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Informaci&oacute;n guardada'));
                        Yii::app()->end();
                    }
                } else {
                    $modelPago = null;
                    if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]))
                        $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];

                    if ($modelPago != null) {
                        $modelPago->idDireccionDespacho = $model->idDireccionDespacho;
                        Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                    }

                    $pagoExpress = Yii::app()->getRequest()->getPost('pagoExpress', 0);
                    $vista = Yii::app()->getRequest()->getPost('vista', 0);

                    $direccionesHTML = "";

                    if ($vista == "pasoscompra") {
                        $listDirecciones = DireccionesDespacho::model()->findAll(array(
                            'condition' => 'identificacionUsuario=:cedula AND (codigoCiudad=:ciudad AND (codigoSector=:sector OR codigoSector=0)) AND activo=:activo',
                            'params' => array(
                                ':cedula' => Yii::app()->user->name,
                                ':activo' => 1,
                                ':ciudad' => $objSectorCiudad->codigoCiudad,
                                ':sector' => $objSectorCiudad->codigoSector
                            )
                        ));

                        $idDireccionSeleccionada = 0;
                        if ($modelPago != null) {
                            Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                            $idDireccionSeleccionada = $modelPago->idDireccionDespacho;
                        }

                        $direccionesHTML = $this->renderPartial('/carro/_d_direccionesLista', array('listDirecciones' => $listDirecciones, 'idDireccionSeleccionada' => $idDireccionSeleccionada), true);
                    } else if ($vista == "pagoexpress") {
                        $objPagoExpress = PagoExpress::model()->find(array(
                            'with' => array('objDireccionDespacho' => array('condition' => 'objDireccionDespacho.codigoCiudad=:ciudad AND objDireccionDespacho.codigoSector=:sector')),
                            'condition' => 't.identificacionUsuario=:cedula AND t.activo=:activo',
                            'params' => array(
                                ':cedula' => Yii::app()->user->name,
                                ':activo' => 1,
                                ':ciudad' => $objSectorCiudad->codigoCiudad,
                                ':sector' => $objSectorCiudad->codigoSector
                            )
                        ));

                        if ($objPagoExpress === null) {
                            $objPagoExpress = new PagoExpress;
                            $objPagoExpress->identificacionUsuario = Yii::app()->user->name;
                        }
                        $objPagoExpress->idDireccionDespacho = $model->idDireccionDespacho;

                        $listDirecciones = DireccionesDespacho::model()->findAll(array(
                            'condition' => 'identificacionUsuario=:cedula AND codigoCiudad=:ciudad AND codigoSector=:sector AND activo=:activo',
                            'params' => array(
                                ':cedula' => Yii::app()->user->name,
                                ':activo' => 1,
                                ':ciudad' => $objSectorCiudad->codigoCiudad,
                                ':sector' => $objSectorCiudad->codigoSector
                            )
                        ));

                        $direccionesHTML = $this->renderPartial('/usuario/_d_direccionListaAcordeon', array('objPagoExpress' => $objPagoExpress, 'listDirecciones' => $listDirecciones), true);
                    } else if ($vista == "direcciones") {
                        $listDirecciones = DireccionesDespacho::consultarDireccionesUsuario(Yii::app()->user->name, true);
                        $direccionesHTML = $this->renderPartial($direcciones, array('listDirecciones' => $listDirecciones), true);
                    }

                    echo CJSON::encode(array('result' => 'ok', 'response' => array(
                            'mensaje' => 'Direcci&oacute;n adicionada',
                            //'pagoExpress' => $pagoExpress,
                            'direccionesHTML' => $direccionesHTML
                    )));
                    Yii::app()->end();
                }
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
    }

    /*public function actionBienvenida() {
        $objUsuario = Usuario::model()->find(array(
            'condition' => 'identificacionUsuario=:usuario',
            'params' => array(
                ':usuario' => 1113618983
            )
        ));
        $this->render("d_bienvenida", array('objUsuario' => $objUsuario, 'url' => $this->createUrl("/")));
    }*/

    protected function gridDetallePedido($data, $row) {
        $clase = 'ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon';
        $texto = 'Ver';
        if (!$this->isMobile) {
            $clase = 'center';
            $texto = '<span class="glyphicon glyphicon-eye-open center-div" aria-hidden="true">';
        }

        return CHtml::link($texto, $this->createUrl('/usuario/pedido', array('compra' => $data->idCompra)), array('class' => $clase, 'data-ajax' => 'false'));
    }

    protected function gridFechaPedido($data, $row) {
        $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fechaCompra);
        return $fecha->format('y-m-d');
    }

    protected function gridDetalleLista($data, $row) {
        $clase = 'ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon';
        $texto = 'Ver';
        if (!$this->isMobile) {
            $clase = 'center';
            $texto = '<span class="glyphicon glyphicon-eye-open center-div" aria-hidden="true">';
        }


        return CHtml::link($texto, $this->createUrl('/usuario/listapersonal', array('lista' => $data->idLista)), array('class' => $clase, 'data-ajax' => 'false'));
    }

    protected function gridDetalleCotizacion($data, $row) {
        $clase = 'ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon';
        $texto = 'Ver';
        if (!$this->isMobile) {
            $clase = 'center';
            $texto = '<span class="glyphicon glyphicon-eye-open center-div" aria-hidden="true">';
        }

        return CHtml::link($texto, $this->createUrl('/usuario/cotizacion', array('cotizacion' => $data->idCotizacion)), array('class' => $clase, 'data-ajax' => 'false'));
    }

    protected function gridFechaCotizacion($data, $row) {
        $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fechaCotizacion);
        return $fecha->format('y-m-d');
    }

    public function actionRecordarListaPersonal($hash) {

        $datosDesencriptados = decrypt($hash, Yii::app()->params->claveLista);
        $datosDesencriptados = explode("~", $datosDesencriptados);
        $sesionUbicacion = false;


        $model = ListasPersonales::model()->find(array(
            'condition' => 'idLista =:idlista',
            'params' => array('idlista' => $datosDesencriptados[1])
        ));

        if (!Yii::app()->user->isGuest && (Yii::app()->user->name != $datosDesencriptados[0])) {
            Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] = null;
            Yii::app()->shoppingCart->clear();
        }

        if (Yii::app()->user->isGuest || Yii::app()->user->name != $datosDesencriptados[0]) {
            if ($model) {
                // autenticar a el usuario                
                try {
                    $modelLogin = Usuario::model()->findByPk($datosDesencriptados[0]);
                    $identity = new UserIdentity($modelLogin->identificacionUsuario, $modelLogin->clave);
                    $identity->authenticate(true);
                    Yii::app()->user->login($identity);
                } catch (Exception $txexc) {
                    Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                }

                // Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = 'null';
            } else {
                Yii::app()->end();
            }
        }

        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] != null) {
            $sesionUbicacion = true;
        }

        // Validar si el usuario logueado es el mismo de la lista.
        // Si no es el mismo limpiar la sesión y enviarlo.
        if (!$sesionUbicacion) {
            Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = Yii::app()->request->url;
            $this->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
        } else {
            $this->adicionarCanasta($datosDesencriptados[1]);
            $this->redirect(CController::$this->createUrl('/usuario/listapersonal', array('lista' => $datosDesencriptados[1])));
        }
    }

    private function adicionarCanasta($lista = null) {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($lista === null) {
            Yii::app()->end();
        }

        $listaProductos = array();
        Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']] = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']]))
            $listaProductos = Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']];

        $objLista = ListasPersonales::model()->find(array(
            'condition' => 'idLista=:lista AND identificacionUsuario=:usuario',
            'params' => array(
                ':lista' => $lista,
                ':usuario' => Yii::app()->user->name
            )
        ));

        if ($objLista === null) {
            //  echo CJSON::encode(array('result' => 'error', 'response' => 'Lista no existente'));
            Yii::app()->end();
        }

        $fecha = new DateTime;
        $nUnidadesCompra = 0;
        $nUnidadesCarro = 0;

        foreach ($objLista->listDetalle as $objDetalle) {
            if ($objDetalle->idCombo != null) {
                $nUnidadesCompra += $objDetalle->unidades;

                $objCombo = Combo::model()->find(array(
                    'with' => array('listProductos', 'listProductosCombo', 'listComboSectorCiudad'),
                    'condition' => 't.idCombo=:combo AND t.estadoCombo=:estado AND t.fechaInicio<=:fecha AND t.fechaFin>=:fecha AND listComboSectorCiudad.saldo>:saldo AND listComboSectorCiudad.codigoCiudad=:ciudad AND listComboSectorCiudad.codigoSector=:sector',
                    'params' => array(
                        ':combo' => $objDetalle->idCombo,
                        ':estado' => 1,
                        ':fecha' => $fecha->format('Y-m-d H:i:s'),
                        ':saldo' => 0,
                        ':ciudad' => $objSectorCiudad->codigoCiudad,
                        ':sector' => $objSectorCiudad->codigoSector,
                    )
                ));

                if ($objCombo === null) {
                    continue;
                }

                $objSaldo = $objCombo->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

                if ($objSaldo === null) {
                    continue;
                }

                if ($objDetalle->unidades > 0) {
                    $cantidadCarroUnidad = 0;
                    $position = Yii::app()->shoppingCart->itemAt($objCombo->getcodigo());

                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantity();
                    }

                    if ($cantidadCarroUnidad + $objDetalle->unidades <= $objSaldo->saldo) {
                        $objProductoCarro = new ProductoCarro($objCombo);
                        Yii::app()->shoppingCart->put($objProductoCarro, false, $objDetalle->unidades);
                        $nUnidadesCarro += $objDetalle->unidades;
                    }
                }
            } else if ($objDetalle->codigoProducto != null) {
                $nUnidadesCompra += $objDetalle->unidades;

                //agregar productos
                $objProducto = Producto::model()->find(array(
                    'with' => array(
                        'listSaldos' => array('condition' => '(listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                        'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                        'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
                    ),
                    'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
                    'params' => array(
                        ':activo' => 1,
                        ':codigo' => $objDetalle->codigoProducto,
                        ':ciudad' => $objSectorCiudad->codigoCiudad,
                        ':sector' => $objSectorCiudad->codigoSector,
                    ),
                ));

                if ($objProducto === null) {
                     $objProducto = Producto::model()->find(array(
                        'with' => array('listImagenes', 'objDetalle', 'objCodigoEspecial'),
                        'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
                        'params' => array(
                            ':activo' => 1,
                            ':codigo' => $objDetalle->codigoProducto,
                        ),
                    ));
                    
                    $listaProductos[$objDetalle->codigoProducto] = $objProducto;
                    continue;
                }

                $objSaldo = $objProducto->getSaldo($objSectorCiudad->codigoCiudad, $objSectorCiudad->codigoSector);

                if ($objSaldo === null) {
                      $objProducto = Producto::model()->find(array(
                        'with' => array('listImagenes', 'objDetalle', 'objCodigoEspecial'),
                        'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
                        'params' => array(
                            ':activo' => 1,
                            ':codigo' => $objDetalle->codigoProducto,
                        ),
                    ));
                    
                    $listaProductos[$objDetalle->codigoProducto] = $objProducto;
                    continue;
                }

                $position = Yii::app()->shoppingCart->itemAt($objDetalle->codigoProducto);

                if ($objDetalle->unidades > 0) {
                    $cantidadCarroUnidad = 0;
                    if ($position !== null) {
                        $cantidadCarroUnidad = $position->getQuantityUnit();
                    }

                    //si hay saldo, agrega a carro
                    if ($cantidadCarroUnidad + $objDetalle->unidades <= $objSaldo->saldoUnidad) {
                        $objProductoCarro = new ProductoCarro($objProducto);
                        Yii::app()->shoppingCart->put($objProductoCarro, false, $objDetalle->unidades);
                        $nUnidadesCarro += $objDetalle->unidades;
                    }
                } else {

                    $objProducto = Producto::model()->find(array(
                        'with' => array('listImagenes', 'objDetalle', 'objCodigoEspecial', 'listCalificaciones' => array('with' => 'objUsuario')),
                        'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
                        'params' => array(
                            ':activo' => 1,
                            ':codigo' => $objDetalle->codigoProducto,
                        ),
                    ));
                    
                    $listaProductos[$objDetalle->codigoProducto] = $objProducto;
                    
                }
            }
        }

        Yii::app()->session[Yii::app()->params->sesion['productosNoAgregados']] = $listaProductos;
        
    
        /*
          if ($nUnidadesCarro == 0) {
          // echo CJSON::encode(array('result' => 'error', 'response' => 'Productos no disponibles'));
          Yii::app()->end();
          }

          $porcentajeCarro = floor(100 * ($nUnidadesCarro / $nUnidadesCompra));

          $canasta = 'canasta';
          if (!$this->isMobile) {
          $canasta = 'd_canasta';
          }

          echo CJSON::encode(array(
          'result' => 'ok',
          'response' => array(
          'canastaHTML' => $this->renderPartial($canasta, null, true),
          'mensajeHTML' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => "$porcentajeCarro% de lista agregada"), true),
          ),
          ));
         * */
        $this->redirect(CController::createUrl('/carro/index', array('opcion' => 1)));
    }

}
