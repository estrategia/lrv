<?php //CVarDumper::dump(count($model)); exit(); ?>

<?php if(count($model) == 0): ?>
    <p>No hay productos en la lista</p>
<?php else: ?>
    <table class="table table-bordered table-hover table-striped">
        <tbody>
            <tr>
                <th>Imagen</th>
                <th>Código</th>
                <th>Producto</th>
                <th></th>
            </tr>
            <?php foreach ($model as $indice => $objProductoModulo): ?>
                <tr>
                    <td><img src="<?php echo Yii::app()->request->baseUrl . $objProductoModulo->objProductoRelacionado->rutaImagen() ?>" title="<?php echo $objProductoModulo->objProductoRelacionado->descripcionProducto ?>"> </td>
                    <td><?php echo $objProductoModulo->objProductoRelacionado->codigoProducto ?></td>
                    <td><?php echo $objProductoModulo->objProductoRelacionado->descripcionProducto . "<br>" . $objProductoModulo->objProductoRelacionado->presentacionProducto ?></td>
                    <td><td><?php echo CHtml::textField('orden', $objProductoModulo->orden, array('id' => 'orden_'.$objProductoModulo->idRelacionado)) ?></td></td>

                    <td>
                        <?php echo CHtml::link('Actualizar', '#', array('data-relacion' => $objProductoModulo->idRelacionado, 'data-role' => "actualizar-producto-relacionado", 'class' => 'btn btn-primary')); ?>
                    </td>
                    <td>
                        <?php echo CHtml::link('Eliminar', '#', array('data-relacion' => $objProductoModulo->idRelacionado, 'data-role' => "eliminar-producto-relacionado", 'class' => 'btn btn-primary')); ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>