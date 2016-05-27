<?php

class ReporteBloqueoForm extends CFormModel {

    public $inicio;
    public $fin;

    /**
     * Declares the validation rules.
     * The rules state that username and password are required,
     * and password needs to be authenticated.
     */
    public function rules() {
        return array(
            array('inicio,fin', 'required', 'message' => '{attribute} no puede estar vacío'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'inicio' => 'Fecha Inicio',
            'fin' => 'Fecha Fin',
        );
    }

    public function exportarArchivo() {
        Yii::import('application.vendors.phpexcel.PHPExcel', true);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->getProperties()->setTitle("Reporte Usuarios Bloqueados");

        $objPHPExcel->setActiveSheetIndex(0);
        $objPHPExcel->getSheet(0)->setTitle('Usuarios');

        //$objPHPExcel->setActiveSheetIndex(0);
        $objWorksheet = $objPHPExcel->getSheet(0);
        $objWorksheet->setTitle('Usuarios');

        $listUsuariosBloqueados = BloqueosUsuarios::model()->findAll(
                array(
                    'condition' => "fechaRegistro between :fechaInicio AND :fechaFin",
                    'params' => array(
                        ':fechaInicio' => $this->inicio,
                        ':fechaFin' => $this->fin
                    )
        ));


        $col = 0;
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Cédula');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Nombre');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Numero Compras');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Valor');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Año');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Mes');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Numero de Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Subtotal Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Total Compra');
        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Fecha Compra');
//        $objWorksheet->setCellValueByColumnAndRow($col++, 1, '# Compra');
//        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Fecha Uso');
//        $objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Valor Compra');

        for ($col = 0; $col < 13; $col++) {
            $objWorksheet->getStyleByColumnAndRow($col, 1)->getFont()->setBold(true);
        }

        $fila = 2;
        foreach ($listUsuariosBloqueados as $usuario) {
            $col = 0;
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $usuario->identificacionUsuario);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $usuario->identificacionUsuario);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $usuario->numeroCompras);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $usuario->acumuladoCompras);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $usuario->anho);
            $objWorksheet->setCellValueByColumnAndRow($col++, $fila, $usuario->mes);
            foreach($usuario->listCompras as $listaCompras){
                $columnaCompras = $col;
                $objWorksheet->setCellValueByColumnAndRow($columnaCompras++, $fila, $listaCompras->idCompra);
                $objWorksheet->setCellValueByColumnAndRow($columnaCompras++, $fila, $listaCompras->subtotalCompra);
                $objWorksheet->setCellValueByColumnAndRow($columnaCompras++, $fila, $listaCompras->totalCompra);
                $objWorksheet->setCellValueByColumnAndRow($columnaCompras++, $fila, $listaCompras->fechaCompra);
                $fila++;
            }
            
            
        }

        $objPHPExcel->setActiveSheetIndex(0);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="reporte_bloqueo_compras_' . date('YmdHis') . '.xls"');
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
