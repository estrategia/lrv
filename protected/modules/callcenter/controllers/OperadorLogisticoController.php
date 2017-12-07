<?php

class OperadorLogisticoController extends ControllerOperator {

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
        $model = new OperadorLogistico('create');

        if (isset($_POST['OperadorLogistico'])) {
            $model->attributes = $_POST['OperadorLogistico'];

            if ($model->save()) {
                $this->redirect(array('admin'));
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
        
       
        if(isset($_POST['OperadorLogistico'])){
        	$objOperador->attributes = $_POST['OperadorLogistico'];
        	$objOperador->save();
        }

        $this->render('update', array(
            'model' => $objOperador,
        ));
    }

    
    public function actionCreateFlete($idOperadorLogistico) {
    	Yii::import('ext.select2.Select2');
    	$model = new Flete('create');
    
    	$ciudades = Ciudad::model()->findAll();
    	$bodegas = BodegaVirtual::model()->findAll();
    	if (isset($_POST['Flete'])) {
    		$model->attributes = $_POST['Flete'];
    		$model->idOperadorLogistico = $idOperadorLogistico;
    		if ($model->save()) {
    			$this->redirect(array('adminFlete', array('idOperadorLogistico' => $idOperadorLogistico)));
    		}else{
    			echo "<pre>";print_r($model->getErrors());Exit();
    		}
    	}
    
    	$this->render('createFlete', array(
    			'model' => $model,
    			'idOperadorLogistico' => $idOperadorLogistico,
    			'ciudades' => $ciudades,
    			'bodegas' => $bodegas
    	));
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdateFlete($idOperadorLogistico, $idBodega, $codigoCiudad) {
    	Yii::import('ext.select2.Select2');
    	$objOperador = Flete::model()->find(array(
    			'condition' => 'idOperadorLogistico =:operadorLogistico AND idBodega =:idBodega AND codigoCiudad =:codigoCiudad',
    			'params' => array(
    					'operadorLogistico' => $idOperadorLogistico,
    					'idBodega' => $idBodega,
    					'codigoCiudad' => $codigoCiudad
    			)
    	));
    	
    	$ciudades = Ciudad::model()->findAll();
    	$bodegas = BodegaVirtual::model()->findAll();
    
    	 
    	if(isset($_POST['Flete'])){
    		$objOperador->attributes = $_POST['Flete'];
    		$objOperador->save();
    	}
    
    	$this->render('updateFlete', array(
    			'model' => $objOperador,
    			'idOperadorLogistico' => $idOperadorLogistico,
    			'ciudades' => $ciudades,
    			'bodegas' => $bodegas
    	));
    }
    /**
     * Manages all models.
     */
    public function actionAdmin($usuario = null) {
        $model = new OperadorLogistico('search');
        $model->unsetAttributes();
        if (isset($_GET['OperadorLogistico']))
            $model->attributes = $_GET['OperadorLogistico'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    

    public function actionAdminFletes($idOperadorLogistico) {
    	$model = new Flete('search');
    	$model->unsetAttributes();
    	if (isset($_GET['Flete']))
    		$model->attributes = $_GET['Flete'];
    
    	$model->idOperadorLogistico = $idOperadorLogistico;
    		$this->render('adminFlete', array(
    				'model' => $model,
    				'idOperadorLogistico' => $idOperadorLogistico
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
        $model = OperadorLogistico::model()->findByPk($id);
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

}
