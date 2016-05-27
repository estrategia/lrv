<?php

class CampaniaController extends Controller {

    /**
     * @return array action filters
     * */
    public function filters() {
        return array(
            array(
                'application.filters.SessionControlFilter + contenido',
                'isMobile' => $this->isMobile,
                'redirect' => false
            ),
        );
    }

    public function actionContenido() {
        $campania = "";
        
        if (!empty($_REQUEST)) {
            $llaves = array_keys($_REQUEST);
            if(isset($llaves[0]) && count($llaves)==1 && empty($_REQUEST[$llaves[0]])){
                $campania = $llaves[0];
            }
        }

        if (empty($campania))
            throw new CHttpException(404, 'Solicitud inválida.');
        
        if(!is_readable(Yii::getPathOfAlias("application.views.campania.$campania").".php")){
            throw new CHttpException(404, 'Campaña no existente.');
        }

        try{
            $this->render($campania);
        }  catch (Exception $exc){
            Yii::log($exc->getMessage(),  CLogger::LEVEL_WARNING);
            throw new CHttpException(404, "Error al abrir campaña");
        }
    }

}