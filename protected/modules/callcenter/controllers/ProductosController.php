<?php

class ProductosController extends ControllerOperator
{
    public $defaultAction = 'admin';
    
    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model=new Producto('search');
        $model->unsetAttributes();  // clear any default values
        if(isset($_GET['Producto'])){
            $model->attributes=$_GET['Producto'];
        }
        
        $model->activo = 1;
        $model->tercero = 0;
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
}
