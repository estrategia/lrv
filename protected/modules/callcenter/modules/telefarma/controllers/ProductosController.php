<?php
class ProductosController extends ControllerTelefarma {
	
	public function filters() {
		return array(
				//'access',
				'login + index, crear, actualizar, eliminar',
				//'loginajax + direccionActualizar',
		);
	}
	
	public function filterLogin($filter) {
		if (Yii::app()->controller->module->user->isGuest) {
			$this->redirect(Yii::app()->controller->module->user->loginUrl);
		}
		$filter->run();
	}
	
	public function actionIndex() {
		$model = new ProductosVitalCall ( 'search' );
		$this->layout = 'admin';
		$model->unsetAttributes ();
		if (isset ( $_GET ['ProductosVitalCall'] ))
			$model->attributes = $_GET ['ProductosVitalCall'];
		
		Yii::app()->session[Yii::app()->params->telefarma['sesion']['busquedaExportar']] = $model;
		
		$this->render ( 'index', array (
				'model' => $model 
		) );
	}
	
	
	public function actionCrear() {
		$model = new ProductosVitalCall ();
		$this->layout = 'admin';
		if ($_POST) {
			$model->attributes = $_POST ['ProductosVitalCall'];
			$model->fechaCreacion = Date ( "Y-m-d h:i:s" );
			if ($model->validate ()) {
				if ($model->save ()) {
					$descuentoPerfil = ProductosDescuentosPerfiles::model ()->find ( array (
							'condition' => 'codigoProducto =:codigoProducto AND codigoPerfil =:codigoPerfil',
							'params' => array (
									':codigoProducto' => $model->codigoProducto,
									':codigoPerfil' => Yii::app ()->params->perfil ['telefarma'] 
							) 
					) );
					
					if (! $descuentoPerfil) {
						$descuentoPerfil = new ProductosDescuentosPerfiles ();
						$descuentoPerfil->codigoProducto = $model->codigoProducto;
						$descuentoPerfil->codigoPerfil = Yii::app ()->params->perfil ['telefarma'];
						$descuentoPerfil->descuentoPerfil = Yii::app ()->params->telefarma ['descuento'];
						
						if ($descuentoPerfil->save ()) {
							$this->redirect ( CController::createUrl ( 'index' ) );
						}
					}
				}
			}
		}
		$this->render ( '_form', array (
				'model' => $model 
		) );
	}
	public function actionActualizar($id) {
		$this->layout = 'admin';
		$model = ProductosVitalCall::model ()->findByPk ( $id );
		if ($_POST) {
			$model->attributes = $_POST ['ProductosVitalCall'];
			$model->fechaCreacion = Date ( "Y-m-d h:i:s" );
			if ($model->validate ()) { 
				if ($model->save ()) {
						if($model->esVigente()){
						$descuentoPerfil = ProductosDescuentosPerfiles::model ()->find ( array (
								'condition' => 'codigoProducto =:codigoProducto AND codigoPerfil =:codigoPerfil',
								'params' => array (
										':codigoProducto' => $model->codigoProducto,
										':codigoPerfil' => Yii::app ()->params->perfil ['telefarma'] 
								) 
						) );
						
						if (!$descuentoPerfil) {
							$descuentoPerfil = new ProductosDescuentosPerfiles ();
							$descuentoPerfil->codigoProducto = $model->codigoProducto;
							$descuentoPerfil->codigoPerfil = Yii::app ()->params->perfil ['telefarma'];
							$descuentoPerfil->descuentoPerfil = Yii::app ()->params->telefarma ['descuento'];
							
							if ($descuentoPerfil->save ()) {
								$this->redirect ( CController::createUrl ( 'index' ) );
							}
						}
					}
				}
			}
		}
		$this->render ( '_form', array (
				'model' => $model 
		) );
	}
	
	public function actionEliminar($id) {
		$this->layout = 'admin';
		$model = ProductosVitalCall::model ()->findByPk ( $id );
		if($model->delete()){
			$this->redirect(CController::createUrl('index'));
		}
		
	}
	
	
	public function actionExportar() {
		$datos = Yii::app ()->session [Yii::app ()->params->telefarma ['sesion'] ['busquedaExportar']];
		$datos->exportar();
	}
	public function actionAutocompleteProducto($term) {
		$productos = Producto::model ()->findAll ( array (
				'condition' => "activo=:activo and (codigoProducto like '%$term%' or descripcionProducto like '%$term%') ",
				'params' => array (
						':activo' => 1 
				) 
		) );
		foreach ( $productos as $model ) {
			$results [] = array (
					'label' => $model ['codigoProducto'] . " - " . $model ['descripcionProducto'],
					'value' => $model ['codigoProducto'] 
			);
		}
		echo CJSON::encode ( $results );
	}
}