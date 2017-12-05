<?php

class TercerosController extends ControllerOperator {

    public $defaultAction = "admin";

    public function filters() {
        return array(
            'login + admin',
            'access + admin',
                //'loginajax + direccionActualizar',
        );
    }

    protected function beforeAction($action)
    {
        Yii::import('Proveedor');
        Yii::import('terceros.models.UsuarioTercero');
        return parent::beforeAction($action);
    }

    public function filterAccess($filter) {
        if (Yii::app()->controller->module->user->isGuest || !in_array(Yii::app()->controller->module->user->profile, array(2, 3))) {
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

    public function actionAdmin()
    {
        $model=new UsuarioTercero('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['UsuarioTercero']))
            $model->attributes=$_GET['UsuarioTercero'];

        $this->render('admin',array(
            'model'=>$model,
        ));
    }

    public function actionCrear() {
        Yii::import('ext.select2.Select2');
        $model = new UsuarioTercero;
        if (isset($_POST['UsuarioTercero'])) {
            $model->attributes = $_POST['UsuarioTercero'];
            $password = generatePass(10);
            $model->clave = $model->hash($password);
            if ($model->save()) {
                $this->notificarRegistroTercero($model->correoContacto, $password);
                $this->redirect(array('admin'));
            }
        }

        $proveedores = Proveedor::model()->findAll();
        $listadoProveedores = CHtml::listData($proveedores, 'codigoProveedor', 'nombreProveedor');
        $this->render('crear', array(
            'model' => $model,
            'proveedores' => $listadoProveedores
        ));
    }

    private function notificarRegistroTercero($correo, $clave)
    {
        $asuntoCorreo = Yii::app()->params['asuntoTercero']['registroUsuario'];
        $contenidoCorreo = $this->renderPartial('correoRegistroUsuario', array(
            'correo' => $correo,
            'clave' => $clave
            ), true, true);
        
        $htmlCorreo = PlantillaCorreo::getContenido('registroUsuarioTercero',$contenidoCorreo);
        
        try {
            sendHtmlEmail($correo, $asuntoCorreo, $htmlCorreo);
        } catch (Exception $ce) {
            Yii::log("Error enviando correo al registrar usuario #$objCompra->idCompra\n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
        }
    }

    public function actionActualizar($id)
    {
        Yii::import('ext.select2.Select2');
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['UsuarioTercero']))
        {
            $model->attributes=$_POST['UsuarioTercero'];
            if($model->save())
                $this->redirect(array('admin'));
        }

        $proveedores = Proveedor::model()->findAll();
        $listadoProveedores = CHtml::listData($proveedores, 'codigoProveedor', 'nombreProveedor');
        $this->render('actualizar',array(
            'model'=>$model,
            'proveedores' => $listadoProveedores
        ));
    }

    public function loadModel($id)
    {
        $model=UsuarioTercero::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

}