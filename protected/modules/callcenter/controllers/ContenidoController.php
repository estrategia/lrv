<?php

class ContenidoController extends ControllerOperator {
    
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
  
    public function actionIndex(){
        $this->layout = "admin";
      
        $model = new ModulosConfigurados('search');

        $model->unsetAttributes();
        if (isset($_GET['Compras']))
            $model->attributes = $_GET['Compras'];
        
        
        $this->render('index',array(
            'model' => $model
        ));
    }

    public function actionCrear(){
        $this->layout = "admin";
      
        $model= new ModuloForm();
        
        
        if (isset($_POST['ModuloForm'])) {
            $modelModulo = new ModulosConfigurados();
            $modelModulo->attributes = $_POST['ModuloForm'];
            $modelModulo->dias= implode(",", $modelModulo->dias);
            
            
            if($modelModulo->save()){
                Yii::app()->user->setFlash('alert alert-success', "El módulo ha sido creado con éxito");
                $this->redirect($this->createUrl('index'));
            }
            
        }
        
        $this->render('modulos',array(
            'model' => $model
        ));
    }

    public function actionEditar($modulo)
    {
        print_r($modulo);
    }

    public function actionTipomoduloeditar($modulo)
    {
        $objModulo = ModulosConfigurados::model()->findByPk($modulo);
        if($objModulo->tipo == 1)
        {
            $this->crearBanner($objModulo);
            Yii::app()->end();
        }
        if($objModulo->tipo == 2)
        {
            $this->crearListaProductos($objModulo);
            Yii::app()->end();
        }

        if($objModulo->tipo == 6)
        {
            $this->crearContenidoHtml($objModulo);
            Yii::app()->end();
        }

        if($objModulo->tipo == 7)
        {
            $this->crearContenidoHtmlProductos($objModulo);
            Yii::app()->end();
        }
    }

    public function crearListaProductos($objModulo)
    {
        //print_r($modulo);
        
        //$objProductosModulo = ProductosModulos::model()->findAll("idModulo=:idModulo", array(":idModulo" => $modulo));
        $model = $objModulo;
        $this->render('contenidoCrearListaProductos', array(
            //'objProductosModulo' => $objProductosModulo,
            'model' => $model
        ));
    }


    public function actionBuscarproductos()
    {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $busqueda = Yii::app()->getRequest()->getPost('busqueda');
        $idModulo = Yii::app()->getRequest()->getPost('idModulo');

        //echo $busqueda." ... ".$modulo;
        //Yii::app()->end();

        if ($busqueda === null || $idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $busqueda = trim($busqueda);

        if (empty($busqueda)) {
            throw new CHttpException(404, 'Búsqueda no puede estar vacío.');
        }

        $listProductos = array();
        $codigosArray = GSASearch($busqueda);
        //$codigosArray = array(10670, 21461, 22159, 410760, 301280, 10192, 30128, 36085);
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

        $this->renderPartial('buscarProductos', array(
            'listProductos' => $listProductos,
            'nombreBusqueda' => $busqueda,
            'idModulo' => $idModulo
        ));
    }
    

    public function actionAgregarproductomodulo()
    {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $producto = Yii::app()->getRequest()->getPost('producto');
        $idModulo = Yii::app()->getRequest()->getPost('idModulo');

        //echo $producto;
        //Yii::app()->end();

        if($producto === null || $idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $model = new ProductosModulos;

        $model->codigoProducto = $producto;
        $model->idModulo = $idModulo;

        if($model->save())
        {
            $model = ModulosConfigurados::model()->findByPk($idModulo);

            echo CJSON::encode(array('result' => 'ok',
                'response' => array(
                    'htmlProductosAgregados' => $this->renderPartial('_listaModuloProductos', array('model' => $model), true, false),
                    'mensaje' => "Se agrego el producto"
            )));
            Yii::app()->end();
        }
        else
        {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Error al agregar el producto, por favor intente de nuevo',
            ));
            Yii::app()->end();
        }
    }


    public function actionEliminarproductomodulo()
    {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idProductoModulo = Yii::app()->getRequest()->getPost('idProductoModulo');

        //echo $producto;
        //Yii::app()->end();

        if($idProductoModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $model = ProductosModulos::model()->findByPk($idProductoModulo);
        $idModulo = $model->idModulo;

        
        if($model->delete())
        {
            $model = ModulosConfigurados::model()->findByPk($idModulo);

            echo CJSON::encode(array('result' => 'ok',
                'response' => array(
                    'htmlProductosAgregados' => $this->renderPartial('_listaModuloProductos', array('model' => $model), true, false),
                    'mensaje' => "Se elimino el producto"
            )));
            Yii::app()->end();
        }
        else
        {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Error al eliminar el producto, por favor intente de nuevo',
            ));
            Yii::app()->end();
        }
    }

    public function crearContenidoHtml($objModulo)
    {

        $model = $objModulo;
        $model->scenario = 'contenido';


        if(isset($_POST['ModulosConfigurados']))
        {
            $model->attributes = $_POST['ModulosConfigurados'];
            if($model->save())
            {
                Yii::app()->user->setFlash('alert alert-success', "El contenido ha sido agregado con exito, al modulo ".$model->idModulo);
                $this->redirect($this->createUrl('index'));
            }

        }

        $this->render('contenidoHtml', array(
            'model' => $model
        ));
    }

    public function crearBanner($objModulo)
    {
        $this->render('contenidoBanner', array(
            'objModulo' => $objModulo
        ));
    }

    public function crearContenidoHtmlProductos($objModulo)
    {
        $model = $objModulo;
        $model->scenario = 'contenido';


        if(isset($_POST['ModulosConfigurados']))
        {
            $model->attributes = $_POST['ModulosConfigurados'];
            if($model->save())
            {
                Yii::app()->user->setFlash('alert alert-success', "El contenido ha sido agregado con exito, al modulo ".$model->idModulo);
            }
        }

        $this->render('contenidoHtml', array(
            'model' => $model,
            'listaProductos' => true
        ));
    }
}
