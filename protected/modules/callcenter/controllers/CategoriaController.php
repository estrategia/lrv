<?php

class CategoriaController extends ControllerOperator {
    
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
    
    public function actionIndex($opcion = 2) {
        $this->layout = "admin";
    
        $categorias=CategoriaTienda::model()->findAll(array(
                'condition' => 'idCategoriaPadre is NULL AND tipoDispositivo =:tipodispositivo',
                'params' => array(
                    'tipodispositivo' => $opcion
                )
        ));
        
       $params['vista'] = "_categoria";
        
        $params['opcion'] = $opcion;
        $params['categorias'] = $categorias;
        $this->render('index',
                array('params' => $params
            ));
    }
    
    public function actionCrearCategoria($dispositivo, $nivel, $idCategoriaPadre, $idCategoriaRaiz ){
        $model = new CategoriaTienda();
        
      // $model->categoriasBi = Categoria::model()->findAll('nivel=3');
        echo CJSON::encode(array(
                'result' => 'ok',
                'response' => $this->renderPartial('_formCategoria', array(
                    'model' => $model,
                    'dispositivo' => $dispositivo,
                    'nivel' => $nivel,
                    'idCategoriaPadre' => $idCategoriaPadre,
                    'idCategoriaRaiz' => $idCategoriaRaiz,
                    'scenario' => 'crear'
                ),true,false)
            ));
    }
    
    
    public function actionAsociarCategorias($idCategoria = null,$tipoDispositivo = null){
       $categorias= Categoria::model()->findAll(
               array(
                     'with' => array('listCategoriasHijas' => array(
                            'with' => array ('listCategoriasHijasHijas' => array(
                                    'with' => 'listCategoriasTiendaCategoria')))),
                     'condition' => "t.nivel=1 ",
                     'params' => array(
                         'idcategoriatienda' => $idCategoria
                     )
                   ));
       
        echo CJSON::encode(array(
                'result' => 'ok',
                'response' => $this->renderPartial('_formAsociarCategoria', array(
                    'categorias' => $categorias,
                    'idCategoriaTienda' => $idCategoria,
                    'dispositivo' => $tipoDispositivo
                ),true,false)
            ));
    }
    
   public function  actionAgregarAsociacionCategoria(){
       
       $model= new CategoriasCategoriaTienda();
       $model->idCategoriaBI = Yii::app()->getRequest()->getPost('idCategoriaBi');
       $model->idCategoriaTienda = Yii::app()->getRequest()->getPost('idCategoria'); 
       $tipoDispositivo = Yii::app()->getRequest()->getPost('tipoDispositivo');
       
       if($model->save()){
           $categorias=CategoriaTienda::model()->findAll(array(
                'condition' => 'idCategoriaPadre is NULL AND tipoDispositivo =:tipodispositivo',
                'params' => array(
                    'tipodispositivo' => Yii::app()->getRequest()->getPost('tipoDispositivo')
                )
            ));
           
           echo CJSON::encode(
                   array(
                       'result' => 'ok',
                       'response' => 'Asociación creada',
                       'responseHtml' => $this->renderPartial('_categoria',
                               array(
                                    'categorias' => $categorias, 
                                    'opcion' => Yii::app()->getRequest()->getPost('tipoDispositivo')),
                              true,false)
                   ));
       }else{
           echo CJSON::encode(array(
               'result' => 'error',
               'response' => 'Error al asociar'
           ));
       }
   }
   
    public function  actionEliminarAsociacionCategoria(){
          
       $model= CategoriasCategoriaTienda::model()->find(array(
           'condition' => 'idCategoriaBI =:idcategoriabi AND idCategoriaTienda=:idcategoriatienda',
           'params' => array(
               'idcategoriabi' => Yii::app()->getRequest()->getPost('idCategoriaBi'),
               'idcategoriatienda' => Yii::app()->getRequest()->getPost('idCategoria')
           )
       ));
       if($model->delete()){
            
            echo CJSON::encode(
                   array(
                       'result' => 'ok',
                       'response' => 'Datos eliminados correctamente'
                   ));
       }else{
           echo CJSON::encode(array(
               'result' => 'error',
               'response' => 'Error al eliminar asociación'
           ));
       }
   }
   
    
    public function actionEditarCategoria($dispositivo, $nivel, $idCategoriaPadre, $idCategoriaRaiz, $idCategoria ){
        $model = CategoriaTienda::model()->find('idCategoriaTienda=:idcategoria',array(
            'idcategoria' => $idCategoria
        ));
        
        echo CJSON::encode(array(
                'result' => 'ok',
                'response' => $this->renderPartial('_formCategoria', array(
                    'model' => $model,
                    'dispositivo' => $dispositivo,
                    'nivel' => $nivel,
                    'idCategoriaPadre' => $idCategoriaPadre,
                    'idCategoriaRaiz' => $idCategoriaRaiz,
                    'scenario' => 'actualizar'
                ),true,false)
            ));
    }
    
    public function actionGuardarCategoria(){
       
      if($_POST){
          
          if($_POST['scenario'] == 'crear'){
            $model = new CategoriaTienda();
            
            $model->attributes = $_POST['CategoriaTienda'];
            $model->tipoDispositivo = $_POST['dispositivo'];

            $model->idCategoriaPadre = ($_POST['idCategoriaPadre'] != "-1" || empty($_POST['idCategoriaPadre']))? $_POST['idCategoriaPadre']:NULL;
            $model->idCategoriaRaiz = ($_POST['idCategoriaRaiz'] != "-1"  || empty($_POST['idCategoriaRaiz']))? $_POST['idCategoriaRaiz']:NULL;;

          }else{
              $model = CategoriaTienda::model()->find('idCategoriaTienda=:idcategoria',array(
                    'idcategoria' => $_POST['idCategoria']
                ));
              $rutaAnterior=$model->rutaImagen;
              $model->attributes = $_POST['CategoriaTienda'];
              
              if(empty($model->rutaImagen)){
                  $model->rutaImagen = $rutaAnterior;
              }
              
          }
          
          if (!$model->validate()) {
            echo CActiveForm::validate($model);
            Yii::app()->end();
          }
          
          if($_FILES){
                  $uploadedFile = CUploadedFile::getInstance($model, "rutaImagen");

                  if($_FILES['CategoriaTienda']['size']['rutaImagen'] > 0){
                    if ($uploadedFile->getExtensionName() == "jpg" || $uploadedFile->getExtensionName() == "png" ||
                       $uploadedFile->getExtensionName() == "jpeg" || $uploadedFile->getExtensionName() == "gif") {
                        $directorio = substr((($_POST['dispositivo'] == 2)?'/images/menu/desktop/':'/images/menu/') . $uploadedFile->getName(), 1);
                         if ($uploadedFile->saveAs($directorio)) {
                             $model->rutaImagen = $uploadedFile->getName();
                        } else {
                            echo CJSON::encode(
                                array(
                                    'result' => 'ok',
                                    'response' => 'Error al cargar la imagen de la categoría'
                                ));
                                Yii::app()->end(); 
                         }
                      }
                  }
                  $imagenMenu = CUploadedFile::getInstance($model, "rutaImagenMenu");
                 
                  if($_FILES['CategoriaTienda']['size']['rutaImagenMenu'] > 0){
                    if ($imagenMenu->getExtensionName() == "jpg" || $imagenMenu->getExtensionName() == "png" ||
                       $imagenMenu->getExtensionName() == "jpeg" || $imagenMenu->getExtensionName() == "gif") {
                         if ($imagenMenu->saveAs(substr((($_POST['dispositivo'] == 2)?'/images/menu/desktop/':'/images/menu/') . $imagenMenu->getName(), 1))) {
                             $model->rutaImagenMenu = $imagenMenu->getName();
                        } else {
                            echo CJSON::encode(
                                array(
                                    'result' => 'ok',
                                    'response' => 'Error al cargar la imagen del menú la categoría'
                                ));
                                Yii::app()->end();
                            
                         }
                      }
                  } 
            }
              
          if($model->save()){
              
              if($_POST['idCategoriaRaiz'] == '-1'){
                  $model->idCategoriaRaiz = $model->idCategoriaTienda;
                  $model->save();
              }
              
              $categorias=CategoriaTienda::model()->findAll(array(
                'condition' => 'idCategoriaPadre is NULL AND tipoDispositivo =:tipodispositivo',
                'params' => array(
                    'tipodispositivo' => $model->tipoDispositivo
                )
              ));
              
              echo CJSON::encode(
                      array(
                          'result' => 'ok',
                          'response' => $this->renderPartial('_categoria',array('categorias' => $categorias, 'opcion' => $model->tipoDispositivo),true,false)
                      ));
          }else{
                echo CJSON::encode(
                      array(
                          'result' => 'error',
                          'response' => 'Error al guardar los datos'
                      ));
          } 
      }
    }
}