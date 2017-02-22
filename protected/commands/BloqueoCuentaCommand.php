<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BloqueoCuentaCommand extends CConsoleCommand {

    //put your code here
    //php /Users/eiso/htdocs/lrv/protected/cron.php bloqueoCuenta desbloquearCuenta
    public function actionDesbloquearCuenta() {
        Yii::import('application.models.BloqueosUsuarios');
        Yii::import('application.models.Usuario');
        Yii::import('application.models.BloqueoCuenta');
        Yii::import('application.models.PlantillaCorreo');
       
        $bloqueosCuentas = BloqueoCuenta::model()->findAll();
        
        foreach($bloqueosCuentas as $tipoBloqueo){
        	$fecha = new DateTime;
        	$diasBloqueo = $tipoBloqueo->diasBloqueo;
        	
        	$fecha->modify("-$diasBloqueo days");
        	
        	$listBloqueoUsuarios = BloqueosUsuarios::model()->findAll(array(
        			'with' => 'objUsuario',
        			'condition' => 'estado=:estado AND fechaRegistro<=:fecha AND objUsuario.codigoPerfil =:perfil',
        			'params' => array(
        					':estado' => BloqueosUsuarios::ESTADO_BLOQUEADO,
        					':fecha' => $fecha->format('Y-m-d H:i:s'),
        					':perfil' => $tipoBloqueo->perfil
        			)
        	));
        	
        	foreach($listBloqueoUsuarios as $objBloqueoUsuario){
        		if ($objBloqueoUsuario->objUsuario !== null) {
        			$objUsuario = $objBloqueoUsuario->objUsuario;
        			$objUsuario->activo=Usuario::ESTADO_ACTIVO;
        			$objBloqueoUsuario->estado = BloqueosUsuarios::ESTADO_DESBLOQUEADO;
        			$objBloqueoUsuario->fechaActualizacion = Date("Y-m-d h:i:s");
        			$objBloqueoUsuario->fechaDesbloqueo = $objBloqueoUsuario->fechaActualizacion ; 
        			if ($objBloqueoUsuario->save()) {
        				if ($objUsuario->save()) {
        					$vistaDesbloqueo = Yii::getPathOfAlias('application.views.common.correoDesbloqueo').'.php';
        					$vistaCorreo = Yii::getPathOfAlias('application.views.common.correo').'.php';
        	
        					if(file_exists($vistaCorreo) && file_exists($vistaDesbloqueo)){
        						
        						$contenidoCorreo = $this->renderFile($vistaDesbloqueo, array('objUsuario' => $objUsuario), true);
        						
        								$htmlCorreo = PlantillaCorreo::getContenidoConsola('desbloquearCuenta', $contenidoCorreo);
                                                        
        						try {
        							sendHtmlEmail($objUsuario->correoElectronico, "La Rebaja Virtual: Desbloqueo de cuenta", $htmlCorreo, Yii::app()->params->callcenter['correo']);
        						} catch (Exception $exc) {
        							Yii::log("BloqueoCuentaCommand::desbloquearCuenta - Error envio correo [".$exc->getMessage()."] usuario [$objBloqueoUsuario->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
        						}
        					}else{
        						Yii::log("BloqueoCuentaCommand::desbloquearCuenta - Error envio correo [vista no existe] usuario [$objBloqueoUsuario->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
        					}
        				} else {
        					Yii::log("BloqueoCuentaCommand::desbloquearCuenta - Error al activar usuario [$objBloqueoUsuario->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
        				}
        			} else {
        				Yii::log("BloqueoCuentaCommand::desbloquearCuenta - Error al actualizar bloqueo [$objBloqueoUsuario->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
        			}
        		}else{
        			Yii::log("BloqueoCuentaCommand::desbloquearCuenta - Usuario no existe [$objBloqueoUsuario->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
        		}
        	}
        }
    }
}
