<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class BeneficiosCommand extends CConsoleCommand {
    
    public function actionHola(){
        echo "hola mundo";
    }
    
    
    //put your code here
    public function actionSincronizarbeneficios() { // recibe el parámetro de id de sincronización
  //      Yii::import('application.modules.beneficios.models.sincrolrv.*');
         Yii::import('application.models.Beneficios');
         Yii::import('application.models.BeneficioTipo');
         Yii::import('application.models.BeneficiosProductos');
         Yii::import('application.models.BeneficiosPuntosVenta');
        $arrBeneficios = array();
        //Beneficios-BeneficiosProductos
        $sql="select max(idBeneficioSincronizado) as maximo from t_Beneficios" ; //
        $result = Yii::app()->db->createCommand($sql)->queryAll();
        $transaction = Yii::app()->db->beginTransaction();
        $idSincronizacion=0; 
        if($result[0]['maximo']!=null){
            $idSincronizacion=$result[0]['maximo']; 
        }
            // llamar a web service enviandole el id de sincronización
            $client = new SoapClient(Yii::app()->params->webServiceUrl['sincronizarBeneficiosSIICOP'], array(
                "trace" => 1,
                'cache_wsdl' => WSDL_CACHE_NONE
            ));
            
            $result = $client->setBeneficios($idSincronizacion/*$arrTiposBeneficio, $arrBeneficios*/);
            
           
            if($result['Result']!=1){
                 Yii::log("Beneficios no han sido sincronizados correctamente\nDescripción:".$result['Response']. date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
                 Yii::app()->end();
            }
            
            $arrTiposBeneficio=$result['arrTiposBeneficio'];
            $arrBeneficios=$result['arrBeneficios'];
            
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

                if (!$objBeneficioTipo->save()) {
                    throw new Exception("Error al guardar mBeneficioTipo {id: " . $beneficioTipo['IdBeneficioTipo'] . ", tipo: " . $beneficioTipo['Tipo'] . " error: " . CActiveForm::validate($objBeneficioTipo) . "}");
                }
            }
            
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

                if (!$objBeneficio->save()) {
                    throw new Exception("Error al guardar tBeneficios {id: " . $beneficio['IdBeneficio'] . ", tipo: " . $beneficio['Tipo'] . " error: " . CActiveForm::validate($objBeneficio) . "}");
                }

                foreach ($beneficio['listBeneficiosProductos'] as $benefProd) {
                    $objBenefProd = new BeneficiosProductos;
                    $objBenefProd->idBeneficio = $objBeneficio->idBeneficio;
                    $objBenefProd->codigoProducto = $benefProd['Refe'];
                    $objBenefProd->mensaje = $benefProd['Mensaje'];
                    $objBenefProd->unid = $benefProd['Unid'];
                    $objBenefProd->obsequio = $benefProd['Obsequio'];
                    $objBenefProd->tipo = $benefProd['tipo'];

                    if (!$objBenefProd->save()) {
                        throw new Exception("Error al xx guardar tBeneficiosProductos {idbenef: " . $objBeneficio->idBeneficio . ", id: " . $benefProd['IdBeneficio'] . ", refe: " . $benefProd['Refe'] . " error: " . CActiveForm::validate($objBenefProd) . "}");
                    }
                }

                foreach ($beneficio['listBeneficiosPuntoVenta'] as $benefPdv) {
                    $objBenefPdv = new BeneficiosPuntosVenta;
                    $objBenefPdv->idBeneficio = $objBeneficio->idBeneficio;
                    $objBenefPdv->idComercial = $benefPdv['IDComercial'];

                    if (!$objBenefPdv->save()) {
                        throw new Exception("Error al guardar tBeneficiosPuntoVenta {id: " . $benefPdv['IdBeneficio'] . ", idComercial: " . $benefPdv['IDComercial'] . " error: " . CActiveForm::validate($objBenefPdv) . "}");
                    }
                }
            }

            $transaction->commit();
            echo "Beneficios sincronizados correctamente";
            Yii::log("Beneficios sincronizados correctamente\n" . date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
            
        
   /*     $beneficios = Beneficios::model()->findAll(array(
            'with' => array('listBeneficiosProductos', 'listBeneficiosPuntoVenta'),
            'condition' => 't.SincronizacionLRV=:sincro',
            'params' => array(
                ':sincro' => 0
            )
        ));
        
        
        foreach ($beneficios as $idx => $beneficio) {
            $arrBeneficios[$idx] = $beneficio->attributes;
            $arrBeneficios[$idx]['listBeneficiosProductos'] = array();
            $arrBeneficios[$idx]['listBeneficiosPuntoVenta'] = array();
            foreach ($beneficio->listBeneficiosProductos as $beneficioProducto)
                $arrBeneficios[$idx]['listBeneficiosProductos'][] = $beneficioProducto->attributes;
            foreach ($beneficio->listBeneficiosPuntoVenta as $beneficioPdv)
                $arrBeneficios[$idx]['listBeneficiosPuntoVenta'][] = $beneficioPdv->attributes;
        }
        //BeneficioTipo-Beneficios
        $arrTiposBeneficio = BeneficioTipo::model()->getCommandBuilder()->createFindCommand(BeneficioTipo::model()->tableSchema, new CDbCriteria)->queryAll();
        $client = new SoapClient(Yii::app()->params->webServiceUrl['sincronizarBeneficiosLRV'], array(
            "trace" => 1,
            'cache_wsdl' => WSDL_CACHE_NONE
        ));
        try {
            $result = $client->setBeneficios($arrTiposBeneficio, $arrBeneficios);
            if ($result['Result'] == 1) {
                foreach ($beneficios as $beneficio) {
                    $beneficio->SincronizacionLRV = 1;
                    $beneficio->save();
                }
                Yii::log("BeneficiosCommand::sincronizarLrv: ". $result['Response'], CLogger::LEVEL_INFO, 'application');
            }else{
                Yii::log("BeneficiosCommand::sincronizarLrv: ". $result['Response'], CLogger::LEVEL_ERROR, 'application');
            }
        } catch (SoapFault $exc) {
            Yii::log("BeneficiosCommand::sincronizarLrv::SoapFault: " . $client->__getLastResponse(), CLogger::LEVEL_ERROR, 'application');
        } catch (Exception $exc) {
            Yii::log("BeneficiosCommand::sincronizarLrv::Exception: " . $exc->getMessage(), CLogger::LEVEL_ERROR, 'application');
        }*/
    }
}
