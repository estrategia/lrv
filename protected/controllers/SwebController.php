<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class SwebController extends CController {

    public function actions() {
        return array(
            'wslrv' => array(
                'class' => 'CWebServiceAction',
            ),
        );
    }

    /**
     * @return int valor entero
     * @soap
     */
    public function recordarCorreos() {

        $dia = Date("d");
        $listasPersonales = ListasPersonales::model()->findAll(array(
            'with' => array('listDetalle' =>
                array('with' =>
                    array('objProducto' =>
                        array('with' => 'listImagenes'),
                        'objCombo' =>
                        array('with' => '')
                    )
                ),
                'objUsuario',),
            'condition' => "((t.diaRecordar-t.diasAnticipacion <=:diaRecordar  AND :diaRecordar <= t.diaRecordar) OR 
                             ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d'))-t.diasAnticipacion)%t.diasRecordar) = 0 OR
                               ( date_sub(date_add( date_sub(NOW(), INTERVAL ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) DAY) ,
                                    INTERVAL (CASE WHEN ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) = 0 THEN 0 ELSE t.diasRecordar end) DAY) , INTERVAL t.diasAnticipacion DAY) <= now() AND
                                date_format(t.fechaCreacion, '%Y-%m-%d') <= date_add( date_sub(NOW(), INTERVAL ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) DAY) ,
                                    INTERVAL (CASE WHEN ((DATEDIFF(now(),date_format(t.fechaCreacion, '%Y-%m-%d')))%t.diasRecordar) = 0 THEN 0 ELSE t.diasRecordar end) DAY) )
                             )
                             AND t.estadoLista = 1 
                             AND t.recordarCorreo = 1 
                             AND t.activa = 1",
            'params' => array(
                'diaRecordar' => Date("d")
            )
        ));

        foreach ($listasPersonales as $listaPersonal) {
            $claveEncriptada = encrypt("$listaPersonal->identificacionUsuario~$listaPersonal->idLista~$listaPersonal->fechaCreacion", Yii::app()->params->claveLista);
            $contenidoCorreo = $this->renderPartial('//common/correoRecordacion', array(
                'listasPersonal' => $listaPersonal,
                'clave' => $claveEncriptada
                    ), true, false);
            $htmlCorreo = $this->renderPartial('//common/correo', array('contenido' => $contenidoCorreo), true, true);
            $asuntoCorreo = " LA REBAJA VIRTUAL - Recordar lista ";
            try {
                sendHtmlEmail($listaPersonal->objUsuario->correoElectronico, $asuntoCorreo, $htmlCorreo);
            } catch (Exception $ce) {
                Yii::log("Error enviando correo al recordar lista \n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
            }
        }

        return 1;
    }

}
