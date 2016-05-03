<?php $listaProductos = $objModulo->getListaProductos($this->objSectorCiudad) ?>
<?php if (count($listaProductos) >= Yii::app()->params->minimoGridProductos): ?>

    <div class="container-fluid">
        <?php if (!empty($objModulo->descripcion)): ?>
            <div class="row">
                <div class="row-fluid">
                    <div class="col-md-12 title">
                        <span><i class="glyphicon glyphicon-chevron-right"></i></span>
                        <strong class="productos-destacados"><?php echo $objModulo->descripcion ?></strong>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <!-- Lista de productos -->
        <div class="row">
            <div class="col-md-12 side">
                <div class="list_cuadricula">
                    <section>
                        <div>
                            <ul class="listaProductos">
                                <div class="items items5">
                                    <?php foreach ($listaProductos as $objProducto): ?>

                                        <?php
                                        $this->renderPartial('//catalogo/_d_productoElemento', array(
                                            'data' => $objProducto,
                                            'vista' => 'grid'
                                        ));
                                        ?>
                                    <?php endforeach; ?>
                                </div>
                            </ul>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>

    <?php
 endif?>
