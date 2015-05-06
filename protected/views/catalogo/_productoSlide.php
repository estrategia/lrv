<?php $imagen = $objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>

<?php if ($imagen == null): ?>
    <div>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['mini']; ?>">
        </a>
    </div>
<?php else: ?>
    <div>
        <a href="<?php echo CController::createUrl('/catalogo/producto', array('producto' => $objProducto->codigoProducto)) ?>" data-ajax="false">
            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>">
        </a>
    </div>
<?php endif; ?>

<div>
    <p><?php echo $objProducto->descripcionProducto ?></p>
    <p><?php echo $objProducto->presentacionProducto ?></p>
    <?php if ($objPrecio->inicializado()): ?>
        <p><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(Precio::PRECIO_UNIDAD), Yii::app()->params->formatoMoneda['moneda']); ?> </p>
    <?php endif; ?>
</div>
