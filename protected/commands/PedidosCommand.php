<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PedidosCommand extends CConsoleCommand{
    
    //php /Users/eiso/htdocs/lrv/protected/cron.php pedidos cambiarEstadoPedidosSubasta
    public function actionCambiarEstadoPedidosSubasta(){
        date_default_timezone_set ('America/Bogota');
        Yii::import('application.models.*');
        $file = fopen(Yii::getPathOfAlias('application').DIRECTORY_SEPARATOR."runtime".DIRECTORY_SEPARATOR."pedidos_".date("Y-m-d H-i-s").".txt", "w");
        $compras = Compras::model()->findAll(
                array(
                    'with' => 'objFormaPagoCompra',
                    'condition' => "DATE_SUB(now() , INTERVAL '10:0' MINUTE_SECOND) > fechaCompra AND t.idEstadoCompra =:estadocompra",
                    'params' => array(
                        ':estadocompra' => Yii::app()->params->callcenter['estadoCompra']['estado']['subasta'] // subasta
                    )
                ));
        foreach($compras as $compra){
            
            $compra->idEstadoCompra = Yii::app()->params->callcenter['estadoCompra']['estado']['pendiente'];
            if($compra->save()){
                Yii::log(Date("Y-m-d h:i:s")."- Sale #$compra->idCompra updated success.");
                fwrite($file,Date("Y-m-d h:i:s")."- Sale #$compra->idCompra updated success.".PHP_EOL);
            }else{
                Yii::log(Date("Y-m-d h:i:s")."- Sale #$compra->idCompra didn't update.");
                fwrite($file,Date("Y-m-d h:i:s")."- Sale #$compra->idCompra didn't update.".PHP_EOL);
            }
        }
        fclose($file);
    }
    
}