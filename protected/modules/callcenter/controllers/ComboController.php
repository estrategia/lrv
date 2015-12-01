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
             Yii::import('ext.select2.Select2');
            $params['vista'] = '_ciudadSector';
            $params['model'] =  Combo::model()->findByPk($idCombo);
            $params['ciudades'] =  Ciudad::model()->findAll(array(
                'with' => array('listSectores'),
                'order' => 't.orden, t.nombreCiudad',
                'condition' => 'estadoCiudadSector=:estadoCiudadSector AND estadoSector=:estadoSector AND estadoCiudad=:estadoCiudad',
                'params' => array(
                    ':estadoCiudadSector' => 1,
                    ':estadoSector' => 1,
                    ':estadoCiudad' => 1,
                ),
            ));
        }else if($opcion == 'imagen'){
            $params['model'] =  Combo::model()->findByPk($idCombo);
            $params['vista'] = '_imagenCombo';
            $params['modelImagen'] = new ImagenCombo();
            
            if($_POST){
                if (isset($_FILES)) {
                        $modelImagen =  new ImagenCombo();;
                        $modelImagen->attributes = $_POST['ImagenCombo'];
                        $uploadedFile = CUploadedFile::getInstance($modelImagen, "rutaImagen");

                        if ($uploadedFile->getExtensionName() == "jpg" || $uploadedFile->getExtensionName() == "png" ||
                                $uploadedFile->getExtensionName() == "jpeg" || $uploadedFile->getExtensionName() == "gif") {

                            if ($uploadedFile->saveAs(substr(Yii::app()->params->carpetaImagen['combos'][$modelImagen->tipoImagen] . $uploadedFile->getName(), 1))) {
                                $modelImagen->rutaImagen =  $uploadedFile->getName();
                                $modelImagen->idCombo = $idCombo;
                                  if ($modelImagen->save()) {
                                    Yii::app()->user->setFlash('alert alert-success', "La imagen ha sido guardada con éxito");
                                } else {
                                    Yii::app()->user->setFlash('alert alert-danger', "Error al subir la imagen");
                                }
                            } else {
                                Yii::app()->user->setFlash('alert alert-danger', 'Error al subir la imagen');
                            }
                        } else {
                            Yii::app()->user->setFlash('alert alert-danger', 'Imagen no valida');
                        }
               }
            }
        }
        
        $this->render('editar',array(
            'params' => $params
        ));
    }
    
    
    public function actionEliminarImagenCombo(){
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $imagenCombo = Yii::app()->getRequest()->getPost('imagenCombo');
        
        $resultado= ImagenCombo::model()->findByPk($imagenCombo);
        
        if($resultado == null){
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Imagen no encontrada'
            ));
            Yii::app()->end();
        }
        
        $idCombo = $resultado->idCombo;
        
        if($resultado->delete()){
            $model = Combo::model()->findByPk($idCombo);
             echo CJSON::encode(array('result' => 'ok',
                'response' =>  $this->renderPartial('_listaImagenes', array('listaImagenes' => $model->listImagenesCombo), true, false),
                    ));
            Yii::app()->end();
        }else{
            echo CJSON::encode(array('result' => 'ok',
                'response' => 'error al eliminar la imagen'));
            Yii::app()->end();
        }
        
        
    }
    
    public function actionEstadoImagenCombo(){
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $imagenCombo = Yii::app()->getRequest()->getPost('imagenCombo');
        $resultado= ImagenCombo::model()->findByPk($imagenCombo);
        
        if($resultado == null){
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Imagen no encontrada'
            ));
            Yii::app()->end();
        }
        
        if($resultado->estadoImagen == 0){
            $resultado->estadoImagen = 1;
        }else{
            $resultado->estadoImagen = 0;
        }
        $idCombo = $resultado->idCombo;
        
        if($resultado->save()){
            $model = Combo::model()->findByPk($idCombo);
             echo CJSON::encode(array('result' => 'ok',
                'response' =>  $this->renderPartial('_listaImagenes', array('listaImagenes' => $model->listImagenesCombo), true, false),
                    ));
            Yii::app()->end();
        }else{
            echo CJSON::encode(array('result' => 'ok',
                'response' => 'error al eliminar la imagen'));
            Yii::app()->end();
        }
    }
    
    public function actionValidarComboBeneficio($valor){
        
        if($valor == 1){
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => ''));
            Yii::app()->end();
        }else if ($valor == 2){
            $beneficios = Beneficios::model()->findAll(array(
                 'with' => 'listBeneficiosProductos',
                 'condition' => 't.tipo in ('.implode(",", Yii::app()->params->beneficios['recambios']).')',
                 
             ));
            
              echo CJSON::encode(array(
                'result' => 'ok',
                'response' => $this->renderPartial('_selectBeneficios',array(
                        'beneficios' => $beneficios
                ),true,false)
                
            )); 
            Yii::app()->end();
            
        }
    }
    
    
    public function actionInformacioBeneficio($idBeneficio){
        $beneficios = Beneficios::model()->find('idBeneficio =:idBeneficio',array(
            'idBeneficio' => $idBeneficio
        )); 
        $descripción = "";
        if($beneficios->tipo == Yii::app()->params->beneficios['recambio']){
            foreach($beneficios->listBeneficiosProductos as $productos){
                $descripcionProducto = $productos ->objProducto->descripcionProducto;
                $descripción = "PAGUE $productos->unid LLEVE ".($productos->unid+$productos->obsequio)." - $descripcionProducto";
            }
            
        }
        
        echo CJSON::encode(array(
            'result' => 'ok',
            'descripcion' => $descripción,
            'fechaInicio' => $beneficios->fechaIni,
            'fechaFin' => $beneficios->fechaFin,
        ));
    }
    
    public function actionBuscarproductos(){
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $busqueda = Yii::app()->getRequest()->getPost('busqueda');
        $idCombo = Yii::app()->getRequest()->getPost('idCombo');

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
    
    public function actionGuardarCiudadSector(){
       
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $codigoCiudad = Yii::app()->getRequest()->getPost('codigoCiudad');
        $codigoSector = Yii::app()->getRequest()->getPost('codigoSector');
        $idCombo = Yii::app()->getRequest()->getPost('idCombo');
        $saldo = Yii::app()->getRequest()->getPost('saldo');

        $comboSector = ComboSectorCiudad::model()->find(array(
            'condition' => 'codigoCiudad =:codigoCiudad AND codigoSector =:codigoSector AND idCombo=:idCombo ',
            'params' => array(
                'codigoCiudad' => $codigoCiudad,
                'codigoSector' => $codigoSector,
                'idCombo' => $idCombo
            )
        ));

        if ($comboSector == null) {

            if (empty($codigoCiudad)) {
                $codigoCiudad = Yii::app()->params->ciudad['*'];
                $codigoSector = Yii::app()->params->sector['*'];
            }

            $comboSector = new ComboSectorCiudad();

            if (empty($codigoCiudad)) {
                $codigoCiudad = Yii::app()->params->ciudad['*'];
            }
            $comboSector->codigoCiudad = $codigoCiudad;
            $comboSector->codigoSector = $codigoSector;
            $comboSector->idCombo = $idCombo;
            $comboSector->saldo = $saldo;

            if ($comboSector->save()) {
                $model = Combo::model()->findByPk($idCombo);

                $html = $this->renderPartial('_listaSectoresCiudades', array(
                    'model' => $model
                        ), true, false);
                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => $html
                ));
            } else {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => "Error al guardar la ciudad/sector"
                ));
            }
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => "El sector está referenciado"
            ));
        }
    
    }
    
     public function actionEliminarCiudadSector() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $codigoSector = Yii::app()->getRequest()->getPost('codigoSector');
        $codigoCiudad = Yii::app()->getRequest()->getPost('codigoCiudad');
        $idCombo = Yii::app()->getRequest()->getPost('idCombo');
        
        $moduloSector = ComboSectorCiudad::model()->find(array(
            'condition' => 'codigoSector=:codigoSector AND codigoCiudad=:codigoCiudad AND idCombo=:idCombo',
            'params' => array(
                'codigoSector' => $codigoSector,
                'codigoCiudad' => $codigoCiudad,
                'idCombo' => $idCombo
            )
        ));

        if ($moduloSector != null) {
            $moduloSector->delete();
            $model = Combo::model()->findByPk($idCombo);

            $html = $this->renderPartial('_listaSectoresCiudades', array(
                'model' => $model
                    ), true, false);
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => $html
            ));
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => "No se ha encontrado la ciudad/sector a eliminar"
            ));
        }
    }
    
}