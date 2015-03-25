<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of AccessControlFilter
 *
 * @author Miguel Angel Sanchez Montiel
 */
class LanzamientoControlFilter extends CFilter {

    protected function preFilter($filterChain) {
        if (Yii::app()->user->isGuest) {
            Yii::app()->request->redirect(Yii::app()->baseUrl . "/tienda/sitio/lanzamiento");
        } else {
            $filterChain->run();
        }
        
        //$filterChain->run();
    }

    protected function postFilter($filterChain) {
        
    }

}

?>
