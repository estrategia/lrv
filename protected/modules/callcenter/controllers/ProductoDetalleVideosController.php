<?php

class ProductoDetalleVideosController extends ControllerOperator
{
    public $defaultAction = 'admin';
    
    /**
     * Manages all models.
     */
    public function actionAdmin($idProductoDetalle)
    {
        $model = new ProductoDetalleVideos('search');
        $model->unsetAttributes();
        $objProductoDetalle = ProductoDetalle::model()->findByPk($idProductoDetalle);
        
        if(isset($_GET['ProductoDetalleVideos'])){
            $model->attributes=$_GET['ProductoDetalleVideos'];
        }
        
        $model->idProductoDetalle = $idProductoDetalle;
        $model->codigoProducto = $objProductoDetalle->codigoProducto;
        
        $this->render('admin',array(
            'model'=>$model,
        ));
    }
	
	public function actionCrear() 
	{
	    if (!Yii::app()->request->isPostRequest) {
	        echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inv&aacute;lida'));
	        Yii::app()->end();
	    }
	    
	    $render = Yii::app()->getRequest()->getPost('render', false);
        $model = new ProductoDetalleVideos('create');
	        
	        if ($render) {
	            $idProductoDetalle= Yii::app()->getRequest()->getPost('idProductoDetalle');
	            $objProductoDetalle = ProductoDetalle::model()->findByPk($idProductoDetalle);
	            $model->idProductoDetalle = $idProductoDetalle;
	            $model->codigoProducto = $objProductoDetalle->codigoProducto;
	            
	            Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	            //Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
	            echo CJSON::encode(array(
	                'result' => 'ok',
	                'response' => $this->renderPartial('_form', array('model' => $model), true, true)
	            ));
	            Yii::app()->end();
	        } else if ($_POST['ProductoDetalleVideos']) {
	            $model->attributes = $_POST['ProductoDetalleVideos'];
	            
	            if ($model->save()) {
	                echo CJSON::encode(array('result' => 'ok', 'response' => 'Imagen creada'));
	                Yii::app()->end();
	            } else {
	                echo CActiveForm::validate($model);
	                Yii::app()->end();
	            }
	        } else {
	            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inv&aacute;lida'));
	            Yii::app()->end();
	        }
	    
	}
	
	public function actionEditar() {
	    if (!Yii::app()->request->isPostRequest) {
	        echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inv&aacute;lida'));
	        Yii::app()->end();
	    }
        
	        $render = Yii::app()->getRequest()->getPost('render', false);
	        
	        if ($render) {
	            $idVideo = Yii::app()->getRequest()->getPost('idVideo');
	            
	            try {
	                $model = ProductoDetalleVideos::model()->findByPk($idVideo);
	                
	                if ($model === null) {
	                    echo CJSON::encode(array('result' => 'error', 'response' => 'Imagen a actualizar no existe'));
	                    Yii::app()->end();
	                }
	                
	                Yii::app()->clientScript->scriptMap['jquery.js'] = false;
	                //Yii::app()->clientScript->scriptMap['jquery.min.js'] = false;
	                echo CJSON::encode(array(
	                    'result' => 'ok',
	                    'response' => $this->renderPartial('_form', array('model' => $model), true, true)
	                ));
	                Yii::app()->end();
	            } catch (Exception $exc) {
	                Yii::log($exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
	                echo CJSON::encode(array('result' => 'error', 'response' => 'Error al cargar datos de imagen'));
	                Yii::app()->end();
	            }
	        } else if ($_POST['ProductoDetalleVideos']) {
	            $model = new ProductoDetalleVideos('update');
	            $model->attributes = $_POST['ProductoDetalleVideos'];
	            $model = ProductoDetalleVideos::model()->findByPk($model->idProductoDetalleVideo);
	            $model->setScenario('update');
	            $model->attributes = $_POST['ProductoDetalleVideos'];
	            
	            if ($model->save()) {
	                echo CJSON::encode(array('result' => 'ok', 'response' => 'Imagen creada'));
	                Yii::app()->end();
	            } else {
	                echo CActiveForm::validate($model);
	                Yii::app()->end();
	            }
	        } else {
	            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inv&aacute;lida'));
	            Yii::app()->end();
	        }

	}
	
	public function actionEliminar($id)
	{
	    $model = $this->loadModel($id);
	    $model->delete();
	    
	    // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
	    if(!isset($_GET['ajax']))
	        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/callcenter/productoDetalleVideos/admin', 'idProductoDetalle' => $model->idProductoDetalle));
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
	    $model=ProductoDetalleVideos::model()->findByPk($id);
	    if($model===null)
	        throw new CHttpException(404,'The requested page does not exist.');
	        return $model;
	}
}
