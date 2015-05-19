<?php

class UsuarioController extends Controller {
    //public $defaultAction = 'autenticar';

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            'access + autenticar, recordar, registro, restablecer',
            'login + index, infoPersonal, direcciones, direccionCrear',
            'loginajax + direccionActualizar',
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
            //Yii::app()->session[Yii::app()->params->sesion['redireccionEntrega']] = 'null';
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
        $this->showSeeker = false;

        $model = new LoginForm;

        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];

            if ($model->validate()) {
                if (Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] == 'null') {
                    $this->redirect(Yii::app()->homeUrl);
                } else {
                    $this->redirect(Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']]);
                }
                //echo "--URL: " . Yii::app()->request->urlReferrer;
                //$this->redirect(Yii::app()->request->urlReferrer);
                //$this->redirect(Yii::app()->user->returnUrl);
            }
        } else {
            if (!isset(Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']])) {
                Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = 'null';
            }

            if (Yii::app()->request->urlReferrer == null) {
                Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = 'null';
            } else {
                Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']] = Yii::app()->request->urlReferrer;
            }
        }

        //echo "--URL: " . Yii::app()->request->urlReferrer;
        //echo "--URL2: " . Yii::app()->session[Yii::app()->params->sesion['redireccionAutenticacion']];

        $this->render('autenticar', array('model' => $model));
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
                    //$usuario->fechaUltimoAcceso = new CDbExpression('NOW()');

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
                    $usuarioExt->fechaRegistro = new CDbExpression('NOW()');

                    if (!$usuarioExt->save()) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('error', "Error al guardar información complementaria, por favor, intente de nuevo.");
                        $this->render('registro', array('model' => $model));
                        Yii::app()->end();
                    }

                    $identity = new UserIdentity($model->cedula, $model->clave);
                    $identity->authenticate();
                    Yii::app()->user->login($identity);

                    $contenido = $this->renderPartial('_correoBienvenida', array('objUsuario' => $usuario), true, true);
                    $htmlCorreo = $this->renderPartial('_correo', array('contenido' => $contenido), true, true);
                    sendHtmlEmail($usuario->correoElectronico, Yii::app()->params->asuntoBienvenida, $htmlCorreo);
                    $transaction->commit();

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

        Yii::app()->session[Yii::app()->params->sesion['usuarioBienvenida']] = Yii::app()->request->urlReferrer == null ? Yii::app()->homeUrl : Yii::app()->request->urlReferrer;
        $this->render('registro', array('model' => $model));
    }

    public function actionBienvenida() {
        $this->showSeeker = false;
        try {
            $objUsuario = Usuario::model()->findByPk(1113618983);
            $contenido = $this->renderPartial('_correoBienvenida', array('objUsuario' => $objUsuario), true, true);
            $htmlCorreo = $this->renderPartial('_correo', array('contenido' => $contenido), true, true);
            sendHtmlEmail($objUsuario->correoElectronico, Yii::app()->params->asuntoBienvenida, $htmlCorreo);
            $this->render('bienvenida', array('objUsuario' => $objUsuario, 'url' => Yii::app()->homeUrl));
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            Yii::app()->user->setFlash('error', "Error: " . $exc->getMessage());
            echo "Error: " . $exc->getMessage();
        }
    }

    private function bienvenida() {
        echo "<p>2</p>";
        $this->showSeeker = false;
        $objUsuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
        echo "<p>3</p>";

        $contenido = $this->renderPartial('_correoBienvenida', array('objUsuario' => $objUsuario), true, true);
        $htmlCorreo = $this->renderPartial('_correo', array('contenido' => $contenido), true, true);
        echo "<p>4</p>";
        sendHtmlEmail($objUsuario->correoElectronico, Yii::app()->params->asuntoBienvenida, $htmlCorreo);
        echo "<p>5</p>";
        $this->render('bienvenida', array('objUsuario' => $objUsuario, 'url' => Yii::app()->session[Yii::app()->params->sesion['usuarioBienvenida']]));
    }

    /**
     * Cierra sesion y redirecciona a la pagina de autenticacion
     */
    public function actionSalir() {
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

                    $contenido = $this->rederPartial('_correoRecordar', array('objUsuario' => $model->usuario), true, true);
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

        $this->render('recordar', array('model' => $model));
    }

    public function actionCorreo() {
        try {
            $objUsuario = Usuario::model()->findByPk(1113618983);
            $contenido = $this->renderPartial('_correoRecordar', array('objUsuario' => $objUsuario), true, true);

            $htmlCorreo = $this->renderPartial('_correo', array('contenido' => $contenido), true, true);
            sendHtmlEmail($objUsuario->correoElectronico, Yii::app()->params->asuntoRecordatorioClave, $htmlCorreo);
            echo "EXITO";

            //$this->renderPartial('_correo', array('titulo' => 'Recordatorio de contraseña', 'cuerpo'=>$cuerpo));
        } catch (Exception $exc) {
            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            Yii::app()->user->setFlash('error', "Error: " . $exc->getMessage());
            echo "Error: " . $exc->getMessage();
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
                        $this->render('restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
                        Yii::app()->end();
                    }

                    $transaction->commit();
                    $identity = new UserIdentity($objUsuario->identificacionUsuario, $model->clave);
                    $identity->authenticate(true);
                    Yii::app()->user->login($identity);
                    $this->redirect(Yii::app()->homeUrl);
                } catch (Exception $exc) {
                    try {
                        $transaction->rollBack();
                    } catch (Exception $txexc) {
                        Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    }

                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                    Yii::app()->user->setFlash('error', "Error: " . $exc->getMessage());
                    $this->render('restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
                    Yii::app()->end();
                }
            }
        }

        $this->render('restablecer', array('model' => $model, 'objUsuario' => $objUsuario));
    }

    public function actionInfopersonal() {
        $this->showSeeker = false;

        $model = new RegistroForm('actualizar');
        $usuario = Yii::app()->session[Yii::app()->params->usuario['sesion']];
        $usuarioExt = $usuario->objUsuarioExtendida;

        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];

            if ($model->validate()) {
                $transaction = Yii::app()->db->beginTransaction();
                try {
                    $usuario->nombre = $model->nombre;
                    $usuario->apellido = $model->apellido;
                    $usuario->correoElectronico = $model->correoElectronico;
                    $usuario->clave = $usuario->hash($model->clave);

                    if (!$usuario->save()) {
                        $transaction->rollBack();
                        Yii::app()->user->setFlash('error', "Error al guardar información básica, por favor, intente de nuevo.");
                        $this->render('registro', array('model' => $model));
                        Yii::app()->end();
                    }

                    $usuarioExt->profesion = $model->profesion;

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
            $model->profesion = $usuarioExt->profesion;
        }

        $this->render('registro', array('model' => $model));
    }

    public function actionDirecciones() {
        $this->showSeeker = false;
        $this->fixedFooter = true;

        $models = DireccionesDespacho::model()->findAll(array(
            'condition' => 'identificacionUsuario=:cedula AND activo=:activo',
            'params' => array(
                ':cedula' => Yii::app()->user->name,
                ':activo' => 1,
            )
        ));

        foreach ($models as $model) {
            $model->codigoCiudad = "$model->codigoCiudad-$model->codigoSector";
        }

        $listUbicacion = SectorCiudad::listDataSubsector();
        $this->render('direcciones', array('models' => $models, 'listUbicacion' => $listUbicacion));
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

            if ($form->codigoCiudad !== null && !empty($form->codigoCiudad)) {
                $codigo = $form->codigoCiudad;
                $codigo = explode("-", $codigo);
                $model->codigoCiudad = $codigo[0];
                $model->codigoSector = $codigo[1];
            }

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

        if (isset($_POST['DireccionesDespacho'])) {
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
                
                $modelPago = null;

                if (isset(Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']]))
                    $modelPago = Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']];
                
                if($modelPago!=null){
                    $modelPago->idDireccionDespacho = $model->idDireccionDespacho;
                    Yii::app()->session[Yii::app()->params->sesion['carroPagarForm']] = $modelPago;
                }
                
                echo CJSON::encode(array('result' => 'ok', 'response' => 'Informaci&oacute;n guardada'));
                Yii::app()->end();
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }
    }

    public function actionDireccionCrearOld() {
        $objSectorCiudad = null;
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]))
            $objSectorCiudad = Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']];

        if ($objSectorCiudad === null) {
            Yii::app()->user->setFlash('error', "Seleccionar ubicación.");
            $this->redirect($this->createUrl('/usuario/direcciones'));
        }

        $model = new DireccionesDespacho;

        if (isset($_POST['DireccionesDespacho'])) {
            $model->attributes = $_POST['DireccionesDespacho'];
            $model->identificacionUsuario = Yii::app()->user->name;
            $model->activo = 1;
            $model->codigoCiudad = $objSectorCiudad->codigoCiudad;
            $model->codigoSector = $objSectorCiudad->codigoSector;

            if ($model->validate()) {
                if ($model->save()) {
                    $this->redirect($this->createUrl('/usuario/direcciones'));
                } else {
                    Yii::app()->user->setFlash('error', "Error al guardar dirección, por favor intente de nuevo.");
                }
            }
        }

        $this->render('direccion', array('model' => $model));
    }

}
