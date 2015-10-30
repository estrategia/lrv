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
				<?php if(count($model->objProductosModulos) == 0): ?>
					<p>No hay productos en la lista</p>
				<?php else: ?>
					<?php $this->renderPartial('_listaModuloProductos', array("model" => $model)); ?>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>