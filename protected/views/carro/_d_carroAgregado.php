<div class='row'>
    <div id="<?php echo $objProducto->codigoProducto ?>" class="col-md-2">
        <img class="ajustada" src="<?php echo Yii::app()->request->baseUrl . $objProducto->rutaImagen(); ?>" alt="<?php echo $objProducto->descripcionProducto ?>" title="<?php echo $objProducto->descripcionProducto ?>">
    </div>
    <div id="<?php echo $objProducto->codigoProducto ?>" class="col-md-10">
        Se ha adicionado<br/><?php echo $objProducto->descripcionProducto ?><br/><?php echo $objProducto->presentacionProducto ?><br/>al carrito.
    </div>
</div>