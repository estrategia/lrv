<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class CorreosCommand extends CConsoleCommand {

    //put your code here
    public function actionRecordarCorreos() {
        ini_set('default_socket_timeout', 5);
        $client = new SoapClient(Yii::app()->params->webServiceUrl['envioCorreosRecordatorios'], array(
            "trace" => 1,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'exceptions' => 0,
            'connection_timeout' => 5)
        );

        try {
            $result = $client->recordarCorreos();
            echo $result;
        } catch (SoapFault $exc) {
            Yii::log("SoapFault WebService recordarCorreos\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n" . $client->__getLastResponse(), CLogger::LEVEL_INFO, 'application');
        } catch (Exception $exc) {
            Yii::log("Exception WebService recordarCorreos\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
        }
    }

}
