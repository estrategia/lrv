<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ValidateModelBehavior
 *
 * @author Miguel Angel Sanchez Montiel
 */
class ValidateModelBehavior extends CBehavior {

    public $model = null;

    public function validateErrorsResponse() {
        $response = "";

        foreach ($this->model->getErrors() as $key => $arr) {
            foreach ($arr as $key => $value) {
                $response .= $value . ", ";
            }
        }

        return substr($response, 0, -2);
    }

}

?>
