<?php


class PromocionesController extends ControllerOperator{
	
	/**
	 * @return array action filters
	 * */
	public function filters() {
		return array(
				//'access',
				'login + index',
				//'loginajax + direccionActualizar',
		);
	}
	
	public function filterAccess($filter) {
		if (!Yii::app()->controller->module->user->isGuest) {
			$this->redirect(Yii::app()->homeUrl);
		}
		$filter->run();
	}
	
	public function filterLogin($filter) {
		if (Yii::app()->controller->module->user->isGuest) {
			$this->redirect(Yii::app()->controller->module->user->loginUrl);
		}
		$filter->run();
	}
	
	public function actionIndex() {
		
		$model = new Promociones('search');
		
		$model->unsetAttributes();
		if (isset($_GET['Promociones']))
			$model->attributes = $_GET['Promociones'];
		
		$this->render('index', array(
				'model' => $model
		));
	}
	
	public function actionCrearPromocion(){
		$model = new Promociones();
		
		$params['vista'] = 'crearPromocion';
		$params['opcion'] = "editar";
		
		if($_POST){
			$model->attributes = $_POST['Promociones'];
			$model->dias = implode(",", $model->dias);
			if($model->validate()){
				
				$uploadedFile = CUploadedFile::getInstance($model, "rutaImagen");
				$error = false;
				if ($uploadedFile->getExtensionName() == "jpg" || $uploadedFile->getExtensionName() == "png" ||
					$uploadedFile->getExtensionName() == "jpeg" || $uploadedFile->getExtensionName() == "gif") {
					if ($uploadedFile->saveAs(Yii::app()->params->callcenter['promociones']['urlImagenes'] . $model->nombre . date("Ymdhis") . "." . $uploadedFile->getExtensionName())) {
						$model->rutaImagen = "/" . Yii::app()->params->callcenter['promociones']['urlImagenes'] . $model->nombre . date("Ymdhis") . "." . $uploadedFile->getExtensionName();
					} else {
						Yii::app()->user->setFlash('alert alert-danger', 'Error al subir la imagen');
						$error = true;
					}
				} else {
						Yii::app()->user->setFlash('alert alert-danger', 'Imagen no valida');
						$error = true;
				}
				
				if(!$error){
					if($model->save()){
						Yii::app()->user->setFlash('alert alert-success', 'Promoci&oacute;n creada con &eacute;xito');
						$this->redirect(CController::createUrl('editar', array('idPromocion' => $model->idPromocion)));
					}
				}
			}
		}
		
		$params['model'] = $model;
		$this->render('promocion', array(
			'params' => $params	
		));
	}
	
	public function actionEditar($idPromocion){
		$model = Promociones::model()->findByPk($idPromocion);
		
		$params['vista'] = 'crearPromocion';
		$params['opcion'] = "editar";
		
		
		if($_POST){
			$rutaImagen = $model->rutaImagen;
			$model->attributes = $_POST['Promociones'];
			$model->dias = implode(",", $model->dias);
			if($model->validate()){
				$error = false;
				
				if($_FILES['Promociones']['size']['rutaImagen'] > 0){
					$uploadedFile = CUploadedFile::getInstance($model, "rutaImagen");
					
					if ($uploadedFile->getExtensionName() == "jpg" || $uploadedFile->getExtensionName() == "png" ||
						$uploadedFile->getExtensionName() == "jpeg" || $uploadedFile->getExtensionName() == "gif") {
						if ($uploadedFile->saveAs(Yii::app()->params->callcenter['promociones']['urlImagenes'] . $model->nombre . date("Ymdhis") . "." . $uploadedFile->getExtensionName())) {
							$model->rutaImagen = "/" . Yii::app()->params->callcenter['promociones']['urlImagenes'] . $model->nombre . date("Ymdhis") . "." . $uploadedFile->getExtensionName();
						} else {
							Yii::app()->user->setFlash('alert alert-danger', 'Error al subir la imagen');
							$error = true;
						}
					} else {
							Yii::app()->user->setFlash('alert alert-danger', 'Imagen no valida');
							$error = true;
					}
				}else{
					$model->rutaImagen = $rutaImagen;
				}
				
				if(!$error){
					if($model->save()){
						Yii::app()->user->setFlash('alert alert-success', 'Promoci&oacute;n creada con &eacute;xito');
					}
				}
			}
		}
		$model->dias = explode(",", $model->dias);
		$params['model'] = $model;
		$this->render('promocion', array(
			'params' => $params	
		));
	}
	
	public function actionSectorCiudad($idPromocion){
		Yii::import('ext.select2.Select2');
		$params['vista'] = 'sectorCiudadPromocion';
		$params['opcion'] = "sector";
		
		$model = Promociones::model()->findByPk($idPromocion);
		$params['ciudades'] = Ciudad::model()->findAll();
		$params['model'] = $model;
		$this->render('promocion', array(
				'params' => $params
		));
		
	}
	
	public function actionComprobarciudad($codigoCiudad) {
	
		$sectores = Ciudad::model()->find(array(
				'with' => array('listSubSectores' =>
						array(
								'with' => array(
										'listSectorReferencias' => array(
												'with' => 'objSector'
										)
								)
						)),
				'condition' => 't.codigoCiudad=:ciudad',
				'params' => array(
						'ciudad' => $codigoCiudad
				)
		));
	
		$listSectorCiudad = SectorCiudad::model()->findAll(array(
				'with' => array('objSector', 'objCiudad'),
				'condition' => 't.codigoSector<>0 AND t.codigoCiudad=:ciudad AND t.estadoCiudadSector=:estado AND objSector.estadoSector=:estado AND objCiudad.estadoCiudad=:estado',
				'params' => array(
						':ciudad' => $codigoCiudad,
						':estado' => 1
				)
		));
	
		if (count($listSectorCiudad) > 0) {
			echo CJSON::encode(array(
					'result' => 'ok',
					'code' => 1,
					'htmlResponse' => $this->renderPartial('_sectorlista', array(
							'sectores' => $listSectorCiudad
					), true, false)));
		} else {
			echo CJSON::encode(array(
					'result' => 'ok',
					'code' => 2,
			));
		}
	}
	
	public function actionGuardarCiudadSector() {
		if (!Yii::app()->request->isPostRequest) {
			throw new CHttpException(404, 'Solicitud inválida.');
		}
	
		$codigoCiudad = Yii::app()->getRequest()->getPost('codigoCiudad');
		$codigoSector = Yii::app()->getRequest()->getPost('codigoSector');
		$idPromocion = Yii::app()->getRequest()->getPost('idPromocion');
	
		$promocionSector = PromocionesSectorCiudad::model()->find(array(
				'condition' => 'CodigoCiudad =:codigoCiudad AND CodigoSector =:codigoSector AND idPromocion=:idpromocion ',
				'params' => array(
						'codigoCiudad' => $codigoCiudad,
						'codigoSector' => $codigoSector,
						'idpromocion' => $idPromocion
				)
		));
	
		if ($promocionSector == null) {
	
			if (empty($codigoCiudad)) {
				$codigoCiudad = Yii::app()->params->ciudad['*'];
				$codigoSector = Yii::app()->params->sector['*'];
			}
	
			$moduloSector = new PromocionesSectorCiudad();
	
			if (empty($codigoCiudad)) {
				$codigoCiudad = Yii::app()->params->ciudad['*'];
			}
			$moduloSector->codigoCiudad = $codigoCiudad;
			$moduloSector->codigoSector = $codigoSector;
			$moduloSector->idPromocion = $idPromocion;
	
			if ($moduloSector->save()) {
				$sectores = PromocionesSectorCiudad::model()->findAll(array(
						'with' => array('objCiudad', 'objSector'),
						'condition' => 'idPromocion =:idpromocion',
						'params' => array(
								'idpromocion' => $idPromocion
						),
						'order' => 'objCiudad.nombreCiudad,objSector.nombreSector'
				));
	
				$html = $this->renderPartial('_listaSectoresCiudades', array(
						'sectores' => $sectores
				), true, false);
				echo CJSON::encode(array(
						'result' => 'ok',
						'response' => $html
				));
			} else {
				echo CJSON::encode(array(
						'result' => 'error',
						'response' => "Error al guardar la ciudad/sector"
				));
			}
		} else {
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => "El sector está referenciado"
			));
		}
	}
	
	public function actionEliminarCiudadSector() {
		if (!Yii::app()->request->isPostRequest) {
			throw new CHttpException(404, 'Solicitud inválida.');
		}
	
		$codigoSector = Yii::app()->getRequest()->getPost('codigoSector');
		$codigoCiudad = Yii::app()->getRequest()->getPost('codigoCiudad');
		$idPromocion = Yii::app()->getRequest()->getPost('idPromocion');
		
		$promocionSector = PromocionesSectorCiudad::model()->find(array(
				'condition' => 'codigoSector =:codigoSector AND codigoCiudad =:codigoCiudad AND idPromocion =:idPromocion',
				'params' => array(
						'codigoSector' => $codigoSector,
						'codigoCiudad' => $codigoCiudad,
						'idPromocion' => $idPromocion
				)
		));
	
		if ($promocionSector != null) {
			$idModulo = $promocionSector->idPromocion;
			$promocionSector->delete();
			$sectores = PromocionesSectorCiudad::model()->findAll(array(
					'with' => array('objCiudad', 'objSector'),
					'condition' => 'idPromocion =:idPromocion',
					'params' => array(
							'idPromocion' => $idPromocion
					)));
	
			$html = $this->renderPartial('_listaSectoresCiudades', array(
					'sectores' => $sectores
			), true, false);
			echo CJSON::encode(array(
					'result' => 'ok',
					'response' => $html
			));
		} else {
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => "No se ha encontrado la ciudad/sector a eliminar"
			));
		}
	}
	
	public function actionEliminarPromocion() {
		if (!Yii::app()->request->isPostRequest) {
			throw new CHttpException(404, 'Solicitud inválida.');
		}
	
		$idPromocion = Yii::app()->getRequest()->getPost('idPromocion');
	
		if ($idPromocion === null) {
			throw new CHttpException(404, 'Solicitud inválida.');
		}
	
		$modulosector = PromocionesSectorCiudad::model()->deleteAll("idPromocion=:idPromocion", array('idPromocion' => $idPromocion));
		$modulocategoria = PromocionesCategorias::model()->deleteAll("idPromocion=:idPromocion", array('idPromocion' => $idPromocion));
		$model = ModulosConfigurados::model()->deleteByPk($idPromocion);
	
	
		echo CJSON::encode(array('result' => 'ok', 'response' => "La operaci&oacute;n se realizo con &eacute;xito"));
		Yii::app()->end();
	}
	
	public function actionCategoriasPromocion($idPromocion){
		Yii::import('ext.select2.Select2');
		$params['vista'] = 'categoriasPromocion';
		$params['opcion'] = "categoria";
		
		$model = Promociones::model()->findByPk($idPromocion);
		//$params['ciudades'] = Ciudad::model()->findAll();
		$params['model'] = $model;
		$this->render('promocion', array(
				'params' => $params
		));
	}
	
	
	public function actionGuardarCategoria(){
		if (!Yii::app()->request->isPostRequest) {
			throw new CHttpException(404, 'Solicitud inválida.');
		}
		
		$idCategoria = Yii::app()->getRequest()->getPost('categoria');
		$idPromocion = Yii::app()->getRequest()->getPost('idPromocion');
		
		$promocionCategoria = PromocionesCategorias::model()->find(array(
				'condition' => 'idCategoriaTienda =:idCategoria AND idPromocion=:idpromocion ',
				'params' => array(
						'idCategoria' => $idCategoria,
						'idpromocion' => $idPromocion
				)
		));
		
		if ($promocionCategoria == null) {
		
			$promocionModel = new PromocionesCategorias();
			$promocionModel->idCategoriaTienda = $idCategoria;
			$promocionModel->idPromocion = $idPromocion;
		
			if ($promocionModel->save()) {
				$categorias = PromocionesCategorias::model()->findAll(array(
						'with' => array('objCategoria'),
						'condition' => 'idPromocion =:idpromocion',
						'params' => array(
								'idpromocion' => $idPromocion
						),
						'order' => 'objCategoria.nombreCategoriaTienda'
				));
		
				$html = $this->renderPartial('_listaCategorias', array(
						'categorias' => $categorias
				), true, false);
				echo CJSON::encode(array(
						'result' => 'ok',
						'response' => $html
				));
			} else {
				echo CJSON::encode(array(
						'result' => 'error',
						'response' => "Error al guardar la categoria"
				));
			}
		} else {
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => "La categoria esta referenciada"
			));
		}
	}
	
	public function actionEliminarCategoria(){
		if (!Yii::app()->request->isPostRequest) {
			throw new CHttpException(404, 'Solicitud inválida.');
		}
		
		$categoria = Yii::app()->getRequest()->getPost('categoria');
		$idPromocion = Yii::app()->getRequest()->getPost('idPromocion');
		
		$promocionCategoria = PromocionesCategorias::model()->find(array(
				'condition' => 'idCategoriaTienda =:idCategoriaTienda AND idPromocion =:idPromocion',
				'params' => array(
						'idCategoriaTienda' => $categoria,
						'idPromocion' => $idPromocion
				)
		));
		
		if ($promocionCategoria != null) {
			$idModulo = $promocionCategoria->idPromocion;
			$promocionCategoria->delete();
			$categorias = PromocionesCategorias::model()->findAll(array(
					'with' => array('objCategoria'),
					'condition' => 'idPromocion =:idPromocion',
					'params' => array(
							'idPromocion' => $idPromocion
					)));
		
			$html = $this->renderPartial('_listaCategorias', array(
					'categorias' => $categorias
			), true, false);
			echo CJSON::encode(array(
					'result' => 'ok',
					'response' => $html
			));
		} else {
			echo CJSON::encode(array(
					'result' => 'error',
					'response' => "No se ha encontrado la categoria a eliminar"
			));
		}
	}
	
	
}