<?php 

class SuscripcionesCommand extends CConsoleCommand {
    
    public function actionEnviarRecordatorios()
    {
        Yii::import('application.models.SuscripcionesProductosUsuario');
        Yii::import('application.models.Usuario');
        Yii::import('application.models.Producto');
        Yii::import('application.models.PlantillaCorreo');

        $suscripciones = SuscripcionesProductosUsuario::consultarSuscripcionesRecordar();
        CVarDumper::dump($suscripciones);
        $vista = Yii::getPathOfAlias('application.views.common.correoRecordacionSuscripciones') . '.php';
        $contenidoCorreo = $this->renderFile($vista, array(
            'suscripciones' => array_values($suscripciones)[0],
        ), true, true);
            
        $htmlCorreo = PlantillaCorreo::getContenidoConsola('bonoPorVencer', $contenidoCorreo);
        sendHtmlEmail('sebastian.velasquez@eiso.com.co', "Productos de suscripción", $htmlCorreo, Yii::app()->params->callcenter['correo']);
    }

}

?>