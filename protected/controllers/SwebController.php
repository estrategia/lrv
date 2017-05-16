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
                             AND t.activa = 1 
                             AND objUsuario.identificacionUsuario = 93451033",
            'params' => array(
                'diaRecordar' => Date("d")
            )
        ));

        foreach ($listasPersonales as $listaPersonal) {
            $claveEncriptada = encrypt("$listaPersonal->identificacionUsuario~$listaPersonal->idLista~$listaPersonal->fechaCreacion", Yii::app()->params->claveLista);
            $contenidoCorreo = $this->renderPartial(Yii::app()->params->rutasPlantillasCorreo['correoRecordacion'], array(
                'listasPersonal' => $listaPersonal,
                'clave' => $claveEncriptada
                    ), true, false);

            $htmlCorreo = PlantillaCorreo::getContenido('recordarLista',$contenidoCorreo);
            
            $asuntoCorreo = " LA REBAJA VIRTUAL - Recordar lista ";
            try {
                sendHtmlEmail($listaPersonal->objUsuario->correoElectronico, $asuntoCorreo, $htmlCorreo);
            } catch (Exception $ce) {
                Yii::log("Error enviando correo al recordar lista \n" . $ce->getMessage() . "\n" . $ce->getTraceAsString(), CLogger::LEVEL_INFO, 'application');
            }
        }

        return 1;
    }

    /**
     * @param string condicion
     * @return int valor entero
     * @soap
     */
    public function eliminarBeneficios($condicion) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "modificarBeneficiosLog.txt", "a");
        try {
             $sql = "SET SQL_SAFE_UPDATES = 0;
                    SET FOREIGN_KEY_CHECKS = 0;
                    DELETE  t,PBR,pv from  t_Beneficios AS t
                    INNER JOIN
                    t_BeneficiosProductos AS PBR ON t.IdBeneficio = PBR.IdBeneficio LEFT JOIN 
                    t_BeneficiosPuntosVenta as pv ON (pv.IdBeneficio = t.IdBeneficio)
                WHERE $condicion AND t.Tipo IN (21,22,23,24,25,26)";
             fwrite($file, Date("Y-m-d h:i:s ")." Se ejecuto la consulta: ".$sql."" . PHP_EOL);
           $result =  Yii::app()->db->createCommand($sql)->execute();
           fwrite($file, Date("Y-m-d h:i:s ")." Filas afectadas ".$result."" . PHP_EOL);
            
            return 1;
        } catch (Exception $e) {
            Yii::log($e->getMessage());
            return 0;
        }
    }

    /**
     * @param string $parametros, 
     * @param string $condicion
     * @return int valor entero
     * @soap
     */
    public function actualizarBeneficios($parametros, $condicion) {
    	$file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "modificarBeneficiosLog.txt", "a");
    	
        try {
            $sql = "SET SQL_SAFE_UPDATES = 0;
                        SET FOREIGN_KEY_CHECKS = 0;
                        UPDATE t_Beneficios AS t
                        INNER JOIN t_BeneficiosProductos AS PBR ON t.IdBeneficio = PBR.IdBeneficio
                        SET " . $parametros . " 
                        WHERE $condicion AND t.Tipo IN (21,22,23,24,25,26)";
            
            fwrite($file, Date("Y-m-d h:i:s ")." Se ejecuto la consulta: ".$sql."" . PHP_EOL);
            $rows = Yii::app()->db->createCommand($sql)->execute();
            fwrite($file, Date("Y-m-d h:i:s ")." Filas afectadas ".$rows."" . PHP_EOL);
            
            return 1;
        } catch (Exception $e) {
            Yii::log($e->getMessage());
            return 0;
        }
    }

    /**
     * @param string $puntoVentaOrigen,
     * @param string $puntoVentaDestino
     * @return int valor entero
     * @soap
     */
    public function copiarBeneficios($puntoVentaOrigen, $puntoVentaDestino) {

        try {

            $Transaccion = Yii::app()->db->beginTransaction();
            // Borrar lo anterior que exista en ese punto de venta
         
            $sql = "SELECT t.idBeneficio FROM t_Beneficios t 
            		INNER JOIN t_BeneficiosPuntosVenta as listPuntosVenta ON (t.IdBeneficio = listPuntosVenta.IdBeneficio)
            		WHERE listPuntosVenta.IDComercial ='$puntoVentaOrigen' AND t.fechaIni >='".Date("Y-m-d")."'";
            $beneficios = Yii::app()->db->createCommand($sql)->queryAll();
            
            if ($beneficios) {
                $sql = "DELETE FROM  t_BeneficiosPuntosVenta WHERE IDComercial = '$puntoVentaDestino'";
                Yii::app()->db->createCommand($sql)->query();

                // Insertar lo nuevo a partir de ese punto de venta.

                $arrayInsert = array();
                $registros = 0;
                foreach ($beneficios as $ben) {
                    $arrayInsert[] = "(".$ben['idBeneficio'].", '$puntoVentaDestino')";
                    $registros++;
                }

                if ($arrayInsert) {
                    $sql = "INSERT INTO t_BeneficiosPuntosVenta (IdBeneficio, IDComercial) VALUES " . implode(",", $arrayInsert);
                    Yii::app()->db->createCommand($sql)->query();
                    $Transaccion->commit();
                }
                
                echo $sql;
            }
            return 1;
        } catch (Exception $e) {
            Yii::log($e->getMessage());
            return 0;
        }
    }

    public function actionVerificarCorreo() {
        $this->recordarCorreos();
    }

}
