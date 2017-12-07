<?php

class BodegaVirtualController extends ControllerOperator {

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
        $model = new BodegaVirtual('create');

        if (isset($_POST['BodegaVirtual'])) {
            $model->attributes = $_POST['BodegaVirtual'];

            if ($model->save()) {
                $this->redirect(array('admin'));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }
    
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreateCiudad($idBodega) {
    	Yii::import('ext.select2.Select2');
    	$ciudades = Ciudad::model()->findAll();
    	$model = new CiudadBodega('create');
    	$model->idBodega = $idBodega;
    	if (isset($_POST['CiudadBodega'])) {
    		$model->attributes = $_POST['CiudadBodega'];
    
    		if ($model->save()) {
    			$this->redirect(array('ciudades', 'idBodega' => $model->idBodega));
    		}
    	}
    
    	$this->render('createCiudad', array(
    			'model' => $model,
    			'ciudades' => $ciudades
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
       
        if(isset($_POST['BodegaVirtual'])){
        	$objOperador->attributes = $_POST['BodegaVirtual'];
        	$objOperador->save();
        }

        
        $this->render('updateCiudad', array(
            'model' => $objOperador,
         
        ));
    }

    
    public function actionUpdateCiudad($codigoCiudad, $idBodega) {
    	Yii::import('ext.select2.Select2');
    	$ciudades = Ciudad::model()->findAll();
    	 
    	$objCiudad = CiudadBodega::model()->find(array(
    			'condition' => 'codigoCiudad =:codigoCiudad AND idBodega=:bodega',
    			'params' => array(
    					'codigoCiudad' => $codigoCiudad,
    					'bodega' => $idBodega,
    			)
    	));
    
    	 
    	if(isset($_POST['CiudadBodega'])){
    		$objCiudad->attributes = $_POST['CiudadBodega'];
    		$objCiudad->save();
    		
    		$this->redirect(CController::createUrl('ciudades', array('idBodega' => $idBodega)));
    	}
    
    	$this->render('updateCiudad', array(
    			'model' => $objCiudad,
    			'ciudades' => $ciudades
    	));
    }
    /**
     * Manages all models.
     */
    public function actionAdmin($usuario = null) {
        $model = new BodegaVirtual('search');
        $model->unsetAttributes();
        if (isset($_GET['BodegaVirtual']))
            $model->attributes = $_GET['BodegaVirtual'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }


    
    /**
     * Manages all models.
     */
    public function actionCiudades($idBodega = null) {
    	$model = new CiudadBodega('search');
    	$model->unsetAttributes();
    	if (isset($_GET['CiudadBodega']))
    		$model->attributes = $_GET['CiudadBodega'];
    
    	if($idBodega != null)
    		$model->idBodega = $idBodega; 
    	
    	$this->render('adminCiudad', array(
    			'model' => $model,
    			'idBodega' => $idBodega
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
        $model = BodegaVirtual::model()->findByPk($id);
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
