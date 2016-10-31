<?php
class ProductosController extends ControllerTelefarma {
	
	public function actionIndex() {
		$model = new ProductosVitalCall ( 'search' );
		
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
		
		if ($_POST) {
			$model->attributes = $_POST ['ProductosVitalCall'];
			$model->fechaCreacion = Date ( "Y-m-d h:i:s" );
			if ($model->validate ()) {
				if ($model->save ()) {
					$descuentoPerfil = ProductosDescuentosPerfiles::model ()->find ( array (
							'condition' => 'codigoProducto =:codigoProducto AND codigoPerfil =:codigoPerfil',
							'params' => array (
									':codigoProducto' => $model->codigoProducto,
									':codigoPerfil' => Yii::app ()->params->perfil ['vitalCall'] 
							) 
					) );
					
					if (! $descuentoPerfil) {
						$descuentoPerfil = new ProductosDescuentosPerfiles ();
						$descuentoPerfil->codigoProducto = $model->codigoProducto;
						$descuentoPerfil->codigoPerfil = Yii::app ()->params->perfil ['vitalCall'];
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
										':codigoPerfil' => Yii::app ()->params->perfil ['vitalCall'] 
								) 
						) );
						
						if (!$descuentoPerfil) {
							$descuentoPerfil = new ProductosDescuentosPerfiles ();
							$descuentoPerfil->codigoProducto = $model->codigoProducto;
							$descuentoPerfil->codigoPerfil = Yii::app ()->params->perfil ['vitalCall'];
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