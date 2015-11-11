
<?php foreach ($modulosTienda as $ubicacionModulo): ?>
    <?php $objModulo = $ubicacionModulo->objModulo ?>
    <?php if ($objModulo->tipo == 1): ?>
        <section class="block">
            <div id="myCarousel" class="carousel slide" data-interval="false">
                <div class="carousel-inner">
                    <?php $i = 0 ?>
                    <?php foreach ($objModulo->listImagenesBanners as $imagenes): ?>
                        <div class="item <?php echo ($i == 0) ? 'active' : '' ?>">
                            <?php if ($imagenes->tipoContenido == 1): ?>
                                <a href="<?php echo $imagenes->contenido ?>">
                                    <img src="<?php echo Yii::app()->request->baseUrl . $imagenes->rutaImagen; ?>" alt="<?php echo $imagenes->nombre ?>" />
                                </a>
                            <?php elseif ($imagenes->tipoContenido == 2): ?>
                                <?php
                                echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . $imagenes->rutaImagen . '" alt="' . $imagenes->nombre . '" />', CController::createUrl('/sitio/vercontenido', array('contenido' => $imagenes->idBanner
                                )));
                                ?>
                            <?php elseif ($imagenes->tipoContenido == 3): ?>
                                <img src="<?php echo Yii::app()->request->baseUrl . $imagenes->rutaImagen; ?>" alt="<?php echo $imagenes->nombre ?>" />
                            <?php endif; ?>
                        </div>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </div>
                <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                    <i class="prev-slide"></i>
                </a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                    <i class="next-slide"></i>
                </a>
            </div>
        </section>
    <?php elseif ($objModulo->tipo == 2): ?>
        <section>
            <div class="container">

                <div class="row">
                    <div class="col-md-12 title">
                        <span><i class="glyphicon glyphicon-chevron-right"></i></span>
                        <strong class="productos-destacados"><?php echo $objModulo->descripcion ?></strong>
                    </div>
                </div>

                <div id="owl-demo" class="owl-carousel">
                    <?php foreach ($objModulo->listProductosModulos as $listProductosModulos): ?>
                        <?php $objProducto = $listProductosModulos->objProducto ?>
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
    <?php elseif ($objModulo->tipo == 3): ?>
        <section>
            <div class="container-fluid">
                <div class="row">
                    <?php foreach ($objModulo->listImagenesBanners as $imagenes): ?>
                        <div class="col-sm-4 padding6px">
                            <?php if ($imagenes->tipoContenido == 1): ?>
                                <a href="<?php echo $imagenes->contenido ?>">
                                    <img style="width:100%;" src="<?php echo Yii::app()->request->baseUrl . $imagenes->rutaImagen; ?>" alt="<?php echo $imagenes->nombre ?>" />
                                </a>
                            <?php elseif ($imagenes->tipoContenido == 2): ?>
                                <?php
                                echo CHtml::link('<img style="width:100%;" src="' . Yii::app()->request->baseUrl . $imagenes->rutaImagen . '" alt="' . $imagenes->nombre . '" />', CController::createUrl('/sitio/vercontenido', array('contenido' => $imagenes->idBanner
                                )));
                                ?>
                            <?php elseif ($imagenes->tipoContenido == 3): ?>
                                <img style="width:100%;" src="<?php echo Yii::app()->request->baseUrl . $imagenes->rutaImagen; ?>" alt="<?php echo $imagenes->nombre ?>" />
                            <?php endif; ?>
                        </div>
                    <?php endforeach ?>
                </div>
            </div>
        </section>
    <?php elseif ($objModulo->tipo == ModulosConfigurados::TIPO_PROMOCION_FLOTANTE): ?>
        <a href="<?php echo $objModulo->contenido ?>" class="scroll-modulo-flotante"><?php echo $objModulo->descripcion ?></a>
    <?php endif; ?>
    <br/>
<?php endforeach; ?>
