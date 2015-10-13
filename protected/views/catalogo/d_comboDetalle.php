<div class="row">
    <div class="span6">
        <div class=""><span></span></div>
        <h4>Este combo incluye los siguientes productos:</h4>
        <?php foreach ($objCombo->listProductos as $objProducto): ?>
            <div class="row">
                <?php $imagen = $objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>
                <div class="span2">
                    <div>
                        <?php if ($imagen == null): ?>
                            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['mini']; ?>">
                        <?php else: ?>
                            <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>">
                        <?php endif; ?>
                    </div>
                    <div>
                        <strong><?php echo $objProducto->descripcionProducto ?></strong>
                        <div><?php echo $objProducto->presentacionProducto ?></div>
                    </div>
                </div>    
            </div>
            <div class="space-2"></div>
            <?php endforeach; ?>    
    </div>
   <div class="span6">
       <!-- Título del combo -->
       <h3><?php echo $objCombo->descripcionCombo ?></h3>
        <h4 class="">Código: <?php echo $objCombo->idCombo ?></h4>
        <div class="">
            <div class="">Precio: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        </div>
        <div class="">
          <!--  <div class=""><input type="number" placeholder="0" value="1" id="cantidad-combo-<?php echo $objCombo->idCombo ?>" onchange="subtotalCombo(<?php echo $objCombo->idCombo ?>);"></div> -->
            <button class="btn btn-xs btn-primary " id="disminuir_unidad_<?php echo $objCombo->idCombo ?>" onclick="disminuirCantidadCombo('<?php echo $objCombo->idCombo ?>',<?php echo $objPrecio->getPrecio()?>)" type="button"><span class="glyphicon glyphicon-minus"></span></button>
              <input id="cantidad-producto-combo-<?php echo $objCombo->idCombo ?>" style='width:40px' class="input-mini" type="text" onchange="validarCantidadCombo('<?php echo $objCombo->idCombo ?>',<?php echo $objPrecio->getPrecio()?>)" maxlength="3" value="1" data-total="700">
            <button class="btn btn-xs btn-primary " id="aumentar_unidad_<?php echo $objCombo->idCombo ?>" onclick="aumentarCantidadCombo('<?php echo $objCombo->idCombo ?>',<?php echo $objPrecio->getPrecio()?>)" type="button"><span class="glyphicon glyphicon-plus"></span></button>
            <div class=""><span class="txt_cant_total">Total</span> <span id="subtotal-producto-combo-<?php echo $objCombo->idCombo ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
        </div>
       <div class=""></div>
        
           <?php echo CHtml::link('<span class="glyphicon glyphicon-shopping-cart"></span>', '#', array('data-producto' => $objCombo->idCombo, 'data-cargar' => 1, 'class' => 'btn btn-primary')); ?>
           <?php echo CHtml::link('<span class="glyphicon glyphicon-pencil"></span>', '#', array('class' => 'btn btn-primary')); ?>
    </div>
</div>
