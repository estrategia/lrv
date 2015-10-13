<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SessionControlFilter
 *
 * @author miguel.sanchez
 */
class SessionControlFilter extends CFilter{
    public $isMobile=true;
    
    protected function preFilter($filterChain) {
        $sesionUbicacion = false;
        $sesionTipo = false;
        
        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] != null){
            $sesionUbicacion = true;
        }
        if (isset(Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['tipoEntrega']] != null ) {
            $sesionTipo = true;
        }
        
        if(!$sesionTipo){
            if($this->isMobile){
                Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio");
            }else{
                Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
                //$filterChain->run();
            }
        }else if(!$sesionUbicacion){
            if($this->isMobile){
                Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
            }else{
                Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
            }
        }else{
            $filterChain->run();
        }
    }
}
