<?php

class ProductoTerceroController extends ControllerTercero
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
		$this->render('detalle',array(
			'model'=>$this->loadModel($id),
		));
	}

	public function actionActualizarInventario()
	{
		$request = Yii::app()->request;
		$response = [];
		if ($request->isPostRequest) {
			$codigoProducto = $request->getPost('codigoProducto');
			$cantidad = $request->getPost('cantidad');
			if ($codigoProducto != '' && $cantidad != '') {
				$inventario = ProductosSaldosTerceros::model()->find(
					't.codigoProducto = :codigoProducto',
					[':codigoProducto' => $codigoProducto]
				);
				if ($inventario == null) {
					$inventario = new ProductosSaldosTerceros;
				}
				$inventario->codigoProducto = $codigoProducto;
				$inventario->saldoUnidad = $cantidad;
				if ($inventario->save()) {
					$response = ['result' => 'ok', 'response' => 'Cantidad actualizada'];
				} else {
					$response = ['result' => 'error', 'response' => 'Error al actualizar la cantidad'];
				}
			} else {
				$response = ['result' => 'error', 'response' => 'Error al actualizar la cantidad'];
			}
		}
		echo CJSON::encode($response);
		Yii::app()->end();
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

		if(isset($_POST['Producto']))
		{
			$model->attributes=$_POST['Producto'];
			if($model->save())
				$this->redirect(array('detalle','id'=>$model->codigoProducto));
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
		$model=new Producto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Producto']))
			$model->attributes=$_GET['Producto'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Producto the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Producto::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Producto $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='producto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
