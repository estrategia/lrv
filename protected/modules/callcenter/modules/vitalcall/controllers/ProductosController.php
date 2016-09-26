<?php

class ProductosController extends ControllerVitalcall {
	
	public function actionIndex(){
		$model = new ProductosVitallCall('search');
		
		$model->unsetAttributes();
		if (isset($_GET['ProductosVitallCall']))
			$model->attributes = $_GET['ProductosVitallCall'];
		
		$this->render('index', array(
				'model' => $model,
		));
	}
	
	public function actionCrear(){
		
		$model = new ProductosVitallCall();
		
		if($_POST){
			$model->attributes = $_POST['ProductosVitallCall'];
			$model->fechaCreacion = Date("Y-m-d h:i:s");
			if($model->validate()){
				if($model->save()){
					$descuentoPerfil = ProductosDescuentosPerfiles::model()->find(array(
							'condition' => 'codigoProducto =:codigoProducto AND codigoPerfil =:codigoPerfil',
							'params' => array(
									':codigoProducto' => $model->codigoProducto,
									':codigoPerfil' => Yii::app()->params->perfil['vitalCall'],
							)
					));
					
					if(!$descuentoPerfil){
						$descuentoPerfil = new ProductosDescuentosPerfiles();
						$descuentoPerfil->codigoProducto = $model->codigoProducto;
						$descuentoPerfil->codigoPerfil = Yii::app()->params->perfil['vitalCall'];
						$descuentoPerfil->descuentoPerfil = Yii::app()->params->vitalCall['descuento'];
							
						if($descuentoPerfil->save()){
							$this->redirect(CController::createUrl('index'));
						}
					}
				}
			}
		}
		$this->render('_form', array(
				'model' => $model
		));
	}
	
	public function actionActualizar($id){
		$model = ProductosVitallCall::model()->findByPk($id);
		if($_POST){
			$model->attributes = $_POST['ProductosVitallCall'];
			$model->fechaCreacion = Date("Y-m-d h:i:s");
			if($model->validate()){
		
				if($model->save()){
				$descuentoPerfil = ProductosDescuentosPerfiles::model()->find(array(
							'condition' => 'codigoProducto =:codigoProducto AND codigoPerfil =:codigoPerfil',
							'params' => array(
									':codigoProducto' => $model->codigoProducto,
									':codigoPerfil' => Yii::app()->params->perfil['vitalCall'],
							)
					));
					
					if(!$descuentoPerfil){
						$descuentoPerfil = new ProductosDescuentosPerfiles();
						$descuentoPerfil->codigoProducto = $model->codigoProducto;
						$descuentoPerfil->codigoPerfil = Yii::app()->params->perfil['vitalCall'];
						$descuentoPerfil->descuentoPerfil = Yii::app()->params->vitalCall['descuento'];
							
						if($descuentoPerfil->save()){
							$this->redirect(CController::createUrl('index'));
						}
					}
				}
			}
		}
		$this->render('_form', array(
				'model' => $model
		));
	}
	
	
	public function actionAutocompleteProducto($term){
		
		$productos = Producto::model()->findAll(array(
				'condition' => "activo=:activo and (codigoProducto like '%$term%' or descripcionProducto like '%$term%') ",
				'params' => array(
						':activo' => 1
				)
		));
		foreach ($productos as $model) {
			$results[] = array(
					'label' => $model['codigoProducto'] . " - " . $model['descripcionProducto'],
					'value' => $model['codigoProducto'],
			);
		}
		echo CJSON::encode($results);
		
	}
	
	
	
	
}