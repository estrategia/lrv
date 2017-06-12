<?php

class PublicidadController extends Controller {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            array(
                'application.filters.SessionControlFilter + contenido',
                'isMobile' => $this->isMobile,
                'objSectorCiudad' => $this->objSectorCiudad,
            ),
        );
    }
    
    public function actionContenido($nombre) {
    	if (empty($nombre))
    		throw new CHttpException(404, 'Solicitud inválida. Nombre requerido');
    
    		if(!is_readable(Yii::getPathOfAlias("application.views.campania.$nombre").".php")){
    			throw new CHttpException(404, 'Campaña no existente.');
    		}
    
    	//	try{
    			$this->render("application.views.campania.$nombre");
    	//	}  catch (Exception $exc){
    	//		Yii::log($exc->getMessage(),  CLogger::LEVEL_WARNING);
    	//		throw new CHttpException(404, "Error al abrir campaña");
    	//	}
    }

}
