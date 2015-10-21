<div data-role='main'>
    <div class='' data-role='content' role='main'>
        <div id="ImagenCombo" class="col-md-1">
              <div class="item"><img class="img-responsive" src="<?php echo Yii::app()->request->baseUrl . $objCombo->rutaImagen(); ?>" ></div>      
        </div>
        <div id="productoAgregado" class="col-md-10">
            Se ha adicionado <?php echo $objCombo->descripcionCombo ?> al carrito.
        </div>
    </div> 
</div>