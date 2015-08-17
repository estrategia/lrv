<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SwebController
 *
 * @author Miguel Angel Sanchez Montiel
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
     * @param array $arrTiposBeneficio arreglo de tipos de beneficio entrada
     * @param array $arrBeneficios arreglo de beneficios a sincronizar
     * @return array arreglo de respuesta (Result,Response)
     * @soap
     */
    public function setBeneficios($arrTiposBeneficio, $arrBeneficios) {
        $result = array(
            'Result' => 0,
            'Response' => 'No procesado'
        );

        $transaction = Yii::app()->db->beginTransaction();
        try {
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

            $result['Result'] = 1;
            $result['Response'] = "beneficios sincronizados correctamente";
            $transaction->commit();
            Yii::log("Beneficios sincronizados correctamente\n" . date('Y-m-d H:i:s'), CLogger::LEVEL_INFO, 'application');
        } catch (Exception $exc) {
            $result['Result'] = 0;
            $result['Response'] = $exc->getMessage();
            Yii::log("\n--ERROR WS SETBENEFICIOS--\n" . $exc->getMessage() . "\n" . $exc->getTraceAsString() . "\n--ERROR WS SETBENEFICIOS--\n", CLogger::LEVEL_ERROR, 'application');
            try {
                $transaction->rollBack();
            } catch (Exception $txexc) {
                Yii::log($txexc->getMessage() . "\n" . $txexc->getTraceAsString(), CLogger::LEVEL_ERROR, 'application');
            }
        }
        
        return $result;
    }
}

?>
