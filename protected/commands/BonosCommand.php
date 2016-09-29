<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BonosCommand extends CConsoleCommand {

    //put your code here
    //php /Users/eiso/htdocs/lrv/protected/cron.php bloqueoCuenta desbloquearCuenta
    public function actionEnviarBonosCreados() {
        Yii::import('application.models.BonosTienda');
        Yii::import('application.models.BonoTienda');
        Yii::import('application.models.Usuario');
       
        $bonos = BonosTienda::model()->findAll(array(
            'condition' => 'notificado =:notificado AND estado =:estado',
            'params' => array(
                    ':notificado' => 0,
                    ':estado' => 1,
                )
            ));
        $vistaDesbloqueo = Yii::getPathOfAlias('application.modules.callcenter.views.bonos.bonoCorreo').'.php';
        $vistaCorreo = Yii::getPathOfAlias('application.views.common.correo').'.php';


        foreach($bonos as $bono){
            $htmlCorreo = "";
            $contenidoCorreo = $this->renderFile($vistaDesbloqueo, array(
                   'objBono' => $bono,
                   ), true, true);
            
            $htmlCorreo = $this->renderFile($vistaCorreo, array('contenido' => $contenidoCorreo), true); 
            sendHtmlEmail($bono->correoElectronico, "La Rebaja Virtual: Tienes un bono disponible", $htmlCorreo, Yii::app()->params->callcenter['correo']);
            $bono->notificado = 1;
            $bono->save();
        }
        
    }
    
    public function actionEnviarBonosPorVencer() {
    	Yii::import('application.models.BonosTienda');
    	Yii::import('application.models.BonoTienda');
    	Yii::import('application.models.Usuario');
    	 
    	$bonos = BonosTienda::model()->findAll(array(
    			'condition' => 'DATE_SUB(vigenciaFin , INTERVAL :dia1 DAY) <= CURDATE() AND CURDATE() <=  DATE_SUB(vigenciaFin, INTERVAL :dia2 DAY)
    							AND estado =:estado',
    			'params' => array(
    					':estado' => 1,
    					':dia1' => Yii::app()->params->bono['diaMaximoRecordacion'],
    					':dia2' => Yii::app()->params->bono['diaMinimoRecordacion'],
    			)
    	));
    	
    	$vistaDesbloqueo = Yii::getPathOfAlias('application.modules.callcenter.views.bonos.bonoPorVencerCorreo').'.php';
    	$vistaCorreo = Yii::getPathOfAlias('application.views.common.correo').'.php';
    
    
    	foreach($bonos as $bono){
    		$htmlCorreo = "";
    		$contenidoCorreo = $this->renderFile($vistaDesbloqueo, array(
    				'objBono' => $bono,
    		), true, true);
    
    		$htmlCorreo = $this->renderFile($vistaCorreo, array('contenido' => $contenidoCorreo), true);
    		sendHtmlEmail($bono->correoElectronico, "La Rebaja Virtual: Tienes un bono disponible", $htmlCorreo, Yii::app()->params->callcenter['correo']);
    		$bono->notificado = 1;
    		$bono->save();
    	}
    }
    
    public function actionMigracionBonos(){
    	Yii::import('application.models.FormasPago');
        Yii::import('application.models.BonoTienda');
    	
    	$formasPago = FormasPago::model()->findAll(array(
    			'condition' => 'valorBono> 0'
    	));

        $bonoTienda = BonoTienda::model()->findByPk(4); // modify
    	
    	foreach($formasPago as $forma){
    		$bonoFormaPago = new FormasPago();
    		$bonoFormaPago->idFormaPago = 8;  // modify
    		$bonoFormaPago->idCompra = $forma->idCompra;
    		$bonoFormaPago->valor = $forma->valorBono;
    		$bonoFormaPago->cuenta = $bonoTienda->cuenta;
    		$bonoFormaPago->formaPago = $bonoTienda->formaPago;
    		$bonoFormaPago->idBonoTiendaTipo = $bonoTienda->idBonoTiendaTipo;
    		
    		if(!$bonoFormaPago->save()){
    			Yii::log("NO SE PUDO GUARDAR EL BONO COMO FORMA DE PAGO EN LA COMPRA $forma->idCompra");
    		}else{
    			$forma->valorBono = 0;
    			if(!$forma->save()){
    				Yii::log("NO SE PUDO ACTUALIZAR LA FORMA DE PAGO EN LA COMPRA $forma->idCompra");
    			}
    		}
    	}
    }
    
}
