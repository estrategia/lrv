<div class="container-fluid">
    <div class="row">
        <div class="col-md-2 menu-categorias">
        	<?php if($objCategoria->rutaImagenMenu != null):?>
        		<div>
        			<img src='<?=  Yii::app()->request->baseUrl."/images/menu/desktop/".$objCategoria->rutaImagenMenu ?>' />
        		</div>
        	<?php endif;?>
            <h3 style="margin-left:42px;"><?php echo $objCategoria->nombreCategoriaTienda ?></h3>
            <ul>
                <?php foreach ($objCategoria->listCategoriasHijas as $categoriaHija): ?>
                	
                	<?php $icon = '<li><span class="glyphicon glyphicon-chevron-right"></span>&nbsp;' . $categoriaHija->nombreCategoriaTienda . '</li>';?>
                	
                	<?php if($categoriaHija->rutaImagen):?>
                	<?php $icon = "<div>
        							<img src='".Yii::app()->request->baseUrl."/images/menu/desktop/".$categoriaHija->rutaImagen."' />
        							$categoriaHija->nombreCategoriaTienda
        						</div>"; ?>
                	<?php endif;?>
                    <?php echo CHtml::link($icon, CController::createUrl('catalogo/categoria', array('categoria' => $categoriaHija->idCategoriaTienda,'title' => $categoriaHija->nombreCategoriaTienda)))
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
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- productos destacados -->

