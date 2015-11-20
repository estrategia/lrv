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
            <?php
            $this->renderPartial('/contenido/d_modulos', array(
                'listModulos' => $listModulos
            ));
            ?>
        </div>
    </div>
</div>

<!-- productos destacados -->






