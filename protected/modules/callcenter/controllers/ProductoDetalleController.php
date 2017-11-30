<?php

class ProductoDetalleController extends ControllerOperator
{
    public $defaultAction = 'admin';
    
    /**
     * Manages all models.
     */
	public function actionAdmin($codigoProducto){
	    $model = new ProductoDetalle('search');
	    $model->unsetAttributes();
	    
	    if(isset($_GET['ProductoDetalle'])){
	        $model->attributes=$_GET['ProductoDetalle'];
	    }
	    
	    $model->codigoProducto = $codigoProducto;
	    
	    $this->render('admin',array(
	        'model'=>$model,
	    ));
	}
	
	public function actionCrear($codigoProducto){
	    $model = new ProductoDetalle;
	    $model->codigoProducto = $codigoProducto;
	    
	    if(isset($_POST['ProductoDetalle'])){
	        $model->attributes = $_POST['ProductoDetalle'];
	        
	        if ($model->save()) {
	            Yii::app()->user->setFlash('success', "Contenido creado");
	            $this->redirect(array('/callcenter/productoDetalle/editar', 'idProductoDetalle' => $model->idProductoDetalle));
	        }
	    }
	    
	    $this->render('crear',array(
	        'model'=>$model,
	    ));
	}
	
	public function actionEditar($idProductoDetalle){
	    $model = $this->loadModel($idProductoDetalle);
	    
	    if(isset($_POST['ProductoDetalle'])){
	        $model->attributes = $_POST['ProductoDetalle'];
	        if ($model->save()) {
	            Yii::app()->user->setFlash('success', "Contenido actualizado");
	        }
	    }
	    
	    $this->render('actualizar',array(
	        'model'=>$model,
	    ));
	}
	
	public function actionEliminar($idProductoDetalle)
	{
	    $model = $this->loadModel($idProductoDetalle);
	    $model->delete();
	    
	    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	    if(!isset($_GET['ajax']))
	        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/callcenter/productoDetalle/admin', 'codigoProducto' => $model->codigoProducto));
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
	    $model=ProductoDetalle::model()->findByPk($id);
	    if($model===null)
	        throw new CHttpException(404,'The requested page does not exist.');
	        return $model;
	}
}
