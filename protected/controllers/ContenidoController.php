<?php

class ContenidoController extends Controller {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            array(
                'application.filters.SessionControlFilter + ver',
                'isMobile' => $this->isMobile,
                'redirect' => false
            ),
        );
    }

    public function actionCorporativo($tipo) {
        if ($tipo == "horario") {
            $this->verHorario();
        } else if ($tipo == "polidescuento") {
            $this->verPolidescuento();
        } else if ($tipo == "pqrs") {
            $this->verPqrs();
        } else if ($tipo == "soat") {
            $this->verSoat();
        } else if ($tipo == "politerminos") {
            $this->verPoliterminos();
        } else {
            throw new CHttpException(404, 'Contenido no existe.');
        }
    }

    public function actionCampana($tipo) {
        $this->render($tipo);
    }

    private function verHorario() {
        $objHorarioCiudadSector = null;

        if ($this->objSectorCiudad != null) {
            $objHorarioCiudadSector = HorariosCiudadSector::model()->find(array(
                'with' => 'objCiudad',
                'condition' => 't.codigoCiudad=:ciudad AND t.codigoSector=:sector AND t.estadoCiudadSector=:estado',
                'params' => array(
                    ':estado' => 1,
                    ':ciudad' => $this->objSectorCiudad->codigoCiudad,
                    ':sector' => $this->objSectorCiudad->codigoSector
                )
            ));
        }

        $this->render('corporativoHorario', array(
            'objHorarioCiudadSector' => $objHorarioCiudadSector
        ));
    }

    private function verPolidescuento() {
        $this->render('corporativoDescuento');
    }

    private function verPqrs() {
        $this->render('corporativoPqrs');
    }

    private function verSoat() {
        $this->render('corporativoSoat');
    }

    private function verPoliterminos() {
        $this->render('corporativoTerminos');
    }

    public function actionVer($tipo, $contenido) {
        if ($tipo == "imagen") {
            $this->verContenidoImagen($contenido);
        } else if ($tipo == "modulo") {
            $this->verContenidoModulo($contenido);
        } else if ($tipo == "grupo") {
            $this->verContenidoGrupo($contenido);
        } else {
            throw new CHttpException(404, 'Solicitud inv&aacute;lida.');
        }
    }

    private function verContenidoImagen($idimagen) {
        $imagenBanner = ImagenBanner::model()->find(array(
            'condition' => "idBanner =:idimagen  AND contenido IS NOT NULL",
            'params' => array('idimagen' => $idimagen)
        ));

        if ($imagenBanner == null || $imagenBanner->tipoContenido != 2) {
            throw new CHttpException(404, 'Contenido no disponible.');
        }

        $contenidoHTML = "";

        if ($this->isMobile) {
            $contenidoHTML = trim($imagenBanner->contenidoMovil);
        } else {
            $contenidoHTML = trim($imagenBanner->contenido);
        }

        if (empty($contenidoHTML)) {
            throw new CHttpException(404, 'Contenido no disponible.');
        }

        $this->render('html', array(
            'contenido' => $contenidoHTML
        ));
        Yii::app()->end();
    }

    private function verContenidoModulo($idModulo) {
        $objModulo = ModulosConfigurados::model()->find(array(
            'condition' => 'idModulo=:modulo AND contenido IS NOT NULL',
            'params' => array(
                ':modulo' => $idModulo
            )
        ));

        if ($objModulo == null) {
            throw new CHttpException(404, 'Contenido no disponible.');
        }

        $contenidoHTML = "";

        if ($this->isMobile) {
            $contenidoHTML = trim($objModulo->contenidoMovil);
        } else {
            $contenidoHTML = trim($objModulo->contenido);
        }

        if (empty($contenidoHTML)) {
            throw new CHttpException(404, 'Contenido no disponible.');
        }

        $this->render('html', array(
            'contenido' => $contenidoHTML
        ));
        Yii::app()->end();
    }

    private function verContenidoGrupo($idGrupo) {
        $listModulos = ModulosConfigurados::getModulosGrupo($idGrupo);

        if (empty($listModulos)) {
            throw new CHttpException(404, 'Contenido no disponible.');
        }

        $this->render($this->isMobile ? 'modulos' : 'd_modulos', array(
            'listModulos' => $listModulos
        ));
        Yii::app()->end();
    }

}
