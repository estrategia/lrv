
<div class="col-md-12 border-left content-txt2">
    <div class="col-md-12">
        <div class="" style="text-align:center">
            <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $objCombo->idCombo)) ?>" data-ajax="false">
                <img src="<?php echo Yii::app()->request->baseUrl . $objCombo->rutaImagen(); ?>" class="ui-li-thumb">
            </a>
        </div>
        <?php if (Yii::app()->shoppingCart->contains($objCombo->getCodigo())): ?>
            <a href="" class="">
                <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_seleccionado.png">
            </a>
        <?php endif; ?>
        <div class="col-md-12">
            <div class="line-bottom">
                    <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $objCombo->idCombo)) ?>" data-ajax="false"><?php echo strtoupper($objCombo->descripcionCombo) ?></a> 
            </div>
            <div class="price" style="padding-bottom:1em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
            <div class="line-bottom">
                      <button class="col-md-3" style="border:0px solid;" id="btn-disminuir-combo-<?php $objCombo->idCombo ?>" onclick="disminuirCantidadCombo('<?php echo $objCombo->idCombo ?>',<?php echo $objPrecio->getPrecio()?>)" type="button"><span style="color:red" class="glyphicon glyphicon-minus"></span></button>
                      <div class="col-md-6 ressete">
                             <input id="cantidad-combo-<?php echo $objCombo->idCombo ?>" class="increment" type="text" maxlength="3" value="1" data-total="700"/>
                      </div>
                      <button class="col-md-3" style="border:0px solid;" id="btn-aumentar-combo-<?php echo $objCombo->idCombo ?>"  onclick="aumentarCantidadCombo('<?php echo $objCombo->idCombo ?>',<?php echo $objPrecio->getPrecio()?>)" type="button"><span style="color:red" class="glyphicon glyphicon-plus"></span></button>
            </div>
            <div class=""><span class="txt_cant_total">Subtotal: </span> <span id="subtotal-producto-combo-<?php echo $objCombo->idCombo ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
            <?php echo CHtml::link('<div class="button anadir">Añadir&nbsp;<img src="'.Yii::app()->baseUrl.'/images/desktop/carrito-amarillo.png" alt=""></div>', '#', array('data-combo' => $objCombo->idCombo, 'data-cargar' => 2, 'class' => '')); ?>
        </div>
    </div>

    <!-- combo agregado -->
    <a href="" class="clst_slct_prod<?php echo (Yii::app()->shoppingCart->contains($objCombo->getCodigo()) ? " active" : "") ?>">
        <img src="<?php echo Yii::app()->request->baseUrl ?>/images/iconos/icon_seleccionado.png">
    </a>
    <!-- combo agregado -->

    <div class="">
        <strong>
            <a href="<?php echo CController::createUrl('/catalogo/combo', array('combo' => $objCombo->idCombo)) ?>" data-ajax="false"><?php echo strtoupper($objCombo->descripcionCombo) ?></a> COMBO
            <div class="clst_pre_act" style="padding-bottom:1em;"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        </strong>
    </div>

    <br/>
</div>
