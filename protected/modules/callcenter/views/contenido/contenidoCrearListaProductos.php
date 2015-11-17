<div class="box-content row">
	<div class="panel-group" id="collapsibleset-productos-contenido" role="tablist" aria-multiselectable="true" style="margin-top:20px;">
	    <div class="panel panel-default">
	        <div class="panel-heading head-desplegable" role="tab" id="encabezado-buscar-productos-contenido">
	          <h4 class="panel-title">
	            <a role="button" class="" id="" data-toggle="collapse" data-parent="#collapsibleset-productos-contenido" href="#collapsible-cuerpo-productos-contenido" aria-expanded="true" aria-controls="collapsible-cuerpo-productos-contenido">
	            	Agregar productos
	            </a>
	          </h4>
	        </div>
	        <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
	        <div id="collapsible-cuerpo-productos-contenido" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="encabezado-buscar-productos-contenido">
	            <div class="panel-body">

	                <form id="addproducto" method="post" name="addproducto">
					    <div class="row">
					    	<div class="col-md-5 col-md-offset-3">
					            <input type="text" placeholder="Descripción" class="form-control input-sm"  data-modulo="<?php echo $model->idModulo ?>" maxlength="50" id="contenido-busqueda-buscar"> 
					        </div>
					        <div class="col-md-1">
					            <button id="btn-pedido-buscar" type="button" class="btn btn-danger btn-sm" data-role="busqueda-contenido" data-modulo="<?php echo $model->idModulo ?>"><i class="glyphicon glyphicon-search"></i> Buscar</button>
					        </div>
					    </div>
					</form>
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div id="contenido-productos-lista">
									<?php if(count($model->listProductosModulos) == 0): ?>
										<p>No hay productos en la lista</p>
									<?php else: ?>
										<?php $this->renderPartial('_listaModuloProductos', array("model" => $model)); ?>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>

	            </div>
	        </div>
	    </div>

	    <div class="panel panel-default">
	        <div class="panel-heading head-desplegable" role="tab" id="encabezado-buscar-marcas-contenido">
	          <h4 class="panel-title">
	            <a role="button" class="collapsed" id="" data-toggle="collapse" data-parent="#collapsibleset-marcas-contenido" href="#collapsible-cuerpo-marcas-contenido" aria-expanded="false" aria-controls="collapsible-cuerpo-marcas-contenido">
	            	Agregar marca
	            </a>
	          </h4>
	        </div>
	        <div style="height:5px;background-color: #F5F5F5;border-top: 1px solid #E9E1E1;"></div>
	        <div id="collapsible-cuerpo-marcas-contenido" class="panel-collapse collapse" role="tabpanel" aria-labelledby="encabezado-buscar-marcas-contenido">
	            <div class="panel-body">
	                
	                <div class="col-md-6" style="height:250px;overflow-y: scroll;">
	  	              	<?php echo CHtml::checkboxList('marcas-contenido', null, $arrayMarcas ,array('class' => '','style' => ''))?>
	                </div>

	                <div class="col-md-6" style="height:250px;overflow-y: scroll;">
	                	
	                </div>

	            </div>
	        </div>
	    </div>

	</div>
</div>