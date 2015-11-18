<div id="slide-relacionados-modulo-<?php echo $objModulo->idModulo ?>" class="owl-carousel owl-theme owl-slideimagen">
    <?php foreach ($objModulo->listImagenesBanners as $objImagen): ?>
        <?php
        $href = "#";
        if ($objImagen->tipoContenido == 1)
            $href = $this->createUrl($objImagen->contenido);
        else if ($objImagen->tipoContenido == 2)
            $href = CController::createUrl('/contenido/ver', array('tipo' => 'imagen', 'contenido' => $objImagen->idBanner));
        ?>
        <div class="item">
            <a href="<?php echo $href ?>" data-ajax="false"><img src="<?php echo Yii::app()->request->baseUrl . $objImagen->rutaImagen; ?>" alt="<?php echo $objImagen->nombre ?>"></a>
        </div>
    <?php endforeach; ?>
</div>