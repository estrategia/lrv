<div class='row'>
    <div id="<?php echo $objProducto->codigoProducto ?>" class="col-md-3">
        <img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . $objProducto->rutaImagen(); ?>" alt="<?php echo $objProducto->descripcionProducto ?>" title="<?php echo $objProducto->descripcionProducto ?>">
    </div>
    <div id="<?php echo $objProducto->codigoProducto ?>" class="col-md-9">
        Se ha adicionado<br> <strong><?php echo $objProducto->descripcionProducto ?></strong> al carrito.
    </div>
</div>
