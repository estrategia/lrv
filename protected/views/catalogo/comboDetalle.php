<div class="ui-content c_cont_detail_prod">
    <h2><?php echo $objCombo->descripcionCombo ?></h2>
    <h3 class="cdt_prod_spc">Código: <?php echo $objCombo->getCodigo() ?></h3>

    <div class="cdt_line_spc"><span></span></div>

    <?php $listImagen = $objCombo->listImagen(YII::app()->params->producto['tipoImagen']['grande']); ?>

    <div id="owl-productodetalle-<?php echo $objCombo->getCodigo() ?>" class="owl-carousel owl-theme owl-productodetalle">
        <?php if (empty($listImagen)): ?>
            <div class="item"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->producto['noImagen']['grande']; ?>" alt="<?php echo $objCombo->descripcionCombo ?>" title="<?php echo $objCombo->descripcionCombo ?>"></div>
        <?php else: ?>
            <?php foreach ($listImagen as $imagen): ?>
                <div class="item"><img src="<?php echo Yii::app()->request->baseUrl . Yii::app()->params->carpetaImagen['productos'][YII::app()->params->producto['tipoImagen']['grande']] . $imagen->rutaImagen; ?>" alt="<?php echo $imagen->nombreImagen ?>" title="<?php echo $imagen->tituloImagen ?>"></div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <div class="cdt_line_spc"><span></span></div>
    <div class="ccont_dtl_prod">
        <div class="cdtl_prod_pr">
            <div class="cdt_txt_alg">Precio: <?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCombo->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?> </div>
        </div>
        <div class="cdtl_pro_cant">
            <div class="cbtn_prod_cant_02"><input type="number" placeholder="0" value="1" ></div>
            <div class="cpro_total_02"><span class="txt_cant_total">Total</span> <span id="subtotal-producto-unidad-<?php echo $objCombo->idCombo ?>"><?php echo Yii::app()->numberFormatter->format(Yii::app()->params->formatoMoneda['patron'], $objCombo->getPrecio(), Yii::app()->params->formatoMoneda['moneda']); ?></span></div>
        </div>
    </div>

    <div data-role="collapsible" data-iconpos="right" data-collapsed-icon="carat-d" data-expanded-icon="carat-u" data-theme="b">
        <h3>Productos de combo</h3>
        <ul data-role="listview" data-inset="false" data-icon="false" data-theme="a">
            <?php foreach ($objCombo->listProductos as $objProducto): ?>
                <li>
                    <a href="#"><?php echo $objProducto->descripcionProducto ?> (<?php echo $objProducto->presentacionProducto ?>)</a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="cdtl_div_ln"></div>

    <?php echo CHtml::link('Añadir al carro', '#', array('data-combo' => $objCombo->idCombo, 'data-cargar' => 1, 'class' => 'ui-btn ui-corner-all ui-shadow ui-btn-r btn_frc_add_car')); ?>
</div>
