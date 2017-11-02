<?php 

class SuscripcionesCommand extends CConsoleCommand {
    
    public function actionEnviarRecordatorios()
    {
    	$client = new SoapClient(Yii::app()->params->webServiceUrl['envioCorreosRecordatorios'], array(
    			"trace" => 1,
    			'cache_wsdl' => WSDL_CACHE_NONE,
    			'exceptions' => 0,
    			'connection_timeout' => 5)
    			);
    	
    	try {
    		$result = $client->enviarSuscripciones();
    		echo $result;
    	} catch (SoapFault $exc) {
    		Yii::log("SoapFault WebService recordarCorreos\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n" . $client->__getLastResponse(), CLogger::LEVEL_INFO, 'application');
    	} catch (Exception $exc) {
    		Yii::log("Exception WebService recordarCorreos\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
    	}
    
    }

}

?>