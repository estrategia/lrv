<?php if($productos):?>
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
	<?php $i = 0?>
<?php foreach ($productos as $objProducto): ?>
                            <tr id='producto_<?= $i ?>'>
			<td><img src="<?php echo Yii::app()->request->baseUrl . $objProducto->rutaImagen() ?>" title="<?php echo $objProducto->descripcionProducto ?>"></td>
			<td><?php echo $objProducto->codigoProducto ?></td>
			<td><?php echo $objProducto->descripcionProducto . "<br>" . $objProducto->presentacionProducto ?></td>
			<td><?php echo CHtml::textField('cantidad','',array('placeholder' => 'Cantidad', 'class' => 'form-control', 'id' => 'cantidad_'.$i)) ?></td>
			<td><?php echo CHtml::textField('dosis','',array('placeholder' => 'Dosis', 'class' => 'form-control', 'id' => 'dosis_'.$i)) ?></td>
			<td><?php echo CHtml::textField('intervalo','',array('placeholder' => 'Intervalo', 'class' => 'form-control', 'id' => 'intervalo_'.$i)) ?></td>
			<td><?php $texto = 'Agregar';
				$habilitado = false;
// 				if (array_search ( $objProducto->codigoProducto, $productosAgregados ) !== false) {
// 					$texto = 'Agregado';
// 					$habilitado = true;
// 				}
				?>
                <?php echo CHtml::link($texto, '#', array('data-producto' => 
                		$objProducto->codigoProducto, 
                		'data-role' => "agregar-producto-formula", 
                		'class' => 'btn btn-primary', 
                		'disabled' => $habilitado,
                		'data-producto' => $objProducto->objVitalCall->idProductoVitalCall,
                		'data-formula' => $idFormula,
                		'data-component' => $i
                )); ?>
            </td>
		</tr>
		<?php $i++;?>
<?php endforeach; ?>
    </tbody>
</table>
<?php endif;?>