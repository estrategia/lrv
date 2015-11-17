<?php

class ContenidoController extends Controller {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            array(
                'application.filters.SessionControlFilter + categoria, buscar, relacionados, bodega, descuentos, masvendidos, masvistos',
                'isMobile' => $this->isMobile
            ),
        );
    }
    
    public function actionVer($tipo, $contenido) {
        $contenidoHTML = "";

        if ($tipo == "imagen") {
            $imagenBanner = ImagenBanner::model()->find(array(
                'condition' => "idBanner =:idimagen  AND contenido IS NOT NULL", 
                'params' => array('idimagen' => $contenido)
            ));

            if ($imagenBanner == null || $imagenBanner->tipoContenido != 2) {
                throw new CHttpException(404, 'Contenido no disponible.');
            }
            if($this->isMobile){
                $contenidoHTML = trim($imagenBanner->contenidoMovil);
            }else{
                $contenidoHTML = trim($imagenBanner->contenido);
            }
        } else if ($tipo == "modulo") {
            $objModulo = ModulosConfigurados::model()->find(array(
                'condition' => 'idModulo=:modulo AND contenido IS NOT NULL',
                'params' => array(
                    ':modulo' => $contenido
                )
            ));

            if ($objModulo == null) {
                throw new CHttpException(404, 'Contenido no disponible.');
            }
            
            if($this->isMobile){
                $contenidoHTML = trim($objModulo->contenidoMovil);
            }else{
                $contenidoHTML = trim($objModulo->contenido);
            }
        } else {
            throw new CHttpException(404, 'Solicitud inv&aacute;lida.');
        }
        
        if (empty($contenidoHTML)) {
            throw new CHttpException(404, 'Contenido no disponible.');
        }
        
        $this->render('html', array(
            'contenido' => $contenidoHTML
        ));
        Yii::app()->end();
        
    }

}
