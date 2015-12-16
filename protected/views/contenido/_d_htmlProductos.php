<div class="container-fluid">
    <div class="row">
        <div class="row-fluid">
            <div class="col-md-12 title">
                <span><i class="glyphicon glyphicon-chevron-right"></i></span>
                <strong class="productos-destacados"><?php echo $objModulo->descripcion ?></strong>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-4">
                <?php echo $objModulo->contenido ?>
            </div>
            <!-- Lista de productos -->
            <div class="col-md-8">



                <div class="row">
                    <div class="col-md-12 side">
                        <div class="list_cuadricula">
                            <section>
                                <div>
                                    <ul class="listaProductos">
                                        <div class="items items3">
                                            <?php foreach ($objModulo->getListaProductos($this->objSectorCiudad) as $objProducto): ?>

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
        </div>
    </div>
</div>