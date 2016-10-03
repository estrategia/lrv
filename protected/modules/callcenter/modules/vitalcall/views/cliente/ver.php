<?php
$this->breadcrumbs = array (
		'Inicio' => array (
				'/callcenter/' 
		),
		'Vitalcall' => array (
				'/callcenter/vitalcall' 
		),
		'Clientes' => array (
				'/callcenter/vitalcall/clientes' 
		),
		$objCliente->identificacionUsuario 
);
?>

<!-- Info cliente-->
<div class="row">
	<div class="col-md-8">
		<table class="table table-striped table-bordered table-condensed">
			<tbody>
				<tr>
					<td>
						<div class="col-md-8">
							<strong>C&eacute;dula: </strong><?= $objCliente->identificacionUsuario ?><br>
							<strong>Nombre: </strong><?= $objCliente->nombre . " " . $objCliente->apellido ?><br>
							<strong>Correo electr&oacute;nico: </strong><?= $objCliente->correoElectronico ?> <br />
							<strong>Celular: </strong><?= $objCliente->celular ?><br /> <strong>Fijo:
							</strong><?= $objCliente->telefono ?> <strong>Extensi&oacute;n: </strong><?= empty($objCliente->extension) ? "N/A" : $objCliente->extension?>
                        </div>
						<div class="col-md-2">
							<button type="button" value="Activar" class="btn-info"
								data-toggle="modal" data-target="#modalMisBonos">Activar cliente</button>
						</div>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

<?php if($objCliente->estado == 2):?>
	<?php
	$form = $this->beginWidget ( 'CActiveForm', array (
				'id' => 'form-validar-usuario',
				'enableClientValidation' => true,
				'errorMessageCssClass' => 'has-error',
				'clientOptions' => array (
				'validateOnSubmit' => true,
				'validateOnChange' => true,
				'errorCssClass' => 'has-error',
				'successCssClass' => 'has-success' 
			) 
					) );
	?>	
					
<div id="modalMisBonos" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Activar usuario</h4>
			</div>
			<div class="modal-body">
				
					
					<div class="row">
						<div class="form-group">
							<div class="form-group">
							    <?php echo $form->labelEx($modelActivacion, 'codigoActivacionValidacion'); ?>
							    <?php echo $form->textField($modelActivacion, 'codigoActivacionValidacion', array('class' => 'form-control')); ?>
							    <?php echo $form->error($modelActivacion, 'codigoActivacionValidacion', array('class' => 'text-danger')); ?>
							</div>
						</div>
					</div>
					
	                </div>
			<div class="modal-footer">
				<?php echo CHtml::submitButton('Validar', array('class' => "btn btn-primary")); ?>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div>

	</div>
</div>
<?php $this->endWidget();?>
<?php endif;?>
<!-- formulas medicas-->
<div class="row">
	<div class="col-md-12">
		<hr>
		<div>
			<span class="title">F&oacute;rmulas m&eacute;dicas</span>

			<form method="post"
				action="<?php echo CController::createUrl('/callcenter/vitalcall/formula/nueva') ?>">
				<input type="hidden"
					value="<?= $objCliente->identificacionUsuario ?>" name="cliente">
				<button type="submit" value="Submit">Nueva f&oacute;rmula</button>
			</form>
            
            <?php $this->renderPartial('_gridFormula', array('model' => $modelFormula))?>
        </div>
	</div>
</div>

<!-- direcciones despacho-->
<div class="row">
	<div class="col-md-12">
		<hr>
		<div>
			<span class="title">Direcciones de despacho</span>
			<br/>
			<a href="#" data-role='nueva-direccion-vital' class='btn btn-info' data-cliente='<?= $objCliente->identificacionUsuario ?>'>Nueva direcci&oacute;n</a>
            <?php $this->renderPartial('_gridDirecciones', array('model' => $modelDirecciones))?>
        </div>
	</div>
</div>

<!-- pedidos anteriores-->
<div class="row">
	<div class="col-md-12">
		<hr>
		<div>
			<span class="title">Pedidos Anteriores</span>
            <?php $this->renderPartial('_gridAnteriores', array('model' => $modelCompra))?>
        </div>
	</div>
</div>