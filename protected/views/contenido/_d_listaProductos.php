<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12 title">
                <span><i class="glyphicon glyphicon-chevron-right"></i></span>
                <strong class="productos-destacados"><?php echo $objModulo->descripcion ?></strong>
            </div>
        </div>

        <div id="owl-carousel" class="owl-carousel slide-productos">
            <?php foreach ($objModulo->getListaProductos($this->objSectorCiudad) as $objProducto): ?>
                <div class="item">
                    <ul class="listaProductos">
                        <?php
                        $this->renderPartial('/catalogo/_d_productoElemento', array(
                            'data' => $objProducto,
                            'vista' => 'relacionado'
                        ));
                        ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>