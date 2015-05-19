<div class="ui-content c_cont_detail_prod inComboDesciption">
    <h1><?php echo $objCombo->descripcionCombo ?></h1>
    <h2>Código: <?php echo $objCombo->idCombo ?></h2>
   <!-- <h3 class="cdt_prod_spc">Código: <?php echo $objCombo->idCombo ?></h3>-->

    <div class="cdt_line_spc"><span></span></div>

    <p>Este combo incluye los siguientes productos:</p>

    <div class="listProductsCombo">
        <?php foreach ($objCombo->listProductos as $objProducto): ?>
            <?php $imagen = $objProducto->objImagen(YII::app()->params->producto['tipoImagen']['mini']); ?>
            <div class="productItemImage">
                <?php if ($imagen == null): ?>
                    <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['mini']; ?>">
                <?php else: ?>
                    <img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['mini']] . $imagen->rutaImagen; ?>">
                <?php endif; ?>
            </div>
            <div  class="productItemContent">
                <h2><?php echo $objProducto->descripcionProducto ?></h2>
                <h3><?php echo $objProducto->presentacionProducto ?></h3>
            </div>
        <div class="cdt_line_spc clear"><span></span></div>
        <?php endforeach; ?>
    </div>

   <div class="ccont_dtl_prod preciosCombo">
        <div class="cdtl_prod_pr">
            <div class="cdt_txt_alg"><span>Precio</span><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        </div>
        <div class="cdtl_pro_cant">
            <div class="cbtn_prod_cant_02"><input type="number" placeholder="0" value="1" id="cantidad-combo-<?php echo $objCombo->idCombo ?>" onchange="subtotalCombo(<?php echo $objCombo->idCombo ?>);"></div>
            <div class="cpro_total_02"><span class="txt_cant_total">Total</span> <span id="subtotal-producto-unidad-<?php echo $objCombo->idCombo ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objPrecio->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
        </div>
		<div class="clear"></div>
    </div>

    <div class="cdtl_div_ln"></div>

    <?php echo CHtml::link('Añadir al carro', '#', array('data-combo' => $objCombo->idCombo, 'data-cargar' => 2, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r btn_frc_add_car')); ?>
    <?php echo CHtml::link('Guardar en la lista personal', '#', array('class' => 'ui-btn ui-corner-all ui-shadow ui-btn-n btn_add_lst_pr')); ?>
</div>
