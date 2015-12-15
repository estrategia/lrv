<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 menu-categorias">
            <h3 style="margin-left:42px;"><?php echo $objCategoria->nombreCategoriaTienda ?></h3>
            <ul>
                <?php foreach ($objCategoria->listCategoriasHijas as $categoriaHija): ?>
                    <?php echo CHtml::link('<li><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;' . $categoriaHija->nombreCategoriaTienda . '</li>', CController::createUrl('catalogo/categoria', array('categoria' => $categoriaHija->idCategoriaTienda)))
                    ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-md-10 ressete">
            <?php if ($listModulos != null): ?>
                <?php
                $this->renderPartial('/contenido/d_modulos', array(
                    'listModulos' => $listModulos
                ));
                ?>
            <?php else: ?>
                <!-- Lista de productos -->
                <div class="container">
                    <div class="row">
                        <ul class="listaProductos">
                            <div class="items">
                                <?php foreach ($listProductos as $objProducto): ?>


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
                </div>
<?php endif; ?>
        </div>
    </div>
</div>

<!-- productos destacados -->






