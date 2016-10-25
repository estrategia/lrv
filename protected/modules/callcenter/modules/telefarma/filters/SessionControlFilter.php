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
    public $redirect = true;

    protected function preFilter($filterChain) {
        //Yii::app()->request->urlReferrer
        $sesionUbicacion = false;
        
        if (isset(Yii::app()->session[Yii::app()->params->vitalCall['sesion']['sectorCiudadEntrega']]) && Yii::app()->session[Yii::app()->params->vitalCall['sesion']['sectorCiudadEntrega']] != null ) {
            $sesionUbicacion = true;
        }
        
        if (!$sesionUbicacion) {
            if ($this->redirect)
                Yii::app()->request->redirect(Yii::app()->baseUrl . "/callcenter/vitalcall/sitio/ubicacion");
        }

        $filterChain->run();
    }

}
