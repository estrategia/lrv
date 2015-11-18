<?php if(count($model->listProductosModulos(array('condition' => 'idMarca IS NOT NULL'))) != 0): ?>

	<?php $arrayMarcasSeleccionadas = array(); ?>
	<?php foreach ($model->listProductosModulos(array('condition' => 'idMarca IS NOT NULL')) as $fila): ?>
		<?php $arrayMarcasSeleccionadas[] = $fila->idMarca; ?>
	<?php endforeach; ?>

<?php endif; ?>



<div class="col-md-6" style="height:250px;overflow-y: scroll;">
	<?php echo CHtml::checkboxList('marcas-contenido', $arrayMarcasSeleccionadas, $arrayMarcas ,array('data-modulo' => $model->idModulo))?>
</div>

<div class="col-md-6" style="height:250px;overflow-y: scroll;" id="categorias-marcas-seleccionadas">
	
</div>

<script>
	$(document).ready(function(){
		cargarCategoriasSeleccionadas($("#btn-pedido-buscar").attr('data-modulo'));
	});
</script>