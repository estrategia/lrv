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
class AccessControlFilter extends CFilter {
    //public $controller = null;
    //public $loginUrl = null;

    protected function preFilter($filterChain) {
        if (!Yii::app()->user->isGuest) {
            if (Yii::app()->user->userType != UserIdentity::USER_ASSOCIATED && Yii::app()->user->userType != UserIdentity::USER_ADMIN) {
                Yii::app()->user->logout();
                //Yii::app()->session[Yii::app()->params['usronline']] = null;
            }
        }
        
        /*$usuario = Yii::app()->session[Yii::app()->params['usronline']];
        
        if (Yii::app()->user->isGuest || $usuario === null) {
            $this->controller->redirect($this->loginUrl);
        }else
            $filterChain->run();*/

        $filterChain->run();
    }

    protected function postFilter($filterChain) {
        
    }

}

?>
