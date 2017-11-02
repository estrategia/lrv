<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CarroTestController
 *
 * @author miguel.sanchez
 */
class CarroTestController extends ControllerTelefarma {


    public function actionAgregar($producto=0, $cantidadU=-1, $cantidadF=-1) {
        if ($this->objSectorCiudad == null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'No se detecta ubicación'));
            Yii::app()->end();
        }

        if ($producto === null || $cantidadU === null || $cantidadF === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Solicitud inválida, no se detectan datos'));
            Yii::app()->end();
        }

        if ($cantidadF < 1 && $cantidadU < 1) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Cantidad no válida'));
            Yii::app()->end();
        }

        $objProducto = Producto::model()->find(array(
            'with' => array(
                'listSaldos' => array('condition' => '(listSaldos.codigoCiudad=:ciudad AND listSaldos.codigoSector=:sector) OR (listSaldos.saldoUnidad IS NULL AND listSaldos.codigoCiudad IS NULL AND listSaldos.codigoSector IS NULL)'),
                'listPrecios' => array('condition' => '(listPrecios.codigoCiudad=:ciudad AND listPrecios.codigoSector=:sector) OR (listPrecios.codigoCiudad IS NULL AND listPrecios.codigoSector IS NULL)'),
                'listSaldosTerceros' => array('condition' => '(listSaldosTerceros.codigoCiudad=:ciudad AND listSaldosTerceros.codigoSector=:sector) OR (listSaldosTerceros.codigoCiudad IS NULL AND listSaldosTerceros.codigoSector IS NULL)')
            ),
            'condition' => 't.activo=:activo AND t.codigoProducto=:codigo AND ( (listSaldos.saldoUnidad IS NOT NULL AND listPrecios.codigoCiudad IS NOT NULL) OR listSaldosTerceros.codigoCiudad IS NOT NULL)',
            'params' => array(
                ':activo' => 1,
                ':codigo' => $producto,
                //':saldo' => 0,
                ':ciudad' => $this->objSectorCiudad->codigoCiudad,
                ':sector' => $this->objSectorCiudad->codigoSector,
            ),
        ));

        if ($objProducto === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        $objSaldo = $objProducto->getSaldo($this->objSectorCiudad->codigoCiudad, $this->objSectorCiudad->codigoSector);

        if ($objSaldo === null) {
            echo CJSON::encode(array('result' => 'error', 'response' => 'Producto no disponible'));
            Yii::app()->end();
        }

        if ($cantidadU > 0) {
            $cantidadCarroUnidad = 0;
            $position = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->itemAt($producto);

            if ($position !== null) {
                $cantidadCarroUnidad = $position->getQuantityUnit();
            }

            //si hay saldo, agrega a carro, sino consulta bodega
            if ($cantidadCarroUnidad + $cantidadU <= $objSaldo->saldoUnidad) {
                $objProductoCarro = new ProductoCarro($objProducto);
                Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->put($objProductoCarro, false, $cantidadU);
            } else {
            	echo CJSON::encode(array('result' => 'error', 'response' => "La cantidad solicitada no está disponible en este momento. Saldos disponibles: $objSaldo->saldoUnidad unidades"));
            	Yii::app()->end();
            }
        }

        if ($cantidadF > 0) {
            $objProductoCarro = new ProductoCarro($objProducto);
            Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->put($objProductoCarro, true, $cantidadF);
        }

        echo CJSON::encode(array(
            'result' => 'ok',
            'response' => "Agregado al carro",
        ));
        Yii::app()->end();
    }


    public function actionList() {
        echo "Descuento: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getDiscountPrice();
        echo "<br/>";
        echo "ciudad: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoCiudad();
        echo "<br/>";
        echo "sector: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoSector();
        echo "<br/>";
        echo "perfil: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCodigoPerfil();
        echo "<br/>";
        echo "cantidad productos: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCount();
        echo "<br/>";
        echo "cantidad items: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getItemsCount();
        echo "<br/>";
        echo "costo total: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getCost();
        echo "<br/>";
        echo "costo total: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getTotalCost();
        echo "<br/>";
        // echo "tiempo: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getDelivery();
        //echo "<br/>";
        echo "servicio: " . Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getShipping();
        echo "<br/>";
        echo "<br/>";

        $positions = Yii::app()->getModule('callcenter')->getModule('telefarma')->shoppingCartVitalCall->getPositions();
        foreach ($positions as $position) {
            echo "Id: " . $position->getId();
            echo "<br/>";
            echo "Precio U: " . $position->getPrice();
            echo "<br/>";
            echo "Precio F: " . $position->getPrice(true);
            echo "<br/>";
            echo "Cantidad U: " . $position->getQuantity();
            echo "<br/>";
            echo "Cantidad Stored: " . $position->getQuantityStored();
            echo "<br/>";
            echo "Cantidad F: " . $position->getQuantity(true);
            echo "<br/>";
            echo "Precio: " . $position->getSumPrice();
            echo "<br/>";
            echo "Flete: " . $position->getShipping();
            echo "<br/>";
            echo "Impuestos: " . $position->getTax();
            echo "<br/>";
            echo "Impuestos precio: " . $position->getTaxPrice();
            echo "<br/>";
            echo "Impuestos base: " . $position->getBaseTaxPrice();
            echo "<br/>";
            echo "Tiempo entrega: " . $position->getDelivery();
            echo "<br/>";
			
            echo "Beneficios: <br/>";
            print_r($position->getBeneficios());
            echo "<br/>";

            if ($position->isProduct()) {
                echo "Es producto<br/>";
            }

            echo "<br/>";
        }
    }

    public function actionForm($limpiar = false) {
        $modelPago = null;

        if (isset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']]) && Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] != null)
            $modelPago = Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']];

        CVarDumper::dump($modelPago, 10, true);
        echo "<br/><br/>RULES<br/><br/>";
        CVarDumper::dump($modelPago->rules(), 10, true);
        echo "<br/><br/>SCENARIO: " . $modelPago->getScenario();
        
        $listHoras = $modelPago->listDataHoras();
        echo "<br/><br/>HORAS<br/><br/>";
        CVarDumper::dump($listHoras, 10, true);

        if ($limpiar){
            Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']] = null;
            //unset(Yii::app()->session[Yii::app()->params->telefarma['sesion']['carroPagarForm']]);
        }
    }
    
    
}
