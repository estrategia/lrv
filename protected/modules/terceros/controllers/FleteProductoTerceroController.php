<?php

class FleteProductoTerceroController extends ControllerTercero
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
        // return array(
        //     'accessControl', // perform access control for CRUD operations
        //     'postOnly + delete', // we only allow deletion via POST request
        // );
    }

    protected function beforeAction($action)
    {
        // Yii::import('terceros.models.UsuarioTercero');
        return parent::beforeAction($action);
    }

    public function actionFletesProducto($id)
    {
        $model = new FleteProductoTercero('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['FleteProductoTercero']))
            $model->attributes=$_GET['FleteProductoTercero'];

        $this->render('flete',array(
            'model'=>$model,
            'codigoProducto' => $id,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCrear($id)
    {
        Yii::import('ext.select2.Select2');
        $model=new FleteProductoTercero;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['FleteProductoTercero']))
        {
            $model->attributes=$_POST['FleteProductoTercero'];
            $model->codigoProducto = $id;
            if($model->save())
                $this->redirect(array('fletesProducto','id'=>$model->codigoProducto));
        }
        $ciudades = Ciudad::model()->findAll();
        $listadoCiudades = CHtml::listData($ciudades, 'codigoCiudad', 'nombreCiudad');
        $this->render('crear',array(
            'model'=>$model,
            'codigoProducto' => $id,
            'ciudades' => $listadoCiudades,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionActualizar($id)
    {
        Yii::import('ext.select2.Select2');
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['FleteProductoTercero']))
        {
            $model->attributes=$_POST['FleteProductoTercero'];
            if($model->save())
                $this->redirect(array('fletesProducto','id'=>$model->codigoProducto));
        }
        $ciudades = Ciudad::model()->findAll();
        $listadoCiudades = CHtml::listData($ciudades, 'codigoCiudad', 'nombreCiudad');
        $this->render('actualizar',array(
            'model'=>$model,
            'ciudades' => $listadoCiudades,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionEliminar($id)
    {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if(!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return FleteProductoTercero the loaded model
     * @throws CHttpException
     */
    public function loadModel($id)
    {
        $model=FleteProductoTercero::model()->findByPk($id);
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param FleteProductoTercero $model the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='flete-producto-tercero-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}