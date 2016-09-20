<div class="modal fade" id="modal-productos-busqueda" tabindex="-1" role="dialog" aria-labelledby="modal-productos-busqueda-label">
    <div class="modal-dialog modal-lg" style='width: 80%' role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title center" id="modal-productos-busqueda-label">Resultado de la Busqueda: <?php echo $nombreBusqueda ?><br/><?php //echo  $objSectorCiudad->objCiudad->nombreCiudad . " - " . $objSectorCiudad->objSector->nombreSector ?></h4>
            </div>
            <div class="modal-body body-scroll">
                <table class="table table-bordered table-hover table-striped">
                    <tbody>
                        <tr>
                            <th>Imagen</th>
                            <th>Código</th>
                            <th>Producto</th>
                            <th>Cantidad</th>
                            <th>Antes</th>
                            <th>Ahorro</th>
                            <th>Ahora</th>
                            <th>Unidades disponibles</th>
                            <th></th>
                        </tr>
                        <?php foreach ($listCombos as $objCombo): ?>
                            <?php
                            $this->renderPartial('_elementoCombo', array(
                                'objCombo' => $objCombo,
                                'objPrecio' => new PrecioCombo($objCombo),
                            ));
                            ?>
                        <?php endforeach; ?>
                        <?php foreach ($listProductos as $objProducto): ?>
                            <?php
                            $this->renderPartial('_elementoProducto', array(
                                'objProducto' => $objProducto,
                                'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil),
                                'saldos' => $listaProductosSaldos[$objProducto->codigoProducto],
                            ));
                            ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
    </div>
</div>