<div class="modal fade" id="modal-productos-busqueda" tabindex="-1" role="dialog" aria-labelledby="modal-productos-busqueda-label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="modal-productos-busqueda-label">Resultado de la Busqueda: <?php echo $nombreBusqueda ?></h4>
            </div>
            <div class="modal-body body-scroll">
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Producto</th>
                            <th></th>
                        </tr>
                        <?php foreach ($listProductos as $objProducto): ?>
                            <tr>
                                <td><img src="<?php echo Yii::app()->request->baseUrl . $objProducto->rutaImagen() ?>" title="<?php echo $objProducto->descripcionProducto ?>"> </td>
                                <td><?php echo $objProducto->codigoProducto ?></td>
                                <td><?php echo $objProducto->descripcionProducto . "<br>" . $objProducto->presentacionProducto ?></td>
                                <td>
                                    <?php 
                                        $texto = 'Agregar';
                                        $habilitado = false;
                                        if(array_search($objProducto->codigoProducto, $productosAgregados) !== false)
                                        {
                                            $texto = 'Agregado';
                                            $habilitado = true;
                                        } 
                                    ?>
                                    <?php echo CHtml::link($texto, '#', array('data-producto' => $objProducto->codigoProducto, 'data-role' => "agregar-producto-contenido", 'data-modulo' => $idModulo, 'class' => 'btn btn-primary', 'disabled' => $habilitado)); ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>