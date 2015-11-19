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

	                
					    <div class="row">
					    	<form id="addproducto" method="post" name="addproducto">
						    	<div class="col-md-5 col-md-offset-3">
						    		<div class="form-group">
						            	<input type="text" placeholder="Descripción" class="form-control input-sm"  data-modulo="<?php echo $model->idModulo ?>" maxlength="50" id="contenido-busqueda-buscar"> 
						            </div>
						        </div>
						        <div class="col-md-1">
						        	<div class="form-group">
						            	<button id="btn-pedido-buscar" type="button" class="btn btn-danger btn-sm" data-role="busqueda-contenido" data-modulo="<?php echo $model->idModulo ?>"><i class="glyphicon glyphicon-search"></i> Buscar</button>
						        	</div>
						        </div>
					        </form>
					    </div>
					    <div class="row">
				    		<div class="col-md-6 col-md-offset-3">
						    	<div class="alert alert-info">
						            <p>El archivo debe ser en formato .txt</p>
						            <p>Cada código de producto debe estar separado por un Enter.</p> 
						            <p>Ej: </p>
						            <p>20418</p>
						            <p>22963</p>
						            <p>27333</p>
						        </div>
					    	</div>
					    </div>
					    <div class="row">
					    	<form id="cargarproducto" method="post" name="cargarproducto" enctype="multipart/form-data">
						    	<div class="col-md-5 col-md-offset-3">
							    	<div class="form-group">
							    		<!--<a href="#" data-toggle='tooltip' data-placement='top' title="El archivo debe ser en formato .txt <br> Cada código de producto debe estar separado por un Enter. <br> Ej: <br />20418 22963&#10;27333" class="glyphicon glyphicon-question-sign"></a>-->
							    		<input type="file" class="form-control input-sm" data-modulo="<?php echo $model->idModulo ?>" id="contenido-cargar-producto" name="contenido-cargar-producto">
							    	</div>
						    	</div>
						    	<div class="col-md-1">
						    		<div class="form-group">
						    			<button class="btn btn-danger btn-sm" data-role="cargar-productos-contenido" data-modulo="<?php echo $model->idModulo ?>"><i class="glyphicon glyphicon-upload"></i> Cargar</button>
						    		</div>
						    	</div>
					    	</form>
					    </div>
					
					<div class="panel-body">
						<div class="row">
							<div class="col-md-12">
								<div id="contenido-productos-lista">
									<?php $this->renderPartial('_listaModuloProductos', array("model" => $model)); ?>
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
	                
	                <?php $this->renderPartial('_listaMarcaCategorias', array("model" => $model, "arrayMarcas" => $arrayMarcas)); ?>

	            </div>
	        </div>
	    </div>

	</div>
	<div class="row">
		<?php echo CHtml::button('Guardar Contenidos', array('class' => "btn btn-default", "data-modulo" => $model->idModulo, 'data-role' => 'almacenar-html-producto-marcas')); ?>
	</div>
</div>