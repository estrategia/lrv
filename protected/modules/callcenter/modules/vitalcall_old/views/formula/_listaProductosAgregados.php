<?php if($productosFormula):?>
<table class="table table-bordered table-hover table-striped">
	<tbody>
		<tr>
			<th>Imagen</th>
			<th>C&oacute;digo</th>
			<th>Producto</th>
			<th>Cantidad</th>
			<th>Dosis</th>
			<th>Intervalo (h)</th>
			<th></th>
		</tr>
	
<?php foreach ($productosFormula as $productosFormula): ?>
           <tr>
			<td><img src="<?php echo Yii::app()->request->baseUrl . $productosFormula->objProductoVC->objProducto->rutaImagen() ?>" title="<?php echo $productosFormula->objProductoVC->objProducto->descripcionProducto ?>"></td>
			<td><?php echo $productosFormula->objProductoVC->objProducto->codigoProducto ?></td>
			<td><?php echo $productosFormula->objProductoVC->objProducto->descripcionProducto . "<br>" . $productosFormula->objProductoVC->objProducto->presentacionProducto ?></td>
			<td><?php echo CHtml::textField('cantidad',$productosFormula->cantidad,array('placeholder' => 'Cantidad', 'class' => 'form-control', 'id' => 'cantidadEditar_'.$productosFormula->idProductoVitalCall)) ?></td>
			<td><?php echo CHtml::textField('dosis',$productosFormula->dosis,array('placeholder' => 'Dosis', 'class' => 'form-control', 'id' => 'dosisEditar_'.$productosFormula->idProductoVitalCall)) ?></td>
			<td><?php echo CHtml::textField('intervalo',$productosFormula->intervalo,array('placeholder' => 'Intervalo', 'class' => 'form-control', 'id' => 'intervaloEditar_'.$productosFormula->idProductoVitalCall)) ?></td>
			<td>
				<?php echo CHtml::link('Editar', '#', array('data-producto' => 
                		$productosFormula->idProductoVitalCall, 
                		'data-role' => "editar-producto-formula", 
                		'class' => 'btn btn-primary',
                		'data-formula' => $productosFormula->idFormula,
                )); ?>
                <?php echo CHtml::link('Eliminar', '#', array('data-producto' => 
                		$productosFormula->idProductoVitalCall, 
                		'data-role' => "eliminar-producto-formula", 
                		'class' => 'btn btn-primary',
                		'data-formula' => $productosFormula->idFormula,
                )); ?>
            </td>
		</tr>
<?php endforeach; ?>
    </tbody>
</table>
<?php endif;?>