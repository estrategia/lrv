<?php

class ComprasItemsController extends ControllerTercero
{
    public function actionActualizarEstado()
    {
        $request = Yii::app()->request;
        $response = [];
        $id = $request->getPost('idCompraItem');
        $estado = $request->getPost('idEstado');
        $producto = ComprasItems::model()->find(
            't.idCompraItem = :idCompraItem',
            [':idCompraItem' => $id]
        );
        // echo CJSON::encode($id);exit();
        $producto->idEstadoItemTercero = $estado;
        if ($producto->save()) {
            $response = ['result' => 'ok', 'response' => $producto];
        } else {
            $response = ['result' => 'error', 'response' => $producto->errors];
        }
        echo CJSON::encode($response);
        exit();
    }

    public function actionActualizarNumeroGuia()
    {
        $request = Yii::app()->request;
        $response = [];
        $id = $request->getPost('idCompraItem');
        $numeroGuia = $request->getPost('numeroGuia');
        $compraItem = ComprasItems::model()->find(
            't.idCompraItem = :id',
            [':id' => $id]
        );
        $compraItem->numeroGuia = $numeroGuia;
        if ($compraItem->save()) {
            $response = ['result' => 'ok', 'response' => $compraItem];
        } else {
            $response = ['result' => 'error', 'response' => $compraItem->errors];
        }
        echo CJSON::encode($response);
        exit();
    }

    public function actionActualizarOperadorLogistico()
    {
        $request = Yii::app()->request;
        $response = [];
        $id = $request->getPost('idCompraItem');
        $operadorLogistico = $request->getPost('operadorLogistico');
        $compraItem = ComprasItems::model()->find(
            't.idCompraItem = :id',
            [':id' => $id]
        );
        $compraItem->operadorLogistico = $operadorLogistico;
        if ($compraItem->save()) {
            $response = ['result' => 'ok', 'response' => $compraItem];
        } else {
            $response = ['result' => 'error', 'response' => $compraItem->errors];
        }
        echo CJSON::encode($response);
        exit();
    }
}