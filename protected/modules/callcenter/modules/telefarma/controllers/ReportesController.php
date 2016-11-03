<?php
class ReportesController extends ControllerTelefarma {
	
	public function actionIndex() {
	}
	
	public function actionReporteMedico() {
		
		$model = new ReportesForm();
		$this->layout = 'admin';
		$formulasMedico = null;
		if(isset($_POST['ReportesForm'])){
			$model->attributes = $_POST['ReportesForm'];
			$sql = "  SELECT tc.codigoProducto, tc.descripcion, tc.presentacion, sum(Unidades) as unidades, sum(fracciones) as fracciones, sum(unidadesCedi) as unidadesCedi
						, med.registroMedico, med.nombre, med.institucion, med.telefono, med.correoElectronico, Count(*) as numeroCompras, pro.codigoProveedor, pro.nombreProveedor FROM 
					 t_ComprasItems tc 
					 INNER JOIN m_Medico med ON (med.registroMedico = tc.registroMedico)
					 INNER JOIN m_Producto p ON (p.codigoProducto = tc.codigoProducto)
					 INNER JOIN m_Proveedor pro ON (pro.codigoProveedor = p.codigoProveedor)
					 INNER JOIN t_Compras comp ON (comp.IdCompra = tc.IdCompra)
					 WHERE comp.fechaEntrega BETWEEN '$model->fechaInicio' AND '$model->fechaFin'
					 GROUP BY tc.codigoProducto, med.registroMedico
					ORDER BY med.RegistroMedico";
			$formulasMedico = Yii::app()->db->createCommand($sql)->queryAll();
			
			Yii::app()->session[Yii::app()->params->telefarma['sesion']['reporteMedico']] = $formulasMedico;
		}
		$this->render ( 'reporteMedico', array (
				'model' => $model,
				'formulasMedico' => $formulasMedico
		));
	}
	
	public function actionDescargarReporteMedico(){
		$formulasMedico = Yii::app()->session[Yii::app()->params->telefarma['sesion']['reporteMedico']]; 
		
		Yii::import('application.vendors.phpexcel.PHPExcel', true);
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setTitle("Reporte Bonos");
		
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getSheet(0)->setTitle('Reporte medico');
		
		//$objPHPExcel->setActiveSheetIndex(0);
		$objWorksheet = $objPHPExcel->getSheet(0);
		$objWorksheet->setTitle('ProductosxMedico');
		
		$col = 0;
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Registro Medico');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Medico');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Institucion');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Codigo del producto');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Producto');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Codigo del proveedor');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Proveedor');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Cantidad Compras');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Cantidad Unidades');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Cantidad Fraccionados');
		
		for ($col = 0; $col < 8; $col++) {
			$objWorksheet->getStyleByColumnAndRow($col, 1)->getFont()->setBold(true);
		}

		if ($formulasMedico !== null) {
			$fila = 2;
			foreach ($formulasMedico as $idx => $formulaMedica) {
				$col = 0;
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['registroMedico']);
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['nombre']);
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['institucion']);
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['codigoProducto']);
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['descripcion']);
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['codigoProveedor']);
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['nombreProveedor']);
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['numeroCompras']);
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['unidades']);
				$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $formulaMedica['fracciones']);
				$fila++;
			}
		}
		
		for ($i = 0; $i <= 8; $i++) {
			$objPHPExcel->getActiveSheet()->getColumnDimensionByColumn($i)->setAutoSize(true);
		}
		
		
		$objPHPExcel->setActiveSheetIndex(0);
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="reporte_formula_' . date('YmdHis') . '.xls"');
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
	
	
	public function actionFormulaVencer(){
		$dataProvider = new CArrayDataProvider(ProductosFormulaVitalCall::obtenerFormulasVencer(), array(
				'pagination' => array(
						'pageSize' => 10,
				),
		));
		$this->render ( 'formulasVencer', array (
				//'model' => $model,
				'dataProvider' => $dataProvider
		));
	}
	
}