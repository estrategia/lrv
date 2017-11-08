<?php

class ProductoDetalleImagenesController extends ControllerOperator
{
    public $defaultAction = 'admin';
    
    /**
     * Manages all models.
     */
    public function actionAdmin($idProductoDetalle)
    {
        $model = new ProductoDetalleImagenes('search');
        $model->unsetAttributes();
        $objProductoDetalle = ProductoDetalle::model()->findByPk($idProductoDetalle);
        
        if(isset($_GET['ProductoDetalleImagenes'])){
            $model->attributes=$_GET['ProductoDetalleImagenes'];
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
        $model = new ProductoDetalleImagenes('create');
	        
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
	        } else if ($_POST['ProductoDetalleImagenes']) {
	            $model->attributes = $_POST['ProductoDetalleImagenes'];
	            
	            $fecha = new DateTime();
	            $directorio = Yii::getPathOfAlias('webroot') . Yii::app()->params->carpetaImagen['productos']['detalleImagenes']. $model->codigoProducto;
	            
	            if (!file_exists($directorio)) {
	                mkdir($directorio, 0777, true);
	            }
	            
	            $archivoEscritorio = CUploadedFile::getInstance($model, 'rutaImagenEscritorio');
	            $archivoMovil = CUploadedFile::getInstance($model, 'rutaImagenEscritorio');
	            $nombreArchivoEscritorio = null;
	            $nombreArchivoMovil = null;
	            
	            if ($archivoEscritorio !== null) {
	                $nombreArchivoEscritorio= $fecha->format("YmdHis") . '-d.' . $archivoEscritorio->getExtensionName();
	                $model->rutaImagenEscritorio = $nombreArchivoEscritorio;
	            }
	            
	            if ($archivoMovil !== null) {
	                $nombreArchivoMovil= $fecha->format("YmdHis") . '-m.' . $archivoEscritorio->getExtensionName();
	                $model->rutaImagenMovil = $nombreArchivoMovil;
	            }
	            
	            if ($model->validate()) {
	                try {
	                    $archivoEscritorio->saveAs("$directorio/$nombreArchivoEscritorio");
	                    $archivoMovil->saveAs("$directorio/$nombreArchivoMovil");
	                    
	                    if ($model->save()) {
	                        echo CJSON::encode(array('result' => 'ok', 'response' => 'Imagen creada'));
	                        Yii::app()->end();
	                    } else {
	                        echo CActiveForm::validate($model);
	                        Yii::app()->end();
	                    }
	                } catch (Exception $exc) {
	                    Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
	                    echo CJSON::encode(array('result' => 'error', 'response' => 'Error al crear imagen'));
	                    Yii::app()->end();
	                }
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
	            $idImagen = Yii::app()->getRequest()->getPost('idImagen');
	            
	            try {
	                $model = ProductoDetalleImagenes::model()->findByPk($idImagen);
	                
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
	        } else if ($_POST['ProductoDetalleImagenes']) {
	            $form = new ProductoDetalleImagenes('update');
	            $form->attributes = $_POST['ProductoDetalleImagenes'];
	            
	            try {
	                $model = ProductoDetalleImagenes::model()->findByPk($form->idProductoDetalleImagen);
	                $model->tituloImagen = $form->tituloImagen;
	                
	                $fecha = new DateTime();
	                $directorio = Yii::getPathOfAlias('webroot') . Yii::app()->params->carpetaImagen['productos']['detalleImagenes']. $model->codigoProducto;
	                
	                if (!file_exists($directorio)) {
	                    mkdir($directorio, 0777, true);
	                }
	                
	                $archivoEscritorio = CUploadedFile::getInstance($form, 'rutaImagenEscritorio');
	                $archivoMovil = CUploadedFile::getInstance($form, 'rutaImagenEscritorio');
	                $nombreArchivoEscritorio = null;
	                $nombreArchivoMovil = null;
	                
	                //Yii::log("archivo escritorio: " . CVarDumper::dumpAsString($model->attributes), CLogger::LEVEL_INFO, 'application');
	                
	                if ($archivoEscritorio !== null) {
	                    $nombreArchivoEscritorio= $fecha->format("YmdHis") . '-d.' . $archivoEscritorio->getExtensionName();
	                    $model->rutaImagenEscritorio = $nombreArchivoEscritorio;
	                }
	                
	                //Yii::log("archivo escritorio: " . CVarDumper::dumpAsString($model->attributes), CLogger::LEVEL_INFO, 'application');
	                
	                if ($archivoMovil !== null) {
	                    $nombreArchivoMovil= $fecha->format("YmdHis") . '-m.' . $archivoEscritorio->getExtensionName();
	                    $model->rutaImagenMovil = $nombreArchivoMovil;
	                }
	                
	                if ($model->validate()) {
	                    //Yii::log("archivo escritorio: " . CVarDumper::dumpAsString($model->attributes), CLogger::LEVEL_INFO, 'application');
	                    
	                    try {
	                        if ($archivoEscritorio !== null)
	                           $archivoEscritorio->saveAs("$directorio/$nombreArchivoEscritorio");
	                        
	                        if ($archivoMovil!== null)
	                           $archivoMovil->saveAs("$directorio/$nombreArchivoMovil");
	                        
	                        if ($model->save()) {
	                            echo CJSON::encode(array('result' => 'ok', 'response' => 'Imagen actualizada'));
	                            Yii::app()->end();
	                        }else {
	                            echo CActiveForm::validate($form);
	                            Yii::app()->end();
	                        }
	                    } catch (Exception $exc) {
	                        Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
	                        echo CJSON::encode(array('result' => 'error', 'response' => 'Error al actualizar imagen.' . $exc->getMessage()));
	                        Yii::app()->end();
	                    }
	                } else {
	                    echo CActiveForm::validate($form);
	                    Yii::app()->end();
	                }
	            } catch (Exception $exc) {
	                Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
	                echo CJSON::encode(array('result' => 'error', 'response' => 'Error al actualizar datos de imagen.' . $exc->getMessage()));
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
	        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('/callcenter/productoDetalleImagenes/admin', 'idProductoDetalle' => $model->idProductoDetalle));
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
	    $model=ProductoDetalleImagenes::model()->findByPk($id);
	    if($model===null)
	        throw new CHttpException(404,'The requested page does not exist.');
	        return $model;
	}
}
