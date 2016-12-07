<div class="box-inner">
    <div class="box-header well">
        <div class="col-lg-1">
            <h2>Informaci&oacute;n producto</h2>
        </div>
    </div>
    <div class="box-content">
	    <div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="form-group">
					<img src="<?php echo Yii::app()->request->baseUrl . $model->rutaImagen(); ?>" title="<?php echo $model->descripcionProducto ?>">
					<br>C&oacute;digo: <?php echo $model->codigoProducto; ?>
					<br>Decripci&oacute;n: <?php echo $model->descripcionProducto; ?>
					<br>Presentaci&oacute;n: <?php echo $model->presentacionProducto; ?>
				</div>
			</div>
		</div>
		<div class="row">
	    	<form id="addproducto" method="post" name="addproducto">
		    	<div class="col-md-5 col-md-offset-3">
		    		<div class="form-group">
		            	<input type="text" placeholder="Descripción" class="form-control input-sm" maxlength="50" id="relacionados-busqueda-buscar"> 
		            </div>
		        </div>
		        <div class="col-md-1">
		        	<div class="form-group">
		            	<button id="btn-pedido-buscar" type="button" class="btn btn-danger btn-sm" data-role="busqueda-relacionados" data-producto="<?php echo $model->codigoProducto ?>"><i class="glyphicon glyphicon-search"></i> Buscar</button>
		        	</div>
		        </div>
	        </form>
	    </div>
	    <div class="row">
	    	<div class="col-md-12">
	    		<div class="form-group" id="productos-relacionados-lista">
	    			<?php $this->renderPartial('_listaProductosRelacionados', array("model" => $modelRelacionados)); ?>
	    		</div>
	    	</div>
	    </div>


	</div>
</div>