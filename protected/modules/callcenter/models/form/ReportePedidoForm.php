<?php

/**
 * ReportePedidoForm class.
 * ReportePedidoForm is the data structure for keeping
 */
class ReportePedidoForm extends CFormModel {

    public $fechaInicio;
    public $fechaFin;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            // username and password are required
            array('fechaInicio, fechaFin', 'required', 'message' => '{attribute} no puede estar vacío'),
            array('fechaInicio, fechaFin', 'date', 'format' => 'yyyy-M-d'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'fechaInicio' => 'Fecha Inicio',
            'fechaFin' => 'Fecha Fin',
        );
    }

    public function exportarCompras() {
        Yii::import('application.vendors.phpexcel.PHPExcel', true);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("Reporte Compras");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getSheet(0)->setTitle('Compras');
        $objPHPExcel->createSheet(1);
        $objPHPExcel->getSheet(1)->setTitle('Detalle Compras');

        $objPHPExcel->setActiveSheetIndex(0);
        $objWorksheet = $objPHPExcel->getSheet(0);
        $objWorksheet->setTitle('Compras');

        $listCompras = Compras::model()->findAll(array(
            'with' => array('objUsuario', 'objFormaPago', 'objPerfil', 'objCiudad', 'objSector', 'objCompraDireccion'),
            'order' => 't.fechaEntrega',
            'condition' => 'fechaEntrega>=:fechaini AND fechaEntrega<=:fechafin',
            'params' => array(
                ':fechaini' => "$this->fechaInicio 00:00:00",
                ':fechafin' => "$this->fechaFin 23:59:59",
            )
        ));

        $col = 0;
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, '# Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, '# Usuario');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Nombre Usuario');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Correo Usuario');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Invitado');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Código Perfil');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Nombre Perfil');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Fecha Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Fecha Entrega');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Ciudad');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Sector');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Tipo Entrega');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Punto Venta');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Domicilio Dirección');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Domicilio Barrio');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Domicilio Teléfono');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Domicilio Celular');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Donación Fundación');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Domicilio');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Flete');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Domicilio Bodega');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Subtotal Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Bono');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Impuestos Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Total Compra');

        for ($col = 0; $col < 25; $col++) {
            $objWorksheet->getStyleByColumnAndRow($col, 1)->getFont()->setBold(true);
        }

        $objPHPExcel->setActiveSheetIndex(1);
        $objWorksheet = $objPHPExcel->getSheet(1);

        $col = 0;
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, '# Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Código Producto');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Descripción');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Presentación');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, '# Combo');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Descripción Combo');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Cant. Unidades');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Cant. Fracciones');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Cant. Bodega');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Precio Base Unidad');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Descuento Unidad');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Precio Base Fracción');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Descuento Fracción');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Subtotal Unidad');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Subtotal Fracción');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Flete');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Impuestos');

        for ($col = 0; $col < 17; $col++) {
            $objWorksheet->getStyleByColumnAndRow($col, 1)->getFont()->setBold(true);
        }

        $nItems = 0;

        foreach ($listCompras as $idx => $objCompra) {
            $objPHPExcel->setActiveSheetIndex(0);
            $objWorksheet = $objPHPExcel->getSheet(0);
            $col = 0;
            $fila = $idx + 2;
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->idCompra);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->identificacionUsuario);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objUsuario->nombre . " " . $objCompra->objUsuario->apellido);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objUsuario->correoElectronico);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->invitado);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->codigoPerfil);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objPerfil->nombrePerfil);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->fechaCompra);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->fechaEntrega);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objCiudad->nombreCiudad);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objSector->nombreSector);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, Yii::app()->params->entrega['tipo'][$objCompra->tipoEntrega]);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->idComercial);


            if ($objCompra->objCompraDireccion == null) {
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, "NA");
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, "NA");
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, "NA");
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, "NA");
            } else {
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objCompraDireccion->direccion);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objCompraDireccion->barrio);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objCompraDireccion->telefono);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objCompraDireccion->celular);
            }

            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->donacionFundacion);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->domicilio);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->flete);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->valorDomicilioCedi);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->subtotalCompra);

            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->objFormaPagoCompra == null ? "NA" : $objCompra->objFormaPagoCompra->valorBono);

            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->impuestosCompra);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objCompra->totalCompra);

            $objPHPExcel->setActiveSheetIndex(1);
            $objWorksheet = $objPHPExcel->getSheet(1);

            foreach ($objCompra->listItems as $objItem) {
                $col = 0;
                $fila = $nItems + 2;
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->idCompra);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->codigoProducto);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->descripcion);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->presentacion);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->idCombo);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->descripcionCombo);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->unidades);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->fracciones);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->unidadesCedi);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->precioBaseUnidad);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->descuentoUnidad);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->precioBaseFraccion);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->descuentoFraccion);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->precioTotalUnidad);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->precioTotalFraccion);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->flete);
                $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $objItem->objImpuesto->nombreImpuesto);
                $nItems++;
            }
        }
        
        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="reporte_compras_' . date('YmdHis') . '.xls"');
        header('Cache-Control: max-age=0');
        // If you're serving to IE 9, then the following may be needed
        header('Cache-Control: max-age=1');
        // If you're serving to IE over SSL, then the following may be needed
        //header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
        header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
        header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
        header('Pragma: public'); // HTTP/1.0

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }

}