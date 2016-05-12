<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class UsuarioController extends ControllerVendedor {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            'access + index, autenticar',
                //'login + index, infoPersonal, direcciones, direccionCrear, pagoexpress, listapedidos, pedido, listapersonal, listadetalle',
                //'loginajax + direccionActualizar',
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
        if (!Yii::app()->controller->module->user->isGuest) {
            $this->redirect(Yii::app()->controller->module->homeUrl);
        }
        $filter->run();
    }

    public function filterLogin($filter) {
        if (Yii::app()->controller->module->user->isGuest) {
            $this->redirect(Yii::app()->user->loginUrl);
        }
        $filter->run();
    }

    public function filterLoginajax($filter) {
        if (Yii::app()->controller->module->user->isGuest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta usuario autenticado, por favor iniciar sesión para continuar'));
            Yii::app()->end();
        }
        $filter->run();
    }

    public function actionIndex() {
        $this->redirect($this->createUrl('autenticar'));
    }

    public function actionAutenticar() {

        if (!Yii::app()->controller->module->user->isGuest) {
            $this->redirect(Yii::app()->controller->module->homeUrl);
        }
        $this->showSeeker = false;
        $this->showHeaderIcons = false;
        $this->render('autenticar');
    }

    public function actionIngresar() {
        if (!Yii::app()->request->isPostRequest) {
            $this->redirect(Yii::app()->controller->module->homeUrl);
            Yii::app()->end();
        }

        $model = new LoginVendedorForm();

        if (isset($_POST['LoginVendedorForm'])) {
            $model->attributes = $_POST['LoginVendedorForm'];

            $redirect = Yii::app()->homeUrl . Yii::app()->controller->module->homeUrl[0];
            //echo CJSON::encode(array("result"=>"error","response"=>"redirect: $redirect"));exit();

            if ($model->validate()) {

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

    public function actionRecordar() {
        if (!Yii::app()->request->isPostRequest) {
            $this->redirect(Yii::app()->homeUrl);
            Yii::app()->end();
        }

        $model = new RecordarVendedorForm;

        if (isset($_POST['RecordarVendedorForm'])) {
            $model->attributes = $_POST['RecordarVendedorForm'];

            if ($model->validate()) {
                try {
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

    /**
     * Cierra sesion y redirecciona a la pagina de autenticacion
     */
    public function actionSalir() {
        Yii::app()->controller->module->user->logout();
        $this->redirect(Yii::app()->controller->module->homeUrl);
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
        $usuario = Operador::model()->find(array(
            //'with' => array('objUsuarioExtendida', 'objPerfil'),
            'condition' => 't.idOperador=:operador',
            'params' => array(
                ':operador' => Yii::app()->controller->module->user->id
            )
        ));
        
        if (isset($_POST['RegistroForm'])) {
            $model->attributes = $_POST['RegistroForm'];
            
            if ($model->validate()) {
                try {
                    $usuario->clave = $model->clave;

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

        $this->render('registro', array('model' => $model));
        
    }

}
