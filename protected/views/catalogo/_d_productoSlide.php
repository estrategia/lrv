<div class="col-md-12">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>">
        <img class="lazyOwl img-responsive" data-src="<?php echo Yii::app()->request->baseUrl . $objProducto->rutaImagen(); ?>">
    </a>
</div>

<div class="content-txt2">
    <h4 style="color: #ED1C24;"><?php echo $objProducto->descripcionProducto ?></h4>
    <div>
        <span><?php echo $objProducto->presentacionProducto ?></span></div> 
    <?php if ($objPrecio->inicializado()): ?>
        <span style="font-weight:bolder;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </span>
    <?php endif; ?>
</div>
