<?php $this->renderPartial('html', array('contenido' => $objModulo->contenidoMovil)) ?>

<!-- Lista de productos -->
<div>
    <div class="productosRelacionados ui-content">
        <?php if (!empty($objModulo->descripcion)): ?>
            <h2><?php echo $objModulo->descripcion ?></h2>
        <?php endif; ?>
        <div id="slide-relacionados-modulo-<?php echo $objModulo->idModulo ?>" class="owl-carousel owl-theme">
            <?php foreach ($objModulo->getListaProductos($this->objSectorCiudad) as $objProducto): ?>
                <div class="item">
                    <?php
                    $this->renderPartial('/catalogo/_productoSlide', array(
                        'objProducto' => $objProducto,
                        'objPrecio' => new PrecioProducto($objProducto, $this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil()),
                    ));
                    ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>