<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CuentasInactivasController extends ControllerOperator {

	public function filters() {
		return array(
				//'access',
				'login + index, cuentasBloqueadas',
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
	
    public function actionIndex() {
        $model = new ReporteBloqueoForm();

        if ($_POST) {
            $model->attributes = $_POST['ReporteBloqueoForm'];
            $model->exportarArchivo();
        }

        $this->render('index', array(
            'model' => $model
        ));
    }
    
    
    public function actionCuentasBloqueadas() {
    	
    	$model = new BloqueosUsuarios('search');
    	
    	$model->unsetAttributes();
    	$model->estado = BloqueosUsuarios::ESTADO_BLOQUEADO;
    	if (isset($_GET['BloqueosUsuarios']))
    		$model->attributes = $_GET['BloqueosUsuarios'];
    	
    	$this->render('cuentasBloqueadas', array(
    			'model' => $model
    	));
    }
    
    public function actionActivarCuenta(){
    	if (!Yii::app()->request->isPostRequest) {
    		throw new CHttpException(404, 'Solicitud inválida.');
    	}
    	
    	$id = Yii::app()->getRequest()->getPost('id');
    	
    	$usuarioBloqueado = BloqueosUsuarios::model()->find(array(
    		'with' => 'objUsuario',
    		'condition' => 't.estado=:estado AND t.idBloqueoUsuario=:id',
    		'params' => array(
    			':estado' => BloqueosUsuarios::ESTADO_BLOQUEADO,
    			':id' => $id
    		)
    	));
    	
    	if($usuarioBloqueado === null){
    		echo CJSON::encode(array(
    			'result' => 'error',
    			'response' => 'Bloqueo de usuario no existe'
    		));
    		Yii::app()->end();
    	}
    	
    	$objUsuario = $usuarioBloqueado->objUsuario;
    	$objUsuario->activo = Usuario::ESTADO_ACTIVO;
    	
    	$usuarioBloqueado->estado = BloqueosUsuarios::ESTADO_DESBLOQUEADO;
    	$usuarioBloqueado->fechaActualizacion = Date("Y-m-d h:i:s");
    	$usuarioBloqueado->fechaDesbloqueo = $usuarioBloqueado->fechaActualizacion;
    	
    	$transaction = Yii::app()->db->beginTransaction();
 		try {
 			if(!$objUsuario->save()){
 				throw new Exception("Error al activar el usuario");
 			}
 			
 			if(!$usuarioBloqueado->save() ){
 				throw new Exception("Error al activar bloqueo de usuario");
 			}
 			
 			$transaction->commit();
 			
 			echo CJSON::encode(array(
 				'result' => 'ok',
 				'response' => 'Usuario activado'
 			));
 		} catch (Exception $exc) {
 			Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
 		
 			try {
 				$transaction->rollBack();
 			} catch (Exception $txexc) {
 				Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
 			}
 			
 			return array(
 				'result' => 'error',
 				'response' => $exc->getMessage()
 			);
 		}    	
    }
    
    
    public function actionBloqueoPerfil(){
    	
    	$model = new BloqueoCuenta('search');
    	$model->unsetAttributes();
    	
    	if (isset($_GET['BloqueoCuenta']))
    		$model->attributes = $_GET['BloqueoCuenta'];
    	
    	$this->render('bloqueoPerfil', array(
    		'model' => $model 	
    	));
    }
    
    public function actionActualizarPerfil($perfil = null){
    	
    	if($perfil == null){
    		$form = new BloqueoCuenta();
    	}else{
    		$form = BloqueoCuenta::model()->find(array(
    				'condition' => 'perfil =:perfil',
    				'params' => array(
    						'perfil' => $perfil
    				)
    		));
    		
    		if($form == null){
    			throw new CHttpException(404, 'Solicitud inválida.');
    			Yii::app()->end();
    		}
    	}
    	
    	if($_POST){
    		$form->attributes = $_POST['BloqueoCuenta'];
    		
    		if($form->save()){
    			$this->redirect(CController::createUrl('/callcenter/cuentasInactivas/bloqueoPerfil'));
    			Yii::app()->end();
    		}
    	}
    	
    	$this->render('formBloqueoPerfil', array(
    					'model' => $form		
    	));
    	
    }
    
    public function actionEliminarPerfil($perfil = null){
    	 
    	if($perfil == null){
    		throw new CHttpException(404, 'Solicitud inválida.');
    		Yii::app()->end();
    	}
    	
    	$form = BloqueoCuenta::model()->find(array(
    			'condition' => 'perfil =:perfil',
    			'params' => array(
    					'perfil' => $perfil
    			)
    	));
    	
    	if($form == null){
    		throw new CHttpException(404, 'Solicitud inválida.');
    		Yii::app()->end();
    	}
    	
    	if($form->delete()){
    			$this->redirect(CController::createUrl('/callcenter/cuentasInactivas/bloqueoPerfil'));
    			Yii::app()->end();
    	}
    	 
    	
    	 
    }

}
