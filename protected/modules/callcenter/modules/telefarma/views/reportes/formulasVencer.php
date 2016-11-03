<?php
$this->breadcrumbs = array(
		'Inicio' => array('/callcenter'),
		'Formulas Vencer' => array('/callcenter/vitalcall/reportes/formulaVencer'),
);


$this->widget('zii.widgets.grid.CGridView', array(
		'dataProvider' => $dataProvider,
		'id' => 'formulas-grid',
		'columns' => array(
				array(
						'header' => 'C&eacute;dula paciente',
						'type' => 'raw',
						'value' => function($data){
							return $data->objFormulaVC->identificacionUsuario;
						},
				),
				array(
						'header' => 'Nombre cliente',
						'type' => 'raw',
						'value' => function($data){
							return $data->objFormulaVC->objUsuarioVC->nombre;
						},
					),
				array(
						'header' => 'Apellido cliente',
						'type' => 'raw',
						'value' => function($data){
							return $data->objFormulaVC->objUsuarioVC->apellido;
						},
				),
				array(
						'header' => 'M&eacute;dico',
						'type' => 'raw',
						'value' => function($data){
							return $data->objFormulaVC->nombreMedico;
						},
				),
				array(
						'header' => 'C&oacute;digo producto',
						'type' => 'raw',
						'value' => function($data){
							return $data->objProductoVC->codigoProducto;
						},
				),
				array(
						'header' => 'Descripci&oacute;n',
						'type' => 'raw',
						'value' => function($data){
							return $data->objProductoVC->objProducto->descripcionProducto;
						},
				),
				array(
						'header' => 'Presentaci&oacute;n',
						'type' => 'raw',
						'value' => function($data){ 
							return $data->objProductoVC->objProducto->presentacionProducto;
						}
				),
				array(
						'header' => 'Cantidad',
						'value' => '$data->cantidad',
				),
				array(
						'header' => 'Dosis',
						'value' => '$data->dosis',
				),
				array(
						'header' => 'Intervalo',
						'value' => '$data->intervalo',
				),
				array(
						'header' => 'D&iacute;as restantes',
						'type' => 'raw',
						'value' => function($data){
							return $data->getDiasRestantes();
						}
				),
				array(
						'header' => 'Fecha de vencimiento',
						'type' => 'raw',
						'value' => function($data){
							return $data->getDiaVencimiento();
						}
				),
				
		)
));