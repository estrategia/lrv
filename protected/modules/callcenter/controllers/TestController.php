<?php

class TestController extends ControllerOperator {
    
    public function actionCantidad(){
        $fecha = Compras::calcularFechaVisualizar();
        $arr = Compras::cantidadComprasPorEstado($fecha);
        CVarDumper::dump($arr, 10, true);
    }

    public function actionAuth() {
        /*echo Yii::app()->user->isGuest ? "invitado" : "autenticado";
        echo "<br/>";
        echo Yii::app()->operator->isGuest ? "invitado" : "autenticado";*/
        
        //Yii::app()->shoppingCart->getPositions();
        //echo "jdjaj";
        echo Yii::app()->controller->module->user->isGuest;
        echo "<br/>";
        echo Yii::app()->controller->module->user->name;
        echo "<br/>";
        echo Yii::app()->user->loginUrl;
        echo "<br/>";
        echo Yii::app()->homeUrl;
        echo "<br/>";
        
        //echo Yii::app()->controller->module->user->homeUrl;
        //echo "<br/>";
        
        $sessions = Yii::app()->params->callcenter['sesion'];
        
        foreach($sessions as $sesion){
            echo $sesion;
            echo "<br/>";
        }
    }
}
