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
            Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio");
        }else if(!$sesionUbicacion){
            Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
        }else{
            $filterChain->run();
        }
    }
}
