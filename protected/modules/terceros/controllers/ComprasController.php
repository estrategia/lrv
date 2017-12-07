<?php

class ComprasController extends ControllerTercero
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='main';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'login + index, detalle',
		);
	}

	public function filterAccess($filter) {
        if (!Yii::app()->controller->module->user->isGuest) {
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
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionDetalle($id)
	{
		$estadosProductos = EstadosComprasItemsTerceros::model()->findAll('t.editableTercero = 1 AND t.estado = 1');
		$listadoEstados = CHtml::listData($estadosProductos, 'idEstadoItemTercero', 'nombre');
		$operadoresLogisticos = OperadorLogisticoTerceros::model()->findAll('t.estado = 1');
		$listadoOperadores = CHtml::listData($operadoresLogisticos, 'idOperadorLogistico', 'nombre');
		$productos = ComprasItems::model()->findAll(
			't.idCompra = :idCompra AND t.terceros = 1',
			[':idCompra' => $id]
		);
		$this->render('detalle',array(
			'model'=>$this->loadModel($id),
			'productos' => $productos,
			'estadosProducto' => $listadoEstados,
			'operadoresLogisticos' => $listadoOperadores
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionActualizar($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Compras']))
		{
			$model->attributes=$_POST['Compras'];
			if($model->save())
				$this->redirect(array('detalle','id'=>$model->idCompra));
		}

		$this->render('actualizar',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionIndex()
	{
		$model=new Compras('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Compras']))
			$model->attributes=$_GET['Compras'];
		$ciudades = Ciudad::model()->findAll();
        $listadoCiudades = CHtml::listData($ciudades, 'codigoCiudad', 'nombreCiudad');
		$this->render('admin',array(
			'model'=>$model,
			'ciudades' => $listadoCiudades
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Compras the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Compras::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Compras $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='compras-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
