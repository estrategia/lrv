<?php

class SuscripcionesController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

	public function actionPrueba()
	{
		$suscripcion = SuscripcionesProductosUsuario::model()->findByPk('2');
		 $cantidadPeriodos = 10;
		// $valor = $suscripcion->consultarPeriodoActual();
		// $valor = $suscripcion->consultarUltimoPeriodo();
		// $valor = $suscripcion->consultarCantidadPeriodoActual();
		// $suscripcion->actualizarPeriodos(5);
		 $suscripcion->generarPeriodos($cantidadPeriodos);
		// CVarDumper::dump($valor,10,true);
	}

	public function actionSuscribirse()
	{
		$request = Yii::app()->request;
		$codigoProducto = $request->getParam('codigoProducto');
		$identificacionUsuario = Yii::app()->user->name;
		$criteriaBeneficio = new CDbCriteria;
		$criteriaBeneficio->condition = 't.codigoProducto=:codigoProducto';
		$criteriaBeneficio->condition .= ' AND objBeneficio.tipo IN (' . implode(",", Yii::app()->params->beneficios['beneficiosSuscripcion']) . ')';
		$criteriaBeneficio->with = 'objBeneficio';
		$criteriaBeneficio->params = [':codigoProducto' => $codigoProducto];
		$suscripcion = SuscripcionesProductosUsuario::model()->find(
			'identificacionUsuario=:identificacionUsuario AND idProducto=:codigoProducto',
			[':identificacionUsuario' => $identificacionUsuario, ':codigoProducto' => $codigoProducto]
		);
		if (!is_null($suscripcion)) {
			$this->redirect(array('/catalogo/producto/', 'producto' => $codigoProducto));
		}
		$producto = Producto::model()->find(array(
			'with' => array(
					'listImagenesGrandes',
					'listDetalleProducto',
					'objCodigoEspecial',
					'listDetalleProducto',
					'listCalificaciones' => array(
						'with' => 'objUsuario'
				)
			),
			'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
			'params' => array (
				':activo' => 1,
				':codigo' => $codigoProducto
			)
		));
		$beneficioProducto = BeneficiosProductos::model()->find($criteriaBeneficio);
		if ($this->isMobile) {
			$this->render('crear', ['objProducto' => $producto, 'beneficio' => $beneficioProducto]);
		} else {
			$this->render('d_crear', ['producto' => $producto, 'beneficio' => $beneficioProducto]);
		}
	}

	public function actionEditar()
	{
		$request = Yii::app()->request;
		$codigoProducto = $request->getParam('codigoProducto');
		$identificacionUsuario = Yii::app()->user->name;
		$producto = Producto::model()->find(array(
			'with' => array(
					'listImagenesGrandes',
					'objCodigoEspecial',
					'listDetalleProducto',
					'listCalificaciones' => array(
						'with' => 'objUsuario'
				)
			),
			'condition' => 't.activo=:activo AND t.codigoProducto=:codigo',
			'params' => array (
				':activo' => 1,
				':codigo' => $codigoProducto
			)
		));
		$suscripcion = SuscripcionesProductosUsuario::model()->find(
			'identificacionUsuario=:identificacionUsuario AND idProducto=:codigoProducto',
			[':identificacionUsuario' => $identificacionUsuario, ':codigoProducto' => $codigoProducto]
		);
		// var_dump($codigoProducto);
		// exit();
		if ($this->isMobile) {
			$this->render('actualizar', ['objProducto' => $producto, 'suscripcion' => $suscripcion]);
		} else {
			$this->render('d_actualizar', ['producto' => $producto, 'suscripcion' => $suscripcion]);
		}
	}

	public function actionActualizar()
	{
		$request = Yii::app()->request;
		$response = [];
		$idSuscripcion = $request->getParam('idSuscripcion');
		$periodos = $request->getParam('periodos');
		$suscripcion = SuscripcionesProductosUsuario::model()->find(
			"idSuscripcion=:idSuscripcion",
			[':idSuscripcion' => $idSuscripcion]
		);
		$periodoActual = $suscripcion->consultarPeriodoActual();
		if ($periodoActual !== null) {
			if ($periodos <= $periodoActual->numeroPeriodo) {
				$response = [
					'result' => 'error', 
					'response' => "La cantidad de periodos introducida debe ser mayo que la cantidad de periodos transcurridos ($periodoActual->numeroPeriodo)"
				];
				echo CJSON::encode($response);
				exit();
			}
		}
		$suscripcion->actualizarPeriodos($periodos);
		$response = ['result' => 'ok', 'response' => 'Suscripcion actualizada correctamente'];
		echo CJSON::encode($response);
	}

	public function actionCrear()
	{
		$request = Yii::app()->request;
		$response = [];
		$codigoProducto = $request->getParam('codigoProducto');
		$periodos = $request->getParam('periodos');
		$identificacionUsuario = Yii::app()->user->name;
		$criteriaBeneficio = new CDbCriteria;
		$criteriaBeneficio->condition = 't.codigoProducto=:codigoProducto';
		$criteriaBeneficio->condition .= ' AND objBeneficio.tipo IN (' . implode(",", Yii::app()->params->beneficios['beneficiosSuscripcion']) . ')';
		$criteriaBeneficio->with = 'objBeneficio';
		$criteriaBeneficio->params = [':codigoProducto' => $codigoProducto];
		$beneficioProducto = BeneficiosProductos::model()->find($criteriaBeneficio);
		$suscripcion = new SuscripcionesProductosUsuario;
		$suscripcion->identificacionUsuario = Yii::app()->user->name;
		$suscripcion->idProducto = $codigoProducto;
		$suscripcion->idBeneficio = $beneficioProducto->idBeneficio;
		$suscripcion->validate();
		if ($suscripcion->save()) {
			$suscripcion->generarPeriodos($periodos);
			$response = ['result' => 'ok', 'response' => 'Se ha creado la suscripción correctamente'];
		} else {
			$response = ['result' => 'ok', 'response' => 'Error al crear la suscripcion'];
		}
		echo CJSON::encode($response);
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}