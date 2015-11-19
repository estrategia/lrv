<?php $arrayMarcasSeleccionadas = array(); ?>
<?php if(count($model->listProductosModulos(array('condition' => 'idMarca IS NOT NULL'))) != 0): ?>

	<?php foreach ($model->listProductosModulos(array('condition' => 'idMarca IS NOT NULL')) as $fila): ?>
		<?php $arrayMarcasSeleccionadas[] = $fila->idMarca; ?>
	<?php endforeach; ?>

<?php endif; ?>



<div class="col-md-6" style="height:250px;overflow-y: scroll;">
	<?php echo CHtml::checkboxList('marcas-contenido', $arrayMarcasSeleccionadas, $arrayMarcas ,array('data-modulo' => $model->idModulo))?>
</div>

<div class="col-md-6" style="height:250px;overflow-y: scroll;" id="categorias-marcas-seleccionadas">
	
</div>

<?php Yii::app()->clientScript->registerScript('cargar-categorias-marcas', "cargarCategoriasSeleccionadas($('#btn-pedido-buscar').attr('data-modulo'));", CClientScript::POS_LOAD); ?>