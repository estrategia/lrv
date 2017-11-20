<?php

class OperadorController extends ControllerOperator {

    public $defaultAction = "admin";

    public function filters() {
        return array(
            'login + admin,create,update',
            'access + admin,create,update',
                //'loginajax + direccionActualizar',
        );
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

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        Yii::import('ext.select2.Select2');
        $model = new Operador('create');

        if (isset($_POST['Operador'])) {
            $model->attributes = $_POST['Operador'];
            $model->clave = $model->hash($model->clave);
            $model->codigoVendedor = isset($_POST["Operador"]["codigoVendedor"]) ? $_POST["Operador"]["codigoVendedor"] : null;
            $model->idComercial = isset($_POST["select-pdv-asignar"]) ? $_POST["select-pdv-asignar"] : null;

            if ($model->save()) {
                if ($model->perfil == Yii::app()->params->callcenter['perfilesOperador']['vendedorPDV']) {
                    $operadorSubasta = new OperadorSubasta;
                    $operadorSubasta->idComercial = $model->idComercial;
                    $operadorSubasta->idOperador = $model->idOperador;
                    if ($operadorSubasta->save()) {
                        $this->redirect(array('admin', 'usuario' => $model->usuario));
                    } else {
                        Yii::app()->user->setFlash('danger', "Error al guardar vendedor: " . $operadorSubasta->validateErrorsResponse());
                        $this->redirect(array('update', 'id' => $model->idOperador));
                    }
                }else if($model->perfil == Yii::app()->params->callcenter['perfilesOperador']['mensajeroVendedor']){
                    $operadorVendedor = new OperadorVendedor;
                    $operadorVendedor->codigoVendedor = $model->codigoVendedor;
                    $operadorVendedor->idOperador = $model->idOperador;
                    if ($operadorVendedor->save()) {
                        $this->redirect(array('admin', 'usuario' => $model->usuario));
                    } else {
                        Yii::app()->user->setFlash('danger', "Error al guardar vendedor: " . $operadorVendedor->validateErrorsResponse());
                        $this->redirect(array('update', 'id' => $model->idOperador));
                    }
                }
                $this->redirect(array('admin', 'usuario' => $model->usuario));
            }else{
                //Yii::app()->user->setFlash('danger', "Error al guardar operador: ".  $model->validateErrorsResponse());
                $model->clave = null;
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
        $objOperador = $this->loadModel($id);
        
        $model = new Operador('update');
        
        foreach($objOperador->attributes as $attribute => $value){
            $model->$attribute = $value;
        }
        
        $model->clave = null;
        
        $operadorSubasta = OperadorSubasta::model()->find('idOperador =:operador', array(':operador' => $id));

        if ($operadorSubasta) {
            $model->idComercial = $operadorSubasta->idComercial;
        }
        
        $operadorVendedor = OperadorVendedor::model()->find('idOperador =:operador', array(':operador' => $id));

        if ($operadorVendedor) {
            $model->codigoVendedor = $operadorVendedor->codigoVendedor;
        }
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Operador'])) {
            $model->attributes = $_POST['Operador'];
            $model->codigoVendedor = isset($_POST["Operador"]["codigoVendedor"]) ? $_POST["Operador"]["codigoVendedor"] : null;
            $model->idComercial = isset($_POST["select-pdv-asignar"]) ? $_POST["select-pdv-asignar"] : null;
            
            if($model->validate()){
                $objOperador->nombre = $model->nombre;

                if(!empty($model->clave))
                    $objOperador->clave = $objOperador->hash($model->clave);

                $objOperador->perfil = $model->perfil;
                $objOperador->email = $model->email;
                $objOperador->activo = $model->activo;
                
                if($objOperador->perfil == Yii::app()->params->callcenter['perfilesOperador']['vendedorPDV'])
                    $objOperador->idComercial = $model->idComercial;
                else
                    $objOperador->idComercial = null;
                
                if($objOperador->perfil == Yii::app()->params->callcenter['perfilesOperador']['mensajeroVendedor'])
                    $objOperador->codigoVendedor = $model->codigoVendedor;
                else
                    $objOperador->codigoVendedor = null;
                
                if ($objOperador->save()) {
                    if ($objOperador->perfil == Yii::app()->params->callcenter['perfilesOperador']['vendedorPDV']) {
                        if($operadorSubasta===null){
                        	
                            $operadorSubasta = new OperadorSubasta;
                            $operadorSubasta->idOperador = $objOperador->idOperador;
                        }
                        
                        $operadorSubasta->idComercial = $model->idComercial;
                     //   echo "<pre>";print_r($operadorSubasta);exit();
                        if ($operadorSubasta->save()) {
                            $this->redirect(array('admin', 'usuario' => $objOperador->usuario));
                        }else{
                            Yii::app()->user->setFlash('danger', "Error al guardar vendedor: " . $operadorSubasta->validateErrorsResponse());
                            $model->clave = null;
                        }
                    }else if($model->perfil == Yii::app()->params->callcenter['perfilesOperador']['mensajeroVendedor']){
                        if($operadorVendedor===null){
                            $operadorVendedor = new OperadorVendedor;
                            $operadorVendedor->idOperador = $objOperador->idOperador;
                        }
                        
                        $operadorVendedor->codigoVendedor = $model->codigoVendedor;
                        if ($operadorVendedor->save()) {
                            $this->redirect(array('admin', 'usuario' => $objOperador->usuario));
                        } else {
                            Yii::app()->user->setFlash('danger', "Error al guardar vendedor: " . $operadorVendedor->validateErrorsResponse());
                            $model->clave = null;
                        }
                    }
                    $this->redirect(array('admin', 'usuario' => $objOperador->usuario));
                }else{
                    Yii::app()->user->setFlash('danger', "Error al guardar operador: " . $objOperador->validateErrorsResponse());
                    $model->clave = null;
                }
                
            }
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
