<?php
class ClienteController extends ControllerVitalcall {
	public $defaultAction = "admin";
	public function actionAdmin() {
		$model = new UsuarioVitalCall ( 'search' );
		
		$model->unsetAttributes ();
		if (isset ( $_GET ['UsuarioVitalCall'] ))
			$model->attributes = $_GET ['UsuarioVitalCall'];
		
		$this->render ( 'admin', array (
				'model' => $model 
		) );
	}
	public function actionVer($id) {
		$objCliente = $this->loadModel ( $id );
		$modelActivacion = new ActivacionForm ();
		
		$modelCompra = new Compras ( 'search' );
		$modelCompra->unsetAttributes ();
		if (isset ( $_GET ['Compras'] ))
			$modelCompra->attributes = $_GET ['Compras'];
		
		$modelFormula = new FormulasVitalCall( 'search' );
		$modelFormula->unsetAttributes ();
		if (isset ( $_GET ['FormulasVitalCall'] ))
			$modelFormula->attributes = $_GET ['FormulasVitalCall'];
		
		if (isset ( $_POST ['ActivacionForm'] )) {
			$modelActivacion->attributes = $_POST ['ActivacionForm'];
			
			if ($objCliente->codigoActivacion == $modelActivacion->codigoActivacionValidacion) {
				$objCliente->estado = 1;
				$objCliente->codigoActivacionValidacion = $modelActivacion->codigoActivacionValidacion;
				
				if ($objCliente->save ()) {
					Yii::app ()->user->setFlash ( 'alert alert-success', "Activaci&oacute; realizada satisfactoriamente" );
				} else {
					Yii::app ()->user->setFlash ( 'alert alert-danger', "Error al registrar la activaci&oacute;" );
					$modelActivacion->addError ( 'codigoActivacionValidacion', "" );
				}
			} else {
				$objCliente->codigoActivacionValidacion = $modelActivacion->codigoActivacionValidacion;
				
				if ($objCliente->save ()) {
					Yii::app ()->user->setFlash ( 'alert alert-danger', "Código de activación incorrecto" );
					$modelActivacion->addError ( 'codigoActivacionValidacion', "Código de activación incorrecto" );
				}
			}
		}
		
		$modelCompra->identificacionUsuario = $objCliente->identificacionUsuario;
		$modelCompra->idTipoVenta = Yii::app ()->params->tipoVenta ['vitalCall'];
		
		$this->render ( 'ver', array (
				'objCliente' => $objCliente,
				'modelCompra' => $modelCompra,
				'modelActivacion' => $modelActivacion ,
				'modelFormula' => $modelFormula,
				
		) );
	}
	public function actionCrear() {
		$model = new UsuarioVitalCall ();
		
		if ($_POST) {
			$model->attributes = $_POST ['UsuarioVitalCall'];
			$model->fechaCreacion = Date ( "Y-m-d h:i:s" );
			$model->codigoActivacion = UsuarioVitalCall::generatePass ( 4 );
			$model->estado = 2;
			if ($model->validate ()) {
				
				if ($model->save ()) {
					// enviar correo de activación.
					
					$this->redirect ( CController::createUrl ( 'admin' ) );
				}
			}
		}
		$this->render ( 'crear', array (
				'model' => $model 
		) );
	}
	public function actionActualizar($id) {
		$model = $this->loadModel ( $id );
		
		if ($_POST) {
			$model->attributes = $_POST ['UsuarioVitalCall'];
			$model->fechaCreacion = Date ( "Y-m-d h:i:s" );
			$model->codigoActivacion = UsuarioVitalCall::generatePass ( 4 );
			$model->estado = 2;
			if ($model->validate ()) {
				
				if ($model->save ()) {
					// enviar correo de activación.
					
					$this->redirect ( CController::createUrl ( 'admin' ) );
				}
			}
		}
		$this->render ( 'crear', array (
				'model' => $model 
		) );
	}
	public function actionPedido($id) {
		$objCliente = $this->loadModel ( $id );
		
		/*
		 * $this->render('pedido', array(
		 * 'objCliente' => $objCliente,
		 * 'modelCompra' => $modelCompra
		 * ));
		 */
	}
	public function loadModel($id) {
		$model = UsuarioVitalCall::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'Cliente no existe.' );
		return $model;
	}
}
