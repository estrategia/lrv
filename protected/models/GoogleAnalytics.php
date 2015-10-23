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
    public static function getScriptCompra(Compras $objCompra) {
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

}
