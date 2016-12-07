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
class SessionControlFilter extends CFilter {

    public $isMobile = true;
    public $redirect = true;

    protected function preFilter($filterChain) {
        //Yii::app()->request->urlReferrer
        $sesionUbicacion = false;

        //if (!$this->isMobile) {
            Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = null;
        //}

        if (isset(Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']]) && Yii::app()->session[Yii::app()->params->sesion['sectorCiudadEntrega']] != null) {
            $sesionUbicacion = true;
        }
        
        if (!$sesionUbicacion) {
            Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = Yii::app()->request->url;
            if ($this->redirect)
                Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
        }

        /*if ($this->isMobile) {
            if (!$sesionUbicacion) {
                if ($this->redirect)
                    Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
            }
        }else {
            if (!$sesionUbicacion) {
                Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = Yii::app()->request->url;
                if ($this->redirect)
                    Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
            }
        }*/

//        if (!$sesionTipo) {
//            if ($this->isMobile) {
//                if ($this->redirect)
//                    Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio");
//            } else {
//                Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = Yii::app()->request->url;
//                if ($this->redirect)
//                    Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
//            }
//        } else if (!$sesionUbicacion) {
//            if (!$this->isMobile) {
//                Yii::app()->session[Yii::app()->params->sesion['redireccionUbicacion']] = Yii::app()->request->url;
//            }
//            if ($this->redirect)
//                Yii::app()->request->redirect(Yii::app()->baseUrl . "/sitio/ubicacion");
//        }

        $filterChain->run();
    }

}
