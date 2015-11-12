<section class="block">
    <div id="carousel-modulo-<?php echo $objModulo->idModulo ?>" class="carousel slide" data-interval="false">
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
        <a class="carousel-control left" href="#carousel-modulo-<?php echo $objModulo->idModulo ?>" data-slide="prev">
            <i class="prev-slide"></i>
        </a>
        <a class="carousel-control right" href="#carousel-modulo-<?php echo $objModulo->idModulo ?>" data-slide="next">
            <i class="next-slide"></i>
        </a>
    </div>
</section>