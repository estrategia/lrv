<?php

class ClienteController extends ControllerVitalcall {
    public $defaultAction = "admin";
    
    public function actionAdmin(){
        $model = new UsuarioVitalCall('search');
        
        $model->unsetAttributes();
        if (isset($_GET['UsuarioVitalCall']))
            $model->attributes = $_GET['UsuarioVitalCall'];
        
        $this->render('admin', array(
            'model' => $model,
        ));
    }
    
    public function actionVer($id){
        
        $objCliente = $this->loadModel($id);
        
        
        $modelCompra = new Compras('search');
        $modelCompra->unsetAttributes();
        if (isset($_GET['Compras']))
            $modelCompra->attributes = $_GET['Compras'];
        
        $modelCompra->identificacionUsuario = $objCliente->identificacionUsuario;
        $modelCompra->idTipoVenta = Yii::app()->params->tipoVenta['vitalCall'];
            
            
        $this->render('ver', array(
            'objCliente' => $objCliente,
            'modelCompra' => $modelCompra
        ));
    }
    
    public function actionPedido($id){
        
        $objCliente = $this->loadModel($id);
        
           
            
        /*$this->render('pedido', array(
            'objCliente' => $objCliente,
            'modelCompra' => $modelCompra
        ));*/
    }
    
     public function loadModel($id) {
        $model = UsuarioVitalCall::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'Cliente no existe.');
        return $model;
    }

    
}
