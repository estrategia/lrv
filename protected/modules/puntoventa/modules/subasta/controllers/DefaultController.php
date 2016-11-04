<?php

class DefaultController extends ControllerSubasta {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            'access + index',
                //'login + index, infoPersonal, direcciones, direccionCrear, pagoexpress, listapedidos, pedido, listapersonal, listadetalle',
                //'loginajax + direccionActualizar',
        );
    }

    public function filterAccess($filter) {
        if (Yii::app()->controller->module->user->isGuest) {
            $this->redirect(Yii::app()->user->loginUrl);
        }
        $filter->run();
    }

    public function actionIndex() {
        $this->render('index');
    }

}
