<?php if(count($model->listProductosModulos(array('condition' => 'idCategoriaBI IS NOT NULL'))) != 0): ?>

	<?php $arrayCategoriasSeleccionadas = array(); ?>
	<?php foreach ($model->listProductosModulos(array('condition' => 'idCategoriaBI IS NOT NULL')) as $fila): ?>
		<?php $arrayCategoriasSeleccionadas[] = $fila->idCategoriaBI; ?>
	<?php endforeach; ?>

<?php endif; ?>


<?php echo CHtml::checkboxList('categorias-contenido', $arrayCategoriasSeleccionadas, $arrayCategorias ,array('class' => '','style' => ''))?>