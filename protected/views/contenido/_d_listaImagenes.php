<section>
    <div class="container-fluid">
        <div class="row">
            <?php $dim = 12 / count($objModulo->listImagenesBanners) ?>
            <?php foreach ($objModulo->listImagenesBanners as $imagenes): ?>
                <div class="col-md-<?php echo $dim ?> padding6px">
                    <?php if ($imagenes->tipoContenido == 1): ?>
                        <a href="<?php echo $this->createUrl($imagenes->contenido) ?>">
                            <img style="width:100%;" src="<?php echo Yii::app()->request->baseUrl . $imagenes->rutaImagen; ?>" alt="<?php echo $imagenes->nombre ?>" />
                        </a>
                    <?php elseif ($imagenes->tipoContenido == 2): ?>
                        <?php echo CHtml::link('<img style="width:100%;" src="' . Yii::app()->request->baseUrl . $imagenes->rutaImagen . '" alt="' . $imagenes->nombre . '" />', CController::createUrl('/contenido/ver', array('tipo'=>'imagen', 'contenido' => $imagenes->idBanner))); ?>
                    <?php elseif ($imagenes->tipoContenido == 3): ?>
                        <img style="width:100%;" src="<?php echo Yii::app()->request->baseUrl . $imagenes->rutaImagen; ?>" alt="<?php echo $imagenes->nombre ?>" />
                    <?php endif; ?>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</section>