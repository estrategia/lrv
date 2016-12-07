<div class="imgRelacionado">
    <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto,'descripcion'=>  $objProducto->getCadenaUrl())) ?>" data-ajax="false">
        <img src="<?php echo Yii::app()->request->baseUrl . $objProducto->rutaImagen(); ?>">
    </a>
</div>

<div class="contentRelacionados">
    <h3><?php echo $objProducto->descripcionProducto ?></h3>
    <h4><?php echo $objProducto->presentacionProducto ?></h4>
    <?php if ($objPrecio->inicializado()): ?>
        <p class="priceRelacionado"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </p>
    <?php endif; ?>
</div>
