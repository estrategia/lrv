<?php

class SitioController extends ControllerTercero
{
    public function actionError() {
        if(Yii::app()->controller->module->user->isGuest)
            $this->layout = "simple";
        else
            $this->layout = "admin";
        
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo $error['message'];
            else
                $this->render('error', $error);
        }
    }
}