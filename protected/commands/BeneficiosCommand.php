<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BeneficiosCommand extends CConsoleCommand {

    public function actionTestMemory() {
        $inicio = memory_get_usage();
        $a = 1000;
        $fin = memory_get_usage();
        echo $fin - $inicio;
        echo "Asignada: " . memory_get_usage(true);
        echo "\n";
        echo "Usada: " . memory_get_usage(false);
        echo "\n";
        echo "Libre: " . (memory_get_usage(true) - memory_get_usage(false));
        echo "\n";
        //  echo date("H:i:s");
        $h1 = round(microtime(true) * 1000);
        $h2 = round(microtime(true) * 1000);
        echo $h2 - $h1;
    }

    //put your code here
    public function actionSincronizarbeneficios() { // recibe el parámetro de id de sincronización
        //       Yii::import('application.modules.beneficios.models.sincrolrv.*');
        Yii::import('application.models.Beneficios');
        Yii::import('application.models.BeneficioTipo');
        Yii::import('application.models.BeneficiosProductos');
        Yii::import('application.models.BeneficiosPuntosVenta');
        Yii::app()->db->createCommand("SET FOREIGN_KEY_CHECKS=0")->execute();
        ini_set('memory_limit', '-1');
        $file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "sincronizacionlog_" . date("H-i-s") . ".txt", "w");
        $client = new SoapClient(Yii::app()->params->webServiceUrl['sincronizarBeneficiosSIICOP'], array(
            "trace" => 1,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'exceptions' => 0
        ));
        $pendientesSincronizar = true;
        $i = 0;
        do {
            $start = round(microtime(true) * 1000);
            $arrBeneficios = array();
            //Beneficios-BeneficiosProductos
            $h1 = round(microtime(true) * 1000);

            $sql = "select max(idBeneficioSincronizado) as maximo from t_Beneficios"; //
            $result = Yii::app()->db->createCommand($sql)->queryAll();
            $transaction = Yii::app()->db->beginTransaction();
            $idSincronizacion = 0;
            if ($result[0]['maximo'] != null) {
                $idSincronizacion = $result[0]['maximo'];
            }
            
            $h2 = round(microtime(true) * 1000);

            fwrite($file, $sql . ". Time execution: " . ($h2 - $h1) . " miliseconds" . PHP_EOL);
            // llamar a web service enviandole el id de sincronización

            $h1 = round(microtime(true) * 1000);

            try {
                $result = $client->setBeneficios($idSincronizacion/* $arrTiposBeneficio, $arrBeneficios */);
            } catch (Exception $e) {
                $h2 = round(microtime(true) * 1000);
                Yii::app()->exit();
            }

            $h2 = round(microtime(true) * 1000);
            fwrite($file, "Calling to webservice" . ". Time execution: " . ($h2 - $h1) . " miliseconds" . PHP_EOL);

            if ($result['Result'] == 0) {
                Yii::log("Beneficios no han sido sincronizados correctamente\nDescripción:" . $result['Response'] . date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
                Yii::app()->end();
            }

            if ($result['Result'] == 2) {
                $pendientesSincronizar = false;
            }
            if ($result['Result'] == 1) {
                $pendientesSincronizar = true;
                $arrTiposBeneficio = $result['arrTiposBeneficio'];
                $arrBeneficios = $result['arrBeneficios'];

                foreach ($arrTiposBeneficio as $beneficioTipo) {
                    $objBeneficioTipo = BeneficioTipo::model()->find(array(
                        'condition' => 'tipo=:tipo',
                        'params' => array(
                            ':tipo' => $beneficioTipo['Tipo']
                        )
                    ));

                    if ($objBeneficioTipo === null) {
                        $objBeneficioTipo = new BeneficioTipo;
                        $objBeneficioTipo->tipo = $beneficioTipo['Tipo'];
                        $objBeneficioTipo->fechaCreacion = $beneficioTipo['FechaCreacion'];
                    }

                    $objBeneficioTipo->descripcion = $beneficioTipo['Descripcion'];
                    $h1 = round(microtime(true) * 1000);

                    if (!$objBeneficioTipo->save()) {
                        throw new Exception("Error al guardar mBeneficioTipo {id: " . $beneficioTipo['IdBeneficioTipo'] . ", tipo: " . $beneficioTipo['Tipo'] . " error: " . CActiveForm::validate($objBeneficioTipo) . "}");
                    }

                    $h2 = round(microtime(true) * 1000);
                    fwrite($file, "Trying save in tipo beneficios's table" . ". Time execution: " . ($h2 - $h1) . " miliseconds" . PHP_EOL);
                }
                $datosPdv = array();
                $beneficiosProductos = array();
                $beneficiosCedulas = array();
                foreach ($arrBeneficios as $beneficio) {
                    $objBeneficio = new Beneficios;
                    $objBeneficio->idBeneficioSincronizado = $beneficio['IdBeneficio'];
                    $objBeneficio->tipo = $beneficio['Tipo'];
                    $objBeneficio->fechaIni = $beneficio['FechaIni'];
                    $objBeneficio->fechaFin = $beneficio['FechaFin'];
                    $objBeneficio->dsctoUnid = $beneficio['DsctoUnid'];
                    $objBeneficio->dsctoFrac = $beneficio['DsctoFrac'];
                    $objBeneficio->vtaUnid = $beneficio['VtaUnid'];
                    $objBeneficio->vtaFrac = $beneficio['VtaFrac'];
                    $objBeneficio->pagoUnid = $beneficio['PagoUnid'];
                    $objBeneficio->pagoFrac = $beneficio['PagoFrac'];
                    $objBeneficio->cuentaCop = $beneficio['CuentaCop'];
                    $objBeneficio->nitCop = $beneficio['NitCop'];
                    $objBeneficio->porcCop = $beneficio['PorcCop'];
                    $objBeneficio->cuentaProv = $beneficio['CuentaProv'];
                    $objBeneficio->nitProv = $beneficio['NitProv'];
                    $objBeneficio->porcProv = $beneficio['PorcProv'];
                    $objBeneficio->promoFiel = $beneficio['PromoFiel'];
                    $objBeneficio->mensaje = $beneficio['Mensaje'];
                    $objBeneficio->swobligaCli = $beneficio['SwobligaCli'];
                    $objBeneficio->fechaCreacionBeneficio = $beneficio['FechaCreacionBeneficio'];
                    $h1 = round(microtime(true) * 1000);

                    if (!$objBeneficio->save()) {
                        throw new Exception("Error al guardar tBeneficios {id: " . $beneficio['IdBeneficio'] . ", tipo: " . $beneficio['Tipo'] . " error: " . CActiveForm::validate($objBeneficio) . "}");
                    }

                    $h2 = round(microtime(true) * 1000);
                    fwrite($file, "Trying save in beneficios's table" . ". Time execution: " . ($h2 - $h1) . " miliseconds" . PHP_EOL);

                    foreach ($beneficio['listBeneficiosProductos'] as $benefProd) {
                      
                        $h1 = round(microtime(true) * 1000);

                        if ($benefProd['Mensaje'] != null) {
                            $benefProd['Mensaje'] = "'" . $benefProd['Mensaje'] . "'";
                        } else {
                            $benefProd['Mensaje'] = "NULL";
                        }

                        if ($benefProd['Unid'] == null) {
                            $benefProd['Unid'] = "NULL";
                        }

                        if ($benefProd['Obsequio'] == null) {
                            $benefProd['Obsequio'] = "NULL";
                        }

                        $beneficiosProductos[] = "($objBeneficio->idBeneficio," .
                                $benefProd['Refe'] . "," .
                                $benefProd['Mensaje'] . "," .
                                $benefProd['Unid'] . "," .
                                $benefProd['Obsequio'] . "," .
                                $benefProd['tipo'] . ")";

                        $h2 = round(microtime(true) * 1000);
                        fwrite($file, "Trying save in beneficios producto's table" . ". Time execution: " . ($h2 - $h1) . " miliseconds\n");
                        //  echo "Trying save in beneficios producto's table".". Time execution: ".($h2-$h1)." miliseconds\n";
                    }
                    //  echo "lista de productos ".count($beneficio['listBeneficiosPuntoVenta']);
                    fwrite($file, "lista de productos " . count($beneficio['listBeneficiosPuntoVenta']) . PHP_EOL);
                    $h1 = round(microtime(true) * 1000);

                    foreach ($beneficio['listBeneficiosPuntoVenta'] as $benefPdv) {
                        $datosPdv[] = "($objBeneficio->idBeneficio,'" . $benefPdv['IDComercial'] . "')";
                    }

                    if ($beneficio['listCedulas'] != null) {
                    	fwrite($file, "Insertando cedulas en el beneficio $objBeneficio->idBeneficio \n");
                    	 
                        foreach ($beneficio['listCedulas'] as $benCed) {
                          	$beneficiosCedulas[] = "($objBeneficio->idBeneficio,".$benCed['NumeroDocumento'].")";
                        }
                    }

                    $h2 = round(microtime(true) * 1000);
                    fwrite($file, "Trying save in beneficios punto de venta's table" . ". Time execution: " . ($h2 - $h1) . " miliseconds" . PHP_EOL);
                }
                if (count($datosPdv) > 0) {
                    $sql = "INSERT INTO t_BeneficiosPuntosVenta(idBeneficio,idComercial) VALUES " . implode(",", $datosPdv);
                    Yii::app()->db->createCommand($sql)->execute();
                }

                if (count($beneficiosProductos) > 0) {

                    $sql = "INSERT INTO t_BeneficiosProductos
                                    (idBeneficio,
                                    codigoProducto,
                                    mensaje,
                                    unid,
                                    obsequio,
                                    tipo)
                                    VALUES " . implode(",", $beneficiosProductos);
                    Yii::app()->db->createCommand($sql)->execute();
                }

                if (count($beneficiosCedulas) > 0) {
                    $sql = "INSERT INTO t_BeneficiosCedulas
                                    (idBeneficio,
                                    numeroDocumento)
                                    VALUES " . implode(",", $beneficiosCedulas);
                    Yii::app()->db->createCommand($sql)->execute();
                    fwrite($file, "Se guardan las cedulas en la base de datos \n");
                }
            }
            $transaction->commit();
            $end = round(microtime(true) * 1000);
            fwrite($file, "Time execution process $i " . ". " . ($end - $start) . " miliseconds" . PHP_EOL);
            echo "Time execution process $i " . ". " . ($end - $start) . " miliseconds\n";
            $i++;
        } while ($pendientesSincronizar);
        fwrite($file, "Beneficios sincronizados correctamente " . PHP_EOL);
        fclose($file);
        echo "Beneficios sincronizados correctamente";
        Yii::log("Beneficios sincronizados correctamente\n" . date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
    }

}
