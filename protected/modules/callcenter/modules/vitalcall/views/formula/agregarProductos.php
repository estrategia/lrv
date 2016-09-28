<div class="box-content row">
	<div class="panel-group" id="collapsibleset-productos-contenido"
		role="tablist" aria-multiselectable="true" style="margin-top: 20px;">
		<div class="panel panel-default">
			<div class="panel-heading head-desplegable" role="tab"
				id="encabezado-buscar-productos-contenido">
				<h4 class="panel-title">
					<a role="button" class="" id="" data-toggle="collapse"
						data-parent="#collapsibleset-productos-contenido"
						href="#collapsible-cuerpo-productos-contenido"
						aria-expanded="true"
						aria-controls="collapsible-cuerpo-productos-contenido"> Agregar
						productos </a>
				</h4>
			</div>
			<div
				style="height: 5px; background-color: #F5F5F5; border-top: 1px solid #E9E1E1;"></div>
			<div id="collapsible-cuerpo-productos-contenido"
				class="panel-collapse collapse in" role="tabpanel"
				aria-labelledby="encabezado-buscar-productos-contenido">
				<div class="panel-body">
					<div class="row">
                        <?php
								$form = $this->beginWidget ( 'CActiveForm', array (
											'enableClientValidation' => true,
											'enableAjaxValidation' => false,
													'htmlOptions' => array (
														'id' => 'formula-form',
											'role' => 'form' 
										),
										'errorMessageCssClass' => 'has-error',
										'clientOptions' => array (
										'validateOnSubmit' => true,
										'validateOnChange' => true,
										'errorCssClass' => 'has-error',
										'successCssClass' => 'has-success' 
									) ) );?>
                            <div class="col-md-5 col-md-offset-3">
								<div class="form-group">
									<?php  echo $form->textField($modelBuscarProductos, 'busqueda', array('class' => 'form-control', 'size' => 50, 'maxlength' => 50)); ?>
								</div>
							</div>
							<div class="col-md-1">
								<div class="form-group">
									<?php echo CHtml::submitButton( 'Buscar' , array('class' => "btn btn-default")); ?>
								</div>
							</div>
						<?php $this->endWidget(); ?>
					</div>
					<div class="row">
						<?php $this->renderPartial('_resultadoForm', array('productos' => $modelBuscarProductos->resultadoBusqueda, 'idFormula' => $modelBuscarProductos->idFormula))?>
					</div>
				</div>
			</div>
		</div>

		<div class="panel panel-default">
			<div class="panel-heading head-desplegable" role="tab"
				id="encabezado-listaproductos">
				<h4 class="panel-title">
					<a role="button" class="collapsed" id="" data-toggle="collapse"
						data-parent="#collapsibleset-productos-contenido"
						href="#collapsible-cuerpo-listaproductos" aria-expanded="false"
						aria-controls="collapsible-cuerpo-listaproductos"> Productos agregados </a>
				</h4>
			</div>
			<div
				style="height: 5px; background-color: #F5F5F5; border-top: 1px solid #E9E1E1;"></div>
			<div id="collapsible-cuerpo-listaproductos"
				class="panel-collapse collapse" role="tabpanel"
				aria-labelledby="encabezado-listaproductos">
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							<div id="contenido-productos-lista">
                                <?php $this->renderPartial('_listaProductosAgregados', array("productosFormula" => $productosFormula)); ?>
                            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





