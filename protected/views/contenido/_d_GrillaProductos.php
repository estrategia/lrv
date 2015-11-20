<div class="container">
    <section> 
        <div class="row-fluid">
            <div class="col-md-12 title">
                <span><i class="glyphicon glyphicon-chevron-right"></i></span>
                <strong class="productos-destacados"><?php echo $objModulo->descripcion ?></strong>
            </div>
        </div>
    </section> 
    <br>
    <div class="row">
        <div class="col-md-12">
            <!-- Lista de productos -->
            <div class="row">
                <?php foreach ($objModulo->getListaProductos($this->objSectorCiudad) as $objProducto): ?>
                    <ul class="listaProductos">
                        <?php
                        $this->renderPartial('//catalogo/_d_productoElemento', array(
                            'data' => $objProducto,
                            'vista' => 'grid'
                        ));
                        ?>
                    </ul>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>