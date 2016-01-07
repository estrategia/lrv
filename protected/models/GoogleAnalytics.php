<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of GoogleAnalytics
 *
 * @author miguel.sanchez
 */
class GoogleAnalytics {

    //put your code here
    public static function getScriptCompra_old(Compras $objCompra) {
        $actionField = array(
            'id' => $objCompra->idCompra,
            'affiliation' => 'Online Store',
            'revenue' => $objCompra->totalCompra,
            'tax' => $objCompra->impuestosCompra,
            'shipping' => $objCompra->domicilio + $objCompra->flete,
            'coupon' => ''
        );

        $products = array();
        foreach ($objCompra->listItems as $objItem) {
            $products[] = array(
                'name' => $objItem->descripcion,
                'id' => $objItem->idCompraItem,
                'price' => $objItem->precioTotalUnidad + $objItem->precioTotalFraccion,
                'brand' => $objItem->objProducto->objMarca != null ? $objItem->objProducto->objMarca->nombreMarca : "",
                'category' => $objItem->objProducto->objCategoriaBI != null ? $objItem->objProducto->objCategoriaBI->nombreCategoria : "",
                'variant' => $objItem->presentacion,
                'quantity' => $objItem->getTotalUnidades(),
                'coupon' => ''
            );
        }

        $script = array(
            'ecommerce' => array(
                'purchase' => array(
                    'actionField' => $actionField,
                    'products' => $products
                ),
            )
        );

        return CJSON::encode($script);
    }

    public static function getScriptCompra(Compras $objCompra, $isMobile) {
        $script = "ga('require', 'ec');";
        
        foreach ($objCompra->listItems as $objItem) {
            $product = array(
                'id' => $objItem->codigoProducto,
                'name' => $objItem->descripcion,
                'category' => $objItem->objProducto->objCategoriaBI != null ? $objItem->objProducto->objCategoriaBI->nombreCategoria : "",
                'brand' => $objItem->objProducto->objMarca != null ? $objItem->objProducto->objMarca->nombreMarca : "",
                'variant' => $objItem->presentacion,
                'price' => $objItem->precioTotalUnidad + $objItem->precioTotalFraccion,
                'quantity' => $objItem->getTotalUnidades(),
                'coupon' => ''
            );
            $script .= "ga('ec:addProduct'," . CJSON::encode($product) . ");";
        }

        $script .= "ga('ec:setAction', 'add');";

        $purchase = array(
            'id' => $objCompra->idCompra,
            'affiliation' => 'La Rebaja Virtual - ' . ($isMobile ? 'Movil' : 'Desktop'),
            'revenue' => $objCompra->totalCompra,
            'tax' => $objCompra->impuestosCompra,
            'shipping' => $objCompra->domicilio + $objCompra->flete,
            'coupon' => ''
        );

        $script .= "ga('ec:setAction', 'purchase'," . CJSON::encode($purchase) . ");";
        $script .= "ga('send', 'pageview');";
        return $script;
    }

}
