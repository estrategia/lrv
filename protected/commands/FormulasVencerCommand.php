<?php


class FormulasVencerCommand extends CConsoleCommand {
	
	
	public function actionEnviarCorreoFormulas(){
		Yii::import('application.models.Producto');
		Yii::import('application.modules.callcenter.modules.vitalCall.models.ProductosFormulaVitalCall');
		Yii::import('application.modules.callcenter.modules.vitalCall.models.FormulasVitalCall');
		Yii::import('application.modules.callcenter.modules.vitalCall.models.ProductosVitalCall');
		Yii::import('application.modules.callcenter.modules.vitalCall.models.UsuarioVitalCall');
		Yii::import('application.models.Imagen');
		$productosFormulasMedicas = ProductosFormulaVitalCall::obtenerFormulasVencer();
		
		$formulaEnvio = array();
		foreach($productosFormulasMedicas as $formulaProducto){
			$formulaEnvio[$formulaProducto->idFormula]['objFormula'] = $formulaProducto->objFormulaVC;
			$formulaEnvio[$formulaProducto->idFormula]['objUsuario'] = $formulaProducto->objFormulaVC->objUsuarioVC;
			$formulaEnvio[$formulaProducto->idFormula]['listProductos'][$formulaProducto->idProductoVitalCall]['objProducto'] = $formulaProducto->objProductoVC->objProducto;
			$formulaEnvio[$formulaProducto->idFormula]['listProductos'][$formulaProducto->idProductoVitalCall]['objProductoVC'] = $formulaProducto->objProductoVC;
			$formulaEnvio[$formulaProducto->idFormula]['listProductos'][$formulaProducto->idProductoVitalCall]['objFormulaProducto'] = $formulaProducto;
		}
		
		foreach($formulaEnvio as $formula){
			$vistaDesbloqueo = Yii::getPathOfAlias('application.views.common.correoFormulaVencer').'.php';
			$vistaCorreo = Yii::getPathOfAlias('application.views.common.correo').'.php';
		//	print_r($formula);exit();
			if(file_exists($vistaCorreo) && file_exists($vistaDesbloqueo)){
				$contenidoCorreo = $this->renderFile($vistaDesbloqueo, array('objFormula' => $formula), true);
				$htmlCorreo = $this->renderFile($vistaCorreo, array('contenido' => $contenidoCorreo), true);
			
				try {
					sendHtmlEmail($formula['objUsuario']->correoElectronico, "La Rebaja Virtual: Desbloqueo de cuenta", $htmlCorreo, Yii::app()->params->callcenter['correo']);
				} catch (Exception $exc) {
					Yii::log("BloqueoCuentaCommand::desbloquearCuenta - Error envio correo [".$exc->getMessage()."] usuario [$objBloqueoUsuario->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
				}
			}else{
				Yii::log("BloqueoCuentaCommand::desbloquearCuenta - Error envio correo [vista no existe] usuario [$objBloqueoUsuario->identificacionUsuario]" . "\nBloqueoUsuario:\n" .  CVarDumper::dumpAsString($objBloqueoUsuario->attributes),CLogger::LEVEL_INFO, 'bloqueo_usuario');
			}
		}
		
	}
}