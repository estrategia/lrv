<?php

class TarifaDomicilioController extends ControllerOperator {


    public function filters() {
        return array(
            //'access',
            'login + index',
                //'loginajax + direccionActualizar',
        );
    }

    public function filterAccess($filter) {
        if (Yii::app()->controller->module->user->isGuest || Yii::app()->controller->module->user->profile != 2) {
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

    public function actionIndex() {
        $this->layout = "admin";
        $model = new Domicilio('search');

        $model->unsetAttributes();
        if (isset($_GET['Domicilio']))
            $model->attributes = $_GET['Domicilio'];

        $this->render('index', array(
            'model' => $model
        ));
    }

    public function actionTarifadomicilio()
    {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idDomicilio = Yii::app()->getRequest()->getPost('idDomicilio');
        
        if ($idDomicilio === null) 
        {
            $model = new Domicilio;
        }
        else
        {
            $model = Domicilio::model()->findByPk($idDomicilio);
        }


        echo CJSON::encode(array('result' => 'ok', 
            'response' => array(
                "htmlTarifa" => $this->renderPartial("_formularioModal", array('model' => $model), true, true)
        )));
        Yii::app()->end();

    }

    public function actionComprobarciudad()
    {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $codigoCiudad = Yii::app()->getRequest()->getPost('codigoCiudad');
        
        if ($codigoCiudad === null) 
        {
            throw new CHttpException(404, 'Solicitud inválida.');
        }
        
        $model = new Domicilio;
        $model->codigoCiudad = $codigoCiudad;

        echo CJSON::encode(array('result' => 'ok', 
            'response' => array(
                "htmlSector" => $this->renderPartial("_sectorLista", array('model' => $model), true)
        )));
        Yii::app()->end();
    }

    public function actionAgregartarifadomicilio()
    {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }


        if(isset($_POST['Domicilio']))
        {
            if(isset($_POST['Domicilio']['idDomicilio']))
            {
                $model = Domicilio::model()->findByPk($_POST['Domicilio']['idDomicilio']);
            }
            else
            {
                $model = new Domicilio;
            }

            $model->attributes = $_POST['Domicilio'];

            if($model->validate())
            {
                if(!$model->save())
                {
                    echo CJSON::encode(array('result' => 'error', 'response' => 'Error al agregar tarifa, por favor intente de nuevo'));
                    Yii::app()->end();
                }

                echo CJSON::encode(array('result' => 'ok', 'response' => 'La tarifa fue agregada exitosamente'));
                Yii::app()->end();
            }
            else 
            {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            //print_r($_POST['Domicilio']);
            //exit();

        }
    }

    public function actionEliminartarifadomicilio()
    {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idDomicilio = Yii::app()->getRequest()->getPost('idDomicilio');
        
        if ($idDomicilio === null) 
        {
            throw new CHttpException(404, 'Solicitud inválida.');
        }
        
        $model = Domicilio::model()->findByPk($idDomicilio);
        if(!$model->delete())
        {
            echo CJSON::encode(array('result' => 'error', 
                'response' => "No se pudo eliminar esta tarifa, por favor intentelo nuevamente"
            ));
        }

        echo CJSON::encode(array('result' => 'ok', 
            'response' => "La tarifa fue eliminada"
        ));
        Yii::app()->end();
    }

}