
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
                                'objPrecio' => new PrecioProducto($objProducto, $objSectorCiudad, $codigoPerfil, false, true),
                                'saldos' => $listaProductosSaldos[$objProducto->codigoProducto],
                            ));
                            ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>