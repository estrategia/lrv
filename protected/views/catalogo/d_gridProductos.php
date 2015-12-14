<div class="container">
    <!-- Lista de productos -->
    <div class="row">
        <div class="col-md-12 side">
            <div class="list_cuadricula">
                <section>
                    <div>
                        <ul class="listaProductos">
                            <div class="items">
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