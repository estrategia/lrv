<section class="block" style="margin:0">
    <div class="container-fluid nopaddingleft nopaddingright">
    <div id="carousel-modulo-<?php echo $objModulo->idModulo ?>" class="carousel slide"  data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <?php foreach ($objModulo->listImagenesBanners as $i => $imagenes): ?>
                <div class="item <?php echo ($i == 0) ? 'active' : '' ?>">
                    <?php if ($imagenes->tipoContenido == 1): ?>
                        <a href="<?php echo $this->createUrl($imagenes->contenido) ?>">
                            <img src="<?php echo Yii::app()->request->baseUrl . $imagenes->rutaImagen; ?>" alt="<?php echo $imagenes->nombre ?>" />
                        </a>
                    <?php elseif ($imagenes->tipoContenido == 2): ?>
                        <?php echo CHtml::link('<img src="' . Yii::app()->request->baseUrl . $imagenes->rutaImagen . '" alt="' . $imagenes->nombre . '" />', CController::createUrl('/contenido/ver', array('tipo'=>'imagen', 'contenido' => $imagenes->idBanner))); ?>
                    <?php elseif ($imagenes->tipoContenido == 3): ?>
                        <img src="<?php echo Yii::app()->request->baseUrl . $imagenes->rutaImagen; ?>" alt="<?php echo $imagenes->nombre ?>" />
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <a class="carousel-control left" href="#carousel-modulo-<?php echo $objModulo->idModulo ?>" data-slide="prev">
            <i class="prev-slide"></i>
        </a>
        <a class="carousel-control right" href="#carousel-modulo-<?php echo $objModulo->idModulo ?>" data-slide="next">
            <i class="next-slide"></i>
        </a>
    </div>
    </div>
</section>
