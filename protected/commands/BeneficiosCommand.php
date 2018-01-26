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
    public function actionSincronizarbeneficios() { // recibe el parametro de id de sincronizacion
        //       Yii::import('application.modules.beneficios.models.sincrolrv.*');
        Yii::import('application.models.Beneficios');
        Yii::import('application.models.BeneficioTipo');
        Yii::import('application.models.BeneficiosProductos');
        Yii::import('application.models.BeneficiosPuntosVenta');
        Yii::app()->db->createCommand("SET FOREIGN_KEY_CHECKS=0")->execute();
        
        $file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "sincronizacionLog.txt", "a");
        $client = new SoapClient(Yii::app()->params->webServiceUrl['sincronizarBeneficiosSIICOP'], array(
            "trace" => 1,
            'cache_wsdl' => WSDL_CACHE_NONE,
            'exceptions' => 0
        ));
        $pendientesSincronizar = true;
        fwrite($file, Date("Y-m-d h:i:s")." - Inicio de ejecucion de el proceso" . PHP_EOL);
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
          
            if($i == 0){
            	$idSincronizacion = 64250 ;
            }
            $h2 = round(microtime(true) * 1000);
            fwrite($file, Date("Y-m-d h:i:s")."- "."Buscando el maximo idSincronizado ".($h2 - $h1)." milisegundos" . PHP_EOL);
                    // llamar a web service enviandole el id de sincronizacion

            $h1 = round(microtime(true) * 1000);

            try {
                $result = $client->setBeneficios($idSincronizacion);
            } catch (Exception $e) {
                $h2 = round(microtime(true) * 1000);
                Yii::app()->exit();
            }

            $h2 = round(microtime(true) * 1000);
            fwrite($file, Date("Y-m-d h:i:s")."- "."Llamando al webservice del siicop ".($h2 - $h1)." milisegundos" . PHP_EOL);

            
            if ($result['Result'] == 0) {
                Yii::log("Beneficios no han sido sincronizados correctamente\nDescripcion: " . $result['Response'] . date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
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
                	$h1 = round(microtime(true) * 1000);
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

                    if (!$objBeneficioTipo->save()) {
                        throw new Exception("Error al guardar mBeneficioTipo {id: " . $beneficioTipo['IdBeneficioTipo'] . ", tipo: " . $beneficioTipo['Tipo'] . " error: " . CActiveForm::validate($objBeneficioTipo) . "}");
                    }

                    $h2 = round(microtime(true) * 1000);
					fwrite($file, Date("Y-m-d h:i:s")."- "."Guardando tipo tiempo -  ".($h2 - $h1)." milisegundos" . PHP_EOL);
                    
                }
                $datosPdv = array();
                $beneficiosProductos = array();
                $beneficiosCedulas = array();
                $inicio = round(microtime(true) * 1000);
                fwrite($file, Date("Y-m-d h:i:s")." - "."Iniciando a guardar  ".count($arrBeneficios)." registros" . PHP_EOL);
                foreach ($arrBeneficios as $beneficio) {
                	$h1 = round(microtime(true) * 1000);
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
                    $objBeneficio->mensaje = $beneficio['Mensaje'];
                    $objBeneficio->idConvenio = $beneficio['idConvenio'];
                    $objBeneficio->codigoPerfil = $beneficio['codigoPerfil'];
                    $objBeneficio->fechaCreacionBeneficio = $beneficio['FechaCreacionBeneficio'];
                    
                    if (!$objBeneficio->save()) {
                        throw new Exception("Error al guardar tBeneficios {id: " . $beneficio['IdBeneficio'] . ", tipo: " . $beneficio['Tipo'] . " error: " . CActiveForm::validate($objBeneficio) . "}");
                    }

                    $h2 = round(microtime(true) * 1000);
                    fwrite($file, Date("Y-m-d h:i:s")."- "."Guardando el beneficio No. $objBeneficio->idBeneficioSincronizado -   ".($h2 - $h1)." milisegundos" . PHP_EOL);

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
						
                    }

                  /*  foreach ($beneficio['listBeneficiosPuntoVenta'] as $benefPdv) {
                        $datosPdv[] = "($objBeneficio->idBeneficio,'" . $benefPdv['IDComercial'] . "')";
                    }*/
                    
                    if ($beneficio['listCedulas']) {
                    	foreach ($beneficio['listCedulas'] as $benCed) {
                          	$beneficiosCedulas[] = "($objBeneficio->idBeneficio,".$benCed['NumeroDocumento'].")";
                        }
                    }
                }
             /*   if (count($datosPdv) > 0) {
                	$h1 = round(microtime(true) * 1000);
                    $sql = "INSERT INTO t_BeneficiosPuntosVenta(idBeneficio,idComercial) VALUES " . implode(",", $datosPdv);
                    Yii::app()->db->createCommand($sql)->execute();
                    $h2 = round(microtime(true)*1000);
                    fwrite($file, Date("Y-m-d h:i:s")."- "."Insertando puntos de venta -   ".($h2 - $h1)." milisegundos" . PHP_EOL);
                }*/

                if (count($beneficiosProductos) > 0) {
                	$h1 = round(microtime(true) * 1000);
                    $sql = "INSERT INTO t_BeneficiosProductos
                                    (idBeneficio,
                                    codigoProducto,
                                    mensaje,
                                    unid,
                                    obsequio,
                                    tipo)
                                    VALUES " . implode(",", $beneficiosProductos);
                    Yii::app()->db->createCommand($sql)->execute();
                    $h2 = round(microtime(true)*1000);
                    fwrite($file, Date("Y-m-d h:i:s")."- "."Insertando beneficios productos -   ".($h2 - $h1)." milisegundos" . PHP_EOL);
                    
                }

                if (count($beneficiosCedulas) > 0) {
                	$h1 = round(microtime(true) * 1000);
                    $sql = "INSERT INTO t_BeneficiosCedulas
                                    (idBeneficio,
                                    numeroDocumento)
                                    VALUES " . implode(",", $beneficiosCedulas);
                    Yii::app()->db->createCommand($sql)->execute();
                     $h2 = round(microtime(true)*1000);
                    fwrite($file, Date("Y-m-d h:i:s")."- "."Insertando cedulas -   ".($h2 - $h1)." milisegundos" . PHP_EOL);
                     
                }
                $fin = round(microtime(true) * 1000);
                fwrite($file, Date("Y-m-d h:i:s")." - "."Finalizo guardar beneficios en base de datos Tiempo:   ".($fin - $inicio)." milisegundos" . PHP_EOL);
            }
            $transaction->commit();
            $end = round(microtime(true) * 1000);
            fwrite($file, Date("Y-m-d h:i:s")." - Finalizo  ejecucion de el Lote:  $i " . ". " . ($end - $start) . " milisegundos" . PHP_EOL);
            $i++;
          } while ($pendientesSincronizar);
    //    } while ($pendientesSincronizar);
        fwrite($file, Date("Y-m-d h:i:s")." - Finalizo la ejecucion" . PHP_EOL);
        fclose($file);
        Yii::log("Beneficios sincronizados correctamente\n" . date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
    }

    public function actionEliminarBeneficiosAntiguos(){
        
        $numeroDias = Yii::app()->params->beneficios['diasBorrado']; 
        
        $file = fopen(Yii::getPathOfAlias('application') . DIRECTORY_SEPARATOR . "runtime" . DIRECTORY_SEPARATOR . "borradoLog.txt", "a");
        // Eliminar beneficios que ya no estan vigentes a partir de X dias.
        // borrar los puntos de venta
        $sql = "DELETE bpv FROM t_Beneficios t 
                INNER JOIN t_BeneficiosPuntosVenta bpv ON (bpv.idBeneficio = t.idBeneficio) WHERE 
                DATE_SUB(CURDATE() , INTERVAL $numeroDias DAY) >= t.fechaFin ";
        $result = Yii::app()->db->createCommand($sql)->execute();
        
        fwrite($file, Date("Y-m-d h:i:s ")." t_BeneficiosPuntosVenta No. Eliminados ".$result."" . PHP_EOL);
        
        // borrar las cedulas registradas
        
        $sql = "DELETE bpv FROM t_Beneficios t
        INNER JOIN t_BeneficiosCedulas bpv ON (bpv.idBeneficio = t.idBeneficio) WHERE
        DATE_SUB(CURDATE() , INTERVAL $numeroDias DAY) >= t.fechaFin";
        $result = Yii::app()->db->createCommand($sql)->execute();
        
        fwrite($file, Date("Y-m-d h:i:s ")." t_BeneficiosCedulas No. Eliminados ".$result."" . PHP_EOL);
        // borrar los productos
         
        $sql = "DELETE bpv FROM t_Beneficios t
        INNER JOIN t_BeneficiosProductos bpv ON (bpv.idBeneficio = t.idBeneficio) WHERE
        DATE_SUB(CURDATE() , INTERVAL $numeroDias DAY) >= t.fechaFin";
        $result = Yii::app()->db->createCommand($sql)->execute();
        
        fwrite($file, Date("Y-m-d h:i:s ")." t_BeneficiosProductos No. Eliminados ".$result."" . PHP_EOL);
        // borrar los beneficios de la maestra
        
        $sql = "DELETE FROM t_Beneficios WHERE
        DATE_SUB(CURDATE() , INTERVAL $numeroDias DAY) >= fechaFin";
        $result = Yii::app()->db->createCommand($sql)->execute();
        fwrite($file, Date("Y-m-d h:i:s ")." t_Beneficios No. Eliminados ".$result."" . PHP_EOL);
        fclose($file);
    }
}