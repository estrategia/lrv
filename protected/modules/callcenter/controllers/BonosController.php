<?php

class BonosController extends ControllerOperator {

    public function filters() {
        return array(
            //'access',
            'login + actualizar, exportar, index, reactivar, ver',
        );
    }

    public function filterLogin($filter) {
        if (Yii::app()->controller->module->user->isGuest) {
            $this->redirect(Yii::app()->controller->module->user->loginUrl);
        }
        $filter->run();
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionVer($id) {
        $this->render('ver', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function crear() {
        $model = new BonosTienda;
        $model->tipo = 1;
        $model->estado = 1;

        if (isset($_POST['BonosTienda'])) {
            $model->attributes = $_POST['BonosTienda'];
            if ($model->save()){
                // enviar correo
                $this->enviarCorreo($model);
                $this->redirect($this->createUrl('/callcenter/bonos/index', array('opcion' => 'admin', 'bono' => $model->idBonoTienda)));
            }
                
        }

        $this->render('index', array(
            'vista' => 'crear',
            'opcion' => 'crear',
            'params' => array(
                'model' => $model,
            )
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionActualizar($id) {
        $model = $this->loadModel($id);

        if (isset($_POST['BonosTienda'])) {
            $model->attributes = $_POST['BonosTienda'];
            if ($model->save())
                $this->redirect($this->createUrl('/callcenter/bonos/index', array('opcion' => 'admin', 'bono' => $model->idBonoTienda)));
        }

        $this->render('index', array(
            'vista' => 'actualizar',
            'opcion' => 'actualizar',
            'params' => array(
                'model' => $model,
            )
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionReactivar($id) {
        if (!Yii::app()->request->isPostRequest) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
            Yii::app()->end();
        }

        $render = Yii::app()->getRequest()->getPost('render', false);
        $objBonoTienda = BonosTienda::model()->findByPk($id);

        if ($objBonoTienda === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Bono no existente'));
            Yii::app()->end();
        }

        $model = new ReactivarBonoTiendaForm;
        $model->idBonoTienda = $id;

        if ($render == true) {
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => $this->renderPartial('_d_reactivarForm', array('model' => $model, 'objBonoTienda' => $objBonoTienda), true)
            ));
            Yii::app()->end();
        } else if (isset($_POST['ReactivarBonoTiendaForm'])) {
            $model->attributes = $_POST['ReactivarBonoTiendaForm'];
            if ($model->validate()) {
                if ($objBonoTienda->estado == 0 || $objBonoTienda->estado == 2) {
                	
                    $objBonoTienda->estado = 1;
                    $objBonoTienda->idCompra = null;
                    $objBonoTienda->fechaUso = null;
                    $objBonoTienda->valorCompra = 0;

                    $modelLog = new LogBonos;
                    $modelLog->idOperador = Yii::app()->controller->module->user->id;
                    $modelLog->valorBono = $objBonoTienda->valor;
                    $modelLog->comentario = $model->comentario;
                    $modelLog->idBonoTiendaTipo = $objBonoTienda->idBonoTiendaTipo;
                    $modelLog->idBonoTienda = $objBonoTienda->idBonoTienda;
                    $modelLog->identificacionUsuario = $objBonoTienda->identificacionUsuario;

                    $transaction = Yii::app()->db->beginTransaction();
                    try {
                        if (!$objBonoTienda->save())
                            throw new Exception(CActiveForm::validate($objBonoTienda));

                        if (!$modelLog->save())
                            throw new Exception(CActiveForm::validate($modelLog));

                        $transaction->commit();
                        echo CJSON::encode(array(
                            'result' => 'ok',
                            'response' => 'Reactivaci&oacute;n correcta'
                        ));
                        Yii::app()->end();
                    } catch (Exception $exc) {
                        Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                        try {
                            $transaction->rollBack();
                        } catch (Exception $txexc) {
                            Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                        }

                        echo CJSON::encode(array(
                            'result' => 'error',
                            'response' => "Exception: " . $exc->getMessage()
                        ));
                        Yii::app()->end();
                    }
                } else {
                    echo CJSON::encode(array(
                        'result' => 'ok',
                        'response' => 'Bono no requiere reactivaci&oacute;n'
                    ));
                }
            } else {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }
        }

        /* if($model->estado==0){
          $model->estado = 1;
          $model->idCompra = null;
          $model->fechaUso = null;
          $model->valorCompra = 0;
          $model->save(); */

        /* $modelLog = new LogBonos;
          $modelLog->idOperador = Yii::app()->controller->module->user->id;
          $modelLog->valorBono = $model->valor;
          $modelLog->comentario = $comentario;
          $modelLog->identificacionUsuario = $identificacion;
          $modelLog->fechaRegistro = Date("Y-m-d h:i:s");

          if (!$modelLog->validate()) {
          echo CActiveForm::validate($modelLog);
          Yii::app()->end();
          } */
        //}
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        //if (!isset($_GET['ajax']))
        //$this->redirect($this->createUrl('/callcenter/bonos/index', array('opcion'=>'admin','bono'=>$model->idBonoTienda)));
    }

    /*
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDesactivar($id) {
    	if (!Yii::app()->request->isPostRequest) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida'));
    		Yii::app()->end();
    	}
    	
    	$render = Yii::app()->getRequest()->getPost('render', false);
    	$objBonoTienda = BonosTienda::model()->findByPk($id);
    	
    	if ($objBonoTienda === null) {
    		echo CJSON::encode(array('result' => 'error', 'response' => 'Bono no existente'));
    		Yii::app()->end();
    	}
    	
    	$model = new ReactivarBonoTiendaForm;
    	$model->idBonoTienda = $id;
    	
    	if ($render == true) {
    		echo CJSON::encode(array(
    				'result' => 'ok',
    				'response' => $this->renderPartial('_d_reactivarForm', array(
    							'model' => $model, 
    							'objBonoTienda' => $objBonoTienda), true)
    		));
    		Yii::app()->end();
    	} else if (isset($_POST['ReactivarBonoTiendaForm'])) {
    		$model->attributes = $_POST['ReactivarBonoTiendaForm'];
    		if ($model->validate()) {
    			if ($objBonoTienda->estado == 1 ) {
    				 
    				$objBonoTienda->estado = 2;
    			//	$objBonoTienda->idCompra = null;
    			//	$objBonoTienda->fechaUso = null;
    				$objBonoTienda->valorCompra = 0;
    	
    				$modelLog = new LogBonos;
    				$modelLog->idOperador = Yii::app()->controller->module->user->id;
    				$modelLog->valorBono = $objBonoTienda->valor;
    				$modelLog->comentario = $model->comentario;
    				$modelLog->idBonoTiendaTipo = $objBonoTienda->idBonoTiendaTipo;
    				$modelLog->idBonoTienda = $objBonoTienda->idBonoTienda;
    				$modelLog->identificacionUsuario = $objBonoTienda->identificacionUsuario;
    	
    				$transaction = Yii::app()->db->beginTransaction();
    				try {
    					if (!$objBonoTienda->save())
    						throw new Exception(CActiveForm::validate($objBonoTienda));
    	
    						if (!$modelLog->save())
    							throw new Exception(CActiveForm::validate($modelLog));
    	
    							$transaction->commit();
    							echo CJSON::encode(array(
    									'result' => 'ok',
    									'response' => 'Desactivaci&oacute;n correcta'
    							));
    							Yii::app()->end();
    				} catch (Exception $exc) {
    					Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
    					try {
    						$transaction->rollBack();
    					} catch (Exception $txexc) {
    						Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
    					}
    	
    					echo CJSON::encode(array(
    							'result' => 'error',
    							'response' => "Exception: " . $exc->getMessage()
    					));
    					Yii::app()->end();
    				}
    			} else {
    				echo CJSON::encode(array(
    						'result' => 'ok',
    						'response' => 'Bono no requiere desactivaci&oacute;n'
    				));
    			}
    		} else {
    			echo CActiveForm::validate($model);
    			Yii::app()->end();
    		}
    	}
    }

    /**
     * Lists all models.
     */
    public function actionIndex($opcion = null, $bono = null) {
        if ($opcion == 'crear') {
            $this->crear();
        } else if ($opcion == 'cargar') {
            $this->cargar();
        } else {
            $this->admin($bono);
        }
    }

    public function admin($bono) {
        $model = new BonosTienda('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['BonosTienda']))
            $model->attributes = $_GET['BonosTienda'];

        if ($model->idBonoTienda == null && $bono != null) {
            $model->idBonoTienda = $bono;
        }

        Yii::app()->session[Yii::app()->params->callcenter['sesion']['modelBonosAdminExport']] = $model;
        $this->render('index', array(
            'vista' => 'admin',
            'opcion' => 'admin',
            'params' => array(
                'model' => $model,
            )
        ));
    }

    public function actionExportar() {
        if (isset($_GET['excel'])) {
            $model = null;

            if (Yii::app()->session[Yii::app()->params->callcenter['sesion']['modelBonosAdminExport']] !== null)
                $model = Yii::app()->session[Yii::app()->params->callcenter['sesion']['modelBonosAdminExport']];

            if ($model !== null && get_class($model) === 'BonosTienda') {
                $model->exportar();
            } else {
                $this->redirect(array('admin'));
            }
        } else {
            $this->redirect(array('admin'));
        }
    }

    public function cargar() {
        $model = new CargueExcelForm;

        if (isset($_POST['CargueExcelForm'])) {
            ini_set("memory_limit", "1024M");
            $model->attributes = $_POST['CargueExcelForm'];

            $uploadedFile = CUploadedFile::getInstance($model, 'archivo');
            $directorio = Yii::getPathOfAlias('application.modules.callcenter') . '/uploads/';
            $fecha = new DateTime();
            $nombreArchivo = $uploadedFile->getName();
            $archivo = "bonos_" . $fecha->format("YmdHis") . "_" . Yii::app()->controller->module->user->name;
            $model->archivo = "$directorio/$archivo." . $uploadedFile->getExtensionName();

            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }

            $total = array();
            $total['cargado'] = 0;
            $total['total'] = 0;

            $warnings = "";

            if ($model->validate()) {
                if ($uploadedFile->saveAs($model->archivo)) {
                    $stringBonos = file_get_contents($model->archivo);

                    if ($stringBonos == false) {
                        Yii::app()->user->setFlash('danger', "Error al leer archivo $model->archivo. ");
                    } else {
                        $arrBonos = explode("\n", $stringBonos);

                        $transaction = Yii::app()->db->beginTransaction();
                        try {
                            foreach ($arrBonos as $registro => $lineaBono) {

                                if ($registro == 0) {
                                    continue;
                                }
                                
                                $datosBono = explode(";", $lineaBono);
                                $total['total'] ++;
                                $objBonoTienda = new BonosTienda;
                                $objBonoTienda->identificacionUsuario = trim($datosBono[0]);
                                $objBonoTienda->idBonoTiendaTipo = $model->tipoBono;
                                $objBonoTienda->concepto = trim($datosBono[1]);
                                $objBonoTienda->valor = trim($datosBono[2]);
                                $objBonoTienda->vigenciaInicio = trim($datosBono[3]);
                                $objBonoTienda->vigenciaFin = trim($datosBono[4]);
                                $objBonoTienda->minimoCompra = trim($datosBono[5]);
                                $objBonoTienda->estado = 1;
                                $objBonoTienda->tipo = 2;
                                $objBonoTienda->notificado = 0;
                                $objBonoTienda->correoElectronico = trim($datosBono[6]);

                                if ($objBonoTienda->save()) {
                                    $total['cargado'] ++;
                                } else {
                                    $warnings .= "Error $registro:" . CVarDumper::dumpAsString($objBonoTienda->getErrors()) . "<br/>";
                                }

                            }

                            $transaction->commit();
                            $result = "Archivo $nombreArchivo cargado. <br/>";
                            $result .= "Se cargaron " . $total['cargado'] . "/" . $total['total'] . " registro(s)<br/>";

                            Yii::app()->user->setFlash('success', $result);

                            if (!empty($warnings)) {
                                Yii::app()->user->setFlash('warning', $warnings);
                            }
                        } catch (Exception $exc) {
                            try {
                                $transaction->rollBack();
                            } catch (Exception $txexc) {
                                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                            }

                            Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                            Yii::app()->user->setFlash('danger', "Error al cargar archivo $nombreArchivo. " . $exc->getMessage());
                        }
                    }
                } else {
                    Yii::app()->user->setFlash('danger', "Error al guardar archivo $nombreArchivo.");
                }
            }
        }

        $this->render('index', array(
            'vista' => 'cargar',
            'opcion' => 'cargar',
            'params' => array(
                'model' => $model,
            )
        ));

        Yii::app()->end();
    }

    public function actionBonoTienda($bono = null, $opcion = null){

        $model = new BonoTienda('search');
        $model->unsetAttributes();  // clear any default values
         if (isset($_GET['BonoTienda']))
            $model->attributes = $_GET['BonoTienda'];

        $vista = 'listaTiposBonos';
        if($opcion == 'crear'){
            $vista = "crearTipo";
            $model = new BonoTienda();
        }else if($opcion == "editar"){
            $model = BonoTienda::model()->findByPk($bono);
            $vista = "crearTipo";
        }

        if(isset($_POST['BonoTienda'])){
                $model->attributes = $_POST['BonoTienda'];
                if($model->validate()){
                    if($model->save()){
                        $this->redirect(CController::createUrl('bonoTienda'));
                    }else{
                        Yii::log("Error al guardar el bono");
                    }
                }
        }
       

        $this->render('tiposBonos', array(
            'vista' => $vista ,
            'opcion' => 'admin',
            'params' => array(
                'model' => $model,
            )
        ));
    }

    public function cargarOld() {
        $model = new CargueExcelForm;

        if (isset($_POST['CargueExcelForm'])) {
            ini_set("memory_limit", "1024M");
            $model->attributes = $_POST['CargueExcelForm'];

            $uploadedFile = CUploadedFile::getInstance($model, 'archivo');
            $directorio = Yii::getPathOfAlias('application.modules.callcenter') . '/uploads/';
            $fecha = new DateTime();
            $nombreArchivo = $uploadedFile->getName();
            $archivo = "bonos_" . $fecha->format("YmdHis") . "_" . Yii::app()->user->name;
            $model->archivo = "$directorio/$archivo." . $uploadedFile->getExtensionName();

            if (!file_exists($directorio)) {
                mkdir($directorio, 0777, true);
            }

            $total = array();
            $total['cargado'] = 0;
            $total['total'] = 0;

            $warnings = "";

            if ($model->validate()) {
                if ($uploadedFile->saveAs($model->archivo)) {
                    Yii::import('application.vendors.phpexcel.PHPExcel', true);
                    $extension['xlsx'] = 'PHPExcel_Reader_Excel2007';
                    $extension['xls'] = 'PHPExcel_Reader_Excel5';
                    $objReader = new $extension[$uploadedFile->getExtensionName()];
                    $objPHPExcel = $objReader->load($model->archivo);
                    $objWorksheet = $objPHPExcel->getSheet(0)->toArray(null, true, true, true);

                    $transaction = Yii::app()->db->beginTransaction();
                    try {
                        foreach ($objWorksheet as $registro => $objCelda) {
                            if ($registro == 1) {
                                continue;
                            }

                            $total['total'] ++;
                            $objBonoTienda = new BonosTienda;
                            $objBonoTienda->identificacionUsuario = trim($objCelda[0]);
                            $objBonoTienda->concepto = trim($objCelda[1]);
                            $objBonoTienda->valor = trim($objCelda[2]);
                            $objBonoTienda->vigenciaInicio = trim($objCelda[3]);
                            $objBonoTienda->vigenciaFin = trim($objCelda[4]);
                            $objBonoTienda->minimoCompra = trim($objCelda[5]);
                            $objBonoTienda->estado = 1;
                            $objBonoTienda->tipo = 2;

                            if ($objBonoTienda->save()) {
                                $total['cargado'] ++;
                            } else {
                                $warnings .= "Error $registro:" . CVarDumper::dumpAsString($objBonoTienda->getErrors()) . "<br/>";
                            }
                        }

                        $transaction->commit();
                        $result = "Archivo $nombreArchivo cargado. <br/>";
                        $result .= "Se cargaron " . $total['cargado'] . "/" . $total['total'] . " registro(s)<br/>";

                        Yii::app()->user->setFlash('success', $result);

                        if (!empty($warnings)) {
                            Yii::app()->user->setFlash('warning', $warnings);
                        }
                    } catch (Exception $exc) {
                        try {
                            $transaction->rollBack();
                        } catch (Exception $txexc) {
                            Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                        }

                        Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
                        Yii::app()->user->setFlash('danger', "Error al cargar archivo $nombreArchivo. " . $exc->getMessage());
                    }
                } else {
                    Yii::app()->user->setFlash('danger', "Error al guardar archivo $nombreArchivo.");
                }
            }
        }

        $this->render('index', array(
            'vista' => 'cargar',
            'opcion' => 'cargar',
            'params' => array(
                'model' => $model,
            )
        ));

        Yii::app()->end();
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return BonosTienda the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = BonosTienda::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param BonosTienda $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'bonos-tienda-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    /**
     * Send email to bono created.
     */
    function enviarCorreo($model){
        try{
            $htmlCorreo = "";
            $contenidoCorreo = $this->renderPartial('bonoCorreo', array(
                   'objBono' => $model,
                   ), true, true);
            $htmlCorreo = $this->renderPartial('application.views.common.correo', array('contenido' => $contenidoCorreo), true, true);
            sendHtmlEmail($model->correoElectronico, Yii::app()->params->callcenter['bonos']['asuntoCorreo'], $htmlCorreo);
        }catch(Exception $e){
            $model->notificado = 0;
            $model->save();
            Yii::log("No se pudo enviar correo al usuario $model->correoElectronico");
        }
    }

}
