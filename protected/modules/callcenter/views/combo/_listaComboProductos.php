<?php if(count($model->listProductos) == 0): ?>
    <p>No hay productos en la lista</p>
<?php else: ?>
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <th>Imagen</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Precio</th>
                <th></th>
            </tr>
            <?php foreach ($model->listProductosCombo as $fila => $objProductoCombo): ?>
                <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl . $objProductoCombo->objProducto->rutaImagen() ?>" title="<?php echo $objProductoCombo->objProducto->descripcionProducto ?>"> </td>
                    <td><?php echo $objProductoCombo->objProducto->codigoProducto ?></td>
                    <td><?php echo $objProductoCombo->objProducto->descripcionProducto . "<br>" . $objProductoCombo->objProducto->presentacionProducto ?></td>
                    <td><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'],$objProductoCombo->precio, Yii::app()->params->formatoMoneda['moneda']);  ?></td>
                    <td>
                        <?php if($model->idBeneficio == null):?>
                            <?php echo CHtml::link('Eliminar', '#', array('data-combo-producto' => $objProductoCombo->idComboProducto, 'data-combo' => $objProductoCombo->idCombo, 'data-role' => "eliminar-producto-combo", 'class' => 'btn btn-primary')); ?>
                        <?php else:?>
                            Eliminar no disponible
                        <?php endif;?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>