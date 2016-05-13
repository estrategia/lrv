<?php

class ContenidoController extends ControllerOperator {

    public $objSectorCiudad = null;

    public function filters() {
        return array(
            //'access',
            'login + index,crear,editar',
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

        $model = new ModulosConfigurados('search');

        $model->unsetAttributes();
        if (isset($_GET['ModulosConfigurados']))
            $model->attributes = $_GET['ModulosConfigurados'];


        Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/main-desktop.css");
        $this->render('index', array(
            'model' => $model
        ));
    }

    public function actionCrear() {
        $this->layout = "admin";

        $model = new ModulosConfigurados();


        if (isset($_POST['ModulosConfigurados'])) {
            $modelModulo = new ModulosConfigurados();
            $modelModulo->attributes = $_POST['ModulosConfigurados'];
            $modelModulo->dias = implode(",", $modelModulo->dias);

            if ($modelModulo->save()) {
                Yii::app()->user->setFlash('alert alert-success', "El módulo ha sido guardado con éxito");
                $this->redirect($this->createUrl('contenido/editar', array('idModulo' => $modelModulo->idModulo, 'opcion' => 'sector')));
                Yii::app()->end();
            } else {
                Yii::app()->user->setFlash('alert alert-danger', "Error al guardar el módulo");
            }
        }

        $this->render('modulos', array(
            'model' => $model
        ));
    }

    public function actionEditar($idModulo, $opcion) {
        $model = ModulosConfigurados::model()->findByPk($idModulo);
        $params = array();
        $params['opcion'] = $opcion;


        if ($opcion == 'sector') {
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
            $params['sectores'] = ModuloSectorCiudad::model()->findAll(array(
                'with' => array('objCiudad', 'objSector'),
                'condition' => 'idModulo =:idmodulo',
                'params' => array(
                    'idmodulo' => $idModulo
                ),
                'order' => 'objCiudad.nombreCiudad,objSector.nombreSector'
            ));
        } else if ($opcion == 'perfil') {
            $params['vista'] = '_perfil';
            $params['idModulo'] = $idModulo;
            $params['perfiles'] = Perfil::model()->findAll();
            $params['modelPerfil'] = new ModuloPerfil();

            if (isset($_POST['ModuloPerfil'])) {

                $perfiles = ModuloPerfil::model()->deleteAll('idModulo =:idmodulo', array(
                    'idmodulo' => $idModulo
                ));

                $modelModuloPerfil = $_POST['ModuloPerfil'];
                foreach ($modelModuloPerfil['idPerfil'] as $perfil) {
                    $moduloGuardar = ModuloPerfil::model()->findAll(array(
                        'condition' => 'idModulo =:idmodulo AND idPerfil =:idperfil',
                        'params' => array(
                            'idmodulo' => $idModulo,
                            'idperfil' => $perfil
                        )
                    ));

                    if ($moduloGuardar == null) {
                        $moduloGuardar = new ModuloPerfil();
                        $moduloGuardar->idModulo = $idModulo;
                        $moduloGuardar->idPerfil = $perfil;

                        if ($moduloGuardar->save()) {
                            Yii::app()->user->setFlash('alert alert-success', "Los perfiles fueron adicionados con éxito");
                        }
                    }
                }
            }
            $perfilAdd = array();

            $perfiles = ModuloPerfil::model()->findAll('idModulo =:idmodulo', array(
                'idmodulo' => $idModulo
            ));

            foreach ($perfiles as $valores) {
                $perfilAdd[] = $valores->idPerfil;
            }
            $params['modelPerfil']->idPerfil = $perfilAdd;
        } else if ($opcion == 'categoria') {
            $params['vista'] = '_categoria';
            $params['ubicacionModel'] = new UbicacionModulos();
            if ($_POST) {
                $modelUbicacion = new UbicacionModulos();
                $modelUbicacion->orden = $_POST['UbicacionModulos']['orden'];
                $modelUbicacion->ubicacion = $_POST['UbicacionModulos']['ubicacion'];
                $modelUbicacion->idModulo = $idModulo;

                if ($modelUbicacion->save()) {
                    $id = $modelUbicacion->idUbicacion;
                    if (isset($_POST['UbicacionCategoria']) && !empty($_POST['UbicacionCategoria']['idCategoriaBi'])) {
                        $modelCategoria = new UbicacionCategoria();
                        $modelCategoria->attributes = $_POST['UbicacionCategoria'];
                        $modelCategoria->idUbicacion = $id;

                        if ($modelCategoria->save()) {
                            Yii::app()->user->setFlash('alert alert-success', "La ubicación del módulo fué guardada con éxito");
                        } else {
                            Yii::app()->user->setFlash('alert alert-danger', "Error al guardar la ubicación del módulo");
                        }
                    } else {
                        Yii::app()->user->setFlash('alert alert-success', "El módulo ha sido guardado con éxito");
                    }
                } else {
                    Yii::app()->user->setFlash('alert alert-danger', "Error al guardar la ubicación del módulo");
                }
            }
            $params['ubicaciones'] = UbicacionModulos::model()->findAll(array(
                'with' => array('objUbicacionCategorias' => array('with' => 'objCategoriaTienda')),
                'condition' => 't.idModulo =:idmodulo',
                'params' => array(
                    'idmodulo' => $idModulo
                )
            ));
        } else if ($opcion == 'contenido') {


            if ($model->tipo == ModulosConfigurados::TIPO_PRODUCTOS || $model->tipo == ModulosConfigurados::TIPO_PRODUCTOS_CUADRICULA || $model->tipo == ModulosConfigurados::TIPO_PRODUCTOS_CARRO) {
                $params['vista'] = 'contenidoCrearListaProductos';

                $params['arrayMarcas'] = $this->obtenerMarcas();
                //$params['arrayMarcasSeleccionadas'] = array(5,6);
            }
            if ($model->tipo == ModulosConfigurados::TIPO_BANNER || $model->tipo == ModulosConfigurados::TIPO_IMAGENES) {
                $params['vista'] = '_contenidoImagenes';
                $params['modelImagen'] = new ImagenBanner();

                if ($_POST) {

                    if (isset($_FILES)) {
                        $modelBanner = new ImagenBanner();
                        $modelBanner->attributes = $_POST['ImagenBanner'];
                        $uploadedFile = CUploadedFile::getInstance($modelBanner, "rutaImagen");
                        $error = false;
                        if ($uploadedFile->getExtensionName() == "jpg" || $uploadedFile->getExtensionName() == "png" ||
                                $uploadedFile->getExtensionName() == "jpeg" || $uploadedFile->getExtensionName() == "gif") {

                            if ($uploadedFile->saveAs(Yii::app()->params->callcenter['modulosConfigurados']['urlImagenes'] . $modelBanner->nombre . date("Ymdhis") . "." . $uploadedFile->getExtensionName())) {
                                $modelBanner->rutaImagen = "/" . Yii::app()->params->callcenter['modulosConfigurados']['urlImagenes'] . $modelBanner->nombre . date("Ymdhis") . "." . $uploadedFile->getExtensionName();
                                $modelBanner->idModulo = $idModulo;
                            } else {
                                Yii::app()->user->setFlash('alert alert-danger', 'Error al subir la imagen');
                                $error = true;
                            }
                        } else {
                            Yii::app()->user->setFlash('alert alert-danger', 'Imagen no valida');
                            $error = true;
                        }

                        // imagen móvil
                        if (!$error) {
                            $uploadedFile2 = CUploadedFile::getInstance($modelBanner, "rutaImagenMovil");

                            if ($uploadedFile2) {
                                if ($uploadedFile2->getExtensionName() == "jpg" || $uploadedFile2->getExtensionName() == "png" ||
                                        $uploadedFile2->getExtensionName() == "jpeg" || $uploadedFile2->getExtensionName() == "gif") {
                                    if ($uploadedFile2->saveAs(Yii::app()->params->callcenter['modulosConfigurados']['urlImagenes'] . $modelBanner->nombre . " movil_" . date("Ymdhis") . "." . $uploadedFile2->getExtensionName())) {
                                        $modelBanner->rutaImagenMovil = "/" . Yii::app()->params->callcenter['modulosConfigurados']['urlImagenes'] . $modelBanner->nombre . " movil_" . date("Ymdhis") . "." . $uploadedFile2->getExtensionName();
                                    } else {
                                        Yii::app()->user->setFlash('alert alert-danger', 'Error al subir la imagen movil');
                                        $error = true;
                                    }
                                } else {
                                    Yii::app()->user->setFlash('alert alert-danger', 'Imagen movil no valida');
                                    $error = true;
                                }
                            }
                        }
                        if (!$error) {
                            if ($modelBanner->save()) {
                                Yii::app()->user->setFlash('alert alert-success', "Las imagenes han sido guardadas con éxito");
                            } else {
                                Yii::app()->user->setFlash('alert alert-danger', "Error al guardar las imagenes");
                            }
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
            if ($model->tipo == ModulosConfigurados::TIPO_HTML) {
                $params['vista'] = 'contenidoHtml';


                if (isset($_POST['ModulosConfigurados'])) {
                    $model = ModulosConfigurados::model()->findByPk($_POST['ModulosConfigurados']['idModulo']);
                    $model->scenario = 'contenido';

                    $model->attributes = $_POST['ModulosConfigurados'];
                    //CVarDumper::dump($_POST,10,true);
                    $model->contenidoMovil = $_POST['ModulosConfigurados']['contenidoMovil'];
                    //Yii::app()->end();
                    if ($model->save()) {
                        Yii::app()->user->setFlash('alert alert-success', "El contenido ha sido agregado con exito, al modulo " . $model->idModulo);
                        //$this->redirect($this->createUrl('index'));
                    }
                }

                $model->scenario = 'contenido';
            }
            if ($model->tipo == ModulosConfigurados::TIPO_PROMOCION_FLOTANTE) {
                $params['vista'] = 'contenidoHtml';

                if ($_POST) {
                    $model->contenido = $_POST['ModulosConfigurados']['contenido'];

                    if ($model->save()) {
                        Yii::app()->user->setFlash('alert alert-success', "Contenido guardado con éxito");
                    } else {
                        Yii::app()->user->setFlash('alert alert-danger', "Error al guardar el contenido");
                    }
                }

                $model->scenario = 'contenido';
            }
            if ($model->tipo == ModulosConfigurados::TIPO_HTML_PRODUCTOS) {
                $params['vista'] = 'contenidoHtml';
                $params['listaProductos'] = true;
                $params['arrayMarcas'] = $this->obtenerMarcas();
                $model->scenario = 'contenido';
            }
            if ($model->tipo == ModulosConfigurados::TIPO_ENLACE_MENU) {
                $params['vista'] = '_enlaceMenu';
                $model->scenario = 'contenido';

                $params['modelMenu'] = new MenuModulo();



                if ($_POST) {


                    if (isset($_FILES)) {
                        $modelMenu = MenuModulo::model()->find("idModulo =:idmodulo", array('idmodulo' => $idModulo));
                        if ($modelMenu == null) {
                            $modelMenu = new MenuModulo();
                        }
                        $modelMenu->attributes = $_POST['MenuModulo'];
                        $uploadedFile = CUploadedFile::getInstance($modelMenu, "rutaImagen");

                        if ($uploadedFile->getExtensionName() == "jpg" || $uploadedFile->getExtensionName() == "png" ||
                                $uploadedFile->getExtensionName() == "jpeg" || $uploadedFile->getExtensionName() == "gif") {

                            if ($uploadedFile->saveAs(substr(Yii::app()->params->carpetaImagen['menuDesktop'] . $uploadedFile->getName(), 1))) {
                                $modelMenu->rutaImagen = $uploadedFile->getName();
                                $modelMenu->idModulo = $idModulo;
                                if ($modelMenu->save()) {
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

                $modelMenu = MenuModulo::model()->find("idModulo =:idmodulo", array('idmodulo' => $idModulo));

                if ($modelMenu != null) {
                    $params['modelMenu'] = $modelMenu;
                }
            }
            if ($model->tipo == ModulosConfigurados::TIPO_GRUPO_MODULOS) {
                $params['vista'] = '_grupoModulos';
                $params['modelModulos'] = new ModulosConfigurados('searchModulos');
                $params['modelModulos']->unsetAttributes();
                Yii::app()->getClientScript()->registerCssFile(Yii::app()->request->baseUrl . "/css/main-desktop.css");
                if (isset($_GET['ModulosConfigurados']))
                    $params['modelModulos']->attributes = $_GET['ModulosConfigurados'];


                $params['idModulo'] = $idModulo;

                $params['modulosAdicionados'] = GruposModulos::model()->findAll(array(
                    'with' => 'objModulo',
                    'condition' => 't.idGrupoModulo =:idgrupomodulo',
                    'params' => array(
                        'idgrupomodulo' => $idModulo
                    )
                ));
            }
        } else {
            $params['vista'] = 'modulos';
            $params['opcion'] = 'editar';

            if (isset($_POST['ModulosConfigurados'])) {
                $modelModulo = ModulosConfigurados::model()->find(array(
                    'condition' => 'idModulo =:idmodulo',
                    'params' => array(
                        'idmodulo' => $idModulo
                    )
                ));

                $modelModulo->attributes = $_POST['ModulosConfigurados'];
                $modelModulo->dias = implode(",", $modelModulo->dias);

                if ($modelModulo->save()) {
                    Yii::app()->user->setFlash('alert alert-success', "El módulo ha sido guardado con éxito");
                    $model = $modelModulo;
                } else {
                    Yii::app()->user->setFlash('alert alert-success', "Error al guardar el módulo");
                }
            }
            $model->dias = explode(",", $model->dias);

            if (isset($_POST['ModulosConfigurados'])) {
                $modelModulo = ModulosConfigurados::model()->find(array(
                    'condition' => 'idModulo =:idmodulo',
                    'params' => array(
                        'idmodulo' => $idModulo
                    )
                ));

                $modelModulo->attributes = $_POST['ModulosConfigurados'];
                $modelModulo->dias = implode(",", $modelModulo->dias);

                if ($modelModulo->save()) {
                    Yii::app()->user->setFlash('alert alert-success', "El módulo ha sido guardado con éxito");
                    $this->redirect($this->createUrl('contenido/editar', array('idModulo' => $modelModulo->idModulo, 'opcion' => 'sector')));
                    Yii::app()->end();
                } else {
                    Yii::app()->user->setFlash('alert alert-success', "Error al guardar el módulo");
                }
            }
        }

        $params['model'] = $model;

        $this->render('editar', array(
            'params' => $params
        ));
    }

    public function actionConfigurarModuloGrupo() {

        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }
        $idModulo = Yii::app()->getRequest()->getPost('idModulo');
        $idGrupoModulo = Yii::app()->getRequest()->getPost('idModuloGrupo');
        $accion = Yii::app()->getRequest()->getPost('accion');

        if ($accion == 1) {
            $model = new GruposModulos();
            $model->idGrupoModulo = $idGrupoModulo;
            $model->idModulo = $idModulo;
            $model->orden = 0;
            if (!$model->save()) {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'error al guardar el módulo'
                ));
                Yii::app()->end();
            }
        } else if ($accion == 2) {
            $orden = Yii::app()->getRequest()->getPost('orden');
            $model = GruposModulos::model()->find(array(
                'condition' => 'idGrupoModulo =:idgrupomodulo AND idModulo =:idmodulo',
                'params' => array(
                    'idgrupomodulo' => $idGrupoModulo,
                    'idmodulo' => $idModulo
                )
            ));
            $model->orden = $orden;
            if (!$model->save()) {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'error al actualizar el módulo'
                ));
                Yii::app()->end();
            }
        } else {
            $model = GruposModulos::model()->find(array(
                'condition' => 'idGrupoModulo =:idgrupomodulo AND idModulo =:idmodulo',
                'params' => array(
                    'idgrupomodulo' => $idGrupoModulo,
                    'idmodulo' => $idModulo
                )
            ));

            if (!$model->delete()) {
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'error al eliminar el módulo'
                ));
                Yii::app()->end();
            }
        }


        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => $this->renderPartial('_modulosAdicionados', array(
                'modulosAdicionados' => GruposModulos::model()->findAll(array(
                    'with' => 'objModulo',
                    'condition' => 't.idGrupoModulo =:idgrupomodulo',
                    'params' => array(
                        'idgrupomodulo' => $idGrupoModulo
                    )
                ))
                    ), true, false
            )
        ));
    }

    public function actionTestModulo() {
        $idGrupoModulo = 12;
        $criteria = new CDbCriteria();
        $criteria->with = array('objModuloGrupo');
        $criteria->condition = 't.tipo  NOT IN (:grupoModulo)';
        $criteria->params = array(
            ':grupoModulo' => ModulosConfigurados::TIPO_GRUPO_MODULOS,
            ':idgrupoModulo' => $idGrupoModulo
        );
        $criteria->order = "t.idModulo DESC";

        $modulos = ModulosConfigurados::model()->findAll($criteria);

        echo "<pre>";
        print_r($modulos);
        echo "</pre>";
    }

    public function actionEliminarImagen() {
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
        if ($model != null) {
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
                        ), true, false)
            ));
        }
    }

    public function actionEditarImagen($idBanner) {


        $model = ImagenBanner::model()->findByPk($idBanner);

        echo CJSON::encode(
                array(
                    'result' => 'ok',
                    'response' => $this->renderPartial('_editarContenidoImagen', array(
                        'modelImagen' => $model
                            ), true, false)
        ));

        Yii::app()->end();
    }

    public function actionGuardarEditarImagen() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idBanner = Yii::app()->getRequest()->getPost('idBanner');
        $imagenBanner = ImagenBanner::model()->findByPk($idBanner);

        if ($imagenBanner) {
            $imagenBanner->attributes = $_POST['ImagenBanner'];
            if (!$imagenBanner->validate()) {
                echo CActiveForm::validate($imagenBanner);
                Yii::app()->end();
            } else {

                if ($imagenBanner->tipoContenido == ImagenBanner::CONTENIDO_NONE) {
                    $imagenBanner->contenido = NULL;
                    $imagenBanner->contenidoMovil = NULL;
                }

                if ($imagenBanner->save()) {
                    $listaImagenes = ImagenBanner::model()->findAll(array(
                        'condition' => 'idModulo =:idmodulo',
                        'params' => array(
                            'idmodulo' => $imagenBanner->idModulo
                        )
                    ));
                    echo CJSON::encode(array(
                        'result' => 'ok',
                        'response' => 'Contenido de la imagen actualizada con éxito',
                        'responseHtml' => $this->renderPartial('_listaImagenes', array(
                            'listaImagenes' => $listaImagenes
                                ), true, false)
                    ));
                } else {
                    echo CJSON::encode(array(
                        'result' => 'error',
                        'response' => 'Error al actualizar el contenido'
                    ));
                }
            }
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Imagen no encontrada'
            ));
        }
    }

    public function actionComprobarciudad($codigoCiudad) {

        $sectores = Ciudad::model()->find(array(
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
        
        $listSectorCiudad = SectorCiudad::model()->findAll(array(
                    'with' => array('objSector', 'objCiudad'),
                    'condition' => 't.codigoSector<>0 AND t.codigoCiudad=:ciudad AND t.estadoCiudadSector=:estado AND objSector.estadoSector=:estado AND objCiudad.estadoCiudad=:estado',
                    'params' => array(
                        ':ciudad' => $codigoCiudad,
                        ':estado' => 1
                    )
                ));
        

//        if (count($sectores) > 0 && count($sectores->listSubSectores) > 0) {
//            echo CJSON::encode(array(
//                'result' => 'ok',
//                'code' => 1,
//                'htmlResponse' => $this->renderPartial('_sectorlista', array(
//                    'sectores' => $sectores
//                        ), true, false)));
//        } else {
//            echo CJSON::encode(array(
//                'result' => 'ok',
//                'code' => 2,
//            ));
//        }
        
        
         if (count($listSectorCiudad) > 0) {
            echo CJSON::encode(array(
                'result' => 'ok',
                'code' => 1,
                'htmlResponse' => $this->renderPartial('_sectorlista', array(
                    'sectores' => $listSectorCiudad
                        ), true, false)));
        } else {
            echo CJSON::encode(array(
                'result' => 'ok',
                'code' => 2,
            ));
        }
    }

    public function actionGuardarCiudadSector() {
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

        if ($moduloSector == null) {

            if (empty($codigoCiudad)) {
                $codigoCiudad = Yii::app()->params->ciudad['*'];
                $codigoSector = Yii::app()->params->sector['*'];
            }

            $moduloSector = new ModuloSectorCiudad();

            if (empty($codigoCiudad)) {
                $codigoCiudad = Yii::app()->params->ciudad['*'];
            }
            $moduloSector->codigoCiudad = $codigoCiudad;
            $moduloSector->codigoSector = $codigoSector;
            $moduloSector->idModulo = $idModulo;

            if ($moduloSector->save()) {
                $sectores = ModuloSectorCiudad::model()->findAll(array(
                    'with' => array('objCiudad', 'objSector'),
                    'condition' => 'idModulo =:idmodulo',
                    'params' => array(
                        'idmodulo' => $idModulo
                    ),
                    'order' => 'objCiudad.nombreCiudad,objSector.nombreSector'
                ));

                $html = $this->renderPartial('_listaSectoresCiudades', array(
                    'sectores' => $sectores
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

        $idModuloSector = Yii::app()->getRequest()->getPost('idModuloSectorCiudad');
        $moduloSector = ModuloSectorCiudad::model()->find(array(
            'condition' => 'idModuloSectorCiudad =:idmodulosector',
            'params' => array(
                'idmodulosector' => $idModuloSector
            )
        ));

        if ($moduloSector != null) {
            $idModulo = $moduloSector->idModulo;
            $moduloSector->delete();
            $sectores = ModuloSectorCiudad::model()->findAll(array(
                'with' => array('objCiudad', 'objSector'),
                'condition' => 'idModulo =:idmodulo',
                'params' => array(
                    'idmodulo' => $idModulo
            )));

            $html = $this->renderPartial('_listaSectoresCiudades', array(
                'sectores' => $sectores
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

    public function actionEliminarUbicacion() {
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

        $idModulo = $ubicacion->idModulo;
        if ($ubicacion != null) {
            $ubicacionCategoria = UbicacionCategoria::model()->find(array(
                'condition' => 'idUbicacion =:idubicacion',
                'params' => array(
                    'idubicacion' => $idUbicacion
                )
            ));

            if ($ubicacionCategoria != null) {
                $ubicacionCategoria->delete();
            }

            $ubicacion->delete();

            $ubicaciones = UbicacionModulos::model()->findAll(array(
                'with' => array('objUbicacionCategorias' => array('with' => 'objCategoriaTienda')),
                'condition' => 't.idModulo =:idmodulo',
                'params' => array(
                    'idmodulo' => $idModulo
                )
            ));

            $html = $this->renderPartial('_listaUbicaciones', array(
                'ubicaciones' => $ubicaciones
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

    public function actionFormUbicacionCategoria($ubicacion = null) {

        if ($ubicacion == UbicacionModulos::UBICACION_ESCRITORIO_DIVISION || $ubicacion == UbicacionModulos::UBICACION_ESCRITORIO_CATEGORIA) {
            $model = new UbicacionCategoria();
            $arraycategorias = array();
            $categorias = CategoriaTienda::model()->findAll(array(
                'order' => 't.orden',
                'condition' => 't.tipoDispositivo=:dispositivo AND t.visible=:visible AND t.idCategoriaPadre IS NULL ',
                'params' => array(
                    ':visible' => 1,
                    ':dispositivo' => CategoriaTienda::DISPOSITIVO_ESCRITORIO
                ),
                'with' => array('listCategoriasHijas'),
            ));

            if ($ubicacion == UbicacionModulos::UBICACION_ESCRITORIO_DIVISION) {
                foreach ($categorias as $categoria) {
                    foreach ($categoria->listCategoriasHijas as $division) {
                        $arraycategorias[] = array(
                            'idCategoria' => $division->idCategoriaTienda,
                            'nombreCategoria' => $division->nombreCategoriaTienda,
                        );
                    }
                }
            } else {
                foreach ($categorias as $categoria) {
                    foreach ($categoria->listCategoriasHijas as $division) {
                        foreach ($division->listCategoriasHijasMenu as $categoriaHija) {
                            $arraycategorias[] = array(
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
                        ), true, false)));
        } else {
            echo CJSON::encode(array(
                'result' => 'none'
            ));
        }
    }

    public function actionFormContenidoImagen($tipoContenido) {
        if ($tipoContenido == ImagenBanner::CONTENIDO_HTML || $tipoContenido == ImagenBanner::CONTENIDO_LINK) {
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => 1
            ));
        } else {
            echo CJSON::encode(array(
                'result' => 'ok',
                'response' => 2
            ));
        }
    }

    public function botonesDeshabilitados($model) {
        if (count($model->listModulosSectoresCiudades) == 0 || $model->listUbicacionesModulos == 0) {
            return true;
        }

        if ($model->tipo == 1 || $model->tipo == 3 && count($model->listImagenesBanners) > 0) {
            return false;
        }
        if ($model->tipo == 2 && count($model->listProductosModulos) > 0) {
            return false;
        }
        if ($model->tipo == 7 || $model->contenido != "" && count($model->listProductosModulos) > 0) {
            return false;
        }

        if ($model->tipo == 6 || $model->contenido != "") {
            return false;
        }

        return true;
    }

    public function actionTipomoduloeditar($idModulo) {
        $objModulo = ModulosConfigurados::model()->findByPk($idModulo);
        if ($objModulo->tipo == 1) {
            $this->crearBanner($objModulo);
            Yii::app()->end();
        }
        if ($objModulo->tipo == 2) {
            $this->crearListaProductos($objModulo);
            Yii::app()->end();
        }

        if ($objModulo->tipo == 6) {
            $this->crearContenidoHtml($objModulo);
            Yii::app()->end();
        }

        if ($objModulo->tipo == 7) {
            $this->crearContenidoHtmlProductos($objModulo);
            Yii::app()->end();
        }
    }

    public function actioncrearListaProductos() {
        //print_r($modulo);

        $model = ProductosModulos::model()->findAll("idModulo=:idModulo", array(":idModulo" => 2));
        //$model = $objModulo;

        $query = "SELECT m.nombreMarca, m.idMarca ";
        $query .= "FROM m_Producto AS p ";
        $query .= "LEFT OUTER JOIN m_Marca AS m ON (m.idMarca = p.idMarca) ";
        $query .= "GROUP BY p.idMarca; ";
        $query .= "LIMIT 100 ";
        $marcas = Yii::app()->db->createCommand($query)->queryAll();
        $arrayMarcas = array_column_lrv($marcas, 'nombreMarca', 'idMarca');
        //$formFiltro->setRango($resultadoRango['minproducto'], $resultadoRango['maxproducto'], $resultadoRango['mintercero'], $resultadoRango['maxtercero']);

        CVarDumper::dump($arrayMarcas, 10, true);
        exit();



        $this->render('contenidoCrearListaProductos', array(
            //'objProductosModulo' => $objProductosModulo,
            'model' => $model
        ));
    }

    public function actionObtenerlistacategorias() {
        //print_r($modulo);
        //$model = ProductosModulos::model()->findAll("idModulo=:idModulo", array(":idModulo" => $objModulo));
        //$model = $objModulo;

        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idMarcas = Yii::app()->getRequest()->getPost('idMarcas');
        $idModulo = Yii::app()->getRequest()->getPost('idModulo');

        if ($idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $model = ModulosConfigurados::model()->findByPk($idModulo);

        $query = "SELECT c.nombreCategoria, c.idCategoriaBI, p.codigoProducto, p.idMarca ";
        $query .= "FROM m_Producto AS p ";
        $query .= "LEFT JOIN m_Categoria AS c ON (p.idCategoriaBI = c.idCategoriaBI) ";

        if (isset($idMarcas) && $idMarcas != "") {
            $query .= "WHERE p.idMarca IN (" . $idMarcas . ")";
        }

        $query .= "GROUP BY p.idCategoriaBI; ";
        $categorias = Yii::app()->db->createCommand($query)->queryAll();
        $arrayCategorias = array_column_lrv($categorias, 'nombreCategoria', 'idCategoriaBI');
        //$formFiltro->setRango($resultadoRango['minproducto'], $resultadoRango['maxproducto'], $resultadoRango['mintercero'], $resultadoRango['maxtercero']);
        //CVarDumper::dump($arrayCategorias, 10, true);
        //exit();

        echo CJSON::encode(array('result' => 'ok',
            'response' => array(
                'htmlCategorias' => $this->renderPartial('_listaCategorias', array('model' => $model, 'arrayCategorias' => $arrayCategorias), true, false),
        )));
        Yii::app()->end();
    }

    public function actionBuscarproductos() {
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
        $sesion = Yii::app()->getSession()->getSessionId();
        $codigosArray = GSASearch($busqueda,$sesion);
        $codigosStr = implode(",", $codigosArray);

        if (!empty($codigosArray)) {
            $listProductos = Producto::model()->findAll(array(
                'with' => array('listImagenes', 'objCodigoEspecial', 'listCalificaciones', 'objCategoriaBI',),
                'join' => ' JOIN t_relevancia_temp rel ON rel.codigoProducto = t.codigoProducto',
                'condition' => "t.activo=:activo AND rel.idSesion =:sesion",
                'params' => array(
                    ':activo' => 1,
                    ':sesion' => $sesion,
                ),
                'order' => 'rel.relevancia DESC, t.orden'
            ));
            
        }

        $model = ProductosModulos::model()->findAll('idModulo=:idModulo', array(':idModulo' => $idModulo));

        $productosAgregados = array();

        foreach ($model as $indice => $fila) {
            $productosAgregados[] = $fila->codigoProducto;
        }

        $this->renderPartial('buscarProductos', array(
            'listProductos' => $listProductos,
            'nombreBusqueda' => $busqueda,
            'idModulo' => $idModulo,
            'productosAgregados' => $productosAgregados
        ));
    }

    public function actionAgregarproductomodulo() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $producto = Yii::app()->getRequest()->getPost('producto');
        $idModulo = Yii::app()->getRequest()->getPost('idModulo');

        //echo $producto;
        //Yii::app()->end();

        if ($producto === null || $idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $model = new ProductosModulos;

        $model->codigoProducto = $producto;
        $model->idModulo = $idModulo;

        if ($model->save()) {
            $model = ModulosConfigurados::model()->findByPk($idModulo);

            echo CJSON::encode(array('result' => 'ok',
                'response' => array(
                    'htmlProductosAgregados' => $this->renderPartial('_listaModuloProductos', array('model' => $model), true, false),
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

    public function actionEliminarproductomodulo() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idProductoModulo = Yii::app()->getRequest()->getPost('idProductoModulo');

        //echo $producto;
        //Yii::app()->end();

        if ($idProductoModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $model = ProductosModulos::model()->findByPk($idProductoModulo);
        $idModulo = $model->idModulo;


        if ($model->delete()) {
            $model = ModulosConfigurados::model()->findByPk($idModulo);

            echo CJSON::encode(array('result' => 'ok',
                'response' => array(
                    'htmlProductosAgregados' => $this->renderPartial('_listaModuloProductos', array('model' => $model), true, false),
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

    public function actionEliminartodosProductos() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idModulo = Yii::app()->getRequest()->getPost('idModulo');


        if ($idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }



        if (ProductosModulos::model()->deleteAll("idModulo =:idmodulo", array(
                    'idmodulo' => $idModulo
                ))) {
            $model = ModulosConfigurados::model()->findByPk($idModulo);

            echo CJSON::encode(array('result' => 'ok',
                'response' => array(
                    'htmlProductosAgregados' => $this->renderPartial('_listaModuloProductos', array('model' => $model), true, false),
                    'mensaje' => "Se eliminaron los productos"
            )));
            Yii::app()->end();
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Error al eliminar los productos, por favor intente de nuevo',
            ));
            Yii::app()->end();
        }
    }

    public function actionCrearcontenidohtml() {
        //$model = new ModulosConfigurados;


        if (isset($_POST['ModulosConfigurados'])) {
            $model = ModulosConfigurados::model()->findByPk($_POST['ModulosConfigurados']['idModulo']);
            $model->scenario = 'contenido';
            $model->attributes = $_POST['ModulosConfigurados'];
            //CVarDumper::dump($model->attributes,10,true);
            //Yii::app()->end();
            if ($model->save()) {
                Yii::app()->user->setFlash('alert alert-success', "El contenido ha sido agregado con exito, al modulo " . $model->idModulo);
                $this->redirect($this->createUrl('index'));
            }
        }

        $params = array();
        $params['model'] = $model;
        $params['vista'] = 'contenidoHtml';
        $params['opcion'] = 'contenido';



        $this->render('editar', array(
            'params' => $params
        ));
    }

    public function actionCargarplanoproductos() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idModulo = Yii::app()->getRequest()->getPost('idModulo');

        if ($idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }


        if (isset($_FILES)) {

            $archivo = CUploadedFile::getInstanceByName("contenido-cargar-producto");

            //print_r($_REQUEST);
            //Yii::app()->end();
            if ($archivo->getExtensionName() == "txt") {
                $tempLoc = $archivo->getTempName();

                $transaction = Yii::app()->db->beginTransaction();
                try {
                    $archivoALeer = fopen(addslashes($tempLoc), "r");

                    while (!feof($archivoALeer)) {
                        $linea = fgets($archivoALeer);
                        if ($linea != "") {
                            $modelExiste = ProductosModulos::model()->findAll('idModulo=:idModulo AND codigoProducto=:codigoProducto', array(
                                ':idModulo' => $idModulo,
                                ':codigoProducto' => $linea
                                    )
                            );

                            if (empty($modelExiste)) {
                                $modelProductoModulo = new ProductosModulos;
                                $modelProductoModulo->idModulo = $idModulo;
                                $modelProductoModulo->codigoProducto = $linea;

                                if (!$modelProductoModulo->save()) {
                                    throw new Exception('Error al cargar los productos');
                                }
                            }
                            //print_r($modelProductoModulo->validate());
                        }
                    }

                    $transaction->commit();

                    //Yii::app()->user->setFlash('alert alert-success', "Se han cargado los productos".$model->idModulo);

                    fclose($archivoALeer);

                    $model = ModulosConfigurados::model()->findByPk($idModulo);
                    echo CJSON::encode(array(
                        'result' => 'ok',
                        'response' => array(
                            'htmlProductosAgregados' => $this->renderPartial('_listaModuloProductos', array('model' => $model), true, false),
                            'mensaje' => "Se cargaron los productos"
                    )));
                    Yii::app()->end();
                } catch (Exception $exc) {
                    $transaction->rollBack();
                    echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
                    Yii::app()->end();
                }
            } else {
                //Yii::app()->user->setFlash('alert alert-danger','El archivo debe tener extensi&oacute;n .txt');
                echo CJSON::encode(array(
                    'result' => 'error',
                    'response' => 'El formato del archivo debe ser .txt',
                ));
                Yii::app()->end();
            }
        } else {
            //Yii::app()->user->setFlash('alert alert-danger','El archivo no puede ser nulo');
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'Error al cargar los productos, por favor intente de nuevo',
            ));
            Yii::app()->end();
        }
    }

    public function actionAgregarmarcascategorias() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idModulo = Yii::app()->getRequest()->getPost('idModulo');
        $idMarcas = Yii::app()->getRequest()->getPost('idMarcas');
        $idCategorias = Yii::app()->getRequest()->getPost('idCategorias');


        if ($idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $transaction = Yii::app()->db->beginTransaction();
        try {
            $query = "DELETE 
                      FROM t_ProductosModulos
                      WHERE idModulo = :idModulo AND codigoProducto IS NULL";

            $command = Yii::app()->db->createCommand($query);
            $command->bindParam(":idModulo", $idModulo, PDO::PARAM_STR);
            $command->execute();

            if ($idMarcas != "") {
                $arrayIdMarcas = explode(",", $idMarcas);
                foreach ($arrayIdMarcas as $indice => $fila) {
                    $modelProductoModulo = new ProductosModulos;
                    $modelProductoModulo->idModulo = $idModulo;
                    $modelProductoModulo->idMarca = $fila;

                    if (!$modelProductoModulo->save()) {
                        throw new Exception('Error al agregar la marca: ' . $modelProductoModulo->getErrors());
                    }
                }
            }

            if ($idCategorias != "") {
                $arrayIdCategorias = explode(",", $idCategorias);
                foreach ($arrayIdCategorias as $indice => $fila) {
                    $modelProductoModulo = new ProductosModulos;
                    $modelProductoModulo->idModulo = $idModulo;
                    $modelProductoModulo->idCategoriaBI = $fila;

                    if (!$modelProductoModulo->save()) {
                        throw new Exception('Error al agregar la categoria: ' . $modelProductoModulo->getErrors());
                    }
                }
            }

            $transaction->commit();

            Yii::app()->user->setFlash('alert alert-success', "El contenido ha sido agregado con exito, al modulo " . $idModulo);

            echo CJSON::encode(array(
                'result' => 'ok'
            ));
        } catch (Exception $exc) {
            //Yii::log($exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            //try {
            $transaction->rollBack();
            //} catch (Exception $txexc) {
            //    Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            //}

            echo CJSON::encode(array('result' => 'error', 'response' => $exc->getMessage()));
            Yii::app()->end();
        }
    }

    public function crearBanner($objModulo) {
        $this->render('contenidoBanner', array(
            'objModulo' => $objModulo
        ));
    }

    public function actionContenidohtmlproductos() {
        //print_r($_POST);

        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idModulo = Yii::app()->getRequest()->getPost('idModulo');
        $htmlModulo = Yii::app()->getRequest()->getPost('htmlModulo');

        if ($idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $model = ModulosConfigurados::model()->findByPk($idModulo);
        $model->scenario = "contenido";
        $model->contenido = $htmlModulo;

        if (!$model->save()) {
            //print_r($model->getErrors());
            echo CJSON::encode(array('result' => 'error', 'response' => implode(",", $model->getErrors()['contenido'])));
            Yii::app()->end();
            //throw new CHttpException(404, 'Error al agregar el contenido html ' . implode(",", $model->getErrors()['contenido']));
        }

        $this->actionAgregarmarcascategorias();
    }

    public function obtenerMarcas() {
        $query = "SELECT m.nombreMarca, m.idMarca ";
        $query .= "FROM m_Producto AS p ";
        $query .= "LEFT OUTER JOIN m_Marca AS m ON (m.idMarca = p.idMarca) ";
        $query .= "GROUP BY p.idMarca; ";
        $marcas = Yii::app()->db->createCommand($query)->queryAll();
        $arrayMarcas = array_column_lrv($marcas, 'nombreMarca', 'idMarca');
        return $arrayMarcas;
    }

    public function actionActivardesactivarmodulo() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idModulo = Yii::app()->getRequest()->getPost('idModulo');

        if ($idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $model = ModulosConfigurados::model()->findByPk($idModulo);

        if ($model->estado == 0) {
            $model->estado = 1;
        } else {
            $model->estado = 0;
        }

        if (!$model->save()) {
            echo CJSON::encode(array('result' => 'error', 'response' => "No se pudo realizar la solicitud, por favor intentelo nuevamente"));
            Yii::app()->end();
        }

        echo CJSON::encode(array('result' => 'ok', 'response' => "La operaci&oacute;n se realizo con &eacute;xito"));
        Yii::app()->end();
    }

    public function actionVisualizarModulo($idModulo) {
        $objModulo = ModulosConfigurados::getModulo($idModulo);

        if ($objModulo != null) {
            if ($objModulo->tipo == ModulosConfigurados::TIPO_GRUPO_MODULOS) {
                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => $this->renderPartial('_visualizarModulo', array(
                        'contenido' => $this->renderPartial('//contenido/d_modulos', array(
                            'listModulos' => $objModulo->listModulosGrupo
                                ), true, false)), true, false)
                ));
            } else {
                echo CJSON::encode(array(
                    'result' => 'ok',
                    'response' => $this->renderPartial('_visualizarModulo', array(
                        'contenido' => $this->renderPartial('//contenido/d_modulo', array(
                            'objModulo' => $objModulo
                                ), true, false)), true, false)
                ));
            }
        } else {
            echo CJSON::encode(array(
                'result' => 'error',
                'response' => 'El módulo no existe'
            ));
        }
    }

    public function actionEliminarmodulo() {
        if (!Yii::app()->request->isPostRequest) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $idModulo = Yii::app()->getRequest()->getPost('idModulo');

        if ($idModulo === null) {
            throw new CHttpException(404, 'Solicitud inválida.');
        }

        $imagenes = ImagenBanner::model()->deleteAll("idModulo=:idmodulo", array('idmodulo' => $idModulo));
        $perfil = ModuloPerfil::model()->deleteAll("idModulo=:idmodulo", array('idmodulo' => $idModulo));
        $modulosector = ModuloSectorCiudad::model()->deleteAll("idModulo=:idmodulo", array('idmodulo' => $idModulo));
        $ubicacion = UbicacionModulos::model()->deleteAll("idModulo=:idmodulo", array('idmodulo' => $idModulo));
        $gruposModulo = GruposModulos::model()->deleteAll("idModulo=:idmodulo OR idGrupoModulo=:idmodulo", array('idmodulo' => $idModulo));
        $productos = ProductosModulos::model()->deleteAll("idModulo=:idmodulo", array('idmodulo' => $idModulo));
        $menu = MenuModulo::model()->deleteAll("idModulo=:idmodulo", array('idmodulo' => $idModulo));
        $model = ModulosConfigurados::model()->deleteByPk($idModulo);


        echo CJSON::encode(array('result' => 'ok', 'response' => "La operaci&oacute;n se realizo con &eacute;xito"));
        Yii::app()->end();
    }

}
