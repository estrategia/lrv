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
      
        $model= new ModulosConfigurados();
        
        
        if (isset($_POST['ModuloForm'])) {
            //$modelModulo = new ModulosConfigurados();
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

    public function actionEditar($idModulo, $opcion)
    {
        $model = ModulosConfigurados::model()->findByPk($idModulo);
        $params = array();
        $params['opcion'] = $opcion;
        $deshabilitados = $this->botonesDeshabilitados($model);
        
        
        if($opcion == 'sector'){
            Yii::import('ext.select2.Select2');
            $params['vista'] = '_sector';
            $params['idModulo'] = $idModulo;
            $params['ciudades'] = Ciudad::model()->findAll(array(
                'with' => array('listSectores'),
                'order' => 't.orden, t.nombreCiudad',
                'condition' => 'estadoCiudadSector=:estadoCiudadSector AND estadoSector=:estadoSector AND estadoCiudad=:estadoCiudad',
                'params' => array(
                    ':estadoCiudadSector' => 1,
                    ':estadoSector' => 1,
                    ':estadoCiudad' => 1,
                ),
            ));
            $params['sectores']= ModuloSectorCiudad::model()->findAll(array(
                        'with' => array('objCiudad','objSector'),
                        'condition' => 'idModulo =:idmodulo',
                        'params' => array(
                            'idmodulo' => $idModulo
                        ),
                        'order' => 'objCiudad.nombreCiudad,objSector.nombreSector'
                ));
            
           
        }else if($opcion == 'categoria'){
            $params['vista'] = '_categoria';
            $params['ubicacionModel'] = new UbicacionModulos();
             if($_POST) { 
                $model = new UbicacionModulos();
                $model->orden = $_POST['UbicacionModulos']['orden'];
                $model->ubicacion = $_POST['UbicacionModulos']['ubicacion'];
                $model->idModulo= $idModulo;
              //  $model->idUbicacion= Yii::app()->db->getLastInsertID('t_UbicacionModulos'); 
                
                if($model->save()){
                    $id = $model->idUbicacion; 
                    echo $id;
                    if(isset( $_POST['UbicacionCategoria']) && !empty( $_POST['UbicacionCategoria']['idCategoriaBi'])){
                        $modelCategoria= new UbicacionCategoria();
                        $modelCategoria->attributes =  $_POST['UbicacionCategoria'];
                        $modelCategoria->idUbicacion = $id;
                      //  $modelCategoria->idUbicacionCategoria = Yii::app()->db->getLastInsertID('t_UbicacionCategoria'); 
                        
                        if($modelCategoria->save()){
                            
                        }else{
                              echo "<pre>";
                                print_r($modelCategoria->getErrors());
                                echo "</pre>"; 
                        }
                    }
                    
                }else{
                    echo "<pre>";
                    print_r($model->getErrors());
                    echo "</pre>"; 
                }
             }
             $params['ubicaciones']= UbicacionModulos::model()->findAll( array(
                        'with' => array('objUbicacionCategorias' => array('with' => 'objCategoriaTienda')),
                        'condition' => 't.idModulo =:idmodulo',
                        'params' => array(
                            'idmodulo' => $idModulo
                        )
                     ));
                 
        } else if($opcion == 'contenido' && !$deshabilitados){
            
            if($model->tipo == 1)
            {
                $params['vista'] = 'contenidoBanner';
            }
            if($model->tipo == 2)
            {
                $params['vista'] = 'contenidoCrearListaProductos';
            }
            if($model->tipo == 3){
                $params['vista'] = '_contenidoImagenes';
                $params['modelImagen'] = new ImagenBanner();
               
                if($_POST){
                 
                    if(isset($_FILES))
                    {
                       $modelBanner = new ImagenBanner();
                       $modelBanner->attributes = $_POST['ImagenBanner'];
                       $uploadedFile = CUploadedFile::getInstance($modelBanner, "rutaImagen");
                      
                       if($uploadedFile->getExtensionName() == "jpg" || $uploadedFile->getExtensionName() == "png" ||
                           $uploadedFile->getExtensionName() == "jpeg" || $uploadedFile->getExtensionName()== "gif"){
                           
                            if($uploadedFile->saveAs(Yii::app()->params->callcenter['modulosConfigurados']['urlImagenes'].$uploadedFile->getName())){
                                Yii::app()->user->setFlash('error_imagen','La imagen no fue guardada');
                            }
                            
                            
                            $modelBanner->rutaImagen = "/".Yii::app()->params->callcenter['modulosConfigurados']['urlImagenes'].$uploadedFile->getName();
                            $modelBanner->idModulo = $idModulo;
                            if($modelBanner->save()){
                                
                            }else{
                                echo "<pre>";
                                print_r($modelBanner->getErrors());
                                echo "</pre>";
                            }
                            
                          //   $this->refresh();
                       }else{
                           Yii::app()->user->setFlash('error_imagen','Imagen no valida');
                       } 
                    }
                }
                
                $params['listaImagenes'] = ImagenBanner::model()->findAll(array(
                    'condition' => 'idModulo =:idmodulo',
                    'params' => array(
                            'idmodulo' => $idModulo 
                    )
                ));
            }
            if($model->tipo == 6)
            {
                $params['vista'] = 'contenidoHtml';
                $model->scenario = 'contenido';
            }
            if($model->tipo == 7)
            {
                $params['vista'] = 'contenidoHtml';
                $params['listaProductos'] = true;
                $model->scenario = 'contenido';
            }
        } else {
            $params['vista'] = 'modulos';
            $params['opcion'] = 'editar';
            $model->dias= explode(",",$model->dias);
        }
        //CVarDumper::dump($deshabilitarBotones, 10, true);
        //exit();

        $params['deshabilitados'] = $deshabilitados;
        $params['model'] = $model;
        
        $this->render('editar',array(
            'params' => $params
        ));
    }
    
    public function actionEliminarImagen(){
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }
        $idBanner = Yii::app()->getRequest()->getPost('idBanner');
        
        $model = ImagenBanner::model()->find(array(
            'condition' => 'idBanner =:idbanner',
            'params' => array(
                'idbanner' => $idBanner
            )
            
        ));
        
        if($model != null){
            $idModulo = $model->idModulo;
            $model->delete();
            
            $listaImagenes = ImagenBanner::model()->findAll(array(
                    'condition' => 'idModulo =:idmodulo',
                    'params' => array(
                            'idmodulo' => $idModulo 
                    )
                ));
            
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => $this->renderPartial('_listaImagenes', array(
                    'listaImagenes' => $listaImagenes
                ),true,false)
            ));
        }
        
    }
    
    
    public function actionComprobarciudad($codigoCiudad){
        
        $sectores=Ciudad::model()->find(array(
            'with' => array('listSubSectores' => 
                array(
                        'with' => array(
                                'listSectorReferencias' => array(
                                        'with' => 'objSector'
                                )
                         
                         )
                     )),
            'condition' => 't.codigoCiudad=:ciudad',
            'params' => array(
                'ciudad' => $codigoCiudad
            )
        ));
        
        if(count($sectores)>0 &&  count($sectores->listSubSectores)>0){
            echo CJSON::encode( array(
                        'result' => 'ok',
                        'code' => 1,
                        'htmlResponse' => $this->renderPartial('_sectorlista',array(
                                        'sectores' => $sectores
                           ),true,false)));
        }else{
            echo CJSON::encode( array(
                        'result' => 'ok',
                        'code' => 2,
                        ));
        }
    }
    
    
    public function actionGuardarCiudadSector(){
         if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $codigoCiudad = Yii::app()->getRequest()->getPost('codigoCiudad');
        $codigoSector = Yii::app()->getRequest()->getPost('codigoSector');
        $idModulo = Yii::app()->getRequest()->getPost('idModulo');
        
        $moduloSector = ModuloSectorCiudad::model()->find(array(
                'condition' => 'CodigoCiudad =:codigoCiudad AND CodigoSector =:codigoSector AND idModulo=:idmodulo ',
                'params' => array(
                            'codigoCiudad' => $codigoCiudad,
                            'codigoSector' => $codigoSector,
                            'idmodulo' => $idModulo
                )
            ));
        
        if($moduloSector == null){
            $moduloSector = new ModuloSectorCiudad();
            $moduloSector->codigoCiudad=$codigoCiudad;
            $moduloSector->codigoSector=$codigoSector;
            $moduloSector->idModulo=$idModulo;
            
            if($moduloSector->save()){
                $sectores= ModuloSectorCiudad::model()->findAll(array(
                        'with' => array('objCiudad','objSector'),
                        'condition' => 'idModulo =:idmodulo',
                        'params' => array(
                            'idmodulo' => $idModulo
                        ),
                        'order' => 'objCiudad.nombreCiudad,objSector.nombreSector'
                    ));
                
                $html=$this->renderPartial('_listaSectoresCiudades',array(
                    'sectores' => $sectores    
                ),true, false);
                   echo CJSON::encode(array(
                       'result' => 'ok',
                       'response' => $html
                   ));
            }else{
                echo CJSON::encode(array(
                       'result' => 'error',
                       'response' => "Error al guardar la ciudad/sector"
                   ));
            }
        }else{
            echo CJSON::encode(array(
                       'result' => 'error',
                       'response' => "El sector ya tiene referencia"
                   ));
        }
    }
    
    
    public function actionEliminarCiudadSector(){
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }
        
        $idModuloSector = Yii::app()->getRequest()->getPost('idModuloSectorCiudad');
        
        $moduloSector = ModuloSectorCiudad::model()->find(array(
                'condition' => 'idModuloSectorCiudad =:idmodulosector',
                'params' => array(
                            'idmodulosector' => $idModuloSector
                )
            ));
        
        if($moduloSector != null){
            $idModulo=$moduloSector->idModulo;
            $moduloSector->delete();
            
            $sectores= ModuloSectorCiudad::model()->findAll(array(
                        'with' => array('objCiudad','objSector'),
                        'condition' => 'idModulo =:idmodulo',
                        'params' => array(
                            'idmodulo' => $idModulo
                        )));
                
                $html=$this->renderPartial('_listaSectoresCiudades',array(
                    'sectores' => $sectores    
                ),true, false);
                   echo CJSON::encode(array(
                       'result' => 'ok',
                       'response' => $html
                   ));
        }else{
             echo CJSON::encode(array(
                       'result' => 'error',
                       'response' => "No se ha encontrado la ciudad/sector a eliminar"
                   ));
        }
        
    }
    
    
    public function actionEliminarUbicacion(){
         if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }
        
        $idUbicacion = Yii::app()->getRequest()->getPost('ubicacion');
        
        $ubicacion = UbicacionModulos::model()->find(array(
                'condition' => 'idUbicacion =:idubicacion',
                'params' => array(
                            'idubicacion' => $idUbicacion
                )
            ));
        
        $idModulo= $ubicacion->idModulo;
        if($ubicacion != null){
            
            $ubicacionCategoria = UbicacionCategoria::model()->find(array(
                'condition' => 'idUbicacion =:idubicacion',
                'params' => array(
                            'idubicacion' => $idUbicacion
                )
            ));
            
            if($ubicacionCategoria != null){
                $ubicacionCategoria->delete();
            }
            
            $ubicacion->delete();
            
           $ubicaciones= UbicacionModulos::model()->findAll( array(
                        'with' => array('objUbicacionCategorias' => array('with' => 'objCategoriaTienda')),
                        'condition' => 't.idModulo =:idmodulo',
                        'params' => array(
                            'idmodulo' => $idModulo
                        )
                     ));
                
                $html=$this->renderPartial('_listaUbicaciones',array(
                    'ubicaciones' => $ubicaciones    
                ),true, false);
                   echo CJSON::encode(array(
                       'result' => 'ok',
                       'response' => $html
                   ));
        }else{
             echo CJSON::encode(array(
                       'result' => 'error',
                       'response' => "No se ha encontrado la ciudad/sector a eliminar"
                   ));
        }
    }
    
    
    public function actionFormUbicacionCategoria($ubicacion=null){
        
        if($ubicacion == UbicacionModulos::UBICACION_ESCRITORIO_DIVISION || $ubicacion == UbicacionModulos::UBICACION_ESCRITORIO_CATEGORIA ){
            $model = new UbicacionCategoria();
            $arraycategorias=array();
            $categorias = CategoriaTienda::model()->findAll(array(
                'order' => 't.orden',
                'condition' => 't.tipoDispositivo=:dispositivo AND t.visible=:visible AND t.idCategoriaPadre IS NULL ',
                'params' => array(
                    ':visible' => 1,
                    ':dispositivo' => CategoriaTienda::DISPOSITIVO_ESCRITORIO
                ),
                'with' => array('listCategoriasHijas'),
                ));
            
            if($ubicacion == UbicacionModulos::UBICACION_ESCRITORIO_DIVISION){
                foreach($categorias as $categoria){
                    foreach($categoria->listCategoriasHijas as $division){
                        $arraycategorias[]=array(
                                        'idCategoria' => $division->idCategoriaTienda,
                                        'nombreCategoria' => $division->nombreCategoriaTienda,
                        );
                    }
                }
            }else{
                foreach($categorias as $categoria){
                    foreach($categoria->listCategoriasHijas as $division){
                         foreach($division->listCategoriasHijasMenu as $categoriaHija){
                            $arraycategorias[]=array(
                                            'idCategoria' => $categoriaHija->idCategoriaTienda,
                                            'nombreCategoria' => $categoriaHija->nombreCategoriaTienda,
                            );
                         }
                    }
                }
            }
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => $this->renderPartial('_formUbicacionCategoria', array(
                    'model' => $model,
                    'categorias' => $arraycategorias
            ),true,false)));
        }else{
            echo CJSON::encode(array(
                    'result' => 'none'
                ));
        }
            
            
    }
   
    public function actionFormContenidoImagen($tipoContenido){
        if($tipoContenido == ImagenBanner::CONTENIDO_HTML || $tipoContenido == ImagenBanner::CONTENIDO_LINK){
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => 1
            ));
        }else{
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => 2
            ));
        }
    }
    

    public function botonesDeshabilitados($model)
    {
        if(count($model->listModulosSectoresCiudades) == 0 || $model->listUbicacionesModulos == 0)
        {
            return true;
        }

        if($model->tipo == 1 || $model->tipo == 3 && count($model->listImagenesBanners) > 0)
        {
            return false;
        }
        if($model->tipo == 2 && count($model->listProductosModulos) > 0)
        {
            return false;
        }
        if($model->tipo == 7 || $model->contenido != "" && count($model->listProductosModulos) > 0)
        {
            return false;
        }

        if($model->tipo == 6 || $model->contenido != "")
        {
            return false;
        }
        
        return true;
    }

    public function actionTipomoduloeditar($idModulo)
    {
        $objModulo = ModulosConfigurados::model()->findByPk($idModulo);
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

        $model = ProductosModulos::model()->findAll('idModulo=:idModulo', array(':idModulo'=>$idModulo));
        
        $productosAgregados = array();

        foreach ($model as $indice => $fila) 
        {
            $productosAgregados[] = $fila->codigoProducto;
        }


        //print_r();
        


        $this->renderPartial('buscarProductos', array(
            'listProductos' => $listProductos,
            'nombreBusqueda' => $busqueda,
            'idModulo' => $idModulo,
            'productosAgregados' => $productosAgregados
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


    public function actionUpload() {
        $message = "";
        $name = time() . "_" . $_FILES['upload']['name'];
        $url = Yii::getPathOfAlias('webroot') . Yii::app()->params->carpetaImagen['contenidos'] . $name;
        //extensive suitability check before doing anything with the file…
        if (($_FILES['upload'] == "none") OR (empty($_FILES['upload']['name']))) 
        {
           $message = "No se ha cargado archivo.";
        } 
        else if ($_FILES['upload']["size"] == 0) 
        {
           $message = "Archivo inv&aacute;lido: Tama&ntilde;o 0";
        } 
        else if (($_FILES['upload']["type"] != "image/pjpeg") AND ($_FILES['upload']["type"] != "image/jpeg") AND ($_FILES['upload']["type"] != "image/png")) 
        {
           $message = "El formato de la imagen debe de ser JPG or PNG. Por favor cargar archivo JPG or PNG.";
        } 
        else if (!is_uploaded_file($_FILES['upload']["tmp_name"])) 
        {
           $message = "Solicitud inv&aacute;lida."; //$message = "You may be attempting to hack our server. We're on to you; expect a knock on the door sometime soon.";
        } 
        else 
        {
           $message = "";
           $move = move_uploaded_file($_FILES['upload']['tmp_name'], $url);
           if (!$move) 
           {
               $message = "Error al cargar el archivo."; //$message = "Error moving uploaded file. Check the script is granted Read/Write/Modify permissions.";
           }
           //$url = "../" . $url;
        }
        $url = Yii::app()->getBaseUrl() . Yii::app()->params->carpetaImagen['contenidos'] . $name;

        if (!empty($message))
           $url = "";

        $funcNum = $_GET['CKEditorFuncNum'];
        echo "<script type='text/javascript'>window.parent.CKEDITOR.tools.callFunction($funcNum, '$url', '$message');</script>";
    }
}
