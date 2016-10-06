<?php
class ReportesController extends ControllerVitalcall {
	
	public function actionIndex() {
	}
	
	public function actionReporteMedico() {
		
		$model = new ReportesForm();
		$formulasMedico = null;
		if(isset($_POST['ReportesForm'])){
			$model->attributes = $_POST['ReportesForm'];
			
			$formulasMedico = FormulasVitalCall::model()->findAll( array(
				'with' => array('listProductosVC' => array (
						'with' => array(
								'listComprasItems' => array(
										'with' => array(
												'objCompra',
										)
								),
								'objProducto'
						)
				) ),
				'condition' => 'objCompra.fechaCompra between :fechaInicio AND :fechaFin AND listComprasItems.codigoProducto is not null ',
				'params' => array(
						':fechaInicio' => $model->fechaInicio,
						':fechaFin' => $model->fechaFin,
				)	
					
			));
			
			Yii::app()->session[Yii::app()->params->vitalCall['sesion']['reporteMedico']] = $formulasMedico;
		}
		$this->render ( 'reporteMedico', array (
				'model' => $model,
				'formulasMedico' => $formulasMedico
		));
	}
	
	public function actionDescargarReporteMedico(){
		$formulasMedico = Yii::app()->session[Yii::app()->params->vitalCall['sesion']['reporteMedico']]; 
		
		Yii::import('application.vendors.phpexcel.PHPExcel', true);
		$objPHPExcel = new PHPExcel();
		$objPHPExcel->getProperties()->setTitle("Reporte Bonos");
		
		$objPHPExcel->setActiveSheetIndex(0);
		$objPHPExcel->getSheet(0)->setTitle('Bonos');
		
		//$objPHPExcel->setActiveSheetIndex(0);
		$objWorksheet = $objPHPExcel->getSheet(0);
		$objWorksheet->setTitle('ProductosxMedico');
		
		$col = 0;
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Medico');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Institucion');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Codigo del producto');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Producto');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Codigo del proveedor');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Proveedor');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Cantidad Unidades');
		$objWorksheet->setCellValueByColumnAndRow($col++, 1, 'Cantidad Fraccionados');
		
		for ($col = 0; $col < 8; $col++) {
			$objWorksheet->getStyleByColumnAndRow($col, 1)->getFont()->setBold(true);
		}

		if ($formulasMedico !== null) {
			$fila = 2;
			foreach ($formulasMedico as $idx => $formulaMedica) {
				$medico = $formulaMedica->nombreMedico;
				$institucion = $formulaMedica->institucion;
				
				foreach($formulaMedica->listProductosVC as $productoVC){
					$col = 0;
					$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $medico);
					$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $institucion);
					$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $productoVC->codigoProducto);
					$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $productoVC->objProducto->descripcionProducto);
					$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $productoVC->objProducto->codigoProveedor);
					$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $productoVC->objProducto->objProveedor->nombreProveedor);
					$unidades = $fraccionados = 0;
					foreach ($productoVC->listComprasItems as $item){
						   $unidades += $item->unidades;
						   $fraccionados+= $item->fracciones;
					}
										
					$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $unidades );
					$objWorksheet->setCellValueByColumnAndRow($col++, $fila, $fraccionados );
					$fila++;
				}
				
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