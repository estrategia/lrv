<?php

class ComboController extends ControllerOperator{
    
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
        $model = new Combo('search');
        $model->unsetAttributes();
        if (isset($_GET['ModulosConfigurados']))
            $model->attributes = $_GET['ModulosConfigurados'];
        
        $this->render('index',array(
            'model' => $model
        )); 
    }
    
    public function actionCombo($opcion = 'crear', $idCombo = null) {
        
        
        $params['opcion'] = $opcion;
        
        if($opcion == 'crear'){
            $params['model'] = new Combo();
            
            if($_POST){
                $model = new Combo();
                $model->attributes = $_POST['Combo'];
                
                if($model->save()){
                    Yii::app()->user->setFlash('alert alert-success', "El módulo ha sido guardado con éxito");
                    $this->redirect($this->createUrl('combo/combo', array('idCombo' => $model->idCombo, 'opcion' => 'editar')));
                    Yii::app()->end();
                }else{
                    Yii::app()->user->setFlash('alert alert-danger', "Error al guardar el módulo");
                }
            }
            $params['vista'] = '_crearCombo';
        }else if($opcion == 'editar'){
            $params['model'] =  Combo::model()->findByPk($idCombo);
            
            if($_POST){
                $params['model']->attributes = $_POST['Combo'];
                if($params['model']->save()){
                    Yii::app()->user->setFlash('alert alert-success', "El módulo ha sido guardado con éxito");
                    $this->redirect($this->createUrl('combo/combo', array('idCombo' => $idCombo, 'opcion' => 'editar')));
                    Yii::app()->end();
                }else{
                    Yii::app()->user->setFlash('alert alert-danger', "Error al guardar el módulo");
                }
            }
            $params['vista'] = '_crearCombo';
        }else if($opcion == 'productos'){
             $params['model'] =  Combo::model()->findByPk($idCombo);
             $params['vista'] = '_crearListaProductos';
        }else if($opcion == 'sector'){
            
        }
        
        $this->render('editar',array(
            'params' => $params
        ));
    }
    
    public function actionBuscarproductos(){
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $busqueda = Yii::app()->getRequest()->getPost('busqueda');
        $idCombo = Yii::app()->getRequest()->getPost('idCombo');


        //echo $busqueda." ... ".$modulo;
        //Yii::app()->end();

        if ($busqueda === null || $idCombo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $busqueda = trim($busqueda);

        if (empty($busqueda)) {
            throw new CHttpException(404, 'Búsqueda no puede estar vacío.');
        }

        $listProductos = array();
        $codigosArray = GSASearch($busqueda);
        $codigosStr = implode(",", $codigosArray);

        if (!empty($codigosArray)) {
            $listProductos = Producto::model()->findAll(array(
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objCategoriaBI',),
                'condition' => "t.activo=:activo AND t.codigoProducto IN ($codigosStr)",
                'params' => array(
                    ':activo' => 1,
                )
            ));
        }

        $model = ComboProducto::model()->findAll('idCombo=:idCombo', array(':idCombo' => $idCombo));

        $productosAgregados = array();

        foreach ($model as $indice => $fila) {
            $productosAgregados[] = $fila->codigoProducto;
        }

        $this->renderPartial('_buscarProductos', array(
            'listProductos' => $listProductos,
            'nombreBusqueda' => $busqueda,
            'idCombo' => $idCombo,
            'productosAgregados' => $productosAgregados
        ));
    }
    
    public function actionAgregarproductocombo(){
         if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $producto = Yii::app()->getRequest()->getPost('producto');
        $idCombo = Yii::app()->getRequest()->getPost('idCombo');
        $precio = Yii::app()->getRequest()->getPost('precio');
        //echo $producto;
        //Yii::app()->end();

        if ($producto === null || $idCombo === null || $precio === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $model = new ComboProducto;

        $model->codigoProducto = $producto;
        $model->idCombo = $idCombo;
        $model->precio = $precio;

        if ($model->save()) {
            $model = Combo::model()->findByPk($idCombo);

            echo CJSON::encode(array('result' => 'ok',
                'response' => array(
                    'htmlProductosAgregados' => $this->renderPartial('_listaComboProductos', array('model' => $model), true, false),
                    'mensaje' => "Se agrego el producto"
            )));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Error al agregar el producto, por favor intente de nuevo',
            ));
            Yii::app()->end();
        }
    }
    
    public function actionEliminarproductocombo() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idComboProducto = Yii::app()->getRequest()->getPost('idComboProducto');

        if ($idComboProducto === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $model = ComboProducto::model()->findByPk($idComboProducto);
        $idCombo = Yii::app()->getRequest()->getPost('idCombo');;

        if ($model->delete()) {
            $model = Combo::model()->findByPk($idCombo);

            echo CJSON::encode(array('result' => 'ok',
                'response' => array(
                    'htmlProductosAgregados' => $this->renderPartial('_listaComboProductos', array('model' => $model), true, false),
                    'mensaje' => "Se elimino el producto"
            )));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Error al eliminar el producto, por favor intente de nuevo',
            ));
            Yii::app()->end();
        }
    }
    
}