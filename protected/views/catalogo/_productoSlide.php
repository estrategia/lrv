<?php $imagen = $objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>

<?php if ($imagen == null): ?>
    <div>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['mini']; ?>">
        </a>
    </div>
<?php else: ?>
    <div class="imgRelacionado">
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>">
        </a>
    </div>
<?php endif; ?>

<div class="contentRelacionados">
    <h3><?php echo $objProducto->descripcionProducto ?></h3>
    <h4><?php echo $objProducto->presentacionProducto ?></h4>
    <?php if ($objPrecio->inicializado()): ?>
        <p class="priceRelacionado"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </p>
    <?php endif; ?>
</div>
