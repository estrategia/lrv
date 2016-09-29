<?php
class ClienteController extends ControllerVitalcall {
	public $defaultAction = "admin";
	public function actionAdmin() {
		$model = new UsuarioVitalCall ( 'search' );
		
		$model->unsetAttributes ();
		if (isset ( $_GET ['UsuarioVitalCall'] ))
			$model->attributes = $_GET ['UsuarioVitalCall'];
		
			
		Yii::app ()->session [Yii::app ()->params->vitalCall ['sesion'] ['usuariosExportar']] = $model;
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
		
		$modelFormula = new FormulasVitalCall ( 'search' );
		$modelFormula->unsetAttributes ();
		if (isset ( $_GET ['FormulasVitalCall'] ))
			$modelFormula->attributes = $_GET ['FormulasVitalCall'];
		
		$modelDirecciones = new DireccionesDespachoVitalCall ( 'search' );
		$modelDirecciones->unsetAttributes ();
		if (isset ( $_GET ['DireccionesDespachoVitalCall'] ))
			$modelDirecciones->attributes = $_GET ['DireccionesDespachoVitalCall'];
		
		$modelFormula->identificacionUsuario = $id;
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
		$modelDirecciones->identificacionUsuario = $objCliente->identificacionUsuario;
		$this->render ( 'ver', array (
				'objCliente' => $objCliente,
				'modelCompra' => $modelCompra,
				'modelActivacion' => $modelActivacion,
				'modelFormula' => $modelFormula,
				'modelDirecciones' => $modelDirecciones 
		)
		 );
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
	
	public function actionExportar() {
		$datos = Yii::app ()->session [Yii::app ()->params->vitalCall ['sesion'] ['usuariosExportar']];
		$datos->exportar();
	}
	
	public function actionAgregarDireccion() {
		$model = new DireccionesDespachoVitalCall ();
		$model->identificacionUsuario = $_POST ['identificacionUsuario'];
		echo CJSON::encode ( array (
				'result' => 'ok',
				'response' => $this->renderPartial ( '_modalDirecciones', array (
						'model' => $model 
				), true, true ) 
		) );
	}
	public function actionComprobarciudad($codigoCiudad) {
		$sectores = Ciudad::model ()->find ( array (
				'with' => array (
						'listSubSectores' => array (
								'with' => array (
										'listSectorReferencias' => array (
												'with' => 'objSector' 
										) 
								) 
						) 
				),
				'condition' => 't.codigoCiudad=:ciudad',
				'params' => array (
						'ciudad' => $codigoCiudad 
				) 
		) );
		
		$listSectorCiudad = SectorCiudad::model ()->findAll ( array (
				'with' => array (
						'objSector',
						'objCiudad' 
				),
				'condition' => 't.codigoSector<>0 AND t.codigoCiudad=:ciudad AND t.estadoCiudadSector=:estado AND objSector.estadoSector=:estado AND objCiudad.estadoCiudad=:estado',
				'params' => array (
						':ciudad' => $codigoCiudad,
						':estado' => 1 
				) 
		) );
		
		echo CJSON::encode ( array (
				'result' => 'ok',
				'code' => 1,
				'htmlResponse' => $this->renderPartial ( '_sectorlista', array (
						'listSectorCiudad' => $listSectorCiudad 
				), true, false ) 
		) );
	}
	public function actionGuardarDireccion() {
		if ($_POST) {
			$model = new DireccionesDespachoVitalCall ();
			$model->attributes = $_POST ['DireccionesDespachoVitalCall'];
			
			if ($model->validate ()) {
				if ($model->save ()) {
					echo CJSON::encode ( array (
							'result' => 'ok',
							'response' => 'Direcci&oacute;n guardada' 
					) );
				}
			} else {
				
				echo CActiveForm::validate ( $model );
				Yii::app ()->end ();
			}
		}
	}
	public function actionEliminarDireccion() {
		if ($_POST) {
			$model = DireccionesDespachoVitalCall::model ()->find ( array (
					'condition' => 'idDireccionesDespachoVitalCall =:direccion',
					'params' => array (
							':direccion' => $_POST ['direccion'] 
					) 
			) );
			
			if ($model) {
					if($model->delete()){
						echo CJSON::encode ( array (
								'result' => 'ok',
								'response' => 'Direcci&oacute;n eliminada'
						) );
					}
			} else {
				echo CJSON::encode ( array (
						'result' => 'error',
						'response' => 'La direcci&oacute;n ya no existe'
				) );
				Yii::app ()->end ();
			}
		}
	}
	
	
	public function actionEditarDireccion() {
		if ($_POST) {
			$model = DireccionesDespachoVitalCall::model ()->find ( array (
					'condition' => 'idDireccionesDespachoVitalCall =:direccion',
					'params' => array (
							':direccion' => $_POST ['direccion']
					)
			) );
				
			
			if ($model) {
				$model->listaSectores = CHtml::listData(SectorCiudad::model ()->findAll ( array (
						'with' => array (
								'objSector',
								'objCiudad'
						),
						'condition' => 't.codigoSector<>0 AND t.codigoCiudad=:ciudad AND t.estadoCiudadSector=:estado AND objSector.estadoSector=:estado AND objCiudad.estadoCiudad=:estado',
						'params' => array (
								':ciudad' => $model->codigoCiudad,
								':estado' => 1
						)
				) ), 'codigoSector', function ($data){return $data->objSector->nombreSector;});
				echo CJSON::encode ( array (
						'result' => 'ok',
						'response' => $this->renderPartial ( '_modalDirecciones', array (
								'model' => $model
						), true, true )));
			} else {
				echo CJSON::encode ( array (
						'result' => 'error',
						'response' => 'La direcci&oacute;n ya no existe'
				) );
				Yii::app ()->end ();
			}
		}
	}
	
	
	public function actionActualizarDireccion() {
		if ($_POST) {
			$model = DireccionesDespachoVitalCall::model()->find( array (
					'condition' => 'idDireccionesDespachoVitalCall =:direccion',
					'params' => array (
							':direccion' => $_POST ['idDireccion']
					)
			));
			$model->attributes = $_POST ['DireccionesDespachoVitalCall'];
				
			if ($model->validate ()) {
				if ($model->save ()) {
					echo CJSON::encode ( array (
							'result' => 'ok',
							'response' => 'Direcci&oacute;n actualizada'
					) );
				}
			} else {
				echo CActiveForm::validate ( $model );
				Yii::app ()->end ();
			}
		}
	}
	public function loadModel($id) {
		$model = UsuarioVitalCall::model ()->findByPk ( $id );
		if ($model === null)
			throw new CHttpException ( 404, 'Cliente no existe.' );
		return $model;
	}
}
