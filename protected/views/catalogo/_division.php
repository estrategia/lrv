<div class="c_icon c_icon_menu"><a href="#panel-categoriasdivision"><img src="<?php echo Yii::app()->request->baseUrl; ?>/images/iconos/menu_icon.png"></a></div>
<div data-role="panel" id="panel-categoriasdivision" data-display="overlay" data-position="left" data-position-fixed="false">
                <?php $this->renderPartial('_categoriasDivision', array('listCategoriasHijas' =>  $objCategoria->listCategoriasHijas)); ?>
</div>

    <?php if ($listModulos != null): ?>
    <?php
          $this->renderPartial('/contenido/_modulos', array(
                  'listModulos' => $listModulos
          ));
    ?>
    <?php else: ?>
        <!-- Lista de productos -->
         <ul class="listaProductos">
            <div class="items">
                <?php foreach ($listProductos as $objProducto): ?>
                <?php   $this->renderPartial('//catalogo/_productoElemento', array(
                                   'objProducto' => $objProducto,
                                   'objPrecio' => new PrecioProducto($objProducto, $this->objSectorCiudad, Yii::app()->shoppingCart->getCodigoPerfil()),
                    				'vista' => 'listaCatalogo',
                        ));   ?>

                <?php endforeach; ?>
            </div>
        </ul>
   <?php endif; ?>
       