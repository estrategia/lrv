<?php

class OperadorController extends ControllerOperator {

    public $defaultAction = "admin";

    public function filters() {
        return array(
            'login + admin',
            'access + admin',
                //'loginajax + direccionActualizar',
        );
    }

    public function filterAccess($filter) {
        if (Yii::app()->controller->module->user->isGuest || Yii::app()->controller->module->user->profile != 2) {
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        Yii::import('ext.select2.Select2');
        $model = new Operador;
        $model->clave = $model->hash($model->clave);
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Operador'])) {

            $model->attributes = $_POST['Operador'];

            if ($model->save()) {
                if ($model->perfil == Yii::app()->params->callcenter['perfilesOperador']['vendedorPDV']) {
                    $puntoVenta = new OperadorSubasta;
                    $puntoVenta->idComercial = $_POST['select-pdv-asignar'];
                    $puntoVenta->idOperador = $model->idOperador;
                    if ($puntoVenta->save()) {
                        $this->redirect(array('admin', 'usuario' => $model->usuario));
                    } else {
                        throw new CHttpException(404, 'Error al guardar el vendedor.');
                    }
                }
                $this->redirect(array('admin', 'usuario' => $model->usuario));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        Yii::import('ext.select2.Select2');
        $model = $this->loadModel($id);
        $operadorSubasta = OperadorSubasta::model()->find('idOperador =:operador', array(':operador' => $id));

        if ($operadorSubasta) {
            $model->idComercial = $operadorSubasta->idComercial;
        }
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Operador'])) {

            $model->attributes = $_POST['Operador'];
            
            if ($model->save()) {
               
                if ($model->perfil == Yii::app()->params->callcenter['perfilesOperador']['vendedorPDV']) {
                    $operadorSubasta = OperadorSubasta::model()->deleteALl('idOperador =:operador', array(':operador' => $model->idOperador));

                    $operadorSubasta = new OperadorSubasta();
                    $operadorSubasta->idOperador = $model->idOperador;
                    $operadorSubasta->idComercial = $_POST['select-pdv-asignar'];
                    if ($operadorSubasta->save()) {
                        $this->redirect(array('admin', 'usuario' => $model->usuario));
                    } else {
                        throw new CHttpException(404, 'Error al actualizar el vendedor.');
                    }
                }
            }
            $this->redirect(array('admin', 'usuario' => $model->usuario));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin($usuario = null) {
        $model = new Operador('search');
        $model->unsetAttributes();
        if (isset($_GET['Operador']))
            $model->attributes = $_GET['Operador'];

        if ($model->usuario == null && $usuario != null) {
            $model->usuario = $usuario;
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Operador the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Operador::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'La página solicitada no existe.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Operador $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'operador-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionVerificarPerfil() {

        if (isset($_POST['perfil'])) {
            $response = '';
            switch ($_POST['perfil']) {
                case Yii::app()->params->callcenter['perfilesOperador']['vendedorPDV']: $response = '2';
                    break;
                case Yii::app()->params->callcenter['perfilesOperador']['mensajeroVendedor']: $response = '3';
                    break;
                default: '1';
                    break;
            }
            echo CJSON::encode(
                    array(
                        'result' => 'ok',
                        'response' => $response
            ));
        }
    }

}
