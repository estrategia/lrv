<?php

class UsuarioController extends Controller {
    //public $defaultAction = 'autenticar';

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            'access + autenticar, recordar, registro, restablecer',
            'login + index, infoPersonal, contrasena, direcciones, pagoexpress, listapedidos, listapersonal, pedido, listadetalle',
            'loginajax + direccionCrear, direccionActualizar',
        );
    }

    /*
      public function filters() {
      return array(
      array('tienda.filters.AccessControlFilter'),
      array('tienda.filters.LanzamientoControlFilter'),
      );
      } */

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
        $this->showSeeker = false;
        $this->render('menu');
    }

    /**
     * Visualiza la pagina de autenticacion de usuario
     */
    public function actionAutenticar() {
        $this->showSeeker = true;

        $model = new LoginForm;

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];

            if ($model->validate()) {
                if (Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] == 'null') {
                    $this->redirect(Yii::app()->homeUrl);
                } else {
                    $redirect = Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']];
                    Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = 'null';
                    $this->redirect($redirect);
                }
                //echo "--URL: " . Yii::app()->request->urlReferrer;
                //$this->redirect(Yii::app()->request->urlReferrer);
                //$this->redirect(Yii::app()->user->returnUrl);
            }
        } else {
            if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']]) || Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] == 'null') {
                Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = (Yii::app()->request->urlReferrer == null ? 'null' : Yii::app()->request->urlReferrer);
            }
        }

       if($this->isMobile){
            $this->render('autenticar', array('model' => $model));
        }else{
            $this->render('d_autenticar', array('model' => $model));
        }
    }

    public function actionRegistro() {
        $this->showSeeker = false;

        $model = new RegistroForm('registro');

        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];

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
                    $htmlCorreo = $this->renderPartial('_correo', array('contenido' => $contenido), true, true);
                    sendHtmlEmail($usuario->correoElectronico, Yii::app()->params->asuntoBienvenida, $htmlCorreo);
                    $transaction->commit();
                    
                    $identity = new UserIdentity($model->cedula, $model->clave);
                    $identity->authenticate();
                    Yii::app()->user->login($identity);

                    Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = 'null';
                     if($this->isMobile){
                        $this->render('bienvenida', array('objUsuario' => $usuario, 'url' => Yii::app()->session[Yii::app()->params->sesion['usuarioBienvenida']]));
                    }else{
                        $this->render('d_bienvenida', array('objUsuario' => $usuario, 'url' => Yii::app()->session[Yii::app()->params->sesion['usuarioBienvenida']]));
                    }
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

                    try {
                        $transaction->rollBack();
                    } catch (Exception $txexc) {
                        Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }

                    Yii::app()->user->setFlash('error', "Error al realizar registro, por favor intente de nuevo. " . $exc->getMessage());
                    $this->render('registro', array('model' => $model));
                    Yii::app()->end();
                }
            } else {
                $this->render('registro', array('model' => $model));
                Yii::app()->end();
            }
        }

        if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']]) || Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] == 'null') {
            Yii::app()->session[Yii::app()->params->sesion['usuarioBienvenida']] = Yii::app()->request->urlReferrer == null ? Yii::app()->homeUrl : Yii::app()->request->urlReferrer;
        } else {
            Yii::app()->session[Yii::app()->params->sesion['usuarioBienvenida']] = Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']];
        }


        //Yii::app()->session[Yii::app()->params->sesion['usuarioBienvenida']] = Yii::app()->request->urlReferrer == null ? Yii::app()->homeUrl : Yii::app()->request->urlReferrer;

        if($this->isMobile){
            $this->render('registro', array('model' => $model));
        }else{
            $this->render('d_registro', array('model' => $model));
        }
    }

    public function actionInvitado() {
        $this->showSeeker = false;

        $model = new RegistroForm('invitado');

        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];

            if ($model->validate()) {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    $usuario = new Usuario;
                    $usuario->identificacionUsuario = $model->cedula;
                    $usuario->nombre = $model->nombre;
                    $usuario->apellido = $model->apellido;
                    $usuario->correoElectronico = $model->correoElectronico;
                    $usuario->clave = $model->cedula;
                    $usuario->nombre = $model->nombre;
                    $usuario->activo = Yii::app()->params->usuario['estado']['activo'];
                    $usuario->codigoPerfil = Yii::app()->params->perfil['defecto'];
                    $usuario->invitado = 1;

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
                        Yii::app()->user->setFlash('error', "Error al guardar información complementaria, por favor, intente de nuevo.");
                        $this->render('registro', array('model' => $model));
                        Yii::app()->end();
                    }

                    $contenido = $this->renderPartial('_correoBienvenida', array('objUsuario' => $usuario), true, true);
                    $htmlCorreo = $this->renderPartial('_correo', array('contenido' => $contenido), true, true);
                    sendHtmlEmail($usuario->correoElectronico, Yii::app()->params->asuntoBienvenida, $htmlCorreo);
                    $transaction->commit();

                    $identity = new UserIdentity($model->cedula, $model->clave);
                    $identity->authenticate(true);
                    Yii::app()->user->login($identity);

                    Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = 'null';
                    $this->render('bienvenida', array('objUsuario' => $usuario, 'url' => Yii::app()->session[Yii::app()->params->sesion['usuarioBienvenida']]));
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');

                    try {
                        $transaction->rollBack();
                    } catch (Exception $txexc) {
                        Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }

                    Yii::app()->user->setFlash('error', "Error al realizar registro, por favor intente de nuevo. " . $exc->getMessage());
                    $this->render('registro', array('model' => $model));
                    Yii::app()->end();
                }
            } else {
                $this->render('registro', array('model' => $model));
                Yii::app()->end();
            }
        }

        $this->render('registro', array('model' => $model));
    }

    /**
     * Cierra sesion y redirecciona a la pagina de autenticacion
     */
    public function actionSalir() {
        $sessions = Yii::app()->params->sesion;
        foreach ($sessions as $sesion) {
            unset(Yii::app()->session[$sesion]);
        }
        
        Yii::app()->user->logout();
        
        //$this->redirect(Yii::app()->user->loginUrl);
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionRecordar() {
        $this->showSeeker = false;
        $this->fixedFooter = true;

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

                    $contenido = $this->renderPartial('_correoRecordar', array('objUsuario' => $model->usuario), true, true);
                    $htmlCorreo = $this->renderPartial('_correo', array('contenido' => $contenido), true, true);
                    sendHtmlEmail($model->correoElectronico, Yii::app()->params->asuntoRecordatorioClave, $htmlCorreo);
                    Yii::app()->user->setFlash('success', "Se ha enviado a su correo los datos de restauración de clave");

                    //$usuario->save();
                    //$this->render('_recordarexito', array('url' => Yii::app()->homeUrl));
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    Yii::app()->user->setFlash('error', "Error: " . $exc->getMessage());
                    $this->render('recordar', array('model' => $model));
                    Yii::app()->end();
                }
            }
        }

        if($this->isMobile){
            $this->render('recordar', array('model' => $model));
        }else{
            $this->render('d_recordar', array('model' => $model));
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
                        if($this->isMobile){
                            $this->render('restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
                        }else{
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
                     if($this->isMobile){
                        $this->render('restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
                    }else{
                        $this->render('d_restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
                    }
                    Yii::app()->end();
                }
            }
        }

         if($this->isMobile){
            $this->render('restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
        }else{
            $this->render('d_restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
        }
    }

    public function actionInfopersonal() {
        $this->showSeeker = false;

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
                        $this->render('registro', array('model' => $model));
                        Yii::app()->end();
                    }

                    if ($model->profesion != null)
                        $usuarioExt->codigoProfesion = $model->profesion;

                    if ($model->genero != null)
                        $usuarioExt->genero = $model->genero;

                    if ($model->fechaNacimiento != null)
                        $usuarioExt->fechaNacimiento = $model->fechaNacimiento;

                    if (!$usuarioExt->save()) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('error', "Error al guardar información complementaria, por favor, intente de nuevo.");
                        $this->render('registro', array('model' => $model));
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
                    $this->render('registro', array('model' => $model));
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

        if($this->isMobile){
            $this->render('registro', array('model' => $model));
        }else{
            $this->render('d_registro', array('model' => $model));
        }
    }
    
    public function actionContrasena() {
        $this->showSeeker = false;

        $model = new RegistroForm('contrasena');
        //$usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
        $usuario = Usuario::model()->find(array(
            //'with' => array('objUsuarioExtendida', 'objPerfil'),
            'condition' => 't.identificacionUsuario=:cedula',
            'params' => array(
                ':cedula' => Yii::app()->user->name
            )
        ));
        
        //CVarDumper::dump($model,10,true);
        
        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];
            if ($model->validate()) {
                try {
                    $usuario->clave = $usuario->hash($model->clave);

                    if ($usuario->save()) {
                        Yii::app()->user->setFlash('success', "Información actualizada.");
                        $model->clave = $model->claveConfirmar = null;
                    }else{
                        Yii::app()->user->setFlash('error', "Error al guardar contraseña, por favor, intente de nuevo.");
                    }
                    //Yii::app()->session[Yii::app()->params->usuario['sesion']] = $usuario;
                    
                } catch (Exception $exc) {
                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    Yii::app()->user->setFlash('error', "Error al realizar registro, por favor intente de nuevo.");
                    $this->render('registro', array('model' => $model));
                    Yii::app()->end();
                }
            }
        }

        $this->render('registro', array('model' => $model));
    }

    public function actionPagoexpress() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
            $this->redirect($this->createUrl('/sitio/ubicacion'));
        }

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

            if ($_POST['Submit'] == 1) {
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

        $this->render('pagoExpress', array(
            'listDirecciones' => $listDirecciones,
            'listFormaPago' => $listFormaPago,
            'objPagoExpress' => $objPagoExpress)
        );
    }

    public function actionListapedidos() {

        $model = new Compras('search');
        $model->unsetAttributes();
        if (isset($_GET['Compras']))
            $model->attributes = $_GET['Compras'];
        $model->activa = 1;
        $model->identificacionUsuario = Yii::app()->user->name;

        $this->render('pedidos', array(
            'model' => $model,
        ));
    }

    public function actionPedido($compra) {
        $objCompra = Compras::model()->find(array(
            'condition' => 'idCompra=:compra AND identificacionUsuario=:usuario',
            'params' => array(
                ':compra' => $compra,
                ':usuario' => Yii::app()->user->name
            )
        ));

        if ($objCompra === null) {
            $this->redirect($this->createUrl('listapedidos'));
        }

        $this->render('pedido', array(
            'objCompra' => $objCompra,
        ));
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

        $model->identificacionUsuario = Yii::app()->user->name;

        $this->render('listaPersonal', array(
            'model' => $model,
        ));
    }

    private function listapersonaldetalle($lista) {
        $model = ListasPersonales::model()->find(array(
            'with' => array('listDetalle'=>array("with"=>array("objProducto"=>array("with"=>array("listImagenes","objCodigoEspecial","listCalificaciones")),
                            "objCombo"=>array("with"=>array("listProductosCombo","listImagenesCombo"))))),
            'condition' => 't.idLista=:lista AND t.identificacionUsuario=:usuario',
            'params' => array(
                ':lista' => $lista,
                ':usuario' => Yii::app()->user->name
            )
        ));

        if ($model === null) {
            $this->redirect($this->createUrl('listapersonal'));
        }

        $this->render('listaDetalle', array(
            'model' => $model,
        ));
    }

    private function listapersonalGuardar() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
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

            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'dialogoHTML' => $this->renderPartial('listaGuardar', array('model' => $model), true)
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

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'detalleHTML' => $this->renderPartial('_listaDetalle', array('model' => $objDetalle->objLista), true),
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

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => array(
                'detalleHTML' => $this->renderPartial('_listaDetalle', array('model' => $objDetalle->objLista), true),
                'mensajeHTML' => $this->renderPartial('/common/mensajeHtml', array('mensaje' => "Elemento actualizado"), true),
            )
        ));
        Yii::app()->end();
    }

    public function actionDirecciones() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
            $this->redirect($this->createUrl('/sitio/ubicacion'));
        }

        $this->showSeeker = false;
        $this->fixedFooter = true;

        $models = DireccionesDespacho::model()->findAll(array(
            'with' => array('objCiudad'),
            'condition' => 'identificacionUsuario=:cedula AND activo=:activo',
            'params' => array(
                ':cedula' => Yii::app()->user->name,
                ':activo' => 1,
            )
        ));
        
        $listDirecciones = DireccionesDespacho::consultarDireccionesUsuario(Yii::app()->user->name, true);
        $this->render('direcciones', array('listDirecciones' => $listDirecciones));
    }

    public function actionDireccionActualizar() {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        if (isset($_POST['DireccionesDespacho'])) {
            $form = new DireccionesDespacho('update');
            $form->attributes = $_POST['DireccionesDespacho'];

            $model = DireccionesDespacho::model()->findByPk($form->idDireccionDespacho);

            if ($model == null) {
                //echo CJSON::encode(array('result' => 'error', 'response' => 'Página solicitada no existe'));
                //Yii::app()->end();
                throw new CHttpException(404, 'Página solicitada no existe.');
            }

            $model->descripcion = $form->descripcion;
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

                echo CJSON::encode(array('result' => 'ok', 'response' => 'Informaci&oacute;n actualizada'));
                Yii::app()->end();
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
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

        $model->activo = 0;

        if (!$model->save()) {
            echo CJSON::encode(array('result' => 'error', 'response' => "Error al eliminar dirección, por favor intente de nuevo. " . CVarDumper::dumpAsString($model->getErrors())));
            Yii::app()->end();
        }

        echo CJSON::encode(array('result' => 'ok', 'response' => 'Informaci&oacute;n actualizada'));
        Yii::app()->end();
    }
    
    public function actionDireccionCrear() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Seleccionar ubicación'));
            Yii::app()->end();
        }
        
        $render = Yii::app()->getRequest()->getPost('render', false);
        $modal = Yii::app()->getRequest()->getPost('modal', 0);
        
        if($render){
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => array(
                    'dialogoHTML' => $this->renderPartial('_direccionForm', array('model' => new DireccionesDespacho, 'modal'=>true), true)
            )));
            Yii::app()->end();
        }else if (isset($_POST['DireccionesDespacho'])) {
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

                if($modal == 1){
                    $listDirecciones = DireccionesDespacho::consultarDireccionesUsuario(Yii::app()->user->name, true);
                    echo CJSON::encode(array('result' => 'ok', 'response' => array(
                        'mensaje' => 'Direcci&oacute;n adicionada',
                        'direccionesHTML' => $this->renderPartial('_direcciones', array('listDirecciones' => $listDirecciones), true)
                    )));
                    Yii::app()->end();
                }else{
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
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
    }

    protected function gridDetallePedido($data, $row) {
        return CHtml::link('Ver', $this->createUrl('/usuario/pedido', array('compra'=>$data->idCompra)), array('class'=>'ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon', 'data-ajax'=>'false'));
    }
    
    protected function gridFechaPedido($data, $row) {
        $fecha = DateTime::createFromFormat('Y-m-d H:i:s', $data->fechaCompra);
        return $fecha->format('y-m-d');
    }
    
    protected function gridDetalleLista($data, $row) {
        return CHtml::link('Ver', $this->createUrl('/usuario/listapersonal', array('lista'=>$data->idLista)), array('class'=>'ui-btn ui-btn-inline ui-icon-view-circle ui-btn-icon-notext ui-icon-center ui-nodisc-icon', 'data-ajax'=>'false'));
    }

}
