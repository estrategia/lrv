<div data-role='main'>
    <div class='' data-role='content' role='main'>
        <div id="<?php echo $objProducto->codigoProducto ?>" class="col-md-1">
            <?php $listImagen=$objProducto->listImagenes;?>
                   <?php if (empty($listImagen)): ?>
                         <div class="item"><img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $objProducto->descripcionProducto ?>" title="<?php echo $objProducto->descripcionProducto ?>"></div>
                   <?php else: ?>
                       <?php foreach ($listImagen as $imagen): ?>
                         <div class="item"><img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>" alt="<?php echo $imagen->nombreImagen ?>" title="<?php echo $imagen->tituloImagen ?>"></div>
                       <?php     break;?>
                       <?php endforeach; ?>
                   <?php endif; ?>
        </div>
        <div id="<?php echo $objProducto->codigoProducto ?>" class="col-md-10">
            Se ha adicionado <?php echo $objProducto->descripcionProducto ?> <?php echo $objProducto->presentacionProducto ?> al carrito.
        </div>
    </div> 
</div>